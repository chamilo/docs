# Pemetaan Keterampilan Kursus Berbantuan AI

Chamilo 3.1 dapat menyarankan keterampilan yang terkait dengan suatu kursus dan memungkinkan pengguna yang berwenang meninjau serta menerapkan saran tersebut pada referensial keterampilan dan Gradebook. Saran AI **tidak diterapkan secara otomatis**; saran tersebut harus dipilih dan disetujui.

## Menghasilkan saran

1. Buka halaman **pemetaan keterampilan berbantuan AI** dari kursus yang relevan. Rute aplikasi adalah `/course/{courseId}/skills`, dengan ID kursus yang sebenarnya menggantikan `{courseId}`.
2. Jika kursus merupakan bagian dari suatu sesi, buka halaman dalam konteks sesi yang benar.
3. Pilih **penyedia AI** yang tersedia.
4. Pilih **Sarankan keterampilan untuk kursus ini** dan tinjau hasil yang dikembalikan.

Penyedia AI harus tersedia dan dikonfigurasi oleh administrasi platform. Saran dapat merujuk pada entri **Keterampilan yang ada** atau merekomendasikan **Keterampilan baru** di bawah keterampilan induk. Setiap entri dapat mencakup deskripsi, kriteria, dan penjelasan saran tersebut.

## Tinjau dan setujui

1. Baca setiap saran secara kritis dan bandingkan dengan tujuan serta isi kursus.
2. Pilih hanya keterampilan yang valid menggunakan kotak centangnya.
3. Jika Anda memiliki otorisasi yang diperlukan, pilih **Tambahkan keterampilan terpilih ke referensial dan Gradebook**.
4. Verifikasi keterampilan yang dihasilkan dan asosiasi Gradebook dalam kursus.

Pengguna tanpa hak istimewa penugasan dapat meninjau saran tetapi tidak dapat melampirkannya. Membuat keterampilan baru memerlukan izin administrator platform. Saran dapat kedaluwarsa; hasilkan set baru jika aplikasi melaporkan bahwa saran sebelumnya tidak lagi valid.

## Praktik yang baik

Keterampilan yang dihasilkan AI adalah kandidat, bukan persyaratan kurikulum yang otoritatif. Tinjau redaksi, duplikasi, penempatan keterampilan induk, dan kriteria sebelum persetujuan. Hindari memasukkan informasi peserta didik yang bersifat rahasia ke dalam prompt AI.

Lihat [Keterampilan dan Penilaian](../../admin-guide/skills/skills-assessments.md) dan [Kotak Alat AI](toolbox-ai.md). Implementasi: [PR #9409](https://github.com/chamilo/chamilo-lms/pull/9409).