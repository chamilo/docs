# MCP (Model Context Protocol)

Chamilo 3.0 mengekspos server MCP agar asisten dan agen AI (Claude, konektor ChatGPT, atau klien yang kompatibel dengan MCP) dapat bertindak di dalam platform atas nama pengguna yang terautentikasi, menggunakan izin pengguna itu sendiri — tidak ada akun layanan terpisah atau akses yang ditingkatkan.

## Apa yang Ditambahkan MCP ke Chamilo

MCP (Model Context Protocol) adalah standar terbuka yang memungkinkan klien AI memanggil serangkaian "alat" yang ditentukan yang diekspos oleh server. Server MCP Chamilo dapat dijangkau pada satu endpoint, `/mcp`, dan mengekspos kumpulan alat pengelolaan kursus yang dikurasi untuk pengajar, bukan seluruh permukaan API.

## Kapabilitas yang Tersedia

Setiap panggilan dijalankan sebagai pengguna yang terhubung, sehingga suatu alat hanya pernah melihat dan mengubah kursus yang dikelola pengguna tersebut. Kumpulan alat saat ini:

| Alat | Fungsinya |
|------|-----------|
| Current user | Mengembalikan identitas dan peran pengguna yang terautentikasi |
| Teacher courses | Mencantumkan kursus yang dikelola pengguna sebagai pengajar |
| Course overview | Mengembalikan informasi kursus dasar dan jumlah sumber daya |
| Create course | Membuat kursus baru menggunakan aturan pembuatan kursus platform |
| Create course assignment | Membuat tugas draf atau yang dipublikasikan dengan deskripsi dan skor maksimum |
| Create course test | Membuat tes pilihan ganda berbantuan AI dari deskripsi topik atau dokumen yang sudah ada |
| Get course test response status | Melaporkan siswa mana yang telah menjawab, sedang mengerjakan, atau masih tertunda pada suatu tes |
| Get user course test score | Mengembalikan skor terbaru dan skor terbaik yang telah diselesaikan siswa pada suatu tes |
| Create training satisfaction survey | Membuat survei kepuasan tujuh pertanyaan |
| Create course learning path | Membuat jalur pembelajaran dari halaman yang disediakan klien MCP |
| List documents | Mencantumkan dokumen dalam alat Documents suatu kursus |
| Read course document | Mengembalikan konten HTML, judul, dan metadata dokumen yang dapat diedit |
| Edit course document | Mengganti seluruh konten HTML dokumen yang dapat diedit yang sudah ada |
| Create course document | Membuat dokumen HTML berbantuan AI di folder Documents akar |
| Create course illustration | Menghasilkan ilustrasi AI untuk suatu topik dan menyimpannya sebagai dokumen |
| Illustrate document paragraph | Menyisipkan gambar atau video yang sudah ada sebelum atau sesudah suatu paragraf dalam dokumen |
| Find recent course forum activity | Menemukan pos forum terkini yang terlihat terkait suatu topik |
| Review course quality | Menganalisis jalur pembelajaran, dokumen, tes, tugas, dan survei suatu kursus, lalu mengembalikan rekomendasi perbaikan |

Daftar ini dikurasi oleh tim inti Chamilo, tidak dapat diperluas oleh pengguna dari dalam platform — pengajar tidak dapat menambahkan alat mereka sendiri.

## Cara Pengguna Terhubung

### Kunci API MCP pribadi

Setiap pengguna menghasilkan kuncinya sendiri di **Jaringan sosial** > **Kunci API MCP**:

![Halaman kunci API MCP, menampilkan kunci yang tidak aktif, tombol Generate API key, dan blok Remote MCP connection dengan URL endpoint serta format header Authorization](/.gitbook/assets/admin-mcp-api-key.png)

* Mengklik **Generate API key** membuat kunci dan menampilkannya sekali — Chamilo hanya menyimpan versi yang disamarkan setelahnya, sehingga kunci lengkap harus disalin dan disimpan dengan aman segera.
* Menghasilkan kunci baru segera mencabut kunci sebelumnya.
* Halaman menampilkan status kunci (aktif/tidak aktif), endpoint MCP yang dikonfigurasi di klien, serta tanggal pembuatan dan terakhir digunakan.
* Panel **Remote MCP connection** merinci persis apa yang harus dimasukkan di klien MCP: URL endpoint dan header `Authorization: Bearer <your MCP API key>`.

Sebagaimana dicatat halaman itu sendiri, kunci mengautentikasi klien sebagai akun pengguna tersebut — kunci tidak memberikan izin apa pun yang tidak sudah dimiliki akun.

