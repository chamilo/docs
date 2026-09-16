# Pengaturan Forum

Perilaku alat **Forums** pada kursus.

Akses pengaturan ini di **Administration > Configuration settings > Forums**. Kategori ini berisi **9 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirim dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat menulis skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_forum_category_language_filter`

**Filter bahasa kategori forum**

Tambahkan filter bahasa pada tampilan forum agar hanya menampilkan kategori yang dikonfigurasi dalam bahasa tertentu. Memerlukan penggunaan extra field 'language' pada entitas 'forum_category'.

*Default: `false`*

### `allow_forum_post_revisions`

**Tinjauan pos forum**

Aktifkan opsi ini untuk memungkinkan permintaan tinjauan atau terjemahan terhadap pos seseorang di forum. Jika dikonfigurasi secara ekstensif, dapat digunakan untuk berkolaborasi dengan pengguna lain dalam forum pembelajaran bahasa.

*Default: `false`*

### `community_managers_user_list`

**Daftar community manager**

Sediakan array ID pengguna yang akan dianggap sebagai community manager pada kursus khusus yang ditetapkan sebagai forum global. Community manager memiliki hak istimewa tambahan pada forum global.

### `default_forum_view`

**Tampilan forum default**

Apa yang seharusnya menjadi opsi default saat membuat forum baru. Namun, setiap pelatih dapat memilih tampilan yang berbeda untuk setiap forum secara individual

*Default: `flat`*

### `display_groups_forum_in_general_tool`

**Tampilkan forum kelompok di forum umum**

Tampilkan forum kelompok pada alat forum di tingkat kursus. Opsi ini diaktifkan secara default (dalam hal ini, visibilitas individual forum kelompok tetap berlaku sebagai kriteria tambahan). Jika dinonaktifkan, forum kelompok hanya akan terlihat melalui alat kelompok, baik bersifat publik maupun tidak.

*Default: `true`*

### `forum_fold_categories`

**Lipat kategori forum**

Efek visual untuk mengaktifkan pelipatan/pembukaan kategori forum.

*Default: `false`*

### `global_forums_course_id`

**Gunakan kursus sebagai forum global**

Tetapkan ID kursus (numerik) dari kursus yang dicadangkan untuk digunakan sebagai forum global. Ini menggantikan tautan 'Social groups' di jejaring sosial dengan tautan ke forum kursus tersebut.

*Default: `0`*

### `hide_forum_post_revision_language`

**Sembunyikan bahasa tinjauan pos forum**

Sembunyikan kemungkinan untuk menetapkan bahasa pada tinjauan pos forum.

*Default: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifikasi forum dari kursus dasar juga**

Aktifkan opsi ini untuk mengaktifkan notifikasi yang berasal dari forum kursus dasar, meskipun mengikuti kursus melalui sesi.

*Default: `false`*