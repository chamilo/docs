# Ansichten und Routing

Chamilo verfügt über eine umfangreiche Sammlung von Vue-Ansichten (Komponenten auf Seitenebene), die über Vue Router verbunden sind. Die eigentlichen Dateien befinden sich unter `assets/vue/views/`.

## Router-Architektur

Der Router ist in `assets/vue/router/index.js` definiert und verwendet `createWebHistory` für saubere URLs.

Routen sind modular aufgebaut – sie sind in routenspezifische Dateien pro Funktion organisiert und werden in den Hauptrouter importiert:

| Routenmodul | Seiten |
|-------------|--------|
| `admin` | Seiten des Administrationsbereichs |
| `sessionAdmin` | Seiten zur Verwaltung von Sitzungen |
| `course` | Kursliste, Erstellung, Startseite, Katalog |
| `account` | Benutzerprofil und Einstellungen |
| `personalfile` | Persönlicher Dateibereich |
| `message` | Nachrichten / Posteingang |
| `user` | Seiten zur Benutzerverwaltung |
| `usergroup` | Seiten für Benutzergruppen (Klassen) |
| `userreluser` | Seiten für Benutzerbeziehungen (Freunde/Folgen) |
| `ccalendarevent` | Kurskalender und Agenda |
| `ctoolintro` | Einführungsseiten für Kurstools |
| `page` | Statische CMS-Seiten |
| `pageLayout` | Seitenlayout-Wrapper |
| `publicPage` | Öffentlich zugängliche Seiten |
| `social` | Seiten für soziale Netzwerke |
| `filemanager` | Dateimanager (Kursdokumenten-Browser) |
| `skill` | Seiten für Fähigkeiten und Kompetenzen |
| `accessurl` | Seiten zur Verwaltung mehrerer URLs (Portale) |
| `branch` | Seiten für Zweigstellen / Netzwerk-Campusse |
| `room` | Seiten für virtuelle Räume |
| `buycourses` | Seiten zum Kurskauf |
| `documents` | Dokumentenverwaltung |
| `assignments` | Arbeitsablauf für Aufgaben |
| `links` | Verwaltung externer Links |
| `glossary` | Verwaltung von Glossaren |
| `attendance` | Anwesenheitsverfolgung |
| `lp` | Lernpfad-Player und Editor |
| `dropbox` | Dropbox / Dateiaustausch |
| `blog` | Blog-Seiten |
| `blogAdmin` | Blog-Verwaltung |
| `coursemaintenance` | Kurs-Backup und Wiederherstellung |
| `catalogue` | Kurs- und Sitzungskataloge |

## Wichtige Routen

| Pfad | Ansicht | Beschreibung |
|------|---------|--------------|
| `/` | `AppIndex.vue` (oder benutzerdefiniert) | Einstiegspunkt der Anwendung |
| `/home` | `pages/Home.vue` | Startseite der Plattform |
| `/login` | `pages/Login.vue` | Anmeldeseite |
| `/courses` | `views/user/courses/List.vue` | Eingeschriebene Kurse des Benutzers |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Aktuelle Sitzungen |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Vergangene Sitzungen |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Kommende Sitzungen |
| `/course/:id/home` | `views/course/CourseHome.vue` | Kurs-Startseite |
| `/account/home` | `views/account/Home.vue` | Benutzerprofil |
| `/admin` | Admin-Ansichten | Administrationsbereich |
| `/faq` | `pages/Faq.vue` | FAQ-Seite |

## Routenwächter

Der Router verwendet Navigationswächter (deklariert mit `beforeEach` und `afterEach`), um:

* Den Authentifizierungsstatus über `useSecurityStore` zu überprüfen und nicht authentifizierte Benutzer zu `/login` umzuleiten
* Den Kurskontext über `useCidReqStore` zu verifizieren
* Seiten-Typ-CSS-Klassen während der SPA-Navigation anzuwenden (ersetzt, was Twig's `PageHelper` bei einem vollständigen Seitenladen tun würde)
* Benutzerdefinierte Vue-Template-Überschreibungen zu unterstützen – die Einstiegskomponente bei `/` wird gegen eine benutzerdefinierte `AppIndex.vue` ausgetauscht, wenn ein benutzerdefiniertes Vue-Template aktiviert ist (`var/vue_templates/pages/AppIndex.vue`)

## Organisation der Ansichten

Ansichten befinden sich in `assets/vue/views/` und sind nach Funktion organisiert:

```
views/
├── account/          # Benutzerprofil und Einstellungen
├── admin/            # Admin-Seiten
├── assignments/      # Einreichung und Bewertung von Aufgaben
├── attendance/       # Anwesenheitslisten
├── blog/             # Blogbeiträge und Kommentare
├── branch/           # Verwaltung von Netzwerk-Campussen
├── buycourses/       # Ablauf beim Kurskauf
├── ccalendarevent/   # Kurskalender
├── course/           # Kursliste, Startseite, Erstellung, Katalog
├── coursecategory/   # Verwaltung von Kurskategorien
├── coursemaintenance/# Kurs-Backup/Wiederherstellung
├── ctoolintro/       # Einführungsseiten für Tools
├── documents/        # Dokumentenliste, Erstellung, Mediengenerierung
├── dropbox/          # Dropbox / Dateiaustausch
├── filemanager/      # Datei-Browser
├── glossary/         # Glossarliste und Begriffsverwaltung
├── links/            # Externe Links
├── lp/               # Lernpfad-Player und Editor
├── message/          # Posteingang und Nachrichten
├── page/             # CMS-statische Seiten
├── pageLayout/       # Seitenlayout-Wrapper
├── personalfile/     # Persönlicher Dateibereich
├── room/             # Virtuelle Räume
├── sessionadmin/     # Sitzungsverwaltung
├── skill/            # Fähigkeiten und Kompetenzen
├── social/           # Soziales Netzwerk
├── terms/            # Nutzungsbedingungen
├── user/             # Benutzerverwaltung und Kurs-/Sitzungslisten
├── usergroup/        # Benutzergruppen (Klassen)
└── userreluser/      # Benutzerbeziehungen (Freunde/Folgen)
```