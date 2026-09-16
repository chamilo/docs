# Peran Pengguna

Chamilo menggunakan sistem izin berbasis peran. Setiap pengguna diberi peran yang menentukan apa yang dapat mereka lihat dan lakukan di platform.

## Peran Tingkat Platform

Peran-peran ini mengontrol akses ke fitur di seluruh platform:

| Role |  Description |
|------|------------|
| **Learner (Student)** | Peran bawaan. Dapat mendaftar ke kursus, mengakses konten pembelajaran, mengirim tugas, dan mengerjakan latihan. |
| **Teacher (Trainer)** | Dapat membuat dan mengelola kursus, menambahkan konten, menilai siswa, dan melihat laporan tingkat kursus. |
| **Sessions Administrator** | Dapat membuat dan mengelola sesi (yaitu paket kursus berbasis waktu), mendaftarkan pengguna ke sesi, dan menugaskan tutor. Tidak dapat mengakses pengaturan platform secara umum. |
| **Human Resources Manager (HRM)** | Dapat melihat data pelacakan dan pelaporan untuk pengguna yang ditugaskan. Digunakan untuk supervisor yang perlu memantau pelatihan karyawan tetapi tidak mengelola konten maupun platform. |
| **Portal Administrator** | Akses penuh ke semua fitur administrasi platform. Dapat mengelola pengguna, kursus, sesi, plugin, dan semua pengaturan. |
| **Global Administrator** | Sama seperti Portal Administrator tetapi dengan akses di semua URL akses dalam pengaturan multi-URL (yaitu multi-tenant) — atau, jika terdaftar pada URL non-root, dibatasi hanya pada cabang URL tersebut. Lihat [Administrator Subpohon](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | Peran khusus untuk pengunjung yang tidak masuk. Dapat mengakses kursus dan konten publik jika diaktifkan. |

## Peran Tingkat Kursus

Di dalam sebuah kursus, pengguna memiliki peran tertentu:

| Role | Description |
|------|-------------|
| **Student** | Peran kursus bawaan. Dapat mengakses konten, mengerjakan latihan, mengirim tugas. |
| **Course assistant** | Memiliki izin pengelolaan terbatas di dalam kursus. Dapat membantu mengelola konten dan memoderasi forum. |
| **Teacher** | Kendali penuh atas kursus: mengelola konten, alat, pengaturan, dan pendaftaran. |

## Peran Tingkat Sesi

Di dalam sebuah sesi, terdapat peran tambahan:

| Role | Description |
|------|-------------|
| **Session tutor** | Mengawasi semua kursus dalam suatu sesi. Dapat melihat pelacakan di semua kursus dalam sesi tersebut. |
| **Course tutor** | Mengajar kursus tertentu dalam suatu sesi. Dapat mengelola konten dan melacak peserta didik untuk kursus tersebut dalam sesi itu. |

Catatan: Peran ini disebut "coach" pada versi Chamilo sebelum 3.0. Mulai Chamilo 3.0, "coach" diganti dengan "tutor" di seluruh antarmuka dan dokumentasi platform — tutor adalah orang yang membantu peserta didik melalui suatu kursus, bukan pelatih pribadi. Nama pengaturan yang mendasari di `Configuration settings` masih mengandung "coach" demi kompatibilitas mundur (misalnya `add_users_by_coach`), tetapi labelnya kini berbunyi "tutor".

## Menetapkan Peran

Saat membuat atau mengedit akun pengguna di panel administrasi, Anda memilih peran tingkat platform mereka. Peran kursus dan sesi ditetapkan saat mendaftarkan pengguna ke kursus atau sesi.

## Hierarki Peran

Peran dengan hak istimewa lebih tinggi mewarisi kemampuan peran dengan hak istimewa lebih rendah:

* Seorang administrator dapat melakukan segala hal yang dapat dilakukan seorang teacher
* Seorang teacher dapat melakukan segala hal yang dapat dilakukan seorang student
* Peran tingkat sesi (tutor) memberikan kemampuan tambahan hanya di dalam sesi yang ditugaskan kepada mereka

## Tips

* **Gunakan prinsip hak istimewa minimum** — Tetapkan kepada pengguna peran minimum yang mereka butuhkan untuk menjalankan tugasnya
* **Gunakan Sessions Administrator untuk pengelolaan yang didelegasikan** — Jika Anda memiliki staf yang perlu mengelola sesi pelatihan tetapi tidak seluruh platform, berikan mereka peran Sessions Administrator alih-alih akses administrator penuh
* **Gunakan HRM untuk supervisor** — Human Resources Manager dapat memantau kemajuan pelatihan tanpa memiliki akses untuk mengubah kursus atau pengaturan platform
* **Pembuatan peran** — Chamilo 3.x memiliki struktur internal yang siap untuk pembuatan peran baru, tetapi fitur ini masih memerlukan lebih banyak pengujian untuk rilis luas. Fitur ini dapat diaktifkan melalui [Penyedia resmi Chamilo](https://chamilo.org/providers).