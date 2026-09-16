# 安全设置

登录保护、密码策略、内容安全头、双重身份验证和轻量级入侵检测系统。

在 **管理 > 配置设置 > 安全** 下访问这些设置。此类别包含 **31 个设置**，以下列出平台设置固定数据（`SettingsCurrentFixtures.php`）中提供的标题和注释。

> 代码中的变量名以等宽字体显示。在通过 API 进行脚本编写或需要通过编辑 [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) 在全局级别更改这些设置时使用它。

## 设置

### `2fa_enable`

**启用双重身份验证（2FA）**

在密码更新页面中添加字段，以使用 TOTP 身份验证应用程序启用双重身份验证。如果在全局范围内禁用，用户将看不到双重身份验证字段，并且即使之前已启用，也不会在登录时提示进行双重身份验证。

*默认值：`false`*

### `access_to_personal_file_for_all`

**允许所有人访问个人文件**

允许无限制访问所有个人文件。

*默认值：`false`*

### `admins_can_set_users_pass`

**管理员可以手动设置用户密码**

[推断] 启用后，管理员可以直接手动设置用户密码，而无需用户进行重置。

### `allow_captcha`

**验证码（CAPTCHA）**

在登录表单、注册表单和忘记密码表单上启用验证码，以避免密码暴力破解。

*默认值：`false`*

### `allow_online_users_by_status`

**筛选可见在线用户**

限制特定用户角色可见的在线用户。

### `allow_strength_pass_checker`

**密码强度检查器**

启用此选项以在用户更改密码时添加密码强度的视觉指示器。这不会阻止添加弱密码，仅作为视觉辅助。

*默认值：`true`*

### `anonymous_autoprovisioning`

**自动配置更多匿名用户**

动态创建新的匿名用户以支持高访问量。

*默认值：`false`*

### `captcha_number_mistakes_to_block_account`

**验证码错误容许次数**

用户在验证码框中可以犯错的次数，超过此次数账户将被锁定。

### `captcha_time_to_block`

**验证码账户锁定时间**

如果用户达到登录错误的最高容许次数（使用验证码时），其账户将被锁定此分钟数。

### `check_password`

**检查密码要求**

在创建密码或更新密码时启用上述定义的密码要求的验证。

*默认值：`false`*

### `filter_terms`

**过滤词汇**

提供一个词汇列表，每行一个，将从网页和电子邮件中过滤掉。这些词汇将被替换为 ***。

### `force_renew_password_at_first_login`

**首次登录时强制更新密码**

这是提高门户安全性的一个简单措施，要求用户立即更改密码，这样通过电子邮件传输的密码将不再有效，他们将使用自己想出的且只有自己知道的密码。

*默认值：`false`*

### `hide_breadcrumb_if_not_allowed`

**如果‘不允许’则隐藏面包屑导航**

如果用户无权访问特定页面，也隐藏面包屑导航。这通过避免显示不必要的信息来提高安全性。

*默认值：`false`*

### `login_max_attempt_before_blocking_account`

**锁定账户前的最大登录尝试次数**

在用户账户被锁定并需要管理员解锁之前，容忍的登录失败尝试次数。

*默认值：`0`*

### `password_requirements`

**最低密码语法要求**

