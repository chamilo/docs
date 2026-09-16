# Pengaturan Cron Jobs

Konfigurasi pekerjaan terjadwal (tugas cron) yang disertakan bersama Chamilo.

Akses pengaturan ini di **Administration > Configuration settings > Cron Jobs**. Kategori ini berisi **5 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `cron_remind_course_expiration_activate`

**Remind Course Expiration cron**

Aktifkan cron Remind Course Expiration

*Default: `false`*

### `cron_remind_course_expiration_frequency`

**Frequency for the Remind Course Expiration cron**

Jumlah hari sebelum kedaluwarsa kursus yang dipertimbangkan untuk mengirim email pengingat

### `cron_remind_course_finished_activate`

**Send course finished notification**

Apakah akan mengirim e-mail kepada siswa ketika kursus (sesi) mereka selesai. Ini memerlukan konfigurasi tugas cron (lihat direktori main/cron/).

*Default: `false`*

### `cron_certificate_expiry_reminder_activate`

**Certificate expiry reminder cron**

Aktifkan cron `app:send-certificate-expiry-reminders`, yang mengingatkan peserta didik yang sertifikatnya telah kedaluwarsa atau hampir kedaluwarsa.

*Default: `false`*

### `cron_certificate_expiry_reminder_days`

**Certificate expiry reminder window (days)**

Jumlah hari default ke depan untuk memindai sertifikat yang hampir kedaluwarsa, digunakan kecuali cron dijalankan dengan `--days-ahead`.

*Default: `30`*

## Pengingat Kedaluwarsa Sertifikat

Sertifikat gradebook dapat diberi masa berlaku (dalam hari), dikonfigurasi per kategori gradebook — lihat [Certificates and Skills](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md). Setelah sertifikat memiliki tanggal kedaluwarsa, Chamilo dapat mengingatkan peserta didik melalui e-mail dan pesan internal saat tanggal tersebut mendekat (atau setelah terlewati).

Mengaktifkan `cron_certificate_expiry_reminder_activate` di atas hanya mengaktifkan *fitur*; pengingat sebenarnya dikirim oleh perintah konsol yang masih perlu Anda jadwalkan di tingkat OS (misalnya melalui `crontab`), karena Chamilo tidak menjalankan penjadwal latar belakang sendiri:

```bash
php bin/console app:send-certificate-expiry-reminders
```

Opsi yang berguna:

| Option | Effect |
|--------|--------|
| `--days-ahead=N` | How many days ahead of expiry to include (defaults to `cron_certificate_expiry_reminder_days`) |
| `--force` | Actually send the reminders. Without it, the command only reports what it *would* send — safe to run to check before wiring it into cron |
| `--resend` | Re-send reminders even for a certificate/expiry-date pair already notified |
| `--access-url-id=N` | Restrict the scan to one portal (multi-URL installations) |
| `--include-unsubscribed-users` | Also notify learners who unsubscribed from platform e-mails |

Guru dapat mengirim pengingat yang sama secara manual, tanpa memerlukan cron ini — lihat [Certificates and Skills](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry).