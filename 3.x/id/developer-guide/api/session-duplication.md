# Duplikasi Sesi

`POST /api/sessions/{id}/duplicate` membuat sesi baru dari **sesi model** yang sudah ada. Ini adalah pengganti Chamilo 3 untuk aksi `create_session_from_model` pada webservice `webservices/api/v2.php` versi 1.11.x, dan ditujukan bagi integrasi yang membuka pelaksanaan pelatihan baru dari sesi templat.

## Akses

| Pemanggil | Diizinkan |
|--------|---------|
| `ROLE_ADMIN` | Sesi apa pun |
| `ROLE_SESSION_MANAGER` | Hanya sesi yang mereka kelola (mereka adalah admin sesi dari model), kecuali pengaturan **Allow session administrators to see all sessions** diaktifkan |
| Siapa pun lainnya | `403 Forbidden` |

Autentikasi dengan JWT atau kunci API eksternal, sebagaimana dijelaskan di [Autentikasi](authentication.md).

## Permintaan

```http
POST /api/sessions/42/duplicate
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "title": "Accounting basics - October 2026",
  "startDate": "2026-10-01T09:00:00+02:00",
  "endDate": "2026-12-15T18:00:00+01:00",
  "extraFields": { "my_session_field": "value" },
  "copySessionContent": false
}
```

| Bidang | Wajib | Deskripsi |
|-------|----------|-------------|
| `title` | Ya | Judul sesi baru. Tidak boleh sudah digunakan oleh sesi lain (maks. 150 karakter). |
| `startDate` | Ya | Tanggal-waktu ISO 8601. Digunakan sebagai tanggal mulai akses, tampilan, dan akses pelatih. |
| `endDate` | Ya | Tanggal-waktu ISO 8601, tidak sebelum `startDate`. Digunakan sebagai tanggal akhir akses, tampilan, dan akses pelatih. |
| `extraFields` | Tidak | Nilai bidang tambahan sesi yang dikunci berdasarkan variabel bidang tersebut. Nilai ini menimpa nilai yang disalin dari model. Setiap variabel harus merupakan bidang tambahan sesi yang sudah ada. |
| `copySessionContent` | Tidak | `false` secara bawaan. Jika `true`, konten khusus sesi dari setiap kursus (dokumen, jalur pembelajaran, tes, acara kalender, pengumuman, buku nilai…) diduplikasi ke sesi baru. Konten dasar kursus selalu dibagikan, tidak pernah disalin. Bendera ini independen dari pengaturan platform **Enable the copy of session-specific content to another session**. |

## Apa yang disalin

| Disalin dari model | Tidak disalin |
|-----------------------|------------|
| Kategori, visibilitas, durasi, deskripsi, dan "tampilkan deskripsi" | Pelatih kursus |
| Nilai bidang tambahan sesi | Manajer SDM (DRH) |
| Kursus, dalam urutan yang sama | Peserta |
| Pelatih umum | |
| Admin sesi (jika model tidak memilikinya, pemanggil menjadi admin sesi) | |
| Opsi "Kirim notifikasi langganan" | |
| Promosi | |
| Konten kursus khusus sesi, hanya jika `copySessionContent` bernilai `true` | |

Peserta sengaja tidak disertakan: setiap pelaksanaan memiliki pembelajarnya sendiri. Langgankan mereka setelahnya dengan `POST /api/course-sessions/actions/subscribe-users`.

Sesi baru dilampirkan ke URL akses saat ini.

## Respons

`201 Created` dengan sesi baru:

```json
{
  "id": 57,
  "title": "Accounting basics - October 2026",
  "nbrCourses": 3,
  "visibility": 1,
  "generalCoachesSubscriptions": [{ "user": "/api/users/7" }]
}
```

## Kesalahan

| Status | Kapan |
|--------|------|
| `401` | Tidak ada kredensial atau kredensial tidak valid |
| `403` | Pemanggil tidak boleh mengelola sesi model |
| `404` | Sesi model tidak ada |
| `422` | Bidang hilang atau tidak valid, `endDate` sebelum `startDate`, judul sudah digunakan, atau variabel bidang tambahan tidak dikenal |

Semua pemeriksaan dijalankan sebelum apa pun dibuat, sehingga permintaan yang ditolak tidak pernah meninggalkan sesi parsial.

## Implementasi

* Operasi: `duplicate_session` pada sumber daya `Session` (`src/CoreBundle/Entity/Session.php`)
* Masukan: `src/CoreBundle/Dto/SessionDuplicateInput.php`
* Pemroses: `src/CoreBundle/State/Session/SessionDuplicateProcessor.php`, yang memanggil `SessionManager::copy()` (juga digunakan oleh aksi **Copy** pada daftar sesi) lalu menerapkan judul, tanggal, dan bidang tambahan yang diminta, serta promosi, admin sesi, opsi notifikasi, dan urutan kursus dari model.