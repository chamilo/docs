# E-mailinstellingen

Hoe uitgaande e-mail wordt opgebouwd — afzenderidentiteit, opmaak, handtekening en adressen voor speciale doeleinden.

Open deze instellingen via **Beheer > Configuratie-instellingen > E-mail**. Deze categorie bevat **22 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_email_editor_for_anonymous`

**E-maileditor voor anonieme gebruikers**

Sta anonieme gebruikers toe e-mails vanaf het platform te verzenden. In het huidige tijdperk van informatiebeveiliging is dit geen aanbevolen optie.

*Standaard: `true`*


### `cron_notification_help_desk`

**E-mailadressen voor het verzenden van uitvoeringsrapporten van cronjobs**

Opgegeven als array van e-mailadressen. Werkt nog niet voor alle cronjobs.

### `mail_content_style`

**Extra HTML-bodyattributen voor e-mail**

Extra HTML-attributen die worden toegepast op de body-tag van gegenereerde notificatie-e-mails.

### `mail_header_style`

**Extra HTML-headerattributen voor e-mail**

Extra HTML-attributen die worden toegepast op de headersectie van gegenereerde notificatie-e-mails.

### `mailer_debug_enable`

**E-mail: debug**

Selecteer of u de debuglogboeken voor het verzenden van e-mail wilt inschakelen. Deze geven meer informatie over wat er gebeurt bij het verbinden met de e-mailservice, maar zijn niet elegant en kunnen de pagina-opmaak verstoren. Gebruik dit alleen wanneer er geen gebruikersactiviteit is.

*Standaard: `false`*


### `mailer_dkim`

**E-mail: DKIM-headers**

Voer een JSON-array in met uw DKIM-configuratie-instellingen (zie voorbeeld).

### `mailer_dsn`

**E-mail-DSN**

De DSN bevat alle parameters die nodig zijn om verbinding te maken met de e-mailservice. Meer informatie vindt u op https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Hier volgen enkele voorbeelden van ondersteunde DSN-syntaxis: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Voor Microsoft 365, waar SMTP met basisauthenticatie wordt uitgefaseerd, verzendt u in plaats daarvan via de Microsoft Graph API met `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-encodeer elk speciaal teken in het clientgeheim). Hiervoor is een Entra ID-applicatieregistratie vereist waaraan de toepassingsmachtiging `Mail.Send` is verleend — zie [E-mailconfiguratie](../installation/email-configuration.md).

*Standaard: `null://null`*


### `mailer_exclude_json`

**E-mail: LD+JSON vermijden**

Sommige e-mailclients begrijpen het beschrijvende LD+JSON-formaat niet en tonen het als een losse JSON-tekenreeks aan de eindgebruiker. Als dit bij u het geval is, kunt u de onderstaande variabele op 'false' zetten om deze header uit te schakelen.

*Standaard: `false`*


### `mailer_from_email`

**Alle e-mails verzenden vanaf dit e-mailadres**

Stelt het standaard e-mailadres in dat wordt gebruikt in het veld "from" van e-mails.

### `mailer_from_name`

**Alle e-mails verzenden alsof ze afkomstig zijn van deze (organisatie)naam**

Stelt de standaard weergavenaam in die wordt gebruikt voor het verzenden van platform-e-mails, bijv. "Supportteam".

### `mailer_mails_charset`

**E-mail: tekenset**

Voor het geval u de tekenset moet definiëren die wordt gebruikt bij het verzenden van deze e-mails. Laat leeg als u het niet zeker weet.

*Standaard: `UTF-8`*


### `messages_hide_mail_content`

**E-mailinhoud verbergen om gebruikers naar het platform te leiden**

Geef de voorkeur aan korte e-mailversies met een koppeling naar de berichtenruimte op het platform om de betrokkenheid via het platform te vergroten.

*Standaard: `false`*


### `enable_email_open_tracking`

**Openen van e-mails bijhouden**

Voegt een kleine trackingafbeelding toe aan notificatie-e-mails van berichten en registreert wanneer deze wordt opgevraagd. Dit geeft alleen aan dat de e-mail mogelijk is geopend; het bewijst niet dat deze is gelezen.

*Standaard: `false`*

### `enable_inbound_mail`

**E-mailantwoorden op berichten toestaan**

Sta ontvangers van notificaties van directe berichten toe per e-mail te antwoorden. Inkomende berichten moeten door de e-mailinfrastructuur worden doorgestuurd naar het inbound-mail-commando van Chamilo.

*Standaard: `false`*

### `inbound_mail_address`

**Inkomend e-mailadres**

Basisadres dat wordt gebruikt voor het routeren van antwoorden, bijvoorbeeld `replies@example.com`. Chamilo voegt een uniek ontvangerstoken toe via plus-adressering.

### `inbound_mail_dsn`

**DSN van de inkomende mailbox**

Mailboxverbinding die wordt gebruikt om inkomende antwoorden op te halen, bijvoorbeeld `imaps://user:password@imap.example.com:993/INBOX`. URL-encodeer gereserveerde tekens in de aanmeldgegevens.

### `notifications_extended_footer_message`

**Uitgebreide voettekst voor notificaties**

Voeg een aangepaste extra voettekst toe aan notificatie-e-mails voor een specifieke taal, bijvoorbeeld voor privacyverklaringen. Meerdere talen en alinea's kunnen worden toegevoegd.

### `send_notification_score_in_percentage`

**Score als percentage verzenden in de notificatie van toetsresultaten**

Verzendt oefenscores als percentages in plaats van punten in notificatie-e-mails van toetsresultaten.

*Standaard: `false`*

### `send_two_inscription_confirmation_mail`

**Twee registratie-e-mails verzenden**

Verzend bij registratie twee afzonderlijke e-mails. Eén voor de gebruikersnaam en een andere voor het wachtwoord.

*Standaard: `false`*


### `show_user_email_in_notification`

**E-mailadres van de afzender tonen in meldingen**

Neemt het e-mailadres van de afzender samen met de naam op in persoonlijke berichten en meldings-e-mails.

*Standaard: `false`*


### `update_users_email_to_dummy_except_admins`

**E-mailadressen van gebruikers bijwerken naar een dummywaarde tijdens imports**

Vervang tijdens speciale CSV-cronimports van gebruikers automatisch e-mailadressen door het dummy-e-mailadres username@example.com.

*Standaard: `false`*

### `mailer_dsn_massmailing`

**DSN voor massamailing**

Optionele Symfony Mailer-DSN voor uitzendingen van cursus- en platformaankondigingen. Laat dit leeg om het hoofdmailtransport te gebruiken dat is geconfigureerd met `mailer_dsn`. Individuele meldingen blijven het hoofdtransport gebruiken. Configureer en test het extra mailtransport bij uw mailprovider voordat u het gebruikt voor grote uitzendingen.

*Standaard: leeg (hoofdtransport)*

Zie [PR #9406 over mass-mailtransport](https://github.com/chamilo/chamilo-lms/pull/9406).