# MCP (Model Context Protocol)

Chamilo 3.0 expose un serveur MCP afin que les assistants et agents d’IA (Claude, connecteurs ChatGPT, ou tout client compatible MCP) puissent agir dans la plateforme au nom d’un utilisateur authentifié, en utilisant les permissions de cet utilisateur — il n’existe ni compte de service distinct ni accès élevé.

## Ce que MCP apporte à Chamilo

MCP (Model Context Protocol) est une norme ouverte qui permet aux clients d’IA d’appeler un ensemble défini d’« outils » exposés par un serveur. Le serveur MCP de Chamilo est accessible à un unique point de terminaison, `/mcp`, et expose un ensemble sélectionné d’outils de gestion de cours destinés aux enseignants, plutôt que l’intégralité de la surface de l’API.

## Capacités disponibles

Chaque appel s’exécute en tant qu’utilisateur connecté, de sorte qu’un outil ne voit et ne modifie jamais que les cours que cet utilisateur gère. L’ensemble d’outils actuel :

| Outil | Fonction |
|------|---------------|
| Current user | Renvoie l’identité et les rôles de l’utilisateur authentifié |
| Teacher courses | Liste les cours que l’utilisateur gère en tant qu’enseignant |
| Course overview | Renvoie les informations de base du cours et les décomptes de ressources |
| Create course | Crée un nouveau cours selon les règles de création de cours de la plateforme |
| Create course assignment | Crée un devoir en brouillon ou publié, avec une description et une note maximale |
| Create course test | Crée un test à choix multiples assisté par l’IA à partir d’une description de sujet ou d’un document existant |
| Get course test response status | Indique quels étudiants ont répondu, sont en cours ou sont en attente sur un test |
| Get user course test score | Renvoie les scores les plus récents et les meilleurs scores obtenus par un étudiant sur un test |
| Create training satisfaction survey | Crée une enquête de satisfaction à sept questions |
| Create course learning path | Crée un parcours d’apprentissage à partir de pages fournies par le client MCP |
| List documents | Liste les documents de l’outil Documents d’un cours |
| Read course document | Renvoie le contenu HTML, le titre et les métadonnées d’un document modifiable |
| Edit course document | Remplace l’intégralité du contenu HTML d’un document modifiable existant |
| Create course document | Crée un document HTML assisté par l’IA dans le dossier Documents racine |
| Create course illustration | Génère une illustration IA pour un sujet et l’enregistre comme document |
| Illustrate document paragraph | Insère une image ou une vidéo existante avant ou après un paragraphe d’un document |
| Find recent course forum activity | Trouve les messages de forum récents et visibles liés à un sujet |
| Review course quality | Analyse les parcours d’apprentissage, documents, tests, devoirs et enquêtes d’un cours, et renvoie des recommandations d’amélioration |

Cette liste est établie par l’équipe cœur de Chamilo ; elle n’est pas extensible par l’utilisateur depuis la plateforme — les enseignants ne peuvent pas ajouter leurs propres outils.

## Comment les utilisateurs se connectent

### Clé API MCP personnelle

Chaque utilisateur génère sa propre clé sous **Réseau social** > **Clé API MCP** :

![La page de la clé API MCP, montrant une clé inactive, le bouton Générer une clé API, et le bloc Connexion MCP distante avec l’URL du point de terminaison et le format de l’en-tête Authorization](../.gitbook/assets/admin-mcp-api-key.png)

* Un clic sur **Générer une clé API** crée une clé et l’affiche une seule fois — Chamilo ne conserve ensuite qu’une version masquée, de sorte que la clé complète doit être copiée et stockée de façon sécurisée immédiatement.
* La génération d’une nouvelle clé révoque immédiatement la précédente.
* La page affiche l’état de la clé (active/inactive), le point de terminaison MCP à configurer dans le client, ainsi que les dates de création et de dernière utilisation.
* Le panneau **Connexion MCP distante** indique précisément ce qu’il faut renseigner dans le client MCP : l’URL du point de terminaison et un en-tête `Authorization: Bearer <your MCP API key>`.

Comme le précise la page elle-même, la clé authentifie le client en tant que compte de cet utilisateur — elle n’accorde aucune permission que le compte n’a pas déjà.

