# Symfony Architectuur

## Bundels

Chamilo 2.0 is gestructureerd in drie Symfony-bundels:

### CoreBundle (`src/CoreBundle/`)

De grootste bundel, die alle platformbrede zaken afhandelt:

* **Gebruikers en authenticatie** — Gebruikersentiteit, rollen, JWT-tokens, OAuth2-providers
* **Bronnensysteem** — ResourceNode en ResourceFile (de uniforme inhoudsabstractie)
* **Platforminstellingen** — Instellingsschema's in `src/CoreBundle/Settings/` die elk configureerbaar aspect dekken
* **Beheer** — Beheerderscontrollers voor gebruikers-, cursus-, sessie- en pluginbeheer
* **AI-providers** — Factory-patroon voor OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Bestandsopslag** — Flysystem-gebaseerde opslagadapters (lokaal, S3, Azure, GCS)
* **Beveiliging** — Stemmers, toegangscontrole, rolhiërarchie
* **Tools** — Cursustooldefinities geregistreerd via het toolsysteem

### CourseBundle (`src/CourseBundle/`)

Alles wat specifiek is voor cursusinhoud:

* **Inhoudsentiteiten** — 101 entiteiten voor documenten, oefeningen, leerpaden, fora, woordenlijsten, enquêtes, aanwezigheid, blogs, opdrachten en meer
* **Cursus kopiëren** — Importeren/exporteren met ondersteuning voor Common Cartridge 1.3 en Moodle-formaat
* **Cursusinstellingen** — Instellingsschema's op cursusniveau

### LtiBundle (`src/LtiBundle/`)

Implementatie van de LTI 1.3-standaard:

* **Platform- en toolregistratie** — Beheer van externe toolverbindingen
* **Startafhandeling** — LTI-startstroomcontrollers
* **Cijferterugkoppeling** — Cijfers van externe tools terugsturen naar Chamilo

## Service Container

Chamilo gebruikt Symfony's dependency injection container. Diensten zijn geconfigureerd in:

* `config/services.yaml` — Globale dienstdefinities
* De `DependencyInjection/`-map van elke bundel — Bundelspecifieke diensten

## Beveiligingsarchitectuur

Het beveiligingssysteem is geconfigureerd in `config/packages/security.yaml`:

* **Wachtwoordhashing** — Ondersteunt bcrypt (standaard), met migratie van verouderde SHA1 en MD5
* **Rolhiërarchie** — 18 rollen hiërarchisch georganiseerd (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; aanvullende rollen zijn onder andere ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Contextgevoelige rollen** — Rollen op cursusniveau (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) worden per verzoek berekend op basis van inschrijving
* **Firewall** — JWT-authenticatie voor API, sessiegebaseerd voor webinterface
* **Stemmers** — Toegangscontrole op bronneniveau via Symfony-stemmers

## Verouderde Code

Sommige functies maken nog gebruik van verouderde PHP-code in `public/main/`:

* Weergave en interactie van oefeningen
* Leerpadspeler
* Sommige beheerdershulpmiddelen

Deze worden geleidelijk gemigreerd naar de Symfony+Vue-architectuur. Verouderde pagina's worden aangeboden via een compatibiliteitslaag die de Symfony-kernel opstart.