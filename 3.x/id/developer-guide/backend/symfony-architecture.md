# Arsitektur Symfony

## Bundle

Chamilo 3.0 terstruktur ke dalam tiga bundle Symfony:

### CoreBundle (`src/CoreBundle/`)

Bundle terbesar, yang menangani semua urusan di seluruh platform:

* **Pengguna dan autentikasi** — Entitas User, peran, token JWT, penyedia OAuth2
* **Sistem resource** — ResourceNode dan ResourceFile (abstraksi konten terpadu)
* **Pengaturan platform** — skema pengaturan di `src/CoreBundle/Settings/` yang mencakup setiap aspek yang dapat dikonfigurasi
* **Administrasi** — Controller admin untuk pengelolaan pengguna, kursus, sesi, dan plugin
* **Penyedia AI** — Pola factory untuk OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Penyimpanan berkas** — Adapter penyimpanan berbasis Flysystem (lokal, S3, Azure, GCS)
* **Keamanan** — Voter, kontrol akses, hierarki peran
* **Alat** — definisi alat kursus yang didaftarkan melalui sistem alat

### CourseBundle (`src/CourseBundle/`)

Segala sesuatu yang spesifik untuk konten kursus:

* **Entitas konten** — 101 entitas untuk dokumen, latihan, jalur pembelajaran, forum, glosarium, survei, kehadiran, blog, tugas, dan lainnya
* **Salinan kursus** — Impor/ekspor dengan dukungan Common Cartridge 1.3 dan format Moodle
* **Pengaturan kursus** — Skema pengaturan tingkat kursus

### LtiBundle (`src/LtiBundle/`)

Implementasi standar LTI 1.3:

* **Registrasi platform dan alat** — Mengelola koneksi alat eksternal
* **Penanganan peluncuran** — Controller alur peluncuran LTI
* **Grade passback** — Mengembalikan nilai dari alat eksternal ke Chamilo

## Service Container

Chamilo menggunakan container injeksi dependensi Symfony. Layanan dikonfigurasi di:

* `config/services.yaml` — Definisi layanan global
* Direktori `DependencyInjection/` setiap bundle — Layanan spesifik bundle

## Arsitektur Keamanan

Sistem keamanan dikonfigurasi di `config/packages/security.yaml`:

* **Hashing kata sandi** — Mendukung bcrypt (default), dengan migrasi dari SHA1 dan MD5 warisan
* **Hierarki peran** — 18 peran yang diorganisasi secara hierarkis (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; peran tambahan mencakup ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Peran yang peka konteks** — Peran tingkat kursus (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) dihitung per permintaan berdasarkan pendaftaran
* **Firewall** — Autentikasi JWT untuk API, berbasis sesi untuk antarmuka web
* **Voter** — Kontrol akses tingkat resource melalui voter Symfony

## Kode Warisan

Beberapa fitur masih menggunakan kode PHP warisan di `public/main/`:

* Rendering dan interaksi latihan
* Pemutar jalur pembelajaran
* Beberapa alat admin

Fitur-fitur ini secara bertahap dimigrasikan ke arsitektur Symfony+Vue. Halaman warisan disajikan melalui lapisan kompatibilitas yang melakukan bootstrap kernel Symfony.