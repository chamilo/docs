# Visningsindstillinger

Hvordan platformen vises for brugerne — layout på startsiden, gravatar, menuer, brandingadfærd og lignende visuelle præferencer.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Visning**. Denne kategori indeholder **28 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `accessibility_font_resize`

**Tilgængelighedsfunktion til skriftstørrelse**

Aktivér denne indstilling for at vise et sæt valgmuligheder til ændring af skriftstørrelse øverst til højre på dit campus. Dette gør det lettere for synshæmmede at læse deres kursusindhold.

*Standard: `false`*

### `display_categories_on_homepage`

**Vis kategorier på startsiden**

Denne indstilling viser eller skjuler kursuskategorier på portalens startside

*Standard: `false`*

### `enable_help_link`

**Aktivér hjælpelink**

Hjælpelinket er placeret øverst til højre på skærmen

*Standard: `true`*

### `gravatar_enabled`

**Gravatar-brugerbilleder**

Aktivér denne indstilling for at søge i Gravatar-arkivet efter billeder af den aktuelle bruger, hvis brugeren ikke har defineret et billede lokalt. Dette er velegnet til automatisk at udfylde billeder på dit site, især hvis dine brugere er aktive internetbrugere. Gravatar-billeder kan nemt konfigureres ud fra en brugers e-mailadresse på http://en.gravatar.com/

*Standard: `false`*

### `gravatar_type`

**Gravatar-avatartype**

Hvis Gravatar-indstillingen er aktiveret, og brugeren ikke har et billede konfigureret på Gravatar, giver denne indstilling dig mulighed for at vælge den type avatar, som Gravatar genererer for hver bruger. Se <a href='http://en.gravatar.com/site/implement/images#default-image'>http://en.gravatar.com/site/implement/images#default-image</a> for eksempler på avatartyper.

*Standard: `mm`*

### `hide_complete_name_in_whoisonline`

**Skjul det fulde brugernavn i 'hvem er online'**

Siden 'hvem er online' (hvis den er aktiveret) viser et billede og et navn for hver bruger, der aktuelt er online. Aktivér denne indstilling for at skjule navnene.

*Standard: `false`*

### `hide_home_top_when_connected` **v3**

**Skjul øverste indhold på startsiden, når brugeren er logget ind**

På platformens startside giver denne indstilling dig mulighed for at skjule introduktionsblokken (så der f.eks. kun vises meddelelser) for alle brugere, der allerede er logget ind. Den generelle introduktionsblok vises stadig for brugere, der ikke allerede er logget ind.

*Standard: `false`*

### `hide_logout_button`

**Skjul logud-knap**

Skjul logud-knappen. Dette er typisk kun relevant, når der bruges en ekstern login-/logud-metode, f.eks. ved brug af en form for Single Sign On.

*Standard: `false`*

### `hide_main_navigation_menu`

**Skjul hovednavigationsmenu**

Når Chamilo bruges til et specifikt formål (f.eks. én stor onlineeksamen), kan du ønske at reducere distraktion yderligere ved at fjerne sidemenuen.

*Standard: `false`*

### `hide_social_media_links`

**Skjul links til sociale medier**

Nogle sider giver dig mulighed for at promovere portalen eller et kursus på sociale netværk. Aktivér denne indstilling for at fjerne linkene.

*Standard: `false`*

### `order_user_list_by_official_code`

**Sortér brugere efter officiel kode**

Brug den 'officielle kode' til at sortere de fleste studenterlister på platformen i stedet for efternavn eller fornavn.

*Standard: `false`*

### `pdf_logo_header`

**PDF-sidehovedlogo**

Om billedet i var/themes/[your-theme]/images/pdf_logo_header.png skal bruges som PDF-sidehovedlogo for alle PDF-eksporter (i stedet for det normale portallogo)

### `show_admin_toolbar`

**Vis administratorværktøjslinje**

Viser en global værktøjslinje øverst på siden for de udpegede brugerroller. Denne værktøjslinje, som minder meget om Wordpress’ og Googles sorte værktøjslinjer, kan virkelig gøre komplicerede handlinger hurtigere og forbedre den plads, du har til læringsindholdet, men den kan være forvirrende for nogle brugere

*Standard: `do_not_show`*

### `show_administrator_data` **v3**

**Platformadministratoroplysninger i sidefoden**

Skal oplysningerne om platformadministratoren vises i sidefoden?

*Standard: `true`*

### `show_back_link_on_top_of_tree`

**Vis tilbage-links fra kategorier/kurser**

Vis et link til at gå tilbage i kursushierarkiet. Der er alligevel et link tilgængeligt nederst på listen.

*Standard: `false`*

### `show_closed_courses`

**Vis lukkede kurser på login-siden og portalens startside?**

Vis lukkede kurser på login-siden og kursernes startside? På portalens startside vises et ikon ved siden af kurserne, så man hurtigt kan tilmelde sig hvert kursus. Dette vises kun på portalens startside, når brugeren er logget ind, og når brugeren endnu ikke er tilmeldt portalen.

*Standard: `false`*

### `show_email_addresses`

**Vis e-mailadresser**

Vis e-mailadresser for brugere

*Standard: `false`*

### `show_empty_course_categories`

**Vis tomme kursuskategorier**

Vis kursuskategorierne på startsiden, også selvom de er tomme

*Standard: `true`*

### `show_hot_courses`

**Vis populære kurser**

Listen over populære kurser vises på startsiden

*Standard: `true`*

### `show_number_of_courses`

**Vis antal kurser**

Vis antallet af kurser i hver kategori i kursuskategorierne på startsiden

*Standard: `false`*

### `show_tabs`

**Hovedmenupunkter**

Markér de punkter, du vil have vist i hovedmenuen

*Standard:*
```json
{"menu":{"campus_homepage":true,"my_courses":true,"reporting":true,"platform_administration":true,"my_agenda":true,"social":true,"videoconference":false,"diagnostics":false,"catalogue":true,"session_admin":true,"search":true,"question_manager":false},"topbar":{"topbar_my_certificates":true,"topbar_my_custom_certificate":false,"topbar_skills":true}}
```

### `show_tabs_per_role`

**Hovedmenupunkter pr. rolle**

Definer synlighed af faner i sidehovedet pr. rolle.

*Standard: `{}`*

### `show_teacher_data` **v3**

**Vis underviseroplysninger i sidefoden**

Vis underviserens reference (navn og e-mail, hvis tilgængelig) i sidefoden?

*Standard: `true`*

### `show_tutor_data` **v3**

**Sessionens tutors data vises i sidefoden.**

Vis sessionens tutors reference (navn og e-mail, hvis tilgængelig) i sidefoden?

*Standard: `true`*

### `showonline`

**Hvem er online**

Vis antallet af personer, der er online?

*Standard: `world`*

### `table_default_row`

**Standardantal tabelrækker**

Hvor mange rækker der som standard skal vises i alle tabeller.

*Standard: `20`*

### `table_row_list`

**Standardvalg for paginering i tabeller**

Angiv de valgmuligheder, der skal vises i navigationen omkring en tabel for at vise færre eller flere rækker på én side. f.eks. [50, 100, 200, 500].

*Standard: `[10,20,50,100]`*

### `time_limit_whosonline`

**Tidsgrænse for Hvem er online**

Denne tidsgrænse definerer, hvor mange minutter efter sin sidste handling en bruger betragtes som *online*

*Standard: `30`*