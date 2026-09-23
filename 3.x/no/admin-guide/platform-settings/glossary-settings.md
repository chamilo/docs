# Ordlisteinnstillinger

Oppførselen til kursverktøyet **Glossary**.

Åpne disse innstillingene under **Administrasjon > Konfigurasjonsinnstillinger > Glossary**. Denne kategorien inneholder **3 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med fastbreddeskrift. Bruk det når du skripter via API-et, eller når du trenger å endre innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_remove_tags_in_glossary_export`

**Fjern HTML-tagger ved eksport av ordliste**

Når denne er aktivert, fjernes HTML-tagger fra definisjonene av ordlistebegreper ved eksport.

*Standard: `false`*

### `default_glossary_view`

**Standardvisning for ordliste**

Velg hvilken visning ('table' eller 'list') som skal brukes som standard i ordlisteverktøyet.

*Standard: `table`*

### `show_glossary_in_extra_tools`

**Vis ordlistebegreper i ekstra verktøy**

Herfra kan du konfigurere hvordan ordlistebegrepene skal legges til i ekstra verktøy, som læringssti og øvelsesverktøy