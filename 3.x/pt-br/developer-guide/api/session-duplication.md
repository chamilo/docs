# Duplicação de sessão

`POST /api/sessions/{id}/duplicate` cria uma nova sessão a partir de uma **sessão modelo** existente. É a substituição no Chamilo 3 da ação `create_session_from_model` do webservice `webservices/api/v2.php` da versão 1.11.x, e destina-se a integrações que abrem uma nova execução de formação a partir de uma sessão modelo.

## Acesso

| Chamador | Permitido |
|--------|---------|
| `ROLE_ADMIN` | Qualquer sessão |
| `ROLE_SESSION_MANAGER` | Apenas sessões que gerenciam (são administradores da sessão modelo), a menos que a configuração **Permitir que administradores de sessão vejam todas as sessões** esteja habilitada |
| Qualquer outro | `403 Forbidden` |

Autentique-se com um JWT ou uma chave de API externa, conforme descrito em [Autenticação](authentication.md).

## Requisição

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
| `title` | Sim | Título da nova sessão. Não pode já estar em uso por outra sessão (máx. 150 caracteres). |
| `startDate` | Sim | Data e hora no formato ISO 8601. Usada como data de início de acesso, de exibição e de acesso do tutor. |
| `endDate` | Sim | Data e hora no formato ISO 8601, não anterior a `startDate`. Usada como data de término de acesso, de exibição e de acesso do tutor. |
| `extraFields` | Não | Valores de campos extras da sessão indexados pela variável do campo. Substituem os valores copiados do modelo. Cada variável deve corresponder a um campo extra de sessão existente. |
| `copySessionContent` | Não | `false` por padrão. Quando `true`, o conteúdo específico da sessão de cada curso (documentos, percursos de aprendizagem, testes, eventos de calendário, anúncios, caderno de notas…) é duplicado na nova sessão. O conteúdo base do curso é sempre compartilhado, nunca copiado. Este indicador é independente da configuração da plataforma **Habilitar a cópia de conteúdo específico da sessão para outra sessão**. |

## O que é copiado

| Copiado do modelo | Não copiado |
|-----------------------|------------|
| Categoria, visibilidade, duração, descrição e "mostrar descrição" | Tutores do curso |
| Valores de campos extras da sessão | Gestores de RH (DRH) |
| Cursos, na mesma ordem | Estudantes |
| Tutores gerais | |
| Administradores da sessão (se o modelo não tiver nenhum, o chamador torna-se o administrador da sessão) | |
| Opção "Enviar notificação de inscrição" | |
| Promoção | |
| Conteúdo do curso específico da sessão, somente quando `copySessionContent` é `true` | |

Os estudantes são omitidos de propósito: cada execução recebe seus próprios aprendizes. Inscreva-os depois com `POST /api/course-sessions/actions/subscribe-users`.

A nova sessão é associada à URL de acesso atual.

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

| Status | Quando |
|--------|------|
| `401` | Credenciais ausentes ou inválidas |
| `403` | O chamador não pode gerenciar a sessão modelo |
| `404` | A sessão modelo não existe |
| `422` | Campo ausente ou inválido, `endDate` anterior a `startDate`, título já em uso ou variável de campo extra desconhecida |

Todas as verificações são executadas antes de qualquer criação, de modo que uma requisição rejeitada nunca deixa uma sessão parcial.

## Implementação

* Operação: `duplicate_session` no recurso `Session` (`src/CoreBundle/Entity/Session.php`)
* Entrada: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processador: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, que chama `SessionManager::copy()` (também usado pela ação **Copiar** da lista de sessões) e, em seguida, aplica o título, as datas e os campos extras solicitados, bem como a promoção do modelo, os administradores da sessão, a opção de notificação e a ordem dos cursos.