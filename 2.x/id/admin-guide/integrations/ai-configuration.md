# Konfigurasi AI

Chamilo 2.0 menyertakan fitur berbasis AI yang memerlukan konfigurasi sebelum dapat digunakan oleh pengajar dan peserta didik.

## Penyedia AI yang Didukung

Chamilo mendukung beberapa penyedia AI:

| Penyedia | Kemampuan |
|----------|-----------|
| **DeepSeek** | Pembuatan teks |
| **Google Gemini** | Pembuatan teks, gambar, video |
| **Grok** | Pembuatan teks, gambar, video |
| **Mistral** | Pembuatan teks |
| **OpenAI** | Pembuatan teks, gambar, video |

Setiap penyedia dapat dikonfigurasi untuk berbagai jenis tugas AI:

* **Teks** — Digunakan untuk pembuatan latihan, pembuatan jalur pembelajaran, penilaian AI, dan tutor AI
* **Gambar** — Digunakan untuk pembuatan gambar AI
* **Video** — Digunakan untuk pembuatan video AI (jika didukung)
* **Dokumen** — Digunakan untuk analisis dokumen AI

## Langkah-langkah Konfigurasi

### 1. Dapatkan Kunci API

Daftarkan akun dengan penyedia AI pilihan Anda dan dapatkan kunci API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio atau Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Konfigurasi Penyedia di Chamilo

![Halaman konfigurasi pembantu AI yang menunjukkan pengaturan penyedia dengan kolom kunci API, model, dan endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Di pengaturan platform, navigasikan ke bagian **AI Helpers**:

1. **Aktifkan pembantu AI** — Nyalakan fitur AI secara global
2. **Konfigurasi penyedia AI** — Tambahkan satu atau lebih penyedia dengan:
   * **Nama penyedia** (deepseek, gemini, grok, mistral, openai)
   * **Kunci API** — Kunci API Anda untuk penyedia tersebut
   * **Model** — Model spesifik yang akan digunakan (misalnya, `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL API** — URL endpoint (sudah dikonfigurasi sebelumnya untuk penyedia standar)

Anda dapat mengkonfigurasi beberapa penyedia. Penyedia pertama dalam konfigurasi akan menjadi default.

### 3. Aktifkan Fitur per Kursus

Fitur AI dapat diaktifkan atau dinonaktifkan pada tingkat kursus. Pengajar dapat mengatur:

* **Chatbot Tutor AI** — Asisten AI untuk peserta didik
* **Penilai tugas** — Rekomendasi penilaian yang dihasilkan AI
* **Pembuat latihan** — Pertanyaan kuis yang dihasilkan AI
* **Pembuat jalur pembelajaran** — Urutan pembelajaran yang dihasilkan AI
* **Pembuat gambar/video** — Gambar dan video yang dihasilkan AI dalam dokumen

Hal ini memungkinkan kursus yang berbeda menggunakan konfigurasi AI yang berbeda sesuai kebutuhan mereka.

## Pertimbangan Biaya

Panggilan API AI memiliki biaya yang terkait dengannya. Pertimbangkan:

* **Menetapkan batas penggunaan** — Pantau dan batasi penggunaan API AI untuk mengontrol biaya
* **Memilih model dengan bijak** — Model yang lebih kecil dan lebih murah mungkin sudah cukup untuk banyak tugas pendidikan
* **Melacak penggunaan** — Chamilo mencatat permintaan AI untuk membantu Anda memantau konsumsi

## Tips

* **Mulai dengan satu penyedia** — Konfigurasi dan uji satu penyedia sebelum menambahkan yang lain
* **Uji dengan kursus** — Aktifkan fitur AI di kursus uji coba terlebih dahulu untuk memastikan semuanya berfungsi sesuai harapan
* **Komunikasikan dengan pengajar** — Beritahu pengajar fitur AI mana yang tersedia dan cara menggunakannya
* **Pantau kualitas** — Tinjau secara berkala konten yang dihasilkan AI untuk memastikan memenuhi standar pendidikan Anda