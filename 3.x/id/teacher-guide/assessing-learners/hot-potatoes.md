# Aktivitas Hot Potatoes

Chamilo 3.1 mendukung pengimporan aktivitas HTML Hot Potatoes ke alat Latihan modern dan penggunaan aktivitas individual di dalam Jalur Pembelajaran.

## Mengimpor aktivitas

1. Buka alat **Latihan** kursus dan masuk ke **Hot Potatoes**.
2. Di **Impor Hot Potatoes**, pilih paket **ZIP** Hot Potatoes atau ekspor **HTML** mandiri.
3. Jika suatu aktivitas bergantung pada gambar, media, atau berkas lain yang tertaut, sertakan aset tersebut dalam ZIP.
4. Pilih **Impor** dan verifikasi bahwa aktivitas yang diimpor terbuka serta ditampilkan dengan benar.

## Mengelola dan menggunakan kembali aktivitas

Dari daftar Hot Potatoes, gunakan **Buka** untuk meninjau aktivitas, **Sunting** untuk mengubah judulnya, **Terbitkan** atau **Sembunyikan** untuk mengontrol visibilitas, dan **Hapus** untuk menghapusnya jika diizinkan. Pembangun Jalur Pembelajaran dapat menyertakan aktivitas Hot Potatoes individual di antara sumber dayanya.

## Meninjau percobaan peserta didik

Tindakan **Percobaan** menampilkan percobaan yang terlacak untuk ditinjau pengajar. Pengajar dapat menetapkan skor persentase hasil tinjauan dari 0 hingga 100. Layar saat ini menampilkan hingga 100 percobaan terbaru. Gunakan hasil aktual yang ditampilkan oleh aktivitas sebagai bukti pendukung saat menilai peserta didik.

**Penilaian otomatis dan sinkronisasi Buku Nilai belum diimplementasikan.** Skor yang ditampilkan oleh paket Hot Potatoes itu sendiri tidak boleh diperlakukan sebagai nilai terverifikasi di sisi server. Hasil tinjauan pengajar disimpan secara terpisah.

## Pemecahan masalah

Jika media tidak ada, ekspor ulang aktivitas dengan semua aset tertaut dalam ZIP-nya. Jika ekspor HTML berfungsi di komputer lokal tetapi tidak di Chamilo, periksa rujukan berkas eksternal atau konten tertanam yang tidak kompatibel. Uji visibilitas aktivitas dengan akun peserta didik maupun akun pengajar.

Lihat [Latihan](exercises.md) dan [Jalur Pembelajaran](../adding-content/learning-paths.md). Implementasi: [PR #9380](https://github.com/chamilo/chamilo-lms/pull/9380).