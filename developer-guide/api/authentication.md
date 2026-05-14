# Autentikasi

API Chamilo menggunakan **JWT (JSON Web Tokens)** untuk autentikasi, yang diimplementasikan melalui `lexik/jwt-authentication-bundle`.

## Mendapatkan Token

Kirimkan permintaan POST ke endpoint autentikasi:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "kata-sandi-anda"
}
```

Respon:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Menggunakan Token

Sertakan token dalam header `Authorization` pada permintaan berikutnya:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Siklus Hidup Token

* Token memiliki waktu kedaluwarsa yang dapat dikonfigurasi
* Ketika token kedaluwarsa, klien harus meminta token baru
* Kunci JWT disimpan di `config/jwt/` (kunci privat dan publik)

## Membuat Kunci JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Ini akan membuat:
* `config/jwt/private.pem` — Kunci privat untuk menandatangani token
* `config/jwt/public.pem` — Kunci publik untuk memverifikasi token

Konfigurasikan frasa sandi di file `.env`:

```env
JWT_PASSPHRASE=frasa-sandi-anda
```

## Dokumentasi API

Ketika `APP_ENABLE_API_ENTRYPOINT=1` diatur di lingkungan, dokumentasi API tersedia di `/api`. Ini menyediakan antarmuka interaktif Swagger/OpenAPI untuk menjelajahi dan menguji endpoint.