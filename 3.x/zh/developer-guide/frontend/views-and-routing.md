# 视图与路由

Chamilo 拥有大量通过 Vue Router 连接的 Vue 视图（页面级组件）。实际文件位于 `assets/vue/views/`。

## 路由器架构

路由器在 `assets/vue/router/index.js` 中定义，使用 `createWebHistory` 以获得简洁 URL。

路由是模块化的——按功能拆分为多个路由文件，再导入到主路由器中：

| 路由模块 | 页面 |
|-------------|-------|
| `admin` | 管理面板页面 |
| `sessionAdmin` | 学期管理页面 |
| `course` | 课程列表、创建、首页、目录 |
| `account` | 用户资料与设置 |
| `personalfile` | 个人文件空间 |
| `message` | 消息 / 收件箱 |
| `user` | 用户管理页面 |
| `usergroup` | 用户组（班级）页面 |
| `userreluser` | 用户关系（好友/关注）页面 |
| `ccalendarevent` | 课程日历与日程 |
| `ctoolintro` | 课程工具介绍页面 |
| `page` | 静态 CMS 页面 |
| `pageLayout` | 页面布局包装器 |
| `publicPage` | 可公开访问的页面 |
| `social` | 社交网络页面 |
| `filemanager` | 文件管理器（课程文档浏览器） |
| `skill` | 技能与能力页面 |
| `accessurl` | 多 URL（门户）管理页面 |
| `branch` | 分校 / 网络校区页面 |
| `room` | 虚拟教室页面 |
| `buycourses` | 课程购买页面 |
| `documents` | 文档管理 |
| `assignments` | 作业工作流 |
| `links` | 外部链接管理 |
| `glossary` | 术语表管理 |
| `attendance` | 考勤跟踪 |
| `lp` | 学习路径播放器与编辑器 |
| `dropbox` | 投递箱 / 文件交换 |
| `blog` | 博客页面 |
| `blogAdmin` | 博客管理 |
| `coursemaintenance` | 课程备份与还原 |
| `catalogue` | 课程与学期目录 |

## 关键路由

| 路径 | 视图 | 说明 |
|------|------|-------------|
| `/` | `AppIndex.vue`（或自定义） | 应用入口 |
| `/home` | `pages/Home.vue` | 平台首页 |
| `/login` | `pages/Login.vue` | 登录页 |
| `/courses` | `views/user/courses/List.vue` | 用户已选课程 |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | 当前学期 |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | 过往学期 |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | 即将开始的学期 |
| `/course/:id/home` | `views/course/CourseHome.vue` | 课程首页 |
| `/account/home` | `views/account/Home.vue` | 用户资料 |
| `/admin` | 管理视图 | 管理面板 |
| `/faq` | `pages/Faq.vue` | 常见问题页面 |

## 路由守卫

路由器使用导航守卫（通过 `beforeEach` 和 `afterEach` 声明）以：

* 通过 `useSecurityStore` 检查认证状态，并将未认证用户重定向到 `/login`
* 通过 `useCidReqStore` 验证课程上下文
* 在 SPA 导航期间应用页面类型 CSS 类（替代完整页面加载时 Twig 的 `PageHelper` 所做的工作）
* 支持自定义 Vue 模板覆盖——启用自定义 Vue 模板时（`var/vue_templates/pages/AppIndex.vue`），`/` 处的入口组件会替换为自定义的 `AppIndex.vue`

## 视图组织

视图位于 `assets/vue/views/`，按功能组织：

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```