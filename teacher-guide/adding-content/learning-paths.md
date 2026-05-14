# Jalur Pembelajaran

Jalur pembelajaran memungkinkan Anda membuat urutan terstruktur dari aktivitas pembelajaran. Jalur pembelajaran ini membimbing peserta didik melalui urutan tertentu dari dokumen, latihan, tautan, dan sumber daya lainnya, dengan prasyarat opsional dan pelacakan kemajuan.

Alat ini bisa dikatakan sebagai alat kursus yang paling sering digunakan, karena berfungsi sebagai penyusun untuk banyak alat lain dan bisa menjadi ***satu-satunya*** alat yang langsung berhadapan dengan peserta didik.

## Mengapa Menggunakan Jalur Pembelajaran?

Jalur pembelajaran berguna ketika Anda ingin:

* **Mengontrol urutan** konsumsi konten — memastikan peserta didik menyelesaikan materi dasar sebelum melanjutkan
* **Melacak kemajuan** — melihat dengan tepat di mana setiap peserta didik berada dalam urutan tersebut
* **Menetapkan prasyarat** — mewajibkan peserta didik lulus latihan sebelum mengakses bagian berikutnya
* **Memberikan penghargaan penyelesaian** — menghubungkan penyelesaian jalur pembelajaran dengan buku nilai dan sertifikat
* **Mengemas konten** — membuat modul pembelajaran mandiri yang dapat dikerjakan peserta didik sesuai kecepatan mereka sendiri

## Membuat Jalur Pembelajaran

1. Buka alat **Jalur Pembelajaran** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Jalur Pembelajaran" data-size="line"> dari halaman utama kursus
2. Klik **Buat jalur pembelajaran**
3. Masukkan **judul** dan deskripsi opsional
4. Simpan — Anda akan dibawa ke editor jalur pembelajaran

## Editor Jalur Pembelajaran

![Editor jalur pembelajaran dengan pohon item di sebelah kiri dan pratinjau konten di sebelah kanan](/.gitbook/assets/learning-path-editor.png)

Editor memiliki dua area utama:

* **Panel kiri** — Daftar item (langkah-langkah) dalam jalur pembelajaran, ditampilkan sebagai struktur pohon
* **Panel kanan** — Konten dari item yang dipilih

### Menambahkan Item

Klik **Tambah item** dan pilih apa yang akan ditambahkan:

| Tipe Item | Deskripsi |
|-----------|-----------|
| **Bagian** | Judul yang mengelompokkan item terkait (seperti judul bab). Bagian tidak berisi konten itu sendiri. |
| **Dokumen** | File atau halaman web dari alat Dokumen kursus Anda |
| **Latihan** | Kuis atau tes dari alat Latihan |
| **Tautan** | URL eksternal |
| **Tugas** | Publikasi siswa dari alat Tugas |
| **Forum** | Tautan ke forum kursus |
| **Survei** | Tautan ke survei |
| **Sertifikat** | Halaman khusus untuk memicu pembuatan sertifikat penyelesaian atau pemberian keterampilan |

### Mengatur Item

* **Seret dan lepas** item untuk mengubah urutannya
* **Susun item** di bawah bagian dengan menyeretnya ke kanan
* **Hapus** item yang tidak lagi Anda perlukan

### Menetapkan Prasyarat

Prasyarat memastikan peserta didik menyelesaikan langkah tertentu sebelum mengakses yang lain:

1. Pilih item dalam jalur pembelajaran
2. Buka pengaturan **prasyarat**-nya
3. Pilih item sebelumnya yang harus diselesaikan terlebih dahulu
4. Untuk latihan, Anda dapat mewajibkan **skor minimum** (misalnya, "Harus mendapatkan skor minimal 70% pada Kuis 1 sebelum mengakses Modul 2")

## Pengalaman Peserta Didik

Ketika peserta didik membuka jalur pembelajaran:

