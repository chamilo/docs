# 安全指南

本指南介绍在生产环境中运行 Chamilo 3.0 平台的安全最佳实践。安全是平台软件、服务器配置与持续运维实践共同承担的责任。

本指南中引用的内置监控与审计工具（登录尝试日志、入侵检测、密码强度扫描以及文件完整性检查），请参阅 [安全](../security/README.md) 章节。

## 保持 Chamilo 更新

最重要的安全实践是保持 Chamilo 安装处于最新状态。

* 订阅 Chamilo 安全 X 账号（@chamilosecurity），或关注 GitHub 仓库以获取发布公告。
* 及时应用安全补丁。3.0 分支内的次要更新设计为可安全应用。
* 每次更新请遵循 [升级流程](../installation/upgrading.md)。

## HTTPS

生产环境中务必通过 HTTPS 提供 Chamilo 服务。

* 获取 SSL/TLS 证书（Let's Encrypt 可通过 Certbot 提供免费证书）。
* 配置 Web 服务器，将所有 HTTP 流量重定向到 HTTPS。
* 启用 HSTS（HTTP Strict Transport Security）标头以防止降级攻击：

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

若未使用 HTTPS，登录凭据、会话 Cookie 以及所有用户数据将以明文传输，可能在网络上被截获。

## 文件权限

将文件权限限制为所需的最低限度。

| 路径 | 所有者 | 权限 | 说明 |
|------|-------|-------------|-------|
| 应用程序文件（源代码） | root 或部署用户 | 755（目录）、644（文件） | Web 服务器只需只读访问。 |
| `var/` | Web 服务器用户 | 775 | 必须可写，供 Symfony 缓存、日志和文件上传使用 |
| `.env` | root 或部署用户 | 640 | 包含密钥。正常使用时 Web 服务器只需读权限，安装过程中需要写权限。 |
| `config/` | root 或部署用户 | 750 | 包含密钥。正常使用时 Web 服务器只需读权限，安装过程中需要写权限。 |

切勿将权限设置为 777。切勿以 root 身份运行 Web 服务器。

## 密码策略

在 [安全设置](../platform-settings/security-settings.md) 中配置强密码要求：

* 最小长度为 8 个字符（建议 12 个及以上）。
* 要求混合使用大写字母、小写字母、数字和特殊字符。
* 在合规驱动的环境中，可考虑启用密码过期。
* 教育用户选择强壮且唯一的密码。

## 速率限制与暴力破解防护

### 应用层

* 将 **锁定账户前的最大登录尝试次数**（`login_max_attempt_before_blocking_account`）设为较小值（例如 5）。
* 在登录页启用 **CAPTCHA**。CAPTCHA 为开/关状态——不会在 N 次失败登录后自动开启。可将其与 **锁定账户前的 CAPTCHA 错误次数**（`captcha_number_mistakes_to_block_account`）配合使用，以锁定持续未能通过 CAPTCHA 的账户。
* 定期查看 [登录尝试](../security/login-attempts.md) 报告以发现暴力破解模式，并查看 [简易 IDS](../security/simple-ids.md) 报告以了解其他被标记的请求（XSS 尝试、路径遍历等）。

### 服务器层

使用 **fail2ban** 监控登录失败并封禁违规 IP 地址：

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

* 在安全设置中设置合理的 **会话生命周期**（例如 3600 秒 / 1 小时）。
* 在 Symfony 配置中设置 **会话 Cookie 标志**：

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* 对于包含敏感内容的平台，可考虑禁用“记住我”。

## HTTP 安全标头

配置 Web 服务器以发送安全标头：

| 标头 | 值 | 用途 |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | 防止 MIME 类型嗅探。 |
| `X-Frame-Options` | `SAMEORIGIN` | 防止通过 iframe 进行点击劫持。 |
| `X-XSS-Protection` | `1; mode=block` | 面向旧版浏览器的遗留 XSS 防护。 |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | 控制 Referrer 信息泄露。 |
| `Content-Security-Policy` | 视情况而定 | 控制可加载的资源。需针对 Chamilo 仔细调优。 |

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

* 在 [安全设置](../platform-settings/security-settings.md) 中阻止可执行文件扩展名（exe、bat、sh、php、phtml、cgi）。
* 配置 Web 服务器**永不执行已上传的文件**。对于 Apache，将以下内容添加到整个 var/ 目录：

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* 若环境有要求，使用杀毒软件（ClamAV）扫描上传文件。

## 数据库安全

* 为 Chamilo 使用**专用数据库用户**，仅授予其所需权限（对 Chamilo 数据库的 SELECT、INSERT、UPDATE、DELETE、CREATE、ALTER、DROP、INDEX）。
* 不要使用 root 数据库账户。
* 确保数据库无法从公网访问。将其绑定到 localhost 或私有网络。
* 在合规敏感环境中启用数据库审计日志。

## 备份

* 安排数据库与已上传文件的**每日自动备份**。
* 将备份存储在与服务器分离的位置（异地或云存储）。
* 定期测试备份还原，以验证备份可用。
* 若备份包含敏感数据，请加密备份。

详细说明请参见 [备份](../maintenance/backups.md)。

## 监控

* 监控 `var/log/prod.log` 中的 Chamilo 日志，以发现错误和可疑活动。
* 设置服务器监控（CPU、内存、磁盘），以检测资源耗尽。
* 为反复出现的身份验证失败配置告警。
* 定期审查用户账户，查找未授权或休眠账户。
* 在 cron 中安排 [文件完整性](../security/file-integrity.md) 检查（Chamilo 3.0+），以便在已安装文件意外变更时收到通知，并定期运行 [密码强度检查器](../security/password-strength-checker.md)，尤其是在批量导入用户之后。

## 检查清单

在部署或审计 Chamilo 安装时使用此检查清单：

- [ ] 已启用 HTTPS 并使用有效证书
- [ ] 已配置 HTTP 到 HTTPS 重定向
- [ ] `.env` 中 `APP_ENV=prod` 且 `APP_DEBUG=0`
- [ ] 已生成唯一的 `APP_SECRET`
- [ ] 文件权限已收紧（无 777）
- [ ] 已配置密码策略
- [ ] 已启用最大登录尝试次数和 CAPTCHA
- [ ] 已阻止可执行文件扩展名
- [ ] 已在 Web 服务器上配置安全标头
- [ ] 已设置会话 Cookie 标志（secure、httponly、samesite）
- [ ] 数据库用户权限最小化
- [ ] 已安排并测试自动备份
- [ ] 已建立文件完整性基线并在 cron 中安排扫描（Chamilo 3.0+）
- [ ] 已落实日志监控
- [ ] Chamilo 版本为最新