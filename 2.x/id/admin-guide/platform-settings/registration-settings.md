# Pengaturan Pendaftaran

Kebijakan pendaftaran mandiri dan pengalihan setelah pendaftaran — apa yang diminta dari pengguna baru dan ke mana mereka diarahkan.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Pendaftaran**. Kategori ini berisi **20 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_double_validation_in_registration`

**Validasi ganda untuk proses pendaftaran**

Hanya menampilkan permintaan konfirmasi di halaman pendaftaran sebelum melanjutkan dengan pembuatan pengguna.

*Default: `false`*

### `allow_fields_inscription`

**Batasi bidang yang ditampilkan selama pendaftaran**

Jika Anda hanya ingin menampilkan beberapa bidang profil yang tersedia, Anda dapat melengkapi array di sini dengan sub-elemen 'fields' dan 'extra_fields' yang berisi array dengan daftar bidang yang akan ditampilkan.

### `allow_lostpassword`

**Kata sandi yang hilang**

Apakah pengguna diizinkan untuk meminta kata sandi yang hilang?

*Default: `true`*

### `allow_registration`

**Pendaftaran**

Apakah pendaftaran sebagai pengguna baru diizinkan? Apakah pengguna dapat membuat akun baru?

*Default: `false`*

### `allow_registration_as_teacher`

**Pendaftaran sebagai pengajar**

Apakah seseorang dapat mendaftar sebagai pengajar (dengan kemampuan untuk membuat kursus)?

*Default: `false`*

### `allow_terms_conditions`

**Aktifkan syarat dan ketentuan**

Opsi ini akan menampilkan Syarat dan Ketentuan dalam formulir pendaftaran untuk pengguna baru. Perlu dikonfigurasi terlebih dahulu di halaman administrasi portal.

*Default: `false`*

### `drh_autosubscribe`

**Langganan otomatis direktur sumber daya manusia**

Langganan otomatis direktur sumber daya manusia - belum tersedia

### `extendedprofile_registration`

**Bidang portofolio saat pendaftaran**

Bidang portofolio mana yang harus tersedia dalam proses pendaftaran pengguna? Ini mengharuskan opsi portofolio diaktifkan (lihat di atas).

### `extendedprofile_registrationrequired`

**Bidang portofolio wajib saat pendaftaran**

Bidang portofolio mana yang *wajib* diisi dalam proses pendaftaran pengguna? Ini mengharuskan opsi portofolio diaktifkan dan bidang tersebut juga tersedia dalam formulir pendaftaran (lihat di atas).

### `extldap_config`

**Konfigurasi koneksi LDAP**

Array yang mendefinisikan host dan port untuk server LDAP.

### `hide_legal_accept_checkbox`

**Sembunyikan kotak centang penerimaan hukum di halaman Syarat dan Ketentuan**

Jika diatur ke true, menghapus kotak centang "Saya telah membaca dan menyetujui" dalam alur halaman Syarat dan Ketentuan.

*Default: `false`*

### `platform_unsubscribe_allowed`

**Izinkan pembatalan langganan dari platform**

Dengan mengaktifkan opsi ini, Anda mengizinkan pengguna untuk menghapus akun mereka sendiri dan semua data yang terkait secara permanen dari platform. Ini adalah tindakan yang cukup radikal, tetapi diperlukan untuk portal yang terbuka untuk umum di mana pengguna dapat mendaftar sendiri. Entri tambahan akan muncul di profil pengguna untuk membatalkan langganan setelah konfirmasi.

*Default: `false`*

### `redirect_after_login`

**Pengalihan setelah login (per profil)**

Tentukan pengalihan per profil setelah login menggunakan objek JSON seperti {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Default:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Bidang tambahan wajib selama pendaftaran**

Array dari pengenal bidang tambahan yang harus diisi selama pendaftaran pengguna.

### `required_profile_fields`

**Bidang wajib selama pendaftaran**

Array dari nama bidang profil (email, phone, language, official_code) yang harus disediakan selama pendaftaran.

### `send_inscription_msg_to_inbox`

**Kirim pesan selamat datang ke email dan kotak masuk**

Secara default, pesan selamat datang (dengan kredensial) hanya dikirim melalui email. Aktifkan opsi ini untuk mengirimkannya juga ke kotak masuk Chamilo pengguna.

*Default: `false`*

### `sessionadmin_autosubscribe`

**Langganan otomatis admin sesi**

Langganan otomatis administrator sesi - belum tersedia

### `student_autosubscribe`

**Langganan otomatis peserta didik**

Langganan otomatis peserta didik - belum tersedia

### `teacher_autosubscribe`

**Langganan otomatis pengajar**

Langganan otomatis pengajar - belum tersedia

### `user_hide_never_expire_option`

**Sembunyikan opsi 'tidak pernah kedaluwarsa' untuk pengguna**

Hapus opsi 'tidak pernah kedaluwarsa' saat membuat/mengedit akun pengguna.

*Default: `false`*