# Mailinstellingen

Hoe uitgaande mail wordt opgebouwd — identiteit van de afzender, lay-out, handtekening en adressen voor speciale doeleinden.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Mail**. Deze categorie bevat **17 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de instellingen-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code staat in monospace. Gebruik die bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_email_editor_for_anonymous`

**E-maileditor voor anonieme gebruikers**

Anonieme gebruikers toestaan e-mails vanaf het platform te versturen. In het huidige tijdperk van informatiebeveiliging is dit geen aanbevolen optie.

*Standaard: `true`*


### `cron_notification_help_desk`

**E-mailadressen voor rapporten van cronjob-uitvoering**

Opgegeven als array van e-mailadressen. Werkt nog niet voor alle cronjobs.

### `mail_content_style`

**Extra HTML-body-attributen voor e-mail**

Extra HTML-attributen die worden toegepast op de body-tag van gegenereerde notificatie-e-mails.

### `mail_header_style`

**Extra HTML-header-attributen voor e-mail**

Extra HTML-attributen die worden toegepast op de headersectie van gegenereerde notificatie-e-mails.

### `mailer_debug_enable`

**Mail: debuggen**

Selecteer of u de debuglogs voor het verzenden van e-mail wilt inschakelen. Deze geven meer informatie over wat er gebeurt bij de verbinding met de mailservice, maar zijn niet elegant en kunnen de paginavormgeving verstoren. Alleen gebruiken wanneer er geen gebruikersactiviteit is.

*Standaard: `false`*


### `mailer_dkim`

**Mail: DKIM-headers**

Voer een JSON-array in van uw DKIM-configuratie-instellingen (zie voorbeeld).

### `mailer_dsn`

**Mail-DSN**

De DSN bevat alle parameters die nodig zijn om verbinding te maken met de mailservice. Meer informatie vindt u op https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Hier volgen enkele voorbeelden van ondersteunde DSN-syntaxis: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Voor Microsoft 365, waar SMTP met basisauthenticatie wordt uitgefaseerd, verzendt u in plaats daarvan via de Microsoft Graph API met `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-encodeer speciale tekens in het clientgeheim). Dit vereist een Entra ID-toepassingsregistratie met de toepassingsmachtiging `Mail.Send` — zie [E-mailconfiguratie](../installation/email-configuration.md).

*Standaard: `null://null`*


### `mailer_exclude_json`

**Mail: LD+JSON vermijden**

Sommige e-mailclients begrijpen het beschrijvende LD+JSON-formaat niet en tonen het als een losse JSON-tekenreeks aan de eindgebruiker. Als dat bij u het geval is, kunt u de onderstaande variabele op 'false' zetten om deze header uit te schakelen.

*Standaard: `false`*


### `mailer_from_email`

**Alle e-mails verzenden vanaf dit e-mailadres**

Stelt het standaard-e-mailadres in dat wordt gebruikt in het veld "from" van e-mails.

### `mailer_from_name`

**Alle e-mails verzenden als afkomstig van deze (organisatie)naam**

Stelt de standaardweergavenaam in die wordt gebruikt voor het verzenden van platform-e-mails. Bijv. "Supportteam".

### `mailer_mails_charset`

**Mail: tekenset**

Voor het geval u de tekenset moet definiëren die bij het verzenden van die e-mails wordt gebruikt. Laat leeg als u het niet zeker weet.

*Standaard: `UTF-8`*


### `messages_hide_mail_content`

**E-mailinhoud verbergen om gebruikers naar het platform te leiden**

Kies voor korte e-mailversies met een link naar de berichtenruimte op het platform om de betrokkenheid via het platform te vergroten.

*Standaard: `false`*


### `notifications_extended_footer_message`

**Uitgebreide voettekst voor notificaties**

Voeg een extra aangepaste voettekst toe voor notificatie-e-mails voor een specifieke taal, bijvoorbeeld voor privacyverklaringen. Meerdere talen en alinea's kunnen worden toegevoegd.

### `send_notification_score_in_percentage`

**Score als percentage verzenden in notificatie van toetsresultaten**

Verzendt oefenscores als percentages in plaats van punten in e-mails met toetsresultaatnotificaties.

*Standaard: `false`*


### `send_two_inscription_confirmation_mail`

**2 registratie-e-mails verzenden**

Verzend bij registratie twee afzonderlijke e-mails. Eén voor de gebruikersnaam, een andere voor het wachtwoord.

*Standaard: `false`*


### `show_user_email_in_notification`

**E-mailadres van de afzender tonen in notificaties**

Neemt het e-mailadres van de afzender samen met de naam op in persoonlijke berichten en notificatie-e-mails.

*Standaard: `false`*


### `update_users_email_to_dummy_except_admins`

**E-mail van gebruikers bij imports bijwerken naar dummywaarde**

Vervang tijdens speciale CSV-cron-imports van gebruikers automatisch e-mails door het dummy-e-mailadres username@example.com.

*Standaard: `false`*