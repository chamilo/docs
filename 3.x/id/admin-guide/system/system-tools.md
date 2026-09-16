# Peralatan Sistem

Halaman ini membahas utilitas pemeliharaan dan inspeksi pada blok System.

## Clean Temporary Files

**System > Clean temporary files** menampilkan berapa banyak berkas unggahan sementara yang ada dan berapa ruang yang mereka gunakan, lalu memungkinkan Anda membersihkannya — seluruhnya, atau hanya berkas yang lebih tua dari usia yang dapat dikonfigurasi. Mode dry-run memungkinkan Anda meninjau terlebih dahulu apa yang akan dihapus. Tindakan yang sama juga membersihkan berkas build warisan yang usang dan meregenerasi aset CSS yang dikompilasi.

Tindakan ini dengan sengaja melewati direktori cache milik Symfony sendiri (`var/cache/dev`, `var/cache/prod`, `var/cache/test`, dan cache pools) — tindakan ini hanya membersihkan berkas liar yang berakhir di tempat lain di bawah `var/cache/`. Tindakan ini **tidak** akan mengambil perubahan yang Anda buat di `.env` atau di bawah `config/` (misalnya, mengaktifkan dokumentasi API — lihat [Enable the API Documentation](../installation/configuration.md#enable-the-api-documentation)). Untuk itu, Anda memerlukan akses shell untuk menjalankan `php bin/console cache:clear`.

## System Update

**System > System update** menjalankan alur kerja pembaruan mandiri Chamilo langsung dari panel admin, sebagai rangkaian langkah diskret yang dapat dilanjutkan:

1. **Status** — Melaporkan versi terpasang dan lokasi direktori update/staging/backup, beserta kunci penandatanganan terpercaya yang digunakan
2. **Check** — Memeriksa apakah versi yang lebih baru tersedia dari sumber pembaruan yang dikonfigurasi
3. **Verify** — Mengunduh paket pembaruan beserta tanda tangannya, dan memeriksanya terhadap checksum manifes serta kunci publik terpercaya
4. **Preflight** — Memvalidasi persyaratan sistem dan kompatibilitas sebelum apa pun disentuh
5. **Stage** — Mengekstrak paket yang telah diverifikasi ke direktori staging terisolasi; belum ada yang berubah pada instalasi yang sedang berjalan
6. **Apply plan** — Membangun diff berkas yang akan ditambahkan, diganti, atau dihapus, berdasarkan paket yang di-stage
7. **Apply files** — Menyalin berkas ke tempatnya. Ini memerlukan konfirmasi eksplisit, dan membuat cadangan setiap berkas yang ditimpa plus berkas kunci yang mencegah pembaruan kedua berjalan secara bersamaan
8. **Migration safety / post-apply checks** — Memvalidasi migrasi basis data yang tertunda dan keadaan pasca-instalasi
9. **Run post-apply** — Menjalankan perintah konsol pasca-penerapan (seperti migrasi basis data), tetapi hanya jika konfigurasi server Anda mengizinkan menjalankannya dari UI, dan hanya setelah Anda mengetik frasa konfirmasi eksplisit serta mengonfirmasi bahwa cadangan telah dibuat

Langkah yang berjalan lama melaporkan progres sehingga halaman dapat dibiarkan terbuka dengan aman hingga selesai. Kombinasi verifikasi tanda tangan, staging sebelum penerapan, cadangan sebelum penimpaan, kunci konkurensi, dan konfirmasi yang diketik sebelum perubahan basis data dirancang agar alur kerja ini aman dijalankan tanpa akses shell — tetapi cadangan manual sebelum memulai tetap merupakan praktik yang baik; lihat [Backups](../maintenance/backups.md).

## File Info

**System > File info** mencantumkan setiap berkas sumber daya yang diunggah, dapat dicari berdasarkan nama, menampilkan jalur fisiknya, apakah berkas itu yatim (tidak terhubung ke kursus atau sesi mana pun), dan berapa banyak tempat yang merujuknya. Dari sini Anda dapat menautkan berkas yatim ke suatu sumber daya, melepaskannya, atau menghapusnya — berguna untuk melacak dan membersihkan penyimpanan yang tidak lagi milik kursus mana pun.

## Resources by Type

**System > Resources by type** memungkinkan Anda memilih jenis sumber daya dan melihat, di seluruh kursus dan sesi, jumlah agregat serta daftar item jenis tersebut, kapan dibuat, dan (jika berlaku) pengguna mana yang terkait dengannya. Gunakan untuk menjawab pertanyaan seperti "berapa banyak forum yang ada di seluruh platform" atau "kursus mana yang memiliki dokumen terbanyak."

## List Icons

**System > List icons** adalah katalog yang dapat dijelajahi dari kumpulan ikon bawaan Chamilo, dikelompokkan menurut kategori. Ini terutama berguna saat mengembangkan plugin atau tema dan perlu memastikan nama persis suatu ikon, tetapi ditampilkan di sini sebagai referensi umum.

## Development-Only Tools

Dua item lagi dapat muncul di blok ini, tetapi hanya jika server memiliki direktori `tests/` — yang biasanya hanya terjadi pada instalasi pengembangan atau QA, tidak pernah di produksi:

* **Data filler** menghasilkan volume besar pengguna, kursus, dan catatan pengguna daring palsu, untuk pengujian beban atau QA.
* **E-mail tester** mengirim e-mail uji nyata melalui mailer yang dikonfigurasi platform, untuk memastikan pengaturan SMTP/mail Anda benar-benar berfungsi, dan menampilkan kegagalan pengiriman terbaru jika ada.

Jika Anda tidak melihat kedua tautan ini, itu wajar — artinya instalasi Anda tidak memiliki direktori `tests/`, yang merupakan keadaan normal dan benar untuk platform produksi.