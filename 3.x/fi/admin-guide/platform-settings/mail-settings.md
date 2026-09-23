# Sähköpostiasetukset

Miten lähtevä sähköposti muodostetaan — lähettäjän identiteetti, asettelu, allekirjoitus ja erityiskäyttöön tarkoitetut osoitteet.

Näihin asetuksiin pääset kohdasta **Hallinta > Määritysasetukset > Sähköposti**. Tässä kategoriassa on **17 asetusta**, jotka on lueteltu alla alustan asetusten fixtureissa (`SettingsCurrentFixtures.php`) toimitetun otsikon ja kommentin kanssa.

> Muuttujan nimi koodissa näytetään monospace-fontilla. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalilla tasolla muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_email_editor_for_anonymous`

**Sähköpostieditori anonyymeille**

Salli anonyymien käyttäjien lähettää sähköposteja alustalta. Tietoturvan nykyaikana tätä vaihtoehtoa ei suositella.

*Oletus: `true`*


### `cron_notification_help_desk`

**Sähköpostiosoitteet, joihin lähetetään cron-töiden suoritusraportit**

Annetaan sähköpostiosoitteiden taulukkona. Ei toimi vielä kaikille cron-töille.

### `mail_content_style`

**Lisäattribuutit sähköpostin HTML-runkoon**

Lisä-HTML-attribuutit, jotka sovelletaan luotujen ilmoitussähköpostien body-elementtiin.

### `mail_header_style`

**Lisäattribuutit sähköpostin HTML-otsikkoon**

Lisä-HTML-attribuutit, jotka sovelletaan luotujen ilmoitussähköpostien otsikko-osioon.

### `mailer_debug_enable`

**Sähköposti: virheenkorjaus**

Valitse, haluatko ottaa käyttöön sähköpostin lähetyksen virheenkorjauslokit. Ne antavat lisätietoa siitä, mitä tapahtuu yhdistettäessä sähköpostipalveluun, mutta ne eivät ole tyylikkäitä ja saattavat rikkoa sivun ulkoasun. Käytä vain, kun käyttäjätoimintaa ei ole.

*Oletus: `false`*


### `mailer_dkim`

**Sähköposti: DKIM-otsikot**

Anna DKIM-määritysasetuksesi JSON-taulukkona (ks. esimerkki).

### `mailer_dsn`

**Sähköpostin DSN**

DSN sisältää kaikki parametrit, joita tarvitaan yhteyden muodostamiseen sähköpostipalveluun. Lisätietoja: https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Tässä muutamia esimerkkejä tuetuista DSN-syntakseista: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Microsoft 365:lle, jossa SMTP perusautentikoinnilla on poistumassa käytöstä, lähetä sen sijaan Microsoft Graph API:n kautta muodossa `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-koodaa kaikki erikoismerkit client secretissä). Tämä edellyttää Entra ID -sovellusrekisteröintiä, jolle on myönnetty `Mail.Send`-sovelluslupa — ks. [Sähköpostin määritys](../installation/email-configuration.md).

*Oletus: `null://null`*


### `mailer_exclude_json`

**Sähköposti: vältä LD+JSON:n käyttöä**

Jotkin sähköpostiohjelmat eivät ymmärrä kuvailevaa LD+JSON-muotoa ja näyttävät sen loppukäyttäjälle irrallisena JSON-merkkijonona. Jos näin on, voit asettaa alla olevan muuttujan arvoksi 'false' tämän otsikon poistamiseksi käytöstä.

*Oletus: `false`*


### `mailer_from_email`

**Lähetä kaikki sähköpostit tästä sähköpostiosoitteesta**

Asettaa oletussähköpostiosoitteen, jota käytetään sähköpostien "from"-kentässä.

### `mailer_from_name`

**Lähetä kaikki sähköpostit tästä (organisaation) nimestä**

Asettaa oletusnäyttönimen, jota käytetään alustan sähköpostien lähetyksessä. Esim. "Tukitiimi".

### `mailer_mails_charset`

**Sähköposti: merkistö**

Jos sinun on määritettävä merkistö näitä sähköposteja lähetettäessä. Jätä tyhjäksi, jos et ole varma.

*Oletus: `UTF-8`*


### `messages_hide_mail_content`

**Piilota sähköpostin sisältö ohjataksesi käyttäjät alustalle**

Suosi lyhyitä sähköpostiversioita, joissa on linkki alustan viestitilaan, jotta alustapohjainen sitoutuminen lisääntyy.

*Oletus: `false`*


### `notifications_extended_footer_message`

**Laajennettu ilmoitusten alatunniste**

Lisää mukautettu ylimääräinen alatunniste ilmoitussähköposteille tietylle kielelle, esimerkiksi tietosuojailmoituksia varten. Useita kieliä ja kappaleita voidaan lisätä.

### `send_notification_score_in_percentage`

**Lähetä pistemäärä prosentteina tenttitulosten ilmoituksessa**

Lähettää harjoitusten pisteet prosentteina pisteiden sijaan tenttitulosten ilmoitussähköposteissa.

*Oletus: `false`*


### `send_two_inscription_confirmation_mail`

**Lähetä 2 rekisteröintisähköpostia**

Lähetä kaksi erillistä sähköpostia rekisteröitymisen yhteydessä. Yksi käyttäjänimelle, toinen salasanalle.

*Oletus: `false`*


### `show_user_email_in_notification`

**Näytä lähettäjän sähköpostiosoite ilmoituksissa**

Sisällyttää lähettäjän sähköpostiosoitteen nimen kanssa henkilökohtaisiin viesteihin ja ilmoitussähköposteihin.

*Oletus: `false`*


### `update_users_email_to_dummy_except_admins`

**Päivitä käyttäjien sähköpostit dummy-arvoon tuonneissa**

Erityisissä käyttäjien CSV-cron-tuonneissa korvaa sähköpostit automaattisesti dummy-sähköpostilla username@example.com.

*Oletus: `false`*