### OAuth 2.1 (klien jarak jauh dan konektor)

Untuk klien MCP yang mendukung penemuan OAuth dan pendaftaran klien dinamis (bukan kunci yang ditempel secara manual), Chamilo juga bertindak sebagai server otorisasi OAuth 2.1: klien menemukan endpoint Chamilo, mendaftarkan dirinya, dan mengalihkan pengguna ke `/oauth/authorize` untuk menyetujui akses. Aplikasi yang disetujui muncul di **Jaringan sosial** > **Aplikasi yang diotorisasi**, tempat pengguna dapat mencabut aplikasi yang tidak lagi digunakan atau tidak dikenali.

## Pertimbangan Keamanan

* **Tidak ada eskalasi hak istimewa.** Setiap pemanggilan alat MCP dan setiap aplikasi yang diotorisasi OAuth berjalan dengan izin Chamilo milik pengguna yang terhubung — kunci API pribadi atau aplikasi yang diotorisasi tidak pernah dapat melakukan lebih dari yang sudah dapat dilakukan pengguna tersebut secara manual.
* **Hanya Bearer, dibatasi laju.** `/mcp` hanya menerima kredensial Bearer — kunci API MCP pribadi, token akses OAuth, atau (dalam pengembangan) JWT. Upaya autentikasi dibatasi laju per alamat IP untuk memperlambat tebakan kredensial.
* **Permukaan publik yang sempit.** Satu-satunya lalu lintas tanpa autentikasi yang diterima `/mcp` adalah preflight `OPTIONS`; setiap pemanggilan aktual memerlukan `ROLE_USER`. Endpoint discovery OAuth, pendaftaran klien dinamis, dan token sengaja bersifat publik, sebagaimana diwajibkan oleh spesifikasi OAuth 2.1 / MCP — hal ini tidak memberikan akses dengan sendirinya, hanya memungkinkan klien mempelajari cara memulai alur otorisasi.
* **Perlindungan DNS-rebinding sengaja dinonaktifkan untuk `/mcp`.** Bundle yang mengimplementasikan MCP biasanya membatasi endpoint ke `localhost` kecuali daftar statis nama host yang diizinkan dikonfigurasi — tidak cocok untuk portal Chamilo multi-URL yang dapat dijangkau di bawah banyak nama host. Chamilo menonaktifkan pemeriksaan itu karena di sini bersifat redundan: setiap permintaan `/mcp` sudah memerlukan kredensial Bearer terlepas dari header `Host`/`Origin`-nya, dan serangan DNS-rebinding (yang mengandalkan autentikasi ambient bergaya cookie yang ikut bersama Host yang dipalsukan) tidak dapat memalsukan bearer token yang belum dimilikinya.

## Mengonfigurasi Server MCP

Tidak seperti sebagian besar integrasi dalam panduan ini, MCP tidak memiliki halaman pengaturan di panel admin — dikonfigurasi di tingkat berkas, di `config/packages/mcp.yaml`, dan memerlukan akses shell ke server:

| Key | Purpose |
|-----|---------|
| `app`, `version`, `description` | Identitas yang dilaporkan Chamilo kepada klien MCP yang terhubung |
| `client_transports.stdio` / `client_transports.http` | Transport mana yang aktif; Chamilo mengaktifkan keduanya secara default |
| `http.path` | Endpoint HTTP MCP (`/mcp` secara default) |
| `http.allowed_hosts` | Daftar izinkan host DNS-rebinding — diatur ke `false` pada Chamilo (lihat Pertimbangan Keamanan di atas) |
| `http.session.store`, `.directory`, `.ttl` | Tempat status sesi MCP disimpan dan berapa lama |

Untuk menonaktifkan server MCP sepenuhnya, atur `client_transports.http: false` (dan `stdio: false` jika transport CLI juga harus dimatikan) lalu bersihkan cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Tips

* Perlakukan kunci API MCP seperti kata sandi — siapa pun yang memegangnya dapat bertindak sebagai pengguna tersebut melalui klien MCP mana pun.
* Dorong pengguna untuk secara berkala meninjau **Aplikasi yang diotorisasi** dan mencabut apa pun yang tidak mereka kenali.
* Lihat [Konfigurasi AI](integrations/ai-configuration.md) untuk penyedia AI yang mendukung alat pembuatan konten (pembuatan tes, pembuatan dokumen, ilustrasi) yang tercantum di atas.