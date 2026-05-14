# Impostazioni di Presenza

Impostazioni predefinite e comportamento dello strumento **Presenza**.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Presenza**. Questa categoria contiene **4 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_delete_attendance`

**Presenze: abilita eliminazione**

Il comportamento predefinito in Chamilo è nascondere i fogli di presenza invece di eliminarli, nel caso in cui un docente lo faccia per errore. Abilita questa opzione per consentire ai docenti di *effettivamente* eliminare i fogli di presenza.

*Predefinito: `true`*

### `attendance_allow_comments`

**Consenti commenti nei fogli di presenza**

Docenti e studenti possono commentare ogni singola presenza (per giustificare).

*Predefinito: `false`*

### `enable_sign_attendance_sheet`

**Firma delle presenze**

Abilita la raccolta di firme per confermare la propria presenza.

*Predefinito: `false`*

### `multilevel_grading`

**Abilita valutazione delle presenze a più livelli**

Consente di valutare le presenze con più livelli invece di un semplice sistema presente/assente.

*Predefinito: `false`*