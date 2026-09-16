# プロジェクト構成

## トップレベルディレクトリ

```
chamilo/
├── assets/          # Frontend source code
│   ├── vue/         # Vue 3 application (components, views, router, stores)
│   ├── css/         # SCSS stylesheets
│   └── js/          # Legacy JavaScript
├── config/          # Symfony configuration (routes, services, packages)
├── public/          # Web root (index.php, legacy PHP pages, plugins)
│   ├── main/        # Legacy PHP modules (one subdirectory per tool)
│   └── plugin/      # Bundled and custom plugins
├── src/             # PHP source code (Symfony bundles)
│   ├── CoreBundle/  # Core platform logic
│   ├── CourseBundle/# Course-specific features
│   └── LtiBundle/   # LTI 1.3 integration
├── templates/       # Twig templates
├── var/             # Cache, logs, uploads (generated)
├── vendor/          # Composer dependencies (generated)
├── node_modules/    # npm dependencies (generated)
└── translations/    # Translation files
```

## ソースコード (`src/`)

### CoreBundle

最大のバンドルです。主なサブディレクトリは次のとおりです。

| Directory | Contents |
|-----------|----------|
| `Entity/` | Doctrine エンティティ（User、Course、Session、ResourceNode など） |
| `Controller/` | 管理、API アクション、ページ用コントローラー（Api/ サブフォルダーにはカスタム API Platform アクションが置かれます） |
| `Settings/` | 設定スキーマファイル（プラットフォーム構成） |
| `Repository/` | Doctrine リポジトリ |
| `AiProvider/` | AI プロバイダー実装（OpenAI、Gemini、Mistral、DeepSeek、Grok） |
| `Tool/` | コースツール定義 |
| `Security/` | Voter、認証器、認可 |
| `EventListener/` | イベントリスナー |
| `EventSubscriber/` | イベントサブスクライバー |
| `Command/` | Symfony コンソールコマンド |
| `Migrations/` | データベースマイグレーション |
| `Twig/` | Twig 拡張 |
| `Storage/` | Flysystem ストレージアダプター |

### CourseBundle

コース固有のエンティティとロジックです。

| Directory | Contents |
|-----------|----------|
| `Entity/` | コースコンテンツのエンティティ（CDocument、CQuiz、CLp、CForum、CStudentPublication など） |
| `Controller/` | コースコントローラー |
| `Settings/` | コースレベルの設定スキーマ |
| `Component/CourseCopy/` | コースのインポート／エクスポート（Common Cartridge、Moodle） |

### LtiBundle

LTI 1.3 連携です。

| Directory | Contents |
|-----------|----------|
| `Entity/` | LTI プラットフォーム、ツール、デプロイメントのエンティティ |
| `Controller/` | LTI 起動および設定エンドポイント |

## フロントエンド（`assets/vue/`）

