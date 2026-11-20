# Transkrip Akademik

Chamilo dapat menghasilkan **transkrip akademik tidak resmi** dari kursus yang telah diselesaikan dan disertifikasi oleh peserta didik, serta memungkinkan staf yang berwenang menerbitkan **transkrip resmi yang ditandatangani**. Fitur ini berbeda dari sertifikat kursus individual atau verifikasi testnet Sepolia opsionalnya.

## Mengaktifkan Fitur

Di **Administrasi > Pengaturan konfigurasi > Sertifikat**, aktifkan **Transkrip akademik** (`certificate.transcript_enabled`). Fitur ini dinonaktifkan secara default. Tinjau pengaturan tambahan program, skala penilaian, jam kursus, nomor mahasiswa, alamat, dan penandatangan di [Pengaturan Sertifikat](../platform-settings/certificate-settings.md#transcript_enabled).

Transkrip menggunakan sertifikat yang dihasilkan oleh **kategori akar buku nilai** dari kursus dan sesi yang memenuhi syarat. Transkrip hanya mencakup kursus dalam URL akses saat ini yang masih diikuti oleh peserta didik. Kursus tanpa sertifikat yang memenuhi syarat tidak menambahkan baris.

Nilai akhir yang ditampilkan adalah rata-rata skor persentase kursus yang tercantum; IPK adalah rata-rata tidak berbobot dari poin nilai yang dipetakan. Keduanya bergantung pada kursus yang disertakan pada saat peninjauan atau penerbitan.

## Kolom Transkrip

| Kolom | Konten |
|--------|---------|
| **Kursus** | Kode kursus, atau nama departemen kursus (`transcript_course_code_source`) |
| **Deskripsi** | Judul kursus, dan judul sesi untuk kursus yang diikuti dalam suatu sesi |
| **Pendaftaran** | Saat peserta didik mendaftar ke kursus atau ke sesi |
| **Jam yang diperlukan** | Nilai bidang tambahan kursus yang diatur di `transcript_hours_extra_field`, atau durasi kursus |
| **Tanggal penyelesaian** | Tanggal sertifikat |
| **Jam yang diselesaikan** | Waktu yang dihabiskan peserta didik dalam kursus, atau jam yang diperlukan ketika `transcript_completed_hours_are_required_hours` diaktifkan |
| **Nilai akhir** | Skor sertifikat |
| **Nilai** | Huruf dari `transcript_grading_scale` yang sesuai dengan skor tersebut |

## Mengakses Transkrip Peserta Didik

1. Buka **Administrasi > Pengguna > Daftar pengguna** dan temukan peserta didik. Tindakan **Transkrip** tersedia bagi administrator yang berwenang dan administrator sesi ketika fitur diaktifkan.
2. Sebagai alternatif, gunakan tindakan **Transkrip** dari halaman detail pelaporan global peserta didik yang memenuhi syarat.
3. Tinjau daftar kursus, nilai, tanggal, jam, nilai akhir, dan IPK peserta didik.
4. Pilih **Unduh transkrip tidak resmi** untuk PDF yang dibuat dari catatan peserta didik saat ini.

Halaman transkrip juga tersedia secara langsung di `/transcript?userId=<user-id>` bagi seseorang yang berwenang mengakses catatan peserta didik tersebut. Jangan menganggap mengetahui URL atau ID pengguna sebagai izin: akses diperiksa di sisi server.

Peserta didik dapat melihat transkrip **miliknya sendiri**, tetapi tidak dapat menerbitkan atau mencabut transkrip resmi. Penerbit yang berwenang adalah:

* Administrator platform/portal yang bertindak dalam cakupan pengguna/URL akses yang mereka kelola.
* Manajer SDM untuk peserta didik yang mereka ikuti.
* Administrator sesi untuk peserta didik yang terdaftar dalam sesi yang mereka kelola.

Izin ini dievaluasi per peserta didik; memiliki peran staf semata tidak memberikan akses ke setiap transkrip.

![Transkrip peserta didik yang dilihat oleh administrator, dengan kursus, nilai akhir, IPK dan skala penilaian, daftar transkrip resmi, serta blok gambar tanda tangan](../../.gitbook/assets/admin-transcript-user.png)

## Menerbitkan dan Memverifikasi Transkrip Resmi

1. Pada halaman transkrip peserta didik yang berwenang, periksa kursus, nilai, dan informasi pribadi yang saat ini ditampilkan.
2. Pilih **Terbitkan transkrip resmi** dan konfirmasikan. Chamilo menyimpan cuplikan bertanda tangan dari informasi pada saat itu.
3. Entri baru muncul di bawah **Transkrip resmi** beserta tanggal penerbitan dan penerbitnya.
4. Gunakan **Unduh** untuk PDF resmi atau **Verifikasi** untuk membuka halaman verifikasi publik.
5. Jika diperlukan, penerbit yang berwenang dapat **Mencabut** transkrip resmi tersebut. Halaman verifikasi kemudian akan melaporkan bahwa transkrip tersebut dicabut.

Setiap transkrip yang diterbitkan disimpan secara terpisah: menerbitkan versi yang lebih baru tidak secara diam-diam menulis ulang catatan bertanda tangan sebelumnya. Tautan verifikasi mengikuti `/transcripts/verify/<token>` dan juga menyediakan respons `.json`. Seseorang yang memiliki tautan verifikasi dapat memeriksa validitas tanpa masuk; kendalikan tautan ini dengan tepat karena verifikasi yang valid menampilkan detail transkrip yang ditandatangani. Catatan yang tidak valid atau dicabut tidak disajikan sebagai dokumen yang valid.

![Halaman verifikasi publik dari transkrip resmi yang valid, dengan detail dan kursusnya](../../.gitbook/assets/admin-transcript-verification.png)

Transkrip resmi ditandatangani secara digital oleh Chamilo menggunakan kunci penandatanganan institusi. **Ini bukan transaksi blockchain**; fitur Sepolia mendokumentasikan proses terpisah untuk kredensial sertifikat buku nilai.

## Gambar Tanda Tangan dan Detail Penandatangan

Administrator platform dapat mengunggah gambar tanda tangan **PNG atau JPEG** di bagian **Tanda tangan transkrip resmi** pada halaman transkrip peserta didik. Gambar tersebut milik URL akses saat ini dan digunakan dalam PDF resmi. Nama dan jabatan penandatangan berasal dari `certificate.transcript_signatory_name` dan `certificate.transcript_signatory_title`.

Hanya administrator platform yang mengelola gambar tanda tangan; penerbit transkrip resmi lainnya yang berwenang tidak memperoleh izin ini secara otomatis. Lindungi kunci penandatanganan institusi dan penyimpanan gambar tanda tangan privat sebagai bagian dari prosedur pencadangan dan kontrol akses portal. Keduanya disimpan di luar folder web publik, di `var/certificate-issuer/`, bersama kunci yang juga menandatangani kredensial sertifikat buku nilai: sertakan folder ini dalam [cadangan](../maintenance/backups.md) Anda, atau setiap transkrip dan kredensial yang telah diterbitkan tidak lagi dapat diverifikasi.

## Pemecahan Masalah

* **Tautan transkrip tidak ada:** periksa `certificate.transcript_enabled` dan cakupan pengguna saat ini.
* **Tidak ada mata kuliah yang diselesaikan:** peserta didik memerlukan sertifikat buku nilai akar yang memenuhi syarat dan pendaftaran mata kuliah/sesi saat ini yang sesuai pada URL akses ini.
* **Nomor mahasiswa, jam, huruf nilai, atau judul program tidak benar:** tinjau pengaturan `certificate.transcript_*` yang spesifik sebelum menerbitkan transkrip resmi.
* **Verifikasi melaporkan hasil yang dicabut atau tidak valid:** jangan gunakan kembali catatan tersebut sebagai bukti transkrip resmi yang berlaku; staf yang berwenang dapat menerbitkan yang baru jika sesuai.

Lihat juga [Sertifikat dan Keterampilan](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) dan [Transkrip Saya](../../student-guide/account-and-security/my-transcript.md).