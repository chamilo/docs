# API Administrasi Kursus

Chamilo 3.1 memungkinkan integrasi administrator memperbarui metadata kursus dan menghapus kursus melalui sumber daya API `Course`. Operasi ini ditambahkan untuk sinkronisasi dengan sistem administrasi eksternal, seperti ERP.

## Izin

| Operasi | Metode dan endpoint | Peran yang diperlukan |
|-----------|---------------------|---------------|
| Mencantumkan kursus | `GET /api/courses` | Pengajar atau administrator platform |
| Melihat suatu kursus | `GET /api/courses/{id}` | Izin untuk melihat kursus tersebut |
| Membuat kursus | `POST /api/courses` | Pengajar atau administrator platform |
| Memperbarui kursus | `PATCH /api/courses/{id}` | **Administrator platform (`ROLE_ADMIN`)** |
| Menghapus kursus | `DELETE /api/courses/{id}` | **Administrator platform (`ROLE_ADMIN`)** |

`PUT` tidak dikonfigurasi sebagai operasi pada sumber daya ini. Pengajar sebaiknya tetap mengedit kursus mereka sendiri melalui antarmuka pengaturan kursus; operasi tulis API yang baru hanya untuk administrator.

Gunakan akun terautentikasi atau kredensial integrasi dengan izin yang diperlukan. Lihat [Autentikasi API](authentication.md).

## Memperbarui metadata kursus

Kirim permintaan JSON Merge Patch API Platform untuk mengubah hanya properti yang disertakan dalam isi permintaan:

```http
PATCH /api/courses/42
Authorization: Bearer <admin-token>
Content-Type: application/merge-patch+json
Accept: application/ld+json
```

```json
{
  "title": "Introduction to Accounting - 2026"
}
```

Permintaan ini memperbarui kursus yang sudah ada, bukan membuat kursus baru. API menerima properti yang dapat ditulis yang didefinisikan oleh grup serializer `course:write`, dengan tunduk pada validasi entitas. Contohnya meliputi `title`, `visibility`, `categories`, `departmentUrl`, `videoUrl`, `sticky`, dan `duration`. Properti relasi seperti `categories` memerlukan representasi sumber daya yang diharapkan oleh API; periksa dokumentasi OpenAPI alih-alih mengirim ID basis data secara sembarangan.

**Penting:** `code` internal kursus **tidak** dapat ditulis melalui operasi PATCH ini. Jangan mencoba mengganti nama kode internal suatu kursus dengan mengirim bidang `code` atau `visualCode`.

## Menghapus kursus

```http
DELETE /api/courses/42
Authorization: Bearer <admin-token>
```

Ini adalah operasi administrasi yang **destruktif**. Chamilo memanggil helper penghapusan kursus yang sama dengan yang digunakan oleh pemeliharaan kursus, alih-alih langsung menghapus entitas Doctrine. Helper tersebut membersihkan pendaftaran terkait, tautan sesi dan kelas, data pelacakan, serta pengindeksan pencarian terkait, sesuai yang berlaku.

Pada instalasi **multi-URL**, penghapusan mungkin hanya melepaskan kursus dari URL akses saat ini, bukan menghapusnya di mana pun. Dokumen kursus tidak dihapus menggunakan opsi terpisah *hapus dokumen eksklusif* dari antarmuka pemeliharaan. Jangan menafsirkan penghapusan melalui API sebagai jaminan bahwa setiap dokumen dihapus secara fisik.

Jika dependensi aktif mencegah penghapusan (misalnya, urutan sumber daya), endpoint dapat merespons dengan `409 Conflict`. Tinjau dependensi kursus dan cadangan sebelum mengirim permintaan DELETE, terutama pada integrasi batch.

## Kesalahan dan catatan operasional

* Pemanggil tanpa peran administrator yang diperlukan akan ditolak; gunakan akun yang diotorisasi dengan benar, bukan kredensial pengajar, untuk PATCH atau DELETE.
* Data permintaan yang tidak valid dapat gagal pada validasi entitas. Ambil kursus saat ini sebelum menambalnya, dan kirim hanya properti yang ingin Anda ubah.
* Operasi ini diekspos oleh API Platform; lihat dokumentasi OpenAPI instans yang terpasang untuk skema respons yang tepat dan format bidang yang diterima.
* Uji penghapusan kursus pada kursus sekali pakai, bukan pada kursus yang berisi catatan peserta didik produksi.

Untuk administrasi kursus di antarmuka, lihat [Mengelola Kursus](../../admin-guide/courses/managing-courses.md). Untuk integrasi pendaftaran sesi, lihat [Pendaftaran Peserta Didik Sesi](session-students.md).

**Implementasi:** `src/CoreBundle/Entity/Course.php` (operasi `Patch` dan `Delete`), serta `src/CoreBundle/State/CourseDeleteProcessor.php`. Ditambahkan pada commit Chamilo LMS `8cc9d4b33d`.