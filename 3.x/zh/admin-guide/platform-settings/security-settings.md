# 安全设置

登录保护、密码策略、内容安全标头、双因素认证，以及轻量级入侵检测系统。

本页介绍安全*策略*。有关依据该策略监控平台的工具（登录尝试日志、入侵检测事件、密码强度扫描以及文件完整性检查），请参阅 [安全](../security/README.md)。

可在 **管理 > 配置设置 > 安全** 下访问这些设置。此分类包含 **32 项设置**，下方列出平台设置固件（`SettingsCurrentFixtures.php`）中随附的标题与说明。

> 代码中的变量名以等宽字体显示。通过 API 编写脚本，或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局层面更改这些设置时，请使用该名称。

## 设置

### `2fa_enable`

**启用 2FA**

在密码更新页面中增加字段，以便使用 TOTP 身份验证器应用启用 2FA。全局禁用时，用户将看不到 2FA 字段，登录时也不会被要求进行 2FA，即使其此前已启用。

*默认值：`false`*

### `access_to_personal_file_for_all`

**所有人可访问个人文件**

允许不受限制地访问所有个人文件

*默认值：`false`*


### `admins_can_set_users_pass`

**管理员可手动设置用户密码**

[推断] 启用后，管理员可直接手动设置用户密码，无需用户自行重置。

### `allow_captcha`

**验证码（CAPTCHA）**

在登录表单、注册表单和找回密码表单上启用验证码，以防密码暴力尝试

*默认值：`false`*

### `allow_online_users_by_status`

**筛选可显示为在线的用户**

将在线用户可见性限制为特定用户角色。

### `allow_strength_pass_checker`

**密码强度检查器**

启用此选项后，用户更改密码时会显示密码强度的可视化指示。这**不会**阻止弱密码被设置，仅作为视觉辅助。

*默认值：`true`*


### `anonymous_autoprovisioning`

**自动预置更多匿名用户**

动态创建新的匿名用户，以支持高访客流量。

*默认值：`false`*


### `captcha_number_mistakes_to_block_account`

**验证码错误次数上限**

用户在验证码框中可出错的次数，超过后其账户将被锁定。

### `captcha_time_to_block`

**验证码账户锁定时长**

若用户达到登录错误的最大允许次数（在使用验证码时），其账户将被锁定此分钟数。

### `check_password`

**检查密码要求**

在创建或更新密码时，启用对上文所定义密码要求的校验。

*默认值：`false`*


### `file_integrity_check_notify_admins` **v3**

**文件完整性检查通知收件人**

文件完整性扫描检测到变更时要通知的电子邮件地址列表，以逗号分隔。留空则改为通知每一位全局管理员。

### `filter_terms`

**过滤词**

给出一份术语列表，每行一项，将从网页和电子邮件中过滤。这些术语将被替换为 ***。

### `force_renew_password_at_first_login`

**首次登录强制更新密码**

这是提升门户安全性的一项简单措施：要求用户立即更改密码，使通过电子邮件传送的密码不再有效，随后使用其自行设定、且仅其本人知晓的密码。

*默认值：`false`*


### `hide_breadcrumb_if_not_allowed`

**“无权限”时隐藏面包屑**

若用户无权访问特定页面，同时隐藏面包屑。这可通过避免显示不必要的信息来提高安全性。

*默认值：`false`*


### `login_max_attempt_before_blocking_account`

**锁定前的最大登录尝试次数**

在用户账户被锁定且须由管理员解锁之前，可容忍的失败登录尝试次数。

*默认值：`0`*

### `password_requirements`

**最低密码语法要求**

