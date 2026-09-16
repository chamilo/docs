# SSO Configuration

このページでは、認証方式全般に共通するトピックを扱います。

## Multiple providers

複数の認証方式を同時に有効にできます。有効にした各プロバイダーは、標準のユーザー名／パスワードフォームと並んで、ログインページに独自のボタンを表示します。ユーザーは希望する方式を選択します。

外部プロバイダーの設定に不備があってもプラットフォーム管理者が常にログインできるよう、標準フォームは有効のままにしてください。

## Authentication priority

複数の方式が有効な場合、システムは次の順序で資格情報を確認します。

1. LDAP（`force_as_login_method` が設定されている場合）
2. OAuth2 プロバイダー（`authentication.yaml` に記載された順）
3. Chamilo 内部データベース

## JWT tokens for API access

Chamilo は REST API に JWT（JSON Web Tokens）を使用します。トークンの有効期間とリフレッシュの動作は `config/packages/lexik_jwt_authentication.yaml` で設定します。これは SSO ログインフローとは別であり、API クライアントにのみ適用されます。

## Troubleshooting

### Login button does not appear after configuration

`authentication.yaml` を変更するたびにキャッシュをクリアする必要があります。

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Users cannot log in via SSO

* **Redirect URI mismatch** — ID プロバイダーに登録した URI は、`https://your-chamilo-url/connect/<provider>/check` と完全に一致している必要があります。
* **Clock drift** — SSO トークンは時間に依存します。サーバーの時計が同期されていること（NTP）を確認してください。
* **SSL certificate** — Chamilo は ID プロバイダーの証明書を信頼する必要があります。自己署名証明書の問題がないか確認してください。
* **Logs** — 具体的なエラーメッセージについては `var/log/` および ID プロバイダーのログを確認してください。

### Users are created with the wrong role

プロバイダーのロールマッピング設定を確認してください。グループまたは属性のマッピングで昇格されない限り、新規ユーザーは既定で学生ロールになります。

### Users exist in the provider but cannot access Chamilo

* `allow_create_new_users` が false の場合、ユーザーはプロバイダーのデータとメールまたはユーザー名が一致する Chamilo アカウントを既に持っている必要があります。
* ユーザーが Chamilo で無効化されていないことを確認してください。
* Azure の場合は、受信ユーザーを既存アカウントにどのように照合するかを把握するため、`existing_user_verification_order` を確認してください。