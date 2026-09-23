# Indstillinger for kursuskatalog

Adfærd for kursuskataloget (den offentlige liste, hvor brugere kan browse og selv tilmelde sig).

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Kursuskatalog**. Denne kategori indeholder **13 indstillinger**, listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_session_auto_subscription`

**Automatisk sessionstilmelding**

Aktivér automatisk tilmelding til sessioner for brugere.

*Standard: `false`*

### `allow_students_to_browse_courses`

**Tillad studerendes browsing**

Tillad studerende at browse og filtrere kursuskataloget.

*Standard: `true`*

### `course_catalog_display_in_home`

**Vis katalog på startsiden**

Vis blokken med kursuskataloget på platformens startside.

*Standard: `false`*

### `course_catalog_hide_private`

**Skjul private kurser**

Udelad private kurser fra katalogvisningen.

*Standard: `true`*

### `course_catalog_published`

**Publicér kursuskatalog**

Gør kursuskataloget tilgængeligt for anonyme brugere (den brede offentlighed) uden behov for login.

*Standard: `false`*

### `course_catalog_settings`

**Indstillinger for kursuskatalog**

JSON-konfiguration for kursuskatalog: linkindstillinger, filtre, sorteringsmuligheder og mere.

### `course_subscription_in_user_s_session`

**Tilmelding i sessionsvisning**

Tillad brugere at tilmelde sig kurser direkte fra deres sessionsside.

*Standard: `false`*

### `hide_public_link`

**Skjul offentligt link**

Fjern det offentlige URL-link fra kursuskort.

*Standard: `false`*

### `only_show_course_from_selected_category`

**Vis kun matchende kategorier i kursuskataloget**

Når feltet ikke er tomt, vises kun kurser fra de angivne kategorier i kursuskataloget.

### `only_show_selected_courses`

**Kun udvalgte kurser**

Vis kun manuelt udvalgte kurser i kataloget.

*Standard: `false`*

### `session_catalog_settings`

**Indstillinger for sessionskatalog**

JSON-konfiguration for sessionskatalog: filtre og visningsmuligheder.

### `show_courses_descriptions_in_catalog`

**Vis kursusbeskrivelser**

Vis kursusbeskrivelser i kataloglisten.

*Standard: `false`*

### `show_courses_sessions`

**Vis kurser og sessioner**

Medtag både kurser og sessioner i katalogresultaterne.

*Standard: `0`*