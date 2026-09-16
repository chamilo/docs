# Pengaturan Kursus

Pengaturan kursus memungkinkan Anda mengontrol perilaku kursus — siapa yang dapat mengaksesnya, bagaimana tampilannya, dan fitur mana yang diaktifkan.

Untuk mengakses pengaturan kursus, masuk ke kursus Anda dan klik ikon **Pengaturan** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Pengaturan" data-size="line"> di samping tombol **Beralih ke tampilan siswa**.

## Pengaturan Umum

### Informasi Kursus

* **Judul kursus** — Nama tampilan kursus Anda
* **Bahasa kursus** — Bahasa utama untuk antarmuka kursus
* **Kategori kursus** — Kategori tempat kursus muncul di katalog
* **Gambar kursus** — Unggah thumbnail yang merepresentasikan kursus Anda dalam daftar kursus (akan diubah ukurannya tergantung konteks)

Kode kursus (pengidentifikasi unik singkat) ditetapkan saat kursus dibuat dan tidak dapat diedit dari halaman ini.

Secara default, semua pengguna yang masuk ke kursus Anda akan melihat seluruh antarmuka Chamilo dalam bahasa kursus Anda. Ini adalah fitur imersif. Administrator dapat mengubah perilaku ini, tetapi Anda juga dapat mengubahnya dengan salah satu opsi pertama: **Tampilkan kursus dalam bahasa pengguna** (diatur ke Tidak secara default) jika Anda yakin hal ini terlalu menyulitkan pengguna Anda.

Bidang departemen dan URL departemen sudah usang. Bidang tersebut hanya dipertahankan untuk alasan dukungan warisan.

Jika diaktifkan, Anda dapat mengganti gaya di dalam kursus dengan opsi **Style sheets**, menggunakan stylesheet yang ada di portal Anda. Opsi ini sering dinonaktifkan oleh admin, demi desain global yang lebih terintegrasi.

### Kuota Disk

Setiap kursus memiliki batas penyimpanan (kuota disk) untuk berkas yang diunggah. Kuota ditetapkan oleh administrator platform. Anda dapat melihat batas saat ini di pengaturan kursus, dan penggunaan saat ini di alat **Dokumen**.

> Jika ruang hampir habis, hubungi administrator platform untuk meminta peningkatan kuota, atau hapus berkas yang tidak terpakai dari alat Dokumen.

### Visibilitas Kursus

![Pengaturan visibilitas kursus yang menampilkan opsi publik, terbuka, terdaftar, dan tertutup](/.gitbook/assets/course-settings-visibility.png)

Kontrol siapa yang dapat mengakses kursus Anda:

| Pengaturan | Deskripsi |
|---------|-------------|
| **Publik** | Siapa pun, termasuk pengunjung anonim, dapat mengakses kursus |
| **Terbuka untuk platform** | Semua pengguna terdaftar di platform dapat mengakses kursus |
| **Privat — akses diberikan oleh pengguna berhak** | Hanya pengguna yang secara eksplisit terdaftar di kursus yang dapat mengaksesnya |
| **Tertutup** | Kursus dikunci; tidak seorang pun dapat mengaksesnya kecuali pengajar |

#### Pengaturan Pendaftaran

Tergantung pada konfigurasi platform Anda, Anda mungkin dapat mengontrol:

* **Izinkan pendaftaran mandiri** — Apakah peserta didik dapat mendaftarkan diri melalui katalog kursus
* **Izinkan pembatalan pendaftaran mandiri** — Apakah peserta didik dapat meninggalkan kursus sendiri
* **Kata sandi pendaftaran** — Wajibkan kata sandi untuk pendaftaran mandiri (berguna untuk membatasi akses ke kelompok tertentu) tetapi tingkat keamanannya rendah karena kata sandi akses kursus yang sama dibagikan kepada semua pengguna.

Pengaturan ini hanya mencakup pendaftaran mandiri. Untuk gambaran lengkap — termasuk mendaftarkan pengguna yang sudah ada sendiri, atau mengundang seseorang yang belum memiliki akun platform — lihat [Mendaftarkan Pengguna](../assessing-learners/subscribing-users.md).

### Pengaturan Dokumen

Pilih apakah akan menampilkan atau menyembunyikan folder sistem di alat **Dokumen** (tersembunyi secara default; Anda biasanya tidak membutuhkannya dan menampilkannya dapat menimbulkan masalah dengan konten tersembunyi dan peserta didik).

### Pengaturan Notifikasi E-mail

Konfigurasikan bagaimana aktivitas kursus memicu notifikasi:

* **Notifikasi email untuk konten baru** — Beri tahu pengguna terdaftar saat Anda menambahkan dokumen, pengumuman, atau konten lain yang baru

### Pengaturan Obrolan

Kontrol bagaimana alat **Obrolan** akan ditampilkan.

### Pengaturan Learning path

* **Aktifkan tema kursus** — Izinkan learning path mengubah tampilan (tidak disarankan untuk pengalaman pengguna yang terintegrasi)
* **Tautan kembali learning path** — Tentukan ke mana pengguna diarahkan saat mengklik ikon **Beranda** dalam learning path: daftar learning path, beranda kursus, *Kursus saya*, *Sesi saya*, atau beranda portal

### Pengaturan Kemajuan Tematik

Konfigurasikan bagaimana pesan kemajuan tematik akan muncul di beranda kursus.

### Pengaturan Forum

Kontrol perilaku di alat forum kursus ini.

### Pengaturan Tugas

* **Pengaturan default untuk visibilitas berkas yang baru diposting** — Tentukan apakah dokumen baru yang diunggah peserta didik di alat **Tugas** dibagikan dengan semua peserta didik lain (Tidak secara default)
* **Izinkan peserta didik menghapus publikasi mereka sendiri** — Izinkan peserta didik menghapus tugas yang sudah mereka unggah (jika mereka ingin mengunggah koreksi).

### Pengaturan Autolaunch

Sebuah kursus dapat diatur agar memiliki perilaku auto-launch, yang akan mempersingkat jalur peserta didik untuk sampai ke bagian penting kursus Anda. Jika diaktifkan, peserta didik yang masuk ke kursus Anda akan dikirim langsung ke alat yang dipilih dan tidak akan melihat beranda kursus sebagai langkah perantara. Anda bahkan dapat memilih learning path atau latihan tertentu untuk diluncurkan saat tiba di kursus. Dalam kasus ini, Anda perlu memilih opsi di sini, lalu buka daftar learning path atau latihan dan klik ikon roket <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Auto-launch" data-size="line"> pada item yang dipilih.

### Pengaturan AI Helpers

Bagian ini hanya muncul jika administrator Anda telah mengaktifkan alat AI pada platform. Bagian ini memungkinkan Anda menyempurnakan pemilihan layanan AI helper yang tersedia melalui berbagai alat di platform Chamilo Anda. Nonaktifkan jika Anda tidak ingin menggunakannya, tetapi itu mungkin ide yang buruk karena fitur-fitur ini sangat andal.

Fitur-fitur ini dijelaskan di bagian **AI Tools** dalam panduan ini.

### Alat Eksternal (LTI)

Jika diaktifkan pada platform Anda, Learning Tools Integration memungkinkan Anda mengintegrasikan aktivitas eksternal yang kompatibel ke kursus ini, sebagai ikon terpisah di beranda kursus. Pembahasan LTI berada di luar cakupan panduan ini, tetapi ini adalah sistem integrasi yang andal bagi pengajar.

### Lainnya

Bagian atau opsi tambahan mungkin muncul di halaman ini tergantung pada opsi dan versi Chamilo.