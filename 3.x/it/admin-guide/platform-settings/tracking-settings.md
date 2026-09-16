# Impostazioni di tracciamento

Valori predefiniti relativi al tracciamento — cosa viene registrato, quali report sono esposti, regole di calcolo del tempo.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Tracciamento**. Questa categoria contiene **10 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `block_my_progress_page`

**Impedire l'accesso a «I miei progressi»**

In implementazioni specifiche come gli esami online, potrebbe essere necessario impedire all'utente l'accesso alla pagina «I miei progressi».

*Predefinito: `false`*

### `footer_extra_content`

**Contenuto extra nel piè di pagina**

È possibile aggiungere codice HTML come meta tag

### `header_extra_content`

**Contenuto extra nell'intestazione**

È possibile aggiungere codice HTML come meta tag

### `meta_description`

**Meta description**

Mostrerà un meta OpenGraph Description (og:description) nelle intestazioni del sito

### `meta_image_path`

**Percorso dell'immagine meta**

Questo percorso Meta Image è il percorso di un file all'interno della directory di Chamilo (ad es. home/image.png) che dovrebbe essere mostrato in una Twitter card o in una OpenGraph card quando si visualizza un collegamento al LMS. Twitter consiglia un'immagine di 120 x 120 pixel, che a volte potrebbe essere ritagliata a 120x90.

### `meta_title`

**Titolo meta OpenGraph**

Mostrerà un meta OpenGraph Title (og:title) nelle intestazioni del sito

### `meta_twitter_creator`

**Account Twitter Creator**

Il Twitter Creator è un account Twitter (ad es. @ywarnier) che rappresenta la *persona* che ha creato il sito. Questo campo è facoltativo.

### `meta_twitter_site`

**Account Twitter Site**

Il Twitter site è un account Twitter (ad es. @chamilo_news) correlato al sito. Di solito è un account più temporaneo rispetto all'account Twitter creator, oppure rappresenta un'entità (invece di una persona). Questo campo è obbligatorio se si desidera che i campi meta della Twitter card vengano mostrati.

### `my_progress_course_tools_order`

**Ordine degli strumenti nella pagina «I miei progressi»**

Modificare l'ordine degli strumenti mostrati nella pagina «I miei progressi» per gli studenti. Le opzioni includono 'quizzes', 'learning_paths' e 'skills'.

### `tracking_skip_generic_data`

**Saltare i dati generici nella pagina di auto-tracciamento dello studente**

Se la pagina «I miei progressi» impiega troppo tempo a caricarsi, potrebbe essere opportuno rimuovere l'elaborazione delle statistiche generiche per l'utente. In tal caso abilitare questa impostazione.

*Predefinito: `false`*