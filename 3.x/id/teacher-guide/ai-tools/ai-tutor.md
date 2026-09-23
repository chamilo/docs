# AI Tutor

AI Tutor adalah chatbot yang terintegrasi ke dalam Chamilo yang dapat digunakan peserta didik untuk berinteraksi guna mendapatkan respons instan yang dihasilkan AI. Fitur ini bekerja dalam dua konteks, dengan fokus yang berbeda pada masing-masing:

* **Di dalam kursus** — AI Tutor berfokus pada kursus tersebut: menjawab pertanyaan tentang kontennya, menjelaskan konsep yang dibahas, dan membimbing peserta didik melalui materi.
* **Di luar kursus** (pada platform umum) — AI Tutor sebaliknya menangani pertanyaan penggunaan platform yang bersifat umum, seperti cara menemukan sesuatu atau menggunakan suatu fitur, bukan konten kursus.

## Cara Kerjanya

Ketika AI Tutor diaktifkan untuk suatu kursus, peserta didik melihat antarmuka obrolan di mana mereka dapat:

* **Mengajukan pertanyaan** tentang konten kursus
* **Mendapatkan penjelasan** tentang konsep yang dibahas dalam kursus
* **Menerima bimbingan** tanpa menunggu guru merespons

Di dalam kursus, AI Tutor menggunakan konteks kursus tersebut untuk memberikan jawaban yang relevan. Fitur ini dirancang untuk melengkapi pengajaran Anda, bukan menggantikannya.

## Mengaktifkan AI Tutor

AI Tutor memerlukan dua tingkat konfigurasi:

1. **Tingkat platform** — Administrator harus mengaktifkan AI helpers dan mengonfigurasi setidaknya satu penyedia AI (lihat [Konfigurasi AI](../../admin-guide/integrations/ai-configuration.md))
2. **Tingkat kursus** — AI Tutor harus diaktifkan di pengaturan kursus (sakelar nyala/mati sederhana). Penyedia yang digunakan untuk obrolan adalah yang dikonfigurasi oleh administrator.

## Antarmuka Obrolan

![Antarmuka obrolan AI Tutor yang menampilkan percakapan antara peserta didik dan AI](../../.gitbook/assets/ai-tutor-chat.png)

AI Tutor muncul sebagai **panel obrolan yang tertambat** di dalam kursus. Peserta didik dapat:

* Mengetik pesan dan menerima respons yang dihasilkan AI
* Melihat riwayat percakapan mereka
* Mengatur ulang percakapan untuk memulai dari awal

Antarmuka obrolan menampilkan pertukaran antara peserta didik dan AI dalam format perpesanan yang familiar.

## Perilaku Penting

* **Dibatasi pada tempat dibukanya** — Di dalam kursus, AI Tutor hanya menjawab tentang kursus tersebut; dibuka dari luar kursus mana pun, ia beralih ke pertanyaan penggunaan platform secara umum. Mode seluruh platform (di luar kursus) adalah sakelar terpisah yang dikendalikan administrator Anda secara independen dari sakelar per kursus.
* **Dinonaktifkan selama ujian** — AI Tutor secara otomatis dinonaktifkan ketika peserta didik sedang mengerjakan latihan, untuk mencegah kecurangan
* **Percakapan per peserta didik** — Setiap peserta didik memiliki percakapan pribadinya sendiri dengan AI Tutor, dan konteks prompt hanya mencakup pesan-pesan terbaru
* **Failover penyedia** — Jika penyedia yang dikonfigurasi gagal, Chamilo beralih ke penyedia lain yang tersedia agar obrolan tetap berfungsi

## Sebagai Guru

Anda perlu menyadari bahwa:

* AI Tutor mungkin tidak selalu memberikan jawaban yang sempurna — dorong peserta didik untuk memverifikasi informasi penting
* Anda dapat meninjau penggunaan AI Tutor melalui pelacakan platform
* AI Tutor adalah pelengkap pengajaran Anda, bukan pengganti. Gunakan bersama forum, pengumuman, dan pesan langsung untuk dukungan peserta didik yang komprehensif.

## Tips

* **Tetapkan ekspektasi** — Beritahu peserta didik di awal kursus bahwa AI Tutor tersedia dan jelaskan cara menggunakannya secara tepat
* **Dorong berpikir kritis** — Ingatkan peserta didik untuk berpikir kritis terhadap jawaban yang dihasilkan AI
* **Gunakan untuk pertanyaan yang sering diajukan** — AI Tutor sangat berguna untuk menangani pertanyaan umum yang jika tidak akan Anda jawab berulang kali