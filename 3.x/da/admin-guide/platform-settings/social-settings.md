# Indstillinger for socialt netværk

Adfærd for det **sociale netværk** — venner, grupper, vægopslag, fotoalbums.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Socialt netværk**. Denne kategori indeholder **7 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger på globalt niveau ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_social_tool`

**Værktøj til socialt netværk (Facebook-lignende)**

Værktøjet til socialt netværk giver brugere mulighed for at definere relationer til andre brugere og derved definere vennegrupper. Kombineret med det interne meddelelsesværktøj muliggør dette værktøj tæt kommunikation med venner inde i portalmiljøet.

*Standard: `true`*

### `allow_students_to_create_groups_in_social`

**Tillad kursister at oprette grupper i det sociale netværk**

Tillad kursister at oprette grupper i det sociale netværk

*Standard: `false`*


### `disable_dislike_option`

**Deaktiver 'dislike' for sociale opslag**

Fjern tommel-ned-indstillingen til feedback på sociale opslag. Behold kun tommel op (like).

*Standard: `false`*

### `hide_social_groups_block`

**Skjul gruppeblokken i det sociale netværk**

Fjerner gruppesektionen fra visningen af det sociale netværk.

*Standard: `false`*


### `social_enable_messages_feedback`

**Like/Dislike for sociale opslag**

Giver brugere mulighed for at tilføje feedback (likes eller dislikes) til opslag på den sociale væg.

*Standard: `false`*

### `social_make_teachers_friend_all`

**Undervisere og administratorer ser kursister som venner på det sociale netværk**

Gør automatisk, at undervisere og administratorer vises som venner for alle kursister i modulet til socialt netværk.

*Standard: `false`*


### `social_show_language_flag_in_profile`

**Vis sprogflag ved siden af avatar i det sociale netværk**

Viser brugerens sprogpræference som et flagikon ved siden af deres avatar i profiler på det sociale netværk.

*Standard: `false`*