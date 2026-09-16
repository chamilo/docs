# Symfony 架构

## Bundles

Chamilo 3.0 由三个 Symfony bundle 构成：

### CoreBundle (`src/CoreBundle/`)

规模最大的 bundle，负责所有平台级事务：

* **用户与认证** — User 实体、角色、JWT 令牌、OAuth2 提供方
* **资源系统** — ResourceNode 与 ResourceFile（统一的内容抽象）
* **平台设置** — `src/CoreBundle/Settings/` 中的设置模式，覆盖所有可配置项
* **管理** — 用于用户、课程、学期与插件管理的 Admin 控制器
* **AI 提供方** — 面向 OpenAI、Gemini、Mistral、DeepSeek、Grok 的工厂模式
* **文件存储** — 基于 Flysystem 的存储适配器（本地、S3、Azure、GCS）
* **安全** — Voter、访问控制、角色层级
* **工具** — 通过工具系统注册的课程工具定义

### CourseBundle (`src/CourseBundle/`)

与课程内容相关的全部功能：

* **内容实体** — 101 个实体，涵盖文档、练习、学习路径、论坛、术语表、问卷、考勤、博客、作业等
* **课程复制** — 导入/导出，支持 Common Cartridge 1.3 与 Moodle 格式
* **课程设置** — 课程级设置模式

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 标准实现：

* **平台与工具注册** — 管理外部工具连接
* **启动处理** — LTI 启动流程控制器
* **成绩回传** — 将外部工具的成绩回传到 Chamilo

## 服务容器

Chamilo 使用 Symfony 的依赖注入容器。服务配置位于：

* `config/services.yaml` — 全局服务定义
* 各 bundle 的 `DependencyInjection/` 目录 — bundle 专用服务

## 安全架构

安全系统在 `config/packages/security.yaml` 中配置：

* **密码哈希** — 支持 bcrypt（默认），并支持从旧版 SHA1 与 MD5 迁移
* **角色层级** — 18 个按层级组织的角色（ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER；其他角色包括 ROLE_HR、ROLE_INVITEE、ROLE_STUDENT_BOSS、ROLE_SESSION_MANAGER、ROLE_QUESTION_MANAGER）
* **上下文相关角色** — 课程级角色（ROLE_CURRENT_COURSE_TEACHER、ROLE_CURRENT_COURSE_STUDENT）根据选课情况按请求计算
* **防火墙** — API 使用 JWT 认证，Web 界面使用基于会话的认证
* **Voter** — 通过 Symfony voter 实现资源级访问控制

## 遗留代码

部分功能仍使用 `public/main/` 中的遗留 PHP 代码：

* 练习渲染与交互
* 学习路径播放器
* 部分管理工具

这些功能正逐步迁移到 Symfony+Vue 架构。遗留页面通过兼容层提供服务，该层会引导启动 Symfony 内核。