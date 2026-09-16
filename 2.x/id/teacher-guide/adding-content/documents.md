# Dokumen

Alat dokumen adalah repositori berkas kursus Anda. Anda dapat mengunggah berkas, membuat dokumen dalam format HTML, mengatur konten ke dalam folder, dan memberikan akses kepada peserta didik untuk semua materi yang mereka butuhkan.

## Mengakses Alat Dokumen

Buka alat **Dokumen** <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="Dokumen" data-size="line"> dari halaman utama kursus. Anda akan melihat penjelajah berkas yang menampilkan folder utama dari perpustakaan dokumen kursus Anda.

![Penjelajah berkas dokumen yang menampilkan folder dan berkas dengan ikon aksi](/.gitbook/assets/documents-file-browser.png)

## Mengunggah Berkas

1. Klik tombol **Unggah** <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="Unggah" data-size="line">
2. Pilih satu atau lebih berkas dari komputer Anda (Anda dapat menyeret dan menjatuhkan berkas ke area unggah)
3. Berkas akan diunggah dan muncul di folder saat ini

Chamilo mendukung sebagian besar jenis berkas umum: PDF, dokumen perkantoran (.docx, .odt), presentasi (.pptx, .odp), spreadsheet (.xlsx, .ods), gambar (PNG, JPG, SVG, GIF), berkas audio, berkas video (termasuk WEBM), berkas HTML, dan lainnya.

Beberapa format mungkin dilarang oleh administrator portal melalui pengaturan penyaringan daftar putih/daftar hitam di bagian keamanan administrasi.

Untuk keterbacaan yang lebih baik oleh peserta didik, kami merekomendasikan untuk mengunggah berkas yang dapat dilihat atau dibuka oleh peramban tanpa alat tambahan. Hal ini membuat kursus Anda lebih portabel dan, dengan demikian, lebih mudah diakses melalui perangkat seluler serta lebih mudah dibaca bagi orang dengan kemampuan khusus.

## Membuat Konten

Selain mengunggah berkas, Anda juga dapat membuat konten langsung di Chamilo:

### Halaman Web

1. Klik **Dokumen baru**
2. Gunakan editor teks kaya untuk menulis konten Anda dengan format, gambar, tabel, dan tautan
3. Masukkan **judul** untuk halaman tersebut
4. Simpan

Editor teks kaya (TinyMCE) menyediakan fitur seperti pengolah kata, termasuk:

* Pemformatan teks (tebal, miring, judul, daftar)
* Tabel
* Gambar (unggah atau tautkan ke gambar yang sudah ada)
* Video dan audio yang disematkan
* Tautan ke sumber daya lain
* Pengeditan sumber HTML untuk pengguna tingkat lanjut

### Pembuatan Media AI

Ketika pembantu AI diaktifkan di platform, Anda dapat meminta AI untuk menghasilkan **gambar** atau **video pendek** untuk mengilustrasikan paragraf dalam dokumen yang sedang Anda edit. Pilih paragraf, buka dialog **Hasilkan Media AI**, dan AI akan menghasilkan item media yang dapat Anda tinjau dan sisipkan. Dialog ini menghormati izin tingkat kursus dan hanya muncul di kursus yang mengizinkan pembuatan media AI.

### Rekaman Audio

Jika peramban Anda mendukungnya, Anda dapat merekam audio langsung di dalam alat dokumen — berguna untuk membuat instruksi audio atau konten pembelajaran bahasa. Ini memerlukan konfigurasi HTTPS untuk Chamilo, karena rekaman audio menggunakan teknologi yang hanya diizinkan oleh peramban jika koneksi aman.

## Mengatur dengan Folder

Jaga perpustakaan dokumen Anda tetap terorganisir menggunakan folder:

1. Klik **Folder baru** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="Folder baru" data-size="line">
2. Masukkan nama folder
3. Simpan

Anda dapat membuat folder bersarang untuk membangun hierarki konten yang logis (misalnya, `Modul 1 > Minggu 1 > Bacaan`).

### Memindahkan Berkas

* Temukan berkas Anda di daftar
* Klik **Pindah** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Pindah" data-size="line">
* Pilih folder tujuan
* Konfirmasi

## Mengelola Dokumen

Untuk setiap berkas atau folder, Anda dapat:

| Aksi | Ikon | Deskripsi |
|------|------|-----------|
| **Edit** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="Edit" data-size="line"> | Mengganti nama berkas atau mengedit kontennya (untuk halaman web) |
| **Hapus** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="Hapus" data-size="line"> | Menghapus berkas atau folder |
| **Unduh** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="Unduh" data-size="line"> | Mengunduh berkas ke komputer Anda |
| **Visibilitas** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="Visibilitas" data-size="line"> | Menyembunyikan atau menampilkan berkas kepada peserta didik |
| **Ganti** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="Ganti" data-size="line"> | Mengganti berkas dengan versi yang diperbarui |
| **Pindah** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="Pindah" data-size="line"> | Memindahkan ke folder lain |

Mengganti berkas adalah fitur penting ketika Anda menggunakan dokumen untuk membangun jalur pembelajaran, karena mengganti dokumen akan memungkinkan dokumen tersebut diperbarui tanpa peserta didik kehilangan kemajuan yang telah disimpan untuk dokumen tersebut.

### Aksi Massal

Pilih beberapa berkas menggunakan kotak centang, lalu gunakan bilah alat untuk menghapus atau mengunduh semua item yang dipilih sekaligus.

---
## Integrasi OnlyOffice

Jika administrator Anda telah mengkonfigurasi plugin **OnlyOffice**, Anda dapat mengedit file Word, Excel, dan PowerPoint (atau LibreOffice) langsung di browser tanpa perlu mengunduhnya. Cari opsi **Edit with OnlyOffice** <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> saat melihat file yang didukung.

Dokumen disimpan di Chamilo, OnlyOffice hanya digunakan untuk **melihat** atau mengedit dokumen di browser, tanpa memerlukan alat tambahan apa pun.

## File Cloud

Jika Anda menggunakan penyimpanan cloud (Azure Blob, AWS S3, atau Google Cloud) untuk file Anda, file-file tersebut disimpan di cloud tetapi Anda dapat menautkannya dari sini. Ini bersifat transparan bagi Anda dan peserta didik Anda — alat dokumen bekerja dengan cara yang sama terlepas dari backend penyimpanan yang digunakan.

## Tips

* **Atur sejak awal** — Buat struktur folder Anda sebelum mengunggah konten agar Anda tidak perlu mengatur ulang nanti. Jika Anda telah membuat kursus lain dengan struktur yang tepat, Anda dapat menggunakan kursus tersebut sebagai templat di kemudian hari
* **Gunakan nama file yang deskriptif** — Bantu peserta didik menemukan apa yang mereka butuhkan dengan nama yang jelas dan bermakna
* **Sembunyikan pekerjaan yang sedang berlangsung** — Gunakan tombol visibilitas untuk menyembunyikan dokumen yang masih Anda siapkan
* **Tautkan dari jalur pembelajaran** — Rujuk dokumen dalam jalur pembelajaran Anda untuk menciptakan urutan pembelajaran yang terarah
* **Periksa kuota disk** — Jika kursus Anda memiliki batas penyimpanan, hapus file yang sudah usang untuk membebaskan ruang