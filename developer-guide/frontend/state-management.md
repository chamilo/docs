# 状態管理

Chamiloでは、2つの状態管理ライブラリが並行して使用されています：

- **Pinia** — 新しいすべてのストアの現在の標準。コードベースの大部分がPiniaを使用しています。
- **Vuex** — レガシーストアで、古いビューで依然として使用されています。新しいコードではPiniaを使用する必要があります。

## Piniaストア

Piniaストアは`assets/vue/store/`に直接配置されています：

| ストアファイル | コンポーザブル | 目的 |
|------------------|------------|------------|
| `securityStore.js` | `useSecurityStore` | 認証済みユーザー、ログイン/ログアウト、セッション確認 |
| `cidReq.js` | `useCidReqStore` | 現在のコース/セッションのコンテキスト（コースID、セッションID） |
| `courseSettingStore.js` | `useCourseSettings` | コースレベルの設定キャッシュ |
| `enrolledStore.js` | `useEnrolledStore` | ユーザーの登録データ |
| `platformConfig.js` | `usePlatformConfig` | プラットフォーム設定、プラグイン、テーマ、OAuth2プロバイダ |
| `messageRelUserStore.js` | `useMessageRelUserStore` | メッセージの状態 |
| `socialStore.js` | `useSocialStore` | ソーシャルネットワークの状態 |

### セキュリティストア

```javascript
const securityStore = useSecurityStore()

// ユーザーがログインしているか確認
if (securityStore.isAuthenticated) { ... }

// 現在のユーザーオブジェクトにアクセス
const user = securityStore.user
```

### CIDリクエストストア

現在のコース/セッションのコンテキストを追跡します — コース範囲内のAPI操作に必要です：

```javascript
const cidReqStore = useCidReqStore()

// 現在のコースおよびセッションオブジェクト
const course = cidReqStore.course
const session = cidReqStore.session
```

### コース設定ストア

コースレベルの設定をキャッシュして、APIの繰り返し呼び出しを防ぎます：

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### プラットフォーム設定ストア

`/platform-config/list`から取得したグローバルプラットフォーム設定を含みます：

```javascript
const platformConfig = usePlatformConfig()

// 読み込まれた設定配列、アクティブなテーマ、有効なプラグイン、OAuth2プロバイダ
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuexストア（レガシー）

Vuexストアは`assets/vue/store/index.js`に定義されており、以下を含みます：

| モジュール | 目的 |
|--------|------------|
| `modules/crud.js` | 特定のサービスに対して完全なVuex CRUDモジュールを生成するファクトリ（`makeCrudModule`） — 古いリスト/作成/更新ビューで使用 |
| `modules/notifications.js` | トースト通知の状態（表示、色、テキスト、タイムアウト） |
| `modules/ux.js` | UXの状態（アクセス禁止メッセージ） |
| `security.js` | レガシーVuexセキュリティモジュール（`securityStore.js`に置き換え済み） |

新しいVuexモジュールを追加することは避けてください。新しい状態にはPiniaを使用してください。

## コンポーザブル

ストアに加えて、`assets/vue/composables/`には共有されるコンポジション関数が含まれています。注目すべき例：

| ファイル | 目的 |
|---------|------------|
| `useFileManager.js` | ファイルブラウザの状態と操作 |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | トップバーメニューの接続 |
| `useTopbarTour.js` | トップバーのガイド付きツアー |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | ドキュメントツールのヘルパー |
| `useCertificateTags.js` | 証明書テンプレートタグのヘルパー |
| `sidebarMenu.js` | サイドバーナビゲーションのツリー |
| `theme.js` | テーマの読み込みと切り替え |
| `pluginRegion.js` | プラグインによって注入されたUI領域のレンダリング |
| `userPermissions.js` | 現在のユーザーの権限確認 |
| `notification.js` | プッシュ通知のヘルパー |
| `locale.js` | ロケールの検出と切り替え |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | データテーブルの再利用可能なCRUDパターン |
| `useSocialInfo.js` / `useSocialMenuItems.js` | ソーシャルネットワークのヘルパー |
| `usePushSubscription.js` | Webプッシュサブスクリプションの管理 |
| `upload.js` | ファイルアップロードのヘルパー |
| `useConfirmation.js` | 確認ダイアログのヘルパー |

コンポーザブルは機能別サブディレクトリ（`course/`、`session/`、`document/`、`calendar/`、`admin/`、`auth/`、`message/`、`skill/`など）にも整理されています。完全なリストは`assets/vue/composables/`にあります。