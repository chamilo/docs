# Azure Entra ID

Microsoft は 2023 年に Azure Active Directory（Azure AD）を **Microsoft Entra ID** に改称しました。サービス自体は同一であり、Chamilo のコードと設定では引き続き `azure` として参照されています。本ページでは、アプリ登録、グループに基づくロールマッピング、証明書認証、専用のユーザー／グループ同期コマンドなど、Azure 固有の統合部分を扱います。すべてのプロバイダーで共通の設定キー（`enabled`、`title`、`allow_create_new_users` など）および一般的な `authentication.yaml` の構造については、[OAuth2](oauth2.md) を参照してください。

## Microsoft Entra ID への Chamilo の登録

1. Entra 管理センターで、Chamilo 用の **アプリの登録** を作成します。
2. リダイレクト URI（プラットフォームの種類は **Web**）を次のように設定します。

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. **アプリケーション（クライアント）ID** と **ディレクトリ（テナント）ID** を控えておきます。両方必要です。
4. **証明書とシークレット** で、クライアント シークレットを作成するか、証明書をアップロードします（後述の [証明書認証](#certificate-authentication) を参照）。
5. **API のアクセス許可** で、以下の Microsoft Graph のアクセス許可を追加し、管理者の同意を付与します。

| アクセス許可 | 種類 | 用途 |
|------------|------|-------------|
| `User.Read` | 委任 | 基本的なサインイン |
| `GroupMember.Read.All` | 委任 | ログイン時のグループに基づくロールマッピング |
| `User.Read.All` | アプリケーション | `app:azure-sync-users` |
| `GroupMember.Read.All` または `Group.Read.All` | アプリケーション | `app:azure-sync-users` および `app:azure-sync-usergroups` |

アプリケーションのアクセス許可には管理者の同意が必要であり、同期用コンソール コマンド（`client_credentials` グラント経由）でのみ使用され、対話的なユーザーのログインでは使用されません。

## 基本設定

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
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

### マルチテナントとシングルテナント

`tenant` の値は、アプリ登録の「サポートされているアカウントの種類」の設定と一致している必要があります。

* 特定のテナント GUID — シングルテナント。その組織のアカウントのみがサインイン可能
* `organizations` — 任意の Entra ID テナント
* `common` — 任意の Entra ID テナントおよび個人の Microsoft アカウント

## 必須のユーザー属性

Chamilo にログインする必要があるすべての Entra ID ユーザーには、`mail` と `mailNickname` が設定されている必要があります。いずれかが空だとログイン時にエラーになります（常に存在する不変の Entra オブジェクト ID とともに）。Microsoft Graph から Chamilo へのフィールド マッピングは、Azure では **固定** です（フィールド マッピングを設定できる汎用 OAuth2 プロバイダーとは異なります）。

| Chamilo のフィールド | Microsoft Graph のソース |
|---------------|------------------------|
| 名 | `givenName` |
| 姓 | `surname` |
| メール | `mail` |
| ユーザー名 | `userPrincipalName` |
| 電話 | `telephoneNumber`、次に `businessPhones[0]`、次に `mobilePhone` |
| 有効 | `accountEnabled` |
| インターフェイス言語 | `preferredLanguage`（インストール済みの Chamilo 言語に照合し、該当しない場合はプラットフォームの既定値） |

ログインが成功するたびに、さらに 3 つのフィールドも書き込まれます。`organisationemail`（= `mail`）、`azure_id`（= `mailNickname`）、`azure_uid`（= Entra オブジェクト ID）です。これらは後述のアカウント照合ロジックの基盤となります。

## 既存の Chamilo アカウントへのログイン照合

`existing_user_verification_order` に数字 `1`〜`3` のカンマ区切りリストを設定し、受信した Entra ID ログインを既存の Chamilo アカウントに照合する方法を制御します。

| 値 | 照合対象 |
|-------|------------------|
| `1` | 追加フィールド `organisationemail` == Entra の `mail` |
| `2` | 追加フィールド `azure_id` == Entra の `mailNickname` |
| `3` | 追加フィールド `azure_uid` == Entra オブジェクト ID |

記載された順に試行され、最初の有効な（論理削除されていない）一致が採用されます。無効または空の値は `1,2,3` にフォールバックします。設定した位置のいずれも一致しない場合（該当ユーザーの初回ログインでは常にそうなります。これらの追加フィールドは *ログイン成功後* にのみ設定されるため）、設定内容にかかわらず、Chamilo は自前の `email` フィールドを Entra の `mail` と照合し、次に `username` を `userPrincipalName` と照合します。

## グループベースのロールマッピング

Entra ID のセキュリティグループを、その Object ID（GUID）を使って Chamilo のロールにマッピングします。

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

ログインのたびに、Chamilo はユーザー自身のアクセストークンで Microsoft Graph の `/v1.0/me/memberOf` を呼び出し、返されたグループをこれら 3 つの ID と、**admin → session_admin → teacher** の順で照合します。最初に一致したものが採用されます。admin グループと teacher グループの両方に属するユーザーは、admin にのみ昇格します。設定されたどのグループにも属していないユーザーは、既存のロールを維持します（初回ログイン時はデフォルトの学生ロール）。これには、上記の委任型権限 `GroupMember.Read.All` が必要です。

## 証明書認証

`client_secret` の代替として、証明書で認証できます。

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

対応する公開証明書をアプリ登録の **Certificates & secrets** にアップロードし、その拇印（ポータルでは 16 進数で表示されます）を `client_certificate_thumbprint` にコピーします。両方のキーが設定されている場合、Chamilo は `client_secret` を送信する代わりに署名付き JWT クライアントアサーション（RS256）を構築します。これは対話型ログインと、同期コマンドのアプリ専用認証の両方に適用されます。

## Entra ID からのユーザーおよびグループの同期

2 つのコンソールコマンドが、対話型ログインとは独立して、Entra ID から直接 Chamilo アカウントをプロビジョニングおよび維持します。どちらもアプリ専用（`client_credentials`）で認証するため、上記の **アプリケーション** Graph 権限が必要です。また、手動実行ではなく cron でスケジュールすることを想定しています。

### `app:azure-sync-users`

Microsoft Graph からユーザーを取得し、対話型ログインと同じフィールドマッピングおよびアカウント照合ロジックを使って、対応する Chamilo アカウントをプロビジョニング／更新します。

* デフォルトでは全ユーザー一覧（`/v1.0/users`、ページング）を取得します。`script_users_delta: true` を設定すると、代わりに `/v1.0/users/delta` を使用します。Chamilo は実行間でデルタリンクを保持するため、以降の実行では変更分のみを取得します。
* `deactivate_nonexisting_users: true` を設定すると、Entra ID の取得結果に現れなくなった Chamilo アカウント（認証ソースが Azure のもの）を無効化します。これはフル取得モードでのみ機能します。デルタモードは完全なユーザー一覧を返さないため、`script_users_delta` が有効な場合はこの設定は無視されます。
* 上記のグループロールマッピングは、ログイン時だけでなく、この実行中に同期されるすべてのユーザーに対して再適用されます。

### `app:azure-sync-usergroups`

Entra ID のグループを取得し、Chamilo のクラス（`Usergroup`）としてミラーします。

* 全グループ一覧（`/v1.0/groups`）を取得するか、`script_usergroups_delta: true` の場合はデルタエンドポイントを使用します。デルタリンクは別途追跡されます。
* `group_filter_regex` は、グループの表示名に対して照合し、同期するグループを制限します。
* **毎回の実行で、一致する Chamilo クラスの既存メンバーをすべて先にクリアし**、その後 Graph が現在返すメンバーを再登録します。メンバーは、ログイン時と同じ[既存の Chamilo アカウントへの照合ロジック](#matching-logins-to-existing-chamilo-accounts)を使って、*既存の* Chamilo ユーザーにのみ照合されます。このコマンドは新しいユーザーアカウントを作成せず、既存の Chamilo アカウントに照合できないグループメンバーは黙ってスキップされます。

## 既知の制限

* **シングルログアウトはありません。** Chamilo からサインアウトしても、Entra ID や他の接続アプリケーションからはサインアウトされません。`authentication.yaml` に `force_logout` 設定キーは存在しますが、現時点では実装されていません。予約済みであり、機能していないものとして扱ってください。
* **Azure アカウントに対するパスワードリセットは意味がありません。** 認証はすべて Entra ID 経由で行われるため、Chamilo はこれらのアカウント用の利用可能なローカルパスワードを保持しません。

## トラブルシューティング

* ログイン失敗（必須属性の欠落、Graph API エラー）は、ログインページ上のフラッシュメッセージとしてユーザーに表示されます。
* 同期コマンドはレコードごとに問題を警告として記録し、最初のエラーで中断せずバッチの残りを処理し続けます。各実行後にコマンドのコンソール出力（または cron がキャプチャする場所）を確認してください。
* Entra ID 連携が不調な場合でも管理者が常に入れるよう、標準の Chamilo ログインフォームは有効のままにしておいてください。