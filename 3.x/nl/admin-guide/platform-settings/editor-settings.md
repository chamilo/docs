# Editorinstellingen

Configuratie van de rich-texteditor (TinyMCE) die op het platform wordt gebruikt — werkbalken, plug-ins, AI-hulpmiddelen in de editor.

Open deze instellingen via **Beheer > Configuratie-instellingen > Editor**. Deze categorie bevat **29 instellingen**, hieronder vermeld met de titel en het commentaar zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_email_editor`

**Online e-maileditor ingeschakeld**

Als deze optie is geactiveerd, opent een klik op een e-mailadres een online editor.

### `allow_spellcheck`

**Spellingcontrole**

Spellingcontrole inschakelen

### `block_copy_paste_for_students`

**Kopiëren en plakken voor cursisten blokkeren**

Cursisten de mogelijkheid ontnemen om te kopiëren en te plakken in de WYSIWYG-editor

### `editor_block_image_copy_paste`

**Kopiëren en plakken van afbeeldingen in de WYSIWYG-editor voorkomen**

Voorkom het gebruik van kopiëren en plakken van afbeeldingen als base64 in de editor, om te vermijden dat de database met afbeeldingen wordt gevuld.

*Standaard: `false`*


### `editor_driver_list`

**Lijst van WYSIWYG-bestandsdrivers**

Array met de namen van de drivers voor bestandstoegang vanuit de WYSIWYG-editor.

### `editor_settings`

**Instellingen van de WYSIWYG-editor**

Generieke configuratie-array om de WYSIWYG-editor globaal opnieuw te configureren.

### `enable_iframe_inclusion`

**Iframes toestaan in de HTML-editor**

Het toestaan van willekeurige iframes in de HTML-editor vergroot de bewerkingsmogelijkheden van gebruikers, maar kan een beveiligingsrisico vormen. Zorg ervoor dat u op uw gebruikers kunt vertrouwen (dat wil zeggen: u weet wie zij zijn) voordat u deze functie inschakelt.

### `enable_uploadimage_editor`

**Slepen en neerzetten van afbeeldingen in de WYSIWYG-editor toestaan**

Afbeeldingsupload als bestand inschakelen bij kopiëren in de inhoud of bij slepen en neerzetten.

*Standaard: `false`*


### `enabled_asciisvg`

**AsciiSVG inschakelen**

Schakel de AsciiSVG-plug-in in de WYSIWYG-editor in om grafieken te tekenen op basis van wiskundige functies.

### `enabled_googlemaps`

**Google Maps activeren**

Activeer de knop om Google Maps in te voegen. De activering is niet volledig als het bestand main/inc/lib/fckeditor/myconfig.php niet vooraf is bewerkt en er geen Google Maps API-sleutel is toegevoegd.

### `enabled_imgmap`

**Afbeeldingskaarten activeren**

Activeer de knop om afbeeldingskaarten in te voegen. Hiermee kunt u URL's koppelen aan gebieden van een afbeelding en zo hotspots maken.

### `enabled_insertHtml`

**Invoegen van widgets toestaan**

Hiermee kunt u op uw webpagina's uw favoriete video's en toepassingen insluiten, zoals vimeo of slideshare, en allerlei widgets en gadgets

### `enabled_mathjax`

**MathJax inschakelen**

Schakel de MathJax-bibliotheek in om wiskundige formules weer te geven. Dit voegt een formuleknop toe aan de werkbalk van de editor, waarin formules in LaTeX worden geschreven. Zie [Wiskundige formules](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**SVG-bestanden maken en bewerken**

Met deze optie kunt u online SVG-bestanden (Scalable Vector Graphics) met meerdere lagen maken en bewerken, en deze exporteren naar afbeeldingen in png-formaat.

### `enabled_wiris`

**WIRIS-wiskunde-editor**

Schakel de WIRIS-wiskunde-editor in. Door deze plug-in te installeren krijgt u de WIRIS-editor en WIRIS CAS.<br/>Deze activering is niet volledig tenzij de <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-plug-in voor CKeditor WIRIS</a> vooraf is gedownload en de inhoud ervan is uitgepakt in de Chamilo-map main/inc/lib/javascript/ckeditor/plugins/.<br/>Dit is nodig omdat Wiris propriëtaire software is en de diensten ervan <a href='http://www.wiris.com/store/who-pays' target='_blank'>commercieel</a> zijn. Om de plug-in aan te passen, bewerkt u het bestand configuration.ini of vervangt u de inhoud ervan door het bestand configuration.ini.default dat met Chamilo wordt meegeleverd.

### `etherpad_api_key`

**Etherpad API-sleutel**

API-referentie aan de serverzijde die wordt gebruikt om de pad- en editorsessies aan te maken. Behandel deze als een geheim; deel deze niet in tickets of documentatiescreenshots.

*Standaard: leeg*

### `etherpad_enabled`

**Etherpad inschakelen voor Wiki-bewerking**

Indien ingeschakeld en correct geconfigureerd, laadt het bewerkingsformulier van een bestaande Wiki-pagina de collaboratieve Etherpad-editor. Opslaan maakt een normale Wiki-revisie op basis van de huidige inhoud.

*Standaard: `false`*

### `etherpad_url`

**Etherpad-URL**

Basis-URL van de Etherpad-server die wordt gebruikt om de gedeelde Wiki-editor te openen. Voor beveiligde ingesloten sessies moet Etherpad beschikbaar zijn op **dezelfde origin als Chamilo**, bijvoorbeeld achter een reverse proxy op `https://campus.example.org/etherpad`. Sluit geen niet-gerelateerde cross-origin-server in.

