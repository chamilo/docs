# Keamanan

Blok **Keamanan** pada dasbor administrasi mengelompokkan alat pemantauan keamanan dan audit bawaan platform. Blok ini terpisah dari [Pengaturan Keamanan](../platform-settings/security-settings.md), yang mengonfigurasi *kebijakan* keamanan (aturan kata sandi, CAPTCHA, header keamanan HTTP, dan sebagainya) — blok ini menyediakan *laporan dan alat* yang mengawasi platform terhadap aktivitas mencurigakan dan perubahan yang tidak diinginkan.

![Blok Keamanan pada dasbor administrasi, yang mencantumkan Audit aktivitas, Percobaan masuk, Simple IDS, Pemeriksa kekuatan kata sandi, dan Integritas berkas](/.gitbook/assets/admin-security-block.png)

Blok ini diperkenalkan di Chamilo 2.0 dengan empat alat dan diperluas di Chamilo 3.0 dengan alat kelima, **Integritas berkas**.

## Mengakses Blok Keamanan

Dari panel administrasi, blok **Keamanan** muncul bersama blok dasbor lainnya (Pengguna, Kursus, Pengelolaan platform, Sistem, dan sebagainya). Klik salah satu tautannya untuk membuka alat yang sesuai.

## Isi Blok

* **[Audit Aktivitas](activities-audit.md)** — Menelusuri peristiwa administratif dan platform yang penting (perubahan pengguna, kursus, sesi, dan lainnya) berdasarkan jenis peristiwa
* **[Percobaan Masuk](login-attempts.md)** — Meninjau percobaan masuk yang gagal dan berhasil, dengan grafik dan log yang dapat dicari
* **[Simple IDS](simple-ids.md)** — Melihat permintaan yang ditandai oleh sistem deteksi intrusi bawaan Chamilo yang ringan
* **[Pemeriksa Kekuatan Kata Sandi](password-strength-checker.md)** — Memindai pengguna aktif untuk kata sandi yang cocok dengan daftar kata sandi yang umum digunakan
* **[Integritas Berkas](file-integrity.md)** *(baru di Chamilo 3.0)* — Mendeteksi penambahan, modifikasi, penghapusan, atau perubahan izin yang tidak terduga pada berkas yang terpasang

## Siapa yang Dapat Mengaksesnya

Kelima alat memerlukan akses **Administrator Portal**. Tindakan pemindaian, jeda, dan penetapan ulang baseline pada Integritas berkas juga memerlukan akses **Administrator Global**, dan menjeda peringatan atau menetapkan baseline baru mensyaratkan Anda memasukkan ulang kata sandi Anda sendiri — lihat [Integritas Berkas](file-integrity.md#actions) untuk rinciannya.