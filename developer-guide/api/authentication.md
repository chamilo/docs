# 驗證

Chamilo API 使用 **JWT (JSON Web Tokens)** 進行驗證，透過 `lexik/jwt-authentication-bundle` 實作。

## 取得 Token

向驗證端點發送 POST 請求：

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

回應：

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## 使用 Token

在後續請求的 `Authorization` 標頭中包含 token：

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Token 生命週期

* Token 具有可設定的過期時間
* 當 token 過期時，客戶端必須請求新的 token
* JWT 金鑰儲存在 `config/jwt/`（私鑰和公鑰）

## 產生 JWT 金鑰

```bash
php bin/console lexik:jwt:generate-keypair
```

這會產生：
* `config/jwt/private.pem` — 用於簽署 token 的私鑰
* `config/jwt/public.pem` — 用於驗證 token 的公鑰

在 `.env` 中設定密碼語句：

```env
JWT_PASSPHRASE=your-passphrase
```

## API 文件

當環境中設定 `APP_ENABLE_API_ENTRYPOINT=1` 時，API 文件可在 `/api` 取得。這提供互動式的 Swagger/OpenAPI 介面，用於探索和測試端點。