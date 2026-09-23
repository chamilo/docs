# Mengelola Kursus

Sebagai administrator, Anda dapat mengelola semua kursus di platform terlepas dari siapa yang membuatnya.

## Daftar Kursus

![Daftar kursus yang menampilkan semua kursus beserta judul, kode, kategori, pengguna terdaftar, dan status visibilitas](../../.gitbook/assets/admin-course-list.png)

Dari panel administrasi, klik **Course list** untuk melihat semua kursus. Daftar tersebut menampilkan:

* Judul dan kode kursus
* Bahasa
* Kategori
* Status visibilitas

Gunakan alat **Advanced search** untuk menemukan kursus tertentu.

## Membuat Kursus

Sebagai administrator, Anda dapat membuat kursus dan menugaskannya kepada guru mana pun:

1. Klik **Add course** dari panel administrasi
2. Isi detail kursus (judul, kode, kategori, bahasa)
3. Tetapkan guru untuk kursus tersebut
4. Simpan

Catatan: Di Chamilo 1.11.x, kode kursus ditampilkan sebagai bagian dari URL kursus, dan tidak dapat diubah setelah kursus dibuat. Perilaku ini berubah mulai versi 2.x. Kode kursus tidak lagi terlihat di URL, dan versi mendatang mungkin memungkinkan guru mengubah kode kursus setelahnya karena menjadi kurang esensial bagi platform.

## Mengelola Kursus yang Ada

Temukan kursus dalam daftar untuk mengakses opsi pengelolaan di kolom *Actions*:

* **Information** — Tampilkan informasi tentang kursus 
* **Course home** — Mengarahkan Anda langsung ke beranda kursus 
* **Reporting** — Lihat data keterlibatan dan kinerja
* **Edit** — Ubah judul kursus, kategori, visibilitas, dan pengaturan lainnya
* **Create a backup** — Buka bagian pemeliharaan kursus, tempat Anda dapat membuat salinan dan melakukan hal lain
* **Add to catalogue** — Tambahkan kursus ini ke katalog kursus
* **Delete** — Hapus kursus beserta seluruh isinya secara permanen

> Menghapus kursus menghapus semua konten, data peserta didik, nilai, dan informasi pelacakan secara permanen. Pertimbangkan untuk mengekspor kursus terlebih dahulu sebagai cadangan.

## Operasi Massal

Pilih beberapa kursus dalam daftar untuk melakukan tindakan batch seperti menghapusnya. Untuk mengekspor kursus, masuk ke kursus tersebut dan gunakan alat **Maintenance** — tidak ada tindakan ekspor massal pada daftar kursus admin.

## Pengaturan Visibilitas Kursus

Administrator dapat menimpa visibilitas yang ditetapkan oleh guru:

| Visibilitas | Efek |
|-----------|--------|
| **Public** | Dapat diakses oleh semua orang, termasuk pengunjung anonim |
| **Open** | Dapat diakses oleh semua pengguna yang sudah masuk |
| **Private** | Hanya pengguna yang terdaftar yang dapat mengakses kursus |
| **Closed** | Tidak seorang pun dapat mengakses kursus (kecuali guru dan admin) |
| **Hidden** | Tidak seorang pun dapat melihat atau mengakses kursus (kecuali admin) |