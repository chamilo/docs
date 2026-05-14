# Webhooks

Η υποστήριξη webhooks του Chamilo περιορίζεται αυτή τη στιγμή στο **BigBlueButton (BBB) plugin**. Αντί να στέλνει webhooks σε εξωτερικά συστήματα, το Chamilo λειτουργεί ως *παραλήπτης* webhook: εκθέτει endpoints που καλεί το BigBlueButton όταν συμβαίνουν γεγονότα δωματίου, και χρησιμοποιεί αυτά τα γεγονότα για να δημιουργήσει μετρήσεις δραστηριότητας ανά συμμετέχοντα.

## Πώς Λειτουργεί

Όταν πραγματοποιείται μια συνάντηση BBB, ο διακομιστής BBB στέλνει ειδοποιήσεις γεγονότων σε πραγματικό χρόνο σε ένα υπογεγραμμένο URL callback στην εγκατάστασή σας Chamilo. Το Chamilo επεξεργάζεται κάθε γεγονός και αποθηκεύει συγκεντρωμένες μετρήσεις (χρόνος ομιλίας, χρόνος κάμερας, μηνύματα, αντιδράσεις, υψωμένα χέρια) στον πίνακα βάσης δεδομένων `conference_activity`.

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

Διαχειρίζεται όλα τα γεγονότα δωματίου BBB. Επαληθεύει την υπογραφή HMAC, στη συνέχεια ενημερώνει ή εισάγει μια γραμμή `ConferenceActivity` και ενημερώνει το πεδίο JSON μετρικών.

### Modern Symfony endpoint

```
POST /api/videoconference/callback
Headers:
  X-Chamilo-Timestamp: <unix timestamp>
  X-Chamilo-Signature: <hmac-sha256>
```

Ορίζεται μέσω API Platform στην οντότητα `ConferenceActivity`. Απαιτεί τα headers υπογραφής για την εγγραφή δραστηριότητας· τα αιτήματα χωρίς έγκυρη υπογραφή γίνονται δεκτά αλλά δεν γράφεται γραμμή δραστηριότητας.

## Configuration (BBB Plugin)

Στο **Administration → Plugins → BigBlueButton**, είναι διαθέσιμες οι εξής ρυθμίσεις webhook:

| Setting | Values | Description |
|---|---|---|
| `webhooks_enabled` | `true` / `false` | Ενεργοποίηση ή απενεργοποίηση εγγραφής webhook |
| `webhooks_scope` | `per_meeting` / `global` | Εγγραφή ενός hook ανά συνάντηση ή ενός ενιαίου global hook για όλες τις συναντήσεις |
| `webhooks_hash_algo` | `sha256` / `sha1` | Αλγόριθμος HMAC για επαλήθευση υπογραφής |
| `webhooks_event_filter` | comma-separated string | Προαιρετική λίστα ονομάτων γεγονότων BBB για λήψη (κενό = όλα τα γεγονότα) |

Όταν δημιουργείται μια συνάντηση και τα webhooks είναι ενεργοποιημένα, το Chamilo καλεί το API BBB `hooks/create` για να εγγράψει το URL callback. Το URL περιλαμβάνει μια υπογραφή HMAC περιορισμένη χρονικά.

## Signature Validation

Το legacy endpoint χρησιμοποιεί παραμέτρους query-string:

```
sig = HMAC-{algo}("{accessUrlId}|{meetingId}|{timestamp}", salt)
```

- Το `salt` είναι η ρυθμισμένη τιμή salt του BBB plugin.
- Τα αιτήματα παλαιότερα των **15 λεπτών** απορρίπτονται για περιορισμό επιθέσεων replay.

Το modern endpoint χρησιμοποιεί headers:

```
sig = HMAC-SHA256("{timestamp}\n{rawBody}", kernelSecret)
```

- Τα αιτήματα παλαιότερα των **5 λεπτών** απορρίπτονται.

## Example: BigBlueButton Webhook Event

Το BBB στέλνει σώμα JSON που περιέχει πίνακα γεγονότων. Κάθε γεγονός έχει `data.id` (όνομα γεγονότος) και αντικείμενο `data.attributes`.

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

