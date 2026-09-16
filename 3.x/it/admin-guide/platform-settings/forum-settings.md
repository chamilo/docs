# Impostazioni dei forum

Comportamento dello strumento **Forum** del corso.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Forum**. Questa categoria contiene **9 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_forum_category_language_filter`

**Filtro lingua delle categorie del forum**

Aggiunge un filtro lingua alla vista del forum per visualizzare solo le categorie configurate in una lingua specifica. Richiede l'uso del campo extra 'language' sull'entità 'forum_category'.

*Predefinito: `false`*

### `allow_forum_post_revisions`

**Revisione dei messaggi del forum**

Abilitare questa opzione per consentire di richiedere una revisione o una traduzione del proprio messaggio in un forum. Se configurata in modo esteso, può essere utilizzata per collaborare con altri utenti in un forum di apprendimento linguistico.

*Predefinito: `false`*

### `community_managers_user_list`

**Elenco dei community manager**

Fornire un array di ID utente che saranno considerati community manager nel corso speciale designato come forum globale. I community manager hanno privilegi aggiuntivi sul forum globale.

### `default_forum_view`

**Vista predefinita del forum**

Quale dovrebbe essere l'opzione predefinita alla creazione di un nuovo forum. Qualsiasi docente può comunque scegliere una vista diversa per ogni singolo forum

*Predefinito: `flat`*

### `display_groups_forum_in_general_tool`

**Mostra i forum di gruppo nel forum generale**

Mostra i forum di gruppo nello strumento forum a livello di corso. Questa opzione è abilitata per impostazione predefinita (in questo caso, le visibilità individuali dei forum di gruppo agiscono comunque come criterio aggiuntivo). Se disabilitata, i forum di gruppo saranno visibili solo tramite lo strumento gruppi, siano essi pubblici o meno.

*Predefinito: `true`*

### `forum_fold_categories`

**Comprimi le categorie del forum**

Effetto visivo per abilitare la compressione/espansione delle categorie del forum.

*Predefinito: `false`*

### `global_forums_course_id`

**Usa un corso come forum globale**

Impostare l'ID del corso (numerico) di un corso riservato da utilizzare come forum globale. Sostituisce il collegamento 'Gruppi sociali' nella rete sociale con un collegamento al forum di quel corso.

*Predefinito: `0`*

### `hide_forum_post_revision_language`

**Nascondi la lingua della revisione del messaggio del forum**

Nasconde la possibilità di assegnare una lingua a una revisione di un messaggio del forum.

*Predefinito: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifiche del forum anche dal corso base**

Abilitare questa opzione per abilitare le notifiche provenienti dal forum del corso base, anche se si segue il corso tramite una sessione.

*Predefinito: `false`*