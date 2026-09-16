# Pengaturan Bahasa

Bahasa yang tersedia, bahasa default, dan cara Chamilo menentukan bahasa mana yang ditampilkan.

Akses pengaturan ini di **Administration > Configuration settings > Languages**. Kategori ini berisi **13 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_course_multiple_languages`

**Kursus multibahasa**

Mengaktifkan kursus yang dikelola dalam lebih dari satu bahasa. Opsi ini menambahkan pemilih bahasa di dalam halaman kursus agar pengguna dapat beralih dengan mudah, dan menambahkan extra field 'multiple_language' pada kursus yang memungkinkan prosedur pengelolaan jarak jauh.

*Default: `false`*


### `allow_use_sub_language`

**Izinkan definisi dan penggunaan sub-bahasa**

Dengan mengaktifkan opsi ini, Anda akan dapat mendefinisikan variasi untuk setiap istilah bahasa yang digunakan dalam antarmuka platform, dalam bentuk bahasa baru yang didasarkan pada dan memperluas bahasa yang sudah ada. Anda akan menemukan opsi ini di bagian languages pada panel administrasi.

*Default: `false`*

### `auto_detect_language_custom_pages`

**Aktifkan deteksi otomatis bahasa pada halaman kustom**

Jika Anda menggunakan halaman kustom, aktifkan opsi ini jika Anda ingin detektor bahasa di sana menampilkan halaman dalam bahasa peramban pengguna, atau nonaktifkan untuk memaksa bahasa menjadi bahasa default platform.

*Default: `true`*


### `language_by_resource` **v3**

**Bahasa per sumber daya**

Izinkan penetapan bahasa tertentu pada sumber daya individu.

*Default: `false`*

### `language_flags_by_country`

**Bendera bahasa**

Gunakan bendera negara untuk bahasa. Opsi ini tidak diaktifkan secara default karena beberapa bahasa tidak terikat secara ketat pada suatu negara, yang dapat menimbulkan frustrasi bagi sebagian pengguna.

*Default: `false`*


### `language_priority_1`

**Bahasa prioritas tertinggi**

Bahasa utama yang dipilih ketika beberapa konteks bahasa diatur.

*Default: `course_lang`*


### `language_priority_2`

**Bahasa prioritas sekunder**

Bahasa cadangan sekunder jika prioritas pertama tidak tersedia atau di luar konteks.

*Default: `user_profil_lang`*


### `language_priority_3`

**Bahasa prioritas ketiga**

Cadangan bahasa tersier jika prioritas yang lebih tinggi gagal.

*Default: `user_selected_lang`*


### `language_priority_4`

**Bahasa prioritas keempat**

Opsi cadangan bahasa terakhir menurut urutan prioritas.

*Default: `platform_lang`*


### `platform_language`

**Bahasa default platform**

Bahasa utama, digunakan secara default ketika tidak ada bahasa pengguna yang diatur.

*Default: `en`*


### `show_different_course_language`

**Tampilkan bahasa kursus**

Tampilkan bahasa masing-masing kursus, di samping judul kursus, pada daftar kursus di beranda

*Default: `true`*


### `show_language_selector_in_menu`

**Pengalih bahasa di menu utama**

Tampilkan pemilih bahasa di menu utama yang segera memperbarui preferensi bahasa pengguna. Hal ini dapat berguna di portal multibahasa di mana peserta didik harus beralih dari satu bahasa ke bahasa lain untuk pembelajaran mereka.

*Default: `true`*


### `template_activate_language_filter`

**Templat dokumen multibahasa**

Aktifkan templat dokumen (pada tingkat platform atau kursus) agar dapat dikonfigurasi untuk bahasa tertentu.

*Default: `false`*