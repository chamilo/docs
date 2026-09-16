# Cloud-Speicher

Chamilo 3.0 unterstützt Cloud-Speicher-Backends für von Nutzern hochgeladene Dateien über **Flysystem**, eine PHP-Bibliothek zur Dateisystemabstraktion, die in Symfony integriert ist. Damit können Dateien auf Cloud-Diensten statt (oder zusätzlich zu) dem lokalen Dateisystem gespeichert werden.

## Warum Cloud-Speicher nutzen?

* **Skalierbarkeit** -- Cloud-Speicher wächst mit Ihrer Plattform, ohne dass Sie Festplattenplatz verwalten müssen.
* **Multi-Server-Bereitstellungen** -- Wenn mehrere Webserver hinter einem Load Balancer laufen, stellt Cloud-Speicher sicher, dass alle Server auf dieselben Dateien zugreifen.
* **Dauerhaftigkeit** -- Cloud-Anbieter bieten integrierte Redundanz und Sicherung.
* **Kosten** -- Objektspeicher ist oft günstiger pro Gigabyte als Blockspeicher, der an Server angebunden ist.

## Unterstützte Anbieter

| Anbieter | Flysystem-Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-kompatibel) | Verwendet den S3-Adapter mit einem benutzerdefinierten Endpunkt |
| **DigitalOcean Spaces** (S3-kompatibel) | Verwendet den S3-Adapter mit einem benutzerdefinierten Endpunkt |
| **Lokales Dateisystem** | Standard, keine zusätzlichen Pakete erforderlich |

## Installation

Chamilo wird bereits mit den folgenden vorinstallierten Anbietern ausgeliefert:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Konfiguration

Chamilo verteilt seine Dateien auf mehrere Flysystem-Mounts — **assets**, **assets cache**, **resources**, **resources cache**, **themes** und **plugins**. Jeder Mount kann auf einen anderen Bucket oder Container zeigen. Die Cloud-Konfiguration in `config/packages/oneup_flysystem.yaml` wird über `when@`-Bedingungen umgebungsabhängig ausgewählt und liest die Variablen, die Sie in `.env` setzen.

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

Konfigurieren Sie GCS auf dieselbe Weise wie S3, mit GCS-spezifischen Umgebungsvariablen und einem Bucket pro Mount. Die genauen Variablennamen entnehmen Sie der mit Ihrer Version ausgelieferten Datei `oneup_flysystem.yaml` — sie sind auch in `.env` dokumentiert.

### MinIO (S3-kompatibel)

MinIO arbeitet über den S3-Adapter mit einem benutzerdefinierten Endpunkt und Path-Style-Adressierung — setzen Sie `AWS_S3_STORAGE_*` wie bei S3 und ergänzen Sie den MinIO-Endpunkt sowie die vom Bundle unterstützten Path-Style-Flags.

### DigitalOcean Spaces (S3-kompatibel)

DigitalOcean Spaces ist ein eigenständiger, gehosteter Dienst und nicht MinIO unter der Haube, stellt aber dieselbe S3-kompatible API bereit und funktioniert daher ebenfalls über den S3-Adapter: Setzen Sie `AWS_S3_STORAGE_*` wie bei S3 und richten Sie `AWS_S3_STORAGE_ENDPOINT` (oder die entsprechende Endpunkt-Variable des Bundles) auf den regionalen Endpunkt Ihres Space, z. B. `https://<region>.digitaloceanspaces.com`.

> Die vollständige Liste der Variablennamen steht in der mit Chamilo ausgelieferten Datei `.env.dist`. Kopieren Sie nur die Zeilen des tatsächlich genutzten Anbieters in Ihre `.env` und kommentieren Sie sie aus.

## Themes

Der **themes**-Mount verhält sich anders als die übrigen: Die mit Chamilo ausgelieferten Themes (`chamilo`, `chamilo3`) sind Teil des Codes und liegen in `var/themes`, also genau in dem Verzeichnis, das der Standard-Lokaladapter bedient. Wenn Sie den Themes-Mount auf einen Cloud-Container zeigen lassen, ist dieser Container zunächst leer, sodass Logos, Farben und Theme-Bilder fehlen und die Oberfläche ungestylt dargestellt wird.

