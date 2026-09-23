# E-postkonfigurasjon

Chamilo administrerer nå konfigurasjonen for sending av e-post fra administrasjonspanelet, i delen for plattforminnstillinger (det finnes en egen oppføring for e-post). E-post sendes ved kontoopprettelse, tilbakestilling av passord, kursvarsler, meldingsvarsler og andre plattformhendelser. E-postlevering konfigureres gjennom innstillingen `MAILER_DSN`.

## Konfigurasjon

Sett alternativet `Mail DSN` i delen /admin/settings/mail. Formatet avhenger av e-posttransporten din.

### SMTP

Den vanligste konfigurasjonen, egnet for enhver SMTP-server:

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

Erstatt `username`, `password` og verten med påloggingsinformasjonen til SMTP-serveren din.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon Mailer-transporten er innebygd i Chamilo. Ingen ekstra installasjon kreves.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony Mailjet-transporten er innebygd i Chamilo. Ingen ekstra installasjon kreves.

### Brevo (tidligere Sendinblue)

```bash
brevo+api://API_KEY@default
```

Symfony Brevo-transporten er innebygd i Chamilo. Ingen ekstra installasjon kreves.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft avvikler SMTP med grunnleggende autentisering i Exchange Online, så en vanlig `smtp://user:password@smtp.office365.com:587`-DSN fungerer bare så lenge leietakeradministratoren din holder «Authenticated SMTP» eksplisitt aktivert for den aktuelle postkassen. Send i stedet via Microsoft Graph API — den bruker ikke SMTP i det hele tatt:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfony Microsoft Graph-transporten er innebygd i Chamilo. Ingen ekstra installasjon kreves.

For å hente disse tre verdiene, i [Microsoft Entra-administrasjonssenteret](https://entra.microsoft.com):

1. Registrer en applikasjon. Dens **Application (client) ID** og **Directory (tenant) ID** er `CLIENT_ID` og `TENANT_ID`.
2. Under *API permissions*, legg til Microsoft Graph-**applikasjonstillatelsen** `Mail.Send` (ikke den delegerte), og gi deretter administratorsamtykke.
3. Under *Certificates & secrets*, opprett en klienthemmelighet. Dens **verdi** (ikke ID-en) er `CLIENT_SECRET`.

Merknader:

* URL-kod ethvert tegn med spesiell betydning i en URL som forekommer i klienthemmeligheten (`@` som `%40`, `+` som `%2B`, `/` som `%2F`, og så videre).
* Adressen som er konfigurert i **Send all e-mails from this e-mail address** må være en ekte postkasse i leietakeren din, ellers avviser Microsoft meldingen.
* Legg til `&noSave=true` i DSN-en hvis du ikke vil at en kopi av hver plattforme-post skal lagres i avsenderens *Sent Items*-mappe.
* For nasjonale skyer, pek DSN-en mot de riktige endepunktene, uten prefikset `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Sikkerhetsadvarsel:** *applikasjonstillatelsen* `Mail.Send` lar den registrerte applikasjonen sende e-post som **enhver** postkasse i leietakeren, ikke bare den Chamilo bruker. Begrens den til avsenderpostkassen med en Exchange Online-applikasjonstilgangspolicy:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (utvikling/små plattformer)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Bruk et app-passord, ikke det vanlige Gmail-passordet ditt. Dette er kun egnet for små plattformer eller utvikling, ettersom Gmail har sendegrenser.

## Plattformens e-postinnstillinger

I tillegg til transporten, konfigurer avsenderidentiteten på samme side:

| Innstilling | Beskrivelse |
|---------|-------------|
| **Send all e-mails as originating from this (organizational) name** | Visningsnavnet som knyttes til systemets e-poster. |
| **Send all e-mails from this e-mail address** | «Fra»-adressen for alle systemets e-poster. Må være en gyldig adresse som godtas av e-posttransporten din. Vi anbefaler å bruke en «ingen svar»-adresse som `no-reply@yourdomain.com` for å unngå meningsløse svar på automatiserte e-poster. |

## Testing av e-postlevering

Etter at du har konfigurert `MAILER_DSN`, tester du at e-poster blir levert: Gå til *Administrasjon* > *System* > *E-posttester*, angi en mottaker, et emne og en e-posttekst, og klikk **Send test-e-post**.

Hvis kommandoen fullføres uten feil, men e-posten ikke mottas:

1. Sjekk mottakerens mappe for søppelpost/spam.
2. Kontroller at avsenderdomenet har korrekte DNS-oppføringer (SPF, DKIM, DMARC).
3. Sjekk e-postleverandørens sendelogger for avvisninger eller returer (bounces).
4. Se gjennom Chamilo-loggen i `var/log/prod.log` etter feil fra maileren.
5. I innstillingene for e-postkonfigurasjon, aktiver *Mail: Debug* (ikke tilgjengelig i 3.0, kommer snart).

## Eksperimentelt: E-postkø (asynkron levering)

Som standard sendes e-poster synkront under webforespørselen. For bedre ytelse kan du konfigurere asynkron levering med Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Med asynkron levering settes e-poster i kø og sendes av en bakgrunnsarbeider:

```bash
php bin/console messenger:consume async
```

Kjør dette som en systemtjeneste (f.eks. via systemd eller supervisord) slik at den fortsetter å kjøre.

## Tips

* **Bruk en dedikert e-posttjeneste** (SES, Mailjet, Brevo) for produksjonsplattformer. Direkte SMTP mot din egen e-postserver krever nøye konfigurasjon for å unngå leveringsproblemer.
* **Konfigurer SPF-, DKIM- og DMARC**-DNS-oppføringer for avsenderdomenet for å maksimere leveringsraten og hindre at e-poster merkes som søppelpost. Du kan også konfigurere DKIM-headere fra siden for e-postinnstillinger.
* **Bruk asynkron levering** på plattformer med mer enn noen titalls aktive brukere -- synkron e-postsending kan merkbart senke webforespørsler.