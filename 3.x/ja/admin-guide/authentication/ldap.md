# LDAP

Chamilo は、Microsoft Active Directory を含む LDAP サーバーに対してユーザーを認証できます。LDAP は `config/authentication.yaml` で設定します。

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind and search

ディレクトリ内でユーザーを特定するための 2 つの方法があります。

**Direct bind** — ユーザー名から DN を直接組み立てます。

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — まずサービスアカウントでディレクトリを検索し、見つかったユーザーとしてバインドします。

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Active Directory の場合は、`uid_key` に `sAMAccountName` を使用し、`query_string` を `(sAMAccountName=%s)` に合わせて調整してください。

### Attribute mapping

LDAP 属性を Chamilo のユーザーフィールドに、`data_correspondence` の下で対応付けます。

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`、`lastname`、および `email` は必須です。ユーザーはメールアドレスまたはユーザー名によって既存の Chamilo アカウントと照合されます。一致が見つからず、`allow_create_new_users` が true の場合は、新しいアカウントが作成されます。

## Tips

* **本番環境では LDAPS を使用する** — 暗号化された接続のため、`ldap://` を `ldaps://`（ポート 636）に切り替えてください。
* **サービスアカウント** — 検索バインド用アカウントには、ユーザーエントリへの読み取りアクセスのみが必要です。
* **まずテストする** — Chamilo を設定する前に、`ldapsearch` で接続文字列とクエリを確認してください。
* **`force_as_login_method: true`** — 他のログイン方法を非表示にし、すべてのユーザーを LDAP 経由に強制します。テスト中は `false` のままにして、標準フォームから管理者としてログインできるようにしてください。

パラメータの完全なリファレンスについては、[wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) を参照してください。