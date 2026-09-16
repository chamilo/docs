# 术语表

本指南中使用的面向开发者的术语。

| 术语 | 定义 |
|------|-----------|
| **API Platform** | 用于构建 REST 和 GraphQL API 的 PHP 框架，与 Symfony 集成。Chamilo 用它根据 Doctrine 实体自动生成 API 端点。 |
| **Bundle** | Symfony 的组织单元，类似于插件或模块。Chamilo 有三个：CoreBundle、CourseBundle、LtiBundle。 |
| **Composable** | Vue 3 中用于提取和复用响应式逻辑的模式。存放于 `assets/vue/composables/`。 |
| **Doctrine ORM** | Chamilo 使用的 PHP 对象关系映射器。将 PHP 实体类映射到数据库表。 |
| **Entity** | 带有 Doctrine 注解属性、映射到数据库表的 PHP 类。 |
| **Encore** | Symfony Webpack Encore — 对 Webpack 的封装，用于简化前端构建配置。 |
| **Flysystem** | PHP 文件系统抽象库。Chamilo 用它支持本地、S3、Azure 和 GCS 存储。 |
| **JWT** | JSON Web Token — REST API 的身份验证机制。 |
| **Pinia** | Vue 3 推荐的状态管理库。用于 Chamilo 中的新 store；遗留的 Vuex store 仍与其并存。 |
| **PrimeVue** | Chamilo 使用的 Vue 3 UI 组件库。提供按钮、表格、对话框等。 |
| **ResourceNode** | Chamilo 资源系统中的核心实体。每一项课程内容都有一个 ResourceNode。 |
| **ResourceFile** | 表示附加到 ResourceNode 的文件的实体。通过 Flysystem 存储。 |
| **ResourceLink** | 控制在课程/学期/小组上下文中可见性与访问权限的实体。 |
| **SCORM** | Sharable Content Object Reference Model（可共享内容对象参考模型）。用于打包内容的电子学习标准。 |
| **Settings Schema** | 定义一类平台设置的 PHP 类（例如 SecuritySettingsSchema）。 |
| **Voter** | Symfony 安全组件，用于判定用户是否可以对某资源执行某操作。 |
| **Webpack** | JavaScript 模块打包器，将 Vue 组件、SCSS 和 TypeScript 编译为浏览器可用的包。 |