# Pengaturan Glosarium

Perilaku alat **Glosarium** pada kursus.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Glosarium**. Kategori ini berisi **3 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_remove_tags_in_glossary_export`

**Hapus tag HTML dalam ekspor glosarium**

Jika diaktifkan, tag HTML akan dihapus dari definisi istilah glosarium saat mengekspor.

*Default: `false`*

### `default_glossary_view`

**Tampilan default glosarium**

Pilih tampilan mana ('table' atau 'list') yang akan digunakan secara default pada alat glosarium.

*Default: `table`*

### `show_glossary_in_extra_tools`

**Tampilkan istilah glosarium di alat tambahan**

Dari sini Anda dapat mengatur cara menambahkan istilah glosarium di alat tambahan seperti jalur pembelajaran dan alat latihan.