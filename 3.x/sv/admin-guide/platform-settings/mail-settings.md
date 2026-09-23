# E-postinställningar

Hur utgående e-post byggs upp — avsändaridentitet, layout, signatur och adresser för särskilda ändamål.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > E-post**. Denna kategori innehåller **17 inställningar**, listade nedan med den titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra inställningarna på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_email_editor_for_anonymous`

**E-postredigerare för anonyma**

Tillåt anonyma användare att skicka e-post från plattformen. I dagens informationssäkerhetsklimat är detta inte ett rekommenderat alternativ.

*Standard: `true`*


### `cron_notification_help_desk`

**E-postadresser för att skicka rapporter om körning av cronjobb**

Anges som en array av e-postadresser. Fungerar ännu inte för alla cronjobb.

### `mail_content_style`

**Extra HTML-attribut för e-postens brödtext**

Extra HTML-attribut som ska tillämpas på body-taggen i genererade aviseringsmejl.

### `mail_header_style`

**Extra HTML-attribut för e-postens sidhuvud**

Extra HTML-attribut som ska tillämpas på sidhuvudsektionen i genererade aviseringsmejl.

### `mailer_debug_enable`

**E-post: Felsökning**

Välj om du vill aktivera felsökningsloggar för e-postsändning. Dessa ger mer information om vad som händer vid anslutning till e-posttjänsten, men är inte eleganta och kan förstöra sidans utseende. Använd endast när det inte finns någon användaraktivitet.

*Standard: `false`*


### `mailer_dkim`

**E-post: DKIM-huvuden**

Ange en JSON-array med dina DKIM-konfigurationsinställningar (se exempel).

### `mailer_dsn`

**E-post-DSN**

DSN:en innehåller samtliga parametrar som behövs för att ansluta till e-posttjänsten. Du kan läsa mer på https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Här är några exempel på stödda DSN-syntaxer: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. För Microsoft 365, där SMTP med grundläggande autentisering avvecklas, skicka i stället via Microsoft Graph API med `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (URL-koda eventuella specialtecken i klienthemligheten). Detta kräver en Entra ID-appregistrering med programbehörigheten `Mail.Send` — se [E-postkonfiguration](../installation/email-configuration.md).

*Standard: `null://null`*


### `mailer_exclude_json`

**E-post: Undvik att använda LD+JSON**

Vissa e-postklienter förstår inte det beskrivande LD+JSON-formatet och visar det som en lös JSON-sträng för slutanvändaren. Om detta gäller dig kan du vilja sätta variabeln nedan till 'false' för att inaktivera detta sidhuvud.

*Standard: `false`*


### `mailer_from_email`

**Skicka all e-post från denna e-postadress**

Anger den standardadress som används i fältet "from" i e-postmeddelanden.

### `mailer_from_name`

**Skicka all e-post som om den kommer från detta (organisatoriska) namn**

Anger det standardvisningsnamn som används vid sändning av plattformsmejl. t.ex. "Supportteam".

### `mailer_mails_charset`

**E-post: teckenuppsättning**

Om du behöver definiera den teckenuppsättning som ska användas vid sändning av dessa e-postmeddelanden. Lämna tomt om du är osäker.

*Standard: `UTF-8`*


### `messages_hide_mail_content`

**Dölj e-postinnehåll för att leda användare till plattformen**

Föredra korta e-postversioner med en länk till meddelandeutrymmet på plattformen för att öka engagemanget på plattformen.

*Standard: `false`*


### `notifications_extended_footer_message`

**Utökad sidfot för aviseringar**

Lägg till en anpassad extra sidfot för aviseringsmejl för ett visst språk, till exempel för integritetspolicy. Flera språk och stycken kan läggas till.

### `send_notification_score_in_percentage`

**Skicka poäng i procent i avisering om testresultat**

Skickar övningspoäng som procent i stället för poäng i aviseringsmejl om testresultat.

*Standard: `false`*


### `send_two_inscription_confirmation_mail`

**Skicka 2 registreringsmejl**

Skicka två separata e-postmeddelanden vid registrering. Ett för användarnamnet, ett annat för lösenordet.

*Standard: `false`*


### `show_user_email_in_notification`

**Visa avsändarens e-postadress i aviseringar**

Inkluderar avsändarens e-postadress tillsammans med namnet i personliga meddelanden och aviseringsmejl.

*Standard: `false`*


### `update_users_email_to_dummy_except_admins`

**Uppdatera användares e-post till dummyvärde vid import**

Vid särskilda CSV-cronimport av användare, ersätt automatiskt e-postadresser med dummy-e-post username@example.com.

*Standard: `false`*