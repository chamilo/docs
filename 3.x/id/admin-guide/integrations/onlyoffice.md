# OnlyOffice

Integrasi **OnlyOffice** memungkinkan pengguna mengedit dokumen (Word, Excel, PowerPoint) langsung di peramban dalam Chamilo, tanpa mengunduhnya.

## Apa yang Disediakan OnlyOffice

* **Pengeditan dokumen** — Mengedit berkas .docx, .xlsx, .pptx di peramban
* **Kompatibilitas format** — Kompatibilitas penuh dengan format Microsoft Office
* **Tidak perlu perangkat lunak desktop** — Semuanya berjalan di peramban

> Pengeditan kolaboratif waktu nyata bergantung pada OnlyOffice Document Server itu sendiri; plugin Chamilo membuka dan menyimpan dokumen melalui server tersebut tetapi tidak menambah atau membatasi kemampuan itu.

## Konfigurasi

1. Instal **OnlyOffice Document Server** di server Anda (atau gunakan layanan cloud OnlyOffice)
2. Di pengaturan platform Chamilo, konfigurasikan:
   * **OnlyOffice Document Server URL** — Alamat server OnlyOffice Anda
   * **Secret key** — Untuk komunikasi aman antara Chamilo dan OnlyOffice
3. Aktifkan integrasi

## Cara Kerjanya

Setelah dikonfigurasi, pengguna melihat opsi **Edit with OnlyOffice** saat melihat jenis dokumen yang didukung di alat Documents. Mengkliknya membuka dokumen di editor OnlyOffice dalam antarmuka Chamilo.

Perubahan disimpan kembali ke penyimpanan dokumen Chamilo secara otomatis.

## Tips

* **Server terpisah disarankan** — Seperti BigBlueButton, OnlyOffice Document Server sebaiknya dijalankan di server tersendiri untuk kinerja terbaik
* **HTTPS wajib** — Baik Chamilo maupun OnlyOffice harus disajikan melalui HTTPS agar integrasi berfungsi
* **Periksa format** — OnlyOffice bekerja paling baik dengan format Office (.docx, .xlsx, .pptx). Format lain mungkin memiliki dukungan pengeditan yang terbatas.