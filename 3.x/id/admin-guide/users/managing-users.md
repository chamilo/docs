# Mengelola Pengguna

Halaman ini membahas tugas sehari-hari membuat, mengedit, dan mengelola akun pengguna.

## Daftar Pengguna

![Daftar pengguna yang menampilkan akun dengan kolom nama, email, peran, dan status](../../.gitbook/assets/admin-user-list.png)

Dari panel administrasi, klik **Daftar pengguna** untuk melihat semua pengguna di platform. Daftar tersebut menampilkan:

* Avatar
* Nama
* Username
* Alamat email
* Peran
* Status aktif/tidak aktif
* Tanggal pendaftaran
* Tanggal login terakhir

Gunakan alat **Pencarian lanjutan** untuk menemukan pengguna tertentu berdasarkan nama, email, peran, atau kriteria lain.

## Membuat Pengguna

![Formulir pembuatan pengguna dengan kolom nama, email, username, kata sandi, peran, dan bahasa](../../.gitbook/assets/admin-user-create-form.png)

1. Klik **Tambah pengguna** dari panel administrasi
2. Isi kolom yang wajib:
   * **Nama depan** dan **Nama belakang**
   * **Email** — Harus unik di platform
   * **Username** — Nama login (harus unik)
   * **Kata sandi** — Tetapkan kata sandi awal
   * **Peran** — Pilih peran platform pengguna (siswa, pengajar, admin, dll.)
   * **Bahasa** — Bahasa antarmuka yang dipilih pengguna
3. Secara opsional isi kolom tambahan:
   * Kode resmi (misalnya ID unik di organisasi)
   * Nomor telepon
   * Tanggal kedaluwarsa — Menonaktifkan akun secara otomatis setelah suatu tanggal
   * Status aktif/tidak aktif
   * Kolom profil tambahan (jika dikonfigurasi)
4. Simpan

## Mengimpor Pengguna

![Antarmuka impor pengguna untuk mengunggah berkas CSV atau XML berisi data pengguna](../../.gitbook/assets/admin-user-import.png)

Untuk pembuatan pengguna secara massal, Anda dapat mengimpor pengguna dari berkas:

1. Klik **Impor pengguna** dari panel administrasi
2. Unggah berkas **CSV** atau **XML** berisi data pengguna
3. Petakan kolom berkas ke kolom pengguna Chamilo
4. Pilih cara menangani pengguna yang sudah ada (perbarui atau lewati)
5. Impor

Berkas impor setidaknya harus berisi kolom untuk: nama depan, nama belakang, email, username, dan kata sandi.

Catatan: Kolom **Status** adalah nama lama untuk **Peran** dan hanya menerima beberapa nilai, misalnya 1 untuk pengajar, 5 untuk siswa. Penyesuaian peran lebih lanjut hanya dapat dilakukan secara manual kemudian, dengan mengedit pengguna.

## Mengekspor Pengguna

Klik **Ekspor pengguna** untuk mengunduh daftar pengguna sebagai berkas CSV atau XML. Anda dapat memfilter pengguna yang akan diekspor berdasarkan peran, tanggal pendaftaran, atau kriteria lain.

## Mengedit Pengguna

Klik nama pengguna di daftar pengguna untuk mengedit akunnya. Anda dapat mengubah:

* Informasi pribadi (nama, email, telepon)
* Peran
* Kata sandi (atur ulang)
* Status aktif/tidak aktif
* Tanggal kedaluwarsa
* Kolom profil tambahan

## Menghapus Pengguna

Saat menghapus pengguna (biasanya pengajar) yang telah membuat konten di platform, sistem mungkin mencegah Anda menghapus pengguna secara permanen, dan akan menampilkan pesan peringatan yang menjelaskan bahwa pengguna masih terikat pada beberapa sumber daya. Jika Anda mengonfirmasi penghapusan, sistem tidak akan menghapus konten itu sendiri melainkan menempelkannya ke pengguna netral (kami menyebutnya "pengguna Fallback") demi konsistensi data.

Untuk menghindarinya, periksa detail pengguna, hapus setiap kursus mereka satu per satu, lalu hapus pengguna.

## Tindakan Pengguna

| Tindakan | Deskripsi |
|--------|-------------|
| **Nonaktifkan** | Menonaktifkan akun pengguna tanpa menghapusnya. Pengguna tidak dapat masuk tetapi datanya tetap disimpan. |
| **Aktifkan** | Mengaktifkan kembali akun yang sebelumnya dinonaktifkan. |
| **Masuk sebagai** | Masuk ke platform sebagai pengguna ini (impersonation). Berguna untuk pemecahan masalah. |
| **Anonimkan** | Menghapus semua informasi pribadi akun, sebagaimana didefinisikan oleh GDPR Uni Eropa. |
| **Hapus** | Penghapusan lunak akun pengguna. Gunakan tab **Pengguna terhapus** untuk menghapus akun dan data terkait secara permanen. |

> **Masuk sebagai** adalah fitur yang kuat. Gunakan secara bertanggung jawab dan hanya untuk keperluan dukungan yang sah.

## Operasi Massal

Pilih beberapa pengguna di daftar pengguna untuk melakukan tindakan massal:

* Mengaktifkan atau menonaktifkan beberapa pengguna sekaligus
* Menghapus beberapa pengguna
* Menetapkan pengguna ke kursus atau sesi

## Tips

* **Gunakan impor CSV untuk pendaftaran dalam jumlah besar** — Saat menerima banyak pengguna di awal program pelatihan, siapkan berkas CSV dan impor secara massal
* **Tetapkan tanggal kedaluwarsa** — Untuk pengguna sementara (peserta lokakarya, pengguna uji coba), tetapkan tanggal kedaluwarsa agar akun mereka dinonaktifkan secara otomatis
* **Nonaktifkan daripada hapus** — Ketika pengguna meninggalkan, nonaktifkan akunnya terlebih dahulu. Ini mempertahankan catatan pelatihannya. Hapus hanya jika Anda yakin data tidak lagi diperlukan.