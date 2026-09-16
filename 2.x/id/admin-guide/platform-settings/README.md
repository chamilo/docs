# Pengaturan Platform

Chamilo memiliki sistem konfigurasi yang luas dengan pengaturan yang diorganisasi ke dalam kategori-kategori. Kumpulan kategori di bawah ini mencerminkan halaman **Pengaturan konfigurasi** di panel admin — dan file `SettingsCurrentFixtures.php` yang mendasarinya di kode sumber, yang merupakan sumber kebenaran untuk nama variabel, judul, dan deskripsi.

Akses pengaturan platform dari panel administrasi dengan mengklik **Pengaturan konfigurasi**.

![Halaman pengaturan platform yang menampilkan kategori konfigurasi yang diorganisasi berdasarkan area fungsional](/.gitbook/assets/admin-settings-categories.png)

## Semua Kategori

Terdapat total **39 kategori konfigurasi**, yang tercantum secara alfabetis di bawah ini. Angka setelah setiap tautan adalah jumlah pengaturan dalam kategori tersebut.

### Seluruh Platform

* **[Identitas Administrator](admin-settings.md)** (12) — Identitas dan detail kontak administrator platform.
* **[Platform](platform-settings.md)** (29) — Identitas tingkat platform, zona waktu, kebijakan pendaftaran, pengguna online, flag performa.
* **[Tampilan](display-settings.md)** (24) — Tata letak beranda, gravatar, menu, perilaku branding.
* **[Editor](editor-settings.md)** (26) — Toolbar editor teks kaya (TinyMCE), plugin, pembantu AI.
* **[Bahasa](language-settings.md)** (12) — Bahasa yang tersedia, bahasa default, cadangan.
* **[Email](mail-settings.md)** (18) — Tata letak email keluar, identitas pengirim, tanda tangan.
* **[Alur Kerja](workflows-settings.md)** (23) — Pengalihan alur kerja lintas fungsi (pembuatan kursus, validasi pendaftaran…).

### Otentikasi, Keamanan & Privasi

* **[Keamanan](security-settings.md)** (31) — Perlindungan login, kebijakan kata sandi, header, 2FA, IDS.
* **[Pendaftaran](registration-settings.md)** (20) — Kebijakan pendaftaran mandiri dan pengalihan setelah pendaftaran.
* **[Privasi](privacy-settings.md)** (6) — Persetujuan, ekspor data, permintaan penghapusan akun.
* **[CAS](cas-settings.md)** (7) — Konfigurasi CAS warisan yang dibawa dari versi 1.x.

### Siklus Hidup Kursus dan Sesi

* **[Kursus](course-settings.md)** (45) — Default dan kebijakan yang berlaku untuk kursus di seluruh platform.
* **[Sesi](session-settings.md)** (68) — Siklus hidup sesi, jendela akses pelatih, visibilitas.
* **[Katalog Kursus](catalog-settings.md)** (13) — Perilaku katalog kursus publik.
* **[Profil](profile-settings.md)** (29) — Bidang mana yang muncul di profil pengguna.

### Alat Kursus

* **[Agenda](agenda-settings.md)** (11)
* **[Pengumuman](announcement-settings.md)** (9)
* **[Tugas (Pekerjaan)](work-settings.md)** (12)
* **[Kehadiran](attendance-settings.md)** (4)
* **[Obrolan](chat-settings.md)** (5)
* **[Dokumen](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Latihan (Tes)](exercise-settings.md)** (63)
* **[Forum](forum-settings.md)** (9)
* **[Glosarium](glossary-settings.md)** (3)
* **[Kelompok](group-settings.md)** (3)
* **[Jalur Pembelajaran](lp-settings.md)** (51)
* **[Survei](survey-settings.md)** (12)

### Penilaian & Pengakuan

* **[Buku Nilai (Penilaian)](gradebook-settings.md)** (34) — Tampilan skor, desimal, ambang batas sertifikat.
* **[Sertifikat](certificate-settings.md)** (9) — Default yang diterapkan ketika peserta didik memperoleh sertifikat.
* **[Keterampilan](skill-settings.md)** (13) — Pohon keterampilan, aturan pemberian, integrasi profil.
* **[Pelacakan](tracking-settings.md)** (10) — Apa yang dicatat, laporan apa yang ditampilkan.

### Komunikasi & Komunitas

* **[Pesan](message-settings.md)** (7)
* **[Jaringan Sosial](social-settings.md)** (7)

### AI

* **[Pembantu AI](ai-helpers-settings.md)** (13) — Penyedia per jenis tugas (teks, gambar, video, tutor, penilaian).

### Operasi & Integrasi

* **[Tugas Cron](crons-settings.md)** (3)
* **[Pencarian](search-settings.md)** (3) — Konfigurasi pencarian teks lengkap Xapian.
* **[Tiket](ticket-settings.md)** (7) — Sistem helpdesk.
* **[Layanan Web](webservice-settings.md)** (7) — Endpoint SOAP/REST warisan.

## Cara Kerja Pengaturan

* Pengaturan disimpan di basis data (tabel `settings`) dan dikelola melalui antarmuka web.
* Beberapa pengaturan **terkunci URL** dalam pengaturan multi-URL (nilainya berlaku di seluruh platform dan tidak dapat ditimpa per URL - lihat kolom `access_url_locked` dan `access_url_changeable` di tabel `settings`); lainnya (sebagian besar) dapat ditimpa per URL akses.
* Perubahan berlaku segera (tidak perlu restart server), meskipun sesi pengguna Anda mungkin menyimpan beberapa di antaranya di memori. Jika perubahan tidak segera terlihat, logout dan login kembali untuk menyegarkan sesi Anda.
* Beberapa pengaturan memiliki ketergantungan — mengubah satu pengaturan dapat memengaruhi perilaku pengaturan lainnya.
* Nama variabel yang ditampilkan di setiap halaman (misalnya `2fa_enable`) sesuai dengan baris di tabel basis data `settings` (kolom `variable`) dan kunci yang digunakan dalam penggantian (`config/settings_overrides.yaml`) jika berlaku.

Untuk informasi lebih lanjut, periksa [Konfigurasi](https://github.com/chamilo/chamilo-lms/wiki/Configurations) di wiki kami.

## Tips

* **Dokumentasikan pengaturan Anda** — Simpan catatan tentang pengaturan yang tidak standar dan alasan Anda mengubahnya
* **Ubah satu hal pada satu waktu** — Saat melakukan pemecahan masalah, ubah satu pengaturan pada satu waktu sehingga Anda dapat mengidentifikasi efeknya
* **Uji di lingkungan staging** — Untuk perubahan pengaturan yang signifikan, uji terlebih dahulu di server staging