* Mereka melihat daftar item di panel kiri
* Item yang telah selesai ditandai dengan tanda centang
* Item dengan prasyarat yang belum terpenuhi akan terkunci
* Kemajuan dilacak secara otomatis — jika peserta didik meninggalkan dan kembali, mereka melanjutkan dari tempat terakhir mereka berhenti
* Bilah kemajuan menunjukkan persentase penyelesaian keseluruhan

## Konten SCORM

Alat jalur pembelajaran Chamilo dapat mengimpor paket **SCORM 1.2** — standar e-learning yang paling banyak digunakan. Unggah file ZIP SCORM dan Chamilo akan membuat jalur pembelajaran darinya, melacak kemajuan dan skor sesuai spesifikasi SCORM.

Untuk mengimpor paket SCORM:

1. Di alat Jalur Pembelajaran, buka menu tindakan dan klik **Unggah**
2. Unggah file ZIP
3. Chamilo akan membongkar dan membuat jalur pembelajaran secara otomatis

### Paket CMI5 / xAPI

Paket CMI5 (penerus modern berbasis xAPI dari SCORM) didukung melalui plugin **XApi**. Setelah plugin diaktifkan oleh administrator Anda, Anda dapat mengimpor paket CMI5 dan peserta didik dapat meluncurkannya dari kursus; pernyataan mereka diteruskan ke Learning Record Store yang dikonfigurasi.

## Pengaturan Jalur Pembelajaran

Konfigurasikan cara kerja jalur pembelajaran:

| Pengaturan | Deskripsi |
|------------|-----------|
| **Visibilitas** | Sembunyikan atau tampilkan jalur pembelajaran kepada peserta didik |
| **Prasyarat** | Wajibkan penyelesaian jalur pembelajaran lain sebelum yang ini |
| **Peluncuran Otomatis** | Buka jalur pembelajaran ini secara otomatis ketika peserta didik masuk ke kursus |
| **Waktu SCORM Terakumulasi** | Apakah akan mengakumulasi waktu lintas beberapa sesi |

## Menghubungkan ke Buku Nilai

Anda dapat menyertakan penyelesaian jalur pembelajaran sebagai aktivitas yang dinilai di Buku Nilai. Ini memungkinkan kemajuan jalur pembelajaran berkontribusi pada nilai keseluruhan kursus peserta didik dan kelayakan sertifikat.

---
## Menggunakan AI

Jika administrator telah mengaktifkan pembuatan jalur pembelajaran berbantuan AI, Anda akan menemukan opsi generator AI di menu tindakan tarik-turun. Berikan konteks yang sejelas mungkin kepada AI sesuai dengan jalur pembelajaran yang Anda inginkan, tentukan jumlah halaman dan perkiraan jumlah kata per halaman, lalu beri tahu apakah Anda ingin mengisinya dengan tes dan meluncurkannya. Beberapa menit kemudian, Anda akan melihat jalur pembelajaran berbasis teks yang lengkap.

Sunting dokumen untuk menghasilkan ilustrasi dengan bantuan AI lebih lanjut, dan Anda hanya perlu melakukan beberapa tinjauan sebelum dapat membagikannya kepada peserta didik Anda.

## Tips

* **Mulailah dengan kerangka** — Rencanakan bagian dan item sebelum membangun jalur pembelajaran
* **Gunakan bagian sebagai bab** — Kelompokkan item yang terkait di bawah judul bagian untuk kejelasan
* **Tetapkan prasyarat untuk penilaian** — Wajibkan peserta didik untuk mempelajari konten sebelum mengikuti kuis
* **Campurkan jenis konten** — Gabungkan materi bacaan, video, latihan interaktif, dan sumber daya eksternal untuk pengalaman belajar yang menarik
* **Periksa tampilan peserta didik** — Gunakan fitur Tampilan Siswa untuk merasakan jalur pembelajaran seperti yang dialami oleh peserta didik
* **Gunakan SCORM untuk interaktivitas** — Jika Anda memiliki akses ke alat pembuatan SCORM (seperti Articulate, iSpring, atau yang serupa), buat konten interaktif yang kaya dan impor ke dalam Chamilo