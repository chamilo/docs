# BuyCourses: Pembayaran dan Layanan Berulang

Plugin **BuyCourses** menjual akses ke kursus dan sesi serta dapat menawarkan layanan berbayar. Metode pembayaran bergantung pada gateway yang telah dikonfigurasi untuk instalasi tersebut.

## Konfigurasi pembayaran

Buka **Administration > Plugins > BuyCourses** dan masuk ke area konfigurasi pembayarannya. Simpan kredensial gateway di server, bukan di halaman yang dihadapi peserta. Metode yang sudah ada, seperti Stripe dan PayPal, tetap beroperasi secara independen dari BTCPay Server.

### BTCPay Server (pembelian kursus dan sesi)

Plugin ini juga mendukung **BTCPay Server** untuk pembelian kursus dan sesi:

1. Aktifkan metode pembayaran BTCPay di konfigurasi BuyCourses.
2. Atur **Server URL**, **Store ID**, **Greenfield API key**, dan **webhook secret** BTCPay.
3. Gunakan **connection test** pada konfigurasi pembayaran untuk memastikan akses Greenfield API.
4. Konfigurasikan webhook di sisi BTCPay menggunakan URL webhook yang ditampilkan plugin dan secret yang sama.
5. Selesaikan pembelian uji dalam jumlah kecil sebelum menawarkan opsi ini kepada peserta.

Pembeli diarahkan ke checkout yang dihosting BTCPay. Chamilo memverifikasi tanda tangan webhook dan mengambil kembali invoice untuk memvalidasi **store, amount, currency and order details** sebelum menandai pesanan sebagai lunas dan mendaftarkan pembeli. Pengembalian melalui peramban dapat merekonsiliasi webhook yang terlewat atau tertunda. Notifikasi berulang tidak membuat pemenuhan ganda.

Hanya pembayaran yang telah diverifikasi dan diselesaikan (termasuk kelebihan pembayaran yang diterima serta invoice yang secara eksplisit ditandai settled oleh administrator) yang memberikan akses. **Pembayaran sebagian, terlambat, kedaluwarsa, atau tidak valid tidak boleh diperlakukan sebagai terpenuhi secara otomatis**; pembayaran luar biasa memerlukan tinjauan manual.

**Instalasi yang sudah ada:** Jalankan prosedur pembaruan plugin sekali untuk membuat `plugin_buycourses_btcpay_account`. Administrator dapat membuka `/plugin/BuyCourses/update.php` atau menyimpan konfigurasi pembayaran BTCPay, yang juga memastikan tabel plugin ada. Pembaruan ini khusus untuk BuyCourses, bukan migrasi basis data global.

BTCPay **tidak** didokumentasikan di sini sebagai gateway layanan berulang; jangan berasumsi bahwa BTCPay menerapkan perpanjangan langganan otomatis seperti Stripe/PayPal.

## Siklus hidup layanan berulang

Peserta dapat menggunakan **My Services** untuk melihat layanan berulang yang aktif serta riwayat pembelian/pembayaran mereka. Untuk layanan dengan perpanjangan otomatis yang didukung:

* Setiap pembayaran perpanjangan memiliki catatan historis dan tanda terima sendiri.
* Membatalkan perpanjangan mencegah tagihan di masa mendatang, tetapi layanan yang telah dibayar tetap dapat diakses hingga periode berbayar saat ini berakhir.
* Administrator juga dapat membatalkan perpanjangan dari **service sales report**.
* Langganan berulang yang aktif, tertunda, atau masih berjalan dilindungi dari pembelian ganda.
* Layanan yang kedaluwarsa atau dibatalkan sepenuhnya dapat dibeli kembali.

**Purchase history** dan **payment history** terpisah: satu pembelian layanan dapat memiliki beberapa pembayaran perpanjangan. Jangan menyimpulkan bahwa pembayaran yang diperpanjang adalah pembelian kedua.

