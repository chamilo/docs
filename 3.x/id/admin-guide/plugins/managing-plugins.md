# Mengelola Plugin

## Mengakses Pengelola Plugin

![Pengelola plugin yang menampilkan daftar plugin yang tersedia beserta sakelar aktivasi dan opsi konfigurasi](../../.gitbook/assets/admin-plugin-manager.png)

Dari panel administrasi, klik **Manage plugins** untuk melihat daftar plugin yang tersedia.

## Status Plugin

Setiap plugin memiliki salah satu dari dua status:

* **Active** — Plugin diaktifkan dan fiturnya tersedia di platform
* **Inactive** — Plugin terpasang tetapi dinonaktifkan

## Mengaktifkan Plugin

1. Temukan plugin dalam daftar
2. Klik **Install**, lalu **Enable** atau sakelar untuk mengaktifkannya
3. Konfigurasikan pengaturan plugin (jika berlaku, temukan tombol **Configure**)
4. Simpan
5. Jika direkomendasikan dalam README, aktifkan di **region** tertentu

Beberapa plugin menambahkan alat ke kursus, halaman baru ke platform, atau fungsionalitas tambahan pada fitur yang sudah ada.

## Mengonfigurasi Plugin

Banyak plugin memiliki opsi konfigurasi. Setelah mengaktifkan plugin:

1. Klik tombol **Configure** di samping plugin
2. Isi konfigurasi yang diperlukan (kunci API, URL, opsi, dan sebagainya)
3. Simpan

## Menonaktifkan Plugin

1. Temukan plugin dalam daftar
2. Klik **Disable** atau sakelar untuk menonaktifkannya
3. Fitur plugin segera dihapus dari platform, tetapi plugin tetap terpasang dan mempertahankan konfigurasinya hingga Anda **Uninstall**

Menonaktifkan plugin tidak menghapus datanya. Jika Anda mengaktifkannya kembali nanti, data tersebut masih tersedia.

## Tips

* **Hanya aktifkan yang Anda butuhkan** — Setiap plugin yang aktif menambah beban. Biarkan plugin yang tidak digunakan dalam keadaan dinonaktifkan.
* **Uji sebelum produksi** — Aktifkan plugin baru di lingkungan uji terlebih dahulu
* **Periksa kompatibilitas** — Setelah meningkatkan Chamilo, verifikasi bahwa semua plugin yang aktif masih berfungsi dengan benar