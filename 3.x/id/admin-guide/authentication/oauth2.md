# OAuth2

Autentikasi OAuth2 dikonfigurasi di `config/authentication.yaml`. Chamilo menyertakan dukungan bawaan untuk Azure AD, Keycloak, Facebook, dan penyedia apa pun yang mematuhi OAuth2 secara generik.

## Step 1 — Daftarkan Chamilo di identity provider Anda

Buat aplikasi di panel admin penyedia Anda dan atur **redirect URI** ke:

```
https://your-chamilo-url/connect/<provider>/check
```

Di mana `<provider>` adalah `azure`, `keycloak`, `facebook`, atau nama yang Anda berikan kepada penyedia generik. Catat **Client ID** dan **Client Secret**.

## Step 2 — Konfigurasikan authentication.yaml

Aktifkan penyedia dan berikan kredensialnya. Semua penyedia berbagi kunci umum berikut:

| Key | Description |
|-----|-------------|
| `enabled` | `true` untuk mengaktifkan |
| `title` | Label yang ditampilkan pada tombol masuk |
| `client_id` | Dari identity provider Anda |
| `client_secret` | Dari identity provider Anda |
| `allow_create_new_users` | Buat akun Chamilo secara otomatis pada login pertama |
| `allow_update_user_info` | Sinkronkan data pengguna pada setiap login |
| `force_as_login_method` | Sembunyikan metode lain, dan tampilkan tombol penyedia ini saja |
| `force_redirect` | Kirim pengunjung anonim ke penyedia ini secara otomatis, tanpa tombol yang perlu diklik |
| `skip_force_redirect_in` | Daftar fragmen URL yang dibiarkan sendiri oleh `force_redirect` |

### Azure AD (Microsoft Entra ID)

Azure memiliki halaman khusus sendiri yang mencakup pendaftaran aplikasi, pemetaan peran berbasis grup, autentikasi sertifikat, dan perintah sinkronisasi penyediaan akun — lihat [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
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
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Generic OAuth2

Gunakan ini untuk Google, GitLab, atau penyedia mana pun yang mematuhi OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

Pemetaan field (cara atribut penyedia dipetakan ke `firstname`, `lastname`, `email`, dan sebagainya di Chamilo) serta pemetaan peran juga dapat dikonfigurasi. Lihat [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) untuk daftar lengkap kunci pemetaan.

## Opsional — Kirim setiap pengunjung ke penyedia secara otomatis

Dua kunci mengontrol seberapa banyak halaman login yang masih dilihat pengunjung. Keduanya independen, dan menjawab kebutuhan yang berbeda:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | Halaman login, dikurangi menjadi tombol penyedia ini. Pengunjung mengkliknya. |
| `force_redirect: true` | Tidak ada halaman login sama sekali. Peramban menuju ke penyedia dengan sendirinya. |

Gunakan `force_redirect` ketika identity provider memiliki setiap akun, dan formulir login lokal tidak memiliki tujuan:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Hanya satu penyedia yang dapat memaksa pengalihan. Jika beberapa menyatakannya, yang pertama yang diaktifkan yang menang. LDAP tidak dapat menyatakannya, karena autentikasinya melalui formulir lokal.

Pengalihan berlaku pada halaman yang ditampilkan peramban, dan tidak pada yang lain. Permintaan berikut selalu tetap di tempatnya:

* Panggilan API, SCIM, MCP, atau XHR, yang tidak dapat mengikuti handshake yang dimaksudkan untuk peramban.
* Gambar, stylesheet, atau unduhan berkas.
* Setiap penulisan (POST, PUT, DELETE), karena peramban memutar ulang penulisan yang dialihkan sebagai GET dan membuang body.
* Handshake penyedia itu sendiri (`/connect/...`) dan `/logout`, yang jika tidak akan membangun loop tanpa akhir.
* Pengunjung yang sudah memiliki sesi, termasuk akun anonim dari kursus publik.

Tambahkan fragmen URL ke `skip_force_redirect_in` untuk setiap area publik yang harus tetap terbuka, misalnya katalog kursus.

### Pintu darurat

Penyedia yang tidak dapat dijangkau akan mengunci setiap akun, termasuk administrator lokal. Tambahkan `skipForcedRedirect=1` ke URL mana pun untuk tetap mencapai formulir login lokal:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

Pilihan tersebut tetap ada di sesi, sehingga halaman-halaman berikutnya terus menampilkan formulir. Parameter ini juga membatalkan `force_as_login_method` untuk sesi tersebut, yang menampilkan kembali setiap metode login di halaman. Untuk mengembalikan platform kepada penyedia, gunakan `?skipForcedRedirect=0`, atau tutup sesi browser.

Parameter ini hanya milik `force_redirect`. Selama tidak ada penyedia yang mendeklarasikan kunci tersebut, parameter tidak melakukan apa pun, dan `force_as_login_method` tetap menampilkan tombol tunggalnya.

Simpan URL ini bersama catatan pemulihan Anda. Uji sebelum Anda mengaktifkan `force_redirect` di produksi.

## Langkah 3 — Bersihkan cache dan uji

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Keluar dari Chamilo. Tombol penyedia yang dikonfigurasi seharusnya muncul di halaman login. Uji dengan akun khusus sebelum diterapkan ke semua pengguna.

## Tips

* Pertahankan formulir login standar tetap diaktifkan agar administrator selalu dapat masuk jika OAuth2 bermasalah. Jika Anda mengatur `force_redirect`, pelajari URL `?skipForcedRedirect=1` sebagai gantinya: itu satu-satunya cara kembali ke formulir tersebut.
* Penetapan peran secara default adalah siswa; gunakan pemetaan grup (Azure) untuk mempromosikan pengguna ke peran guru atau admin secara otomatis — lihat [Azure Entra ID](azure-entra-id.md) untuk rincian tentang hal itu dan tentang mencocokkan pengguna yang masuk dengan akun yang sudah ada.