```
assets/vue/
├── main.js              # Application entry point
├── main_installer.js    # Installer entry point
├── components/          # Reusable Vue components
│   ├── accessurl/       # Multi-URL (portal) components
│   ├── admin/           # Admin-specific components
│   ├── assignments/     # Assignment forms and lists
│   ├── attendance/      # Attendance sheet components
│   ├── basecomponents/  # Shared base components (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) and ChamiloIcons.js
│   ├── blog/            # Blog components
│   ├── branch/          # Branch/network campus components
│   ├── ccalendarevent/  # Course calendar event components
│   ├── chat/            # Chat and AI tutor
│   ├── course/          # Course cards, catalogs, forms
│   ├── coursecategory/  # Course category components
│   ├── coursemaintenance/ # Course backup/restore components
│   ├── ctoolintro/      # Course tool introduction components
│   ├── documents/       # Document management components
│   ├── dropbox/         # Dropbox (file exchange) components
│   ├── filemanager/     # File browser components
│   ├── glossary/        # Glossary components
│   ├── installer/       # Installation wizard
│   ├── layout/          # Sidebar, Topbar, shell layout
│   ├── links/           # External links components
│   ├── login/           # Login form components
│   ├── lp/              # Learning path components
│   ├── message/         # Messaging components
│   ├── page/            # Static page components
│   ├── pageLayout/      # Page layout wrapper components
│   ├── personalfile/    # Personal file space components
│   ├── platform/        # Platform-level UI components
│   ├── resource_links/  # Resource link management components
│   ├── room/            # Virtual room components
│   ├── session/         # Session (learning campaign) components
│   ├── sessionadmin/    # Session administration components
│   ├── skill/           # Skills and competencies components
│   ├── social/          # Social network components
│   ├── systemannouncement/ # System announcement components
│   ├── user/            # User profile and management components
│   ├── usergroup/       # User group (class) components
│   └── userreluser/     # User relationship (friend/follow) components
├── views/               # Page-level Vue views (mirrors components/ structure)
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
├── router/              # Vue Router (index.js + one module per feature area)
├── store/               # Pinia stores
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Shared composition functions (per-feature subdirectories)
├── services/            # API service layer (one file per entity/domain)
├── utils/               # Utility helpers (dates, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Runtime configuration (api.js, env.js)
├── constants/           # Shared constants
│   └── entity/          # Entity-specific constants (session, message, extrafield, etc.)
├── layouts/             # Top-level layout components (MyCourses.vue)
├── pages/               # Standalone page components (Home, Login, Faq, Demo)
├── mixins/              # Legacy Vue 2-style mixins (ListMixin, CreateMixin, etc.)
├── hooks/               # Composable hooks (useSidebar, useState)
├── plugins/             # Vue plugin registrations (httpErrors, vuetify)
├── validators/          # Vuelidate custom validators
└── error/               # Error boundary components
```

## 設定（`config/`）

```
config/
├── packages/            # Bundle and framework configuration (one YAML file per package)
│   ├── security.yaml    # Role hierarchy, firewalls, access control
│   ├── doctrine.yaml    # Doctrine ORM and DBAL settings
│   ├── api_platform.yaml# API Platform configuration
│   ├── framework.yaml   # Core Symfony settings
│   ├── lexik_jwt_authentication.yaml  # JWT token settings
│   ├── nelmio_cors.yaml # CORS headers for API consumers
│   ├── oneup_flysystem.yaml  # Cloud storage adapters
│   ├── webpack_encore.yaml   # Webpack Encore integration
│   ├── ... (30+ package files)
│   ├── dev/             # Development-only overrides (web profiler, debug, routing)
│   ├── prod/            # Production-only overrides (currently empty placeholder)
│   └── test/            # Test-environment overrides (JWT, validator, web profiler)
├── routes/              # Route definitions
│   ├── api_platform.yaml     # API Platform route prefix
│   ├── attributes.yaml       # Controller annotation-based routes
│   ├── fos_js_routing.yaml   # FOS JS Routing exposure
│   ├── legacy.yaml           # Routes for legacy PHP pages under public/main/
│   ├── security.yaml         # Login/logout/OAuth2 routes
│   ├── dev/                  # Development-only routes (profiler, Maker bundle)
│   └── test/                 # Test-only route overrides
├── jwt/                 # JWT key pair (private/public keys)
└── jwt-test/            # JWT keys for the test environment
```

Symfony は、ベースとなる `packages/*.yaml` ファイルを、対応する環境サブディレクトリ（`dev/`、`prod/`、または `test/`）内のファイルと自動的にマージします。そのため、環境固有のファイルでは、異なる値だけを上書きすれば十分です。

## テスト (`tests/`)

`tests/` は**パッケージ化された Chamilo のダウンロード（リリース ZIP/tarball）には含まれません**。実行時に用途がなく、一部のスクリプトを本番サーバーに残すとリスクになり得るため、配布時に除外されます。プロジェクトを `git clone` で取得した場合にのみ存在します。

