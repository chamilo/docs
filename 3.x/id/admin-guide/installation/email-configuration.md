# Konfigurasi Email

Chamilo kini mengelola konfigurasi pengiriman email dari dasbor administrasi, bagian pengaturan platform (terdapat entri khusus untuk email). Email dikirim untuk pembuatan akun, pengaturan ulang kata sandi, notifikasi kursus, peringatan pesan, dan peristiwa platform lainnya. Pengiriman email dikonfigurasi melalui pengaturan konfigurasi `MAILER_DSN`.

## Konfigurasi

Atur opsi `Mail DSN` di bagian /admin/settings/mail. Formatnya bergantung pada transport email Anda.

### SMTP

Konfigurasi yang paling umum, cocok untuk server SMTP mana pun:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Ganti `username`, `password`, dan host dengan kredensial server SMTP Anda.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Transport Symfony Amazon Mailer sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Transport Symfony Mailjet sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

### Brevo (formerly Sendinblue)

```bash
brevo+api://API_KEY@default
```

Transport Symfony Brevo sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft sedang menghentikan SMTP dengan autentikasi dasar di Exchange Online, sehingga DSN `smtp://user:password@smtp.office365.com:587` biasa hanya berfungsi selama administrator tenant Anda tetap mengaktifkan "Authenticated SMTP" secara eksplisit pada kotak surat tertentu tersebut. Kirim melalui Microsoft Graph API sebagai gantinya — metode ini tidak menggunakan SMTP sama sekali:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Transport Symfony Microsoft Graph sudah tertanam di Chamilo. Tidak diperlukan instalasi tambahan.

Untuk memperoleh ketiga nilai tersebut, di [pusat admin Microsoft Entra](https://entra.microsoft.com):

1. Daftarkan sebuah aplikasi. **Application (client) ID** dan **Directory (tenant) ID**-nya adalah `CLIENT_ID` dan `TENANT_ID`.
2. Di bawah *API permissions*, tambahkan izin **application** Microsoft Graph `Mail.Send` (bukan yang delegated), lalu berikan persetujuan admin.
3. Di bawah *Certificates & secrets*, buat client secret. **Nilainya** (bukan ID-nya) adalah `CLIENT_SECRET`.

Catatan:

* URL-encode setiap karakter yang memiliki makna khusus dalam URL yang muncul di client secret (`@` sebagai `%40`, `+` sebagai `%2B`, `/` sebagai `%2F`, dan seterusnya).
* Alamat yang dikonfigurasi di **Send all e-mails from this e-mail address** harus berupa kotak surat nyata di dalam tenant Anda, jika tidak Microsoft akan menolak pesan tersebut.
* Tambahkan `&noSave=true` ke DSN jika Anda tidak ingin salinan setiap email platform disimpan di folder *Sent Items* pengirim.
* Untuk cloud nasional, arahkan DSN ke endpoint yang tepat, tanpa prefiks `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Peringatan keamanan:** izin *application* `Mail.Send` memungkinkan aplikasi terdaftar mengirim email sebagai **sembarang** kotak surat di tenant, bukan hanya yang digunakan Chamilo. Batasi ke kotak surat pengirim dengan kebijakan akses aplikasi Exchange Online:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (Pengembangan/Platform Kecil)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Gunakan App Password, bukan kata sandi Gmail biasa Anda. Ini hanya cocok untuk platform kecil atau pengembangan, karena Gmail memiliki batas pengiriman.

## Pengaturan Email Platform

Selain transport, konfigurasikan identitas pengirim pada halaman yang sama:

| Pengaturan | Deskripsi |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | Nama tampilan yang dikaitkan dengan email sistem. |
| **Send all e-mails from this e-mail address** | Alamat "From" untuk semua email sistem. Harus berupa alamat valid yang diterima oleh transport email Anda. Kami merekomendasikan penggunaan alamat "no reply" seperti `no-reply@yourdomain.com` untuk menghindari jawaban yang tidak berguna terhadap email otomatis. |

## Pengujian Pengiriman Email

Setelah mengonfigurasi `MAILER_DSN`, uji bahwa email terkirim: Buka *Administration* > *System* > *E-mail tester*, tentukan penerima, subjek, dan isi email, lalu klik **Send test email**.

Jika perintah selesai tanpa kesalahan tetapi email tidak diterima:

1. Periksa folder spam/junk penerima.
2. Pastikan domain pengirim memiliki catatan DNS yang benar (SPF, DKIM, DMARC).
3. Periksa log pengiriman penyedia email Anda untuk bounce atau penolakan.
4. Tinjau log Chamilo di `var/log/prod.log` untuk kesalahan mailer.
5. Di pengaturan E-mail configuration, aktifkan *Mail: Debug* (tidak tersedia di 3.0, akan segera tersedia).

## Eksperimental: Antrian Email (Pengiriman Asinkron)

Secara default, email dikirim secara sinkron selama permintaan web. Untuk kinerja yang lebih baik, konfigurasikan pengiriman asinkron menggunakan Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Dengan pengiriman asinkron, email diantrikan dan dikirim oleh worker latar belakang:

```bash
php bin/console messenger:consume async
```

Jalankan ini sebagai layanan sistem (misalnya, melalui systemd atau supervisord) agar tetap berjalan.

## Tips

* **Gunakan layanan email khusus** (SES, Mailjet, Brevo) untuk platform produksi. SMTP langsung ke server email Anda sendiri memerlukan konfigurasi yang cermat agar terhindar dari masalah keterkiriman.
* **Konfigurasikan catatan DNS SPF, DKIM, dan DMARC** untuk domain pengirim Anda guna memaksimalkan tingkat pengiriman dan mencegah email ditandai sebagai spam. Anda juga dapat mengonfigurasi header DKIM dari halaman pengaturan e-mail.
* **Gunakan pengiriman asinkron** pada platform dengan lebih dari beberapa puluh pengguna aktif -- pengiriman email sinkron dapat memperlambat permintaan web secara nyata.