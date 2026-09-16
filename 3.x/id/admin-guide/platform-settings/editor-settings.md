# Pengaturan Editor

Konfigurasi editor teks kaya (TinyMCE) yang digunakan di seluruh platform — bilah alat, plugin, pembantu AI di dalam editor.

Akses pengaturan ini di **Administrasi > Pengaturan konfigurasi > Editor**. Kategori ini berisi **26 pengaturan**, yang tercantum di bawah ini beserta judul dan komentar yang dikirimkan dalam fixtures pengaturan platform (`SettingsCurrentFixtures.php`).

> Nama variabel dalam kode ditampilkan dalam monospace. Gunakan nama tersebut saat membuat skrip melalui API atau ketika Anda perlu mengubah pengaturan tersebut pada tingkat global dengan mengedit [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Pengaturan

### `allow_email_editor`

**Editor e-mail daring diaktifkan**

Jika opsi ini diaktifkan, mengklik alamat e-mail akan membuka editor daring.

### `allow_spellcheck`

**Pemeriksa ejaan**

Aktifkan pemeriksa ejaan

### `block_copy_paste_for_students`

**Blokir salin dan tempel untuk peserta didik**

Blokir kemampuan peserta didik untuk menyalin dan menempel ke dalam editor WYSIWYG

### `editor_block_image_copy_paste`

**Cegah salin-tempel gambar di editor WYSIWYG**

Cegah penggunaan salin-tempel gambar sebagai base64 di editor untuk menghindari pengisian basis data dengan gambar.

*Default: `false`*


### `editor_driver_list`

**Daftar driver berkas WYSIWYG**

Array yang berisi nama-nama driver untuk akses berkas dari editor WYSIWYG.

### `editor_settings`

**Pengaturan editor WYSIWYG**

Array konfigurasi generik untuk mengonfigurasi ulang editor WYSIWYG secara global.

### `enable_iframe_inclusion`

**Izinkan iframe di Editor HTML**

Mengizinkan iframe sembarang di Editor HTML akan meningkatkan kemampuan penyuntingan pengguna, tetapi dapat menimbulkan risiko keamanan. Pastikan Anda dapat mengandalkan pengguna Anda (yaitu, Anda mengetahui siapa mereka) sebelum mengaktifkan fitur ini.

### `enable_uploadimage_editor`

**Izinkan seret & lepas gambar di editor WYSIWYG**

Aktifkan unggah gambar sebagai berkas saat menyalin ke dalam konten atau melakukan seret dan lepas.

*Default: `false`*


### `enabled_asciisvg`

**Aktifkan AsciiSVG**

Aktifkan plugin AsciiSVG di editor WYSIWYG untuk menggambar grafik dari fungsi matematika.

### `enabled_googlemaps`

**Aktifkan Google maps**

Aktifkan tombol untuk menyisipkan Google maps. Aktivasi tidak sepenuhnya terwujud jika berkas main/inc/lib/fckeditor/myconfig.php belum diedit sebelumnya dan kunci API Google maps belum ditambahkan.

### `enabled_imgmap`

**Aktifkan Image maps**

Aktifkan tombol untuk menyisipkan Image maps. Ini memungkinkan Anda mengaitkan URL ke area pada sebuah gambar, sehingga membuat hotspot.

### `enabled_insertHtml`

**Izinkan penyisipan widget**

Ini memungkinkan Anda menyematkan di halaman web video dan aplikasi favorit Anda seperti vimeo atau slideshare serta berbagai widget dan gadget

### `enabled_mathjax`

**Aktifkan MathJax**

Aktifkan pustaka MathJax untuk memvisualisasikan rumus matematika. Ini menambahkan tombol rumus ke bilah alat editor, tempat rumus ditulis dalam LaTeX. Lihat [Rumus Matematika](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Buat dan sunting berkas SVG**

Opsi ini memungkinkan Anda membuat dan menyunting SVG (Scalable Vector Graphics) berlapis secara daring, serta mengekspornya ke gambar berformat png.

### `enabled_wiris`

**Editor matematika WIRIS**

Aktifkan editor matematika WIRIS. Dengan menginstal plugin ini Anda mendapatkan editor WIRIS dan WIRIS CAS.<br/>Aktivasi ini tidak sepenuhnya terwujud kecuali <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP untuk CKeditor WIRIS</a> telah diunduh sebelumnya dan isinya diekstrak ke direktori Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Hal ini diperlukan karena Wiris adalah perangkat lunak proprietary dan layanannya bersifat <a href='http://www.wiris.com/store/who-pays' target='_blank'>komersial</a>. Untuk menyesuaikan plugin, sunting berkas configuration.ini atau ganti isinya dengan berkas configuration.ini.default yang dikirimkan bersama Chamilo.

### `force_wiki_paste_as_plain_text`

**Paksa menempel sebagai teks biasa di wiki**

Ini akan mencegah banyak tag tersembunyi, tidak benar, atau tidak standar, yang disalin dari teks lain agar tidak merusak teks Wiki setelah banyak masalah; tetapi beberapa fitur akan hilang saat menyunting.

### `full_editor_toolbar_set`

**Bilah alat editor WYSIWYG lengkap**

Tampilkan bilah alat lengkap di semua kotak editor WYSIWYG di seluruh platform.

*Default: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier di Wiki**

Aktifkan HTML purifier di alat wiki (akan meningkatkan keamanan tetapi mengurangi fitur gaya)

### `include_asciimathml_script`

**Muat pustaka Mathjax di semua halaman sistem**

Aktifkan pengaturan ini jika Anda ingin menampilkan rumus matematika berbasis MathML dan grafik matematika berbasis ASCIIsvg tidak hanya di alat 'Dokumen', tetapi juga di tempat lain dalam sistem.

### `math_asciimathML`

**Editor matematika ASCIIMathML**

Aktifkan editor matematika ASCIIMathML

### `more_buttons_maximized_mode`

**Bilah tombol diperluas**

Aktifkan bilah tombol yang diperluas ketika editor WYSIWYG dimaksimalkan

*Default: `true`*

### `save_titles_as_html`

**Simpan judul sebagai HTML**

Izinkan pengguna menyertakan HTML di kolom judul di beberapa tempat. Ini memungkinkan beberapa penataan gaya pada judul, terutama pada pertanyaan tes. Ini juga memungkinkan kolom judul tertentu tersebut menggunakan penandaan per bahasa yang sama seperti `translate_html` di bawah, yang tidak dapat ditampung oleh judul teks biasa.

*Default: `false`*

### `translate_html`

**Dukungan konten HTML multibahasa**

Jika diaktifkan, opsi ini memungkinkan pengguna menggunakan atribut ‘lang’ pada elemen HTML untuk menentukan bahasa tempat konten elemen tersebut ditulis. Aktifkan beberapa elemen dengan atribut ‘lang’ yang berbeda dan Chamilo akan menampilkan konten hanya dalam bahasa pengguna.

*Default: `false`*

Lihat [Konten Multibahasa](../../teacher-guide/adding-content/multi-language-content.md) di Panduan Pengajar untuk panduan lengkap fitur ini dari sisi pengajar.


### `video_context_menu_hidden`

**Sembunyikan menu konteks pada pemutar video**

Jika diaktifkan, menu konteks klik kanan pada pemutar video HTML5 dinonaktifkan.

*Default: `false`*


### `video_player_renderers`

**Renderer pemutar video**

Aktifkan renderer pemutar untuk media YouTube, Vimeo, Facebook, DailyMotion, Twitch

### `youtube_for_students`

**Izinkan peserta didik menyisipkan video dari YouTube**

Aktifkan kemungkinan peserta didik dapat menyisipkan video Youtube