# Latihan

Alat latihan (juga disebut "tes") memungkinkan Anda membuat kuis dan ujian dengan penilaian otomatis. Chamilo mendukung berbagai jenis pertanyaan, mulai dari pilihan ganda sederhana hingga pertanyaan hotspot interaktif.

## Membuat Latihan

1. Buka alat **Latihan** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Latihan" data-size="line"> dari halaman utama kursus
2. Klik **Latihan baru**
3. Masukkan **judul** dan **deskripsi** opsional
4. Konfigurasikan pengaturan latihan (lihat di bawah)
5. Simpan, lalu tambahkan pertanyaan

## Pengaturan Latihan

![Panel pengaturan latihan dengan opsi untuk tampilan, waktu, percobaan, dan umpan balik](/.gitbook/assets/exercise-settings.png)

### Tampilan dan Navigasi

| Pengaturan | Opsi | Deskripsi |
|------------|------|-----------|
| **Tata letak pertanyaan** | Semua dalam satu halaman / Satu per halaman | Menampilkan semua pertanyaan sekaligus atau satu per satu |
| **Sembunyikan judul pertanyaan** | Ya / Tidak | Apakah judul pertanyaan ditampilkan kepada peserta didik |
| **Tampilkan tombol sebelumnya** | Ya / Tidak | Mengizinkan peserta didik kembali ke pertanyaan sebelumnya |
| **Cegah navigasi mundur** | Ya / Tidak | Memaksa peserta didik menjawab secara berurutan tanpa kembali |

### Waktu dan Ketersediaan

| Pengaturan | Deskripsi |
|------------|-----------|
| **Batas waktu** | Waktu maksimum (dalam menit) untuk menyelesaikan latihan. Timer mundur ditampilkan kepada peserta didik |
| **Tanggal mulai** | Kapan latihan mulai tersedia bagi peserta didik |
| **Tanggal berakhir** | Kapan latihan berhenti tersedia |

### Percobaan dan Penilaian

| Pengaturan | Deskripsi |
|------------|-----------|
| **Percobaan maksimum** | Berapa kali peserta didik dapat mengikuti latihan (0 = tidak terbatas) |
| **Persentase lulus** | Skor minimum untuk lulus (misalnya, 70%). Peserta didik yang tidak mencapai ambang batas ini akan melihat pesan gagal |
| **Propagasi penilaian negatif** | Apakah poin negatif pada pertanyaan individu mengurangi total skor di bawah nol |

### Umpan Balik

| Pengaturan | Opsi |
|------------|------|
| **Di akhir** | Menampilkan hasil dan jawaban yang benar setelah peserta didik mengirimkan |
| **Segera** | Menampilkan umpan balik setelah setiap pertanyaan (berguna untuk latihan pembelajaran) |
| **Mode ujian** | Tidak menampilkan umpan balik atau hasil apa pun |

### Tampilan Hasil

Mengontrol apa yang dilihat peserta didik setelah menyelesaikan latihan:

* Menampilkan skor dan jawaban yang diharapkan
* Menampilkan skor saja
* Menampilkan skor dengan rincian kategori
* Menampilkan peringkat di antara peserta didik lainnya
* Menampilkan hanya pada percobaan terakhir
* Menampilkan visualisasi grafik radar

### Pesan Penyelesaian

* **Pesan sukses** — Teks khusus yang ditampilkan saat peserta didik lulus
* **Pesan gagal** — Teks khusus yang ditampilkan saat peserta didik tidak mencapai persentase lulus

### Pengacakan Pertanyaan

| Pengaturan | Deskripsi |
|------------|-----------|
| **Urutan pertanyaan acak** | Mengacak urutan pertanyaan untuk setiap percobaan |
| **Jawaban acak** | Mengacak opsi jawaban dalam setiap pertanyaan |
| **Acak berdasarkan kategori** | Memilih pertanyaan secara acak dari setiap kategori pertanyaan |

Anda juga dapat mengonfigurasi strategi pemilihan lanjutan yang menggabungkan kategori dan pengacakan.

## Jenis Pertanyaan

![Gambaran umum jenis pertanyaan yang tersedia di antarmuka pembuatan latihan](/.gitbook/assets/exercise-question-types.png)

Chamilo menawarkan berbagai jenis pertanyaan yang diorganisasi ke dalam beberapa kategori:

### Pilihan Tunggal

* **Pilihan ganda (jawaban tunggal)** — Peserta didik memilih satu jawaban yang benar dari daftar opsi
* **Jawaban tunggal dengan gambar** — Sama seperti di atas, tetapi opsi jawaban ditampilkan sebagai gambar

### Pilihan Ganda

