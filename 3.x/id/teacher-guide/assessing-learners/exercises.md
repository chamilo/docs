# Latihan

Alat latihan (juga disebut "tes") memungkinkan Anda membuat kuis dan ujian dengan penilaian otomatis. Chamilo mendukung berbagai jenis pertanyaan, dari pilihan ganda sederhana hingga pertanyaan hotspot interaktif.

## Membuat Latihan

1. Buka alat **Exercises** <img src="../../.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Latihan" data-size="line"> dari beranda kursus
2. Klik **New exercise**
3. Masukkan **judul** dan **deskripsi** opsional
4. Konfigurasikan pengaturan latihan (lihat di bawah)
5. Simpan, lalu tambahkan pertanyaan

## Pengaturan Latihan

![Panel pengaturan latihan dengan opsi tampilan, waktu, percobaan, dan umpan balik](../../.gitbook/assets/exercise-settings.png)

### Tampilan dan Navigasi

| Pengaturan | Opsi | Deskripsi |
|---------|---------|-------------|
| **Question layout** | All on one page / One per page | Tampilkan semua pertanyaan sekaligus atau satu per satu |
| **Hide question titles** | Yes / No | Apakah judul pertanyaan ditampilkan kepada peserta didik |
| **Show previous button** | Yes / No | Izinkan peserta didik kembali ke pertanyaan sebelumnya |
| **Prevent backwards navigation** | Yes / No | Paksa peserta didik menjawab berurutan tanpa kembali |

### Waktu dan Ketersediaan

| Pengaturan | Deskripsi |
|---------|-------------|
| **Time limit** | Waktu maksimum (dalam menit) untuk menyelesaikan latihan. Penghitung mundur ditampilkan kepada peserta didik |
| **Start date** | Kapan latihan tersedia bagi peserta didik |
| **End date** | Kapan latihan berhenti tersedia |

### Percobaan dan Penilaian

| Pengaturan | Deskripsi |
|---------|-------------|
| **Maximum attempts** | Berapa kali peserta didik dapat mengerjakan latihan (0 = tidak terbatas) |
| **Pass percentage** | Skor minimum untuk lulus (misalnya, 70%). Peserta didik yang tidak mencapai ambang ini melihat pesan kegagalan |
| **Propagate negative scoring** | Apakah poin negatif pada pertanyaan individual mengurangi skor total di bawah nol |

### Umpan Balik

| Pengaturan | Opsi |
|---------|---------|
| **At the end** | Tampilkan hasil dan jawaban benar setelah peserta didik mengirimkan |
| **Immediate** | Tampilkan umpan balik setelah setiap pertanyaan (berguna untuk latihan pembelajaran) |
| **Exam mode** | Jangan tampilkan umpan balik atau hasil apa pun |

### Tampilan Hasil

Kendalikan apa yang dilihat peserta didik setelah menyelesaikan latihan:

* Tampilkan skor dan jawaban yang diharapkan
* Tampilkan skor saja
* Tampilkan skor dengan rincian kategori
* Tampilkan peringkat di antara peserta didik lain
* Tampilkan hanya pada percobaan terakhir
* Tampilkan visualisasi grafik radar

### Pesan Penyelesaian

* **Success message** — Teks kustom yang ditampilkan ketika peserta didik lulus
* **Failure message** — Teks kustom yang ditampilkan ketika peserta didik tidak mencapai persentase kelulusan

### Pengacakan Pertanyaan

| Pengaturan | Deskripsi |
|---------|-------------|
| **Random question order** | Acak urutan pertanyaan pada setiap percobaan |
| **Random answers** | Acak opsi jawaban dalam setiap pertanyaan |
| **Random by category** | Pilih pertanyaan acak dari setiap kategori pertanyaan |

Anda juga dapat mengonfigurasi strategi pemilihan lanjutan yang menggabungkan kategori dan pengacakan.

## Jenis Pertanyaan

![Ikhtisar jenis pertanyaan yang tersedia di antarmuka pembuatan latihan](../../.gitbook/assets/exercise-question-types.png)

Chamilo menawarkan rangkaian jenis pertanyaan yang kaya, dikelompokkan ke dalam beberapa kategori:

### Pilihan Tunggal

* **Multiple choice (single answer)** — Peserta didik memilih satu jawaban benar dari daftar opsi
* **Single answer with images** — Sama seperti di atas, tetapi opsi jawaban ditampilkan sebagai gambar

### Pilihan Ganda

