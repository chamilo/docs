# Pengaturan Pengumuman

Perilaku alat **Pengumuman** kursus — bagaimana pengumuman dikirim dan dijadwalkan.

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Pengumuman**. Kategori ini berisi **9 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_careers_in_global_announcements`

**Hubungkan pengumuman global dengan karier dan promosi**

Ketika diaktifkan, pengumuman global dapat dikaitkan dengan karier dan promosi untuk distribusi yang ditargetkan.

*Default: `false`*

### `allow_coach_to_edit_announcements`

**Izinkan pelatih untuk selalu mengedit pengumuman**

Izinkan pelatih untuk selalu mengedit pengumuman di dalam sesi aktif atau sesi yang telah berlalu.

*Default: `false`*

### `allow_scheduled_announcements`

**Aktifkan pengumuman terjadwal dalam sesi**

Memungkinkan pengelola sesi untuk mengatur pengumuman yang akan dipicu pada tanggal tertentu atau setelah/sebelum sejumlah hari dari awal/akhir sesi. Mengaktifkan fitur ini mengharuskan Anda untuk menyiapkan tugas cron.

*Default: `false`*

### `announcements_hide_send_to_hrm_users`

**Sembunyikan opsi untuk mengirim pengumuman ke pengguna HR**

Hapus kotak centang untuk mengaktifkan pengiriman pengumuman ke pengguna dengan peran HR (masih memerlukan konfirmasi di alat pengumuman).

*Default: `true`*

### `course_announcement_scheduled_by_date`

**Pengumuman berbasis tanggal**

Izinkan pengajar untuk mengatur pengumuman yang akan dikirim pada tanggal tertentu. Ini mengharuskan Anda untuk menyiapkan tugas cron pada cron/course_announcement.php yang berjalan setidaknya sekali sehari.

*Default: `false`*

### `disable_announcement_attachment`

**Nonaktifkan lampiran pada pengumuman**

Meskipun lampiran dalam versi ini ditangani dengan cara yang elegan dan tidak bertambah banyak di disk, Anda mungkin ingin menonaktifkan lampiran sepenuhnya jika ingin menghindari kelebihan.

*Default: `false`*

### `disable_delete_all_announcements`

**Nonaktifkan tombol untuk menghapus semua pengumuman**

Pilih 'Ya' untuk menghapus tombol menghapus semua pengumuman, karena ini dapat digunakan secara tidak sengaja oleh pengajar.

*Default: `false`*

### `hide_announcement_sent_to_users_info`

**Sembunyikan 'dikirim ke' dalam pengumuman**

Pilih 'Ya' untuk menghindari menampilkan kepada siapa pengumuman telah dikirim.

*Default: `false`*

### `hide_send_to_hrm_users`

**Sembunyikan opsi untuk mengirim salinan pengumuman ke HRM**

Dalam formulir pengumuman, biasanya muncul opsi yang memungkinkan pengajar untuk mengirim salinan pengumuman ke HRM pengguna. Atur ini ke 'Ya' untuk menghapus opsi tersebut (dan *tidak* mengirim salinan).

*Default: `false`*