# Entwicklerhandbuch

Willkommen im Entwicklerhandbuch zu Chamilo 3.0. Dieses Handbuch richtet sich an Entwicklerinnen und Entwickler, die die Architektur von Chamilo verstehen, die Plattform mit Plugins erweitern, die API nutzen, die Oberfläche anpassen oder zum Projekt beitragen möchten.

## Architektur im Überblick

Chamilo 3.0 basiert auf:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) mit Doctrine ORM und API Platform 4
* **Frontend**: Vue 3 mit PrimeVue, Zustandsverwaltung mit Pinia und Vue Router
* **Build-System**: Webpack 5 über Symfony Webpack Encore, mit Tailwind CSS
* **Authentifizierung**: JWT-Token (lexik/jwt-authentication-bundle)
* **Dateispeicher**: Flysystem (unterstützt lokal, AWS S3, Azure Blob, Google Cloud)

Der Quellcode ist in drei Symfony-Bundles organisiert:

| Bundle | Zweck |
|--------|---------|
| **CoreBundle** | Plattformkern: Benutzer, Einstellungen, Ressourcen, Administration, KI-Anbieter, Sicherheit |
| **CourseBundle** | Kursspezifische Funktionen: Dokumente, Übungen, Lernpfade, Foren usw. |
| **LtiBundle** | LTI-1.3-Integration für externe Lernwerkzeuge |

## Aufbau dieses Handbuchs

1. **Erste Schritte** — Technologie-Stack, Entwicklungsumgebung, Projektstruktur
2. **Backend** — Symfony-Architektur, Entitäten, Ressourcensystem, Controller, Einstellungen
3. **API** — REST-API über API Platform, JWT-Authentifizierung, benutzerdefinierte Aktionen
4. **Frontend** — Vue-Komponenten, Views, Routing, Zustandsverwaltung, Build-System
5. **Theming** — Farbthemen, CSS/Tailwind, Twig-Templates
6. **Plugins** — Plugin-Architektur und -Entwicklung
7. **Mitwirken** — Kodierungskonventionen, Git-Workflow, Tests