# Webhooks

Η υποστήριξη webhooks του Chamilo περιορίζεται προς το παρόν στο **πρόσθετο BigBlueButton (BBB)**. Αντί να στέλνει webhooks σε εξωτερικά συστήματα, το Chamilo λειτουργεί ως *δέκτης* webhook: εκθέτει τελικά σημεία που καλεί το BigBlueButton όταν συμβαίνουν γεγονότα αίθουσας και χρησιμοποιεί αυτά τα γεγονότα για να δημιουργήσει μετρήσεις δραστηριότητας ανά συμμετέχοντα.

## How It Works

Όταν πραγματοποιείται μια συνάντηση BBB, ο διακομιστής BBB προωθεί ειδοποιήσεις γεγονότων σε πραγματικό χρόνο σε μια υπογεγραμμένη διεύθυνση URL επιστροφής κλήσης στην εγκατάσταση Chamilo. Το Chamilo επεξεργάζεται κάθε γεγονός και αποθηκεύει συγκεντρωτικές μετρήσεις (χρόνος ομιλίας, χρόνος κάμερας, μηνύματα, αντιδράσεις, σήκωμα χεριού) στον πίνακα βάσης δεδομένων `conference_activity`.

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

Διαχειρίζεται όλα τα γεγονότα αίθουσας BBB. Επικυρώνει την υπογραφή HMAC, στη συνέχεια κάνει upsert μιας γραμμής `ConferenceActivity` και ενημερώνει το πεδίο JSON των μετρήσεων.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Ορίζεται μέσω του API Platform στην οντότητα `ConferenceActivity`. Απαιτεί τις κεφαλίδες υπογραφής για την καταγραφή δραστηριότητας· αιτήματα χωρίς έγκυρη υπογραφή γίνονται δεκτά αλλά δεν εγγράφεται γραμμή δραστηριότητας.

## Configuration (BBB Plugin)

Στο **Διαχείριση → Πρόσθετα → BigBlueButton**, είναι διαθέσιμες οι ακόλουθες ρυθμίσεις webhook:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Ενεργοποίηση ή απενεργοποίηση εγγραφής webhook |
| `webhooks_scope` | `per_meeting` / `global` | Εγγραφή ενός hook ανά συνάντηση ή ενός ενιαίου καθολικού hook για όλες τις συναντήσεις |
| `webhooks_hash_algo` | `sha256` / `sha1` | Αλγόριθμος HMAC για επαλήθευση υπογραφής |
| `webhooks_event_filter` | comma-separated string | Προαιρετική λίστα ονομάτων γεγονότων BBB προς λήψη (κενό = όλα τα γεγονότα) |

Όταν δημιουργείται μια συνάντηση και τα webhooks είναι ενεργοποιημένα, το Chamilo καλεί το API `hooks/create` του BBB για να καταχωρίσει τη διεύθυνση URL επιστροφής κλήσης. Η διεύθυνση URL περιλαμβάνει μια υπογραφή HMAC με χρονικό όριο.

## Signature Validation

Το παλαιό τελικό σημείο χρησιμοποιεί παραμέτρους συμβολοσειράς ερωτήματος:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Το `salt` είναι η διαμορφωμένη τιμή salt του πρόσθετου BBB.
- Αιτήματα παλαιότερα από **15 λεπτά** απορρίπτονται για περιορισμό επιθέσεων επανάληψης.

Το σύγχρονο τελικό σημείο χρησιμοποιεί κεφαλίδες:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Αιτήματα παλαιότερα από **5 λεπτά** απορρίπτονται.

## Example: BigBlueButton Webhook Event

Το BBB δημοσιεύει ένα σώμα JSON που περιέχει έναν πίνακα γεγονότων. Κάθε γεγονός έχει ένα `data.id` (όνομα γεγονότος) και ένα αντικείμενο `data.attributes`.

**Αίτημα από το BBB:**

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

**Τι κάνει το Chamilo:**

1. Επικυρώνει την υπογραφή HMAC και τη χρονική σήμανση.
2. Αναζητά το `ConferenceMeeting` βάσει του `remote_id`.
3. Αναζητά (ή δημιουργεί) μια ανοιχτή γραμμή `ConferenceActivity` για εκείνη τη συνάντηση + χρήστη.
4. Καταγράφει `temp.talk_started_at = 1715520123` στο JSON των μετρήσεων.

Όταν φτάσει το αντίστοιχο γεγονός `user-talking-stopped`, το Chamilo υπολογίζει τα δευτερόλεπτα που παρήλθαν και τα προσθέτει στο `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Δημιουργία γραμμής δραστηριότητας |
| `user-talking-started` / `uservoiceactivated` | Έναρξη χρονομέτρου για `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | Αύξηση του `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | Έναρξη χρονομέτρου για `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | Αύξηση του `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | Αύξηση του `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | `counts.reactions` + ανάλυση ανά emoji |
| `user-hand-raised` / `userraisedhand` | Αύξηση του `counts.hands` |
| `user-left` / `participantleft` | Εκκαθάριση ανοιχτών χρονομέτρων, κλείσιμο γραμμής δραστηριότητας |

## Δομή Δεδομένων Μετρικών

Οι μετρικές αποθηκεύονται ως στήλη JSON στο `ConferenceActivity`:

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

Τα πεδία `temp` διατηρούν χρονοσήμανσεις έναρξης χρονομέτρων σε εξέλιξη· εκκαθαρίζονται όταν φτάσει το αντίστοιχο γεγονός διακοπής ή όταν ο συμμετέχων αποχωρήσει.

## Πίνακας Ελέγχου Webhook

Ένας πίνακας ελέγχου διαχειριστή είναι διαθέσιμος στη διεύθυνση `/plugin/Bbb/webhook_dashboard.php`. Εμφανίζει μετρικές πραγματικού χρόνου και ιστορικές μετρικές ανά συμμετέχοντα για μια δεδομένη συνάντηση: χρόνο σύνδεσης, χρόνο ομιλίας, χρόνο κάμερας, πλήθος μηνυμάτων, πλήθος αντιδράσεων και σηκώματα χεριού. Τα δεδομένα μπορούν να εξαχθούν ως CSV.

## Καταχώριση και Εκκαθάριση Hooks

Η κλάση `BbbLib` παρέχει μεθόδους για τη διαχείριση της καταχώρισης hook στον διακομιστή BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Register (or confirm) a per-meeting hook after a user joins |
| `ensureGlobalWebhook()` | Register a single global hook covering all meetings |
| `cleanupWebhooks($meetingId)` | Delete Chamilo-registered hooks from the BBB server |
| `BbbPlugin::checkWebhooksHealth()` | Validate that the BBB `hooks/list` endpoint is reachable |

## Επέκταση σε Άλλες Πηγές Γεγονότων

Προς το παρόν δεν υπάρχει γενικό σύστημα εξερχόμενων webhook στο Chamilo (δηλαδή, κανένας ενσωματωμένος τρόπος για POST σε εξωτερικό URL όταν ένας χρήστης εγγράφεται ή ολοκληρώνει ένα μάθημα). Εάν χρειάζεστε αυτή τη συμπεριφορά, οι επιλογές περιλαμβάνουν:

- Τη συγγραφή ενός πρόσθετου που ακούει γεγονότα Symfony και αποστέλλει κλήσεις HTTP (βλ. [Πρόσθετα](../plugins/README.md) και [Σύστημα Γεγονότων](../events.md)).
- Τη χρήση του REST API για περιοδικό έλεγχο αλλαγών κατάστασης από ένα εξωτερικό σύστημα.