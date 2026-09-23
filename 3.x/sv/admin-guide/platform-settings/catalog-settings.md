# Inställningar för kurskatalog

Beteende för kurskatalogen (den publika listan där användare kan bläddra och självregistrera sig).

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Kurskatalog**. Denna kategori innehåller **13 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_session_auto_subscription`

**Automatisk sessionsprenumeration**

Aktivera automatisk prenumeration på sessioner för användare.

*Standard: `false`*

### `allow_students_to_browse_courses`

**Tillåt studentbläddring**

Tillåt studenter att bläddra och filtrera kurskatalogen.

*Standard: `true`*

### `course_catalog_display_in_home`

**Visa katalog på startsidan**

Visa kurskatalogblocket på plattformens startsida.

*Standard: `false`*

### `course_catalog_hide_private`

**Dölj privata kurser**

Uteslut privata kurser från katalogvisningen.

*Standard: `true`*

### `course_catalog_published`

**Publicera kurskatalog**

Gör kurskatalogen tillgänglig för anonyma användare (allmänheten) utan att de behöver logga in.

*Standard: `false`*

### `course_catalog_settings`

**Inställningar för kurskatalog**

JSON-konfiguration för kurskatalog: länkinställningar, filter, sorteringsalternativ med mera.

### `course_subscription_in_user_s_session`

**Prenumeration i sessionsvy**

Tillåt användare att prenumerera på kurser direkt från sin sessionssida.

*Standard: `false`*

### `hide_public_link`

**Dölj publik länk**

Ta bort den publika URL-länken från kurskort.

*Standard: `false`*

### `only_show_course_from_selected_category`

**Visa endast matchande kategorier i kurskatalogen**

När fältet inte är tomt visas endast kurser från de angivna kategorierna i kurskatalogen.

### `only_show_selected_courses`

**Endast valda kurser**

Visa endast manuellt valda kurser i katalogen.

*Standard: `false`*

### `session_catalog_settings`

**Inställningar för sessionskatalog**

JSON-konfiguration för sessionskatalog: filter och visningsalternativ.

### `show_courses_descriptions_in_catalog`

**Visa kursbeskrivningar**

Visa kursbeskrivningar i kataloglistningen.

*Standard: `false`*

### `show_courses_sessions`

**Visa kurser och sessioner**

Inkludera både kurser och sessioner i katalogresultaten.

*Standard: `0`*