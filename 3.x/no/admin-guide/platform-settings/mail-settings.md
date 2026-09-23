# E-postinnstillinger

Hvordan utgående e-post bygges — avsenderidentitet, layout, signatur og adresser til spesielle formål.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > E-post**. Denne kategorien inneholder **17 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_email_editor_for_anonymous`

**E-postredigering for anonyme**

Tillat anonyme brukere å sende e-post fra plattformen. I dagens informasjonssikkerhetsklima er dette ikke et anbefalt valg.

*Standard: `true`*


### `cron_notification_help_desk`

**E-postadresser for å sende rapporter om kjøring av cronjobber**

Angis som en tabell (array) av e-postadresser. Fungerer ennå ikke for alle cronjobber.

### `mail_content_style`

**Ekstra HTML-attributter for e-postkropp**

Ekstra HTML-attributter som skal brukes på body-taggen i genererte varslings-e-poster.

### `mail_header_style`

**Ekstra HTML-attributter for e-posthode**

Ekstra HTML-attributter som skal brukes på header-seksjonen i genererte varslings-e-poster.

### `mailer_debug_enable`

**E-post: Feilsøking**

Velg om du vil aktivere feilsøkingslogger for e-postsending. Disse gir mer informasjon om hva som skjer ved tilkobling til e-posttjenesten, men er ikke elegante og kan ødelegge sidedesignet. Bruk kun når det ikke er brukeraktivitet.

*Standard: `false`*


### `mailer_dkim`

**E-post: DKIM-headere**

Angi en JSON-tabell med DKIM-konfigurasjonsinnstillingene dine (se eksempel).

### `mailer_dsn`

**E-post-DSN**

DSN-en inneholder alle parametere som trengs for å koble til e-posttjenesten. Du kan lese mer på https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Her er noen eksempler på støttet DSN-syntaks: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. For Microsoft 365, der SMTP med grunnleggende autentisering fases ut, send i stedet via Microsoft Graph API med `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-kod eventuelle spesialtegn i klienthemmeligheten). Dette krever en Entra ID-appregistrering med programtillatelsen `Mail.Send` — se [E-postkonfigurasjon](../installation/email-configuration.md).

*Standard: `null://null`*


### `mailer_exclude_json`

**E-post: Unngå bruk av LD+JSON**

Noen e-postklienter forstår ikke det beskrivende LD+JSON-formatet og viser det som en løs JSON-streng til sluttbrukeren. Hvis dette gjelder deg, kan du sette variabelen nedenfor til 'false' for å deaktivere denne headeren.

*Standard: `false`*


### `mailer_from_email`

**Send all e-post fra denne e-postadressen**

Angir standard e-postadresse som brukes i «fra»-feltet i e-poster.

### `mailer_from_name`

**Send all e-post som om den kommer fra dette (organisatoriske) navnet**

Angir standard visningsnavn som brukes ved sending av plattform-e-post. f.eks. «Support team».

### `mailer_mails_charset`

**E-post: tegnsett**

Dersom du trenger å definere tegnsettet som skal brukes ved sending av e-postene. La stå tomt hvis du er usikker.

*Standard: `UTF-8`*


### `messages_hide_mail_content`

**Skjul e-postinnhold for å lede brukere til plattformen**

Foretrekk korte e-postversjoner med en lenke til meldingsområdet på plattformen for å øke engasjementet på plattformen.

*Standard: `false`*


### `notifications_extended_footer_message`

**Utvidet bunntekst for varsler**

Legg til en egendefinert ekstra bunntekst for varslings-e-poster for et spesifikt språk, for eksempel for personvernerklæringer. Flere språk og avsnitt kan legges til.

### `send_notification_score_in_percentage`

**Send poengsum i prosent i varsel om testresultater**

Sender øvelsespoeng som prosent i stedet for poeng i e-postvarsler om testresultater.

*Standard: `false`*


### `send_two_inscription_confirmation_mail`

**Send 2 registrerings-e-poster**

Send to separate e-poster ved registrering. Én for brukernavnet, en annen for passordet.

*Standard: `false`*


### `show_user_email_in_notification`

**Vis avsenders e-postadresse i varsler**

Inkluderer avsenderens e-postadresse sammen med navnet i personlige meldinger og varslings-e-poster.

*Standard: `false`*


### `update_users_email_to_dummy_except_admins`

**Oppdater brukeres e-post til dummy-verdi under importer**

Under spesielle CSV-cron-importer av brukere, erstatt automatisk e-poster med dummy-e-post username@example.com.

*Standard: `false`*