# E-mailconfiguratie

Chamilo beheert de configuratie voor het verzenden van e-mails nu vanuit het beheerdersdashboard, in de sectie platforminstellingen (er is een specifieke vermelding voor e-mails). E-mails worden verzonden bij accountaanmaak, wachtwoordresets, cursusmeldingen, berichtwaarschuwingen en andere platformgebeurtenissen. De e-maillevering wordt geconfigureerd via een configuratie-instelling `MAILER_DSN`.

## Configuratie

Stel de optie `Mail DSN` in in de sectie /admin/settings/mail. Het formaat hangt af van uw e-mailtransport.

### SMTP

De meest voorkomende configuratie, geschikt voor elke SMTP-server:

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

Vervang `username`, `password` en de host door de inloggegevens van uw SMTP-server.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Het Symfony Amazon Mailer-transport is ingebouwd in Chamilo. Er is geen extra installatie vereist.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Het Symfony Mailjet-transport is ingebouwd in Chamilo. Er is geen extra installatie vereist.

### Brevo (voorheen Sendinblue)

```bash
brevo+api://API_KEY@default
```

Het Symfony Brevo-transport is ingebouwd in Chamilo. Er is geen extra installatie vereist.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft stopt met SMTP met basisauthenticatie in Exchange Online, dus een gewone DSN `smtp://user:password@smtp.office365.com:587` werkt alleen zolang de tenantbeheerder "Authenticated SMTP" expliciet ingeschakeld houdt voor dat specifieke postvak. Verzend in plaats daarvan via de Microsoft Graph API — die gebruikt helemaal geen SMTP:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Het Symfony Microsoft Graph-transport is ingebouwd in Chamilo. Er is geen extra installatie vereist.

Om die drie waarden te verkrijgen, in het [Microsoft Entra-beheercentrum](https://entra.microsoft.com):

1. Registreer een toepassing. De **Application (client) ID** en **Directory (tenant) ID** zijn `CLIENT_ID` en `TENANT_ID`.
2. Onder *API permissions* voegt u de Microsoft Graph-**application**-machtiging `Mail.Send` toe (niet de gedelegeerde), en verleent u vervolgens beheerdersinstemming.
3. Onder *Certificates & secrets* maakt u een clientgeheim aan. De **waarde** (niet de ID) is `CLIENT_SECRET`.

Opmerkingen:

* URL-encode elk teken met een speciale betekenis in een URL dat in het clientgeheim voorkomt (`@` als `%40`, `+` als `%2B`, `/` als `%2F`, enzovoort).
* Het adres dat is geconfigureerd in **Send all e-mails from this e-mail address** moet een echt postvak binnen uw tenant zijn, anders weigert Microsoft het bericht.
* Voeg `&noSave=true` toe aan de DSN als u geen kopie van elke platform-e-mail in de map *Sent Items* van de afzender wilt opslaan.
* Voor nationale clouds wijst u de DSN naar de juiste eindpunten, zonder het voorvoegsel `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Beveiligingswaarschuwing:** de *application*-machtiging `Mail.Send` laat de geregistreerde toepassing e-mail verzenden als **elk** postvak in de tenant, niet alleen het postvak dat Chamilo gebruikt. Beperk dit tot het afzenderpostvak met een Exchange Online-toegangsbeleid voor toepassingen:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (ontwikkeling/kleine platforms)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Gebruik een App-wachtwoord, niet uw gewone Gmail-wachtwoord. Dit is alleen geschikt voor kleine platforms of ontwikkeling, omdat Gmail verzendlimieten heeft.

## Platform-e-mailinstellingen

Naast het transport configureert u de afzenderidentiteit op dezelfde pagina:

| Instelling | Beschrijving |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | De weergavenaam die bij systeem-e-mails hoort. |
| **Send all e-mails from this e-mail address** | Het "From"-adres voor alle systeem-e-mails. Moet een geldig adres zijn dat door uw e-mailtransport wordt geaccepteerd. We raden aan een "no reply"-adres te gebruiken zoals `no-reply@yourdomain.com` om zinloze antwoorden op geautomatiseerde e-mails te vermijden. |

## E-maillevering testen

Na het configureren van `MAILER_DSN` test u of e-mails worden afgeleverd: ga naar *Beheer* > *Systeem* > *E-mailtester*, geef een ontvanger, een onderwerp en een e-mailbericht op en klik op **Test-e-mail verzenden**.

Als de opdracht zonder fouten wordt voltooid maar de e-mail niet aankomt:

1. Controleer de map spam/ongewenste e-mail van de ontvanger.
2. Controleer of uw verzenddomein de juiste DNS-records heeft (SPF, DKIM, DMARC).
3. Controleer de verzendlogboeken van uw e-mailprovider op bounces of weigeringen.
4. Bekijk het Chamilo-logboek in `var/log/prod.log` op mailerfouten.
5. Schakel in de instellingen voor e-mailconfiguratie *Mail: Debug* in (niet beschikbaar in 3.0, volgt binnenkort).

## Experimenteel: e-mailwachtrij (asynchrone levering)

Standaard worden e-mails synchroon verzonden tijdens het webverzoek. Voor betere prestaties configureert u asynchrone levering met Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Bij asynchrone levering worden e-mails in de wachtrij geplaatst en verzonden door een achtergrondworker:

```bash
php bin/console messenger:consume async
```

Voer dit uit als systeemservice (bijv. via systemd of supervisord) zodat het blijft draaien.

## Tips

* **Gebruik een dedicated e-maildienst** (SES, Mailjet, Brevo) voor productieplatforms. Directe SMTP naar uw eigen mailserver vereist zorgvuldige configuratie om problemen met de afleverbaarheid te voorkomen.
* **Configureer SPF-, DKIM- en DMARC-DNS-records** voor uw verzenddomein om de afleverpercentages te maximaliseren en te voorkomen dat e-mails als spam worden gemarkeerd. U kunt DKIM-headers ook configureren vanaf de pagina met e-mailinstellingen.
* **Gebruik asynchrone levering** op platforms met meer dan enkele tientallen actieve gebruikers -- synchroon e-mailverzenden kan webverzoeken merkbaar vertragen.