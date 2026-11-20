# Enkripsi Data Saat Disimpan untuk Bidang Profil Pengguna

Chamilo 3.1 dapat secara opsional mengenkripsi bidang profil pribadi tertentu sebelum menyimpannya di basis data. Implementasi pertama ini mencakup **biografi**, **telepon**, dan **alamat**. Enkripsi **dinonaktifkan secara bawaan** dan memerlukan kunci enkripsi privat. Fitur ini tidak mengenkripsi seluruh informasi pengguna, dan tidak menggantikan keamanan disk, basis data, transportasi, atau cadangan.

## Sebelum mengaktifkan enkripsi

Hanya administrator platform yang memiliki akses server yang boleh melakukan penerapan. Pertama, pastikan instalasi mencakup migrasi Chamilo 3.1 untuk penyimpanan bidang terenkripsi, buat cadangan basis data yang dapat dipulihkan, dan rencanakan cadangan aman untuk kunci enkripsi **secara terpisah dari basis data**. Uji prosedur pemulihan sebelum mengubah data produksi.

Kunci disimpan di `var/data-at-rest/master.key`, di luar akar web publik. Jangan pernah memublikasikannya, menempelkannya ke permintaan dukungan, atau mengirimkannya ke Git. Kehilangan kunci asli dapat membuat data terenkripsi tidak dapat dibaca. Jangan membuat kunci pengganti jika data pengguna sudah terenkripsi.

## Inisialisasi kunci

Jalankan perintah sekali dalam mode pratinjau:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Jika perintah melaporkan bahwa tidak ada data terenkripsi dan kunci dapat disediakan, inisialisasi secara eksplisit:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Jika perintah melaporkan kunci yang sudah ada dan kompatibel, penggantian tidak dilakukan. Jika baris terenkripsi ada tetapi kunci hilang atau tidak cocok, **hentikan** dan pulihkan kunci asli.

## Pilih bidang yang dilindungi

Buka **Administration > Settings > Security** dan pilih **Biography**, **Phone**, dan/atau **Address** pada pengaturan bidang pengguna terenkripsi. Pilih hanya bidang yang ingin Anda lindungi. Penulisan baru ke bidang yang dipilih menggunakan enkripsi terautentikasi (libsodium XChaCha20-Poly1305); rekaman teks jelas lama tetap dapat dibaca hingga diisi ulang secara eksplisit.

## Periksa dan isi ulang data yang sudah ada

Perintah pengisian ulang tidak mengubah rekaman tanpa `--apply`. Utamakan satu pengguna QA sebelum batch yang lebih luas:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Setelah memverifikasi ketersediaan kunci, pemilihan bidang, cadangan, dan akun QA, jalankan uji coba yang disengaja:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Ganti `102` dengan ID pengguna uji yang sebenarnya. Untuk kumpulan data yang lebih besar, gunakan argumen opsional `--batch-size` (1–500), tinjau keluaran perintah dan perilaku aplikasi, serta rencanakan batch selama jendela pemeliharaan. Jangan menjalankan pengisian ulang seluruh basis data tanpa strategi pengembalian yang telah diuji.

## Batasan operasional

- Ini adalah fase pertama enkripsi tingkat bidang, bukan enkripsi seluruh basis data.
- Integrasi SQL langsung yang lebih lama dan ekspor mungkin tidak mengetahui cara membaca nilai terenkripsi; verifikasi sebelum penerapan.
- Cadangan basis data **tanpa** kunci yang dapat dipulihkan tidak memadai.
- Jangan mencatat isi bidang mentah atau menyertakan materi kunci dalam diagnostik.
- Mengembalikan kode aplikasi saja tidak mendekripsi nilai yang tersimpan.

Lihat [Pengaturan keamanan](../platform-settings/security-settings.md) untuk opsi keamanan platform secara umum. Implementasi: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).