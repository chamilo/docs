# Impostazioni dei gruppi

Comportamento dello strumento **Gruppi** del corso.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Gruppi**. Questa categoria contiene **3 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_group_categories`

**Categorie di gruppi**

Consentire ai docenti di creare categorie nello strumento Gruppi?

*Predefinito: `false`*


### `hide_course_group_if_no_tools_available`

**Nascondere il gruppo del corso se non è disponibile alcuno strumento**

Se in un gruppo non è disponibile alcuno strumento e l'utente non è iscritto al gruppo stesso, nascondere completamente il gruppo nell'elenco dei gruppi.

*Predefinito: `false`*


### `show_groups_to_users`

**Mostrare le classi agli utenti**

Mostrare le classi agli utenti. Le classi sono una funzionalità che consente di iscrivere/disiscrivere gruppi di utenti in una sessione o in un corso in modo diretto, riducendo l'onere amministrativo. Se si seleziona questa opzione, gli studenti potranno vedere a quale classe appartengono tramite l'interfaccia della rete sociale.

*Predefinito: `false`*