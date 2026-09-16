# Symfony-architectuur

## Bundles

Chamilo 3.0 is opgebouwd uit drie Symfony-bundles:

### CoreBundle (`src/CoreBundle/`)

De grootste bundle, die alle platformbrede onderwerpen afhandelt:

* **Gebruikers en authenticatie** — User-entiteit, rollen, JWT-tokens, OAuth2-providers
* **Resourcesysteem** — ResourceNode en ResourceFile (de uniforme contentabstractie)
* **Platforminstellingen** — instellingenschema's in `src/CoreBundle/Settings/` die elk configureerbaar aspect dekken
* **Beheer** — Admin-controllers voor gebruikers-, cursus-, sessie- en pluginbeheer
* **AI-providers** — Factory-patroon voor OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Bestandsopslag** — Flysystem-gebaseerde opslagadapters (lokaal, S3, Azure, GCS)
* **Beveiliging** — Voters, toegangscontrole, rolhiërarchie
* **Tools** — cursustooldefinities die via het toolsysteem worden geregistreerd

### CourseBundle (`src/CourseBundle/`)

Alles wat specifiek is voor cursusinhoud:

* **Contententiteiten** — 101 entiteiten voor documenten, oefeningen, leerpaden, forums, glossaria, enquêtes, aanwezigheid, blogs, opdrachten en meer
* **Cursuskopie** — Import/export met ondersteuning voor Common Cartridge 1.3 en Moodle-formaat
* **Cursusinstellingen** — Instellingenschema's op cursusniveau

### LtiBundle (`src/LtiBundle/`)

Implementatie van de LTI 1.3-standaard:

* **Platform- en toolregistratie** — Externe toolverbindingen beheren
* **Launch-afhandeling** — Controllers voor de LTI-launchflow
* **Grade passback** — Cijfers van externe tools terugsturen naar Chamilo

## Service Container

Chamilo gebruikt de dependency injection-container van Symfony. Services worden geconfigureerd in:

* `config/services.yaml` — Globale servicedefinities
* De map `DependencyInjection/` van elke bundle — Bundelspecifieke services

## Beveiligingsarchitectuur

Het beveiligingssysteem is geconfigureerd in `config/packages/security.yaml`:

* **Wachtwoordhashing** — Ondersteunt bcrypt (standaard), met migratie vanaf legacy SHA1 en MD5
* **Rolhiërarchie** — 18 rollen hiërarchisch georganiseerd (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; extra rollen zijn onder meer ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Contextgevoelige rollen** — Rollen op cursusniveau (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) worden per request berekend op basis van inschrijving
* **Firewall** — JWT-authenticatie voor de API, sessiegebaseerd voor de webinterface
* **Voters** — Toegangscontrole op resourceniveau via Symfony-voters

## Legacycode

Sommige functies gebruiken nog legacy-PHP-code in `public/main/`:

* Weergave en interactie van oefeningen
* Leerpadspeler
* Sommige beheertools

Deze worden stapsgewijs gemigreerd naar de Symfony+Vue-architectuur. Legacypagina's worden geserveerd via een compatibiliteitslaag die de Symfony-kernel opstart.