# API Pendaftaran Peserta Sesi

Integrasi dapat menampilkan daftar, mendaftarkan, dan menghapus peserta didik dalam suatu sesi menggunakan endpoint yang hanya tersedia bagi administrator. Tindakan ini menggunakan perilaku pendaftaran sesi pada layar administrasi Chamilo. Tindakan tersebut terpisah dari `/api/course-sessions/actions/*`, yang termasuk dalam alur kerja berorientasi tutor yang berbeda.

## Autentikasi dan akses

Setiap operasi di bawah ini memerlukan autentikasi dengan peran platform `ROLE_ADMIN`. Menjadi administrator sesi saja **tidak** memberikan akses. Gunakan metode autentikasi yang dijelaskan di [Autentikasi](authentication.md).

Pada instalasi multi-URL, sesi yang diminta harus termasuk dalam URL akses saat ini; jika tidak, endpoint merespons dengan `404`.

## Rute

| Metode | Endpoint | Tujuan |
|--------|----------|---------|
| `GET` | `/api/sessions/{id}/students` | Menampilkan daftar ID pengguna peserta didik yang terdaftar dalam sesi ini |
| `POST` | `/api/sessions/{id}/students/subscribe` | Menambahkan peserta didik yang ditentukan, dengan mempertahankan peserta didik yang sudah ada |
| `POST` | `/api/sessions/{id}/students/unsubscribe` | Menghapus hanya peserta didik yang ditentukan |

Ganti `{id}` dengan ID sesi numerik. Untuk kedua permintaan POST, kirim JSON yang berisi array `userIds`:

```http
POST /api/sessions/42/students/subscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23] }
```

Pendaftaran yang berhasil menghasilkan respons dengan struktur berikut; ID bergantung pada instalasi Anda:

```json
{
  "success": true,
  "applied": [17],
  "alreadyThere": [23],
  "ignored": []
}
```

`applied` berisi peserta didik yang baru didaftarkan; `alreadyThere` berisi peserta didik yang sudah terdaftar; `ignored` mencantumkan ID yang tidak memenuhi syarat atau tidak tersedia. Saat mendaftarkan, Chamilo juga mendaftarkan peserta didik yang ditambahkan ke kursus sesi tersebut. Tindakan ini **tidak** mengganti seluruh daftar peserta sesi.

Untuk memeriksa keanggotaan:

```http
GET /api/sessions/42/students
Authorization: Bearer <admin-token>
```

```json
{ "userIds": [17, 23] }
```

Untuk menghapus peserta didik yang dipilih:

```http
POST /api/sessions/42/students/unsubscribe
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17] }
```

Respons pembatalan pendaftaran berisi `success`, `applied` (ID yang dihapus), dan `ignored` (ID yang tidak terdaftar). Peserta didik lainnya tetap berada dalam sesi.

## Validasi dan batasan

* `userIds` harus berupa array ID numerik (bilangan bulat atau string yang hanya berisi digit). ID yang berulang dideduplikasi; nilai non-positif dihilangkan.
* Untuk pendaftaran, pengguna yang memenuhi syarat harus ada, tidak dihapus secara lunak, bukan pengguna anonim atau manajer SDM, dan termasuk dalam URL akses saat ini.
* JSON atau `userIds` yang hilang atau salah format mengembalikan `400 Bad Request`.
* Sesi yang hilang atau di luar cakupan mengembalikan `404 Not Found`; pemanggil tanpa izin administrator tidak dapat menggunakan rute ini.
* Rute pendaftaran peserta didik **bukan** endpoint CRUD generik untuk entitas `Session`, dan tidak menerima daftar peserta sesi sebagai dokumen pengganti.

Untuk antarmuka administrasi yang sesuai, lihat [Mengelola Sesi](../../admin-guide/sessions/managing-sessions.md). Untuk menyalin sesi model sebelum mendaftarkan peserta didik, lihat [Duplikasi Sesi](session-duplication.md).

**Implementasi:** `src/CoreBundle/Controller/Api/SessionStudentsController.php`. Ditambahkan pada commit Chamilo LMS `bdfb2dd661`.