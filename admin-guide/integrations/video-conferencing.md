# Konferensi Video

Chamilo terintegrasi dengan platform konferensi video untuk memungkinkan sesi langsung dalam kursus.

## Platform yang Didukung

### BigBlueButton

**BigBlueButton** (BBB) adalah sistem konferensi web sumber terbuka yang dirancang untuk pembelajaran daring. Ini adalah solusi konferensi video yang paling umum digunakan dengan Chamilo.

#### Konfigurasi

1. Instal BigBlueButton di server terpisah (lihat [dokumentasi BigBlueButton](https://docs.bigbluebutton.org/))
2. Gunakan perintah bbb-conf --salt di server BBB untuk mendapatkan detail integrasi
3. Di pengaturan platform Chamilo, **Plugins**, instal plugin Videoconference dan masukkan konfigurasi untuk mengatur:
   * **URL server BBB** — Alamat server BBB Anda
   * **Salt/secret BBB** — Rahasia API dari server BBB Anda
4. Simpan
5. **Aktifkan** plugin Videoconference
6. Beberapa fitur khusus tersedia untuk admin, jadi pastikan Anda mengaktifkannya di wilayah *admin_page*

#### Fitur yang Tersedia di Chamilo

* Memulai/mengikuti rapat dari dalam kursus
* Pembuatan ruang otomatis per kursus
* Rekaman rapat (jika diaktifkan)
* Berbagi layar, papan tulis, ruang kelompok
* Obrolan bersamaan dengan video

### Zoom

Chamilo juga dapat terintegrasi dengan **Zoom** untuk konferensi video.

#### Konfigurasi

1. Buat aplikasi Zoom di Zoom Marketplace
2. Di Chamilo, konfigurasi kredensial API Zoom
3. Aktifkan integrasi Zoom

#### Cara Kerjanya

Ketika Zoom dikonfigurasi, pengajar dapat membuat dan meluncurkan rapat Zoom dari dalam kursus mereka. Peserta didik bergabung melalui antarmuka Chamilo.

## Memilih Antara BBB dan Zoom

| Fitur | BigBlueButton | Zoom |
|-------|--------------|------|
| Biaya | Gratis (sumber terbuka), tetapi membutuhkan server Anda sendiri | Membutuhkan langganan Zoom |
| Hosting | Di-host sendiri | Di-host di cloud oleh Zoom |
| Kedalaman integrasi | Mendalam (dibuat untuk penggunaan LMS) | Standar |
| Rekaman | Di sisi server, disimpan di infrastruktur Anda | Cloud Zoom atau lokal |
| Papan tulis | Terintegrasi | Terintegrasi |
| Ruang kelompok | Ya | Ya |

## Tips

* **Server terpisah untuk BBB** — BigBlueButton sebaiknya dijalankan di server khusus sendiri untuk performa terbaik, bukan di server yang sama dengan Chamilo
* **Uji sebelum kelas** — Selalu uji pengaturan konferensi video sebelum sesi langsung
* **Periksa bandwidth** — Pastikan server dan jaringan Anda dapat menangani jumlah pengguna bersamaan yang diharapkan