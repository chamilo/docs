# API de inscrição de estudantes em sessões

As integrações podem listar, inscrever e remover formandos numa sessão através de endpoints exclusivos de administradores. Estas ações utilizam o comportamento de inscrição em sessões dos ecrãs de administração do Chamilo. São distintas de `/api/course-sessions/actions/*`, que pertence a um fluxo de trabalho diferente, orientado para tutores.

## Autenticação e acesso

Todas as operações abaixo exigem autenticação com o papel de plataforma `ROLE_ADMIN`. Ser apenas administrador de sessão **não** concede acesso. Utilize o método de autenticação descrito em [Autenticação](authentication.md).

Em instalações multi-URL, a sessão solicitada deve pertencer ao URL de acesso atual; caso contrário, o endpoint responde com `404`.

## Rotas

| Método | Endpoint | Finalidade |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Listar os IDs de utilizador dos formandos inscritos nesta sessão |
| `POST` | `/api/sessions/{id}/students/subscribe` | Adicionar os formandos especificados, mantendo os formandos existentes |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Remover apenas os formandos especificados |

Substitua `{id}` pelo ID numérico da sessão. Em ambos os pedidos POST, envie JSON que contenha o array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Uma inscrição bem-sucedida produz uma resposta com a seguinte estrutura; os IDs dependem da sua instalação:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` contém os formandos recém-inscritos; `alreadyThere` contém os formandos já inscritos; `ignored` lista IDs inelegíveis ou indisponíveis. Ao inscrever, o Chamilo também inscreve os formandos adicionados nos cursos da sessão. **Não** substitui a lista completa de inscritos da sessão.

Para consultar a inscrição:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Para remover formandos selecionados:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

A resposta de anulação da inscrição contém `success`, `applied` (IDs removidos) e `ignored` (IDs não inscritos). Os restantes formandos permanecem na sessão.

## Validação e limitações

* `userIds` deve ser um array de IDs numéricos (inteiros ou cadeias compostas apenas por dígitos). Os IDs repetidos são desduplicados; os valores não positivos são omitidos.
* Para a inscrição, os utilizadores elegíveis devem existir, não estar eliminados de forma lógica, não ser anónimos nem gestores de RH, e pertencer ao URL de acesso atual.
* JSON ou `userIds` em falta ou malformados devolvem `400 Bad Request`.
* Sessões em falta ou fora do âmbito devolvem `404 Not Found`; quem invoca sem permissão de administrador não pode utilizar estas rotas.
* As rotas de inscrição de estudantes **não** são endpoints CRUD genéricos para a entidade `Session` e não aceitam uma lista de inscritos da sessão como documento de substituição.

Para a interface de administração correspondente, consulte [Gerir sessões](../../admin-guide/sessions/managing-sessions.md). Para copiar uma sessão modelo antes de inscrever estudantes, consulte [Duplicação de sessões](session-duplication.md).

**Implementação:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Adicionado no commit `bdfb2dd661` do Chamilo LMS.