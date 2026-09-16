# Azioni personalizzate

Oltre alle operazioni CRUD standard, Chamilo dispone di numerosi controller di azione API personalizzati (nell’ordine delle decine) che gestiscono operazioni specializzate. Il numero esatto varia tra le versioni — elencare `src/CoreBundle/Controller/Api/` per l’insieme attuale.

## Posizione

Le azioni personalizzate si trovano in `src/CoreBundle/Controller/Api/`.

## Azioni personalizzate rilevanti

### Documenti

| Controller | Scopo |
|-----------|---------|
| `CreateDocumentFileAction` | Caricare un file o creare una cartella/un documento di tipo collegamento |
| `UpdateDocumentFileAction` | Sostituire il file di un documento |
| `ReplaceDocumentFileAction` | Sostituire il file di un documento, conservandone gli ID |
| `MoveDocumentAction` | Spostare un documento in un’altra cartella |
| `UpdateVisibilityDocument` | Attivare o disattivare la visibilità del documento per i discenti |
| `DownloadAllDocumentsAction` | Scaricare tutti i documenti di una cartella come ZIP |
| `DownloadSelectedDocumentsAction` | Scaricare un insieme selezionato di documenti come ZIP |
| `DocumentUsageAction` | Elencare i corsi/sessioni in cui un documento è utilizzato |
| `DocumentLearningPathUsageAction` | Elencare i percorsi di apprendimento in cui un documento è utilizzato |

### Glossario

| Controller | Scopo |
|-----------|---------|
| `CreateCGlossaryAction` | Creare un termine di glossario |
| `UpdateCGlossaryAction` | Aggiornare un termine di glossario |
| `ExportCGlossaryAction` | Esportare il glossario su file |
| `ImportCGlossaryAction` | Importare il glossario da file |
| `ExportGlossaryToDocumentsAction` | Esportare il glossario come documento nel corso |
| `GetGlossaryCollectionController` | Ottenere la collezione del glossario con filtraggio personalizzato |

### Collegamenti

| Controller | Scopo |
|-----------|---------|
| `CreateCLinkAction` | Creare un collegamento esterno |
| `UpdateCLinkAction` | Aggiornare un collegamento esterno |
| `CreateCLinkCategoryAction` | Creare una categoria di collegamenti |
| `UpdateCLinkCategoryAction` | Aggiornare una categoria di collegamenti |
| `CheckCLinkAction` | Verificare se l’URL di un collegamento è raggiungibile |
| `ExportCLinksAction` | Esportare i collegamenti su file |
| `CLinkDetailsController` | Ottenere i dettagli di un collegamento |
| `CLinkImageController` | Ottenere o impostare l’immagine di anteprima di un collegamento |
| `GetLinksCollectionController` | Ottenere la collezione di collegamenti con filtraggio personalizzato |
| `UpdateVisibilityLink` | Attivare o disattivare la visibilità del collegamento |
| `UpdateVisibilityLinkCategory` | Attivare o disattivare la visibilità della categoria di collegamenti |
| `UpdatePositionLink` | Riordinare i collegamenti |

### Percorsi di apprendimento

| Controller | Scopo |
|-----------|---------|
| `CreateCLpAction` | Creare un percorso di apprendimento |
| `LpReorderController` | Riordinare gli elementi del percorso di apprendimento |

### Calendario

| Controller | Scopo |
|-----------|---------|
| `UpdateCCalendarEventAction` | Aggiornare un evento del calendario del corso |
| `CalendarMyStudentsScheduleAction` | Ottenere l’orario degli studenti di un docente |

### Blog

| Controller | Scopo |
|-----------|---------|
| `CreateCBlogAction` | Creare un post del blog |
| `CreateBlogAttachmentAction` | Allegare un file a un post del blog |
| `UpdateVisibilityBlog` | Attivare o disattivare la visibilità del blog |

### Dropbox

| Controller | Scopo |
|-----------|---------|
| `CreateDropboxFileAction` | Caricare un file nella dropbox (strumento di scambio file) |

### Lavori degli studenti (compiti)

| Controller | Scopo |
|-----------|---------|
| `CreateStudentPublicationFileAction` | Consegnare un file di compito |
| `CreateStudentPublicationCommentAction` | Aggiungere un commento a una consegna |
| `CreateStudentPublicationCorrectionFileAction` | Caricare un file di correzione per una consegna |

### File personali

| Controller | Scopo |
|-----------|---------|
| `CreatePersonalFileAction` | Caricare un file nello spazio file personale dell’utente |
| `UpdatePersonalFileAction` | Aggiornare un file personale |

### Social

| Controller | Scopo |
|-----------|---------|
| `LikeSocialPostController` | Mettere «mi piace» a un post social |
| `DislikeSocialPostController` | Togliere «mi piace» a un post social |
| `CreateSocialPostAttachmentAction` | Allegare un file a un post social |
| `SocialPostAttachmentsController` | Elencare gli allegati di un post social |
| `AbstractFeedbackSocialPostController` | Classe base per le azioni di feedback sui post social |

### Sessioni

| Controller | Scopo |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | Creare una sessione e iscrivere utenti e corsi in una sola chiamata |

### Utenti e URL di accesso

| Controller | Scopo |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | Creare un utente e associarlo a un URL di accesso |
| `UserAccessUrlsController` | Elencare gli URL di accesso a cui appartiene un utente |
| `UserSkillsController` | Elencare le competenze assegnate a un utente |

### Videoconferenza

| Controller | Scopo |
|-----------|---------|
| `VideoConferenceCallbackController` | Gestire i callback dei provider esterni di videoconferenza |

### Classi base

| Class | Scopo |
|-------|---------|
| `BaseResourceFileAction` | Classe base per le azioni di caricamento file; gestisce il parsing multipart, la creazione del nodo risorsa e lo storage |

## Implementazione di un'azione personalizzata

Le azioni personalizzate sono controller Symfony standard referenziati nelle definizioni delle operazioni di API Platform. L'attributo `#[ApiResource]` si trova sull'**entità** e il parametro `controller:` di ciascuna operazione punta alla classe dell'azione:

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

La classe dell'azione è un semplice controller invocabile — i servizi vengono iniettati tramite gli argomenti del metodo `__invoke()`:

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

Punti chiave:
- `deserialize: false` viene impostato quando l'azione legge direttamente la richiesta (ad es. caricamenti di file multipart) invece di lasciare che API Platform deserializzi un corpo JSON.
- Le azioni di caricamento file in genere estendono `BaseResourceFileAction`, che gestisce il parsing multipart e il collegamento dei nodi risorsa.
- La sicurezza è applicata tramite il parametro `security:` sull'operazione, non all'interno del controller.