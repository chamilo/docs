# API de associação e inscrição em turmas

Para integrações, o Chamilo oferece endpoints para ler e sincronizar os membros, as sessões e os cursos associados a uma **turma** existente. Uma turma é um `Usergroup` do tipo *turma normal*; essas rotas **não** se aplicam a grupos sociais.

Ao contrário da API de estudantes da sessão, as três ações `PUT` de turma **substituem toda a lista especificada**. IDs omitidos são removidos dessa relação. Leia a lista existente antes de atualizá-la e evite usar `PUT` para adicionar apenas um membro, a menos que você também envie todos os que devem permanecer.

## Autorização

Todas as rotas abaixo exigem o papel autenticado da plataforma `ROLE_ADMIN`. A turma de destino deve estar disponível na URL de acesso atual. Uma turma ausente ou fora do escopo retorna `404`; um usergroup que não seja uma turma normal retorna `409 Conflict`.

O controlador verifica se os IDs de usuário, curso e sessão enviados existem. Em uma instalação com múltiplas URLs, os **IDs de curso e de sessão** enviados são filtrados para o portal atual; no entanto, a implementação atual **não** aplica esse mesmo filtro de portal aos **IDs de usuário**. Os integradores não devem tratar este endpoint como garantia de isolamento de portal no nível do usuário. Consulte as notas de revisão da entrega sobre esta consideração de segurança pendente.

## Ler relações da turma

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Exemplo de resposta:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Substituir uma lista de relações

| Método | Endpoint | Propriedade da requisição |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Por exemplo, para definir a lista completa de membros da turma:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Exemplo de resposta:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` lista os IDs aceitos, não necessariamente os IDs recém-adicionados. `ignored` identifica os IDs solicitados que não puderam ser aplicados (por exemplo, um ID desconhecido ou um curso/sessão fora do portal atual). Valores não positivos são omitidos, duplicatas são removidas, e um JSON malformado ou uma propriedade da requisição que não seja um array retorna `400`.

Para substituir as sessões vinculadas, chame `PUT /api/usergroups/31/sessions` com `{ "sessionIds": [42, 57] }`. Para substituir os cursos vinculados, chame `PUT /api/usergroups/31/courses` com `{ "courseIds": [8, 11] }`.

**Importante:** o Chamilo aplica essas alterações por meio dos métodos de sincronização de `UsergroupHelper`. Alterar a lista de membros da turma ou seus vínculos de sessão/curso também pode alterar inscrições relacionadas. Não manipule diretamente as tabelas de relação de usergroup e revise o efeito da substituição das listas antes de executar uma integração em produção.

Para a interface e o conceito, consulte [Turmas](../../admin-guide/sessions/classes.md). Para adicionar ou remover estudantes específicos de uma sessão *sem* substituir todos os membros, use a [API de inscrição de estudantes na sessão](session-students.md).

**Implementação:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Adicionado no commit `d8809925a4` do Chamilo LMS.