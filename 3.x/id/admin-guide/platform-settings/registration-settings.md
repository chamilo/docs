# Pengaturan Pendaftaran

Kebijakan pendaftaran mandiri dan pengalihan pasca-pendaftaran — apa yang diminta dari pengguna baru dan ke mana mereka diarahkan.

Akses pengaturan ini di **Administration > Configuration settings > Registration**. Kategori ini berisi **21 pengaturan**, tercantum di bawah dengan judul dan komentar yang dikirim dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_double_validation_in_registration`

**Validasi ganda untuk proses pendaftaran**

Cukup tampilkan permintaan konfirmasi pada halaman pendaftaran sebelum melanjutkan pembuatan pengguna.

*Default: `false`*


### `allow_fields_inscription`

**Batasi bidang yang ditampilkan selama pendaftaran**

Jika Anda hanya ingin menampilkan sebagian dari bidang profil yang tersedia, Anda dapat melengkapi array di sini dengan sub-elemen 'fields' dan 'extra_fields' yang berisi array berisi daftar bidang yang akan ditampilkan.

### `allow_invitation_registration` **v3**

**Izinkan pendaftaran melalui tautan undangan kursus**

Jika diaktifkan, pengajar/admin dapat mengirim tautan undangan sekali pakai dari alat Users pada suatu kursus yang memungkinkan orang yang belum terdaftar mencapai formulir pendaftaran dan mendaftar meskipun pendaftaran mandiri umum (`allow_registration`) dinonaktifkan.

*Default: `false`*

Lihat [Subscribing Users](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) untuk sisi fitur ini yang dihadapi pengajar.

### `allow_lostpassword`

**Kata sandi hilang**

Apakah pengguna diizinkan meminta kata sandi yang hilang?

*Default: `true`*

### `allow_registration`

**Pendaftaran**

Apakah pendaftaran sebagai pengguna baru diizinkan? Dapatkah pengguna membuat akun baru?

*Default: `false`*

### `allow_registration_as_teacher`

**Pendaftaran sebagai pengajar**

Dapatkah seseorang mendaftar sebagai pengajar (dengan kemampuan membuat kursus)?

*Default: `false`*

### `allow_terms_conditions`

**Aktifkan syarat dan ketentuan**

Opsi ini akan menampilkan Syarat dan Ketentuan pada formulir pendaftaran untuk pengguna baru. Perlu dikonfigurasi terlebih dahulu di halaman administrasi portal.

*Default: `false`*


### `drh_autosubscribe`

**Langganan otomatis direktur sumber daya manusia**

Langganan otomatis direktur sumber daya manusia - belum tersedia

### `extendedprofile_registration`

**Bidang portofolio pada pendaftaran**

Bidang portofolio manakah yang harus tersedia dalam proses pendaftaran pengguna? Ini mensyaratkan opsi portofolio diaktifkan (lihat di atas).

### `extendedprofile_registrationrequired`

**Bidang portofolio wajib pada pendaftaran**

Bidang portofolio manakah yang *wajib* dalam proses pendaftaran pengguna? Ini mensyaratkan opsi portofolio diaktifkan dan bidang tersebut juga tersedia pada formulir pendaftaran (lihat di atas).

### `extldap_config`

**Konfigurasi koneksi LDAP**

Array yang mendefinisikan host dan port untuk server LDAP.

### `hide_legal_accept_checkbox`

**Sembunyikan kotak centang penerimaan hukum pada halaman Syarat dan Ketentuan**

Jika diatur ke true, menghapus kotak centang "Saya telah membaca dan menerima" dalam alur halaman Syarat dan Ketentuan.

*Default: `false`*


### `platform_unsubscribe_allowed`

**Izinkan berhenti berlangganan dari platform**

Dengan mengaktifkan opsi ini, Anda mengizinkan setiap pengguna untuk menghapus secara definitif akunnya sendiri dan semua data terkait dari platform. Ini merupakan tindakan yang cukup radikal, tetapi diperlukan untuk portal yang terbuka bagi publik di mana pengguna dapat mendaftar sendiri. Entri tambahan akan muncul di profil pengguna untuk berhenti berlangganan setelah konfirmasi.

*Default: `false`*


### `redirect_after_login`

**Pengalihan setelah masuk (per profil)**

Tentukan pengalihan per profil setelah masuk menggunakan objek JSON seperti {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

**Bidang ekstra wajib selama pendaftaran**

Array pengidentifikasi bidang ekstra yang harus dilengkapi selama pendaftaran pengguna.

### `required_profile_fields`

**Bidang wajib selama pendaftaran**

Array nama bidang profil (email, phone, language, official_code) yang harus disediakan selama pendaftaran.

### `send_inscription_msg_to_inbox`

**Kirim pesan selamat datang ke e-mail dan kotak masuk**

Secara default, pesan selamat datang (dengan kredensial) hanya dikirim melalui e-mail. Aktifkan opsi ini untuk mengirimkannya juga ke kotak masuk Chamilo pengguna.

*Default: `false`*


### `sessionadmin_autosubscribe`

**Langganan otomatis admin sesi**

Langganan otomatis administrator sesi - belum tersedia

### `student_autosubscribe`

**Pendaftaran otomatis pembelajar**

Pendaftaran otomatis pembelajar - belum tersedia

### `teacher_autosubscribe`

**Pendaftaran otomatis pengajar**

Pendaftaran otomatis pengajar - belum tersedia

### `user_hide_never_expire_option`

**Sembunyikan opsi 'tidak pernah kedaluwarsa' untuk pengguna**

Hapus opsi 'tidak pernah kedaluwarsa' saat membuat/mengedit akun pengguna.

*Default: `false`*