# Konten Multi-Bahasa

Chamilo memungkinkan Anda menulis **beberapa versi bahasa dari potongan konten yang sama dalam satu bidang** — bagian deskripsi kursus, dokumen, pertanyaan tes, survei — dan setiap peserta didik secara otomatis hanya melihat versi yang ditulis dalam bahasa mereka sendiri. Ini adalah fitur **translate_html**, dinamai sesuai pengaturan platform yang mengaturnya.

Fitur ini melibatkan tiga orang berbeda, masing-masing melihat sisi yang berbeda:

* **Administrator Anda** harus mengaktifkan fitur ini di seluruh platform sebelum siapa pun dapat menggunakannya.
* **Anda (pengajar)** menulis berbagai versi bahasa, menggunakan tombol di editor teks kaya.
* **Peserta didik** merasakan manfaatnya tanpa pernah mengetahui bahwa fitur itu ada — mereka cukup melihat konten dalam bahasa mereka sendiri, tanpa pengaturan yang perlu dicari atau diubah.

## Mengaktifkan Fitur

Ini adalah tugas administrator, bukan tugas pengajar. Di bawah **Administration > Configuration settings > Editor**, pengaturan **Support multi-language HTML content** (`translate_html`) harus diaktifkan. Jika Anda tidak melihat tombol **Lang ISO** yang dijelaskan di bawah pada bilah alat editor, hampir pasti ini penyebabnya — tanyakan kepada administrator Anda. Lihat [Pengaturan Editor](../../admin-guide/platform-settings/editor-settings.md) untuk referensi pengaturan lengkap. Mulai v3.0.0, pengaturan ini diaktifkan secara default (tidak demikian sebelum versi ini) kecuali Anda telah meningkatkan versi dari versi sebelumnya di mana pengaturan tersebut dinonaktifkan.

