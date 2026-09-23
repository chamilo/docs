# Tietokantakaavio

Chamilo 3.0 kuvaa suuren joukon Doctrine-entiteettejä tietokantatauluiksi. Tarkat määrät vaihtelevat julkaisujen välillä — lue nykyinen tila alla luetelluista entiteettihakemistoista.

## Entiteettien sijainnit

| Bundle | Sijainti | Etuliite |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Ei etuliitettä (esim. `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (esim. `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Keskeiset taulut

### Käyttäjä ja todennus

| Taulu | Tarkoitus |
|-------|---------|
| `user` | Käyttäjätilit |
| `access_url` | Moni-URL-portaalit |
| `access_url_rel_user` | Käyttäjän ja portaalin kytkennät |
| `usergroup` | Alustanlaajuiset käyttäjäryhmät |

### Kurssit

| Taulu | Tarkoitus |
|-------|---------|
| `course` | Kurssit |
| `course_category` | Kurssikategoriat |
| `course_rel_user` | Kurssille ilmoittautumiset |

### Istunnot

| Taulu | Tarkoitus |
|-------|---------|
| `session` | Koulutusistunnot |
| `session_rel_user` | Istuntoon ilmoittautumiset |
| `session_rel_course` | Kurssit istunnoissa |
| `session_rel_course_rel_user` | Käyttäjän ilmoittautuminen istunto–kurssi-yhdistelmään |

### Resurssijärjestelmä

| Taulu | Tarkoitus |
|-------|---------|
| `resource_node` | Yhtenäinen sisältöabstraktio |
| `resource_file` | Tiedostoliitteet |
| `resource_link` | Näkyvyys/käyttöoikeus kontekstikohtaisesti |
| `resource_type` | Resurssityyppien rekisteri |

### Kurssisisältö (c_-etuliite)

| Taulu | Tarkoitus |
|-------|---------|
| `c_document` | Dokumentit |
| `c_quiz` | Harjoitukset/testit |
| `c_quiz_question` | Tietokilpailun kysymykset |
| `c_quiz_answer` | Kysymysten vastaukset |
| `c_lp` | Oppimispolut |
| `c_lp_item` | Oppimispolun kohteet |
| `c_forum_category` | Foorumikategoriat |
| `c_forum_forum` | Foorumit |
| `c_forum_thread` | Foorumiketjut |
| `c_forum_post` | Foorumiviestit |
| `c_student_publication` | Tehtävät/palautukset |
| `c_survey` | Kyselyt |
| `c_glossary` | Sanastotermit |
| `c_calendar_event` | Kalenteritapahtumat |
| `c_attendance` | Läsnäololistat |

### Seuranta

| Taulu | Tarkoitus |
|-------|---------|
| `track_e_login` | Kirjautumisseuranta |
| `track_e_online` | Verkossa olevien käyttäjien seuranta |
| `track_e_default` | Yleinen toimintaseuranta |
| `gradebook_category` | Arviointikirjan kategoriat |
| `gradebook_result` | Arvosanat |

### Asetukset

| Taulu | Tarkoitus |
|-------|---------|
| `settings` | Alustan asetukset |
| `settings_options` | Asetusvaihtoehtojen määritelmät |

## Migraatiot

Tietokantakaavion muutoksia hallitaan Doctrine Migrations -migraatioilla hakemistossa `src/CoreBundle/Migrations/`. Suorita migraatiot komennolla:

```bash
php bin/console doctrine:migrations:migrate
```