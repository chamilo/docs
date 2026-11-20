# Kotak Alat AI

**Kotak Alat AI** adalah alat kursus yang menghasilkan aplikasi pendidikan interaktif dari instruksi pengajar. Chamilo mengemas setiap aplikasi yang dihasilkan sebagai **SCORM 1.2**, sehingga kemajuan peserta didik, skor, dan data kelanjutan dilacak oleh platform.

> Administrator harus mengaktifkan `ai_helpers.enable_ai_helpers` dan `ai_helpers.toolbox` di **Administrasi > Pengaturan konfigurasi > Pembantu AI**, dan setidaknya satu penyedia AI teks harus dikonfigurasi.

## Membuat Aplikasi Interaktif

1. Buka **Kotak Alat AI** di kursus.
2. Klik **Buat**.
3. Masukkan **Judul** dan, secara opsional, **Deskripsi**.
4. Di **Apa yang harus dilakukan aplikasi?**, jelaskan aktivitas lengkap yang Anda inginkan. Sertakan tujuan pembelajaran, aturan, tingkat, penilaian, dan apa yang harus terjadi ketika peserta didik selesai.
5. Pilih **penyedia AI** jika tersedia lebih dari satu.
6. Klik **Hasilkan**.

Generasi pertama disimpan sebagai **versi 1**. Generasi tersebut dimulai sebagai draf, sehingga Anda dapat mempratinjaunya sebelum membuatnya terlihat oleh peserta didik.

## Penyempurnaan dan Pembuatan Versi

Buka **Pengaturan** aplikasi untuk mengelolanya. Anda dapat:

* mempratinjau atau mengunduh aplikasi saat ini;
* menggunakan **Sempurnakan dengan AI** untuk menjelaskan perubahan dan menghasilkan versi baru;
* meninjau **Riwayat versi**;
* mempratinjau, mengunduh, atau memulihkan versi sebelumnya;
* menerbitkan atau menyembunyikan aplikasi;
* membuka **Pelaporan** untuk meninjau pelacakan peserta didik.

Menghasilkan penyempurnaan tidak menghapus versi sebelumnya. Memulihkan versi sebelumnya menjadikan versi tersebut sebagai versi saat ini kembali.

## Menambahkan aplikasi ke jalur pembelajaran

Di [pembangun Jalur Pembelajaran](../adding-content/learning-paths.md), pengajar dapat memilih aplikasi Kotak Alat AI yang dihasilkan sebagai sumber daya. Aplikasi harus memiliki versi yang dihasilkan, tetapi tidak perlu diterbitkan sebelum pengajar menambahkannya ke jalur pembelajaran. Aplikasi yang belum diterbitkan tetap tidak tersedia bagi peserta didik hingga diterbitkan.

Ketika pengajar yang berwenang membuka konten Kotak Alat dalam **mode Pratinjau**, Chamilo menampilkan **“Kemajuan dan skor tidak disimpan dalam mode pratinjau.”** Menguji aktivitas dengan cara ini tidak membuat pelacakan peserta didik atau memperbarui skor. Gunakan pengalaman peserta didik yang normal untuk memverifikasi kemajuan dan skor SCORM setelah penerbitan.

## Validasi generasi dan pemecahan masalah

Setelah generasi AI, Chamilo memeriksa sumber aplikasi yang dihasilkan sebelum membuat versi tersedia. Ini mencakup pemeriksaan sintaksis atau struktur JavaScript dan pembatasan pada API peramban yang tidak aman. Jika validasi gagal, Chamilo meminta penyedia AI untuk **memperbaiki hasil sekali**; jika versi yang diperbaiki masih gagal, generasi berhenti dengan kesalahan. Validasi yang berhasil bukan pengganti pengujian aturan pembelajaran aktivitas, aksesibilitas, dan penilaian SCORM sebelum penerbitan.

Jika generasi melaporkan **HTTP 504**, server web atau gateway berhenti menunggu permintaan. Ini berbeda dari batas waktu yang ditetapkan oleh penyedia teks AI. Kesalahan dapat mencakup perkiraan waktu yang telah berlalu; coba permintaan aktivitas yang lebih sederhana dan minta administrator memeriksa batas waktu gateway, PHP/server web, dan penyedia. Kesalahan batas waktu atau batas laju penyedia mengharuskan pemeriksaan model yang dikonfigurasi dan pengaturan penyedia. Jangan berasumsi aplikasi berhasil disimpan setelah terjadi kesalahan.

Peningkatan validasi dan diagnostik ini diperkenalkan dalam [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Pengalaman Peserta Didik

Peserta didik hanya melihat aplikasi yang telah diterbitkan. Dari Kotak Alat mereka dapat membuka aplikasi, melanjutkan dari status SCORM terbaru mereka, dan melihat **Kemajuan** serta **Skor** mereka. Ketika percobaan baru diizinkan, **Coba lagi** memulai percobaan baru.

Aplikasi Kotak Alat berjalan di dalam runtime Jalur Pembelajaran dalam iframe terbatas dan melaporkan status SCORM mereka kembali ke Chamilo. Aplikasi tersebut dikelola dari Kotak Alat, bukan dari daftar Jalur Pembelajaran biasa.

Klien MCP yang berwenang juga dapat membuat atau memperbarui aplikasi Kotak Alat ketika pengaturan Kotak Alat AI yang sama diaktifkan.