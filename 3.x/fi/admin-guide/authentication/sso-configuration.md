# SSO-määritys

Tällä sivulla käsitellään aiheita, jotka koskevat kaikkia todennusmenetelmiä.

## Useita tarjoajia

Voit ottaa käyttöön useamman kuin yhden todennusmenetelmän samanaikaisesti. Jokainen käytössä oleva tarjoaja näyttää oman painikkeensa kirjautumissivulla tavallisen käyttäjätunnus/salasana-lomakkeen rinnalla. Käyttäjät valitsevat haluamansa menetelmän.

Pidä tavallinen lomake käytössä, jotta alustan ylläpitäjät voivat aina kirjautua sisään, vaikka ulkoinen tarjoaja olisi väärin määritetty.

## Todennuksen prioriteetti

Kun useita menetelmiä on aktiivisena, järjestelmä tarkistaa tunnistetiedot tässä järjestyksessä:

1. LDAP (jos `force_as_login_method` on asetettu)
2. OAuth2-tarjoajat (siinä järjestyksessä kuin ne esiintyvät tiedostossa `authentication.yaml`)
3. Chamilon sisäinen tietokanta

## JWT-tunnukset API-käyttöön

Chamilo käyttää JWT:tä (JSON Web Tokens) REST API:aan. Tunnuksen elinikä ja päivityskäyttäytyminen määritetään tiedostossa `config/packages/lexik_jwt_authentication.yaml`. Tämä on erillään SSO-kirjautumisvirrasta ja koskee vain API-asiakkaita.

## Vianmääritys

### Kirjautumispainike ei näy määrityksen jälkeen

Välimuisti on tyhjennettävä jokaisen `authentication.yaml`-tiedoston muutoksen jälkeen:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Käyttäjät eivät voi kirjautua SSO:n kautta

* **Uudelleenohjaus-URI:n ristiriita** — Identiteettitarjoajaan rekisteröidyn URI:n on vastattava täsmälleen osoitetta `https://your-chamilo-url/connect/<provider>/check`.
* **Kellopoikkeama** — SSO-tunnukset ovat aikaherkkiä. Varmista, että palvelimen kello on synkronoitu (NTP).
* **SSL-varmenne** — Chamilon on luotettava identiteettitarjoajan varmenteeseen. Tarkista itse allekirjoitettuihin varmenteisiin liittyvät ongelmat.
* **Lokit** — Tarkista `var/log/` ja identiteettitarjoajan lokit tiettyjen virheilmoitusten varalta.

### Käyttäjät luodaan väärällä roolilla

Tarkista tarjoajan roolikartoituksen määritys. Uudet käyttäjät saavat oletuksena opiskelijan roolin, ellei ryhmä- tai attribuuttikartoitus nosta heitä.

### Käyttäjät ovat olemassa tarjoajassa, mutta he eivät pääse Chamiloon

* Jos `allow_create_new_users` on false, käyttäjällä on jo oltava Chamilo-tili, jonka sähköposti tai käyttäjätunnus vastaa tarjoajan tietoja.
* Tarkista, ettei käyttäjää ole poistettu käytöstä Chamilossa.
* Azuren osalta tarkista `existing_user_verification_order` ymmärtääksesi, miten Chamilo yhdistää saapuvat käyttäjät olemassa oleviin tileihin.