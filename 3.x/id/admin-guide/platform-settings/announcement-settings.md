# Pengaturan Pengumuman

Perilaku alat **Announcements** pada kursus — bagaimana pengumuman dikirim dan dijadwalkan.

Akses pengaturan ini di **Administration > Configuration settings > Announcements**. Kategori ini berisi **10 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_careers_in_global_announcements`

**Hubungkan pengumuman global dengan karier dan promosi**

Jika diaktifkan, pengumuman global dapat dikaitkan dengan karier dan promosi untuk distribusi yang ditargetkan.

*Default: `false`*

### `allow_coach_to_edit_announcements`

**Izinkan tutor selalu mengedit pengumuman**

Izinkan tutor selalu mengedit pengumuman di dalam sesi yang aktif atau yang sudah berlalu.

*Default: `false`*

### `allow_scheduled_announcements`

**Aktifkan pengumuman terjadwal dalam sesi**

Memungkinkan manajer sesi mengatur pengumuman yang akan dipicu pada tanggal tertentu atau setelah/sebelum sejumlah hari dari awal/akhir sesi. Mengaktifkan fitur ini mengharuskan Anda menyiapkan tugas cron.

*Default: `false`*

### `announcements_hide_send_to_hrm_users`

**Sembunyikan opsi untuk mengirim pengumuman ke pengguna HR**

Hapus kotak centang untuk mengaktifkan pengiriman pengumuman kepada pengguna dengan peran HR (tetap memerlukan konfirmasi di alat pengumuman).

*Default: `true`*

### `course_announcement_scheduled_by_date`

**Pengumuman berbasis tanggal**

Izinkan pengajar mengonfigurasi pengumuman yang akan dikirim pada tanggal tertentu. Ini mengharuskan Anda menyiapkan tugas cron pada cron/course_announcement.php yang berjalan setidaknya sekali sehari.

*Default: `false`*

### `disable_announcement_attachment`

**Nonaktifkan lampiran pada pengumuman**

Meskipun lampiran pada versi ini ditangani dengan elegan dan tidak menggandakan diri di disk, Anda mungkin ingin menonaktifkan lampiran sepenuhnya jika ingin menghindari kelebihan.

*Default: `false`*

### `disable_delete_all_announcements`

**Nonaktifkan tombol untuk menghapus semua pengumuman**

Pilih 'Ya' untuk menghapus tombol penghapusan semua pengumuman, karena tombol ini dapat digunakan secara tidak sengaja oleh pengajar.

*Default: `false`*

### `hide_announcement_sent_to_users_info`

**Sembunyikan 'dikirim kepada' pada pengumuman**

Pilih 'Ya' untuk menghindari tampilan kepada siapa suatu pengumuman telah dikirim.

*Default: `false`*

### `hide_global_announcements_when_not_connected` **v3**

**Sembunyikan pengumuman global untuk pengguna anonim**

Sembunyikan pengumuman platform dari pengguna anonim, dan hanya tampilkan kepada pengguna yang terautentikasi.

*Default: `false`*

### `hide_send_to_hrm_users`

**Sembunyikan opsi untuk mengirim salinan pengumuman ke HRM**

Pada formulir pengumuman, biasanya muncul opsi yang memungkinkan pengajar mengirim salinan pengumuman kepada HRM pengguna. Atur ini ke 'Ya' untuk menghapus opsi tersebut (dan *tidak* mengirim salinannya).