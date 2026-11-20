# Pelaporan Rahasia

Chamilo menyertakan alur kerja **pelaporan rahasia** opsional untuk menyampaikan kekhawatiran tentang pengguna lain kepada penyelidik yang berwenang. Ini bukan alat tiket dukungan biasa atau forum diskusi publik.

## Mengaktifkan fitur

Buka **Administration > Configuration settings > Security** dan konfigurasikan:

| Pengaturan | Default | Tujuan |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Mengaktifkan alur kerja pelaporan rahasia |
| `security.confidential_reporting_min_reporters` | `2` | Jumlah minimum pelapor yang berbeda (2–10) sebelum investigasi menjadi terlihat |
| `security.confidential_reporting_attachments_enabled` | `true` | Mengizinkan lampiran bukti |
| `security.confidential_reporting_notifications_enabled` | `false` | Menampilkan indikator internal untuk investigasi yang memenuhi syarat (tanpa email) |

Penerapan juga mengharuskan enkripsi pelaporan rahasia dan penyimpanan privat di server sudah siap. Chamilo menggunakan fungsi kriptografi PHP Sodium dan kunci enkripsi privat; **simpan dan cadangkan kunci tersebut dengan aman**. Kehilangan kunci dapat membuat laporan yang tersimpan tidak dapat dibaca. Jangan menyalin kunci ke repositori Git. Jangan mengaktifkan fitur ini sebelum memverifikasi bahwa penyimpanan kunci privat dan migrasi basis data yang diperlukan sudah beroperasi.

## Mengirim laporan

1. Masuk langsung ke Chamilo dan buka **Confidential reporting** (jika diaktifkan untuk portal).
2. Pilih orang yang bersangkutan, masukkan subjek, dan uraikan insiden.
3. Tambahkan bukti jika lampiran diaktifkan.
4. Tentukan apakah penyelidik boleh melihat **nama dan email** Anda untuk laporan khusus ini. Izin ini dapat ditarik kembali kemudian.
5. Kirim laporan. Gunakan **My confidential reports** untuk menindaklanjuti kasus dan bertukar pesan dengan penyelidik.

Identitas pelapor **tidak ditampilkan kepada penyelidik secara default**. Ini adalah kontrol kerahasiaan, bukan janji anonimitas mutlak dari operator sistem.

## Izin investigasi dan ambang batas

Investigasi memerlukan izin khusus `welfare:investigate` serta peran administrator atau HR yang memenuhi syarat. Sebuah kasus tersedia untuk investigasi hanya setelah jumlah **pelapor yang berbeda** yang dikonfigurasi tercapai untuk target yang sama. Seorang penyelidik tidak dapat menyelidiki laporan tentang dirinya sendiri. Akses HR terbatas pada pengguna yang diikuti oleh manajer HR.

Penyelidik mengakses **Confidential investigations** untuk melihat kasus yang memenuhi syarat, meninjau bukti, dan bertukar pesan. Kasus di bawah ambang batas atau yang tidak berwenang tidak diekspos melalui API investigasi. **Impersonation** administratif tidak memberikan akses ke pelaporan rahasia.

## Privasi dan kehati-hatian operasional

Laporan dan bukti terlampir berisi data pribadi yang sensitif. Batasi izin penyelidik, batasi akses cadangan, tetapkan kebijakan retensi organisasi yang sesuai, dan uji alur kerja dengan akun pelapor, target, dan penyelidik yang terpisah. Hindari menyalin laporan lengkap ke log teknis atau pelacak isu.

Implementasi: [Pelaporan rahasia #9310](https://github.com/chamilo/chamilo-lms/pull/9310).