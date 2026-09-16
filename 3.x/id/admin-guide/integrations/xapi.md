# xAPI

**xAPI** (Experience API, juga dikenal sebagai Tin Can API) adalah standar untuk melacak pengalaman belajar. Chamilo dapat menghasilkan sekaligus mengonsumsi pernyataan xAPI.

## Fungsi xAPI

xAPI melacak aktivitas pembelajaran sebagai **pernyataan** dalam format: "Aktor melakukan Verba pada Objek." Contohnya:

* "Jane menyelesaikan Modul 1"
* "John memperoleh skor 85% pada Ujian Akhir"
* "Maria menonton Video Pengantar"

Pernyataan-pernyataan ini disimpan dalam **Learning Record Store (LRS)**, yang menyediakan catatan komprehensif tentang aktivitas pembelajaran.

## Konfigurasi

1. Di pengaturan platform, konfigurasikan **endpoint LRS**:
   * **LRS URL** — Alamat Learning Record Store Anda
   * **LRS authentication** — Kredensial untuk mengirim data ke LRS
2. Aktifkan pelacakan xAPI untuk aktivitas yang diinginkan

## Apa yang Dilacak Chamilo melalui xAPI

Chamilo dapat menghasilkan pernyataan xAPI untuk:

* Akses dan penyelesaian kursus
* Percobaan latihan dan skor
* Progres item learning path
* Item portofolio

Alat lain (seperti Documents dan Forums) saat ini tidak dipancarkan sebagai peristiwa xAPI oleh plugin.

## Kasus Penggunaan

* **Pelacakan lintas platform** — Melacak aktivitas pembelajaran di berbagai alat dan platform dalam satu LRS
* **Analitik lanjutan** — Menggunakan alat analitik LRS untuk menghasilkan wawasan yang melampaui pelaporan bawaan Chamilo
* **Pelaporan kepatuhan** — Menghasilkan jejak audit penyelesaian pelatihan untuk persyaratan regulasi