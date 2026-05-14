# Pengaturan Pekerjaan Cron

Konfigurasi pekerjaan terjadwal (tugas cron) yang disertakan bersama Chamilo.

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Pekerjaan Cron**. Kategori ini berisi **3 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `cron_remind_course_expiration_activate`

**Pengingat Masa Berlaku Kursus cron**

Aktifkan cron Pengingat Masa Berlaku Kursus

*Default: `false`*

### `cron_remind_course_expiration_frequency`

**Frekuensi untuk cron Pengingat Masa Berlaku Kursus**

Jumlah hari sebelum masa berlaku kursus berakhir untuk mempertimbangkan pengiriman email pengingat

### `cron_remind_course_finished_activate`

**Kirim pemberitahuan kursus selesai**

Apakah akan mengirim email kepada siswa ketika kursus (sesi) mereka selesai. Ini memerlukan tugas cron untuk dikonfigurasi (lihat direktori main/cron/).

*Default: `false`*