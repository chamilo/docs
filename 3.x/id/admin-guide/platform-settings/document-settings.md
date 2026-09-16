# Pengaturan Dokumen

Perilaku alat **Documents** pada kursus — unggahan, ekstensi yang diizinkan, berbagi, dan templat.

Akses pengaturan ini di **Administration > Configuration settings > Documents**. Kategori ini berisi **29 pengaturan**, yang tercantum di bawah beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau saat Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `access_url_specific_files`

**Aktifkan file khusus URL**

Ketika fitur ini diaktifkan pada konfigurasi multi-URL, Anda dapat pergi ke URL utama dan menyediakan versi khusus URL dari file apa pun (di alat documents). File asli akan diganti oleh alternatif setiap kali dilihat dari URL yang berbeda. Ini memungkinkan Anda menyesuaikan setiap URL lebih lanjut, sambil tetap menikmati keuntungan menggunakan ulang kursus yang sama berkali-kali.

*Default: `false`*

### `default_document_quotum`

**Ruang hard disk default**

Berapa ruang disk yang tersedia untuk suatu kursus? Anda dapat menimpa kuota untuk kursus tertentu melalui: platform administration > Courses > modify

*Default: `1000`*


### `default_group_quotum`

**Ruang disk grup yang tersedia**

Berapa ruang hard disk default yang tersedia untuk alat documents grup?

*Default: `250`*


### `documents_custom_cloud_link_list`

**Tetapkan daftar host ketat untuk tautan cloud**

Alat documents dapat mengintegrasikan tautan ke file di cloud. Daftar layanan cloud dibatasi pada daftar yang dikodekan secara tetap, tetapi Anda dapat mendefinisikan array ‘links’ yang akan berisi daftar layanan/URL milik Anda sendiri. Daftar yang didefinisikan di sini akan menggantikan daftar default.

### `documents_default_visibility_defined_in_course`

**Visibilitas dokumen didefinisikan di kursus**

Visibilitas dokumen default untuk semua kursus

*Default: `false`*

### `documents_hide_download_icon`

**Sembunyikan ikon unduh dokumen**

Di alat documents, sembunyikan ikon unduh dari pengguna.

*Default: `false`*


### `enable_x_sendfile_headers`

**Aktifkan header X-sendfile**

Aktifkan ini jika Anda telah mengaktifkan X-sendfile pada tingkat web server dan ingin menambahkan header yang diperlukan agar browser dapat mengambilnya.

*Default: `false`*

### `group_category_document_access`

**Aktifkan opsi berbagi untuk dokumen di dalam kategori grup**

Ketika diaktifkan, administrator dapat mengatur akses dokumen dan izin berbagi untuk grup dokumen berdasarkan kategori.

*Default: `false`*


### `group_document_access`

**Aktifkan opsi berbagi untuk dokumen grup**

Ketika diaktifkan, berbagi dokumen dan izin akses dapat dikonfigurasi pada tingkat grup.

*Default: `false`*


### `pdf_export_watermark_by_course`

**Aktifkan definisi watermark per kursus**

Ketika opsi ini diaktifkan, pengajar dapat mendefinisikan watermark mereka sendiri untuk dokumen di kursus mereka.

*Default: `false`*


### `pdf_export_watermark_enable`

**Aktifkan watermark pada ekspor PDF**

Dengan mengaktifkan opsi ini, Anda dapat mengunggah gambar atau teks yang akan ditambahkan secara otomatis sebagai watermark ke semua ekspor PDF dokumen pada sistem.

*Default: `false`*

### `pdf_export_watermark_text`

**Teks watermark PDF**

Teks ini akan ditambahkan sebagai watermark pada ekspor dokumen sebagai PDF.

### `permanently_remove_deleted_files`

**File yang dihapus tidak dapat dipulihkan**

Menghapus file di alat documents akan menghapusnya secara permanen. File tidak dapat dipulihkan

*Default: `false`*

### `permissions_for_new_directories`

**Izin untuk direktori baru**

Kemampuan untuk mendefinisikan pengaturan izin yang ditetapkan ke setiap direktori yang baru dibuat memungkinkan Anda meningkatkan keamanan terhadap serangan oleh peretas yang mengunggah konten berbahaya ke portal Anda. Pengaturan default (0770) seharusnya cukup untuk memberikan tingkat perlindungan yang wajar pada server Anda. Format yang diberikan menggunakan terminologi UNIX Owner-Group-Others dengan izin Read-Write-Execute.

*Default: `0770`*


### `permissions_for_new_files`

**Izin untuk file baru**

Kemampuan untuk mendefinisikan pengaturan izin yang ditetapkan ke setiap file yang baru dibuat memungkinkan Anda meningkatkan keamanan terhadap serangan oleh peretas yang mengunggah konten berbahaya ke portal Anda. Pengaturan default (0550) seharusnya cukup untuk memberikan tingkat perlindungan yang wajar pada server Anda. Format yang diberikan menggunakan terminologi UNIX Owner-Group-Others dengan izin Read-Write-Execute. Jika Anda menggunakan Oogie, pastikan bahwa pengguna yang menjalankan LibreOffice dapat menulis file di folder kursus.

*Default: `0660`*


### `send_notification_when_document_added`

**Kirim notifikasi kepada siswa saat dokumen ditambahkan**

Setiap kali seseorang membuat item baru di alat documents, kirim notifikasi kepada pengguna.

*Default: `false`*

### `show_default_folders`

**Tampilkan di alat dokumen semua folder yang berisi sumber daya multimedia yang disediakan secara default**

