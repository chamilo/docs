# Templat

Chamilo menggunakan templat untuk sertifikat, dokumen, dan email. Anda dapat menyesuaikan templat ini agar sesuai dengan identitas merek dan kebutuhan organisasi Anda.

## Templat Sertifikat

Templat sertifikat menentukan tata letak dan isi sertifikat yang diberikan kepada peserta didik yang memenuhi ambang nilai pada gradebook.

### Menyesuaikan Templat Sertifikat

Templat sertifikat menggunakan HTML dan CSS dengan variabel placeholder:

| Variable | Replaced with |
|----------|-------------|
| Student name | The learner's full name |
| Course name | The name of the course |
| Date | The date the certificate was earned |
| Score | The learner's final score |
| Barcode | A barcode placeholder (`((certificate_barcode))`) used for verification |

### Mengunggah Templat

1. Buka pengelolaan templat sertifikat
2. Unggah atau sunting templat HTML
3. Gunakan variabel placeholder di tempat konten dinamis harus muncul
4. Simpan

## Templat Dokumen

Pengajar dapat menggunakan templat dokumen saat membuat konten di alat Documents. Templat menyediakan tata letak awal untuk jenis dokumen yang umum.

### Mengelola Templat Dokumen

1. Buka pengelolaan templat di panel administrasi
2. Tambahkan templat baru dengan mengunggah berkas HTML
3. Templat menjadi tersedia bagi pengajar saat mereka membuat dokumen baru

## Tips

* **Sertakan logo Anda** — Tambahkan logo organisasi Anda ke templat sertifikat agar tampilan lebih profesional
* **Uji dengan data nyata** — Pratinjau sertifikat dengan data peserta didik yang sebenarnya sebelum menerapkan templat
* **Jaga templat tetap sederhana** — Desain sederhana lebih baik saat dicetak dan terlihat profesional