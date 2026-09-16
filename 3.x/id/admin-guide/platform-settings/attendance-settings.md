# Pengaturan Kehadiran

Nilai bawaan dan perilaku alat **Attendance**.

Akses pengaturan ini di **Administration > Configuration settings > Attendance**. Kategori ini berisi **5 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_delete_attendance`

**Kehadiran: aktifkan penghapusan**

Perilaku bawaan di Chamilo adalah menyembunyikan lembar kehadiran alih-alih menghapusnya, untuk berjaga-jaga jika pengajar melakukannya secara tidak sengaja. Aktifkan opsi ini untuk mengizinkan pengajar *benar-benar* menghapus lembar kehadiran.

*Default: `true`*

### `attendance_allow_comments`

**Izinkan komentar pada lembar kehadiran**

Pengajar dan peserta didik dapat berkomentar pada setiap kehadiran individu (untuk justifikasi).

*Default: `false`*

### `attendance_calendar_set_duration` **v3**

**Durasi peristiwa kehadiran**

Opsi untuk menentukan durasi suatu peristiwa pada lembar kehadiran.

*Default: `false`*

### `enable_sign_attendance_sheet`

**Penandatanganan kehadiran**

Aktifkan pengambilan tanda tangan untuk mengonfirmasi kehadiran seseorang.

*Default: `false`*

### `multilevel_grading`

**Aktifkan penilaian kehadiran bertingkat**

Memungkinkan penilaian kehadiran dengan beberapa tingkat alih-alih sistem hadir/tidak hadir yang sederhana.

*Default: `false`*