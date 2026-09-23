# Ikhtisar Antarmuka Admin

Panel administrasi adalah pusat kendali Anda untuk mengelola platform Chamilo. Akses dengan mengklik **Administration** <img src="../../.gitbook/assets/icons/mdi-cogs.svg" alt="Admin" data-size="line"> di bilah sisi.

## Dasbor Administrasi

![Dasbor administrasi yang menampilkan blok fungsional untuk Users, Courses, Sessions, dan Settings](../../.gitbook/assets/admin-dashboard-overview.png)

Dasbor admin disusun dalam blok-blok fungsional. Setiap blok mengelompokkan alat pengelolaan yang terkait:

### Users

* **User list** — Lihat, cari, sunting, dan kelola semua pengguna di platform
* **Add a user** — Buat akun pengguna secara individual
* **Classes** — Kelola kelas pengguna untuk pendaftaran sesi secara massal

Lihat bab [Users](../users/README.md) untuk rinciannya.

### Courses

* **Course list** — Lihat dan kelola semua kursus di platform
* **Create a course** — Buat kursus baru
* **Course categories** — Organisasi kursus ke dalam kategori untuk katalog

Lihat bab [Courses](../courses/README.md) untuk rinciannya.

### Sessions

* **Session list** — Lihat dan kelola sesi pelatihan
* **Create a session** — Siapkan sesi baru beserta kursus dan pendaftaran
* **Session categories** — Organisasi sesi ke dalam kategori
* **Careers and promotions** — Kelola jalur karier dan alur kerja promosi

Lihat bab [Sessions](../sessions/README.md) untuk rinciannya.

### Platform

* **Configuration settings**, **Languages**, **Portal news**, **Global agenda**, **Pages**, **Extra fields**, **Mail templates**, **Contact form categories**, dan lainnya — lihat bab [Platform](../platform/README.md) untuk rinciannya. Tautan "Configuration settings" adalah titik masuk ke bab terpisah [Platform Settings](../platform-settings/README.md).

### Analytics

* **Global statistics**, **Reports catalog**, **Learning analytics**, **Quarterly report**, **Teachers time report**, **Corporate report**, **Special exports**, **Tickets** — Statistik dan pelaporan platform; lihat bab [Analytics](../analytics/README.md) untuk rinciannya

### Skills

* **Skills wheel**, **Skills import**, **Manage skills**, **Manage skills levels**, **Skills ranking**, **Skills and assessments** — Lencana kompetensi yang terhubung dengan hasil gradebook; lihat bab [Skills](../skills/README.md) untuk rinciannya

### System

* **Clean temporary files**, **System status**, **System update**, **Colors**, **File info**, **Resources by type**, **List icons** — Pemeliharaan server, pembaruan mandiri, dan merek; lihat bab [System](../system/README.md) untuk rinciannya

### Rooms

* **Branches**, **Rooms**, **Room availability finder** — Lokasi fisik dan ruang pelatihan yang dapat dipesan; lihat bab [Rooms](../rooms/README.md) untuk rinciannya

### Security

* **Activities audit**, **Login attempts**, **Simple IDS**, **Password strength checker**, **File integrity** — Alat pemantauan keamanan dan audit; lihat bab [Security](../security/README.md) untuk rinciannya

### Plugins

* Pintasan ke plugin terpasang yang mendeklarasikan halaman menu admin, plus pengelolaan plugin secara umum — lihat bab [Plugins](../plugins/README.md) untuk rinciannya

### Health Check

* Pemeriksaan lulus/gagal secara langsung (pengaturan surat, penetapan URL admin, izin berkas) — lihat halaman [Health Check](../health-check.md) untuk rinciannya

### Other Blocks

* **Chamilo.org**, **Version check**, **Professional support**, **News from Chamilo** — tautan dan panel status yang menarik konten dari proyek Chamilo; lihat [Other Admin Blocks](../other-admin-blocks/README.md) untuk rinciannya

Setiap bagian dibahas secara rinci dalam bab yang sesuai dalam panduan ini.

Metode autentikasi seperti OAuth2, LDAP, CAS, dan penyedia autentikasi eksternal lainnya tidak dikonfigurasi di dasbor administrasi melainkan di `config/authentication.yaml`.