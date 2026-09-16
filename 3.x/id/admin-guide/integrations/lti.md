# LTI 1.3

**LTI** (Learning Tools Interoperability) adalah standar yang memungkinkan alat pembelajaran eksternal disematkan di dalam Chamilo. Versi 1.3 adalah versi terbaru dan paling aman dari standar tersebut.

Alat ini juga dapat diakses dari blok [Platform](../platform/README.md) pada dasbor administrasi, sebagai **Alat eksternal (LTI)**.

## Apa yang Diizinkan LTI

Dengan LTI, Anda dapat menyematkan alat eksternal di dalam kursus Chamilo. Contoh:

* Simulasi interaktif
* Alat penilaian khusus
* Alat penyusunan konten
* Laboratorium virtual
* Pustaka konten pihak ketiga

Alat eksternal muncul secara mulus di dalam antarmuka Chamilo.

## Mengonfigurasi Alat LTI

### Sebagai Administrator

1. Buka pengaturan LTI di panel administrasi
2. **Daftarkan alat eksternal** dengan menyediakan:
   * **Nama alat** — Nama yang deskriptif
   * **Login URL** — URL inisiasi login OIDC dari alat eksternal
   * **Redirect URL** — URL peluncuran yang dikembalikan alat setelah login
   * **Client ID** — Diberikan oleh vendor alat
   * **Public keyset URL (JWKS URL)** — Endpoint JWKS alat untuk pertukaran kunci keamanan
3. Konfigurasikan **grade passback** — Apakah alat dapat mengirim nilai kembali ke Chamilo
4. Simpan

### Sebagai Pengajar

Setelah alat LTI didaftarkan oleh administrator, pengajar dapat menambahkannya ke kursus mereka:

1. Di dalam kursus, cari opsi untuk menambahkan alat eksternal
2. Pilih dari alat LTI yang terdaftar
3. Alat muncul sebagai alat kursus di beranda

## Keamanan

LTI 1.3 menggunakan:

* **OAuth 2.0** untuk autentikasi
* **JSON Web Tokens (JWT)** untuk penandatanganan pesan
* **Pasangan kunci publik/privat** untuk verifikasi

Ini berarti kredensial tidak pernah dibagikan secara langsung antara Chamilo dan alat eksternal.

## Grade Passback

Alat LTI dapat mengirim nilai kembali ke Chamilo, yang dapat diintegrasikan ke dalam buku nilai kursus. Hal ini dikonfigurasi per alat saat pendaftaran.

## Tips

* **Verifikasi kompatibilitas alat** — Pastikan alat eksternal mendukung LTI 1.3 (bukan hanya versi yang lebih lama)
* **Uji di sandbox** — Uji integrasi LTI di kursus uji sebelum menggunakannya di produksi
* **Pantau kinerja** — Alat eksternal menambah ketergantungan jaringan. Pastikan alat tersebut responsif dan andal.