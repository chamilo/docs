# E-mailkonfiguration

Chamilo administrerer nu konfigurationen af e-mailafsendelse fra administrationsdashboardet, sektionen for platformindstillinger (der er et særskilt punkt til e-mails). E-mails sendes ved kontooprettelser, nulstilling af adgangskode, kursusmeddelelser, beskedalarmer og andre platformhændelser. E-maillevering konfigureres via indstillingen `MAILER_DSN`.

## Konfiguration

Angiv indstillingen `Mail DSN` i sektionen /admin/settings/mail. Formatet afhænger af din e-mailtransport.

### SMTP

Den mest almindelige konfiguration, velegnet til enhver SMTP-server:

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

Erstat `username`, `password` og værten med dine SMTP-serveroplysninger.

### Amazon SES

```bash
# Using SMTP interface
ses+smtp://ACCESS_KEY:SECRET_KEY@default?region=us-east-1

# Using API
ses+api://ACCESS_KEY:SECRET_KEY@default?region=us-east-1
```

Symfony Amazon Mailer-transporten er indlejret i Chamilo. Ingen yderligere installation er påkrævet.

### Mailjet

```bash
mailjet+api://API_KEY:SECRET_KEY@default
```

Symfony Mailjet-transporten er indlejret i Chamilo. Ingen yderligere installation er påkrævet.

### Brevo (tidligere Sendinblue)

```bash
brevo+api://API_KEY@default
```

Symfony Brevo-transporten er indlejret i Chamilo. Ingen yderligere installation er påkrævet.

### Microsoft 365 / Outlook (Microsoft Graph API)

Microsoft udfaser SMTP med grundlæggende autentificering i Exchange Online, så en almindelig `smtp://user:password@smtp.office365.com:587`-DSN virker kun, så længe din tenant-administrator holder "Authenticated SMTP" eksplicit aktiveret på den pågældende postkasse. Send i stedet via Microsoft Graph API — den bruger slet ikke SMTP:

```bash
microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID
```

Symfony Microsoft Graph-transporten er indlejret i Chamilo. Ingen yderligere installation er påkrævet.

For at indhente disse tre værdier, i [Microsoft Entra-administrationscenteret](https://entra.microsoft.com):

1. Registrer en applikation. Dens **Application (client) ID** og **Directory (tenant) ID** er `CLIENT_ID` og `TENANT_ID`.
2. Under *API permissions* tilføjes Microsoft Graph-**application**-tilladelsen `Mail.Send` (ikke den delegerede), og der gives derefter administratoraccept.
3. Under *Certificates & secrets* oprettes en klienthemmelighed. Dens **værdi** (ikke dens ID) er `CLIENT_SECRET`.

Bemærkninger:

* URL-kod ethvert tegn med særlig betydning i en URL, som optræder i klienthemmeligheden (`@` som `%40`, `+` som `%2B`, `/` som `%2F` osv.).
* Adressen konfigureret i **Send alle e-mails fra denne e-mailadresse** skal være en rigtig postkasse i din tenant, ellers afviser Microsoft meddelelsen.
* Tilføj `&noSave=true` til DSN'en, hvis du ikke ønsker, at en kopi af hver platform-e-mail gemmes i afsenderens mappe *Sent Items*.
* For nationale clouds pege DSN'en på de rigtige endepunkter, uden præfikset `https://`: `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@microsoftgraph.chinacloudapi.cn?tenantId=TENANT_ID&authEndpoint=login.partner.microsoftonline.cn`.

**Sikkerhedsadvarsel:** *application*-tilladelsen `Mail.Send` lader den registrerede applikation sende e-mail som **enhver** postkasse i tenanten, ikke kun den Chamilo bruger. Begræns den til afsenderpostkassen med en Exchange Online-applikationstilgangspolitik:

```powershell
New-ApplicationAccessPolicy -AppId CLIENT_ID -PolicyScopeGroupId no-reply@yourdomain.com -AccessRight RestrictAccess -Description "Restrict Chamilo to its sender mailbox"
```

### Gmail (udvikling/små platforme)

```bash
gmail+smtp://your-email@gmail.com:app-password@default
```

Brug en app-adgangskode, ikke din almindelige Gmail-adgangskode. Dette er kun velegnet til små platforme eller udvikling, da Gmail har afsendelsesgrænser.

## Platformens e-mailindstillinger

Ud over transporten konfigureres afsenderidentiteten på samme side:

| Indstilling | Beskrivelse |
|---------|-------------|
| **Send alle e-mails som stammende fra dette (organisatoriske) navn** | Det visningsnavn, der er knyttet til system-e-mails. |
| **Send alle e-mails fra denne e-mailadresse** | "From"-adressen for alle system-e-mails. Skal være en gyldig adresse, som din e-mailtransport accepterer. Vi anbefaler at bruge en "no reply"-adresse som `no-reply@yourdomain.com` for at undgå meningsløse svar på automatiserede e-mails. |

## Test af e-maillevering

Når du har konfigureret `MAILER_DSN`, skal du teste, at e-mails bliver leveret: Gå til *Administration* > *System* > *E-mail tester*, angiv en modtager, et emne og en e-mailtekst, og klik på **Send test email**.

Hvis kommandoen fuldføres uden fejl, men e-mailen ikke modtages:

1. Tjek modtagerens spam-/uønsket-mappe.
2. Kontrollér, at dit afsendelsesdomæne har korrekte DNS-poster (SPF, DKIM, DMARC).
3. Tjek din e-mailudbyders afsendelseslogfiler for bounces eller afvisninger.
4. Gennemgå Chamilo-loggen i `var/log/prod.log` for mailer-fejl.
5. I indstillingerne for e-mailkonfiguration skal du aktivere *Mail: Debug* (ikke tilgængelig i 3.0, kommer snart).

## Eksperimentelt: E-mailkø (asynkron levering)

Som standard sendes e-mails synkront under webanmodningen. For bedre ydeevne kan du konfigurere asynkron levering med Symfony Messenger:

```yaml
# config/packages/messenger.yaml
framework:
    messenger:
        transports:
            async: '%env(MESSENGER_TRANSPORT_DSN)%'
        routing:
            'Symfony\Component\Mailer\Messenger\SendEmailMessage': async
```

Med asynkron levering sættes e-mails i kø og sendes af en baggrundsarbejder:

```bash
php bin/console messenger:consume async
```

Kør dette som en systemtjeneste (f.eks. via systemd eller supervisord), så den bliver ved med at køre.

## Tips

* **Brug en dedikeret e-mailtjeneste** (SES, Mailjet, Brevo) til produktionsplatforme. Direkte SMTP til din egen mailserver kræver omhyggelig konfiguration for at undgå leveringsproblemer.
* **Konfigurér SPF-, DKIM- og DMARC-DNS-poster** for dit afsendelsesdomæne for at maksimere leveringsrater og forhindre, at e-mails markeres som spam. Du kan også konfigurere DKIM-headere fra siden med e-mailindstillinger.
* **Brug asynkron levering** på platforme med mere end nogle dusin aktive brugere — synkron e-mailafsendelse kan mærkbart forsinke webanmodninger.