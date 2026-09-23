# Access URL

Access URL memungkinkan satu instalasi Chamilo untuk melayani beberapa portal terpisah.

Alat ini juga dapat dijangkau dari blok [Platform](../platform/README.md) pada dasbor administrasi, sebagai **Configure multiple access URL**.


## Kasus Penggunaan

* **Multi-tenant deployments** — Menyelenggarakan portal pelatihan terpisah untuk organisasi yang berbeda pada satu server
* **Departmental portals** — Memberikan setiap departemen portal bermerek sendiri (mis., `hr.training.company.com`, `it.training.company.com`)
* **Regional portals** — Portal terpisah untuk wilayah atau bahasa yang berbeda

## Cara Kerja

Setiap access URL adalah titik masuk terpisah ke instalasi Chamilo yang sama:

* Pengguna dapat ditetapkan ke satu atau lebih access URL
* Kursus dan sesi milik access URL tertentu
* Pengaturan platform dapat disesuaikan per access URL
* Branding dan tema dapat berbeda per URL
* Pengguna pada satu portal tidak dapat melihat pengguna atau kursus di portal lain (kecuali secara eksplisit dibagikan)

## Konfigurasi

### Mengaktifkan Multi-URL

Multi-URL harus diaktifkan dalam konfigurasi Chamilo (biasanya pada pengaturan lingkungan). Hal ini biasanya dilakukan selama penyiapan awal.

### Membuat Access URL

1. Dari panel administrasi, buka **Access URLs**
2. Klik **Add URL**
3. Masukkan URL (mis., `https://portal2.yoursite.com`) dan deskripsi
4. Secara opsional pilih **Parent URL** untuk menempatkan URL ini di bawah URL lain — lihat [Hierarki URL](#url-hierarchy) di bawah
5. Simpan

### Menetapkan Pengguna dan Kursus

* **Users** — Tetapkan pengguna ke access URL tertentu. Seorang pengguna dapat termasuk dalam beberapa URL.
* **Courses** — Tetapkan kursus ke access URL tertentu
* **Sessions** — Tetapkan sesi ke access URL tertentu

### Pengaturan Per-URL

Setiap access URL dapat memiliki:

* **Color theme** — Branding visual yang berbeda
* **Platform name and logo** — Identitas kustom
* **Settings overrides** — Pengaturan platform tertentu dapat disesuaikan per URL

## Hierarki URL

Access URL dapat disusun menjadi pohon induk/anak alih-alih daftar datar. Saat membuat atau mengedit URL, Global Administrator yang tidak dibatasi (lihat [Administrator Subpohon](#subtree-administrators) di bawah) dapat memilih URL lain mana pun sebagai **Parent URL**-nya:

![Dialog Edit URL dengan dropdown Parent URL terbuka, menampilkan access URL lain yang tersedia sebagai induk](../../.gitbook/assets/admin-access-url-parent-select.png)

* Dropdown tidak pernah menawarkan URL yang sedang diedit, atau salah satu turunannya sendiri, sebagai induk yang mungkin — ini mencegah terciptanya siklus. Backend memvalidasi ulang hal ini terlepas dari apa yang ditampilkan antarmuka.
* Jika URL dibuat tanpa memilih induk, URL tersebut secara default menjadi **login-only URL** jika ada (lihat [Pengaturan Per-URL](#per-url-settings) di atas), atau jika tidak ke access URL pertama — perilaku default yang sama seperti sebelum fitur ini ada.
* URL teratas suatu pohon — yang tidak memiliki induk — adalah **root** pohon tersebut. Satu instalasi Chamilo dapat menampung lebih dari satu pohon independen.

Di mana pun access URL dicantumkan — dasbor Multi-URL dan halaman pengelolaan Access URLs — pohon ditampilkan melalui indentasi, suatu induk langsung diikuti oleh anak-anaknya sendiri (saudara diurutkan menurut abjad), alih-alih kolom "Parent" terpisah:

![Daftar Access URLs yang menampilkan URL root dengan dua URL anak, salah satunya memiliki URL anak sendiri, diindentasi untuk mencerminkan hierarki](../../.gitbook/assets/admin-access-url-hierarchy-list.png)

## Administrator Subpohon

Hierarki URL juga menentukan apa yang dapat dikelola oleh [Global Administrator](../users/user-roles.md):

* Yang terdaftar pada URL **root** suatu pohon bersifat **unrestricted**: mereka mengelola setiap access URL, persis seperti sebelum fitur ini ada.
* Yang terdaftar hanya pada URL **non-root** bersifat **scoped**: halaman Multi-URL dan Access URLs hanya menampilkan URL tersebut dan turunannya, dan bagan login pada dasbor Multi-URL menampilkan "Logins (your URLs)" alih-alih "Logins (all URLs combined)".

Terlepas dari cakupan, hal-hal berikut tetap dicadangkan bagi Global Administrator yang **unrestricted** — administrator yang scoped tidak dapat melakukannya bahkan untuk URL dalam subpohon mereka sendiri:

* Membuat access URL baru
* Mengedit URL, deskripsi, atau induk dari suatu access URL
* Mengaktifkan atau menonaktifkan suatu access URL
* Menghapus suatu access URL (URL root dari seluruh instalasi tidak pernah dapat dihapus, oleh siapa pun)
* Mendaftarkan diri mereka ke setiap access URL sekaligus

Administrator yang scoped tetap dapat mengelola segala sesuatu yang *ditetapkan ke* URL dalam subpohon mereka — pengguna, kursus, sesi, branding, dan pengaturan — hanya bukan entri access URL itu sendiri.

## Kiat

* **Putuskan sejak awal** — Jika memilih pengaturan multi-URL, Anda harus melakukannya di awal proyek Chamilo karena URL pertama harus dibiarkan relatif kosong dari konten. Mengaktifkan multi-URL setelahnya lebih menantang (memerlukan perubahan basis data secara manual).
* **Rencanakan struktur URL** — Tentukan skema URL Anda sebelum membuat URL akses, karena mengubah URL kemudian memengaruhi semua tautan dan bookmark yang ada
* **Konfigurasi DNS** — Setiap URL akses harus merujuk ke server Chamilo yang sama. Konfigurasikan catatan DNS sesuai.
* **Administrator global** — Gunakan peran Global Administrator untuk mengelola di semua URL akses. Untuk mendelegasikan pengelolaan hanya satu cabang, daftarkan administrator pada URL non-root — lihat [Administrator Subpohon](#subtree-administrators)