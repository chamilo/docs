# Integritas File

*Baru di Chamilo 3.0.*

Integritas File membandingkan file yang terpasang di server Anda dengan baseline tepercaya, untuk mendeteksi penambahan, modifikasi, penghapusan, dan perubahan izin yang tidak Anda harapkan — jenis perubahan yang ditinggalkan oleh penyusupan yang berhasil, dependensi yang terkompromi, atau suntingan manual yang keliru.

## Mengakses Integritas File

Dari panel administrasi, klik **Keamanan > Integritas file**.

## Apa yang Ditampilkan

![Halaman Integritas file yang menampilkan informasi pemindaian terakhir, panel untuk file Ditambahkan, Dimodifikasi, Dihapus, dan Izin diubah, daftar Riwayat peringatan, serta Tindakan untuk menjalankan pemindaian, menjeda peringatan, atau menetapkan baseline baru](/.gitbook/assets/admin-security-file-integrity.png)

* **Pemindaian terakhir** — Kapan pemindaian terbaru dijalankan dan berapa banyak file yang diperiksa
* **Ditambahkan / Dimodifikasi / Dihapus** — File yang berbeda dari baseline, diidentifikasi dengan membandingkan checksum SHA-256 (setiap daftar dibatasi 500 path, dengan catatan jika daftar lengkapnya lebih panjang — lihat log CEF di bawah untuk daftar lengkap)
* **Izin diubah** — File yang izinnya berbeda dari baseline. Di Linux, ini membandingkan bit mode POSIX secara langsung (misalnya, file yang menjadi dapat ditulis oleh semua orang akan ditandai); di Windows, hanya atribut baca-saja yang dilacak, karena `fileperms()` tidak mencerminkan ACL NTFS yang sebenarnya
* **Riwayat peringatan** — Log tahan lama, hanya-tambah dari setiap pemindaian yang menemukan sesuatu (hingga 50 terakhir). Tidak seperti laporan di atas, daftar ini tidak pernah dihapus oleh pemindaian bersih atau baseline baru, sehingga peringatan masa lalu tetap terlihat bahkan setelah penyimpangan yang ditandainya telah diselesaikan

Pemeriksaan menelusuri seluruh pohon file terpasang kecuali direktori `var/` dan `.git/` — dengan satu pengecualian: `.git/config` tetap diawasi secara individual, khususnya untuk menangkap remote Git yang diam-diam dialihkan ke server yang bermusuhan. Symbolic link tidak pernah diikuti, untuk menghindari loop traversal atau keluar dari direktori instalasi.

Karena pemindaian penuh pada instalasi besar dapat memakan waktu beberapa menit, penelusuran dipecah menjadi potongan (satu direktori tingkat atas pada satu waktu) dan kemajuannya dilacak dalam file kunci — sehingga halaman dapat dimuat ulang dengan aman untuk memeriksa kemajuan, dan pemindaian yang crash atau dihentikan tidak pernah disalahartikan sebagai yang masih berjalan.

## Tindakan

* **Jalankan pemindaian sekarang** — Membandingkan pohon file saat ini dengan baseline segera
* **Jeda selama 1 jam** — Menangguhkan peringatan untuk sementara (misalnya, saat Anda menerapkan pembaruan). Memerlukan pemasukan ulang kata sandi Anda sendiri. Saat dijeda, pemindaian secara diam-diam mengadopsi pohon saat ini sebagai baseline baru alih-alih memberi peringatan, sehingga jendela jeda ditutup tanpa sisa peringatan. Jeda maksimum adalah 24 jam
* **Tetapkan baseline baru** — Mengadopsi pohon file saat ini sebagai referensi tepercaya yang baru. Memerlukan pemasukan ulang kata sandi Anda sendiri

Menjeda peringatan atau menetapkan baseline baru dapat menyembunyikan penyusupan yang sedang berlangsung, itulah sebabnya keduanya memerlukan kata sandi Anda lagi — sesi admin yang dibajak saja tidak cukup untuk membungkam deteksi saat file sedang diubah.

## Menjalankan dari Cron

Pemeriksaan yang sama tersedia sebagai perintah konsol, dimaksudkan untuk dijadwalkan dengan cron alih-alih dijalankan dari halaman admin secara terjadwal:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Jika jeda aktif, `app:file-integrity:scan` membuat baseline ulang secara diam-diam alih-alih memberi peringatan, sesuai dengan perilaku pemindaian yang dipicu dari halaman admin.

## Pengaturan

Satu pengaturan terkait berada di **Pengaturan konfigurasi > Keamanan**:

* **`file_integrity_check_notify_admins`** — Daftar alamat e-mail yang akan diberitahu ketika penyimpangan ditemukan; jika dikosongkan, setiap Administrator Global akan diberitahu

## Integrasi SIEM

Setiap pemindaian juga menulis baris log CEF (Common Event Format) ke `var/logs/security/file_integrity.log`, cocok untuk diingest oleh SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat, dan alat serupa). Setiap baris ditandai dengan ID tanda tangan yang mengidentifikasi jenis perubahan:

| Signature | Meaning |
|-----------|---------|
| `FIM-ADDED` | A new file appeared |
| `FIM-MODIFIED` | A file's contents changed |
| `FIM-DELETED` | A file disappeared |
| `FIM-GITCONFIG` | `.git/config` changed (possible hijacked remote) |
| `FIM-PERMS` | A file's permissions changed |
| `FIM-TRUNCATED` | The report for a category was capped; consult the log for the full list |

## Penggunaan yang Disarankan

1. Tetapkan baseline segera setelah instalasi, dan lagi setelah setiap pembaruan atau deployment manual
2. Jadwalkan `app:file-integrity:scan` di cron (misalnya, setiap malam)
3. Sebelum jendela pemeliharaan terencana yang akan mengubah berkas (pembaruan, migrasi), gunakan **Pause for 1 hour** daripada menghapus pekerjaan cron sepenuhnya
4. Masukkan `var/logs/security/file_integrity.log` ke pemantauan log atau SIEM yang sudah ada jika Anda memilikinya