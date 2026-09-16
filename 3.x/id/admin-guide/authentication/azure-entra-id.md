# Azure Entra ID

Microsoft mengganti merek Azure Active Directory (Azure AD) menjadi **Microsoft Entra ID** pada 2023 — keduanya adalah layanan yang sama, dan kode serta konfigurasi Chamilo masih merujuknya sebagai `azure`. Halaman ini membahas bagian khusus Azure dari integrasi: pendaftaran aplikasi, pemetaan peran berbasis grup, autentikasi sertifikat, dan perintah sinkronisasi pengguna/grup yang khusus. Untuk kunci konfigurasi yang digunakan bersama oleh setiap penyedia (`enabled`, `title`, `allow_create_new_users`, dan seterusnya) serta struktur umum `authentication.yaml`, lihat [OAuth2](oauth2.md).

## Mendaftarkan Chamilo di Microsoft Entra ID

1. Di pusat admin Entra, buat **App registration** untuk Chamilo.
2. Atur URI pengalihan (tipe platform **Web**) ke:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Catat **Application (client) ID** dan **Directory (tenant) ID** — Anda akan membutuhkan keduanya.
4. Di bawah **Certificates & secrets**, buat client secret atau unggah sertifikat (lihat [Autentikasi Sertifikat](#certificate-authentication) di bawah).
5. Di bawah **API permissions**, tambahkan izin Microsoft Graph di bawah ini dan berikan persetujuan admin.

| Izin | Tipe | Diperlukan untuk |
|------------|------|-------------|
| `User.Read` | Delegated | Masuk dasar |
| `GroupMember.Read.All` | Delegated | Pemetaan peran berbasis grup saat masuk |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` atau `Group.Read.All` | Application | `app:azure-sync-users` dan `app:azure-sync-usergroups` |

Izin Application memerlukan persetujuan admin dan hanya digunakan oleh perintah konsol sinkronisasi (melalui grant `client_credentials`), tidak pernah oleh masuk pengguna interaktif.

## Konfigurasi Dasar

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
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

### Multi-tenant vs. single-tenant

Nilai `tenant` harus sesuai dengan cara "supported account types" pada pendaftaran aplikasi diatur:

* GUID tenant tertentu — single-tenant, hanya akun organisasi tersebut yang dapat masuk
* `organizations` — tenant Entra ID mana pun
* `common` — tenant Entra ID mana pun plus akun Microsoft pribadi

## Atribut Pengguna yang Diperlukan

Setiap pengguna Entra ID yang perlu masuk ke Chamilo harus memiliki `mail` dan `mailNickname` yang terisi — masuk akan menghasilkan kesalahan jika salah satunya kosong (bersama dengan ID objek Entra yang tidak dapat diubah, yang selalu ada). Pemetaan field dari Microsoft Graph ke Chamilo **tetap** untuk Azure (berbeda dengan penyedia OAuth2 generik, yang memungkinkan Anda mengonfigurasi pemetaan field):

| Field Chamilo | Sumber Microsoft Graph |
|---------------|------------------------|
| Nama depan | `givenName` |
| Nama belakang | `surname` |
| E-mail | `mail` |
| Nama pengguna | `userPrincipalName` |
| Telepon | `telephoneNumber`, lalu `businessPhones[0]`, lalu `mobilePhone` |
| Aktif | `accountEnabled` |
| Bahasa antarmuka | `preferredLanguage` (dicocokkan dengan bahasa Chamilo yang terpasang, kembali ke default platform) |

Tiga field tambahan juga ditulis pada setiap masuk yang berhasil: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`), dan `azure_uid` (= ID objek Entra). Ini mendukung logika pencocokan akun di bawah.

## Mencocokkan Masuk dengan Akun Chamilo yang Ada

Atur `existing_user_verification_order` ke daftar digit `1`–`3` yang dipisahkan koma untuk mengontrol bagaimana masuk Entra ID yang masuk dicocokkan dengan akun Chamilo yang ada:

| Nilai | Dicocokkan dengan |
|-------|------------------|
| `1` | Field tambahan `organisationemail` == Entra `mail` |
| `2` | Field tambahan `azure_id` == Entra `mailNickname` |
| `3` | Field tambahan `azure_uid` == ID objek Entra |

Posisi dicoba sesuai urutan yang tercantum; kecocokan aktif (bukan yang dihapus lunak) pertama yang menang. Nilai yang tidak valid atau kosong default ke `1,2,3`. Jika tidak ada posisi yang dikonfigurasi yang cocok — yang selalu terjadi pada kali pertama pengguna tertentu masuk, karena field tambahan tersebut hanya diisi *setelah* masuk yang berhasil — Chamilo kembali ke pencocokan field `email` Chamilo sendiri dengan Entra `mail`, lalu `username` dengan `userPrincipalName`, terlepas dari apa yang Anda konfigurasikan.

## Pemetaan Peran Berbasis Grup

Petakan grup keamanan Entra ID ke peran Chamilo menggunakan Object ID (GUID) mereka:

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

Pada setiap login, Chamilo memanggil Microsoft Graph `/v1.0/me/memberOf` dengan token akses milik pengguna dan memeriksa grup yang dikembalikan terhadap ketiga ID ini, dalam urutan **admin → session_admin → teacher**. Kecocokan pertama yang menang — pengguna yang berada di grup admin dan teacher hanya dipromosikan menjadi admin. Siapa pun yang tidak berada di grup yang dikonfigurasi mempertahankan peran yang sudah ada (atau peran siswa default, pada login pertama). Ini memerlukan izin terdelegasi `GroupMember.Read.All` yang tercantum di atas.

## Autentikasi Sertifikat

Sebagai alternatif untuk `client_secret`, autentikasi dengan sertifikat sebagai gantinya:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Unggah sertifikat publik yang sesuai di **Certificates & secrets** pada pendaftaran aplikasi, dan salin thumbprint-nya (ditampilkan dalam hex di portal) ke `client_certificate_thumbprint`. Ketika kedua kunci diatur, Chamilo membangun asersi klien JWT yang ditandatangani (RS256) alih-alih mengirim `client_secret` — ini berlaku untuk login interaktif maupun autentikasi app-only pada perintah sinkronisasi.

## Menyinkronkan Pengguna dan Grup dari Entra ID

Dua perintah konsol menyediakan dan memelihara akun Chamilo langsung dari Entra ID, terlepas dari siapa pun yang login secara interaktif. Keduanya mengautentikasi secara app-only (`client_credentials`), sehingga memerlukan izin Graph **application** yang tercantum di atas, dan keduanya dimaksudkan untuk dijadwalkan di cron daripada dijalankan secara manual.

### `app:azure-sync-users`

Mengambil pengguna dari Microsoft Graph dan menyediakan/memperbarui akun Chamilo yang cocok menggunakan pemetaan bidang dan logika pencocokan akun yang sama seperti login interaktif.

* Secara default perintah ini mengambil daftar pengguna lengkap (`/v1.0/users`, terhalaman). Atur `script_users_delta: true` untuk menggunakan `/v1.0/users/delta` sebagai gantinya — Chamilo menyimpan tautan delta antar jalankan, sehingga jalankan berikutnya hanya mengambil apa yang berubah.
* Atur `deactivate_nonexisting_users: true` untuk menonaktifkan akun Chamilo (dengan sumber autentikasi Azure) yang tidak lagi muncul dalam pengambilan Entra ID. Ini hanya berfungsi dalam mode pengambilan penuh — mode delta tidak pernah mengembalikan daftar pengguna lengkap, sehingga pengaturan ini diabaikan ketika `script_users_delta` diaktifkan.
* Pemetaan peran grup (di atas) diterapkan ulang untuk setiap pengguna yang disinkronkan selama jalankan ini, tidak hanya pada saat login.

### `app:azure-sync-usergroups`

Mengambil grup Entra ID dan mencerminkannya sebagai kelas Chamilo (`Usergroup`).

* Mengambil daftar grup lengkap (`/v1.0/groups`) atau, dengan `script_usergroups_delta: true`, endpoint delta, dengan tautan delta yang dilacak secara terpisah.
* `group_filter_regex` membatasi grup mana yang disinkronkan, dicocokkan dengan nama tampilan grup.
* **Setiap jalankan menghapus semua anggota yang ada dari kelas Chamilo yang cocok terlebih dahulu**, lalu mendaftarkan ulang anggota mana pun yang saat ini dikembalikan Graph. Anggota hanya dicocokkan dengan pengguna Chamilo *yang sudah ada*, menggunakan [logika pencocokan akun](#matching-logins-to-existing-chamilo-accounts) yang sama seperti login — perintah ini tidak pernah membuat akun pengguna baru, dan setiap anggota grup yang tidak dapat dicocokkan dengan akun Chamilo yang ada dilewati secara diam-diam.

## Keterbatasan yang Diketahui

* **Tidak ada single logout.** Keluar dari Chamilo tidak mengeluarkan pengguna dari Entra ID atau aplikasi terhubung lainnya. Kunci konfigurasi `force_logout` ada di `authentication.yaml` tetapi saat ini belum diimplementasikan — anggap sebagai cadangan, bukan fungsional.
* **Reset kata sandi tidak bermakna untuk akun Azure.** Karena autentikasi terjadi sepenuhnya melalui Entra ID, Chamilo tidak memelihara kata sandi lokal yang dapat digunakan untuk akun-akun ini.

## Pemecahan Masalah

* Kegagalan login (atribut wajib yang hilang, kesalahan Graph API) ditampilkan kepada pengguna sebagai pesan flash di halaman login.
* Perintah sinkronisasi mencatat masalah per-rekaman dengan peringatan dan terus memproses sisa batch alih-alih berhenti pada kesalahan pertama — periksa keluaran konsol perintah (atau tempat cron Anda menangkapnya) setelah setiap jalankan.
* Tetap aktifkan formulir login Chamilo standar agar administrator selalu memiliki cara masuk jika integrasi Entra ID bermasalah.