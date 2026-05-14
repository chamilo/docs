# Impostazioni del Glossario

Comportamento dello strumento **Glossario** del corso.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Glossario**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_remove_tags_in_glossary_export`

**Rimuovi i tag HTML nell'esportazione del glossario**

Quando abilitato, i tag HTML vengono rimossi dalle definizioni dei termini del glossario durante l'esportazione.

*Default: `false`*

### `default_glossary_view`

**Visualizzazione predefinita del glossario**

Scegli quale visualizzazione ('table' o 'list') verrà utilizzata come predefinita nello strumento glossario.

*Default: `table`*

### `show_glossary_in_extra_tools`

**Mostra i termini del glossario negli strumenti extra**

Da qui puoi configurare come aggiungere i termini del glossario negli strumenti extra come il percorso di apprendimento e lo strumento per gli esercizi.