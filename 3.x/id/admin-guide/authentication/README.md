# Autentikasi

Chamilo mendukung beberapa metode autentikasi, mulai dari sistem nama pengguna/kata sandi bawaan hingga solusi single sign-on tingkat enterprise.

## Berkas konfigurasi

Semua metode autentikasi eksternal dikonfigurasi di `config/authentication.yaml`. Templat disediakan di `config/authentication.dist.yaml`. Struktur umumnya adalah:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Setelah mengedit berkas, bersihkan dan panaskan cache:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Tombol login eksternal muncul di halaman login setelah cache disegarkan.

## Metode yang didukung

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook, dan penyedia OAuth2 generik
* **[Azure Entra ID](azure-entra-id.md)** — Penyiapan Azure/Entra ID secara rinci: registrasi aplikasi, pemetaan peran berbasis grup, autentikasi sertifikat, dan perintah sinkronisasi pengguna/grup
* **[LDAP](ldap.md)** — Autentikasi terhadap server LDAP atau Active Directory
* **[CAS](cas.md)** — Central Authentication Service (warisan, tidak berfungsi di 3.x)
* **[SCIM](scim.md)** — Provisioning pengguna otomatis dari penyedia identitas eksternal
* **[Konfigurasi SSO](sso-configuration.md)** — Pemecahan masalah dan catatan lintas metode

## Autentikasi bawaan

Secara default, Chamilo menggunakan sistem internalnya sendiri — pengguna masuk dengan nama pengguna dan kata sandi yang disimpan di basis data Chamilo. Metode eksternal bersifat tambahan: formulir login standar tetap tersedia bersama penyedia yang dikonfigurasi.

## Referensi lanjutan

Untuk referensi parameter lengkap dan skenario lanjutan, lihat [halaman wiki konfigurasi External Authentication](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).