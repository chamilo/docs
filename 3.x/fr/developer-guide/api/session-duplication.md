# Duplication de session

`POST /api/sessions/{id}/duplicate` crée une nouvelle session à partir d'une **session modèle** existante. Il s'agit du remplacement, dans Chamilo 3, de l'action `create_session_from_model` du service web `webservices/api/v2.php` de la version 1.11.x, et il est destiné aux intégrations qui ouvrent une nouvelle session de formation à partir d'une session modèle.

## Accès

| Appelant | Autorisé |
|--------|---------|
| `ROLE_ADMIN` | Toute session |
| `ROLE_SESSION_MANAGER` | Uniquement les sessions qu'il gère (il est administrateur de session du modèle), sauf si le paramètre **Autoriser les administrateurs de session à voir toutes les sessions** est activé |
| Toute autre personne | `403 Forbidden` |

Authentifiez-vous avec un JWT ou une clé d'API externe, comme décrit dans [Authentification](authentication.md).

## Requête

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

| Champ | Obligatoire | Description |
|-------|----------|-------------|
| `title` | Oui | Titre de la nouvelle session. Il ne doit pas déjà être utilisé par une autre session (150 caractères maximum). |
| `startDate` | Oui | Date et heure au format ISO 8601. Utilisée comme date de début d'accès, d'affichage et d'accès du tuteur. |
| `endDate` | Oui | Date et heure au format ISO 8601, non antérieure à `startDate`. Utilisée comme date de fin d'accès, d'affichage et d'accès du tuteur. |
| `extraFields` | Non | Valeurs des champs supplémentaires de session, indexées par la variable du champ. Elles remplacent les valeurs copiées depuis le modèle. Chaque variable doit correspondre à un champ supplémentaire de session existant. |
| `copySessionContent` | Non | `false` par défaut. Lorsque la valeur est `true`, le contenu propre à la session de chaque cours (documents, parcours d'apprentissage, tests, événements de calendrier, annonces, cahier de notes…) est dupliqué dans la nouvelle session. Le contenu de base du cours est toujours partagé, jamais copié. Cet indicateur est indépendant du paramètre de plateforme **Activer la copie du contenu propre à une session vers une autre session**. |

## Ce qui est copié

| Copié depuis le modèle | Non copié |
|-----------------------|------------|
| Catégorie, visibilité, durée, description et « afficher la description » | Tuteurs de cours |
| Valeurs des champs supplémentaires de session | Responsables RH (DRH) |
| Cours, dans le même ordre | Étudiants |
| Tuteurs généraux | |
| Administrateurs de session (si le modèle n'en a aucun, l'appelant devient l'administrateur de session) | |
| Option « Envoyer une notification d'inscription » | |
| Promotion | |
| Contenu de cours propre à la session, uniquement lorsque `copySessionContent` vaut `true` | |

Les étudiants sont volontairement exclus : chaque session de formation dispose de ses propres apprenants. Inscrivez-les ensuite avec `POST /api/course-sessions/actions/subscribe-users`.

La nouvelle session est rattachée à l'URL d'accès courante.

## Réponse

`201 Created` avec la nouvelle session :

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Erreurs

| Statut | Quand |
|--------|------|
| `401` | Identifiants absents ou non valides |
| `403` | L'appelant n'est pas autorisé à gérer la session modèle |
| `404` | La session modèle n'existe pas |
| `422` | Champ manquant ou non valide, `endDate` antérieure à `startDate`, titre déjà utilisé, ou variable de champ supplémentaire inconnue |

Toutes les vérifications sont effectuées avant toute création : une requête rejetée ne laisse donc jamais de session partielle.

## Implémentation

* Opération : `duplicate_session` sur la ressource `Session` (`src/CoreBundle/Entity/Session.php`)
* Entrée : `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Processeur : `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, qui appelle `SessionManager::copy()` (également utilisé par l'action **Copier** de la liste des sessions), puis applique le titre, les dates et les champs supplémentaires demandés, ainsi que la promotion du modèle, les administrateurs de session, l'option de notification et l'ordre des cours.