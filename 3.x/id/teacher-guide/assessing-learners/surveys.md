# Survei

Alat survei memungkinkan Anda membuat kuesioner untuk mengumpulkan umpan balik dari peserta didik. Survei berguna untuk evaluasi kursus, asesmen kebutuhan, dan jajak pendapat.

## Membuat Survei

1. Buka alat **Surveys** <img src="/.gitbook/assets/icons/mdi-form-dropdown.svg" alt="Survei" data-size="line"> dari beranda kursus
2. Klik **Create survey**
3. Isi detail survei:
   * **Code** — Kode unik untuk survei. Kode ini akan digunakan dalam surel dan tautan.
   * **Title** — Nama survei
   * **Subtitle** — Judul sekunder opsional
   * **Start date** — Sejak kapan survei ini terbuka untuk partisipasi
   * **End date** — Hingga kapan survei ini terbuka untuk partisipasi
   * **Anonymous** — Apakah respons bersifat anonim atau terhubung ke masing-masing peserta didik
   * **Results visibility** — Siapa yang dapat melihat hasil (hanya tutor, tutor dan siswa, semua orang)
   * **Introduction** — Pesan yang ditampilkan kepada peserta didik sebelum mereka memulai survei
   * **Thank you message** — Pesan yang ditampilkan setelah pengiriman
4. Simpan

### Pengaturan lanjutan

* **Grade in the assessment tool** — Apakah status jawaban survei ini disertakan dalam alat asesmen (gradebook). Siapa pun yang telah menyelesaikan survei mendapat 100%, yang lain mendapat 0%
* **Parent survey** — Belum benar-benar digunakan pada saat ini (fitur warisan)
* **One question per page** — Gaya penyajian pertanyaan
* **Enable shuffle mode** — Apakah pertanyaan diacak
* **Show question number** — Apakah nomor pertanyaan (yang dihasilkan otomatis) ditampilkan

## Menambahkan Pertanyaan

Setelah survei dibuat, tambahkan pertanyaan:

1. Pilih jenis pertanyaan:
   * **Yes/No** — Pilihan biner sederhana
   * **Multiple choice** — Pilih satu jawaban dari beberapa opsi
   * **Multiple answer** — Pilih satu atau lebih jawaban dari beberapa opsi
   * **Open-ended** — Respons teks bebas
   * **Dropdown** — Pilih dari daftar dropdown
   * **Percentage** — Pilih nilai persentase
   * **Score** — Nilai pada skala numerik
   * **Comment** — Blok teks (bukan pertanyaan) untuk menambahkan instruksi di antara pertanyaan
   * **Multiple choice with "other" option** — Pilih satu jawaban dari beberapa opsi, dengan pilihan alternatif
   * **Selective display** — Jenis khusus yang memungkinkan Anda menyesuaikan alur pertanyaan berdasarkan jawaban sebelumnya
   * **Page break** — Tambahkan pemisah halaman dalam alur pertanyaan. Hanya berguna jika "One question per page" **tidak** dipilih pada langkah sebelumnya
2. Konfigurasikan teks pertanyaan dan opsi jawaban
3. Simpan

Setiap pertanyaan dapat ditandai sebagai wajib. Jika tidak, melewati pertanyaan apa pun akan dianggap perilaku yang dapat diterima.

## Menerbitkan Survei

Setelah semua pertanyaan ditambahkan:

1. Klik **Publish**
2. Pilih penerima — Pilih peserta didik atau kelompok tertentu (Anda yang memilihnya). Tombol **Add learners** menambahkan semua peserta didik dalam satu langkah dan tidak menyertakan pengajar
3. Tambahkan pengguna tambahan — Memungkinkan Anda mengundang pengguna dari luar Chamilo untuk berpartisipasi dalam survei. Mereka akan menerima surel berisi tautan dan akan muncul berdasarkan alamat surel mereka dalam detail survei
4. Subjek surel
5. Teks surel — Jelaskan tentang apa survei tersebut serta kapan/bagaimana menjawabnya
6. Berbagai opsi untuk undangan berulang tersedia
7. Konfirmasi

Peserta didik menerima undangan (sebagai surel) untuk menyelesaikan survei.

Tautan tersedia di bagian bawah halaman publikasi untuk mengundang lebih banyak pengguna eksternal agar berpartisipasi. Peserta yang menggunakan tautan ini tidak akan diidentifikasi dan muncul sebagai anonim dalam hasil survei.

## Melihat Hasil

![Hasil survei dengan bagan dan rincian persentase untuk setiap pertanyaan](/.gitbook/assets/survey-results-charts.png)

Setelah peserta didik merespons:

1. Buka survei
2. Klik **Results** atau **Report**
3. Lihat ringkasan respons:
   * Bagan dan persentase untuk pertanyaan tertutup
   * Respons teks individual untuk pertanyaan terbuka
   * Tingkat penyelesaian (berapa banyak undangan yang merespons)

Anda dapat mengekspor hasil ke spreadsheet untuk analisis lebih lanjut.

## Tips

* **Keep it short** — Peserta didik lebih cenderung menyelesaikan survei yang lebih singkat
* **Use anonymous mode** — Untuk umpan balik yang jujur, aktifkan respons anonim
* **Time it right** — Kirim survei di tengah kursus untuk melakukan penyesuaian, bukan hanya evaluasi akhir kursus