# Pengaturan Sertifikat

Nilai bawaan yang diterapkan ketika peserta didik meraih sertifikat dari gradebook.

Akses pengaturan ini di bawah **Administration > Configuration settings > Certificates**. Kategori ini berisi **11 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan menyunting [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `add_certificate_pdf_footer`

**Tambahkan footer pada ekspor PDF sertifikat**

Jika diaktifkan, footer ditambahkan pada ekspor PDF sertifikat.

*Default: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Pembuatan otomatis sertifikat pada pemanggilan WS**

Jika diaktifkan, dan saat menggunakan webservice WSCertificatesList, opsi ini akan memastikan bahwa semua sertifikat telah dibuat oleh pengguna jika mereka mencapai skor yang memadai pada semua item yang didefinisikan dalam gradebook untuk semua kursus dan sesi (hal ini dapat mengonsumsi sumber daya pemrosesan yang cukup besar di server Anda).

*Default: `false`*

### `allow_certificates_search` **v3**

**Izinkan pencarian sertifikat**

Izinkan pengguna dan pengunjung mencari sertifikat yang telah dibuat dari menu bilah atas.

*Default: `false`*

### `allow_general_certificate`

**Aktifkan sertifikat umum**

Sertifikat umum adalah sertifikat yang mengelompokkan semua pencapaian pengguna pada kursus yang diikutinya.

*Default: `false`*

### `allow_public_certificates`

**Izinkan sertifikat publik**

Sertifikat pengguna dapat dilihat oleh pengguna yang tidak terdaftar.

*Default: `false`*

### `certificate_filter_by_official_code`

**Filter sertifikat berdasarkan kode resmi**

Tambahkan filter pada kode resmi siswa ke daftar sertifikat.

*Default: `false`*

### `certificate_pdf_orientation`

**Orientasi PDF untuk sertifikat**

Atur ‘portrait’ atau ‘landscape’ (istilah teknis) untuk sertifikat PDF.

*Default: `landscape`*

### `hide_certificate_export_link`

**Sertifikat: sembunyikan tautan ekspor PDF untuk semua**

Aktifkan untuk menghapus sepenuhnya kemungkinan mengekspor sertifikat ke PDF (untuk semua pengguna). Jika diaktifkan, ini termasuk menyembunyikannya dari siswa.

*Default: `false`*

### `hide_certificate_export_link_students`

**Sertifikat: sembunyikan tautan ekspor dari siswa**

Jika diaktifkan, siswa tidak akan dapat mengekspor sertifikat mereka ke PDF. Opsi ini tersedia karena, tergantung pada struktur HTML yang tepat dari templat sertifikat, ekspor PDF mungkin berkualitas rendah. Dalam kasus ini, lebih baik hanya menampilkan sertifikat HTML kepada siswa.

*Default: `false`*

### `hide_my_certificate_link`

**Sembunyikan tautan ‘my certificate’**

Sembunyikan halaman sertifikat untuk pengguna non-admin.

*Default: `false`*

### `session_admin_can_download_all_certificates`

**Izinkan admin sesi mengunduh sertifikat privat**

Jika diaktifkan, administrator sesi dapat mengunduh sertifikat meskipun sertifikat tersebut tidak dipublikasikan secara publik.

*Default: `false`*

## Lihat Juga

Sertifikat kini dapat diberi masa berlaku dan tanggal kedaluwarsa, dengan pengingat kedaluwarsa otomatis atau manual. Hal ini tidak dikonfigurasi di sini — masa berlaku adalah pengaturan gradebook yang dihadapi pengajar, dan sakelar on/off cron pengingat berada di kategori **Cron Jobs**. Lihat [Sertifikat dan Keterampilan](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) dan [Pengaturan Cron Jobs](crons-settings.md#certificate-expiry-reminders).