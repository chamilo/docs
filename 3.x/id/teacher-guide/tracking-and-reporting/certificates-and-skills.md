# Sertifikat dan Keterampilan

Chamilo memungkinkan Anda memberikan sertifikat kepada peserta didik yang memenuhi kriteria pencapaian tertentu, dan memvalidasi keterampilan yang terkait dengan pencapaian tersebut.

## Cara Kerja Sertifikat

Sertifikat terhubung ke **Penilaian** (juga disebut Gradebook). Ketika nilai peserta didik memenuhi atau melebihi ambang minimum yang Anda tetapkan, sertifikat menjadi tersedia untuk diunduh oleh mereka.

Alur kerjanya adalah:

1. Siapkan [Penilaian](../assessing-learners/gradebook.md) dengan latihan, tugas, dan aktivitas bernilai lainnya
2. Tentukan **skor sertifikasi minimum** (misalnya, 70%)
3. Ketika peserta didik mencapai skor tersebut, mereka dapat mengunduh sertifikatnya (baik di dalam alat Penilaian itu sendiri, atau dari jalur pembelajaran jika Anda telah mengonfigurasi langkah akhir untuk itu). Sebagai pengajar, Anda juga dapat menggunakan tindakan **Generate certificates** di gradebook untuk membuat PDF secara batch bagi semua peserta didik yang memenuhi syarat.

## Templat Sertifikat

Sertifikat menggunakan templat yang ditentukan oleh administrator platform. Templat biasanya mencakup:

* Nama peserta didik
* Nama kursus
* Tanggal penyelesaian
* Skor yang dicapai
* Kode QR atau URL untuk verifikasi daring

## Masa Berlaku dan Kedaluwarsa Sertifikat

Sertifikat dapat diatur agar kedaluwarsa setelah sejumlah hari tertentu. Di pengaturan [Penilaian](../assessing-learners/gradebook.md) untuk kategori akar, setelah **Generate certificates** diaktifkan, muncul bidang **Certificate validity (days)**. Biarkan pada `0` (nilai default) untuk sertifikat yang tidak pernah kedaluwarsa, atau tetapkan sejumlah hari agar sertifikat kedaluwarsa sebanyak hari tersebut setelah diterbitkan.

Tanggal kedaluwarsa masing-masing sertifikat dihitung secara otomatis dari pengaturan tersebut saat sertifikat dibuat (atau dibuat ulang) — Anda tidak mengaturnya per sertifikat. Daftar **Certificates** menampilkan kolom **Expiry date** untuk setiap peserta didik, yang berbunyi **Never expires** jika tidak ada periode masa berlaku yang diterapkan.

Jika kategori tidak memiliki periode masa berlaku yang dikonfigurasi, Anda tetap dapat menetapkan (atau mengubah) tanggal kedaluwarsa peserta didik secara individual secara manual: klik tombol pensil **Edit expiry date** di samping entri mereka dan pilih tanggal. Tombol ini hanya tersedia jika kategori itu sendiri tidak memiliki periode masa berlaku — setelah periode masa berlaku ditetapkan, tanggal kedaluwarsa dikelola secara otomatis dan tidak lagi dapat diedit per sertifikat.

![Daftar Sertifikat yang menampilkan kolom Tanggal kedaluwarsa untuk tiga peserta didik](/.gitbook/assets/gradebook-certificates-expiry-dates.png)

### Mengingatkan Peserta Didik tentang Kedaluwarsa yang Akan Datang atau yang Sudah Lewat

Buka daftar **Certificates** untuk penilaian Anda dan klik tombol **Expiring certificates** <img src="/.gitbook/assets/icons/mdi-calendar-clock.svg" alt="Expiring certificates" data-size="line"> untuk melihat sertifikat peserta didik mana yang telah kedaluwarsa atau hampir kedaluwarsa. Halaman menampilkan, per peserta didik: **Expiry date** sertifikat, **Status**-nya (**Expired** atau **Expiring soon**), dan kapan pengingat tentangnya **Last reminder sent** (atau **Never**). Gunakan **Days ahead** untuk memperluas atau mempersempit seberapa jauh ke masa depan "expiring soon" dilihat.

