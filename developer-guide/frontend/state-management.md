# Gestion d'état

Chamilo utilise deux bibliothèques de gestion d'état en parallèle :

* **Pinia** — le standard actuel pour tous les nouveaux stores. La majorité du code utilise Pinia.
* **Vuex** — store héritée, encore présente et utilisée par les vues plus anciennes. Le nouveau code doit utiliser Pinia.

## Stores Pinia

Les stores Pinia se trouvent directement dans `assets/vue/store/` :

| Fichier de store | Composable | Rôle |
|-----------|-----------|---------|
| `securityStore.js` | `useSecurityStore` | Utilisateur authentifié, connexion/déconnexion, vérification de session |
| `cidReq.js` | `useCidReqStore` | Contexte cours/session courant (ID de cours, ID de session) |
| `courseSettingStore.js` | `useCourseSettings` | Cache des paramètres au niveau du cours |
| `enrolledStore.js` | `useEnrolledStore` | Données d'inscription de l'utilisateur |
| `platformConfig.js` | `usePlatformConfig` | Configuration de la plateforme, plugins, thème, fournisseurs OAuth2 |
| `messageRelUserStore.js` | `useMessageRelUserStore` | État de la messagerie |
| `socialStore.js` | `useSocialStore` | État du réseau social |

### Store de sécurité

```javascript
const securityStore = useSecurityStore()

// Check if user is logged in
if (securityStore.isAuthenticated) { ... }

// Access current user object
const user = securityStore.user
```

### Store CID Request

Suit le contexte cours/session courant — requis pour toute opération d'API limitée au cours :

```javascript
const cidReqStore = useCidReqStore()

// Current course and session objects
const course = cidReqStore.course
const session = cidReqStore.session
```

### Store des paramètres de cours

Met en cache les paramètres au niveau du cours afin d'éviter des appels API répétés :

```javascript
const courseSettings = useCourseSettings()
const value = courseSettings.getSetting('exercise_generator')
```

### Store de configuration de la plateforme

Contient la configuration globale de la plateforme récupérée depuis `/platform-config/list` :

```javascript
const platformConfig = usePlatformConfig()

// Loaded settings array, active theme, enabled plugins, OAuth2 providers
const theme = platformConfig.visualTheme
const plugins = platformConfig.plugins
```

## Store Vuex (héritée)

La store Vuex est définie dans `assets/vue/store/index.js` et contient :

| Module | Rôle |
|--------|---------|
| `modules/crud.js` | Fabrique (`makeCrudModule`) qui génère un module Vuex CRUD complet pour un service donné — utilisée par les vues list/create/update plus anciennes |
| `modules/notifications.js` | État des notifications toast (affichage, couleur, texte, délai) |
| `modules/ux.js` | État UX (message d'accès interdit) |
| `security.js` | Module de sécurité Vuex héritée (remplacé par `securityStore.js`) |

Évitez d'ajouter de nouveaux modules Vuex. Utilisez Pinia pour tout nouvel état.

## Composables

Outre les stores, `assets/vue/composables/` contient des fonctions de composition partagées. Exemples notables :

| Fichier | Rôle |
|------|---------|
| `useFileManager.js` | État et opérations du navigateur de fichiers |
| `useTopbarLoggedIn.js` / `useTopbarNotLoggedIn.js` | Câblage du menu de la barre supérieure |
| `useTopbarTour.js` | Visite guidée de la barre supérieure |
| `useDocumentCreate.js` / `useDocumentUpdate.js` / `useDocumentTemplates.js` | Aides de l'outil Documents |
| `useCertificateTags.js` | Aides pour les balises des modèles de certificats |
| `sidebarMenu.js` | Arborescence de navigation de la barre latérale |
| `theme.js` | Chargement et bascule du thème |
| `pluginRegion.js` | Rendu des régions d'interface injectées par les plugins |
| `userPermissions.js` | Vérifications des permissions de l'utilisateur courant |
| `notification.js` | Aides pour les notifications push |
| `locale.js` | Détection et bascule de la locale |
| `datatableList.js` / `datatableCreate.js` / `datatableUpdate.js` | Modèles CRUD réutilisables pour les tableaux de données |
| `useSocialInfo.js` / `useSocialMenuItems.js` | Aides du réseau social |
| `usePushSubscription.js` | Gestion des abonnements Web Push |
| `upload.js` | Aides au téléversement de fichiers |
| `useConfirmation.js` | Aide pour les dialogues de confirmation |

Les composables sont également organisés en sous-répertoires par fonctionnalité (`course/`, `session/`, `document/`, `calendar/`, `admin/`, `auth/`, `message/`, `skill/`, etc.). La liste complète se trouve dans `assets/vue/composables/`.