# Impostazioni dei Gruppi

Comportamento dello strumento **Gruppi** del corso.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Gruppi**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_group_categories`

**Categorie di gruppi**

Consentire ai docenti di creare categorie nello strumento Gruppi?

*Predefinito: `false`*

### `hide_course_group_if_no_tools_available`

**Nascondi gruppo del corso se non ci sono strumenti**

Se non è disponibile alcuno strumento in un gruppo e l'utente non è registrato al gruppo stesso, nascondi completamente il gruppo nell'elenco dei gruppi.

*Predefinito: `false`*

### `show_groups_to_users`

**Mostra classi agli utenti**

Mostra le classi agli utenti. Le classi sono una funzionalità che consente di registrare/cancellare gruppi di utenti in una sessione o in un corso direttamente, riducendo il carico amministrativo. Quando selezioni questa opzione, gli studenti potranno vedere in quale classe si trovano attraverso l'interfaccia del loro social network.

*Predefinito: `false`*