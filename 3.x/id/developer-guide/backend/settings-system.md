# Sistem Pengaturan

Konfigurasi Chamilo dikelola melalui seperangkat skema pengaturan (sekitar 40 skema, bervariasi antar rilis) yang mendefinisikan setiap aspek platform yang dapat dikonfigurasi. Skema-skema tersebut berada di `src/CoreBundle/Settings/` — daftar persis di sana adalah sumber kebenaran.

## Cara Kerjanya

Pengaturan:

1. **Didefinisikan** dalam kelas skema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Disimpan** dalam basis data (tabel `settings_current`)
3. **Diakses** melalui layanan `SettingsManager`
4. **Dikelola** melalui antarmuka web administrasi

## Skema Pengaturan

Setiap berkas skema mendefinisikan suatu kategori pengaturan. Skema utama:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Informasi institusi, zona waktu, jenis server, fitur portal |
| `SecuritySettingsSchema` | Percobaan login, CAPTCHA, kebijakan kata sandi, header HTTP, 2FA |
| `RegistrationSettingsSchema` | Registrasi mandiri, bidang wajib, langganan otomatis |
| `CourseSettingsSchema` | Default pembuatan kursus, alat, katalog |
| `SessionSettingsSchema` | Default sesi, visibilitas |
| `MailSettingsSchema` | Konfigurasi email, DKIM, notifikasi |
| `AiHelpersSettingsSchema` | Penyedia AI, sakelar fitur per alat AI |
| `ExerciseSettingsSchema` | Penilaian kuis, umpan balik, opsi pertanyaan |
| `LearningPathSettingsSchema` | Tampilan LP, prasyarat, pengaturan SCORM |
| `DocumentSettingsSchema` | Batas unggah, jenis berkas yang diizinkan, penyimpanan |
| `DisplaySettingsSchema` | Tab UI, item bilah sisi, tema |
| `LanguageSettingsSchema` | Bahasa yang tersedia, locale default |
| `AdminSettingsSchema` | Email admin, opsi khusus admin |

## Mengakses Pengaturan

Dalam kode PHP:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

Dalam templat:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Struktur Pengaturan

Setiap pengaturan memiliki:

* **Namespace** — Kategori skema (misalnya, `platform`, `security`, `ai_helpers`)
* **Variable** — Nama pengaturan (misalnya, `site_name`, `allow_registration`)
* **Value** — Nilai saat ini
* **Type** — Tipe data (string, boolean, array, dan sebagainya)

## Pengaturan Tingkat Kursus

Beberapa pengaturan dapat ditimpa pada tingkat kursus. Pengaturan ini didefinisikan di `src/CourseBundle/Settings/` dan mencakup:

* Pengaturan latihan per kursus
* Pengaturan tugas per kursus
* Sakelar fitur AI per kursus

## Pengaturan Multi-URL

Dalam penyiapan multi-URL, beberapa pengaturan dapat disesuaikan per URL akses, sehingga memungkinkan konfigurasi portal yang berbeda dari instalasi yang sama.

Pengaturan tersebut akan muncul beberapa kali dalam tabel `settings`, dengan nilai `access_url` yang berbeda. Secara default, semua pengaturan dikaitkan dengan `access_url=1`.

## Menambahkan Pengaturan Baru

1. Tambahkan definisi pengaturan ke kelas skema yang sesuai
2. Sediakan nilai default
3. Jalankan migrasi basis data jika diperlukan
4. Akses pengaturan melalui `SettingsManager`