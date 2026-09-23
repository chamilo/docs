# Klien IMS/LTI

Klien IMS/LTI <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="Klien IMS/LTI" data-size="line"> memungkinkan Anda meluncurkan alat eksternal atau penyedia konten dari dalam kursus Anda menggunakan standar LTI (versi 1.1 dan 1.3) — misalnya, buku teks interaktif dari penerbit, alat simulasi khusus, atau platform lain yang mendukung LTI. Chamilo bertindak sebagai platform peluncur; layanan eksternal adalah "alat".

## Mengakses Alat

Setelah diaktifkan, tombol **Konfigurasi alat eksternal** muncul di **Pengaturan** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Pengaturan" data-size="line"> kursus Anda. Dari sana Anda dapat:

* **Tambahkan alat eksternal baru** — Daftarkan sendiri: nama, URL peluncuran, versi LTI, dan kredensial yang diberikan layanan eksternal kepada Anda (ID klien/kunci untuk LTI 1.3, atau kunci konsumen dan rahasia untuk LTI 1.1)
* **Tambahkan alat global yang sudah ada** — Jika administrator Anda sudah mendaftarkan alat di seluruh platform, tambahkan ke kursus Anda alih-alih membuat koneksi sendiri

Setelah ditambahkan, alat tersebut muncul sebagai alat/pintasan biasa di beranda kursus Anda.

## Apa yang Dapat Anda Konfigurasi

Untuk alat yang Anda daftarkan sendiri: apakah dibuka dalam iframe atau jendela baru, apakah nama, email, dan foto peserta didik dibagikan dengan layanan eksternal, parameter peluncuran kustom, dan (untuk LTI 1.3) dukungan Deep Linking. Jika alat mendukung Assignment and Grades Service, Anda juga dapat membuat kolom buku nilai tertaut sehingga skor yang dilaporkan kembali masuk ke buku nilai Chamilo Anda.

Untuk alat yang ditambahkan dari definisi "global" di seluruh platform, Anda hanya dapat menyesuaikan opsi presentasi dan privasi tingkat kursus ini — kredensial koneksi itu sendiri milik pihak yang mendaftarkan alat dasar (biasanya administrator Anda).

## Tips

* **Dapatkan kredensial dari penyedia alat terlebih dahulu** — Anda memerlukan URL peluncuran dan detail klien/kunci LTI 1.3 atau kunci konsumen dan rahasia LTI 1.1 sebelum dapat mendaftarkan alat baru
* **Berhati-hatilah tentang apa yang Anda bagikan** — Aktifkan berbagi nama, email, atau foto peserta didik dengan layanan eksternal hanya jika alat tersebut benar-benar membutuhkannya
* **Tanyakan kepada administrator tentang alat global** — Jika alat eksternal yang sama digunakan di banyak kursus, pendaftaran di seluruh platform menghindari setiap pengajar mengonfigurasi koneksi mereka sendiri secara terpisah