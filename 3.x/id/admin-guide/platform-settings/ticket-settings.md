# Pengaturan Tiket

Perilaku sistem **Tiket** (helpdesk).

Akses pengaturan ini di bawah **Administrasi > Pengaturan konfigurasi > Tiket**. Kategori ini berisi **7 pengaturan**, tercantum di bawah dengan judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `show_link_bug_notification`

**Tampilkan tautan untuk melaporkan bug**

Tampilkan tautan di header untuk melaporkan bug di dalam platform dukungan kami (http://support.chamilo.org). Saat tautan diklik, pengguna diarahkan ke platform dukungan, pada halaman wiki yang menjelaskan proses pelaporan bug.

*Default: `false`*


### `show_link_ticket_notification`

**Tampilkan tautan pembuatan tiket**

Tampilkan tautan pembuatan tiket kepada pengguna di sisi kanan portal

*Default: `false`*


### `ticket_allow_category_edition`

**Izinkan pengeditan kategori tiket**

Izinkan pengeditan kategori oleh administrator.

*Default: `false`*

### `ticket_allow_student_add`

**Izinkan pengguna menambahkan tiket**

Mengizinkan semua pengguna menambahkan tiket, tidak hanya administrator.

*Default: `false`*

### `ticket_project_user_roles`

**Akses berdasarkan peran ke proyek tiket**

Izinkan proyek tiket diakses oleh peran pengguna tertentu. Contoh: ['permissions' => [1 => [17]] di mana project_id = 1, STUDENT_BOSS = 17.

> Pengaturan ini wajib untuk pengguna non-admin: tanpa pemetaan peran yang didefinisikan di sini, hanya administrator yang dapat mengakses tiket dukungan. Untuk memberikan akses peran lain ke suatu proyek tiket, tambahkan ID peran tersebut ke permissions pengaturan ini untuk proyek tersebut.

### `ticket_send_warning_to_all_admins`

**Kirim pesan peringatan tiket kepada administrator**

Kirim pesan jika tiket dibuat tanpa kategori atau jika suatu kategori tidak memiliki administrator yang ditugaskan.

*Default: `false`*


### `ticket_warn_admin_no_user_in_category`

**Kirim peringatan kepada administrator jika kategori tiket tidak memiliki penanggung jawab**

Kirim pesan peringatan (e-mail dan pesan Chamilo) kepada semua administrator jika tidak ada pengguna yang ditugaskan ke suatu kategori.

*Default: `false`*