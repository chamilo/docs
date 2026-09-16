# 狀態管理

Chamilo 同時使用兩套狀態管理函式庫：

* **Pinia** — 所有新 store 的現行標準。程式碼庫中大多數皆使用 Pinia。
* **Vuex** — 舊版 store，仍存在並由較舊的視圖使用。新程式碼應使用 Pinia。

## Pinia Stores

Pinia stores 直接位於 `assets/vue/store/`：

| Store 檔案 | Composable | 用途 |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | 已驗證使用者、登入／登出、工作階段檢查 |
| `cidReq.js` | `useCidReqStore` | 目前課程／工作階段脈絡（課程 ID、工作階段 ID） |
| `courseSettingStore.js` | `useCourseSettings` | 課程層級設定快取 |
| `enrolledStore.js` | `useEnrolledStore` | 使用者選課資料 |
| `platformConfig.js` | `usePlatformConfig` | 平台組態、外掛、主題、OAuth2 提供者 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | 訊息狀態 |
| `socialStore.js` | `useSocialStore` | 社交網路狀態 |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

追蹤目前課程／工作階段脈絡 — 任何以課程為範圍的 API 操作皆需要：

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

快取課程層級設定，以避免重複的 API 呼叫：

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

保存自 `/platform-config/list` 取得的全平台組態：

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store（舊版）

Vuex store 定義於 `assets/vue/store/index.js`，並包含：

| 模組 | 用途 |
|--------|---------|
| `modules/crud.js` | 工廠（`makeCrudModule`），為指定服務產生完整 CRUD Vuex 模組 — 由較舊的列表／建立／更新視圖使用 |
| `modules/notifications.js` | Toast 通知狀態（顯示、顏色、文字、逾時） |
| `modules/ux.js` | UX 狀態（禁止存取訊息） |
| `security.js` | 舊版 Vuex 安全性模組（已由 `securityStore.js` 取代） |

避免新增 Vuex 模組。任何新狀態請使用 Pinia。

## Composables

除 stores 外，`assets/vue/composables/` 包含共用的 composition 函式。值得注意的範例：

| 檔案 | 用途 |
|------|---------|
| `useFileManager.js` | 檔案瀏覽器狀態與操作 |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | 頂列選單接線 |
| `useTopbarTour.js` | 頂列導覽教學 |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | 文件工具輔助函式 |
| `useCertificateTags.js` | 證書範本標籤輔助函式 |
| `sidebarMenu.js` | 側邊欄導覽樹 |
| `theme.js` | 主題載入與切換 |
| `pluginRegion.js` | 外掛注入的 UI 區域渲染 |
| `userPermissions.js` | 目前使用者的權限檢查 |
| `notification.js` | 推播通知輔助函式 |
| `locale.js` | 語系偵測與切換 |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | 可重用的資料表 CRUD 模式 |
| `useSocialInfo.js` / `useSocialMenuItems.js` | 社交網路輔助函式 |
| `usePushSubscription.js` | Web Push 訂閱管理 |
| `upload.js` | 檔案上傳輔助函式 |
| `useConfirmation.js` | 確認對話框輔助函式 |

Composables 亦依功能整理至子目錄（`course/`、`session/`、`document/`、`calendar/`、`admin/`、`auth/`、`message/`、`skill/` 等）。完整清單位於 `assets/vue/composables/`。