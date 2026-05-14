# Pengaturan untuk Pengembangan

## Prasyarat

* PHP 8.2+ dengan ekstensi: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js dan npm (atau Yarn — proyek ini menggunakan Yarn 4; lihat `package.json` untuk versi pasti yang ditetapkan)
* MySQL 5.7+ atau MariaDB 10.11+
* Git

## Langkah-langkah Instalasi

### 1. Mengklon Repositori

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Menginstal Dependensi PHP

```bash
composer install
```

### 3. Mengatur Lingkungan

Repositori ini menyertakan file `.env.dist` sebagai referensi. Buat file `.env` kosong yang akan diisi oleh penginstal web — menjaga file ini kosong memastikan pembaruan tidak akan menimpa konfigurasi lokal Anda:

```bash
touch .env
```

Kemudian, buat `.env` dan `config/` dapat ditulis oleh server web agar penginstal dapat menulis konfigurasi lokal Anda:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Menginstal Dependensi Frontend dan Mengompilasi

```bash
# Menginstal dependensi JavaScript
yarn install

# Mengompilasi aset frontend untuk pengembangan
yarn encore dev

# Atau memantau perubahan selama pengembangan
yarn encore dev --watch
```

### 5. Memulai Server Pengembangan

```bash
symfony server:start
```

Atau gunakan Apache/Nginx yang mengarah ke direktori `public/`.

### 6. Mengatur Basis Data

Jalankan asisten instalasi berbasis web dengan mengakses URL Chamilo di peramban.

### 7. Menghasilkan Kunci JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Mengamankan Sistem Anda

File `.env` dan direktori `config/` hanya perlu dapat ditulis selama periode instalasi. Amankan setelahnya:

```bash
sudo chown -R root: .env config/
```

Direktori `var/` perlu tetap dapat ditulis oleh server web.

## Perintah Kompilasi

| Perintah | Tujuan |
|---------|--------|
| `yarn encore dev` | Mengompilasi frontend untuk pengembangan |
| `yarn encore dev --watch` | Mengompilasi dan memantau perubahan |
| `yarn encore production` | Mengompilasi yang dioptimalkan untuk produksi |
| `php bin/console cache:clear` | Membersihkan cache Symfony |

## Tips untuk Pengembangan

* Tetapkan `APP_ENV=dev` dan `APP_DEBUG=1` di file `.env` untuk pesan kesalahan yang mendetail
* Bilah debug Symfony muncul di bagian bawah halaman dalam mode pengembangan
* Dokumentasi API tersedia di `/api` ketika `APP_ENABLE_API_ENTRYPOINT=1`
* Gunakan `yarn encore dev --watch` untuk mengompilasi ulang perubahan frontend secara otomatis