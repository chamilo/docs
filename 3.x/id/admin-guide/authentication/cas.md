# CAS

> **Status di Chamilo 3.x.** Entri konfigurasi CAS (`cas_activate`, `cas_server`, `cas_server_uri`, `cas_port`, `cas_protocol`, `cas_add_user_activate`) masih ada di pengaturan platform sebagai warisan dari Chamilo 1.x, dan CAS masih muncul sebagai sumber autentikasi yang dapat dipilih pada formulir pengguna — tetapi tidak ada authenticator CAS yang terhubung ke pipeline keamanan Chamilo 3.x. Masuk melalui CAS **tidak** berfungsi secara langsung saat ini. Jika Anda memerlukan SSO di Chamilo 3.x, gunakan [OAuth2](oauth2.md) (Azure / Keycloak / Generic) atau [LDAP](ldap.md) sebagai gantinya.

## Apa yang akan dilakukan CAS (perilaku 1.x)

CAS (Central Authentication Service) adalah protokol single sign-on yang umum digunakan di universitas dan lembaga penelitian. Di Chamilo 1.x, mengklik "Log in with CAS" akan mengalihkan pengguna ke server CAS, memvalidasi tiket yang dikembalikan, dan membuat atau mencocokkan akun lokal dari atribut CAS.

## Catatan migrasi

Jika Anda meningkatkan portal Chamilo 1.x yang menggunakan CAS, rencanakan untuk mengimplementasikan ulang alur masuk tersebut di atas OAuth2 atau LDAP untuk sementara waktu, hingga authenticator CAS dipulihkan pada rilis 3.x di masa mendatang.