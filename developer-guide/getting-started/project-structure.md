# プロジェクト構造

## トップレベルディレクトリ

```
chamilo/
├── assets/          # フロントエンドのソースコード
│   ├── vue/         # Vue 3 アプリケーション（コンポーネント、ビュー、ルーター、ストア）
│   ├── css/         # SCSS スタイルシート
│   └── js/          # レガシー JavaScript
├── config/          # Symfony の設定（ルート、サービス、パッケージ）
├── public/          # ウェブルート（index.php、レガシー PHP ページ、プラグイン）
│   ├── main/        # レガシー PHP モジュール（ツールごとにサブディレクトリ）
│   └── plugin/      # 組み込みおよびカスタムプラグイン
├── src/             # PHP ソースコード（Symfony バンドル）
│   ├── CoreBundle/  # プラットフォームの中核ロジック
│   ├── CourseBundle/# コース固有の機能
│   └── LtiBundle/   # LTI 1.3 統合
├── templates/       # Twig テンプレート
├── var/             # キャッシュ、ログ、アップロード（生成される）
├── vendor/          # Composer 依存関係（生成される）
├── node_modules/    # npm 依存関係（生成される）
└── translations/    # 翻訳ファイル
```

## ソースコード (`src/`)

### CoreBundle

最大のバンドル。注目すべきサブディレクトリ：

| ディレクトリ | 内容 |
|-----------|----------|
| `Entity/` | Doctrine エンティティ（User, Course, Session, ResourceNode など） |
| `Controller/` | 管理コントローラー、API アクション、ページ（サブフォルダ Api/ には API Platform のカスタムアクションが含まれる） |
| `Settings/` | 設定スキーマファイル（プラットフォーム設定） |
| `Repository/` | Doctrine リポジトリ |
| `AiProvider/` | AI プロバイダーの実装（OpenAI, Gemini, Mistral, DeepSeek, Grok） |
| `Tool/` | コースツールの定義 |
| `Security/` | Voters、認証器、認可 |
| `EventListener/` | イベントリスナー |
| `EventSubscriber/` | イベントサブスクライバー |
| `Command/` | Symfony コンソールコマンド |
| `Migrations/` | データベースマイグレーション |
| `Twig/` | Twig 拡張 |
| `Storage/` | Flysystem ストレージアダプター |

### CourseBundle

コース固有のエンティティとロジック：

| ディレクトリ | 内容 |
|-----------|----------|
| `Entity/` | コースコンテンツのエンティティ（CDocument, CQuiz, CLp, CForum, CStudentPublication など） |
| `Controller/` | コースコントローラー |
| `Settings/` | コースレベルの設定スキーマ |
| `Component/CourseCopy/` | コースのインポート/エクスポート（Common Cartridge, Moodle） |

### LtiBundle

LTI 1.3 統合：

| ディレクトリ | 内容 |
|-----------|----------|
| `Entity/` | LTI プラットフォーム、ツール、デプロイメントのエンティティ |
| `Controller/` | LTI 起動および設定エンドポイント |

## フロントエンド (`assets/vue/`)

