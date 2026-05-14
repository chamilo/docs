# 认证

Chamilo API 使用 **JWT (JSON Web Tokens)** 进行认证，通过 `lexik/jwt-authentication-bundle` 实现。

## 获取令牌

向认证端点发送 POST 请求：

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

在后续请求的 `Authorization` 头中包含令牌：

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## 令牌生命周期

* 令牌具有可配置的过期时间
* 当令牌过期时，客户端必须请求一个新的令牌
* JWT 密钥存储在 `config/jwt/` 中（私钥和公钥）

## 生成 JWT 密钥

```bash
php bin/console lexik:jwt:generate-keypair
```

这将创建：
* `config/jwt/private.pem` — 用于签名令牌的私钥
* `config/jwt/public.pem` — 用于验证令牌的公钥

在 `.env` 中配置 passphrase：

```env
JWT_PASSPHRASE=your-passphrase
```

## API 文档

当环境中设置了 `APP_ENABLE_API_ENTRYPOINT=1` 时，API 文档可在 `/api` 访问。这提供了一个交互式的 Swagger/OpenAPI 界面，用于探索和测试端点。