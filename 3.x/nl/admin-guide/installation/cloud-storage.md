# Cloudopslag

Chamilo 3.0 ondersteunt backends voor cloudopslag voor door gebruikers geüploade bestanden via **Flysystem**, een PHP-bibliotheek voor abstractie van het bestandssysteem die in Symfony is geïntegreerd. Hierdoor kunt u bestanden opslaan op clouddiensten in plaats van (of naast) het lokale bestandssysteem.

## Waarom cloudopslag gebruiken?

* **Schaalbaarheid** -- Cloudopslag groeit mee met uw platform zonder dat u schijfruimte hoeft te beheren.
* **Implementaties met meerdere servers** -- Wanneer u meerdere webservers achter een load balancer draait, zorgt cloudopslag ervoor dat alle servers toegang hebben tot dezelfde bestanden.
* **Duurzaamheid** -- Cloudproviders bieden ingebouwde redundantie en back-up.
* **Kosten** -- Objectopslag is per gigabyte vaak goedkoper dan block storage die aan servers is gekoppeld.

## Ondersteunde providers

| Provider | Flysystem-adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-compatibel) | Gebruikt de S3-adapter met een aangepast eindpunt |
| **DigitalOcean Spaces** (S3-compatibel) | Gebruikt de S3-adapter met een aangepast eindpunt |
| **Lokaal bestandssysteem** | Standaard, geen extra pakketten nodig |

## Installatie

Chamilo wordt al geleverd met de volgende vooraf geïnstalleerde providers:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Configuratie

Chamilo verdeelt zijn bestanden over verschillende Flysystem-mounts — **assets**, **assets cache**, **resources**, **resources cache**, **themes** en **plugins**. Elke mount kan naar een andere bucket of container wijzen. De cloudconfiguratie in `config/packages/oneup_flysystem.yaml` wordt per omgeving geselecteerd met `when@`-voorwaarden en leest de variabelen die u in `.env` instelt.

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

Configureer GCS op dezelfde manier als S3, met GCS-specifieke omgevingsvariabelen en één bucket per mount. Raadpleeg het bestand `oneup_flysystem.yaml` dat bij uw release wordt geleverd voor de exacte variabelenamen — deze staan ook gedocumenteerd in `.env`.

### MinIO (S3-compatibel)

MinIO werkt via de S3-adapter met een aangepast eindpunt en path-style addressing — stel `AWS_S3_STORAGE_*` in zoals voor S3 en voeg het MinIO-eindpunt en de path-style-vlaggen toe die door de bundle worden ondersteund.

### DigitalOcean Spaces (S3-compatibel)

DigitalOcean Spaces is een aparte, gehoste dienst ten opzichte van MinIO — het is niet MinIO onder de motorkap, maar het biedt dezelfde S3-compatibele API, zodat het eveneens via de S3-adapter werkt: stel `AWS_S3_STORAGE_*` in zoals voor S3, en wijs `AWS_S3_STORAGE_ENDPOINT` (of de equivalente eindpuntvariabele van de bundle) naar het regionale eindpunt van uw Space, bijvoorbeeld `https://<region>.digitaloceanspaces.com`.

> De volledige set variabelenamen staat in het bestand `.env.dist` dat bij Chamilo wordt geleverd. Kopieer alleen de regels voor de provider die u daadwerkelijk gebruikt naar uw `.env` en haal het commentaar eraf.

## Thema's

De **themes**-mount gedraagt zich anders dan de andere: de thema's die bij Chamilo worden geleverd (`chamilo`, `chamilo3`) maken deel uit van de code en staan in `var/themes`, precies de map die de standaard lokale adapter bedient. Wanneer u de themes-mount naar een cloudcontainer wijst, is die container in het begin leeg, zodat logo's, kleuren en thema-afbeeldingen ontbreken en de interface zonder opmaak wordt weergegeven.

Upload de meegeleverde thema's naar de geconfigureerde opslag met:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Optie | Effect |
|--------|--------|
| `--dry-run` | Rapporteert wat zou worden geüpload, zonder iets te schrijven |
| `--overwrite` | Vervangt bestanden die al op de externe opslag aanwezig zijn |

Bestanden die al op het themes-bestandssysteem aanwezig zijn, blijven behouden tenzij `--overwrite` wordt opgegeven, zodat het opnieuw uitvoeren van het commando nooit de logo's of kleurthema's weggooit die een beheerder via **Beheer > Configuratie > Kleuren** heeft geüpload. Wanneer het themes-bestandssysteem de lokale map `var/themes` is, detecteert het commando dat en doet het niets, zodat het veilig is om het op elke installatie uit te voeren.

Chamilo voert dit commando zelf uit aan het einde van de installatiewizard en opnieuw na een geslaagde databasemigratie bij een upgrade, zodat nieuwe themabestanden de cloudopslag bereiken zonder handmatige stap.

Twee gevallen vereisen nog steeds dat u het handmatig uitvoert:

* **Een bestaande platform naar cloudopslag overzetten**, omdat er op dat moment geen installatie of upgrade plaatsvindt.
* **Themabestanden vernieuwen die in een nieuwe release zijn gewijzigd**, met `--overwrite`. De automatische uitvoeringen overschrijven nooit, juist zodat ze een logo dat een beheerder in een meegeleverd thema heeft geüpload niet kunnen terugdraaien; de prijs is dat een `colors.css` of `tiny-settings.js` die de nieuwe release meelevert, de kopie die al in de container staat niet vervangt.

## Bestaande bestanden migreren

Als u op een bestaand platform van lokale opslag naar cloudopslag overschakelt, moet u de bestaande bestanden migreren:

1. Configureer de nieuwe opslagadapter zoals hierboven beschreven.
2. Kopieer bestaande bestanden van de lokale map `var/upload/` naar uw cloudopslagbucket, met behoud van de mappenstructuur.
3. Voer `php bin/console chamilo:remote-storage:upload-themes` uit om de meegeleverde thema's te uploaden, zoals hierboven beschreven.
4. Controleer of bestanden na de migratie via het platform toegankelijk zijn.

## Rechten en toegang

Zorg ervoor dat uw cloudopslagbucket **niet openbaar toegankelijk** is, tenzij u expliciet openbare bestands-URL's nodig hebt. Chamilo serveert bestanden via de eigen toegangscontrolielaag, zodat directe openbare toegang tot de bucket overbodig is en een beveiligingsrisico vormt.

Voor S3 gebruikt u een bucketbeleid dat de toegang beperkt tot de hierboven geconfigureerde IAM-referenties.

## Tips

* **Test lokaal met MinIO** voordat u naar een cloudprovider uitrolt -- MinIO is een gratis, S3-compatibele server die u op uw eigen machine kunt draaien.
* **DigitalOcean Spaces** is een gehoste S3-compatibele alternatief voor Amazon S3, waarvan is bevestigd dat het werkt met de S3-adapter van Chamilo.
* **Gebruik een dedicated bucket** voor Chamilo in plaats van een bucket met andere toepassingen te delen.
* **Stel lifecycle policies in** op uw cloudbucket om opslagkosten te beheren (bijv. oude bestanden naar goedkopere opslaglagen verplaatsen).