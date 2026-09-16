# Pengaturan Glosarium

Perilaku alat **Glossary** pada kursus.

Akses pengaturan ini di bawah **Administration > Configuration settings > Glossary**. Kategori ini berisi **3 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_remove_tags_in_glossary_export`

**Hapus tag HTML pada ekspor glosarium**

Jika diaktifkan, tag HTML dihapus dari definisi istilah glosarium saat mengekspor.

*Default: `false`*

### `default_glossary_view`

**Tampilan glosarium default**

Pilih tampilan ('table' atau 'list') yang akan digunakan secara default pada alat glosarium.

*Default: `table`*

### `show_glossary_in_extra_tools`

**Tampilkan istilah glosarium pada alat tambahan**

Dari sini Anda dapat mengonfigurasi cara menambahkan istilah glosarium pada alat tambahan seperti learning path dan alat exercice