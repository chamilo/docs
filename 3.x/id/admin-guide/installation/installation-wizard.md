# Wizard Instalasi

Chamilo 3.0 menyertakan wizard instalasi berbasis web yang memandu Anda melalui penyiapan awal. Wizard berjalan secara otomatis saat Anda mengakses platform untuk pertama kalinya.

## Sebelum Anda Mulai

Pastikan prasyarat berikut terpenuhi:

1. Server Anda memenuhi semua [persyaratan server](server-requirements.md).
2. Anda telah mengunduh versi terpaket (zip atau tar.gz) dari Chamilo.
3. Web server Anda dikonfigurasi untuk menyajikan direktori `public/` sebagai document root.
4. File `.env` Anda ada dan kosong (wizard akan memandu penyiapan basis data).

## Langkah 1: Bahasa Instalasi

![Wizard instalasi Langkah 1 — pemilihan bahasa](../../.gitbook/assets/install-step1-language.png)

Langkah pertama memungkinkan Anda memilih bahasa untuk proses instalasi. Pilih bahasa yang Anda inginkan dari menu tarik-turun.

Jika Chamilo mendeteksi instalasi yang sudah ada (untuk peningkatan), wizard akan menampilkan status migrasi dan menawarkan jalur peningkatan alih-alih instalasi baru.

## Langkah 2: Pemeriksaan Persyaratan

![Wizard instalasi Langkah 2 — pemeriksaan persyaratan yang menampilkan versi PHP, ekstensi, dan izin direktori](../../.gitbook/assets/install-step2-requirements.png)

Wizard memeriksa lingkungan server Anda:

* **Versi PHP** adalah 8.3, 8.4, atau 8.5
* **Ekstensi PHP yang wajib** terpasang (intl, gd, curl, zip, mbstring, xml, dll.)
* **Pengaturan PHP yang direkomendasikan** — `date.timezone` dikonfigurasi, batas unggah/memori yang memadai
* **Izin direktori dan file** — `var/`, `config/`, dan `public/upload/` dapat ditulis oleh web server

Jika ada persyaratan yang tidak terpenuhi, wizard menampilkan peringatan atau kesalahan. Selesaikan terlebih dahulu sebelum melanjutkan.

## Langkah 3: Lisensi

![Wizard instalasi Langkah 3 — penerimaan lisensi](../../.gitbook/assets/install-step3-license.png)

Langkah ini menampilkan lisensi GNU/GPLv3. Anda harus mencentang kotak centang **"I accept"** untuk melanjutkan.

Secara opsional, Anda dapat memperluas bagian **Contact information** untuk memberikan rincian tentang organisasi Anda (nama, email, perusahaan, negara). Ini bersifat sukarela dan membantu komunitas Chamilo memahami siapa yang menggunakan platform, tetapi juga memungkinkan kami menghubungi Anda *sangat jarang* tentang acara yang berlangsung dekat dengan Anda.

## Langkah 4: Pengaturan Basis Data

![Wizard instalasi Langkah 4 — konfigurasi koneksi basis data](../../.gitbook/assets/install-step4-database.png)

Masukkan rincian koneksi basis data Anda:

| Field | Description |
|-------|-------------|
| **Database host** | Nama host atau IP server basis data Anda (mis., `localhost` atau `127.0.0.1`) |
| **Database port** | Default: 3306 untuk MySQL/MariaDB |
| **Database name** | Nama basis data yang akan digunakan (hanya alfanumerik dan garis bawah) |
| **Database user** | Pengguna basis data dengan hak penuh pada basis data yang ditentukan |
| **Database password** | Kata sandi untuk pengguna basis data |

Klik **Check database connection** untuk menguji. Wizard tidak akan membiarkan Anda melanjutkan hingga koneksi berhasil. Jika basis data sudah ada, peringatan ditampilkan.

## Langkah 5: Pengaturan Konfigurasi

![Wizard instalasi Langkah 5 — akun administrator, pengaturan portal, dan konfigurasi email](../../.gitbook/assets/install-step5-config.png)

Langkah ini menggabungkan pembuatan akun administrator, pengaturan portal, dan konfigurasi email.

### Akun Administrator

