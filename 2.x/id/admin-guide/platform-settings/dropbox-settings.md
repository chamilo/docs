# Pengaturan Dropbox

Perilaku alat pertukaran berkas **Dropbox**.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Dropbox**. Kategori ini berisi **8 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `dropbox_allow_group`

**Dropbox: Izinkan grup**

Pengguna dapat mengirim berkas ke grup

*Default: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Unggah ke ruang dropbox pribadi?**

Izinkan pelatih dan pengguna untuk mengunggah dokumen ke dropbox mereka tanpa mengirim dokumen tersebut ke diri mereka sendiri

*Default: `true`*

### `dropbox_allow_mailing`

**Dropbox: Izinkan pengiriman surat**

Dengan fungsi pengiriman surat, Anda dapat mengirim dokumen pribadi kepada setiap peserta didik

*Default: `false`*

### `dropbox_allow_overwrite`

**Dropbox: Bolehkah dokumen ditimpa**

Apakah dokumen asli dapat ditimpa ketika pengguna atau pelatih mengunggah dokumen dengan nama yang sama dengan dokumen yang sudah ada? Jika Anda menjawab ya, maka Anda akan kehilangan mekanisme versioning.

*Default: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Peserta Didik <-> Peserta Didik**

Izinkan pengguna untuk mengirim dokumen ke pengguna lain (peer to peer). Pengguna mungkin menggunakan ini untuk dokumen yang kurang relevan juga (mp3, solusi tes, ...). Jika Anda menonaktifkan ini, maka pengguna hanya dapat mengirim dokumen ke pelatih.

*Default: `true`*

### `dropbox_hide_course_coach`

**Dropbox: Sembunyikan pelatih kursus**

Sembunyikan pelatih kursus sesi di dropbox ketika dokumen dikirim oleh pelatih ke siswa

*Default: `false`*

### `dropbox_hide_general_coach`

**Sembunyikan pelatih umum di dropbox**

Sembunyikan nama pelatih umum di alat dropbox ketika pelatih umum mengunggah berkas

*Default: `false`*

### `dropbox_max_filesize`

**Dropbox: Ukuran maksimum berkas dokumen**

Seberapa besar (dalam MB) dokumen dropbox yang diperbolehkan?

*Default: `100000000`*