```
assets/vue/
├── main.js              # アプリケーションのエントリーポイント
├── main_installer.js    # インストーラーのエントリーポイント
├── components/          # 再利用可能なVueコンポーネント
│   ├── accessurl/       # マルチURL（ポータル）コンポーネント
│   ├── admin/           # 管理者向けの特定コンポーネント
│   ├── assignments/     # 課題のフォームとリスト
│   ├── attendance/      # 出欠確認シートコンポーネント
│   ├── basecomponents/  # 共有ベースコンポーネント（BaseButton, BaseIcon, BaseTable, BaseTinyEditorなど）およびChamiloIcons.js
│   ├── blog/            # ブログコンポーネント
│   ├── branch/          # ネットワークの支店/キャンパスコンポーネント
│   ├── ccalendarevent/  # コースカレンダーイベントコンポーネント
│   ├── chat/            # チャットおよびAIチューター
│   ├── course/          # コースカード、カタログ、フォーム
│   ├── coursecategory/  # コースカテゴリコンポーネント
│   ├── coursemaintenance/ # コースのバックアップ/復元コンポーネント
│   ├── ctoolintro/      # コースツール紹介コンポーネント
│   ├── documents/       # ドキュメント管理コンポーネント
│   ├── dropbox/         # Dropbox（ファイル交換）コンポーネント
│   ├── filemanager/     # ファイルブラウザコンポーネント
│   ├── glossary/        # 用語集コンポーネント
│   ├── installer/       # インストールウィザード
│   ├── layout/          # サイドバー、トップバー、シェルレイアウト
│   ├── links/           # 外部リンクコンポーネント
│   ├── login/           # ログインフォームコンポーネント
│   ├── lp/              # 学習パスコンポーネント
│   ├── message/         # メッセージコンポーネント
│   ├── page/            # 静的ページコンポーネント
│   ├── pageLayout/      # ページレイアウトのラッパーコンポーネント
│   ├── personalfile/    # 個人ファイルスペースコンポーネント
│   ├── platform/        # プラットフォームレベルのUIコンポーネント
│   ├── resource_links/  # リソースリンク管理コンポーネント
│   ├── room/            # 仮想ルームコンポーネント
│   ├── session/         # セッション（学習キャンペーン）コンポーネント
│   ├── sessionadmin/    # セッション管理コンポーネント
│   ├── skill/           # スキルおよび能力コンポーネント
│   ├── social/          # ソーシャルネットワークコンポーネント
│   ├── systemannouncement/ # システムアナウンスメントコンポーネント
│   ├── user/            # ユーザー管理およびプロフィールコンポーネント
│   ├── usergroup/       # ユーザーグループ（クラス）コンポーネント
│   └── userreluser/     # ユーザー関係（友達/フォロー）コンポーネント
├── views/               # ページレベルのVueビュー（components/の構造を反映）
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + 機能エリアごとのモジュール)
├── store/               # Piniaストア
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # 共有コンポジション関数（機能ごとのサブディレクトリ）
├── services/            # APIサービスレイヤー（エンティティ/ドメインごとのファイル）
├── utils/               # ユーティリティヘルパー（日付、hydra、fetch、sanitizeHtmlなど）
├── config/              # 実行時設定（api.js, env.js）
├── constants/           # 共有定数
│   └── entity/          # エンティティ固有の定数（セッション、メッセージ、追加フィールドなど）
├── layouts/             # 高レベルレイアウトコンポーネント（MyCourses.vue）
├── pages/               # 独立したページコンポーネント（Home, Login, Faq, Demo）
├── mixins/              # 従来のVue 2スタイルのミックスイン（ListMixin, CreateMixinなど）
├── hooks/               # コンポーザブルフック（useSidebar, useState）
├── plugins/             # Vueプラグイン登録（httpErrors, vuetify）
├── validators/          # カスタムVuelidateバリデーター
└── error/               # エラーバウンダリコンポーネント
```

---
## 設定 (`config/`)

```
config/
├── packages/            # パッケージおよびフレームワークの設定（パッケージごとに1つのYAMLファイル）
│   ├── security.yaml    # ロール階層、ファイアウォール、アクセス制御
│   ├── doctrine.yaml    # Doctrine ORMおよびDBALの設定
│   ├── api_platform.yaml# API Platformの設定
│   ├── framework.yaml   # Symfonyの主要設定
│   ├── lexik_jwt_authentication.yaml  # JWTトークンの設定
│   ├── nelmio_cors.yaml # APIコンシューマ向けのCORSヘッダー
│   ├── oneup_flysystem.yaml  # クラウドストレージアダプター
│   ├── webpack_encore.yaml   # Webpack Encoreとの統合
│   ├── ... (30以上のパッケージファイル)
│   ├── dev/             # 開発環境専用の上書き（ウェブプロファイラー、デバッグ、ルーティング）
│   ├── prod/            # 本番環境専用の上書き（現在は空のプレースホルダー）
│   └── test/            # テスト環境用の上書き（JWT、バリデーター、ウェブプロファイラー）
├── routes/              # ルート定義
│   ├── api_platform.yaml     # API Platformのルートプレフィックス
│   ├── attributes.yaml       # コントローラーのアノテーションに基づくルート
│   ├── fos_js_routing.yaml   # FOS JSルーティングの公開
│   ├── legacy.yaml           # public/main/内のレガシーPHPページ用のルート
│   ├── security.yaml         # ログイン/ログアウト/OAuth2のルート
│   ├── dev/                  # 開発環境専用のルート（プロファイラー、Makerバンドル）
│   └── test/                 # テスト環境専用のルート上書き
├── jwt/                 # JWTキーペア（秘密鍵/公開鍵）
└── jwt-test/            # テスト環境用のJWTキー
```

Symfonyは、ベースファイル `packages/*.yaml` を対応する環境サブディレクトリ（`dev/`、`prod/`、または `test/`）内のファイルと自動的にマージするため、環境固有のファイルは異なる値のみを上書きすれば済みます。

## ビルド設定

| ファイル | 目的 |
|------|---------|
| `webpack.config.js` | Webpack Encoreの設定（エントリーポイント、ローダー、プラグイン） |
| `tailwind.config.js` | Tailwind CSSの設定（コンテンツパス、テーマ拡張、プラグイン） |
| `tsconfig.json` | TypeScriptの設定 |
| `eslint.config.mjs` | ESLintのルール（フラット設定） |
| `.prettierrc.json` | Prettierのフォーマットルール |

