# Impostazioni della rete sociale

Comportamento della **rete sociale** — amici, gruppi, post sulla bacheca, album fotografici.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Rete sociale**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_social_tool`

**Strumento di rete sociale (simile a Facebook)**

Lo strumento di rete sociale consente agli utenti di definire relazioni con altri utenti e, in questo modo, di definire gruppi di amici. Combinato con lo strumento di messaggistica interna, questo strumento consente una comunicazione stretta con gli amici, all'interno dell'ambiente del portale.

*Predefinito: `true`*

### `allow_students_to_create_groups_in_social`

**Consentire agli studenti di creare gruppi nella rete sociale**

Consentire agli studenti di creare gruppi nella rete sociale

*Predefinito: `false`*


### `disable_dislike_option`

**Disabilitare il «non mi piace» per i post sociali**

Rimuove l'opzione pollice verso il basso per il feedback sui post sociali. Mantiene solo il pollice verso l'alto (mi piace).

*Predefinito: `false`*

### `hide_social_groups_block`

**Nascondere il blocco dei gruppi nella rete sociale**

Rimuove la sezione dei gruppi dalla vista della rete sociale.

*Predefinito: `false`*


### `social_enable_messages_feedback`

**Mi piace/Non mi piace per i post sociali**

Consente agli utenti di aggiungere feedback (mi piace o non mi piace) ai post nella bacheca sociale.

*Predefinito: `false`*

### `social_make_teachers_friend_all`

**Docenti e amministratori vedono gli studenti come amici nella rete sociale**

Fa apparire automaticamente istruttori e amministratori come amici di tutti gli studenti nel modulo della rete sociale.

*Predefinito: `false`*


### `social_show_language_flag_in_profile`

**Mostrare la bandiera della lingua accanto all'avatar nella rete sociale**

Visualizza la preferenza linguistica dell'utente come icona di bandiera accanto al suo avatar nei profili della rete sociale.

*Predefinito: `false`*