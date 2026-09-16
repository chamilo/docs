# Impostazioni delle Competenze

Comportamento del sistema **Competenze** — albero delle competenze, regole di assegnazione, integrazione nel profilo.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Competenze**. Questa categoria contiene **13 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_hr_skills_management`

**Consenti la gestione delle competenze da parte delle Risorse Umane**

Permette alle Risorse Umane di gestire le competenze.

*Predefinito: `true`*

### `allow_private_skills`

**Nascondi le competenze agli studenti**

Se abilitato, le competenze saranno visibili solo per amministratori, insegnanti (collegati a un utente tramite un corso) e utenti delle Risorse Umane (se collegati a un utente).

*Predefinito: `false`*

### `allow_skill_rel_items`

**Abilita il collegamento delle competenze agli elementi**

Questa opzione attiva una funzionalità importante che consente di collegare qualsiasi elemento a una competenza (e quindi di permetterne l'acquisizione). La funzionalità richiede comunque che l'insegnante confermi l'acquisizione della competenza, quindi l'acquisizione non è automatica.

*Predefinito: `false`*

### `allow_skills_tool`

**Consenti lo strumento Competenze**

Gli utenti possono vedere le loro competenze nella rete sociale e in un blocco nella homepage.

*Predefinito: `true`*

### `allow_teacher_access_student_skills`

**Consenti agli insegnanti di accedere alle competenze degli studenti**

[dedotto] Permette agli insegnanti di visualizzare e monitorare le competenze acquisite dagli studenti nei loro corsi.

*Predefinito: `false`*

### `badge_assignation_notification`

**Invia una notifica allo studente quando una competenza/badge è stata acquisita**

[dedotto] Invia notifiche agli studenti quando acquisiscono una nuova competenza o un badge.

*Predefinito: `false`*

### `hide_skill_levels`

**Nascondi la funzionalità dei livelli di competenza**

[dedotto] Nasconde la gerarchia dei livelli di competenza e le etichette dei livelli nelle viste relative alle competenze.

*Predefinito: `false`*

### `manual_assignment_subskill_autoload`

**Assegnazione manuale delle competenze a un utente: caricamento automatico delle sotto-competenze**

Quando si assegna manualmente una competenza a un utente, il modulo può essere impostato per offrire automaticamente l'assegnazione di una sotto-competenza invece della competenza selezionata.

*Predefinito: `false`*

### `openbadges_backpack`

**URL del backpack OpenBadges**

L'URL del server backpack OpenBadges che verrà utilizzato come predefinito per tutti gli utenti che desiderano esportare i loro badge. Di default, punta al repository gratuito e aperto della Mozilla Foundation: https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Mostra il nome completo della competenza nella ruota delle competenze**

Nella ruota delle competenze, mostra il nome completo della competenza quando ha un codice abbreviato.

*Predefinito: `false`*

### `skill_levels_names`

**Nomi dei livelli di competenza**

Definisci i nomi per i livelli di competenza come un array di id => nome.

### `skills_hierarchical_view_in_user_tracking`

**Mostra le competenze come tabella gerarchica**

[dedotto] Visualizza le competenze degli studenti come una struttura ad albero gerarchica nelle pagine di progresso e report.

*Predefinito: `false`*

### `skills_teachers_can_assign_skills`

**Consenti agli insegnanti di stabilire quali competenze sono acquisite tramite i loro corsi**

Di default, solo gli amministratori possono decidere quali competenze possono essere acquisite tramite quale corso.

*Predefinito: `false`*