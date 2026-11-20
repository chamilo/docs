# Konfigurasi AI

Chamilo 3.0 menyertakan fitur bertenaga AI yang memerlukan konfigurasi sebelum tersedia bagi pengajar dan peserta didik.

## Penyedia AI yang Didukung

Chamilo mendukung beberapa penyedia AI:

| Provider | Capabilities |
|----------|-------------|
| **DeepSeek** | Text generation |
| **Google Gemini** | Text, image, video generation |
| **Grok** | Text, image, video generation |
| **Mistral** | Text generation |
| **OpenAI** | Text, image, video generation |

Setiap penyedia dapat dikonfigurasi untuk berbagai jenis tugas AI:

* **Teks** — Digunakan untuk pembuatan latihan, pembuatan jalur pembelajaran, penilaian AI, dan tutor AI
* **Gambar** — Digunakan untuk pembuatan gambar AI
* **Video** — Digunakan untuk pembuatan video AI (jika didukung)
* **Dokumen** — Digunakan untuk analisis dokumen AI

## Langkah Konfigurasi

### 1. Dapatkan Kunci API

Daftarkan akun pada penyedia AI yang Anda pilih dan dapatkan kunci API:

* **DeepSeek**: [platform.deepseek.com](https://platform.deepseek.com/)
* **Google Gemini**: Google AI Studio atau Google Cloud
* **Grok**: [console.x.ai](https://console.x.ai/)
* **Mistral**: [console.mistral.ai](https://console.mistral.ai/)
* **OpenAI**: [platform.openai.com](https://platform.openai.com/)

### 2. Konfigurasikan Penyedia di Chamilo

![Halaman konfigurasi AI helpers yang menampilkan pengaturan penyedia dengan kolom kunci API, model, dan endpoint](/.gitbook/assets/admin-ai-helpers-config.png)

Di pengaturan platform, buka bagian **AI Helpers**:

1. **Aktifkan AI helpers** — Nyalakan fitur AI secara global
2. **Konfigurasikan penyedia AI** — Tambahkan satu atau lebih penyedia dengan:
   * **Nama penyedia** (deepseek, gemini, grok, mistral, openai)
   * **Kunci API** — Kunci API Anda untuk penyedia tersebut
   * **Model** — Model spesifik yang akan digunakan (mis., `gpt-4`, `gemini-pro`, `mistral-large`)
   * **URL API** — URL endpoint (sudah dikonfigurasi sebelumnya untuk penyedia standar)

Anda dapat mengonfigurasi beberapa penyedia. Penyedia pertama dalam konfigurasi menjadi default.

### 3. Aktifkan Fitur per Kursus

Fitur AI dapat diaktifkan atau dinonaktifkan pada tingkat kursus. Pengajar dapat mengalihkan:

* **Chatbot tutor AI** — Asisten AI untuk peserta didik
* **Penilai tugas** — Rekomendasi penilaian yang dihasilkan AI
* **Pembuat latihan** — Pertanyaan kuis yang dihasilkan AI
* **Pembuat jalur pembelajaran** — Urutan pembelajaran yang dihasilkan AI
* **Pembuat gambar/video** — Gambar dan video yang dihasilkan AI dalam dokumen

Hal ini memungkinkan kursus yang berbeda menggunakan konfigurasi AI yang berbeda sesuai kebutuhan.

## Pertimbangan Biaya

Panggilan API AI memiliki biaya. Pertimbangkan:

* **Menetapkan batas penggunaan** — Pantau dan batasi penggunaan API AI untuk mengendalikan biaya
* **Memilih model dengan bijak** — Model yang lebih kecil dan lebih murah mungkin cukup untuk banyak tugas pendidikan
* **Melacak penggunaan** — Chamilo mencatat permintaan AI untuk membantu Anda memantau konsumsi

## Tips

* **Mulai dengan satu penyedia** — Konfigurasikan dan uji satu penyedia sebelum menambahkan yang lain
* **Uji dengan sebuah kursus** — Aktifkan fitur AI di kursus uji terlebih dahulu untuk memverifikasi bahwa fitur tersebut berfungsi sesuai harapan
* **Komunikasikan dengan pengajar** — Beritahu pengajar fitur AI mana yang tersedia dan cara menggunakannya
* **Pantau kualitas** — Tinjau secara berkala konten yang dihasilkan AI untuk memastikan memenuhi standar pendidikan Anda