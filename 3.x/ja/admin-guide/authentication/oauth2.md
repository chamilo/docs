# OAuth2

OAuth2 認証は `config/authentication.yaml` で設定します。Chamilo は Azure AD、Keycloak、Facebook、および汎用の OAuth2 準拠プロバイダーに対する組み込みサポートを備えています。

## Step 1 — アイデンティティプロバイダーに Chamilo を登録する

プロバイダーの管理画面でアプリケーションを作成し、**リダイレクト URI** を次のように設定します。

```
https://your-chamilo-url/connect/<provider>/check
```

`<provider>` は `azure`、`keycloak`、`facebook`、または汎用プロバイダーに付ける名前です。**Client ID** と **Client Secret** を控えてください。

## Step 2 — authentication.yaml を設定する

プロバイダーを有効にし、資格情報を指定します。すべてのプロバイダーで次の共通キーを使用します。

| Key | Description |
|-----|-------------|
| `enabled` | 有効化するには `true` |
| `title` | ログインボタンに表示されるラベル |
| `client_id` | アイデンティティプロバイダーから取得 |
| `client_secret` | アイデンティティプロバイダーから取得 |
| `allow_create_new_users` | 初回ログイン時に Chamilo アカウントを自動作成する |
| `allow_update_user_info` | 毎回のログイン時にユーザーデータを同期する |
| `force_as_login_method` | 他の方式を隠し、このプロバイダーのボタンだけを表示する |
| `force_redirect` | 匿名の訪問者をボタン操作なしでこのプロバイダーへ自動送信する |
| `skip_force_redirect_in` | `force_redirect` の対象外とする URL フラグメントの一覧 |

### Azure AD (Microsoft Entra ID)

Azure には、アプリ登録、グループベースのロールマッピング、証明書認証、アカウントプロビジョニング同期コマンドを扱う専用ページがあります — [Azure Entra ID](azure-entra-id.md) を参照してください。

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
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
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Generic OAuth2

Google、GitLab、または任意の OAuth2 準拠プロバイダーにはこれを使用します。

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

フィールドマッピング（プロバイダー属性を Chamilo の `firstname`、`lastname`、`email` などに対応付ける方法）およびロールマッピングも設定できます。マッピングキーの完全な一覧は [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) を参照してください。

## Optional — すべての訪問者をプロバイダーへ自動送信する

ログインページを訪問者がどの程度見るかを制御するキーが 2 つあります。これらは独立しており、それぞれ異なるニーズに応えます。

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | このプロバイダーのボタンだけに縮小されたログインページ。訪問者はそれをクリックします。 |
| `force_redirect: true` | ログインページは一切表示されません。ブラウザーが自らプロバイダーへ移動します。 |

アイデンティティプロバイダーがすべてのアカウントを管理しており、ローカルのログインフォームに意味がない場合は `force_redirect` を使用します。

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

リダイレクトを強制できるプロバイダーは 1 つだけです。複数が宣言した場合は、有効になっている最初のものが優先されます。LDAP はローカルフォーム経由で認証するため、これを宣言できません。

リダイレクトはブラウザーが表示するページにのみ適用され、それ以外には適用されません。次のリクエストは常にそのまま残ります。

* ブラウザー向けのハンドシェイクに従えない API、SCIM、MCP、または XHR 呼び出し。
* 画像、スタイルシート、またはファイルダウンロード。
* 任意の書き込み（POST、PUT、DELETE）。ブラウザーはリダイレクトされた書き込みを GET として再送し、本文を破棄するためです。
* プロバイダーのハンドシェイク自体（`/connect/...`）および `/logout`。そうしないと無限ループになります。
* すでにセッションを持つ訪問者（公開コースの匿名アカウントを含む）。

コースカタログなど、公開したままにする各公開領域について、URL フラグメントを `skip_force_redirect_in` に追加してください。

### 脱出ハッチ

プロバイダーに到達できないと、ローカル管理者を含むすべてのアカウントがロックアウトされます。任意の URL に `skipForcedRedirect=1` を付ければ、それでもローカルのログインフォームに到達できます。

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

この選択はセッションに残るため、続くページでもフォームが表示され続けます。また、そのセッションでは `force_as_login_method` が取り消され、すべてのログイン方法がページに戻ります。プラットフォームをプロバイダーに戻すには `?skipForcedRedirect=0` を使うか、ブラウザーセッションを閉じてください。

このパラメーターは `force_redirect` 専用です。どのプロバイダーもそのキーを宣言していない間は、パラメーターは何もせず、`force_as_login_method` は単一のボタンのままです。

この URL を復旧メモと一緒に保管してください。本番で `force_redirect` を有効にする前にテストしてください。

## ステップ 3 — キャッシュのクリアとテスト

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Chamilo からログアウトします。設定したプロバイダーのボタンがログインページに表示されるはずです。全ユーザーに展開する前に、専用アカウントでテストしてください。

## ヒント

* 標準のログインフォームは有効のままにしておき、OAuth2 に問題があっても管理者が常にログインできるようにします。`force_redirect` を設定した場合は、代わりに `?skipForcedRedirect=1` の URL を覚えておいてください。それがそのフォームに戻る唯一の方法です。
* ロールの割り当ては既定では学生です。グループマッピング（Azure）を使って、ユーザーを教師または管理者ロールに自動昇格させてください — その詳細と、受信ユーザーを既存アカウントに照合する方法については [Azure Entra ID](azure-entra-id.md) を参照してください。