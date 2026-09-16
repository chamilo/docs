# SCIM

**SCIM** (System for Cross-domain Identity Management) mengotomatiskan penyediaan pengguna — membuat, memperbarui, dan menonaktifkan akun Chamilo berdasarkan perubahan pada penyedia identitas Anda. Berbeda dengan OAuth2 atau LDAP, SCIM menangani penyediaan, bukan proses masuk.

| Skenario | Aksi SCIM |
|----------|-----------|
| Karyawan baru bergabung | Membuat akun Chamilo |
| Nama atau peran karyawan berubah | Memperbarui akun Chamilo |
| Karyawan meninggalkan perusahaan | Menonaktifkan atau menghapus akun Chamilo |

## Konfigurasi

### 1. Atur Token SCIM

Di file `.env` (atau `.env.local`) Anda, tentukan token acak yang aman:

```
SCIM_TOKEN=your-secure-random-token
```

Token ini digunakan oleh penyedia identitas Anda untuk mengautentikasi permintaan ke endpoint SCIM Chamilo.

### 2. Aktifkan SCIM di authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Bersihkan dan panaskan cache setelah mengedit:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Konfigurasikan Penyedia Identitas Anda

Di penyedia identitas Anda (Azure AD, Okta, dll.):

1. Tambahkan Chamilo sebagai aplikasi SCIM
2. Atur URL dasar SCIM ke `https://your-chamilo-url/scim/v2/`
3. Masukkan token dari langkah 1 sebagai bearer token
4. Petakan atribut penyedia ke bidang standar SCIM (userName, name.givenName, name.familyName, emails)
5. Aktifkan penyediaan otomatis

## Endpoint SCIM

Chamilo mengimplementasikan SCIM 2.0:

| Endpoint | Metode | Aksi |
|----------|--------|------|
| `/scim/v2/Users` | GET | Daftar pengguna |
| `/scim/v2/Users` | POST | Membuat pengguna |
| `/scim/v2/Users/{id}` | GET | Mendapatkan pengguna |
| `/scim/v2/Users/{id}` | PUT | Mengganti pengguna |
| `/scim/v2/Users/{id}` | PATCH | Memperbarui pengguna |
| `/scim/v2/Users/{id}` | DELETE | Menghapus pengguna |

## Tips

* **Mulai dengan grup uji** — sediakan sekelompok kecil pengguna sebelum mengaktifkan SCIM untuk seluruh organisasi.
* **Gabungkan dengan OAuth2** — pengaturan umum menggunakan Azure AD OAuth2 untuk masuk dan Azure AD SCIM untuk penyediaan.
* **Pantau log** — periksa log Chamilo (`var/log/`) dan log penyediaan penyedia identitas Anda untuk mendeteksi kesalahan.