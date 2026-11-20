# Penerbitan dan Verifikasi Open Badges 2.0

Chamilo 3.1 dapat menerbitkan kredensial **Open Badges 2.0** untuk keterampilan yang diperoleh, termasuk gambar lencana yang memuat assertion tertanam (baked) dalam metadata PNG. Verifikasi lencana menggunakan endpoint publik untuk lencana, assertion, dan penerbit.

## Konfigurasi penerbit dan keterampilan

1. Atur **nama institusi** platform dan **email kontak administrator** yang valid; keduanya diwajibkan oleh profil penerbit.
2. Konfigurasikan keterampilan dengan judul, deskripsi, dan kriteria lencana.
3. Lampirkan gambar lencana PNG yang valid jika sesuai. Chamilo juga dapat menggunakan gambar lencana bawaannya jika keterampilan tidak memiliki aset kustom.
4. Berikan atau validasi perolehan keterampilan bagi peserta didik melalui alur kerja keterampilan yang biasa.

Kredensial bergantung pada relasi keterampilan yang diperoleh. Assertion keterampilan yang dicabut atau tidak lagi diperoleh dilaporkan sebagai dicabut. Sumber daya keterampilan dan lencana dibatasi pada URL akses yang sesuai.

## Data verifikasi publik

Setiap penerbitan memiliki assertion yang di-host. URL terkait diturunkan dari root publik aplikasi dan mencakup:

- `main/skills/assertion.php?issue=<issue-id>` — assertion JSON untuk penerbitan keterampilan tertentu.
- `main/skills/class.php?id=<skill-id>` — metadata kelas lencana, termasuk kriteria dan referensi penerbit.
- `main/skills/issuer.php` — profil institusi penerbit.
- `main/skills/image.php?id=<skill-id>` — sumber daya gambar lencana.

URL yang dihasilkan secara tepat bergantung pada jalur dasar publik instalasi. Assertion menyertakan hash bergaram dari email penerima alih-alih menerbitkan alamat email secara terbuka, serta mengidentifikasi penerbit dan keterampilan yang diperoleh. PNG lencana dapat menyertakan assertion dalam chunk iTXt `openbadges`.

## Validasi lencana yang diterbitkan

Buka endpoint assertion yang di-host, kelas lencana, dan penerbit tanpa sesi yang masuk. Endpoint tersebut harus mengembalikan kredensial tertaut yang konsisten. Unduh PNG yang diterbitkan melalui alur ekspor yang didukung keterampilan dan verifikasi bahwa assertion tertanamnya sesuai dengan representasi yang di-host. Jika keterampilan dicabut, periksa bahwa verifikasi mencerminkan status pencabutannya.

PNG yang hanya berisi karya visual lencana **tidak** membuktikan kredensial yang valid. Jangan mencampuradukkan penerbitan Open Badges 2.0 dengan fungsionalitas sertifikat atau PDF bertanda tangan yang tidak terkait.

Lihat [Mengelola Keterampilan](managing-skills.md) dan [Verifikasi Sertifikat Bertanda Tangan](../maintenance/signed-certificate-verification.md). Implementasi: [PR #9346](https://github.com/chamilo/chamilo-lms/pull/9346).