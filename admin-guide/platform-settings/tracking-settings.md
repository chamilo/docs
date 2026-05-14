# Impostazioni di Tracciamento

Impostazioni predefinite relative al tracciamento — cosa viene registrato, quali rapporti vengono esposti, regole di calcolo del tempo.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Tracciamento**. Questa categoria contiene **10 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `block_my_progress_page`

**Impedisci l'accesso alla pagina 'I miei progressi'**

In implementazioni specifiche come gli esami online, potresti voler impedire agli utenti di accedere alla pagina 'I miei progressi'.

*Default: `false`*

### `footer_extra_content`

**Contenuto extra nel footer**

Puoi aggiungere codice HTML come meta tag

### `header_extra_content`

**Contenuto extra nell'header**

Puoi aggiungere codice HTML come meta tag

### `meta_description`

**Descrizione meta**

Questo mostrerà un meta tag di descrizione OpenGraph (og:description) negli header del tuo sito

### `meta_image_path`

**Percorso immagine meta**

Questo percorso dell'immagine meta è il percorso di un file all'interno della directory di Chamilo (ad esempio home/image.png) che dovrebbe essere mostrato in una Twitter card o in una card OpenGraph quando si visualizza un link al tuo LMS. Twitter raccomanda un'immagine di 120 x 120 pixel, che a volte potrebbe essere ritagliata a 120x90.

### `meta_title`

**Titolo meta OpenGraph**

Questo mostrerà un meta tag di titolo OpenGraph (og:title) negli header del tuo sito

### `meta_twitter_creator`

**Account Twitter Creator**

Il Twitter Creator è un account Twitter (ad esempio @ywarnier) che rappresenta la *persona* che ha creato il sito. Questo campo è opzionale.

### `meta_twitter_site`

**Account Twitter Site**

Il Twitter Site è un account Twitter (ad esempio @chamilo_news) correlato al tuo sito. Di solito è un account più temporaneo rispetto all'account Twitter Creator, o rappresenta un'entità (invece di una persona). Questo campo è obbligatorio se desideri che i campi meta della Twitter card vengano mostrati.

### `my_progress_course_tools_order`

**Ordine degli strumenti nella pagina 'I miei progressi'**

Modifica l'ordine degli strumenti mostrati nella pagina 'I miei progressi' per gli studenti. Le opzioni includono 'quizzes', 'learning_paths' e 'skills'.

### `tracking_skip_generic_data`

**Salta i dati generici nella pagina di autotracciamento dello studente**

Se la pagina 'I miei progressi' impiega troppo tempo a caricarsi, potresti voler rimuovere l'elaborazione delle statistiche generiche per l'utente. In questo caso, abilita questa impostazione.

*Default: `false`*