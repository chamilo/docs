# Tempat Sampah untuk Latihan dan Jalur Pembelajaran

Chamilo 3.1 dapat mengarsipkan percobaan latihan yang dihapus dan data pelacakan jalur pembelajaran sehingga pengajar yang berwenang dapat memulihkannya, sesuai dengan retensi dan kontrol akses yang dikonfigurasi. Tempat sampah melindungi data pelacakan; tempat sampah bukan pengganti cadangan basis data.

## Memulihkan percobaan latihan

1. Buka halaman **Pelaporan** latihan yang terdampak dengan kursus atau sesi yang benar dipilih.
2. Pilih **Tempat sampah** untuk menampilkan percobaan yang diarsipkan.
3. Identifikasi peserta didik dan percobaan yang perlu dipulihkan.
4. Pilih **Pulihkan**, konfirmasi, lalu segarkan laporan untuk memverifikasi jawaban dan skor.

Anda harus memiliki izin untuk mengelola hasil latihan. Pemulihan dapat diblokir ketika latihan dikunci oleh Gradebook atau platform membatasi akses pengajar ke hasil.

## Memulihkan kemajuan jalur pembelajaran

1. Buka layar pelaporan jalur pembelajaran yang relevan untuk kursus/sesi yang dimaksud.
2. Buka **Tempat sampah**-nya.
3. Pilih kemajuan peserta didik yang diarsipkan dan **Pulihkan**.
4. Periksa kemajuan pelajaran yang dipulihkan dan percobaan latihan terkait.

Jika percobaan latihan merupakan bagian dari arsip jalur pembelajaran yang tertunda, pulihkan arsip jalur pembelajaran terlebih dahulu. Pemulihan individual sengaja diblokir untuk mencegah kemajuan yang tidak konsisten.

## Retensi dan pembersihan (administrator)

Pengaturan `tracking.recycle_bin_retention_hours` mengontrol berapa lama arsip tetap memenuhi syarat untuk pemulihan. Nilai awal bawaan adalah **30 hari** (720 jam). Instalasi yang sudah ada harus menyinkronkan pengaturan baru melalui migrasi settings-upsert proyek sebelum mengharapkan antarmuka administrasi menampilkannya.

Pratinjau pembersihan tanpa menghapus apa pun:

```bash
php bin/console chamilo:recycle-bin:purge
```

Penghapusan permanen memerlukan opsi eksplisit:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Perintah ini mendukung `--hours` (penggantian retensi), `--scan-limit`, `--after-lp-id`, dan `--after-exercise-id` untuk pemrosesan yang terkendali. Jadwalkan hanya setelah memverifikasi kebijakan retensi dan pengaturan cadangan. **Tidak ada jadwal pembersihan otomatis implisit** hanya karena fitur ini diaktifkan.

Lihat [Latihan](exercises.md) dan [Jalur Pembelajaran](../adding-content/learning-paths.md). Implementasi: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).