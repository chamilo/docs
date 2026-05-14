# Sistema di Impostazioni

La configurazione di Chamilo è gestita tramite un insieme di schemi di impostazioni (circa 40, che variano tra le versioni) che definiscono ogni aspetto configurabile della piattaforma. Questi si trovano in `src/CoreBundle/Settings/` — l'elenco esatto in questa directory rappresenta la fonte di verità.

## Come Funziona

Le impostazioni sono:

1. **Definite** nelle classi di schema (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Memorizzate** nel database (tabella `settings_current`)
3. **Accessibili** tramite il servizio `SettingsManager`
4. **Gestite** attraverso l'interfaccia web di amministrazione

## Schemi di Impostazioni

Ogni file di schema definisce una categoria di impostazioni. Schemi principali:

| Schema | Scopo |
|--------|-------|
| `PlatformSettingsSchema` | Informazioni sull'istituzione, fuso orario, tipo di server, funzionalità del portale |
| `SecuritySettingsSchema` | Tentativi di accesso, CAPTCHA, politica delle password, intestazioni HTTP, 2FA |
| `RegistrationSettingsSchema` | Auto-registrazione, campi obbligatori, iscrizione automatica |
| `CourseSettingsSchema` | Impostazioni predefinite per la creazione dei corsi, strumenti, catalogo |
| `SessionSettingsSchema` | Impostazioni predefinite delle sessioni, visibilità |
| `MailSettingsSchema` | Configurazione email, DKIM, notifiche |
| `AiHelpersSettingsSchema` | Fornitori di AI, attivazione/disattivazione delle funzionalità per strumento AI |
| `ExerciseSettingsSchema` | Punteggio dei quiz, feedback, opzioni delle domande |
| `LearningPathSettingsSchema` | Visualizzazione del percorso di apprendimento, prerequisiti, impostazioni SCORM |
| `DocumentSettingsSchema` | Limiti di caricamento, tipi di file consentiti, archiviazione |
| `DisplaySettingsSchema` | Schede dell'interfaccia utente, elementi della barra laterale, tema |
| `LanguageSettingsSchema` | Lingue disponibili, locale predefinito |
| `AdminSettingsSchema` | Email dell'amministratore, opzioni specifiche per l'amministratore |

## Accesso alle Impostazioni

Nel codice PHP:

```php
// Tramite il servizio SettingsManager
$value = $settingsManager->getSetting('platform.site_name');

// Nel codice legacy
$value = api_get_setting('platform.site_name');
```

Nei template:

```twig
{# Legge una singola impostazione #}
{{ chamilo_settings_get('platform.site_name') }}

{# Verifica se un'impostazione esiste #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Ottiene tutte le impostazioni come array #}
{% set settings = chamilo_settings_all() %}
```

## Struttura delle Impostazioni

Ogni impostazione ha:

* **Namespace** — La categoria dello schema (ad esempio, `platform`, `security`, `ai_helpers`)
* **Variabile** — Il nome dell'impostazione (ad esempio, `site_name`, `allow_registration`)
* **Valore** — Il valore corrente
* **Tipo** — Tipo di dato (stringa, booleano, array, ecc.)

## Impostazioni a Livello di Corso

Alcune impostazioni possono essere sovrascritte a livello di corso. Queste sono definite in `src/CourseBundle/Settings/` e includono:

* Impostazioni degli esercizi per corso
* Impostazioni dei compiti per corso
* Attivazione/disattivazione delle funzionalità AI per corso

## Impostazioni Multi-URL

 Nelle configurazioni multi-URL, alcune impostazioni possono essere personalizzate per ciascun URL di accesso, consentendo configurazioni diverse del portale dalla stessa installazione.

Queste impostazioni appariranno più volte nella tabella `settings`, con valori diversi di `access_url`. Per impostazione predefinita, tutte le impostazioni sono associate a `access_url=1`.

## Aggiunta di una Nuova Impostazione

1. Aggiungere la definizione dell'impostazione alla classe di schema appropriata
2. Fornire un valore predefinito
3. Eseguire le migrazioni del database se necessario
4. Accedere all'impostazione tramite `SettingsManager`