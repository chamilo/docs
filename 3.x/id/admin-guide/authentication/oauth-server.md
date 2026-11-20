# Server Otorisasi OAuth 2.1 dan Klien MCP

Chamilo dapat bertindak sebagai **server otorisasi OAuth** bagi klien yang terhubung ke sumber daya terlindunginya. Fitur ini berbeda dari [login OAuth2](oauth2.md), di mana Chamilo menggunakan penyedia identitas eksternal untuk memasukkan pengguna.

## Mengaktifkan dan mengonfigurasi

Di bawah **Administration > Configuration settings > Security**, aktifkan `security.oauth_server_enabled`. Akses MCP juga bergantung pada konfigurasi `security.mcp_enabled` yang sudah ada dan peran MCP yang diizinkan bagi pengguna.

Server mengekspos rute otorisasi, token, pendaftaran, dan pencabutan standar (`/oauth/authorize`, `/oauth/token`, `/oauth/register`, `/oauth/revoke`) serta metadata penemuan. Hanya HTTPS yang sebaiknya digunakan untuk klien produksi.

## Mendaftarkan klien

Chamilo mendukung klien kode otorisasi PKCE publik dan klien rahasia yang terdaftar. Pendaftaran klien dinamis (DCR) menggunakan `/oauth/register` dan dibatasi lajunya. Pengaturan `security.dynamic_client_registration` **dinonaktifkan secara default**; endpoint tetap tersedia untuk alur pendaftaran MCP yang didukung, sementara pengaturan tersebut mengontrol cakupan klien tambahan yang diterima oleh pendaftaran. Jangan berasumsi bahwa mengaktifkan pengaturan tersebut membuat API terlindungi yang sembarang menjadi tersedia.

Klien yang terdaftar memiliki daftar **allowed resources** di sisi server. Saat ini registri sumber daya hanya mendefinisikan sumber daya **MCP** dan cakupan `mcp`. Sumber daya terlindungi yang baru memerlukan implementasi server dan keputusan izin yang eksplisit, bukan sekadar menambahkan URL yang tidak dikenali ke dalam permintaan. Chamilo memvalidasi parameter `resource` RFC 8707 di seluruh penanganan otorisasi dan token.

## Persetujuan pengguna dan audit

1. Klien memulai permintaan kode otorisasi dengan PKCE (`S256`) serta cakupan/sumber daya yang diminta.
2. Pengguna melakukan autentikasi dengan login Chamilo biasa jika diperlukan.
3. Chamilo menampilkan identitas klien, detail pendaftaran, dan akses yang diminta pada layar persetujuan.
4. Pengguna memilih **Allow** atau **Deny**. Persetujuan dicatat sebagai bagian dari riwayat persetujuan server, dan informasi persetujuan sebelumnya dapat ditampilkan pada permintaan berikutnya.

Persetujuan terikat pada permintaan yang ditampilkan kepada pengguna. Permintaan yang disetujui tidak memberikan sumber daya terlindungi lain atau akses sembarang di luar izin yang diminta.

## Catatan penerapan dan keamanan

Pembaruan OAuth 2.1 memperkenalkan bidang allowed-resources untuk klien dan catatan persetujuan klien yang persisten. Terapkan **migrasi basis data Chamilo yang spesifik** yang disertakan bersama rilis sebelum mengaktifkan alur yang diperbarui. Jaga kerahasiaan URL callback dan rahasia klien OAuth. Pendaftaran klien tidak memberikan akses tanpa batas ke pengguna atau kursus Chamilo.

Referensi implementasi: [Pendaftaran dan persetujuan klien OAuth, PR #9231](https://github.com/chamilo/chamilo-lms/pull/9231).