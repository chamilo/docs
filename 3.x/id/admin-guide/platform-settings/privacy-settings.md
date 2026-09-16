# Pengaturan Privasi

Kontrol privasi dan perlindungan data (gaya GDPR) — persetujuan, ekspor data, permintaan penghapusan akun, dan sejenisnya.

Akses pengaturan ini di bawah **Administration > Configuration settings > Privacy**. Kategori ini berisi **6 pengaturan**, tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `data_protection_officer_email`

**Alamat e-mail petugas perlindungan data**

Alamat email untuk petugas perlindungan data yang ditunjuk, ditampilkan di bagian GDPR/privasi.

### `data_protection_officer_name`

**Nama petugas perlindungan data**

Nama lengkap petugas perlindungan data yang ditunjuk, ditampilkan di halaman data pribadi dan privasi.

### `data_protection_officer_role`

**Peran petugas perlindungan data**

Jabatan atau peran petugas perlindungan data yang ditunjuk, ditampilkan bersama namanya dalam informasi privasi.

### `disable_change_user_visibility_for_public_courses`

**Nonaktifkan pembuatan pengguna alat terlihat di kursus publik**

Mencegah siapa pun membuat alat 'users' terlihat di kursus publik.

*Default: `true`*

### `disable_gdpr`

**Nonaktifkan fitur GDPR**

Jika Anda sudah mengelola pernyataan perlindungan data pribadi kepada pengguna di tempat lain, Anda dapat dengan aman menonaktifkan fitur ini.

*Default: `true`*

### `hide_user_field_from_list`

**Sembunyikan bidang dari daftar pengguna di kursus**

Secara default, kami menampilkan semua data dari pengguna di alat users dalam kursus. Array ini memungkinkan Anda menentukan bidang mana yang tidak ingin Anda tampilkan. Hanya memengaruhi bidang utama (bukan extra fields).