# Päätepisteiden viite

API Platform luo automaattisesti REST-päätepisteet entiteeteille, jotka on merkitty attribuutilla `#[ApiResource]`. Chamilo tarjoaa yli 100 resurssia.

## Vakiotoiminnot

Jokaiselle API-resurssille ovat tyypillisesti käytettävissä seuraavat toiminnot:

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | Listaus (kokoelma) |
| `POST` | `/api/{resources}` | Luonti |
| `GET` | `/api/{resources}/{id}` | Luku (yksittäinen kohde) |
| `PUT` | `/api/{resources}/{id}` | Täysi päivitys |
| `PATCH` | `/api/{resources}/{id}` | Osittainen päivitys |
| `DELETE` | `/api/{resources}/{id}` | Poisto |

Kaikkia toimintoja ei ole otettu käyttöön jokaiselle resurssille — tietoturvarajoitukset pätevät.

## Keskeiset API-resurssit

### Alustan resurssit

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | Käyttäjätilit |
| Courses | `/api/courses` | Kurssit |
| Sessions | `/api/sessions` | Koulutussessiot |
| Resource Nodes | `/api/resource_nodes` | Yhtenäiset sisältönodet |
| Access URLs | `/api/access_urls` | Moni-URL-portaalit |
| Messages | `/api/messages` | Alustan viestit |

### Kurssisisällön resurssit

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | Kurssin dokumentit |
| Learning Paths | `/api/learning_paths` | Oppimispolut |
| Glossaries | `/api/glossaries` | Sanastotermejä |
| Links | `/api/links` | Ulkoiset linkit |
| Calendar Events | `/api/c_calendar_events` | Kalenteritapahtumat |
| Student Publications | `/api/c_student_publications` | Tehtävät |
| Blogs | `/api/c_blogs` | Kurssiblogit |
| Groups | `/api/c_groups` | Kurssiryhmät |

### Seurannan resurssit

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | Arviointikirjan asetukset |
| Gradebook Results | `/api/gradebook_results` | Arvosanat |

## Suodatus ja sivutus

API Platform tukee:

* **Sivutus**: `?page=2&itemsPerPage=30`
* **Suodatus**: `?title=Introduction` (riippuu määritetyistä suodattimista)
* **Järjestäminen**: `?order[title]=asc`
* **Haku**: Kokotekstihaku määritetyillä kentillä

## Sisällön neuvottelu

API tukee useita muotoja:

* `application/ld+json` (oletus — JSON-LD)
* `application/json`
* `text/html` (API-dokumentaatio)

Aseta `Accept`-otsake valitaksesi vastauksen muodon.

## Tietoturva

Jokainen päätepiste toteuttaa tietoturvan seuraavilla tavoilla:

* JWT-todennus (vaaditaan useimmille päätepisteille)
* Symfony-tietoturvaäänestäjät (resurssitason käyttöoikeudet)
* Roolipohjainen pääsynhallinta (esim. vain ylläpitäjille tarkoitetut päätepisteet)