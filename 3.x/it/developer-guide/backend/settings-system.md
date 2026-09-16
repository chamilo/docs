# Sistema delle impostazioni

La configurazione di Chamilo è gestita tramite un insieme di schemi di impostazioni (circa 40, variabile tra le versioni) che definiscono ogni aspetto configurabile della piattaforma. Si trovano in `src/CoreBundle/Settings/` — l’elenco esatto presente lì è la fonte di verità.

## Come funziona

Le impostazioni sono:

1. **Definite** nelle classi schema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Memorizzate** nel database (tabella `settings_current`)
3. **Consultate** tramite il servizio `SettingsManager`
4. **Gestite** attraverso l’interfaccia web di amministrazione

## Schemi delle impostazioni

Ogni file schema definisce una categoria di impostazioni. Schemi principali:

| Schema | Scopo |
|--------|---------|
| `PlatformSettingsSchema` | Informazioni sull’istituzione, fuso orario, tipo di server, funzionalità del portale |
| `SecuritySettingsSchema` | Tentativi di accesso, CAPTCHA, policy delle password, intestazioni HTTP, 2FA |
| `RegistrationSettingsSchema` | Auto-registrazione, campi obbligatori, iscrizione automatica |
| `CourseSettingsSchema` | Valori predefiniti per la creazione dei corsi, strumenti, catalogo |
| `SessionSettingsSchema` | Valori predefiniti delle sessioni, visibilità |
| `MailSettingsSchema` | Configurazione e-mail, DKIM, notifiche |
| `AiHelpersSettingsSchema` | Provider di IA, attivazione delle funzionalità per strumento di IA |
| `ExerciseSettingsSchema` | Punteggio dei quiz, feedback, opzioni delle domande |
| `LearningPathSettingsSchema` | Visualizzazione dei LP, prerequisiti, impostazioni SCORM |
| `DocumentSettingsSchema` | Limiti di caricamento, tipi di file consentiti, archiviazione |
| `DisplaySettingsSchema` | Schede dell’interfaccia, elementi della barra laterale, tema |
| `LanguageSettingsSchema` | Lingue disponibili, locale predefinita |
| `AdminSettingsSchema` | E-mail dell’amministratore, opzioni specifiche per l’amministrazione |

## Accesso alle impostazioni

Nel codice PHP:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

Nei template:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Struttura di un’impostazione

Ogni impostazione ha:

* **Namespace** — La categoria dello schema (ad es. `platform`, `security`, `ai_helpers`)
* **Variable** — Il nome dell’impostazione (ad es. `site_name`, `allow_registration`)
* **Value** — Il valore corrente
* **Type** — Tipo di dato (string, boolean, array, ecc.)

## Impostazioni a livello di corso

Alcune impostazioni possono essere sovrascritte a livello di corso. Sono definite in `src/CourseBundle/Settings/` e includono:

* Impostazioni degli esercizi per corso
* Impostazioni dei compiti per corso
* Attivazione delle funzionalità di IA per corso

## Impostazioni multi-URL

Nelle installazioni multi-URL, alcune impostazioni possono essere personalizzate per access URL, consentendo configurazioni di portale diverse a partire dalla stessa installazione.

Tali impostazioni compariranno più volte nella tabella `settings`, con valori diversi di `access_url`. Per impostazione predefinita, tutte le impostazioni sono associate a `access_url=1`.

## Aggiungere una nuova impostazione

1. Aggiungere la definizione dell’impostazione alla classe schema appropriata
2. Fornire un valore predefinito
3. Eseguire le migrazioni del database se necessario
4. Accedere all’impostazione tramite `SettingsManager`