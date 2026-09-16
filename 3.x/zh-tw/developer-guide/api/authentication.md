# 驗證

Chamilo API 使用 **JWT (JSON Web Tokens)** 進行驗證，並透過 `lexik/jwt-authentication-bundle` 實作。

## 取得權杖

向驗證端點傳送 POST 請求：

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

## 使用權杖

在後續請求的 `Authorization` 標頭中附上權杖：

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## 權杖生命週期

* 權杖具有可設定的過期時間
* 權杖過期後，用戶端必須重新申請新權杖
* JWT 金鑰存放於 `config/jwt/`（私鑰與公鑰）

## 產生 JWT 金鑰

```bash
php bin/console lexik:jwt:generate-keypair
```

此指令會建立：
* `config/jwt/private.pem` — 用於簽署權杖的私鑰
* `config/jwt/public.pem` — 用於驗證權杖的公鑰

在 `.env` 中設定通行密語：

```env
JWT_PASSPHRASE=your-passphrase
```

## API 文件

當環境中設定 `APP_ENABLE_API_ENTRYPOINT=true` 時，可於 `/api` 取得 API 文件。此處提供互動式 Swagger/OpenAPI 介面，便於探索與測試端點。

僅設定該變數並不足夠——必須清除 Symfony 快取，變更才會生效。請參閱管理員指南中的 [環境變數 (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation)。