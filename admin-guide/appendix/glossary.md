# 词汇表

Chamilo 2.0 管理中使用的关键术语。

## 平台概念

| 术语 | 定义 |
|------|------------|
| **访问URL** | 在多URL设置中，每个访问URL是一个独立的虚拟门户，共享同一个Chamilo安装和数据库。每个URL可以有自己的品牌、用户、课程和设置。 |
| **课程** | Chamilo中的基本内容容器。课程包含学习材料、练习、论坛和其他工具。课程可以独立存在，也可以分配到会话中。 |
| **会话** | 一个或多个课程的有限时间实例。会话允许将相同的课程内容交付给不同的学习者群体，并进行独立的跟踪和独立的教练管理。 |
| **学习路径** | 内容项（文档、练习、链接、SCORM模块）的结构化序列，以定义的顺序引导学习者学习材料。 |
| **成绩簿** | 一个聚合工具，将练习、作业和其他活动的分数组合成课程的加权最终成绩。 |
| **技能** | 一种能力或徽章，可以在学习者完成特定课程、练习或达到成绩簿阈值时授予。 |
| **额外字段** | 管理员为用户、课程或会话添加的自定义数据字段，用于捕获组织特定的元数据。 |
| **插件** | 一种扩展功能，在不修改核心代码的情况下为Chamilo增加功能。插件可以添加页面、工具或集成。 |
| **目录** | 可浏览的可用课程列表，用户可以查看描述并自行注册。 |

## 用户角色

| 术语 | 定义 |
|------|------------|
| **学习者（学生）** | 默认用户角色。可以注册课程并使用内容。 |
| **教师（培训师）** | 可以创建和管理课程，添加内容并为学习者评分。 |
| **会话管理员** | 可以创建和管理会话及注册。 |
| **人力资源经理（HRM）** | 可以查看分配用户的跟踪和报告数据。 |
| **门户管理员** | 完全访问所有平台管理功能。 |
| **全局管理员** | 在多URL设置中，拥有跨所有访问URL访问权限的门户管理员。 |
| **教练/导师** | 会话级别的角色。会话教练负责监督会话中的所有课程；课程教练管理会话中的特定课程。长期来看，所有教练的称呼应改为导师。 |

## 标准和协议

| 术语 | 定义 |
|------|------------|
| **SCORM** | 可共享内容对象参考模型。一种电子学习打包标准，允许导入和跟踪课程。Chamilo支持SCORM 1.2和2004版本。 |
| **xAPI (Tin Can API)** | 一种用于跟踪学习体验的电子学习规范。比SCORM更广泛，可以记录在LMS之外发生的活动。xAPI语句存储在学习记录存储（LRS）中。 |
| **LTI** | 学习工具互操作性。IMS Global标准，允许在LMS中嵌入外部工具和内容。Chamilo作为消费者和提供者支持LTI 1.1和1.3。 |
| **SCIM** | 跨域身份管理系统。一种用于在身份提供者和应用程序之间自动进行用户配置和取消配置的标准。 |
| **OAuth2** | 一种授权框架，允许第三方应用程序代表用户访问Chamilo，而无需共享密码。用于API访问和SSO集成。 |
| **LDAP** | 轻量级目录访问协议。一种用于访问目录服务（例如Active Directory）的协议，以验证用户和同步账户数据。 |
| **CAS** | 中央认证服务。一种单点登录协议，允许用户一次认证即可访问多个应用程序。 |
| **JWT** | JSON Web Token。一种紧凑的签名令牌格式，用于API认证和会话管理。 |
| **SAML** | 安全断言标记语言。一种基于XML的标准，用于在身份提供者和服务提供者之间交换认证数据。 |

---
## 技术术语

| 术语 | 定义 |
|------|------------|
| **Symfony** | Chamilo 2.0 所基于的 PHP 框架。Symfony 提供路由、依赖注入、ORM（Doctrine）、模板引擎（Twig）以及其他基础设施。 |
| **Doctrine** | Chamilo 用于与数据库交互的对象关系映射器（ORM）。Doctrine 将 PHP 对象映射到数据库表。 |
| **Twig** | Symfony 和 Chamilo 用于渲染 HTML 的模板引擎。 |
| **Flysystem** | 一个 PHP 文件系统抽象层。Chamilo 使用 Flysystem 支持本地存储、Amazon S3、Azure Blob 和 Google Cloud Storage 的互换使用。 |
| **Composer** | PHP 依赖管理工具。用于安装和更新 Chamilo 的 PHP 库。 |
| **Mailer DSN** | 电子邮件传输的数据源名称（Data Source Name）。一个连接字符串，告诉 Symfony 如何发送电子邮件（例如通过 SMTP、Amazon SES 或 Mailjet）。 |
| **OPcache** | PHP 内置的操作码缓存。将 PHP 脚本编译为字节码并在内存中缓存，显著提高性能。 |
| **APCu** | 一个 PHP 扩展，提供用户级的内存缓存。Symfony 使用它来缓存元数据和配置。 |

## 缩写

| 缩写 | 全称 |
|---------|-----------|
| **LMS** | 学习管理系统（Learning Management System） |
| **LRS** | 学习记录存储（Learning Record Store，用于 xAPI 声明） |
| **SSO** | 单点登录（Single Sign-On） |
| **CSV** | 逗号分隔值（Comma-Separated Values，用于用户/课程导入） |
| **API** | 应用程序编程接口（Application Programming Interface） |
| **REST** | 表现状态转移（Representational State Transfer，API 架构风格） |
| **GDPR** | 通用数据保护条例（General Data Protection Regulation，欧盟数据隐私法） |
| **HSTS** | HTTP 严格传输安全（HTTP Strict Transport Security） |
| **CDN** | 内容分发网络（Content Delivery Network） |
| **DNS** | 域名系统（Domain Name System） |
| **SPF** | 发送方策略框架（Sender Policy Framework，电子邮件认证） |
| **DKIM** | 域名密钥识别邮件（DomainKeys Identified Mail，电子邮件认证） |
| **DMARC** | 基于域的消息认证、报告和一致性（Domain-based Message Authentication, Reporting, and Conformance） |