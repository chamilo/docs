# Azioni Personalizzate

Oltre alle operazioni CRUD standard, Chamilo dispone di numerosi controller di azioni API personalizzate (nell'ordine di decine) che gestiscono operazioni specializzate. Il numero esatto varia tra le versioni — consulta `src/CoreBundle/Controller/Api/` per l'insieme corrente.

## Posizione

Le azioni personalizzate si trovano in `src/CoreBundle/Controller/Api/`.

## Azioni Personalizzate Notevoli

### Documenti

| Controller | Scopo |
|-----------|-------|
| `CreateDocumentFileAction` | Carica un file o crea una cartella/collegamento a un documento |
| `UpdateDocumentFileAction` | Sostituisci il file di un documento |
| `ReplaceDocumentFileAction` | Sostituisci il file di un documento, preservandone gli ID |
| `MoveDocumentAction` | Sposta un documento in una cartella diversa |
| `UpdateVisibilityDocument` | Modifica la visibilità del documento per gli studenti |
| `DownloadAllDocumentsAction` | Scarica tutti i documenti di una cartella come ZIP |
| `DownloadSelectedDocumentsAction` | Scarica un insieme selezionato di documenti come ZIP |
| `DocumentUsageAction` | Elenca i corsi/sessioni in cui un documento è utilizzato |
| `DocumentLearningPathUsageAction` | Elenca i percorsi di apprendimento in cui un documento è utilizzato |

### Glossario

| Controller | Scopo |
|-----------|-------|
| `CreateCGlossaryAction` | Crea un termine del glossario |
| `UpdateCGlossaryAction` | Aggiorna un termine del glossario |
| `ExportCGlossaryAction` | Esporta il glossario in un file |
| `ImportCGlossaryAction` | Importa il glossario da un file |
| `ExportGlossaryToDocumentsAction` | Esporta il glossario come documento nel corso |
| `GetGlossaryCollectionController` | Ottieni la raccolta del glossario con filtri personalizzati |

### Collegamenti

| Controller | Scopo |
|-----------|-------|
| `CreateCLinkAction` | Crea un collegamento esterno |
| `UpdateCLinkAction` | Aggiorna un collegamento esterno |
| `CreateCLinkCategoryAction` | Crea una categoria di collegamenti |
| `UpdateCLinkCategoryAction` | Aggiorna una categoria di collegamenti |
| `CheckCLinkAction` | Verifica se l'URL di un collegamento è raggiungibile |
| `ExportCLinksAction` | Esporta i collegamenti in un file |
| `CLinkDetailsController` | Ottieni i dettagli di un collegamento |
| `CLinkImageController` | Ottieni o imposta un'immagine di anteprima per un collegamento |
| `GetLinksCollectionController` | Ottieni la raccolta di collegamenti con filtri personalizzati |
| `UpdateVisibilityLink` | Modifica la visibilità di un collegamento |
| `UpdateVisibilityLinkCategory` | Modifica la visibilità di una categoria di collegamenti |
| `UpdatePositionLink` | Riordina i collegamenti |

### Percorsi di Apprendimento

| Controller | Scopo |
|-----------|-------|
| `CreateCLpAction` | Crea un percorso di apprendimento |
| `LpReorderController` | Riordina gli elementi di un percorso di apprendimento |

### Calendario

| Controller | Scopo |
|-----------|-------|
| `UpdateCCalendarEventAction` | Aggiorna un evento del calendario del corso |
| `CalendarMyStudentsScheduleAction` | Ottieni il programma degli studenti di un insegnante |

### Blog

| Controller | Scopo |
|-----------|-------|
| `CreateCBlogAction` | Crea un post sul blog |
| `CreateBlogAttachmentAction` | Allega un file a un post sul blog |
| `UpdateVisibilityBlog` | Modifica la visibilità del blog |

### Dropbox

| Controller | Scopo |
|-----------|-------|
| `CreateDropboxFileAction` | Carica un file nella dropbox (strumento di scambio file) |

### Lavori degli Studenti (Compiti)

| Controller | Scopo |
|-----------|-------|
| `CreateStudentPublicationFileAction` | Invia un file per un compito |
| `CreateStudentPublicationCommentAction` | Aggiungi un commento a un'invio |
| `CreateStudentPublicationCorrectionFileAction` | Carica un file di correzione per un'invio |

### File Personali

| Controller | Scopo |
|-----------|-------|
| `CreatePersonalFileAction` | Carica un file nello spazio dei file personali dell'utente |
| `UpdatePersonalFileAction` | Aggiorna un file personale |

### Social

| Controller | Scopo |
|-----------|-------|
| `LikeSocialPostController` | Metti "Mi piace" a un post sociale |
| `DislikeSocialPostController` | Rimuovi "Mi piace" da un post sociale |
| `CreateSocialPostAttachmentAction` | Allega un file a un post sociale |
| `SocialPostAttachmentsController` | Elenca gli allegati di un post sociale |
| `AbstractFeedbackSocialPostController` | Classe base per le azioni di feedback sui post sociali |

### Sessioni

| Controller | Scopo |
|-----------|-------|
| `CreateSessionWithUsersAndCoursesAction` | Crea una sessione e iscrivi utenti e corsi in una sola chiamata |

### Utenti e URL di Accesso

| Controller | Scopo |
|-----------|-------|
| `CreateUserOnAccessUrlAction` | Crea un utente e associalo a un URL di accesso |
| `UserAccessUrlsController` | Elenca gli URL di accesso a cui appartiene un utente |
| `UserSkillsController` | Elenca le competenze assegnate a un utente |

### Videoconferenza

| Controller | Scopo |
|-----------|-------|
| `VideoConferenceCallbackController` | Gestisce i callback da fornitori esterni di videoconferenza |

### Classi Base

| Classe | Scopo |
|-------|-------|
| `BaseResourceFileAction` | Classe base per le azioni di caricamento file; gestisce l'analisi multipart, la creazione di nodi di risorse e l'archiviazione |

---
## Implementazione di un'Azione Personalizzata

Le azioni personalizzate sono controller Symfony standard referenziati nelle definizioni delle operazioni di API Platform. L'attributo `#[ApiResource]` risiede sull'**entità**, e il parametro `controller:` di ogni operazione punta alla classe dell'azione:

```php
// Sulla classe dell'entità (ad esempio src/CourseBundle/Entity/CDocument.php):
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

La classe dell'azione stessa è un controller invocabile semplice — i servizi vengono iniettati tramite gli argomenti del metodo `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... altri servizi iniettati
    ): CDocument {
        // Gestisce il caricamento e restituisce l'entità
    }
}
```

Punti chiave:
- `deserialize: false` è impostato quando l'azione legge direttamente la richiesta (ad esempio per caricamenti di file multipart) invece di lasciare che API Platform deserializzi un corpo JSON.
- Le azioni di caricamento file tipicamente estendono `BaseResourceFileAction`, che gestisce l'analisi multipart e il collegamento del nodo della risorsa.
- La sicurezza è applicata tramite il parametro `security:` sull'operazione, non all'interno del controller.