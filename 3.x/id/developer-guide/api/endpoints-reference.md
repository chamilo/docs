# Referensi Endpoint

API Platform secara otomatis menghasilkan endpoint REST untuk entitas yang dianotasi dengan `#[ApiResource]`. Chamilo mengekspos 100+ resource.

## Operasi Standar

Untuk setiap resource API, operasi berikut biasanya tersedia:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Daftar (koleksi) |
| `POST` | `/api/{resources}` | Buat |
| `GET` | `/api/{resources}/{id}` | Baca (item tunggal) |
| `PUT` | `/api/{resources}/{id}` | Pembaruan penuh |
| `PATCH` | `/api/{resources}/{id}` | Pembaruan parsial |
| `DELETE` | `/api/{resources}/{id}` | Hapus |

Tidak semua operasi diaktifkan untuk setiap resource — batasan keamanan berlaku.

## Resource API Utama

### Resource Platform

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Akun pengguna |
| Courses | `/api/courses` | Kursus |
| Sessions | `/api/sessions` | Sesi pelatihan |
| Resource Nodes | `/api/resource_nodes` | Node konten terpadu |
| Access URLs | `/api/access_urls` | Portal multi-URL |
| Messages | `/api/messages` | Pesan platform |

### Resource Konten Kursus

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Dokumen kursus |
| Learning Paths | `/api/learning_paths` | Learning path |
| Glossaries | `/api/glossaries` | Istilah glosarium |
| Links | `/api/links` | Tautan eksternal |
| Calendar Events | `/api/c_calendar_events` | Acara agenda |
| Student Publications | `/api/c_student_publications` | Tugas |
| Blogs | `/api/c_blogs` | Blog kursus |
| Groups | `/api/c_groups` | Grup kursus |

### Resource Pelacakan

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Pengaturan gradebook |
| Gradebook Results | `/api/gradebook_results` | Nilai |

## Penyaringan dan Paginasi

API Platform mendukung:

* **Pagination**: `?page=2&itemsPerPage=30`
* **Filtering**: `?title=Introduction` (tergantung pada filter yang dikonfigurasi)
* **Ordering**: `?order[title]=asc`
* **Search**: Pencarian teks penuh pada field yang dikonfigurasi

## Negosiasi Konten

API mendukung beberapa format:

* `application/ld+json` (default — JSON-LD)
* `application/json`
* `text/html` (dokumentasi API)

Atur header `Accept` untuk memilih format respons.

## Keamanan

Setiap endpoint menegakkan keamanan melalui:

* Autentikasi JWT (diperlukan untuk sebagian besar endpoint)
* Symfony security voters (izin tingkat resource)
* Role-based access control (misalnya, endpoint khusus admin)