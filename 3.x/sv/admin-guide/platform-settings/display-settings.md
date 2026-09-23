# Visningsinställningar

Hur plattformen visas för användare — startsidans layout, gravatar, menyer, varumärkesbeteende och liknande visuella preferenser.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Visning**. Denna kategori innehåller **28 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `accessibility_font_resize`

**Tillgänglighetsfunktion för teckensnittsstorlek**

Aktivera detta alternativ för att visa en uppsättning alternativ för teckensnittsstorlek uppe till höger på campus. Detta gör det lättare för synskadade att läsa kursinnehållet.

*Standard: `false`*

### `display_categories_on_homepage`

**Visa kategorier på startsidan**

Detta alternativ visar eller döljer kurskategorier på portalens startsida

*Standard: `false`*

### `enable_help_link`

**Aktivera hjälplänk**

Hjälplänken finns uppe till höger på skärmen

*Standard: `true`*

### `gravatar_enabled`

**Gravatar-användarbilder**

Aktivera detta alternativ för att söka i Gravatar-arkivet efter bilder av den aktuella användaren, om användaren inte har definierat en bild lokalt. Detta är utmärkt för att automatiskt fylla i bilder på din webbplats, särskilt om dina användare är aktiva internetanvändare. Gravatar-bilder kan enkelt konfigureras utifrån en användares e-postadress, på http://en.gravatar.com/

*Standard: `false`*

### `gravatar_type`

**Gravatar-avatartyp**

Om Gravatar-alternativet är aktiverat och användaren inte har en bild konfigurerad på Gravatar, låter detta alternativ dig välja vilken typ av avatar Gravatar ska generera för varje användare. Se <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> för exempel på avatartyper.

*Standard: `mm`*

### `hide_complete_name_in_whoisonline`

**Dölj det fullständiga användarnamnet i "vem är online"**

Sidan "vem är online" (om den är aktiverad) visar en bild och ett namn för varje användare som för närvarande är online. Aktivera detta alternativ för att dölja namnen.

*Standard: `false`*

### `hide_home_top_when_connected` **v3**

**Dölj toppinnehåll på startsidan när inloggad**

På plattformens startsida låter detta alternativ dig dölja introduktionsblocket (för att till exempel bara lämna tillkännagivanden), för alla användare som redan är inloggade. Det allmänna introduktionsblocket visas fortfarande för användare som inte redan är inloggade.

*Standard: `false`*

### `hide_logout_button`

**Dölj utloggningsknapp**

Dölj utloggningsknappen. Detta är vanligtvis bara intressant när en extern inloggnings-/utloggningsmetod används, till exempel vid någon form av Single Sign On.

*Standard: `false`*

### `hide_main_navigation_menu`

**Dölj huvudnavigeringsmeny**

När Chamilo används för ett specifikt ändamål (till exempel ett stort onlineprov) kanske du vill minska distraktionen ytterligare genom att ta bort sidomenyn.

*Standard: `false`*

### `hide_social_media_links`

**Dölj länkar till sociala medier**

Vissa sidor låter dig marknadsföra portalen eller en kurs i sociala nätverk. Aktivera denna inställning för att ta bort länkarna.

*Standard: `false`*

### `order_user_list_by_official_code`

**Sortera användare efter officiell kod**

Använd den "officiella koden" för att sortera de flesta studentlistor på plattformen, i stället för efternamn eller förnamn.

*Standard: `false`*

### `pdf_logo_header`

**PDF-sidhuvudlogo**

Om bilden i var/themes/[your-theme]/images/pdf_logo_header.png ska användas som PDF-sidhuvudlogo för alla PDF-exporter (i stället för den vanliga portallogon)

### `show_admin_toolbar`

**Visa administratörsverktygsfält**

Visar ett globalt verktygsfält högst upp på sidan för de utsedda användarrollerna. Detta verktygsfält, mycket likt Wordpress och Googles svarta verktygsfält, kan verkligen påskynda komplicerade åtgärder och förbättra det utrymme du har tillgängligt för lärandeinnehållet, men det kan vara förvirrande för vissa användare

*Standard: `do_not_show`*

### `show_administrator_data` **v3**

**Plattformsadministratörens information i sidfoten**

Visa plattformsadministratörens information i sidfoten?

*Standard: `true`*

### `show_back_link_on_top_of_tree`

**Visa tillbakalänkar från kategorier/kurser**

Visa en länk för att gå tillbaka i kurshierarkin. En länk finns ändå längst ned i listan.

*Standard: `false`*

### `show_closed_courses`

**Visa stängda kurser på inloggningssidan och portalens startsida?**

Visa stängda kurser på inloggningssidan och kursernas startsida? På portalens startsida visas en ikon bredvid kurserna för att snabbt anmäla sig till varje kurs. Detta visas bara på portalens startsida när användaren är inloggad och när användaren ännu inte är anmäld till portalen.

*Standard: `false`*

### `show_email_addresses`

**Visa e-postadresser**

Visa e-postadresser för användare

*Standard: `false`*

### `show_empty_course_categories`

**Visa tomma kurskategorier**

Visa kurskategorierna på startsidan, även om de är tomma

*Standard: `true`*

### `show_hot_courses`

**Visa populära kurser**

Listan över populära kurser läggs till på startsidan

*Standard: `true`*

### `show_number_of_courses`

**Visa antal kurser**

Visa antalet kurser i varje kategori i kurskategorierna på startsidan

*Standard: `false`*

### `show_tabs`

**Huvudmenyval**

Markera de poster du vill ska visas i huvudmenyn

*Standard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Huvudmenyval per roll**

Definiera synlighet för flikar i sidhuvudet per roll.

*Standard: `{}`*

### `show_teacher_data` **v3**

**Visa lärarinformation i sidfoten**

Visa lärarens referens (namn och e-post om tillgängligt) i sidfoten?

*Standard: `true`*

### `show_tutor_data` **v3**

**Sessionens handledares uppgifter visas i sidfoten.**

Visa sessionens handledares referens (namn och e-post om tillgängligt) i sidfoten?

*Standard: `true`*

### `showonline`

**Vem är online**

Visa antalet personer som är online?

*Standard: `world`*

### `table_default_row`

**Standardantal tabellrader**

Hur många rader som ska visas i alla tabeller som standard.

*Standard: `20`*

### `table_row_list`

**Standardvärden för sidindelning i tabeller**

Ange de alternativ som ska visas i navigeringen runt en tabell för att visa färre eller fler rader på en sida. t.ex. [50, 100, 200, 500].

*Standard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Tidsgräns för Vem är online**

Denna tidsgräns anger hur många minuter efter sin senaste åtgärd en användare ska räknas som *online*

*Standard: `30`*