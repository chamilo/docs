# SCIM

**SCIM**（System for Cross-domain Identity Management）は、ユーザープロビジョニングを自動化し、アイデンティティプロバイダー側の変更に基づいて Chamilo アカウントの作成、更新、無効化を行います。OAuth2 や LDAP とは異なり、SCIM が扱うのはプロビジョニングであり、ログインではありません。

| シナリオ | SCIM の動作 |
|----------|-------------|
| 新しい従業員が入社する | Chamilo アカウントを作成する |
| 従業員の氏名や役割が変更される | Chamilo アカウントを更新する |
| 従業員が退職する | Chamilo アカウントを無効化または削除する |

## Configuration

### 1. Set the SCIM token

`.env`（または `.env.local`）ファイルで、安全なランダムトークンを定義します。

```
SCIM_TOKEN=your-secure-random-token
```

このトークンは、アイデンティティプロバイダーが Chamilo の SCIM エンドポイントへのリクエストを認証するために使用します。

### 2. Enable SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

編集後、キャッシュをクリアしてウォームアップします。

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configure your identity provider

アイデンティティプロバイダー（Azure AD、Okta など）で次を行います。

1. Chamilo を SCIM アプリケーションとして追加する
2. SCIM ベース URL を `https://your-chamilo-url/scim/v2/` に設定する
3. 手順 1 のトークンをベアラートークンとして入力する
4. プロバイダーの属性を SCIM 標準フィールド（userName、name.givenName、name.familyName、emails）にマッピングする
5. 自動プロビジョニングを有効にする

## SCIM endpoints

Chamilo は SCIM 2.0 を実装しています。

| Endpoint | Method | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List users |
| `/scim/v2/Users` | POST | Create a user |
| `/scim/v2/Users/{id}` | GET | Get a user |
| `/scim/v2/Users/{id}` | PUT | Replace a user |
| `/scim/v2/Users/{id}` | PATCH | Update a user |
| `/scim/v2/Users/{id}` | DELETE | Remove a user |

## Tips

* **テストグループから始める** — 組織全体で SCIM を有効にする前に、少数のユーザーでプロビジョニングを試してください。
* **OAuth2 と組み合わせる** — よくある構成では、ログインに Azure AD OAuth2、プロビジョニングに Azure AD SCIM を使用します。
* **ログを監視する** — エラーについては、Chamilo（`var/log/`）とアイデンティティプロバイダー側のプロビジョニングログの両方を確認してください。