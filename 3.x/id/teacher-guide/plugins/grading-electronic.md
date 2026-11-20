# Grading Electronic

Grading Electronic <img src="../../.gitbook/assets/icons/mdi-export.svg" alt="Grading Electronic" data-size="line"> mengekspor peserta didik yang lulus kursus Anda, beserta skor buku nilainya, ke berkas yang diimpor oleh lembaga sertifikasi eksternal: berupa berkas teks berformat tetap atau lembar kerja daftar peserta.

## Membuka Blok Ekspor

Setelah diaktifkan, bilah alat pada alat **Penilaian** (buku nilai) kursus Anda memperoleh ikon **Ekspor**. Klik ikon tersebut untuk menampilkan blok **Grading Electronic** pada halaman yang sama; klik lagi untuk menyembunyikannya.

Blok ini memiliki tiga bidang:

* **Pratinjau** — dicentang secara bawaan. Selama dicentang, tidak ada yang disimpan: blok hanya menampilkan apa yang akan terkandung dalam ekspor
* **Rentang tanggal** — tanggal mulai dan tanggal selesai kursus. Tanggal mulai masuk ke baris header berkas teks, sedangkan tanggal selesai adalah tanggal setiap peserta didik lulus
* **ID Kursus** — pengidentifikasi kursus di lembaga sertifikasi. Bidang ini terisi sebelumnya dengan nilai yang digunakan pada ekspor sebelumnya

## Mempratinjau Ekspor

Dengan **Pratinjau** dicentang, blok menawarkan satu tombol **Pratinjau**. Tombol ini mencantumkan setiap peserta didik kursus (atau sesi tempat Anda berada) beserta skor dan status **PASS** atau **SKIP**, serta menampilkan isi berkas teks. Hanya peserta didik yang memenuhi kriteria kelulusan buku nilai yang ditandai **PASS**; yang lain tidak disertakan dalam ekspor.

## Membuat Berkas

Hapus centang **Pratinjau** untuk mengganti tombol **Pratinjau** dengan dua tombol:

* **Hasilkan TXT** — mengunduh berkas teks berformat tetap: satu baris header berisi ID penyedia, ID kursus, dan tanggal mulai, lalu satu baris untuk setiap peserta didik yang lulus
* **Hasilkan XLSX** — mengunduh lembar kerja daftar peserta, dengan satu baris untuk setiap peserta didik yang lulus dan kolom **FireTRAQ ID**, **First Name**, **Last Name**, **Score**, **Grade**, **Date Earned**, dan **Comment**

Kedua tombol melakukan hal yang sama selain menghasilkan berkas: keduanya menyimpan **ID Kursus** untuk ekspor berikutnya dan, jika buku nilai menghasilkan sertifikat, membuat sertifikat setiap peserta didik yang lulus.

## Isi Lembar Kerja

* **FireTRAQ ID** — ID peserta didik di lembaga sertifikasi, dibaca dari bidang profil `fcdice_or_acadis_student_id`
* **Score** — skor buku nilai sebagai persentase utuh (0 hingga 100), berapa pun bobot total buku nilai
* **Grade** — selalu **Pass**, karena hanya peserta didik yang lulus yang diekspor. Sel tetap menawarkan pilihan **Pass**, **Fail**, dan **Incomplete** jika Anda perlu menyunting berkas
* **Date Earned** — tanggal selesai dari rentang tanggal
* **Comment** — dibiarkan kosong

## Tips

* **Periksa ID peserta didik terlebih dahulu** — Peserta didik tanpa ID di profilnya tetap diekspor, dengan **FireTRAQ ID** kosong. Gunakan pratinjau untuk menemukannya sebelum membuat berkas
* **ID penyedia dan jam kursus** berasal dari bidang tambahan kursus, yang ditetapkan oleh administrator Anda saat plugin dipasang