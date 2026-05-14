# 認証

Chamilo APIは、認証に**JWT (JSON Web Tokens)**を使用しており、`lexik/jwt-authentication-bundle`を介して実装されています。

## トークンの取得

認証エンドポイントにPOSTリクエストを送信します：

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

レスポンス：

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## トークンの使用

後続のリクエストの`Authorization`ヘッダーにトークンを含めます：

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## トークンのライフサイクル

* トークンには設定可能な有効期限があります
* トークンが期限切れになった場合、クライアントは新しいトークンをリクエストする必要があります
* JWTキーは`config/jwt/`に保存されています（秘密鍵と公開鍵）

## JWTキーの生成

```bash
php bin/console lexik:jwt:generate-keypair
```

これにより以下が作成されます：
* `config/jwt/private.pem` — トークン署名用の秘密鍵
* `config/jwt/public.pem` — トークン検証用の公開鍵

`.env`ファイルでパスフレーズを設定します：

```env
JWT_PASSPHRASE=your-passphrase
```

## APIドキュメント

環境変数で`APP_ENABLE_API_ENTRYPOINT=1`が設定されている場合、APIドキュメントは`/api`で利用可能です。これにより、エンドポイントの探索とテストのためのインタラクティブなSwagger/OpenAPIインターフェースが提供されます。