# Templat Survei

Administrator dapat menyusun kuesioner survei yang dapat digunakan kembali dan menawarkannya kepada pengajar, atau menugaskannya secara langsung ke kursus dan sesi. Fitur ini diimplementasikan dalam [PR #9208](https://github.com/chamilo/chamilo-lms/pull/9208) untuk [isu #8760](https://github.com/chamilo/chamilo-lms/issues/8760).

## Membuat dan memelihara templat

1. Di panel administrasi, buka **Templat survei** lalu pilih **Buat**.
2. Masukkan judul dan subjudul opsional; atur anonimitas, tata letak pertanyaan, pengacakan, durasi, teks pengantar, dan teks ucapan terima kasih.
3. Simpan, lalu tambahkan atau sunting pertanyaan yang dapat digunakan kembali di editor pertanyaan templat.
4. Aktifkan **Terlihat sebagai templat** jika pengajar harus dapat melihat dan menggunakannya kembali. Templat yang tidak terlihat tetap tersedia bagi administrator.

Templat terikat pada URL akses saat ini. Hanya administrator platform yang dapat membuat, menyunting, atau menghapus templat induk. Pengajar dapat menggunakan templat yang terlihat, tetapi tidak dapat mengubah definisi induknya.

## Menggunakan kembali templat di kursus atau sesi

Di kursus atau sesi yang diizinkan, pengajar dapat memilih templat yang terlihat saat membuat survei baru. Hasilnya adalah survei dalam konteks kursus tersebut, bukan perubahan pada templat induk yang dapat digunakan kembali. Pengajar dapat meninjau pertanyaan dan mengikuti alur kerja penerbitan serta undangan yang biasa.

Dari daftar templat administrasi, administrator juga dapat menugaskan templat secara langsung ke **kursus** yang dipilih dan, secara opsional, ke salah satu **sesi** kursus tersebut. Chamilo memeriksa bahwa kursus tersebut termasuk dalam portal saat ini dan bahwa sesi yang dipilih benar-benar memuat kursus tersebut. Antarmuka pengajar tidak dapat digunakan untuk menugaskan templat ke kursus atau sesi milik orang lain.

Survei baru tidak otomatis diterbitkan hanya karena dibuat dari templat; tinjau terlebih dahulu sebelum mengundang peserta. Lihat [Survei](../teacher-guide/assessing-learners/surveys.md) untuk alur kerja survei standar.

## Menyembunyikan hasil sensitif dari pengajar atau tutor

Saat menyunting survei yang sebenarnya, administrator platform dapat mengaktifkan **Hasil disembunyikan dari pengajar/tutor**. Pembatasan per survei ini ditujukan untuk kuesioner sensitif, seperti evaluasi terhadap staf pengajar. Pengajar dan tutor tetap dapat memeriksa jumlah respons dan mengirim pengingat, tetapi **tidak dapat membuka tampilan pelaporan atau mengekspor hasil**. Administrator platform tetap memiliki akses pelaporan, sesuai pengaturan platform lainnya.

Opsi ini berbeda dari bidang **Visibilitas hasil** yang biasa dan dari pengaturan platform **Sembunyikan tombol pelaporan survei**. Hanya administrator yang dapat mengubah tanda hasil terbatas.

## Izin dan cakupan

* **Administrator:** mengelola templat, mengatur visibilitas templat, menugaskan ke kursus/sesi yang memenuhi syarat, dan mengendalikan akses hasil terbatas.
* **Pengajar / pengajar sesi:** melihat dan membuat instans hanya dari templat yang terlihat dalam konteks kursus yang diizinkan bagi mereka.
* **URL akses:** katalog templat dan penugasan menerapkan URL akses saat ini; templat dari portal lain tidak dapat dibuat instansnya melintasi batas tersebut.

Jika templat tidak muncul bagi pengajar, periksa **Terlihat sebagai templat** serta konteks kursus/sesi mereka. Jika templat tidak dapat dibuat instansnya, periksa pembatasan pembuatan survei global dan kursus/sesi target yang dimaksud.