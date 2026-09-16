# Pemeriksaan Versi

Pemeriksaan Versi memberi tahu Anda apakah instalasi Chamilo Anda sudah mutakhir, dan — jika Anda memilih untuk ikut serta — mendaftarkan platform Anda ke proyek Chamilo agar dapat dihitung dalam statistik penggunaan agregat.

## Dua Tingkat Pemeriksaan

**Tidak terdaftar (keadaan default):** Chamilo tetap mencoba menghubungi `version.chamilo.org` untuk membandingkan versi terinstal Anda dengan rilis terbaru, hanya menggunakan permintaan itu sendiri — tidak ada rincian platform yang dikirim. Blok menampilkan formulir pendaftaran yang menjelaskan apa yang ditambahkan oleh pendaftaran, plus tombol **"Enable version check"** dan kotak centang **"Hide campus from public platforms list"**.

**Terdaftar:** Mengklik "Enable version check" hanya mengubah dua pengaturan lokal — dengan sendirinya, itu tidak mengirim apa pun. Sejak saat itu, setiap kali blok dasbor ini dimuat, platform Anda mengirim permintaan ke `version.chamilo.org` yang mencakup:

| Data yang dikirim | Tujuan yang dinyatakan |
|-----------|-----------------|
| URL dan nama situs platform Anda | Mengidentifikasi portal mana yang melakukan pemeriksaan |
| E-mail kontak admin | Secara eksplisit agar tim Chamilo dapat menghubungi admin mengenai isu keamanan kritis |
| Versi terinstal | Untuk menentukan apakah Anda sudah mutakhir |
| Jumlah kursus, pengguna, pengguna aktif, dan sesi | Digabung menjadi statistik agregat non-pribadi di `stats.chamilo.org` |
| Nama organisasi dan bahasa antarmuka | Hanya agregasi demografis |
| Nama admin | Dikirim, meskipun tujuannya tidak didokumentasikan dengan jelas dalam kode itu sendiri |
| Alamat IP server Anda | Digunakan untuk memperkirakan lokasi platform Anda bagi peta global instalasi |
| Bendera "Do not list campus", packager, dan ID instans unik | Mengontrol apakah Anda muncul di direktori publik, dan mengidentifikasi pemeriksaan berulang dari instalasi yang sama |

Jika Anda membiarkan **"Hide campus from public platforms list"** tidak dicentang, platform Anda juga muncul dalam daftar komunitas publik di `version.chamilo.org/community.php`.

## Mengakses Pemeriksaan Versi

Blok ini muncul langsung di dasbor administrasi — tidak ada halaman terpisah yang perlu dikunjungi.

## Haruskah Anda Mengaktifkannya?

Ini adalah keikutsertaan eksplisit, dan pertukarannya sederhana: sebagai imbalan berbagi rincian di atas, Anda mendapat pemberitahuan otomatis saat versi baru (termasuk patch keamanan) tersedia, dan Anda berkontribusi pada statistik adopsi publik Chamilo. Jika Anda lebih suka tidak membagikan rincian platform apa pun, cukup jangan klik "Enable version check" — pemeriksaan mutakhir dasar tetap berjalan tanpa pendaftaran. Jika Anda ingin pemberitahuan pembaruan tetapi tidak daftar publik, daftarkan dan centang "Hide campus from public platforms list."