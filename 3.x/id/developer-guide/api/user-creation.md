# Pembuatan Pengguna

`POST /api/access_urls/{id}/user` membuat pengguna platform dan menambahkannya ke URL akses `{id}`. Ini adalah pengganti Chamilo 3 untuk aksi `save_user_json` dari layanan web `webservices/api/v2.php` versi 1.11.x, dan ditujukan untuk integrasi yang membuat akun peserta didik (toko, sistem SDM, portal pendaftaran).

## Akses

| Pemanggil | Diizinkan |
|--------|---------|
| `ROLE_ADMIN` | Ya |
| `ROLE_SESSION_MANAGER` | Ya |
| Siapa pun selain itu | `403 Forbidden` |

Autentikasi dengan JWT atau kunci API eksternal, sebagaimana dijelaskan di [Autentikasi](authentication.md).

## Permintaan

```http
POST /api/access_urls/1/user
Authorization: Bearer <token>
Content-Type: application/json
```

```json
{
  "username": "jdoe-20261022",
  "email": "jane.doe@example.com",
  "firstname": "Jane",
  "lastname": "Doe",
  "password": "S3cret!pass",
  "sendEmail": true,
  "extraFields": { "my_user_field": "value" }
}
```

| Bidang | Wajib | Deskripsi |
|-------|----------|-------------|
| `username` | Ya | Nama masuk pengguna baru. Tidak boleh sudah digunakan oleh akun lain (dibandingkan tanpa membedakan huruf besar/kecil). |
| `email` | Ya | Alamat surel yang valid. Beberapa akun boleh memakai alamat yang sama, kecuali jika `checkEmailDuplicates` bernilai `true`. |
| `firstname`, `lastname` | Tidak | Nama depan dan nama belakang. |
| `password` | Tidak | Kata sandi awal. Jika kosong dan `sendEmail` bernilai `true`, surel berisi tautan untuk menetapkan kata sandi. |
| `locale` | Tidak | Bahasa antarmuka, misalnya `fr_FR`. Secara bawaan menggunakan bahasa platform. |
| `timezone` | Tidak | Secara bawaan menggunakan zona waktu platform. |
| `status` | Tidak | `5` (peserta didik) secara bawaan; `1` untuk pengajar. |
| `sendEmail` | Tidak | `true` secara bawaan. Mengirim pesan dan surel kepada pengguna yang berisi detail akses mereka. |
| `checkEmailDuplicates` | Tidak | `false` secara bawaan. Jika `true`, permintaan ditolak dengan `409 email_already_exists` apabila ada akun yang sudah menggunakan alamat surel ini (dibandingkan tanpa membedakan huruf besar/kecil). Perilaku yang sama dengan parameter `check_email_duplicates` pada `save_user_json`. |
| `extraFields` | Tidak | Nilai bidang tambahan pengguna yang dikunci berdasarkan variabel bidang tersebut. Setiap variabel harus merupakan bidang tambahan pengguna yang sudah ada. |

### Alamat surel bersama

Chamilo tidak mewajibkan alamat surel bersifat unik: formulir pembuatan pengguna milik administrator menerima alamat yang sudah digunakan akun lain, impor pengguna hanya menolaknya jika opsi **Periksa surel unik** dicentang, dan tidak ada pengaturan platform untuk mengubah hal ini. Kasus yang umum adalah peserta didik yang didaftarkan ulang dengan pengenal baru tetapi tetap memakai alamat yang sama. Kirim `checkEmailDuplicates: true` hanya jika integrasi Anda ingin memperlakukan alamat yang sudah ada sebagai kesalahan.

Jika pengaturan **Nama masuk adalah surel** diaktifkan, nama pengguna adalah alamat surel, sehingga pemeriksaan nama pengguna sudah menolak duplikat.

## Respons

`201 Created` dengan pengguna baru (grup serialisasi `user:read`), termasuk `id`-nya.

## Kesalahan

| Status | Isi | Kapan |
|--------|------|------|
| `401` | | Tidak ada kredensial atau kredensial tidak valid |
| `403` | | Pemanggil bukan administrator maupun administrator sesi |
| `409` | `{"error": "username_already_exists"}` | Nama pengguna sudah digunakan |
| `409` | `{"error": "email_already_exists"}` | `checkEmailDuplicates` bernilai `true` dan alamat surel sudah digunakan |
| `422` | | `username` atau `email` tidak ada, atau alamat surel tidak valid |

## Implementasi

* Operasi: sumber daya `AccessUrlUser` yang dideklarasikan pada `src/CoreBundle/Entity/User.php`
* Masukan: `src/CoreBundle/Dto/CreateUserOnAccessUrlInput.php`
* Pengontrol: `src/CoreBundle/Controller/Api/CreateUserOnAccessUrlAction.php`
* Halaman **Daftarkan siswa** milik administrator sesi (`/admin-dashboard/register/{courseId}`) menggunakan endpoint ini dengan `checkEmailDuplicates: true`, sehingga memperingatkan jika alamat sudah digunakan.