# Molnlagring

Chamilo 3.0 stöder molnlagringsbackends för filer som användare laddar upp via **Flysystem**, ett PHP-bibliotek för filsystemabstraktion som är integrerat i Symfony. Detta gör att du kan lagra filer på molntjänster i stället för (eller utöver) det lokala filsystemet.

## Varför använda molnlagring?

* **Skalbarhet** -- Molnlagring växer med din plattform utan att du behöver hantera diskutrymme.
* **Distributioner med flera servrar** -- När du kör flera webbservrar bakom en lastbalanserare säkerställer molnlagring att alla servrar kommer åt samma filer.
* **Beständighet** -- Molnleverantörer erbjuder inbyggd redundans och säkerhetskopiering.
* **Kostnad** -- Objektlagring är ofta billigare per gigabyte än blocklagring som är kopplad till servrar.

## Stödda leverantörer

| Leverantör | Flysystem-adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-kompatibel) | Använder S3-adaptern med en anpassad slutpunkt |
| **DigitalOcean Spaces** (S3-kompatibel) | Använder S3-adaptern med en anpassad slutpunkt |
| **Lokalt filsystem** | Standard, inga ytterligare paket behövs |

## Installation

Chamilo levereras redan med följande förinstallerade leverantörer:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Konfiguration

Chamilo delar upp sina filer på flera Flysystem-monteringar — **assets**, **assets cache**, **resources**, **resources cache**, **themes** och **plugins**. Varje montering kan peka mot en annan bucket eller container. Molnkonfigurationen i `config/packages/oneup_flysystem.yaml` väljs per miljö med `when@`-villkor och läser de variabler du anger i `.env`.

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

Konfigurera GCS på samma sätt som S3, med GCS-specifika miljövariabler och en bucket per montering. Se `oneup_flysystem.yaml` som medföljer din utgåva för de exakta variabelnamnen — de dokumenteras också i `.env`.

### MinIO (S3-kompatibel)

MinIO fungerar via S3-adaptern med en anpassad slutpunkt och path-style-adressering — ange `AWS_S3_STORAGE_*` som för S3 och lägg till MinIO-slutpunkten och de path-style-flaggor som paketet stöder.

### DigitalOcean Spaces (S3-kompatibel)

DigitalOcean Spaces är en separat, hostad tjänst skild från MinIO — det är inte MinIO under huven, men det exponerar samma S3-kompatibla API, så det fungerar också via S3-adaptern: ange `AWS_S3_STORAGE_*` som för S3 och peka `AWS_S3_STORAGE_ENDPOINT` (eller paketets motsvarande slutpunktsvariabel) mot din Spaces regionala slutpunkt, t.ex. `https://<region>.digitaloceanspaces.com`.

> Den fullständiga uppsättningen variabelnamn listas i filen `.env.dist` som medföljer Chamilo. Kopiera endast raderna för den leverantör du faktiskt använder till din `.env` och avkommentera dem.

## Teman

**Teman**-monteringen beter sig annorlunda än de övriga: de teman som medföljer Chamilo (`chamilo`, `chamilo3`) är en del av koden och ligger i `var/themes`, vilket är exakt den katalog som den lokala standardadaptern betjänar. När du pekar teman-monteringen mot en molncontainer är den containern tom från början, så logotyper, färger och temabilder saknas och gränssnittet renderas ostilat.

Ladda upp de medföljande temana till den konfigurerade lagringen med:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Alternativ | Effekt |
|--------|--------|
| `--dry-run` | Rapportera vad som skulle laddas upp, utan att skriva något |
| `--overwrite` | Ersätt filer som redan finns på fjärrlagringen |

Filer som redan finns i temans filsystem behålls om inte `--overwrite` anges, så att kommandot aldrig kastar bort de logotyper eller färgteman som en administratör laddat upp via **Administration > Configuration > Colors**. När temans filsystem är den lokala katalogen `var/themes` upptäcker kommandot det och gör ingenting, så det är säkert att köra på vilken installation som helst.

Chamilo kör detta kommando själv i slutet av installationsguiden och igen efter en lyckad databas-migrering vid uppgradering, så att nya temafiler når molnlagringen utan något manuellt steg.

Två fall kräver fortfarande att du kör det för hand:

* **Att byta en befintlig plattform till molnlagring**, eftersom ingen installation eller uppgradering sker vid den tidpunkten.
* **Att uppdatera temafiler som ändrats i en ny version**, med `--overwrite`. De automatiska körningarna skriver aldrig över, just så att de inte kan återställa en logotyp som en administratör laddat upp i ett medföljande tema; priset är att en `colors.css` eller `tiny-settings.js` som medföljer den nya versionen inte ersätter kopian som redan finns i containern.

## Migrera befintliga filer

Om du byter från lokal lagring till molnlagring på en befintlig plattform måste du migrera de befintliga filerna:

1. Konfigurera den nya lagringsadaptern enligt beskrivningen ovan.
2. Kopiera befintliga filer från den lokala katalogen `var/upload/` till din molnlagringsbucket, med bibehållen katalogstruktur.
3. Kör `php bin/console chamilo:remote-storage:upload-themes` för att ladda upp de medföljande temana, enligt beskrivningen ovan.
4. Kontrollera att filerna är tillgängliga via plattformen efter migreringen.

## Behörigheter och åtkomst

Se till att din molnlagringsbucket **inte är allmänt tillgänglig** om du inte uttryckligen behöver publika fil-URL:er. Chamilo serverar filer via sitt eget åtkomstkontrollager, så direkt publik åtkomst till bucketen är onödig och en säkerhetsrisk.

För S3, använd en bucket-policy som begränsar åtkomsten till de IAM-uppgifter som konfigurerats ovan.

## Tips

* **Testa med MinIO lokalt** innan du driftsätter hos en molnleverantör -- MinIO är en gratis, S3-kompatibel server som du kan köra på din egen dator.
* **DigitalOcean Spaces** är ett värdbaserat S3-kompatibelt alternativ till Amazon S3, bekräftat att fungera med Chamilos S3-adapter.
* **Använd en dedikerad bucket** för Chamilo i stället för att dela en bucket med andra applikationer.
* **Konfigurera livscykelpolicyer** på din molnbucket för att hantera lagringskostnader (t.ex. flytta gamla filer till billigare lagringsskikt).