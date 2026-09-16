# Pengaturan Dropbox

Perilaku alat pertukaran berkas **Dropbox**.

Akses pengaturan ini di **Administration > Configuration settings > Dropbox**. Kategori ini berisi **8 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut secara global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `dropbox_allow_group`

**Dropbox: izinkan grup**

Pengguna dapat mengirim berkas ke grup

*Default: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Unggah ke ruang dropbox sendiri?**

Izinkan pelatih dan pengguna mengunggah dokumen ke dropbox mereka tanpa mengirim dokumen tersebut kepada diri sendiri

*Default: `true`*

### `dropbox_allow_mailing`

**Dropbox: Izinkan mailing**

Dengan fungsionalitas mailing Anda dapat mengirim setiap peserta didik sebuah dokumen pribadi

*Default: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Dapatkah dokumen ditimpa**

Dapatkah dokumen asli ditimpa ketika pengguna atau pelatih mengunggah dokumen dengan nama yang sama dengan dokumen yang sudah ada? Jika Anda menjawab ya maka Anda kehilangan mekanisme versioning.

*Default: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Peserta didik <-> Peserta didik**

Izinkan pengguna mengirim dokumen ke pengguna lain (peer 2 peer). Pengguna mungkin juga menggunakan ini untuk dokumen yang kurang relevan (mp3, solusi tes, ...). Jika Anda menonaktifkan ini maka pengguna hanya dapat mengirim dokumen kepada pelatih.

*Default: `true`*

### `dropbox_hide_course_coach`

**Dropbox: sembunyikan tutor kursus**

Sembunyikan tutor kursus sesi di Dropbox ketika dokumen dikirim oleh tutor kepada siswa

*Default: `false`*

### `dropbox_hide_general_coach`

**Sembunyikan tutor umum di Dropbox**

Sembunyikan nama tutor umum di alat Dropbox ketika tutor umum mengunggah berkas

*Default: `false`*


### `dropbox_max_filesize`

**Dropbox: Ukuran berkas maksimum suatu dokumen**

Seberapa besar (dalam MB) dokumen dropbox dapat berukuran?

*Default: `100000000`*