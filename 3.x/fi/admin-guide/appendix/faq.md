# UKK

Chamilo 3.0 -ylläpitäjien usein kysytyt kysymykset.

## Asennus ja käyttöönotto

**K: Minkä PHP-version Chamilo 3.0 vaatii?**
V: PHP 8.3, 8.4 tai 8.5. Katso [Palvelinvaatimukset](../installation/server-requirements.md).

**K: Voinko käyttää Chamiloa jaetulla webhotellilla?**
V: Se on mahdollista, mutta ei suositeltavaa. Chamilo 3.0 vaatii Composerin, Node.js:n kehitystilassa sekä komentorivipääsyn asennusta ja ylläpitoa varten. VPS tai omistettu palvelin tarjoaa huomattavasti paremman käyttökokemuksen.

**K: Mitä tietokantaa minun pitäisi käyttää?**
V: MySQL 8.0+ tai MariaDB 10.4+ ovat yleisimmin käytettyjä ja parhaiten testattuja.

**K: Voinko asentaa Chamilon ilman komentoriviä?**
V: Kyllä, jos käytät paketoitua versiota (.zip tai .tar.gz). Muussa tapauksessa tarvitset komentorivin Composer-riippuvuuksien asentamiseen, käyttöliittymäresurssien kääntämiseen ja tietokantamigraatioiden suorittamiseen. Selainpohjainen ohjattu asennus hoitaa tietokannan käyttöönoton ja alkukonfiguraation, mutta ympäröivät vaiheet edellyttävät komentotulkin käyttöoikeutta kehitystilassa.

## Käyttäjät ja todennus

**K: Miten nollaan käyttäjän salasanan?**
V: Siirry kohtaan **Ylläpito > Käyttäjäluettelo**, etsi käyttäjä, napsauta muokkausta ja aseta uusi salasana. Vaihtoehtoisesti käyttäjä voi käyttää kirjautumissivun linkkiä "Unohditko salasanan" (jos sähköposti on määritetty).

**K: Voinko tuoda käyttäjiä joukkona?**
V: Kyllä. Siirry kohtaan **Ylläpito > Tuo käyttäjiä** ja lataa CSV- tai XML-tiedosto käyttäjätiedoilla. Tuonti tukee uusien käyttäjien luomista ja olemassa olevien päivittämistä.

**K: Miten integroin LDAP:n tai Active Directoryn?**
V: Määritä LDAP-asetukset todennuskonfiguraatiossa. Katso [LDAP](../authentication/ldap.md). Käyttäjät synkronoidaan kirjautumisen yhteydessä tai ajastetulla synkronoinnilla.

**K: Voivatko käyttäjät kuulua useaan istuntoon samanaikaisesti?**
V: Kyllä. Käyttäjät voidaan ilmoittaa mihin tahansa määrään istuntoja samanaikaisesti. Kukin istunto seuraa edistymistä itsenäisesti.

## Kurssit ja sisältö

**K: Miten varmuuskopioin yksittäisen kurssin?**
V: Kurssin sisällä siirry kohtaan **Ylläpito > Luo varmuuskopio**. Tämä luo ladattavan arkiston kurssin sisällöstä ja asetuksista. Voit palauttaa sen samaan tai toiseen Chamilo-instanssiin.

**K: Voinko kopioida kurssin?**
V: Kyllä. Käytä kohtaa **Ylläpito > Kopioi kurssi** tai kurssin ylläpitotyökalua kurssin sisällä. Voit kopioida sisältöä kurssien välillä tai luoda uuden kurssin olemassa olevasta.

**K: Mitä SCORM-versioita tuetaan?**
V: Chamilo tukee SCORM 1.2:ta. SCORM-paketit tuodaan oppimispolkuina.

