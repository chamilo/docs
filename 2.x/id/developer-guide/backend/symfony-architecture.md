# Arsitektur Symfony

## Bundle

Chamilo 2.0 terstruktur dalam tiga bundle Symfony:

### CoreBundle (`src/CoreBundle/`)

Bundle terbesar, bertanggung jawab atas semua aspek yang mencakup platform:

* **Pengguna dan autentikasi** — Entitas pengguna, peran, token JWT, penyedia OAuth2
* **Sistem sumber daya** — ResourceNode dan ResourceFile (abstraksi terpadu dari konten)
* **Pengaturan platform** — Skema pengaturan di `src/CoreBundle/Settings/` yang mencakup semua aspek yang dapat dikonfigurasi
* **Administrasi** — Pengontrol administrasi untuk pengelolaan pengguna, kursus, sesi, dan plugin
* **Penyedia AI** — Pola Factory untuk OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Penyimpanan berkas** — Adaptor penyimpanan berbasis Flysystem (lokal, S3, Azure, GCS)
* **Keamanan** — Voters, kontrol akses, hierarki peran
* **Alat** — Definisi alat kursus yang terdaftar oleh sistem alat

### CourseBundle (`src/CourseBundle/`)

Semua yang berkaitan dengan konten kursus:

* **Entitas konten** — 101 entitas untuk dokumen, latihan, jalur pembelajaran, forum, glosarium, jajak pendapat, kehadiran, blog, tugas, dan lainnya
* **Salinan kursus** — Impor/ekspor dengan dukungan format Common Cartridge 1.3 dan Moodle
* **Pengaturan kursus** — Skema pengaturan pada tingkat kursus

### LtiBundle (`src/LtiBundle/`)

Implementasi standar LTI 1.3:

* **Registrasi platform dan alat** — Pengelolaan koneksi dengan alat eksternal
* **Pengelolaan peluncuran** — Pengontrol alur peluncuran LTI
* **Pengembalian nilai** — Pengiriman nilai dari alat eksternal ke Chamilo

## Kontainer Layanan

Chamilo menggunakan kontainer injeksi dependensi dari Symfony. Layanan dikonfigurasi di:

* `config/services.yaml` — Definisi layanan global
* Direktori `DependencyInjection/` pada setiap bundle — Layanan khusus untuk setiap bundle

## Arsitektur Keamanan

Sistem keamanan dikonfigurasi di `config/packages/security.yaml`:

* **Hash kata sandi** — Mendukung bcrypt (default), dengan migrasi dari SHA1 dan MD5 lama
* **Hierarki peran** — 18 peran yang diatur secara hierarkis (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; peran tambahan meliputi ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Peran sensitif konteks** — Peran pada tingkat kursus (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) dihitung per permintaan berdasarkan pendaftaran
* **Firewall** — Autentikasi JWT untuk API, berbasis sesi untuk antarmuka web
* **Voters** — Kontrol akses pada tingkat sumber daya melalui voters Symfony

## Kode Lama

Beberapa fitur masih menggunakan kode PHP lama di `public/main/`:

* Rendering dan interaksi latihan
* Pemutar jalur pembelajaran
* Beberapa alat administrasi

Fitur-fitur ini secara bertahap dimigrasikan ke arsitektur Symfony+Vue. Halaman lama disajikan melalui lapisan kompatibilitas yang menginisialisasi kernel Symfony.