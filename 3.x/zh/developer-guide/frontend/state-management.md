# 状态管理

Chamilo 同时使用两套状态管理库：

* **Pinia** — 所有新 store 的现行标准。代码库中的大部分内容使用 Pinia。
* **Vuex** — 遗留 store，仍存在并由较旧的视图使用。新代码应使用 Pinia。

## Pinia Stores

Pinia stores 直接位于 `assets/vue/store/`：

| Store 文件 | Composable | 用途 |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | 已认证用户、登录/登出、会话检查 |
| `cidReq.js` | `useCidReqStore` | 当前课程/学期上下文（课程 ID、学期 ID） |
| `courseSettingStore.js` | `useCourseSettings` | 课程级设置缓存 |
| `enrolledStore.js` | `useEnrolledStore` | 用户选课数据 |
| `platformConfig.js` | `usePlatformConfig` | 平台配置、插件、主题、OAuth2 提供方 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | 消息状态 |
| `socialStore.js` | `useSocialStore` | 社交网络状态 |

### Security Store

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### CID Request Store

跟踪当前课程/学期上下文 — 任何课程范围内的 API 操作都需要：

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Course Settings Store

缓存课程级设置，以避免重复的 API 调用：

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Platform Config Store

保存从 `/platform-config/list` 获取的平台级配置：

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex Store（遗留）

Vuex store 定义在 `assets/vue/store/index.js` 中，包含：

| 模块 | 用途 |
|--------|---------|
| `modules/crud.js` | 工厂（`makeCrudModule`），为给定服务生成完整的 CRUD Vuex 模块 — 由较旧的列表/创建/更新视图使用 |
| `modules/notifications.js` | Toast 通知状态（显示、颜色、文本、超时） |
| `modules/ux.js` | UX 状态（禁止访问消息） |
| `security.js` | 遗留 Vuex 安全模块（已被 `securityStore.js` 取代） |

避免添加新的 Vuex 模块。任何新状态都应使用 Pinia。

## Composables

除 stores 外，`assets/vue/composables/` 包含共享的组合式函数。值得注意的示例：

| 文件 | 用途 |
|------|---------|
| `useFileManager.js` | 文件浏览器状态与操作 |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | 顶栏菜单接线 |
| `useTopbarTour.js` | 顶栏引导式导览 |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | 文档工具辅助函数 |
| `useCertificateTags.js` | 证书模板标签辅助函数 |
| `sidebarMenu.js` | 侧边栏导航树 |
| `theme.js` | 主题加载与切换 |
| `pluginRegion.js` | 插件注入的 UI 区域渲染 |
| `userPermissions.js` | 当前用户的权限检查 |
| `notification.js` | 推送通知辅助函数 |
| `locale.js` | 区域设置检测与切换 |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | 可复用的数据表 CRUD 模式 |
| `useSocialInfo.js` / `useSocialMenuItems.js` | 社交网络辅助函数 |
| `usePushSubscription.js` | Web Push 订阅管理 |
| `upload.js` | 文件上传辅助函数 |
| `useConfirmation.js` | 确认对话框辅助函数 |

Composables 还按功能组织到子目录中（`course/`、`session/`、`document/`、`calendar/`、`admin/`、`auth/`、`message/`、`skill/` 等）。完整列表见 `assets/vue/composables/`。