# Pengaturan Tiket

Perilaku sistem **Tiket** (helpdesk).

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Tiket**. Kategori ini berisi **7 pengaturan**, yang tercantum di bawah ini dengan judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `show_link_bug_notification`

**Tampilkan tautan untuk melaporkan bug**

Menampilkan tautan di header untuk melaporkan bug di dalam platform dukungan kami (http://support.chamilo.org). Saat mengklik tautan tersebut, pengguna akan diarahkan ke platform dukungan, pada halaman wiki yang menjelaskan proses pelaporan bug.

*Default: `false`*

### `show_link_ticket_notification`

**Tampilkan tautan pembuatan tiket**

Menampilkan tautan pembuatan tiket kepada pengguna di sisi kanan portal.

*Default: `false`*

### `ticket_allow_category_edition`

**Izinkan pengeditan kategori tiket**

Mengizinkan pengeditan kategori oleh administrator.

*Default: `false`*

### `ticket_allow_student_add`

**Izinkan pengguna menambahkan tiket**

Mengizinkan semua pengguna untuk menambahkan tiket, tidak hanya administrator.

*Default: `false`*

### `ticket_project_user_roles`

**Akses berdasarkan peran ke proyek tiket**

Mengizinkan proyek tiket diakses oleh peran pengguna tertentu. Contoh: ['permissions' => [1 => [17]] di mana project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Kirim pesan peringatan tiket ke administrator**

Mengirim pesan jika tiket dibuat tanpa kategori atau jika kategori tidak memiliki administrator yang ditugaskan.

*Default: `false`*

### `ticket_warn_admin_no_user_in_category`

**Kirim peringatan ke administrator jika kategori tiket tidak memiliki penanggung jawab**

Mengirim pesan peringatan (email dan pesan Chamilo) ke semua administrator jika tidak ada pengguna yang ditugaskan ke kategori.

*Default: `false`*