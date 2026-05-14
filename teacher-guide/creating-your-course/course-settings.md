# Pengaturan Kursus

Pengaturan kursus memungkinkan Anda mengontrol perilaku kursus Anda — siapa yang dapat mengaksesnya, bagaimana tampilannya, dan fitur apa yang diaktifkan.

Untuk mengakses pengaturan kursus, masuk ke kursus Anda dan klik ikon **Settings** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Pengaturan" data-size="line"> di sebelah tombol **Switch to student view**.

## Pengaturan Umum

### Informasi Kursus

* **Judul kursus** — Nama tampilan kursus Anda
* **Bahasa kursus** — Bahasa utama untuk antarmuka kursus
* **Kategori kursus** — Kategori tempat kursus muncul di katalog
* **Gambar kursus** — Unggah thumbnail yang mewakili kursus Anda dalam daftar kursus (akan diubah ukurannya tergantung konteks)

Kode kursus (pengidentifikasi unik pendek) ditetapkan saat kursus dibuat dan tidak dapat diedit dari halaman ini.

Secara default, semua pengguna yang masuk ke kursus Anda akan melihat seluruh antarmuka Chamilo dalam bahasa kursus Anda. Ini adalah fitur imersif. Administrator dapat mengubah perilaku ini, tetapi Anda juga dapat mengubahnya dengan salah satu opsi pertama: **Show course in user's language** (ditetapkan ke Tidak secara default) jika Anda merasa ini terlalu sulit bagi pengguna Anda.

Departemen dan URL departemen adalah bidang yang sudah usang. Mereka hanya dipelihara untuk alasan dukungan warisan.

Jika diaktifkan, Anda dapat mengubah gaya di dalam kursus Anda dengan opsi **Style sheets**, menggunakan stylesheet yang ada di portal Anda. Opsi ini sering dinonaktifkan oleh admin, untuk desain global yang lebih terintegrasi.

### Kuota Disk

Setiap kursus memiliki batas penyimpanan (kuota disk) untuk file yang diunggah. Kuota ditetapkan oleh administrator platform. Anda dapat melihat batas saat ini di pengaturan kursus, dan penggunaan saat ini di alat **Documents**.

> Jika Anda kehabisan ruang, hubungi administrator platform Anda untuk meminta peningkatan kuota, atau hapus file yang tidak digunakan dari alat Documents.

### Visibilitas Kursus

![Pengaturan visibilitas kursus yang menunjukkan opsi publik, terbuka, terdaftar, dan tertutup](/.gitbook/assets/course-settings-visibility.png)

Kontrol siapa yang dapat mengakses kursus Anda:

| Pengaturan | Deskripsi |
|------------|-----------|
| **Publik** | Siapa saja, termasuk pengunjung anonim, dapat mengakses kursus |
| **Terbuka untuk platform** | Semua pengguna terdaftar di platform dapat mengakses kursus |
| **Pribadi — akses diberikan oleh pengguna istimewa** | Hanya pengguna yang secara eksplisit terdaftar di kursus yang dapat mengaksesnya |
| **Tertutup** | Kursus terkunci; tidak ada yang dapat mengaksesnya kecuali guru |

#### Pengaturan Pendaftaran

Tergantung pada konfigurasi platform Anda, Anda mungkin dapat mengontrol:

* **Izinkan pendaftaran mandiri** — Apakah pelajar dapat mendaftar sendiri melalui katalog kursus
* **Izinkan pembatalan pendaftaran mandiri** — Apakah pelajar dapat meninggalkan kursus sendiri
* **Kata sandi pendaftaran** — Memerlukan kata sandi untuk pendaftaran mandiri (berguna untuk membatasi akses ke kelompok tertentu) tetapi tingkat keamanannya rendah karena kata sandi akses kursus yang sama dibagikan di antara semua pengguna.

### Pengaturan Dokumen

Pilih apakah akan menampilkan atau menyembunyikan folder sistem di alat **Documents** (disembunyikan secara default, Anda benar-benar tidak membutuhkannya dalam kebanyakan kasus dan menampilkannya mungkin menyebabkan masalah dengan konten tersembunyi dan pelajar).

### Pengaturan Notifikasi Email

Konfigurasikan bagaimana aktivitas kursus memicu notifikasi:

* **Notifikasi email untuk konten baru** — Beri tahu pengguna terdaftar saat Anda menambahkan dokumen baru, pengumuman, atau konten lainnya

### Pengaturan Obrolan

Kontrol bagaimana alat **Chat** akan ditampilkan.

### Pengaturan Jalur Pembelajaran

* **Aktifkan tema kursus** — Izinkan jalur pembelajaran untuk mengubah tampilan (tidak direkomendasikan untuk pengalaman pengguna terintegrasi)
* **Tautan kembali jalur pembelajaran** — Tentukan ke mana pengguna mendarat saat mengklik ikon **Home** di jalur pembelajaran: daftar jalur pembelajaran, beranda kursus, *My courses*, *My sessions*, atau beranda portal

### Pengaturan Kemajuan Tematik

Konfigurasikan bagaimana pesan kemajuan tematik akan muncul di beranda kursus.

### Pengaturan Forum

Kontrol perilaku di alat forum kursus ini.

### Pengaturan Tugas

* **Pengaturan default untuk visibilitas file yang baru diposting** — Tentukan apakah dokumen baru yang diunggah oleh pelajar di alat **Assignments** dibagikan dengan semua pelajar lainnya (Tidak secara default)
* **Izinkan pelajar menghapus publikasi mereka sendiri** — Izinkan pelajar menghapus tugas yang sudah mereka unggah (jika mereka ingin mengunggah koreksi).

---
### Pengaturan Autolaunch

Sebuah kursus dapat diatur untuk memiliki perilaku auto-launch, yang akan mempersingkat jalur pembelajar untuk mencapai bagian penting dari kursus Anda. Jika diaktifkan, pembelajar yang memasuki kursus Anda akan langsung dikirim ke alat yang dipilih dan tidak akan melihat halaman beranda kursus sebagai langkah perantara. Anda bahkan dapat memilih jalur pembelajaran atau latihan tertentu untuk diluncurkan saat tiba di kursus. Dalam hal ini, Anda perlu memilih opsi di sini, kemudian pergi ke daftar jalur pembelajaran atau latihan dan klik ikon roket <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Auto-launch" data-size="line"> pada item yang dipilih.

### Pengaturan Pembantu AI

Bagian ini hanya muncul jika administrator Anda telah mengaktifkan alat AI di platform. Ini memungkinkan Anda menyempurnakan pemilihan layanan pembantu AI yang tersedia melalui berbagai alat di platform Chamilo Anda. Nonaktifkan jika Anda tidak ingin menggunakannya, tetapi itu mungkin ide buruk karena ini sangat kuat.

Fitur-fitur ini dijelaskan di bagian **AI Tools** dari panduan ini.

### Alat Eksternal (LTI)

Jika diaktifkan di platform Anda, Learning Tools Integration memungkinkan Anda mengintegrasikan aktivitas eksternal yang kompatibel ke kursus ini, sebagai ikon individu di halaman beranda kursus. Membahas LTI di luar ruang lingkup panduan ini, tetapi ini adalah sistem integrasi yang kuat untuk guru.

### Lainnya

Bagian atau opsi tambahan mungkin muncul di halaman ini tergantung pada opsi dan versi Chamilo.