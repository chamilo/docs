# Sistem

Blok **Sistem** pada dasbor administrasi mengelompokkan alat pemeliharaan tingkat server, alur kerja pembaruan mandiri, utilitas inspeksi penyimpanan/sumber daya, dan branding platform.

![Blok Sistem pada dasbor administrasi, yang mencantumkan Bersihkan berkas sementara, Status sistem, Pembaruan sistem, Warna, Info berkas, Sumber daya menurut jenis, dan Daftar ikon](/.gitbook/assets/admin-system-block.png)

## Mengakses Blok Sistem

Dari panel administrasi, blok **Sistem** muncul bersama blok dasbor lainnya. Klik salah satu tautannya untuk membuka alat yang sesuai.

## Isi Blok

* **[Alat Sistem](system-tools.md)** — Membersihkan berkas sementara, menjalankan alur kerja pembaruan mandiri, memeriksa berkas dan sumber daya yang tersimpan, serta menelusuri kumpulan ikon bawaan
* **Status sistem** — Dibahas di [Status Sistem](../maintenance/system-status.md), di bawah Pemeliharaan
* **[Branding](branding/README.md)** — Tema warna (tautan "Warna" pada blok membuka halaman Tema Warna yang sama), kustomisasi portal, dan templat

Dua item tambahan — **Data filler** dan **E-mail tester** — hanya muncul jika server memiliki direktori `tests/`, yang merupakan pengaturan pengembangan/QA, bukan produksi. Item tersebut tidak akan muncul pada instalasi produksi pada umumnya; lihat [Alat Sistem](system-tools.md#development-only-tools) untuk mengetahui fungsinya jika ada.