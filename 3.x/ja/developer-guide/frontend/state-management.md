# 状態管理

Chamilo は、2 つの状態管理ライブラリを併用しています。

* **Pinia** — すべての新規ストアにおける現行の標準です。コードベースの大部分は Pinia を使用しています。
* **Vuex** — レガシーなストアであり、依然として存在し、古いビューで使用されています。新規コードでは Pinia を使用してください。

## Pinia ストア

Pinia ストアは `assets/vue/store/` に直接配置されています。

| ストアファイル | Composable | 用途 |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | 認証済みユーザー、ログイン／ログアウト、セッション確認 |
| `cidReq.js` | `useCidReqStore` | 現在のコース／セッションコンテキスト（コース ID、セッション ID） |
| `courseSettingStore.js` | `useCourseSettings` | コースレベルの設定キャッシュ |
| `enrolledStore.js` | `useEnrolledStore` | ユーザーの受講データ |
| `platformConfig.js` | `usePlatformConfig` | プラットフォーム設定、プラグイン、テーマ、OAuth2 プロバイダー |
| `messageRelUserStore.js` | `useMessageRelUserStore` | メッセージングの状態 |
| `socialStore.js` | `useSocialStore` | ソーシャルネットワークの状態 |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

現在のコース／セッションコンテキストを追跡します。コーススコープの API 操作には必須です。

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

コースレベルの設定をキャッシュし、API 呼び出しの繰り返しを避けます。

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

`/platform-config/list` から取得したプラットフォーム全体の設定を保持します。

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex ストア（レガシー）

Vuex ストアは `assets/vue/store/index.js` で定義され、次の内容を含みます。

| モジュール | 用途 |
|--------|---------|
| `modules/crud.js` | 指定されたサービスに対して完全な CRUD Vuex モジュールを生成するファクトリ（`makeCrudModule`）。古い一覧／作成／更新ビューで使用 |
| `modules/notifications.js` | トースト通知の状態（表示、色、テキスト、タイムアウト） |
| `modules/ux.js` | UX の状態（アクセス禁止メッセージ） |
| `security.js` | レガシーな Vuex セキュリティモジュール（`securityStore.js` に置き換え済み） |

新しい Vuex モジュールの追加は避けてください。新しい状態には Pinia を使用してください。

## Composables

ストアに加え、`assets/vue/composables/` には共有の composition 関数が含まれています。主な例は次のとおりです。

| ファイル | 用途 |
|------|---------|
| `useFileManager.js` | ファイルブラウザーの状態と操作 |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | トップバーメニューの配線 |
| `useTopbarTour.js` | トップバー向けガイドツアー |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | ドキュメントツールのヘルパー |
| `useCertificateTags.js` | 証明書テンプレートのタグヘルパー |
| `sidebarMenu.js` | サイドバーのナビゲーションツリー |
| `theme.js` | テーマの読み込みと切り替え |
| `pluginRegion.js` | プラグインが注入する UI 領域の描画 |
| `userPermissions.js` | 現在のユーザーに対する権限チェック |
| `notification.js` | プッシュ通知のヘルパー |
| `locale.js` | ロケールの検出と切り替え |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | 再利用可能なデータテーブル CRUD パターン |
| `useSocialInfo.js` / `useSocialMenuItems.js` | ソーシャルネットワークのヘルパー |
| `usePushSubscription.js` | Web Push 購読の管理 |
| `upload.js` | ファイルアップロードのヘルパー |
| `useConfirmation.js` | 確認ダイアログのヘルパー |

Composable は機能別のサブディレクトリ（`course/`、`session/`、`document/`、`calendar/`、`admin/`、`auth/`、`message/`、`skill/` など）にも整理されています。完全な一覧は `assets/vue/composables/` にあります。