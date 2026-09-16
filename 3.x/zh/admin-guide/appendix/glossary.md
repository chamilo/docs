# 术语表

Chamilo 3.0 管理中使用的关键术语。

## 平台概念

| 术语 | 定义 |
|------|------------|
| **Access URL** | 在多 URL 部署中，每个 Access URL 是一个独立的虚拟门户，共享同一套 Chamilo 安装与数据库。每个 URL 可拥有各自的品牌形象、用户、课程与设置。 |
| **课程（Course）** | Chamilo 中的基本内容容器。课程容纳学习材料、练习、论坛及其他工具。课程可独立存在，也可分配到学期（Session）。 |
| **学期（Session）** | 一门或多门课程的有时限实例。学期允许将同一课程内容交付给不同学习者群体，并具备独立跟踪与独立辅导教师。 |
| **学习路径（Learning path）** | 内容项（文档、练习、链接、SCORM 模块）的结构化序列，按既定顺序引导学习者学习材料。 |
| **成绩册（Gradebook）** | 将练习、作业及其他活动的分数汇总为课程加权最终成绩的聚合工具。 |
| **技能（Skill）** | 可在完成特定课程、练习或达到成绩册阈值后授予学习者的能力或徽章。 |
| **扩展字段（Extra field）** | 由管理员为用户、课程或学期添加的自定义数据字段，用于采集组织特有的元数据。 |
| **插件（Plugin）** | 在不修改核心代码的情况下为 Chamilo 增加功能的扩展。插件可添加页面、工具或集成。 |
| **目录（Catalog）** | 可供浏览的可用课程列表，用户可查看描述并自行注册。 |

## 用户角色

| 术语 | 定义 |
|------|------------|
| **学习者（学生）** | 默认用户角色。可注册课程并使用内容。 |
| **教师（培训师）** | 可创建与管理课程、添加内容并为学习者评分。 |
| **学期管理员** | 可创建与管理学期及注册。 |
| **人力资源经理（HRM）** | 可查看所分配用户的跟踪与报告数据。 |
| **门户管理员** | 拥有全部平台管理功能的完整访问权限。 |
| **全局管理员** | 在多 URL 部署中可跨所有 Access URL 进行管理的门户管理员。 |
| **辅导教师（Tutor）** | 学期级角色。学期辅导教师监督学期内的全部课程；课程辅导教师管理学期内的某一门课程。在 3.0 之前的 Chamilo 版本中称为“coach”。 |

## 标准与协议

| 术语 | 定义 |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model（可共享内容对象参考模型）。一种电子学习打包标准，允许导入并跟踪课程。Chamilo 支持 SCORM 1.2 与 2004。 |
| **xAPI (Tin Can API)** | 用于跟踪学习体验的电子学习规范。范围比 SCORM 更广，可记录发生在 LMS 之外的活动。xAPI 语句存储在学习记录存储（LRS）中。 |
| **LTI** | Learning Tools Interoperability（学习工具互操作）。IMS Global 标准，允许将外部工具与内容嵌入 LMS。Chamilo 作为消费者与提供者均支持 LTI 1.1 与 1.3。 |
| **SCIM** | System for Cross-domain Identity Management（跨域身份管理系统）。用于在身份提供方与应用程序之间自动完成用户开通与停用的标准。 |
| **OAuth2** | 授权框架，允许第三方应用程序代表用户访问 Chamilo 而无需共享密码。用于 API 访问与 SSO 集成。 |
| **LDAP** | Lightweight Directory Access Protocol（轻量目录访问协议）。用于访问目录服务（例如 Active Directory）以认证用户并同步账户数据的协议。 |
| **CAS** | Central Authentication Service（中央认证服务）。单点登录协议，允许用户一次认证后访问多个应用程序。 |
| **JWT** | JSON Web Token。用于 API 认证与会话管理的紧凑、已签名令牌格式。 |
| **SAML** | Security Assertion Markup Language（安全断言标记语言）。基于 XML 的标准，用于在身份提供方与服务提供方之间交换认证数据。 |

## 技术术语

| 术语 | 定义 |
|------|------------|
| **Symfony** | Chamilo 3.0 所基于的 PHP 框架。Symfony 提供路由、依赖注入、ORM（Doctrine）、模板引擎（Twig）以及其他基础设施。 |
| **Doctrine** | Chamilo 用于与数据库交互的对象关系映射器（ORM）。Doctrine 将 PHP 对象映射到数据库表。 |
| **Twig** | Symfony 与 Chamilo 用于渲染 HTML 的模板引擎。 |
| **Flysystem** | PHP 文件系统抽象层。Chamilo 使用 Flysystem，以便在本地存储、Amazon S3、Azure Blob 和 Google Cloud Storage 之间互换使用。 |
| **Composer** | PHP 依赖管理器。用于安装和更新 Chamilo 的 PHP 库。 |
| **Mailer DSN** | 邮件传输的数据源名称（Data Source Name）。这是一条连接字符串，用于告知 Symfony 如何发送电子邮件（例如通过 SMTP、Amazon SES 或 Mailjet）。 |
| **OPcache** | PHP 内置的操作码缓存。将 PHP 脚本编译为字节码并缓存在内存中，从而显著提升性能。 |
| **APCu** | 提供用户级内存缓存的 PHP 扩展。Symfony 用其缓存元数据和配置。 |

## 缩略语

| 缩略语 | 全称 |
|---------|-----------|
| **LMS** | Learning Management System（学习管理系统） |
| **LRS** | Learning Record Store（学习记录存储，用于 xAPI 语句） |
| **SSO** | Single Sign-On（单点登录） |
| **CSV** | Comma-Separated Values（逗号分隔值，用于用户/课程导入） |
| **API** | Application Programming Interface（应用程序编程接口） |
| **REST** | Representational State Transfer（表述性状态转移，API 架构风格） |
| **GDPR** | General Data Protection Regulation（欧盟《通用数据保护条例》） |
| **HSTS** | HTTP Strict Transport Security（HTTP 严格传输安全） |
| **CDN** | Content Delivery Network（内容分发网络） |
| **DNS** | Domain Name System（域名系统） |
| **SPF** | Sender Policy Framework（发件人策略框架，电子邮件身份验证） |
| **DKIM** | DomainKeys Identified Mail（域名密钥识别邮件，电子邮件身份验证） |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance（基于域的消息认证、报告与一致性） |