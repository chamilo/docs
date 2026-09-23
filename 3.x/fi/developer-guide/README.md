# Kehittäjäopas

Tervetuloa Chamilo 3.0 -kehittäjäoppaaseen. Tämä opas on tarkoitettu kehittäjille, jotka haluavat ymmärtää Chamilo-arkkitehtuurin, laajentaa alustaa liitännäisillä, käyttää API:a, mukauttaa käyttöliittymää tai osallistua projektiin.

## Arkkitehtuuri lyhyesti

Chamilo 3.0 perustuu seuraaviin teknologioihin:

* **Backend**: Symfony 7.4 (PHP 8.3–8.5) sekä Doctrine ORM ja API Platform 4
* **Frontend**: Vue 3 sekä PrimeVue, Pinia-tilanhallinta ja Vue Router
* **Käännösjärjestelmä**: Webpack 5 Symfony Webpack Encoren kautta sekä Tailwind CSS
* **Todennus**: JWT-tunnukset (lexik/jwt-authentication-bundle)
* **Tiedostojen tallennus**: Flysystem (tukee paikallista tallennusta, AWS S3:ta, Azure Blobia ja Google Cloudia)

Koodipohja on jaettu kolmeen Symfony-bundleen:

| Bundle | Tarkoitus |
|--------|---------|
| **CoreBundle** | Alustan ydin: käyttäjät, asetukset, resurssit, hallinta, tekoälypalveluntarjoajat, tietoturva |
| **CourseBundle** | Kurssikohtaiset ominaisuudet: asiakirjat, harjoitukset, oppimispolut, foorumit jne. |
| **LtiBundle** | LTI 1.3 -integraatio ulkoisia oppimistyökaluja varten |

## Miten tämä opas on järjestetty

1. **Aloittaminen** — Teknologiapino, kehitysympäristön asennus, projektin rakenne
2. **Backend** — Symfony-arkkitehtuuri, entiteetit, resurssijärjestelmä, kontrollerit, asetukset
3. **API** — REST API API Platformin kautta, JWT-todennus, mukautetut toiminnot
4. **Frontend** — Vue-komponentit, näkymät, reititys, tilanhallinta, käännösjärjestelmä
5. **Teemoitus** — Väriteemat, CSS/Tailwind, Twig-mallit
6. **Liitännäiset** — Liitännäisarkkitehtuuri ja kehitys
7. **Osallistuminen** — Koodauskäytännöt, git-työnkulku, testaus