# Glosarium

Istilah-istilah yang berfokus pada pengembangan yang digunakan sepanjang panduan ini.

| Istilah | Definisi |
|---------|----------|
| **API Platform** | Sebuah framework PHP untuk membangun API REST dan GraphQL, terintegrasi dengan Symfony. Chamilo menggunakannya untuk menghasilkan endpoint API secara otomatis dari entitas Doctrine. |
| **Bundle** | Sebuah unit organisasi Symfony yang mirip dengan plugin atau modul. Chamilo memiliki tiga: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Sebuah pola di Vue 3 untuk mengekstrak dan menggunakan kembali logika reaktif. Disimpan di `assets/vue/composables/`. |
| **Doctrine ORM** | Pemetaan objek-relasional PHP yang digunakan oleh Chamilo. Memetakan kelas entitas PHP ke tabel basis data. |
| **Entity** | Sebuah kelas PHP yang dianotasi dengan atribut Doctrine yang memetakan ke tabel basis data. |
| **Encore** | Symfony Webpack Encore — sebuah pembungkus di sekitar Webpack yang menyederhanakan konfigurasi build frontend. |
| **Flysystem** | Sebuah pustaka abstraksi sistem file PHP. Chamilo menggunakannya untuk mendukung penyimpanan lokal, S3, Azure, dan GCS. |
| **JWT** | JSON Web Token — mekanisme autentikasi untuk API REST. |
| **Pinia** | Pustaka manajemen status yang direkomendasikan untuk Vue 3. Digunakan untuk store baru di Chamilo; store lama dari Vuex tetap ada bersamaan dengannya. |
| **PrimeVue** | Pustaka komponen antarmuka pengguna Vue 3 yang digunakan oleh Chamilo. Menyediakan tombol, tabel, dialog, dll. |
| **ResourceNode** | Entitas pusat dalam sistem sumber daya Chamilo. Setiap bagian konten kursus memiliki ResourceNode. |
| **ResourceFile** | Sebuah entitas yang mewakili file yang dilampirkan ke ResourceNode. Disimpan melalui Flysystem. |
| **ResourceLink** | Sebuah entitas yang mengontrol visibilitas dan akses berdasarkan konteks kursus/sesi/grup. |
| **SCORM** | Sharable Content Object Reference Model. Sebuah standar e-learning untuk pengemasan konten. |
| **Settings Schema** | Sebuah kelas PHP yang mendefinisikan kategori pengaturan platform (misalnya, SecuritySettingsSchema). |
| **Voter** | Sebuah komponen keamanan Symfony yang menentukan apakah pengguna dapat melakukan tindakan pada sumber daya. |
| **Webpack** | Penggabung modul JavaScript yang mengompilasi komponen Vue, SCSS, dan TypeScript menjadi paket yang siap untuk browser. |