| Field | Description |
|-------|-------------|
| **Login** | Nama pengguna administrator |
| **Password** | Pilih kata sandi yang kuat — akun ini memiliki akses penuh ke platform |
| **First name** | Nama depan administrator |
| **Last name** | Nama belakang administrator |
| **Email** | Digunakan untuk notifikasi sistem dan pengaturan ulang kata sandi |
| **Phone** | Nomor kontak opsional |

Rincian admin ini juga akan digunakan oleh Chamilo untuk mengisi rincian kontak dukungan, jadi pastikan Anda mengonfigurasi ulang hal tersebut di pengaturan setelah instalasi selesai.

### Pengaturan Portal

| Field | Description |
|-------|-------------|
| **Language** | Bahasa antarmuka default |
| **Portal name** | Nama platform Anda (mis., "My Organization LMS") |
| **Company short name** | Nama singkat organisasi Anda |
| **Company URL** | Situs web organisasi Anda |
| **Encryption method** | Algoritma hashing kata sandi — **bcrypt** direkomendasikan |
| **Allow self-registration** | Yes / No / After approval |
| **Allow self-registration as trainer** | Yes / No |

### Konfigurasi Email

Bagian pengaturan email memungkinkan Anda mengonfigurasi transport surat (SMTP, Amazon SES, Mailjet, dll.) dan menguji pengiriman email. Lihat [Konfigurasi Email](email-configuration.md) untuk rincian.

Semua pengaturan ini dapat diubah kemudian dari panel administrasi.

## Langkah 6: Pemeriksaan Terakhir Sebelum Instalasi

![Wizard instalasi Langkah 6 — tinjauan semua pengaturan sebelum instalasi](../../.gitbook/assets/install-step6-review.png)

Langkah ini menampilkan ringkasan dari semua yang Anda masukkan untuk ditinjau:

* Kredensial administrator (kata sandi disembunyikan secara default — klik ikon mata untuk menampilkan)
* Pengaturan portal
* Detail koneksi basis data

Tinjau dengan saksama, lalu klik **Install Chamilo** untuk menjalankan instalasi. Wizard akan membuat semua tabel basis data, mengisi data awal, dan mengonfigurasi platform.

## Langkah 7: Instalasi Selesai

![Wizard instalasi Langkah 7 — penyelesaian dengan saran keamanan dan tautan portal](../../.gitbook/assets/install-step7-complete.png)

Setelah instalasi berhasil diselesaikan, wizard menampilkan:

* **Saran memulai** — Menyarankan untuk membuat kursus pertama Anda guna menjelajahi platform (sebagai admin, Anda perlu melakukan ini dari panel admin)
* **Rekomendasi keamanan**:
  * Jadikan direktori `config/` hanya-baca (`chmod 0555`)
  * Hapus direktori `public/main/install/`
* **Tautan ke portal Anda** untuk masuk dengan kredensial administrator yang baru saja Anda buat

## Pasca-Instalasi

Setelah menyelesaikan wizard:

* **Hapus atau batasi akses ke penginstal** -- Wizard tidak boleh dapat diakses setelah instalasi. Chamilo biasanya menguncinya secara otomatis, tetapi pastikan bahwa mengunjungi kembali URL instalasi mengalihkan ke halaman masuk.
* **Konfigurasikan pengiriman email** -- Lihat [Konfigurasi Email](email-configuration.md).
* **Siapkan cadangan** -- Sebelum menambahkan konten, konfigurasikan cadangan otomatis basis data dan berkas (Chamilo tidak menyediakan solusi untuk ini, tetapi menyalin folder var/ dan basis data adalah 2 elemen terpenting).
* **Tinjau pengaturan keamanan** -- Lihat [Pengaturan Keamanan](../platform-settings/security-settings.md).

## Pemecahan Masalah

| Masalah | Solusi |
|---------|----------|
| Halaman kosong pada URL instalasi | Periksa log kesalahan PHP. Ubah ke `APP_ENV=dev` di .env untuk sementara agar kesalahan terlihat di peramban. |
| Koneksi basis data gagal | Verifikasi kredensial, pastikan basis data ada, periksa bahwa server basis data mengizinkan koneksi dari host server web. |
| Kesalahan izin ditolak | Pastikan `var/` dapat ditulis oleh pengguna server web. |
| Aset tidak dimuat (tidak ada CSS/JS) | Jalankan `yarn install && yarn build` untuk mengompilasi aset frontend. |