## Total pembayaran penjualan layanan

Dalam **service sales report** administrator, dua kolom membantu membedakan jumlah pesanan awal dari pembayaran yang terkumpul seiring waktu:

* **Last payment** menampilkan tanggal pembayaran berhasil terbaru yang tercatat untuk penjualan layanan tersebut. Jika tanggal pembayaran tidak tersedia, laporan menampilkan tanda hubung.
* **Total collected** menampilkan jumlah pembelian awal yang terkumpul ditambah jumlah perpanjangan berhasil yang tercatat, diformat dalam mata uang layanan. Nilai ini tidak sama dengan harga satu periode penagihan.

Perhitungan menggunakan riwayat audit penjualan layanan, menghindari penghitungan peristiwa perpanjangan ganda, dan memperhitungkan tagihan langganan Stripe awal tanpa menghitungnya dua kali. Untuk kasus pembayaran atau pengembalian dana yang luar biasa, rekonsiliasikan laporan dengan penyedia pembayaran; jumlah yang ditampilkan bukan pencairan gateway atau buku besar pengembalian dana yang terpisah.

## Langganan Stripe historis

BuyCourses dapat merekonsiliasi riwayat invoice Stripe untuk layanan berulang yang lebih lama yang transaksi perpanjangannya tidak tercatat sepenuhnya dalam log audit plugin. Tampilan **My Services** dan laporan penjualan layanan dapat menyegarkan catatan tersebut serta memperbarui periode berbayar dan total yang diketahui secara lokal. Administrator sebaiknya memverifikasi perbedaan riwayat pembayaran yang luar biasa terhadap Stripe, bukan mengedit penjualan secara langsung.

## Memfilter laporan penjualan

**Course and session sales report** dapat difilter berdasarkan status pesanan, pengguna, rentang tanggal, atau email. Filter produk opsional memungkinkan Anda mempersempit hasil berdasarkan jenis produk dan nama produk. **Service sales report** mendukung pemfilteran status serta pencarian pengguna/email/nama/referensi pesanan dan pencarian nama layanan. Tinjau filter yang aktif sebelum mengekspor atau merekonsiliasi penjualan; kedua layar laporan memiliki kontrol filter yang berbeda.

