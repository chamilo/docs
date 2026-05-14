# Pengaturan Forum

Perilaku alat **Forum** dalam kursus.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Forum**. Kategori ini berisi **9 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_forum_category_language_filter`

**Filter bahasa kategori forum**

Tambahkan filter bahasa pada tampilan forum untuk hanya melihat kategori yang dikonfigurasi dalam bahasa tertentu. Memerlukan penggunaan bidang tambahan 'language' pada entitas 'forum_category'.

*Default: `false`*

### `allow_forum_post_revisions`

**Ulasan posting forum**

Aktifkan opsi ini untuk memungkinkan meminta ulasan atau terjemahan untuk posting seseorang di forum. Jika dikonfigurasi secara ekstensif, dapat digunakan untuk berkolaborasi dengan pengguna lain dalam forum pembelajaran bahasa.

*Default: `false`*

### `community_managers_user_list`

**Daftar manajer komunitas**

Berikan array ID pengguna yang akan dianggap sebagai manajer komunitas dalam kursus khusus yang ditetapkan sebagai forum global. Manajer komunitas memiliki hak istimewa tambahan di forum global.

### `default_forum_view`

**Tampilan forum default**

Apa yang seharusnya menjadi opsi default saat membuat forum baru. Namun, setiap pelatih dapat memilih tampilan yang berbeda untuk setiap forum individu.

*Default: `flat`*

### `display_groups_forum_in_general_tool`

**Tampilkan forum grup di forum umum**

Tampilkan forum grup di alat forum pada tingkat kursus. Opsi ini diaktifkan secara default (dalam hal ini, visibilitas individu forum grup tetap berfungsi sebagai kriteria tambahan). Jika dinonaktifkan, forum grup hanya akan terlihat melalui alat grup, baik itu bersifat publik atau tidak.

*Default: `true`*

### `forum_fold_categories`

**Lipat kategori forum**

Efek visual untuk mengaktifkan pelipatan/pembukaan kategori forum.

*Default: `false`*

### `global_forums_course_id`

**Gunakan kursus sebagai forum global**

Tetapkan ID kursus (numerik) dari kursus yang disediakan untuk digunakan sebagai forum global. Ini menggantikan tautan 'Social groups' di jejaring sosial dengan tautan ke forum kursus tersebut.

*Default: `0`*

### `hide_forum_post_revision_language`

**Sembunyikan bahasa ulasan posting forum**

Sembunyikan kemungkinan untuk menetapkan bahasa pada ulasan posting forum.

*Default: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifikasi forum dari kursus dasar juga**

Aktifkan opsi ini untuk mengaktifkan notifikasi yang berasal dari forum kursus dasar, bahkan jika mengikuti kursus melalui sesi.

*Default: `false`*