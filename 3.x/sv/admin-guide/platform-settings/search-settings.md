# Sökinställningar

Konfiguration av systemet för fulltextsökning (Xapian).

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Sök**. Denna kategori innehåller **3 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det vid skriptning via API:t eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `search_enabled`

**Funktion för fulltextsökning**

Välj 'Ja' för att aktivera denna funktion. Den är starkt beroende av Xapian-tillägget för PHP, så den fungerar inte om detta tillägg inte är installerat på servern, i version 1.x som minimum.

*Standard: `false`*


### `search_prefilter_prefix`

**Specifikt fält för förfilter**

Detta alternativ låter dig välja det specifika fält som ska användas vid sökning av typen förfilter.

### `search_show_unlinked_results`

**Fulltextsökning: visa olänkade resultat**

När resultaten av en fulltextsökning visas, vad ska göras med de resultat som inte är tillgängliga för den aktuella användaren?

*Standard: `true`*