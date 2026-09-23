# Simple IDS

Chamilo menyertakan sistem deteksi penyusupan (IDS) ringan di dalam aplikasi. Pada setiap permintaan, sistem memindai parameter kueri URL, jalur permintaan, dan beberapa header (`User-Agent`, `Referer`) untuk mencari tanda serangan yang umum — misalnya payload XSS atau pola path-traversal — dan mencatat segala sesuatu yang mencurigakan. Halaman Simple IDS memungkinkan Anda meninjau apa yang telah ditandai.

**Body** permintaan sengaja tidak dipindai, untuk menghindari positif palsu dari konten editor teks kaya (teks kursus secara sah berisi markup yang menyerupai HTML/JavaScript).

## Mengakses Simple IDS

Dari panel administrasi, klik **Keamanan > Simple IDS**.

## Apa yang Ditampilkan

![Halaman Simple IDS menampilkan grafik untuk peristiwa per hari, peristiwa per jenis, dan IP penyerang teratas, diikuti tabel peristiwa IDS yang ditandai dengan tanggal, IP, jenis deteksi, parameter, URI, dan detail](../../.gitbook/assets/admin-security-simple-ids.png)

* **Peristiwa per hari (7 hari terakhir)**, **Peristiwa per jenis (30 hari terakhir)**, dan **IP penyerang teratas (30 hari terakhir)** — Grafik ringkasan
* **Tabel peristiwa IDS yang ditandai** — Setiap entri menampilkan tanggal, IP sumber, jenis deteksi (misalnya `XSS`), parameter yang terdampak, URI permintaan, dan deskripsi singkat tentang apa yang terdeteksi

Gunakan filter **IP**, jenis peristiwa, dan rentang tanggal di atas grafik untuk mempersempit hasil.

## Cara Kerjanya

* Setiap permintaan dipindai saat masuk; kecocokan ditambahkan ke `var/logs/ids/ids_events.log`
* Saat keluar, subscriber yang sama menambahkan header keamanan yang direkomendasikan OWASP ke respons
* Jika pemblokiran diaktifkan, permintaan yang cocok dengan tanda tangan dihentikan segera dengan respons HTTP 400 alih-alih mencapai kode aplikasi Anda

## Konfigurasi

Simple IDS dikendalikan oleh variabel lingkungan, yang diatur di `config/packages/chamilo_ids.yaml`:

| Variabel | Tujuan |
|----------|---------|
| `IDS_ENABLED` | Mengaktifkan atau menonaktifkan pemindaian permintaan dan pencatatan |
| `IDS_BLOCK` | Jika diaktifkan, permintaan yang terdeteksi ditolak (HTTP 400) alih-alih hanya dicatat |
| `IDS_SECURITY_HEADERS` | Mengontrol apakah header respons yang direkomendasikan OWASP ditambahkan |

Ini adalah detektor ringan dengan upaya terbaik yang dimaksudkan untuk menangkap upaya pemindaian dan eksploitasi yang jelas — sistem ini tidak menggantikan web application firewall (WAF) khusus untuk penerapan berisiko tinggi.