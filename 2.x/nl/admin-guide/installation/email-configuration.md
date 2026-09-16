# E-mailconfiguratie

Chamilo beheert nu de configuratie voor het verzenden van e-mails vanuit het administratiedashboard, in de sectie platforminstellingen (er is een specifieke invoer voor e-mails). E-mails worden verzonden voor het aanmaken van accounts, het opnieuw instellen van wachtwoorden, cursusmeldingen, berichtwaarschuwingen en andere platformgebeurtenissen. De levering van e-mails wordt geconfigureerd via een `MAILER_DSN` configuratie-instelling.

## Configuratie

Stel de optie `Mail DSN` in onder de sectie /admin/settings/mail. Het formaat hangt af van uw e-mailtransportmethode.

### SMTP

De meest voorkomende configuratie, geschikt voor elke SMTP-server:

```bash
# Laat het systeem beslissen
native://default

# Basis SMTP
smtp://username:password@smtp.example.com:587

# SMTP met TLS (meeste providers)
smtp://username:password@smtp.example.com:587?encryption=tls

# SMTP zonder authenticatie (lokale relay)
smtp://localhost:25
```

Vervang `username`, `password` en de host door de inloggegevens van uw SMTP-server.

### Amazon SES

```bash
# Via SMTP-interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Via API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

De Symfony Amazon Mailer transport is ingebouwd in Chamilo. Geen extra installatie vereist.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

De Symfony Mailjet transport is ingebouwd in Chamilo. Geen extra installatie vereist.

### Brevo (voorheen Sendinblue)

```bash
brevo+api://API_KEY@default
```

De Symfony Brevo transport is ingebouwd in Chamilo. Geen extra installatie vereist.

### Gmail (Ontwikkeling/Kleine Platforms)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Gebruik een App-wachtwoord, niet uw reguliere Gmail-wachtwoord. Dit is alleen geschikt voor kleine platforms of ontwikkeling, aangezien Gmail verzendlimieten heeft.

## Platform E-mailinstellingen

Naast het transport kunt u op dezelfde pagina de identiteit van de afzender configureren:

| Instelling | Beschrijving |
|------------|--------------|
| **Verzend alle e-mails als afkomstig van deze (organisatie)naam** | De weergavenaam die wordt gekoppeld aan systeem-e-mails. |
| **Verzend alle e-mails vanaf dit e-mailadres** | Het "Van"-adres voor alle systeem-e-mails. Moet een geldig adres zijn dat wordt geaccepteerd door uw e-mailtransport. We raden aan een "geen antwoord"-adres te gebruiken zoals `no-reply@yourdomain.com` om nutteloze antwoorden op geautomatiseerde e-mails te vermijden. |

## E-maillevering Testen

Nadat u `MAILER_DSN` hebt geconfigureerd, test u of e-mails worden afgeleverd: Ga naar *Administratie* > *Systeem* > *E-mailtester*, geef een ontvanger, een onderwerp en een e-mailtekst op en klik op **Test-e-mail verzenden**.

Als de opdracht zonder fouten wordt voltooid maar de e-mail niet wordt ontvangen:

1. Controleer de spam-/ongewenste map van de ontvanger.
2. Controleer of uw verzenddomein de juiste DNS-records heeft (SPF, DKIM, DMARC).
3. Controleer de verzendlogboeken van uw e-mailprovider op bounces of afwijzingen.
4. Bekijk het Chamilo-logboek op `var/log/prod.log` voor mailerfouten.
5. Schakel in de e-mailconfiguratie-instellingen *Mail: Debug* in (niet beschikbaar in 2.0, binnenkort wel).

## Experimenteel: E-mailwachtrij (Asynchrone Levering)

Standaard worden e-mails synchroon verzonden tijdens het webverzoek. Voor betere prestaties kunt u asynchrone levering configureren met Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Met asynchrone levering worden e-mails in een wachtrij geplaatst en verzonden door een achtergrondwerker:

```bash
php bin/console messenger:consume async
```

Voer dit uit als een systeemservice (bijvoorbeeld via systemd of supervisord) zodat het blijft draaien.

## Tips

* **Gebruik een speciale e-mailservice** (SES, Mailjet, Brevo) voor productieplatforms. Directe SMTP naar uw eigen mailserver vereist zorgvuldige configuratie om leveringsproblemen te vermijden.
* **Configureer SPF, DKIM en DMARC** DNS-records voor uw verzenddomein om de leveringspercentages te maximaliseren en te voorkomen dat e-mails als spam worden gemarkeerd. U kunt ook DKIM-headers configureren via de e-mailinstellingenpagina.
* **Gebruik asynchrone levering** op platforms met meer dan een paar dozijn actieve gebruikers -- synchrone e-mailverzending kan webverzoeken merkbaar vertragen.