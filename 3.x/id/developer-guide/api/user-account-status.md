# Status Akun Pengguna

Bidang `active` pada pengguna adalah status akun. Administrator memblokir atau membuka blokir akun dengan mengubahnya melalui `PATCH /api/users/{id}`. Ini menggantikan bidang `active` pada layanan web `webservices/api/v2.php` versi 1.11.x.

## Nilai

| `active` | Arti |
|----------|------|
| `1` | Aktif: pengguna dapat masuk |
| `0` | Tidak aktif: akun diblokir |
| `-1` | Dinonaktifkan secara otomatis oleh platform |
| `-2` | Dihapus (di tempat sampah) |

API hanya dapat menetapkan `1` atau `0`. Penghapusan dilakukan melalui `DELETE /api/users/{id}`, dan pemulihan akun yang dihapus melalui tempat sampah administrasi.

## Membaca status

`active` dikembalikan oleh `GET /api/users/{id}` dan oleh `GET /api/users?username=...`.

```http
GET /api/users/42
Authorization: Bearer <token>
Accept: application/json
```

```json
{ "id": 42, "username": "jdupont", "active": 1 }
```

## Mengubah status

```http
PATCH /api/users/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
Accept: application/json

{ "active": 0 }
```

Responsnya adalah pengguna yang telah diperbarui. Kirim `{ "active": 1 }` untuk membuka blokir akun. `active` dapat dikirim bersama bidang lain milik pengguna.

## Akses

| Pemanggil | Diizinkan |
|-----------|-----------|
| `ROLE_ADMIN` | Setiap pengguna yang boleh mereka edit, kecuali akun mereka sendiri |
| Pengguna lain | Tidak diizinkan, bahkan pada akun mereka sendiri |

Pengiriman nilai saat ini tidak pernah ditolak, sehingga klien yang mengirim kembali seluruh pengguna tidak diblokir.

## Kesalahan

| Status | Kapan |
|--------|-------|
| `400` | Nilai selain `0` atau `1` |
| `401` | Tidak ada kredensial atau kredensial tidak valid |
| `403` | Pemanggil bukan administrator, atau mengubah status mereka sendiri |
| `404` | Pengguna tidak ada |