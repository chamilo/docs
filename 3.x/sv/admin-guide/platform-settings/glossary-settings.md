# Ordlistinställningar

Beteende för kursverktyget **Glossary**.

Åtkomst till dessa inställningar sker under **Administration > Configuration settings > Glossary**. Denna kategori innehåller **3 inställningar**, listade nedan med den titel och kommentar som medföljer i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:t eller när du behöver ändra inställningarna på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_remove_tags_in_glossary_export`

**Ta bort HTML-taggar vid export av ordlista**

När inställningen är aktiverad tas HTML-taggar bort från definitionerna av ordlistetermer vid export.

*Standard: `false`*

### `default_glossary_view`

**Standardvy för ordlista**

Välj vilken vy ('table' eller 'list') som ska användas som standard i ordlistaverktyget.

*Standard: `table`*

### `show_glossary_in_extra_tools`

**Visa ordlistetermer i extraverktyg**

Härifrån kan du konfigurera hur ordlistetermerna ska läggas till i extraverktyg som learning path och exercice tool