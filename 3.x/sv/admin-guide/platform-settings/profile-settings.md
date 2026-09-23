# Användarprofilinställningar

Vilka fält som visas på användarprofilen, vilka användaren kan redigera, och relaterade preferenser.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Användarprofil**. Denna kategori innehåller **29 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `account_valid_duration`

**Kontogiltighet**

Ett användarkonto är giltigt detta antal dagar efter skapandet

*Standard: `3660`*


### `add_user_course_information_in_mailto`

**Förifyll e-post med användar- och kursinformation i sidfotens kontakt**

Lägg till ämne och brödtext i mailto:-sidfoten.

*Standard: `false`*


### `allow_show_linkedin_url`

**Tillåt visning av användarens LinkedIn-URL**

Lägg till en länk i användarens sociala block som gör det möjligt att besöka användarens LinkedIn-profil

### `allow_show_skype_account`

**Tillåt visning av användarens Skype-konto**

Lägg till en länk i användarens sociala block som gör det möjligt att starta en chatt via Skype

### `allow_social_map_fields`

**Användargeolokalisering på en karta**

Aktivera visning av en karta i det sociala nätverket så att du kan lokalisera andra användare. Detta inkluderar flera positioner (nuvarande och destination) som måste definieras som adresser eller koordinater i separata extrafält. Extrafälten måste anges som en array här.

### `allow_teachers_to_classes`

**Tillåt lärare att hantera klasser**

Gör det möjligt för lärare att hantera klassgrupper och deras medlemskap i systemet.

*Standard: `false`*


### `allow_user_headings`

**Tillåt användarprofilering i kurser**

Kan en lärare definiera fält för lärandeprofiler för att hämta ytterligare information?

### `allow_users_to_change_email_with_no_password`

**Tillåt användare att ändra e-post utan lösenord**

När kontoinformationen ändras

*Standard: `false`*

### `changeable_options`

**Fält som användare får ändra i sin profil**

Välj de fält som användare ska kunna ändra på sin profilsida.


### `enable_profile_user_address_geolocalization`

**Aktivera användarens geolokalisering**

Aktivera användarens adressfält och visa det på en karta med geolokaliseringsfunktioner

### `extended_profile`

**Portfolio**

Om denna inställning är på kan en användare fylla i följande (valfria) fält: 'Mitt personliga öppna område', 'Mina kompetenser', 'Mina diplom', 'Vad jag kan undervisa'

*Standard: `false`*

### `hide_username_in_course_chat`

**Dölj användarnamn i kurschatten**

I kurschatten, dölj användarnamnet. Visa endast personernas namn.

*Standard: `false`*


### `hide_username_with_complete_name`

**Dölj användarnamn när fullständigt namn redan visas**

Vissa interna funktioner returnerar användarnamnet när de returnerar användarens fullständiga namn. Med detta alternativ aktiverat säkerställer du att användarnamnet inte visas.

*Standard: `false`*


### `linkedin_organization_id`

**LinkedIn Organization ID**

När ett märke delas på LinkedIn tillåter LinkedIn att du anger ett organisations-ID som länkar till din organisations LinkedIn-sida (för att koppla organisationen som tilldelar märket).

*Standard: `false`*


### `login_is_email`

**Använd e-postadressen som användarnamn**

Använd e-postadressen för att logga in i systemet

*Standard: `false`*

### `my_space_users_items_per_page`

**Standardantal objekt per sida i mySpace**

Antal poster som visas per sida i MySpace-uppföljningsavsnitten (användare, arbetsstatistik, studentlista).

*Standard: `10`*


### `pass_reminder_custom_link`

**Anpassad sida för lösenordspåminnelse**

Ange din egen URL till en sida för återställning av lösenord. Användbart vid federerad kontohantering.

### `profile_fields_visibility`

**Fält synliga på profilsidan**

Array med fält och huruvida (boolean) de är synliga eller inte på användarens profilsida (fungerar även med extrafältsetiketter).

### `registration_add_helptext_for_2_names`

**Lägg till hjälptext för att ange två namn vid registrering**

Lägg till hjälptext så att användare kan ange två namn i registreringsformuläret när dubbla efternamn är vanliga.

*Standard: `false`*


### `send_notification_when_user_added`

**Skicka e-post till administratör när användare skapas**

Skicka e-postavisering till administratör när en användare skapas.

### `show_conditions_to_user`

**Visa specifika registreringsvillkor**

Visa flera villkor för användaren under registreringsprocessen. Ange en array där varje element innehåller 'variable' (internt extrafältsnamn), 'display_text' (enkel text för en kryssruta), 'text_area' (lång text med villkor).

### `show_official_code_whoisonline`

**Officiell kod på 'Vem är online'**

Visa officiell kod på sidan 'Vem är online', under användarnamnet.

*Standard: `false`*

### `show_terms_if_profile_completed`

**Villkor endast om profilen är ifylld**

Genom att aktivera det här alternativet blir villkor tillgängliga för användaren först när extra profilfält som börjar med 'terms_' och är inställda som synliga har fyllts i.

*Standard: `false`*


### `split_users_upload_directory`

**Dela upp användarnas uppladdningskatalog**

På portaler med hög belastning, där många användare är registrerade och skickar sina bilder, kan uppladdningskatalogen (main/upload/users/) innehålla för många filer för att filsystemet ska kunna hantera dem (det har rapporterats med mer än 36 000 filer på en Debian-server). Om du ändrar det här alternativet aktiveras en uppdelning på en nivå av katalogerna i uppladdningskatalogen. 9 kataloger kommer att användas i baskatalogen och alla efterföljande användarkataloger kommer att lagras i en av dessa 9 kataloger. Ändringen av det här alternativet påverkar inte katalogstrukturen på disken, men påverkar beteendet i Chamilo-koden, så om du ändrar det här alternativet måste du själv skapa de nya katalogerna och flytta de befintliga katalogerna på servern. Observera att när du skapar och flyttar dessa kataloger måste du flytta katalogerna för användare 1 till 9 till underkataloger med samma namn. Om du är osäker på det här alternativet är det bäst att inte aktivera det.

*Standard: `true`*

### `use_users_timezone`

**Aktivera användares tidszoner**

Aktivera möjligheten för användare att välja sin egen tidszon. När det är konfigurerat kommer användare att kunna se inlämningsdeadlines och andra tidsangivelser i sin egen tidszon, vilket minskar fel vid inlämning.

*Standard: `true`*

### `user_import_settings`

**Alternativ för användarimport**

Array med alternativ som ska tillämpas som standardparametrar vid CSV/XML-användarimport.

### `user_search_on_extra_fields`

**Sök användare via extrafält i användarlistan för administratörer**

Inkludera naturligt de angivna extrafälten (array med extrafältsetiketter) i användarsökningar.

### `user_selected_theme`

**Användarens temaval**

Tillåt användare att välja sitt eget visuella tema i sin profil. Detta ändrar utseendet på Chamilo för dem, men lämnar portalens standardstil oförändrad. Om en specifik kurs eller session har ett tilldelat tema har det företräde framför användardefinierade teman.

*Standard: `false`*

### `visible_options`

**Lista över synliga fält i profilen**

Styr vilka profilfält som är synliga för användare och andra.