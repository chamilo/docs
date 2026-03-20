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

### Amazon S3

Add the following to your `.env.local`:

```bash
STORAGE_ADAPTER=s3
AWS_S3_BUCKET=your-bucket-name
AWS_S3_REGION=us-east-1
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
```

Then configure the Flysystem adapter in `config/packages/flysystem.yaml`:

```yaml
flysystem:
    storages:
        default.storage:
            adapter: 'aws'
            options:
                client: 's3_client'
                bucket: '%env(AWS_S3_BUCKET)%'
                prefix: 'chamilo'
```

### Google Cloud Storage

```bash
# .env.local
STORAGE_ADAPTER=gcs
GOOGLE_CLOUD_BUCKET=your-bucket-name
GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account-key.json
```

### Azure Blob Storage

```bash
# .env.local
STORAGE_ADAPTER=azure
AZURE_STORAGE_ACCOUNT=your-account-name
AZURE_STORAGE_KEY=your-storage-key
AZURE_STORAGE_CONTAINER=chamilo
```

### MinIO (S3-Compatible)

MinIO uses the same S3 adapter with a custom endpoint:

```bash
# .env.local
STORAGE_ADAPTER=s3
AWS_S3_BUCKET=chamilo
AWS_S3_REGION=us-east-1
AWS_S3_ENDPOINT=http://minio.local:9000
AWS_ACCESS_KEY_ID=minioadmin
AWS_SECRET_ACCESS_KEY=minioadmin
AWS_S3_USE_PATH_STYLE=true
```

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
