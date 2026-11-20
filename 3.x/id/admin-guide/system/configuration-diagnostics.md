# Ekspor Diagnostik Konfigurasi yang Aman

Chamilo 3.1 menyediakan laporan JSON yang dapat diunduh untuk mendiagnosis masalah konfigurasi tanpa secara sengaja mengekspor nilai pengaturan yang bersifat rahasia. Laporan ini terbatas pada **URL akses saat ini** dan memerlukan peran administrator.

## Mengunduh laporan

1. Buka **Administration > Settings** pada portal yang ingin Anda periksa.
2. Pilih **Download configuration for debugging**.
3. Simpan berkas `chamilo-configuration-dump.json` yang dihasilkan secara aman.
4. **Tinjau seluruh berkas sebelum mengirimkannya kepada siapa pun**, meskipun tampak telah disanitasi.

Laporan mencakup stempel waktu ekspor, cakupan URL akses, pengaturan platform yang telah disanitasi, serta status pemasangan/aktif plugin beserta konfigurasi plugin yang telah disanitasi. Ini adalah ekspor hanya-baca; mengunduhnya tidak mengubah pengaturan sistem.

## Kerahasiaan dan batasan URL akses

Nilai sensitif disamarkan oleh lapisan sanitasi. Pengaturan plugin diperlakukan sebagai rahasia secara bawaan, kecuali secara eksplisit diklasifikasikan untuk ekspor yang aman. Meskipun demikian, nama pengaturan, nama plugin, dan metadata diagnostik lainnya dapat mengungkapkan detail implementasi, jadi distribusikan berkas hanya kepada personel dukungan yang tepercaya.

Pada instalasi multi-URL, backend memeriksa bahwa URL akses yang teratasi sesuai dengan host permintaan, alih-alih diam-diam mengekspor konfigurasi portal lain. Konfirmasikan alamat portal sebelum mengunduh.

## Pemecahan masalah

Jika ekspor tidak tersedia, pastikan akun memiliki hak administrator dan portal yang diminta teratasi ke URL aksesnya sendiri. Tinjau log server web dan aplikasi tanpa menyalin kredensial atau informasi pribadi ke dalam tiket dukungan.

Lihat [Alat Sistem](system-tools.md) dan [Pengaturan keamanan](../platform-settings/security-settings.md). Implementasi: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).