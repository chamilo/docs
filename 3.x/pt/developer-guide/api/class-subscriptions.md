# API de associação e inscrição em turmas

Para integrações, o Chamilo disponibiliza endpoints para ler e sincronizar os membros, as sessões e os cursos associados a uma **turma** existente. Uma turma é um `Usergroup` do tipo *turma normal*; estas rotas **não** se aplicam a grupos sociais.

Ao contrário da API de estudantes da sessão, as três ações `PUT` da turma **substituem a lista especificada na íntegra**. Os IDs omitidos são removidos dessa relação. Leia a lista existente antes de a atualizar e evite utilizar `PUT` para adicionar apenas um membro, a menos que também submeta todos os que devem permanecer.

## Autorização

Todas as rotas abaixo exigem o papel autenticado da plataforma `ROLE_ADMIN`. A turma de destino deve estar disponível no URL de acesso atual. Uma turma inexistente ou fora do âmbito devolve `404`; um usergroup que não seja uma turma normal devolve `409 Conflict`.

O controlador verifica se os IDs de utilizador, curso e sessão submetidos existem. Numa instalação multi-URL, os **IDs de curso e de sessão** submetidos são filtrados para o portal atual; contudo, a implementação atual **não** aplica esse mesmo filtro de portal aos **IDs de utilizador**. Os integradores não devem tratar este endpoint como garantia de isolamento de portal ao nível do utilizador. Consulte as notas de revisão da entrega relativamente a esta consideração de segurança pendente.

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

| Método | Endpoint | Propriedade do pedido |
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

`applied` lista os IDs aceites, não necessariamente os IDs recém-adicionados. `ignored` identifica os IDs solicitados que não puderam ser aplicados (por exemplo, um ID desconhecido ou um curso/sessão fora do portal atual). Os valores não positivos são omitidos, os duplicados são removidos e um JSON malformado ou uma propriedade do pedido que não seja um array devolve `400`.

Para substituir as sessões associadas, chame `PUT /api/usergroups/31/sessions` com `{ "sessionIds": [42, 57] }`. Para substituir os cursos associados, chame `PUT /api/usergroups/31/courses` com `{ "courseIds": [8, 11] }`.

**Importante:** o Chamilo aplica estas alterações através dos métodos de sincronização de `UsergroupHelper`. Alterar a lista de membros da turma ou as suas associações a sessões/cursos pode também alterar inscrições relacionadas. Não manipule diretamente as tabelas de relações de usergroup e reveja o efeito da substituição de listas antes de executar uma integração em produção.

Para a interface e o conceito, consulte [Turmas](../../admin-guide/sessions/classes.md). Para adicionar ou remover formandos específicos de uma sessão *sem* substituir todos os membros, utilize a [API de inscrição de estudantes na sessão](session-students.md).

**Implementação:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Adicionado no commit `d8809925a4` do Chamilo LMS.