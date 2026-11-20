# Verifikasi Sertifikat Bertanda Tangan

Chamilo dapat menerbitkan **kredensial yang ditandatangani secara digital** untuk sertifikat buku nilai dan, secara opsional, menambatkan sidik jari kredensial pada **jaringan uji Sepolia Ethereum**. Tanda tangan dan halaman verifikasi berbeda dari sertifikat PDF biasa.

## Mengaktifkan kredensial bertanda tangan

Di bawah **Administrasi > Pengaturan konfigurasi > Sertifikat**, aktifkan `certificate.blockchain_verification_enabled` jika institusi Anda bermaksud menggunakan fitur ini. Fitur ini dinonaktifkan secara bawaan. Portal harus menggunakan HTTPS untuk menerbitkan kredensial.

## Persetujuan peserta didik didahulukan

Pemilik sertifikat membuka **Sertifikat Saya** dan secara eksplisit memilih **Setujui publikasi**. Persetujuan mencakup kredensial yang dapat diverifikasi secara publik yang menampilkan nama pemegang, kursus, skor, dan tanggal penerbitan, serta secara opsional sidik jari SHA-256 di Sepolia. Persetujuan tidak bersifat otomatis. Peserta didik kemudian dapat memilih **Tarik persetujuan**; penarikan memengaruhi validitas yang ditampilkan oleh halaman verifikasi, tetapi **tidak dapat menghapus sidik jari blockchain yang sudah dikonfirmasi**.

## Terbitkan, verifikasi, dan cabut

Administrator platform yang terautentikasi secara langsung dapat menggunakan daftar **Sertifikat** buku nilai untuk menerbitkan kredensial bertanda tangan setelah pemiliknya memberikan persetujuan. Tautan verifikasi yang dihasilkan menggunakan `/certificates/verify/{token}`; respons verifikasi `.json` juga tersedia. Halaman tersebut memeriksa tanda tangan kriptografis, persetujuan, pencabutan, kedaluwarsa, dan apakah informasi sertifikat yang mendasarinya masih sesuai dengan sumber yang ditandatangani.

Jika suatu kredensial dicabut, persetujuan ditarik, sertifikat berubah, atau tanda tangan tidak valid, pemverifikasi menunjukkan status tersebut alih-alih melaporkan kredensial yang valid.

## Penambatan Sepolia opsional

Administrator dapat memilih **Tambatkan di testnet Sepolia** menggunakan dompet peramban yang didukung, atau **Konfirmasi transaksi Sepolia yang ada** untuk merekonsiliasi transaksi yang tertunda. Dompet harus terhubung ke Sepolia (ID rantai `11155111`). Aplikasi mengonfirmasi transaksi menggunakan **titik akhir RPC Sepolia HTTPS** yang dikonfigurasi di server (`CHAMILO_CERTIFICATE_SEPOLIA_RPC_URL`). URL RPC yang disediakan oleh permintaan tidak diterima.

Hanya sidik jari kredensial yang ditambatkan; data pribadi tidak dikirimkan sebagai data transaksi. Sepolia adalah **testnet**. Catatan dan ketersediaannya tidak boleh disajikan sebagai jaminan blockchain publik setara produksi. Simpan kunci institusi dan konfigurasi RPC secara aman, serta rencanakan prosedur pemulihan kunci dan pencabutan kredensial.

Implementasi: [Verifikasi kredensial sertifikat #9298](https://github.com/chamilo/chamilo-lms/pull/9298).