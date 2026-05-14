# Referensi Endpoint

Platform API secara otomatis menghasilkan endpoint REST untuk entitas yang dianotasi dengan `#[ApiResource]`. Chamilo mengekspos lebih dari 100 sumber daya.

## Operasi Standar

Untuk setiap sumber daya API, operasi berikut umumnya tersedia:

| Metode | Jalur | Deskripsi |
|--------|-------|-----------|
| `GET` | `/api/{resources}` | Daftar (koleksi) |
| `POST` | `/api/{resources}` | Buat |
| `GET` | `/api/{resources}/{id}` | Baca (item tunggal) |
| `PUT` | `/api/{resources}/{id}` | Pembaruan penuh |
| `PATCH` | `/api/{resources}/{id}` | Pembaruan parsial |
| `DELETE` | `/api/{resources}/{id}` | Hapus |

Tidak semua operasi diaktifkan untuk semua sumber daya — pembatasan keamanan berlaku.

## Sumber Daya Utama API

### Sumber Daya Platform

| Sumber Daya | Jalur | Deskripsi |
|-------------|-------|-----------|
| Pengguna | `/api/users` | Akun pengguna |
| Kursus | `/api/courses` | Kursus |
| Sesi | `/api/sessions` | Sesi pelatihan |
| Node Sumber Daya | `/api/resource_nodes` | Node konten terpadu |
| URL Akses | `/api/access_urls` | Portal multi-URL |
| Pesan | `/api/messages` | Pesan platform |

### Sumber Daya Konten Kursus

| Sumber Daya | Jalur | Deskripsi |
|-------------|-------|-----------|
| Dokumen | `/api/documents` | Dokumen kursus |
| Jalur Pembelajaran | `/api/learning_paths` | Jalur pembelajaran |
| Glosarium | `/api/glossaries` | Istilah glosarium |
| Tautan | `/api/links` | Tautan eksternal |
| Acara Kalender | `/api/c_calendar_events` | Acara agenda |
| Publikasi Siswa | `/api/c_student_publications` | Tugas |
| Blog | `/api/c_blogs` | Blog kursus |
| Grup | `/api/c_groups` | Grup kursus |

### Sumber Daya Pelacakan

| Sumber Daya | Jalur | Deskripsi |
|-------------|-------|-----------|
| Kategori Buku Nilai | `/api/gradebook_categories` | Pengaturan buku nilai |
| Hasil Buku Nilai | `/api/gradebook_results` | Nilai |

## Penyaringan dan Paginasi

Platform API mendukung:

* **Paginasi**: `?page=2&itemsPerPage=30`
* **Penyaringan**: `?title=Introduction` (tergantung pada filter yang dikonfigurasi)
* **Pengurutan**: `?order[title]=asc`
* **Pencarian**: Pencarian teks lengkap pada bidang yang dikonfigurasi

## Negosiasi Konten

API mendukung beberapa format:

* `application/ld+json` (default — JSON-LD)
* `application/json`
* `text/html` (dokumentasi API)

Tetapkan header `Accept` untuk memilih format respons.

## Keamanan

Setiap endpoint menerapkan keamanan melalui:

* Autentikasi JWT (diperlukan untuk sebagian besar endpoint)
* Pemilih keamanan Symfony (izin pada tingkat sumber daya)
* Kontrol akses berbasis peran (misalnya, endpoint eksklusif untuk administrator)