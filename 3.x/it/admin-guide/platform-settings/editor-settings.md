# Impostazioni dell'editor

Configurazione dell'editor di testo avanzato (TinyMCE) utilizzato in tutta la piattaforma — barre degli strumenti, plugin, assistenti IA nell'editor.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Editor**. Questa categoria contiene **26 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_email_editor`

**Editor e-mail online abilitato**

Se questa opzione è attivata, facendo clic su un indirizzo e-mail si aprirà un editor online.

### `allow_spellcheck`

**Controllo ortografico**

Abilita il controllo ortografico

### `block_copy_paste_for_students`

**Blocca copia e incolla per gli studenti**

Impedisce agli studenti di copiare e incollare nell'editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedisci copia-incolla di immagini nell'editor WYSIWYG**

Impedisce l'uso del copia-incolla di immagini come base64 nell'editor per evitare di riempire il database di immagini.

*Predefinito: `false`*


### `editor_driver_list`

**Elenco dei driver dei file WYSIWYG**

Array contenente i nomi dei driver per l'accesso ai file dall'editor WYSIWYG.

### `editor_settings`

**Impostazioni dell'editor WYSIWYG**

Array di configurazione generico per riconfigurare globalmente l'editor WYSIWYG.

### `enable_iframe_inclusion`

**Consenti iframe nell'editor HTML**

Consentire iframe arbitrari nell'editor HTML migliorerà le capacità di modifica degli utenti, ma può rappresentare un rischio per la sicurezza. Assicurarsi di potersi fidare degli utenti (ossia di sapere chi sono) prima di abilitare questa funzione.

### `enable_uploadimage_editor`

**Consenti trascinamento delle immagini nell'editor WYSIWYG**

Abilita il caricamento delle immagini come file quando si esegue un copia nel contenuto o un trascinamento.

*Predefinito: `false`*


### `enabled_asciisvg`

**Abilita AsciiSVG**

Abilita il plugin AsciiSVG nell'editor WYSIWYG per disegnare grafici a partire da funzioni matematiche.

### `enabled_googlemaps`

**Attiva Google maps**

Attiva il pulsante per inserire Google maps. L'attivazione non è pienamente realizzata se non è stato precedentemente modificato il file main/inc/lib/fckeditor/myconfig.php e aggiunta una chiave API di Google maps.

### `enabled_imgmap`

**Attiva Image maps**

Attiva il pulsante per inserire Image maps. Ciò consente di associare URL ad aree di un'immagine, creando hotspot.

### `enabled_insertHtml`

**Consenti l'inserimento di widget**

Consente di incorporare nelle pagine web i video e le applicazioni preferiti, come vimeo o slideshare, e ogni sorta di widget e gadget

### `enabled_mathjax`

**Abilita MathJax**

Abilita la libreria MathJax per visualizzare le formule matematiche. Aggiunge un pulsante formula alla barra degli strumenti dell'editor, in cui le formule sono scritte in LaTeX. Vedere [Formule matematiche](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Crea e modifica file SVG**

Questa opzione consente di creare e modificare online file SVG (Scalable Vector Graphics) multilayer, nonché di esportarli in immagini in formato png.

### `enabled_wiris`

**Editor matematico WIRIS**

Abilita l'editor matematico WIRIS. Installando questo plugin si ottengono WIRIS editor e WIRIS CAS.<br/>Questa attivazione non è pienamente realizzata a meno che non sia stato precedentemente scaricato il <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP per CKeditor WIRIS</a> e decompresso il suo contenuto nella directory di Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Ciò è necessario perché Wiris è software proprietario e i suoi servizi sono <a href='http://www.wiris.com/store/who-pays' target='_blank'>commerciali</a>. Per regolare il plugin, modificare il file configuration.ini o sostituirne il contenuto con il file configuration.ini.default fornito con Chamilo.

### `force_wiki_paste_as_plain_text`

**Forza l'incolla come testo semplice nel wiki**

Ciò impedirà a molti tag nascosti, non corretti o non standard, copiati da altri testi, di corrompere il testo del Wiki dopo molti problemi; tuttavia si perderanno alcune funzionalità durante la modifica.

### `full_editor_toolbar_set`

**Barra degli strumenti completa dell'editor WYSIWYG**

Mostra la barra degli strumenti completa in tutte le caselle dell'editor WYSIWYG della piattaforma.

*Predefinito: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier nel Wiki**

Abilita HTML purifier nello strumento wiki (aumenterà la sicurezza ma ridurrà le funzionalità di stile)

### `include_asciimathml_script`

**Carica la libreria Mathjax in tutte le pagine del sistema**

Attivare questa impostazione se si desidera mostrare formule matematiche basate su MathML e grafici matematici basati su ASCIIsvg non solo nello strumento «Documenti», ma anche altrove nel sistema.

### `math_asciimathML`

**Editor matematico ASCIIMathML**

Abilita l'editor matematico ASCIIMathML

### `more_buttons_maximized_mode`

**Barra dei pulsanti estesa**

Abilita le barre dei pulsanti estese quando l'editor WYSIWYG è massimizzato

*Default: `true`*

### `save_titles_as_html`

**Salva i titoli come HTML**

Consente agli utenti di includere HTML nei campi titolo in diversi punti. Ciò permette una certa formattazione dei titoli, in particolare nelle domande dei test. Consente inoltre a quei campi titolo specifici di utilizzare lo stesso tagging per lingua di `translate_html` di seguito, che i titoli in testo semplice non possono altrimenti contenere.

*Default: `false`*

### `translate_html`

**Supporto per contenuti HTML multilingue**

Se abilitata, questa opzione consente agli utenti di usare un attributo ‘lang’ negli elementi HTML per definire la lingua in cui è scritto il contenuto di quell'elemento. Abilitando più elementi con attributi ‘lang’ diversi, Chamilo visualizzerà il contenuto solo nella lingua dell'utente.

*Default: `false`*

Vedere [Contenuti multilingue](../../teacher-guide/adding-content/multi-language-content.md) nella Guida per i docenti per la procedura completa rivolta ai docenti relativa a questa funzionalità.


### `video_context_menu_hidden`

**Nascondi il menu contestuale sul lettore video**

Se abilitata, il menu contestuale del tasto destro sui lettori video HTML5 è disabilitato.

*Default: `false`*


### `video_player_renderers`

**Renderer del lettore video**

Abilita i renderer del lettore per i media YouTube, Vimeo, Facebook, DailyMotion, Twitch

### `youtube_for_students`

**Consenti agli studenti di inserire video da YouTube**

Abilita la possibilità che gli studenti possano inserire video Youtube