定义用户密码所需的结构。示例：{"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}。使用 "specials"（复数）以要求特殊字符。

### `password_rotation_days`

**密码轮换间隔（天）**

用户必须轮换密码前的天数（0 = 禁用）。

*默认值：`0`*


### `prevent_multiple_simultaneous_login`

**防止同时登录**

防止用户使用同一账户多次连接。这对于按次付费访问的门户是较好的选项，但在测试期间可能较为受限，因为任一给定账户只能有一个浏览器连接。

*默认值：`false`*

### `proxy_settings`

**代理设置**

Chamilo 的部分功能会从服务器向外网发起连接。例如，在创建链接或在学习路径中显示嵌入页面时，用于确认外部内容是否存在。如果您的 Chamilo 服务器需要通过代理才能访问外网，应在此处进行配置。

### `security_block_inactive_users_immediately`

**立即阻止已禁用用户**

立即阻止已被管理员通过用户管理禁用的用户。否则，已被禁用的用户在注销之前仍将保留其原有权限。

*默认值：`false`*


### `security_content_policy`

**内容安全策略**

内容安全策略（Content Security Policy）是保护站点免受 XSS 攻击的有效措施。通过将已批准内容的来源列入白名单，可以阻止浏览器加载恶意资源。该设置与所见即所得编辑器配合时尤为复杂，但如果您在 child-src 声明中加入所有希望授权用于 iframe 嵌入的域名，以下示例应可适用。您可以通过在 'script-src' 参数中使用严格列表，阻止来自外部来源（包括 SVG 图像内部）的 JavaScript 执行。留空则禁用。示例设置：default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**仅报告内容安全策略**

此设置允许您通过仅报告而不强制执行部分内容安全策略来进行试验。

### `security_public_key_pins`

**HTTP 公钥固定**

HTTP 公钥固定（HTTP Public Key Pinning）可保护您的站点免受使用伪造 X.509 证书的中间人（MiTM）攻击。通过仅将浏览器应信任的身份列入白名单，即使证书颁发机构被攻破，您的用户也能得到保护。

### `security_public_key_pins_report_only`

**仅报告 HTTP 公钥固定**

此设置允许您通过仅报告而不强制执行部分 HTTP 公钥固定来进行试验。

### `security_referrer_policy`

**安全 Referrer 策略**

Referrer Policy 是一种较新的响应头，允许站点控制浏览器在离开文档进行导航时包含多少信息，所有站点均应设置该头。

*默认值：`origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**会话 Cookie 的 samesite**

为会话 Cookie 启用 samesite:None 参数。更多信息：https://www.chromium.org/updates/same-site 以及 https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*默认值：`false`*

### `security_strict_transport`

**HTTP 严格传输安全**

HTTP 严格传输安全（HTTP Strict Transport Security）是您的站点应支持的优秀特性，通过让用户代理强制使用 HTTPS 来加强 TLS 的实施。推荐值：'strict-transport-security: max-age=63072000; includeSubDomains'。参见 https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security。您可以加入 'preload' 后缀，但这会对顶级域名（TLD）产生影响，因此不宜轻易使用。参见 https://hstspreload.org/。留空则禁用。

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options 可阻止浏览器尝试对内容类型进行 MIME 嗅探，并强制其使用已声明的 content-type。该响应头的唯一有效值为 'nosniff'。

*默认值：`nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options 告知浏览器是否允许将您的站点嵌入框架。通过阻止浏览器将您的站点放入框架，可以防御点击劫持等攻击。若在此定义 URL，应定义您的内容应从哪些 URL 可见，而非您的站点接受内容的来源 URL。例如，如果您的主 URL（上文的 root_web）为 https://11.chamilo.org/，则此设置应为：'ALLOW-FROM https://11.chamilo.org'。这些响应头仅适用于由 Chamilo 负责生成 HTTP 头的页面（即 '.php' 文件），不适用于静态文件。若使用此功能，请务必同时更新 Web 服务器配置，为静态文件添加正确的响应头。更多信息请参见上文 CDN 配置文档（搜索 'add_header'）。若启用此设置，推荐（严格）值为：'SAMEORIGIN'。

*默认值：`SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection 用于配置大多数浏览器内置的跨站脚本过滤器。推荐值 '1; mode=block'。

*默认值：`1; mode=block`*


### `user_reset_password`

**启用密码重置令牌**

此选项允许生成一个有过期时间的一次性令牌，并通过电子邮件发送给用户，用于重置其密码。

*默认值：`false`*

### `user_reset_password_token_limit`

**密码重置令牌的时间限制**

生成的令牌在自动过期且无法再使用之前的秒数（需要生成新令牌）。

*默认值：`3600`*