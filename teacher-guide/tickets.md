# Tiket Dukungan

Alat **Tickets** adalah sistem helpdesk bawaan yang memungkinkan pengguna mengirimkan permintaan dukungan dan melacak penyelesaiannya. Tergantung pada konfigurasi platform Anda, Anda dapat menggunakannya sebagai **requester** (mengirimkan tiket atas nama diri sendiri atau pembelajar Anda) atau sebagai **support agent** (merespons tiket yang ditugaskan ke kategori Anda).

## Bagaimana Sistem Diorganisir

Tiket termasuk dalam **projects**, yang lebih lanjut dibagi menjadi **categories**. Setiap kategori dapat memiliki satu atau lebih support agent yang ditugaskan kepadanya. Ketika tiket dikirimkan, tiket tersebut secara otomatis dirutekan ke agen yang tersedia di kategori yang dipilih.

Kategori default meliputi:

| Category | Description |
|----------|-------------|
| Enrollment | Pertanyaan dan masalah tentang pendaftaran kursus atau sesi |
| General information | Pertanyaan umum tentang platform |
| Requests and paperwork | Permintaan administratif dan dokumentasi |
| Academic Incidents | Masalah terkait ujian, tugas, atau pekerjaan |
| Virtual campus | Masalah teknis dengan platform |
| Online evaluation | Masalah dengan penilaian kursus tertentu (memerlukan pemilihan kursus) |

## Mengakses Alat Tiket

Jika administrator Anda telah mengaktifkan tautan tiket, ikon tiket <img src="/.gitbook/assets/icons/mdi-ticket-account.svg" alt="Tiket" data-size="line"> muncul di bilah navigasi atas. Klik ikon tersebut untuk langsung menuju formulir pengiriman tiket.

Anda juga dapat mengakses tiket Anda dari menu utama di bawah **Support** atau **Tickets**, tergantung pada konfigurasi platform Anda.

## Mengirimkan Tiket

Untuk membuka permintaan dukungan baru:

1. Klik **New ticket** (atau ikon tiket di bilah atas).
2. Pilih **category** yang paling sesuai dengan masalah Anda.
3. Jika kategori memerlukannya (misalnya, Online evaluation), pilih **kursus** yang relevan.
4. Masukkan **subject** — ringkasan singkat dari masalah.
5. Tulis **message** Anda yang menggambarkan masalah secara rinci.
6. Secara opsional, lampirkan file (screenshot, dokumen) untuk membantu support agent memahami masalah.
7. Klik **Submit**.

Tiket diberi ID dan dirutekan ke support agent. Anda akan menerima notifikasi ketika agen merespons.

## Melacak Tiket Anda

Dari daftar tiket, Anda dapat melihat semua tiket yang telah Anda kirimkan dan status saat ini mereka:

| Status | Meaning |
|--------|---------|
| New | Baru dikirimkan, belum ditinjau |
| Pending | Sedang ditinjau oleh support agent |
| Unconfirmed | Menunggu konfirmasi atau informasi tambahan |
| Forwarded | Dipindahkan ke tim atau agen lain |
| Closed | Telah terselesaikan |

Klik tiket apa pun untuk membaca seluruh utas percakapan dan menambahkan balasan.

## Membalas Tiket

Setelah tiket dibuka, Anda dan support agent bertukar pesan dalam utas yang sama. Untuk menambahkan balasan:

1. Buka tiket dari daftar Anda.
2. Gulir ke bidang balasan di bagian bawah.
3. Tulis respons Anda dan lampirkan file jika diperlukan.
4. Klik **Send**.

Kedua pihak menerima notifikasi ketika pesan baru ditambahkan ke utas.

## Menangani Tiket sebagai Support Agent

Jika administrator Anda telah menugaskan Anda ke satu atau lebih kategori tiket, Anda akan melihat tiket masuk dari pembelajar atau rekan kerja di antrian Anda.

Untuk merespons tiket yang ditugaskan:

1. Buka daftar tiket Anda — tiket yang ditugaskan muncul bersama tiket yang telah Anda kirimkan.
2. Klik tiket untuk membaca pesan requester.
3. Tulis balasan dan klik **Send**. Status tiket diperbarui secara otomatis.
4. Ketika masalah terselesaikan, ubah status menjadi **Closed**.

Anda juga dapat mengubah **priority** tiket (Low, Normal, High) untuk membantu mengurutkan antrian Anda.

> Akses ke kategori tiket dikendalikan oleh administrator platform. Jika Anda perlu ditambahkan sebagai support agent untuk kategori, hubungi administrator Anda. Lihat [Pengaturan Tiket](../admin-guide/platform-settings/ticket-settings.md) di Panduan Admin untuk opsi konfigurasi.