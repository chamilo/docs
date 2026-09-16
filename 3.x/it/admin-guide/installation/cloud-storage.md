# Cloud Storage

Chamilo 3.0 supporta backend di cloud storage per i file caricati dagli utenti tramite **Flysystem**, una libreria PHP di astrazione del filesystem integrata in Symfony. Ciò consente di archiviare i file su servizi cloud invece che (o in aggiunta a) sul filesystem locale.

## Perché usare il Cloud Storage?

* **Scalabilità** -- Il cloud storage cresce insieme alla piattaforma senza dover gestire lo spazio su disco.
* **Deployment multi-server** -- Quando si eseguono più server web dietro un load balancer, il cloud storage garantisce che tutti i server accedano agli stessi file.
* **Durabilità** -- I provider cloud offrono ridondanza e backup integrati.
* **Costo** -- L'object storage è spesso più economico per gigabyte rispetto al block storage collegato ai server.

## Provider supportati

| Provider | Adapter Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (compatibile S3) | Utilizza l'adapter S3 con un endpoint personalizzato |
| **DigitalOcean Spaces** (compatibile S3) | Utilizza l'adapter S3 con un endpoint personalizzato |
| **Filesystem locale** | Predefinito, non sono necessari pacchetti aggiuntivi |

## Installazione

Chamilo include già i seguenti provider preinstallati:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Configurazione

Chamilo suddivide i propri file su diversi mount Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** e **plugins**. Ogni mount può puntare a un bucket o a un container diverso. La configurazione cloud in `config/packages/oneup_flysystem.yaml` viene selezionata in base all'ambiente tramite condizioni `when@` e legge le variabili impostate in `.env`.

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configurare GCS nello stesso modo di S3, utilizzando variabili d'ambiente specifiche per GCS e un bucket per ciascun mount. Consultare il file `oneup_flysystem.yaml` incluso nella propria release per i nomi esatti delle variabili — sono documentati anche in `.env`.

### MinIO (compatibile S3)

MinIO funziona tramite l'adapter S3 con un endpoint personalizzato e addressing in stile path — impostare `AWS_S3_STORAGE_*` come per S3 e aggiungere l'endpoint MinIO e i flag path-style supportati dal bundle.

### DigitalOcean Spaces (compatibile S3)

DigitalOcean Spaces è un servizio hosted distinto da MinIO — non è MinIO sotto il cofano, ma espone la stessa API compatibile S3, quindi funziona anch'esso tramite l'adapter S3: impostare `AWS_S3_STORAGE_*` come per S3 e puntare `AWS_S3_STORAGE_ENDPOINT` (o la variabile endpoint equivalente del bundle) all'endpoint regionale del proprio Space, ad es. `https://<region>.digitaloceanspaces.com`.

> L'elenco completo dei nomi delle variabili è riportato nel file `.env.dist` incluso in Chamilo. Copiare nel proprio `.env` solo le righe del provider effettivamente utilizzato e decommentarle.

## Temi

Il mount **themes** si comporta in modo diverso dagli altri: i temi forniti con Chamilo (`chamilo`, `chamilo3`) fanno parte del codice e risiedono in `var/themes`, che è esattamente la directory servita dall'adapter locale predefinito. Quando si punta il mount dei temi a un container cloud, quel container parte vuoto, quindi loghi, colori e immagini dei temi mancano e l'interfaccia viene visualizzata senza stile.

Caricare i temi in bundle nello storage configurato con:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Opzione | Effetto |
|--------|--------|
| `--dry-run` | Riporta ciò che verrebbe caricato, senza scrivere nulla |
| `--overwrite` | Sostituisce i file già esistenti nello storage remoto |

I file già presenti sul filesystem dei temi vengono conservati a meno che non si specifichi `--overwrite`, quindi rieseguire il comando non scarta mai i loghi o i temi di colore che un amministratore ha caricato tramite **Amministrazione > Configurazione > Colori**. Quando il filesystem dei temi è la directory locale `var/themes` il comando lo rileva e non fa nulla, quindi è sicuro eseguirlo su qualsiasi installazione.

Chamilo esegue questo comando autonomamente al termine della procedura guidata di installazione e di nuovo dopo una migrazione del database riuscita in fase di aggiornamento, così i nuovi file dei temi raggiungono lo storage cloud senza alcun passaggio manuale.

Due casi richiedono ancora di eseguirlo a mano:

* **Passaggio di una piattaforma esistente allo storage cloud**, poiché in quel momento non avviene alcuna installazione o aggiornamento.
* **Aggiornamento dei file dei temi modificati in una nuova release**, con `--overwrite`. Le esecuzioni automatiche non sovrascrivono mai, proprio per non poter ripristinare un logo che un amministratore ha caricato in un tema in bundle; il prezzo è che un `colors.css` o un `tiny-settings.js` fornito dalla nuova release non sostituisce la copia già presente nel container.

## Migrazione dei file esistenti

Se si sta passando dallo storage locale allo storage cloud su una piattaforma esistente, è necessario migrare i file esistenti:

1. Configurare il nuovo adapter di storage come descritto sopra.
2. Copiare i file esistenti dalla directory locale `var/upload/` nel bucket dello storage cloud, preservando la struttura delle directory.
3. Eseguire `php bin/console chamilo:remote-storage:upload-themes` per caricare i temi in bundle, come descritto sopra.
4. Verificare che i file siano accessibili tramite la piattaforma dopo la migrazione.

## Permessi e accesso

Assicurarsi che il bucket dello storage cloud **non sia accessibile pubblicamente** a meno che non siano esplicitamente necessari URL pubblici dei file. Chamilo serve i file attraverso il proprio livello di controllo degli accessi, quindi l'accesso pubblico diretto al bucket è inutile e costituisce un rischio per la sicurezza.

Per S3, utilizzare una policy del bucket che limiti l'accesso alle credenziali IAM configurate sopra.

## Consigli

* **Provare con MinIO in locale** prima di distribuire su un provider cloud -- MinIO è un server gratuito, compatibile con S3, che si può eseguire sulla propria macchina.
* **DigitalOcean Spaces** è un'alternativa ospitata compatibile con S3 ad Amazon S3, confermata come funzionante con l'adapter S3 di Chamilo.
* **Usare un bucket dedicato** per Chamilo piuttosto che condividere un bucket con altre applicazioni.
* **Configurare policy di lifecycle** sul bucket cloud per gestire i costi di storage (ad es. spostare i file vecchi su livelli di storage più economici).