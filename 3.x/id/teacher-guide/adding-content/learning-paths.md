# Learning Path

Learning path memungkinkan Anda membuat urutan terstruktur dari aktivitas pembelajaran. Learning path memandu peserta didik melalui urutan tertentu dokumen, latihan, tautan, dan sumber daya lain, dengan prasyarat opsional dan pelacakan kemajuan.

Alat ini dapat dikatakan sebagai alat kursus yang paling banyak digunakan, karena berfungsi sebagai penyusun bagi banyak alat lain dan sangat mungkin menjadi ***satu-satunya*** alat yang dihadapi peserta didik.

## Mengapa Menggunakan Learning Path?

Learning path berguna ketika Anda ingin:

* **Mengontrol urutan** konsumsi konten — memastikan peserta didik menyelesaikan materi dasar sebelum maju
* **Melacak kemajuan** — melihat persis di mana setiap peserta didik berada dalam urutan
* **Menetapkan prasyarat** — mensyaratkan peserta didik lulus suatu latihan sebelum mengakses bagian berikutnya
* **Memberikan penyelesaian** — menghubungkan penyelesaian learning path dengan gradebook dan sertifikat
* **Mengemas konten** — membuat modul pembelajaran mandiri yang dapat dikerjakan peserta didik sesuai kecepatan mereka sendiri

## Membuat Learning Path

1. Buka alat **Learning paths** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Learning paths" data-size="line"> dari beranda kursus
2. Klik **Create a learning path**
3. Masukkan **title** dan deskripsi opsional
4. Simpan — Anda akan diarahkan ke editor learning path

## Editor Learning Path

![Editor learning path dengan pohon item di kiri dan pratinjau konten di kanan](/.gitbook/assets/learning-path-editor.png)

Editor memiliki dua area utama:

* **Panel kiri** — Daftar item (langkah) dalam learning path, ditampilkan sebagai struktur pohon
* **Panel kanan** — Konten item yang dipilih

### Menambahkan Item

Klik **Add an item** dan pilih apa yang akan ditambahkan:

| Item type | Description |
|-----------|-------------|
| **Section** | Judul yang mengelompokkan item terkait (seperti judul bab). Section tidak berisi konten itu sendiri. |
| **Document** | Berkas atau halaman web dari alat Documents kursus Anda |
| **Exercise** | Kuis atau tes dari alat Exercises |
| **Link** | URL eksternal |
| **Assignment** | Publikasi mahasiswa dari alat Assignments |
| **Forum** | Tautan ke forum kursus |
| **Survey** | Tautan ke survei |
| **Certificate** | Halaman khusus untuk memicu pembuatan sertifikat penyelesaian atau pemberian keterampilan |

### Mengatur Item

* **Seret dan lepas** item untuk mengubah urutannya
* **Sarang item** di bawah section dengan menyeretnya ke kanan
* **Hapus** item yang tidak lagi Anda butuhkan

### Menetapkan Prasyarat

Prasyarat memastikan peserta didik menyelesaikan langkah tertentu sebelum mengakses langkah lain:

1. Pilih suatu item dalam learning path
2. Buka pengaturan **prerequisites**-nya
3. Pilih item sebelumnya mana yang harus diselesaikan terlebih dahulu
4. Untuk latihan, Anda dapat mensyaratkan **skor minimum** (misalnya, "Harus memperoleh skor setidaknya 70% pada Quiz 1 sebelum mengakses Module 2")

## Pengalaman Peserta Didik

Ketika peserta didik membuka learning path:

* Mereka melihat daftar item di panel kiri
* Item yang selesai ditandai dengan tanda centang
* Item dengan prasyarat yang belum terpenuhi dikunci
* Kemajuan dilacak secara otomatis — jika peserta didik meninggalkan dan kembali, mereka melanjutkan dari tempat terakhir
* Bilah kemajuan menampilkan persentase penyelesaian keseluruhan

## Konten SCORM

Alat learning path Chamilo dapat mengimpor paket **SCORM 1.2** — standar e-learning yang paling banyak digunakan. Unggah berkas ZIP SCORM dan Chamilo akan membuat learning path darinya, melacak kemajuan dan skor sesuai spesifikasi SCORM.

Untuk mengimpor paket SCORM:

1. Di alat Learning paths, buka menu tindakan dan klik **Upload**
2. Unggah berkas ZIP
3. Chamilo membongkar dan membuat learning path secara otomatis

### Paket CMI5 / xAPI

Paket CMI5 (penerus modern berbasis xAPI untuk SCORM) didukung melalui plugin **XApi**. Setelah plugin diaktifkan oleh administrator Anda, Anda dapat mengimpor paket CMI5 dan peserta didik dapat menjalankannya dari kursus; pernyataan mereka diteruskan ke Learning Record Store yang dikonfigurasi.

## Penulisan Konten dengan C-Studio

*Tersedia jika administrator Anda telah mengaktifkan plugin C-Studio.*

C-Studio menambahkan editor visual seret-dan-lepas bawaan untuk membuat konten interaktif langsung di dalam learning path — alternatif untuk mengimpor paket SCORM ketika Anda tidak memiliki (atau tidak ingin mempelajari) alat authoring terpisah seperti Articulate atau iSpring. Anda membangun konten halaman demi halaman langsung di Chamilo, dan konten itu disimpan serta dilacak seperti item learning path lainnya.

