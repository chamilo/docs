# Glosarium

Istilah-istilah kunci yang digunakan dalam administrasi Chamilo 2.0.

## Konsep Platform

| Istilah | Definisi |
|---------|----------|
| **URL Akses** | Dalam pengaturan multi-URL, setiap URL akses adalah portal virtual terpisah yang berbagi instalasi dan basis data Chamilo yang sama. Setiap URL dapat memiliki merek, pengguna, kursus, dan pengaturan sendiri. |
| **Kursus** | Wadah konten dasar di Chamilo. Sebuah kursus berisi materi pembelajaran, latihan, forum, dan alat lainnya. Kursus dapat berdiri sendiri atau ditugaskan ke sesi. |
| **Sesi** | Instance kursus yang terikat waktu, terdiri dari satu atau lebih kursus. Sesi memungkinkan konten kursus yang sama disampaikan ke kelompok pembelajar yang berbeda dengan pelacakan terpisah dan pelatih independen. |
| **Jalur Pembelajaran** | Urutan terstruktur dari item konten (dokumen, latihan, tautan, modul SCORM) yang memandu pembelajar melalui materi dalam urutan yang ditentukan. |
| **Buku Nilai** | Alat agregasi yang menggabungkan skor dari latihan, tugas, dan aktivitas lain menjadi nilai akhir tertimbang untuk sebuah kursus. |
| **Keterampilan** | Kompetensi atau lencana yang dapat diberikan kepada pembelajar setelah menyelesaikan kursus tertentu, latihan, atau mencapai ambang batas buku nilai. |
| **Kolom Ekstra** | Kolom data kustom yang ditambahkan oleh administrator ke pengguna, kursus, atau sesi untuk menangkap metadata khusus organisasi. |
| **Plugin** | Ekstensi yang menambahkan fungsionalitas ke Chamilo tanpa mengubah kode inti. Plugin dapat menambahkan halaman, alat, atau integrasi. |
| **Katalog** | Daftar kursus yang tersedia yang dapat dijelajahi, di mana pengguna dapat melihat deskripsi dan mendaftar sendiri. |

## Peran Pengguna

| Istilah | Definisi |
|---------|----------|
| **Pembelajar (Siswa)** | Peran pengguna default. Dapat mendaftar di kursus dan mengakses konten. |
| **Pengajar (Pelatih)** | Dapat membuat dan mengelola kursus, menambahkan konten, dan menilai pembelajar. |
| **Administrator Sesi** | Dapat membuat dan mengelola sesi serta pendaftaran. |
| **Manajer Sumber Daya Manusia (HRM)** | Dapat melihat data pelacakan dan laporan untuk pengguna yang ditugaskan. |
| **Administrator Portal** | Memiliki akses penuh ke semua fitur administrasi platform. |
| **Administrator Global** | Administrator portal dengan akses di semua URL akses dalam pengaturan multi-URL. |
| **Pelatih/Tutor** | Peran tingkat sesi. Pelatih sesi mengawasi semua kursus dalam sebuah sesi; pelatih kursus mengelola kursus tertentu dalam sebuah sesi. Semua referensi pelatih seharusnya diganti menjadi tutor dalam jangka panjang. |

## Standar dan Protokol

