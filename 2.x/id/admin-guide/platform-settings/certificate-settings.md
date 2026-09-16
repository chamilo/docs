# Pengaturan Sertifikat

Pengaturan default yang diterapkan ketika seorang peserta didik memperoleh sertifikat dari buku nilai.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Sertifikat**. Kategori ini berisi **9 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan nama ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `add_certificate_pdf_footer`

**Tambahkan footer ke ekspor sertifikat PDF**

Jika diaktifkan, footer akan ditambahkan ke ekspor PDF sertifikat.

*Default: `false`*

### `allow_general_certificate`

**Aktifkan sertifikat umum**

Sertifikat umum adalah sertifikat yang mengelompokkan semua pencapaian pengguna dalam kursus yang diikutinya.

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

Jika diaktifkan, siswa tidak akan dapat mengekspor sertifikat mereka ke PDF. Opsi ini tersedia karena, tergantung pada struktur HTML yang tepat dari template sertifikat, ekspor PDF mungkin memiliki kualitas rendah. Dalam hal ini, sebaiknya hanya menampilkan sertifikat HTML kepada siswa.

*Default: `false`*

### `hide_my_certificate_link`

**Sembunyikan tautan ‘sertifikat saya’**

Sembunyikan halaman sertifikat untuk pengguna non-admin.

*Default: `false`*

### `session_admin_can_download_all_certificates`

**Izinkan admin sesi untuk mengunduh sertifikat pribadi**

Jika diaktifkan, administrator sesi dapat mengunduh sertifikat meskipun sertifikat tersebut tidak dipublikasikan secara publik.

*Default: `false`*