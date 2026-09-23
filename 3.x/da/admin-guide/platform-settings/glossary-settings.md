# Ordlisteindstillinger

Adfærd for kursets **Ordliste**-værktøj.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Ordliste**. Denne kategori indeholder **3 indstillinger**, som er listet nedenfor med titel og kommentar som de leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script'er via API'et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_remove_tags_in_glossary_export`

**Fjern HTML-tags ved eksport af ordliste**

Når indstillingen er aktiveret, fjernes HTML-tags fra definitionerne af ordlistetermer ved eksport.

*Standard: `false`*

### `default_glossary_view`

**Standardvisning for ordliste**

Vælg hvilken visning ('table' eller 'list') der som standard skal bruges i ordlisteværktøjet.

*Standard: `table`*

### `show_glossary_in_extra_tools`

**Vis ordlistetermer i ekstra værktøjer**

Herfra kan du konfigurere, hvordan ordlistetermerne tilføjes i ekstra værktøjer som læringssti og øvelsesværktøj