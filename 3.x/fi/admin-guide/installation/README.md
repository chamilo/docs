# Asennus

Tämä osio kattaa kaiken, mitä tarvitset Chamilo 3.0:n asentamiseen ja määrittämiseen palvelimellesi.

Chamilo 3.0 on PHP-sovellus, joka on rakennettu Symfony-kehyksen päälle. Se voi toimia useimmilla Linux-pohjaisilla palvelimilla, se on asennettu ja se toimii Windows Serverillä IIS:n kanssa, ja se tukee MySQL- ja MariaDB-taustajärjestelmiä.

## Asennusvaiheet

1. **[Palvelinvaatimukset](server-requirements.md)** — Varmista, että palvelimesi täyttää vähimmäisvaatimukset
2. **[Asennusvelho](installation-wizard.md)** — Suorita selainpohjainen asennusvelho
3. **[Määritys](configuration.md)** — Määritä ympäristömuuttujat ja Symfony-asetukset
4. **[Pilvitallennus](cloud-storage.md)** — Ota käyttöön pilvitallennuksen taustajärjestelmät (valinnainen)
5. **[Sähköpostin määritys](email-configuration.md)** — Määritä sähköpostin toimitus
6. **[Päivitys](upgrading.md)** — Päivitä aiemmasta versiosta

## Pikaesittely

Perusasennusprosessi on seuraava:

1. Lataa tai kloonaa Chamilo-lähdekoodi
2. Asenna PHP-riippuvuudet Composerilla, jos valmistelet lähdekoodista
3. Asenna JavaScript-riippuvuudet npm:llä/yarnilla ja rakenna käyttöliittymän resurssit
4. Luo tyhjä `.env`-tiedosto tietokantatunnusten ja muiden asetusten tallentamista varten myöhemmin
5. Muuta käyttöoikeuksia (kirjoitettavissa verkkopalvelimelle) hakemistoissa *var/*, *config/* ja tiedostossa *.env*
6. Suorita selainpohjainen asennusvelho
7. Kirjaudu sisään ensimmäisellä ylläpitäjätililläsi
8. Palauta käyttöoikeudet hakemistoon *config/* ja tiedostoon *.env*

Yksityiskohtaiset ohjeet kullekin vaiheelle ovat yllä linkitetyillä sivuilla.