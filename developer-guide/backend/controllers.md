# Contrôleurs

Chamilo 2.0 utilise un grand nombre de contrôleurs (de l'ordre de dizaines) organisés à travers les bundles. Le nombre exact varie d'une version à l'autre — considérez les noms ci-dessous comme illustratifs, et non exhaustifs.

## Types de contrôleurs

### Contrôleurs d'administration

Situés dans `src/CoreBundle/Controller/Admin/`. Gèrent l'administration de la plateforme :

* `AdminController` — Tableau de bord, informations sur les fichiers, test d'e-mail
* `UserListController` — Gestion CRUD des utilisateurs
* `CourseListController` — Gestion des cours
* `SessionAdminController` — Gestion des sessions
* `SettingsController` — Paramètres de la plateforme
* `SecurityController` — Tentatives de connexion, événements IDS
* `PluginsController` — Gestion des plugins
* `RoomController` — Gestion des salles

### Contrôleurs d'actions API

Actions personnalisées de la plateforme API dans `src/CoreBundle/Controller/Api/` :

Ces contrôleurs étendent les fonctionnalités CRUD intégrées de la plateforme API avec une logique métier personnalisée. Exemples :

* `CreateDocumentFileAction` — Téléversement de fichiers pour les documents
* `CreateStudentPublicationFileAction` — Téléversement de soumissions pour les travaux
* `UpdateVisibilityDocument` — Basculer la visibilité d'un document
* `ExportCGlossaryAction` — Exporter le glossaire
* `MoveDocumentAction` — Déplacer un document vers un autre dossier

Pour les opérations de lecture/écriture qui ne nécessitent pas de contrôleur HTTP dédié — c'est-à-dire lorsque vous souhaitez uniquement modifier *la manière* dont un élément ou une collection est récupéré ou persisté — préférez un **State Provider** ou un **State Processor** (voir ci-dessous). Les contrôleurs d'actions API sont mieux réservés aux points de terminaison qui nécessitent réellement une logique au niveau de la requête (téléversements de fichiers, formats de réponse personnalisés, flux en plusieurs étapes).

### Contrôleur AI

`src/CoreBundle/Controller/AiController.php` est le point d'entrée pour les points de terminaison liés à l'IA (génération de questions Aiken, génération de parcours d'apprentissage, génération d'images/vidéos, évaluation de réponses ouvertes, analyse de documents…). L'ensemble exact des routes évolue rapidement — consultez les attributs `#[Route]` du contrôleur pour obtenir la liste actuelle plutôt que de vous fier à une copie ici.

### Contrôleur de chat

`src/CoreBundle/Controller/ChatController.php` gère le chat en temps réel et le tuteur IA :

* Messagerie entre utilisateurs
* Chat avec le tuteur IA (panneau de chat ancré)
* Historique des messages et polling

## Fournisseurs et processeurs d'état de la plateforme API

Tous les points de terminaison API ne sont pas soutenus par un contrôleur. API Platform 3 répartit le travail entre deux interfaces :

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — renvoient des données pour les opérations `GET` (un seul élément ou une collection).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — gèrent les écritures pour les opérations `POST`, `PUT`, `PATCH` et `DELETE`.

Les implémentations de Chamilo se trouvent dans `src/CoreBundle/State/` (environ 35+ classes). Elles sont liées aux entités via les arguments `provider:` et `processor:` des opérations `#[ApiResource]` plutôt que via des routes.

### Quand les utiliser

Optez pour un fournisseur/processeur — au lieu d'un contrôleur d'action API — lorsque :

* Le point de terminaison suit la forme REST standard (lister / lire / créer / mettre à jour / supprimer) mais nécessite une logique personnalisée d'assemblage ou de persistance des données.
* Vous devez filtrer, dénormaliser ou enrichir le résultat d'une collection ou d'un élément lu (par exemple, en respectant l'URL d'accès actuelle, le contexte du cours ou les règles de visibilité).
* Vous devez exécuter des effets secondaires lors de l'écriture (journaux d'audit, génération de fichiers, mises à jour d'entités liées) tout en conservant le pipeline de normalisation, de validation et de pagination d'API Platform.
* Vous souhaitez que l'opération reste découvrable dans le schéma OpenAPI / Hydra sans enregistrer une route personnalisée.

Si le point de terminaison nécessite un accès brut à `Request`, renvoie une charge utile non liée à une ressource (téléchargement de fichier, CSV, redirection) ou orchestre un flux en plusieurs étapes, un contrôleur d'action API dans `src/CoreBundle/Controller/Api/` est un meilleur choix.

### Configuration sur l'entité

Référez la classe sur l'opération :

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Exemple de fournisseur

`src/CoreBundle/State/DocumentProvider.php` résout un `CDocument` par variable URI et lance `NotFoundHttpException` lorsqu'il est manquant :

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

---
### Exemple de processeur

`src/CoreBundle/State/ColorThemeStateProcessor.php` délègue au processeur par défaut de Doctrine `persistProcessor`, puis exécute des effets secondaires (génère un fichier CSS sur le système de fichiers Flysystem des thèmes, lie le thème à l'URL d'accès actuelle) :

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …générer colors.css, lier à l'AccessUrl actuelle, vider…

        return $colorTheme;
    }
}
```

### Modèles à connaître

* **Composer avec le processeur par défaut.** Décorez `ProcessorInterface $persistProcessor` (intégré à Doctrine) afin que la logique spécifique à Chamilo s'exécute *autour* de la persistance standard, et non à la place de celle-ci.
* **Les fournisseurs de collections gèrent leur propre pagination.** Lorsqu'un fournisseur de collections construit une requête personnalisée, il doit respecter les paramètres `?page`, `?itemsPerPage` et les filtres de recherche — le paginateur automatique d'API Platform ne s'active que pour le fournisseur de collections par défaut de Doctrine.
* **Une classe par ressource + type d'opération est courant**, mais un fournisseur peut servir plusieurs opérations (voir `UsergroupStateProvider`, réutilisé pour quatre opérations sur `Usergroup`).
* **Convention de nommage** : `<Entity>StateProvider` / `<Entity>StateProcessor` pour les gestionnaires à l'échelle de la ressource ; `<Entity><Action>Processor` (par exemple `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) pour des opérations plus spécifiques.

## Routage

Les contrôleurs utilisent les **attributs PHP 8** pour les définitions de routes :

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Les ressources d'API Platform utilisent les attributs `#[ApiResource]` sur les entités, avec des opérations personnalisées pointant vers des actions de contrôleur.

## Traits

Les contrôleurs utilisent des traits partagés pour des fonctionnalités communes :

* `ControllerTrait` — Accès aux paramètres, au sérialiseur et aux services communs
* `CourseControllerTrait` — Aides au contexte des cours
* `ResourceControllerTrait` — Opérations sur les nœuds de ressources