Lihat [Filter penjualan BuyCourses PR #9387](https://github.com/chamilo/chamilo-lms/pull/9387).

## Siklus hidup kursus yang terhubung dengan langganan dan pengamanan penghapusan

BuyCourses dapat menutup, menyembunyikan, dan mengaktifkan kembali kursus yang terkait dengan langganan layanan berulang seiring perubahan status pembayarannya. Dalam **Subscription behavior JSON** suatu layanan, `hide_after_days` menentukan jeda setelah penutupan sebelum kursus disembunyikan (bawaan 30 hari), sedangkan `delete_after_days` menentukan jeda setelah penyembunyian sebelum penghapusan permanen. Penghapusan dinonaktifkan secara bawaan (`null`); hanya nilai positif yang membuat suatu kursus memenuhi syarat.

Administrator dapat meninjau kursus yang memenuhi syarat, tertunda, dan diblokir di `/admin/buycourses/course-lifecycle`. Antarmuka mendukung simulasi yang tidak merusak serta penghapusan tertarget **satu kursus yang memenuhi syarat per eksekusi**, yang dilindungi oleh konfirmasi eksplisit. Pemroses CLI `chamilo:buycourses:process-recurring-subscriptions` juga mendukung `--dry-run`, `--delete-expired`, dan `--max-deletions` (1–25). Tanpa `--delete-expired`, pemroses tersebut tidak menghapus kursus secara permanen.

**Penghapusan permanen bersifat merusak.** Simpan cadangan dan uji terlebih dahulu dengan kursus sekali pakai. Pemeriksaan kelayakan melindungi penjualan aktif, kursus yang terhubung dengan sesi, dan kepemilikan yang tidak konsisten; penghapusan otomatis diblokir untuk instalasi multi-URL akses. Tinjau perilaku perpanjangan/penghapusan yang bersamaan sebelum menjadwalkan pembersihan yang merusak di lingkungan produksi. Lihat [PR siklus hidup kursus langganan #9442](https://github.com/chamilo/chamilo-lms/pull/9442).

## Pemeriksaan operasional

Setelah pemutakhiran, uji pembelian kursus secara lengkap, pembelian sesi jika dijual, webhook yang tertunda/diputar ulang, faktur BTCPay yang kedaluwarsa dan parsial, perpanjangan otomatis, serta pembatalan dengan akses yang tetap berlaku hingga akhir periode yang telah dibayar. Jauhkan kredensial dan rahasia webhook dari tangkapan layar, log, dan tiket dukungan.

## Penguatan pembayaran

### Pemeriksaan jumlah gerbang pembayaran (Redsys / Cecabank)

Ketika bank memberi tahu platform bahwa pembayaran berhasil, BuyCourses membandingkan jumlah yang dibebankan bank (dalam sen, dari notifikasi yang ditandatangani) dengan harga penjualan. Jika keduanya berbeda, notifikasi ditolak, penjualan tetap tertunda, dan baris `[BuyCourses] Redsys notification refused` atau `[BuyCourses] Cecabank notification refused` ditulis ke log kesalahan PHP. Pembayaran normal tidak terpengaruh.

Jika suatu penjualan tetap tertunda meskipun pembeli telah membayar, periksa log: perubahan harga setelah pesanan dibuat, atau pembayaran parsial, akan tampak di sana. Selesaikan penjualan tersebut secara manual dari laporan penjualan setelah diverifikasi.

### Token keamanan

* Formulir kupon (tambah / konfigurasikan), formulir kartu paket publik, dan tindakan pembayaran menggunakan token admin BuyCourses yang sama seperti setiap halaman admin plugin lainnya. Formulir yang dibiarkan terbuka dalam waktu lama tetap berfungsi selama sesi masih aktif; setelah keluar lalu masuk kembali, muat ulang halaman sebelum menyimpan (jika tidak, pesan "Not validated" ditampilkan).
* Halaman "minta faktur" (`request_invoice.php`) dan pemicu web `process_recurring_subscriptions.php` memerlukan token di tautan (`buycourses_admin_sec_token=...`). Tautan yang ditandai atau dikirim melalui surel tanpa token menampilkan "Not validated". Eksekusi baris perintah/cron (`php .../process_recurring_subscriptions.php` atau perintah konsol) tidak berubah dan tidak memerlukan token.
* Halaman keberhasilan (PayPal, Stripe, langganan, layanan) hanya menampilkan penjualan kepada pengguna yang membelinya.
* Tindakan pembayaran (pembayaran massal PayPal, pembatalan pembayaran) dibatasi untuk administrator platform (administrator sesi tidak lagi diterima) dan harus dikirim sebagai POST dengan token.

### Tanggal

Tanggal akhir penjualan langganan kini selalu dihitung dalam UTC, sama seperti tanggal penjualan, apa pun zona waktu server.

### Batas multi-URL

Batas pembuatan kursus dan hosting yang diterapkan ketika suatu layanan kedaluwarsa mengikuti aturan yang sama seperti bagian lain platform: pengaturan yang dikunci, atau ditandai tidak dapat diubah, pada URL utama tidak dapat ditimpa oleh URL lain.

Perubahan: [BTCPay #9286](https://github.com/chamilo/chamilo-lms/pull/9286), [layanan berulang #9288](https://github.com/chamilo/chamilo-lms/pull/9288), [rekonsiliasi Stripe #9293](https://github.com/chamilo/chamilo-lms/pull/9293), [total penjualan layanan #9220](https://github.com/chamilo/chamilo-lms/pull/9220).