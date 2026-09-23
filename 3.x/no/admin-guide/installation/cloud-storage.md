# Skylagring

Chamilo 3.0 støtter skylagringsbakender for filer lastet opp av brukere via **Flysystem**, et PHP-bibliotek for filsystemabstraksjon integrert i Symfony. Dette gjør at du kan lagre filer på skytjenester i stedet for (eller i tillegg til) det lokale filsystemet.

## Hvorfor bruke skylagring?

* **Skalerbarhet** -- Skylagring vokser med plattformen din uten at du må administrere diskplass.
* **Flererverdistribusjoner** -- Når du kjører flere webservere bak en lastbalanser, sørger skylagring for at alle servere har tilgang til de samme filene.
* **Holdbarhet** -- Skyleverandører tilbyr innebygd redundans og sikkerhetskopiering.
* **Kostnad** -- Objektlagring er ofte billigere per gigabyte enn blokklagring tilknyttet servere.

## Støttede leverandører

| Leverandør | Flysystem-adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-kompatibel) | Bruker S3-adapteren med et tilpasset endepunkt |
| **DigitalOcean Spaces** (S3-kompatibel) | Bruker S3-adapteren med et tilpasset endepunkt |
| **Lokalt filsystem** | Standard, ingen tilleggs pakker nødvendig |

## Installasjon

Chamilo leveres allerede med følgende forhåndsinstallerte leverandører:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Konfigurasjon

Chamilo fordeler filene sine over flere Flysystem-monteringer — **assets**, **assets cache**, **resources**, **resources cache**, **themes** og **plugins**. Hver montering kan peke mot en annen bøtte eller beholder. Skykonfigurasjonen i `config/packages/oneup_flysystem.yaml` velges etter miljø ved hjelp av `when@`-betingelser og leser variablene du setter i `.env`.

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

Konfigurer GCS på samme måte som S3, med GCS-spesifikke miljøvariabler og én bøtte per montering. Se `oneup_flysystem.yaml` som følger med utgivelsen din for de nøyaktige variabelnavnene — de er også dokumentert i `.env`.

### MinIO (S3-kompatibel)

MinIO fungerer via S3-adapteren med et tilpasset endepunkt og path-style-adressering — sett `AWS_S3_STORAGE_*` som for S3 og legg til MinIO-endepunktet og path-style-flaggene som støttes av pakken.

### DigitalOcean Spaces (S3-kompatibel)

DigitalOcean Spaces er en separat, hostet tjeneste fra MinIO — det er ikke MinIO under panseret, men det eksponerer det samme S3-kompatible API-et, så det fungerer også via S3-adapteren: sett `AWS_S3_STORAGE_*` som for S3, og pek `AWS_S3_STORAGE_ENDPOINT` (eller pakkens tilsvarende endepunktvariabel) mot Space-ens regionale endepunkt, f.eks. `https://<region>.digitaloceanspaces.com`.

> Det fullstendige settet med variabelnavn er listet i `.env.dist`-filen som følger med Chamilo. Kopier kun linjene for leverandøren du faktisk bruker inn i `.env` og fjern kommentartegnene.

## Temaer

**Temaer**-monteringen oppfører seg annerledes enn de andre: temaene som følger med Chamilo (`chamilo`, `chamilo3`) er en del av koden og ligger i `var/themes`, som er nøyaktig katalogen den lokale standardadapteren betjener. Når du peker temamonteringen mot en skycontainer, starter den containeren tom, så logoer, farger og temabilder mangler, og grensesnittet vises uten styling.

Last opp de medfølgende temaene til det konfigurerte lagringsområdet med:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Alternativ | Effekt |
|--------|--------|
| `--dry-run` | Rapporter hva som ville blitt lastet opp, uten å skrive noe |
| `--overwrite` | Erstatt filer som allerede finnes på den eksterne lagringen |

Filer som allerede finnes på temafilsystemet beholdes med mindre `--overwrite` er angitt, så å kjøre kommandoen på nytt forkaster aldri logoene eller fargetemaene en administrator lastet opp via **Administrasjon > Konfigurasjon > Farger**. Når temafilsystemet er den lokale katalogen `var/themes`, oppdager kommandoen det og gjør ingenting, så det er trygt å kjøre den på enhver installasjon.

Chamilo kjører denne kommandoen selv på slutten av installasjonsveiviseren og igjen etter en vellykket databasemigrering ved oppgradering, slik at nye temafiler når skylagringen uten noe manuelt trinn.

To tilfeller krever fortsatt at du kjører den for hånd:

* **Å bytte en eksisterende plattform til skylagring**, siden det da ikke skjer noen installasjon eller oppgradering.
* **Å oppdatere temafiler som er endret i en ny utgivelse**, med `--overwrite`. De automatiske kjøringene overskriver aldri, nettopp slik at de ikke kan tilbakestille en logo en administrator lastet opp i et medfølgende tema; prisen er at en `colors.css` eller `tiny-settings.js` som følger med den nye utgivelsen, ikke erstatter kopien som allerede ligger i containeren.

## Migrering av eksisterende filer

Hvis du bytter fra lokal lagring til skylagring på en eksisterende plattform, må du migrere de eksisterende filene:

1. Konfigurer den nye lagringsadapteren som beskrevet ovenfor.
2. Kopier eksisterende filer fra den lokale katalogen `var/upload/` til skylagringsbøtten din, og behold katalogstrukturen.
3. Kjør `php bin/console chamilo:remote-storage:upload-themes` for å laste opp de medfølgende temaene, som beskrevet ovenfor.
4. Kontroller at filene er tilgjengelige gjennom plattformen etter migreringen.

## Tillatelser og tilgang

Sørg for at skylagringsbøtten **ikke er offentlig tilgjengelig** med mindre du eksplisitt trenger offentlige fil-URL-er. Chamilo serverer filer gjennom sitt eget tilgangskontrollag, så direkte offentlig tilgang til bøtten er unødvendig og en sikkerhetsrisiko.

For S3, bruk en bøttepolicy som begrenser tilgangen til IAM-legitimasjonen som er konfigurert ovenfor.

## Tips

* **Test med MinIO lokalt** før du ruller ut til en skyleverandør -- MinIO er en gratis, S3-kompatibel server du kan kjøre på din egen maskin.
* **DigitalOcean Spaces** er et vertstjenestebasert S3-kompatibelt alternativ til Amazon S3, bekreftet å fungere med Chamilos S3-adapter.
* **Bruk en dedikert bøtte** for Chamilo i stedet for å dele en bøtte med andre applikasjoner.
* **Sett opp livssykluspolicyer** på skylagringsbøtten for å styre lagringskostnader (f.eks. flytte gamle filer til billigere lagringstrinn).