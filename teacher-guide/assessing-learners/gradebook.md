# Penilaian

Penilaian (sebelumnya *gradebook*) menggabungkan skor dari latihan, tugas, dan aktivitas yang dinilai lainnya ke dalam tampilan terpadu tentang kinerja setiap peserta didik. Ini juga mengontrol pembuatan sertifikat.

## Cara Kerja Penilaian

Penilaian adalah sistem penilaian berbobot. Anda menentukan:

1. **Aktivitas mana** yang berkontribusi pada nilai (latihan, tugas, kehadiran, dll.)
2. **Bobot** setiap aktivitas (seberapa besar kontribusinya terhadap nilai akhir)
3. **Skor minimum sertifikasi** (ambang batas untuk mendapatkan sertifikat)
4. **Skor minimum per aktivitas** — Setiap aktivitas dalam buku nilai dapat memiliki **Skor Minimum** sendiri. Peserta didik yang mendapatkan skor di bawah minimum pada aktivitas kunci dapat dicegah untuk mencapai tujuan dan mendapatkan sertifikat, meskipun total bobot keseluruhan mereka cukup tinggi.

Aktivitas dapat terdiri dari 2 jenis:
* **Aktivitas kelas** (atau aktivitas tatap muka), di mana nilai harus diimpor dari sumber lain
* **Aktivitas daring** yang dipilih dari kursus, di mana nilai diperoleh melalui penyelesaian aktivitas dalam kursus

Chamilo menghitung nilai keseluruhan setiap peserta didik berdasarkan bobot ini.

## Menyiapkan Penilaian

1. Buka alat **Penilaian** <img src="/.gitbook/assets/icons/mdi-certificate.svg" alt="Buku Nilai" data-size="line"> dari beranda kursus
2. Anda akan melihat gambaran umum penilaian, yang awalnya kosong

### Menambahkan Aktivitas

1. Klik **Tambah aktivitas daring**
2. Pilih jenisnya:
   * **Tes** — Tautkan latihan tertentu dari kursus
   * **Tugas** — Tautkan folder publikasi siswa
   * **Jalur pembelajaran** — Tautkan penyelesaian jalur pembelajaran
   * **Kehadiran** — Tautkan lembar kehadiran
   * **Thread forum** — Tautkan thread forum (yang harus dinilai secara manual)
   * **Survei** — Tautkan survei
3. Pilih aktivitas spesifik dalam jenis yang dipilih
4. Tetapkan **Bobot** untuk aktivitas ini (misalnya, 30% untuk ujian tengah semester, 40% untuk proyek akhir)
5. Tetapkan **Skor Minimum** jika berlaku
6. Simpan

Total bobot dari semua aktivitas harus mencapai 100%.

### Sub-Kategori

Untuk skema penilaian yang kompleks, Anda dapat membuat **sub-kategori** untuk mengelompokkan aktivitas yang terkait:

* **Contoh**: Sub-kategori "Pekerjaan Rumah" (bobot: 30%) yang berisi lima tugas individu masing-masing bernilai 20% dari sub-kategori
* Sub-kategori memungkinkan Anda mengatur penilaian secara hierarkis sambil menjaga perhitungan keseluruhan tetap sederhana

## Melihat Nilai

![Tabel gambaran umum buku nilai yang menunjukkan nama peserta didik, skor aktivitas, dan total bobot](/.gitbook/assets/gradebook-overview.png)

Penilaian menampilkan tabel dengan:

* Nama setiap peserta didik
* Skor untuk setiap aktivitas
* Total bobot
* Apakah peserta didik memenuhi syarat untuk mendapatkan sertifikat

Anda dapat mengurutkan berdasarkan kolom mana pun untuk dengan cepat mengidentifikasi peserta didik berprestasi tinggi atau yang kesulitan.

## Sertifikat

Untuk mengaktifkan pembuatan sertifikat:

1. Dalam pengaturan penilaian, tetapkan **skor minimum sertifikasi** (misalnya, 70%)
2. Ketika total bobot peserta didik mencapai atau melebihi ambang batas ini (dan mereka tidak gagal pada skor minimum per aktivitas), mereka dapat mengunduh sertifikat mereka
3. Sertifikat dibuat dari templat yang dikonfigurasi oleh administrator platform

Lihat [Sertifikat dan Keterampilan](../tracking-and-reporting/certificates-and-skills.md) untuk detail lebih lanjut.

## Menautkan ke Keterampilan

Anda dapat mengaitkan **keterampilan** dengan penilaian. Ketika peserta didik mencapai tujuan yang ditetapkan untuk menyelesaikan penilaian, mereka dapat memperoleh sertifikat, keterampilan, atau keduanya. Keterampilan terlihat di profil mereka di ruang jejaring sosial. Ini membangun catatan kompetensi dari waktu ke waktu.

## Mengekspor Nilai

Klik tombol **Ekspor** <img src="/.gitbook/assets/icons/mdi-export.svg" alt="Ekspor" data-size="line"> untuk mengunduh nilai sebagai spreadsheet. Ini berguna untuk:

* Berbagi nilai dengan sistem administrasi
* Melakukan analisis tambahan di luar Chamilo
* Menyimpan catatan offline

## Tips

* **Rencanakan bobot sejak dini** — Tentukan skema penilaian di awal kursus agar peserta didik tahu apa yang diharapkan
* **Gunakan sub-kategori untuk kursus yang kompleks** — Kelompokkan tugas, kuis, dan partisipasi ke dalam kategori yang jelas
* **Tetapkan ambang batas lulus yang bermakna** — Skor sertifikasi harus mencerminkan kompetensi nyata, bukan hanya partisipasi
* **Periksa secara berkala** — Tinjau buku nilai secara berkala untuk memastikan semua aktivitas terhubung dengan benar dan skor dicatat dengan baik