# Estado da conta do utilizador

O campo `active` de um utilizador é o estado da conta. Um administrador bloqueia ou desbloqueia uma conta alterando-o com `PATCH /api/users/{id}`. Isto substitui o campo `active` do serviço web `webservices/api/v2.php` da versão 1.11.x.

## Valores

| `active` | Significado |
|----------|---------|
| `1` | Ativo: o utilizador pode iniciar sessão |
| `0` | Inativo: a conta está bloqueada |
| `-1` | Desativado automaticamente pela plataforma |
| `-2` | Eliminado (no lixo) |

A API só pode definir `1` ou `0`. A eliminação faz-se através de `DELETE /api/users/{id}`, e o restauro de uma conta eliminada através do lixo da administração.

## Leitura do estado

`active` é devolvido por `GET /api/users/{id}` e por `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Alteração do estado

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

A resposta é o utilizador atualizado. Envie `{ "active": 1 }` para desbloquear a conta. `active` pode ser enviado juntamente com outros campos do utilizador.

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Qualquer utilizador que possa editar, exceto a sua própria conta |
| Qualquer outro utilizador | Não permitido, mesmo na sua própria conta |

O envio do valor atual nunca é recusado, pelo que um cliente que reenvie o utilizador completo não é bloqueado.

## Erros

| Estado | Quando |
|--------|------|
| `400` | Um valor diferente de `0` ou `1` |
| `401` | Credenciais inexistentes ou inválidas |
| `403` | O chamador não é administrador, ou altera o seu próprio estado |
| `404` | O utilizador não existe |