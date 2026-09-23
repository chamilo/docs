# Gruppeindstillinger

Adfærd for kursets **Grupper**-værktøj.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Grupper**. Denne kategori indeholder **3 indstillinger**, som er listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_group_categories`

**Gruppekategorier**

Tillad undervisere at oprette kategorier i Grupper-værktøjet?

*Standard: `false`*


### `hide_course_group_if_no_tools_available`

**Skjul kursusgruppe, hvis intet værktøj**

Hvis intet værktøj er tilgængeligt i en gruppe, og brugeren ikke er tilmeldt gruppen selv, skal gruppen skjules helt i gruppelisten.

*Standard: `false`*


### `show_groups_to_users`

**Vis klasser for brugere**

Vis klasserne for brugerne. Klasser er en funktion, der giver dig mulighed for at tilmelde/afmelde grupper af brugere til en session eller et kursus direkte og dermed reducere det administrative besvær. Når du vælger denne indstilling, vil kursister kunne se, hvilken klasse de tilhører, via deres sociale netværksgrænseflade.

*Standard: `false`*