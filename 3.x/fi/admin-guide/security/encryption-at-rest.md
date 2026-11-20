# Käyttäjäprofiilin kenttien salaus levossa

Chamilo 3.1 voi valinnaisesti salata valitut henkilökohtaiset profiilikentät ennen niiden tallentamista tietokantaan. Tämä ensimmäinen toteutus kattaa kentät **biography**, **phone** ja **address**. Salaus on **oletuksena pois käytöstä** ja edellyttää yksityistä salausavainta. Se ei salaa kaikkia käyttäjätietoja eikä korvaa levyn, tietokannan, siirron tai varmuuskopioinnin suojausta.

## Ennen salauksen käyttöönottoa

Käyttöönoton saa suorittaa vain alustan ylläpitäjä, jolla on palvelinkäyttöoikeus. Varmista ensin, että asennus sisältää Chamilo 3.1 -migraatiot salattujen kenttien tallennusta varten, ota palautettavissa oleva tietokantavarmuuskopio ja suunnittele salausavaimen turvallinen varmuuskopiointi **erillään tietokannasta**. Testaa palautusmenettelyt ennen tuotantotietojen muuttamista.

Avain tallennetaan polkuun `var/data-at-rest/master.key`, julkisen web-juuren ulkopuolelle. Älä koskaan julkaise sitä, liitä sitä tukipyyntöön tai tallenna sitä Gitiin. Alkuperäisen avaimen menettäminen voi tehdä salatusta datasta lukukelvotonta. Älä luo korvaavaa avainta, jos käyttäjädataa on jo salattu.

## Alusta avain

Suorita komento kerran esikatselutilassa:

```bash
php bin/console chamilo:security:initialize-at-rest-key
```

Jos se ilmoittaa, ettei salattua dataa ole ja avain voidaan ottaa käyttöön, alusta se nimenomaisesti:

```bash
php bin/console chamilo:security:initialize-at-rest-key --apply
```

Jos komento ilmoittaa olemassa olevasta yhteensopivasta avaimesta, korvausta ei tehdä. Jos salattuja rivejä on olemassa mutta avain puuttuu tai ei vastaa, **pysähdy** ja palauta alkuperäinen avain.

## Valitse suojattavat kentät

Avaa **Administration > Settings > Security** ja valitse salattujen käyttäjäkenttien asetuksesta **Biography**, **Phone** ja/tai **Address**. Valitse vain ne kentät, jotka aiot suojata. Uudet kirjoitukset valittuihin kenttiin käyttävät todennettua salausta (libsodium XChaCha20-Poly1305); vanhat selkotekstirivit pysyvät luettavina, kunnes ne täydennetään nimenomaisesti.

## Tarkista ja täydennä olemassa oleva data

Täydennyskomennot eivät muuta tietueita ilman `--apply`-valitsinta. Suosi yhtä QA-käyttäjää ennen laajempaa erää:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102
php bin/console chamilo:security:encrypt-user-profile-fields --field=address --user-id=102
```

Kun olet varmistanut avaimen saatavuuden, kenttävalinnan, varmuuskopiot ja QA-tilin, suorita tarkoituksellinen pilotti:

```bash
php bin/console chamilo:security:encrypt-user-biographies --user-id=102 --apply
php bin/console chamilo:security:encrypt-user-profile-fields --field=phone --user-id=102 --apply
```

Korvaa `102` todellisella testikäyttäjän tunnuksella. Suuremmille aineistoille käytä valinnaista `--batch-size`-argumenttia (1–500), tarkista komennon tuloste ja sovelluksen toiminta ja ajoita erät huoltoikkunaan. Älä suorita koko tietokannan täydennystä ilman testattua palautusstrategiaa.

## Toiminnalliset rajoitukset

- Tämä on kenttätason salauksen ensimmäinen vaihe, ei koko tietokannan salausta.
- Vanhemmat suorat SQL-integraatiot ja viennit eivät välttämättä osaa lukea salattuja arvoja; varmista ne ennen käyttöönottoa.
- Tietokantavarmuuskopio **ilman** vastaavaa palautettavissa olevaa avainta ei riitä.
- Älä kirjaa kenttien raakasisältöä äläkä sisällytä avainmateriaalia diagnostiikkaan.
- Pelkän sovelluskoodin palauttaminen ei pura tallennettujen arvojen salausta.

Katso [Turva-asetukset](../platform-settings/security-settings.md) yleisiä alustan turva-asetuksia varten. Toteutus: [Chamilo LMS PR #9491](https://github.com/chamilo/chamilo-lms/pull/9491).