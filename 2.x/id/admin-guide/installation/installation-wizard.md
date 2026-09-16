# Panduan Instalasi

Chamilo 2.0 menyertakan panduan instalasi berbasis web yang memandu Anda melalui pengaturan awal. Panduan ini akan berjalan secara otomatis saat Anda mengakses platform untuk pertama kalinya.

## Sebelum Memulai

Pastikan prasyarat berikut telah terpenuhi:

1. Server Anda memenuhi semua [persyaratan server](server-requirements.md).
2. Anda telah mengunduh versi paket (zip atau tar.gz) dari Chamilo.
3. Server web Anda dikonfigurasi untuk melayani direktori `public/` sebagai root dokumen.
4. File `.env` Anda ada dan kosong (panduan akan membantu pengaturan basis data).

## Langkah 1: Bahasa Instalasi

![Panduan instalasi Langkah 1 — pemilihan bahasa](/.gitbook/assets/install-step1-language.png)

Langkah pertama memungkinkan Anda memilih bahasa untuk proses instalasi. Pilih bahasa yang Anda inginkan dari menu dropdown.

Jika Chamilo mendeteksi instalasi yang sudah ada (untuk peningkatan versi), maka akan ditampilkan status migrasi dan menawarkan jalur peningkatan versi alih-alih instalasi baru.

## Langkah 2: Pemeriksaan Persyaratan

![Panduan instalasi Langkah 2 — pemeriksaan persyaratan yang menunjukkan versi PHP, ekstensi, dan izin direktori](/.gitbook/assets/install-step2-requirements.png)

Panduan ini memeriksa lingkungan server Anda:

* **Versi PHP** adalah 8.2 atau lebih tinggi
* **Ekstensi PHP yang diperlukan** telah terinstal (intl, gd, curl, zip, mbstring, xml, dll.)
* **Pengaturan PHP yang direkomendasikan** — `date.timezone` telah dikonfigurasi, batas unggah/memori yang memadai
* **Izin direktori dan file** — `var/`, `config/`, dan `public/upload/` dapat ditulis oleh server web

Jika ada persyaratan yang tidak terpenuhi, panduan akan menampilkan peringatan atau kesalahan. Selesaikan masalah tersebut sebelum melanjutkan.

## Langkah 3: Lisensi

![Panduan instalasi Langkah 3 — penerimaan lisensi](/.gitbook/assets/install-step3-license.png)

Langkah ini menampilkan lisensi GNU/GPLv3. Anda harus mencentang kotak **"Saya setuju"** untuk melanjutkan.

Secara opsional, Anda dapat membuka bagian **Informasi Kontak** untuk memberikan detail tentang organisasi Anda (nama, email, perusahaan, negara). Ini bersifat sukarela dan membantu komunitas Chamilo memahami siapa yang menggunakan platform, tetapi juga memungkinkan kami untuk menghubungi Anda *sangat jarang* terkait acara yang terjadi di dekat Anda.

## Langkah 4: Pengaturan Basis Data

![Panduan instalasi Langkah 4 — konfigurasi koneksi basis data](/.gitbook/assets/install-step4-database.png)

Masukkan detail koneksi basis data Anda:

| Bidang | Deskripsi |
|-------|-----------|
| **Host Basis Data** | Nama host atau IP dari server basis data Anda (misalnya, `localhost` atau `127.0.0.1`) |
| **Port Basis Data** | Default: 3306 untuk MySQL/MariaDB |
| **Nama Basis Data** | Nama basis data yang akan digunakan (hanya alfanumerik dan garis bawah) |
| **Pengguna Basis Data** | Pengguna basis data dengan hak penuh pada basis data yang ditentukan |
| **Kata Sandi Basis Data** | Kata sandi untuk pengguna basis data |

Klik **Periksa koneksi basis data** untuk menguji. Panduan tidak akan mengizinkan Anda melanjutkan sampai koneksi berhasil. Jika basis data sudah ada, peringatan akan ditampilkan.

## Langkah 5: Pengaturan Konfigurasi

![Panduan instalasi Langkah 5 — akun administrator, pengaturan portal, dan konfigurasi email](/.gitbook/assets/install-step5-config.png)

Langkah ini menggabungkan pembuatan akun administrator, pengaturan portal, dan konfigurasi email.

### Akun Administrator

