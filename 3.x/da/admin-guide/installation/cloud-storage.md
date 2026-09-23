# Cloud Storage

Chamilo 3.0 understøtter cloud storage-backends til brugeruploadede filer via **Flysystem**, et PHP-bibliotek til filsystemabstraktion integreret i Symfony. Det giver dig mulighed for at gemme filer på cloudtjenester i stedet for (eller i tillæg til) det lokale filsystem.

## Hvorfor bruge Cloud Storage?

* **Skalerbarhed** -- Cloud storage vokser med din platform uden at du skal administrere diskplads.
* **Fler-server-installationer** -- Når du kører flere webservere bag en load balancer, sikrer cloud storage, at alle servere har adgang til de samme filer.
* **Holdbarhed** -- Cloududbydere tilbyder indbygget redundans og backup.
* **Omkostninger** -- Objektlagring er ofte billigere pr. gigabyte end bloklagring tilknyttet servere.

## Understøttede udbydere

| Udbyder | Flysystem-adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-kompatibel) | Bruger S3-adapteren med et brugerdefineret endpoint |
| **DigitalOcean Spaces** (S3-kompatibel) | Bruger S3-adapteren med et brugerdefineret endpoint |
| **Lokalt filsystem** | Standard, ingen ekstra pakker nødvendige |

## Installation

Chamilo leveres allerede med følgende forudinstallerede udbydere:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Konfiguration

Chamilo fordeler sine filer på flere Flysystem-mounts — **assets**, **assets cache**, **resources**, **resources cache**, **themes** og **plugins**. Hvert mount kan pege på en anden bucket eller container. Cloudkonfigurationen i `config/packages/oneup_flysystem.yaml` vælges efter miljø ved hjælp af `when@`-betingelser og læser de variabler, du angiver i `.env`.

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

Konfigurer GCS på samme måde som S3 ved hjælp af GCS-specifikke miljøvariabler og én bucket pr. mount. Se `oneup_flysystem.yaml`, der følger med din udgivelse, for de nøjagtige variabelnavne — de er også dokumenteret i `.env`.

### MinIO (S3-kompatibel)

MinIO virker via S3-adapteren med et brugerdefineret endpoint og path-style-adressering — sæt `AWS_S3_STORAGE_*` som for S3, og tilføj MinIO-endpointet og de path-style-flag, som bundlen understøtter.

### DigitalOcean Spaces (S3-kompatibel)

DigitalOcean Spaces er en separat, hostet tjeneste i forhold til MinIO — det er ikke MinIO under motorhjelmen, men det eksponerer den samme S3-kompatible API, så det virker også via S3-adapteren: sæt `AWS_S3_STORAGE_*` som for S3, og peg `AWS_S3_STORAGE_ENDPOINT` (eller bundlens tilsvarende endpoint-variabel) på din Spaces regionale endpoint, f.eks. `https://<region>.digitaloceanspaces.com`.

> Det fulde sæt af variabelnavne er angivet i filen `.env.dist`, der følger med Chamilo. Kopiér kun linjerne for den udbyder, du faktisk bruger, ind i din `.env`, og fjern udkommenteringen.

## Temaer

**Temaer**-mounten opfører sig anderledes end de øvrige: de temaer, der følger med Chamilo (`chamilo`, `chamilo3`), er en del af koden og ligger i `var/themes`, som er præcis den mappe, den lokale standardadapter betjener. Når du peger tema-mounten mod en cloud-container, starter den container tom, så logoer, farver og temabilleder mangler, og grænsefladen vises uden styling.

Upload de medfølgende temaer til det konfigurerede lager med:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Option | Effect |
|--------|--------|
| `--dry-run` | Report what would be uploaded, without writing anything |
| `--overwrite` | Replace files that already exist on the remote storage |

Filer, der allerede findes på temafilsystemet, bevares, medmindre `--overwrite` angives, så en ny kørsel af kommandoen aldrig kasserer de logoer eller farvetemaer, en administrator har uploadet via **Administration > Configuration > Colors**. Når temafilsystemet er den lokale mappe `var/themes`, registrerer kommandoen det og gør intet, så det er sikkert at køre den på enhver installation.

Chamilo kører selv denne kommando ved afslutningen af installationsguiden og igen efter en vellykket databasemigrering ved opgradering, så nye temafiler når cloud-lageret uden noget manuelt trin.

To tilfælde kræver stadig, at du kører den i hånden:

* **Skift af en eksisterende platform til cloud-lager**, da der på det tidspunkt ikke sker nogen installation eller opgradering.
* **Opdatering af temafiler, der er ændret i en ny udgivelse**, med `--overwrite`. De automatiske kørsler overskriver aldrig, netop så de ikke kan rulle et logo tilbage, som en administrator har uploadet ind i et medfølgende tema; prisen er, at en `colors.css` eller `tiny-settings.js` leveret af den nye udgivelse ikke erstatter den kopi, der allerede ligger i containeren.

## Migrering af eksisterende filer

Hvis du skifter fra lokalt lager til cloud-lager på en eksisterende platform, skal du migrere de eksisterende filer:

1. Konfigurer den nye lageradapter som beskrevet ovenfor.
2. Kopiér eksisterende filer fra den lokale mappe `var/upload/` til din cloud-lagerbucket, og bevar mappestrukturen.
3. Kør `php bin/console chamilo:remote-storage:upload-themes` for at uploade de medfølgende temaer, som beskrevet ovenfor.
4. Kontrollér, at filerne er tilgængelige via platformen efter migreringen.

## Rettigheder og adgang

Sørg for, at din cloud-lagerbucket **ikke er offentligt tilgængelig**, medmindre du eksplicit har brug for offentlige fil-URL'er. Chamilo serverer filer gennem sit eget adgangskontrollag, så direkte offentlig adgang til bucketen er unødvendig og en sikkerhedsrisiko.

For S3 skal du bruge en bucket-politik, der begrænser adgangen til de IAM-legitimationsoplysninger, der er konfigureret ovenfor.

## Tips

* **Test med MinIO lokalt**, før du udruller til en cloud-udbyder -- MinIO er en gratis, S3-kompatibel server, du kan køre på din egen maskine.
* **DigitalOcean Spaces** er et hostet S3-kompatibelt alternativ til Amazon S3, som er bekræftet at virke med Chamilos S3-adapter.
* **Brug en dedikeret bucket** til Chamilo frem for at dele en bucket med andre applikationer.
* **Opsæt livscykluspolitikker** på din cloud-bucket for at styre lageromkostninger (f.eks. flyt gamle filer til billigere lagerniveauer).