すべてのファイルはプロジェクトのルートにあります。PostCSSプラグイン（Tailwind + Autoprefixer）は、`webpack.config.js` 内で `enablePostCssLoader()` を通じてインラインで設定されており、独立した `postcss.config.js` ファイルはありません。`webpack.config.js` はPostCSSを通じて間接的に `tailwind.config.js` を読み込むため、Tailwindの `content` または `theme` セクションの変更は、次回の `yarn encore dev` / `yarn encore production` の実行時に反映されます。

## Webpackのエントリーポイント

ビルドでは以下のバンドルが生成されます：

**JavaScript:**
* `vue` — メインのVue 3アプリケーション（`assets/vue/main.js`）
* `vue_installer` — インストールウィザード（`assets/vue/main_installer.js`）
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Vueに移行していないページ用のレガシーJS

**CSS:**
* `app` — メインスタイルシート（`assets/css/app.scss`）
* および特化スタイルシート：`chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

---
## CSSの構造 (`assets/css/`)

```
assets/css/
├── app.scss             # エントリーポイント — Tailwind、SCSSインデックス、サードパーティCSSをインポート
├── _tailwind.scss       # Tailwindディレクティブ (@tailwind base / components / utilities)
├── chat.scss            # チャットパネルおよびAIチューターのスタイル
├── document.scss        # ドキュメントビューアのスタイル
├── editor.scss          # TinyMCEエディタインターフェースのスタイル
├── editor_content.scss  # エディタのiframe本体に注入されるスタイル
├── markdown.scss        # Markdownでレンダリングされたコンテンツのスタイル
├── print.scss           # 印刷用のスタイルシート
├── responsive.scss      # レスポンシブな上書き
├── scorm.scss           # SCORMプレイヤーのスタイル
├── legacy/              # 古いPHPページ用のスタイル (例: frameReadyLoader.scss)
└── scss/                # SCSSのモジュール部分
    ├── index.scss           # バレルファイル — 以下のすべての部分をインポート
    ├── abstracts/           # 共有ミックスインと関数
    ├── settings/            # デザイントークン (タイポグラフィ、コンポーネントベース)
    ├── atoms/               # PrimeVueのコンポーネントごとの上書き (ボタン、入力、カレンダーなど)
    ├── molecules/           # 小さなUIパターン (チップ、ツールバー、空の状態)
    ├── organisms/           # 大きな機能エリア (サイドバー、データテーブル、ダイアログ、LPパネルなど)
    ├── layout/              # ページの骨組み部分 (トップバー、メインコンテナ、ブレッドクラム)
    ├── components/          # 古いコンポーネント固有のファイル (ブログ、演習、ソーシャル、スキルなど)
    └── libs/                # サードパーティライブラリの上書き (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

TailwindはPostCSSを介して統合されています。ファイル `assets/css/_tailwind.scss` はベース、コンポーネント、ユーティリティの各レイヤーを出力し、ファイル `assets/css/app.scss` が最初にこれをインポートすることで、Tailwindのユーティリティが他のすべての部分ファイルで利用可能になります。Tailwindの設定 — コンテンツパスのパージ、テーマの拡張、プラグイン — はプロジェクトのルートにある `tailwind.config.js` (`/var/www/chamilo/tailwind.config.js`) に配置されています。

カスタムユーティリティクラスおよび `@layer` で定義されたコンポーネントクラス ( `app.scss` で確認可能) は、Tailwindのレイヤー規約に従い、ユーザー定義のクラスが生成されたユーティリティと同じ特異度ルールを尊重するようになっています。

### カラーテーマ

Chamiloは、管理インターフェース (**管理者 > カラーテーマ**) から直接設定可能なカラーテーマシステムをサポートしています。保存された各テーマは、`var/themes/` の下に専用のディレクトリにファイルとして記録されます：

```
var/themes/
└── [テーマ名]/
    ├── colors.css       # 完全なカラーパレット用のカスタムCSSプロパティ
    ├── default.css      # オプションのカスタムCSSルール
    ├── learnpath.css    # 学習パスの固有の上書き
    ├── tiny-settings.js # TinyMCEエディタのカラーパレット設定
    └── images/          # テーマの画像 (ロゴ、ファビコン、背景、PWAアイコン)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # 背景画像、管理ブロックの画像など
```

ファイル `colors.css` は、CSSカスタムプロパティを `rgb()` 値ではなく、スペースで区切られたRGBチャンネルのトリプレットとして定義しており、これによりTailwindが追加の設定なしで不透明度のバリエーション (例: `bg-primary/50`) を構成できるようになっています：

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

テーマレイヤーは、コンパイルされたTailwind/SCSSパッケージの上に位置します。ブラウザはメインストylesheetの後に `colors.css` を読み込むため、テーマの変更はコンパイルステップを必要とせずに即座に有効になります。