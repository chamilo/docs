# Denah Lantai Cabang dan Peta Ruangan

Chamilo 3.1 dapat mengaitkan gambar denah lantai dengan sebuah cabang dan menandai posisi ruangan pada gambar tersebut dengan poligon interaktif. Fitur ini membantu peserta didik menemukan ruangan yang ditetapkan; fitur ini **bukan** peta GPS geografis.

## Melampirkan denah lantai cabang

1. Buka area administrasi untuk **Branches** dan edit cabang yang dimaksud.
2. Temukan panel **Floor plan**.
3. Pilih atau unggah gambar, lalu pilih **Attach floor plan** (atau **Change floor plan** jika sudah ada).
4. Simpan atau konfirmasikan perubahan cabang sesuai kebutuhan, lalu verifikasi bahwa gambar denah lantai berhasil dimuat.

Jika suatu denah tidak lagi valid, gunakan **Remove floor plan** setelah memeriksa ruangan mana yang merujuk kepadanya. Unggah hanya konten tepercaya dan ikuti izin pada layar administrasi cabang.

## Menggarisbawahi ruangan

1. Edit ruangan yang ditetapkan ke cabang tersebut.
2. Temukan **Room on floor plan** pada formulir ruangan.
3. Gunakan alat poligon untuk menelusuri batas ruangan. Gunakan **Edit** untuk menyesuaikan titik sudut; semua titik harus tetap berada di dalam gambar.
4. Pilih **Save room area**, lalu simpan formulir ruangan agar perubahan tersimpan.
5. Buka penampil ruangan untuk mengonfirmasi posisi yang benar. Gunakan **Clear room area** jika pemetaan harus dihapus.

Satu ruangan memiliki satu poligon yang dapat diedit pada satu waktu. Pemetaan ruangan terpisah dari gambar tingkat cabang, sehingga memperbarui gambar mungkin mengharuskan pemeriksaan batas ruangan yang sudah ada.

## Tempat peta ditampilkan

Pengguna yang berwenang dapat melihat denah lantai ruangan ketika ruangan dipilih atau ditampilkan dalam informasi kursus, acara kalender, dan alur terkait kehadiran. Verifikasi visibilitas menggunakan peran yang benar-benar akan melihat informasi tersebut, terutama mahasiswa dan peserta sesi.

Izin akses cabang dan ruangan juga berlaku untuk sumber daya denah lantai. Pada instalasi multi-URL, verifikasi isolasi portal/cabang yang benar sebelum menerbitkan peta.

Lihat [Mengelola Ruangan](managing-rooms.md) dan [Pencari Ketersediaan Ruangan](room-availability-finder.md). Implementasi: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).