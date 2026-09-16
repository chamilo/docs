# Γλωσσάρι

Όροι με έμφαση στους προγραμματιστές που χρησιμοποιούνται σε όλο αυτόν τον οδηγό.

| Όρος | Ορισμός |
|------|---------|
| **API Platform** | Ένα framework PHP για τη δημιουργία REST και GraphQL APIs, ενσωματωμένο με το Symfony. Το Chamilo το χρησιμοποιεί για αυτόματη παραγωγή API endpoints από Doctrine entities. |
| **Bundle** | Μονάδα οργάνωσης του Symfony παρόμοια με plugin ή module. Το Chamilo έχει τρία: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Ένα pattern του Vue 3 για εξαγωγή και επαναχρησιμοποίηση reactive logic. Αποθηκεύεται στο `assets/vue/composables/`. |
| **Doctrine ORM** | Το PHP object-relational mapper που χρησιμοποιεί το Chamilo. Χαρτογραφεί PHP entity classes σε πίνακες βάσης δεδομένων. |
| **Entity** | Μια PHP κλάση σχολιασμένη με Doctrine attributes που χαρτογραφείται σε πίνακα βάσης δεδομένων. |
| **Encore** | Symfony Webpack Encore — ένα wrapper γύρω από το Webpack που απλοποιεί τη διαμόρφωση build του frontend. |
| **Flysystem** | Μια βιβλιοθήκη PHP αφαίρεσης filesystem. Το Chamilo το χρησιμοποιεί για υποστήριξη τοπικής, S3, Azure και GCS αποθήκευσης. |
| **JWT** | JSON Web Token — ο μηχανισμός πιστοποίησης για το REST API. |
| **Pinia** | Η συνιστώμενη βιβλιοθήκη διαχείρισης κατάστασης για Vue 3. Χρησιμοποιείται για νέα stores στο Chamilo· τα legacy Vuex stores παραμένουν παράλληλα. |
| **PrimeVue** | Η βιβλιοθήκη UI components του Vue 3 που χρησιμοποιεί το Chamilo. Παρέχει κουμπιά, πίνακες, διαλόγους κ.λπ. |
| **ResourceNode** | Η κεντρική entity στο σύστημα πόρων του Chamilo. Κάθε κομμάτι περιεχομένου μαθήματος έχει ένα ResourceNode. |
| **ResourceFile** | Μια entity που αντιπροσωπεύει ένα αρχείο συνδεδεμένο με ResourceNode. Αποθηκεύεται μέσω Flysystem. |
| **ResourceLink** | Μια entity που ελέγχει την ορατότητα και την πρόσβαση ανά πλαίσιο μαθήματος/συνεδρίας/ομάδας. |
| **SCORM** | Sharable Content Object Reference Model. Ένα πρότυπο e-learning για συσκευασία περιεχομένου. |
| **Settings Schema** | Μια PHP κλάση που ορίζει μια κατηγορία ρυθμίσεων πλατφόρμας (π.χ., SecuritySettingsSchema). |
| **Voter** | Ένα Symfony security component που αποφασίζει αν ένας χρήστης μπορεί να εκτελέσει μια ενέργεια σε έναν πόρο. |
| **Webpack** | Ο JavaScript module bundler που μεταγλωττίζει Vue components, SCSS και TypeScript σε bundles έτοιμα για τον browser. |