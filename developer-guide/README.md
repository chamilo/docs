# Entwicklerhandbuch

Willkommen zum Entwicklerhandbuch für Chamilo 2.0. Dieses Handbuch richtet sich an Entwickler, die die Architektur von Chamilo verstehen, die Plattform durch Plugins erweitern, die API nutzen, die Benutzeroberfläche anpassen oder zum Projekt beitragen möchten.

## Architektur im Überblick

Chamilo 2.0 basiert auf:

* **Backend**: Symfony 6.4 (PHP 8.2+) mit Doctrine ORM und API Platform 3.0
* **Frontend**: Vue 3 mit PrimeVue, Pinia State-Management und Vue Router
* **Build-System**: Webpack 5 über Symfony Webpack Encore, mit Tailwind CSS
* **Authentifizierung**: JWT-Token (lexik/jwt-authentication-bundle)
* **Dateispeicherung**: Flysystem (unterstützt lokal, AWS S3, Azure Blob, Google Cloud)

Der Code ist in drei Symfony-Bundles organisiert:

| Bundle | Zweck |
|--------|-------|
| **CoreBundle** | Plattformkern: Benutzer, Einstellungen, Ressourcen, Admin, KI-Anbieter, Sicherheit |
| **CourseBundle** | Kursspezifische Funktionen: Dokumente, Übungen, Lernpfade, Foren usw. |
| **LtiBundle** | LTI 1.3-Integration für externe Lernwerkzeuge |

## Aufbau dieses Handbuchs

1. **Erste Schritte** — Technologie-Stack, Entwicklungsumgebung, Projektstruktur
2. **Backend** — Symfony-Architektur, Entitäten, Ressourcensystem, Controller, Einstellungen
3. **API** — REST-API über API Platform, JWT-Authentifizierung, benutzerdefinierte Aktionen
4. **Frontend** — Vue-Komponenten, Ansichten, Routing, State-Management, Build-System
5. **Theming** — Farbthemen, CSS/Tailwind, Twig-Templates
6. **Plugins** — Plugin-Architektur und -Entwicklung
7. **Mitwirken** — Kodierkonventionen, Git-Workflow, Testing