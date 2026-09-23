# Symfony-arkitektur

## Bundles

Chamilo 3.0 er strukturert i tre Symfony-bundles:

### CoreBundle (`src/CoreBundle/`)

Den største bundlen, som håndterer alle plattformomfattende forhold:

* **Brukere og autentisering** — User-entitet, roller, JWT-tokens, OAuth2-leverandører
* **Ressurssystem** — ResourceNode og ResourceFile (den enhetlige innholdsabstraksjonen)
* **Plattforminnstillinger** — innstillingsskjemaer i `src/CoreBundle/Settings/` som dekker alle konfigurerbare aspekter
* **Administrasjon** — Admin-kontrollere for bruker-, kurs-, økt- og plugin-håndtering
* **AI-leverandører** — Factory-mønster for OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Fillagring** — Flysystem-baserte lagringsadaptere (lokal, S3, Azure, GCS)
* **Sikkerhet** — Voters, tilgangskontroll, rollehierarki
* **Verktøy** — definisjoner av kursverktøy registrert gjennom verktøysystemet

### CourseBundle (`src/CourseBundle/`)

Alt som er spesifikt for kursinnhold:

* **Innholdsentiteter** — 101 entiteter for dokumenter, øvelser, læringsstier, forum, glossarer, undersøkelser, oppmøte, blogger, innleveringer og mer
* **Kurskopi** — Import/eksport med støtte for Common Cartridge 1.3 og Moodle-format
* **Kursinnstillinger** — innstillingsskjemaer på kursnivå

### LtiBundle (`src/LtiBundle/`)

Implementasjon av LTI 1.3-standarden:

* **Plattform- og verktøyregistrering** — Administrer tilkoblinger til eksterne verktøy
* **Launch-håndtering** — kontrollere for LTI-launch-flyt
* **Grade passback** — Returner karakterer fra eksterne verktøy til Chamilo

## Service Container

Chamilo bruker Symfonys avhengighetsinjeksjonscontainer. Tjenester konfigureres i:

* `config/services.yaml` — Globale tjenestedefinisjoner
* Hver bundles `DependencyInjection/`-katalog — Bundlespesifikke tjenester

## Sikkerhetsarkitektur

Sikkerhetssystemet er konfigurert i `config/packages/security.yaml`:

* **Passordhashing** — Støtter bcrypt (standard), med migrering fra eldre SHA1 og MD5
* **Rollehierarki** — 18 roller organisert hierarkisk (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; tilleggsroller inkluderer ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Kontekstsensitive roller** — Roller på kursnivå (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) beregnes per forespørsel basert på påmelding
* **Firewall** — JWT-autentisering for API, øktbasert for webgrensesnittet
* **Voters** — Tilgangskontroll på ressursnivå gjennom Symfony-voters

## Eldre kode

Noen funksjoner bruker fortsatt eldre PHP-kode i `public/main/`:

* Rendering og interaksjon for øvelser
* Avspiller for læringsstier
* Noen administrasjonsverktøy

Disse migreres gradvis til Symfony+Vue-arkitekturen. Eldre sider serveres gjennom et kompatibilitetslag som starter Symfony-kjernen.