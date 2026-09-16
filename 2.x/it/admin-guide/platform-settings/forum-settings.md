# Impostazioni dei Forum

Comportamento dello strumento **Forum** del corso.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Forum**. Questa categoria contiene **9 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_forum_category_language_filter`

**Filtro lingua per categorie di forum**

Aggiunge un filtro lingua alla visualizzazione del forum per vedere solo le categorie configurate in una lingua specifica. Richiede l'uso del campo extra 'language' sull'entità 'forum_category'.

*Default: `false`*

### `allow_forum_post_revisions`

**Revisione dei post del forum**

Abilita questa opzione per consentire di richiedere una revisione o una traduzione del proprio post in un forum. Se configurata in modo estensivo, può essere utilizzata per collaborare con altri utenti in un forum di apprendimento linguistico.

*Default: `false`*

### `community_managers_user_list`

**Elenco dei gestori della comunità**

Fornisci un array di ID utente che saranno considerati gestori della comunità nel corso speciale designato come forum globale. I gestori della comunità hanno privilegi aggiuntivi sul forum globale.

### `default_forum_view`

**Visualizzazione predefinita del forum**

Quale dovrebbe essere l'opzione predefinita quando si crea un nuovo forum. Tuttavia, ogni formatore può scegliere una visualizzazione diversa per ogni singolo forum.

*Default: `flat`*

### `display_groups_forum_in_general_tool`

**Mostra i forum di gruppo nello strumento forum generale**

Mostra i forum di gruppo nello strumento forum a livello di corso. Questa opzione è abilitata per impostazione predefinita (in questo caso, le visibilità individuali dei forum di gruppo fungono da criterio aggiuntivo). Se disabilitata, i forum di gruppo saranno visibili solo attraverso lo strumento di gruppo, indipendentemente dal fatto che siano pubblici o meno.

*Default: `true`*

### `forum_fold_categories`

**Comprimi categorie di forum**

Effetto visivo per abilitare la compressione/espansione delle categorie di forum.

*Default: `false`*

### `global_forums_course_id`

**Usa un corso come forum globale**

Imposta l'ID del corso (numerico) di un corso riservato da utilizzare come forum globale. Questo sostituisce il link 'Gruppi sociali' nella rete sociale con un link al forum di quel corso.

*Default: `0`*

### `hide_forum_post_revision_language`

**Nascondi lingua di revisione dei post del forum**

Nasconde la possibilità di assegnare una lingua a una revisione di un post del forum.

*Default: `false`*

### `subscribe_users_to_forum_notifications_also_in_base_course`

**Notifiche del forum anche dal corso base**

Abilita questa opzione per consentire le notifiche provenienti dal forum del corso base, anche se si segue il corso tramite una sessione.

*Default: `false`*