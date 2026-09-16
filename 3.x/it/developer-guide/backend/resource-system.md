# Sistema delle risorse

Il sistema delle risorse è uno dei concetti architetturali più importanti di Chamilo 3.0. Fornisce un'astrazione unificata per tutti i contenuti del corso — documenti, esercizi, percorsi formativi, messaggi del forum e altro.

## Concetto fondamentale

Ogni elemento di contenuto del corso è rappresentato da un **ResourceNode**. Questo conferisce a tutti i tipi di contenuto un insieme comune di funzionalità:

* **Controllo della visibilità** — Mostra/nascondi agli studenti
* **Controllo degli accessi** — I security voter verificano i permessi tramite il ResourceNode
* **Archiviazione dei file** — I file allegati sono memorizzati tramite ResourceFile
* **Struttura ad albero** — I ResourceNode formano un albero (relazioni padre-figlio)
* **Tracciabilità** — Autore, data di creazione, tracciamento delle modifiche

## Entità principali

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

L'entità centrale. Ogni entità di contenuto ha una relazione uno-a-uno con un ResourceNode.

Campi principali:

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `id` | integer | Chiave primaria |
| `uuid` | UUID v4 | Identificatore univoco per l'uso tramite API |
| `title` | string | Titolo visualizzato |
| `creator` | User | L'utente che ha creato questa risorsa |
| `resourceFile` | ResourceFile | Il file allegato (se presente) |
| `resourceType` | ResourceType | Il tipo di risorsa (documento, quiz, ecc.) |
| `parent` | ResourceNode | Padre nell'albero delle risorse |
| `children` | Collection | ResourceNode figli |
| `resourceLinks` | Collection | Collegamenti di visibilità e accesso |

L'albero utilizza la strategia **materialized path** di Gedmo per query gerarchiche efficienti.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Memorizza i dati effettivi del file di una risorsa:

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `id` | integer | Chiave primaria |
| `title` | string | Nome file originale |
| `mimeType` | string | Tipo MIME |
| `originalName` | string | Nome originale del caricamento |
| `size` | integer | Dimensione del file in byte |
| `crop` | string | Dati di ritaglio (per le immagini) |

L'archiviazione dei file è gestita da Flysystem, quindi i file possono trovarsi su disco locale, S3, Azure o GCS a seconda della configurazione.

### ResourceLink

Controlla visibilità e accesso per contesto. Esistono 3 tipi di contesto principali:

1. Course
2. Session
3. Group (in un corso)

L'entità ResourceLink riflette quindi la combinazione di questi 3 tipi di contesto e definisce una visibilità per quel contesto completo:

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `course` | Course | A quale corso appartiene la risorsa |
| `session` | Session | Quale sessione (null per il corso base) |
| `group` | CGroup | Quale gruppo (null per l'intero corso) |
| `visibility` | integer | Visibile, invisibile o eliminato |

Questo consente allo stesso ResourceNode di avere visibilità diverse in contesti diversi (ad es. visibile in una sessione ma nascosto in un'altra).

Viene impostato automaticamente quando si usa l'interfaccia e si decide, ad esempio, che una risorsa è specifica di una sessione e sarà visibile per tutti i gruppi in un dato corso in una data sessione, ma invisibile nel corso base o in un'altra sessione.

Per impostazione predefinita, le risorse visibili in un corso base sono visibili anche in tutte le sessioni di quel corso, ma il tutor del corso può decidere di nascondere una risorsa da una sessione specifica. In questo caso, si recupera la visibilità specifica di questa risorsa in questa sessione e si constata che ha visibilità 0, quindi l'elemento non comparirà agli studenti in questa sessione, mentre l'assenza di visibilità specifica di sessione nelle altre sessioni farà sì che la risorsa usi la visibilità del corso base (e la risorsa sarà mostrata agli studenti).

## Integrazione con API Platform

ResourceNode è esposto come risorsa API Platform con sicurezza:

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## Come si collegano le entità di contenuto

Le entità di contenuto del corso (CDocument, CQuiz, CLp, ecc.) estendono `AbstractResource` o implementano `ResourceInterface`, il che conferisce loro una relazione `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Quando si crea un CDocument, un ResourceNode viene creato automaticamente insieme ad esso, fornendo una gestione unificata delle risorse.

## Implicazioni pratiche

Quando si lavora con i contenuti del corso:

1. **Creazione dei contenuti** — Creare sia l'entità di contenuto SIA il relativo ResourceNode
2. **Verifica dei permessi** — Usare i security voter del ResourceNode
3. **Gestione dei file** — Allegare i file tramite ResourceFile
4. **Controllo della visibilità** — Creare/modificare i ResourceLink
5. **Costruzione degli alberi** — Usare la relazione padre-figlio su ResourceNode per le strutture di cartelle (ad es. cartelle dei documenti)