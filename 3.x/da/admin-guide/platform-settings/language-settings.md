# Sprogindstillinger

Tilgængelige sprog, standardsprog, og hvordan Chamilo afgør, hvilket sprog der vises.

Disse indstillinger findes under **Administration > Konfigurationsindstillinger > Sprog**. Denne kategori indeholder **13 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Brug det, når du script'er via API'et, eller når du skal ændre indstillingerne globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_course_multiple_languages`

**Kurser på flere sprog**

Aktivér kurser, der administreres på mere end ét sprog. Denne indstilling tilføjer en sprogvælger på kurssiden, så brugerne nemt kan skifte sprog, og tilføjer et ekstra felt 'multiple_language' til kurser, som muliggør fjernadministrationsprocedurer.

*Standard: `false`*


### `allow_use_sub_language`

**Tillad definition og brug af undersprog**

Ved at aktivere denne indstilling kan du definere variationer af hvert af de sproglige udtryk, der bruges i platformens grænseflade, i form af et nyt sprog, der er baseret på og udvider et eksisterende sprog. Du finder denne indstilling i sprogsektionen i administrationspanelet.

*Standard: `false`*

### `auto_detect_language_custom_pages`

**Aktivér automatisk sprogdetektering på tilpassede sider**

Hvis du bruger tilpassede sider, skal du aktivere denne indstilling, hvis du vil have en sprogdetektor, der viser siden på brugerens browsersprog, eller deaktivere den for at tvinge sproget til at være platformens standardsprog.

*Standard: `true`*


### `language_by_resource` **v3**

**Sprog pr. ressource**

Tillad tildeling af et specifikt sprog til individuelle ressourcer.

*Standard: `false`*

### `language_flags_by_country`

**Sprogflag**

Brug landeflag til sprog. Dette er ikke aktiveret som standard, fordi nogle sprog ikke er strengt knyttet til et land, hvilket kan føre til frustration hos nogle brugere.

*Standard: `false`*


### `language_priority_1`

**Sprog med højeste prioritet**

Primært sprog, der vælges, når flere sprogkontekster er angivet.

*Standard: `course_lang`*


### `language_priority_2`

**Sprog med sekundær prioritet**

Sekundært reservesprog, hvis første prioritet er utilgængelig eller ude af kontekst.

*Standard: `user_profil_lang`*


### `language_priority_3`

**Sprog med tredje prioritet**

Tertiært reservesprog, hvis højere prioriteter fejler.

*Standard: `user_selected_lang`*


### `language_priority_4`

**Sprog med fjerde prioritet**

Sidste reservesprog efter prioriteret rækkefølge.

*Standard: `platform_lang`*


### `platform_language`

**Platformens standardsprog**

Hovedsprog, der bruges som standard, når intet brugersprog er angivet.

*Standard: `en`*


### `show_different_course_language`

**Vis kurssprog**

Vis det sprog, hvert kursus er på, ved siden af kursets titel på listen over kurser på startsiden

*Standard: `true`*


### `show_language_selector_in_menu`

**Sprogskifter i hovedmenuen**

Vis en sprogvælger i hovedmenuen, som straks opdaterer brugerens sprogpræference. Dette kan være nyttigt på flersprogede portaler, hvor kursister skal skifte fra ét sprog til et andet i deres læring.

*Standard: `true`*


### `template_activate_language_filter`

**Dokumentskabeloner på flere sprog**

Aktivér, at dokumentskabeloner (på platform- eller kursusniveau) kan konfigureres til specifikke sprog.

*Standard: `false`*