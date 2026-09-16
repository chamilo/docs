# 身份认证

Chamilo API 使用 **JWT（JSON Web Tokens）** 进行身份认证，通过 `lexik/jwt-authentication-bundle` 实现。

## 获取令牌

向身份认证端点发送 POST 请求：

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

响应：

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## 使用令牌

在后续请求的 `Authorization` 标头中包含该令牌：

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## 令牌生命周期

* 令牌具有可配置的过期时间
* 令牌过期后，客户端必须重新请求新令牌
* JWT 密钥存储在 `config/jwt/`（私钥与公钥）

## 生成 JWT 密钥

```bash
php bin/console lexik:jwt:generate-keypair
```

这将创建：
* `config/jwt/private.pem` — 用于签署令牌的私钥
* `config/jwt/public.pem` — 用于验证令牌的公钥

在 `.env` 中配置口令：

```env
JWT_PASSPHRASE=your-passphrase
```

## API 文档

当环境中设置 `APP_ENABLE_API_ENTRYPOINT=true` 时，可在 `/api` 访问 API 文档。该页面提供交互式 Swagger/OpenAPI 界面，用于浏览和测试各端点。

仅设置该变量还不够——必须清除 Symfony 缓存后更改才会生效。请参阅管理员指南中的 [环境变量（.env）](../../admin-guide/installation/configuration.md#enable-the-api-documentation)。