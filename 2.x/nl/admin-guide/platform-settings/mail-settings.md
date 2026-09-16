# E-mailinstellingen

Hoe uitgaande e-mail wordt opgebouwd — identiteit van de afzender, lay-out, handtekening en speciale adressen.

Ga naar deze instellingen via **Beheer > Configuratie-instellingen > E-mail**. Deze categorie bevat **18 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de platforminstellingen (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt weergegeven in monospace. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_email_editor_for_anonymous`

**E-mail editor voor anonieme gebruikers**

Sta anonieme gebruikers toe om e-mails te verzenden vanaf het platform. In deze tijd van informatiebeveiliging is dit geen aanbevolen optie.

*Standaard: `true`*

### `cron_notification_help_desk`

**E-mailadressen voor rapportages van cronjobs**

Opgegeven als een array van e-mailadressen. Werkt nog niet voor alle cronjobs.

### `mail_content_style`

**Extra HTML-bodyattributen voor e-mail**

Extra HTML-attributen die worden toegepast op de body-tag van gegenereerde notificatie-e-mails.

### `mail_header_style`

**Extra HTML-headerattributen voor e-mail**

Extra HTML-attributen die worden toegepast op de headersectie van gegenereerde notificatie-e-mails.

### `mailer_debug_enable`

**E-mail: Debuggen**

Selecteer of u de debuglogs voor het verzenden van e-mails wilt inschakelen. Deze logs geven meer informatie over wat er gebeurt bij het verbinden met de e-mailservice, maar zijn niet elegant en kunnen de pagina-indeling verstoren. Gebruik dit alleen wanneer er geen gebruikersactiviteit is.

*Standaard: `false`*

### `mailer_dkim`

**E-mail: DKIM-headers**

Voer een JSON-array in met uw DKIM-configuratie-instellingen (zie voorbeeld).

### `mailer_dsn`

**E-mail DSN**

De DSN bevat alle parameters die nodig zijn om verbinding te maken met de e-mailservice. U kunt meer informatie vinden op https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Hier zijn enkele voorbeelden van ondersteunde DSN-syntaxis: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Standaard: `null://null`*

### `mailer_exclude_json`

**E-mail: LD+JSON vermijden**

Sommige e-mailclients begrijpen het beschrijvende LD+JSON-formaat niet en tonen het als een losse JSON-string aan de eindgebruiker. Als dit bij u het geval is, kunt u de onderstaande variabele op 'false' zetten om deze header uit te schakelen.

*Standaard: `false`*

### `mailer_from_email`

**Verzend alle e-mails vanaf dit e-mailadres**

Stelt het standaard e-mailadres in dat wordt gebruikt in het "van"-veld van e-mails.

### `mailer_from_name`

**Verzend alle e-mails als afkomstig van deze (organisatie)naam**

Stelt de standaard weergavenaam in die wordt gebruikt voor het verzenden van platform-e-mails, bijvoorbeeld "Supportteam".

### `mailer_mails_charset`

**E-mail: tekenset**

Als u de tekenset moet definiëren die wordt gebruikt bij het verzenden van e-mails. Laat leeg als u niet zeker weet.

*Standaard: `UTF-8`*

### `mailer_xoauth2`

**E-mail: XOAuth2-opties**

Als u een e-mailservice op basis van XOAuth2 gebruikt, gebruik dan deze instelling in JSON om uw specifieke configuratie op te slaan (zie voorbeeld) en selecteer XOAuth2 in de e-mailservice-instelling.

### `messages_hide_mail_content`

**Verberg e-mailinhoud om gebruikers naar het platform te leiden**

Geef de voorkeur aan korte e-mailversies met een link naar de berichtenruimte op het platform om de betrokkenheid op het platform te vergroten.

*Standaard: `false`*

### `notifications_extended_footer_message`

**Uitgebreide footer voor notificaties**

Voeg een aangepaste extra footer toe voor notificatie-e-mails voor een specifieke taal, bijvoorbeeld voor privacybeleid-meldingen. Meerdere talen en paragrafen kunnen worden toegevoegd.

### `send_notification_score_in_percentage`

**Stuur score in percentage in notificatie van testresultaten**

Verzend oefenscores als percentages in plaats van punten in notificatie-e-mails over testresultaten.

*Standaard: `false`*

### `send_two_inscription_confirmation_mail`

**Verzend 2 registratie-e-mails**

Verzend twee afzonderlijke e-mails bij registratie. Een voor de gebruikersnaam, een andere voor het wachtwoord.

*Standaard: `false`*

### `show_user_email_in_notification`

**Toon e-mailadres van afzender in notificaties**

Voegt het e-mailadres van de afzender toe samen met hun naam in persoonlijke berichten en notificatie-e-mails.

*Standaard: `false`*

### `update_users_email_to_dummy_except_admins`

**Werk e-mail van gebruikers bij naar dummy-waarde tijdens imports**

Tijdens speciale CSV-cron-imports van gebruikers, vervang automatisch e-mails door een dummy e-mailadres zoals username@example.com.

*Standaard: `false`*