# Symfony-arkitektur

## Bundles

Chamilo 3.0 är strukturerat i tre Symfony-bundles:

### CoreBundle (`src/CoreBundle/`)

Det största bundlet, som hanterar alla plattformsövergripande frågor:

* **Användare och autentisering** — User-entitet, roller, JWT-token, OAuth2-providers
* **Resurssystem** — ResourceNode och ResourceFile (den enhetliga innehållsabstraktionen)
* **Plattformsinställningar** — inställningsscheman i `src/CoreBundle/Settings/` som täcker varje konfigurerbar aspekt
* **Administration** — Admin-controllers för hantering av användare, kurser, sessioner och plugins
* **AI-providers** — Factory-mönster för OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Fillagring** — Flysystem-baserade lagringsadaptrar (lokal, S3, Azure, GCS)
* **Säkerhet** — Voters, åtkomstkontroll, rollhierarki
* **Verktyg** — definitioner av kursverktyg som registreras via verktygssystemet

### CourseBundle (`src/CourseBundle/`)

Allt som är specifikt för kursinnehåll:

* **Innehållsentiteter** — 101 entiteter för dokument, övningar, lärstigar, forum, glossarier, enkäter, närvaro, bloggar, uppgifter och mer
* **Kurskopia** — Import/export med stöd för Common Cartridge 1.3 och Moodle-format
* **Kursinställningar** — inställningsscheman på kursnivå

### LtiBundle (`src/LtiBundle/`)

Implementering av LTI 1.3-standarden:

* **Plattforms- och verktygsregistrering** — Hantera anslutningar till externa verktyg
* **Launch-hantering** — Controllers för LTI-launch-flödet
* **Grade passback** — Returnera betyg från externa verktyg till Chamilo

## Service Container

Chamilo använder Symfonys dependency injection-container. Tjänster konfigureras i:

* `config/services.yaml` — Globala tjänstedefinitioner
* Varje bundles `DependencyInjection/`-katalog — Bundlespecifika tjänster

## Säkerhetsarkitektur

Säkerhetssystemet konfigureras i `config/packages/security.yaml`:

* **Lösenordshashning** — Stödjer bcrypt (standard), med migrering från äldre SHA1 och MD5
* **Rollhierarki** — 18 roller organiserade hierarkiskt (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; ytterligare roller inkluderar ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Kontextkänsliga roller** — Roller på kursnivå (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) beräknas per begäran baserat på inskrivning
* **Firewall** — JWT-autentisering för API, sessionsbaserad för webbgränssnittet
* **Voters** — Åtkomstkontroll på resursnivå via Symfony-voters

## Legacy-kod

Vissa funktioner använder fortfarande äldre PHP-kod i `public/main/`:

* Rendering och interaktion för övningar
* Spelare för lärstigar
* Vissa adminverktyg

Dessa migreras successivt till Symfony+Vue-arkitekturen. Legacy-sidor serveras via ett kompatibilitetslager som startar Symfony-kärnan.