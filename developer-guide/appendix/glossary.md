# 术语表

本指南中使用的面向开发者的术语。

| 术语 | 定义 |
|------|-----------|
| **API Platform** | 一个用于构建 REST 和 GraphQL API 的 PHP 框架，与 Symfony 集成。Chamilo 使用它从 Doctrine 实体自动生成 API 端点。 |
| **Bundle** | Symfony 中的一种组织单位，类似于插件或模块。Chamilo 有三个：CoreBundle、CourseBundle、LtiBundle。 |
| **Composable** | Vue 3 中的一种模式，用于提取和重用响应式逻辑。存储在 `assets/vue/composables/` 中。 |
| **Doctrine ORM** | Chamilo 使用的 PHP 对象关系映射器。将 PHP 实体类映射到数据库表。 |
| **Entity** | 一个使用 Doctrine 属性注解的 PHP 类，映射到数据库表。 |
| **Encore** | Symfony Webpack Encore —— 一个围绕 Webpack 的封装，简化前端构建配置。 |
| **Flysystem** | 一个 PHP 文件系统抽象库。Chamilo 使用它支持本地、S3、Azure 和 GCS 存储。 |
| **JWT** | JSON Web Token —— REST API 的认证机制。 |
| **Pinia** | Vue 3 推荐的状态管理库。Chamilo 中用于新的存储；旧的 Vuex 存储与之并存。 |
| **PrimeVue** | Chamilo 使用的 Vue 3 UI 组件库。提供按钮、表格、对话框等。 |
| **ResourceNode** | Chamilo 资源系统中的核心实体。每个课程内容都对应一个 ResourceNode。 |
| **ResourceFile** | 表示附加到 ResourceNode 的文件的实体。通过 Flysystem 存储。 |
| **ResourceLink** | 控制课程/会话/组上下文中的可见性和访问权限的实体。 |
| **SCORM** | 可共享内容对象参考模型。一种用于打包内容的电子学习标准。 |
| **Settings Schema** | 定义平台设置类别的 PHP 类（例如，SecuritySettingsSchema）。 |
| **Voter** | Symfony 安全组件，决定用户是否可以对资源执行操作。 |
| **Webpack** | JavaScript 模块打包工具，将 Vue 组件、SCSS 和 TypeScript 编译成浏览器可用的包。 |