# Generator Latihan

Generator Latihan AI membantu Anda membuat soal kuis secara otomatis menggunakan kecerdasan buatan. Anda memberikan topik atau konten, dan AI menghasilkan soal yang dapat Anda tinjau, sunting, dan tambahkan ke latihan Anda.

## Mengakses Generator Latihan

Generator Latihan tersedia saat membuat atau menyunting latihan, dengan syarat:

1. Pembantu AI diaktifkan di tingkat platform
2. Setidaknya satu penyedia teks AI dikonfigurasi

Cari tombol atau bagian **AI Generator** di dalam antarmuka pembuatan latihan.

## Cara Menghasilkan Soal

![Formulir generator latihan AI dengan kolom untuk topik dan jumlah soal](../../.gitbook/assets/ai-exercise-generator.png)

Generator menawarkan dua mode, tersedia sebagai tab:

* **Test from topic** — Menghasilkan soal dari deskripsi topik tekstual
* **Test from document** — Menghasilkan soal dari dokumen kursus (hanya tersedia jika penyedia yang mampu memproses dokumen dikonfigurasi). Ketika mode ini digunakan, kolom topik menjadi opsional dan diperlakukan sebagai petunjuk tambahan.

1. Buka formulir AI Generator di dalam latihan dan pilih mode
2. Konfigurasikan parameter pembuatan:
   * **Quiz title** — Judul untuk latihan yang dihasilkan
   * **Questions topic** — Jelaskan tentang apa soal tersebut (atau, dalam mode dokumen, petunjuk opsional)
   * **Number of questions** — Berapa banyak soal yang akan dihasilkan (dibatasi hingga 100)
   * **Question type** — Saat ini hanya **Multiple answer** yang ditawarkan
   * **AI provider** — Pilih penyedia AI yang akan digunakan (hanya ditampilkan jika lebih dari satu dikonfigurasi)
3. Klik **Generate**
4. AI menghasilkan kumpulan soal beserta opsi jawaban dan jawaban benar yang ditandai. Ketika pengungkapan AI diaktifkan, soal yang dihasilkan diberi awalan **\[AI-assisted\]**.

## Meninjau dan Menyunting

![Soal yang dihasilkan AI ditampilkan untuk ditinjau dengan opsi menyunting, menerima, atau menghapus masing-masing soal](../../.gitbook/assets/ai-exercise-generator-results.png)

Soal yang dihasilkan disajikan sebagai **saran**. Anda sebaiknya:

* **Tinjau setiap soal** untuk akurasi dan relevansi
* **Sunting rumusan** jika diperlukan — sesuaikan soal, opsi jawaban, dan umpan balik
* **Verifikasi jawaban benar** — pastikan AI telah mengidentifikasi jawaban yang tepat
* **Hapus soal yang tidak sesuai** — hapus soal yang tidak memenuhi standar Anda
* **Sesuaikan penskoran** — tetapkan nilai poin yang sesuai untuk setiap soal

Setelah Anda puas, tambahkan soal ke latihan Anda.

Perhatikan bahwa meskipun kami meminta format tertentu, beberapa model akan mengembalikan judul soal yang diawali nomor. Kami tidak merekomendasikan membiarkan nomor tersebut karena akan menghambat pencampuran soal dalam tes dengan soal yang dipilih secara acak. Selain itu, terkadang Anda tidak mendapatkan sebanyak soal yang diminta, jadi pastikan Anda memeriksanya dan jika perlu menghasilkan lebih banyak soal, atau ganti model jika Anda memiliki kemungkinan itu.

## Pengungkapan Konten yang Dihasilkan AI

Konten yang dihasilkan AI diberi label dengan pemberitahuan pengungkapan, yang menunjukkan bahwa konten tersebut dibuat menggunakan kecerdasan buatan. Transparansi ini membantu peserta didik memahami asal materi.

## Tips

* **Berikan topik yang spesifik** — Semakin spesifik deskripsi topik Anda, semakin relevan soal yang dihasilkan.
* **Selalu tinjau** — Konten yang dihasilkan AI mungkin mengandung kesalahan. Jangan pernah memublikasikan soal tanpa meninjaunya terlebih dahulu.
* **Gunakan sebagai titik awal** — Soal yang dihasilkan menghemat waktu, bukan produk jadi. Sunting agar sesuai dengan gaya mengajar dan konten kursus Anda.
* **Campur dengan soal manual** — Gabungkan soal yang dihasilkan AI dengan soal yang dibuat secara manual untuk hasil terbaik.
* **Coba penyedia yang berbeda** — Jika beberapa penyedia AI tersedia, coba yang berbeda untuk melihat mana yang menghasilkan soal terbaik untuk bidang subjek Anda.