### Memulai Proyek C-Studio

Ketika plugin aktif, daftar Learning Path menampilkan tombol tambahan di samping menu tindakan biasa, ditandai dengan "+" dan tooltip "Studio Tools":

![Daftar Learning Path yang menampilkan tombol C-Studio "Studio Tools" di samping menu tindakan standar](/.gitbook/assets/cstudio-lp-button.png)

Klik tombol tersebut untuk memulai. Anda akan diminta membuat proyek baru dari awal atau mengimpor proyek yang sudah ada:

![Layar awal C-Studio yang menawarkan opsi membuat proyek baru atau mengimpor proyek yang sudah ada](/.gitbook/assets/cstudio-start-screen.png)

Layar khusus ini saat ini hanya tersedia dalam bahasa Prancis, terlepas dari bahasa platform atau kursus Anda — keterbatasan yang diketahui pada versi plugin yang digunakan. Beri judul pada proyek Anda dan editor akan langsung terbuka.

### Editor

![Editor visual C-Studio, menampilkan kanvas halaman, palet alat di kanan, dan panel proyek di kiri](/.gitbook/assets/cstudio-editor.png)

Editor adalah pembangun visual halaman demi halaman:

* **Panel kiri** — halaman-halaman proyek Anda, dengan "+" untuk menambah halaman, dan bagian **Tools** di bagian bawah (Clean data, Preview, Colors, Options, Quit)
* **Kanvas tengah** — halaman yang sedang Anda bangun; klik elemen mana pun untuk mengeditnya di tempat
* **Panel kanan** — palet komponen, yang diseret ke kanvas

Palet mencakup blok penyusun dasar (kolom, gambar, audio, judul, teks, tombol, kartu) serta beberapa jenis latihan interaktif: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words**, dan **Sort paragraphs**, ditambah blok **iframe** untuk menyematkan konten eksternal dan blok **Quiz**.

### Bahasa

Antarmuka C-Studio sendiri mungkin secara default menggunakan bahasa Prancis saat pertama kali dibuka, terlepas dari bahasa antarmuka Chamilo atau bahasa kursus. Jika demikian, buka **File > UI language** dan pilih bahasa Anda — editor akan dimuat ulang segera dan mengingat pilihan Anda setelahnya.

![Menu File terbuka, menampilkan opsi "UI language"](/.gitbook/assets/cstudio-file-menu.png)

### Menyimpan dan Mengekspor

Gunakan **File > Save** saat Anda bekerja. **File > Export...** mengemas proyek Anda sebagai berkas SCORM yang dapat diunduh, dicadangkan, atau digunakan kembali di tempat lain melalui **Import...**. **File > Quit** mengembalikan Anda ke daftar learning path, di mana proyek C-Studio Anda kini muncul sebagai item biasa.

## Pengaturan Learning Path

Konfigurasikan perilaku learning path:

| Pengaturan | Deskripsi |
|---------|-------------|
| **Visibility** | Sembunyikan atau tampilkan learning path kepada peserta didik |
| **Prerequisites** | Wajibkan penyelesaian learning path lain sebelum yang ini |
| **Auto-launch** | Buka learning path ini secara otomatis ketika peserta didik masuk ke kursus |
| **Accumulated SCORM time** | Apakah waktu diakumulasi di beberapa sesi |

## Menghubungkan ke Gradebook

Anda dapat menyertakan penyelesaian learning path sebagai aktivitas bernilai dalam Gradebook. Hal ini memungkinkan kemajuan learning path berkontribusi pada nilai keseluruhan kursus peserta didik dan kelayakan sertifikat.

## Menggunakan AI

Jika administrator telah mengaktifkan pembuatan learning path berbantuan AI, Anda akan menemukan opsi generator AI di menu tindakan drop-down. Berikan AI konteks sejelas mungkin sesuai learning path yang Anda inginkan, minta sejumlah halaman dan perkiraan jumlah kata per halaman, lalu tentukan apakah Anda ingin mengisinya dengan tes dan jalankan. Beberapa menit kemudian, Anda melihat learning path berbasis teks yang lengkap.

Edit dokumen untuk menghasilkan ilustrasi dengan AI lebih lanjut dan Anda hanya perlu meninjau sebelum membagikannya kepada peserta didik.

## Tips

* **Mulai dengan kerangka** — Rencanakan bagian dan item sebelum membangun path
* **Gunakan bagian sebagai bab** — Kelompokkan item terkait di bawah judul bagian agar lebih jelas
* **Tetapkan prasyarat untuk penilaian** — Wajibkan peserta didik mempelajari konten sebelum mengikuti kuis
* **Campurkan jenis konten** — Gabungkan bahan bacaan, video, latihan interaktif, dan sumber daya eksternal untuk pengalaman belajar yang menarik
* **Periksa tampilan peserta didik** — Gunakan fitur Student View untuk merasakan learning path sebagaimana peserta didik
* **Gunakan SCORM untuk interaktivitas** — Jika Anda memiliki akses ke alat authoring SCORM (seperti Articulate, iSpring, atau sejenisnya), buat konten interaktif yang kaya dan impor ke Chamilo. Jika administrator Anda telah mengaktifkan plugin C-Studio, Anda dapat membangun konten interaktif serupa langsung di Chamilo — lihat [Authoring Konten dengan C-Studio](#content-authoring-with-c-studio) di atas