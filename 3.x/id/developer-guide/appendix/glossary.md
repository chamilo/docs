# Glosarium

Istilah yang berfokus pada pengembang yang digunakan di seluruh panduan ini.

| Term | Definition |
|------|-----------|
| **API Platform** | Kerangka kerja PHP untuk membangun API REST dan GraphQL, terintegrasi dengan Symfony. Chamilo menggunakannya untuk menghasilkan endpoint API secara otomatis dari entitas Doctrine. |
| **Bundle** | Unit organisasi Symfony yang serupa dengan plugin atau modul. Chamilo memiliki tiga: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Pola Vue 3 untuk mengekstrak dan menggunakan kembali logika reaktif. Disimpan di `assets/vue/composables/`. |
| **Doctrine ORM** | Pemeta relasional objek PHP yang digunakan oleh Chamilo. Memetakan kelas entitas PHP ke tabel basis data. |
| **Entity** | Kelas PHP yang dianotasi dengan atribut Doctrine yang dipetakan ke tabel basis data. |
| **Encore** | Symfony Webpack Encore — pembungkus di sekitar Webpack yang menyederhanakan konfigurasi build frontend. |
| **Flysystem** | Pustaka abstraksi sistem berkas PHP. Chamilo menggunakannya untuk mendukung penyimpanan lokal, S3, Azure, dan GCS. |
| **JWT** | JSON Web Token — mekanisme autentikasi untuk REST API. |
| **Pinia** | Pustaka manajemen state yang direkomendasikan untuk Vue 3. Digunakan untuk store baru di Chamilo; store Vuex warisan tetap ada bersamanya. |
| **PrimeVue** | Pustaka komponen UI Vue 3 yang digunakan oleh Chamilo. Menyediakan tombol, tabel, dialog, dan sebagainya. |
| **ResourceNode** | Entitas pusat dalam sistem sumber daya Chamilo. Setiap bagian konten kursus memiliki ResourceNode. |
| **ResourceFile** | Entitas yang merepresentasikan berkas yang dilampirkan ke ResourceNode. Disimpan melalui Flysystem. |
| **ResourceLink** | Entitas yang mengontrol visibilitas dan akses per konteks kursus/sesi/kelompok. |
| **SCORM** | Sharable Content Object Reference Model. Standar e-learning untuk pengemasan konten. |
| **Settings Schema** | Kelas PHP yang mendefinisikan kategori pengaturan platform (misalnya, SecuritySettingsSchema). |
| **Voter** | Komponen keamanan Symfony yang memutuskan apakah pengguna dapat melakukan suatu tindakan pada sumber daya. |
| **Webpack** | Bundler modul JavaScript yang mengompilasi komponen Vue, SCSS, dan TypeScript menjadi bundel yang siap untuk peramban. |