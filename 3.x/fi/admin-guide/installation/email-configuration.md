# Sähköpostin määritys

Chamilo hallinnoi nyt sähköpostien lähetysmäärityksiä hallintapaneelista, alustan asetusten osiosta (sähköposteille on oma kohta). Sähköposteja lähetetään tilien luonnista, salasanan nollauksista, kurssi-ilmoituksista, viestihälytyksistä ja muista alustan tapahtumista. Sähköpostin toimitus määritetään `MAILER_DSN`-määritysasetuksella.

## Määritys

Aseta `Mail DSN` -vaihtoehto osiossa /admin/settings/mail. Muoto riippuu sähköpostin siirtotavasta.

### SMTP

Yleisin määritys, sopii mille tahansa SMTP-palvelimelle:

```bash
# Let the system decide
native://default

# Basic SMTP
smtp://username:password@smtp.example.com:587

# SMTP with TLS (most providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP without authentication (local relay)
smtp://localhost:25
```

Korvaa `username`, `password` ja isäntä SMTP-palvelimesi tunnuksilla.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon Mailer -siirto on upotettu Chamiloon. Lisäasennusta ei tarvita.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony Mailjet -siirto on upotettu Chamiloon. Lisäasennusta ei tarvita.

### Brevo (entinen Sendinblue)

```bash
brevo+api://API_KEY@default
```

Symfony Brevo -siirto on upotettu Chamiloon. Lisäasennusta ei tarvita.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft on poistamassa SMTP:n perusautentikoinnilla Exchange Onlinessa, joten pelkkä `smtp://user:password@smtp.office365.com:587` DSN toimii vain niin kauan kuin vuokraajan ylläpitäjä pitää "Authenticated SMTP" -asetuksen nimenomaan käytössä kyseisessä postilaatikossa. Lähetä sen sijaan Microsoft Graph API:n kautta — se ei käytä SMTP:tä lainkaan:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfony Microsoft Graph -siirto on upotettu Chamiloon. Lisäasennusta ei tarvita.

Näiden kolmen arvon hankkimiseksi [Microsoft Entra -hallintakeskuksessa](https://entra.microsoft.com):

1. Rekisteröi sovellus. Sen **Application (client) ID** ja **Directory (tenant) ID** ovat `CLIENT_ID` ja `TENANT_ID`.
2. Kohdassa *API permissions* lisää Microsoft Graphin **application**-oikeus `Mail.Send` (ei delegated-oikeutta) ja myönnä sitten ylläpitäjän suostumus.
3. Kohdassa *Certificates & secrets* luo client secret. Sen **arvo** (ei sen ID) on `CLIENT_SECRET`.

Huomautuksia:

* URL-koodaa mikä tahansa URL:ssa erityismerkityksinen merkki, joka esiintyy client secretissä (`@` muodossa `%40`, `+` muodossa `%2B`, `/` muodossa `%2F` ja niin edelleen).
* Osoitteessa **Lähetä kaikki sähköpostit tästä sähköpostiosoitteesta** määritetyn osoitteen on oltava oikea postilaatikko vuokraajassasi, muuten Microsoft hylkää viestin.
* Lisää DSN:ään `&noSave=true`, jos et halua kopiota jokaisesta alustan sähköpostista lähettäjän *Sent Items* -kansioon.
* Kansallisissa pilvissä osoita DSN oikeisiin päätepisteisiin ilman `https://`-etuliitettä: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Tietoturvavaroitus:** `Mail.Send` *application*-oikeus antaa rekisteröidyn sovelluksen lähettää sähköpostia **mistä tahansa** vuokraajan postilaatikosta, ei vain siitä, jota Chamilo käyttää. Rajoita se lähettäjän postilaatikkoon Exchange Online -sovelluksen käyttöoikeuskäytännöllä:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (kehitys / pienet alustat)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Käytä sovellussalasanaa, älä tavallista Gmail-salasanaasi. Tämä sopii vain pienille alustoille tai kehitykseen, koska Gmaililla on lähetysrajoituksia.

## Alustan sähköpostiasetukset

Siirtotavan lisäksi määritä lähettäjän identiteetti samalla sivulla:

| Asetus | Kuvaus |
|---------|-------------|
| **Lähetä kaikki sähköpostit tästä (organisaation) nimestä** | Järjestelmäsähköposteihin liitetty näyttönimi. |
| **Lähetä kaikki sähköpostit tästä sähköpostiosoitteesta** | Kaikkien järjestelmäsähköpostien "From"-osoite. On oltava kelvollinen osoite, jonka sähköpostisiirtosi hyväksyy. Suosittelemme käyttämään "ei vastausta" -osoitetta, kuten `no-reply@yourdomain.com`, jotta automaattisiin sähköposteihin ei tule turhia vastauksia. |

## Sähköpostin toimituksen testaaminen

Kun `MAILER_DSN` on määritetty, testaa, että sähköpostit toimitetaan: Siirry kohtaan *Hallinta* > *Järjestelmä* > *Sähköpostin testaaja*, määritä vastaanottaja, aihe ja viestin runko ja napsauta **Lähetä testisähköposti**.

Jos komento suoritetaan ilman virheitä mutta sähköpostia ei saavu:

1. Tarkista vastaanottajan roskaposti-/roskakansio.
2. Varmista, että lähettävällä verkkotunnuksella on asianmukaiset DNS-tietueet (SPF, DKIM, DMARC).
3. Tarkista sähköpostipalveluntarjoajan lähetyslokit palautuksista tai hylkäyksistä.
4. Tarkista Chamilo-loki kohdasta `var/log/prod.log` mailer-virheiden varalta.
5. Sähköpostin määritysasetuksissa ota käyttöön *Mail: Debug* (ei saatavilla versiossa 3.0, tulossa pian).

## Kokeellinen: sähköpostijono (asynkroninen toimitus)

Oletuksena sähköpostit lähetetään synkronisesti verkkopyynnön aikana. Parempaa suorituskykyä varten määritä asynkroninen toimitus Symfony Messengerillä:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Asynkronisessa toimituksessa sähköpostit jonotetaan ja lähettää taustatyöntekijä:

```bash
php bin/console messenger:consume async
```

Suorita tämä järjestelmäpalveluna (esim. systemd:llä tai supervisordilla), jotta se pysyy käynnissä.

## Vinkkejä

* **Käytä tuotantoympäristöissä erillistä sähköpostipalvelua** (SES, Mailjet, Brevo). Suora SMTP omaan sähköpostipalvelimeen edellyttää huolellista määritystä toimitettavuusongelmien välttämiseksi.
* **Määritä SPF-, DKIM- ja DMARC-DNS-tietueet** lähettävälle verkkotunnukselle toimitusasteen maksimoimiseksi ja sen estämiseksi, että viestit merkitään roskapostiksi. Voit myös määrittää DKIM-otsakkeet sähköpostiasetussivulta.
* **Käytä asynkronista toimitusta** alustoilla, joilla on enemmän kuin muutama kymmenen aktiivista käyttäjää -- synkroninen sähköpostin lähetys voi hidastaa verkkopyyntöjä huomattavasti.