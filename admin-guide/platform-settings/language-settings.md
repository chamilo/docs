# Pengaturan Bahasa

Bahasa yang tersedia, bahasa default, dan cara Chamilo menentukan bahasa yang akan ditampilkan.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Bahasa**. Kategori ini berisi **12 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_course_multiple_languages`

**Kursus Multi-Bahasa**

Aktifkan kursus yang dikelola dalam lebih dari satu bahasa. Opsi ini menambahkan pemilih bahasa di dalam halaman kursus untuk memungkinkan pengguna beralih dengan mudah, dan menambahkan kolom ekstra 'multiple_language' ke kursus yang memungkinkan prosedur manajemen jarak jauh.

*Default: `false`*

### `allow_use_sub_language`

**Izinkan Definisi dan Penggunaan Sub-Bahasa**

Dengan mengaktifkan opsi ini, Anda akan dapat menentukan variasi untuk setiap istilah bahasa yang digunakan dalam antarmuka platform, dalam bentuk bahasa baru yang didasarkan pada dan memperluas bahasa yang sudah ada. Anda akan menemukan opsi ini di bagian bahasa pada panel administrasi.

*Default: `false`*

### `auto_detect_language_custom_pages`

**Aktifkan Deteksi Bahasa Otomatis di Halaman Kustom**

Jika Anda menggunakan halaman kustom, aktifkan ini jika Anda ingin memiliki detektor bahasa di sana yang menampilkan halaman dalam bahasa peramban pengguna, atau nonaktifkan untuk memaksa bahasa menjadi bahasa default platform.

*Default: `true`*

### `language_flags_by_country`

**Bendera Bahasa**

Gunakan bendera negara untuk bahasa. Ini tidak diaktifkan secara default karena beberapa bahasa tidak sepenuhnya terkait dengan suatu negara, yang dapat menyebabkan frustrasi bagi beberapa pengguna.

*Default: `false`*

### `language_priority_1`

**Bahasa Prioritas Tertinggi**

Bahasa utama yang dipilih ketika beberapa konteks bahasa diatur.

*Default: `course_lang`*

### `language_priority_2`

**Bahasa Prioritas Sekunder**

Bahasa cadangan sekunder jika prioritas pertama tidak tersedia atau di luar konteks.

*Default: `user_profil_lang`*

### `language_priority_3`

**Bahasa Prioritas Ketiga**

Bahasa cadangan tersier jika prioritas yang lebih tinggi gagal.

*Default: `user_selected_lang`*

### `language_priority_4`

**Bahasa Prioritas Keempat**

Opsi bahasa cadangan terakhir berdasarkan urutan prioritas.

*Default: `platform_lang`*

### `platform_language`

**Bahasa Default Platform**

Bahasa utama, digunakan secara default ketika tidak ada bahasa pengguna yang diatur.

*Default: `en`*

### `show_different_course_language`

**Tampilkan Bahasa Kursus**

Tampilkan bahasa masing-masing kursus di samping judul kursus, pada daftar kursus di halaman utama.

*Default: `true`*

### `show_language_selector_in_menu`

**Pemilih Bahasa di Menu Utama**

Tampilkan pemilih bahasa di menu utama yang segera memperbarui preferensi bahasa pengguna. Ini dapat berguna di portal multibahasa di mana peserta didik harus beralih dari satu bahasa ke bahasa lain untuk pembelajaran mereka.

*Default: `true`*

### `template_activate_language_filter`

**Templat Dokumen Multi-Bahasa**

Aktifkan templat dokumen (di tingkat platform atau kursus) untuk dikonfigurasi untuk bahasa tertentu.

*Default: `false`*