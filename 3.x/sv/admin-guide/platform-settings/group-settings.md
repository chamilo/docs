# Gruppinställningar

Beteende för kursverktyget **Groups**.

Åtkomst till dessa inställningar sker under **Administration > Configuration settings > Groups**. Denna kategori innehåller **3 inställningar**, listade nedan med den titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas med fastbreddstypsnitt. Använd det när du skriptar via API:t eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_group_categories`

**Gruppkategorier**

Tillåt lärare att skapa kategorier i verktyget Groups?

*Standard: `false`*


### `hide_course_group_if_no_tools_available`

**Dölj kursgrupp om inget verktyg**

Om inget verktyg är tillgängligt i en grupp och användaren inte är registrerad i gruppen själv, dölj gruppen helt i grupplistan.

*Standard: `false`*


### `show_groups_to_users`

**Visa klasser för användare**

Visa klasserna för användare. Klasser är en funktion som gör det möjligt att registrera/avregistrera grupper av användare i en session eller en kurs direkt, vilket minskar det administrativa merarbetet. När du väljer detta alternativ kan deltagare se i vilken klass de ingår via sitt sociala nätverksgränssnitt.

*Standard: `false`*