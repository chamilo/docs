# Pengaturan Pengembangan

## Prasyarat

* PHP 8.3, 8.4, atau 8.5 dengan ekstensi: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js dan npm (atau Yarn — proyek ini menggunakan Yarn 4; lihat `package.json` untuk versi yang dipin secara tepat)
* MySQL 5.7+ atau MariaDB 10.11+
* Git

## Langkah Instalasi

### 1. Clone the Repository

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Instal Dependensi PHP

```bash
composer install
```

### 3. Konfigurasi Environment

Repositori menyertakan `.env.dist` sebagai referensi. Buat berkas `.env` kosong yang akan diisi oleh penginstal web — membiarkannya kosong memastikan peningkatan tidak pernah menimpa konfigurasi lokal Anda:

```bash
touch .env
```

Kemudian buat `.env` dan `config/` dapat ditulis oleh server web agar penginstal dapat menulis konfigurasi lokal Anda:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Instal Dependensi Frontend dan Build

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Jalankan Server Pengembangan

```bash
symfony server:start
```

Atau gunakan Apache/Nginx yang mengarah ke direktori `public/`.

### 6. Siapkan Database

Jalankan wizard instalasi berbasis web dengan menavigasi ke URL Chamilo Anda di peramban.

### 7. Generate JWT Keys

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Amankan sistem Anda

Berkas `.env` dan direktori `config/` hanya perlu dapat ditulis selama proses instalasi. Amankan keduanya setelahnya:

```bash
sudo chown -R root: .env config/
```

Direktori `var/` harus tetap dapat ditulis oleh server web.


## Perintah Build

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Build frontend for development |
| `yarn encore dev --watch` | Build and watch for changes |
| `yarn encore production` | Build optimized for production |
| `php bin/console cache:clear` | Clear Symfony cache |

## Kiat Pengembangan

* Atur `APP_ENV=dev` dan `APP_DEBUG=1` di `.env` untuk pesan kesalahan yang terperinci
* Bilah alat debug Symfony muncul di bagian bawah halaman dalam mode pengembangan
* Dokumentasi API tersedia di `/api` ketika `APP_ENABLE_API_ENTRYPOINT=true` (setelah cache dihapus — lihat [Konfigurasi](../../admin-guide/installation/configuration.md#enable-the-api-documentation))
* Gunakan `yarn encore dev --watch` untuk membangun ulang perubahan frontend secara otomatis