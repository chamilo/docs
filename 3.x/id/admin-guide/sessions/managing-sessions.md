# Mengelola Sesi

## Membuat Sesi

![Formulir pembuatan sesi dengan kolom untuk nama, tanggal, tutor, kategori, dan visibilitas](../../.gitbook/assets/admin-session-create-form.png)

1. Dari panel administrasi, klik **Create a session**
2. Isi detail sesi:
   * **Session name** — Nama deskriptif (misalnya, "Spring 2026 Onboarding")
   * **Start and end dates** — Kapan sesi berlangsung (opsional — sesi dapat bersifat terbuka tanpa batas waktu). Terdapat 3 kumpulan tanggal: tanggal untuk ditampilkan, tanggal untuk membatasi akses peserta didik, dan tanggal untuk membatasi akses tutor
   * **Session tutor** — Orang yang mengawasi seluruh sesi
   * **Category** — Tetapkan ke kategori sesi untuk pengorganisasian
   * **Visibility** — Kendalikan akses dan perilaku penayangan
3. **Add courses** — Pilih satu atau lebih kursus untuk disertakan dalam sesi
4. **Enroll learners** — Tambahkan pengguna individu atau kelas pengguna
5. **Assign course tutors** — Untuk setiap kursus, tetapkan seorang pengajar (tutor kursus)
6. Simpan

## Tanggal Sesi

Sesi mendukung konfigurasi tanggal yang fleksibel:

| Tanggal | Tujuan |
|------|---------|
| **Display start/end** | Kapan sesi muncul dalam daftar peserta didik |
| **Access start/end** | Kapan peserta didik benar-benar dapat mengakses konten sesi |
| **Tutor access start/end** | Kapan tutor dapat mengakses sesi (sering dimulai sebelum dan berakhir setelah akses peserta didik) |

Hal ini memungkinkan Anda menyiapkan sesi sebelum peserta didik tiba dan menjaga akses tutor tetap terbuka setelah sesi berakhir untuk penilaian dan pelaporan.

## Daftar Sesi

![Daftar sesi yang menampilkan semua sesi beserta nama, tanggal, jumlah kursus, jumlah peserta didik, dan status](../../.gitbook/assets/admin-session-list.png)

Daftar sesi menampilkan semua sesi beserta:

* Nama sesi
* Tanggal mulai dan selesai
* Status (aktif, akan datang, lampau)

Gunakan pencarian dan filter untuk menemukan sesi berdasarkan nama, tanggal, kategori, atau status.

## Mengedit Sesi

Klik sebuah sesi untuk mengedit:

* Ubah tanggal, nama, atau kategori
* Tambah atau hapus kursus
* Ubah tutor kursus
* Tambah atau hapus peserta didik
* Lihat data pelacakan untuk sesi tersebut

## Mendaftarkan Pengguna

![Antarmuka pendaftaran sesi untuk menambahkan pengguna individu, kelas, atau mengimpor melalui CSV](../../.gitbook/assets/admin-session-enrollment.png)

Anda dapat mendaftarkan pengguna ke dalam sesi dengan:

* **Individual enrollment** — Cari dan tambahkan pengguna individu
* **Class enrollment** — Tambahkan seluruh kelas (kelompok pengguna yang telah ditentukan) sekaligus
* **CSV import** — Unggah berkas berisi penugasan pengguna-sesi

## Akses Sesi

Peserta didik mengakses sesi mereka melalui **My sessions** di bilah sisi. Sesi diorganisasi menjadi:

* **Current sessions** — Sedang aktif
* **Past sessions** — Telah berakhir
* **Upcoming sessions** — Belum dimulai

## Tips

* **Rencanakan tanggal dengan cermat** — Pastikan tanggal akses tutor melampaui tanggal peserta didik agar tutor dapat menyiapkan dan menindaklanjuti
* **Gunakan kelas untuk pendaftaran berulang** — Jika Anda sering mendaftarkan kelompok yang sama, buat kelas dan tetapkan ke sesi
* **Jaga sesi tetap terorganisasi** — Gunakan kategori dan konvensi penamaan yang jelas untuk pengelolaan yang mudah