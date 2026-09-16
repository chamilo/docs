# Mengelola Ruangan

Ruangan di Chamilo diorganisasi di bawah cabang: cabang adalah lokasi fisik, dan setiap ruangan termasuk ke tepat satu cabang.

## Cabang

**Rooms > Branches** mengelola lokasi fisik organisasi Anda — sebuah gedung, kampus, atau kantor. Cabang dapat bersarang (sebuah cabang dapat memiliki cabang turunan), sehingga Anda dapat memodelkan sesuatu seperti "Kampus Utama > Gedung A."

Bidang yang dapat Anda atur untuk sebuah cabang:

* **Title** dan **Description**
* **Parent branch** — Untuk mengorganisasi cabang secara hierarkis
* **IP address** — Opsional, untuk identifikasi berbasis jaringan
* **Latitude / Longitude** — Untuk pemetaan
* **Download / Upload speed** dan **Delay** — Metadata kualitas jaringan yang opsional
* **Administrator e-mail, name, and phone** — Detail kontak bagi siapa pun yang mengelola lokasi tersebut

## Ruangan

**Rooms > Rooms** mengelola ruang yang sebenarnya dapat dipesan di dalam sebuah cabang — biasanya ruang kelas atau ruang pelatihan. Setiap ruangan harus termasuk ke sebuah cabang.

Bidang yang dapat Anda atur untuk sebuah ruangan:

* **Title** dan **Description**
* **Branch** — Cabang mana ruangan ini termasuk (wajib)
* **Floor number**
* **Capacity** — Harus berupa bilangan positif
* **Geolocation**, **IP address**, dan **IP mask** — Bidang lanjutan yang opsional

Setiap ruangan juga memiliki tampilan kalender "Occupation" yang menampilkan pemesanannya, serta jumlah kursus yang menggunakannya.

## Terkait

Untuk menemukan ruangan kosong pada slot waktu tertentu alih-alih menelusuri daftar, lihat [Pencari Ketersediaan Ruangan](room-availability-finder.md).