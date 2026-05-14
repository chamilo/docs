# 安全指南

本指南涵盖了在生产环境中运行 Chamilo 2.0 平台的安全最佳实践。安全是平台软件、服务器配置和持续运营实践之间的共同责任。

## 保持 Chamilo 更新

保持 Chamilo 安装版本最新是最重要的安全实践。

* 订阅 Chamilo 安全 X 账户（@chamilosecurity）或关注 GitHub 仓库以获取发布公告。
* 及时应用安全补丁。2.0 分支内的次要更新设计为安全可应用。
* 按照[升级流程](../installation/upgrading.md)进行每次更新。

## HTTPS

在生产环境中始终通过 HTTPS 提供 Chamilo 服务。

* 获取 SSL/TLS 证书（Let's Encrypt 通过 Certbot 提供免费证书）。
* 配置您的 Web 服务器将所有 HTTP 流量重定向到 HTTPS。
* 启用 HSTS（HTTP 严格传输安全）标头以防止降级攻击：

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

如果不使用 HTTPS，登录凭据、会话 cookie 和所有用户数据将以明文传输，并可能在网络上被拦截。

## 文件权限

将文件权限限制到必要的最小范围。

| 路径 | 所有者 | 权限 | 备注 |
|------|-------|-------------|-------|
| 应用程序文件（源代码） | root 或部署用户 | 755（目录），644（文件） | Web 服务器需要只读访问权限。 |
| `var/` | Web 服务器用户 | 775 | 必须可写，用于 Symfony 缓存、日志和文件上传 |
| `.env` | root 或部署用户 | 640 | 包含敏感信息。Web 服务器在正常使用期间仅需读取权限，但在安装期间需要写入权限。 |
| `config/` | root 或部署用户 | 750 | 包含敏感信息。Web 服务器在正常使用期间仅需读取权限，但在安装期间需要写入权限。 |

切勿将权限设置为 777。切勿以 root 身份运行 Web 服务器。

## 密码策略

在[安全设置](../platform-settings/security-settings.md)中配置强密码要求：

* 最小长度为 8 个字符（建议 12 个以上）。
* 要求包含大写字母、小写字母、数字和特殊字符的组合。
* 对于合规性驱动的环境，考虑启用密码过期。
* 教育用户选择强且独特的密码。

## 速率限制和暴力破解保护

### 应用层级

* 将**账户被阻止前的最大登录尝试次数**（`login_max_attempt_before_blocking_account`）设置为一个较小的值（例如 5）。
* 在登录页面启用**CAPTCHA**。CAPTCHA 是开/关设置——它不会在 N 次登录失败后自动开启。将其与**CAPTCHA 错误次数达到阻止账户**（`captcha_number_mistakes_to_block_account`）结合使用，以锁定持续失败的 CAPTCHA 账户。

### 服务器层级

使用 **fail2ban** 监控登录失败并阻止违规 IP 地址：

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

在 `/etc/fail2ban/filter.d/chamilo-auth.conf` 中创建匹配的过滤器，以匹配身份验证失败的日志条目。

## 会话管理

* 在安全设置中设置合理的**会话生存时间**（例如 3600 秒 / 1 小时）。
* 在 Symfony 配置中配置**会话 cookie 标志**：

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # 仅通过 HTTPS 发送
          cookie_httponly: true     # 无法通过 JavaScript 访问
          cookie_samesite: lax     # CSRF 保护
  ```

* 对于包含敏感内容的平台，考虑禁用“记住我”功能。

## HTTP 安全标头

配置您的 Web 服务器发送安全标头：

| 标头 | 值 | 目的 |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | 防止 MIME 类型嗅探。 |
| `X-Frame-Options` | `SAMEORIGIN` | 防止通过 iframe 进行点击劫持。 |
| `X-XSS-Protection` | `1; mode=block` | 为旧版浏览器提供遗留 XSS 保护。 |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | 控制引用信息泄露。 |
| `Content-Security-Policy` | 因情况而异 | 控制可以加载的资源。需要为 Chamilo 进行仔细调整。 |

Apache 示例：

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Nginx 示例：

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## 文件上传安全

* 在[安全设置](../platform-settings/security-settings.md)中阻止可执行文件扩展名（exe、bat、sh、php、phtml、cgi）。
* 配置您的Web服务器以**永不执行上传的文件**。对于Apache，在整个var/目录中添加以下配置：

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* 如果您的环境需要，使用防病毒软件（ClamAV）扫描上传的文件。

## 数据库安全

* 为Chamilo使用**专用的数据库用户**，仅赋予其所需的权限（在Chamilo数据库上执行SELECT、INSERT、UPDATE、DELETE、CREATE、ALTER、DROP、INDEX）。
* 不要使用root数据库账户。
* 确保数据库无法从公共互联网访问。将其绑定到localhost或私有网络。
* 在合规性敏感的环境中启用数据库审计日志。

## 备份

* 安排**每日自动备份**数据库和上传的文件。
* 将备份存储在与服务器分开的位置（异地或云存储）。
* 定期测试备份恢复，以验证备份是否可用。
* 如果备份包含敏感数据，则对备份进行加密。

有关详细说明，请参见[备份](../maintenance/backups.md)。

## 监控

* 监控Chamilo日志文件`var/log/prod.log`，以发现错误和可疑活动。
* 设置服务器监控（CPU、内存、磁盘），以检测资源耗尽。
* 配置重复身份验证失败的警报。
* 定期审查用户账户，查找未经授权或休眠的账户。

## 检查清单

在部署或审计Chamilo安装时使用此检查清单：

- [ ] 已启用HTTPS并使用有效证书
- [ ] 已配置HTTP到HTTPS的重定向
- [ ] 在`.env`中设置`APP_ENV=prod`和`APP_DEBUG=0`
- [ ] 已生成唯一的`APP_SECRET`
- [ ] 文件权限受限（无777权限）
- [ ] 已配置密码策略
- [ ] 已启用最大登录尝试次数和CAPTCHA
- [ ] 已阻止可执行文件扩展名
- [ ] 在Web服务器上配置了安全头
- [ ] 已设置会话cookie标志（secure、httponly、samesite）
- [ ] 数据库用户具有最小权限
- [ ] 已安排并测试自动备份
- [ ] 已实施日志监控
- [ ] Chamilo版本为最新版本