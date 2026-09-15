# Contrôleurs

Chamilo 3.0 utilise un grand nombre de contrôleurs (de l’ordre de plusieurs dizaines) répartis dans les bundles. Le décompte exact varie d’une version à l’autre — considérez les noms ci-dessous comme illustratifs, et non exhaustifs.

## Types de contrôleurs

### Contrôleurs d’administration

Situés dans `src/CoreBundle/Controller/Admin/`. Ils gèrent l’administration de la plateforme :

* `AdminController` — Tableau de bord, informations sur les fichiers, test d’e-mail
* `UserListController` — CRUD des utilisateurs
* `CourseListController` — Gestion des cours
* `SessionAdminController` — Gestion des sessions
* `SettingsController` — Paramètres de la plateforme
* `SecurityController` — Tentatives de connexion, événements IDS
* `PluginsController` — Gestion des plugins
* `RoomController` — Gestion des salles

### Contrôleurs d’actions API

Actions API Platform personnalisées dans `src/CoreBundle/Controller/Api/` :

Elles étendent le CRUD intégré d’API Platform avec une logique métier spécifique. Exemples :

* `CreateDocumentFileAction` — Téléversement de fichiers pour les documents
* `CreateStudentPublicationFileAction` — Téléversement de soumission de devoir
* `UpdateVisibilityDocument` — Basculer la visibilité d’un document
* `ExportCGlossaryAction` — Exporter un glossaire
* `MoveDocumentAction` — Déplacer un document vers un autre dossier

Pour les opérations de lecture/écriture qui n’ont pas besoin d’un contrôleur HTTP dédié — c’est-à-dire lorsque vous souhaitez seulement modifier *la façon* dont un élément ou une collection est récupéré ou persisté — préférez un **State Provider** ou un **State Processor** (voir ci-dessous). Les contrôleurs d’actions API sont à réserver aux points de terminaison qui nécessitent réellement une logique au niveau de la requête (téléversements de fichiers, formats de réponse personnalisés, flux en plusieurs étapes).

### Contrôleur IA

`src/CoreBundle/Controller/AiController.php` est le point d’entrée des points de terminaison liés à l’IA (génération de questions Aiken, génération de parcours d’apprentissage, génération d’images/vidéos, notation de réponses ouvertes, analyse de documents…). L’ensemble exact des routes évolue rapidement — consultez les attributs `#[Route]` du contrôleur pour la liste à jour plutôt que de vous fier à une copie ici.

### Contrôleur de chat

`src/CoreBundle/Controller/ChatController.php` gère le chat en temps réel et le tuteur IA :

* Messagerie d’utilisateur à utilisateur
* Chat du tuteur IA (panneau de chat ancré)
* Historique des messages et interrogation périodique (polling)

## State Providers et Processors d’API Platform

Tous les points de terminaison API ne s’appuient pas sur un contrôleur. API Platform 4 répartit le travail entre deux interfaces :

* **State Providers** (`ApiPlatform\State\ProviderInterface`) — renvoient les données pour les opérations `GET` (un élément unique ou une collection).
* **State Processors** (`ApiPlatform\State\ProcessorInterface`) — gèrent les écritures pour les opérations `POST`, `PUT`, `PATCH` et `DELETE`.

Les implémentations de Chamilo se trouvent dans `src/CoreBundle/State/` (environ 35 classes ou plus). Elles sont reliées aux entités via les arguments `provider:` et `processor:` des opérations `#[ApiResource]` plutôt que via des routes.

### Quand les utiliser

Optez pour un provider/processor — plutôt qu’un contrôleur d’action API — lorsque :

* Le point de terminaison suit la forme REST standard (liste / lecture / création / mise à jour / suppression) mais nécessite un assemblage de données ou une logique de persistance personnalisés.
* Vous devez filtrer, dénormaliser ou enrichir le résultat d’une lecture de collection ou d’élément (par ex. en respectant l’Access URL courant, le contexte de cours ou les règles de visibilité).
* Vous devez exécuter des effets de bord à l’écriture (journaux d’audit, génération de fichiers, mises à jour d’entités liées) tout en conservant le pipeline de normalisation, de validation et de pagination d’API Platform.
* Vous souhaitez que l’opération reste découvrable dans le schéma OpenAPI / Hydra sans enregistrer de route personnalisée.

Si le point de terminaison nécessite au contraire un accès brut à `Request`, renvoie une charge utile non ressource (téléchargement de fichier, CSV, redirection) ou orchestre un flux en plusieurs étapes, un contrôleur d’action API dans `src/CoreBundle/Controller/Api/` convient mieux.

### Câblage sur l’entité

Référencez la classe sur l’opération :

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### Exemple de provider

`src/CoreBundle/State/DocumentProvider.php` résout un `CDocument` par variable d’URI et lève `NotFoundHttpException` lorsqu’il est introuvable :

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

### Exemple de processeur

`src/CoreBundle/State/ColorThemeStateProcessor.php` délègue au `persistProcessor` Doctrine par défaut, puis exécute des effets de bord (génère un fichier CSS sur le système de fichiers Flysystem des thèmes, associe le thème à l’Access URL courante) :

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

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### Modèles à connaître

* **Composer avec le processeur par défaut.** Décorer `ProcessorInterface $persistProcessor` (celui intégré à Doctrine) afin que la logique spécifique à Chamilo s’exécute *autour* de la persistance standard, et non à sa place.
* **Les fournisseurs de collections gèrent leur propre pagination.** Lorsqu’un fournisseur de collection construit une requête personnalisée, il doit respecter `?page`, `?itemsPerPage` et les filtres de recherche — le paginateur automatique d’API Platform n’intervient que pour le fournisseur de collection Doctrine par défaut.
* **Une classe par ressource + type d’opération est courant**, mais un fournisseur peut desservir plusieurs opérations (voir `UsergroupStateProvider`, réutilisé pour quatre opérations sur `Usergroup`).
* **Convention de nommage** : `<Entity>StateProvider` / `<Entity>StateProcessor` pour les gestionnaires à l’échelle de la ressource ; `<Entity><Action>Processor` (par ex. `CBlogAssignAuthorProcessor`, `CStudentPublicationDeleteProcessor`) pour les opérations plus ciblées.

## Routage

Les contrôleurs utilisent des **attributs PHP 8** pour les définitions de routes :

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

Les ressources API Platform utilisent des attributs `#[ApiResource]` sur les entités, les opérations personnalisées pointant vers des actions de contrôleur.

## Traits

Les contrôleurs utilisent des traits partagés pour les fonctionnalités communes :

* `ControllerTrait` — Accès aux paramètres, au sérialiseur et aux services communs
* `CourseControllerTrait` — Aides au contexte de cours
* `ResourceControllerTrait` — Opérations sur les nœuds de ressource