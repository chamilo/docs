# Symfony-Architektur

## Bundles

Chamilo 2.0 ist in drei Symfony-Bundles strukturiert:

### CoreBundle (`src/CoreBundle/`)

Das größte Bundle, das alle plattformweiten Belange abdeckt:

* **Benutzer und Authentifizierung** — Benutzer-Entität, Rollen, JWT-Token, OAuth2-Provider
* **Ressourcensystem** — ResourceNode und ResourceFile (die einheitliche Inhaltsabstraktion)
* **Plattformeinstellungen** — Einstellungsschemata in `src/CoreBundle/Settings/`, die jeden konfigurierbaren Aspekt abdecken
* **Administration** — Admin-Controller für die Verwaltung von Benutzern, Kursen, Sitzungen und Plugins
* **KI-Anbieter** — Factory-Pattern für OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Dateispeicherung** — Flysystem-basierte Speicheradapter (lokal, S3, Azure, GCS)
* **Sicherheit** — Voters, Zugriffskontrolle, Rollenhierarchie
* **Tools** — Kurs-Tool-Definitionen, die über das Tool-System registriert werden

### CourseBundle (`src/CourseBundle/`)

Alles, was spezifisch für Kursinhalte ist:

* **Inhaltsentitäten** — 101 Entitäten für Dokumente, Übungen, Lernpfade, Foren, Glossare, Umfragen, Anwesenheit, Blogs, Aufgaben und mehr
* **Kurskopie** — Import/Export mit Unterstützung für Common Cartridge 1.3 und Moodle-Format
* **Kurseinstellungen** — Einstellungsschemata auf Kursebene

### LtiBundle (`src/LtiBundle/`)

Implementierung des LTI 1.3-Standards:

* **Plattform- und Tool-Registrierung** — Verwaltung externer Tool-Verbindungen
* **Startbehandlung** — Controller für den LTI-Startablauf
* **Notenrückgabe** — Rückgabe von Noten von externen Tools an Chamilo

## Service-Container

Chamilo verwendet den Dependency-Injection-Container von Symfony. Dienste werden konfiguriert in:

* `config/services.yaml` — Globale Dienstdefinitionen
* Verzeichnis `DependencyInjection/` jedes Bundles — Bundlespezifische Dienste

## Sicherheitsarchitektur

Das Sicherheitssystem ist in `config/packages/security.yaml` konfiguriert:

* **Passwort-Hashing** — Unterstützt bcrypt (Standard), mit Migration von veralteten SHA1 und MD5
* **Rollenhierarchie** — 18 Rollen, hierarchisch organisiert (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; zusätzliche Rollen umfassen ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Kontextabhängige Rollen** — Kursbezogene Rollen (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) werden pro Anfrage basierend auf der Einschreibung berechnet
* **Firewall** — JWT-Authentifizierung für API, sitzungsbasierte Authentifizierung für die Weboberfläche
* **Voters** — Ressourcenbasierte Zugriffskontrolle durch Symfony-Voters

## Legacy-Code

Einige Funktionen verwenden noch veralteten PHP-Code in `public/main/`:

* Übungsrendering und Interaktion
* Lernpfad-Player
* Einige Admin-Tools

Diese werden schrittweise zur Symfony+Vue-Architektur migriert. Legacy-Seiten werden über eine Kompatibilitätsschicht bereitgestellt, die den Symfony-Kernel startet.