* **Jawaban ganda** — Peserta didik memilih satu atau lebih jawaban yang benar
* **Jawaban ganda (dropdown)** — Opsi jawaban disajikan sebagai menu dropdown
* **Benar/Salah** — Serangkaian pernyataan yang ditandai peserta didik sebagai benar atau salah
* **Benar/Salah dengan tingkat kepastian** — Benar/salah dengan tingkat kepercayaan tambahan, memungkinkan penilaian yang lebih terperinci

### Isi Tempat Kosong

* **Isi tempat kosong** — Peserta didik melengkapi kata-kata yang hilang dalam teks. Anda menentukan tempat kosong dan jawaban yang diterima saat membuat pertanyaan.

### Pencocokan

* **Pencocokan** — Peserta didik menghubungkan item dari dua kolom
* **Pencocokan (dapat diseret)** — Konsep yang sama, tetapi dengan antarmuka seret-dan-lepaskan
* **Dapat diseret** — Seret item ke posisi yang benar

### Terbuka

* **Jawaban bebas (esai)** — Peserta didik menulis tanggapan teks. Memerlukan penilaian manual (atau penilaian berbantuan AI jika dikonfigurasi)
* **Ekspresi lisan** — Peserta didik merekam tanggapan audio menggunakan mikrofon mereka
* **Unggah jawaban** — Peserta didik mengunggah file sebagai jawaban mereka

### Hotspot

* **Hotspot** — Peserta didik mengklik area tertentu pada gambar untuk menjawab
* **Penandaan hotspot** — Peserta didik menggambar batas di sekitar area pada gambar

### Terhitung

* **Jawaban terhitung** — Pertanyaan numerik dengan formula dan rentang toleransi. Berguna untuk kursus matematika dan sains.

---
### Khusus

* **Pemahaman Bacaan** — Tes berdasarkan membaca sebuah bagian teks
* **Anotasi** — Guru mengunggah gambar dan peserta didik memberi anotasi padanya
* **Jawaban dalam Dokumen Office** — Ketika plugin OnlyOffice diaktifkan, peserta didik menjawab pertanyaan dengan mengedit dokumen Office yang disematkan (Word, Excel, PowerPoint). Tanggapan mereka disimpan sebagai file terpisah di bawah latihan sehingga dapat ditinjau bersama dengan sisa upaya mereka.

## Menambahkan Pertanyaan ke Latihan

1. Buka latihan dan klik **Tambah pertanyaan**
2. Pilih jenis pertanyaan
3. Masukkan **teks pertanyaan** (mendukung teks kaya dengan gambar dan pemformatan)
4. Tentukan **jawaban** dan penilaiannya:
   * Untuk setiap opsi jawaban, tentukan apakah itu benar dan berapa poin yang bernilai
   * Anda dapat memberikan poin negatif untuk jawaban yang salah untuk mencegah tebakan
5. Secara opsional tambahkan **umpan balik** — penjelasan yang ditunjukkan kepada peserta didik setelah menjawab
6. Tetapkan **tingkat kesulitan** dan **kategori** (berguna untuk pemilihan acak dan pelaporan)
7. Simpan

## Kategori Pertanyaan

Anda dapat mengatur pertanyaan ke dalam kategori (misalnya, "Modul 1", "Kosakata", "Lanjutan"). Kategori berguna untuk:

* Mengatur bank pertanyaan yang besar
* Mengaktifkan pemilihan acak berdasarkan kategori (misalnya, "5 pertanyaan dari Modul 1, 3 dari Modul 2")
* Melihat skor yang diuraikan berdasarkan kategori dalam laporan

## Penggunaan Ulang Pertanyaan

Pertanyaan dapat digunakan kembali di berbagai latihan dalam kursus yang sama. Saat menambahkan pertanyaan, Anda dapat memilih untuk membuat yang baru atau memilih pertanyaan yang sudah ada dari bank pertanyaan.

## Mengimpor Latihan

Chamilo mendukung impor latihan dari format eksternal:

* **IMS QTI / Common Cartridge** — Format kuis e-learning standar
* **Format Moodle** — Impor kuis dari ekspor Moodle

Untuk mengimpor, cari opsi **Impor** di alat latihan dan unggah file Anda.

## Tips

* **Campur jenis pertanyaan** — Gabungkan pilihan ganda, isi titik-titik, dan pertanyaan terbuka untuk penilaian yang komprehensif
* **Gunakan kategori** — Atur pertanyaan berdasarkan topik untuk memungkinkan pemilihan acak yang ditargetkan
* **Tetapkan persentase lulus** — Berikan target yang jelas kepada peserta didik dan hubungkan dengan pembuatan sertifikat melalui Gradebook
* **Gunakan umpan balik langsung untuk latihan** — Buat latihan praktik tanpa nilai dengan umpan balik langsung untuk membantu peserta didik belajar dari kesalahan mereka
* **Acak untuk integritas** — Aktifkan urutan pertanyaan acak dan jawaban acak untuk mengurangi kemungkinan menyalin