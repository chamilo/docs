# Alur Kerja dengan Git

## Repositori

Kode sumber Chamilo dihosting di GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Percabangan

* **`master`** — Cabang utama untuk pengembangan
* Cabang fitur dibuat dari `master` untuk pengembangan baru
* Cabang rilis dibuat untuk versi stabil

## Berkontribusi dengan Perubahan

1. **Buat fork** repositori di GitHub
2. **Klon** fork Anda secara lokal
3. **Buat cabang** untuk perubahan Anda: `git checkout -b feature/my-feature`
4. **Lakukan perubahan Anda** dengan mengikuti konvensi pengkodean
5. **Lakukan commit** dengan pesan commit yang jelas dan deskriptif
6. **Kirim** ke fork Anda: `git push origin feature/my-feature`
7. **Buat pull request** terhadap cabang `master`

## Pesan Commit

Tulis pesan commit yang jelas yang menjelaskan **apa** dan **mengapa**:

```
Glosarium: Menambahkan pembuatan istilah berbantuan AI

Guru sekarang dapat menghasilkan istilah glosarium menggunakan penyedia AI yang dikonfigurasi.
Mendukung prompt yang dapat dikonfigurasi dan jumlah istilah.
```

### Konvensi Awalan Alat

Baris subjek diawali dengan **alat atau area** yang terkena dampak perubahan, diikuti oleh tanda titik dua. Kami menggunakan terminologi singkat dan umum agar changelog dan `git log --oneline` dapat dengan cepat dianalisis berdasarkan alat. Awalan selalu dalam bentuk **tunggal** dari nama kanonik alat tersebut.

Format: `<Awalan>: <Ringkasan dalam bentuk imperatif waktu sekarang>`

Contoh:

```
Dokumen: Memperbaiki daftar pada tampilan siswa
Latihan: Mencegah judul pertanyaan duplikat dalam kuis
Jalur Pembelajaran: Memungkinkan pengurutan ulang bab dengan seret dan lepas
Internal: Refaktor hidrasi ResourceNode pada normalizer API
CI: Menyimpan unduhan Composer di cache pada alur kerja GitHub Actions
```

Jika suatu perubahan mencakup beberapa alat, pilih yang paling terkena dampak; perubahan yang benar-benar lintas fungsi yang hanya memengaruhi struktur kode (tanpa dampak pada alat pengguna akhir) harus diklasifikasikan sebagai `Internal`. Perubahan yang eksklusif untuk dokumentasi (situs ini, changelog, docblocks inline yang hanya dimaksudkan sebagai referensi) harus diklasifikasikan sebagai `Dokumentasi`.

#### Prefix yang Diizinkan

| Prefix               | Lingkup / catatan                                                                    |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Bukan "Agenda"                                                                       |
| `Career`             |                                                                                      |
| `Catalogue`          | Katalog kursus dan sesi, termasuk "kursus unggulan" di halaman utama                 |
| `Chat`               |                                                                                      |
| `CI`                 | Integrasi Berkelanjutan, pengujian otomatis, dll.                                    |
| `Course description` |                                                                                      |
| `Course Progress`    | Bukan "Kemajuan Tematik"                                                             |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Segala hal yang berkaitan secara eksklusif dengan dokumentasi Chamilo atau kode, changelog, dll. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Bukan "Kuis"                                                                         |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Termasuk Sertifikat                                                                  |
| `Group`              | Termasuk grup kursus, grup global, dan kelas                                        |
| `Help`               |                                                                                      |
| `Hook`               | Untuk mekanisme internal hook                                                        |
| `Install`            | Termasuk item pembaruan                                                              |
| `Internal`           | Untuk perubahan dan perbaikan yang terutama memengaruhi kode atau bersifat sangat global |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Untuk LP / Jalur Pembelajaran                                                        |
| `Maintenance`        | Alat pemeliharaan kursus: salinan kursus, cadangan, pemulihan, dll.                 |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Untuk yang ada di `tests/scripts/`                                                   |
| `Search`             | Pencarian teks lengkap                                                               |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Jejaring sosial                                                                      |
| `SSO`                | Metode Single Sign-On                                                                |
| `Survey`             |                                                                                      |
| `System`             | Hal-hal yang terutama berkaitan dengan hosting dan penyesuaian halus di tingkat server |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## Tinjauan Kode

Permintaan pull akan ditinjau oleh tim pemeliharaan. Bersiaplah untuk:

* Menanggapi umpan balik dan melakukan revisi
* Menjaga branch Anda tetap diperbarui dengan `master`
* Memastikan bahwa tes berhasil dilalui

## Pelaporan Masalah

Laporkan bug dan permintaan fitur di pelacak isu GitHub.