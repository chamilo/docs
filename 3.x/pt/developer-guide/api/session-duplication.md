# Duplicação de sessões

`POST /api/sessions/{id}/duplicate` cria uma nova sessão a partir de uma **sessão modelo** existente. É a substituição no Chamilo 3 da ação `create_session_from_model` do webservice `webservices/api/v2.php` da versão 1.11.x, e destina-se a integrações que abrem uma nova edição de formação a partir de uma sessão modelo.

## Acesso

| Quem chama | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Qualquer sessão |
| `ROLE_SESSION_MANAGER` | Apenas as sessões que gere (é administrador de sessão do modelo), salvo se a definição **Permitir que os administradores de sessão vejam todas as sessões** estiver ativada |
| Qualquer outra pessoa | `403 Forbidden` |

Autentique-se com um JWT ou uma chave de API externa, conforme descrito em [Autenticação](authentication.md).

## Pedido

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Campo | Obrigatório | Descrição |
|-------|----------|-------------|
| `title` | Sim | Título da nova sessão. Não pode já estar a ser utilizado por outra sessão (máx. 150 caracteres). |
| `startDate` | Sim | Data e hora ISO 8601. Utilizada como data de início de acesso, de visualização e de acesso do formador. |
| `endDate` | Sim | Data e hora ISO 8601, não anterior a `startDate`. Utilizada como data de fim de acesso, de visualização e de acesso do formador. |
| `extraFields` | Não | Valores de campos extra da sessão indexados pela variável do campo. Substituem os valores copiados do modelo. Cada variável tem de corresponder a um campo extra de sessão existente. |
| `copySessionContent` | Não | `false` por omissão. Quando `true`, o conteúdo específico da sessão de cada curso (documentos, percursos de aprendizagem, testes, eventos de calendário, anúncios, caderno de notas…) é duplicado na nova sessão. O conteúdo de base do curso é sempre partilhado, nunca copiado. Este indicador é independente da definição da plataforma **Ativar a cópia de conteúdo específico da sessão para outra sessão**. |

## O que é copiado

| Copiado do modelo | Não copiado |
|-----------------------|------------|
| Categoria, visibilidade, duração, descrição e «mostrar descrição» | Formadores do curso |
| Valores dos campos extra da sessão | Gestores de RH (DRH) |
| Cursos, na mesma ordem | Estudantes |
| Formadores gerais | |
| Administradores de sessão (se o modelo não tiver nenhum, quem chama torna-se o administrador de sessão) | |
| Opção «Enviar notificação de inscrição» | |
| Promoção | |
| Conteúdo de curso específico da sessão, apenas quando `copySessionContent` é `true` | |

Os estudantes são omitidos de propósito: cada edição tem os seus próprios formandos. Inscreva-os posteriormente com `POST /api/course-sessions/actions/subscribe-users`.

A nova sessão fica associada ao URL de acesso atual.

## Resposta

`201 Created` com a nova sessão:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Erros

| Estado | Quando |
|--------|------|
| `401` | Credenciais ausentes ou inválidas |
| `403` | Quem chama não pode gerir a sessão modelo |
| `404` | A sessão modelo não existe |
| `422` | Campo em falta ou inválido, `endDate` anterior a `startDate`, título já utilizado ou variável de campo extra desconhecida |

Todas as verificações são executadas antes de qualquer criação, pelo que um pedido rejeitado nunca deixa uma sessão parcial.

## Implementação

* Operação: `duplicate_session` no recurso `Session` (`src/CoreBundle/Entity/Session.php`)
* Entrada: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processador: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, que chama `SessionManager::copy()` (também utilizado pela ação **Copiar** da lista de sessões) e, em seguida, aplica o título, as datas e os campos extra solicitados, bem como a promoção do modelo, os administradores de sessão, a opção de notificação e a ordem dos cursos.