# 平台设置

Chamilo 拥有一个广泛的配置系统，设置按类别组织。以下完整的类别列表与管理面板中的**配置设置**页面相对应——以及源代码中的 `SettingsCurrentFixtures.php`，这是变量名、标题和描述的真实来源。

通过点击管理面板中的**配置设置**访问平台设置。

![平台设置页面显示按功能区域组织的配置类别](/.gitbook/assets/admin-settings-categories.png)

## 所有类别

总共有 **39 个配置类别**，按字母顺序排列如下。每个链接后的数字表示该类别中的设置数量。

### 平台范围

* **[管理员身份](admin-settings.md)** (12) — 平台管理员的身份和联系方式。
* **[平台](platform-settings.md)** (29) — 平台级身份、时区、注册政策、在线用户、性能标志。
* **[显示](display-settings.md)** (24) — 主页布局、头像、菜单、品牌行为。
* **[编辑器](editor-settings.md)** (26) — 富文本编辑器（TinyMCE）工具栏、插件、AI 助手。
* **[语言](language-settings.md)** (12) — 可用语言、默认语言、备用语言。
* **[邮件](mail-settings.md)** (18) — 发件邮件布局、发件人身份、签名。
* **[工作流程](workflows-settings.md)** (23) — 跨功能的工作流程开关（课程创建、注册验证等）。

### 认证、安全与隐私

* **[安全](security-settings.md)** (31) — 登录保护、密码政策、头部信息、双重认证、入侵检测系统。
* **[注册](registration-settings.md)** (20) — 自助注册政策和注册后重定向。
* **[隐私](privacy-settings.md)** (6) — 同意、数据导出、账户删除请求。
* **[CAS](cas-settings.md)** (7) — 从 1.x 版本继承的旧版 CAS 配置。

### 课程和会话生命周期

* **[课程](course-settings.md)** (45) — 适用于平台范围内课程的默认值和政策。
* **[会话](session-settings.md)** (68) — 会话生命周期、教练访问窗口、可见性。
* **[课程目录](catalog-settings.md)** (13) — 公共课程目录的行为。
* **[个人资料](profile-settings.md)** (29) — 用户个人资料上显示的字段。

### 课程工具

* **[日程](agenda-settings.md)** (11)
* **[公告](announcement-settings.md)** (9)
* **[作业（作品）](work-settings.md)** (12)
* **[考勤](attendance-settings.md)** (4)
* **[聊天](chat-settings.md)** (5)
* **[文档](document-settings.md)** (29)
* **[文件共享](dropbox-settings.md)** (8)
* **[练习（测试）](exercise-settings.md)** (63)
* **[论坛](forum-settings.md)** (9)
* **[词汇表](glossary-settings.md)** (3)
* **[小组](group-settings.md)** (3)
* **[学习路径](lp-settings.md)** (51)
* **[调查](survey-settings.md)** (12)

### 评估与认可

* **[成绩簿（评估）](gradebook-settings.md)** (34) — 成绩显示、小数点、证书门槛。
* **[证书](certificate-settings.md)** (9) — 学习者获得证书时应用的默认设置。
* **[技能](skill-settings.md)** (13) — 技能树、授予规则、个人资料整合。
* **[跟踪](tracking-settings.md)** (10) — 记录内容、暴露的报告。

### 沟通与社区

* **[消息](message-settings.md)** (7)
* **[社交网络](social-settings.md)** (7)

### 人工智能

* **[AI 助手](ai-helpers-settings.md)** (13) — 按任务类型（文本、图像、视频、导师、评分）划分的提供商。

### 运营与集成

* **[定时任务](crons-settings.md)** (3)
* **[搜索](search-settings.md)** (3) — Xapian 全文搜索配置。
* **[工单](ticket-settings.md)** (7) — 帮助台系统。
* **[Web 服务](webservice-settings.md)** (7) — 旧版 SOAP/REST 端点。

## 设置如何工作

* 设置存储在数据库中（`settings` 表）并通过 Web 界面管理。
* 在多 URL 设置中，某些设置是 **URL 锁定的**（它们的值在平台范围内适用，无法按 URL 覆盖 - 参见 `settings` 表中的 `access_url_locked` 和 `access_url_changeable` 列）；其他设置（大多数）可以按访问 URL 覆盖。
* 更改立即生效（无需重启服务器），尽管您的用户会话可能会将某些设置保留在内存中。如果更改未立即反映，请退出并重新登录以刷新会话。
* 某些设置具有依赖关系——更改一个可能会影响其他设置的行为。
* 每个页面上显示的变量名（例如 `2fa_enable`）与 `settings` 数据库表中的行（`variable` 列）以及覆盖文件（`config/settings_overrides.yaml`）中使用的键（如果适用）相匹配。

更多信息，请查看我们 wiki 上的 [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations)。

---
## 提示

* **记录您的设置** — 保留非默认设置的记录以及更改它们的原因
* **一次只更改一项设置** — 在排查问题时，一次只修改一个设置，以便您可以识别其效果
* **在预发布环境中测试** — 对于重要的设置更改，请先在预发布服务器上进行测试