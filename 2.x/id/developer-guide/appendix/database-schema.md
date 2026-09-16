# Skema Basis Data

Chamilo 2.0 memetakan sejumlah besar entitas Doctrine ke tabel basis data. Jumlah pastinya bervariasi antar versi — silakan merujuk ke direktori entitas yang tercantum di bawah ini untuk status terkini.

## Lokasi Entitas

| Bundle | Lokasi | Awalan |
|--------|--------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Tidak ada (misalnya, `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (misalnya, `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tabel Utama

### Pengguna dan Autentikasi

| Tabel | Tujuan |
|-------|--------|
| `user` | Akun pengguna |
| `access_url` | Portal multi-URL |
| `access_url_rel_user` | Penugasan pengguna-portal |
| `usergroup` | Grup pengguna di seluruh platform |

### Kursus

| Tabel | Tujuan |
|-------|--------|
| `course` | Kursus |
| `course_category` | Kategori kursus |
| `course_rel_user` | Pendaftaran kursus |

### Sesi

| Tabel | Tujuan |
|-------|--------|
| `session` | Sesi pelatihan |
| `session_rel_user` | Pendaftaran sesi |
| `session_rel_course` | Kursus dalam sesi |
| `session_rel_course_rel_user` | Pendaftaran pengguna per sesi-kursus |

### Sistem Sumber Daya

| Tabel | Tujuan |
|-------|--------|
| `resource_node` | Abstraksi konten terpadu |
| `resource_file` | Lampiran berkas |
| `resource_link` | Visibilitas/akses berdasarkan konteks |
| `resource_type` | Pendaftaran jenis sumber daya |

### Konten Kursus (awalan c_)

| Tabel | Tujuan |
|-------|--------|
| `c_document` | Dokumen |
| `c_quiz` | Latihan/tes |
| `c_quiz_question` | Pertanyaan kuis |
| `c_quiz_answer` | Jawaban pertanyaan |
| `c_lp` | Jalur pembelajaran |
| `c_lp_item` | Item jalur pembelajaran |
| `c_forum_category` | Kategori forum |
| `c_forum_forum` | Forum |
| `c_forum_thread` | Topik forum |
| `c_forum_post` | Postingan forum |
| `c_student_publication` | Tugas/pengiriman |
| `c_survey` | Survei |
| `c_glossary` | Istilah glosarium |
| `c_calendar_event` | Acara kalender |
| `c_attendance` | Lembar kehadiran |

### Pelacakan

| Tabel | Tujuan |
|-------|--------|
| `track_e_login` | Pelacakan login |
| `track_e_online` | Pelacakan pengguna online |
| `track_e_default` | Pelacakan aktivitas umum |
| `gradebook_category` | Kategori buku nilai |
| `gradebook_result` | Nilai |

### Pengaturan

| Tabel | Tujuan |
|-------|--------|
| `settings` | Pengaturan platform |
| `settings_options` | Definisi opsi pengaturan |

## Migrasi

Perubahan pada skema basis data dikelola melalui Doctrine Migrations di `src/CoreBundle/Migrations/`. Jalankan migrasi dengan:

```bash
php bin/console doctrine:migrations:migrate
```