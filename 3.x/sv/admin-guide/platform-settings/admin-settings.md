# Administratörens identitetsinställningar

Identitets- och kontaktuppgifter för plattformsadministratören. Dessa värden visas i plattformens sidfot och i vissa systemgenererade e-postmeddelanden.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Administratörens identitet**. Denna kategori innehåller **12 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:t eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `administrator_email`

**Portaladministratör: e-post**

E-postadressen till plattformsadministratören (visas i sidfoten till vänster)

### `administrator_name`

**Portaladministratör: förnamn**

Förnamnet på plattformsadministratören (visas i sidfoten till vänster)

### `administrator_phone`

**Portaladministratör: telefonnummer**

Telefonnumret till plattformsadministratören (visas i sidfoten till vänster)

### `administrator_surname`

**Portaladministratör: efternamn**

Efternamnet på plattformsadministratören (visas i sidfoten till vänster)

### `chamilo_latest_news`

**Senaste nyheterna**

Hämta de senaste nyheterna från Chamilo, inklusive säkerhetssårbarheter och evenemang, direkt i administrationspanelen. Dessa nyheter kontrolleras mot Chamilos nyhetsserver varje gång du läser in administrationssidan och är endast synliga för administratörer.

*Standard: `true`*

### `chamilo_support`

**Chamilo-supportblock**

Få professionella tips och ett enkelt sätt att kontakta officiella tjänsteleverantörer för professionell support, direkt från skaparna av Chamilo. Detta block visas på din administrationssida, är endast synligt för administratörer och uppdateras varje gång du läser in administrationssidan.

*Standard: `true`*

### `max_anonymous_users`

**Flera anonyma användare**

Aktivera detta alternativ för att tillåta flera systemanvändare för anonyma användare. Detta är användbart när plattformen används som en offentlig visningsyta för vissa kurser. Flera anonyma användare gör att spårning fungerar under hela upplevelsen för flera användare utan att deras data blandas (vilket annars skulle kunna förvirra dem).

*Standard: `0`*

### `redirect_admin_to_courses_list`

**Omdirigera administratör till kurslistan**

Standardbeteendet är att skicka administratörer direkt till administrationspanelen (medan lärare och studenter skickas till kurslistan eller plattformens startsida). Aktivera för att även omdirigera administratören till sin kurslista.

*Standard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Meddela endast global administratör om nya användare**

När detta är aktiverat tar endast den globala administratören emot e-postaviseringar om nya användarregistreringar i stället för alla administratörer.

*Standard: `false`*

### `show_link_request_hrm_user`

**Visa länk för att begära koppling mellan användare och HRM**

Visa en länk på profilsidan som gör det möjligt för HR-chefer att begära att bli kopplade till ett användarkonto.

*Standard: `false`*

### `user_status_option_only_for_admin_enabled`

**Dölj roll för vanliga användare**

Gör det möjligt att dölja användares roll när detta alternativ är inställt på true och följande array sätter motsvarande roll till 'true'.

*Standard: `false`*

### `user_status_option_show_only_for_admin`

**Definiera vilka roller som är dolda för vanliga användare**

Rollerna som är satta till 'true' visas endast för administratörer. Andra användare kommer inte att kunna se dem.