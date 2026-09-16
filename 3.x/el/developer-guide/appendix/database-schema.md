# Σχήμα Βάσης Δεδομένων

Το Chamilo 3.0 αντιστοιχίζει ένα μεγάλο σύνολο οντοτήτων Doctrine σε πίνακες βάσης δεδομένων. Οι ακριβείς αριθμοί μεταβάλλονται μεταξύ εκδόσεων — συμβουλευτείτε τους καταλόγους οντοτήτων που παρατίθενται παρακάτω για την τρέχουσα κατάσταση.

## Τοποθεσίες οντοτήτων

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | None (e.g., `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (e.g., `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Κύριοι πίνακες

### Χρήστης και αυθεντικοποίηση

| Table | Purpose |
|-------|---------|
| `user` | Λογαριασμοί χρηστών |
| `access_url` | Πύλες πολλαπλών URL |
| `access_url_rel_user` | Αντιστοιχίσεις χρήστη-πύλης |
| `usergroup` | Ομάδες χρηστών σε επίπεδο πλατφόρμας |

### Μαθήματα

| Table | Purpose |
|-------|---------|
| `course` | Μαθήματα |
| `course_category` | Κατηγορίες μαθημάτων |
| `course_rel_user` | Εγγραφές σε μαθήματα |

### Συνεδρίες

| Table | Purpose |
|-------|---------|
| `session` | Εκπαιδευτικές συνεδρίες |
| `session_rel_user` | Εγγραφές σε συνεδρίες |
| `session_rel_course` | Μαθήματα σε συνεδρίες |
| `session_rel_course_rel_user` | Εγγραφή χρήστη ανά συνεδρία-μάθημα |

### Σύστημα πόρων

| Table | Purpose |
|-------|---------|
| `resource_node` | Ενοποιημένη αφαίρεση περιεχομένου |
| `resource_file` | Συνημμένα αρχεία |
| `resource_link` | Ορατότητα/πρόσβαση ανά πλαίσιο |
| `resource_type` | Μητρώο τύπων πόρων |

### Περιεχόμενο μαθήματος (πρόθεμα c_)

| Table | Purpose |
|-------|---------|
| `c_document` | Έγγραφα |
| `c_quiz` | Ασκήσεις/τεστ |
| `c_quiz_question` | Ερωτήσεις κουίζ |
| `c_quiz_answer` | Απαντήσεις ερωτήσεων |
| `c_lp` | Διαδρομές μάθησης |
| `c_lp_item` | Στοιχεία διαδρομών μάθησης |
| `c_forum_category` | Κατηγορίες φόρουμ |
| `c_forum_forum` | Φόρουμ |
| `c_forum_thread` | Νήματα φόρουμ |
| `c_forum_post` | Δημοσιεύσεις φόρουμ |
| `c_student_publication` | Εργασίες/υποβολές |
| `c_survey` | Έρευνες |
| `c_glossary` | Όροι γλωσσαρίου |
| `c_calendar_event` | Συμβάντα ημερολογίου |
| `c_attendance` | Φύλλα παρουσιών |

### Παρακολούθηση

| Table | Purpose |
|-------|---------|
| `track_e_login` | Παρακολούθηση συνδέσεων |
| `track_e_online` | Παρακολούθηση συνδεδεμένων χρηστών |
| `track_e_default` | Γενική παρακολούθηση δραστηριότητας |
| `gradebook_category` | Κατηγορίες βαθμολογίου |
| `gradebook_result` | Βαθμοί |

### Ρυθμίσεις

| Table | Purpose |
|-------|---------|
| `settings` | Ρυθμίσεις πλατφόρμας |
| `settings_options` | Ορισμοί επιλογών ρυθμίσεων |

## Μεταναστεύσεις

Οι αλλαγές στο σχήμα της βάσης δεδομένων διαχειρίζονται μέσω Doctrine Migrations στο `src/CoreBundle/Migrations/`. Εκτελέστε τις μεταναστεύσεις με:

```bash
php bin/console doctrine:migrations:migrate
```