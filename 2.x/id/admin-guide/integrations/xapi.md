# xAPI

**xAPI** (Experience API, juga dikenal sebagai Tin Can API) adalah standar untuk melacak pengalaman belajar. Chamilo dapat menghasilkan dan mengonsumsi pernyataan xAPI.

## Apa yang Dilakukan xAPI

xAPI melacak aktivitas belajar sebagai **pernyataan** dalam format: "Aktor melakukan Kata Kerja pada Objek." Sebagai contoh:

* "Jane menyelesaikan Modul 1"
* "John mendapatkan skor 85% pada Ujian Akhir"
* "Maria menonton Video Pengantar"

Pernyataan-pernyataan ini disimpan dalam **Learning Record Store (LRS)**, menyediakan catatan komprehensif tentang aktivitas belajar.

## Konfigurasi

1. Dalam pengaturan platform, konfigurasikan **titik akhir LRS**:
   * **URL LRS** — Alamat dari Learning Record Store Anda
   * **Autentikasi LRS** — Kredensial untuk mengirim data ke LRS
2. Aktifkan pelacakan xAPI untuk aktivitas yang diinginkan

## Apa yang Dilacak Chamilo melalui xAPI

Chamilo dapat menghasilkan pernyataan xAPI untuk:

* Akses dan penyelesaian kursus
* Upaya dan skor latihan
* Kemajuan item jalur pembelajaran
* Item portofolio

Alat lain (seperti Dokumen dan Forum) saat ini tidak dikeluarkan sebagai peristiwa xAPI oleh plugin.

## Kasus Penggunaan

* **Pelacakan lintas platform** — Melacak aktivitas belajar di berbagai alat dan platform dalam satu LRS
* **Analitik lanjutan** — Gunakan alat analitik LRS untuk menghasilkan wawasan yang melampaui laporan bawaan Chamilo
* **Pelaporan kepatuhan** — Hasilkan jejak audit penyelesaian pelatihan untuk kebutuhan regulasi