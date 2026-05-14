# Pengaturan Kehadiran

Pengaturan bawaan dan perilaku alat **Kehadiran**.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Kehadiran**. Kategori ini berisi **4 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_delete_attendance`

**Kehadiran: aktifkan penghapusan**

Perilaku bawaan di Chamilo adalah menyembunyikan lembar kehadiran alih-alih menghapusnya, untuk berjaga-jaga jika guru melakukannya secara tidak sengaja. Aktifkan opsi ini untuk memungkinkan guru *benar-benar* menghapus lembar kehadiran.

*Default: `true`*

### `attendance_allow_comments`

**Izinkan komentar pada lembar kehadiran**

Guru dan siswa dapat memberikan komentar pada setiap kehadiran individu (untuk memberikan alasan).

*Default: `false`*

### `enable_sign_attendance_sheet`

**Penandatanganan Kehadiran**

Aktifkan pengambilan tanda tangan untuk mengkonfirmasi kehadiran seseorang.

*Default: `false`*

### `multilevel_grading`

**Aktifkan Penilaian Kehadiran Bertingkat**

Memungkinkan penilaian kehadiran dengan beberapa tingkatan alih-alih sistem sederhana hadir/tidak hadir.

*Default: `false`*