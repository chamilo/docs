# Status da conta de usuário

O campo `active` de um usuário é o status da conta. Um administrador bloqueia ou desbloqueia uma conta alterando-o com `PATCH /api/users/{id}`. Isso substitui o campo `active` do webservice `webservices/api/v2.php` da versão 1.11.x.

## Valores

| `active` | Significado |
|----------|---------|
| `1` | Ativo: o usuário pode fazer login |
| `0` | Inativo: a conta está bloqueada |
| `-1` | Desativado automaticamente pela plataforma |
| `-2` | Excluído (na lixeira) |

A API só pode definir `1` ou `0`. A exclusão é feita por meio de `DELETE /api/users/{id}`, e a restauração de uma conta excluída, pela lixeira da administração.

## Leitura do status

`active` é retornado por `GET /api/users/{id}` e por `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Alteração do status

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

A resposta é o usuário atualizado. Envie `{ "active": 1 }` para desbloquear a conta. `active` pode ser enviado juntamente com outros campos do usuário.

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Qualquer usuário que possa editar, exceto a própria conta |
| Qualquer outro usuário | Não permitido, nem mesmo na própria conta |

O envio do valor atual nunca é recusado; portanto, um cliente que reenvia o usuário completo não é bloqueado.

## Erros

| Status | Quando |
|--------|------|
| `400` | Um valor diferente de `0` ou `1` |
| `401` | Credenciais ausentes ou inválidas |
| `403` | O chamador não é administrador ou altera o próprio status |
| `404` | O usuário não existe |