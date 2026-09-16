# Pengaturan Agenda

Pengaturan bawaan dan perilaku alat **Agenda** (kalender / acara).

Akses pengaturan ini di bawah **Administrasi > Pengaturan Konfigurasi > Agenda**. Kategori ini berisi **11 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixture pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam format monospace. Gunakan ini saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `agenda_colors`

**Warna Agenda**

Atur warna kode HTML untuk setiap jenis acara guna mengubah warna saat menampilkan acara tersebut.

### `agenda_legend`

**Legenda Warna Agenda**

Tambahkan teks kecil sebagai legenda yang menjelaskan warna yang digunakan untuk acara.

### `agenda_on_hover_info`

**Informasi Hover Agenda**

Sesuaikan agenda saat kursor melayang di atasnya. Tampilkan komentar dan/atau deskripsi agenda.

### `agenda_reminders_sender_id`

**ID pengguna yang secara resmi mengirim pengingat agenda**

Menentukan pengguna mana yang muncul sebagai pengirim email pengingat agenda.

*Default: `0`*

### `allow_agenda_edit_for_hrm`

**Izinkan peran HRM untuk mengedit atau menghapus acara agenda**

Ini memberikan sedikit lebih banyak kekuatan kepada HRM dengan mengizinkan mereka mengedit/menghapus acara agenda dalam kursus-sesi.

*Default: `false`*

### `allow_careers_in_global_agenda`

**Hubungkan acara kalender global dengan karier dan promosi**

Ketika diaktifkan, acara kalender global dapat dikaitkan dengan karier dan promosi, memungkinkan penjadwalan yang ditargetkan.

*Default: `false`*

### `allow_personal_agenda`

**Agenda Pribadi**

Apakah peserta didik dapat menambahkan acara pribadi ke Agenda?

*Default: `true`*

### `default_calendar_view`

**Mode tampilan kalender bawaan**

Atur ini ke dayGridMonth, basicWeek, agendaWeek, atau agendaDay untuk mengubah tampilan bawaan kalender.

*Default: `month`*

### `fullcalendar_settings`

**Kustomisasi Kalender**

Pengaturan tambahan untuk agenda, memungkinkan Anda mengonfigurasi pustaka kalender spesifik yang kami gunakan.

### `personal_agenda_show_all_session_events`

**Tampilkan semua acara agenda di agenda pribadi**

Jangan sembunyikan acara dari sesi yang telah kedaluwarsa.

*Default: `false`*

### `personal_calendar_show_sessions_occupation`

**Tampilkan jadwal sesi di agenda pribadi**

Ketika diaktifkan, jadwal sesi dan okupansi ditampilkan di kalender pribadi pengguna.

*Default: `false`*