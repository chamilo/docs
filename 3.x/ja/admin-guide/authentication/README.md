# 認証

Chamilo は、組み込みのユーザー名／パスワード方式から、エンタープライズ向けシングルサインオンまで、複数の認証方式をサポートしています。

## 設定ファイル

外部認証方式はすべて `config/authentication.yaml` で設定します。テンプレートは `config/authentication.dist.yaml` にあります。全体の構造は次のとおりです。

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

ファイルを編集したあと、キャッシュをクリアしてウォームアップします。

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

キャッシュを更新すると、ログインページに外部ログインボタンが表示されます。

## サポートされる方式

* **[OAuth2](oauth2.md)** — Azure AD、Keycloak、Facebook、および汎用 OAuth2 プロバイダー
* **[Azure Entra ID](azure-entra-id.md)** — Azure/Entra ID の詳細なセットアップ：アプリ登録、グループベースのロールマッピング、証明書認証、ユーザー／グループ同期コマンド
* **[LDAP](ldap.md)** — LDAP または Active Directory サーバーに対する認証
* **[CAS](cas.md)** — Central Authentication Service（レガシー。3.x では動作しません）
* **[SCIM](scim.md)** — 外部アイデンティティプロバイダーからの自動ユーザープロビジョニング
* **[SSO Configuration](sso-configuration.md)** — トラブルシューティングと方式横断の注意事項

## デフォルト認証

デフォルトでは、Chamilo は独自の内部システムを使用します。ユーザーは Chamilo データベースに保存されたユーザー名とパスワードでログインします。外部方式は追加的です。標準のログインフォームは、設定したプロバイダーと並んで引き続き利用できます。

## 参考情報

パラメータの完全なリファレンスと高度なシナリオについては、[External Authentication configuration wiki page](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) を参照してください。