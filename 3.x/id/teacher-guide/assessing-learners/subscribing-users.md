# Berlangganan Pengguna

Sebelum Anda dapat menilai seorang pembelajar, mereka perlu dilanggan ke kursus Anda. Chamilo menawarkan empat cara untuk memasukkan seseorang, tergantung pada siapa yang melakukan pendaftaran dan apakah orang tersebut sudah memiliki akun platform.

| Metode | Siapa yang melakukannya | Perlu akun yang sudah ada? |
|--------|-------------|--------------------------------|
| [Pendaftaran Administrator](#administrator-enrollment) | Administrator platform | Ya |
| [Pendaftaran Mandiri melalui Katalog Kursus](#self-enrollment-via-the-course-catalog) | Pembelajar itu sendiri | Ya |
| [Pendaftaran Manual melalui Alat Users](#manual-enrollment-via-the-users-tool) | Guru (atau admin kursus) | Ya |
| [Mengundang Pengguna melalui Email](#inviting-users-by-email) | Guru (atau admin kursus) | **Tidak** |

## Pendaftaran Administrator

Seorang administrator platform dapat berlangganan pengguna yang sudah ada ke kursus mana pun langsung dari panel administrasi — berguna untuk onboarding massal (misalnya mengimpor daftar kelas) atau ketika guru tidak memiliki hak untuk mengelola pendaftaran sendiri. Lihat bagian [Courses](../../admin-guide/courses/README.md) pada Panduan Administrasi.

## Pendaftaran Mandiri melalui Katalog Kursus

Jika [visibilitas](../creating-your-course/course-settings.md#course-visibility) kursus Anda mengizinkannya, pembelajar dengan akun platform dapat berlangganan sendiri dengan menemukan kursus Anda di **Explore more courses** dan mengklik untuk bergabung — tidak diperlukan tindakan dari Anda. Apakah ini tersedia, dan apakah memerlukan kata sandi, dikendalikan oleh **Enrollment Settings** di [Course Settings](../creating-your-course/course-settings.md#enrollment-settings).

## Pendaftaran Manual melalui Alat Users

Untuk berlangganan seseorang yang sudah memiliki akun platform tetapi belum bergabung sendiri, buka alat **Users** kursus Anda dan klik ikon **Add users** <img src="/.gitbook/assets/icons/mdi-account-plus.svg" alt="Tambah pengguna" data-size="line">.

1. Cari orang tersebut berdasarkan nama, nama pengguna, e-mail, atau kode resmi
2. Klik **Register** pada baris mereka, atau pilih beberapa dengan kotak centang dan gunakan menu **Action** untuk mendaftarkan semuanya sekaligus

![Hasil pencarian di layar Enroll users to course, menampilkan pembelajar yang cocok dan tombol Register](/.gitbook/assets/course-users-subscribe-search.png)

Hanya pengguna yang belum dilanggan ke kursus yang muncul dalam hasil.

> Ikon ini tersedia untuk guru secara default. Administrator platform dapat membatasinya hanya untuk administrator melalui pengaturan **Allow User Course Subscription By Course Administrator** (`allow_user_course_subscription_by_course_admin`) — jika Anda tidak melihat ikon **Add users**, tanyakan kepada administrator Anda.

## Mengundang Pengguna melalui Email

Ketiga metode di atas semuanya mengasumsikan orang tersebut sudah memiliki akun platform. **Undangan kursus** mencakup kasus ketika mereka tidak memilikinya: Anda mengirim undangan ke alamat email, dan Chamilo mengirim email kepada orang tersebut tautan sekali pakai. Membuka tautan memungkinkan mereka membuat akun, dan segera setelah mereka selesai mendaftar mereka secara otomatis dilanggan ke kursus Anda — tidak diperlukan langkah pendaftaran terpisah.

### Mengakses Alat

Buka alat **Users** kursus Anda, lalu klik ikon **Invite by email** <img src="/.gitbook/assets/icons/mdi-email-outline.svg" alt="Undang melalui email" data-size="line"> di bilah alat, di samping **Add users**:

![Bilah alat Users, menampilkan ikon Add users dan ikon Invite by email](/.gitbook/assets/course-users-invite-icon.png)

Ini membuka halaman **Course invitations**.

### Siapa yang Dapat Mengirim Undangan

* Administrator platform, selalu.
* Dalam kursus biasa (tidak dibuka dalam sesi): guru dan pengguna lain dengan hak edit pada kursus.
* Dalam sesi: pelatih umum sesi, atau administrator sesi — bukan kumpulan pelatih kursus yang lebih luas, karena mengirim undangan di sini berlangganan ke *seluruh sesi*, bukan hanya kursus ini.

### Mengirim Undangan

1. Masukkan alamat e-mail penerima pada formulir **Undang melalui email**
2. Klik **Kirim undangan**

![Halaman undangan kursus: formulir undang-melalui-email dan tabel undangan yang telah dikirim beserta statusnya](/.gitbook/assets/course-invitations-list.png)

Setiap undangan yang Anda kirim untuk kursus ini muncul di bawah formulir, beserta statusnya:

| Status | Arti |
|--------|---------|
| **Pending** | Terkirim, belum digunakan. Masih dalam masa berlakunya. |
| **Accepted** | Penerima telah mendaftar dan disubscribe. |
| **Revoked** | Anda membatalkannya sebelum digunakan. |

Untuk undangan yang masih pending, kolom **Actions** menyediakan:

* **Copy** <img src="/.gitbook/assets/icons/mdi-content-copy.svg" alt="Salin" data-size="line"> — menyalin tautan undangan, jika Anda lebih memilih membagikannya sendiri (obrolan, secara langsung) daripada mengandalkan email.
* **Revoke** <img src="/.gitbook/assets/icons/mdi-account-cancel.svg" alt="Cabut" data-size="line"> — membatalkan undangan segera; tautan berhenti berfungsi. Undangan yang sudah diterima tidak dapat dicabut.

> **Alamat email yang diundang tidak boleh sudah memiliki akun di platform ini.** Jika sudah, pengiriman undangan gagal dengan pesan yang meminta Anda mendaftarkan pengguna yang sudah ada itu secara langsung — melalui [Pendaftaran Manual melalui Alat Users](#manual-enrollment-via-the-users-tool) di atas.

### Undangan dalam Session

Jika Anda membuka alat Users dari kursus yang berjalan di dalam session, halaman menampilkan pengingat bahwa undangan berlaku untuk seluruh session, bukan hanya kursus ini:

> *Kursus ini dibuka dalam sebuah session. Mengirim undangan di sini akan mensubscribe penerima ke seluruh session, bukan hanya ke kursus ini.*

Ini mencerminkan cara pendaftaran bekerja di tempat lain di Chamilo: Anda mensubscribe seseorang ke session secara keseluruhan, atau ke kursus mandiri, tetapi tidak pernah ke "satu kursus ini di dalam session ini" sebagai tindakan terpisah.

### Apa yang Dilihat Orang yang Diundang

Email berisi tautan ke halaman pendaftaran. Membukanya:

* Mengisi otomatis dan mengunci kolom e-mail ke alamat yang Anda undang — mereka tidak dapat mendaftar dengan alamat berbeda menggunakan tautan itu.
* Memungkinkan mereka menyelesaikan pendaftaran **meskipun pendaftaran mandiri saat ini dinonaktifkan di seluruh platform** — asalkan administrator Anda telah mengaktifkan pengaturan **Allow registration via course invitation links** (lihat di bawah). Tanpanya, tautan undangan hanya membantu setelah pendaftaran mandiri sudah terbuka.
* Segera mensubscribe mereka ke kursus Anda (atau session) setelah mereka mengirim formulir, dan masukkan mereka.

Tautan bersifat sekali pakai dan kedaluwarsa setelah 7 hari. Jika kedaluwarsa atau undangan sasarannya dicabut, membukanya berperilaku seolah tautan itu tidak pernah ada.

> Pengaturan seluruh platform **Allow registration via course invitation links** (`registration.allow_invitation_registration`) mengatur apakah tautan undangan Anda dapat membuka pendaftaran ketika pendaftaran mandiri umum dimatikan. Tanyakan kepada administrator Anda jika undangan tampaknya tidak berfungsi pada platform yang tertutup.

## Tips

* **Sesuaikan metode dengan situasinya** — administrator atau pendaftaran mandiri untuk orang yang sudah menggunakan platform, pendaftaran manual untuk pengguna yang sudah diketahui, undangan untuk tamu eksternal, peninjau, atau siapa pun yang belum memiliki akun.
* **Cabut undangan yang tidak lagi Anda butuhkan** — undangan pending yang lama masih merupakan tautan yang valid dan belum digunakan; cabut jika penerima yang dimaksud tidak lagi membutuhkan akses, atau jika Anda tidak yakin apakah undangan itu sampai.
* **Periksa dengan administrator Anda jika suatu metode tampaknya tidak tersedia** — beberapa alur ini (pendaftaran manual, undangan, pendaftaran mandiri) dapat dibatasi atau dinonaktifkan di seluruh platform.