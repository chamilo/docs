# Profil Pengguna

Chamilo memungkinkan Anda mendefinisikan bidang profil kustom (bidang tambahan) untuk menangkap informasi tambahan tentang pengguna di luar nama, email, dan peran standar.

## Bidang Profil Tambahan

![Daftar bidang profil tambahan yang menampilkan bidang kustom beserta nama, tipe, dan pengaturan visibilitas](/.gitbook/assets/admin-extra-fields-list.png)

Bidang tambahan memungkinkan Anda menyimpan metadata yang spesifik untuk organisasi Anda, seperti:

* ID Karyawan
* Departemen
* Jabatan
* Lokasi/kantor
* Nomor telepon
* Pengidentifikasi kustom

## Membuat Bidang Tambahan

1. Dari panel administrasi, buka **Extra fields** atau **Profile fields**
2. Klik **Add**
3. Konfigurasikan bidang:
   * **Name** — Judul bidang yang ditampilkan kepada pengguna
   * **Description** — Deskripsi opsional
   * **Helper text** — Ditampilkan di bawah bidang pada setiap formulir yang menyertakannya
   * **Field type** — Teks, dropdown, tanggal, kotak centang, dll.
   * **Field label** — Nama internal bidang, untuk integrasi plugin 
   * **Possible values** — Jika bidang berupa pemilih di antara nilai-nilai tersebut 
   * **Default value** — Nilai default opsional
   * **Visible to self** — Apakah bidang terlihat pada profil pengguna oleh pengguna itu sendiri
   * **Visible to others** — Apakah bidang terlihat bagi pengguna lain di platform
   * **Can change** — Apakah pengguna dapat mengubah bidang miliknya sendiri (atau hanya admin yang dapat)
   * **Filter** — Jika ini adalah bidang tipe pemilih, apakah akan disertakan sebagai filter di halaman administratif (misalnya untuk mendaftarkan pengguna ke kursus atau sesi)
   * **Order** — Jika Anda ingin mengatur urutan tampilan bidang, Anda harus memberikan urutan numerik pada setiap bidang
   * **Remove on anonymization** — Penting untuk aturan & undang-undang privasi: Jika pengguna dianonimkan tetapi tidak dihapus, apakah bidang ini harus dianggap sebagai potensi penyimpan data yang dapat mengidentifikasi individu? 
4. Simpan

## Tipe Bidang

Mesin bidang tambahan mendukung beragam tipe input. Yang umum meliputi:

| Type | Description |
|------|-------------|
| **Text** | Input teks satu baris |
| **Textarea** | Input teks multi-baris |
| **Radio** | Grup radio pilihan tunggal |
| **Dropdown / Dropdown multiple** | Daftar opsi yang telah ditentukan (pilih tunggal atau ganda) |
| **Double select** | Dua dropdown yang saling bergantung (misalnya, negara → kota) |
| **Checkbox** | Tombol sakelar ya/tidak |
| **Date / Date and time** | Pemilih tanggal atau tanggal+waktu |
| **Integer** | Input numerik |
| **Tag** | Beberapa nilai tag bentuk bebas |
| **File** | Bidang unggah berkas |
| **Video URL** | URL yang mengarah ke video |
| **Mobile phone number** | Bidang nomor telepon terformat |
| **Timezone** | Pemilih zona waktu |
| **Social profile** | Tautan ke profil jejaring sosial |
| **Divider** | Pemisah visual di dalam formulir (tanpa nilai) |

Kumpulan tipe yang dapat digunakan bergantung pada versi Chamilo; dropdown tipe bidang di halaman admin **Extra fields** adalah sumber kebenaran.

## Menggunakan Bidang Tambahan

Bidang tambahan muncul:

* Pada formulir pembuatan pengguna (jika terlihat bagi diri sendiri) dan pengeditan
* Pada halaman profil pengguna (jika terlihat bagi diri sendiri)
* Dalam impor pengguna (Anda dapat menyertakan nilai bidang tambahan dalam impor CSV)
* Dalam ekspor dan laporan (filter atau kelompokkan berdasarkan nilai bidang tambahan)

## Tips

* **Rencanakan sebelum membuat** — Tentukan informasi yang Anda butuhkan sebelum membuat bidang, karena mengubah tipe bidang setelah data dimasukkan dapat bermasalah
* **Gunakan dropdown untuk konsistensi** — Ketika suatu bidang memiliki kumpulan nilai yang diketahui, gunakan dropdown alih-alih teks bebas untuk memastikan konsistensi data
* **Gunakan untuk pelaporan** — Bidang tambahan berguna untuk memfilter laporan (misalnya, "tampilkan semua pengguna di Departemen X yang menyelesaikan Pelatihan Y")