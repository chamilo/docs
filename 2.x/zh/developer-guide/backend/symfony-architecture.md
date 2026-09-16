# Symfony 架构

## 束（Bundles）

Chamilo 2.0 分为三个 Symfony 束：

### CoreBundle (`src/CoreBundle/`)

最大的束，处理平台范围内的所有事务：

* **用户和认证** — 用户实体、角色、JWT 令牌、OAuth2 提供商
* **资源系统** — ResourceNode 和 ResourceFile（统一的内容抽象）
* **平台设置** — 位于 `src/CoreBundle/Settings/` 的设置模式，涵盖每个可配置的方面
* **管理** — 用于用户、课程、会话和插件管理的管理员控制器
* **AI 提供商** — 针对 OpenAI、Gemini、Mistral、DeepSeek、Grok 的工厂模式
* **文件存储** — 基于 Flysystem 的存储适配器（本地、S3、Azure、GCS）
* **安全** — 投票者、访问控制、角色层级
* **工具** — 通过工具系统注册的课程工具定义

### CourseBundle (`src/CourseBundle/`)

与课程内容相关的所有内容：

* **内容实体** — 101 个实体，涵盖文档、练习、学习路径、论坛、词汇表、调查、考勤、博客、作业等
* **课程复制** — 支持 Common Cartridge 1.3 和 Moodle 格式的导入/导出
* **课程设置** — 课程级别的设置模式

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 标准实现：

* **平台和工具注册** — 管理外部工具连接
* **启动处理** — LTI 启动流程控制器
* **成绩回传** — 将外部工具的成绩返回到 Chamilo

## 服务容器

Chamilo 使用 Symfony 的依赖注入容器。服务配置在：

* `config/services.yaml` — 全局服务定义
* 每个束的 `DependencyInjection/` 目录 — 特定束的服务

## 安全架构

安全系统配置在 `config/packages/security.yaml` 中：

* **密码哈希** — 支持 bcrypt（默认），并从旧版的 SHA1 和 MD5 迁移
* **角色层级** — 18 个角色按层级组织（ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER；其他角色包括 ROLE_HR、ROLE_INVITEE、ROLE_STUDENT_BOSS、ROLE_SESSION_MANAGER、ROLE_QUESTION_MANAGER）
* **上下文敏感角色** — 课程级别的角色（ROLE_CURRENT_COURSE_TEACHER、ROLE_CURRENT_COURSE_STUDENT）根据注册情况在每次请求时计算
* **防火墙** — API 使用 JWT 认证，Web 界面使用基于会话的认证
* **投票者** — 通过 Symfony 投票者实现资源级别的访问控制

## 遗留代码

某些功能仍然使用位于 `public/main/` 的遗留 PHP 代码：

* 练习渲染和交互
* 学习路径播放器
* 一些管理工具

这些功能正在逐步迁移到 Symfony+Vue 架构。遗留页面通过一个兼容层提供服务，该兼容层启动了 Symfony 内核。