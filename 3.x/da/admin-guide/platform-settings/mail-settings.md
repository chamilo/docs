# Mailindstillinger

Hvordan udgående mail opbygges — afsenderidentitet, layout, signatur og adresser til særlige formål.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Mail**. Denne kategori indeholder **17 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script’er via API’et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_email_editor_for_anonymous`

**E-mail-editor for anonyme**

Tillad anonyme brugere at sende e-mails fra platformen. I en tid med informationssikkerhed er dette ikke en anbefalet indstilling.

*Standard: `true`*


### `cron_notification_help_desk`

**E-mailadresser til at sende rapporter om udførelse af cronjobs**

Angives som et array af e-mailadresser. Fungerer endnu ikke for alle cronjobs.

### `mail_content_style`

**Ekstra HTML-body-attributter til e-mail**

Ekstra HTML-attributter, der skal anvendes på body-tagget i genererede notifikations-e-mails.

### `mail_header_style`

**Ekstra HTML-header-attributter til e-mail**

Ekstra HTML-attributter, der skal anvendes på header-sektionen i genererede notifikations-e-mails.

### `mailer_debug_enable`

**Mail: Debug**

Vælg, om du vil aktivere debug-logs for e-mailafsendelse. Disse giver mere information om, hvad der sker ved forbindelse til mailtjenesten, men er ikke elegante og kan ødelægge sidens design. Brug kun, når der ikke er brugeraktivitet.

*Standard: `false`*


### `mailer_dkim`

**Mail: DKIM-headers**

Indtast et JSON-array med dine DKIM-konfigurationsindstillinger (se eksempel).

### `mailer_dsn`

**Mail DSN**

DSN’en indeholder alle parametre, der er nødvendige for at forbinde til mailtjenesten. Du kan læse mere på https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Her er nogle eksempler på understøttet DSN-syntaks: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. For Microsoft 365, hvor SMTP med basic authentication udfases, send i stedet via Microsoft Graph API med `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-kod eventuelle specialtegn i client secret). Dette kræver en Entra ID-applikationsregistrering med applikationstilladelsen `Mail.Send` — se [E-mailkonfiguration](../installation/email-configuration.md).

*Standard: `null://null`*


### `mailer_exclude_json`

**Mail: Undgå brug af LD+JSON**

Nogle e-mailklienter forstår ikke det beskrivende LD+JSON-format og viser det som en løs JSON-streng for den endelige bruger. Hvis det er tilfældet, kan du sætte variablen nedenfor til 'false' for at deaktivere denne header.

*Standard: `false`*


### `mailer_from_email`

**Send alle e-mails fra denne e-mailadresse**

Angiver den standard-e-mailadresse, der bruges i feltet "from" i e-mails.

### `mailer_from_name`

**Send alle e-mails som stammende fra dette (organisatoriske) navn**

Angiver det standardvisningsnavn, der bruges ved afsendelse af platform-e-mails. f.eks. "Support team".

### `mailer_mails_charset`

**Mail: tegnsæt**

Hvis du skal definere det tegnsæt, der skal bruges ved afsendelse af disse e-mails. Lad feltet være tomt, hvis du er i tvivl.

*Standard: `UTF-8`*


### `messages_hide_mail_content`

**Skjul e-mailindhold for at lede brugere til platformen**

Foretræk korte e-mailversioner med et link til beskedområdet på platformen for at øge engagementet på platformen.

*Standard: `false`*


### `notifications_extended_footer_message`

**Udvidet sidefod til notifikationer**

Tilføj en brugerdefineret ekstra sidefod til notifikations-e-mails for et specifikt sprog, for eksempel til meddelelser om privatlivspolitik. Flere sprog og afsnit kan tilføjes.

### `send_notification_score_in_percentage`

**Send score i procent i notifikation om testresultater**

Sender øvelsesscores som procenter i stedet for point i e-mails med notifikation om testresultater.

*Standard: `false`*


### `send_two_inscription_confirmation_mail`

**Send 2 registrerings-e-mails**

Send to separate e-mails ved registrering. Én til brugernavnet og en anden til adgangskoden.

*Standard: `false`*


### `show_user_email_in_notification`

**Vis afsenderens e-mailadresse i notifikationer**

Inkluderer afsenderens e-mailadresse sammen med navnet i personlige beskeder og notifikations-e-mails.

*Standard: `false`*


### `update_users_email_to_dummy_except_admins`

**Opdater brugeres e-mail til dummy-værdi under import**

Under særlige CSV-cron-importer af brugere erstattes e-mails automatisk med dummy-e-mailen username@example.com.

*Standard: `false`*