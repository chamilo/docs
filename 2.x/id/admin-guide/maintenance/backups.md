# Cadangan

Cadangan rutin sangat penting untuk melindungi data Chamilo Anda. Halaman ini membahas apa yang perlu dicadangkan dan bagaimana caranya.

## Apa yang Harus Dicadangkan

### 1. Basis Data

Basis data Chamilo berisi semua data platform: pengguna, kursus, pelacakan, nilai, pesan, dan pengaturan. Ini adalah komponen paling kritis untuk dicadangkan.

**Cara mencadangkan:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Berkas

Chamilo menyimpan berkas yang diunggah (dokumen, gambar, paket SCORM) di sistem berkas. Direktori utama yang perlu dicadangkan:

* `var/` — Berkas dan sumber daya yang diunggah
* `public/plugin/` — Berkas plugin (hanya jika Anda telah menambahkan plugin khusus)

Jika Anda menggunakan penyimpanan cloud (S3, Azure Blob), pastikan fitur cadangan/versi dari penyedia cloud Anda diaktifkan.

### 3. Konfigurasi

* `.env` — Konfigurasi lingkungan Anda
* `config/` — Berkas konfigurasi khusus apa pun

## Jadwal Cadangan

| Komponen | Frekuensi yang Disarankan |
|-----------|---------------------------|
| Basis Data | Harian |
| Berkas | Harian atau mingguan (tergantung pada aktivitas unggahan) |
| Konfigurasi | Setelah ada perubahan konfigurasi |

## Pemulihan

Untuk memulihkan dari cadangan:

1. Pulihkan basis data dari dump SQL
2. Pulihkan direktori berkas
3. Pulihkan berkas konfigurasi
4. Bersihkan cache Symfony: `php bin/console cache:clear`

## Tips

* **Otomatiskan cadangan** — Gunakan cron jobs untuk menjalankan cadangan secara otomatis
* **Simpan di luar lokasi** — Simpan salinan cadangan di server terpisah atau penyimpanan cloud
* **Uji pemulihan** — Secara berkala uji bahwa Anda dapat memulihkan dari cadangan dengan sukses
* **Dokumentasikan proses Anda** — Simpan instruksi tertulis untuk proses pemulihan sehingga siapa pun di tim dapat melakukannya