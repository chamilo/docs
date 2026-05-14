# Memahami Antarmuka

Chamilo 2.0 memiliki antarmuka yang bersih dan modern yang dirancang untuk menjaga navigasi tetap sederhana. Halaman ini menjelaskan setiap bagian antarmuka secara rinci.

## Bilah Atas

![Bilah atas dengan elemen-elemen yang diberi anotasi termasuk logo, kotak masuk, tiket dukungan, dan avatar pengguna](/.gitbook/assets/top-bar-annotated.png)

Bilah atas selalu terlihat di bagian atas setiap halaman. Bilah ini berisi:

* **Logo platform** — Klik untuk kembali ke halaman beranda kapan saja.
* **Ikon kotak masuk** <img src="/.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Menampilkan pesan Anda. Lencana merah menunjukkan pesan yang belum dibaca. Klik untuk membuka kotak masuk Anda.
* **Ikon tiket dukungan** <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Jika diaktifkan oleh administrator Anda, ini memberikan akses ke sistem tiket dukungan.
* **Avatar Anda** — Gambar lingkaran di sudut kanan atas. Klik untuk membuka menu dropdown dengan tautan ke profil, pengaturan akun, dan keluar.

## Bilah Sisi

Bilah sisi di sebelah kiri adalah navigasi utama Anda. Bilah ini dapat dilipat untuk memberikan lebih banyak ruang pada area konten. Klik panah toggle di tepi kanannya untuk memperluas atau melipatnya. Chamilo mengingat preferensi Anda.

Bilah sisi berisi tautan-tautan berikut (beberapa mungkin tersembunyi tergantung pada konfigurasi platform Anda):

![Panel navigasi bilah sisi dalam keadaan diperluas yang menampilkan semua item menu](/.gitbook/assets/sidebar-expanded.png)

| Item menu | Ikon | Deskripsi |
|-----------|------|-------------|
| **Beranda** | <img src="/.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Kembali ke dasbor utama |
| **Kursus saya** | <img src="/.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Daftar semua kursus yang Anda ikuti |
| **Sesi saya** | <img src="/.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Daftar sesi pelatihan Anda (sedang berlangsung, masa lalu, mendatang) |
| **Jelajahi kursus lainnya** | <img src="/.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Jelajahi katalog kursus untuk menemukan kursus baru |
| **Agenda** | <img src="/.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Kalender pribadi dan kursus Anda |
| **Pelaporan** | <img src="/.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Akses pelacakan pembelajar dan laporan kursus |
| **Jaringan sosial** | <img src="/.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Terhubung dengan pengguna lain, kirim pesan, bergabung dengan grup |
| **Videokonferensi** | <img src="/.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Akses sesi video langsung (jika dikonfigurasi) |
| **Administrasi** | <img src="/.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Administrasi platform (hanya terlihat oleh admin) |

Di bagian paling bawah bilah sisi, Anda akan menemukan opsi **Keluar** untuk keluar dengan cepat ketika selesai. Opsi ini juga tersedia dari menu dropdown ikon avatar Anda di sudut kanan atas.
Jika platform dikelola melalui metode autentikasi eksternal, opsi keluar ini mungkin tidak tersedia.

## Area Konten Utama

Area tengah layar menampilkan konten halaman saat ini. Di bagian atas, Anda sering melihat **jejak roti** yang menunjukkan lokasi saat ini Anda di platform (misalnya: Beranda > Musik Rock > Dokumen). Gunakan jejak roti untuk navigasi kembali ke halaman induk.

## Beranda Kursus

Ketika Anda memasuki kursus, Anda melihat **beranda kursus**. Ini dibahas secara rinci di bagian [Membuat Kursus Anda](../creating-your-course/), tetapi berikut adalah gambaran singkat:

* **Judul kursus** — Ditampilkan secara menonjol di bagian atas
* **Pengenalan kursus** — Deskripsi teks kaya opsional yang dapat Anda edit
* **Grid alat** — Grid ikon yang mewakili alat kursus (Dokumen, Latihan, Forum, dll.)

Sebagai pengajar, Anda akan melihat kontrol tambahan:

* **Tampilan siswa** <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Toggle ini untuk melihat kursus seperti yang dilihat oleh siswa
* **Edit pengenalan** <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Edit teks pengenalan kursus
* **Tampilkan semua / Sembunyikan semua** — Ubah visibilitas semua alat untuk siswa dengan cepat
* **Urutkan** — Aktifkan drag-and-drop untuk mengurutkan ulang alat di beranda

---
## Warna Ikon

Ini masih bersifat eksperimental dan belum sepenuhnya lengkap di Chamilo 2.0, tetapi kami mencoba menggunakan aturan berikut untuk semua tombol dan ikon aksi di antarmuka:

* **Hijau** untuk aksi pembuatan. Ini mencakup penambahan, pembuatan, impor, penilaian, penyimpanan, dan penyalinan konten.
* **Biru** untuk aksi tampilan. Ini mencakup ekspor, tampilan, pratinjau di daftar atau tampilan detail, pencarian, dan pengunduhan.
* **Oranye** untuk aksi pengeditan. Ini mencakup pengeditan, pemindahan, konfigurasi, pengaktifan/penonaktifan, penyembunyian, dan penampilan.
* **Merah** untuk aksi penghapusan/penghilangan. Ini mencakup penghapusan, penghilangan, dan berhenti berlangganan.
* **Abu-abu** untuk aksi pembatalan. Hanya mempertahankan keadaan semula.

## Desain Responsif

Chamilo 2.0 menyesuaikan diri dengan berbagai ukuran layar. Pada perangkat seluler atau jendela browser sempit:

* Sidebar disembunyikan secara default dan dapat dibuka dengan mengetuk ikon menu
* Kartu kursus ditampilkan dalam satu kolom alih-alih kisi
* Tabel menjadi dapat digulir secara horizontal

Ini berarti Anda dan pelajar Anda dapat mengakses platform dari ponsel, tablet, atau komputer, tetapi Anda mungkin mengalami antarmuka sedikit berbeda.