# FAQ

Pertanyaan yang sering diajukan untuk administrator Chamilo 2.0.

## Instalasi dan Pengaturan

**T: Versi PHP apa yang dibutuhkan oleh Chamilo 2.0?**  
J: PHP 8.2 atau lebih tinggi. PHP 8.3 direkomendasikan. Lihat [Persyaratan Server](../installation/server-requirements.md).

**T: Apakah saya bisa menjalankan Chamilo di hosting bersama?**  
J: Memungkinkan, tetapi tidak disarankan. Chamilo 2.0 membutuhkan Composer, Node.js dalam mode pengembangan, dan akses command-line untuk instalasi serta pemeliharaan. VPS atau server khusus memberikan pengalaman yang jauh lebih baik.

**T: Database apa yang sebaiknya saya gunakan?**  
J: MySQL 8.0+ atau MariaDB 10.4+ adalah yang paling umum digunakan dan paling teruji.

**T: Apakah saya bisa menginstal Chamilo tanpa command line?**  
J: Ya, jika Anda menggunakan versi yang sudah dikemas (.zip atau .tar.gz). Jika tidak, Anda akan membutuhkan command line untuk menginstal dependensi Composer, membangun aset frontend, dan menjalankan migrasi database. Wizard berbasis web menangani pengaturan database dan konfigurasi awal, tetapi langkah-langkah sekitarnya memerlukan akses shell dalam mode pengembangan.

## Pengguna dan Autentikasi

**T: Bagaimana cara mereset kata sandi pengguna?**  
J: Buka **Administrasi > Daftar Pengguna**, temukan pengguna, klik edit, dan atur kata sandi baru. Alternatifnya, pengguna dapat menggunakan tautan "Lupa Kata Sandi" di halaman login (jika email telah dikonfigurasi).

**T: Apakah saya bisa mengimpor pengguna secara massal?**  
J: Ya. Buka **Administrasi > Impor Pengguna** dan unggah file CSV atau XML dengan data pengguna. Impor mendukung pembuatan pengguna baru dan pembaruan pengguna yang sudah ada.

**T: Bagaimana cara mengintegrasikan dengan LDAP atau Active Directory?**  
J: Konfigurasikan pengaturan LDAP di konfigurasi autentikasi. Lihat [LDAP](../authentication/ldap.md). Pengguna disinkronkan saat login atau melalui sinkronisasi terjadwal.

**T: Apakah pengguna bisa tergabung dalam beberapa sesi secara bersamaan?**  
J: Ya. Pengguna dapat terdaftar dalam jumlah sesi yang tidak terbatas secara bersamaan. Setiap sesi melacak kemajuan secara independen.

## Kursus dan Konten

**T: Bagaimana cara mencadangkan satu kursus?**  
J: Di dalam kursus, buka **Pemeliharaan > Buat Cadangan**. Ini akan menghasilkan arsip yang dapat diunduh berisi konten dan pengaturan kursus. Anda dapat memulihkannya di instance Chamilo yang sama atau berbeda.

**T: Apakah saya bisa menyalin kursus?**  
J: Ya. Gunakan **Administrasi > Salin Kursus** atau alat pemeliharaan kursus di dalam kursus. Anda dapat menyalin konten antar kursus atau membuat kursus baru dari kursus yang sudah ada.

**T: Versi SCORM apa yang didukung?**  
J: Chamilo mendukung SCORM 1.2. Paket SCORM diimpor sebagai jalur pembelajaran.

**T: Bagaimana cara membatasi siapa yang bisa membuat kursus?**  
J: Buka **Administrasi > Pengaturan Konfigurasi > Kursus** dan nonaktifkan **Izinkan non-administrator (guru) untuk membuat kursus baru** (`allow_users_to_create_courses`). Jika dinonaktifkan, hanya administrator yang dapat membuat kursus. Alternatifnya, Anda dapat menetapkan batas jumlah kursus yang dapat dibuat oleh setiap guru.

## Performa dan Pemeliharaan

**T: Platform terasa lambat. Apa yang harus saya periksa terlebih dahulu?**  
J: Berdasarkan dampaknya: (1) Pastikan `APP_ENV=prod` dan `APP_DEBUG=0` di `.env`. (2) Verifikasi bahwa PHP OPcache diaktifkan. (3) Periksa performa database. (4) Lihat [Penyesuaian Performa](../platform-settings/performance-tuning.md).

**T: Bagaimana cara menghapus cache?**  
J: Jalankan `php bin/console cache:clear --env=prod` dari command line. Jangan hapus direktori `var/cache/` secara manual saat aplikasi sedang berjalan.

**T: Berapa banyak ruang disk yang dibutuhkan Chamilo?**  
J: Aplikasi itu sendiri membutuhkan sekitar 2 GB dalam keadaan tidak terkompresi. Total ruang tergantung pada konten yang diunggah (dokumen, video, paket SCORM). Pantau penggunaan disk dan rencanakan sesuai kebutuhan.

**T: Bagaimana cara mengatur cadangan otomatis?**  
J: Lihat [Cadangan](../maintenance/backups.md). Minimal, jadwalkan dump database harian dan cadangan tingkat file reguler untuk direktori unggahan.

## Email

**T: Pengguna tidak menerima email. Apa yang harus saya periksa?**  
J: (1) Verifikasi `MAILER_DSN` di `.env`. (2) Jalankan `php bin/console mailer:test someone@example.com` untuk menguji. (3) Periksa folder spam. (4) Verifikasi catatan DNS SPF/DKIM. Lihat [Konfigurasi Email](../installation/email-configuration.md).

**T: Apakah saya bisa menggunakan Gmail untuk mengirim email?**  
J: Ya, untuk platform kecil atau pengembangan. Gunakan App Password dan perhatikan batas pengiriman harian Gmail (500 email/hari untuk akun biasa).

## Keamanan

**T: Bagaimana cara memaksa penggunaan HTTPS?**  
J: Konfigurasikan server web Anda untuk mengarahkan HTTP ke HTTPS. Selain itu, aktifkan pengaturan "Paksa HTTPS" di **Administrasi > Pengaturan Konfigurasi > Keamanan**. Lihat [Pengaturan Keamanan](../platform-settings/security-settings.md).

**T: Bagaimana cara memblokir serangan brute-force pada login?**  
J: Konfigurasikan jumlah maksimum percobaan login dan CAPTCHA di pengaturan keamanan. Pertimbangkan juga menggunakan fail2ban di tingkat server untuk perlindungan tambahan.

**T: Seorang pengguna lupa kata sandi dan email tidak berfungsi. Bagaimana cara membantu mereka?**  
J: Sebagai administrator, edit akun pengguna secara langsung dan atur kata sandi baru. Buka **Administrasi > Daftar Pengguna**, temukan akun tersebut, dan perbarui kolom kata sandi.

---
## Peningkatan Versi

**T: Dapatkah saya meningkatkan versi langsung dari Chamilo 1.11.x ke 2.0?**
J: Ya, tetapi ini adalah migrasi besar, bukan pembaruan sederhana. Lihat [Peningkatan Versi](../installation/upgrading.md). Selalu uji terlebih dahulu di server staging.

**T: Apakah plugin saya akan berfungsi setelah meningkatkan ke versi 2.0?**
J: Tidak. Plugin dari versi 1.11.x tidak kompatibel dengan versi 2.0 dan harus ditulis ulang atau diganti dengan fungsionalitas setara di versi 2.0.