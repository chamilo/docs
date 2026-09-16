# Impostazioni del glossario

Comportamento dello strumento **Glossario** del corso.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Glossario**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_remove_tags_in_glossary_export`

**Rimuovi i tag HTML nell'esportazione del glossario**

Se abilitata, i tag HTML vengono rimossi dalle definizioni dei termini del glossario durante l'esportazione.

*Predefinito: `false`*

### `default_glossary_view`

**Vista predefinita del glossario**

Scegliere quale vista ('table' o 'list') verrà utilizzata per impostazione predefinita nello strumento glossario.

*Predefinito: `table`*

### `show_glossary_in_extra_tools`

**Mostra i termini del glossario negli strumenti extra**

Da qui è possibile configurare come aggiungere i termini del glossario negli strumenti extra, come il percorso di apprendimento e lo strumento esercizi