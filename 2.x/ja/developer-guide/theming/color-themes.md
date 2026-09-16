# カラーテーマ

Chamilo 2.0 では、データベース駆動型のカラーテーマシステムを採用しています。テーマは管理UIを通じて管理され、データベースに保存され、CSSファイルとしてディスクに書き込まれます。アクセスURLごとにカスタマイズが可能で、複数のURLを持つインストール環境では異なる視覚的アイデンティティを持つことができます。

## データモデル

テーマシステムを駆動する2つのエンティティがあります：

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| フィールド | タイプ | 説明 |
|-------|------|-------------|
| `id` | int | 主キー |
| `title` | string | 人間が読める名前 |
| `slug` | string | `title` から自動生成（例：`"My Theme"` → `my-theme`）；`var/themes/` 内のディレクトリ名として使用 |
| `variables` | array (JSON) | CSSカスタムプロパティ名と値のマップ（例：`{"--color-primary-base": "46 117 163"}`） |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

`ColorTheme` と `AccessUrl` を関連付けます。`active` ブールフラグは、そのURLに対して現在アクティブなテーマを示します。1つのアクセスURLに対して同時にアクティブにできるテーマは1つだけです。

## テーマの保存方法

テーマがAPIを通じて作成または更新されると、`ColorThemeStateProcessor` がCSSファイルを生成し、Flysystem の `themes_filesystem`（`var/themes/` に裏付けられる）に書き込みます：

```
var/themes/
└── {slug}/
    └── colors.css   ← ColorTheme.variables から生成
```

生成された `colors.css` はすべての変数を `:root` ブロックでラップします：

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

値はスペースで区切られたRGBチャンネルトリプレット（`rgb()` ではない）で、Tailwind が追加の設定なしで `bg-primary/50` のような不透明度のバリエーションを構成できるようにしています。

## テーマ解決の優先順位

`ThemeHelper::getVisualTheme()` は、任意のページに適用するテーマスラグを以下の順序で解決します：

1. **現在の AccessUrl のアクティブなテーマ** — `active = true` の `AccessUrlRelColorTheme` レコード
2. **ユーザーが選択したテーマ** — `profile.user_selected_theme` プラットフォーム設定が有効な場合、`User` エンティティに保存されたテーマ
3. **コーステーマ** — `course.allow_course_theme` プラットフォーム設定が有効な場合、`course_theme` コース設定
4. **学習パステーマ** — `allow_learning_path_theme` コース設定が有効な場合、LP の `$lp_theme_css` 値
5. **`THEME_FALLBACK` 環境変数** — `.env` で `THEME_FALLBACK='chamilo'` として設定
6. **デフォルト** — `chamilo`（`ThemeHelper::DEFAULT_THEME` としてハードコード）

## アセットの提供

テーマアセットは `ThemeController`（`src/CoreBundle/Controller/ThemeController.php`）によって `/themes` プレフィックス下で提供されます。

| ルート | 目的 |
|-------|---------|
| `GET /themes/{name}/{path}` | 任意のテーマアセット（CSS、JS、画像）を提供；リクエストされたテーマに見つからない場合は `chamilo` テーマにフォールバック |
| `GET /themes/{slug}/logo/{type}` | 優先ロゴ（`header` または `email`）を提供、SVG → PNG フォールバック付き |
| `POST /themes/{slug}/logos` | ヘッダー/メールロゴ（SVG および/または PNG）をアップロード |
| `DELETE /themes/{slug}/logos/{type}` | 特定のロゴを削除 |

一般的なアセットルート（`/{name}/{path}`）は、要求されたテーマからファイルが見つからない場合に自動的に `chamilo` デフォルトテーマにフォールバックするため、テーマは実際にオーバーライドするファイルのみを含める必要があります。

## テンプレートでのテーマの読み込み方法

`head.html.twig` レイアウトテンプレートは、Twig ヘルパー関数を介してアクティブなテーマのアセットを読み込みます：

