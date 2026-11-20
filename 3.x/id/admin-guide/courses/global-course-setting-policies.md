# Kebijakan Pengaturan Kursus Global

Administrator platform dapat menetapkan nilai bawaan terpusat untuk pengaturan kursus dan mengontrol apakah pengajar boleh menimpanya. Kebijakan berlaku pada fungsionalitas kursus yang sudah ada sambil mempertahankan konfigurasi khusus kursus yang kompatibel.

## Membuka halaman kebijakan

Pada **URL akses utama**, buka **Administration > Settings > Course settings**, atau navigasikan ke `/admin/settings/course-settings` pada instalasi Anda. Halaman administrasi ini dikhususkan bagi administrator platform yang berwenang pada URL akses utama. Jangan gunakan portal sekunder untuk menyunting kebijakan global.

## Mengonfigurasi kebijakan

1. Gunakan bidang **Search** jika Anda memerlukan kunci pengaturan kursus tertentu.
2. Untuk setiap pengaturan, periksa nama variabel yang tepat yang ditampilkan di bawah judulnya.
3. Pilih atau kosongkan **Editable in course** untuk mengontrol apakah penyunting kursus dapat mengubah pengaturan tersebut.
4. Pilih atau masukkan **Default platform value**. Beberapa pengaturan menyediakan menu tarik-turun nilai yang diizinkan; yang lain menerima teks.
5. Simpan perubahan dan verifikasi perilaku efektif pada kursus uji.

Pengaturan yang menggunakan nama variabel yang sama di kategori berbeda ditampilkan secara terpisah jika diperlukan. Jangan berasumsi bahwa dua nama yang tampak serupa mengontrol fitur kursus yang sama.

## Memverifikasi dengan dua peran

Sebagai administrator, konfirmasikan nilai bawaan yang tersimpan dan apakah nilai tersebut dapat disunting. Sebagai pengajar kursus, buka pengaturan kursus yang sesuai dan periksa bahwa nilai efektif serta pembatasan penyuntingan sesuai dengan kebijakan. Uji kursus yang sudah ada maupun kursus baru jika memungkinkan.

Mengubah nilai bawaan global dapat memengaruhi banyak kursus. Tinjau dampaknya sebelum menonaktifkan penimpaan oleh pengajar, dan catat nilai kebijakan sebelumnya agar dapat dipulihkan jika diperlukan.

Lihat [Mengelola Kursus](managing-courses.md) dan [Pengaturan Kursus](../../teacher-guide/creating-your-course/course-settings.md). Implementasi: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).