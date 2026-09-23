# Memahami Antarmuka

Chamilo 3.0 memiliki antarmuka yang bersih dan modern, dirancang agar navigasi tetap sederhana. Halaman ini menjelaskan setiap bagian antarmuka secara rinci.

## Bilah Atas

![Bilah atas dengan elemen beranotasi termasuk logo, kotak masuk, tiket dukungan, dan avatar pengguna](../../.gitbook/assets/top-bar-annotated.png)

Bilah atas selalu terlihat di bagian atas setiap halaman. Isinya meliputi:

* **Logo platform** — Klik untuk kembali ke halaman beranda kapan saja.
* **Ikon kotak masuk** <img src="../../.gitbook/assets/icons/mdi-inbox.svg" alt="Inbox" data-size="line"> — Menampilkan pesan Anda. Lencana merah menandakan pesan yang belum dibaca. Klik untuk membuka kotak masuk.
* **Ikon tiket dukungan** <img src="../../.gitbook/assets/icons/mdi-ticket-account.svg" alt="Support" data-size="line"> — Jika diaktifkan oleh administrator, ikon ini memberi akses ke sistem tiket dukungan.
* **Avatar Anda** — Gambar lingkaran di pojok kanan atas. Klik untuk membuka menu tarik-turun berisi tautan ke profil, pengaturan akun, dan keluar.

## Bilah Sisi

Bilah sisi di kiri adalah navigasi utama Anda. Bilah ini dapat dilipat agar area konten lebih luas. Klik panah sakelar di tepi kanannya untuk memperluas atau melipat. Chamilo mengingat preferensi Anda.

Bilah sisi berisi tautan berikut (beberapa mungkin tersembunyi tergantung konfigurasi platform):

![Panel navigasi bilah sisi dalam keadaan diperluas yang menampilkan semua item menu](../../.gitbook/assets/sidebar-expanded.png)

| Item menu | Ikon | Deskripsi |
|-----------|------|-------------|
| **Beranda** | <img src="../../.gitbook/assets/icons/mdi-home.svg" alt="Home" data-size="line"> | Kembali ke dasbor utama |
| **Kursus saya** | <img src="../../.gitbook/assets/icons/mdi-book-open-page-variant.svg" alt="Courses" data-size="line"> | Daftar semua kursus yang Anda ikuti |
| **Sesi saya** | <img src="../../.gitbook/assets/icons/mdi-google-classroom.svg" alt="Sessions" data-size="line"> | Daftar sesi pelatihan Anda (berlangsung, lalu, mendatang) |
| **Jelajahi kursus lainnya** | <img src="../../.gitbook/assets/icons/mdi-bookmark-multiple.svg" alt="Catalogue" data-size="line"> | Telusuri katalog kursus untuk menemukan kursus baru |
| **Agenda** | <img src="../../.gitbook/assets/icons/mdi-calendar-text.svg" alt="Agenda" data-size="line"> | Kalender pribadi dan kursus Anda |
| **Pelaporan** | <img src="../../.gitbook/assets/icons/mdi-chart-box.svg" alt="Reporting" data-size="line"> | Akses pelacakan peserta didik dan laporan kursus |
| **Jaringan sosial** | <img src="../../.gitbook/assets/icons/mdi-sitemap-outline.svg" alt="Social network" data-size="line"> | Terhubung dengan pengguna lain, kirim pesan, bergabung dengan grup |
| **Videoconference** | <img src="../../.gitbook/assets/icons/mdi-video.svg" alt="Video" data-size="line"> | Akses sesi video langsung (jika dikonfigurasi) |
| **Administration** | <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> | Administrasi platform (hanya terlihat oleh admin) |

Di bagian paling bawah bilah sisi, Anda akan menemukan opsi **Keluar** untuk keluar dengan cepat setelah selesai. Opsi ini juga tersedia dari menu tarik-turun ikon avatar di pojok kanan atas.
Jika platform dikelola melalui metode autentikasi eksternal, opsi keluar ini mungkin tidak tersedia.

## Area Konten Utama

Area tengah layar menampilkan konten halaman saat ini. Di bagian atas, Anda sering melihat **jejak breadcrumb** yang menunjukkan lokasi Anda di platform (contoh: Beranda > Rock music > Documents). Gunakan breadcrumb untuk kembali ke halaman induk.

## Beranda Kursus

Saat Anda masuk ke suatu kursus, Anda melihat **beranda kursus**. Hal ini dibahas secara rinci di bagian [Membuat Kursus Anda](../creating-your-course/), tetapi berikut ikhtisar singkatnya:

* **Judul kursus** — Ditampilkan secara menonjol di bagian atas
* **Pengantar kursus** — Deskripsi teks kaya opsional yang dapat Anda sunting
* **Kisi alat** — Kisi ikon yang mewakili alat kursus (Documents, Exercises, Forums, dll.)

Sebagai pengajar, Anda akan melihat kontrol tambahan:

* **Tampilan siswa** <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Student view" data-size="line"> — Alihkan ini untuk melihat kursus sebagaimana siswa melihatnya
* **Sunting pengantar** <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> — Sunting teks pengantar kursus
* **Tampilkan semua / Sembunyikan semua** — Ubah visibilitas semua alat bagi siswa dengan cepat
* **Urutkan** — Aktifkan seret-dan-lepas untuk menyusun ulang alat di beranda

## Warna ikon

Ini masih bersifat eksperimental dan belum sepenuhnya lengkap di Chamilo 3.0, tetapi kami mencoba menerapkan aturan berikut untuk semua tombol dan ikon aksi di antarmuka:

* **Hijau** untuk aksi pembuatan. Ini mencakup menambahkan, membuat, mengimpor, menilai, menyimpan, dan menyalin konten.
* **Biru** untuk aksi tampilan. Ini mencakup mengekspor, melihat, pratinjau dalam daftar atau tampilan detail, mencari, dan mengunduh.
* **Oranye** untuk aksi pengeditan. Ini mencakup mengedit, memindahkan, mengonfigurasi, mengaktifkan/menonaktifkan, menyembunyikan, dan menampilkan.
* **Merah** untuk aksi penghapusan/penghilangan. Ini mencakup menghapus, menghilangkan, membatalkan langganan.
* **Abu-abu** untuk aksi pembatalan. Hanya meninggalkan segala sesuatu dalam status quo.

## Desain Responsif

Chamilo 3.0 menyesuaikan diri dengan berbagai ukuran layar. Pada perangkat seluler atau jendela peramban yang sempit:

* Bilah sisi disembunyikan secara default dan dapat dibuka dengan mengetuk ikon menu
* Kartu kursus ditampilkan dalam satu kolom, bukan dalam kisi
* Tabel menjadi dapat digulir secara horizontal

Ini berarti Anda dan peserta didik dapat mengakses platform dari telepon, tablet, atau komputer, tetapi Anda mungkin merasakan antarmuka yang sedikit berbeda.