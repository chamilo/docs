# Visningsinnstillinger

Hvordan plattformen vises for brukere — layout på startsiden, gravatar, menyer, merkevareoppførsel og lignende visuelle preferanser.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Visning**. Denne kategorien inneholder **28 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `accessibility_font_resize`

**Tilgjengelighetsfunksjon for skriftstørrelse**

Aktiver dette valget for å vise et sett med valg for skriftstørrelse øverst til høyre på campusen. Dette gjør det enklere for synshemmede å lese kursinnholdet.

*Standard: `false`*

### `display_categories_on_homepage`

**Vis kategorier på startsiden**

Dette valget viser eller skjuler kurskategorier på portalens startside

*Standard: `false`*

### `enable_help_link`

**Aktiver hjelpelenke**

Hjelpelenken er plassert øverst til høyre på skjermen

*Standard: `true`*

### `gravatar_enabled`

**Gravatar-brukerbilder**

Aktiver dette valget for å søke i Gravatar-arkivet etter bilder av den aktuelle brukeren, dersom brukeren ikke har definert et bilde lokalt. Dette er nyttig for å fylle inn bilder automatisk på nettstedet, særlig hvis brukerne er aktive på internett. Gravatar-bilder kan enkelt konfigureres basert på brukerens e-postadresse, på http://en.gravatar.com/

*Standard: `false`*

### `gravatar_type`

**Gravatar-avatartype**

Hvis Gravatar-valget er aktivert og brukeren ikke har et bilde konfigurert på Gravatar, lar dette valget deg velge hvilken type avatar Gravatar skal generere for hver bruker. Se <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> for eksempler på avatartyper.

*Standard: `mm`*

### `hide_complete_name_in_whoisonline`

**Skjul fullt brukernavn i «hvem er pålogget»**

Siden «hvem er pålogget» (hvis aktivert) viser et bilde og et navn for hver bruker som er pålogget. Aktiver dette valget for å skjule navnene.

*Standard: `false`*

### `hide_home_top_when_connected` **v3**

**Skjul toppinnhold på startsiden når innlogget**

På plattformens startside lar dette valget deg skjule introduksjonsblokken (for eksempel for å bare vise kunngjøringer) for alle brukere som allerede er innlogget. Den generelle introduksjonsblokken vises fortsatt for brukere som ikke er innlogget.

*Standard: `false`*

### `hide_logout_button`

**Skjul utloggingsknapp**

Skjul utloggingsknappen. Dette er vanligvis bare aktuelt når du bruker en ekstern innloggings-/utloggingsmetode, for eksempel ved bruk av en form for Single Sign On.

*Standard: `false`*

### `hide_main_navigation_menu`

**Skjul hovednavigasjonsmeny**

Når du bruker Chamilo til et spesifikt formål (for eksempel én stor nettbasert eksamen), kan du ønske å redusere distraksjoner ytterligere ved å fjerne sidemenyen.

*Standard: `false`*

### `hide_social_media_links`

**Skjul lenker til sosiale medier**

Noen sider lar deg promotere portalen eller et kurs i sosiale nettverk. Aktiver denne innstillingen for å fjerne lenkene.

*Standard: `false`*

### `order_user_list_by_official_code`

**Sorter brukere etter offisiell kode**

Bruk «offisiell kode» til å sortere de fleste studentlister på plattformen, i stedet for etternavn eller fornavn.

*Standard: `false`*

### `pdf_logo_header`

**PDF-topptekstlogo**

Om bildet i var/themes/[your-theme]/images/pdf_logo_header.png skal brukes som PDF-topptekstlogo for alle PDF-eksporter (i stedet for den vanlige portallogoen)

### `show_admin_toolbar`

**Vis administrasjonsverktøylinje**

Viser en global verktøylinje øverst på siden for de angitte brukerrollene. Denne verktøylinjen, svært lik de svarte verktøylinjene til Wordpress og Google, kan virkelig effektivisere kompliserte handlinger og gi mer plass til læringsinnholdet, men den kan være forvirrende for noen brukere

*Standard: `do_not_show`*

### `show_administrator_data` **v3**

**Informasjon om plattformadministrator i bunnteksten**

Vise informasjon om plattformadministratoren i bunnteksten?

*Standard: `true`*

### `show_back_link_on_top_of_tree`

**Vis tilbakelenker fra kategorier/kurs**

Vis en lenke for å gå tilbake i kurshierarkiet. En lenke er uansett tilgjengelig nederst i listen.

*Standard: `false`*

### `show_closed_courses`

**Vise stengte kurs på innloggingssiden og portalens startside?**

Vise stengte kurs på innloggingssiden og kursstartsiden? På portalens startside vises et ikon ved siden av kursene for raskt å melde seg på hvert kurs. Dette vises bare på portalens startside når brukeren er innlogget og når brukeren ennå ikke er påmeldt portalen.

*Standard: `false`*

### `show_email_addresses`

**Vis e-postadresser**

Vis e-postadresser for brukere

*Standard: `false`*

### `show_empty_course_categories`

**Vis tomme kurskategorier**

Vis kurskategoriene på startsiden, selv om de er tomme

*Standard: `true`*

### `show_hot_courses`

**Vis populære kurs**

Listen over populære kurs vises på startsiden

*Standard: `true`*

### `show_number_of_courses`

**Vis antall kurs**

Vis antall kurs i hver kategori i kurskategoriene på startsiden

*Standard: `false`*

### `show_tabs`

**Hovedmenyoppføringer**

Merk av for oppføringene du vil skal vises i hovedmenyen

*Standard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Hovedmenyoppføringer per rolle**

Definer synlighet for overskriftfaner per rolle.

*Standard: `{}`*

### `show_teacher_data` **v3**

**Vis lærerinformasjon i bunnteksten**

Vise lærerreferansen (navn og e-post hvis tilgjengelig) i bunnteksten?

*Standard: `true`*

### `show_tutor_data` **v3**

**Øktveilederens data vises i bunnteksten.**

Vise øktveilederens referanse (navn og e-post hvis tilgjengelig) i bunnteksten?

*Standard: `true`*

### `showonline`

**Hvem er pålogget**

Vise antall personer som er pålogget?

*Standard: `world`*

### `table_default_row`

**Standard antall tabellrader**

Hvor mange rader som skal vises i alle tabeller som standard.

*Standard: `20`*

### `table_row_list`

**Standard pagineringsvalg i tabeller**

Angi alternativene som skal vises i navigasjonen rundt en tabell for å vise færre eller flere rader på én side. f.eks. [50, 100, 200, 500].

*Standard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Tidsgrense for Hvem er pålogget**

Denne tidsgrensen definerer hvor mange minutter etter siste handling en bruker skal regnes som *pålogget*

*Standard: `30`*