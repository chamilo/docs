# Cloud-Speicher

Chamilo 2.0 unterstützt Cloud-Speicher-Backends für hochgeladene Benutzerdateien über **Flysystem**, eine PHP-Dateisystem-Abstraktionsbibliothek, die in Symfony integriert ist. Dies ermöglicht es Ihnen, Dateien auf Cloud-Diensten anstelle von (oder zusätzlich zu) dem lokalen Dateisystem zu speichern.

## Warum Cloud-Speicher verwenden?

* **Skalierbarkeit** -- Cloud-Speicher wächst mit Ihrer Plattform, ohne dass Sie Speicherplatz verwalten müssen.
* **Multi-Server-Bereitstellungen** -- Wenn Sie mehrere Webserver hinter einem Load-Balancer betreiben, stellt Cloud-Speicher sicher, dass alle Server auf dieselben Dateien zugreifen.
* **Haltbarkeit** -- Cloud-Anbieter bieten integrierte Redundanz und Sicherung.
* **Kosten** -- Objektspeicher ist oft günstiger pro Gigabyte als Blockspeicher, der an Server angebunden ist.

## Unterstützte Anbieter

| Anbieter | Flysystem-Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3-kompatibel) | Verwendet den S3-Adapter mit einem benutzerdefinierten Endpunkt |
| **Lokales Dateisystem** | Standard, keine zusätzlichen Pakete erforderlich |

## Installation

Chamilo wird bereits mit den folgenden vorinstallierten Anbietern geliefert:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Konfiguration

Chamilo teilt seine Dateien auf mehrere Flysystem-Mounts auf — **Assets**, **Assets-Cache**, **Ressourcen**, **Ressourcen-Cache**, **Themes** und **Plugins**. Jeder Mount kann auf einen anderen Bucket oder Container abzielen. Die Cloud-Konfiguration in `config/packages/oneup_flysystem.yaml` wird je nach Umgebung über `when@`-Bedingungen ausgewählt und liest die Variablen, die Sie in `.env` festgelegt haben.

### Amazon S3

```bash
# .env — gemeinsame Zugangsdaten
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Buckets pro Mount (jeder Mount kann ein anderer Bucket sein)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optionale Pfadpräfixe innerhalb eines Buckets — nützlich, um Buckets über Portale hinweg zu teilen
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
# Optionale Präfixe
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Konfigurieren Sie GCS auf die gleiche Weise wie S3, indem Sie GCS-spezifische Umgebungsvariablen und einen Bucket pro Mount verwenden. Die genauen Variablennamen finden Sie in der mit Ihrer Version gelieferten Datei `oneup_flysystem.yaml` — sie sind auch in `.env` dokumentiert.

### MinIO (S3-kompatibel)

MinIO funktioniert über den S3-Adapter mit einem benutzerdefinierten Endpunkt und Path-Style-Adressierung — setzen Sie `AWS_S3_STORAGE_*` wie für S3 und fügen Sie den MinIO-Endpunkt sowie die vom Bundle unterstützten Path-Style-Flags hinzu.

> Die vollständige Liste der Variablennamen ist in der mit Chamilo gelieferten Datei `.env.dist` aufgeführt. Kopieren Sie nur die Zeilen für den Anbieter, den Sie tatsächlich verwenden, in Ihre `.env`-Datei und kommentieren Sie sie aus.

## Migration vorhandener Dateien

Wenn Sie auf einer bestehenden Plattform von lokalem Speicher auf Cloud-Speicher umsteigen, müssen Sie die vorhandenen Dateien migrieren:

1. Konfigurieren Sie den neuen Speicheradapter wie oben beschrieben.
2. Kopieren Sie vorhandene Dateien aus dem lokalen Verzeichnis `var/upload/` in Ihren Cloud-Speicher-Bucket und bewahren Sie dabei die Verzeichnisstruktur.
3. Überprüfen Sie, ob die Dateien nach der Migration über die Plattform zugänglich sind.

## Berechtigungen und Zugriff

Stellen Sie sicher, dass Ihr Cloud-Speicher-Bucket **nicht öffentlich zugänglich** ist, es sei denn, Sie benötigen explizit öffentliche Datei-URLs. Chamilo stellt Dateien über seine eigene Zugriffskontrollschicht bereit, sodass ein direkter öffentlicher Zugriff auf den Bucket unnötig und ein Sicherheitsrisiko ist.

Für S3 verwenden Sie eine Bucket-Richtlinie, die den Zugriff auf die oben konfigurierten IAM-Zugangsdaten beschränkt.

## Tipps

* **Testen Sie lokal mit MinIO**, bevor Sie zu einem Cloud-Anbieter wechseln -- MinIO ist ein kostenloser, S3-kompatibler Server, den Sie auf Ihrem eigenen Rechner betreiben können.
* **Verwenden Sie einen dedizierten Bucket** für Chamilo, anstatt einen Bucket mit anderen Anwendungen zu teilen.
* **Richten Sie Lebenszyklusrichtlinien** für Ihren Cloud-Bucket ein, um Speicherkosten zu verwalten (z. B. alte Dateien in günstigere Speicherklassen zu verschieben).