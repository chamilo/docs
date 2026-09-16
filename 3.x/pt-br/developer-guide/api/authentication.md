# Autenticação

A API do Chamilo utiliza **JWT (JSON Web Tokens)** para autenticação, implementada por meio do `lexik/jwt-authentication-bundle`.

## Obtendo um Token

Envie uma requisição POST para o endpoint de autenticação:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Resposta:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Utilizando o Token

Inclua o token no cabeçalho `Authorization` das requisições subsequentes:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Ciclo de Vida do Token

* Os tokens possuem um tempo de expiração configurável
* Quando um token expira, o cliente deve solicitar um novo
* As chaves JWT são armazenadas em `config/jwt/` (chaves privada e pública)

## Gerando Chaves JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Isso cria:
* `config/jwt/private.pem` — Chave privada para assinar os tokens
* `config/jwt/public.pem` — Chave pública para verificar os tokens

Configure a senha (passphrase) em `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Documentação da API

Quando `APP_ENABLE_API_ENTRYPOINT=true` está definido no ambiente, a documentação da API fica disponível em `/api`. Isso fornece uma interface interativa Swagger/OpenAPI para explorar e testar os endpoints.

Definir a variável por si só não é suficiente — o cache do Symfony deve ser limpo para que a alteração tenha efeito. Consulte [Variáveis de Ambiente (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) no Guia do Administrador.