# LDAP

Chamilo dapat mengautentikasi pengguna melalui server LDAP, termasuk Microsoft Active Directory. LDAP dikonfigurasi di `config/authentication.yaml`.

## Konfigurasi

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Masuk dengan LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind dan Pencarian

Ada dua pendekatan untuk menemukan pengguna di direktori:

**Direct bind** — membangun DN dari nama pengguna secara langsung:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — mencari direktori dengan akun layanan terlebih dahulu, kemudian melakukan bind sebagai pengguna yang ditemukan:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Untuk Active Directory, gunakan `sAMAccountName` sebagai `uid_key` dan sesuaikan `query_string` menjadi `(sAMAccountName=%s)`.

### Pemetaan Atribut

Peta atribut LDAP ke bidang pengguna Chamilo di bawah `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # opsional
          locale: preferredLanguage  # opsional
```

`firstname`, `lastname`, dan `email` wajib diisi. Pengguna dicocokkan dengan akun Chamilo yang sudah ada berdasarkan email atau nama pengguna; jika tidak ditemukan kecocokan dan `allow_create_new_users` bernilai true, akun baru akan dibuat.

## Tips

* **Gunakan LDAPS di lingkungan produksi** — ubah `ldap://` menjadi `ldaps://` (port 636) untuk koneksi terenkripsi.
* **Akun layanan** — akun search bind hanya membutuhkan akses baca ke entri pengguna.
* **Uji terlebih dahulu** — verifikasi string koneksi dan kueri Anda dengan `ldapsearch` sebelum mengkonfigurasi Chamilo.
* **`force_as_login_method: true`** — menyembunyikan metode login lain dan memaksa semua pengguna melalui LDAP. Biarkan bernilai `false` saat pengujian agar Anda masih dapat masuk sebagai admin melalui formulir standar.

Untuk referensi parameter lengkap, lihat [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).