# E-mailconfiguratie

Chamilo beheert de configuratie voor het verzenden van e-mails nu vanuit het beheerdersdashboard, in de sectie platforminstellingen (er is een specifieke vermelding voor e-mails). E-mails worden verzonden voor het aanmaken van accounts, het opnieuw instellen van wachtwoorden, cursusmeldingen, berichtwaarschuwingen en andere platformgebeurtenissen. De e-mailbezorging wordt geconfigureerd via de configuratie-instelling `MAILER_DSN`.

## Configuratie

Stel de optie `Mail DSN` in in de sectie /admin/settings/mail. De indeling hangt af van uw e-mailtransport.

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

Vervang `username`, `password` en de host door de referenties van uw SMTP-server.

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

Microsoft schaft SMTP met basisverificatie in Exchange Online af, dus een eenvoudige DSN `smtp://user:password@smtp.office365.com:587` werkt alleen zolang de tenantbeheerder "Authenticated SMTP" expliciet ingeschakeld houdt voor die specifieke mailbox. Verzend in plaats daarvan via de Microsoft Graph API — die gebruikt helemaal geen SMTP:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Het Symfony Microsoft Graph-transport is ingebouwd in Chamilo. Er is geen extra installatie vereist.

Om die drie waarden te verkrijgen, in het [Microsoft Entra-beheercentrum](https://entra.microsoft.com):

1. Registreer een toepassing. De **Application (client) ID** en de **Directory (tenant) ID** zijn `CLIENT_ID` en `TENANT_ID`.
2. Voeg onder *API permissions* de Microsoft Graph-**toepassings**machtiging `Mail.Send` toe (niet de gedelegeerde), en verleen vervolgens beheerderstoestemming.
3. Maak onder *Certificates & secrets* een clientgeheim aan. De **waarde** ervan (niet de ID) is `CLIENT_SECRET`.

Opmerkingen:

* URL-codeer elk teken met een speciale betekenis in een URL dat in het clientgeheim voorkomt (`@` als `%40`, `+` als `%2B`, `/` als `%2F`, enzovoort).
* Het adres dat is geconfigureerd in **Send all e-mails from this e-mail address** moet een echte mailbox binnen uw tenant zijn, anders weigert Microsoft het bericht.
* Voeg `&noSave=true` toe aan de DSN als u niet wilt dat een kopie van elke platform-e-mail wordt opgeslagen in de map *Sent Items* van de afzender.
* Wijs voor nationale clouds de DSN naar de juiste eindpunten, zonder het voorvoegsel `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Beveiligingswaarschuwing:** de *toepassings*machtiging `Mail.Send` laat de geregistreerde toepassing e-mail verzenden als **elke** mailbox in de tenant, niet alleen de mailbox die Chamilo gebruikt. Beperk deze tot de afzendermailbox met een Exchange Online-toepassingsbeleid voor toegang:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (ontwikkeling/kleine platforms)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Gebruik een app-wachtwoord, niet uw gewone Gmail-wachtwoord. Dit is alleen geschikt voor kleine platforms of ontwikkeling, omdat Gmail verzendlimieten heeft.

## Platforminstellingen voor e-mail

Configureer naast het transport de identiteit van de afzender op dezelfde pagina:

| Instelling | Beschrijving |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | De weergavenaam die aan systeem-e-mails is gekoppeld. |
| **Send all e-mails from this e-mail address** | Het "Van"-adres voor alle systeem-e-mails. Moet een geldig adres zijn dat door uw e-mailtransport wordt geaccepteerd. Wij raden aan een "no reply"-adres te gebruiken, zoals `no-reply@yourdomain.com`, om zinloze antwoorden op geautomatiseerde e-mails te vermijden. |

---
## Inkomende antwoorden op directe berichten

Chamilo kan een ontvanger laten antwoorden op een melding van een direct bericht vanuit de normale e-mailclient en dat antwoord omzetten in een bericht in de Chamilo-inbox. Configureer het volgende onder **Beheer > Configuratie-instellingen > E-mail**:

1. Stel **E-mailantwoorden op berichten toestaan** (`enable_inbound_mail`) in op **Ja**.
2. Stel **Inkomend e-mailadres** (`inbound_mail_address`) in op een geldig basisadres zoals `replies@example.com`. Chamilo gebruikt plus-adressering om voor elke ontvanger een uniek adres op te bouwen, zoals `replies+TOKEN@example.com`.
3. Leid die inkomende berichten terug naar Chamilo via een van de onderstaande methoden.

### Een IMAP-postvak pollen

Stel **DSN van inkomend postvak** (`inbound_mail_dsn`) in op het postvak dat de antwoorden ontvangt, bijvoorbeeld:

```text
imaps://user:password@imap.example.com:993/INBOX
```

URL-codeer gereserveerde tekens in de gebruikersnaam of het wachtwoord. Voer vervolgens de postvakverzamelaar periodiek uit, bijvoorbeeld elke vijf minuten:

```bash
*/5 * * * * cd /path/to/chamilo && php bin/console chamilo:mail:fetch-inbound --no-interaction
```

De verzamelaar verwerkt ongelezen berichten in batches. Mislukte berichten blijven standaard ongelezen zodat ze opnieuw kunnen worden geprobeerd; gebruik `--mark-failed-seen` alleen wanneer u dat herhaalgedrag uitdrukkelijk niet wilt.

### E-mail pipen vanuit de MTA

Een MTA kan in plaats daarvan één onbewerkt RFC822-bericht rechtstreeks naar Chamilo pipen:

```bash
php bin/console chamilo:mail:process-inbound
```

De opdracht leest van STDIN; `--file` kan worden gebruikt voor een opgeslagen bericht en `--recipient` kan de SMTP-envelopontvanger opgeven wanneer de `To`-header is herschreven.

Om veiligheidsredenen accepteert Chamilo het antwoord alleen wanneer het token een geldige berichtontvanger identificeert en het `From`-adres van het bericht overeenkomt met het e-mailadres van die ontvanger in Chamilo. De oorspronkelijke afzender en de antwoordende gebruiker moeten nog actief zijn. Alleen de nieuwe antwoordtekst wordt opgeslagen; geciteerde geschiedenis wordt waar mogelijk verwijderd.

## Bijhouden van geopende e-mails

Stel **Openingen van e-mails bijhouden** (`enable_email_open_tracking`) in op **Ja** om een kleine trackingafbeelding toe te voegen aan meldingsmails van directe berichten. Wanneer die afbeelding wordt opgevraagd, registreert Chamilo het tijdstip en kan dit weergeven in de **Verzonden** berichten van de afzender onder **E-mailmeldingen**.

Een tijdstempel voor het bijhouden van openingen betekent alleen dat de afbeelding is opgevraagd. E-mailclients kunnen afbeeldingen blokkeren, vooraf ophalen of via een proxy laden, dus dit mag niet worden beschouwd als bewijs dat de ontvanger het bericht daadwerkelijk heeft gelezen.

## E-mailbezorging testen

Na het configureren van `MAILER_DSN` test u of e-mails worden bezorgd: ga naar *Beheer* > *Systeem* > *E-mailtester*, geef een ontvanger, een onderwerp en een e-mailtekst op en klik op **Test-e-mail verzenden**.

Als de opdracht zonder fouten wordt voltooid maar de e-mail niet wordt ontvangen:

1. Controleer de spam-/ongewenste-map van de ontvanger.
2. Controleer of uw verzenddomein de juiste DNS-records heeft (SPF, DKIM, DMARC).
3. Controleer de verzendlogboeken van uw e-mailprovider op bounces of afwijzingen.
4. Bekijk het Chamilo-logboek op `var/log/prod.log` op mailerfouten.
5. Schakel in de e-mailconfiguratie-instellingen *Mail: Debug* in (niet beschikbaar in 3.0, volgt binnenkort).

## Experimenteel: e-mailwachtrij (asynchrone bezorging)

Standaard worden e-mails synchroon verzonden tijdens het webverzoek. Configureer voor betere prestaties asynchrone bezorging met Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Bij asynchrone bezorging worden e-mails in de wachtrij geplaatst en verzonden door een achtergrondworker:

```bash
php bin/console messenger:consume async
```

Voer dit uit als een systeemservice (bijv. via systemd of supervisord) zodat het blijft draaien.

## Tips

* **Gebruik een speciale e-mailservice** (SES, Mailjet, Brevo) voor productieplatformen. Directe SMTP naar uw eigen mailserver vereist zorgvuldige configuratie om bezorgbaarheidsproblemen te voorkomen.
* **Configureer SPF-, DKIM- en DMARC**-DNS-records voor uw verzenddomein om de bezorgpercentages te maximaliseren en te voorkomen dat e-mails als spam worden gemarkeerd. U kunt DKIM-headers ook configureren via de pagina met e-mailinstellingen.
* **Gebruik asynchrone bezorging** op platformen met meer dan enkele tientallen actieve gebruikers -- synchroon e-mail verzenden kan webverzoeken merkbaar vertragen.