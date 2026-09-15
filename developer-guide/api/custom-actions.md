# Actions personnalisées

Au-delà des opérations CRUD standard, Chamilo dispose d’un certain nombre de contrôleurs d’actions API personnalisées (de l’ordre de plusieurs dizaines) qui gèrent des opérations spécialisées. Le nombre exact varie selon les versions — listez `src/CoreBundle/Controller/Api/` pour l’ensemble actuel.

## Emplacement

Les actions personnalisées se trouvent dans `src/CoreBundle/Controller/Api/`.

## Actions personnalisées notables

### Documents

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | Téléverser un fichier ou créer un dossier/lien document |
| `UpdateDocumentFileAction` | Remplacer le fichier d’un document |
| `ReplaceDocumentFileAction` | Remplacer le fichier d’un document en conservant ses identifiants |
| `MoveDocumentAction` | Déplacer un document vers un autre dossier |
| `UpdateVisibilityDocument` | Basculer la visibilité d’un document pour les apprenants |
| `DownloadAllDocumentsAction` | Télécharger tous les documents d’un dossier sous forme de ZIP |
| `DownloadSelectedDocumentsAction` | Télécharger un ensemble sélectionné de documents sous forme de ZIP |
| `DocumentUsageAction` | Lister les cours/sessions où un document est utilisé |
| `DocumentLearningPathUsageAction` | Lister les parcours d’apprentissage où un document est utilisé |

### Glossaire

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | Créer un terme de glossaire |
| `UpdateCGlossaryAction` | Mettre à jour un terme de glossaire |
| `ExportCGlossaryAction` | Exporter le glossaire vers un fichier |
| `ImportCGlossaryAction` | Importer un glossaire depuis un fichier |
| `ExportGlossaryToDocumentsAction` | Exporter le glossaire comme document dans le cours |
| `GetGlossaryCollectionController` | Obtenir la collection de glossaire avec un filtrage personnalisé |

### Liens

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | Créer un lien externe |
| `UpdateCLinkAction` | Mettre à jour un lien externe |
| `CreateCLinkCategoryAction` | Créer une catégorie de liens |
| `UpdateCLinkCategoryAction` | Mettre à jour une catégorie de liens |
| `CheckCLinkAction` | Vérifier si l’URL d’un lien est accessible |
| `ExportCLinksAction` | Exporter les liens vers un fichier |
| `CLinkDetailsController` | Obtenir les détails d’un lien |
| `CLinkImageController` | Obtenir ou définir l’image d’aperçu d’un lien |
| `GetLinksCollectionController` | Obtenir la collection de liens avec un filtrage personnalisé |
| `UpdateVisibilityLink` | Basculer la visibilité d’un lien |
| `UpdateVisibilityLinkCategory` | Basculer la visibilité d’une catégorie de liens |
| `UpdatePositionLink` | Réordonner les liens |

### Parcours d’apprentissage

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | Créer un parcours d’apprentissage |
| `LpReorderController` | Réordonner les éléments d’un parcours d’apprentissage |

### Calendrier

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | Mettre à jour un événement du calendrier de cours |
| `CalendarMyStudentsScheduleAction` | Obtenir l’emploi du temps des étudiants d’un enseignant |

### Blog

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | Créer un article de blog |
| `CreateBlogAttachmentAction` | Joindre un fichier à un article de blog |
| `UpdateVisibilityBlog` | Basculer la visibilité du blog |

### Dropbox

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | Téléverser un fichier dans la dropbox (outil d’échange de fichiers) |

### Travaux d’étudiants (devoirs)

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Soumettre un fichier de devoir |
| `CreateStudentPublicationCommentAction` | Ajouter un commentaire à une soumission |
| `CreateStudentPublicationCorrectionFileAction` | Téléverser un fichier de correction pour une soumission |

### Fichiers personnels

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | Téléverser un fichier dans l’espace de fichiers personnels de l’utilisateur |
| `UpdatePersonalFileAction` | Mettre à jour un fichier personnel |

### Social

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | Aimer une publication sociale |
| `DislikeSocialPostController` | Ne plus aimer une publication sociale |
| `CreateSocialPostAttachmentAction` | Joindre un fichier à une publication sociale |
| `SocialPostAttachmentsController` | Lister les pièces jointes d’une publication sociale |
| `AbstractFeedbackSocialPostController` | Classe de base pour les actions de retour sur les publications sociales |

### Sessions

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Créer une session et y inscrire des utilisateurs et des cours en un seul appel |

### Utilisateurs et URL d’accès

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Créer un utilisateur et l’associer à une URL d’accès |
| `UserAccessUrlsController` | Lister les URL d’accès auxquelles un utilisateur appartient |
| `UserSkillsController` | Lister les compétences attribuées à un utilisateur |

### Visioconférence

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | Traiter les rappels (callbacks) des fournisseurs de visioconférence externes |

### Classes de base

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | Classe de base pour les actions de téléversement de fichiers ; gère l’analyse multipart, la création de nœuds de ressource et le stockage |

## Implémentation d'une action personnalisée

Les actions personnalisées sont des contrôleurs Symfony standard référencés dans les définitions d'opérations d'API Platform. L'attribut `#[ApiResource]` se trouve sur l'**entité**, et le paramètre `controller:` de chaque opération pointe vers la classe d'action :

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

La classe d'action elle-même est un contrôleur invocable simple — les services sont injectés via les arguments de la méthode `__invoke()` :

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

Points clés :
- `deserialize: false` est défini lorsque l'action lit la requête directement (par ex. les téléversements de fichiers multipart) au lieu de laisser API Platform désérialiser un corps JSON.
- Les actions de téléversement de fichiers étendent généralement `BaseResourceFileAction`, qui gère l'analyse multipart et le câblage des nœuds de ressource.
- La sécurité est appliquée via le paramètre `security:` de l'opération, et non à l'intérieur du contrôleur.