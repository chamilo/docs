# E-postkonfiguration

Chamilo hanterar nu konfigurationen för e-postsändning från administrationspanelen, avsnittet plattformsinställningar (det finns en särskild post för e-post). E-postmeddelanden skickas vid kontoskapande, återställning av lösenord, kursaviseringar, meddelandevarningar och andra plattformshändelser. E-postleverans konfigureras via inställningen `MAILER_DSN`.

## Konfiguration

Ange alternativet `Mail DSN` i avsnittet /admin/settings/mail. Formatet beror på din e-posttransport.

### SMTP

Den vanligaste konfigurationen, lämplig för valfri SMTP-server:

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

Ersätt `username`, `password` och värden med dina SMTP-serveruppgifter.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfonys Amazon Mailer-transport är inbyggd i Chamilo. Ingen extra installation krävs.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfonys Mailjet-transport är inbyggd i Chamilo. Ingen extra installation krävs.

### Brevo (tidigare Sendinblue)

```bash
brevo+api://API_KEY@default
```

Symfonys Brevo-transport är inbyggd i Chamilo. Ingen extra installation krävs.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft avvecklar SMTP med grundläggande autentisering i Exchange Online, så en enkel `smtp://user:password@smtp.office365.com:587`-DSN fungerar bara så länge din klientadministratör uttryckligen behåller "Authenticated SMTP" aktiverat för den specifika brevlådan. Skicka via Microsoft Graph API i stället — det använder inte SMTP alls:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfonys Microsoft Graph-transport är inbyggd i Chamilo. Ingen extra installation krävs.

För att hämta dessa tre värden, i [Microsoft Entra admin center](https://entra.microsoft.com):

1. Registrera en applikation. Dess **Application (client) ID** och **Directory (tenant) ID** är `CLIENT_ID` och `TENANT_ID`.
2. Under *API permissions*, lägg till Microsoft Graph-behörigheten **application** `Mail.Send` (inte den delegerade), och bevilja sedan administratörsgodkännande.
3. Under *Certificates & secrets*, skapa en klienthemlighet. Dess **value** (inte dess ID) är `CLIENT_SECRET`.

Anmärkningar:

* URL-koda varje tecken med särskild betydelse i en URL som förekommer i klienthemligheten (`@` som `%40`, `+` som `%2B`, `/` som `%2F`, och så vidare).
* Adressen som konfigurerats i **Send all e-mails from this e-mail address** måste vara en verklig brevlåda i din klient, annars avvisar Microsoft meddelandet.
* Lägg till `&noSave=true` i DSN om du inte vill att en kopia av varje plattforms-e-post ska sparas i avsändarens mapp *Sent Items*.
* För nationella moln, peka DSN mot rätt slutpunkter, utan prefixet `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Säkerhetsvarning:** *application*-behörigheten `Mail.Send` låter den registrerade applikationen skicka e-post som **vilken som helst** brevlåda i klienten, inte bara den som Chamilo använder. Begränsa den till avsändarbrevlådan med en Exchange Online-policy för programåtkomst:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (utveckling/små plattformar)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Använd ett applösenord, inte ditt vanliga Gmail-lösenord. Detta är endast lämpligt för små plattformar eller utveckling, eftersom Gmail har sändningsbegränsningar.

## Plattformens e-postinställningar

Utöver transporten, konfigurera avsändaridentiteten på samma sida:

| Inställning | Beskrivning |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | Visningsnamnet som kopplas till systemets e-postmeddelanden. |
| **Send all e-mails from this e-mail address** | "From"-adressen för alla systemets e-postmeddelanden. Måste vara en giltig adress som accepteras av din e-posttransport. Vi rekommenderar att du använder en "no reply"-adress som `no-reply@yourdomain.com` för att undvika meningslösa svar på automatiska e-postmeddelanden. |

## Testa e-postleverans

Efter att du har konfigurerat `MAILER_DSN` ska du testa att e-postmeddelanden levereras: Gå till *Administration* > *System* > *E-mail tester*, ange en mottagare, ett ämne och en e-posttext och klicka på **Send test email**.

Om kommandot slutförs utan fel men e-postmeddelandet inte tas emot:

1. Kontrollera mottagarens skräppost-/skräpmapp.
2. Verifiera att ditt avsändardomän har korrekta DNS-poster (SPF, DKIM, DMARC).
3. Kontrollera din e-postleverantörs sändningsloggar efter studsar eller avvisningar.
4. Granska Chamilo-loggen i `var/log/prod.log` efter fel från mailern.
5. I inställningarna för e-postkonfiguration, aktivera *Mail: Debug* (inte tillgängligt i 3.0, kommer snart).

## Experimentellt: E-postkö (asynkron leverans)

Som standard skickas e-post synkront under webbförfrågan. För bättre prestanda kan du konfigurera asynkron leverans med Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Med asynkron leverans köas e-postmeddelanden och skickas av en bakgrundsarbetare:

```bash
php bin/console messenger:consume async
```

Kör detta som en systemtjänst (t.ex. via systemd eller supervisord) så att den fortsätter att köras.

## Tips

* **Använd en dedikerad e-posttjänst** (SES, Mailjet, Brevo) för produktionsplattformar. Direkt SMTP till din egen e-postserver kräver noggrann konfiguration för att undvika leveransproblem.
* **Konfigurera SPF-, DKIM- och DMARC**-DNS-poster för ditt avsändardomän för att maximera leveransgraden och förhindra att e-postmarkeras som skräppost. Du kan också konfigurera DKIM-sidhuvuden från sidan för e-postinställningar.
* **Använd asynkron leverans** på plattformar med mer än några dussin aktiva användare -- synkron e-postsändning kan märkbart sakta ner webbförfrågningar.