# Instalasi

Bagian ini mencakup semua yang Anda perlukan untuk menginstal dan mengkonfigurasi Chamilo 2.0 di server Anda.

Chamilo 2.0 adalah aplikasi PHP yang dibangun di atas kerangka kerja Symfony. Aplikasi ini dapat berjalan di sebagian besar server berbasis Linux, telah diinstal dan berjalan di Windows Server dengan IIS, serta mendukung backend MySQL dan MariaDB.

## Langkah-langkah Instalasi

1. **[Persyaratan Server](server-requirements.md)** — Pastikan server Anda memenuhi persyaratan minimum
2. **[Panduan Instalasi](installation-wizard.md)** — Jalankan panduan instalasi berbasis web
3. **[Konfigurasi](configuration.md)** — Konfigurasikan variabel lingkungan dan pengaturan Symfony
4. **[Penyimpanan Cloud](cloud-storage.md)** — Siapkan backend penyimpanan cloud (opsional)
5. **[Konfigurasi Email](email-configuration.md)** — Konfigurasikan pengiriman email
6. **[Peningkatan Versi](upgrading.md)** — Tingkatkan dari versi sebelumnya

## Gambaran Singkat

Proses instalasi dasar adalah:

1. Unduh atau klon kode sumber Chamilo
2. Instal dependensi PHP dengan Composer jika mempersiapkan dari sumber
3. Instal dependensi JavaScript dengan npm/yarn dan bangun aset frontend
4. Buat file `.env` kosong untuk menyimpan kredensial basis data dan pengaturan lainnya nanti
5. Ubah izin (dapat ditulis oleh server web) pada *var/*, *config/*, dan *.env*
6. Jalankan panduan instalasi berbasis web
7. Hubungkan dengan akun administrator pertama Anda
8. Kembalikan izin pada *config/* dan *.env*

Petunjuk rinci untuk setiap langkah tersedia di halaman-halaman yang tertaut di atas.