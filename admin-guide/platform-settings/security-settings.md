# Security Settings

Login protection, password policy, content security headers, two-factor authentication, and the lightweight intrusion detection system.

Access these settings under **Administration > Configuration settings > Security**. This category contains **31 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `2fa_enable`

**Enable 2FA**

Add fields in the password update page to enable 2FA using a TOTP authenticator app. When disabled globally, users won't see 2FA fields and won't be prompted for 2FA at login, even if they had enabled it previously.

### `access_to_personal_file_for_all`

**Access to personal file for all**

Allows access to all personal files without restriction

### `admins_can_set_users_pass`

**Admins can set users passwords manually**

[inferred] When enabled, administrators can manually set user passwords directly without requiring users to reset them.

### `allow_captcha`

**CAPTCHA**

Enable a CAPTCHA on the login form, inscription form and lost password form to avoid password hammering

### `allow_online_users_by_status`

**Filter users that can be seen as online**

Limits online user visibility to specific user roles.

### `allow_strength_pass_checker`

**Password strength checker**

Enable this option to add a visual indicator of password strength, when the user changes his/her password. This will NOT prevent bad passwords to be added, it only acts as a visual helper.

### `anonymous_autoprovisioning`

**Auto-provision more anonymous users**

Dynamically creates new anonymous users to support high visitor traffic.

### `captcha_number_mistakes_to_block_account`

**CAPTCHA mistakes allowance**

The number of times a user can make a mistake on the CAPTCHA box before his account is locked out.

### `captcha_time_to_block`

**CAPTCHA account locking time**

If the user reaches the maximum allowance for login mistakes (when using the CAPTCHA), his/her account will be locked for this number of minutes.

### `check_password`

**Check password requirements**

Enable validation of the password requirements defined above during password creation or password update.

### `filter_terms`

**Filter terms**

Give a list of terms, one by line, to be filtered out of web pages and e-mails. These terms will be replaced by ***.

### `force_renew_password_at_first_login`

**Force password renewal at first login**

This is one simple measure to increase the security of your portal by asking users to immediately change their password, so the one that was transfered by e-mail is no longer valid and they then will use one that they came up with and that they are the only person to know.

### `hide_breadcrumb_if_not_allowed`

**Hide breadcrumb if 'not allowed'**

If the user is not allowed to access a specific page, also hide the breadcrumb. This increases security by avoiding the display of unnecessary information.

### `login_max_attempt_before_blocking_account`

**Max login attempts before lockdown**

Number of failed login attempts to tolerate before the user account is locked and has to be unlocked by an admin.

### `password_requirements`

**Minimal password syntax requirements**

Defines the required structure for user passwords. Example: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Use "specials" (plural) to require special characters.

### `password_rotation_days`

**Password rotation interval (days)**

Number of days before users must rotate their password (0 = disabled).

### `prevent_multiple_simultaneous_login`

**Prevent simultaneous login**

Prevent users connecting with the same account more than once. This is a good option on pay-per-access portals, but might be restrictive during testing as only one browser can connect with any given account.

### `proxy_settings`

**Proxy settings**

Some features of Chamilo will connect to the exterior from the server. For example to make sure an external content exists when creating a link or showing an embedded page in the learning path. If your Chamilo server uses a proxy to get out of its network, this would be the place to configure it.

### `security_block_inactive_users_immediately`

**Block disabled users immediately**

Immediately block users who have been disabled by the admin through users management. Otherwise, users who have been disabled will keep their previous privileges until they logout.

### `security_content_policy`

**Content Security Policy**

Content Security Policy is an effective measure to protect your site from XSS attacks. By whitelisting sources of approved content, you can prevent the browser from loading malicious assets. This setting is particularly complicated to set with WYSIWYG editors, but if you add all domains that you want to authorize for iframes inclusion in the child-src statement, this example should work for you. You can prevent JavaScript from executing from external sources (including inside SVG images) by using a strict list in the 'script-src' argument. Leave blank to disable. Example setting: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy report only**

This setting allows you to experiment by reporting but not enforcing some Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning protects your site from MiTM attacks using rogue X.509 certificates. By whitelisting only the identities that the browser should trust, your users are protected in the event a certificate authority is compromised.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning report only**

This setting allows you to experiment by reporting but not enforcing some HTTP Public Key Pinning.

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy is a new header that allows a site to control how much information the browser includes with navigation away from a document and should be set by all sites.

### `security_session_cookie_samesite_none`

**Session cookie samesite**

Enable samesite:None parameter for session cookie. More info: https://www.chromium.org/updates/same-site and https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security is an excellent feature to support on your site and strengthens your implementation of TLS by getting the User Agent to enforce the use of HTTPS. Recommended value: 'strict-transport-security: max-age=63072000; includeSubDomains'. See https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. You can include the 'preload' suffix, but this has consequences on the top level domain (TLD), so probably not to be done lightly. See https://hstspreload.org/. Leave blank to disable.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options stops a browser from trying to MIME-sniff the content type and forces it to stick with the declared content-type. The only valid value for this header is 'nosniff'.

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options tells the browser whether you want to allow your site to be framed or not. By preventing a browser from framing your site you can defend against attacks like clickjacking. If defining a URL here, it should define the URL(s) from which your content should be visible, not the URLs from which your site accepts content. For example, if your main URL (root_web above) is https://11.chamilo.org/, then this setting should be: 'ALLOW-FROM https://11.chamilo.org'. These headers only apply to pages where Chamilo is responsible of the HTTP headers generation (i.e. '.php' files). It does not apply to static files. If playing with this feature, make sure you also update your web server configuration to add the right headers for static files. See CDN configuration documentation above (search for 'add_header') for more information. Recommended (strict) value for this setting, if enabled: 'SAMEORIGIN'.

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection sets the configuration for the cross-site scripting filter built into most browsers. Recommended value '1; mode=block'.

### `user_reset_password`

**Enable password reset token**

This option allows to generate a expiring single-use token sent by e-mail to the user to reset his/her password.

### `user_reset_password_token_limit`

**Time limit for password reset token**

The number of seconds before the generated token automatically expires and cannot be used anymore (a new token needs to be generated).