定义用户密码的必需结构。例如：{"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}。使用 "specials"（复数形式）来要求特殊字符。

### `password_rotation_days`

**密码轮换间隔（天）**

用户必须轮换密码的天数（0 = 禁用）。

*默认值：`0`*

### `prevent_multiple_simultaneous_login`

**防止同时登录**

防止用户使用同一账户多次登录。这在按访问付费的门户网站上是一个很好的选项，但在测试期间可能有限制，因为只有一台浏览器可以连接到任何给定账户。

*默认值：`false`*

### `proxy_settings`

**代理设置**

Chamilo 的某些功能将从服务器连接到外部。例如，在创建链接或在学习路径中显示嵌入页面时，确保外部内容存在。如果您的 Chamilo 服务器使用代理来访问外部网络，这里将是配置它的地方。

### `security_block_inactive_users_immediately`

**立即阻止已禁用的用户**

立即阻止通过用户管理被管理员禁用的用户。否则，被禁用的用户在登出之前将保留之前的权限。

*默认值：`false`*

### `security_content_policy`

**内容安全策略**

内容安全策略是一种有效的措施，可以保护您的网站免受跨站脚本攻击（XSS）。通过白名单批准的内容来源，您可以阻止浏览器加载恶意资产。此设置对于所见即所得（WYSIWYG）编辑器来说特别复杂，但如果您在 child-src 声明中添加所有希望授权用于 iframe 嵌入的域名，此示例应该对您有效。您可以通过在 'script-src' 参数中使用严格列表，防止 JavaScript 从外部来源执行（包括 SVG 图像内部）。留空以禁用。示例设置：default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**内容安全策略仅报告**

此设置允许您通过报告但不强制执行某些内容安全策略来进行实验。

### `security_public_key_pins`

**HTTP 公钥固定**

HTTP 公钥固定通过仅白名单浏览器应信任的身份，保护您的网站免受使用伪造 X.509 证书的中间人攻击（MiTM）。即使证书颁发机构被攻破，您的用户也能得到保护。

### `security_public_key_pins_report_only`

**HTTP 公钥固定仅报告**

此设置允许您通过报告但不强制执行某些 HTTP 公钥固定来进行实验。

### `security_referrer_policy`

**安全引荐策略**

引荐策略是一个新的头部，允许网站控制浏览器在离开文档时包含的信息量，所有网站都应设置此策略。

*默认值：`origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**会话 cookie 的 samesite 属性**

为会话 cookie 启用 samesite:None 参数。更多信息：https://www.chromium.org/updates/same-site 和 https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*默认值：`false`*

### `security_strict_transport`

**HTTP 严格传输安全**

HTTP 严格传输安全是一个极佳的功能，建议在您的网站上支持，通过让用户代理强制使用 HTTPS 来增强 TLS 的实现。推荐值：'strict-transport-security: max-age=63072000; includeSubDomains'。参见 https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security。您可以包含 'preload' 后缀，但这会对顶级域名（TLD）产生影响，因此不宜轻易为之。参见 https://hstspreload.org/。留空以禁用。

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options 阻止浏览器尝试 MIME 嗅探内容类型，并强制其坚持声明的内容类型。此头部的唯一有效值是 'nosniff'。

*默认值：`nosniff`*

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options 告诉浏览器您是否希望允许您的网站被嵌入。通过阻止浏览器嵌入您的网站，您可以防御点击劫持等攻击。如果在此定义 URL，它应定义您的内容应可见的 URL，而不是您的网站接受内容的 URL。例如，如果您的主 URL（上面的 root_web）是 https://11.chamilo.org/，那么此设置应为：'ALLOW-FROM https://11.chamilo.org'。这些头部仅适用于 Chamilo 负责生成 HTTP 头部的页面（即 '.php' 文件）。它不适用于静态文件。如果使用此功能，请确保同时更新您的 Web 服务器配置，为静态文件添加正确的头部。更多信息请参见上面的 CDN 配置文档（搜索 'add_header'）。如果启用此设置，推荐（严格）值为：'SAMEORIGIN'。

*默认值：`SAMEORIGIN`*

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection 设置大多数浏览器内置的跨站脚本过滤器的配置。推荐值 '1; mode=block'。

*默认值：`1; mode=block`*

### `user_reset_password`

**启用密码重置令牌**

此选项允许生成一个通过电子邮件发送给用户的、一次性的过期令牌，用于重置其密码。

*默认值：`false`*

### `user_reset_password_token_limit`

**密码重置令牌的时间限制**

生成令牌自动过期且无法再使用的秒数（需要生成新令牌）。

*默认值：`3600`*