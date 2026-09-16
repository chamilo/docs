# SCIM

**SCIM** (System for Cross-domain Identity Management、クロスドメインID管理システム) は、ユーザーのプロビジョニングを自動化します。Chamilo アカウントの作成、更新、無効化を、アイデンティティプロバイダーの変更に基づいて行います。OAuth2 や LDAP とは異なり、SCIM はプロビジョニングを扱い、ログインは扱いません。

| シナリオ | SCIM のアクション |
|----------|-------------|
| 新しい従業員が入社する | Chamilo アカウントを作成する |
| 従業員の名前や役割が変更される | Chamilo アカウントを更新する |
| 従業員が退職する | Chamilo アカウントを無効化または削除する |

## 設定

### 1. SCIM トークンの設定

`.env`（または `.env.local`）ファイルに、安全なランダムトークンを定義します：

```
SCIM_TOKEN=your-secure-random-token
```

このトークンは、アイデンティティプロバイダーが Chamilo の SCIM エンドポイントへのリクエストを認証するために使用されます。

### 2. authentication.yaml で SCIM を有効化する

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

編集後にキャッシュをクリアし、ウォームアップします：

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. アイデンティティプロバイダーの設定

アイデンティティプロバイダー（Azure AD、Okta など）で以下の手順を行います：

1. Chamilo を SCIM アプリケーションとして追加する
2. SCIM ベース URL を `https://your-chamilo-url/scim/v2/` に設定する
3. 手順 1 で設定したトークンをベアラートークンとして入力する
4. プロバイダーの属性を SCIM 標準フィールド（userName、name.givenName、name.familyName、emails）にマッピングする
5. 自動プロビジョニングを有効化する

## SCIM エンドポイント

Chamilo は SCIM 2.0 を実装しています：

| エンドポイント | メソッド | アクション |
|----------|--------|--------|
| `/scim/v2/Users` | GET | ユーザーを一覧表示する |
| `/scim/v2/Users` | POST | ユーザーを作成する |
| `/scim/v2/Users/{id}` | GET | ユーザーを取得する |
| `/scim/v2/Users/{id}` | PUT | ユーザーを置き換える |
| `/scim/v2/Users/{id}` | PATCH | ユーザーを更新する |
| `/scim/v2/Users/{id}` | DELETE | ユーザーを削除する |

## ヒント

* **テストグループから始める** — 組織全体に SCIM を有効化する前に、少数のユーザーをプロビジョニングしてテストしてください。
* **OAuth2 と組み合わせる** — 一般的な設定として、Azure AD OAuth2 をログインに、Azure AD SCIM をプロビジョニングに使用することがあります。
* **ログを監視する** — エラーがないか、Chamilo（`var/log/`）とアイデンティティプロバイダーのプロビジョニングログの両方を確認してください。