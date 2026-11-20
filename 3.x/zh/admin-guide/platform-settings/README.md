# 平台设置

Chamilo 拥有一套按类别组织的完善配置系统。下文所列的全部类别与管理面板中的 **配置设置** 页面一致，也与源代码中作为变量名、标题和描述权威来源的 `SettingsCurrentFixtures.php` 相对应。

在管理面板中点击 **配置设置** 即可访问平台设置。

![按功能区域组织配置类别的平台设置页面](/.gitbook/assets/admin-settings-categories.png)

## 全部类别

共有 **39 个配置类别**，按字母顺序列于下方。每个链接后的数字为该类别中的设置项数量。

### 平台范围

* **[管理员身份](admin-settings.md)** (12) — 平台管理员的身份与联系信息。
* **[平台](platform-settings.md)** (29) — 平台级身份、时区、注册策略、在线用户、性能标志。
* **[显示](display-settings.md)** (24) — 首页布局、gravatar、菜单、品牌行为。
* **[编辑器](editor-settings.md)** (26) — 富文本编辑器（TinyMCE）工具栏、插件、AI 助手。
* **[语言](language-settings.md)** (12) — 可用语言、默认语言、回退语言。
* **[邮件](mail-settings.md)** (18) — 外发邮件布局、发件人身份、签名。
* **[工作流](workflows-settings.md)** (23) — 跨领域工作流开关（课程创建、注册审核等）。

### 认证、安全与隐私

* **[安全](security-settings.md)** (31) — 登录保护、密码策略、响应头、2FA、IDS。
* **[注册](registration-settings.md)** (20) — 自助注册策略及注册后的跳转。
* **[隐私](privacy-settings.md)** (6) — 同意、数据导出、账户删除请求。
* **[CAS](cas-settings.md)** (7) — 从 1.x 沿用的旧版 CAS 配置。

### 课程与学期生命周期

* **[课程](course-settings.md)** (45) — 适用于全平台课程的默认值与策略。
* **[学期](session-settings.md)** (68) — 学期生命周期、导师访问窗口、可见性。
* **[课程目录](catalog-settings.md)** (13) — 公开课程目录的行为。
* **[个人资料](profile-settings.md)** (29) — 用户个人资料中显示哪些字段。

### 课程工具

* **[日程](agenda-settings.md)** (11)
* **[公告](announcement-settings.md)** (9)
* **[作业（Work）](work-settings.md)** (12)
* **[考勤](attendance-settings.md)** (4)
* **[聊天](chat-settings.md)** (5)
* **[文档](document-settings.md)** (29)
* **[投递箱](dropbox-settings.md)** (8)
* **[练习（测验）](exercise-settings.md)** (63)
* **[论坛](forum-settings.md)** (9)
* **[术语表](glossary-settings.md)** (3)
* **[小组](group-settings.md)** (3)
* **[学习路径](lp-settings.md)** (51)
* **[问卷](survey-settings.md)** (12)

### 评估与认证

* **[成绩册（评估）](gradebook-settings.md)** (34) — 分数显示、小数位、证书阈值。
* **[证书](certificate-settings.md)** (9) — 学习者获得证书时应用的默认值。
* **[技能](skill-settings.md)** (13) — 技能树、授予规则、个人资料集成。
* **[跟踪](tracking-settings.md)** (10) — 记录哪些数据、对外提供哪些报表。

### 沟通与社区

* **[消息](message-settings.md)** (7)
* **[社交网络](social-settings.md)** (7)

### AI

* **[AI 助手](ai-helpers-settings.md)** (13) — 按任务类型（文本、图像、视频、辅导、评分）配置提供商。

### 运维与集成

* **[定时任务](crons-settings.md)** (3)
* **[搜索](search-settings.md)** (3) — Xapian 全文搜索配置。
* **[工单](ticket-settings.md)** (7) — 帮助台系统。
* **[Web 服务](webservice-settings.md)** (7) — 旧版 SOAP/REST 端点。

## 设置如何工作

* 设置存储在数据库（`settings` 表）中，并通过 Web 界面进行管理
* 在多 URL 部署中，部分设置为 **URL 锁定**（其值适用于整个平台，无法按 URL 覆盖——参见 `settings` 表中的 `access_url_locked` 与 `access_url_changeable` 列）；其余（大多数）可按访问 URL 覆盖
* 更改立即生效（无需重启服务器），但用户会话可能仍在内存中保留部分旧值。若更改未立即体现，请退出并重新登录以刷新会话。
* 部分设置存在依赖关系——更改一项可能影响其他项的行为
* 各页面上显示的变量名（例如 `2fa_enable`）与 `settings` 数据库表中的行（`variable` 列）以及覆盖配置（`config/settings_overrides.yaml`）中使用的键（如适用）一致。

更多信息请参阅我们 wiki 上的 [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations)。

## 提示

* **记录您的设置** — 保留非默认设置及其更改原因的记录
* **一次只改一项** — 排查问题时，每次只修改一项设置，以便识别其影响
* **在预发布环境中测试** — 对于重大设置更改，请先在预发布服务器上测试