```
tests/
├── CoreBundle/       # PHPUnit tests, mirroring src/CoreBundle/'s subdirectory layout
├── CourseBundle/     # PHPUnit tests, mirroring src/CourseBundle/'s subdirectory layout
├── datafiller/       # Scripts that seed a test installation with demo courses/users/content
├── history/          # Snapshots of what Chamilo looked like at past versions
├── phpstan/          # Bootstrap file used by PHPStan when analyzing Doctrine ORM code
├── playwright/       # Browser-driven end-to-end tests (Gherkin + playwright-bdd)
├── procedures/       # Spreadsheets used as a base for manual QA of features
├── scripts/          # Standalone maintenance/fix/migration scripts for existing portals
├── AbstractApiTest.php                        # Base class for API Platform test cases
├── ApplicationAvailabilityFunctionalTest.php   # Smoke test asserting core pages load
├── ChamiloTestTrait.php                        # Shared fixtures/auth/request helpers
├── bootstrap.php                               # PHPUnit bootstrap
├── deprecations.baseline.json                  # Accepted deprecation warnings, excluded from failing the suite
└── README.md                                   # Setup instructions for PHPUnit and Playwright
```

| ディレクトリ | 内容 |
|-----------|----------|
| `CoreBundle/` | `src/CoreBundle/` をミラーした PHPUnit テスト: `Api/`、`ApiResource/`、`Command/`、`Controller/`、`DataFixtures/`、`Entity/`、`Event/`、`EventListener/`、`Filter/`、`fixtures/`、`Helpers/`、`Mcp/`、`Migrations/`、`Repository/`、`Security/`、`Serializer/`、`Service/`、`Settings/`、`State/`、`Tool/`、`Traits/`、`Twig/` |
| `CourseBundle/` | `src/CourseBundle/` をミラーした PHPUnit テスト: `Api/`、`Component/CourseCopy/`、`Repository/`、`Settings/` |
| `datafiller/` | テスト用インストールにデモコンテンツを投入するスクリプト: `data_courses.php`、`data_users.php`、`fill_courses.php`、`fill_users.php`、`fill_many_users.php`、`fill_whoisonline.php`、`generate_users.php`、`fill_all.php`（他を実行する）、加えて `images/` と大規模な CSV ユーザーインポート例 |
| `history/` | 過去リリース時点の Chamilo の構造を記録したスナップショット（`1.8.8.2`、`1.9.0`、`1.10.0`、`1.11.0`、`2.0`） |
| `phpstan/` | `doctrine-orm-bootstrap.php`。PHPStan が Doctrine ORM コードを解析する際に読み込む |
| `playwright/` | エンドツーエンドのブラウザテスト: `features/*.feature`（[playwright-bdd](https://vitalets.github.io/playwright-bdd/) 経由で実行する Gherkin シナリオ）、`steps/common.steps.ts`（TypeScript のステップ定義）、`fixtures/`（テストファイル、例: スプレッドシート）、`scripts/check-results.mjs`、`playwright.config.ts`、生成される `.features-gen/` 出力。旧 Behat スイートの代替であり、そのシナリオは参照用に git 履歴に残っている |
| `procedures/` | 機能の手動品質レビュー用チェックリストの基盤となるスプレッドシート（現在は `spanish/`） |
| `scripts/` | 既存の Chamilo ポータル向けの単発メンテナンス／修正／移行スクリプト（主に古いバージョン向け）、加えて `git-hooks/`、`img/`、`lang/`、`packaging/` サブフォルダ |

テストデータベースのセットアップ、および PHPUnit と Playwright スイートの実行方法については [Testing](../contributing/testing.md) を参照してください。

## ビルド設定

| ファイル | 目的 |
|------|---------|
| `webpack.config.js` | Webpack Encore の設定（エントリ、ローダー、プラグイン） |
| `tailwind.config.js` | Tailwind CSS の設定（content パス、テーマ拡張、プラグイン） |
| `tsconfig.json` | TypeScript の設定 |
| `eslint.config.mjs` | ESLint ルール（flat config） |
| `.prettierrc.json` | Prettier のフォーマットルール |

すべてのファイルはプロジェクトルートにあります。PostCSS プラグイン（Tailwind + Autoprefixer）は `enablePostCssLoader()` により `webpack.config.js` 内でインライン設定されており、独立した `postcss.config.js` はありません。`webpack.config.js` は PostCSS 経由で間接的に `tailwind.config.js` を読み込むため、Tailwind の `content` または `theme` セクションの変更は、次回の `yarn encore dev` / `yarn encore production` 実行時に反映されます。

## Webpack エントリポイント

ビルドは次のバンドルを生成します。

**JavaScript:**
* `vue` — メインの Vue 3 アプリケーション（`assets/vue/main.js`）
* `vue_installer` — インストールウィザード（`assets/vue/main_installer.js`）
* `legacy_app`、`legacy_exercise`、`legacy_lp`、`legacy_document` — まだ Vue に移行していないページ向けのレガシー JS

**CSS:**
* `app` — メインスタイルシート（`assets/css/app.scss`）
* 加えて専用シート: `chat`、`document`、`editor`、`editor_content`、`markdown`、`print`、`responsive`、`scorm`

## CSS 構造 (`assets/css/`)

```
assets/css/
├── app.scss             # Entry point — imports Tailwind, the SCSS index, and third-party CSS
├── _tailwind.scss       # Tailwind directives (@tailwind base / components / utilities)
├── chat.scss            # Chat and AI tutor panel styles
├── document.scss        # Document viewer styles
├── editor.scss          # TinyMCE editor shell styles
├── editor_content.scss  # Styles injected into the editor iframe body
├── markdown.scss        # Markdown-rendered content styles
├── print.scss           # Print stylesheet
├── responsive.scss      # Responsive overrides
├── scorm.scss           # SCORM player styles
├── legacy/              # Styles for legacy PHP pages (e.g. frameReadyLoader.scss)
└── scss/                # Modular SCSS partials
    ├── index.scss           # Barrel file — imports all partials below
    ├── abstracts/           # Mixins and shared functions
    ├── settings/            # Design tokens (typography, component base)
    ├── atoms/               # Per-component PrimeVue overrides (buttons, inputs, calendar, etc.)
    ├── molecules/           # Small composed UI patterns (chips, toolbars, empty states)
    ├── organisms/           # Larger feature areas (sidebar, datatable, dialog, LP panel, etc.)
    ├── layout/              # Page skeleton partials (topbar, main container, breadcrumb)
    ├── components/          # Legacy component-specific files (blog, exercise, social, skill, etc.)
    └── libs/                # Third-party library overrides (FullCalendar, MediaElement.js)
```

### Tailwind CSS

Tailwind は PostCSS 経由で統合されています。`assets/css/_tailwind.scss` が base、component、utility の各レイヤーを出力し、`assets/css/app.scss` がこれを最初にインポートするため、Tailwind のユーティリティは他のすべてのパーシャルで利用できます。パージ用のコンテンツパス、テーマ拡張、プラグインを含む Tailwind の設定は、プロジェクトルートの `tailwind.config.js`（`/var/www/chamilo/tailwind.config.js`）にあります。

`@layer` で定義されたカスタムユーティリティクラスおよびコンポーネントクラス（`app.scss` で確認できます）は Tailwind のレイヤー規約に従うため、ユーザー定義クラスは生成されたユーティリティと同じ詳細度ルールを尊重します。

### カラーテーマ

Chamilo は、管理画面（**Admin > Color Themes**）から直接設定できるカラーテーマシステムをサポートしています。保存された各テーマは、`var/themes/` 配下の専用ディレクトリにファイルを書き出します。

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS custom properties for the full color palette
    ├── default.css      # Optional additional custom CSS rules
    ├── learnpath.css    # Learning path-specific overrides
    ├── tiny-settings.js # TinyMCE editor color palette settings
    └── images/          # Theme images (logo, favicon, backgrounds, PWA icons)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Background images, admin block images, etc.
```

`colors.css` は CSS カスタムプロパティを `rgb()` 値ではなく、スペース区切りの RGB チャネル三組として定義します。これにより、追加設定なしで Tailwind が不透明度バリアント（例: `bg-primary/50`）を合成できます。

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

テーマレイヤーはコンパイル済みの Tailwind/SCSS バンドルの上に載ります。ブラウザはメインスタイルシートの後に `colors.css` を読み込むため、テーマの変更はビルド手順なしで直ちに反映されます。