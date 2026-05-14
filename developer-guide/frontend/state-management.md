# 狀態管理

Chamilo 並行使用兩個狀態管理程式庫：

* **Pinia** — 所有新 store 的當前標準。大多數程式碼基底使用 Pinia。
* **Vuex** — 舊版 store，仍存在並被舊版視圖使用。新程式碼應使用 Pinia。

## Pinia Stores

Pinia stores 直接位於 `assets/vue/store/`：

| Store file | Composable | Purpose |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Authenticated user, login/logout, session check |
| `cidReq.js` | `useCidReqStore` | Current course/session context (course ID, session ID) |
| `courseSettingStore.js` | `useCourseSettings` | Course-level settings cache |
| `enrolledStore.js` | `useEnrolledStore` | User enrollment data |
| `platformConfig.js` | `usePlatformConfig` | Platform configuration, plugins, theme, OAuth2 providers |
| `messageRelUserStore.js` | `useMessageRelUserStore` | Messaging state |
| `socialStore.js` | `useSocialStore` | Social network state |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

追蹤當前課程/工作階段上下文 — 任何課程範圍 API 操作所需的：

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

快取課程層級設定以避免重複 API 呼叫：

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

持有從 `/platform-config/list` 擷取的平台範圍設定：

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store (Legacy)

Vuex store 定義於 `assets/vue/store/index.js`，並包含：

| Module | Purpose |
|--------|---------|
| `modules/crud.js` | Factory (`makeCrudModule`) that generates a full CRUD Vuex module for a given service — used by older list/create/update views |
| `modules/notifications.js` | Toast notification state (show, color, text, timeout) |
| `modules/ux.js` | UX state (forbidden-access message) |
| `security.js` | Legacy Vuex security module (superseded by `securityStore.js`) |

避免新增 Vuex 模組。任何新狀態請使用 Pinia。

## Composables

除了 stores 外，`assets/vue/composables/` 包含共享組合函數。值得注意的範例：

| File | Purpose |
|------|---------|
| `useFileManager.js` | File browser state and operations |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Top-bar menu wiring |
| `useTopbarTour.js` | Guided tour for the top bar |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Document tool helpers |
| `useCertificateTags.js` | Certificate-template tag helpers |
| `sidebarMenu.js` | Sidebar navigation tree |
| `theme.js` | Theme loading and switching |
| `pluginRegion.js` | Plugin-injected UI region rendering |
| `userPermissions.js` | Permission checks for the current user |
| `notification.js` | Push notification helpers |
| `locale.js` | Locale detection and switching |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Reusable datatable CRUD patterns |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Social network helpers |
| `usePushSubscription.js` | Web Push subscription management |
| `upload.js` | File upload helpers |
| `useConfirmation.js` | Confirmation dialog helper |

Composables 也組織成功能子目錄（`course/`、`session/`、`document/`、`calendar/`、`admin/`、`auth/`、`message/`、`skill/` 等）。完整清單位於 `assets/vue/composables/`。