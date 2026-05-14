# OAuth2

Autentikasi OAuth2 dikonfigurasi dalam file `config/authentication.yaml`. Chamilo menyediakan dukungan bawaan untuk Azure AD, Keycloak, Facebook, dan penyedia lain yang sesuai dengan standar OAuth2.

## Langkah 1 — Daftarkan Chamilo di penyedia identitas Anda

Buat aplikasi di panel admin penyedia Anda dan atur **redirect URI** ke:

```
https://your-chamilo-url/connect/<provider>/check
```

Di mana `<provider>` adalah `azure`, `keycloak`, `facebook`, atau nama yang Anda berikan untuk penyedia generik. Catat **Client ID** dan **Client Secret**.

## Langkah 2 — Konfigurasi authentication.yaml

Aktifkan penyedia dan berikan kredensialnya. Semua penyedia memiliki kunci umum berikut:

| Kunci | Deskripsi |
|-------|-----------|
| `enabled` | `true` untuk mengaktifkan |
| `title` | Label yang ditampilkan pada tombol login |
| `client_id` | Dari penyedia identitas Anda |
| `client_secret` | Dari penyedia identitas Anda |
| `allow_create_new_users` | Membuat akun Chamilo secara otomatis pada login pertama |
| `allow_update_user_info` | Sinkronkan data pengguna pada setiap login |
| `force_as_login_method` | Nonaktifkan metode lain dan paksa metode ini |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Masuk dengan Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azure juga mendukung pemetaan peran berbasis grup (memetakan ID grup Azure ke peran Chamilo seperti guru atau admin), perintah sinkronisasi delta pengguna, dan autentikasi sertifikat sebagai pengganti client secret. Lihat [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) untuk opsi tersebut.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Masuk dengan Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Masuk dengan Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 Generik

Gunakan ini untuk Google, GitLab, atau penyedia lain yang sesuai dengan OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Masuk dengan MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Pemetaan bidang (bagaimana atribut penyedia dipetakan ke `firstname`, `lastname`, `email`, dll. di Chamilo) dan pemetaan peran juga dapat dikonfigurasi. Lihat [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) untuk daftar lengkap kunci pemetaan.

## Langkah 3 — Bersihkan cache dan uji

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Keluar dari Chamilo. Tombol penyedia yang dikonfigurasi seharusnya muncul di halaman login. Uji dengan akun khusus sebelum meluncurkannya ke semua pengguna.

## Tips

* Pertahankan formulir login standar tetap aktif sehingga administrator selalu dapat masuk jika OAuth2 mengalami masalah.
* Saat menggunakan Azure dengan pengguna yang sudah ada, konfigurasi `existing_user_verification_order` untuk mengontrol bagaimana Chamilo mencocokkan pengguna yang masuk dengan akun yang sudah ada.
* Penugasan peran secara default adalah siswa; gunakan pemetaan grup untuk mempromosikan pengguna ke peran guru atau admin secara otomatis.