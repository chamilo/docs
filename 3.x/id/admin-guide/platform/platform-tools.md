# Alat Platform

Halaman ini mencakup item-item yang tersisa dan lebih kecil dalam blok manajemen Platform.

## Extra Fields

**Platform > Extra fields** adalah pemilih tipe, bukan daftar field itu sendiri — menampilkan setiap tipe objek yang mendukung field kustom, dan mengklik salah satunya membawa Anda ke editor field milik tipe tersebut. Tipe yang tersedia meliputi: user, course, session, question, learning path (serta learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event, dan portfolio (ditambah scheduled announcements, jika fitur tersebut diaktifkan).

Untuk kasus yang paling umum digunakan — field profil pengguna kustom — lihat [User Profiling](../users/user-profiling.md), yang membahas fitur dasar yang sama dari sisi manajemen pengguna.

## Mail Templates

**Platform > Mail templates** memungkinkan Anda menimpa susunan kata e-mail sistem tertentu (konfirmasi registrasi, notifikasi langganan, dan sejenisnya) tanpa menyentuh file server. Setiap templat memiliki judul, **type** yang sesuai dengan e-mail bawaan spesifik yang ditimpanya, isi templat itu sendiri (teks biasa/Twig, bukan editor kaya), dan bendera "set as default" — hanya satu templat per tipe yang dapat menjadi default aktif. Templat bersifat scoped per access URL; tidak ada field per bahasa terpisah, sehingga penanganan bahasa untuk e-mail ini mengikuti apa pun yang sudah dilakukan kode di sekitarnya.

Templat dirender melalui lingkungan Twig **sandboxed** demi keamanan: hanya seperangkat kecil tag dan filter yang diizinkan, dan satu-satunya data yang tersedia adalah objek `User` penerima, dirujuk sebagai `user.getEmail()`, `user.getFirstname()`, dan getter serupa (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Apa pun di luar allowlist tersebut tidak menghasilkan error yang keras — secara diam-diam dirender kosong, yang kemudian kembali ke templat bawaan asli. Jaga templat kustom Anda tetap sederhana dan uji (menggunakan pemicu registrasi atau notifikasi nyata) setelah mengedit.

## Contact Form Categories

**Platform > Contact form categories** mengelola dropdown yang ditampilkan pada formulir publik **Contact us** portal Anda. Setiap kategori hanyalah judul dan alamat e-mail tujuan — kategori mana pun yang dipilih pengunjung menentukan kotak masuk mana pesan mereka diarahkan. Gunakan ini untuk mengarahkan topik berbeda (dukungan, penjualan, penerimaan) ke tim yang berbeda tanpa membangun formulir terpisah.

## Pintasan Kategori Pengaturan

Beberapa item blok hanyalah tautan langsung ke kategori tertentu dari [Platform Settings](../platform-settings/README.md), bukan alat terpisah:

* **Plugins** dan **System templates** membuka Configuration Settings yang sudah difilter ke kategori tersebut
* **Regions** melakukan hal yang sama, untuk pengaturan region platform

## Item yang Kadang Terlihat

Sejumlah item hanya muncul ketika pengaturan atau plugin yang relevan aktif, sehingga Anda mungkin tidak melihatnya pada instalasi Anda:

* **Terms and Conditions** — muncul ketika **Allow terms and conditions** diaktifkan, untuk mengelola teks yang harus diterima pengguna
* **Notifications** — muncul ketika fitur event notifikasi platform diaktifkan
* **CMS**, **Dictionary**, **Justification** — masing-masing terikat pada plugin opsionalnya sendiri yang terpasang dan diaktifkan