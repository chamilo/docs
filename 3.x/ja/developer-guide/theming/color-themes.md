# カラーテーマ

Chamilo 3.0 はデータベース駆動のカラーテーマシステムを使用します。テーマは管理 UI から管理され、データベースに保存され、CSS ファイルとしてディスクに書き出されます。アクセス URL ごとにカスタマイズできるため、マルチ URL インストールではそれぞれ異なるビジュアルアイデンティティを持てます。

## データモデル

テーマシステムを駆動するエンティティは 2 つです。

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | 主キー |
| `title` | string | 人が読める名前 |
| `slug` | string | `title` から自動生成（例: `"My Theme"` → `my-theme`）。`var/themes/` 内のディレクトリ名として使用 |
| `variables` | array (JSON) | CSS カスタムプロパティ名 → 値のマップ（例: `{"--color-primary-base": "46 117 163"}`） |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

`ColorTheme` を `AccessUrl` に関連付けます。`active` の真偽フラグは、その URL で現在有効なテーマを示します。アクセス URL ごとに同時に有効にできるテーマは 1 つだけです。

## テーマの保存方法

テーマが API 経由で作成または更新されると、`ColorThemeStateProcessor` が CSS ファイルを生成し、Flysystem の `themes_filesystem`（実体は `var/themes/`）に書き込みます。

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

生成される `colors.css` は、すべての変数を `:root` ブロックで囲みます。

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

値はスペース区切りの RGB チャネルの三組（`rgb()` ではない）です。これにより、追加設定なしで Tailwind が `bg-primary/50` のような不透明度バリアントを合成できます。

## テーマ解決の優先順位

`ThemeHelper::getVisualTheme()` は、任意のページで適用するテーマの slug を次の順で解決します。

1. **現在の AccessUrl のアクティブテーマ** — `active = true` の `AccessUrlRelColorTheme` レコード
2. **ユーザー選択テーマ** — `profile.user_selected_theme` プラットフォーム設定が有効な場合、`User` エンティティに保存されたテーマ
3. **コーステーマ** — `course.allow_course_theme` プラットフォーム設定が有効な場合の `course_theme` コース設定
4. **ラーニングパステーマ** — `allow_learning_path_theme` コース設定が有効な場合の LP の `$lp_theme_css` 値
5. **`THEME_FALLBACK` 環境変数** — `.env` で `THEME_FALLBACK='chamilo'` として設定
6. **デフォルト** — `chamilo`（`ThemeHelper::DEFAULT_THEME` としてハードコード）

## アセットの配信

テーマアセットは `ThemeController`（`src/CoreBundle/Controller/ThemeController.php`）により `/themes` プレフィックスの下で配信されます。

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | 任意のテーマアセット（CSS、JS、画像）を配信。要求されたテーマに見つからない場合は `chamilo` テーマにフォールバック |
| `GET /themes/{slug}/logo/{type}` | 優先ロゴ（`header` または `email`）を配信。SVG → PNG フォールバック付き |
| `POST /themes/{slug}/logos` | ヘッダー／メール用ロゴ（SVG および／または PNG）をアップロード |
| `DELETE /themes/{slug}/logos/{type}` | 特定のロゴを削除 |

汎用アセットルート（`/{name}/{path}`）は、要求されたテーマにファイルが無い場合、自動的に `chamilo` デフォルトテーマへフォールバックします。そのため、テーマは実際に上書きするファイルだけを含めれば十分です。

## テンプレートでのテーマ読み込み

`head.html.twig` レイアウトテンプレートは、Twig ヘルパー関数経由でアクティブテーマのアセットを読み込みます。

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

3 つの Twig 関数（`ChamiloExtension` に登録）は `ThemeHelper` を通じてアセットパスを解決し、上記と同じフォールバックチェーンを適用します。

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | 解決済みテーマ内アセットの URL |
| `theme_asset_link_tag('path')` | 完全な `<link rel="stylesheet">` タグ |
| `theme_asset_script_tag('path')` | 完全な `<script src="...">` タグ |
| `theme_asset_base64('path')` | アセットの Base64 エンコード済み data URI |
| `theme_logo('header'\|'email')` | 利用可能な最適なロゴの URL |

## API エンドポイント

テーマ管理は API Platform の REST API 経由で公開されます（管理者のみ）。

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | 新しいテーマを作成 |
| `PUT` | `/api/color_themes/{id}` | 既存テーマを更新 |
| `POST` | `/api/access_url_rel_color_themes` | アクセス URL にテーマを関連付け／有効化 |
| `GET` | `/api/access_url_rel_color_themes` | 現在のアクセス URL のテーマ関連付けを一覧 |

## カスタムテーマの作成

標準的なワークフローは管理 UI（**管理 → カラーテーマ**）経由であり、上記の API エンドポイントが呼び出されます。プログラムからテーマを作成するには:

1. JSON ボディを付けて `POST /api/color_themes` を呼び出します:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

これによりエンティティが永続化され、`var/themes/my-theme/colors.css` が書き込まれます。

2. 現在のアクセス URL に関連付けて有効化するには `POST /api/access_url_rel_color_themes` を呼び出します:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

カスタム画像（ロゴ、favicon、背景）を追加するには、`POST /themes/{slug}/logos` でアップロードするか、`var/themes/{slug}/images/` に直接配置します。

## カラー変数リファレンス

デフォルトの Tailwind 設定が期待するすべての変数:

| 変数 | 用途 |
|----------|---------|
| `--color-primary-base` | プライマリブランドカラー |
| `--color-primary-gradient` | プライマリ用のより暗いグラデーションストップ |
| `--color-primary-button-text` | プライマリボタン上のテキスト色 |
| `--color-primary-button-alternative-text` | プライマリボタン上の代替テキスト色 |
| `--color-secondary-base` | セカンダリアクセントカラー |
| `--color-secondary-gradient` | セカンダリ用のグラデーションストップ |
| `--color-secondary-button-text` | セカンダリボタン上のテキスト色 |
| `--color-tertiary-base` | ターシャリカラー |
| `--color-tertiary-gradient` | ターシャリ用のグラデーションストップ |
| `--color-tertiary-button-text` | ターシャリボタン上のテキスト色 |
| `--color-success-base` | 成功状態の色 |
| `--color-success-gradient` | 成功用のグラデーションストップ |
| `--color-success-button-text` | 成功ボタン上のテキスト色 |
| `--color-info-base` | 情報状態の色 |
| `--color-info-gradient` | 情報用のグラデーションストップ |
| `--color-info-button-text` | 情報ボタン上のテキスト色 |
| `--color-warning-base` | 警告状態の色 |
| `--color-warning-gradient` | 警告用のグラデーションストップ |
| `--color-warning-button-text` | 警告ボタン上のテキスト色 |
| `--color-danger-base` | 危険／エラー状態の色 |
| `--color-danger-gradient` | 危険用のグラデーションストップ |
| `--color-danger-button-text` | 危険ボタン上のテキスト色 |
| `--color-form-base` | フォーム要素のアクセントカラー |