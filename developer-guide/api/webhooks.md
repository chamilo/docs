# Webhooks

Dukungan webhook di Chamilo saat ini terbatas pada **plugin BigBlueButton (BBB)**. Alih-alih mengirim webhook ke sistem eksternal, Chamilo berfungsi sebagai *penerima* webhook: platform ini menyediakan endpoint yang dipanggil oleh BigBlueButton ketika terjadi peristiwa di ruang rapat, dan menggunakan peristiwa tersebut untuk membangun metrik aktivitas per peserta.

## Cara Kerja

Ketika rapat BBB berlangsung, server BBB mengirimkan notifikasi peristiwa secara real-time ke URL callback yang ditandatangani di instalasi Chamilo Anda. Chamilo memproses setiap peristiwa dan menyimpan metrik agregat (waktu berbicara, waktu kamera, pesan, reaksi, tangan terangkat) di tabel basis data `conference_activity`.

```
Server BigBlueButton
        │  POST (ditandatangani)
        ▼
Endpoint webhook Chamilo
        │
        ▼
conference_activity (JSON metrik)
        │
        ▼
Dashboard webhook (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoint

### Endpoint PHP Lama

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Mengatur semua peristiwa ruang BBB. Memvalidasi tanda tangan HMAC, kemudian menyisipkan atau memperbarui baris `ConferenceActivity` dan memperbarui kolom JSON metrik.

### Endpoint Modern Symfony

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Ditetapkan melalui API Platform pada entitas `ConferenceActivity`. Memerlukan header tanda tangan untuk pencatatan aktivitas; permintaan tanpa tanda tangan yang valid diterima, tetapi tidak ada baris aktivitas yang dicatat.

## Konfigurasi (Plugin BBB)

Di **Administrasi → Plugin → BigBlueButton**, pengaturan webhook berikut tersedia:

| Pengaturan | Nilai | Deskripsi |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Mengaktifkan atau menonaktifkan pencatatan webhook |
| `webhooks_scope` | `per_meeting` / `global` | Mendaftarkan hook per rapat atau satu hook global untuk semua rapat |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritma HMAC untuk verifikasi tanda tangan |
| `webhooks_event_filter` | string yang dipisahkan koma | Daftar opsional nama peristiwa BBB yang akan diterima (kosong = semua peristiwa) |

Ketika rapat dibuat dan webhook diaktifkan, Chamilo memanggil API `hooks/create` dari BBB untuk mendaftarkan URL callback. URL tersebut mencakup tanda tangan HMAC yang dibatasi waktu.

## Validasi Tanda Tangan

Endpoint lama menggunakan parameter query-string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` adalah nilai salt yang dikonfigurasi di plugin BBB.
- Permintaan yang lebih dari **15 menit** ditolak untuk membatasi serangan ulang.

Endpoint modern menggunakan header:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Permintaan yang lebih dari **5 menit** ditolak.

## Contoh: Peristiwa Webhook BigBlueButton

BBB mengirimkan tubuh JSON yang berisi array peristiwa. Setiap peristiwa memiliki `data.id` (nama peristiwa) dan objek `data.attributes`.

**Permintaan BBB:**

```http
POST /plugin/Bbb/webhook.php?au=1&mid=chamilo-meeting-abc123&ts=1715520000&sig=e3b0c44298fc
Content-Type: application/json

{
  "events": [
    {
      "data": {
        "id": "user-talking-started",
        "attributes": {
          "meeting":  { "external-meeting-id": "chamilo-meeting-abc123",
                        "internal-meeting-id": "bbb-internal-xyz" },
          "user":     { "internal-user-id": "w_abc123",
                        "external-user-id": "42",
                        "name": "Jane Smith" }
        },
        "event": { "ts": 1715520123 }
      }
    }
  ]
}
```

**Apa yang dilakukan Chamilo:**

1. Memvalidasi tanda tangan HMAC dan timestamp.
2. Mencari `ConferenceMeeting` berdasarkan `remote_id`.
3. Mencari (atau membuat) baris terbuka `ConferenceActivity` untuk rapat + pengguna tersebut.
4. Mencatat `temp.talk_started_at = 1715520123` di JSON metrik.

Ketika peristiwa yang sesuai `user-talking-stopped` tiba, Chamilo menghitung detik yang telah berlalu dan menambahkannya ke `totals.talk_seconds`.

---
## Peristiwa yang Dilacak dan Metrik

| Peristiwa BBB | Metrik yang Diperbarui |
|---|---|
| `user-joined` / `participantjoined` | Baris aktivitas dibuat |
| `user-talking-started` / `uservoiceactivated` | Pengatur waktu dimulai untuk `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` bertambah |
| `camera-share-started` / `webcamsharestarted` | Pengatur waktu dimulai untuk `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` bertambah |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` bertambah |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + rincian berdasarkan emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` bertambah |
| `user-left` / `participantleft` | Pengatur waktu yang terbuka selesai, baris aktivitas ditutup |

---
## Struktur Data Metrik

Metrik disimpan sebagai kolom JSON di `ConferenceActivity`:

```json
{
  "totals": {
    "talk_seconds":   142,
    "camera_seconds": 95
  },
  "counts": {
    "messages":  7,
    "reactions": 3,
    "hands":     1,
    "reactions_breakdown": {
      "👍": 2,
      "❤️": 1
    }
  },
  "temp": {
    "talk_started_at":   0,
    "camera_started_at": 0
  }
}
```

Kolom `temp` menyimpan cap waktu mulai dari pengatur waktu yang sedang berjalan; kolom ini akan dihapus ketika peristiwa berhenti yang sesuai tiba atau ketika peserta keluar.

## Dasbor Kontrol Webhook

Sebuah dasbor administratif tersedia di `/plugin/Bbb/webhook_dashboard.php`. Dasbor ini menampilkan metrik secara real-time dan historis per peserta untuk rapat tertentu: waktu koneksi, waktu berbicara, waktu kamera, jumlah pesan, jumlah reaksi, dan jumlah mengangkat tangan. Data dapat diekspor sebagai CSV.

## Pendaftaran dan Pembersihan Hook

Kelas `BbbLib` menyediakan metode untuk mengelola pendaftaran hook di server BBB:

| Metode | Deskripsi |
|---|---|
| `ensureHookForMeeting($remoteId)` | Mendaftarkan (atau mengonfirmasi) hook per rapat setelah pengguna bergabung |
| `ensureGlobalWebhook()` | Mendaftarkan satu hook global yang mencakup semua rapat |
| `cleanupWebhooks($meetingId)` | Menghapus hook yang didaftarkan oleh Chamilo dari server BBB |
| `BbbPlugin::checkWebhooksHealth()` | Memvalidasi apakah endpoint `hooks/list` dari BBB dapat diakses |

## Ekstensi untuk Sumber Peristiwa Lain

Saat ini, tidak ada sistem webhook keluar generik di Chamilo (yaitu, tidak ada cara bawaan untuk melakukan POST ke URL eksternal ketika pengguna mendaftar atau menyelesaikan kursus). Jika Anda membutuhkan perilaku ini, opsi yang tersedia meliputi:

- Menulis plugin yang mendengarkan peristiwa dari Symfony dan memicu panggilan HTTP (lihat [Plugins](../plugins/README.md) dan [Sistem Peristiwa](../events.md)).
- Menggunakan API REST untuk memantau perubahan status dari sistem eksternal.