# Rumus Matematika

Editor teks kaya dapat menata rumus matematika. Anda menulis rumus dalam LaTeX, dan peserta didik melihatnya terender di mana pun konten ditampilkan: dokumen, pengumuman, latihan, forum, halaman wiki, dan setiap alat lain yang menggunakan editor.

Rumus disimpan di dalam konten itu sendiri, sehingga ikut bersama kursus ketika Anda menyalin atau mengekspornya.

## Mengaktifkan Fitur

Tombol rumus nonaktif secara default. Administrator platform mengaktifkannya di **Administration > Configuration settings > Editor > Enable MathJax** ([`enabled_mathjax`](../../admin-guide/platform-settings/editor-settings.md)).

Setelah pengaturan diaktifkan, tombol muncul di setiap editor pada platform. Tidak diperlukan konfigurasi per kursus.

## Menyisipkan Rumus

1. Letakkan kursor di tempat rumus seharusnya berada
2. Klik tombol **Insert formula** pada bilah alat editor (ikon Σ)
3. Ketik rumus dalam **kode LaTeX**
4. Periksa hasil terender di kotak pratinjau di bawah bidang
5. Klik **Insert**

Pratinjau diperbarui sambil Anda mengetik, sehingga Anda dapat memperbaiki kesalahan sebelum menyisipkan apa pun.

## Mengedit Rumus

Klik rumus di editor. Dialog yang sama terbuka lagi, dengan kode LaTeX asli Anda di bidang. Ubah dan klik **Insert** untuk mengganti rumus.

Untuk menghapus rumus, pilih rumus di editor dan tekan <kbd>Delete</kbd>, seperti elemen lainnya.

## Menulis LaTeX

Bidang rumus menerima notasi matematika LaTeX standar. Beberapa contoh:

| What you type | What learners see |
| --- | --- |
| `x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}` | The quadratic formula |
| `\sum_{i=1}^{n} i = \frac{n(n+1)}{2}` | A sum with limits |
| `\int_{0}^{\infty} e^{-x} dx = 1` | A definite integral |
| `\alpha + \beta = \gamma` | Greek letters |
| `\begin{matrix} a & b \\ c & d \end{matrix}` | A matrix |

Anda juga dapat mengetik pembatas mentah `\(...\)`, `\[...\]` atau `$$...$$` langsung ke dalam editor. Editor mengubahnya menjadi rumus saat memuat konten.

## Catatan

* Pustaka rumus dimuat hanya pada halaman yang benar-benar berisi rumus, sehingga halaman tanpa rumus tidak diperlambat.
* Semuanya dirender di peramban peserta didik. Platform tidak memerlukan layanan eksternal, dan berfungsi pada instalasi tanpa akses ke internet.
* Rumus menyimpan sumber LaTeX-nya. Anda selalu dapat membukanya kembali dan membaca apa yang Anda tulis, bahkan bertahun-tahun kemudian.