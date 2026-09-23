# Symfony-arkitektur

## Bundles

Chamilo 3.0 er struktureret i tre Symfony-bundles:

### CoreBundle (`src/CoreBundle/`)

Det største bundle, som håndterer alle platformomfattende anliggender:

* **Brugere og autentificering** — User-entitet, roller, JWT-tokens, OAuth2-udbydere
* **Ressourcesystem** — ResourceNode og ResourceFile (den samlede indholdsabstraktion)
* **Platformindstillinger** — indstillingsskemaer i `src/CoreBundle/Settings/` der dækker alle konfigurerbare aspekter
* **Administration** — Admin-controllere til bruger-, kursus-, sessions- og plugin-styring
* **AI-udbydere** — Factory-mønster til OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Fillagring** — Flysystem-baserede lagringsadaptere (lokal, S3, Azure, GCS)
* **Sikkerhed** — Voters, adgangskontrol, rollehierarki
* **Værktøjer** — definitioner af kursusværktøjer registreret via værktøjssystemet

### CourseBundle (`src/CourseBundle/`)

Alt, der er specifikt for kursusindhold:

* **Indholdsentiteter** — 101 entiteter til dokumenter, øvelser, læringsstier, fora, glossarer, spørgeskemaer, fremmøde, blogs, opgaver og mere
* **Kursuskopi** — Import/eksport med understøttelse af Common Cartridge 1.3 og Moodle-format
* **Kursusindstillinger** — indstillingsskemaer på kursusniveau

### LtiBundle (`src/LtiBundle/`)

Implementering af LTI 1.3-standarden:

* **Platform- og værktøjsregistrering** — Styr eksterne værktøjsforbindelser
* **Launch-håndtering** — Controllere til LTI-launch-flow
* **Grade passback** — Returnér karakterer fra eksterne værktøjer til Chamilo

## Service Container

Chamilo bruger Symfonys dependency injection-container. Services konfigureres i:

* `config/services.yaml` — Globale servicedefinitioner
* Hvert bundles `DependencyInjection/`-mappe — Bundle-specifikke services

## Sikkerhedsarkitektur

Sikkerhedssystemet konfigureres i `config/packages/security.yaml`:

* **Adgangskodehashing** — Understøtter bcrypt (standard), med migrering fra ældre SHA1 og MD5
* **Rollehierarki** — 18 roller organiseret hierarkisk (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; yderligere roller omfatter ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Kontekstfølsomme roller** — Roller på kursusniveau (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) beregnes pr. anmodning baseret på tilmelding
* **Firewall** — JWT-autentificering til API, sessionsbaseret til webgrænsefladen
* **Voters** — Adgangskontrol på ressourceniveau via Symfony-voters

## Ældre kode

Nogle funktioner bruger stadig ældre PHP-kode i `public/main/`:

* Rendering og interaktion for øvelser
* Afspiller til læringsstier
* Nogle administrationsværktøjer

Disse migreres løbende til Symfony+Vue-arkitekturen. Ældre sider serveres via et kompatibilitetslag, der starter Symfony-kernen.