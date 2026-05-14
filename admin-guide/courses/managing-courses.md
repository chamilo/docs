# Mengelola Kursus

Sebagai seorang administrator, Anda dapat mengelola semua kursus di platform ini terlepas dari siapa yang membuatnya.

## Daftar Kursus

![Daftar kursus yang menampilkan semua kursus dengan judul, kode, kategori, pengguna yang terdaftar, dan status visibilitas](/.gitbook/assets/admin-course-list.png)

Dari panel administrasi, klik **Daftar kursus** untuk melihat semua kursus. Daftar ini menunjukkan:

* Judul dan kode kursus
* Bahasa
* Kategori
* Status visibilitas

Gunakan alat **Pencarian lanjutan** untuk menemukan kursus tertentu.

## Membuat Kursus

Sebagai administrator, Anda dapat membuat kursus dan menugaskannya kepada guru mana pun:

1. Klik **Tambah kursus** dari panel administrasi
2. Isi detail kursus (judul, kode, kategori, bahasa)
3. Tetapkan seorang guru untuk kursus tersebut
4. Simpan

Catatan: Di Chamilo 1.11.x, kode kursus ditampilkan sebagai bagian dari URL kursus, dan tidak dapat diubah setelah kursus dibuat. Perilaku ini berubah di versi 2.x. Kode kursus tidak lagi terlihat di URL, dan versi mendatang mungkin akan memungkinkan guru untuk mengubah kode kursus setelahnya karena menjadi kurang esensial bagi platform.

## Mengelola Kursus yang Sudah Ada

Temukan kursus di daftar untuk mengakses opsi pengelolaan di kolom *Aksi*:

* **Informasi** — Menampilkan informasi tentang kursus
* **Beranda kursus** — Membawa Anda langsung ke halaman utama kursus
* **Laporan** — Melihat data keterlibatan dan kinerja
* **Edit** — Mengubah judul kursus, kategori, visibilitas, dan pengaturan lainnya
* **Buat cadangan** — Masuk ke bagian pemeliharaan kursus, di mana Anda dapat membuat salinan dan melakukan hal lain
* **Tambahkan ke katalog** — Menambahkan kursus ini ke katalog kursus
* **Hapus** — Menghapus kursus dan semua kontennya secara permanen

> Menghapus kursus akan menghapus semua konten, data peserta, nilai, dan informasi pelacakan secara permanen. Pertimbangkan untuk mengekspor kursus terlebih dahulu sebagai cadangan.

## Operasi Massal

Pilih beberapa kursus di daftar untuk melakukan tindakan batch seperti menghapusnya. Untuk mengekspor kursus, masuk ke kursus tersebut dan gunakan alat **Pemeliharaan** — tidak ada tindakan ekspor massal di daftar kursus admin.

## Pengaturan Visibilitas Kursus

Administrator dapat mengesampingkan pengaturan visibilitas yang ditetapkan oleh guru:

| Visibilitas | Efek |
|-------------|------|
| **Publik** | Dapat diakses oleh semua orang, termasuk pengunjung anonim |
| **Terbuka** | Dapat diakses oleh semua pengguna yang telah masuk |
| **Pribadi** | Hanya pengguna yang terdaftar yang dapat mengakses kursus |
| **Ditutup** | Tidak ada yang dapat mengakses kursus (kecuali guru dan admin) |
| **Tersembunyi** | Tidak ada yang dapat melihat atau mengakses kursus (kecuali admin) |