# Peran Pengguna

Chamilo menggunakan sistem izin berbasis peran. Setiap pengguna diberikan peran yang menentukan apa yang dapat mereka lihat dan lakukan di platform ini.

## Peran pada Tingkat Platform

Peran-peran ini mengontrol akses ke fungsionalitas di seluruh platform:

| Peran | Deskripsi |
|------|------------|
| **Peserta Didik (Mahasiswa)** | Peran standar. Dapat mendaftar ke kursus, mengakses konten pembelajaran, mengirimkan tugas, dan melakukan latihan. |
| **Pengajar (Instruktur)** | Dapat membuat dan mengelola kursus, menambahkan konten, menilai peserta didik, dan melihat laporan pada tingkat kursus. |
| **Administrator Sesi** | Dapat membuat dan mengelola sesi (yaitu, paket kursus berbasis waktu), mendaftarkan pengguna ke sesi, dan menugaskan tutor. Tidak memiliki akses ke pengaturan umum platform. |
| **Manajer Sumber Daya Manusia (SDM)** | Dapat melihat data pelacakan dan laporan untuk pengguna yang ditugaskan. Digunakan untuk pengawas yang perlu memantau pelatihan karyawan, tetapi tidak mengelola konten atau platform. |
| **Administrator Portal** | Akses penuh ke semua fungsionalitas administrasi platform. Dapat mengelola pengguna, kursus, sesi, plugin, dan semua pengaturan. |
| **Administrator Global** | Sama dengan Administrator Portal, tetapi dengan akses ke semua URL akses dalam konfigurasi multi-URL (yaitu, multi-tenant). |
| **Anonim** | Peran khusus untuk pengunjung yang tidak masuk. Dapat mengakses kursus dan konten publik, jika diaktifkan. |

## Peran pada Tingkat Kursus

Di dalam sebuah kursus, pengguna memiliki peran spesifik:

| Peran | Deskripsi |
|------|-------------|
| **Mahasiswa** | Peran standar kursus. Dapat mengakses konten, melakukan latihan, dan mengirimkan tugas. |
| **Asisten Kursus** | Memiliki izin pengelolaan terbatas di dalam kursus. Dapat membantu mengelola konten dan memoderasi forum. |
| **Pengajar** | Kontrol penuh atas kursus: mengelola konten, alat, pengaturan, dan pendaftaran. |

## Peran pada Tingkat Sesi

Di dalam sebuah sesi, terdapat peran tambahan:

| Peran | Deskripsi |
|------|-------------|
| **Tutor Sesi** | Mengawasi semua kursus di dalam sebuah sesi. Dapat melihat pelacakan di semua kursus dalam sesi tersebut. |
| **Tutor Kursus** | Mengajar kursus tertentu di dalam sebuah sesi. Dapat mengelola konten dan melacak peserta didik untuk kursus tersebut dalam sesi itu. |

Catatan: Istilah "coach" dan "tutor" memiliki makna yang sangat mirip dan biasanya tergantung pada organisasi. Kami menggunakan kedua istilah tersebut secara bergantian di Chamilo 2.0, tetapi sebagian besar waktu kami merujuk ke "tutor", yaitu seseorang yang akan membantu dalam pembelajaran kursus, bukan pelatih pribadi. Kami mungkin akan menggunakan "tutor" secara eksklusif di masa depan.

## Penugasan Peran

Saat membuat atau mengedit akun pengguna di panel administrasi, Anda memilih peran pada tingkat platform. Peran kursus dan sesi ditugaskan saat mendaftarkan pengguna ke kursus atau sesi.

## Hierarki Peran

Peran dengan hak istimewa yang lebih tinggi mewarisi kemampuan dari peran dengan hak istimewa yang lebih rendah:

* Seorang administrator dapat melakukan semua yang dapat dilakukan oleh seorang pengajar
* Seorang pengajar dapat melakukan semua yang dapat dilakukan oleh seorang mahasiswa
* Peran pada tingkat sesi (tutor) memberikan kemampuan tambahan hanya di dalam sesi yang ditugaskan

## Tips

* **Gunakan prinsip hak istimewa minimum** — Berikan pengguna peran minimal yang diperlukan untuk melakukan tugas mereka
* **Gunakan Administrator Sesi untuk pengelolaan yang didelegasikan** — Jika Anda memiliki staf yang perlu mengelola sesi pelatihan, tetapi tidak seluruh platform, berikan mereka peran Administrator Sesi daripada akses penuh administrator
* **Gunakan SDM untuk pengawas** — Manajer Sumber Daya Manusia dapat memantau kemajuan pelatihan tanpa memiliki akses untuk mengubah kursus atau pengaturan platform
* **Pembuatan peran** — Chamilo 2.x memiliki struktur internal yang siap untuk pembuatan peran baru, tetapi fitur ini masih memerlukan lebih banyak pengujian untuk peluncuran yang lebih luas. Fitur ini dapat diaktifkan melalui [Penyedia Resmi Chamilo](https://chamilo.org/providers).