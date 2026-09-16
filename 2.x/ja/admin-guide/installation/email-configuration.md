# メール設定

Chamiloでは、メール送信の設定を管理ダッシュボードのプラットフォーム設定セクション（メール専用の項目があります）から管理できるようになりました。メールはアカウント作成、パスワードリセット、コース通知、メッセージアラート、その他のプラットフォームイベントのために送信されます。メール配信は`MAILER_DSN`設定を通じて構成されます。

## 設定方法

/admin/settings/mailセクションで`Mail DSN`オプションを設定します。形式は使用するメールトランスポートによって異なります。

### SMTP

最も一般的な設定で、任意のSMTPサーバーに適しています：

```bash
# システムに任せる
native://default

# 基本的なSMTP
smtp://username:password@smtp.example.com:587

# TLSを使用したSMTP（ほとんどのプロバイダ）
smtp://username:password@smtp.example.com:587?encryption=tls

# 認証なしのSMTP（ローカルリレー）
smtp://localhost:25
```

`username`、`password`、およびホストをSMTPサーバーの認証情報に置き換えてください。

### Amazon SES

```bash
# SMTPインターフェースを使用
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# APIを使用
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon MailerトランスポートはChamiloに組み込まれています。追加のインストールは不要です。

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony MailjetトランスポートはChamiloに組み込まれています。追加のインストールは不要です。

### Brevo（旧Sendinblue）

```bash
brevo+api://API_KEY@default
```

Symfony BrevoトランスポートはChamiloに組み込まれています。追加のインストールは不要です。

### Gmail（開発/小規模プラットフォーム向け）

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

通常のGmailパスワードではなく、アプリパスワードを使用してください。これは小規模なプラットフォームや開発環境にのみ適しており、Gmailには送信制限があります。

## プラットフォームのメール設定

トランスポートに加えて、同じページで送信者の識別情報を設定します：

| 設定項目 | 説明 |
|---------|-------------|
| **すべてのメールをこの（組織の）名前で送信元として送信する** | システムメールに関連付けられる表示名。 |
| **すべてのメールをこのメールアドレスから送信する** | すべてのシステムメールの「送信元」アドレス。メールトランスポートで受け入れられる有効なアドレスである必要があります。自動送信メールへの無意味な返信を避けるため、`no-reply@yourdomain.com`のような「返信不要」アドレスを使用することをお勧めします。 |

## メール配信のテスト

`MAILER_DSN`を設定した後、メールが配信されるかテストします：*管理* > *システム* > *メールテスター*に移動し、受信者、件名、メール本文を指定して**テストメールを送信**をクリックします。

コマンドがエラーなく完了したがメールが届かない場合：

1. 受信者のスパム/ジャンクフォルダを確認してください。
2. 送信ドメインに適切なDNSレコード（SPF、DKIM、DMARC）があるか確認してください。
3. メールプロバイダの送信ログでバウンスや拒否がないか確認してください。
4. Chamiloのログ`var/log/prod.log`でメーラーエラーを確認してください。
5. メール設定で*Mail: Debug*を有効にしてください（2.0では利用できませんが、近日中に利用可能になります）。

## 実験的：メールキュー（非同期配信）

デフォルトでは、メールはウェブリクエスト中に同期的に送信されます。パフォーマンスを向上させるために、Symfony Messengerを使用して非同期配信を設定できます：

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

非同期配信では、メールはキューに溜まり、バックグラウンドワーカーによって送信されます：

```bash
php bin/console messenger:consume async
```

これをシステムサービス（例：systemdやsupervisord経由）として実行し、常時稼働するようにしてください。

## ヒント

* **本番環境のプラットフォームでは専用のメールサービス**（SES、Mailjet、Brevo）を使用してください。独自のメールサーバーへの直接SMTPは、配信性の問題を避けるために慎重な設定が必要です。
* 送信ドメインの**SPF、DKIM、DMARC** DNSレコードを設定して、配信率を最大化し、メールがスパムとしてマークされるのを防ぎます。メール設定ページからDKIMヘッダーも設定できます。
* 数十人以上のアクティブユーザーがいるプラットフォームでは**非同期配信**を使用してください。同期的なメール送信はウェブリクエストを顕著に遅くする可能性があります。