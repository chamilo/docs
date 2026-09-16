# Penyimpanan Cloud

Chamilo 3.0 mendukung backend penyimpanan cloud untuk berkas yang diunggah pengguna melalui **Flysystem**, pustaka abstraksi sistem berkas PHP yang terintegrasi ke dalam Symfony. Ini memungkinkan Anda menyimpan berkas pada layanan cloud alih-alih (atau sebagai tambahan dari) sistem berkas lokal.

## Mengapa Menggunakan Penyimpanan Cloud?

* **Skalabilitas** -- Penyimpanan cloud tumbuh bersama platform Anda tanpa perlu mengelola ruang disk.
* **Penyebaran multi-server** -- Saat menjalankan beberapa server web di belakang load balancer, penyimpanan cloud memastikan semua server mengakses berkas yang sama.
* **Daya tahan** -- Penyedia cloud menawarkan redundansi dan cadangan bawaan.
* **Biaya** -- Object storage sering kali lebih murah per gigabyte dibandingkan block storage yang terpasang pada server.

## Penyedia yang Didukung

| Penyedia | Adapter Flysystem |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (kompatibel S3) | Menggunakan adapter S3 dengan endpoint kustom |
| **DigitalOcean Spaces** (kompatibel S3) | Menggunakan adapter S3 dengan endpoint kustom |
| **Sistem berkas lokal** | Default, tidak diperlukan paket tambahan |

## Instalasi

Chamilo sudah dilengkapi dengan penyedia berikut yang terpasang sebelumnya:

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## Konfigurasi

Chamilo membagi berkasnya ke beberapa mount Flysystem — **assets**, **assets cache**, **resources**, **resources cache**, **themes**, dan **plugins**. Setiap mount dapat menargetkan bucket atau container yang berbeda. Konfigurasi cloud di `config/packages/oneup_flysystem.yaml` dipilih berdasarkan lingkungan menggunakan kondisi `when@` dan membaca variabel yang Anda tetapkan di `.env`.

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

Konfigurasikan GCS dengan cara yang sama seperti S3, menggunakan variabel lingkungan khusus GCS dan satu bucket per mount. Lihat `oneup_flysystem.yaml` yang disertakan dengan rilis Anda untuk nama variabel yang tepat — nama tersebut juga didokumentasikan di `.env`.

### MinIO (Kompatibel S3)

MinIO bekerja melalui adapter S3 dengan endpoint kustom dan path-style addressing — tetapkan `AWS_S3_STORAGE_*` seperti untuk S3 dan tambahkan endpoint MinIO serta flag path-style yang didukung oleh bundle.

### DigitalOcean Spaces (Kompatibel S3)

DigitalOcean Spaces adalah layanan terhosting terpisah dari MinIO — bukan MinIO di balik layar, tetapi mengekspos API yang kompatibel dengan S3 yang sama, sehingga juga bekerja melalui adapter S3: tetapkan `AWS_S3_STORAGE_*` seperti untuk S3, dan arahkan `AWS_S3_STORAGE_ENDPOINT` (atau variabel endpoint setara milik bundle) ke endpoint regional Space Anda, misalnya `https://<region>.digitaloceanspaces.com`.

> Kumpulan lengkap nama variabel tercantum dalam berkas `.env.dist` yang disertakan dengan Chamilo. Salin hanya baris untuk penyedia yang benar-benar Anda gunakan ke dalam `.env` Anda dan hapus komentarnya.

## Tema

Mount **themes** berperilaku berbeda dari yang lain: tema yang dikirimkan bersama Chamilo (`chamilo`, `chamilo3`) merupakan bagian dari kode dan berada di `var/themes`, yang tepat merupakan direktori yang dilayani oleh adapter lokal default. Ketika Anda mengarahkan mount themes ke sebuah container cloud, container tersebut mulai dalam keadaan kosong, sehingga logo, warna, dan gambar tema hilang dan antarmuka dirender tanpa gaya.

Unggah tema bawaan ke penyimpanan yang dikonfigurasi dengan:

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| Opsi | Efek |
|--------|--------|
| `--dry-run` | Laporkan apa yang akan diunggah, tanpa menulis apa pun |
| `--overwrite` | Ganti berkas yang sudah ada di penyimpanan jarak jauh |

Berkas yang sudah ada pada sistem berkas themes dipertahankan kecuali `--overwrite` diberikan, sehingga menjalankan ulang perintah tersebut tidak pernah membuang logo atau tema warna yang diunggah administrator melalui **Administration > Configuration > Colors**. Ketika sistem berkas themes adalah direktori lokal `var/themes`, perintah mendeteksinya dan tidak melakukan apa pun, sehingga aman dijalankan pada instalasi mana pun.

Chamilo menjalankan perintah ini sendiri di akhir wizard instalasi dan lagi setelah migrasi basis data berhasil saat peningkatan, sehingga berkas tema baru mencapai penyimpanan cloud tanpa langkah manual apa pun.

Dua kasus masih mengharuskan Anda menjalankannya secara manual:

* **Mengalihkan platform yang sudah ada ke penyimpanan cloud**, karena tidak ada instalasi atau peningkatan yang terjadi pada saat itu.
* **Menyegarkan berkas tema yang berubah dalam rilis baru**, dengan `--overwrite`. Jalankan otomatis tidak pernah menimpa, justru agar tidak dapat mengembalikan logo yang diunggah administrator ke dalam tema bawaan; konsekuensinya adalah bahwa `colors.css` atau `tiny-settings.js` yang dikirimkan rilis baru tidak menggantikan salinan yang sudah ada di container.

## Migrasi Berkas yang Ada

Jika Anda beralih dari penyimpanan lokal ke penyimpanan cloud pada platform yang sudah ada, Anda harus memigrasikan berkas yang ada:

1. Konfigurasikan adapter penyimpanan baru sebagaimana dijelaskan di atas.
2. Salin berkas yang ada dari direktori lokal `var/upload/` ke bucket penyimpanan cloud Anda, dengan mempertahankan struktur direktori.
3. Jalankan `php bin/console chamilo:remote-storage:upload-themes` untuk mengunggah tema bawaan, sebagaimana dijelaskan di atas.
4. Verifikasi bahwa berkas dapat diakses melalui platform setelah migrasi.

## Izin dan Akses

Pastikan bucket penyimpanan cloud Anda **tidak dapat diakses secara publik** kecuali Anda secara eksplisit membutuhkan URL berkas publik. Chamilo menyajikan berkas melalui lapisan kontrol akses miliknya sendiri, sehingga akses publik langsung ke bucket tidak diperlukan dan merupakan risiko keamanan.

Untuk S3, gunakan kebijakan bucket yang membatasi akses ke kredensial IAM yang dikonfigurasi di atas.

## Tips

* **Uji dengan MinIO secara lokal** sebelum men-deploy ke penyedia cloud -- MinIO adalah server gratis yang kompatibel dengan S3 yang dapat Anda jalankan di mesin Anda sendiri.
* **DigitalOcean Spaces** adalah alternatif terhosting yang kompatibel dengan S3 terhadap Amazon S3, dikonfirmasi bekerja dengan adapter S3 Chamilo.
* **Gunakan bucket khusus** untuk Chamilo daripada berbagi bucket dengan aplikasi lain.
* **Siapkan kebijakan siklus hidup** pada bucket cloud Anda untuk mengelola biaya penyimpanan (misalnya, pindahkan berkas lama ke tingkat penyimpanan yang lebih murah).