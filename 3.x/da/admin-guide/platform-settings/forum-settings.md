# Forumindstillinger

Adfærd for kursusværktøjet **Forums**.

Adgang til disse indstillinger under **Administration > Konfigurationsindstillinger > Forums**. Denne kategori indeholder **9 indstillinger**, som er anført nedenfor med den titel og den kommentar, der medfølger i platformens indstillingsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_forum_category_language_filter`

**Sprogfilter for forumkategorier**

Tilføj et sprogfilter til forumvisningen, så kun kategorier, der er konfigureret på et bestemt sprog, vises. Kræver brug af ekstrafeltet 'language' på entiteten 'forum_category'.

*Standard: `false`*

### `allow_forum_post_revisions`

**Gennemgang af forumindlæg**

Aktivér denne indstilling for at tillade, at der anmodes om en gennemgang eller en oversættelse af ens indlæg i et forum. Ved omfattende konfiguration kan den bruges til at samarbejde med andre brugere i et sprogindlæringsforum.

*Standard: `false`*

### `community_managers_user_list`

**Liste over community managers**

Angiv et array af bruger-id’er, der skal betragtes som community managers i det særlige kursus, der er udpeget som globalt forum. Community managers har yderligere privilegier i det globale forum.

### `default_forum_view`

**Standardvisning for forum**

Hvad skal være standardvalget, når et nyt forum oprettes. Enhver underviser kan dog vælge en anden visning for hvert enkelt forum

*Standard: `flat`*

### `display_groups_forum_in_general_tool`

**Vis gruppefora i det generelle forum**

Vis gruppefora i forumværktøjet på kursusniveau. Denne indstilling er aktiveret som standard (i så fald virker de enkelte gruppeforums synlighed stadig som et yderligere kriterium). Hvis den deaktiveres, vil gruppefora kun være synlige via gruppeværktøjet, uanset om de er offentlige eller ej.

*Standard: `true`*

### `forum_fold_categories`

**Fold forumkategorier**

Visuel effekt, der gør det muligt at folde/udfolde forumkategorier.

*Standard: `false`*

### `global_forums_course_id`

**Brug kursus som globalt forum**

Angiv kursus-id’et (numerisk) for et kursus, der er reserveret til brug som globalt forum. Dette erstatter linket 'Sociale grupper' i det sociale netværk med et link til forummet for det pågældende kursus.

*Standard: `0`*

### `hide_forum_post_revision_language`

**Skjul sprog for gennemgang af forumindlæg**

Skjul muligheden for at tildele et sprog til en gennemgang af et forumindlæg.

*Standard: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Forumunderretninger også fra basiskurset**

Aktivér denne indstilling for at aktivere underretninger, der kommer fra basiskursets forum, også når kurset følges via en session.

*Standard: `false`*