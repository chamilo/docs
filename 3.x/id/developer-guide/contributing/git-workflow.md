# Alur Kerja Git

## Repositori

Kode sumber Chamilo di-host di GitHub: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## Percabangan

* **`master`** — Cabang pengembangan utama
* Cabang fitur dibuat dari `master` untuk pengembangan baru
* Cabang rilis dibuat untuk rilis yang stabil

## Mengontribusikan Perubahan

1. **Fork** repositori di GitHub
2. **Clone** fork Anda secara lokal
3. **Buat cabang** untuk perubahan Anda: `git checkout -b feature/my-feature`
4. **Lakukan perubahan** sesuai konvensi pengodean
5. **Commit** dengan pesan commit yang jelas dan deskriptif
6. **Push** ke fork Anda: `git push origin feature/my-feature`
7. **Buat pull request** terhadap cabang `master`

## Pesan Commit

Tulis pesan commit yang jelas yang menjelaskan **apa** dan **mengapa**:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### Konvensi awalan alat

Baris subjek diawali dengan **alat atau area** yang disentuh oleh perubahan, diikuti tanda titik dua. Kami menggunakan terminologi bersama yang singkat agar changelog dan `git log --oneline` dapat dipindai berdasarkan alat. Awalan selalu berbentuk **tunggal** dari nama kanonis alat tersebut.

Format: `<Prefix>: <Imperative summary in the present tense>`

Contoh:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

Jika suatu perubahan mencakup beberapa alat, pilih yang paling terdampak; perubahan yang benar-benar lintas-potong yang hanya menyentuh struktur kode (tanpa alat pengguna akhir) masuk ke `Internal`. Perubahan yang hanya dokumentasi (situs ini, changelog, docblock sebaris yang semata-mata sebagai referensi) masuk ke `Documentation`.

#### Prefiks yang diizinkan

| Prefiks              | Cakupan / catatan                                                                    |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | Bukan "Agenda"                                                                       |
| `Career`             |                                                                                      |
| `Catalogue`          | Katalog kursus dan sesi, termasuk "hot courses" di beranda                           |
| `Chat`               |                                                                                      |
| `CI`                 | Continuous Integration, pengujian otomatis, dll.                                     |
| `Course description` |                                                                                      |
| `Course Progress`    | Bukan "Thematic advance"                                                             |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Segala hal yang terkait secara eksklusif dengan dokumentasi Chamilo atau kode, changelog, dll. |
| `Dropbox`            |                                                                                      |
| `Exercise`           | Bukan "Quiz"                                                                         |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | Termasuk Certificates                                                                |
| `Group`              | Termasuk grup kursus, grup global, dan kelas                                         |
| `Help`               |                                                                                      |
| `Hook`               | Untuk mekanisme hook internal                                                        |
| `Install`            | Termasuk hal-hal terkait upgrade                                                     |
| `Internal`           | Untuk perubahan dan perbaikan yang sebagian besar memengaruhi kode itu sendiri atau bersifat sangat global |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | Untuk LP / Learning Paths                                                            |
| `Maintenance`        | Alat pemeliharaan kursus: salinan kursus, cadangan, pemulihan, dll.                  |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | Untuk apa yang berada di `tests/scripts/`                                            |
| `Search`             | Pencarian teks penuh                                                                 |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | Jejaring sosial                                                                      |
| `SSO`                | Metode Single Sign-On                                                                |
| `Survey`             |                                                                                      |
| `System`             | Hal-hal yang sebagian besar berkaitan dengan hosting dan penyetelan halus di tingkat server |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## Tinjauan Kode

Pull request ditinjau oleh tim maintainer. Bersiaplah untuk:

* Menanggapi umpan balik dan melakukan revisi
* Menjaga cabang Anda tetap mutakhir dengan `master`
* Memastikan pengujian lulus

## Melaporkan Isu

Laporkan bug dan permintaan fitur pada pelacak isu GitHub.