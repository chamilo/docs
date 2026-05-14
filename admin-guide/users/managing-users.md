# Mengelola Pengguna

Halaman ini membahas tugas sehari-hari dalam membuat, mengedit, dan mengelola akun pengguna.

## Daftar Pengguna

![Daftar pengguna yang menampilkan akun dengan kolom nama, email, peran, dan status](/.gitbook/assets/admin-user-list.png)

Dari panel administrasi, klik **Daftar pengguna** untuk melihat semua pengguna di platform. Daftar ini menunjukkan:

* Avatar
* Nama
* Nama pengguna
* Alamat email
* Peran
* Status aktif/tidak aktif
* Tanggal pendaftaran
* Tanggal login terakhir

Gunakan alat **Pencarian lanjutan** untuk menemukan pengguna tertentu berdasarkan nama, email, peran, atau kriteria lainnya.

## Membuat Pengguna

![Formulir pembuatan pengguna dengan kolom untuk nama, email, nama pengguna, kata sandi, peran, dan bahasa](/.gitbook/assets/admin-user-create-form.png)

1. Klik **Tambah pengguna** dari panel administrasi
2. Isi kolom yang diperlukan:
   * **Nama depan** dan **Nama belakang**
   * **Email** — Harus unik di platform
   * **Nama pengguna** — Nama login (harus unik)
   * **Kata sandi** — Tetapkan kata sandi awal
   * **Peran** — Pilih peran pengguna di platform (siswa, guru, admin, dll.)
   * **Bahasa** — Bahasa antarmuka yang disukai pengguna
3. Secara opsional, isi kolom tambahan:
   * Kode resmi (misalnya ID unik dalam organisasi)
   * Nomor telepon
   * Tanggal kedaluwarsa — Nonaktifkan akun secara otomatis setelah tanggal tertentu
   * Status aktif/tidak aktif
   * Kolom profil tambahan (jika dikonfigurasi)
4. Simpan

## Mengimpor Pengguna

![Antarmuka impor pengguna untuk mengunggah file CSV atau XML dengan data pengguna](/.gitbook/assets/admin-user-import.png)

Untuk pembuatan pengguna secara massal, Anda dapat mengimpor pengguna dari file:

1. Klik **Impor pengguna** dari panel administrasi
2. Unggah file **CSV** atau **XML** dengan data pengguna
3. Petakan kolom file ke kolom pengguna Chamilo
4. Pilih cara menangani pengguna yang sudah ada (perbarui atau lewati)
5. Impor

File impor harus berisi kolom minimal untuk: nama depan, nama belakang, email, nama pengguna, dan kata sandi.

Catatan: Kolom **Status** adalah nama lama untuk **Peran** dan hanya menerima beberapa nilai, seperti 1 untuk guru, 5 untuk siswa. Penyesuaian lebih lanjut pada peran hanya dapat dilakukan secara manual nanti dengan mengedit pengguna.

## Mengekspor Pengguna

Klik **Ekspor pengguna** untuk mengunduh daftar pengguna sebagai file CSV atau XML. Anda dapat memfilter pengguna mana yang akan diekspor berdasarkan peran, tanggal pendaftaran, atau kriteria lainnya.

## Mengedit Pengguna

Klik nama pengguna di daftar pengguna untuk mengedit akun mereka. Anda dapat mengubah:

* Informasi pribadi (nama, email, telepon)
* Peran
* Kata sandi (reset)
* Status aktif/tidak aktif
* Tanggal kedaluwarsa
* Kolom profil tambahan

## Menghapus Pengguna

Saat menghapus pengguna (biasanya guru) yang telah membuat konten di platform, sistem mungkin mencegah Anda menghapus pengguna secara permanen dan akan menampilkan pesan peringatan yang menjelaskan bahwa pengguna masih terhubung dengan beberapa sumber daya. Jika Anda mengonfirmasi penghapusan, sistem tidak akan menghapus konten itu sendiri tetapi akan menghubungkannya ke pengguna netral (kami menyebutnya "Pengguna Cadangan") untuk alasan konsistensi data.

Untuk menghindari ini, periksa detail pengguna, hapus setiap kursus mereka satu per satu, lalu hapus pengguna tersebut.

## Tindakan Pengguna

| Tindakan | Deskripsi |
|----------|-----------|
| **Nonaktifkan** | Menonaktifkan akun pengguna tanpa menghapusnya. Pengguna tidak dapat login tetapi datanya tetap dipertahankan. |
| **Aktifkan** | Mengaktifkan kembali akun yang sebelumnya dinonaktifkan. |
| **Login sebagai** | Login ke platform sebagai pengguna ini (peniruan identitas). Berguna untuk pemecahan masalah. |
| **Anonimkan** | Menghapus semua informasi pribadi akun, sebagaimana ditentukan oleh GDPR Uni Eropa. |
| **Hapus** | Menghapus akun pengguna secara sementara. Gunakan tab **Pengguna yang Dihapus** untuk menghapus akun dan data terkait secara permanen. |

> **Login sebagai** adalah fitur yang kuat. Gunakan dengan tanggung jawab dan hanya untuk tujuan dukungan yang sah.

## Operasi Batch

Pilih beberapa pengguna di daftar pengguna untuk melakukan tindakan batch:

* Aktifkan atau nonaktifkan beberapa pengguna sekaligus
* Hapus beberapa pengguna
* Tetapkan pengguna ke kursus atau sesi

## Tips

* **Gunakan impor CSV untuk pendaftaran besar** — Saat mendaftarkan banyak pengguna di awal program pelatihan, siapkan file CSV dan impor secara massal
* **Tetapkan tanggal kedaluwarsa** — Untuk pengguna sementara (peserta lokakarya, pengguna percobaan), tetapkan tanggal kedaluwarsa untuk menonaktifkan akun mereka secara otomatis
* **Nonaktifkan daripada hapus** — Ketika pengguna meninggalkan, nonaktifkan akun mereka terlebih dahulu. Ini mempertahankan catatan pelatihan mereka. Hanya hapus jika Anda yakin data tersebut tidak lagi diperlukan.