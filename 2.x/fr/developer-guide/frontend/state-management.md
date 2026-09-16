# Gestion de l'état

Chamilo utilise deux bibliothèques de gestion d'état côte à côte :

- **Pinia** — la norme actuelle pour tous les nouveaux magasins. La majorité du code utilise Pinia.
- **Vuex** — magasin hérité, encore présent et utilisé par les anciennes vues. Le nouveau code doit utiliser Pinia.

## Magasins Pinia

Les magasins Pinia se trouvent directement dans `assets/vue/store/` :

| Fichier du magasin | Composable | Objectif |
|--------------------|------------|----------|
| `securityStore.js` | `useSecurityStore` | Utilisateur authentifié, connexion/déconnexion, vérification de session |
| `cidReq.js` | `useCidReqStore` | Contexte actuel du cours/session (ID du cours, ID de la session) |
| `courseSettingStore.js` | `useCourseSettings` | Cache des paramètres au niveau du cours |
| `enrolledStore.js` | `useEnrolledStore` | Données d'inscription des utilisateurs |
| `platformConfig.js` | `usePlatformConfig` | Configuration de la plateforme, plugins, thème, fournisseurs OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | État de la messagerie |
| `socialStore.js` | `useSocialStore` | État du réseau social |

### Magasin de sécurité

```javascript
const securityStore = useSecurityStore()

// Vérifier si l'utilisateur est connecté
if (securityStore.isAuthenticated) { ... }

// Accéder à l'objet utilisateur actuel
const user = securityStore.user
```

### Magasin de requête CID

Suit le contexte actuel du cours/session — requis pour toute opération API à portée de cours :

```javascript
const cidReqStore = useCidReqStore()

// Objets actuels du cours et de la session
const course = cidReqStore.course
const session = cidReqStore.session
```

### Magasin des paramètres de cours

Met en cache les paramètres au niveau du cours pour éviter les appels API répétés :

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Magasin de configuration de la plateforme

Contient la configuration globale de la plateforme récupérée depuis `/platform-config/list` :

```javascript
const platformConfig = usePlatformConfig()

// Tableau des paramètres chargés, thème actif, plugins activés, fournisseurs OAuth2
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Magasin Vuex (Hérité)

Le magasin Vuex est défini dans `assets/vue/store/index.js` et contient :

| Module | Objectif |
|--------|----------|
| `modules/crud.js` | Usine (`makeCrudModule`) qui génère un module Vuex CRUD complet pour un service donné — utilisé par les anciennes vues de liste/création/mise à jour |
| `modules/notifications.js` | État des notifications toast (affichage, couleur, texte, délai d'expiration) |
| `modules/ux.js` | État UX (message d'accès interdit) |
| `security.js` | Module de sécurité Vuex hérité (remplacé par `securityStore.js`) |

Évitez d'ajouter de nouveaux modules Vuex. Utilisez Pinia pour tout nouvel état.

## Composables

En plus des magasins, `assets/vue/composables/` contient des fonctions de composition partagées. Exemples notables :

| Fichier | Objectif |
|---------|----------|
| `useFileManager.js` | État et opérations du navigateur de fichiers |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Configuration du menu de la barre supérieure |
| `useTopbarTour.js` | Visite guidée de la barre supérieure |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Aides pour l'outil de document |
| `useCertificateTags.js` | Aides pour les balises de modèle de certificat |
| `sidebarMenu.js` | Arborescence de navigation de la barre latérale |
| `theme.js` | Chargement et changement de thème |
| `pluginRegion.js` | Rendu des régions d'interface utilisateur injectées par plugin |
| `userPermissions.js` | Vérifications des permissions pour l'utilisateur actuel |
| `notification.js` | Aides pour les notifications push |
| `locale.js` | Détection et changement de langue |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Modèles CRUD réutilisables pour les tableaux de données |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Aides pour les réseaux sociaux |
| `usePushSubscription.js` | Gestion des abonnements Web Push |
| `upload.js` | Aides pour le téléversement de fichiers |
| `useConfirmation.js` | Aide pour les boîtes de dialogue de confirmation |

Les composables sont également organisés en sous-répertoires par fonctionnalité (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). La liste complète se trouve dans `assets/vue/composables/`.