### OAuth 2.1 (clients distants et connecteurs)

Pour les clients MCP qui prennent en charge la découverte OAuth et l’enregistrement dynamique de clients (plutôt qu’une clé collée manuellement), Chamilo agit également comme serveur d’autorisation OAuth 2.1 : le client découvre les points de terminaison de Chamilo, s’enregistre, et redirige l’utilisateur vers `/oauth/authorize` pour approuver l’accès. Les applications approuvées apparaissent sous **Réseau social** > **Applications autorisées**, où l’utilisateur peut révoquer celles qu’il n’utilise plus ou ne reconnaît pas.

## Considérations de sécurité

* **Aucune élévation de privilèges.** Chaque appel d’outil MCP et chaque application autorisée par OAuth s’exécute avec les propres permissions Chamilo de l’utilisateur connecté — une clé API personnelle ou une application autorisée ne peut jamais faire plus que ce que cet utilisateur pourrait déjà faire manuellement.
* **Bearer uniquement, avec limitation de débit.** `/mcp` n’accepte qu’un identifiant Bearer — une clé API MCP personnelle, un jeton d’accès OAuth, ou (en développement) un JWT. Les tentatives d’authentification sont limitées en débit par adresse IP afin de ralentir les essais de devinette d’identifiants.
* **Surface publique restreinte.** Le seul trafic non authentifié que `/mcp` accepte est le prévol `OPTIONS` ; chaque appel réel exige `ROLE_USER`. Les points de terminaison de découverte OAuth, d’enregistrement dynamique de client et de jeton sont volontairement publics, comme l’exigent les spécifications OAuth 2.1 / MCP — cela n’accorde pas d’accès en soi, cela permet seulement à un client d’apprendre comment démarrer le flux d’autorisation.
* **La protection contre le DNS-rebinding est volontairement désactivée pour `/mcp`.** Le bundle qui implémente MCP restreint normalement le point de terminaison à `localhost` sauf si une liste statique de noms d’hôte autorisés est configurée — ce qui convient mal à un portail Chamilo multi-URL accessible sous de nombreux noms d’hôte. Chamilo désactive ce contrôle car il est redondant ici : chaque requête `/mcp` exige déjà un identifiant Bearer indépendamment de son en-tête `Host`/`Origin`, et une attaque par DNS-rebinding (qui s’appuie sur une authentification ambiante de type cookie voyageant avec un Host usurpée) ne peut pas forger un jeton bearer qu’elle ne possède pas déjà.

## Configuration du serveur MCP

Contrairement à la plupart des intégrations de ce guide, MCP n’a pas de page de paramètres dans le panneau d’administration — il se configure au niveau des fichiers, dans `config/packages/mcp.yaml`, et nécessite un accès shell au serveur :

| Clé | Objet |
|-----|---------|
| `app`, `version`, `description` | Identité que Chamilo communique aux clients MCP qui se connectent |
| `client_transports.stdio` / `client_transports.http` | Quels transports sont actifs ; Chamilo active les deux par défaut |
| `http.path` | Le point de terminaison HTTP MCP (`/mcp` par défaut) |
| `http.allowed_hosts` | Liste d’hôtes autorisés pour le DNS-rebinding — définie à `false` sur Chamilo (voir Considérations de sécurité ci-dessus) |
| `http.session.store`, `.directory`, `.ttl` | Où l’état de session MCP est persisté et pendant combien de temps |

Pour désactiver entièrement le serveur MCP, définissez `client_transports.http: false` (et `stdio: false` si le transport CLI doit également être désactivé) et videz le cache :

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Conseils

* Traitez une clé API MCP comme un mot de passe — quiconque la détient peut agir en tant que cet utilisateur via n’importe quel client MCP.
* Encouragez les utilisateurs à examiner périodiquement les **Applications autorisées** et à révoquer tout ce qu’ils ne reconnaissent pas.
* Consultez [Configuration de l’IA](integrations/ai-configuration.md) pour les fournisseurs d’IA qui alimentent les outils de génération de contenu (création de tests, création de documents, illustrations) listés ci-dessus.