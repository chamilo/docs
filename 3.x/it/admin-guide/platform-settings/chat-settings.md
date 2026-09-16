# Impostazioni della chat

Comportamento dello strumento **Chat** del corso.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Chat**. Questa categoria contiene **5 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_global_chat`

**Consenti chat globale**

Gli utenti possono chattare tra loro

*Predefinito: `false`*

### `course_chat_restrict_to_coach`

**Limita la chat del corso ai tutor**

Consente agli studenti di parlare solo con i tutor del corso (non con gli altri studenti).

*Predefinito: `false`*

### `hide_chat_video`

**Nascondi l'opzione videochat nella chat globale**

Se abilitata, la funzionalità di videochat è disattivata e non disponibile nello strumento di chat globale.

*Predefinito: `true`*

### `save_private_conversations_in_documents`

**Salva le conversazioni private nei documenti**

Se abilitata, i messaggi di chat privata 1:1 verranno duplicati nei documenti della cronologia della chat del corso. Si consiglia di lasciarla disabilitata per motivi di privacy.

*Predefinito: `false`*

### `show_chat_folder`

**Mostra la cartella della cronologia delle conversazioni della chat**

Mostra all'insegnante la cartella che contiene tutte le sessioni effettuate nella chat; l'insegnante può renderle visibili o meno agli studenti e utilizzarle come risorsa

*Predefinito: `true`*