*Standaard: leeg*

### `force_wiki_paste_as_plain_text`

**Plakken als platte tekst in de wiki afdwingen**

Dit voorkomt dat veel verborgen, onjuiste of niet-standaard tags die uit andere teksten zijn gekopieerd, de tekst van de wiki na veel problemen beschadigen; maar hierdoor gaan sommige functies tijdens het bewerken verloren.

### `full_editor_toolbar_set`

**Volledige werkbalk van de WYSIWYG-editor**

Toon de volledige werkbalk in alle WYSIWYG-editorvakken op het platform.

*Standaard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier in de wiki**

Schakel HTML-zuivering in de wiki-tool in (verhoogt de beveiliging, maar vermindert opmaakfuncties)

### `include_asciimathml_script`

**De Mathjax-bibliotheek op alle systeempagina's laden**

Activeer deze instelling als u op MathML gebaseerde wiskundige formules en op ASCIIsvg gebaseerde wiskundige grafieken niet alleen in de tool ‘Documenten’, maar ook elders in het systeem wilt weergeven.

### `math_asciimathML`

**Wiskundige editor ASCIIMathML**

Schakel de wiskundige editor ASCIIMathML in

### `more_buttons_maximized_mode`

**Uitgebreide knoppenbalk**

Schakel uitgebreide knoppenbalken in wanneer de WYSIWYG-editor is gemaximaliseerd

*Standaard: `true`*

### `save_titles_as_html`

**Titels opslaan als HTML**

Sta gebruikers toe HTML op te nemen in titelvelden op verschillende plaatsen. Dit maakt enige opmaak van titels mogelijk, met name bij toetsvragen. Het stelt die specifieke titelvelden ook in staat dezelfde tagging per taal te gebruiken als `translate_html` hieronder, wat titels in platte tekst anders niet kunnen bevatten.

*Standaard: `false`*

### `translate_html`

**Ondersteuning voor meertalige HTML-inhoud**

Indien ingeschakeld, stelt deze optie gebruikers in staat een ‘lang’-attribuut in HTML-elementen te gebruiken om de taal te definiëren waarin de inhoud van dat element is geschreven. Schakel meerdere elementen met verschillende ‘lang’-attributen in en Chamilo toont alleen de inhoud in de taal van de gebruiker.

*Standaard: `false`*

Zie [Meertalige inhoud](../../teacher-guide/adding-content/multi-language-content.md) in de Docentenhandleiding voor de volledige uitleg van deze functie voor docenten.


### `video_context_menu_hidden`

**Het contextmenu van de videospeler verbergen**

Indien ingeschakeld, wordt het contextmenu bij rechtsklikken op HTML5-videospelers uitgeschakeld.

*Standaard: `false`*


### `video_player_renderers`

**Renderers voor videospelers**

Schakel speler-renderers in voor media van YouTube, Vimeo, Facebook, DailyMotion en Twitch

### `youtube_for_students`

**Cursisten toestaan video's van YouTube in te voegen**

Schakel de mogelijkheid in dat cursisten YouTube-video's kunnen invoegen