Laden Sie die mitgelieferten Themes mit folgendem Befehl in den konfigurierten Speicher hoch:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Option | Effect |
|--------|--------|
| `--dry-run` | Report what would be uploaded, without writing anything |
| `--overwrite` | Replace files that already exist on the remote storage |

Dateien, die bereits im Themes-Dateisystem vorhanden sind, bleiben erhalten, sofern nicht `--overwrite` angegeben wird. Ein erneutes Ausführen des Befehls verwirft daher niemals die Logos oder Farb-Themes, die ein Administrator über **Administration > Configuration > Colors** hochgeladen hat. Wenn das Themes-Dateisystem das lokale Verzeichnis `var/themes` ist, erkennt der Befehl dies und tut nichts; er kann daher auf jeder Installation gefahrlos ausgeführt werden.

Chamilo führt diesen Befehl selbst am Ende des Installationsassistenten und erneut nach einer erfolgreichen Datenbankmigration beim Upgrade aus, sodass neue Theme-Dateien ohne manuellen Schritt den Cloud-Speicher erreichen.

Zwei Fälle erfordern dennoch eine manuelle Ausführung:

* **Umstellung einer bestehenden Plattform auf Cloud-Speicher**, da zu diesem Zeitpunkt weder Installation noch Upgrade stattfindet.
* **Aktualisierung von Theme-Dateien, die sich in einer neuen Version geändert haben**, mit `--overwrite`. Die automatischen Läufe überschreiben nie, gerade damit sie ein Logo nicht rückgängig machen können, das ein Administrator in ein mitgeliefertes Theme hochgeladen hat; der Preis dafür ist, dass eine von der neuen Version mitgelieferte `colors.css` oder `tiny-settings.js` die bereits im Container vorhandene Kopie nicht ersetzt.

## Migrating Existing Files

Wenn Sie auf einer bestehenden Plattform von lokalem Speicher auf Cloud-Speicher umstellen, müssen Sie die vorhandenen Dateien migrieren:

1. Konfigurieren Sie den neuen Speicheradapter wie oben beschrieben.
2. Kopieren Sie vorhandene Dateien aus dem lokalen Verzeichnis `var/upload/` in Ihren Cloud-Speicher-Bucket und bewahren Sie dabei die Verzeichnisstruktur.
3. Führen Sie `php bin/console chamilo:remote-storage:upload-themes` aus, um die mitgelieferten Themes hochzuladen, wie oben beschrieben.
4. Prüfen Sie, dass Dateien nach der Migration über die Plattform erreichbar sind.

## Permissions and Access

Stellen Sie sicher, dass Ihr Cloud-Speicher-Bucket **nicht öffentlich zugänglich** ist, sofern Sie nicht ausdrücklich öffentliche Datei-URLs benötigen. Chamilo liefert Dateien über eine eigene Zugriffskontrollschicht aus; direkter öffentlicher Zugriff auf den Bucket ist daher unnötig und ein Sicherheitsrisiko.

Für S3 verwenden Sie eine Bucket-Richtlinie, die den Zugriff auf die oben konfigurierten IAM-Anmeldedaten beschränkt.

## Tips

* **Testen Sie lokal mit MinIO**, bevor Sie bei einem Cloud-Anbieter bereitstellen – MinIO ist ein kostenloser, S3-kompatibler Server, den Sie auf Ihrem eigenen Rechner betreiben können.
* **DigitalOcean Spaces** ist eine gehostete S3-kompatible Alternative zu Amazon S3 und funktioniert nachweislich mit dem S3-Adapter von Chamilo.
* **Verwenden Sie einen eigenen Bucket** für Chamilo, statt einen Bucket mit anderen Anwendungen zu teilen.
* **Richten Sie Lifecycle-Richtlinien** auf Ihrem Cloud-Bucket ein, um Speicherkosten zu steuern (z. B. alte Dateien in günstigere Speicherklassen verschieben).