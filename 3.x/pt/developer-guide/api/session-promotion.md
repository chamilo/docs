# Promoção de sessão

Uma sessão pode pertencer a uma **promoção** (uma coorte de uma carreira, gerida em **Administração > Carreiras e promoções**). As integrações definem-na com a operação padrão `PATCH /api/sessions/{id}`, que substitui o parâmetro `promotion_id` do serviço web `update_session` da versão 1.11.x.

Não confunda uma promoção com uma categoria de sessão (`/api/session_categories`), que é um agrupamento diferente.

## Acesso

Apenas os administradores da plataforma (`ROLE_ADMIN`) podem ler promoções e alterar a promoção de uma sessão. Os outros utilizadores recebem `403 Forbidden`.

## Localizar uma promoção

As promoções são expostas apenas para leitura. Continuam a ser criadas e editadas a partir da administração.

```http
GET /api/promotions
GET /api/promotions/{id}
```

```json
{
  "@id": "/api/promotions/3",
  "id": 3,
  "title": "Accounting 2026",
  "status": 1
}
```

`status` é `1` para uma promoção ativa e `0` para uma inativa.

## Definir a promoção de uma sessão

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Envie `{ "promotion": null }` para desassociar a sessão da sua promoção.

A promoção deve ser indicada como um IRI. Um identificador numérico, ou um IRI que não corresponda a nenhuma promoção, é rejeitado com `400 Bad Request`.

## Ler a promoção de uma sessão

`GET /api/sessions/{id}` devolve o IRI da promoção, ou omite o campo quando a sessão não tem promoção:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Uma sessão criada com [Duplicação de sessão](session-duplication.md) mantém a promoção da sua sessão modelo.