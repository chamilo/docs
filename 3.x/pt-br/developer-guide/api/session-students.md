# API de inscrição de estudantes em sessões

As integrações podem listar, inscrever e remover aprendizes em uma sessão por meio de endpoints exclusivos para administradores. Essas ações utilizam o comportamento de inscrição em sessões das telas de administração do Chamilo. Elas são distintas de `/api/course-sessions/actions/*`, que pertence a um fluxo de trabalho diferente, orientado a tutores.

## Autenticação e acesso

Todas as operações abaixo exigem autenticação com o papel de plataforma `ROLE_ADMIN`. Ser apenas administrador da sessão **não** concede acesso. Utilize o método de autenticação descrito em [Autenticação](authentication.md).

Em instalações com múltiplas URLs, a sessão solicitada deve pertencer à URL de acesso atual; caso contrário, o endpoint responde com `404`.

## Rotas

| Método | Endpoint | Finalidade |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Listar os IDs de usuário dos aprendizes inscritos nesta sessão |
| `POST` | `/api/sessions/{id}/students/subscribe` | Adicionar os aprendizes especificados, mantendo os aprendizes existentes |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Remover apenas os aprendizes especificados |

Substitua `{id}` pelo ID numérico da sessão. Em ambas as requisições POST, envie JSON contendo o array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Uma inscrição bem-sucedida produz uma resposta com a estrutura a seguir; os IDs dependem da sua instalação:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` contém os aprendizes recém-inscritos; `alreadyThere` contém os aprendizes já inscritos; `ignored` lista IDs inelegíveis ou indisponíveis. Ao inscrever, o Chamilo também inscreve os aprendizes adicionados nos cursos da sessão. Ele **não** substitui a lista completa de participantes da sessão.

Para inspecionar a participação:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Para remover aprendizes selecionados:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

A resposta de cancelamento de inscrição contém `success`, `applied` (IDs removidos) e `ignored` (IDs não inscritos). Os demais aprendizes permanecem na sessão.

## Validação e limitações

* `userIds` deve ser um array de IDs numéricos (inteiros ou strings compostas apenas por dígitos). IDs repetidos são deduplicados; valores não positivos são omitidos.
* Para a inscrição, os usuários elegíveis devem existir, não estar excluídos logicamente (soft-deleted), não ser anônimos nem gestores de RH, e pertencer à URL de acesso atual.
* JSON ou `userIds` ausentes ou malformados retornam `400 Bad Request`.
* Sessões inexistentes ou fora do escopo retornam `404 Not Found`; chamadores sem permissão de administrador não podem utilizar essas rotas.
* As rotas de inscrição de estudantes **não** são endpoints CRUD genéricos para a entidade `Session` e não aceitam a lista de participantes da sessão como documento de substituição.

Para a interface de administração correspondente, consulte [Gerenciamento de sessões](../../admin-guide/sessions/managing-sessions.md). Para copiar uma sessão modelo antes de inscrever estudantes, consulte [Duplicação de sessões](session-duplication.md).

**Implementação:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Adicionado no commit `bdfb2dd661` do Chamilo LMS.