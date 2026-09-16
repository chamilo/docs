# Impostazioni Dropbox

Comportamento dello strumento di scambio file **Dropbox**.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Dropbox**. Questa categoria contiene **8 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per lo scripting tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `dropbox_allow_group`

**Dropbox: consenti gruppo**

Gli utenti possono inviare file ai gruppi

*Predefinito: `true`*

### `dropbox_allow_just_upload`

**Dropbox: Caricare nello spazio dropbox personale?**

Consentire a formatori e utenti di caricare documenti nel proprio dropbox senza inviare i documenti a se stessi

*Predefinito: `true`*

### `dropbox_allow_mailing`

**Dropbox: Consenti mailing**

Con la funzionalità di mailing è possibile inviare a ciascun discente un documento personale

*Predefinito: `false`*

### `dropbox_allow_overwrite`

**Dropbox: I documenti possono essere sovrascritti**

Il documento originale può essere sovrascritto quando un utente o un formatore carica un documento con il nome di un documento già esistente? Se si risponde sì, si perde il meccanismo di versionamento.

*Predefinito: `true`*

### `dropbox_allow_student_to_student`

**Dropbox: Discente <-> Discente**

Consentire agli utenti di inviare documenti ad altri utenti (peer 2 peer). Gli utenti potrebbero usare questa funzione anche per documenti meno pertinenti (mp3, soluzioni di test, ...). Se si disabilita, gli utenti possono inviare documenti solo al formatore.

*Predefinito: `true`*

### `dropbox_hide_course_coach`

**Dropbox: nascondi tutor del corso**

Nascondere il tutor del corso di sessione in Dropbox quando un documento viene inviato dal tutor agli studenti

*Predefinito: `false`*

### `dropbox_hide_general_coach`

**Nascondi tutor generale in Dropbox**

Nascondere il nome del tutor generale nello strumento Dropbox quando il tutor generale ha caricato il file

*Predefinito: `false`*


### `dropbox_max_filesize`

**Dropbox: Dimensione massima di un documento**

Quanto può essere grande (in MB) un documento dropbox?

*Predefinito: `100000000`*