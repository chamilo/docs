# Impostazioni delle presenze

Valori predefiniti e comportamento dello strumento **Attendance**.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Attendance**. Questa categoria contiene **5 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_delete_attendance`

**Presenze: abilitare l'eliminazione**

Il comportamento predefinito in Chamilo è nascondere i fogli presenze invece di eliminarli, nel caso in cui il docente lo faccia per errore. Abilitare questa opzione per consentire ai docenti di eliminare *davvero* i fogli presenze.

*Predefinito: `true`*

### `attendance_allow_comments`

**Consentire commenti nei fogli presenze**

Docenti e studenti possono commentare ogni singola presenza (per giustificarla).

*Predefinito: `false`*

### `attendance_calendar_set_duration` **v3**

**Durata degli eventi di presenza**

Opzione per definire la durata di un evento nel foglio presenze.

*Predefinito: `false`*

### `enable_sign_attendance_sheet`

**Firma delle presenze**

Abilitare l'acquisizione di firme per confermare la propria presenza.

*Predefinito: `false`*

### `multilevel_grading`

**Abilitare la valutazione multilivello delle presenze**

Consente di valutare le presenze con più livelli invece di un semplice sistema presente/assente.

*Predefinito: `false`*