| Bidang | Deskripsi |
|-------|-----------|
| **Login** | Nama pengguna administrator |
| **Kata Sandi** | Pilih kata sandi yang kuat — akun ini memiliki akses penuh ke platform |
| **Nama Depan** | Nama depan administrator |
| **Nama Belakang** | Nama belakang administrator |
| **Email** | Digunakan untuk pemberitahuan sistem dan pengaturan ulang kata sandi |
| **Telepon** | Nomor kontak opsional |

Detail admin ini juga akan digunakan oleh Chamilo untuk mengisi detail kontak dukungan, jadi pastikan Anda mengatur ulang di pengaturan setelah instalasi selesai.

### Pengaturan Portal

| Bidang | Deskripsi |
|-------|-----------|
| **Bahasa** | Bahasa antarmuka default |
| **Nama Portal** | Nama platform Anda (misalnya, "LMS Organisasi Saya") |
| **Nama Singkat Perusahaan** | Nama singkat organisasi Anda |
| **URL Perusahaan** | Situs web organisasi Anda |
| **Metode Enkripsi** | Algoritma hashing kata sandi — **bcrypt** direkomendasikan |
| **Izinkan Pendaftaran Mandiri** | Ya / Tidak / Setelah Persetujuan |
| **Izinkan Pendaftaran Mandiri sebagai Pelatih** | Ya / Tidak |

### Konfigurasi Email

Bagian pengaturan email memungkinkan Anda mengonfigurasi transportasi email (SMTP, Amazon SES, Mailjet, dll.) dan menguji pengiriman email. Lihat [Konfigurasi Email](email-configuration.md) untuk detailnya.

Semua pengaturan ini dapat diubah nanti dari panel administrasi.

---
## Langkah 6: Pemeriksaan Terakhir Sebelum Instalasi

![Pemandu instalasi Langkah 6 — tinjauan semua pengaturan sebelum instalasi](/.gitbook/assets/install-step6-review.png)

Langkah ini menampilkan ringkasan dari semua yang Anda masukkan untuk ditinjau:

* Kredensial administrator (kata sandi disembunyikan secara default — klik ikon mata untuk menampilkannya)
* Pengaturan portal
* Detail koneksi basis data

Tinjau dengan cermat, lalu klik **Instal Chamilo** untuk menjalankan instalasi. Pemandu akan membuat semua tabel basis data, mengisi data awal, dan mengonfigurasi platform.

## Langkah 7: Instalasi Selesai

![Pemandu instalasi Langkah 7 — penyelesaian dengan saran keamanan dan tautan portal](/.gitbook/assets/install-step7-complete.png)

Setelah instalasi berhasil selesai, pemandu akan menampilkan:

* **Saran memulai** — Menyarankan untuk membuat kursus pertama Anda untuk menjelajahi platform (sebagai admin, Anda perlu melakukannya dari panel admin)
* **Rekomendasi keamanan**:
  * Jadikan direktori `config/` hanya dapat dibaca (`chmod 0555`)
  * Hapus direktori `public/main/install/`
* **Tautan ke portal Anda** untuk masuk dengan kredensial administrator yang baru saja Anda buat

## Pasca-Instalasi

Setelah menyelesaikan pemandu:

* **Hapus atau batasi akses ke penginstal** -- Pemandu tidak boleh dapat diakses setelah instalasi. Chamilo biasanya menguncinya secara otomatis, tetapi pastikan bahwa mengunjungi kembali URL instalasi mengarahkan ke halaman login.
* **Konfigurasi pengiriman email** -- Lihat [Konfigurasi Email](email-configuration.md).
* **Atur cadangan** -- Sebelum menambahkan konten, konfigurasi cadangan otomatis untuk basis data dan file (Chamilo tidak menyediakan solusi untuk ini, tetapi menyalin folder var/ dan basis data adalah 2 elemen terpenting).
* **Tinjau pengaturan keamanan** -- Lihat [Pengaturan Keamanan](../platform-settings/security-settings.md).

## Pemecahan Masalah

| Masalah | Solusi |
|---------|----------|
| Halaman kosong di URL instalasi | Periksa log kesalahan PHP. Ubah sementara ke `APP_ENV=dev` di .env untuk melihat kesalahan di browser. |
| Koneksi basis data gagal | Verifikasi kredensial, pastikan basis data ada, periksa apakah server basis data mengizinkan koneksi dari host server web. |
| Kesalahan izin ditolak | Pastikan `var/` dapat ditulis oleh pengguna server web. |
| Aset tidak dimuat (tidak ada CSS/JS) | Jalankan `yarn install && yarn build` untuk mengompilasi aset frontend. |