**K: Miten rajoitan, kuka voi luoda kursseja?**
V: Siirry kohtaan **Ylläpito > Konfiguraatioasetukset > Kurssi** ja poista käytöstä **Salli muiden kuin ylläpitäjien (opettajien) luoda uusia kursseja** (`allow_users_to_create_courses`). Kun asetus on pois käytöstä, vain ylläpitäjät voivat luoda kursseja. Vaihtoehtoisesti voit asettaa rajan sille, kuinka monta kurssia kukin opettaja voi luoda.

## Suorituskyky ja ylläpito

**K: Alusta on hidas. Mitä minun pitäisi tarkistaa ensin?**
V: Vaikutuksen mukaisessa järjestyksessä: (1) Varmista, että `.env`-tiedostossa on `APP_ENV=prod` ja `APP_DEBUG=0`. (2) Varmista, että PHP OPcache on käytössä. (3) Tarkista tietokannan suorituskyky. (4) Katso [Suorituskyvyn viritys](../platform-settings/performance-tuning.md).

**K: Miten tyhjennän välimuistin?**
V: Suorita komentoriviltä `php bin/console cache:clear --env=prod`. Älä poista `var/cache/`-hakemistoa manuaalisesti, kun sovellus on käynnissä.

**K: Kuinka paljon levytilaa Chamilo tarvitsee?**
V: Itse sovellus tarvitsee noin 2 Gt pakkaamattomana. Kokonaistila riippuu ladatusta sisällöstä (asiakirjat, videot, SCORM-paketit). Seuraa levytilan käyttöä ja suunnittele sen mukaisesti.

**K: Miten määritän automaattiset varmuuskopiot?**
V: Katso [Varmuuskopiot](../maintenance/backups.md). Vähintään ajoita päivittäinen tietokantavedos ja säännölliset tiedostotason varmuuskopiot lataushakemistosta.

## Sähköposti

**K: Käyttäjät eivät saa sähköposteja. Mitä minun pitäisi tarkistaa?**
V: (1) Tarkista `MAILER_DSN` tiedostossa `.env`. (2) Testaa komennolla `php bin/console mailer:test someone@example.com`. (3) Tarkista roskapostikansiot. (4) Tarkista SPF-/DKIM-DNS-tietueet. Katso [Sähköpostin konfigurointi](../installation/email-configuration.md).

**K: Voinko käyttää Gmailia sähköpostien lähettämiseen?**
V: Kyllä, pienille alustoille tai kehitykseen. Käytä sovellussalasanaa ja huomioi Gmailin päivittäiset lähetysrajat (500 sähköpostia/päivä tavallisilla tileillä).

## Tietoturva

**K: Miten pakotan HTTPS:n?**
V: Määritä verkkopalvelin ohjaamaan HTTP HTTPS:ään. Lisäksi ota käyttöön asetus "Pakota HTTPS" kohdassa **Ylläpito > Konfiguraatioasetukset > Tietoturva**. Katso [Tietoturva-asetukset](../platform-settings/security-settings.md).

**K: Miten estän kirjautumisen brute-force-hyökkäykset?**
V: Määritä enimmäiskirjautumisyritykset ja CAPTCHA tietoturva-asetuksissa. Harkitse myös fail2banin käyttöä palvelintasolla lisäsuojaukseksi.

**K: Käyttäjä unohti salasanansa eikä sähköposti toimi. Miten autan häntä?**
V: Ylläpitäjänä muokkaa käyttäjätiliä suoraan ja aseta uusi salasana. Siirry kohtaan **Ylläpito > Käyttäjäluettelo**, etsi tili ja päivitä salasanakenttä.

## Päivitykset

**K: Voinko päivittää suoraan Chamilo 2.x:stä versioon 3.0?**
V: Kyllä, mutta kyseessä on merkittävä migraatio, ei yksinkertainen päivitys. Katso [Päivittäminen](../installation/upgrading.md). Testaa aina ensin testiympäristössä.

**K: Toimivatko laajennukseni päivityksen jälkeen versioon 3.0?**
V: Eivät. 2.x-laajennukset eivät ole yhteensopivia version 3.0 kanssa, ja ne on kirjoitettava uudelleen tai korvattava vastaavalla 3.0-toiminnallisuudella.