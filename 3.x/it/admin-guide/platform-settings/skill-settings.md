# Impostazioni delle competenze

Comportamento del sistema **Skills** — albero delle competenze, regole di assegnazione, integrazione con i profili.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Skills**. Questa categoria contiene **13 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per gli script tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_hr_skills_management`

**Consentire la gestione delle competenze da parte delle HR**

Consente alle HR di gestire le competenze

*Predefinito: `true`*


### `allow_private_skills`

**Nascondere le competenze agli studenti**

Se abilitata, le competenze sono visibili solo per amministratori, docenti (collegati a un utente tramite un corso) e utenti HRM (se collegati a un utente).

*Predefinito: `false`*


### `allow_skill_rel_items`

**Abilitare il collegamento delle competenze agli elementi**

Abilita una funzionalità importante che consente di collegare qualsiasi elemento a una competenza (e quindi di consentirne l'acquisizione). La funzionalità richiede comunque che il docente confermi l'acquisizione della competenza, quindi l'acquisizione non è automatica.

*Predefinito: `false`*


### `allow_skills_tool`

**Consentire lo strumento Skills**

Gli utenti possono vedere le proprie competenze nel social network e in un blocco nella homepage.

*Predefinito: `true`*

### `allow_teacher_access_student_skills`

**Consentire ai docenti di accedere alle competenze degli studenti**

[inferred] Consente ai docenti di visualizzare e monitorare le competenze acquisite dagli studenti nei propri corsi.

*Predefinito: `false`*


### `badge_assignation_notification`

**Inviare una notifica allo studente quando è stata acquisita una competenza/badge**

[inferred] Invia notifiche agli studenti quando acquisiscono una nuova competenza o un badge.

*Predefinito: `false`*


### `hide_skill_levels`

**Nascondere la funzionalità dei livelli di competenza**

[inferred] Nasconde la gerarchia dei livelli di competenza e le etichette dei livelli nelle viste relative alle competenze.

*Predefinito: `false`*


### `manual_assignment_subskill_autoload`

**Assegnazione delle competenze all'utente: caricamento automatico delle sotto-competenze**

Quando si assegnano manualmente competenze a un utente, il modulo può essere impostato per offrire automaticamente l'assegnazione di una sotto-competenza al posto della competenza selezionata.

*Predefinito: `false`*


### `openbadges_backpack`

**URL del backpack OpenBadges**

L'URL del server backpack OpenBadges che verrà utilizzato per impostazione predefinita per tutti gli utenti che desiderano esportare i propri badge. Il valore predefinito è il repository backpack aperto e gratuito della Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostrare il nome completo della competenza sulla ruota delle competenze**

Sulla ruota delle competenze, mostra il nome della competenza quando questa ha un codice breve.

*Predefinito: `false`*


### `skill_levels_names`

**Nomi dei livelli di competenza**

Definire i nomi dei livelli di competenza come array di id => name.

### `skills_hierarchical_view_in_user_tracking`

**Mostrare le competenze come tabella gerarchica**

[inferred] Visualizza le competenze dello studente come struttura ad albero gerarchica nelle pagine di avanzamento e di report.

*Predefinito: `false`*


### `skills_teachers_can_assign_skills`

**Consentire ai docenti di impostare quali competenze si acquisiscono tramite i propri corsi**

Per impostazione predefinita, solo gli amministratori possono decidere quali competenze possono essere acquisite tramite quale corso.

*Predefinito: `false`*