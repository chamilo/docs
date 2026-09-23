# Penilaian

Penilaian (sebelumnya *gradebook*) menggabungkan skor dari latihan, tugas, dan aktivitas berbobot lainnya ke dalam tampilan terpadu kinerja setiap peserta didik. Fitur ini juga mengendalikan pembuatan sertifikat.

## Cara Kerja Penilaian

Penilaian adalah sistem penskoran berbobot. Anda menentukan:

1. **Aktivitas mana** yang berkontribusi pada nilai (latihan, tugas, kehadiran, dll.)
2. **Bobot** setiap aktivitas (seberapa besar kontribusinya terhadap nilai akhir)
3. **Skor sertifikasi minimum** (ambang batas untuk memperoleh sertifikat)
4. **Skor minimum per aktivitas** — Setiap aktivitas dalam gradebook dapat memiliki **Skor minimum** sendiri. Peserta didik yang skornya di bawah minimum tersebut pada aktivitas kunci dapat dicegah mencapai tujuan dan memperoleh sertifikat, meskipun total berbobot keseluruhan mereka cukup tinggi.

Aktivitas dapat berupa 2 jenis:
* **Aktivitas kelas** (atau aktivitas tatap muka), di mana nilai harus diimpor dari sumber lain
* **Aktivitas daring** yang dipilih dari kursus, di mana nilai diperoleh melalui penyelesaian aktivitas di dalam kursus

Chamilo menghitung nilai keseluruhan setiap peserta didik berdasarkan bobot tersebut.

## Menyiapkan Penilaian

1. Buka alat **Penilaian** <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Gradebook" data-size="line"> dari beranda kursus
2. Anda akan melihat ringkasan penilaian, yang awalnya kosong

### Menambahkan Aktivitas

1. Klik **Tambah aktivitas daring**
2. Pilih jenisnya:
   * **Tes** — tautkan latihan tertentu dari kursus
   * **Tugas** — tautkan folder publikasi mahasiswa
   * **Jalur pembelajaran** — tautkan penyelesaian jalur pembelajaran
   * **Kehadiran** — tautkan lembar kehadiran
   * **Utas forum** — tautkan utas forum (yang harus dinilai secara manual)
   * **Survei** — tautkan survei
3. Pilih aktivitas spesifik dalam jenis yang dipilih
4. Atur **Bobot** untuk aktivitas ini (misalnya, 30% untuk ujian tengah semester, 40% untuk proyek akhir)
5. Atur **Skor minimum** jika berlaku
6. Simpan

Total bobot semua aktivitas harus berjumlah 100%.

### Subkategori

Untuk skema penilaian yang kompleks, Anda dapat membuat **subkategori** untuk mengelompokkan aktivitas terkait:

* **Contoh**: Subkategori "Pekerjaan rumah" (bobot: 30%) yang berisi lima tugas individu, masing-masing bernilai 20% dari subkategori
* Subkategori memungkinkan Anda mengatur penilaian secara hierarkis sambil menjaga perhitungan keseluruhan tetap sederhana

## Melihat Nilai

![Tabel ringkasan gradebook yang menampilkan nama peserta didik, skor aktivitas, dan total berbobot](../../.gitbook/assets/gradebook-overview.png)

Penilaian menampilkan tabel dengan:

* Nama setiap peserta didik
* Skor untuk setiap aktivitas
* Total berbobot
* Apakah peserta didik memenuhi syarat untuk sertifikat

Anda dapat mengurutkan menurut kolom mana pun untuk dengan cepat mengidentifikasi peserta didik berprestasi atau yang mengalami kesulitan.

### Grafik Distribusi Skor

Di bawah tabel, dan pada halaman **Tampilan grafis**, penilaian menggambar satu grafik batang
per aktivitas plus satu untuk total. Setiap grafik adalah grafik kolom:
sumbu horizontal mencantumkan rentang skor Anda dari terendah hingga tertinggi, dan
tinggi setiap batang adalah jumlah peserta didik dalam rentang tersebut.

Grafik **Total** juga menandai rata-rata kelas. Titik merah berada pada rentang
yang memuat rata-rata, dan legenda memberikan persentase yang tepat.

Grafik ini hanya muncul ketika aturan tampilan skor telah diatur. Jika Anda melihat
pesan *To view graph score rule must be enabled*, tentukan rentang Anda terlebih dahulu
di pengaturan penskoran penilaian.

## Sertifikat

Untuk mengaktifkan pembuatan sertifikat:

1. Di pengaturan penilaian, atur **skor sertifikasi minimum** (misalnya, 70%)
2. Ketika total berbobot peserta didik mencapai atau melebihi ambang ini (dan mereka tidak gagal pada skor minimum per aktivitas mana pun), mereka dapat mengunduh sertifikat mereka
3. Sertifikat dihasilkan dari templat yang dikonfigurasi oleh administrator platform

Setelah **Generate certificates** diaktifkan pada kategori akar, kolom **Certificate validity (days)** muncul. Biarkan pada `0` untuk sertifikat yang tidak pernah kedaluwarsa, atau atur jumlah hari setelah itu sertifikat kedaluwarsa — Chamilo kemudian dapat mengingatkan peserta didik saat tanggal kedaluwarsa mendekat, secara otomatis (cron, dikonfigurasi admin) atau secara manual dari daftar sertifikat.

![Dialog sunting kategori dengan Generate certificates diaktifkan dan kolom Certificate validity (days) diatur ke 365](../../.gitbook/assets/gradebook-certificate-validity-field.png)

Lihat [Sertifikat dan Keterampilan](../tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) untuk detail lebih lanjut.

## Menautkan ke Keterampilan

Anda dapat mengaitkan **keterampilan** dengan penilaian. Ketika peserta didik mencapai tujuan yang ditetapkan untuk menyelesaikan penilaian, mereka dapat memperoleh sertifikat, memperoleh keterampilan, atau keduanya. Keterampilan terlihat pada profil mereka di ruang jejaring sosial. Hal ini membangun rekam kompetensi seiring waktu.

## Mengekspor Nilai

Klik tombol **Ekspor** <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Ekspor" data-size="line"> untuk mengunduh nilai sebagai spreadsheet. Ini berguna untuk:

* Membagikan nilai ke sistem administrasi
* Melakukan analisis tambahan di luar Chamilo
* Menyimpan catatan secara luring

## Tips

* **Rencanakan bobot sejak awal** — Tentukan skema penilaian di awal kursus agar peserta didik mengetahui apa yang diharapkan
* **Gunakan subkategori untuk kursus yang kompleks** — Kelompokkan tugas, kuis, dan partisipasi ke dalam kategori yang jelas
* **Tetapkan ambang kelulusan yang bermakna** — Skor sertifikasi harus mencerminkan kompetensi yang sesungguhnya, bukan hanya partisipasi
* **Periksa secara berkala** — Tinjau gradebook secara berkala untuk memastikan semua aktivitas terhubung dengan benar dan skor tercatat