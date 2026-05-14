# CAS

> **Status di Chamilo 2.x.** Entri konfigurasi CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) masih ada di pengaturan platform sebagai warisan dari Chamilo 1.x, dan CAS masih muncul sebagai sumber autentikasi yang dapat dipilih pada formulir pengguna — namun tidak ada autentikator CAS yang terintegrasi ke dalam pipeline keamanan Chamilo 2.x. Masuk melalui CAS saat ini **tidak** berfungsi secara langsung. Jika Anda membutuhkan SSO di Chamilo 2.x, gunakan [OAuth2](oauth2.md) (Azure / Keycloak / Generic) atau [LDAP](ldap.md) sebagai gantinya.

## Apa yang dilakukan CAS (perilaku di 1.x)

CAS (Central Authentication Service) adalah protokol single sign-on yang umum digunakan di universitas dan lembaga penelitian. Di Chamilo 1.x, mengklik "Masuk dengan CAS" akan mengarahkan pengguna ke server CAS, memvalidasi tiket yang dikembalikan, dan membuat atau mencocokkan akun lokal dari atribut CAS.

## Catatan migrasi

Jika Anda sedang meningkatkan portal Chamilo 1.x yang menggunakan CAS, rencanakan untuk mengimplementasikan kembali alur masuk tersebut di atas OAuth2 atau LDAP untuk sementara waktu, sampai autentikator CAS dipulihkan di rilis 2.x mendatang.