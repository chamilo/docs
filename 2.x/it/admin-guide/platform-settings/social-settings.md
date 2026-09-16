# Impostazioni della Rete Sociale

Comportamento della **Rete Sociale** — amici, gruppi, post sul muro, album fotografici.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Rete Sociale**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_social_tool`

**Strumento di rete sociale (simile a Facebook)**

Lo strumento di rete sociale consente agli utenti di definire relazioni con altri utenti e, così facendo, di creare gruppi di amici. Combinato con lo strumento di messaggistica interna, questo strumento permette una comunicazione stretta con gli amici all'interno dell'ambiente del portale.

*Predefinito: `true`*

### `allow_students_to_create_groups_in_social`

**Consenti agli studenti di creare gruppi nella rete sociale**

Permette agli studenti di creare gruppi nella rete sociale.

*Predefinito: `false`*

### `disable_dislike_option`

**Disabilita l'opzione 'non mi piace' per i post sociali**

Rimuove l'opzione del pollice in giù per il feedback sui post sociali. Mantiene solo il pollice in su (mi piace).

*Predefinito: `false`*

### `hide_social_groups_block`

**Nascondi il blocco dei gruppi nella rete sociale**

Rimuove la sezione dei gruppi dalla visualizzazione della rete sociale.

*Predefinito: `false`*

### `social_enable_messages_feedback`

**Mi piace/Non mi piace per i post sociali**

Consente agli utenti di aggiungere feedback (mi piace o non mi piace) ai post sul muro sociale.

*Predefinito: `false`*

### `social_make_teachers_friend_all`

**Docenti e amministratori appaiono come amici degli studenti nella rete sociale**

Fa apparire automaticamente gli istruttori e gli amministratori come amici di tutti gli studenti nel modulo della rete sociale.

*Predefinito: `false`*

### `social_show_language_flag_in_profile`

**Mostra la bandiera della lingua accanto all'avatar nella rete sociale**

Mostra la preferenza linguistica dell'utente come icona di una bandiera accanto al suo avatar nei profili della rete sociale.

*Predefinito: `false`*