![Halaman Expiring certificates yang mencantumkan satu sertifikat kedaluwarsa dan satu yang segera kedaluwarsa](/.gitbook/assets/gradebook-certificate-expirations.png)

Untuk memberi tahu peserta didik sendiri:

1. Pilih peserta didik yang ingin Anda ingatkan (atau pilih semua)
2. Klik **Send notification**
3. Tinjau pratinjau e-mail yang akan dikirim — pratinjau terpisah ditampilkan untuk kata-kata "expiring soon" dan "expired", tergantung peserta didik terpilih mana yang masuk ke masing-masing kasus
4. Konfirmasi dengan mengklik **Send notification** lagi di dialog

![Dialog konfirmasi Send notification yang mempratinjau kata-kata e-mail yang segera kedaluwarsa dan yang sudah kedaluwarsa](/.gitbook/assets/gradebook-certificate-expiry-notification.png)

Setiap peserta didik diberitahu dalam bahasa yang dikonfigurasi sendiri, baik melalui e-mail maupun pesan internal Chamilo. Mengirim ulang untuk sertifikat yang sama dan tanggal kedaluwarsa yang sama aman — Chamilo menelusuri apa yang sudah dikirim per sertifikat dan tidak akan mengirim spam pengingat duplikat kepada peserta didik kecuali Anda secara eksplisit mengirim ulang.

Administrator juga dapat menjadwalkan pengingat yang sama ini secara otomatis, secara berulang, tanpa pengajar harus memicunya secara manual — lihat [Pengaturan Cron Jobs](../../admin-guide/platform-settings/crons-settings.md#certificate-expiry-reminders).

## Keterampilan

Keterampilan merepresentasikan kompetensi yang diperoleh peserta didik. Di Chamilo:

* Keterampilan dapat dihubungkan ke pencapaian gradebook
* Ketika peserta didik meraih sertifikat, setiap keterampilan terkait divalidasi secara otomatis
* Keterampilan terakumulasi pada profil peserta didik, membentuk catatan kompetensi
* Keterampilan dapat diorganisasi secara hierarkis (misalnya, "Analisis Data" di bawah "Metode Penelitian")
* Keterampilan dapat dievaluasi lebih lanjut oleh rekan (evaluasi 360°)

## Melihat Status Sertifikat dan Keterampilan

Sebagai pengajar, Anda dapat melihat:

* Peserta didik mana yang telah meraih sertifikat di kursus Anda
* Keterampilan mana yang telah divalidasi
* Kemajuan peserta didik menuju ambang sertifikasi
* Sertifikat mana yang telah kedaluwarsa atau akan segera kedaluwarsa, serta apakah pengingat sudah dikirim untuk sertifikat tersebut

Peserta didik dapat melihat sertifikat dan keterampilan yang telah divalidasi dari profil mereka, dan dapat mengakses Skills Wheel untuk memeriksa keterampilan apa yang diminati di organisasi mereka.

## Tips

* **Tetapkan harapan yang jelas** — Beritahu peserta didik di awal kursus apa yang perlu mereka capai untuk meraih sertifikat
* **Gunakan nama keterampilan yang bermakna** — Keterampilan harus menggambarkan apa yang dapat dilakukan peserta didik, bukan hanya nama kursus
* **Gabungkan dengan portofolio** — Dorong peserta didik untuk menambahkan sertifikat mereka ke portofolio
* **Perluas sertifikat** — Minta admin Anda untuk mengaktifkan plugin [Custom Certificate](../plugins/custom-certificate.md) agar kekuatan templat sertifikat semakin besar
* **Tetapkan masa berlaku untuk sertifikasi berbasis kepatuhan** — Jika suatu sertifikasi memerlukan pembaruan berkala (misalnya pelatihan keselamatan), atur **Certificate validity (days)** agar peserta didik diingatkan sebelum masa berlakunya berakhir