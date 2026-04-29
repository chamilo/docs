# Cloud Storage

Chamilo 2.0 supports cloud storage backends for user-uploaded files through **Flysystem**, a PHP filesystem abstraction library integrated into Symfony. This allows you to store files on cloud services instead of (or in addition to) the local filesystem.

## Why Use Cloud Storage?

* **Scalability** -- Cloud storage grows with your platform without managing disk space.
* **Multi-server deployments** -- When running multiple web servers behind a load balancer, cloud storage ensures all servers access the same files.
* **Durability** -- Cloud providers offer built-in redundancy and backup.
* **Cost** -- Object storage is often cheaper per gigabyte than block storage attached to servers.

## Supported Providers

| Provider | Flysystem Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3-compatible) | Uses the S3 adapter with a custom endpoint |
| **Local filesystem** | Default, no additional packages needed |

## Installation

Install the Flysystem adapter for your provider via Composer:

```bash
# Amazon S3
composer require league/flysystem-aws-s3-v3

# Google Cloud Storage
composer require league/flysystem-google-cloud-storage

# Azure Blob Storage
composer require league/flysystem-azure-blob-storage
```

## Configuration

Chamilo splits its files across several Flysystem mounts — **assets**, **assets cache**, **resources**, **resources cache**, **themes**, and **plugins**. Each mount can target a different bucket or container. The cloud configuration in `config/packages/oneup_flysystem.yaml` is selected by environment using `when@` conditions and reads the variables you set in `.env.local`.

### Amazon S3

```bash
# .env.local — common credentials
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
# .env.local
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

Configure GCS the same way as S3, using GCS-specific environment variables and one bucket per mount. Refer to the `oneup_flysystem.yaml` shipped with your release for the exact variable names — they are also documented in `.env`.

### MinIO (S3-Compatible)

MinIO works through the S3 adapter with a custom endpoint and path-style addressing — set `AWS_S3_STORAGE_*` as for S3 and add the MinIO endpoint and path-style flags supported by the bundle.

> The full set of variable names is listed in the `.env` file shipped with Chamilo. Copy only the lines for the provider you actually use into your `.env.local` and uncomment them.

## Migrating Existing Files

If you are switching from local storage to cloud storage on an existing platform, you must migrate the existing files:

1. Configure the new storage adapter as described above.
2. Copy existing files from the local `var/upload/` directory to your cloud storage bucket, preserving the directory structure.
3. Verify that files are accessible through the platform after migration.

## Permissions and Access

Ensure your cloud storage bucket is **not publicly accessible** unless you explicitly need public file URLs. Chamilo serves files through its own access control layer, so direct public access to the bucket is unnecessary and a security risk.

For S3, use a bucket policy that restricts access to the IAM credentials configured above.

## Tips

* **Test with MinIO locally** before deploying to a cloud provider -- MinIO is a free, S3-compatible server you can run on your own machine.
* **Use a dedicated bucket** for Chamilo rather than sharing a bucket with other applications.
* **Set up lifecycle policies** on your cloud bucket to manage storage costs (e.g., move old files to cheaper storage tiers).
