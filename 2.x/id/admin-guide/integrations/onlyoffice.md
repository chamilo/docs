# OnlyOffice

Integrasi **OnlyOffice** memungkinkan pengguna untuk mengedit dokumen (Word, Excel, PowerPoint) langsung di browser dalam Chamilo, tanpa perlu mengunduhnya.

## Apa yang Disediakan oleh OnlyOffice

* **Pengeditan dokumen** — Edit file .docx, .xlsx, .pptx di browser
* **Kompatibilitas format** — Kompatibilitas penuh dengan format Microsoft Office
* **Tidak perlu perangkat lunak desktop** — Semuanya berjalan di browser

> Pengeditan kolaboratif secara real-time bergantung pada OnlyOffice Document Server itu sendiri; plugin Chamilo membuka dan menyimpan dokumen melalui server tetapi tidak menambahkan atau membatasi kemampuan tersebut.

## Konfigurasi

1. Instal **OnlyOffice Document Server** di server Anda (atau gunakan layanan cloud OnlyOffice)
2. Di pengaturan platform Chamilo, konfigurasi:
   * **URL OnlyOffice Document Server** — Alamat server OnlyOffice Anda
   * **Kunci rahasia** — Untuk komunikasi aman antara Chamilo dan OnlyOffice
3. Aktifkan integrasi

## Cara Kerjanya

Setelah dikonfigurasi, pengguna akan melihat opsi **Edit dengan OnlyOffice** saat melihat jenis dokumen yang didukung di alat Dokumen. Mengkliknya akan membuka dokumen di editor OnlyOffice dalam antarmuka Chamilo.

Perubahan akan disimpan kembali ke penyimpanan dokumen Chamilo secara otomatis.

## Tips

* **Server terpisah direkomendasikan** — Seperti BigBlueButton, OnlyOffice Document Server sebaiknya dijalankan di server sendiri untuk performa terbaik
* **HTTPS diperlukan** — Baik Chamilo maupun OnlyOffice harus disajikan melalui HTTPS agar integrasi dapat berfungsi
* **Periksa format** — OnlyOffice bekerja paling baik dengan format Office (.docx, .xlsx, .pptx). Format lain mungkin memiliki dukungan pengeditan yang terbatas.