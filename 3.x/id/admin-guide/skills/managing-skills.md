# Mengelola Keterampilan

Halaman ini membahas tiga entri dasbor yang digunakan untuk membangun katalog keterampilan platform: mengimpor keterampilan secara massal, mengelola definisi keterampilan itu sendiri, dan menetapkan setiap keterampilan ke suatu skala tingkat.

## Impor Keterampilan

**Skills > Skills import** memungkinkan Anda membuat hierarki keterampilan secara massal dari berkas CSV atau XML, alih-alih membuat keterampilan satu per satu. Setiap baris setidaknya memerlukan `id`, `parent_id` (untuk membangun pohon), dan `title`. Templat sampel tersedia sebagai dasar berkas Anda.

## Kelola Keterampilan

**Skills > Manage skills** adalah katalog keterampilan utama: membuat, mengedit, mengaktifkan/menonaktifkan, dan menghapus keterampilan. Setiap keterampilan memiliki judul, kode singkat, deskripsi, ikon, dan deskripsi kriteria opsional (apa yang perlu dilakukan pembelajar untuk meraihnya). Keterampilan dapat bersarang — suatu keterampilan dapat memiliki keterampilan anak — yang divisualisasikan oleh [Roda Keterampilan](skills-wheel.md).

## Kelola Tingkat Keterampilan

**Skills > Manage skills levels** adalah layar terpisah yang lebih kecil: menampilkan daftar keterampilan yang ada dan memungkinkan Anda menetapkan masing-masing ke **profil tingkat** — kumpulan tingkat bernama yang terurut (misalnya Perunggu/Perak/Emas) yang menjadi acuan pengukuran keterampilan. Singkatnya: gunakan **Manage skills** untuk mendefinisikan apa *itu* suatu keterampilan, dan **Manage skills levels** untuk mendefinisikan skala pengukurannya.

## Cara Keterampilan Diberikan

Suatu keterampilan diberikan kepada pengguna (dicatat sebagai keterampilan yang diterbitkan, beserta tanggal) melalui salah satu dari beberapa jalur:

* Secara otomatis, ketika pembelajar memenuhi ambang kategori buku nilai — dikonfigurasi pada halaman [Keterampilan dan Penilaian](skills-assessments.md)
* Secara otomatis, saat menyelesaikan kursus tertentu yang ditautkan ke keterampilan tersebut
* Secara manual, oleh pengajar (jika **Teachers can assign skills** diaktifkan) atau administrator