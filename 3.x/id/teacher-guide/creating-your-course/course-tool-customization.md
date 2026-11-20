# Sesuaikan Nama dan Ikon Alat Kursus

Chamilo 3.1 memungkinkan penyunting kursus yang berwenang untuk menyesuaikan **nama** dan **ikon SVG** yang ditampilkan untuk suatu alat di beranda kursus. Perubahan ini terbatas pada kursus tersebut dan mempertahankan tujuan alat yang sudah ada.

## Menyesuaikan alat

1. Buka beranda kursus sebagai pengguna yang diizinkan menyunting kursus.
2. Aktifkan mode **Sesuaikan** pada kisi alat.
3. Buka formulir penyesuaian untuk alat yang ingin Anda ubah.
4. Masukkan **Nama** yang diinginkan dan, jika diperlukan, pilih berkas SVG **Ikon**.
5. Pilih **Simpan** dan verifikasi alat yang diperbarui pada kisi beranda.

Penyesuaian alat berbeda dari mode **Urutkan**, **Tampilkan semua**, dan **Sembunyikan semua** pada kisi. Mengubah label atau ikon alat tidak membuat alat baru, tidak mengubah URL dasarnya, dan tidak memberikan akses tambahan kepada peserta didik.

## Persyaratan dan keamanan SVG

Gunakan berkas SVG dari sumber tepercaya. Chamilo memvalidasi konten SVG yang diunggah dan menolak berkas yang tidak aman. Jika suatu berkas ditolak, sederhanakan atau ekspor ulang sebagai SVG yang bersih, alih-alih mencoba melewati validasi.

Konfirmasikan ikon dan nama yang dihasilkan baik sebagai pengajar maupun peserta didik, serta verifikasi bahwa kursus lain tetap tidak berubah. Peserta didik tidak dapat menyesuaikan alat kecuali mereka memiliki izin penyuntingan kursus yang diperlukan.

Lihat [Beranda Kursus](course-homepage.md). Implementasi: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).