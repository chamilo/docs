# Waktu Koneksi Pengguna

`GET /api/users/{id}/connection-time` mengembalikan total waktu yang dihabiskan pengguna saat terhubung ke platform. Endpoint ini menggantikan aksi `get_user_total_connexion_time` dari webservice `webservices/api/v2.php` versi 1.11.x, dan dapat dibatasi pada suatu periode.

## Akses

| Pemanggil | Diizinkan |
|--------|---------|
| `ROLE_ADMIN` | Pengguna mana pun pada URL akses saat ini |
| Pengguna terautentikasi mana pun | Hanya waktu koneksi mereka sendiri |
| Siapa pun selain itu | `403 Forbidden` |

Endpoint ini menerima id numerik pengguna. Untuk memulai dari nama pengguna, cari pengguna terlebih dahulu dengan `GET /api/users?username=...`.

## Permintaan

```http
GET /api/users/42/connection-time?startDate=2026-10-01T00:00:00%2B02:00&endDate=2026-12-15T23:59:59%2B01:00
Authorization: Bearer <token>
```

| Parameter kueri | Wajib | Deskripsi |
|-----------------|----------|-------------|
| `startDate` | Tidak | Tanggal-waktu ISO 8601. Hanya koneksi yang **dimulai** pada atau setelah saat ini yang dihitung. |
| `endDate` | Tidak | Tanggal-waktu ISO 8601, tidak sebelum `startDate`. Hanya koneksi yang **berakhir** pada atau sebelum saat ini yang dihitung. |

Tanpa salah satu parameter, setiap koneksi dihitung. Dengan hanya `startDate`, koneksi dihitung mulai dari tanggal tersebut, tanpa batas akhir. Dengan hanya `endDate`, koneksi dihitung hingga tanggal tersebut, tanpa batas awal.

Koneksi yang tumpang tindih dengan suatu batas (misalnya yang dimulai sebelum `startDate`) tidak dihitung sama sekali: waktu koneksi tidak pernah dibagi. Ini adalah aturan yang sama dengan filter periode kustom pada pelaporan 1.11.x.

Sertakan offset zona waktu. Dalam URL, `+` harus dikodekan sebagai `%2B`. Nilai tanpa offset dibaca dalam zona waktu server.

## Respons

```json
{
  "id": 42,
  "username": "jdupont",
  "totalConnectionTime": 5025,
  "totalConnectionTimeFormatted": "01:23:45"
}
```

| Bidang | Deskripsi |
|-------|-------------|
| `totalConnectionTime` | Total dalam detik |
| `totalConnectionTimeFormatted` | Total yang sama dalam format `HH:MM:SS`, format yang dikembalikan webservice 1.11.x. Jam dapat melebihi 24. |

## Kesalahan

| Status | Kapan |
|--------|------|
| `400` | Tanggal yang tidak dapat diurai, atau `endDate` sebelum `startDate` |
| `401` | Kredensial tidak ada atau tidak valid |
| `403` | Pemanggil bukan administrator maupun pengguna yang bersangkutan |
| `404` | Pengguna tidak ada, atau tidak termasuk dalam URL akses saat ini |

## Cara waktu dihitung

Total adalah jumlah `logout_date − login_date` atas baris pengguna di tabel `track_e_login`.

Koneksi dimulai saat login dan diperpanjang selama pengguna aktif: halaman yang dibuka pengguna mengirim sinyal kehadiran setiap menit selama tab-nya terlihat, sebagaimana setiap tampilan halaman dilakukan di Chamilo 1.11.x. Setelah ketidakaktifan yang lebih lama daripada masa hidup sesi, aktivitas berikutnya membuka koneksi baru, sehingga jeda menganggur tidak dihitung. Keluar menutup koneksi saat ini. Waktu yang dihabiskan administrator menggunakan **Login as** tidak ditambahkan ke pengguna.

> **Catatan:** Koneksi yang tercatat sebelum pelacakan ini dipulihkan mungkin tidak memiliki tanggal logout. Koneksi tersebut dihitung sebagai nol, sehingga total pada periode sebelum pemutakhiran dapat lebih rendah daripada waktu yang benar-benar dihabiskan.