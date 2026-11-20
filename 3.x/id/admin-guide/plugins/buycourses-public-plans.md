# Paket Publik dan Promosi BuyCourses

Plugin **BuyCourses** dapat menampilkan paket gratis publik bersama kartu promosi yang mengarah ke penawaran eksternal. Ini terpisah dari alur pembelian kursus/sesi berbayar plugin dan konfigurasi pembayaran layanan berulang.

## Mengonfigurasi paket publik

1. Buka area administrasi BuyCourses dan editor kartu paket publiknya.
2. Pada paket **Gratis**, pilih apakah **Tampilkan gratis** diaktifkan.
3. Masukkan judul, deskripsi, dan daftar fitur terjemahan paket gratis menggunakan tab bahasa.
4. Tambahkan kartu promosi sesuai kebutuhan. Konfigurasikan status aktif, posisi, URL target, URL gambar opsional, serta judul, deskripsi, fitur, dan teks tombol terjemahan setiap kartu.
5. Simpan, lalu gunakan tautan pratinjau/katalog yang tersedia untuk memeriksa tampilan publik dalam setiap bahasa yang dikonfigurasi.

Editor menyimpan konten terjemahan untuk beberapa bahasa. Kartu promosi adalah **tautan ke penawaran eksternal**, bukan bukti pembayaran yang telah selesai atau langganan otomatis di Chamilo.

## Batas pembuatan kursus

Paket gratis menggunakan batas pembuatan kursus standar platform. BuyCourses membedakan kuota kursus standar dari kuota kursus berbayar. Jika batas terbatas dikonfigurasi, antarmuka pembuatan kursus dapat menampilkan penggunaan dan progres; paket tak terbatas tidak memerlukan indikator persentase.

Uji batas tersebut dengan akun yang hanya memiliki kuota standar dan dengan akun yang memiliki kuota berbayar yang berlaku. Kartu promosi publik tidak boleh melewati izin pembuatan kursus di sisi server.

## Perilaku pembayaran

Kartu paket publik tidak menggantikan BTCPay, Stripe, PayPal, atau alur pembelian kursus dan layanan berulang yang telah ditetapkan plugin. Terus kelola dan uji gateway pembayaran dalam konfigurasi BuyCourses yang ada.

Lihat [BuyCourses: Pembayaran dan Layanan Berulang](buycourses.md). Implementasi: [PR #9369](https://github.com/chamilo/chamilo-lms/pull/9369).