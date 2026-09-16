# Cadangan (Backup)

Cadangan berkala sangat penting untuk melindungi data Chamilo Anda. Halaman ini membahas apa yang harus dicadangkan dan caranya.

## Apa yang Harus Dicadangkan

### 1. Database

Database Chamilo berisi semua data platform: pengguna, kursus, pelacakan, nilai, pesan, dan pengaturan. Ini adalah komponen paling kritis untuk dicadangkan.

**Cara mencadangkan:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Berkas

Chamilo menyimpan berkas yang diunggah (dokumen, gambar, paket SCORM) di sistem berkas. Direktori utama yang harus dicadangkan:

* `var/` — Berkas dan sumber daya yang diunggah
* `public/plugin/` — Berkas plugin (hanya jika Anda menambahkan plugin kustom)

Jika Anda menggunakan penyimpanan cloud (S3, Azure Blob), pastikan cadangan/versioning dari penyedia cloud Anda diaktifkan.

### 3. Konfigurasi

* `.env` — Konfigurasi lingkungan Anda
* `config/` — Berkas konfigurasi kustom apa pun

## Jadwal Cadangan

| Komponen | Frekuensi yang disarankan |
|-----------|---------------------|
| Database | Harian |
| Berkas | Harian atau mingguan (tergantung aktivitas unggahan) |
| Konfigurasi | Setelah setiap perubahan konfigurasi |

## Pemulihan

Untuk memulihkan dari cadangan:

1. Pulihkan database dari dump SQL
2. Pulihkan direktori berkas
3. Pulihkan berkas konfigurasi
4. Bersihkan cache Symfony: `php bin/console cache:clear`

## Tips

* **Otomatiskan cadangan** — Gunakan cron job untuk menjalankan cadangan secara otomatis
* **Simpan di luar lokasi** — Simpan salinan cadangan di server terpisah atau penyimpanan cloud
* **Uji pemulihan** — Secara berkala uji bahwa Anda dapat memulihkan dari cadangan dengan berhasil
* **Dokumentasikan proses Anda** — Simpan instruksi tertulis untuk proses pemulihan agar siapa pun di tim dapat melakukannya