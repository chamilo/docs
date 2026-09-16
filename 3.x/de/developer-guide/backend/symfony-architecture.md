# Symfony-Architektur

## Bundles

Chamilo 3.0 ist in drei Symfony-Bundles strukturiert:

### CoreBundle (`src/CoreBundle/`)

Das größte Bundle, das alle plattformweiten Belange abdeckt:

* **Benutzer und Authentifizierung** — User-Entität, Rollen, JWT-Tokens, OAuth2-Provider
* **Ressourcensystem** — ResourceNode und ResourceFile (die einheitliche Inhaltsabstraktion)
* **Plattformeinstellungen** — Einstellungsschemata in `src/CoreBundle/Settings/` für jeden konfigurierbaren Aspekt
* **Administration** — Admin-Controller für Benutzer-, Kurs-, Sitzungs- und Plugin-Verwaltung
* **KI-Anbieter** — Factory-Muster für OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Dateispeicher** — Flysystem-basierte Speicheradapter (lokal, S3, Azure, GCS)
* **Sicherheit** — Voters, Zugriffskontrolle, Rollenhierarchie
* **Werkzeuge** — Kurswerkzeugdefinitionen, die über das Tool-System registriert werden

### CourseBundle (`src/CourseBundle/`)

Alles, was spezifisch für Kursinhalte ist:

* **Inhaltsentitäten** — 101 Entitäten für Dokumente, Übungen, Lernpfade, Foren, Glossare, Umfragen, Anwesenheit, Blogs, Aufgaben und mehr
* **Kurskopie** — Import/Export mit Unterstützung für Common Cartridge 1.3 und Moodle-Format
* **Kurseinstellungen** — Einstellungsschemata auf Kursebene

### LtiBundle (`src/LtiBundle/`)

Implementierung des LTI-1.3-Standards:

* **Plattform- und Tool-Registrierung** — Externe Tool-Verbindungen verwalten
* **Launch-Verarbeitung** — Controller für den LTI-Launch-Ablauf
* **Grade Passback** — Noten von externen Tools an Chamilo zurückgeben

## Service Container

Chamilo verwendet den Dependency-Injection-Container von Symfony. Dienste werden konfiguriert in:

* `config/services.yaml` — Globale Dienstdefinitionen
* Verzeichnis `DependencyInjection/` jedes Bundles — Bundlespezifische Dienste

## Sicherheitsarchitektur

Das Sicherheitssystem ist in `config/packages/security.yaml` konfiguriert:

* **Passwort-Hashing** — Unterstützt bcrypt (Standard), mit Migration von den älteren Verfahren SHA1 und MD5
* **Rollenhierarchie** — 18 hierarchisch organisierte Rollen (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; weitere Rollen umfassen ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Kontextsensitive Rollen** — Rollen auf Kursebene (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) werden pro Anfrage auf Basis der Einschreibung berechnet
* **Firewall** — JWT-Authentifizierung für die API, sitzungsbasiert für die Weboberfläche
* **Voters** — Zugriffskontrolle auf Ressourcenebene über Symfony-Voters

## Legacy-Code

Einige Funktionen nutzen weiterhin Legacy-PHP-Code in `public/main/`:

* Übungsdarstellung und Interaktion
* Lernpfad-Player
* Einige Admin-Werkzeuge

Diese werden schrittweise in die Symfony+Vue-Architektur migriert. Legacy-Seiten werden über eine Kompatibilitätsschicht ausgeliefert, die den Symfony-Kernel bootstrapt.