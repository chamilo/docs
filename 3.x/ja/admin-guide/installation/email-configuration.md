# メール設定

Chamilo は、管理ダッシュボードのプラットフォーム設定セクション（メール専用の項目があります）からメール送信の設定を管理するようになりました。メールは、アカウント作成、パスワードリセット、コース通知、メッセージアラート、その他のプラットフォームイベントに対して送信されます。メール配信は `MAILER_DSN` 設定項目で構成します。

## 設定

/admin/settings/mail セクションで `Mail DSN` オプションを設定します。形式は使用するメールトランスポートによって異なります。

### SMTP

最も一般的な設定で、任意の SMTP サーバーに適しています。

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

`username`、`password`、およびホストを、ご利用の SMTP サーバーの認証情報に置き換えてください。

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony の Amazon Mailer トランスポートは Chamilo に組み込まれています。追加のインストールは不要です。

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony の Mailjet トランスポートは Chamilo に組み込まれています。追加のインストールは不要です。

### Brevo（旧 Sendinblue）

```bash
brevo+api://API_KEY@default
```

Symfony の Brevo トランスポートは Chamilo に組み込まれています。追加のインストールは不要です。

### Microsoft 365 / Outlook（Microsoft Graph API）

Microsoft は Exchange Online における基本認証付き SMTP を廃止しつつあるため、プレーンな `smtp://user:password@smtp.office365.com:587` という DSN は、テナント管理者がその特定のメールボックスで「Authenticated SMTP」を明示的に有効にしている間のみ動作します。代わりに Microsoft Graph API 経由で送信してください。SMTP は一切使用しません。

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfony の Microsoft Graph トランスポートは Chamilo に組み込まれています。追加のインストールは不要です。

これら 3 つの値を取得するには、[Microsoft Entra 管理センター](https://entra.microsoft.com) で次の操作を行います。

1. アプリケーションを登録します。その **アプリケーション (クライアント) ID** と **ディレクトリ (テナント) ID** が `CLIENT_ID` と `TENANT_ID` です。
2. *API のアクセス許可* で、Microsoft Graph の **アプリケーション** のアクセス許可 `Mail.Send`（委任されたものではなく）を追加し、管理者の同意を付与します。
3. *証明書とシークレット* で、クライアント シークレットを作成します。その **値**（ID ではなく）が `CLIENT_SECRET` です。

注意:

* クライアント シークレットに URL で特別な意味を持つ文字が含まれる場合は URL エンコードしてください（`@` は `%40`、`+` は `%2B`、`/` は `%2F` など）。
* **すべてのメールをこのメールアドレスから送信する** に設定するアドレスは、テナント内の実在するメールボックスでなければなりません。そうでない場合、Microsoft はメッセージを拒否します。
* 送信者の *送信済みアイテム* フォルダーにプラットフォームのすべてのメールのコピーを保存したくない場合は、DSN に `&noSave=true` を追加してください。
* 各国クラウドの場合は、`https://` プレフィックスなしで適切なエンドポイントを DSN に指定します: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`。

**セキュリティに関する警告:** `Mail.Send` の *アプリケーション* アクセス許可は、登録したアプリケーションがテナント内の **任意の** メールボックスとしてメールを送信できるようにします。Chamilo が使用するメールボックスに限りません。Exchange Online のアプリケーション アクセス ポリシーで送信者メールボックスに制限してください。

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail（開発／小規模プラットフォーム）

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

通常の Gmail パスワードではなく、アプリ パスワードを使用してください。Gmail には送信制限があるため、小規模プラットフォームまたは開発用途にのみ適しています。

## プラットフォームのメール設定

トランスポートに加えて、同じページで送信者の識別情報を設定します。

| 設定 | 説明 |
|---------|-------------|
| **すべてのメールをこの（組織の）名前から発信する** | システムメールに関連付ける表示名です。 |
| **すべてのメールをこのメールアドレスから送信する** | すべてのシステムメールの「From」アドレスです。メールトランスポートが受け入れる有効なアドレスである必要があります。自動送信メールへの無意味な返信を避けるため、`no-reply@yourdomain.com` のような「返信不要」アドレスの使用を推奨します。 |

## メール配信のテスト

`MAILER_DSN` を設定したら、メールが配信されることをテストします。*管理* > *システム* > *E-mail tester* に移動し、宛先、件名、本文を指定して **Send test email** をクリックします。

コマンドがエラーなく完了したにもかかわらずメールが届かない場合:

1. 受信者のスパム／迷惑メールフォルダーを確認します。
2. 送信ドメインに適切な DNS レコード（SPF、DKIM、DMARC）があることを確認します。
3. メールプロバイダーの送信ログでバウンスや拒否がないか確認します。
4. `var/log/prod.log` の Chamilo ログでメーラーエラーを確認します。
5. E-mail configuration の設定で *Mail: Debug* を有効にします（3.0 では利用できません。近日対応予定です）。

## 実験的: メールキュー（非同期配信）

デフォルトでは、メールは Web リクエスト中に同期的に送信されます。パフォーマンス向上のため、Symfony Messenger を使って非同期配信を設定します:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

非同期配信では、メールはキューに入れられ、バックグラウンドワーカーによって送信されます:

```bash
php bin/console messenger:consume async
```

常時稼働させるため、システムサービス（例: systemd または supervisord）として実行します。

## ヒント

* **本番環境では専用のメールサービス**（SES、Mailjet、Brevo）を使用してください。自前のメールサーバーへの直接 SMTP は、到達性の問題を避けるために慎重な設定が必要です。
* **送信ドメインに SPF、DKIM、DMARC** の DNS レコードを設定し、到達率を最大化し、スパム判定を防ぎます。e-mail settings ページから DKIM ヘッダーを設定することもできます。
* **アクティブユーザーが数十人を超えるプラットフォームでは非同期配信を使用**してください。同期的なメール送信は Web リクエストを明らかに遅くすることがあります。