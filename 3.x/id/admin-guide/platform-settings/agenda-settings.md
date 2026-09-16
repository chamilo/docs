# Pengaturan Agenda

Nilai bawaan dan perilaku alat **Agenda** (kalender / acara).

Akses pengaturan ini di **Administration > Configuration settings > Agenda**. Kategori ini berisi **11 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang disertakan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat menulis skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan menyunting [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `agenda_colors`

**Warna agenda**

Tetapkan warna kode HTML untuk setiap jenis acara guna mengubah warna saat menampilkan acara.

### `agenda_legend`

**Legenda warna agenda**

Tambahkan teks singkat sebagai legenda yang menjelaskan warna yang digunakan untuk acara.

### `agenda_on_hover_info`

**Info hover agenda**

Sesuaikan agenda saat kursor diarahkan. Tampilkan komentar dan/atau deskripsi agenda.

### `agenda_reminders_sender_id`

**ID pengguna yang secara resmi mengirim pengingat agenda**

Menentukan pengguna mana yang muncul sebagai pengirim email pengingat agenda.

*Default: `0`*

### `allow_agenda_edit_for_hrm`

**Izinkan peran HRM menyunting atau menghapus acara agenda**

Ini memberi HRM sedikit lebih banyak wewenang dengan mengizinkan mereka menyunting/menghapus acara agenda dalam sesi kursus.

*Default: `false`*

### `allow_careers_in_global_agenda`

**Tautkan acara kalender global dengan karier dan promosi**

Jika diaktifkan, acara kalender global dapat dikaitkan dengan karier dan promosi, sehingga memungkinkan penjadwalan yang terarah.

*Default: `false`*

### `allow_personal_agenda`

**Agenda Pribadi**

Dapatkah peserta didik menambahkan acara pribadi ke Agenda?

*Default: `true`*

### `default_calendar_view`

**Mode tampilan kalender bawaan**

Atur ke dayGridMonth, basicWeek, agendaWeek, atau agendaDay untuk mengubah tampilan bawaan kalender.

*Default: `month`*

### `fullcalendar_settings`

**Kustomisasi kalender**

Pengaturan tambahan untuk agenda, yang memungkinkan Anda mengonfigurasi pustaka kalender spesifik yang kami gunakan.

### `personal_agenda_show_all_session_events`

**Tampilkan semua acara agenda di agenda pribadi**

Jangan sembunyikan acara dari sesi yang sudah kedaluwarsa.

*Default: `false`*

### `personal_calendar_show_sessions_occupation`

**Tampilkan okupasi sesi di agenda pribadi**

Jika diaktifkan, jadwal dan okupasi sesi ditampilkan di kalender pribadi pengguna.

*Default: `false`*