```twig
{# テーマのカラーバリエーションを注入 #}
{{ theme_asset_link_tag('colors.css') }}

{# TinyMCE カラーパレットを注入 #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# 他のテーマアセットを参照 #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

3つの Twig 関数（`ChamiloExtension` に登録）は、`ThemeHelper` を通じてアセットパスを解決し、上記と同じフォールバックチェインを適用します：

| 関数 | 戻り値 |
|----------|---------|
| `theme_asset('path')` | 解決されたテーマ内のアセットへのURL |
| `theme_asset_link_tag('path')` | 完全な `<link rel="stylesheet">` タグ |
| `theme_asset_script_tag('path')` | 完全な `<script src="...">` タグ |
| `theme_asset_base64('path')` | アセットのBase64エンコードされたデータURI |
| `theme_logo('header'\|'email')` | 利用可能な最良のロゴへのURL |

## APIエンドポイント

テーマ管理は API Platform REST API（管理者専用）を介して公開されています：

| メソッド | エンドポイント | 目的 |
|--------|----------|---------|
| `POST` | `/api/color_themes` | 新しいテーマを作成 |
| `PUT` | `/api/color_themes/{id}` | 既存のテーマを更新 |
| `POST` | `/api/access_url_rel_color_themes` | アクセスURLに対してテーマを関連付け/アクティブ化 |
| `GET` | `/api/access_url_rel_color_themes` | 現在のアクセスURLのテーマ関連を一覧表示 |

## カスタムテーマの作成

標準的なワークフローは、管理者UI（**管理者 → カラーテーマ**）を通じて行われ、上記のAPIエンドポイントを呼び出します。プログラムでテーマを作成するには：

1. JSONボディを含む `POST /api/color_themes` を使用：

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

これによりエンティティが保存され、`var/themes/my-theme/colors.css` が書き込まれます。

2. 現在のアクセスURLに関連付け、アクティベートするために `POST /api/access_url_rel_color_themes` を使用：

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

カスタム画像（ロゴ、ファビコン、背景）を追加するには、`POST /themes/{slug}/logos` を介してアップロードするか、`var/themes/{slug}/images/` に直接配置してください。

## カラーバリエーブルのリファレンス

デフォルトのTailwind設定で期待されるすべての変数：

| 変数 | 目的 |
|----------|---------|
| `--color-primary-base` | 主要なブランドカラー |
| `--color-primary-gradient` | 主要カラーの濃いグラデーションストップ |
| `--color-primary-button-text` | 主要ボタンのテキストカラー |
| `--color-primary-button-alternative-text` | 主要ボタンの代替テキストカラー |
| `--color-secondary-base` | 二次的なアクセントカラー |
| `--color-secondary-gradient` | 二次カラーのグラデーションストップ |
| `--color-secondary-button-text` | 二次ボタンのテキストカラー |
| `--color-tertiary-base` | 三次カラー |
| `--color-tertiary-gradient` | 三次カラーのグラデーションストップ |
| `--color-tertiary-button-text` | 三次ボタンのテキストカラー |
| `--color-success-base` | 成功状態の色 |
| `--color-success-gradient` | 成功状態のグラデーションストップ |
| `--color-success-button-text` | 成功ボタンのテキストカラー |
| `--color-info-base` | 情報状態の色 |
| `--color-info-gradient` | 情報状態のグラデーションストップ |
| `--color-info-button-text` | 情報ボタンのテキストカラー |
| `--color-warning-base` | 警告状態の色 |
| `--color-warning-gradient` | 警告状態のグラデーションストップ |
| `--color-warning-button-text` | 警告ボタンのテキストカラー |
| `--color-danger-base` | 危険/エラー状態の色 |
| `--color-danger-gradient` | 危険状態のグラデーションストップ |
| `--color-danger-button-text` | 危険ボタンのテキストカラー |
| `--color-form-base` | フォーム要素のアクセントカラー |