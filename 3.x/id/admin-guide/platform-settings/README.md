# Pengaturan Platform

Chamilo memiliki sistem konfigurasi yang luas dengan pengaturan yang diorganisasi ke dalam kategori. Seluruh rangkaian kategori di bawah ini mencerminkan halaman **Configuration settings** di panel admin — serta `SettingsCurrentFixtures.php` yang mendasarinya di kode sumber, yang merupakan sumber kebenaran untuk nama variabel, judul, dan deskripsi.

Akses pengaturan platform dari panel administrasi dengan mengklik **Configuration settings**.

![Halaman pengaturan platform yang menampilkan kategori konfigurasi yang diorganisasi menurut area fungsional](/.gitbook/assets/admin-settings-categories.png)

## Semua kategori

Terdapat **39 kategori konfigurasi** secara keseluruhan, tercantum menurut abjad di bawah ini. Angka setelah setiap tautan adalah jumlah pengaturan dalam kategori tersebut.

### Seluruh platform

* **[Administrator Identity](admin-settings.md)** (12) — Identitas dan detail kontak administrator platform.
* **[Platform](platform-settings.md)** (29) — Identitas tingkat platform, zona waktu, kebijakan pendaftaran, pengguna daring, flag kinerja.
* **[Display](display-settings.md)** (24) — Tata letak beranda, gravatar, menu, perilaku merek.
* **[Editor](editor-settings.md)** (26) — Bilah alat editor teks kaya (TinyMCE), plugin, pembantu AI.
* **[Languages](language-settings.md)** (12) — Bahasa yang tersedia, bahasa default, cadangan.
* **[Mail](mail-settings.md)** (18) — Tata letak surat keluar, identitas pengirim, tanda tangan.
* **[Workflows](workflows-settings.md)** (23) — Sakelar alur kerja lintas fungsi (pembuatan kursus, validasi pendaftaran…).

### Autentikasi, keamanan & privasi

* **[Security](security-settings.md)** (31) — Perlindungan login, kebijakan kata sandi, header, 2FA, IDS.
* **[Registration](registration-settings.md)** (20) — Kebijakan pendaftaran mandiri dan pengalihan pasca-pendaftaran.
* **[Privacy](privacy-settings.md)** (6) — Persetujuan, ekspor data, permintaan penghapusan akun.
* **[CAS](cas-settings.md)** (7) — Konfigurasi CAS warisan yang dibawa dari 1.x.

### Siklus hidup kursus dan sesi

* **[Course](course-settings.md)** (45) — Default dan kebijakan yang berlaku untuk kursus di seluruh platform.
* **[Sessions](session-settings.md)** (68) — Siklus hidup sesi, jendela akses tutor, visibilitas.
* **[Course Catalog](catalog-settings.md)** (13) — Perilaku katalog kursus publik.
* **[Profile](profile-settings.md)** (29) — Bidang mana yang muncul pada profil pengguna.

### Alat kursus

* **[Agenda](agenda-settings.md)** (11)
* **[Announcements](announcement-settings.md)** (9)
* **[Assignments (Work)](work-settings.md)** (12)
* **[Attendance](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documents](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercises (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Glossary](glossary-settings.md)** (3)
* **[Groups](group-settings.md)** (3)
* **[Learning Paths](lp-settings.md)** (51)
* **[Surveys](survey-settings.md)** (12)

### Penilaian & pengakuan

* **[Gradebook (Assessments)](gradebook-settings.md)** (34) — Tampilan skor, desimal, ambang sertifikat.
* **[Certificates](certificate-settings.md)** (9) — Default yang diterapkan ketika peserta didik memperoleh sertifikat.
* **[Skills](skill-settings.md)** (13) — Pohon keterampilan, aturan pemberian, integrasi profil.
* **[Tracking](tracking-settings.md)** (10) — Apa yang dicatat, laporan apa yang diekspos.

### Komunikasi & komunitas

* **[Messaging](message-settings.md)** (7)
* **[Social Network](social-settings.md)** (7)

### AI

* **[AI Helpers](ai-helpers-settings.md)** (13) — Penyedia per jenis tugas (teks, gambar, video, tutor, penilaian).

### Operasi & integrasi

* **[Cron Jobs](crons-settings.md)** (3)
* **[Search](search-settings.md)** (3) — Konfigurasi pencarian teks penuh Xapian.
* **[Tickets](ticket-settings.md)** (7) — Sistem helpdesk.
* **[Web Services](webservice-settings.md)** (7) — Endpoint SOAP/REST warisan.

## Cara Kerja Pengaturan

* Pengaturan disimpan di basis data (tabel `settings`) dan dikelola melalui antarmuka web
* Beberapa pengaturan **terkunci URL** dalam penyiapan multi-URL (nilainya berlaku di seluruh platform dan tidak dapat ditimpa per URL - lihat kolom `access_url_locked` dan `access_url_changeable` pada tabel `settings`); yang lain (sebagian besar) dapat ditimpa per URL akses
* Perubahan berlaku segera (tidak diperlukan restart server), meskipun sesi pengguna Anda mungkin menyimpan sebagian di memori. Jika perubahan tidak tercermin segera, logout dan login untuk membersihkan sesi Anda.
* Beberapa pengaturan memiliki dependensi — mengubah satu pengaturan dapat memengaruhi perilaku pengaturan lain
* Nama variabel yang ditampilkan di setiap halaman (mis. `2fa_enable`) sesuai dengan baris pada tabel basis data `settings` (kolom `variable`) dan kunci yang digunakan dalam override (`config/settings_overrides.yaml`) jika berlaku.

Untuk informasi lebih lanjut, lihat [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) di wiki kami.

## Tips

* **Dokumentasikan pengaturan Anda** — Simpan catatan pengaturan non-default dan alasan Anda mengubahnya
* **Ubah satu hal pada satu waktu** — Saat pemecahan masalah, ubah satu pengaturan pada satu waktu agar Anda dapat mengidentifikasi dampaknya
* **Uji di lingkungan staging** — Untuk perubahan pengaturan yang signifikan, uji terlebih dahulu pada server staging