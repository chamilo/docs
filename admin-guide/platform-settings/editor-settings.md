# Impostazioni dell'Editor

Configurazione dell'editor di testo ricco (TinyMCE) utilizzato in tutta la piattaforma — barre degli strumenti, plugin, assistenti AI nell'editor.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Editor**. Questa categoria contiene **26 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_email_editor`

**Editor di posta elettronica online abilitato**

Se questa opzione è attivata, cliccando su un indirizzo e-mail si aprirà un editor online.

### `allow_spellcheck`

**Controllo ortografico**

Abilita il controllo ortografico

### `block_copy_paste_for_students`

**Blocca copia e incolla per gli studenti**

Impedisci agli studenti di copiare e incollare nell'editor WYSIWYG

### `editor_block_image_copy_paste`

**Impedisci il copia-incolla di immagini nell'editor WYSIWYG**

Impedisci l'uso del copia-incolla di immagini come base64 nell'editor per evitare di riempire il database con immagini.

*Default: `false`*

### `editor_driver_list`

**Elenco dei driver di file WYSIWYG**

Array contenente i nomi dei driver per l'accesso ai file dall'editor WYSIWYG.

### `editor_settings`

**Impostazioni dell'editor WYSIWYG**

Array di configurazione generico per riconfigurare globalmente l'editor WYSIWYG.

### `enable_iframe_inclusion`

**Consenti iframe nell'Editor HTML**

Consentire iframe arbitrari nell'Editor HTML migliorerà le capacità di modifica degli utenti, ma può rappresentare un rischio per la sicurezza. Assicurati di poterti fidare dei tuoi utenti (cioè di sapere chi sono) prima di abilitare questa funzionalità.

### `enable_uploadimage_editor`

**Consenti il drag&drop di immagini nell'editor WYSIWYG**

Abilita il caricamento di immagini come file quando si effettua una copia nel contenuto o un drag and drop.

*Default: `false`*

### `enabled_asciisvg`

**Abilita AsciiSVG**

Abilita il plugin AsciiSVG nell'editor WYSIWYG per disegnare grafici da funzioni matematiche.

### `enabled_googlemaps`

**Attiva Google Maps**

Attiva il pulsante per inserire Google Maps. L'attivazione non è completamente realizzata se non è stato precedentemente modificato il file main/inc/lib/fckeditor/myconfig.php e aggiunta una chiave API di Google Maps.

### `enabled_imgmap`

**Attiva mappe immagine**

Attiva il pulsante per inserire mappe immagine. Questo consente di associare URL ad aree di un'immagine, creando hotspot.

### `enabled_insertHtml`

**Consenti l'inserimento di widget**

Questo ti permette di incorporare nelle tue pagine web i tuoi video e applicazioni preferiti come Vimeo o SlideShare e ogni tipo di widget e gadget.

### `enabled_mathjax`

**Abilita MathJax**

Abilita la libreria MathJax per visualizzare formule matematiche. Questo è utile solo se sono abilitate le impostazioni ASCIIMathML o ASCIISVG.

### `enabled_support_svg`

**Crea e modifica file SVG**

Questa opzione ti consente di creare e modificare file SVG (Scalable Vector Graphics) multilayer online, nonché di esportarli in immagini in formato PNG.

### `enabled_wiris`

**Editor matematico WIRIS**

Abilita l'editor matematico WIRIS. Installando questo plugin ottieni l'editor WIRIS e WIRIS CAS.<br/>Questa attivazione non è completamente realizzata a meno che non sia stato precedentemente scaricato il <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>plugin PHP per CKeditor WIRIS</a> e decompresso il suo contenuto nella directory di Chamilo main/inc/lib/javascript/ckeditor/plugins/.<br/>Questo è necessario perché Wiris è un software proprietario e i suoi servizi sono <a href='http://www.wiris.com/store/who-pays' target='_blank'>commerciali</a>. Per apportare modifiche al plugin, modifica il file configuration.ini o sostituisci il suo contenuto con il file configuration.ini.default fornito con Chamilo.

### `force_wiki_paste_as_plain_text`

**Forza l'incolla come testo semplice nel wiki**

Questo impedirà a molti tag nascosti, errati o non standard, copiati da altri testi, di corrompere il testo del Wiki dopo numerosi problemi; ma perderà alcune funzionalità durante la modifica.

### `full_editor_toolbar_set`

**Barra degli strumenti completa dell'editor WYSIWYG**

Mostra la barra degli strumenti completa in tutte le caselle dell'editor WYSIWYG sulla piattaforma.

*Default: `false`*

### `htmlpurifier_wiki`

**HTMLPurifier nel Wiki**

Abilita HTML Purifier nello strumento wiki (aumenterà la sicurezza ma ridurrà le funzionalità di stile)

### `include_asciimathml_script`

**Carica la libreria MathJax in tutte le pagine del sistema**

Attiva questa impostazione se desideri mostrare formule matematiche basate su MathML e grafici matematici basati su ASCIIsvg non solo nello strumento 'Documenti', ma anche altrove nel sistema.

### `math_asciimathML`

**Editor matematico ASCIIMathML**

Abilita l'editor matematico ASCIIMathML

### `more_buttons_maximized_mode`

**Barra dei pulsanti estesa**

Abilita le barre dei pulsanti estese quando l'editor WYSIWYG è massimizzato

*Default: `true`*

---
### `save_titles_as_html`

**Salva i titoli come HTML**

Consente agli utenti di includere HTML nei campi dei titoli in diversi punti. Questo permette di applicare uno stile ai titoli, in particolare nelle domande dei test.

*Default: `false`*

### `translate_html`

**Supporto per contenuti HTML multilingue**

Se abilitata, questa opzione consente agli utenti di utilizzare un attributo 'lang' negli elementi HTML per definire la lingua in cui è scritto il contenuto di quell'elemento. Abilita più elementi con diversi attributi 'lang' e Chamilo mostrerà il contenuto solo nella lingua dell'utente.

*Default: `false`*

### `video_context_menu_hidden`

**Nascondi il menu contestuale nel lettore video**

Quando abilitata, il menu contestuale accessibile con il clic destro sui lettori video HTML5 viene disabilitato.

*Default: `false`*

### `video_player_renderers`

**Renderer per lettori video**

Abilita i renderer dei lettori per i media di YouTube, Vimeo, Facebook, DailyMotion, Twitch

### `youtube_for_students`

**Consenti agli studenti di inserire video da YouTube**

Abilita la possibilità per gli studenti di inserire video di YouTube