| Istilah | Definisi |
|---------|----------|
| **SCORM** | Sharable Content Object Reference Model. Standar pengemasan e-learning yang memungkinkan kursus diimpor dan dilacak. Chamilo mendukung SCORM 1.2 dan 2004. |
| **xAPI (Tin Can API)** | Spesifikasi e-learning untuk melacak pengalaman belajar. Lebih luas dari SCORM, dapat merekam aktivitas yang terjadi di luar LMS. Pernyataan xAPI disimpan dalam Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Standar IMS Global yang memungkinkan alat dan konten eksternal disematkan dalam LMS. Chamilo mendukung LTI 1.1 dan 1.3 sebagai konsumen dan penyedia. |
| **SCIM** | System for Cross-domain Identity Management. Standar untuk otomatisasi penyediaan dan penghentian pengguna antara penyedia identitas dan aplikasi. |
| **OAuth2** | Kerangka otorisasi yang memungkinkan aplikasi pihak ketiga mengakses Chamilo atas nama pengguna tanpa berbagi kata sandi. Digunakan untuk akses API dan integrasi SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Protokol untuk mengakses layanan direktori (misalnya, Active Directory) untuk mengautentikasi pengguna dan menyinkronkan data akun. |
| **CAS** | Central Authentication Service. Protokol single sign-on yang memungkinkan pengguna mengautentikasi sekali dan mengakses beberapa aplikasi. |
| **JWT** | JSON Web Token. Format token yang ringkas dan ditandatangani yang digunakan untuk autentikasi API dan manajemen sesi. |
| **SAML** | Security Assertion Markup Language. Standar berbasis XML untuk pertukaran data autentikasi antara penyedia identitas dan penyedia layanan. |

---
## Istilah Teknis

| Istilah | Definisi |
|---------|----------|
| **Symfony** | Kerangka kerja PHP yang menjadi dasar Chamilo 2.0. Symfony menyediakan routing, dependency injection, ORM (Doctrine), templating (Twig), dan infrastruktur lainnya. |
| **Doctrine** | Pemetaan relasional objek (ORM) yang digunakan oleh Chamilo untuk berinteraksi dengan basis data. Doctrine memetakan objek PHP ke tabel basis data. |
| **Twig** | Mesin template yang digunakan oleh Symfony dan Chamilo untuk merender HTML. |
| **Flysystem** | Lapisan abstraksi sistem berkas PHP. Chamilo menggunakan Flysystem untuk mendukung penyimpanan lokal, Amazon S3, Azure Blob, dan Google Cloud Storage secara bergantian. |
| **Composer** | Manajer dependensi PHP. Digunakan untuk menginstal dan memperbarui pustaka PHP Chamilo. |
| **Mailer DSN** | Data Source Name untuk transportasi email. String koneksi yang memberitahu Symfony cara mengirim email (misalnya, melalui SMTP, Amazon SES, atau Mailjet). |
| **OPcache** | Cache opcode bawaan PHP. Mengkompilasi skrip PHP menjadi bytecode dan menyimpannya di memori, secara signifikan meningkatkan performa. |
| **APCu** | Ekstensi PHP yang menyediakan cache di memori pada tingkat pengguna. Digunakan oleh Symfony untuk caching metadata dan konfigurasi. |

## Singkatan

| Singkatan | Bentuk Lengkap |
|-----------|----------------|
| **LMS** | Learning Management System (Sistem Manajemen Pembelajaran) |
| **LRS** | Learning Record Store (Penyimpanan Rekaman Pembelajaran untuk pernyataan xAPI) |
| **SSO** | Single Sign-On (Masuk Tunggal) |
| **CSV** | Comma-Separated Values (Nilai yang Dipisahkan Koma, digunakan untuk impor pengguna/kursus) |
| **API** | Application Programming Interface (Antarmuka Pemrograman Aplikasi) |
| **REST** | Representational State Transfer (Gaya arsitektur API) |
| **GDPR** | General Data Protection Regulation (Regulasi Perlindungan Data Umum Uni Eropa) |
| **HSTS** | HTTP Strict Transport Security (Keamanan Transportasi Ketat HTTP) |
| **CDN** | Content Delivery Network (Jaringan Pengiriman Konten) |
| **DNS** | Domain Name System (Sistem Nama Domain) |
| **SPF** | Sender Policy Framework (Kerangka Kebijakan Pengirim untuk autentikasi email) |
| **DKIM** | DomainKeys Identified Mail (Email Teridentifikasi DomainKeys untuk autentikasi email) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance (Autentikasi Pesan Berbasis Domain, Pelaporan, dan Kepatuhan) |