# 認証

Chamilo API は認証に **JWT (JSON Web Tokens)** を使用し、`lexik/jwt-authentication-bundle` により実装されています。

## トークンの取得

認証エンドポイントに POST リクエストを送信します。

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

レスポンス:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## トークンの使用

以降のリクエストの `Authorization` ヘッダーにトークンを含めます。

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## トークンのライフサイクル

* トークンには設定可能な有効期限があります
* トークンの有効期限が切れた場合、クライアントは新しいトークンを要求する必要があります
* JWT キーは `config/jwt/` に保存されます（秘密鍵と公開鍵）

## JWT キーの生成

```bash
php bin/console lexik:jwt:generate-keypair
```

これにより次が作成されます。
* `config/jwt/private.pem` — トークン署名用の秘密鍵
* `config/jwt/public.pem` — トークン検証用の公開鍵

パスフレーズは `.env` で設定します。

```env
JWT_PASSPHRASE=your-passphrase
```

## API ドキュメント

環境で `APP_ENABLE_API_ENTRYPOINT=true` が設定されている場合、API ドキュメントは `/api` で利用できます。エンドポイントの探索とテストのための対話型 Swagger/OpenAPI インターフェースが提供されます。

変数を設定するだけでは不十分です。変更を反映するには Symfony のキャッシュをクリアする必要があります。管理者ガイドの [環境変数 (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) を参照してください。