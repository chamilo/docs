# Pelatih AI Keberhasilan Peserta Didik

**Student Success AI Coach** membantu pengajar mengubah aktivitas kursus menjadi rekomendasi praktis untuk satu peserta didik. Fitur ini tersedia dari daftar peserta didik di area pelaporan kursus ketika pembantu AI dan fitur **Course analyser** diaktifkan untuk kursus tersebut.

> Platform harus memiliki setidaknya satu penyedia AI teks yang dikonfigurasi. Lihat [Konfigurasi AI](../../admin-guide/integrations/ai-configuration.md). Pengaturan platform yang relevan adalah `ai_helpers.enable_ai_helpers` dan `ai_helpers.course_analyser` di bawah **Administration > Configuration settings > AI Helpers**.

## Menghasilkan Rekomendasi

1. Buka area pelaporan kursus dan tampilkan **Learner list**.
2. Temukan peserta didik dan klik tindakan **Student Success AI Coach**.
3. Jika beberapa penyedia AI tersedia, pilih salah satu.
4. Secara opsional, masukkan **Additional instructions for the AI coach**. Ini memungkinkan Anda menambahkan konteks pengajaran atau meminta pelatih berfokus pada kesulitan tertentu.
5. Klik **Analyze user's learning**.

Chamilo terlebih dahulu menyiapkan atau menggunakan kembali analisis kursus, lalu menganalisis aktivitas peserta didik dalam konteks kursus atau sesi kursus saat ini.

## Isi Rekomendasi

Hasilnya dapat mencakup:

* ringkasan keseluruhan yang ringkas;
* **Priority actions**;
* **Additional activities** yang disarankan;
* rekomendasi tentang **Rhythm** dan tempo belajar;
* **Learning methodologies** alternatif;
* rekomendasi lain jika relevan;
* tautan **Evidence** dari katalog sumber pedagogis yang disetujui untuk bahasa kursus.

Rekomendasi disimpan di Chamilo untuk peserta didik dan konteks kursus tersebut. Chamilo juga menyimpan salinannya di Inbox milik pengajar ketika pembuatan pesan berhasil, sehingga dapat ditinjau kembali nanti.

## Privasi

Sebelum analisis dimulai, Chamilo menampilkan peringatan privasi. Pengidentifikasi profil langsung dihilangkan dari muatan peserta didik yang dikirim ke penyedia AI, dan AI diinstruksikan untuk tidak mengidentifikasi peserta didik atau menyimpulkan ciri sensitif. Namun, aktivitas belajar dan konten kursus tetap dapat berisi informasi yang secara tidak langsung dapat mengidentifikasi seseorang. Ikuti kebijakan AI dan privasi organisasi Anda sebelum menggunakan fitur ini.

Analisis Student Success yang sama juga tersedia bagi klien MCP yang berwenang melalui alat `generate_student_success_feedback`; alat ini menggunakan kembali alur analisis yang sama dengan penyaringan privasi.