Folder berkas multimedia yang berisi berkas yang disediakan secara default, diorganisasi dalam kategori video, audio, gambar, dan animasi flash untuk digunakan dalam kursus. Meskipun Anda membuatnya tidak terlihat di alat dokumen, Anda tetap dapat menggunakan sumber daya ini di editor web platform.

*Default: `true`*

### `show_documents_preview`

**Tampilkan pratinjau dokumen**

Menampilkan pratinjau dokumen di alat dokumen akan menghindari pemuatan halaman baru hanya untuk menampilkan dokumen, tetapi dapat menjadi tidak stabil pada beberapa peramban lama atau layar dengan lebar lebih kecil.

*Default: `false`*

### `show_users_folders`

**Tampilkan folder pengguna di alat dokumen**

Opsi ini memungkinkan Anda menampilkan atau menyembunyikan dari pengajar folder yang dihasilkan sistem untuk setiap pengguna yang mengunjungi alat dokumen atau mengirim berkas melalui editor web. Jika Anda menampilkan folder ini kepada pengajar, mereka dapat membuatnya terlihat atau tidak bagi peserta didik dan memungkinkan setiap peserta didik memiliki tempat khusus di kursus tidak hanya untuk menyimpan dokumen, tetapi juga untuk membuat dan mengedit halaman web serta mengekspor ke pdf, membuat gambar, membuat templat web pribadi, mengirim berkas, serta membuat, memindahkan, dan menghapus direktori dan berkas serta membuat salinan keamanan dari folder mereka. Setiap pengguna kursus memiliki pengelola dokumen yang lengkap. Juga, ingat bahwa setiap pengguna dapat menyalin berkas yang terlihat dari folder mana pun di alat dokumen (baik pemilik maupun bukan) ke portofolio atau area dokumen pribadi jejaring sosial, yang akan tersedia untuk digunakan di kursus lain.

*Default: `true`*

### `students_download_folders`

**Izinkan peserta didik mengunduh direktori**

Izinkan peserta didik mengemas dan mengunduh seluruh direktori dari alat dokumen

*Default: `true`*


### `students_export2pdf`

**Izinkan peserta didik mengekspor dokumen web ke format PDF di alat dokumen dan wiki**

Fitur ini diaktifkan secara default, tetapi jika terjadi penyalahgunaan yang membebani server, atau pada lingkungan pembelajaran tertentu, Anda mungkin ingin menonaktifkannya untuk semua kursus.

*Default: `true`*

### `thematic_pdf_orientation`

**Orientasi PDF untuk kemajuan kursus**

Di alat kemajuan kursus, Anda dapat mencetak PDF dari berbagai elemen. Atur ‘portrait’ atau ‘landscape’ (istilah teknis) untuk mengubahnya.

*Default: `landscape`*


### `upload_extensions_blacklist`

**Daftar hitam - pengaturan**

Daftar hitam digunakan untuk memfilter ekstensi berkas dengan menghapus (atau mengganti nama) setiap berkas yang ekstensinya tercantum dalam daftar hitam di bawah. Ekstensi harus dicantumkan tanpa titik di depan (.) dan dipisahkan dengan titik koma (;) seperti berikut:  exe;com;bat;scr;php. Berkas tanpa ekstensi diterima. Huruf besar/kecil tidak berpengaruh.

### `upload_extensions_list_type`

**Jenis pemfilteran pada unggahan dokumen**

Apakah Anda ingin menggunakan pemfilteran daftar hitam atau daftar putih. Lihat deskripsi daftar hitam atau daftar putih di bawah untuk detail lebih lanjut.

*Default: `blacklist`*


### `upload_extensions_replace_by`

**Ekstensi pengganti**

Masukkan ekstensi yang ingin Anda gunakan untuk mengganti ekstensi berbahaya yang terdeteksi oleh filter. Hanya diperlukan jika Anda telah memilih filter dengan penggantian.

*Default: `dangerous`*


### `upload_extensions_skip`

**Perilaku pemfilteran (lewati/ganti nama)**

Jika Anda memilih untuk melewati, berkas yang difilter melalui daftar hitam atau daftar putih tidak akan diunggah ke sistem. Jika Anda memilih untuk mengganti namanya, ekstensinya akan diganti dengan yang didefinisikan dalam pengaturan penggantian ekstensi. Waspadai bahwa penggantian nama tidak benar-benar melindungi Anda, dan dapat menyebabkan tabrakan nama jika beberapa berkas dengan nama yang sama tetapi ekstensi berbeda ada.

*Default: `true`*


### `upload_extensions_whitelist`

**Daftar putih - pengaturan**

Daftar putih digunakan untuk memfilter ekstensi berkas dengan menghapus (atau mengganti nama) setiap berkas yang ekstensinya *TIDAK* tercantum dalam daftar putih di bawah. Pendekatan ini umumnya dianggap lebih aman tetapi lebih ketat untuk pemfilteran. Ekstensi harus dicantumkan tanpa titik di depan (.) dan dipisahkan dengan titik koma (;) seperti berikut:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Berkas tanpa ekstensi diterima. Huruf besar/kecil tidak berpengaruh.

### `users_copy_files`

**Izinkan pengguna menyalin berkas dari kursus ke area berkas pribadi Anda**

Mengizinkan pengguna menyalin berkas dari kursus ke area berkas pribadi Anda, yang terlihat melalui Jejaring Sosial atau melalui editor HTML ketika mereka berada di luar kursus

*Default: `true`*


### `video_features`

**Fitur video**

Array fitur tambahan yang dapat Anda aktifkan untuk pemutar video di Chamilo. Opsi mencakup 'speed', yang memungkinkan Anda mengubah kecepatan pemutaran video.