# Sertifikat Kustom

Plugin Custom Certificate <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Sertifikat Kustom" data-size="line"> memungkinkan Anda mengganti [sertifikat buku nilai](../assessing-learners/gradebook.md) standar dengan desain Anda sendiri — logo, stempel, hingga empat gambar tanda tangan beserta keterangannya, gambar latar, margin, dan konten yang disusun dari tag placeholder.

## Mengaktifkannya untuk Kursus Anda

Setelah administrator mengaktifkan plugin dan menetapkan templat default, aktifkan per kursus dari **Pengaturan Kursus**:

* **Custom certificate enable in course** — Mengaktifkan fitur untuk kursus ini
* **Use default custom certificate** — Menggunakan templat default platform alih-alih merancang sendiri (kedua opsi ini saling eksklusif; Chamilo memperingatkan Anda jika mencoba mengaktifkan keduanya)

Hal ini membuat alat **Pengaturan Sertifikat** tersedia di kursus Anda, tempat Anda merancang atau mengedit templat.

## Merancang Sertifikat

Editor sertifikat menggunakan tag yang diganti dengan data nyata saat sertifikat peserta didik dibuat, misalnya `((user_firstname))`, `((course_title))`, `((gradebook_grade))`, dan `((date_certificate))`. Selain konten, Anda dapat mengatur:

* Hingga tiga logo, gambar stempel, dan gambar latar
* Hingga empat gambar tanda tangan, masing-masing dengan keterangannya sendiri
* Margin serta tanggal dan tempat penyerahan/pengeluaran yang ditampilkan pada sertifikat

Gunakan **Certificate** untuk pratayang desain Anda, atau **Delete certificate** untuk menghapus templat kustom suatu kursus.

## Tips

* **Peserta didik tidak melihat perbedaan** — Mereka tetap mengunduh sertifikat dengan cara biasa dari Buku Nilai; hanya saja menggunakan templat Anda
* **Pratayang sebelum mengandalkannya** — Periksa pratayang dengan data placeholder nyata untuk menemukan masalah tata letak sebelum peserta didik mulai membuat sertifikat
* **Koordinasikan dengan administrator Anda** — Jika Anda menginginkan templat default di seluruh platform alih-alih templat sekali pakai per kursus, hal itu diatur terlebih dahulu oleh administrator Anda