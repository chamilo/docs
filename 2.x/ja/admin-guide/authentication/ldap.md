# LDAP

Chamiloは、Microsoft Active Directoryを含むLDAPサーバーに対してユーザーを認証することができます。LDAPは`config/authentication.yaml`で設定されます。

## 設定

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "LDAPでサインイン"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### バインドと検索

ディレクトリ内でユーザーを見つけるための2つのアプローチ：

**直接バインド** — ユーザー名から直接DNを構築します：

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**検索バインド** — 最初にサービスアカウントでディレクトリを検索し、見つかったユーザーとしてバインドします：

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Active Directoryの場合、`uid_key`として`sAMAccountName`を使用し、`query_string`を`(sAMAccountName=%s)`に調整してください。

### 属性マッピング

LDAP属性をChamiloのユーザーフィールドにマッピングするには、`data_correspondence`の下に設定します：

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # 任意
          locale: preferredLanguage  # 任意
```

`firstname`、`lastname`、および`email`は必須です。ユーザーはメールアドレスまたはユーザー名によって既存のChamiloアカウントと照合されます。一致するアカウントが見つからず、`allow_create_new_users`がtrueの場合、新しいアカウントが作成されます。

## ヒント

* **本番環境ではLDAPSを使用** — 暗号化された接続のために`ldap://`を`ldaps://`（ポート636）に切り替えてください。
* **サービスアカウント** — 検索バインドアカウントには、ユーザーエントリへの読み取りアクセス権のみが必要です。
* **最初にテスト** — Chamiloを設定する前に、`ldapsearch`を使用して接続文字列とクエリを確認してください。
* **`force_as_login_method: true`** — 他のログインメソッドを非表示にし、すべてのユーザーをLDAP経由で強制的にログインさせます。テスト中は`false`のままにしておくと、標準フォームを介して管理者としてログインできます。

完全なパラメータリファレンスについては、[wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)をご覧ください。