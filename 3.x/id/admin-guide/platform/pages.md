# Halaman

Halaman adalah alat bawaan Chamilo yang menyerupai CMS untuk blok konten yang membentuk area publik portal Anda — beranda, footer, menu navigasi, dan penempatan serupa — tanpa perlu menyentuh berkas templat.

## Mengakses Halaman

Dari panel administrasi, klik **Platform > Pages**.

## Cara Kerja Halaman

Setiap halaman memiliki:

* **Title** dan **content** teks kaya
* **Slug**, yang dihasilkan secara otomatis dari judul
* **Enabled** — apakah halaman saat ini terlihat
* **Position** — pengurutan seret-dan-lepas dalam kategorinya
* **Locale** — konten per bahasa: penempatan yang sama dapat menampung satu halaman per bahasa, dan situs akan kembali ke bahasa default platform jika tidak ada halaman untuk bahasa pengunjung
* **Category** — inilah yang menentukan *di mana* halaman dirender (misalnya `index`, `home`, `footer_public`, atau `menu_links`); Chamilo membuat kategori yang dibutuhkannya secara otomatis

Pada instalasi multi-URL (multi-portal), halaman juga dicakup per URL akses, sehingga setiap portal mengelola kontennya sendiri.

## Halaman Pengantar Pendaftaran

**Platform > Setting the registration page** adalah pintasan ke sistem Pages yang sama untuk satu penempatan tertentu: teks pengantar yang ditampilkan di atas formulir pendaftaran publik. Fitur ini terbatas untuk Portal Administrators. Mengkliknya akan:

* Membuka halaman pengantar yang sudah ada untuk diedit, jika sudah ada untuk URL akses dan bahasa Anda, atau
* Membuat penempatan secara langsung dan membawa Anda ke pembuatan kontennya

Apa pun yang Anda simpan di sini dirender sebagai kotak info tepat di atas formulir pendaftaran — tempat yang alami untuk instruksi, ketentuan khusus organisasi Anda, atau konteks yang sebaiknya dibaca calon pengguna sebelum mendaftar. Biarkan dinonaktifkan (atau jangan pernah membuatnya) untuk menampilkan formulir pendaftaran biasa tanpa teks pengantar.