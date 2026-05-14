# Autentikasi

Chamilo mendukung berbagai metode autentikasi, mulai dari sistem bawaan berbasis nama pengguna/kata sandi hingga solusi single sign-on untuk perusahaan.

## Berkas Konfigurasi

Semua metode autentikasi eksternal dikonfigurasi dalam `config/authentication.yaml`. Sebuah templat disediakan di `config/authentication.dist.yaml`. Struktur umumnya adalah:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Setelah mengedit berkas tersebut, bersihkan dan panaskan cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Tombol login eksternal akan muncul di halaman login setelah cache diperbarui.

## Metode yang Didukung

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook, dan penyedia OAuth2 generik
* **[LDAP](ldap.md)** — Autentikasi terhadap server LDAP atau Active Directory
* **[CAS](cas.md)** — Central Authentication Service (lawas, tidak berfungsi di versi 2.x)
* **[SCIM](scim.md)** — Penyediaan pengguna otomatis dari penyedia identitas eksternal
* **[Konfigurasi SSO](sso-configuration.md)** — Catatan pemecahan masalah dan lintas metode

## Autentikasi Default

Secara default, Chamilo menggunakan sistem internalnya sendiri — pengguna masuk dengan nama pengguna dan kata sandi yang disimpan di basis data Chamilo. Metode eksternal bersifat tambahan: formulir login standar tetap tersedia bersama penyedia yang dikonfigurasi.

## Referensi Lebih Lanjut

Untuk referensi parameter lengkap dan skenario lanjutan, lihat [halaman wiki konfigurasi Autentikasi Eksternal](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).