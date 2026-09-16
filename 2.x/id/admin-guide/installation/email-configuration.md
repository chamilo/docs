# Konfigurasi Email

Chamilo kini mengelola konfigurasi pengiriman email dari dasbor administrasi, bagian pengaturan platform (ada entri khusus untuk email). Email dikirim untuk pembuatan akun, pengaturan ulang kata sandi, pemberitahuan kursus, peringatan pesan, dan acara platform lainnya. Pengiriman email dikonfigurasi melalui pengaturan `MAILER_DSN`.

## Konfigurasi

Atur opsi `Mail DSN` di bagian /admin/settings/mail. Formatnya tergantung pada transport email Anda.

### SMTP

Konfigurasi yang paling umum, cocok untuk server SMTP apa pun:

```bash
# Biarkan sistem yang menentukan
native://default

# SMTP Dasar
smtp://username:password@smtp.example.com:587

# SMTP dengan TLS (kebanyakan penyedia)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP tanpa autentikasi (relay lokal)
smtp://localhost:25
```

Ganti `username`, `password`, dan host dengan kredensial server SMTP Anda.

### Amazon SES

```bash
# Menggunakan antarmuka SMTP
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Menggunakan API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Transport Symfony Amazon Mailer sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Transport Symfony Mailjet sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

### Brevo (sebelumnya Sendinblue)

```bash
brevo+api://API_KEY@default
```

Transport Symfony Brevo sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

### Gmail (Pengembangan/Platform Kecil)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Gunakan App Password, bukan kata sandi Gmail biasa Anda. Ini cocok hanya untuk platform kecil atau pengembangan, karena Gmail memiliki batasan pengiriman.

## Pengaturan Email Platform

Selain transport, konfigurasikan identitas pengirim di halaman yang sama:

| Pengaturan | Deskripsi |
|------------|-----------|
| **Kirim semua email sebagai berasal dari nama (organisasi) ini** | Nama tampilan yang terkait dengan email sistem. |
| **Kirim semua email dari alamat email ini** | Alamat "From" untuk semua email sistem. Harus merupakan alamat yang valid yang diterima oleh transport email Anda. Kami merekomendasikan penggunaan alamat "no reply" seperti `no-reply@yourdomain.com` untuk menghindari jawaban yang tidak perlu atas email otomatis. |

## Menguji Pengiriman Email

Setelah mengonfigurasi `MAILER_DSN`, uji apakah email terkirim: Buka *Administrasi* > *Sistem* > *Penguji Email*, tentukan penerima, subjek, dan isi email, lalu klik **Kirim email uji**.

Jika perintah selesai tanpa kesalahan tetapi email tidak diterima:

1. Periksa folder spam/junk penerima.
2. Pastikan domain pengirim Anda memiliki catatan DNS yang tepat (SPF, DKIM, DMARC).
3. Periksa log pengiriman penyedia email Anda untuk melihat apakah ada penolakan atau pantulan.
4. Tinjau log Chamilo di `var/log/prod.log` untuk kesalahan mailer.
5. Di pengaturan konfigurasi email, aktifkan *Mail: Debug* (tidak tersedia di versi 2.0, akan segera hadir).

## Eksperimental: Antrean Email (Pengiriman Asinkron)

Secara default, email dikirim secara sinkron selama permintaan web. Untuk performa yang lebih baik, konfigurasikan pengiriman asinkron menggunakan Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Dengan pengiriman asinkron, email akan diantrekan dan dikirim oleh pekerja latar belakang:

```bash
php bin/console messenger:consume async
```

Jalankan ini sebagai layanan sistem (misalnya, melalui systemd atau supervisord) agar tetap berjalan.

## Tips

* **Gunakan layanan email khusus** (SES, Mailjet, Brevo) untuk platform produksi. SMTP langsung ke server email Anda sendiri memerlukan konfigurasi yang cermat untuk menghindari masalah pengiriman.
* **Konfigurasikan catatan DNS SPF, DKIM, dan DMARC** untuk domain pengirim Anda guna memaksimalkan tingkat pengiriman dan mencegah email ditandai sebagai spam. Anda juga dapat mengonfigurasi header DKIM dari halaman pengaturan email.
* **Gunakan pengiriman asinkron** pada platform dengan lebih dari beberapa lusin pengguna aktif -- pengiriman email sinkron dapat memperlambat permintaan web secara nyata.