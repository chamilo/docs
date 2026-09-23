# Symfony-arkkitehtuuri

## Bundlet

Chamilo 3.0 on jaettu kolmeen Symfony-bundleen:

### CoreBundle (`src/CoreBundle/`)

Suurin bundle, joka hoitaa kaikki alustanlaajuiset asiat:

* **Käyttäjät ja autentikointi** — User-entiteetti, roolit, JWT-tokenit, OAuth2-tarjoajat
* **Resurssijärjestelmä** — ResourceNode ja ResourceFile (yhtenäinen sisältöabstraktio)
* **Alustan asetukset** — asetusskeemat hakemistossa `src/CoreBundle/Settings/` kattavat kaikki konfiguroitavat osa-alueet
* **Hallinta** — Admin-kontrollerit käyttäjien, kurssien, sessioiden ja liitännäisten hallintaan
* **Tekoälytarjoajat** — Factory-malli OpenAI:lle, Geminille, Mistralille, DeepSeekille, Grokille
* **Tiedostojen tallennus** — Flysystem-pohjaiset tallennusadapterit (local, S3, Azure, GCS)
* **Tietoturva** — Voterit, pääsynhallinta, roolihierarkia
* **Työkalut** — kurssityökalujen määritelmät, jotka rekisteröidään työkalujärjestelmän kautta

### CourseBundle (`src/CourseBundle/`)

Kaikki kurssisisältöön liittyvä:

* **Sisältöentiteetit** — 101 entiteettiä dokumenteille, harjoituksille, oppimispoluille, foorumeille, sanastoille, kyselyille, läsnäololle, blogeille, tehtäville ja muulle
* **Kurssin kopiointi** — Tuonti/vienti Common Cartridge 1.3- ja Moodle-muotojen tuella
* **Kurssiasetukset** — Kurssitason asetusskeemat

### LtiBundle (`src/LtiBundle/`)

LTI 1.3 -standardin toteutus:

* **Alustan ja työkalun rekisteröinti** — Ulkoisten työkaluyhteyksien hallinta
* **Käynnistyksen käsittely** — LTI-käynnistysvirran kontrollerit
* **Arvosanojen palautus** — Arvosanojen palauttaminen ulkoisista työkaluista Chamiloon

## Palvelusäiliö

Chamilo käyttää Symfonyn riippuvuusinjektiosäiliötä. Palvelut konfiguroidaan seuraavissa:

* `config/services.yaml` — Globaalit palvelumäärittelyt
* Kunkin bundlen `DependencyInjection/`-hakemisto — Bundlen omat palvelut

## Tietoturva-arkkitehtuuri

Tietoturvajärjestelmä on konfiguroitu tiedostossa `config/packages/security.yaml`:

* **Salasanan hajautus** — Tukee bcryptiä (oletus) sekä migraatiota vanhoista SHA1- ja MD5-hajautuksista
* **Roolihierarkia** — 18 hierarkkisesti järjestettyä roolia (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER; lisärooleja ovat ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Kontekstisidonnaiset roolit** — Kurssitason roolit (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) lasketaan pyyntökohtaisesti ilmoittautumisen perusteella
* **Palomuuri** — JWT-autentikointi API:lle, sessioihin perustuva verkkokäyttöliittymälle
* **Voterit** — Resurssitason pääsynhallinta Symfony-votereiden kautta

## Legacy-koodi

Osa ominaisuuksista käyttää yhä vanhaa PHP-koodia hakemistossa `public/main/`:

* Harjoitusten renderöinti ja vuorovaikutus
* Oppimispolun soitin
* Jotkin hallintatyökalut

Näitä siirretään asteittain Symfony+Vue-arkkitehtuuriin. Legacy-sivut palvellaan yhteensopivuuskerroksen kautta, joka käynnistää Symfony-ytimen.