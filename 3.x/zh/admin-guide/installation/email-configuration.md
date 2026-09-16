# 电子邮件配置

Chamilo 现已通过管理仪表板的平台设置部分管理邮件发送配置（其中有专门的电子邮件条目）。系统会在账户创建、密码重置、课程通知、消息提醒以及其他平台事件时发送邮件。邮件投递通过 `MAILER_DSN` 配置项进行设置。

## 配置

在 /admin/settings/mail 部分设置 `Mail DSN` 选项。格式取决于所用的邮件传输方式。

### SMTP

最常见的配置，适用于任意 SMTP 服务器：

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

将 `username`、`password` 以及主机替换为您的 SMTP 服务器凭据。

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon Mailer 传输组件已内置于 Chamilo，无需额外安装。

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony Mailjet 传输组件已内置于 Chamilo，无需额外安装。

### Brevo（原 Sendinblue）

```bash
brevo+api://API_KEY@default
```

Symfony Brevo 传输组件已内置于 Chamilo，无需额外安装。

### Microsoft 365 / Outlook（Microsoft Graph API）

Microsoft 正在逐步停用 Exchange Online 中基于基本身份验证的 SMTP，因此普通的 `smtp://user:password@smtp.office365.com:587` DSN 仅在租户管理员为该特定邮箱明确启用“已验证 SMTP”时有效。请改用 Microsoft Graph API 发送——它完全不使用 SMTP：

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfony Microsoft Graph 传输组件已内置于 Chamilo，无需额外安装。

要获取上述三个值，请在 [Microsoft Entra 管理中心](https://entra.microsoft.com) 中操作：

1. 注册一个应用程序。其 **应用程序（客户端）ID** 和 **目录（租户）ID** 分别对应 `CLIENT_ID` 和 `TENANT_ID`。
2. 在 *API 权限* 下，添加 Microsoft Graph 的 **应用程序** 权限 `Mail.Send`（不是委派权限），然后授予管理员同意。
3. 在 *证书和密码* 下，创建客户端密码。其 **值**（不是其 ID）即为 `CLIENT_SECRET`。

注意事项：

* 对客户端密码中在 URL 里具有特殊含义的任何字符进行 URL 编码（`@` 编码为 `%40`，`+` 编码为 `%2B`，`/` 编码为 `%2F`，依此类推）。
* **从此电子邮件地址发送所有电子邮件** 中配置的地址必须是租户内真实存在的邮箱，否则 Microsoft 会拒绝该邮件。
* 若不想在发件人的 *已发送邮件* 文件夹中保存每封平台邮件的副本，请在 DSN 中添加 `&noSave=true`。
* 对于国家云，将 DSN 指向正确的端点，且不要带 `https://` 前缀：`microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`。

**安全警告：** `Mail.Send` *应用程序* 权限允许已注册的应用程序以租户中的**任意**邮箱身份发送邮件，而不仅限于 Chamilo 所用的邮箱。请通过 Exchange Online 应用程序访问策略将其限制为发件人邮箱：

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail（开发/小型平台）

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

请使用应用专用密码，而非您的常规 Gmail 密码。由于 Gmail 有发送限额，此方式仅适用于小型平台或开发环境。

## 平台电子邮件设置

除传输方式外，请在同一页面配置发件人身份：

| 设置 | 说明 |
|---------|-------------|
| **以该（组织）名称作为所有电子邮件的发件人显示名** | 与系统邮件关联的显示名称。 |
| **从此电子邮件地址发送所有电子邮件** | 所有系统邮件的“发件人”地址。必须是您的邮件传输方式所接受的有效地址。建议使用类似 `no-reply@yourdomain.com` 的“请勿回复”地址，以免收到对自动邮件的无意义回复。 |

## 测试邮件投递

配置 `MAILER_DSN` 后，请测试邮件是否能够送达：前往 *管理* > *系统* > *电子邮件测试器*，指定收件人、主题和邮件正文，然后点击 **发送测试邮件**。

如果命令执行完成且无错误，但未收到邮件：

1. 检查收件人的垃圾邮件/垃圾箱文件夹。
2. 确认发信域名已正确配置 DNS 记录（SPF、DKIM、DMARC）。
3. 查看邮件服务提供商的发送日志，确认是否存在退信或拒收。
4. 查看 Chamilo 日志 `var/log/prod.log` 中的邮件程序错误。
5. 在电子邮件配置设置中启用 *邮件：调试*（3.0 中尚不可用，即将提供）。

## 实验性功能：邮件队列（异步投递）

默认情况下，邮件在 Web 请求期间同步发送。为获得更好的性能，可使用 Symfony Messenger 配置异步投递：

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

启用异步投递后，邮件将进入队列并由后台工作进程发送：

```bash
php bin/console messenger:consume async
```

请将其作为系统服务运行（例如通过 systemd 或 supervisord），以保持持续运行。

## 提示

* **生产环境请使用专用邮件服务**（SES、Mailjet、Brevo）。直接通过 SMTP 连接自有邮件服务器需要仔细配置，以免出现送达率问题。
* **为发信域名配置 SPF、DKIM 和 DMARC** DNS 记录，以提高送达率并防止邮件被标记为垃圾邮件。您也可以在电子邮件设置页面配置 DKIM 标头。
* **在活跃用户超过数十人的平台上使用异步投递**——同步发送邮件会明显拖慢 Web 请求。