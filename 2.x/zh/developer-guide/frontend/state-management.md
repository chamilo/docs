# 状态管理

Chamilo 同时使用两种状态管理库：

* **Pinia** — 所有新存储的当前标准。代码库的大部分使用 Pinia。
* **Vuex** — 遗留存储，仍然存在并被旧视图使用。新代码应使用 Pinia。

## Pinia 存储

Pinia 存储直接位于 `assets/vue/store/` 中：

| 存储文件 | 可组合函数 | 用途 |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | 认证用户，登录/登出，会话检查 |
| `cidReq.js` | `useCidReqStore` | 当前课程/会话上下文（课程 ID，会话 ID） |
| `courseSettingStore.js` | `useCourseSettings` | 课程级设置缓存 |
| `enrolledStore.js` | `useEnrolledStore` | 用户注册数据 |
| `platformConfig.js` | `usePlatformConfig` | 平台配置，插件，主题，OAuth2 提供商 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | 消息状态 |
| `socialStore.js` | `useSocialStore` | 社交网络状态 |

### 安全存储

```javascript
const securityStore = useSecurityStore()

// 检查用户是否已登录
if (securityStore.isAuthenticated) { ... }

// 访问当前用户对象
const user = securityStore.user
```

### CID 请求存储

跟踪当前的课程/会话上下文 — 任何课程范围的 API 操作都需要：

```javascript
const cidReqStore = useCidReqStore()

// 当前课程和会话对象
const course = cidReqStore.course
const session = cidReqStore.session
```

### 课程设置存储

缓存课程级设置以避免重复的 API 调用：

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### 平台配置存储

保存从 `/platform-config/list` 获取的平台范围配置：

```javascript
const platformConfig = usePlatformConfig()

// 加载的设置数组，活动主题，启用的插件，OAuth2 提供商
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Vuex 存储（遗留）

Vuex 存储定义在 `assets/vue/store/index.js` 中，包含：

| 模块 | 用途 |
|--------|---------|
| `modules/crud.js` | 工厂（`makeCrudModule`），为给定服务生成完整的 CRUD Vuex 模块 — 被旧的列表/创建/更新视图使用 |
| `modules/notifications.js` | 提示通知状态（显示，颜色，文本，超时） |
| `modules/ux.js` | 用户体验状态（禁止访问消息） |
| `security.js` | 遗留 Vuex 安全模块（已被 `securityStore.js` 取代） |

避免添加新的 Vuex 模块。任何新状态都应使用 Pinia。

## 可组合函数

除了存储之外，`assets/vue/composables/` 还包含共享的组合函数。值得注意的示例：

| 文件 | 用途 |
|------|---------|
| `useFileManager.js` | 文件浏览器状态和操作 |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | 顶部栏菜单连接 |
| `useTopbarTour.js` | 顶部栏的引导游览 |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | 文档工具助手 |
| `useCertificateTags.js` | 证书模板标签助手 |
| `sidebarMenu.js` | 侧边栏导航树 |
| `theme.js` | 主题加载和切换 |
| `pluginRegion.js` | 插件注入的 UI 区域渲染 |
| `userPermissions.js` | 当前用户的权限检查 |
| `notification.js` | 推送通知助手 |
| `locale.js` | 语言环境检测和切换 |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | 可重用的数据表 CRUD 模式 |
| `useSocialInfo.js` / `useSocialMenuItems.js` | 社交网络助手 |
| `usePushSubscription.js` | Web 推送订阅管理 |
| `upload.js` | 文件上传助手 |
| `useConfirmation.js` | 确认对话框助手 |

可组合函数还按功能子目录组织（`course/`、`session/`、`document/`、`calendar/`、`admin/`、`auth/`、`message/`、`skill/` 等）。完整列表位于 `assets/vue/composables/` 中。