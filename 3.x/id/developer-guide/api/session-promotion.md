# Promosi Sesi

Sebuah sesi dapat tergabung dalam suatu **promosi** (suatu angkatan dari suatu karier, yang dikelola di **Administrasi > Karier dan promosi**). Integrasi menetapkannya dengan operasi standar `PATCH /api/sessions/{id}`, yang menggantikan parameter `promotion_id` pada layanan web `update_session` versi 1.11.x.

Jangan mencampuradukkan promosi dengan kategori sesi (`/api/session_categories`), yang merupakan pengelompokan yang berbeda.

## Akses

Hanya administrator platform (`ROLE_ADMIN`) yang dapat membaca promosi dan mengubah promosi suatu sesi. Pengguna lain menerima `403 Forbidden`.

## Menemukan promosi

Promosi diekspos secara baca saja. Promosi tetap dibuat dan disunting dari administrasi.

```http
GET /api/promotions
GET /api/promotions/{id}
```

```json
{
  "@id": "/api/promotions/3",
  "id": 3,
  "title": "Accounting 2026",
  "status": 1
}
```

`status` bernilai `1` untuk promosi yang aktif dan `0` untuk promosi yang tidak aktif.

## Menetapkan promosi suatu sesi

```http
PATCH /api/sessions/42
Authorization: Bearer <token>
Content-Type: application/merge-patch+json
```

```json
{ "promotion": "/api/promotions/3" }
```

Kirim `{ "promotion": null }` untuk melepaskan sesi dari promosinya.

Promosi harus diberikan sebagai IRI. Id numerik, atau IRI yang tidak cocok dengan promosi mana pun, ditolak dengan `400 Bad Request`.

## Membaca promosi suatu sesi

`GET /api/sessions/{id}` mengembalikan IRI promosi, atau menghilangkan bidang tersebut jika sesi tidak memiliki promosi:

```json
{
  "@id": "/api/sessions/42",
  "title": "Accounting basics - October 2026",
  "promotion": "/api/promotions/3"
}
```

Sesi yang dibuat dengan [Duplikasi Sesi](session-duplication.md) mempertahankan promosi dari sesi modelnya.