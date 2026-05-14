# Archiviazione Cloud

Chamilo 2.0 supporta backend di archiviazione cloud per i file caricati dagli utenti tramite **Flysystem**, una libreria di astrazione del filesystem PHP integrata in Symfony. Questo consente di archiviare i file su servizi cloud invece di (o in aggiunta a) il filesystem locale.

## Perché Utilizzare l'Archiviazione Cloud?

* **Scalabilità** -- L'archiviazione cloud cresce con la tua piattaforma senza dover gestire lo spazio su disco.
* **Distribuzioni multi-server** -- Quando si eseguono più server web dietro un bilanciatore di carico, l'archiviazione cloud garantisce che tutti i server accedano agli stessi file.
* **Durabilità** -- I provider cloud offrono ridondanza e backup integrati.
* **Costo** -- L'archiviazione di oggetti è spesso più economica per gigabyte rispetto all'archiviazione a blocchi collegata ai server.

## Provider Supportati

| Provider | Adattatore Flysystem |
|----------|----------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (compatibile con S3) | Utilizza l'adattatore S3 con un endpoint personalizzato |
| **Filesystem locale** | Predefinito, non sono necessari pacchetti aggiuntivi |

## Installazione

Chamilo include già i seguenti provider preinstallati:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Configurazione

Chamilo suddivide i suoi file in diversi mount Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes** e **plugins**. Ogni mount può essere indirizzato a un bucket o contenitore diverso. La configurazione cloud in `config/packages/oneup_flysystem.yaml` viene selezionata in base all'ambiente utilizzando condizioni `when@` e legge le variabili impostate in `.env`.

### Amazon S3

```bash
# .env — credenziali comuni
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Bucket per mount (ogni mount può essere un bucket diverso)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Prefissi di percorso opzionali all'interno di un bucket — utili per condividere bucket tra portali
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
# Prefissi opzionali
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configura GCS allo stesso modo di S3, utilizzando variabili di ambiente specifiche per GCS e un bucket per ogni mount. Consulta il file `oneup_flysystem.yaml` fornito con la tua versione per i nomi esatti delle variabili — sono anche documentati in `.env`.

### MinIO (Compatibile con S3)

MinIO funziona tramite l'adattatore S3 con un endpoint personalizzato e un indirizzamento in stile percorso — imposta `AWS_S3_STORAGE_*` come per S3 e aggiungi l'endpoint MinIO e i flag di stile percorso supportati dal bundle.

> L'insieme completo dei nomi delle variabili è elencato nel file `.env.dist` fornito con Chamilo. Copia solo le righe per il provider che utilizzi effettivamente nel tuo `.env` e decommentale.

## Migrazione dei File Esistenti

Se stai passando dall'archiviazione locale all'archiviazione cloud su una piattaforma esistente, devi migrare i file esistenti:

1. Configura il nuovo adattatore di archiviazione come descritto sopra.
2. Copia i file esistenti dalla directory locale `var/upload/` al tuo bucket di archiviazione cloud, preservando la struttura delle directory.
3. Verifica che i file siano accessibili tramite la piattaforma dopo la migrazione.

## Permessi e Accesso

Assicurati che il tuo bucket di archiviazione cloud **non sia accessibile pubblicamente** a meno che tu non abbia esplicitamente bisogno di URL di file pubblici. Chamilo serve i file attraverso il proprio livello di controllo degli accessi, quindi l'accesso pubblico diretto al bucket non è necessario ed è un rischio per la sicurezza.

Per S3, utilizza una policy del bucket che limiti l'accesso alle credenziali IAM configurate sopra.

## Suggerimenti

* **Testa con MinIO localmente** prima di distribuire su un provider cloud -- MinIO è un server gratuito, compatibile con S3, che puoi eseguire sulla tua macchina.
* **Usa un bucket dedicato** per Chamilo invece di condividere un bucket con altre applicazioni.
* **Imposta politiche di ciclo di vita** sul tuo bucket cloud per gestire i costi di archiviazione (ad esempio, sposta i file vecchi su livelli di archiviazione più economici).