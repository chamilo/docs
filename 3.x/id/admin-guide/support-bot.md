# Bot Dukungan (Asisten Pohon Keputusan)

**Bot Dukungan** adalah asisten bantuan yang dapat dikonfigurasi dan dibangun dari pohon keputusan yang tetap. Fitur ini diimplementasikan dalam [PR #9224](https://github.com/chamilo/chamilo-lms/pull/9224) untuk [isu #8754](https://github.com/chamilo/chamilo-lms/issues/8754). Ini **bukan chatbot AI generatif**: administrator menulis pertanyaan dan jawaban yang dapat dipilih untuk memandu pengguna menuju penjelasan, halaman, atau tiket dukungan.

## Mengaktifkannya

1. Di **Administrasi > Pengaturan konfigurasi > Tiket**, aktifkan `ticket.ticket_support_bot_enabled` (dinonaktifkan secara default).
2. Buka **Administrasi > Bot dukungan** dan buat pohon keputusan **draf**. Berikan judul dan setidaknya satu simpul masuk dengan opsi.
3. Tentukan pertanyaan atau informasi pada setiap simpul dan tautkan opsi ke tindakan berikutnya.
4. Terbitkan pohon yang valid. Hanya pohon yang diterbitkan dengan simpul masuk yang valid dan opsi yang dapat dipilih yang tersedia bagi pengguna.

Mesin memilih pohon yang diterbitkan untuk URL akses saat ini; ketersediaannya oleh karena itu berskala portal. Administrator harus memiliki `ROLE_ADMIN` untuk mengelola pohon.

## Merancang alur dukungan

Setiap opsi dapat melakukan salah satu dari empat tindakan:

| Tindakan | Hasil |
| --- | --- |
| **Buka simpul lain** | Lanjutkan percakapan pada pertanyaan lain dalam pohon yang sama |
| **Buka tautan** | Tautkan ke halaman Chamilo menggunakan jalur relatif situs yang sama, misalnya `/tickets` |
| **Akhiri percakapan** | Tandai isu sebagai terselesaikan dan secara opsional tampilkan pesan penutup |
| **Buat tiket dukungan** | Eskalasikan percakapan ke sistem Tiket |

Untuk eskalasi tiket, pilih **Proyek tiket default** dan kategori yang termasuk dalam proyek tersebut. Kategori yang memerlukan kursus tidak dapat digunakan untuk eskalasi bot dukungan ini. Tiket yang dibuat berisi transkrip pohon keputusan pengguna, sehingga staf dukungan dapat melihat pilihan yang mengarah ke eskalasi.

Editor memvalidasi struktur pohon sebelum penerbitan. Versi **Diterbitkan** dan **Diarsipkan** bersifat hanya-baca; gunakan **Duplikat** untuk membuat draf baru yang dapat diedit. Menerbitkan pengganti akan mengarsipkan versi yang sebelumnya diterbitkan dalam cakupan yang sama. Dari daftar, administrator juga dapat mengimpor atau mengekspor pohon dan meninjau riwayat percakapannya. Pohon yang diterbitkan harus diarsipkan sebelum dihapus, dan pohon yang memiliki riwayat percakapan tidak dapat dihapus.

## Mengimpor Contoh dan Meninjau Percakapan

Buka **Administrasi > Bot dukungan** dan pilih **Impor**. Dialog impor menawarkan **Unduh contoh JSON** dan **Unduh contoh CSV**. Unduh sampel, ganti pertanyaan dan opsinya dengan milik Anda, lalu pilih berkas `.json` atau `.csv` yang telah diedit dan impor. Setiap pohon yang diimpor dimulai sebagai **draf baru**; tinjau dan terbitkan secara eksplisit saat siap.

Contoh tidak memerlukan proyek tiket yang sudah ada. Jika alur kerja Anda harus membuat tiket, konfigurasikan proyek yang diperlukan dan kategori yang memenuhi syarat setelah mengimpor.

Dalam daftar pohon, gunakan **Lihat percakapan** untuk memeriksa log percakapan untuk pohon tertentu, termasuk pohon yang jumlah percakapannya nol. Riwayat percakapan tetap tercakup pada pengguna dan portal yang relevan. Lihat [PR #9419](https://github.com/chamilo/chamilo-lms/pull/9419).

## Cara pengguna mengaksesnya

Ketika pengaturan aktif dan portal memiliki pohon yang diterbitkan dan valid, pengguna yang masuk melihat kontak **Bot dukungan** di obrolan yang ditambatkan. Mereka menjawab dengan memilih opsi yang ditawarkan. Bot dapat menyelesaikan percakapan, membuka halaman situs yang sama, atau membuat tiket dan menampilkan tautannya. Pengguna dapat memulai percakapan baru setelah percakapan sebelumnya berakhir.

Ini terpisah dari **Tutor AI**, yang merespons pertanyaan pembelajaran terbuka. Bot dukungan hanya mengikuti rute dan opsi yang dikonfigurasi oleh administrator.

## Pemecahan masalah dan keamanan

* **Tidak ada bot di obrolan:** verifikasi pengaturan Tiket, bahwa pohon diterbitkan untuk portal saat ini, dan bahwa simpul masuknya memiliki opsi.
* **Tidak dapat menerbitkan:** tinjau simpul yang hilang, simpul tujuan yang belum terselesaikan, dan tindakan yang tidak valid dalam draf.
* **Tiket tidak dapat dibuat:** periksa proyek tiket dan kategori yang dipilih. Jangan gunakan kategori tiket yang memerlukan kursus.
* **Percakapan lama hilang:** administrator dapat meninjau riwayat percakapan dari pohon yang sesuai; percakapan terikat pada pengguna dan URL akses.

Untuk pengaturan terkait, lihat [Pengaturan Tiket](platform-settings/ticket-settings.md).