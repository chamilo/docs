# Templat

Chamilo menggunakan templat untuk sertifikat, dokumen, dan email. Anda dapat menyesuaikan templat ini agar sesuai dengan merek dan kebutuhan organisasi Anda.

## Templat Sertifikat

Templat sertifikat menentukan tata letak dan isi sertifikat yang diberikan kepada peserta didik yang memenuhi ambang batas buku nilai.

### Menyesuaikan Templat Sertifikat

Templat sertifikat menggunakan HTML dan CSS dengan variabel pengganti:

| Variabel | Diganti dengan |
|----------|-------------|
| Nama siswa | Nama lengkap peserta didik |
| Nama kursus | Nama kursus |
| Tanggal | Tanggal sertifikat diperoleh |
| Skor | Skor akhir peserta didik |
| Barcode | Placeholder barcode (`((certificate_barcode))`) yang digunakan untuk verifikasi |

### Mengunggah Templat

1. Navigasikan ke manajemen templat sertifikat
2. Unggah atau edit templat HTML
3. Gunakan variabel pengganti di tempat konten dinamis harus muncul
4. Simpan

## Templat Dokumen

Guru dapat menggunakan templat dokumen saat membuat konten di alat Dokumen. Templat menyediakan tata letak awal untuk jenis dokumen umum.

### Mengelola Templat Dokumen

1. Navigasikan ke manajemen templat di panel administrasi
2. Tambahkan templat baru dengan mengunggah file HTML
3. Templat akan tersedia bagi guru saat mereka membuat dokumen baru

## Tips

* **Sertakan logo Anda** — Tambahkan logo organisasi Anda ke templat sertifikat untuk tampilan yang profesional
* **Uji dengan data nyata** — Pratinjau sertifikat dengan data peserta didik yang sebenarnya sebelum menerapkan templat
* **Buat templat sederhana** — Desain yang sederhana lebih mudah dicetak dan terlihat profesional