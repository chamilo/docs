# LTI 1.3

**LTI** (Learning Tools Interoperability) adalah standar yang memungkinkan alat pembelajaran eksternal untuk disematkan di dalam Chamilo. Versi 1.3 adalah versi terbaru dan paling aman dari standar ini.

## Apa yang Diizinkan oleh LTI

Dengan LTI, Anda dapat menyematkan alat eksternal di dalam kursus Chamilo. Contohnya:

* Simulasi interaktif
* Alat penilaian khusus
* Alat pembuatan konten
* Laboratorium virtual
* Perpustakaan konten pihak ketiga

Alat eksternal tersebut tampil secara mulus di dalam antarmuka Chamilo.

## Mengonfigurasi Alat LTI

### Sebagai Administrator

1. Navigasikan ke pengaturan LTI di panel administrasi
2. **Daftarkan alat eksternal** dengan menyediakan:
   * **Nama alat** — Nama yang deskriptif
   * **URL Login** — URL inisiasi login OIDC dari alat eksternal
   * **URL Pengalihan** — URL peluncuran yang dikembalikan alat setelah login
   * **Client ID** — Disediakan oleh vendor alat
   * **URL Kunci Publik (JWKS URL)** — Titik akhir JWKS alat untuk pertukaran kunci keamanan
3. Konfigurasikan **pengiriman nilai kembali** — Apakah alat dapat mengirimkan nilai kembali ke Chamilo
4. Simpan

### Sebagai Pengajar

Setelah alat LTI didaftarkan oleh administrator, pengajar dapat menambahkannya ke kursus mereka:

1. Di dalam kursus, cari opsi untuk menambahkan alat eksternal
2. Pilih dari alat LTI yang telah terdaftar
3. Alat tersebut akan muncul sebagai alat kursus di halaman utama

## Keamanan

LTI 1.3 menggunakan:

* **OAuth 2.0** untuk otentikasi
* **JSON Web Tokens (JWT)** untuk penandatanganan pesan
* **Pasangan kunci publik/privat** untuk verifikasi

Ini berarti kredensial tidak pernah dibagikan secara langsung antara Chamilo dan alat eksternal.

## Pengiriman Nilai Kembali

Alat LTI dapat mengirimkan nilai kembali ke Chamilo, yang dapat diintegrasikan ke dalam buku nilai kursus. Ini dikonfigurasi per alat selama pendaftaran.

## Tips

* **Verifikasi kompatibilitas alat** — Pastikan alat eksternal mendukung LTI 1.3 (bukan hanya versi lama)
* **Uji di sandbox** — Uji integrasi LTI di kursus percobaan sebelum menggunakannya di lingkungan produksi
* **Pantau kinerja** — Alat eksternal menambahkan ketergantungan jaringan. Pastikan alat tersebut responsif dan dapat diandalkan.