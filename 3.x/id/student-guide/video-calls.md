# Panggilan Video Satu-ke-Satu

Chamilo menyertakan **panggilan video satu-ke-satu** opsional di dalam **obrolan platform mengambang**. Fitur ini menggunakan dukungan WebRTC peramban Anda untuk menghubungkan dua orang yang sedang menggunakan Chamilo. Ini berbeda dari **alat Chat kursus** dan dari pertemuan yang dibuat dengan BigBlueButton atau Zoom.

Fitur ini diperkenalkan dan disempurnakan untuk [isu #3777](https://github.com/chamilo/chamilo-lms/issues/3777) dalam PR [#9102](https://github.com/chamilo/chamilo-lms/pull/9102), [#9110](https://github.com/chamilo/chamilo-lms/pull/9110), [#9112](https://github.com/chamilo/chamilo-lms/pull/9112), [#9127](https://github.com/chamilo/chamilo-lms/pull/9127) dan [#9128](https://github.com/chamilo/chamilo-lms/pull/9128).

## Sebelum Memulai

* Administrator harus mengizinkan penggunaan obrolan platform mengambang dan mengatur **Hide videochat option in global chat** (`chat.hide_chat_video`) ke **No**. Opsi ini disembunyikan secara default. Lihat [Pengaturan Chat](../admin-guide/platform-settings/chat-settings.md).
* Gunakan peramban yang mendukung WebRTC, dengan izin untuk mengakses kamera dan mikrofon. Akses media peramban biasanya memerlukan HTTPS (atau konteks pengembangan lokal yang tepercaya).
* Masuk ke akun Anda dan atur status obrolan ke **online**. Pilih kontak pengguna biasa; tombol video tidak muncul untuk bot atau ketika fitur dinonaktifkan.
* Pengguna lain harus tersedia untuk menerima dan menyetujui panggilan.

## Memulai Panggilan

1. Buka **panel obrolan mengambang** di bagian bawah Chamilo (bukan halaman Chat milik kursus).
2. Pilih orang yang ingin Anda hubungi.
3. Di header percakapan, klik ikon kamera **Start video call**.
4. Berikan akses kamera dan mikrofon ketika peramban meminta.
5. Panggilan menampilkan **Calling...** sementara Chamilo menunggu pengguna lain. Ketika mereka menerima, status berubah melalui **Connecting...** menjadi **Connected** setelah koneksi peer berhasil.

Panggilan yang tidak dijawab akan berakhir karena batas waktu, bukan berlanjut tanpa batas. Jika pengguna lain menolak atau membatalkan, obrolan menampilkan pesan status penjelasan.

## Menerima dan Mengelola Panggilan

Ketika seorang kontak menelepon, obrolan mengambang menampilkan dialog **Incoming video call**. Pilih **Accept** untuk bergabung atau **Reject** untuk menolak. Menerima juga dapat meminta izin untuk menggunakan kamera dan mikrofon Anda.

Selama panggilan, Anda dapat **membisukan atau mengaktifkan kembali mikrofon**, **menyalakan atau mematikan kamera**, dan **mengakhiri panggilan**. Pratinjau kecil menampilkan video lokal Anda, sementara area utama menampilkan orang lain. Menutup atau mengakhiri panggilan melepaskan aliran audio/video lokal.

Ini adalah **panggilan privat antara dua pengguna**, bukan pertemuan untuk seluruh kursus. Untuk mengadakan sesi kelompok terjadwal dengan perekaman atau alat kolaborasi, gunakan integrasi [Konferensi Video](../teacher-guide/collaboration-and-communication/video-conferencing.md) organisasi Anda.

## Jika Panggilan Video Tidak Tersedia

* **Tidak ada ikon Start video call:** Periksa pengaturan `chat.hide_chat_video` platform, apakah obrolan mengambang tersedia, status online Anda, dan dukungan WebRTC peramban.
* **Kesalahan kamera atau mikrofon:** Izinkan izin media di peramban dan periksa bahwa perangkat keras tersedia serta tidak sedang digunakan oleh aplikasi lain.
* **Tidak ada jawaban:** Minta kontak Anda membuka Chamilo dan memeriksa ketersediaan mereka. Permintaan keluar memiliki batas waktu.
* **Koneksi gagal setelah diterima:** Coba jaringan lain dan periksa izin peramban atau pembatasan firewall. Implementasi WebRTC saat ini menggunakan server STUN publik dan tidak mengonfigurasi relai TURN, sehingga konektivitas dapat gagal pada jaringan yang membatasi. Obrolan teks tetap dapat berfungsi jika pensinyalan video gagal.

Tidak perlu mengonfigurasi BigBlueButton atau Zoom untuk fitur panggilan langsung ini; integrasi tersebut menyediakan jenis pertemuan yang terpisah.