# Impostazioni di Ricerca

Configurazione del sistema di ricerca full-text (Xapian).

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Ricerca**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `search_enabled`

**Funzionalità di ricerca full-text**

Seleziona 'Sì' per abilitare questa funzionalità. Dipende fortemente dall'estensione Xapian per PHP, quindi non funzionerà se questa estensione non è installata sul tuo server, nella versione 1.x come minimo.

*Default: `false`*

### `search_prefilter_prefix`

**Campo specifico per il pre-filtro**

Questa opzione ti consente di scegliere il campo specifico da utilizzare per il tipo di ricerca con pre-filtro.

### `search_show_unlinked_results`

**Ricerca full-text: mostra risultati non collegati**

Quando si mostrano i risultati di una ricerca full-text, cosa dovrebbe essere fatto con i risultati che non sono accessibili all'utente corrente?

*Default: `true`*