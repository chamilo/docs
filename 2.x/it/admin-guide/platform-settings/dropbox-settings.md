# Impostazioni Dropbox

Comportamento dello strumento di scambio file **Dropbox**.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Dropbox**. Questa categoria contiene **8 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `dropbox_allow_group`

**Dropbox: consentire ai gruppi**

Gli utenti possono inviare file ai gruppi

*Predefinito: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Caricare nel proprio spazio dropbox?**

Consenti ai formatori e agli utenti di caricare documenti nel loro dropbox senza inviare i documenti a se stessi

*Predefinito: `true`*

### `dropbox_allow_mailing`

**Dropbox: Consentire l'invio tramite mail**

Con la funzionalità di mailing puoi inviare a ogni studente un documento personale

*Predefinito: `false`*

### `dropbox_allow_overwrite`

**Dropbox: I documenti possono essere sovrascritti**

Il documento originale può essere sovrascritto quando un utente o un formatore carica un documento con il nome di un documento già esistente? Se rispondi sì, perdi il meccanismo di versioning.

*Predefinito: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Studente <-> Studente**

Consenti agli utenti di inviare documenti ad altri utenti (peer-to-peer). Gli utenti potrebbero utilizzare questa funzione anche per documenti meno rilevanti (mp3, soluzioni di test, ...). Se disattivi questa opzione, gli utenti potranno inviare documenti solo al formatore.

*Predefinito: `true`*

### `dropbox_hide_course_coach`

**Dropbox: nascondi il coach del corso**

Nascondi il coach del corso di sessione nel dropbox quando un documento viene inviato dal coach agli studenti

*Predefinito: `false`*

### `dropbox_hide_general_coach`

**Nascondi il coach generale nel dropbox**

Nascondi il nome del coach generale nello strumento dropbox quando il coach generale ha caricato il file

*Predefinito: `false`*

### `dropbox_max_filesize`

**Dropbox: Dimensione massima di un file**

Quanto grande (in MB) può essere un documento nel dropbox?

*Predefinito: `100000000`*