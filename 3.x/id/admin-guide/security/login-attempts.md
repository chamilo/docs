# Percobaan Login

Laporan Percobaan Login menampilkan catatan percobaan login yang gagal, beserta grafik untuk membantu Anda mengenali pola brute-force atau credential-stuffing.

## Mengakses Percobaan Login

Dari panel administrasi, klik **Keamanan > Percobaan login**.

## Apa yang Ditampilkan

![Halaman Percobaan login yang menampilkan grafik untuk percobaan per hari, IP teratas, percobaan gagal per bulan, login berhasil vs gagal, percobaan per jam, dan IP unik per hari, diikuti tabel percobaan login yang gagal](../../.gitbook/assets/admin-security-login-attempts.png)

* **Percobaan per hari (7 hari terakhir)** — Jumlah harian percobaan yang gagal
* **IP teratas (30 hari terakhir)** — Alamat IP mana yang menghasilkan percobaan terbanyak
* **Percobaan gagal per bulan (12 bulan terakhir)** — Tren jangka panjang
* **Berhasil vs gagal (30 hari terakhir)** — Rincian harian login yang berhasil versus yang gagal
* **Percobaan per jam (7 hari terakhir)** — Distribusi berdasarkan waktu dalam sehari, berguna untuk mengenali percobaan otomatis/skrip
* **IP unik per hari (30 hari terakhir)** — Berapa banyak IP berbeda yang mencoba login setiap hari
* **Tabel percobaan login yang gagal** — Setiap percobaan yang gagal, dengan tanggal, alamat IP, dan nama pengguna yang dicoba

Gunakan kolom **Nama pengguna**, **IP**, dan rentang tanggal di atas grafik untuk memfilter laporan.

## Pengaturan Terkait

Laporan ini adalah alat pemantauan; perlindungan brute-force yang sebenarnya dikonfigurasi di [Pengaturan Keamanan](../platform-settings/security-settings.md):

* **Percobaan login maksimum sebelum penguncian** (`login_max_attempt_before_blocking_account`) — Mengunci akun setelah terlalu banyak percobaan gagal
* **CAPTCHA** (`allow_captcha`) dan **Toleransi kesalahan CAPTCHA** (`captcha_number_mistakes_to_block_account`) — Memperlambat percobaan otomatis dan mengunci akun yang terus gagal melewati CAPTCHA

Lihat juga [Panduan Keamanan](../appendix/security-guide.md) untuk perlindungan brute-force di tingkat server (fail2ban).