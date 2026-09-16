# Glosarium

Istilah-istilah kunci yang digunakan dalam administrasi Chamilo 3.0.

## Konsep Platform

| Term | Definition |
|------|------------|
| **Access URL** | Dalam pengaturan multi-URL, setiap access URL adalah portal virtual terpisah yang berbagi instalasi dan basis data Chamilo yang sama. Setiap URL dapat memiliki merek, pengguna, kursus, dan pengaturan sendiri. |
| **Course** | Wadah konten mendasar di Chamilo. Sebuah course menampung materi pembelajaran, latihan, forum, dan alat lainnya. Course dapat berdiri sendiri atau ditetapkan ke session. |
| **Session** | Instans terbatas waktu dari satu atau lebih course. Session memungkinkan konten course yang sama disampaikan kepada kelompok pembelajar yang berbeda dengan pelacakan terpisah dan tutor independen. |
| **Learning path** | Urutan terstruktur item konten (dokumen, latihan, tautan, modul SCORM) yang memandu pembelajar melalui materi dalam urutan yang ditentukan. |
| **Gradebook** | Alat agregasi yang menggabungkan skor dari latihan, tugas, dan aktivitas lain menjadi nilai akhir berbobot untuk sebuah course. |
| **Skill** | Kompetensi atau lencana yang dapat diberikan kepada pembelajar setelah menyelesaikan course tertentu, latihan, atau mencapai ambang gradebook. |
| **Extra field** | Bidang data kustom yang ditambahkan administrator ke pengguna, course, atau session untuk menangkap metadata spesifik organisasi. |
| **Plugin** | Ekstensi yang menambahkan fungsionalitas ke Chamilo tanpa mengubah kode inti. Plugin dapat menambahkan halaman, alat, atau integrasi. |
| **Catalog** | Daftar course yang tersedia yang dapat ditelusuri, tempat pengguna dapat melihat deskripsi dan mendaftar sendiri. |

## Peran Pengguna

| Term | Definition |
|------|------------|
| **Learner (Student)** | Peran pengguna bawaan. Dapat mendaftar ke course dan mengonsumsi konten. |
| **Teacher (Trainer)** | Dapat membuat dan mengelola course, menambahkan konten, dan menilai pembelajar. |
| **Session administrator** | Dapat membuat dan mengelola session serta pendaftaran. |
| **Human Resources Manager (HRM)** | Dapat melihat data pelacakan dan pelaporan untuk pengguna yang ditugaskan. |
| **Portal administrator** | Akses penuh ke semua fitur administrasi platform. |
| **Global administrator** | Portal administrator dengan akses di seluruh access URL dalam pengaturan multi-URL. |
| **Tutor** | Peran tingkat session. Tutor session mengawasi semua course dalam sebuah session; tutor course mengelola course tertentu dalam sebuah session. Disebut "coach" pada versi Chamilo sebelum 3.0. |

## Standar dan Protokol

| Term | Definition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Standar pengemasan e-learning yang memungkinkan course diimpor dan dilacak. Chamilo mendukung SCORM 1.2 dan 2004. |
| **xAPI (Tin Can API)** | Spesifikasi e-learning untuk melacak pengalaman belajar. Lebih luas daripada SCORM, dapat merekam aktivitas yang terjadi di luar LMS. Pernyataan xAPI disimpan dalam Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Standar IMS Global yang memungkinkan alat dan konten eksternal disematkan dalam LMS. Chamilo mendukung LTI 1.1 dan 1.3 baik sebagai konsumen maupun penyedia. |
| **SCIM** | System for Cross-domain Identity Management. Standar untuk mengotomatiskan penyediaan dan pencabutan pengguna antara penyedia identitas dan aplikasi. |
| **OAuth2** | Kerangka otorisasi yang memungkinkan aplikasi pihak ketiga mengakses Chamilo atas nama pengguna tanpa berbagi kata sandi. Digunakan untuk akses API dan integrasi SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Protokol untuk mengakses layanan direktori (misalnya Active Directory) guna mengautentikasi pengguna dan menyinkronkan data akun. |
| **CAS** | Central Authentication Service. Protokol single sign-on yang memungkinkan pengguna mengautentikasi sekali dan mengakses beberapa aplikasi. |
| **JWT** | JSON Web Token. Format token ringkas dan bertanda tangan yang digunakan untuk autentikasi API dan manajemen sesi. |
| **SAML** | Security Assertion Markup Language. Standar berbasis XML untuk menukar data autentikasi antara penyedia identitas dan penyedia layanan. |

## Istilah Teknis

| Term | Definition |
|------|------------|
| **Symfony** | Kerangka kerja PHP yang menjadi fondasi Chamilo 3.0. Symfony menyediakan routing, dependency injection, ORM (Doctrine), templating (Twig), dan infrastruktur lainnya. |
| **Doctrine** | Object-relational mapper (ORM) yang digunakan Chamilo untuk berinteraksi dengan basis data. Doctrine memetakan objek PHP ke tabel basis data. |
| **Twig** | Mesin templat yang digunakan oleh Symfony dan Chamilo untuk merender HTML. |
| **Flysystem** | Lapisan abstraksi sistem berkas PHP. Chamilo menggunakan Flysystem untuk mendukung penyimpanan lokal, Amazon S3, Azure Blob, dan Google Cloud Storage secara saling dapat dipertukarkan. |
| **Composer** | Pengelola dependensi PHP. Digunakan untuk menginstal dan memperbarui pustaka PHP Chamilo. |
| **Mailer DSN** | Data Source Name untuk transport email. String koneksi yang memberitahu Symfony cara mengirim email (misalnya melalui SMTP, Amazon SES, atau Mailjet). |
| **OPcache** | Cache opcode bawaan PHP. Mengompilasi skrip PHP menjadi bytecode dan menyimpannya dalam memori, sehingga meningkatkan kinerja secara signifikan. |
| **APCu** | Ekstensi PHP yang menyediakan cache dalam memori tingkat pengguna. Digunakan oleh Symfony untuk menyimpan metadata dan konfigurasi dalam cache. |

## Akronim

| Acronym | Full Form |
|---------|-----------|
| **LMS** | Learning Management System |
| **LRS** | Learning Record Store (untuk pernyataan xAPI) |
| **SSO** | Single Sign-On |
| **CSV** | Comma-Separated Values (digunakan untuk impor pengguna/kursus) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (gaya arsitektur API) |
| **GDPR** | General Data Protection Regulation (undang-undang privasi data UE) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (autentikasi email) |
| **DKIM** | DomainKeys Identified Mail (autentikasi email) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |