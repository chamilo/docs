# Webhooks

Dukungan webhook Chamilo saat ini terbatas pada **plugin BigBlueButton (BBB)**. Alih-alih mengirim webhook ke sistem eksternal, Chamilo bertindak sebagai *penerima* webhook: Chamilo mengekspos endpoint yang dipanggil BigBlueButton saat peristiwa ruang terjadi, dan menggunakan peristiwa tersebut untuk membangun metrik aktivitas per peserta.

## How It Works

Ketika rapat BBB berlangsung, server BBB mendorong notifikasi peristiwa waktu nyata ke URL callback bertanda tangan pada instalasi Chamilo Anda. Chamilo memproses setiap peristiwa dan menyimpan metrik teragregasi (waktu bicara, waktu kamera, pesan, reaksi, angkat tangan) dalam tabel basis data `conference_activity`.

```
BigBlueButton server
        │  POST (signed)
        ▼
Chamilo webhook endpoint
        │
        ▼
conference_activity (metrics JSON)
        │
        ▼
Webhook dashboard (/plugin/Bbb/webhook_dashboard.php)
```

## Endpoints

### Legacy PHP endpoint

```
POST /plugin/Bbb/webhook.php?au={accessUrlId}&mid={meetingId}&ts={timestamp}&sig={hmac}
```

Menangani semua peristiwa ruang BBB. Memvalidasi tanda tangan HMAC, lalu melakukan upsert baris `ConferenceActivity` dan memperbarui field JSON metrik.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Didefinisikan melalui API Platform pada entitas `ConferenceActivity`. Memerlukan header tanda tangan untuk pencatatan aktivitas; permintaan tanpa tanda tangan yang valid diterima tetapi tidak ada baris aktivitas yang ditulis.

## Configuration (BBB Plugin)

Di **Administration → Plugins → BigBlueButton**, pengaturan webhook berikut tersedia:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Mengaktifkan atau menonaktifkan pendaftaran webhook |
| `webhooks_scope` | `per_meeting` / `global` | Mendaftarkan satu hook per rapat atau satu hook global untuk semua rapat |
| `webhooks_hash_algo` | `sha256` / `sha1` | Algoritma HMAC untuk verifikasi tanda tangan |
| `webhooks_event_filter` | comma-separated string | Daftar opsional nama peristiwa BBB yang akan diterima (kosong = semua peristiwa) |

Ketika rapat dibuat dan webhook diaktifkan, Chamilo memanggil API BBB `hooks/create` untuk mendaftarkan URL callback. URL tersebut menyertakan tanda tangan HMAC yang terikat waktu.

## Signature Validation

Endpoint lama menggunakan parameter query-string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- `salt` adalah nilai salt yang dikonfigurasi pada plugin BBB.
- Permintaan yang lebih lama dari **15 menit** ditolak untuk membatasi serangan replay.

Endpoint modern menggunakan header:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Permintaan yang lebih lama dari **5 menit** ditolak.

## Example: BigBlueButton Webhook Event

BBB mengirim body JSON yang berisi array peristiwa. Setiap peristiwa memiliki `data.id` (nama peristiwa) dan objek `data.attributes`.

**Request from BBB:**

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

**What Chamilo does:**

1. Memvalidasi tanda tangan HMAC dan stempel waktu.
2. Mencari `ConferenceMeeting` berdasarkan `remote_id`.
3. Mencari (atau membuat) baris `ConferenceActivity` yang terbuka untuk rapat + pengguna tersebut.
4. Mencatat `temp.talk_started_at = 1715520123` dalam JSON metrik.

Ketika peristiwa `user-talking-stopped` yang cocok tiba, Chamilo menghitung detik yang berlalu dan menambahkannya ke `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Baris aktivitas dibuat |
| `user-talking-started` / `uservoiceactivated` | Penghitung waktu dimulai untuk `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | `totals.talk_seconds` ditambah |
| `camera-share-started` / `webcamsharestarted` | Penghitung waktu dimulai untuk `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | `totals.camera_seconds` ditambah |
| `chat-message-posted` / `publicchatmessageposted` | `counts.messages` ditambah |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + rincian per-emoji |
| `user-hand-raised` / `userraisedhand` | `counts.hands` ditambah |
| `user-left` / `participantleft` | Penghitung waktu terbuka dikosongkan, baris aktivitas ditutup |

## Struktur Data Metrik

Metrik disimpan sebagai kolom JSON pada `ConferenceActivity`:

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

Bidang `temp` menyimpan stempel waktu mulai penghitung waktu yang sedang berjalan; bidang tersebut dikosongkan ketika peristiwa berhenti yang sesuai tiba atau ketika peserta meninggalkan sesi.

## Dasbor Webhook

Dasbor admin tersedia di `/plugin/Bbb/webhook_dashboard.php`. Dasbor ini menampilkan metrik waktu nyata dan historis per peserta untuk suatu rapat: waktu koneksi, waktu berbicara, waktu kamera, jumlah pesan, jumlah reaksi, dan pengangkatan tangan. Data dapat diekspor sebagai CSV.

## Mendaftarkan dan Membersihkan Hook

Kelas `BbbLib` menyediakan metode untuk mengelola pendaftaran hook pada server BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Perluasan ke Sumber Peristiwa Lain

Saat ini tidak ada sistem webhook keluar yang generik di Chamilo (yaitu, tidak ada cara bawaan untuk POST ke URL eksternal ketika seorang pengguna mendaftar atau menyelesaikan suatu kursus). Jika Anda memerlukan perilaku tersebut, pilihannya meliputi:

- Menulis plugin yang mendengarkan peristiwa Symfony dan mengirimkan panggilan HTTP (lihat [Plugin](../plugins/README.md) dan [Sistem Peristiwa](../events.md)).
- Menggunakan REST API untuk melakukan polling perubahan status dari sistem eksternal.