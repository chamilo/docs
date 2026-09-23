# Generator Gambar Kursus

Generator gambar kursus AI memungkinkan Anda membuat gambar thumbnail untuk kursus langsung dari layar pengaturan kursus, tanpa perlu mencari atau merancang sendiri. Ini adalah gambar yang ditampilkan untuk kursus Anda dalam daftar dan di [katalog kursus](../assessing-learners/subscribing-users.md#self-enrollment-via-the-course-catalog).

## Mengakses Generator

Tombol **Generate with AI** <img src="../../.gitbook/assets/icons/mdi-robot.svg" alt="Generate with AI" data-size="line"> tersedia di samping kolom **Course picture**, dengan syarat:

1. Pembantu AI diaktifkan di tingkat platform
2. Setidaknya satu penyedia AI yang dikonfigurasi di platform Anda mendukung pembuatan gambar
3. Fitur ini diizinkan di kursus Anda (lihat **AI Helpers Settings** di [Pengaturan Kursus](../creating-your-course/course-settings.md))

Buka **Settings** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Settings" data-size="line"> kursus Anda dan gulir ke kolom **Course picture**:

![Kolom Course picture di Pengaturan Kursus, dengan tombol Choose File dan tombol Generate with AI di bawahnya](../../.gitbook/assets/course-picture-ai-button.png)

## Cara Membuat Gambar

1. Klik **Generate with AI**
2. Dialog terbuka dengan kolom **Prompt** yang sudah terisi deskripsi default; edit untuk menggambarkan ilustrasi yang Anda inginkan, atau biarkan default apa adanya

![Dialog Generate with AI yang menampilkan kolom Prompt dengan teks defaultnya, serta tombol Cancel/Generate](../../.gitbook/assets/course-picture-ai-modal.png)

3. Klik **Generate** dan tunggu — pembuatan gambar dapat memakan waktu beberapa detik
4. Gambar yang dihasilkan secara otomatis ditempatkan di kolom **Course picture**, menggantikan apa pun yang telah Anda pilih di sana
5. Pratinjau di panel **Preview**, lalu klik tombol **Save** pada formulir untuk benar-benar menerapkannya ke kursus Anda — membuat gambar tidak menyimpannya dengan sendirinya

Jika Anda tidak menyukai hasilnya, Anda dapat membuat ulang dengan prompt yang berbeda sebanyak yang Anda inginkan sebelum menyimpan.

## Apa yang Masuk ke dalam Prompt

Selain yang Anda ketik, Chamilo secara otomatis menambahkan konteks untuk membantu AI menghasilkan gambar yang relevan dan sesuai merek:

* Judul kursus Anda
* Bagian pertama [Deskripsi Kursus](../creating-your-course/course-description.md) kursus Anda, jika Anda telah mengisinya — memberi AI gambaran tentang materi pelajaran yang sebenarnya
* Tema warna platform Anda (primer, sekunder, tersier), sehingga ilustrasi menggunakan warna yang konsisten dengan portal Anda

Gambar dibuat dalam gaya ilustrasi datar, layar lebar (16:9), tanpa teks yang dapat dibaca, logo, atau orang fotorealistik — sesuai format yang diharapkan untuk thumbnail kursus.

## Tips

* **Isi Deskripsi Kursus terlebih dahulu** — karena itu memberi masukan ke prompt, kursus dengan deskripsi nyata cenderung mendapatkan ilustrasi yang lebih relevan daripada yang tanpa deskripsi
* **Spesifik tentang gaya, bukan konten** — judul dan deskripsi kursus sudah menambatkan subjek; gunakan prompt Anda untuk petunjuk gaya (suasana warna, metafora, komposisi) daripada mendeskripsikan ulang topik
* **Buat ulang daripada menerima apa adanya** — setiap klik menghasilkan percobaan baru tanpa langkah tambahan; coba beberapa variasi sebelum memilih satu
* **Ingat untuk menyimpan** — tombol hanya mengisi kolom gambar; meninggalkan halaman tanpa menyimpan akan membuat gambar yang dihasilkan hilang
* **Jika pembuatan gagal, tanyakan administrator Anda** — fitur yang dinonaktifkan, penyedia gambar yang tidak dikonfigurasi, atau kuota penggunaan AI bulanan yang habis semuanya menghasilkan pesan kesalahan di sini; administrator Anda dapat memeriksa [Konfigurasi AI](../../admin-guide/integrations/ai-configuration.md)