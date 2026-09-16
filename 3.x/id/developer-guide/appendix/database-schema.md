# Skema Basis Data

Chamilo 3.0 memetakan sekumpulan besar entitas Doctrine ke tabel basis data. Jumlah pastinya berubah antar rilis — baca direktori entitas yang tercantum di bawah untuk keadaan terkini.

## Lokasi entitas

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tabel Utama

### Pengguna dan Autentikasi

| Table | Purpose |
|-------|---------|
| `user` | Akun pengguna |
| `access_url` | Portal multi-URL |
| `access_url_rel_user` | Penugasan pengguna-portal |
| `usergroup` | Grup pengguna di seluruh platform |

### Kursus

| Table | Purpose |
|-------|---------|
| `course` | Kursus |
| `course_category` | Kategori kursus |
| `course_rel_user` | Pendaftaran kursus |

### Sesi

| Table | Purpose |
|-------|---------|
| `session` | Sesi pelatihan |
| `session_rel_user` | Pendaftaran sesi |
| `session_rel_course` | Kursus dalam sesi |
| `session_rel_course_rel_user` | Pendaftaran pengguna per sesi-kursus |

### Sistem Sumber Daya

| Table | Purpose |
|-------|---------|
| `resource_node` | Abstraksi konten terpadu |
| `resource_file` | Lampiran berkas |
| `resource_link` | Visibilitas/akses per konteks |
| `resource_type` | Registri tipe sumber daya |

### Konten Kursus (prefiks c_)

| Table | Purpose |
|-------|---------|
| `c_document` | Dokumen |
| `c_quiz` | Latihan/tes |
| `c_quiz_question` | Pertanyaan kuis |
| `c_quiz_answer` | Jawaban pertanyaan |
| `c_lp` | Jalur pembelajaran |
| `c_lp_item` | Item jalur pembelajaran |
| `c_forum_category` | Kategori forum |
| `c_forum_forum` | Forum |
| `c_forum_thread` | Utas forum |
| `c_forum_post` | Kiriman forum |
| `c_student_publication` | Tugas/pengumpulan |
| `c_survey` | Survei |
| `c_glossary` | Istilah glosarium |
| `c_calendar_event` | Acara kalender |
| `c_attendance` | Lembar kehadiran |

### Pelacakan

| Table | Purpose |
|-------|---------|
| `track_e_login` | Pelacakan login |
| `track_e_online` | Pelacakan pengguna daring |
| `track_e_default` | Pelacakan aktivitas generik |
| `gradebook_category` | Kategori buku nilai |
| `gradebook_result` | Nilai |

### Pengaturan

| Table | Purpose |
|-------|---------|
| `settings` | Pengaturan platform |
| `settings_options` | Definisi opsi pengaturan |

## Migrasi

Perubahan skema basis data dikelola melalui Doctrine Migrations di `src/CoreBundle/Migrations/`. Jalankan migrasi dengan:

```bash
php bin/console doctrine:migrations:migrate
```