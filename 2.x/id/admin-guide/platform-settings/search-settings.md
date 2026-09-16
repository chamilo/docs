# Pengaturan Pencarian

Konfigurasi sistem pencarian teks lengkap (Xapian).

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Pencarian**. Kategori ini berisi **3 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `search_enabled`

**Fitur pencarian teks lengkap**

Pilih 'Ya' untuk mengaktifkan fitur ini. Fitur ini sangat bergantung pada ekstensi Xapian untuk PHP, sehingga tidak akan berfungsi jika ekstensi ini tidak terpasang di server Anda, minimal pada versi 1.x.

*Default: `false`*


### `search_prefilter_prefix`

**Bidang Khusus untuk Prefilter**

Opsi ini memungkinkan Anda memilih bidang khusus yang akan digunakan pada jenis pencarian prefilter.

### `search_show_unlinked_results`

**Pencarian teks lengkap: tampilkan hasil yang tidak terhubung**

Saat menampilkan hasil dari pencarian teks lengkap, apa yang harus dilakukan dengan hasil yang tidak dapat diakses oleh pengguna saat ini?

*Default: `true`*