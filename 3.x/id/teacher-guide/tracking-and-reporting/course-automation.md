# Otomatisasi Kursus (Pemicu Manual)

Bagian **Automation** pada Pelaporan Kursus memungkinkan pengajar yang berwenang mengonfigurasi tindakan untuk awal dan akhir suatu kursus. Dalam implementasi Chamilo 3.1 saat ini, tindakan tersebut **dipicu secara manual**: jangan berasumsi bahwa tindakan berjalan otomatis pada tanggal kalender atau melalui cron.

## Mengonfigurasi tindakan

1. Buka suatu kursus sebagai pengajar atau pengguna lain yang diizinkan mengelola pelaporan kursus.
2. Buka **Reporting** dan temukan bagian **Automation**.
3. Pilih peristiwa (**Course opens now** atau **Course ends now**) dan jenis tindakan.
4. Sediakan target yang diperlukan oleh tindakan tersebut, lalu pilih **Add action**.
5. Tinjau daftar **Configured actions**; hapus entri yang tidak diinginkan dengan tindakan **Delete**-nya.

Tindakan yang didukung mencakup menerbitkan atau menyembunyikan sumber daya kursus, mengirim undangan survei, menyerahkan sertifikat yang sudah ada, dan mengubah visibilitas kursus. Sumber daya, survei, opsi Gradebook, dan nilai visibilitas yang tersedia bergantung pada kursus serta izin pengguna saat ini.

## Menjalankan peristiwa yang dikonfigurasi

Pilih **Course opens now** atau **Course ends now** dan konfirmasikan operasi tersebut. Periksa hasil yang dilaporkan. Chamilo melacak eksekusi yang telah selesai, mencegah konfigurasi duplikat, dan melewati tindakan yang sudah berhasil diselesaikan pada eksekusi berikutnya. Klik kedua tidak boleh diperlakukan sebagai cara untuk mengirim ulang tindakan yang telah selesai.

Untuk penyerahan sertifikat, siapkan dan uji sertifikat yang relevan terlebih dahulu. Untuk undangan survei, verifikasi bahwa survei telah dikonfigurasi dan bahwa peserta didik yang dituju termasuk dalam konteks kursus atau sesi saat ini.

## Batasan penting

- Antarmuka ini menyediakan **eksekusi manual**, bukan otomatisasi terjadwal.
- Tindakan beroperasi dalam konteks kursus/sesi saat ini; uji akses dan target untuk kedua konteks jika berlaku.
- Tindakan yang berhasil diselesaikan tidak diulang secara otomatis pada eksekusi berikutnya.
- Pada saat PR fitur tersebut, penyerahan sertifikat, perubahan visibilitas kursus, dan eksekusi khusus sesi telah ditinjau kodenya tetapi belum diverifikasi secara fungsional dalam PR itu. Uji fitur tersebut pada instalasi Anda sebelum mengandalkannya secara operasional.

Lihat [Laporan Kursus](course-reports.md) dan [Sertifikat dan Keterampilan](certificates-and-skills.md). Implementasi: [PR #9464](https://github.com/chamilo/chamilo-lms/pull/9464).