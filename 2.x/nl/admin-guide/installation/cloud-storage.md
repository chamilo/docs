# Cloudopslag

Chamilo 2.0 ondersteunt cloudopslag-backends voor door gebruikers geüploade bestanden via **Flysystem**, een PHP-bestandssysteemabstractiebibliotheek die is geïntegreerd in Symfony. Hiermee kunt u bestanden opslaan op cloudservices in plaats van (of naast) het lokale bestandssysteem.

## Waarom Cloudopslag Gebruiken?

* **Schaalbaarheid** -- Cloudopslag groeit mee met uw platform zonder dat u schijfruimte hoeft te beheren.
* **Multi-server implementaties** -- Bij het draaien van meerdere webservers achter een load balancer zorgt cloudopslag ervoor dat alle servers toegang hebben tot dezelfde bestanden.
* **Duurzaamheid** -- Cloudproviders bieden ingebouwde redundantie en back-up.
* **Kosten** -- Objectopslag is vaak goedkoper per gigabyte dan blokopslag die aan servers is gekoppeld.

## Ondersteunde Providers

| Provider | Flysystem Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3-compatibel) | Gebruikt de S3-adapter met een aangepast eindpunt |
| **Lokaal bestandssysteem** | Standaard, geen extra pakketten nodig |

## Installatie

Chamilo wordt geleverd met de volgende vooraf geïnstalleerde providers:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Configuratie

Chamilo verdeelt zijn bestanden over verschillende Flysystem-mounts — **assets**, **assets cache**, **resources**, **resources cache**, **themes** en **plugins**. Elke mount kan een andere bucket of container als doel hebben. De cloudconfiguratie in `config/packages/oneup_flysystem.yaml` wordt geselecteerd op basis van de omgeving met behulp van `when@`-voorwaarden en leest de variabelen die u instelt in `.env`.

### Amazon S3

```bash
# .env — gemeenschappelijke inloggegevens
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Buckets per mount (elke mount kan een andere bucket zijn)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optionele padvoorvoegsels binnen een bucket — handig om buckets te delen tussen portalen
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
# Optionele voorvoegsels
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Configureer GCS op dezelfde manier als S3, met behulp van GCS-specifieke omgevingsvariabelen en één bucket per mount. Raadpleeg de `oneup_flysystem.yaml` die bij uw release wordt geleverd voor de exacte variabelennamen — deze zijn ook gedocumenteerd in `.env`.

### MinIO (S3-compatibel)

MinIO werkt via de S3-adapter met een aangepast eindpunt en padstijl-adressering — stel `AWS_S3_STORAGE_*` in zoals voor S3 en voeg het MinIO-eindpunt en padstijl-vlaggen toe die door de bundle worden ondersteund.

> De volledige set variabelennamen staat vermeld in het `.env.dist`-bestand dat bij Chamilo wordt geleverd. Kopieer alleen de regels voor de provider die u daadwerkelijk gebruikt naar uw `.env` en haal de opmerkingen weg.

## Bestaande Bestanden Migreren

Als u op een bestaand platform overstapt van lokale opslag naar cloudopslag, moet u de bestaande bestanden migreren:

1. Configureer de nieuwe opslagadapter zoals hierboven beschreven.
2. Kopieer bestaande bestanden van de lokale `var/upload/`-map naar uw cloudopslagbucket, waarbij de mapstructuur behouden blijft.
3. Controleer of de bestanden na de migratie toegankelijk zijn via het platform.

## Rechten en Toegang

Zorg ervoor dat uw cloudopslagbucket **niet openbaar toegankelijk** is, tenzij u expliciet openbare bestands-URL's nodig heeft. Chamilo levert bestanden via zijn eigen toegangscontrolesysteem, dus directe openbare toegang tot de bucket is onnodig en vormt een beveiligingsrisico.

Voor S3 gebruikt u een bucketbeleid dat de toegang beperkt tot de IAM-inloggegevens die hierboven zijn geconfigureerd.

## Tips

* **Test lokaal met MinIO** voordat u naar een cloudprovider overstapt -- MinIO is een gratis, S3-compatibele server die u op uw eigen machine kunt draaien.
* **Gebruik een speciale bucket** voor Chamilo in plaats van een bucket te delen met andere toepassingen.
* **Stel levenscyclusbeleid in** op uw cloudbucket om opslagkosten te beheren (bijvoorbeeld oude bestanden verplaatsen naar goedkopere opslagniveaus).