1. Επαληθεύει την υπογραφή HMAC και τη χρονοσφραγίδα.
2. Αναζητά το `ConferenceMeeting` βάσει `remote_id`.
3. Αναζητά (ή δημιουργεί) μια ανοιχτή γραμμή `ConferenceActivity` για αυτή τη συνάντηση + χρήστη.
4. Καταγράφει `temp.talk_started_at = 1715520123` στο JSON μετρικών.

Όταν φτάσει το αντίστοιχο γεγονός `user-talking-stopped`, το Chamilo υπολογίζει τα δευτερόλεπτα που πέρασαν και τα προσθέτει στο `totals.talk_seconds`.

## Tracked Events and Metrics

| BBB event(s) | Metric updated |
|---|---|
| `user-joined` / `participantjoined` | Δημιουργείται γραμμή δραστηριότητας |
| `user-talking-started` / `uservoiceactivated` | Ξεκινά χρονόμετρο για `totals.talk_seconds` |
| `user-talking-stopped` / `uservoicedeactivated` | Ενημερώνεται το `totals.talk_seconds` |
| `camera-share-started` / `webcamsharestarted` | Ξεκινά χρονόμετρο για `totals.camera_seconds` |
| `camera-share-stopped` / `webcamsharestopped` | Ενημερώνεται το `totals.camera_seconds` |
| `chat-message-posted` / `publicchatmessageposted` | Ενημερώνεται το `counts.messages` |
| `user-reaction-changed` / `useremojichanged` | Ενημερώνεται το `counts.reactions` + ανάλυση ανά emoji |
| `user-hand-raised` / `userraisedhand` | Ενημερώνεται το `counts.hands` |
| `user-left` / `participantleft` | Εκκαθαρίζονται ανοιχτά χρονόμετρα, κλείνει γραμμή δραστηριότητας |

---
## Δομή Δεδομένων Μετρήσεων

Οι μετρήσεις αποθηκεύονται ως στήλη JSON στον πίνακα `ConferenceActivity`:

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

Τα πεδία `temp` περιέχουν χρονικές σφραγίδες έναρξης χρονομέτρων σε εξέλιξη· καθαρίζονται όταν φτάσει το αντίστοιχο γεγονός διακοπής ή όταν ο συμμετέχων αποχωρήσει.

## Πίνακας Ελέγχου Webhook

Ένας πίνακας ελέγχου για διαχειριστές είναι διαθέσιμος στη διεύθυνση `/plugin/Bbb/webhook_dashboard.php`. Εμφανίζει μετρήσεις σε πραγματικό χρόνο και ιστορικές ανά συμμετέχοντα για μια δεδομένη συνάντηση: χρόνος σύνδεσης, χρόνος ομιλίας, χρόνος κάμερας, αριθμός μηνυμάτων, αριθμός αντιδράσεων και σηκώματα χεριού. Τα δεδομένα μπορούν να εξαχθούν ως CSV.

## Εγγραφή και Καθαρισμός Hooks

Η κλάση `BbbLib` παρέχει μεθόδους για τη διαχείριση της εγγραφής hooks στον διακομιστή BBB:

| Method | Description |
|---|---|
| `ensureHookForMeeting($remoteId)` | Εγγραφή (ή επιβεβαίωση) ενός hook ανά συνάντηση μετά την είσοδο χρήστη |
| `ensureGlobalWebhook()` | Εγγραφή ενός ενιαίου global hook που καλύπτει όλες τις συναντήσεις |
| `cleanupWebhooks($meetingId)` | Διαγραφή hooks εγγεγραμμένων από το Chamilo από τον διακομιστή BBB |
| `BbbPlugin::checkWebhooksHealth()` | Επικύρωση ότι το endpoint `hooks/list` του BBB είναι προσβάσιμο |

## Επέκταση σε Άλλες Πηγές Γεγονότων

Προς το παρόν δεν υπάρχει γενικό σύστημα εξερχόμενων webhook στο Chamilo (δηλαδή, καμία ενσωματωμένη μέθοδος για να γίνει POST σε εξωτερική διεύθυνση URL όταν ένας χρήστης εγγράφεται ή ολοκληρώνει μάθημα). Αν χρειάζεστε αυτή τη συμπεριφορά, οι επιλογές περιλαμβάνουν:

- Γράψιμο plugin που ακούει Symfony events και στέλνει HTTP κλήσεις (δείτε [Plugins](../plugins/README.md) και [Event System](../events.md)).
- Χρήση του REST API για polling αλλαγών κατάστασης από εξωτερικό σύστημα.