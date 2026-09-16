# 电子邮件配置

Chamilo 现在通过管理仪表板中的平台设置部分（有一个专门的电子邮件设置条目）来管理电子邮件发送配置。电子邮件用于账户创建、密码重置、课程通知、消息提醒以及其他平台事件。电子邮件发送通过 `MAILER_DSN` 配置设置进行配置。

## 配置

在 /admin/settings/mail 部分设置 `Mail DSN` 选项。格式取决于您的电子邮件传输方式。

### SMTP

最常见的配置，适用于任何 SMTP 服务器：

```bash
# 让系统决定
native://default

# 基本 SMTP
smtp://username:password@smtp.example.com:587

# 带 TLS 的 SMTP（大多数提供商）
smtp://username:password@smtp.example.com:587?encryption=tls

# 无需认证的 SMTP（本地中继）
smtp://localhost:25
```

将 `username`、`password` 和主机替换为您的 SMTP 服务器凭据。

### Amazon SES

```bash
# 使用 SMTP 接口
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# 使用 API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon Mailer 传输已嵌入到 Chamilo 中，无需额外安装。

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony Mailjet 传输已嵌入到 Chamilo 中，无需额外安装。

### Brevo（前身为 Sendinblue）

```bash
brevo+api://API_KEY@default
```

Symfony Brevo 传输已嵌入到 Chamilo 中，无需额外安装。

### Gmail（开发/小型平台）

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

使用应用密码，而不是您的常规 Gmail 密码。这仅适用于小型平台或开发环境，因为 Gmail 有发送限制。

## 平台电子邮件设置

除了传输方式外，还可以在同一页面上配置发件人身份：

| 设置 | 描述 |
|---------|-------------|
| **以这个（组织）名称发送所有电子邮件** | 与系统电子邮件关联的显示名称。 |
| **从这个电子邮件地址发送所有电子邮件** | 所有系统电子邮件的“发件人”地址。必须是您的邮件传输接受的有效地址。我们建议使用类似 `no-reply@yourdomain.com` 的“无回复”地址，以避免收到对自动电子邮件的无意义回复。 |

## 测试电子邮件发送

在配置 `MAILER_DSN` 后，测试电子邮件是否能成功发送：前往 *管理* > *系统* > *电子邮件测试器*，指定收件人、主题和电子邮件正文，然后点击 **发送测试电子邮件**。

如果命令完成时没有错误，但电子邮件未收到：

1. 检查收件人的垃圾邮件/垃圾文件夹。
2. 验证您的发送域名是否具有正确的 DNS 记录（SPF、DKIM、DMARC）。
3. 检查您的邮件提供商的发送日志，查看是否有退回或拒绝记录。
4. 查看 Chamilo 日志 `var/log/prod.log`，查找邮件发送错误。
5. 在电子邮件配置设置中，启用 *Mail: Debug*（在 2.0 版本中不可用，很快会推出）。

## 实验性：电子邮件队列（异步发送）

默认情况下，电子邮件在 Web 请求期间同步发送。为了获得更好的性能，可以配置异步发送，使用 Symfony Messenger：

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

使用异步发送时，电子邮件会被排队并由后台工作者发送：

```bash
php bin/console messenger:consume async
```

将其作为系统服务运行（例如通过 systemd 或 supervisord），以确保其持续运行。

## 小贴士

* **使用专用电子邮件服务**（SES、Mailjet、Brevo）用于生产平台。直接通过 SMTP 连接到您自己的邮件服务器需要仔细配置，以避免送达问题。
* **为您的发送域名配置 SPF、DKIM 和 DMARC** DNS 记录，以最大化送达率并防止电子邮件被标记为垃圾邮件。您还可以在电子邮件设置页面配置 DKIM 头信息。
* **在有几十个以上活跃用户的平台上使用异步发送**——同步电子邮件发送可能会明显减慢 Web 请求速度。