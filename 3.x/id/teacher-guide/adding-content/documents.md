# Dokumen

Alat dokumen adalah repositori berkas kursus Anda. Anda dapat mengunggah berkas, membuat dokumen dalam format HTML, mengatur konten ke dalam folder, dan memberikan akses kepada peserta didik ke semua materi yang mereka butuhkan.

## Mengakses Alat Dokumen

Buka alat **Dokumen** <img src="../../.gitbook/assets/icons/mdi-bookshelf.svg" alt="Dokumen" data-size="line"> dari beranda kursus. Anda akan melihat peramban berkas yang menampilkan folder akar pustaka dokumen kursus Anda.

![Peramban berkas dokumen yang menampilkan folder dan berkas beserta ikon tindakan](../../.gitbook/assets/documents-file-browser.png)

## Mengunggah Berkas

1. Klik tombol **Unggah** <img src="../../.gitbook/assets/icons/mdi-upload.svg" alt="Unggah" data-size="line">
2. Pilih satu atau beberapa berkas dari komputer Anda (Anda dapat menyeret dan melepaskan berkas ke area unggah)
3. Berkas diunggah dan muncul di folder saat ini

Chamilo mendukung sebagian besar jenis berkas umum: PDF, dokumen perkantoran (.docx, .odt), presentasi (.pptx, .odp), lembar kerja (.xlsx, .ods), gambar (PNG, JPG, SVG, GIF), berkas audio, berkas video (termasuk WEBM), berkas HTML, dan lainnya.

Beberapa format mungkin dilarang oleh administrator portal melalui pengaturan penyaringan daftar putih/daftar hitam di bagian keamanan administrasi.

Agar lebih mudah dibaca oleh peserta didik, kami merekomendasikan mengunggah berkas yang dapat dilihat atau dibuka oleh peramban tanpa alat tambahan. Hal ini membuat kursus Anda lebih portabel dan, dengan demikian, lebih mudah diakses dari perangkat seluler serta lebih mudah dibaca bagi orang dengan kemampuan khusus.

## Membuat Konten

Selain mengunggah berkas, Anda dapat membuat konten langsung di Chamilo:

### Halaman Web

1. Klik **Dokumen baru**
2. Gunakan editor teks kaya untuk menulis konten Anda dengan pemformatan, gambar, tabel, dan tautan
3. Masukkan **judul** untuk halaman tersebut
4. Simpan

Editor teks kaya (TinyMCE) menyediakan fitur menyerupai pengolah kata, termasuk:

* Pemformatan teks (tebal, miring, heading, daftar)
* Tabel
* Gambar (unggah atau tautkan ke gambar yang sudah ada)
* Video dan audio tertanam
* Tautan ke sumber daya lain
* Penyuntingan sumber HTML untuk pengguna tingkat lanjut

### Pembuatan media AI

Ketika pembantu AI diaktifkan di platform, Anda dapat meminta AI untuk menghasilkan **gambar** atau **video pendek** guna mengilustrasikan sebuah paragraf dalam dokumen yang sedang Anda sunting. Pilih sebuah paragraf, buka dialog **Generate AI media**, dan AI akan menghasilkan item media yang dapat Anda tinjau dan sisipkan. Dialog tersebut menghormati izin tingkat kursus dan hanya muncul di kursus yang mengizinkan pembuatan media AI.

### Perekaman Audio

Jika peramban Anda mendukungnya, Anda dapat merekam audio langsung di dalam alat dokumen — berguna untuk membuat instruksi audio atau konten pembelajaran bahasa. Hal ini memerlukan konfigurasi HTTPS untuk Chamilo, karena perekaman audio menggunakan teknologi yang hanya diizinkan peramban jika koneksi aman.

## Mengatur dengan Folder

Jaga agar pustaka dokumen Anda tetap teratur menggunakan folder:

1. Klik **Folder baru** <img src="../../.gitbook/assets/icons/mdi-folder-plus.svg" alt="Folder baru" data-size="line">
2. Masukkan nama folder
3. Simpan

Anda dapat membuat folder bersarang untuk membangun hierarki konten yang logis (misalnya, `Module 1 > Week 1 > Readings`).

### Memindahkan Berkas

* Temukan berkas Anda dalam daftar
* Klik **Pindahkan** <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Pindahkan" data-size="line">
* Pilih folder tujuan
* Konfirmasi

## Mengelola Dokumen

Untuk setiap berkas atau folder, Anda dapat:

| Tindakan | Ikon | Deskripsi |
|--------|------|-------------|
| **Sunting** | <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="Sunting" data-size="line"> | Ganti nama berkas atau sunting kontennya (untuk halaman web) |
| **Hapus** | <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="Hapus" data-size="line"> | Hapus berkas atau folder |
| **Unduh** | <img src="../../.gitbook/assets/icons/mdi-download-box.svg" alt="Unduh" data-size="line"> | Unduh berkas ke komputer Anda |
| **Visibilitas** | <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="Visibilitas" data-size="line"> | Sembunyikan atau tampilkan berkas kepada peserta didik |
| **Ganti** | <img src="../../.gitbook/assets/icons/mdi-file-replace.svg" alt="Ganti" data-size="line"> | Ganti berkas dengan versi yang diperbarui |
| **Pindahkan** | <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="Pindahkan" data-size="line"> | Pindahkan ke folder lain |

Mengganti berkas adalah fitur penting ketika Anda menggunakan dokumen untuk membangun jalur pembelajaran, karena mengganti dokumen memungkinkan dokumen diperbarui tanpa peserta didik kehilangan kemajuan yang tersimpan untuk dokumen tersebut.

### Tindakan Massal

Pilih beberapa berkas menggunakan kotak centang, lalu gunakan bilah alat untuk menghapus atau mengunduh semua item yang dipilih sekaligus.

## Integrasi OnlyOffice

Jika administrator Anda telah mengonfigurasi plugin **OnlyOffice**, Anda dapat mengedit berkas Word, Excel, dan PowerPoint (atau LibreOffice) langsung di peramban tanpa mengunduhnya. Cari opsi **Edit with OnlyOffice** <img src="../../.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> saat melihat berkas yang didukung.

Dokumen disimpan di Chamilo; OnlyOffice hanya digunakan untuk **melihat** atau mengedit dokumen di peramban, tanpa memerlukan alat tambahan apa pun.

## Berkas Cloud

Jika Anda menggunakan penyimpanan cloud (Azure Blob, AWS S3, atau Google Cloud) untuk berkas Anda, berkas tersebut disimpan di cloud tetapi Anda dapat menautkannya dari sini. Hal ini transparan bagi Anda dan peserta didik — alat dokumen bekerja dengan cara yang sama terlepas dari backend penyimpanan.

## Tips

* **Organisir sejak awal** — Buat struktur folder Anda sebelum mengunggah konten agar Anda tidak perlu menata ulang nanti. Jika Anda telah membuat kursus lain dengan struktur yang tepat, Anda dapat menggunakan kursus tersebut sebagai templat di kemudian hari
* **Gunakan nama berkas yang deskriptif** — Bantu peserta didik menemukan apa yang mereka butuhkan dengan nama yang jelas dan bermakna
* **Sembunyikan pekerjaan yang masih dalam proses** — Gunakan sakelar visibilitas untuk menyembunyikan dokumen yang masih Anda siapkan
* **Tautkan dari learning path** — Rujuk dokumen di dalam learning path Anda untuk membuat rangkaian pembelajaran terpandu
* **Periksa kuota disk** — Jika kursus Anda memiliki batas penyimpanan, hapus berkas yang sudah usang untuk mengosongkan ruang