Mematikan pengaturan ini lagi tidak menghapus atau merusak konten yang sudah ditulis dengan cara ini — lihat [Apa yang Dilihat Peserta Didik](#what-learners-see) di bawah.

## Menulis Konten Multi-Bahasa

Fitur ini tersedia di mana pun Anda memiliki editor teks kaya lengkap: bagian [deskripsi kursus](../creating-your-course/course-description.md), [dokumen](documents.md), pertanyaan tes dan survei, dan lainnya.

1. Tulis (atau tempel) konten dalam bahasa default Anda, seperti biasa.
2. Pilih teks tersebut, lalu klik tombol **Lang ISO** pada bilah alat editor.

![Bilah alat editor teks kaya, dengan tombol "Lang ISO" terlihat di dekat awal](/.gitbook/assets/teacher-multilang-editor.png)

3. Dari menu, pilih bahasa yang baru saja Anda tulis — daftar mencakup setiap bahasa yang aktif di platform Anda. Jika yang Anda butuhkan tidak terdaftar, gunakan **Custom Chamilo ISO code...** di bagian bawah dan ketik kodenya (mis. `en_US`, `fr_FR`, `es`).

![Menu "Lang ISO" terbuka, menampilkan setiap bahasa platform yang aktif plus "Add translation to..." dan opsi kode kustom](/.gitbook/assets/teacher-multilang-lang-menu.png)

4. Chamilo membungkus pilihan Anda dengan tag bahasa tersebut. Sekarang tulis (atau tempel) versi bahasa berikutnya tepat setelahnya, pilih, dan ulangi dengan bahasa yang berbeda.

Lanjutkan sebanyak bahasa yang ingin Anda cakup. Semuanya berada dalam bidang yang sama — saat Anda mengedit, Anda akan melihat setiap versi bahasa bertumpuk satu setelah yang lain; hanya ketika seseorang *melihat* halaman tersebut Chamilo menyembunyikan semuanya kecuali satu bahasa yang berlaku bagi mereka (lihat di bawah).

### Terjemahan Berbantuan AI

Jika administrator Anda telah mengonfigurasi penyedia teks AI, menu **Lang ISO** yang sama juga menawarkan **Add translation to...** di bagian atas. Ini mengirimkan konten Anda yang sudah ada ke model AI yang dikonfigurasi dan menyisipkan blok baru yang diterjemahkan secara otomatis dalam bahasa yang Anda pilih (atau dalam setiap bahasa yang tersisa sekaligus, jika platform Anda mengizinkannya) — Anda tidak perlu menulisnya sendiri. Blok bahasa yang sudah ada dibiarkan utuh, dan bahasa yang sudah ada dikecualikan dari daftar, sehingga menggunakannya berulang kali tidak akan membuat duplikat.

Seperti konten yang dihasilkan AI lainnya, periksa hasilnya — ini cara cepat untuk mendapatkan draf awal yang solid dalam bahasa yang mungkin tidak Anda kuasai sendiri, bukan pengganti peninjauan.

## Apa yang Dilihat Peserta Didik

Setiap peserta didik melihat tepat satu versi bahasa: Chamilo mencoba bahasa antarmuka mereka sendiri terlebih dahulu; jika tidak ada blok Anda yang cocok, sistem kembali ke bahasa kursus itu sendiri, lalu ke bahasa default platform; jika tidak ada yang cocok juga, sistem menampilkan bahasa mana pun yang kebetulan Anda tulis pertama kali daripada membiarkan konten kosong. Semua ini terjadi secara otomatis — tidak ada yang perlu dikonfigurasi oleh peserta didik, dan tidak ada yang perlu Anda konfigurasi per peserta didik.

Berikut adalah bagian deskripsi kursus yang sama, seperti yang dilihat oleh tiga peserta didik dengan bahasa antarmuka berbeda — tidak ada yang berubah pada kursus di antara ketiga tangkapan layar ini, hanya bahasa pemirsa itu sendiri:

![Bagian deskripsi kursus yang sama seperti yang dilihat oleh peserta didik dengan bahasa antarmuka Inggris](/.gitbook/assets/teacher-multilang-en.png)

![Bagian yang sama seperti yang dilihat oleh peserta didik dengan bahasa antarmuka Prancis](/.gitbook/assets/teacher-multilang-fr.png)

![Bagian yang sama seperti yang dilihat oleh peserta didik dengan bahasa antarmuka Spanyol](/.gitbook/assets/teacher-multilang-es.png)

### Di Balik Layar

Jika Anda pernah membuka tampilan **Kode sumber** pada bidang multi-bahasa (tombol `<>` di bilah alat editor), Anda akan melihat setiap versi bahasa dibungkus seperti ini:

![Tampilan Kode Sumber, menampilkan blok yang dibuka dengan lang="en_US" class="mce-translatehtml"](/.gitbook/assets/teacher-multilang-source-view.png)

Setiap versi dibungkus dalam `<div class="mce-translatehtml" lang="...">` (atau `<span>`, untuk frasa sebaris pendek, bukan seluruh blok) — atribut `lang` itulah yang dicocokkan Chamilo dengan bahasa pemirsa untuk memutuskan apa yang ditampilkan. Nama kelas spesifik ini patut dikenali jika Anda pernah memeriksa sumber halaman atau memecahkan masalah konten yang tampak salah: **`mce-translatehtml`** adalah penanda yang harus dicari.

Ini juga menjelaskan mengapa menonaktifkan `translate_html` di pengaturan platform tidak merusak apa pun yang sudah ditulis: pengaturan itu hanya mengontrol apakah tombol *penulisan* **Lang ISO** muncul di editor. Penyaringan *sisi tampilan* yang dijelaskan di atas berjalan tanpa syarat, sehingga konten multi-bahasa yang ditulis sebelumnya tetap disaring dengan benar untuk setiap pemirsa bahkan pada platform di mana administrator kemudian mematikan tombol penulisan.

## Judul Tidak Bekerja dengan Cara Ini

Judul kursus, judul dokumen, judul tes — ini adalah bidang teks biasa, bukan teks kaya, sehingga tidak dapat menampung markup bertanda `lang` yang dijelaskan di atas. Mereka tetap sebagai nilai tunggal yang netral terlepas dari siapa yang melihatnya, tidak peduli berapa banyak versi bahasa yang telah Anda tulis ke dalam konten di bawahnya.

Satu-satunya pengecualian: jika administrator Anda telah mengaktifkan **Simpan judul sebagai HTML** (`save_titles_as_html`, juga di bawah **Administration > Configuration settings > Editor**) untuk bidang judul spesifik yang sedang Anda kerjakan, bidang itu menjadi bidang HTML sungguhan juga, dan teknik **Lang ISO** yang sama yang dijelaskan di atas dapat diterapkan padanya. Ini tidak umum dan sebagian besar digunakan untuk pertanyaan tes — sebagian besar judul di seluruh platform tetap berupa teks biasa.

## Tips

* **Simpan bahasa sumber di urutan pertama** — letakkan bahasa paling umum platform Anda di awal bidang; itu adalah cadangan paling alami jika Anda lupa menandai bahasa yang lebih jarang nanti.
* **Jangan menyarangkan blok bahasa** — tulis setiap versi sebagai blok terpisah yang berurutan; membungkus satu di dalam yang lain tidak didukung dan editor secara aktif membuka penanda bersarang saat Anda menyisipkan yang baru.
* **Bagian yang tampak kosong dalam satu bahasa** biasanya berarti tidak ada blok yang pernah ditandai untuk bahasa itu (atau cadangan default kursus/platform yang diperluas) — periksa tampilan Kode sumber untuk bahasa yang benar-benar ada.