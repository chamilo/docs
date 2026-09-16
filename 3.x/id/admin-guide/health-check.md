# Health Check

Health Check adalah blok kecil pada dasbor administrasi yang menjalankan sejumlah pemeriksaan langsung pada instalasi Anda dan menandai apa pun yang memerlukan perhatian — tanpa perlu menelusuri berkas konfigurasi untuk menemukan kesalahan konfigurasi yang umum.

![Blok Health check pada dasbor administrasi, menampilkan status lulus/gagal untuk pengaturan e-mail, penugasan URL admin, dan pemeriksaan izin berkas](/.gitbook/assets/admin-health-check-block.png)

## Mengakses Health Check

Dari panel administrasi, blok **Health check** muncul bersama blok dasbor lainnya — tidak perlu diklik, hasilnya ditampilkan langsung.

## Pemeriksaan

* **Pengaturan e-mail** — Memverifikasi bahwa string koneksi mailer dan e-mail/nama "from" telah dikonfigurasi. Jika tidak, menautkan ke pengaturan Mail untuk memperbaikinya.
* **Semua URL memiliki setidaknya satu admin yang ditugaskan** — Pada instalasi multi-URL, memeriksa bahwa setiap URL akses memiliki setidaknya satu administrator yang dapat mengelolanya. Jika tidak, menautkan ke halaman penugasan URL akses/pengguna.
* **`.env` tidak dapat ditulis** — `.env` menyimpan rahasia dan tidak boleh dapat ditulis oleh server web setelah instalasi. Ditandai sebagai kesalahan jika dapat ditulis; menautkan ke Panduan Keamanan.
* **`config/` tidak dapat ditulis** — Alasan yang sama seperti `.env`: direktori ini tidak boleh dapat ditulis melalui web dalam operasi normal. Menautkan ke Panduan Keamanan.
* **`var/cache` dapat ditulis** — Pemeriksaan sebaliknya: Symfony perlu menulis ke direktori cache-nya, sehingga ini ditandai sebagai kesalahan jika *tidak* dapat ditulis. Menautkan ke panduan Performance Tuning / optimisasi.
* **Folder instalasi tidak ada** — Folder `public/main/install` hanya diperlukan selama instalasi dan harus dihapus setelahnya. Ini ditandai sebagai peringatan (bukan kesalahan keras) jika masih ada, karena risikonya lebih rendah daripada dua pemeriksaan kemampuan tulis di atas. Menautkan ke Panduan Keamanan.

## Apa yang Harus Dilakukan

Setiap pemeriksaan menautkan langsung ke tempat Anda memperbaiki masalah yang mendasarinya — baik halaman pengaturan maupun panduan yang relevan. Jalankan daftar ini segera setelah instalasi, dan secara berkala setelahnya (misalnya, setelah transfer berkas manual atau perubahan izin), karena pemeriksaan yang lulus hari ini tidak menjamin tetap demikian. Untuk daftar periksa pengerasan produksi yang lebih luas di luar keenam pemeriksaan ini, lihat [Panduan Keamanan](appendix/security-guide.md).