# Impostazioni della Chat

Comportamento dello strumento **Chat** del corso.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Chat**. Questa categoria contiene **5 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_global_chat`

**Consenti chat globale**

Gli utenti possono chattare tra loro

*Predefinito: `false`*

### `course_chat_restrict_to_coach`

**Limita la chat del corso ai tutor**

Consenti agli studenti di parlare solo con i tutor del corso (non con altri studenti).

*Predefinito: `false`*

### `hide_chat_video`

**Nascondi l'opzione di videochat nella chat globale**

Quando abilitata, la funzionalità di videochat è disattivata e non disponibile nello strumento di chat globale.

*Predefinito: `true`*

### `save_private_conversations_in_documents`

**Salva le conversazioni private nei documenti**

Se abilitata, i messaggi di chat privati 1:1 saranno duplicati nei documenti della cronologia della chat del corso. Si consiglia di mantenere disabilitata per motivi di privacy.

*Predefinito: `false`*

### `show_chat_folder`

**Mostra la cartella della cronologia delle conversazioni in chat**

Questo mostrerà al docente la cartella che contiene tutte le sessioni effettuate nella chat; il docente può renderle visibili o meno agli studenti e utilizzarle come risorsa.

*Predefinito: `true`*