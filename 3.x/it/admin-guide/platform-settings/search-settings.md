# Impostazioni di ricerca

Configurazione del sistema di ricerca full-text (Xapian).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Ricerca**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `search_enabled`

**Funzionalità di ricerca full-text**

Selezionare «Sì» per abilitare questa funzionalità. Dipende fortemente dall'estensione Xapian per PHP, pertanto non funzionerà se tale estensione non è installata sul server, in versione 1.x come minimo.

*Predefinito: `false`*


### `search_prefilter_prefix`

**Campo specifico per il prefiltro**

Questa opzione consente di scegliere il campo specifico da utilizzare nel tipo di ricerca con prefiltro.

### `search_show_unlinked_results`

**Ricerca full-text: mostra i risultati non collegati**

Quando si mostrano i risultati di una ricerca full-text, cosa si deve fare con i risultati non accessibili all'utente corrente?

*Predefinito: `true`*