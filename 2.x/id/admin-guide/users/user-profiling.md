# Profil Pengguna

Chamilo memungkinkan Anda untuk menentukan bidang profil kustom (bidang tambahan) guna mengumpulkan informasi tambahan tentang pengguna di luar nama, email, dan peran standar.

## Bidang Profil Tambahan

![Daftar bidang profil tambahan yang menampilkan bidang kustom dengan nama, jenis, dan pengaturan visibilitas](/.gitbook/assets/admin-extra-fields-list.png)

Bidang tambahan memungkinkan Anda menyimpan metadata khusus untuk organisasi Anda, seperti:

* ID Karyawan
* Departemen
* Jabatan
* Lokasi/Kantor
* Nomor Telepon
* Pengenal Kustom

## Membuat Bidang Tambahan

1. Dari panel administrasi, navigasikan ke **Bidang Tambahan** atau **Bidang Profil**
2. Klik **Tambah**
3. Konfigurasikan bidang:
   * **Nama** — Judul bidang yang ditampilkan kepada pengguna
   * **Deskripsi** — Deskripsi opsional
   * **Teks Bantuan** — Untuk ditampilkan di bawah bidang pada formulir yang menyertakannya
   * **Jenis Bidang** — Teks, dropdown, tanggal, kotak centang, dll.
   * **Label Bidang** — Nama internal bidang, untuk integrasi plugin
   * **Nilai yang Mungkin** — Jika bidang merupakan pemilih di antara nilai-nilai tersebut
   * **Nilai Default** — Nilai default opsional
   * **Terlihat oleh Diri Sendiri** — Apakah bidang terlihat di profil pengguna oleh pengguna itu sendiri
   * **Terlihat oleh Orang Lain** — Apakah bidang terlihat oleh pengguna lain di platform
   * **Dapat Diubah** — Apakah pengguna dapat mengubah bidangnya sendiri (atau hanya admin yang bisa)
   * **Filter** — Jika ini adalah bidang tipe pemilih, apakah akan menyertakannya sebagai filter di halaman administrasi (misalnya untuk mendaftarkan pengguna ke kursus atau sesi)
   * **Urutan** — Jika Anda ingin mengatur urutan tampilan bidang, Anda harus memberikan urutan numerik untuk setiap bidang
   * **Hapus saat Anonimisasi** — Penting untuk aturan & hukum privasi: Jika pengguna dianonimkan tetapi tidak dihapus, apakah bidang ini dianggap sebagai pemegang potensial data yang dapat mengidentifikasi pribadi?
4. Simpan

## Jenis Bidang

Mesin bidang tambahan mendukung berbagai jenis input. Jenis yang umum meliputi:

| Jenis | Deskripsi |
|------|-------------|
| **Teks** | Input teks satu baris |
| **Textarea** | Input teks beberapa baris |
| **Radio** | Grup radio pilihan tunggal |
| **Dropdown / Dropdown Multiple** | Daftar opsi yang telah ditentukan sebelumnya (pilihan tunggal atau multi-pilihan) |
| **Double Select** | Dua dropdown yang saling bergantung (misalnya, negara → kota) |
| **Checkbox** | Tombol ya/tidak |
| **Tanggal / Tanggal dan Waktu** | Pemilih tanggal atau tanggal+waktu |
| **Integer** | Input numerik |
| **Tag** | Nilai tag bebas bentuk множественный |
| **File** | Bidang unggah file |
| **URL Video** | URL yang mengarah ke video |
| **Nomor Telepon Seluler** | Bidang nomor telepon yang diformat |
| **Zona Waktu** | Pemilih zona waktu |
| **Profil Sosial** | Tautan ke profil jejaring sosial |
| **Pemisah** | Pemisah visual di dalam formulir (tanpa nilai) |

Kumpulan jenis yang dapat digunakan tergantung pada versi Chamilo; dropdown jenis bidang di halaman admin **Bidang Tambahan** adalah sumber kebenaran.

## Menggunakan Bidang Tambahan

Bidang tambahan muncul:

* Dalam pembuatan pengguna (jika terlihat oleh diri sendiri) dan formulir pengeditan
* Di halaman profil pengguna (jika terlihat oleh diri sendiri)
* Dalam impor pengguna (Anda dapat menyertakan nilai bidang tambahan dalam impor CSV)
* Dalam ekspor dan laporan (filter atau kelompokkan berdasarkan nilai bidang tambahan)

## Tips

* **Rencanakan sebelum membuat** — Tentukan informasi apa yang Anda butuhkan sebelum membuat bidang, karena mengubah jenis bidang setelah data dimasukkan dapat menjadi masalah
* **Gunakan dropdown untuk konsistensi** — Ketika bidang memiliki kumpulan nilai yang diketahui, gunakan dropdown alih-alih teks bebas untuk memastikan konsistensi data
* **Gunakan untuk pelaporan** — Bidang tambahan berguna untuk memfilter laporan (misalnya, "tampilkan semua pengguna di Departemen X yang menyelesaikan Pelatihan Y")