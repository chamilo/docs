# OAuth2

OAuth2認証は`config/authentication.yaml`で設定されます。Chamiloには、Azure AD、Keycloak、Facebook、および任意の汎用的なOAuth2準拠プロバイダーに対する組み込みサポートが含まれています。

## ステップ1 — アイデンティティプロバイダーにChamiloを登録する

プロバイダーの管理パネルでアプリケーションを作成し、**リダイレクトURI**を以下のように設定してください：

```
https://your-chamilo-url/connect/<provider>/check
```

ここで`<provider>`は`azure`、`keycloak`、`facebook`、または汎用プロバイダーに付けた名前です。**クライアントID**と**クライアントシークレット**をメモしておいてください。

## ステップ2 — authentication.yamlを設定する

プロバイダーを有効にし、その認証情報を提供します。すべてのプロバイダーは以下の共通キーを共有しています：

| キー | 説明 |
|-----|-------------|
| `enabled` | `true`で有効化 |
| `title` | ログインボタンに表示されるラベル |
| `client_id` | アイデンティティプロバイダーから取得 |
| `client_secret` | アイデンティティプロバイダーから取得 |
| `allow_create_new_users` | 初回ログイン時にChamiloアカウントを自動作成 |
| `allow_update_user_info` | ログインごとにユーザーデータを同期 |
| `force_as_login_method` | 他の方法を無効化し、この方法を強制 |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Microsoftでサインイン"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azureは、グループベースのロールマッピング（AzureグループIDをChamiloの教師や管理者などのロールにマッピング）、ユーザーデルタ同期コマンド、クライアントシークレットの代わりに証明書認証もサポートしています。これらのオプションについては、[wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)を参照してください。

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Keycloakでサインイン"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Facebookでサインイン"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### 汎用OAuth2

Google、GitLab、またはその他のOAuth2準拠プロバイダーに使用します：

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "MyProviderでサインイン"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

フィールドマッピング（プロバイダーの属性をChamiloの`firstname`、`lastname`、`email`などにマッピングする方法）やロールマッピングも設定可能です。マッピングキーの完全なリストについては、[wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration)を参照してください。

## ステップ3 — キャッシュをクリアしてテストする

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Chamiloからログアウトします。設定したプロバイダーのボタンがログインページに表示されるはずです。すべてのユーザーに展開する前に、専用のアカウントでテストしてください。

## ヒント

* OAuth2に問題が発生した場合に管理者が常にログインできるように、標準のログインフォームを有効にしておいてください。
* 既存のユーザーとAzureを使用する場合、`existing_user_verification_order`を設定して、Chamiloが受信したユーザーを既存のアカウントにどのようにマッチングするかを制御します。
* ロールの割り当てはデフォルトで学生になっています。グループマッピングを使用して、ユーザーを教師や管理者ロールに自動的に昇格させることができます。