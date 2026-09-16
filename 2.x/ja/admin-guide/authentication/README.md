# 認証

Chamiloは、組み込みのユーザー名/パスワードシステムからエンタープライズ向けのシングルサインオンソリューションまで、複数の認証方法をサポートしています。

## 設定ファイル

すべての外部認証方法は、`config/authentication.yaml` で設定されます。テンプレートは `config/authentication.dist.yaml` に提供されています。一般的な構造は以下の通りです：

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

ファイルを編集した後、キャッシュをクリアしてウォームアップしてください：

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

キャッシュが更新されると、ログインページに外部ログインボタンが表示されます。

## サポートされている方法

* **[OAuth2](oauth2.md)** — Azure AD、Keycloak、Facebook、および汎用のOAuth2プロバイダ
* **[LDAP](ldap.md)** — LDAPまたはActive Directoryサーバーに対する認証
* **[CAS](cas.md)** — 中央認証サービス（レガシー、2.xでは機能しない）
* **[SCIM](scim.md)** — 外部アイデンティティプロバイダからの自動ユーザー提供
* **[SSO設定](sso-configuration.md)** — トラブルシューティングおよびクロスメソッドの注意事項

## デフォルトの認証

デフォルトでは、Chamiloは独自の内部システムを使用します — ユーザーはChamiloデータベースに保存されたユーザー名とパスワードでログインします。外部メソッドは追加的なものであり、標準のログインフォームは設定されたプロバイダと並行して利用可能です。

## さらなる参考情報

完全なパラメータリファレンスや高度なシナリオについては、[外部認証設定のWikiページ](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) を参照してください。