# Glossar

Entwicklerorientierte Begriffe, die in diesem Leitfaden verwendet werden.

| Begriff | Definition |
|---------|------------|
| **API Platform** | Ein PHP-Framework zum Erstellen von REST- und GraphQL-APIs, integriert mit Symfony. Chamilo verwendet es, um API-Endpunkte automatisch aus Doctrine-Entitäten zu generieren. |
| **Bundle** | Eine organisatorische Einheit in Symfony, ähnlich einem Plugin oder Modul. Chamilo hat drei: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Ein Vue 3-Muster zur Extraktion und Wiederverwendung reaktiver Logik. Gespeichert in `assets/vue/composables/`. |
| **Doctrine ORM** | Der PHP-Objekt-Relational-Mapper, der von Chamilo verwendet wird. Bildet PHP-Entitätsklassen auf Datenbanktabellen ab. |
| **Entity** | Eine PHP-Klasse, die mit Doctrine-Attributen annotiert ist und auf eine Datenbanktabelle abgebildet wird. |
| **Encore** | Symfony Webpack Encore — ein Wrapper um Webpack, der die Konfiguration des Frontend-Builds vereinfacht. |
| **Flysystem** | Eine PHP-Dateisystem-Abstraktionsbibliothek. Chamilo verwendet sie zur Unterstützung von lokalem, S3-, Azure- und GCS-Speicher. |
| **JWT** | JSON Web Token — der Authentifizierungsmechanismus für die REST-API. |
| **Pinia** | Die empfohlene State-Management-Bibliothek für Vue 3. Wird für neue Stores in Chamilo verwendet; ältere Vuex-Stores bleiben parallel bestehen. |
| **PrimeVue** | Die Vue 3 UI-Komponentenbibliothek, die von Chamilo verwendet wird. Bietet Schaltflächen, Tabellen, Dialoge usw. |
| **ResourceNode** | Die zentrale Entität im Ressourcensystem von Chamilo. Jedes Stück Kursinhalt hat einen ResourceNode. |
| **ResourceFile** | Eine Entität, die eine Datei repräsentiert, die an einen ResourceNode angehängt ist. Gespeichert über Flysystem. |
| **ResourceLink** | Eine Entität, die Sichtbarkeit und Zugriff pro Kurs-/Sitzungs-/Gruppenkontext steuert. |
| **SCORM** | Sharable Content Object Reference Model. Ein E-Learning-Standard für die Verpackung von Inhalten. |
| **Settings Schema** | Eine PHP-Klasse, die eine Kategorie von Plattformeinstellungen definiert (z. B. SecuritySettingsSchema). |
| **Voter** | Eine Symfony-Sicherheitskomponente, die entscheidet, ob ein Benutzer eine Aktion auf einer Ressource ausführen darf. |
| **Webpack** | Der JavaScript-Modul-Bundler, der Vue-Komponenten, SCSS und TypeScript in browserfertige Bundles kompiliert. |