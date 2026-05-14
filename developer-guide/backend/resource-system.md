# Sistema delle Risorse

Il sistema delle risorse è uno dei concetti architettonici più importanti in Chamilo 2.0. Fornisce un'astrazione unificata per tutti i contenuti del corso: documenti, esercizi, percorsi di apprendimento, post nei forum e altro ancora.

## Concetto Fondamentale

Ogni elemento di contenuto del corso è rappresentato da un **ResourceNode**. Questo conferisce a tutti i tipi di contenuto un insieme comune di funzionalità:

* **Controllo della visibilità** — Mostra/nascondi agli studenti
* **Controllo degli accessi** — I votanti di sicurezza verificano i permessi tramite il ResourceNode
* **Archiviazione dei file** — I file allegati sono memorizzati tramite ResourceFile
* **Struttura ad albero** — I ResourceNode formano un albero (relazioni genitore-figlio)
* **Tracciamento delle modifiche** — Creatore, data di creazione, monitoraggio delle modifiche

## Entità Chiave

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

L'entità centrale. Ogni entità di contenuto ha una relazione uno-a-uno con un ResourceNode.

Campi principali:

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `id` | integer | Chiave primaria |
| `uuid` | UUID v4 | Identificatore univoco per l'uso API |
| `title` | string | Titolo visualizzato |
| `creator` | User | L'utente che ha creato questa risorsa |
| `resourceFile` | ResourceFile | Il file allegato (se presente) |
| `resourceType` | ResourceType | Il tipo di risorsa (documento, quiz, ecc.) |
| `parent` | ResourceNode | Genitore nell'albero delle risorse |
| `children` | Collection | ResourceNode figli |
| `resourceLinks` | Collection | Collegamenti per visibilità e accesso |

L'albero utilizza la strategia **materialized path** di Gedmo per query gerarchiche efficienti.

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

Memorizza i dati effettivi del file per una risorsa:

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `id` | integer | Chiave primaria |
| `title` | string | Nome del file originale |
| `mimeType` | string | Tipo MIME |
| `originalName` | string | Nome originale del caricamento |
| `size` | integer | Dimensione del file in byte |
| `crop` | string | Dati di ritaglio (per immagini) |

L'archiviazione dei file è gestita da Flysystem, quindi i file possono trovarsi su disco locale, S3, Azure o GCS a seconda della configurazione.

### ResourceLink

Controlla la visibilità e l'accesso per contesto. Esistono 3 tipi principali di contesto:

1. Corso
2. Sessione
3. Gruppo (in un corso)

Quindi l'entità ResourceLink riflette la combinazione di questi 3 tipi di contesto e stabilisce una visibilità per quel contesto completo:

| Campo | Tipo | Descrizione |
|-------|------|-------------|
| `course` | Course | A quale corso appartiene la risorsa |
| `session` | Session | A quale sessione (null per il corso base) |
| `group` | CGroup | A quale gruppo (null per l'intero corso) |
| `visibility` | integer | Visibile, invisibile o eliminato |

Questo consente allo stesso ResourceNode di avere una visibilità diversa in contesti diversi (ad esempio, visibile in una sessione ma nascosto in un'altra).

Questo viene impostato automaticamente quando si utilizza l'interfaccia e si decide, ad esempio, che una risorsa è specifica di una sessione e sarà visibile per tutti i gruppi in un dato corso in una data sessione, ma invisibile nel corso base o in un'altra sessione.

Per impostazione predefinita, le risorse visibili in un corso base sono visibili anche in tutte le sessioni di quel corso, ma il tutor del corso può decidere di nascondere una risorsa da una specifica sessione. In questo caso, recupereremo la visibilità specifica per questa risorsa in questa sessione e vedremo che ha una visibilità di 0, quindi l'elemento non apparirà agli studenti in questa sessione, mentre l'assenza di una visibilità specifica per sessione in altre sessioni farà sì che la risorsa utilizzi la visibilità del corso base (e la risorsa sarà visibile agli studenti).

## Integrazione con API Platform

ResourceNode è esposto come risorsa di API Platform con sicurezza:

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

## Come si Collegano le Entità di Contenuto

Le entità di contenuto del corso (CDocument, CQuiz, CLp, ecc.) estendono `AbstractResource` o implementano `ResourceInterface`, il che conferisce loro una relazione `resourceNode`:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

Quando si crea un CDocument, un ResourceNode viene automaticamente creato insieme ad esso, fornendo una gestione unificata delle risorse.

## Implicazioni Pratiche

Quando si lavora con i contenuti del corso:

1. **Creazione di contenuti** — Creare sia l'entità di contenuto CHE il suo ResourceNode
2. **Verifica dei permessi** — Utilizzare i votanti di sicurezza del ResourceNode
3. **Gestione dei file** — Allegare file tramite ResourceFile
4. **Controllo della visibilità** — Creare/modificare ResourceLinks
5. **Costruzione di alberi** — Utilizzare la relazione genitore-figlio su ResourceNode per strutture di cartelle (ad esempio, cartelle di documenti)