* **Multiple answer** — Peserta didik memilih satu atau lebih jawaban benar
* **Multiple answer (dropdown)** — Opsi jawaban disajikan sebagai menu tarik-turun
* **True/False** — Serangkaian pernyataan yang ditandai benar atau salah oleh peserta didik
* **True/False with degree of certainty** — Benar/salah dengan tingkat keyakinan tambahan, memungkinkan penilaian yang lebih bernuansa

### Isian

* **Fill in the blanks** — Peserta didik melengkapi kata yang hilang dalam teks. Anda menentukan isian dan jawaban yang diterima saat membuat pertanyaan.

### Mencocokkan

* **Matching** — Peserta didik menghubungkan item dari dua kolom
* **Matching (draggable)** — Konsep yang sama, tetapi dengan antarmuka seret-dan-lepas
* **Draggable** — Seret item ke posisi yang benar

### Jawaban Terbuka

* **Free answer (essay)** — Peserta didik menulis tanggapan teks. Memerlukan penilaian manual (atau penilaian berbantuan AI jika dikonfigurasi)
* **Oral expression** — Peserta didik merekam tanggapan audio menggunakan mikrofon
* **Upload answer** — Peserta didik mengunggah berkas sebagai jawabannya

### Hotspot

* **Hotspot** — Peserta didik mengklik area tertentu pada gambar untuk menjawab
* **Hotspot delineation** — Peserta didik menggambar batas di sekitar area pada gambar

### Terhitung

* **Calculated answer** — Pertanyaan numerik dengan rumus dan rentang toleransi. Berguna untuk kursus matematika dan sains.

### Khusus

* **Pemahaman bacaan** — Tes berdasarkan membaca suatu teks
* **Anotasi** — Pengajar mengunggah gambar dan peserta didik menganotasinya
* **Jawaban dalam dokumen Office** — Ketika plugin OnlyOffice diaktifkan, peserta didik menjawab pertanyaan dengan mengedit dokumen Office yang disematkan (Word, Excel, PowerPoint). Jawaban mereka disimpan sebagai berkas terpisah di bawah latihan sehingga dapat ditinjau bersama sisa percobaan mereka.

## Menambahkan Pertanyaan ke Latihan

1. Buka latihan dan klik **Add a question**
2. Pilih jenis pertanyaan
3. Masukkan **question text** (mendukung teks kaya dengan gambar dan pemformatan)
4. Tentukan **answers** dan penskorannya:
   * Untuk setiap opsi jawaban, tentukan apakah benar dan berapa poin nilainya
   * Anda dapat memberikan poin negatif untuk jawaban salah guna mengurangi tebakan
5. Secara opsional tambahkan **feedback** — penjelasan yang ditampilkan kepada peserta didik setelah menjawab
6. Atur **difficulty level** dan **category** (berguna untuk pemilihan acak dan pelaporan)
7. Simpan

## Kategori Pertanyaan

Anda dapat mengorganisasi pertanyaan ke dalam kategori (misalnya, "Module 1", "Vocabulary", "Advanced"). Kategori berguna untuk:

* Mengorganisasi bank pertanyaan yang besar
* Mengaktifkan pemilihan acak berdasarkan kategori (misalnya, "5 pertanyaan dari Module 1, 3 dari Module 2")
* Melihat skor yang diuraikan per kategori dalam laporan

## Penggunaan Ulang Pertanyaan

Pertanyaan dapat digunakan ulang di berbagai latihan dalam kursus yang sama. Saat menambahkan pertanyaan, Anda dapat memilih untuk membuat yang baru atau memilih pertanyaan yang sudah ada dari bank pertanyaan.

## Mengimpor Latihan

Chamilo mendukung pengimporan latihan dari format eksternal:

* **IMS QTI / Common Cartridge** — Format kuis e-learning standar
* **Moodle format** — Impor kuis dari ekspor Moodle

Untuk mengimpor, cari opsi **Import** di alat latihan dan unggah berkas Anda.

## Tips

* **Campur jenis pertanyaan** — Gabungkan pilihan ganda, isian, dan pertanyaan terbuka untuk penilaian yang komprehensif
* **Gunakan kategori** — Organisasikan pertanyaan menurut topik untuk memungkinkan pemilihan acak yang terarah
* **Tetapkan persentase kelulusan** — Berikan peserta didik target yang jelas dan kaitkan dengan pembuatan sertifikat melalui Gradebook
* **Gunakan umpan balik langsung untuk latihan** — Buat latihan tanpa nilai dengan umpan balik langsung untuk membantu peserta didik belajar dari kesalahan mereka
* **Acak untuk integritas** — Aktifkan urutan pertanyaan acak dan jawaban acak untuk mengurangi kemungkinan menyalin