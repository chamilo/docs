# 视图与路由

Chamilo 拥有一套庞大的 Vue 视图（页面级组件），通过 Vue Router 进行连接。实际文件位于 `assets/vue/views/` 目录下。

## 路由架构

路由定义在 `assets/vue/router/index.js` 中，使用 `createWebHistory` 来实现简洁的 URL。

路由是模块化的——按功能组织成独立的路由文件，并导入到主路由中：

| 路由模块 | 页面 |
|-------------|-------|
| `admin` | 管理面板页面 |
| `sessionAdmin` | 会话管理页面 |
| `course` | 课程列表、创建、主页、目录 |
| `account` | 用户资料和设置 |
| `personalfile` | 个人文件空间 |
| `message` | 消息/收件箱 |
| `user` | 用户管理页面 |
| `usergroup` | 用户组（班级）页面 |
| `userreluser` | 用户关系（好友/关注）页面 |
| `ccalendarevent` | 课程日历和议程 |
| `ctoolintro` | 课程工具介绍页面 |
| `page` | 静态 CMS 页面 |
| `pageLayout` | 页面布局包装器 |
| `publicPage` | 公开访问页面 |
| `social` | 社交网络页面 |
| `filemanager` | 文件管理器（课程文档浏览器） |
| `skill` | 技能和能力页面 |
| `accessurl` | 多 URL（门户）管理页面 |
| `branch` | 分支/网络校区页面 |
| `room` | 虚拟房间页面 |
| `buycourses` | 课程购买页面 |
| `documents` | 文档管理 |
| `assignments` | 作业流程 |
| `links` | 外部链接管理 |
| `glossary` | 词汇表管理 |
| `attendance` | 出勤跟踪 |
| `lp` | 学习路径播放器和编辑器 |
| `dropbox` | Dropbox / 文件交换 |
| `blog` | 博客页面 |
| `blogAdmin` | 博客管理 |
| `coursemaintenance` | 课程备份和恢复 |
| `catalogue` | 课程和会话目录 |

## 关键路由

| 路径 | 视图 | 描述 |
|------|------|-------------|
| `/` | `AppIndex.vue`（或自定义） | 应用入口点 |
| `/home` | `pages/Home.vue` | 平台主页 |
| `/login` | `pages/Login.vue` | 登录页面 |
| `/courses` | `views/user/courses/List.vue` | 用户已注册的课程 |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | 当前会话 |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | 过去的会话 |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | 即将到来的会话 |
| `/course/:id/home` | `views/course/CourseHome.vue` | 课程主页 |
| `/account/home` | `views/account/Home.vue` | 用户资料 |
| `/admin` | 管理视图 | 管理面板 |
| `/faq` | `pages/Faq.vue` | 常见问题页面 |

## 路由守卫

路由使用导航守卫（通过 `beforeEach` 和 `afterEach` 声明）来：

* 通过 `useSecurityStore` 检查认证状态，并将未认证用户重定向到 `/login`
* 通过 `useCidReqStore` 验证课程上下文
* 在 SPA 导航期间应用页面类型 CSS 类（替代 Twig 的 `PageHelper` 在完整页面加载时所做的工作）
* 支持自定义 Vue 模板覆盖——当启用自定义 Vue 模板时，入口组件 `/` 将被替换为自定义的 `AppIndex.vue`（`var/vue_templates/pages/AppIndex.vue`）

## 视图组织

视图位于 `assets/vue/views/` 中，按功能组织：

```
views/
├── account/          # 用户资料和设置
├── admin/            # 管理页面
├── assignments/      # 作业提交和评分
├── attendance/       # 出勤表
├── blog/             # 博客文章和评论
├── branch/           # 网络校区管理
├── buycourses/       # 课程购买流程
├── ccalendarevent/   # 课程日历
├── course/           # 课程列表、主页、创建、目录
├── coursecategory/   # 课程类别管理
├── coursemaintenance/# 课程备份/恢复
├── ctoolintro/       # 工具介绍页面
├── documents/        # 文档列表、创建、媒体生成
├── dropbox/          # Dropbox / 文件交换
├── filemanager/      # 文件浏览器
├── glossary/         # 词汇表列表和术语管理
├── links/            # 外部链接
├── lp/               # 学习路径播放器和编辑器
├── message/          # 收件箱和消息
├── page/             # CMS 静态页面
├── pageLayout/       # 页面布局包装器
├── personalfile/     # 个人文件空间
├── room/             # 虚拟房间
├── sessionadmin/     # 会话管理
├── skill/            # 技能和能力
├── social/           # 社交网络
├── terms/            # 服务条款
├── user/             # 用户管理和课程/会话列表
├── usergroup/        # 用户组（班级）
└── userreluser/      # 用户关系（好友/关注）
```