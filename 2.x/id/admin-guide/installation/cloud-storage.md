# Penyimpanan Cloud

Chamilo 2.0 mendukung backend penyimpanan cloud untuk file yang diunggah pengguna melalui **Flysystem**, sebuah pustaka abstraksi sistem file PHP yang terintegrasi ke dalam Symfony. Ini memungkinkan Anda untuk menyimpan file di layanan cloud sebagai pengganti (atau sebagai tambahan) dari sistem file lokal.

## Mengapa Menggunakan Penyimpanan Cloud?

* **Skalabilitas** -- Penyimpanan cloud dapat berkembang seiring dengan platform Anda tanpa perlu mengelola ruang disk.
* **Penerapan multi-server** -- Saat menjalankan beberapa server web di belakang load balancer, penyimpanan cloud memastikan semua server mengakses file yang sama.
* **Daya Tahan** -- Penyedia cloud menawarkan redundansi dan cadangan bawaan.
* **Biaya** -- Penyimpanan objek sering kali lebih murah per gigabyte dibandingkan penyimpanan blok yang terhubung ke server.

## Penyedia yang Didukung

| Penyedia | Adaptor Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (kompatibel dengan S3) | Menggunakan adaptor S3 dengan endpoint khusus |
| **Sistem file lokal** | Default, tidak memerlukan paket tambahan |

## Instalasi

Chamilo sudah dilengkapi dengan penyedia berikut yang telah diinstal sebelumnya:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## Konfigurasi

Chamilo membagi file-nya ke dalam beberapa mount Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes**, dan **plugins**. Setiap mount dapat menargetkan bucket atau kontainer yang berbeda. Konfigurasi cloud di `config/packages/oneup_flysystem.yaml` dipilih berdasarkan lingkungan menggunakan kondisi `when@` dan membaca variabel yang Anda tetapkan di `.env`.

### Amazon S3

```bash
# .env — kredensial umum
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Bucket per-mount (setiap mount dapat menjadi bucket yang berbeda)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Awalan jalur opsional di dalam bucket — berguna untuk berbagi bucket di antara portal
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
# Awalan opsional
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

Konfigurasikan GCS dengan cara yang sama seperti S3, menggunakan variabel lingkungan khusus GCS dan satu bucket per mount. Lihat `oneup_flysystem.yaml` yang disertakan dengan rilis Anda untuk nama variabel yang tepat — mereka juga didokumentasikan di `.env`.

### MinIO (Kompatibel dengan S3)

MinIO bekerja melalui adaptor S3 dengan endpoint khusus dan pengalamatan gaya jalur — tetapkan `AWS_S3_STORAGE_*` seperti untuk S3 dan tambahkan endpoint MinIO serta flag gaya jalur yang didukung oleh bundle.

> Daftar lengkap nama variabel tercantum dalam file `.env.dist` yang disertakan dengan Chamilo. Salin hanya baris untuk penyedia yang benar-benar Anda gunakan ke `.env` Anda dan hapus tanda komentarnya.

## Memigrasi File yang Sudah Ada

Jika Anda beralih dari penyimpanan lokal ke penyimpanan cloud pada platform yang sudah ada, Anda harus memigrasi file yang ada:

1. Konfigurasikan adaptor penyimpanan baru seperti yang dijelaskan di atas.
2. Salin file yang ada dari direktori lokal `var/upload/` ke bucket penyimpanan cloud Anda, dengan mempertahankan struktur direktori.
3. Verifikasi bahwa file dapat diakses melalui platform setelah migrasi.

## Izin dan Akses

Pastikan bucket penyimpanan cloud Anda **tidak dapat diakses secara publik** kecuali Anda secara eksplisit membutuhkan URL file publik. Chamilo menyajikan file melalui lapisan kontrol aksesnya sendiri, sehingga akses publik langsung ke bucket tidak diperlukan dan merupakan risiko keamanan.

Untuk S3, gunakan kebijakan bucket yang membatasi akses hanya pada kredensial IAM yang dikonfigurasi di atas.

## Tips

* **Uji dengan MinIO secara lokal** sebelum menerapkan ke penyedia cloud -- MinIO adalah server gratis yang kompatibel dengan S3 yang dapat Anda jalankan di mesin Anda sendiri.
* **Gunakan bucket khusus** untuk Chamilo daripada berbagi bucket dengan aplikasi lain.
* **Atur kebijakan siklus hidup** pada bucket cloud Anda untuk mengelola biaya penyimpanan (misalnya, pindahkan file lama ke tingkat penyimpanan yang lebih murah).