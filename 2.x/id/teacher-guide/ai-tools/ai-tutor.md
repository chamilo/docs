# Tutor AI

Tutor AI adalah chatbot yang terintegrasi dalam Chamilo yang dapat berinteraksi dengan peserta didik untuk menjawab pertanyaan terkait kursus. Tutor ini memberikan tanggapan instan yang sesuai dengan konteks, didukung oleh model bahasa besar.

## Cara Kerjanya

Ketika Tutor AI diaktifkan untuk sebuah kursus, peserta didik akan melihat antarmuka obrolan di mana mereka dapat:

* **Mengajukan pertanyaan** tentang konten kursus
* **Mendapatkan penjelasan** tentang konsep yang dibahas dalam kursus
* **Menerima panduan** tanpa harus menunggu respons dari pengajar

Tutor AI menggunakan konteks kursus untuk memberikan jawaban yang relevan. Tutor ini dirancang untuk melengkapi pengajaran Anda, bukan menggantikannya.

## Mengaktifkan Tutor AI

Tutor AI memerlukan dua tingkat konfigurasi:

1. **Tingkat platform** — Administrator harus mengaktifkan pembantu AI dan mengonfigurasi setidaknya satu penyedia AI (lihat [Konfigurasi AI](../../admin-guide/integrations/ai-configuration.md))
2. **Tingkat kursus** — Tutor AI harus diaktifkan di pengaturan kursus (tombol aktif/nonaktif sederhana). Penyedia yang digunakan untuk obrolan adalah yang telah dikonfigurasi oleh administrator.

## Antarmuka Obrolan

![Antarmuka obrolan Tutor AI yang menunjukkan percakapan antara peserta didik dan AI](/.gitbook/assets/ai-tutor-chat.png)

Tutor AI muncul sebagai **panel obrolan yang tertambat** di dalam kursus. Peserta didik dapat:

* Mengetik pesan dan menerima tanggapan yang dihasilkan oleh AI
* Melihat riwayat percakapan mereka
* Mengatur ulang percakapan untuk memulai dari awal

Antarmuka obrolan menampilkan pertukaran antara peserta didik dan AI dalam format pesan yang familiar.

## Perilaku Penting

* **Konteks kursus saja** — Tutor AI hanya tersedia di dalam kursus, bukan di platform umum
* **Dinonaktifkan selama ujian** — Tutor AI secara otomatis dinonaktifkan ketika peserta didik sedang mengikuti latihan, untuk mencegah kecurangan
* **Percakapan per peserta didik** — Setiap peserta didik memiliki percakapan pribadi mereka sendiri dengan Tutor AI, dan konteks prompt hanya mencakup pesan terbaru
* **Pengalihan penyedia** — Jika penyedia yang dikonfigurasi gagal, Chamilo akan beralih ke penyedia lain yang tersedia sehingga obrolan tetap berfungsi

## Sebagai Pengajar

Anda harus menyadari bahwa:

* Tutor AI mungkin tidak selalu memberikan jawaban yang sempurna — dorong peserta didik untuk memverifikasi informasi penting
* Anda dapat meninjau penggunaan Tutor AI melalui pelacakan platform
* Tutor AI adalah pelengkap untuk pengajaran Anda, bukan pengganti. Gunakan bersama forum, pengumuman, dan pesan langsung untuk mendukung peserta didik secara menyeluruh.

## Tips

* **Tetapkan ekspektasi** — Beritahu peserta didik di awal kursus bahwa Tutor AI tersedia dan jelaskan cara menggunakannya dengan tepat
* **Dorong pemikiran kritis** — Ingatkan peserta didik untuk berpikir kritis terhadap jawaban yang dihasilkan oleh AI
* **Gunakan untuk pertanyaan yang sering diajukan** — Tutor AI sangat berguna untuk menangani pertanyaan umum yang biasanya Anda jawab berulang kali