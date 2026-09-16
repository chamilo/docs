# FAQ

Pertanyaan yang sering diajukan untuk administrator Chamilo 3.0.

## Instalasi dan Penyiapan

**Q: Versi PHP apa yang dibutuhkan Chamilo 3.0?**
A: PHP 8.3, 8.4, atau 8.5. Lihat [Persyaratan Server](../installation/server-requirements.md).

**Q: Bisakah saya menjalankan Chamilo di shared hosting?**
A: Memungkinkan tetapi tidak disarankan. Chamilo 3.0 membutuhkan Composer, Node.js dalam mode pengembangan, dan akses baris perintah untuk instalasi serta pemeliharaan. VPS atau server khusus memberikan pengalaman yang jauh lebih baik.

**Q: Basis data mana yang harus saya gunakan?**
A: MySQL 8.0+ atau MariaDB 10.4+ adalah yang paling umum digunakan dan paling teruji.

**Q: Bisakah saya menginstal Chamilo tanpa baris perintah?**
A: Ya, jika Anda menggunakan versi terpaket (.zip atau .tar.gz). Jika tidak, Anda akan membutuhkan baris perintah untuk menginstal dependensi Composer, membangun aset frontend, dan menjalankan migrasi basis data. Wizard berbasis web menangani penyiapan basis data dan konfigurasi awal, tetapi langkah-langkah di sekitarnya memerlukan akses shell dalam mode dev.

## Pengguna dan Autentikasi

**Q: Bagaimana cara mereset kata sandi pengguna?**
A: Buka **Administration > User list**, temukan pengguna, klik edit, dan atur kata sandi baru. Sebagai alternatif, pengguna dapat menggunakan tautan "Forgot password" di halaman masuk (jika email dikonfigurasi).

**Q: Bisakah saya mengimpor pengguna secara massal?**
A: Ya. Buka **Administration > Import users** dan unggah berkas CSV atau XML berisi data pengguna. Impor mendukung pembuatan pengguna baru dan pembaruan pengguna yang sudah ada.

**Q: Bagaimana cara mengintegrasikan dengan LDAP atau Active Directory?**
A: Konfigurasikan pengaturan LDAP pada konfigurasi autentikasi. Lihat [LDAP](../authentication/ldap.md). Pengguna disinkronkan saat masuk atau melalui sinkronisasi terjadwal.

**Q: Bisakah pengguna tergabung dalam beberapa sesi pada waktu yang sama?**
A: Ya. Pengguna dapat didaftarkan ke sejumlah sesi secara bersamaan. Setiap sesi mencatat kemajuan secara independen.

## Kursus dan Konten

**Q: Bagaimana cara mencadangkan satu kursus?**
A: Di dalam kursus, buka **Maintenance > Create a backup**. Ini menghasilkan arsip yang dapat diunduh berisi konten dan pengaturan kursus. Anda dapat memulihkannya pada instans Chamilo yang sama atau berbeda.

**Q: Bisakah saya menyalin kursus?**
A: Ya. Gunakan **Administration > Copy course** atau alat pemeliharaan kursus di dalam kursus. Anda dapat menyalin konten antar kursus atau membuat kursus baru dari kursus yang sudah ada.

**Q: Versi SCORM mana yang didukung?**
A: Chamilo mendukung SCORM 1.2. Paket SCORM diimpor sebagai learning path.

**Q: Bagaimana cara membatasi siapa yang dapat membuat kursus?**
A: Buka **Administration > Configuration settings > Course** dan nonaktifkan **Allow non administrators (teachers) to create new courses** (`allow_users_to_create_courses`). Ketika dinonaktifkan, hanya administrator yang dapat membuat kursus. Sebagai alternatif, Anda dapat menetapkan batas jumlah kursus yang dapat dibuat setiap pengajar.

## Kinerja dan Pemeliharaan

**Q: Platform lambat. Apa yang harus saya periksa terlebih dahulu?**
A: Berdasarkan dampak: (1) Pastikan `APP_ENV=prod` dan `APP_DEBUG=0` di `.env`. (2) Verifikasi PHP OPcache diaktifkan. (3) Periksa kinerja basis data. (4) Lihat [Penyetelan Kinerja](../platform-settings/performance-tuning.md).

**Q: Bagaimana cara mengosongkan cache?**
A: Jalankan `php bin/console cache:clear --env=prod` dari baris perintah. Jangan hapus direktori `var/cache/` secara manual saat aplikasi sedang berjalan.

**Q: Berapa banyak ruang disk yang dibutuhkan Chamilo?**
A: Aplikasi itu sendiri membutuhkan sekitar 2 GB tanpa kompresi. Total ruang bergantung pada konten yang diunggah (dokumen, video, paket SCORM). Pantau penggunaan disk dan rencanakan sesuai kebutuhan.

**Q: Bagaimana cara menyiapkan cadangan otomatis?**
A: Lihat [Cadangan](../maintenance/backups.md). Minimal, jadwalkan dump basis data harian dan cadangan tingkat berkas secara berkala untuk direktori unggahan.

## Email

**Q: Pengguna tidak menerima email. Apa yang harus saya periksa?**
A: (1) Verifikasi `MAILER_DSN` di `.env`. (2) Jalankan `php bin/console mailer:test someone@example.com` untuk menguji. (3) Periksa folder spam. (4) Verifikasi rekaman DNS SPF/DKIM. Lihat [Konfigurasi Email](../installation/email-configuration.md).

**Q: Bisakah saya menggunakan Gmail untuk mengirim email?**
A: Ya, untuk platform kecil atau pengembangan. Gunakan App Password dan perhatikan batas pengiriman harian Gmail (500 email/hari untuk akun biasa).

## Keamanan

**Q: Bagaimana cara memaksa HTTPS?**
A: Konfigurasikan server web Anda untuk mengalihkan HTTP ke HTTPS. Selain itu, aktifkan pengaturan "Force HTTPS" di **Administration > Configuration settings > Security**. Lihat [Pengaturan Keamanan](../platform-settings/security-settings.md).

**Q: Bagaimana cara memblokir serangan login brute-force?**
A: Konfigurasikan jumlah percobaan masuk maksimum dan CAPTCHA di pengaturan keamanan. Pertimbangkan juga menggunakan fail2ban di tingkat server untuk perlindungan tambahan.

**Q: Seorang pengguna lupa kata sandinya dan email tidak berfungsi. Bagaimana cara membantu mereka?**
A: Sebagai administrator, edit akun pengguna secara langsung dan atur kata sandi baru. Buka **Administration > User list**, temukan akun, dan perbarui kolom kata sandi.

## Peningkatan Versi

**Q: Dapatkah saya meningkatkan versi secara langsung dari Chamilo 2.x ke 3.0?**
A: Ya, tetapi ini adalah migrasi besar, bukan pembaruan sederhana. Lihat [Peningkatan Versi](../installation/upgrading.md). Selalu uji terlebih dahulu pada server staging.

**Q: Apakah plugin saya akan berfungsi setelah peningkatan ke 3.0?**
A: Tidak. Plugin dari 2.x tidak kompatibel dengan 3.0 dan harus ditulis ulang atau diganti dengan fungsionalitas 3.0 yang setara.