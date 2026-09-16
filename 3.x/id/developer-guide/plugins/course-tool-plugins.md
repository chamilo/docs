# Plugin Alat Kursus

Plugin alat kursus menambahkan alat baru ke beranda kursus bersama alat bawaan seperti Documents, Exercises, dan Forums.

## Cara Kerja Plugin Alat Kursus

Ketika sebuah plugin mendaftarkan dirinya sebagai alat kursus:

1. Plugin tersebut muncul di kisi alat beranda kursus
2. Pengajar dapat menampilkan/menyembunyikannya seperti alat lainnya
3. Mengklik alat tersebut membuka antarmuka plugin dalam konteks kursus

## Mendaftarkan sebagai Alat Kursus

Dalam kelas plugin Anda, atur `$isCoursePlugin = true`. Untuk secara otomatis menambahkan ikon alat ke beranda kursus, atur juga `$addCourseTool = true`:

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## Pengaturan per Kursus

Tentukan field konfigurasi tingkat kursus melalui properti `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Field ini muncul di panel pengaturan kursus dan dapat divalidasi dengan menimpa `validateCourseSetting(string $variable)` (kembalikan `false` untuk menolak suatu nilai) atau ditindaklanjuti melalui `course_settings_updated(array $values)`.

## Instalasi dan Uninstalasi

Untuk mendaftarkan field plugin di semua kursus yang sudah ada saat instalasi:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Untuk menginstal ke satu kursus (misalnya, ketika kursus baru dibuat):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Untuk menghapus field dari kursus tertentu:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Titik Integrasi

Plugin alat kursus terintegrasi melalui:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Mendaftarkan plugin sebagai alat dalam kursus
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Menentukan alat mana (termasuk alat plugin) yang muncul di beranda kursus
* Alat tersebut muncul dalam koleksi `CTool` untuk kursus tersebut

## Konteks Kursus

Ketika peserta didik mengklik alat plugin Anda, kode plugin Anda dijalankan dalam konteks kursus. Anda dapat mengakses:

* Kursus saat ini (melalui `api_get_course_id()` atau CID request store)
* Sesi saat ini (jika berlaku)
* Pengguna saat ini
* Pengaturan plugin tingkat kursus

## Contoh

Plugin alat kursus bawaan:

* **BigBlueButton** (`Bbb/`) — Konferensi video dalam kursus
* **Zoom** (`Zoom/`) — Rapat Zoom dalam kursus
* **OnlyOffice** (`Onlyoffice/`) — Penyuntingan dokumen dalam kursus