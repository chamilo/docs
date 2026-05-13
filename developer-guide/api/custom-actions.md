# Actions personnalisées

Au-delà des opérations CRUD standard, Chamilo dispose d'un certain nombre de contrôleurs d'actions API personnalisées (de l'ordre de dizaines) qui gèrent des opérations spécialisées. Le nombre exact varie entre les versions — consultez `src/CoreBundle/Controller/Api/` pour obtenir l'ensemble actuel.

## Emplacement

Les actions personnalisées se trouvent dans `src/CoreBundle/Controller/Api/`.

## Actions personnalisées notables

### Documents

| Contrôleur | Objectif |
|-----------|----------|
| `CreateDocumentFileAction` | Téléverser un fichier ou créer un dossier/lien de document |
| `UpdateDocumentFileAction` | Remplacer le fichier d'un document |
| `ReplaceDocumentFileAction` | Remplacer un fichier de document tout en préservant ses identifiants |
| `MoveDocumentAction` | Déplacer un document vers un autre dossier |
| `UpdateVisibilityDocument` | Basculer la visibilité d'un document pour les apprenants |
| `DownloadAllDocumentsAction` | Télécharger tous les documents d'un dossier sous forme de ZIP |
| `DownloadSelectedDocumentsAction` | Télécharger un ensemble de documents sélectionnés sous forme de ZIP |
| `DocumentUsageAction` | Lister les cours/sessions où un document est utilisé |
| `DocumentLearningPathUsageAction` | Lister les parcours d'apprentissage où un document est utilisé |

### Glossaire

| Contrôleur | Objectif |
|-----------|----------|
| `CreateCGlossaryAction` | Créer un terme de glossaire |
| `UpdateCGlossaryAction` | Mettre à jour un terme de glossaire |
| `ExportCGlossaryAction` | Exporter le glossaire vers un fichier |
| `ImportCGlossaryAction` | Importer un glossaire depuis un fichier |
| `ExportGlossaryToDocumentsAction` | Exporter le glossaire sous forme de document dans le cours |
| `GetGlossaryCollectionController` | Obtenir une collection de glossaire avec un filtrage personnalisé |

### Liens

| Contrôleur | Objectif |
|-----------|----------|
| `CreateCLinkAction` | Créer un lien externe |
| `UpdateCLinkAction` | Mettre à jour un lien externe |
| `CreateCLinkCategoryAction` | Créer une catégorie de liens |
| `UpdateCLinkCategoryAction` | Mettre à jour une catégorie de liens |
| `CheckCLinkAction` | Vérifier si une URL de lien est accessible |
| `ExportCLinksAction` | Exporter les liens vers un fichier |
| `CLinkDetailsController` | Obtenir les détails d'un lien |
| `CLinkImageController` | Obtenir ou définir une image de prévisualisation pour un lien |
| `GetLinksCollectionController` | Obtenir une collection de liens avec un filtrage personnalisé |
| `UpdateVisibilityLink` | Basculer la visibilité d'un lien |
| `UpdateVisibilityLinkCategory` | Basculer la visibilité d'une catégorie de liens |
| `UpdatePositionLink` | Réorganiser les liens |

### Parcours d'apprentissage

| Contrôleur | Objectif |
|-----------|----------|
| `CreateCLpAction` | Créer un parcours d'apprentissage |
| `LpReorderController` | Réorganiser les éléments d'un parcours d'apprentissage |

### Calendrier

| Contrôleur | Objectif |
|-----------|----------|
| `UpdateCCalendarEventAction` | Mettre à jour un événement du calendrier de cours |
| `CalendarMyStudentsScheduleAction` | Obtenir l'emploi du temps des étudiants d'un enseignant |

### Blog

| Contrôleur | Objectif |
|-----------|----------|
| `CreateCBlogAction` | Créer un article de blog |
| `CreateBlogAttachmentAction` | Joindre un fichier à un article de blog |
| `UpdateVisibilityBlog` | Basculer la visibilité d'un blog |

### Dropbox

| Contrôleur | Objectif |
|-----------|----------|
| `CreateDropboxFileAction` | Téléverser un fichier dans la dropbox (outil d'échange de fichiers) |

### Travaux des étudiants (Devoirs)

| Contrôleur | Objectif |
|-----------|----------|
| `CreateStudentPublicationFileAction` | Soumettre un fichier de travail |
| `CreateStudentPublicationCommentAction` | Ajouter un commentaire à une soumission |
| `CreateStudentPublicationCorrectionFileAction` | Téléverser un fichier de correction pour une soumission |

### Fichiers personnels

| Contrôleur | Objectif |
|-----------|----------|
| `CreatePersonalFileAction` | Téléverser un fichier dans l'espace de fichiers personnels de l'utilisateur |
| `UpdatePersonalFileAction` | Mettre à jour un fichier personnel |

### Social

| Contrôleur | Objectif |
|-----------|----------|
| `LikeSocialPostController` | Aimer une publication sociale |
| `DislikeSocialPostController` | Ne plus aimer une publication sociale |
| `CreateSocialPostAttachmentAction` | Joindre un fichier à une publication sociale |
| `SocialPostAttachmentsController` | Lister les pièces jointes d'une publication sociale |
| `AbstractFeedbackSocialPostController` | Classe de base pour les actions de feedback sur les publications sociales |

### Sessions

| Contrôleur | Objectif |
|-----------|----------|
| `CreateSessionWithUsersAndCoursesAction` | Créer une session et inscrire des utilisateurs et des cours en un seul appel |

### Utilisateurs et URL d'accès

| Contrôleur | Objectif |
|-----------|----------|
| `CreateUserOnAccessUrlAction` | Créer un utilisateur et l'associer à une URL d'accès |
| `UserAccessUrlsController` | Lister les URL d'accès auxquelles un utilisateur appartient |
| `UserSkillsController` | Lister les compétences attribuées à un utilisateur |

### Vidéoconférence

| Contrôleur | Objectif |
|-----------|----------|
| `VideoConferenceCallbackController` | Gérer les rappels provenant de fournisseurs externes de vidéoconférence |

### Classes de base

| Classe | Objectif |
|-------|----------|
| `BaseResourceFileAction` | Classe de base pour les actions de téléversement de fichiers ; gère l'analyse multipart, la création de nœuds de ressources et le stockage |

## Implémentation d'une action personnalisée

Les actions personnalisées sont des contrôleurs Symfony standard référencés dans les définitions d'opérations d'API Platform. L'attribut `#[ApiResource]` réside sur l'**entité**, et le paramètre `controller:` de chaque opération pointe vers la classe d'action :

```php
// Sur la classe d'entité (par exemple src/CourseBundle/Entity/CDocument.php) :
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
        // ... autres services injectés
    ): CDocument {
        // Gérer le téléversement et retourner l'entité
    }
}
```

Points clés :
- `deserialize: false` est défini lorsque l'action lit directement la requête (par exemple, téléversements de fichiers multipart) au lieu de laisser API Platform désérialiser un corps JSON.
- Les actions de téléversement de fichiers étendent généralement `BaseResourceFileAction`, qui gère l'analyse multipart et la connexion des nœuds de ressources.
- La sécurité est appliquée via le paramètre `security:` sur l'opération, et non à l'intérieur du contrôleur.
