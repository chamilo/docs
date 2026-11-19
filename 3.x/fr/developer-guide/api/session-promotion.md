# Promotion de session

Une session peut appartenir à une **promotion** (une cohorte d’une carrière, gérée dans **Administration > Carrières et promotions**). Les intégrations la définissent avec l’opération standard `PATCH /api/sessions/{id}`, qui remplace le paramètre `promotion_id` du service web `update_session` de la version 1.11.x.

Ne pas confondre une promotion avec une catégorie de session (`/api/session_categories`), qui constitue un regroupement distinct.

## Accès

Seuls les administrateurs de la plateforme (`ROLE_ADMIN`) peuvent consulter les promotions et modifier la promotion d’une session. Les autres utilisateurs reçoivent `403 Forbidden`.

## Recherche d’une promotion

Les promotions sont exposées en lecture seule. Elles sont toujours créées et modifiées depuis l’administration.

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

`status` vaut `1` pour une promotion active et `0` pour une promotion inactive.

## Définition de la promotion d’une session

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Envoyer `{ "promotion": null }` pour détacher la session de sa promotion.

La promotion doit être fournie sous forme d’IRI. Un identifiant numérique, ou un IRI qui ne correspond à aucune promotion, est rejeté avec `400 Bad Request`.

## Lecture de la promotion d’une session

`GET /api/sessions/{id}` renvoie l’IRI de la promotion, ou omet le champ lorsque la session n’a pas de promotion :

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Une session créée avec [Duplication de session](session-duplication.md) conserve la promotion de sa session modèle.