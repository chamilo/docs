# Autentikasi

API Chamilo menggunakan **JWT (JSON Web Tokens)** untuk autentikasi, diimplementasikan melalui `lexik/jwt-authentication-bundle`.

## Memperoleh Token

Kirim permintaan POST ke endpoint autentikasi:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Respons:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Menggunakan Token

Sertakan token pada header `Authorization` untuk permintaan berikutnya:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Siklus Hidup Token

* Token memiliki waktu kedaluwarsa yang dapat dikonfigurasi
* Ketika token kedaluwarsa, klien harus meminta token baru
* Kunci JWT disimpan di `config/jwt/` (kunci privat dan publik)

## Menghasilkan Kunci JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Perintah ini membuat:
* `config/jwt/private.pem` — Kunci privat untuk menandatangani token
* `config/jwt/public.pem` — Kunci publik untuk memverifikasi token

Konfigurasikan passphrase di `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Dokumentasi API

Ketika `APP_ENABLE_API_ENTRYPOINT=true` diatur di lingkungan, dokumentasi API tersedia di `/api`. Ini menyediakan antarmuka interaktif Swagger/OpenAPI untuk menjelajahi dan menguji endpoint.

Mengatur variabel saja tidak cukup — cache Symfony harus dikosongkan agar perubahan berlaku. Lihat [Variabel Lingkungan (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) di Panduan Admin.