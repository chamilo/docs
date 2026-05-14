# Sistem Pengaturan

Pengaturan Chamilo dikelola melalui serangkaian skema pengaturan (sekitar 40, bervariasi antar versi) yang menentukan semua aspek yang dapat dikonfigurasi pada platform. Skema ini terletak di `src/CoreBundle/Settings/` — daftar pasti di direktori ini adalah sumber referensi.

## Cara Kerja

Pengaturan-pengaturan tersebut:

1. **Ditetapkan** dalam kelas skema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Disimpan** di basis data (tabel `settings_current`)
3. **Diakses** melalui layanan `SettingsManager`
4. **Dikelola** melalui antarmuka web administrasi

## Skema Pengaturan

Setiap berkas skema mendefinisikan kategori pengaturan. Skema utama meliputi:

| Skema | Tujuan |
|--------|------------|
| `PlatformSettingsSchema` | Informasi institusi, zona waktu, jenis server, fitur portal |
| `SecuritySettingsSchema` | Upaya login, CAPTCHA, kebijakan kata sandi, header HTTP, autentikasi dua faktor (2FA) |
| `RegistrationSettingsSchema` | Pendaftaran mandiri, bidang wajib, pendaftaran otomatis |
| `CourseSettingsSchema` | Standar pembuatan kursus, alat, katalog |
| `SessionSettingsSchema` | Standar sesi, visibilitas |
| `MailSettingsSchema` | Konfigurasi email, DKIM, notifikasi |
| `AiHelpersSettingsSchema` | Penyedia AI, aktivasi fitur berdasarkan alat AI |
| `ExerciseSettingsSchema` | Skor kuis, umpan balik, opsi pertanyaan |
| `LearningPathSettingsSchema` | Tampilan jalur pembelajaran, prasyarat, pengaturan SCORM |
| `DocumentSettingsSchema` | Batas unggah, jenis berkas yang diizinkan, penyimpanan |
| `DisplaySettingsSchema` | Tab antarmuka, item bilah sisi, tema |
| `LanguageSettingsSchema` | Bahasa yang tersedia, lokal standar |
| `AdminSettingsSchema` | Email administrator, opsi khusus untuk administrator |

## Mengakses Pengaturan

Dalam kode PHP:

```php
// Melalui layanan SettingsManager
$value = $settingsManager->getSetting('platform.site_name');

// Dalam kode lama
$value = api_get_setting('platform.site_name');
```

Dalam template:

```twig
{# Membaca satu pengaturan #}
{{ chamilo_settings_get('platform.site_name') }}

{# Memeriksa apakah pengaturan ada #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Mendapatkan semua pengaturan sebagai array #}
{% set settings = chamilo_settings_all() %}
```

## Struktur Pengaturan

Setiap pengaturan memiliki:

* **Namespace** — Kategori skema (misalnya, `platform`, `security`, `ai_helpers`)
* **Variabel** — Nama pengaturan (misalnya, `site_name`, `allow_registration`)
* **Nilai** — Nilai saat ini
* **Tipe** — Tipe data (string, boolean, array, dll.)

## Pengaturan pada Tingkat Kursus

Beberapa pengaturan dapat ditimpa pada tingkat kursus. Pengaturan ini ditetapkan di `src/CourseBundle/Settings/` dan mencakup:

* Pengaturan latihan per kursus
* Pengaturan tugas per kursus
* Aktivasi fitur AI per kursus

## Pengaturan Multi-URL

Dalam pengaturan multi-URL, beberapa pengaturan dapat disesuaikan berdasarkan URL akses, memungkinkan pengaturan portal yang berbeda dari instalasi yang sama.

Pengaturan ini akan muncul beberapa kali di tabel `settings`, dengan nilai `access_url` yang berbeda. Secara default, semua pengaturan dikaitkan dengan `access_url=1`.

## Menambahkan Pengaturan Baru

1. Tambahkan definisi pengaturan ke kelas skema yang sesuai
2. Berikan nilai default
3. Jalankan migrasi basis data, jika diperlukan
4. Akses pengaturan melalui `SettingsManager`