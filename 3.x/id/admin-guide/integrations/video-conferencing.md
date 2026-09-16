# Konferensi Video

Chamilo terintegrasi dengan platform konferensi video untuk memungkinkan sesi langsung di dalam kursus.

## Platform yang Didukung

### BigBlueButton

**BigBlueButton** (BBB) adalah sistem konferensi web sumber terbuka yang dirancang untuk pembelajaran daring. Ini adalah solusi konferensi video yang paling umum digunakan bersama Chamilo.

#### Konfigurasi

1. Instal BigBlueButton pada server terpisah (lihat [dokumentasi BigBlueButton](https://docs.bigbluebutton.org/))
2. Gunakan bbb-conf --salt pada server BBB untuk mendapatkan detail integrasi
3. Di pengaturan platform Chamilo, **Plugins**, instal plugin Videoconference dan masukkan konfigurasinya untuk mengatur:
   * **BBB server URL** — Alamat server BBB Anda
   * **BBB salt/secret** — Rahasia API dari server BBB Anda
4. Simpan
5. **Aktifkan** plugin Videoconference
6. Beberapa fitur khusus tersedia bagi admin, jadi pastikan Anda mengaktifkannya di wilayah *admin_page*

#### Fitur yang Tersedia di Chamilo

* Memulai/bergabung rapat dari dalam kursus
* Pembuatan ruang otomatis per kursus
* Rekaman rapat (jika diaktifkan)
* Berbagi layar, papan tulis, ruang pecah (breakout rooms)
* Obrolan bersama video

### Zoom

Chamilo juga dapat terintegrasi dengan **Zoom** untuk konferensi video.

#### Konfigurasi

1. Buat aplikasi Zoom di Zoom Marketplace
2. Di Chamilo, konfigurasikan kredensial API Zoom
3. Aktifkan integrasi Zoom

#### Cara Kerjanya

Ketika Zoom dikonfigurasi, pengajar dapat membuat dan meluncurkan rapat Zoom dari dalam kursus mereka. Peserta didik bergabung melalui antarmuka Chamilo.

## Memilih Antara BBB dan Zoom

| Fitur | BigBlueButton | Zoom |
|---------|--------------|------|
| Biaya | Gratis (sumber terbuka), tetapi memerlukan server sendiri | Memerlukan langganan Zoom |
| Hosting | Di-host sendiri | Di-host di cloud oleh Zoom |
| Kedalaman integrasi | Dalam (dibangun untuk penggunaan LMS) | Standar |
| Rekaman | Sisi server, disimpan di infrastruktur Anda | Cloud Zoom atau lokal |
| Papan tulis | Terpasang | Terpasang |
| Ruang pecah (breakout rooms) | Ya | Ya |

## Tips

* **Server terpisah untuk BBB** — BigBlueButton sebaiknya dijalankan pada server khusus sendiri untuk kinerja terbaik, bukan pada server yang sama dengan Chamilo
* **Uji sebelum kelas** — Selalu uji penyiapan konferensi video sebelum sesi langsung
* **Periksa bandwidth** — Pastikan server dan jaringan Anda dapat menangani jumlah pengguna bersamaan yang diharapkan