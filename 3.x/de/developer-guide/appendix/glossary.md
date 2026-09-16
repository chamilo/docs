# Glossar

Entwicklerbezogene Begriffe, die in diesem Leitfaden verwendet werden.

| Begriff | Definition |
|------|-----------|
| **API Platform** | Ein PHP-Framework zum Erstellen von REST- und GraphQL-APIs, integriert mit Symfony. Chamilo nutzt es zur automatischen Generierung von API-Endpunkten aus Doctrine-Entitäten. |
| **Bundle** | Eine organisatorische Einheit von Symfony, vergleichbar mit einem Plugin oder Modul. Chamilo verfügt über drei: CoreBundle, CourseBundle, LtiBundle. |
| **Composable** | Ein Vue-3-Muster zum Extrahieren und Wiederverwenden reaktiver Logik. Gespeichert in `assets/vue/composables/`. |
| **Doctrine ORM** | Der von Chamilo verwendete PHP-objektrelationale Mapper. Ordnet PHP-Entitätsklassen Datenbanktabellen zu. |
| **Entity** | Eine PHP-Klasse, die mit Doctrine-Attributen annotiert ist und einer Datenbanktabelle zugeordnet wird. |
| **Encore** | Symfony Webpack Encore — ein Wrapper um Webpack, der die Konfiguration des Frontend-Builds vereinfacht. |
| **Flysystem** | Eine PHP-Bibliothek zur Abstraktion des Dateisystems. Chamilo nutzt sie zur Unterstützung von lokalem, S3-, Azure- und GCS-Speicher. |
| **JWT** | JSON Web Token — der Authentifizierungsmechanismus für die REST-API. |
| **Pinia** | Die empfohlene Bibliothek zur Zustandsverwaltung für Vue 3. Wird für neue Stores in Chamilo verwendet; ältere Vuex-Stores bleiben parallel bestehen. |
| **PrimeVue** | Die von Chamilo verwendete Vue-3-UI-Komponentenbibliothek. Stellt Schaltflächen, Tabellen, Dialoge usw. bereit. |
| **ResourceNode** | Die zentrale Entität im Ressourcen-System von Chamilo. Jedes Kursinhaltsstück besitzt einen ResourceNode. |
| **ResourceFile** | Eine Entität, die eine an einen ResourceNode angehängte Datei repräsentiert. Wird über Flysystem gespeichert. |
| **ResourceLink** | Eine Entität, die Sichtbarkeit und Zugriff je Kurs-/Sitzungs-/Gruppenkontext steuert. |
| **SCORM** | Sharable Content Object Reference Model. Ein E-Learning-Standard zur Paketierung von Inhalten. |
| **Settings Schema** | Eine PHP-Klasse, die eine Kategorie von Plattformeinstellungen definiert (z. B. SecuritySettingsSchema). |
| **Voter** | Eine Symfony-Sicherheitskomponente, die entscheidet, ob ein Benutzer eine Aktion an einer Ressource ausführen darf. |
| **Webpack** | Der JavaScript-Modul-Bundler, der Vue-Komponenten, SCSS und TypeScript zu browserfertigen Bundles kompiliert. |