# Temps de connexion de l'utilisateur

`GET /api/users/{id}/connection-time` renvoie le temps total qu'un utilisateur a passé connecté à la plateforme. Il remplace l'action `get_user_total_connexion_time` du service web `webservices/api/v2.php` de la version 1.11.x, et peut être restreint à une période.

## Accès

| Appelant | Autorisé |
|--------|---------|
| `ROLE_ADMIN` | Tout utilisateur de l'URL d'accès courante |
| Tout utilisateur authentifié | Son propre temps de connexion uniquement |
| Toute autre personne | `403 Forbidden` |

Le point de terminaison prend l'identifiant numérique de l'utilisateur. Pour partir d'un nom d'utilisateur, recherchez d'abord l'utilisateur avec `GET /api/users?username=...`.

## Requête

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Paramètre de requête | Obligatoire | Description |
|-----------------|----------|-------------|
| `startDate` | Non | Date et heure au format ISO 8601. Seules les connexions qui ont **commencé** à cet instant ou après sont comptabilisées. |
| `endDate` | Non | Date et heure au format ISO 8601, non antérieure à `startDate`. Seules les connexions qui se sont **terminées** à cet instant ou avant sont comptabilisées. |

Sans aucun des deux paramètres, chaque connexion est comptabilisée. Avec uniquement `startDate`, les connexions sont comptabilisées à partir de cette date, sans limite de fin. Avec uniquement `endDate`, les connexions sont comptabilisées jusqu'à cette date, sans limite de début.

Une connexion qui chevauche une borne (par exemple une connexion commencée avant `startDate`) n'est pas comptabilisée du tout : les temps de connexion ne sont jamais fractionnés. Il s'agit de la même règle que le filtre de période personnalisée des rapports de la version 1.11.x.

Incluez le décalage de fuseau horaire. Dans une URL, `+` doit être encodé sous la forme `%2B`. Une valeur sans décalage est interprétée dans le fuseau horaire du serveur.

## Réponse

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Champ | Description |
|-------|-------------|
| `totalConnectionTime` | Total en secondes |
| `totalConnectionTimeFormatted` | Le même total au format `HH:MM:SS`, le format renvoyé par le service web de la version 1.11.x. Les heures peuvent dépasser 24. |

## Erreurs

| Statut | Quand |
|--------|------|
| `400` | Une date qui ne peut pas être analysée, ou `endDate` antérieure à `startDate` |
| `401` | Identifiants absents ou non valides |
| `403` | L'appelant n'est ni un administrateur ni l'utilisateur concerné |
| `404` | L'utilisateur n'existe pas, ou n'appartient pas à l'URL d'accès courante |

## Comment le temps est calculé

Le total est la somme de `logout_date − login_date` sur les lignes de l'utilisateur dans la table `track_e_login`.

Une connexion commence à la connexion et est prolongée tant que l'utilisateur est actif : la page ouverte par l'utilisateur envoie un signal de présence chaque minute tant que son onglet est visible, comme le faisait chaque consultation de page dans Chamilo 1.11.x. Après une inactivité plus longue que la durée de vie de la session, l'activité suivante ouvre une nouvelle connexion, de sorte que l'intervalle d'inactivité n'est pas comptabilisé. La déconnexion ferme la connexion en cours. Le temps passé par un administrateur utilisant **Se connecter en tant que** n'est pas ajouté à l'utilisateur.

> **Note :** Les connexions enregistrées avant le rétablissement de ce suivi peuvent ne pas avoir de date de déconnexion. Elles comptent pour zéro, de sorte que les totaux sur des périodes antérieures à la mise à niveau peuvent être inférieurs au temps réellement passé.