# Plugin Alat Kursus

Plugin alat kursus menambahkan alat baru ke halaman utama kursus bersama dengan alat bawaan seperti Dokumen, Latihan, dan Forum.

## Cara Kerja Plugin Alat Kursus

Ketika sebuah plugin mendaftarkan dirinya sebagai alat kursus:

1. Plugin tersebut muncul di grid alat halaman utama kursus
2. Pengajar dapat menampilkan/menyembunyikan alat tersebut seperti alat lainnya
3. Mengklik alat tersebut akan membuka antarmuka plugin dalam konteks kursus

## Mendaftar sebagai Alat Kursus

Dalam kelas plugin Anda, atur `$isCoursePlugin = true`. Untuk secara otomatis menambahkan ikon alat ke halaman utama kursus, atur juga `$addCourseTool = true`:

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

Tentukan bidang konfigurasi tingkat kursus melalui properti `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Pengaturan ini muncul di panel pengaturan kursus dan dapat divalidasi dengan mengoverride `validateCourseSetting(string $variable)` (kembalikan `false` untuk menolak nilai) atau ditindaklanjuti melalui `course_settings_updated(array $values)`.

## Instalasi dan Penghapusan Instalasi

Untuk mendaftarkan bidang plugin di semua kursus yang ada saat instalasi:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Untuk menginstal ke satu kursus (misalnya, saat kursus baru dibuat):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Untuk menghapus bidang dari kursus tertentu:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Titik Integrasi

Plugin alat kursus terintegrasi melalui:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Mendaftarkan plugin sebagai alat dalam kursus
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Menentukan alat mana (termasuk alat plugin) yang muncul di halaman utama kursus
* Alat tersebut muncul dalam koleksi `CTool` untuk kursus

## Konteks Kursus

Ketika peserta didik mengklik alat plugin Anda, kode plugin Anda berjalan dalam konteks kursus. Anda dapat mengakses:

* Kursus saat ini (melalui `api_get_course_id()` atau penyimpanan permintaan CID)
* Sesi saat ini (jika berlaku)
* Pengguna saat ini
* Pengaturan plugin tingkat kursus

## Contoh

Plugin alat kursus bawaan:

* **BigBlueButton** (`Bbb/`) — Konferensi video dalam kursus
* **Zoom** (`Zoom/`) — Pertemuan Zoom dalam kursus
* **OnlyOffice** (`Onlyoffice/`) — Pengeditan dokumen dalam kursus