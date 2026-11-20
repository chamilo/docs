# API Keanggotaan dan Pendaftaran Kelas

Untuk integrasi, Chamilo menyediakan endpoint untuk membaca dan menyinkronkan anggota, sesi, dan kursus yang terkait dengan **kelas** yang sudah ada. Kelas adalah `Usergroup` bertipe *kelas normal*; rute ini **tidak** berlaku untuk grup sosial.

Berbeda dengan API mahasiswa sesi, ketiga tindakan `PUT` kelas **mengganti seluruh daftar yang ditentukan**. ID yang dihilangkan akan dihapus dari relasi tersebut. Baca daftar yang ada sebelum memperbaruinya, dan hindari menggunakan `PUT` hanya untuk menambahkan satu anggota kecuali Anda juga mengirimkan semua orang yang harus tetap ada.

## Otorisasi

Semua rute di bawah ini memerlukan peran platform terautentikasi `ROLE_ADMIN`. Kelas target harus tersedia pada URL akses saat ini. Kelas yang tidak ada atau berada di luar cakupan mengembalikan `404`; usergroup yang bukan kelas normal mengembalikan `409 Conflict`.

Kontroler memeriksa bahwa ID pengguna, kursus, dan sesi yang dikirimkan ada. Pada instalasi multi-URL, **ID kursus dan sesi** yang dikirimkan difilter ke portal saat ini; namun, implementasi saat ini **tidak** menerapkan filter portal yang sama pada **ID pengguna**. Integrator tidak boleh menganggap endpoint ini sebagai jaminan isolasi portal pada tingkat pengguna. Lihat catatan tinjauan pengiriman untuk pertimbangan keamanan yang masih terbuka ini.

## Membaca relasi kelas

```http
GET /api/usergroups/31/subscriptions
Authorization: Bearer <admin-token>
```

Contoh respons:

```json
{
  "userIds": [17, 23],
  "sessionIds": [42],
  "courseIds": [8, 11]
}
```

## Mengganti satu daftar relasi

| Metode | Endpoint | Properti permintaan |
|--------|----------|------------------|
| `PUT` | `/api/usergroups/{id}/users` | `userIds` |
| `PUT` | `/api/usergroups/{id}/sessions` | `sessionIds` |
| `PUT` | `/api/usergroups/{id}/courses` | `courseIds` |

Misalnya, untuk menetapkan daftar lengkap anggota kelas:

```http
PUT /api/usergroups/31/users
Authorization: Bearer <admin-token>
Content-Type: application/json
```

```json
{ "userIds": [17, 23, 29] }
```

Contoh respons:

```json
{
  "success": true,
  "applied": [17, 23, 29],
  "ignored": []
}
```

`applied` mencantumkan ID yang diterima, tidak harus ID yang baru ditambahkan. `ignored` mengidentifikasi ID yang diminta tetapi tidak dapat diterapkan (misalnya, ID yang tidak dikenal atau kursus/sesi di luar portal saat ini). Nilai non-positif dihilangkan, duplikat dihapus, dan JSON yang tidak valid atau properti permintaan yang bukan array mengembalikan `400`.

Untuk mengganti sesi yang tertaut, panggil `PUT /api/usergroups/31/sessions` dengan `{ "sessionIds": [42, 57] }`. Untuk mengganti kursus yang tertaut, panggil `PUT /api/usergroups/31/courses` dengan `{ "courseIds": [8, 11] }`.

**Penting:** Chamilo menerapkan perubahan ini melalui metode sinkronisasi `UsergroupHelper`. Mengubah daftar anggota kelas atau ikatan sesi/kursusnya juga dapat mengubah pendaftaran terkait. Jangan memanipulasi tabel relasi usergroup secara langsung, dan tinjau dampak penggantian daftar sebelum menjalankan integrasi produksi.

Untuk antarmuka dan konsep, lihat [Kelas](../../admin-guide/sessions/classes.md). Untuk menambah atau menghapus peserta didik tertentu dari satu sesi *tanpa* mengganti semua anggota, gunakan [API Pendaftaran Mahasiswa Sesi](session-students.md).

**Implementasi:** `src/CoreBundle/Controller/Api/UsergroupSubscriptionController.php`. Ditambahkan pada commit Chamilo LMS `d8809925a4`.