# Ferdigheter – innstillinger

Oppførselen til **Ferdigheter**-systemet — ferdighetstre, tildelingsregler, profilintegrasjon.

Disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Ferdigheter**. Denne kategorien inneholder **13 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_hr_skills_management`

**Tillat HR-administrasjon av ferdigheter**

Lar HR administrere ferdigheter

*Standard: `true`*


### `allow_private_skills`

**Skjul ferdigheter for lærende**

Hvis aktivert, kan ferdigheter bare vises for administratorer, lærere (knyttet til en bruker via et kurs) og HRM-brukere (hvis knyttet til en bruker).

*Standard: `false`*


### `allow_skill_rel_items`

**Aktiver kobling av ferdigheter til elementer**

Dette aktiverer en vesentlig funksjon som gjør at ethvert element kan kobles til (og dermed tillate tilegnelse av) en ferdighet. Funksjonen krever fortsatt at læreren bekrefter tilegnelsen av ferdigheten, så tilegnelsen er ikke automatisk.

*Standard: `false`*


### `allow_skills_tool`

**Tillat verktøyet Ferdigheter**

Brukere kan se ferdighetene sine i det sosiale nettverket og i en blokk på startsiden.

*Standard: `true`*

### `allow_teacher_access_student_skills`

**Tillat at lærere får tilgang til lærendes ferdigheter**

[inferred] La instruktører se og overvåke ferdigheter som lærende har tilegnet seg i kursene deres.

*Standard: `false`*


### `badge_assignation_notification`

**Send varsel til lærende når en ferdighet/merke er tilegnet**

[inferred] Send varsler til lærende når de tilegner seg en ny ferdighet eller merke-prestasjon.

*Standard: `false`*


### `hide_skill_levels`

**Skjul funksjonen for ferdighetsnivåer**

[inferred] Skjul ferdighetsnivåhierarkiet og nivåetikettene i ferdighetsrelaterte visninger.

*Standard: `false`*


### `manual_assignment_subskill_autoload`

**Tildeling av ferdigheter til bruker: automatisk innlasting av underferdigheter**

Når ferdigheter tildeles manuelt til en bruker, kan skjemaet settes til automatisk å tilby deg å tildele en underferdighet i stedet for ferdigheten du valgte.

*Standard: `false`*


### `openbadges_backpack`

**OpenBadges backpack-URL**

URL-en til OpenBadges backpack-serveren som brukes som standard for alle brukere som vil eksportere merkene sine. Dette er som standard det åpne og gratis backpack-repositoriet til Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Vis fullt ferdighetsnavn på ferdighetshjulet**

På ferdighetshjulet vises navnet på ferdigheten når den har en kort kode.

*Standard: `false`*


### `skill_levels_names`

**Navn på ferdighetsnivåer**

Definer navn for ferdighetsnivåer som en tabell av id => navn.

### `skills_hierarchical_view_in_user_tracking`

**Vis ferdigheter som en hierarkisk tabell**

[inferred] Vis lærendes ferdigheter som en hierarkisk trestruktur på fremdrifts- og rapport sider.

*Standard: `false`*


### `skills_teachers_can_assign_skills`

**Tillat at lærere angir hvilke ferdigheter som tilegnes gjennom kursene deres**

Som standard kan bare administratorer avgjøre hvilke ferdigheter som kan tilegnes gjennom hvilket kurs.

*Standard: `false`*