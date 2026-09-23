# Plattformsinställningar

Identitet och beteende på plattformsnivå — institutionsnamn, tidszon, registreringspolicy, användare online, prestandaflaggor.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Plattform**. Denna kategori innehåller **29 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_my_files`

**Aktivera avsnittet "Mina filer"**

Tillåt användare att ladda upp filer till ett personligt utrymme på plattformen.

*Standard: `true`*

### `chamilo_database_version`

**Aktuell version av databasschemat som används av Chamilo**

Visar den aktuella DB-versionen för att matcha Chamilo-kärnans version.

### `cookie_warning`

**Integritetsmeddelande om cookies**

Om den är aktiverad visar detta alternativ en banderoll högst upp på plattformen som ber användare att bekräfta att plattformen använder cookies som är nödvändiga för att tillhandahålla användarupplevelsen. Banderollen kan enkelt bekräftas och döljas av användaren. Detta gör det möjligt för Chamilo att följa EU:s regler för webbcookies.

*Standard: `false`*

### `disable_copy_paste`

**Inaktivera kopiera-klistra in**

När den är aktiverad inaktiverar detta alternativ så långt det är möjligt mekanismerna för kopiera-klistra in. Användbart i restriktiva examinationsupplägg.

*Standard: `false`*

### `donotlistcampus`

**Lista inte detta campus på chamilo.org**

Som standard registreras Chamilo-portaler automatiskt i en offentlig lista på chamilo.org, enbart med den titel du gav denna portal (inte URL:en eller någon privat data). Markera denna ruta för att undvika att portalens titel visas.

*Standard: `false`*

### `generate_random_login`

**Generera slumpmässigt användarnamn**

Vid import av användare (batchprocesser), generera automatiskt en slumpmässig sträng som användarnamn. Annars genereras användarnamnet utifrån förnamn och efternamn, eller prefixet i e-postadressen.

*Standard: `false`*

### `hosting_limit_identical_email`

**Begränsa användning av identisk e-post**

Maximalt antal konton som tillåts dela samma e-postadress. Ange 0 för att inaktivera denna gräns.

*Standard: `0`*

### `hosting_limit_users_per_course`

**Global gräns för användare per kurs**

Definierar ett globalt maximalt antal användare (lärare inräknade) som tillåts prenumerera på en enskild kurs på plattformen. Ange värdet 0 för att inaktivera gränsen. Detta hjälper till att undvika att kurser överbelastas i öppna portaler.

*Standard: `0`*

### `institution`

**Organisationsnamn**

Organisationens namn (visas i sidhuvudet till höger)

*Standard: `Chamilo.org`*


### `institution_address`

**Institutionsadress**

Adress

### `institution_url`

**Organisations-URL (webbadress)**

Institutionernas URL (länken som visas i sidhuvudet till höger)

*Standard: `http://www.chamilo.org`*


### `max_courses_per_user`

**Maximalt antal kurser per användare**

Maximalt antal kurser en lärare/utbildare kan skapa. Ange 0 för att inaktivera gränsen. Kan åsidosättas per användare via ett köp av BuyCourses-tjänst.

*Standard: `0`*

### `notification_event`

**Aktivera aviseringsverktyget för en mer genomslagskraftig kommunikationskanal med studenter**

Aktiverar popup- eller systemaviseringar för viktiga plattformshändelser.

*Standard: `false`*

### `pdf_img_dpi`

**Upplösning vid PDF-export**

Detta representerar upplösningen för genererade PDF-filer (i punkter per tum, eller dpi). Standardvärdet är 96. Att öka det ger PDF-filer med bättre upplösning men ökar också filernas storlek och genereringstid.

*Standard: `96`*

### `platform_logo_url`

**URL för alternativ plattformslogotyp**

Ersätter Chamilo-logotypen genom att läsa in en (möjligen fjärr-) URL. Se till att detta tillåts av era säkerhetspolicyer.

*Standard: `https://chamilo.org`*


### `portfolio_advanced_sharing`

**Aktivera avancerad delning av portfölj**

Bestäm vem som kan visa inlägg och kommentarer i portföljen.

*Standard: `false`*

### `portfolio_show_base_course_post_in_sessions`

**Visa baskursinlägg i sessionskurs**

Bestäm vem som kan visa inlägg och kommentarer i portföljen.

*Standard: `false`*

### `push_notification_settings`

**Inställningar för push-aviseringar (JSON)**

JSON-konfiguration för integration av push-aviseringar.

### `server_type`

**Servertyp**

Definierar miljötypen: "prod" (normal produktion), "validation" (som produktion men utan rapportering av statistik) eller "test" (felsökningsläge med utvecklarverktyg såsom indikatorer för oöversatta strängar).

*Standard: `prod`*

### `session_admin_access_to_all_users_on_all_urls`

**Tillåt sessionsadministratörer att se alla användare på alla URL:er**

Om den är aktiverad kan sessionsadministratörer söka och lista användare från alla åtkomst-URL:er, oavsett deras aktuella URL.

*Standard: `false`*

### `site_name`

**Namn på e-lärandeportalen**

Namnet på din Chamilo-portal (visas i sidhuvudet)

*Standard: `Chamilo site`*


### `timepicker_increment`

**Tidsväljarens steg**

Minsta tidssteg (i minuter) vid val av datum och tid med tidsväljarwidgeten. Det kan till exempel vara onödigt att ha mindre steg än 5 eller 15 minuter när det gäller inlämning av uppgifter, tillgänglighet för ett test, starttid för en session osv.

*Standard: `15`*

### `timezone`

**Standardtidszon**

Välj standardtidszon för denna portal. Detta hjälper till att ange tidszonen (om funktionen är aktiverad) för varje ny användare eller för användare som ännu inte har angett en specifik tidszon. Tidszoner gör att all tidsrelaterad information på skärmen visas i varje användares specifika tidszon.

*Standard: `Europe/Paris`*


### `unoconv_binaries`

**UNO-omvandlarens binärer**

Ange systemsökvägen till UNO-omvandlarens bibliotek för att aktivera extra exportfunktioner.

*Standard: `/usr/bin/unoconv`*


### `use_career_external_id_as_identifier_in_diagrams`

**Använd externt karriär-ID i diagram**

Om karriärdiagram används, visa ett extra fält i stället för det interna karriär-ID:t.

*Standard: `false`*

### `use_custom_pages`

**Använd anpassade sidor**

Aktivera den här funktionen för att konfigurera specifika inloggningssidor per roll

*Standard: `false`*

### `use_virtual_keyboard`

**Använd virtuellt tangentbord**

Visa ett virtuellt tangentbord. Detta är användbart vid restriktiva tentamina i ett fysiskt rum där studenter saknar tangentbord, för att begränsa möjligheten att fuska.

*Standard: `false`*

### `user_status_show_option`

**Visningsalternativ för roller**

En array av roll => true/false som definierar om rollen ska visas eller döljas.

### `user_status_show_options_enabled`

**Selektiv visning av roller**

Aktivera för att använda en array som definierar vilka roller som ska visas tydligt och vilka som ska döljas.

*Standard: `false`*