# Editorinstellingen

Configuratie van de rich-text-editor (TinyMCE) die platformbreed wordt gebruikt — werkbalken, plugins, AI-helpers in de editor.

Deze instellingen vindt u onder **Beheer > Configuratie-instellingen > Editor**. Deze categorie bevat **26 instellingen**, hieronder weergegeven met de titel en toelichting zoals meegeleverd in de settings-fixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij scripting via de API of wanneer u deze instellingen globaal wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_email_editor`

**Online e-maileditor ingeschakeld**

Als deze optie is geactiveerd, opent een klik op een e-mailadres een online editor.

### `allow_spellcheck`

**Spellingscontrole**

Spellingscontrole inschakelen

### `block_copy_paste_for_students`

**Kopiëren en plakken voor cursisten blokkeren**

Blokkeer voor cursisten de mogelijkheid om te kopiëren en te plakken in de WYSIWYG-editor

### `editor_block_image_copy_paste`

**Kopiëren-plakken van afbeeldingen in de WYSIWYG-editor voorkomen**

Voorkom het gebruik van kopiëren-plakken van afbeeldingen als base64 in de editor om te vermijden dat de database volloopt met afbeeldingen.

*Standaard: `false`*


### `editor_driver_list`

**Lijst van WYSIWYG-bestandsdrivers**

Array met de namen van de drivers voor bestandstoegang vanuit de WYSIWYG-editor.

### `editor_settings`

**Instellingen van de WYSIWYG-editor**

Generieke configuratie-array om de WYSIWYG-editor globaal te herconfigureren.

### `enable_iframe_inclusion`

**Iframes in de HTML-editor toestaan**

Het toestaan van willekeurige iframes in de HTML-editor vergroot de bewerkingsmogelijkheden van gebruikers, maar kan een beveiligingsrisico vormen. Zorg ervoor dat u op uw gebruikers kunt vertrouwen (d.w.z. dat u weet wie ze zijn) voordat u deze functie inschakelt.

### `enable_uploadimage_editor`

**Slepen en neerzetten van afbeeldingen in de WYSIWYG-editor toestaan**

Schakel het uploaden van afbeeldingen als bestand in bij kopiëren in de inhoud of bij slepen en neerzetten.

*Standaard: `false`*


### `enabled_asciisvg`

**AsciiSVG inschakelen**

Schakel de AsciiSVG-plugin in de WYSIWYG-editor in om grafieken te tekenen op basis van wiskundige functies.

### `enabled_googlemaps`

**Google Maps activeren**

Activeer de knop om Google Maps in te voegen. Activering is niet volledig als u niet eerder het bestand main/inc/lib/fckeditor/myconfig.php hebt bewerkt en een Google Maps API-sleutel hebt toegevoegd.

### `enabled_imgmap`

**Image maps activeren**

Activeer de knop om image maps in te voegen. Hiermee kunt u URL's koppelen aan gebieden van een afbeelding en zo hotspots maken.

### `enabled_insertHtml`

**Invoegen van widgets toestaan**

Hiermee kunt u op uw webpagina's uw favoriete video's en toepassingen insluiten, zoals Vimeo of SlideShare, en allerlei widgets en gadgets

### `enabled_mathjax`

**MathJax inschakelen**

Schakel de MathJax-bibliotheek in om wiskundige formules weer te geven. Dit voegt een formuleknop toe aan de werkbalk van de editor, waarbij formules in LaTeX worden geschreven. Zie [Wiskundige formules](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**SVG-bestanden maken en bewerken**

Met deze optie kunt u SVG-bestanden (Scalable Vector Graphics) online in meerdere lagen maken en bewerken, en ze exporteren naar png-afbeeldingen.

### `enabled_wiris`

**WIRIS wiskundige editor**

Schakel de WIRIS wiskundige editor in. Door deze plugin te installeren krijgt u de WIRIS-editor en WIRIS CAS.<br/>Deze activering is niet volledig tenzij u eerder de <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-plugin voor CKeditor WIRIS</a> hebt gedownload en de inhoud ervan hebt uitgepakt in de Chamilo-map main/inc/lib/javascript/ckeditor/plugins/.<br/>Dit is nodig omdat Wiris propriëtaire software is en de diensten <a href='http://www.wiris.com/store/who-pays' target='_blank'>commercieel</a> zijn. Om de plugin aan te passen, bewerkt u het bestand configuration.ini of vervangt u de inhoud door het bestand configuration.ini.default dat bij Chamilo wordt geleverd.

### `force_wiki_paste_as_plain_text`

**Plakken als platte tekst in de wiki forceren**

Dit voorkomt dat veel verborgen tags, onjuiste of niet-standaard tags, gekopieerd uit andere teksten, de wiki-tekst na veel bewerkingen beschadigen; sommige functies tijdens het bewerken gaan echter verloren.

### `full_editor_toolbar_set`

**Volledige werkbalk van de WYSIWYG-editor**

Toon de volledige werkbalk in alle WYSIWYG-editorvakken op het platform.

*Standaard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier in de wiki**

HTML Purifier inschakelen in de wiki-tool (verhoogt de beveiliging maar vermindert stijlfuncties)

### `include_asciimathml_script`

**De Mathjax-bibliotheek op alle systeempagina's laden**

Activeer deze instelling als u wiskundige formules op basis van MathML en wiskundige grafieken op basis van ASCIIsvg niet alleen in de tool 'Documenten' wilt weergeven, maar ook elders in het systeem.

### `math_asciimathML`

**ASCIIMathML wiskundige editor**

ASCIIMathML wiskundige editor inschakelen

### `more_buttons_maximized_mode`

**Uitgebreide knoppenbalk**

Schakel uitgebreide knoppenbalken in wanneer de WYSIWYG-editor is gemaximaliseerd

*Standaard: `true`*

### `save_titles_as_html`

**Titels opslaan als HTML**

Sta gebruikers toe HTML op te nemen in titelvelden op verschillende plaatsen. Dit maakt enige opmaak van titels mogelijk, met name in toetsvragen. Het laat die specifieke titelvelden ook dezelfde taalgebonden tagging gebruiken als `translate_html` hieronder, wat gewone-teksttitels anders niet kunnen bevatten.

*Standaard: `false`*

### `translate_html`

**Ondersteuning voor meertalige HTML-inhoud**

Indien ingeschakeld, stelt deze optie gebruikers in staat een ‘lang’-attribuut in HTML-elementen te gebruiken om de taal te definiëren waarin de inhoud van dat element is geschreven. Schakel meerdere elementen in met verschillende ‘lang’-attributen en Chamilo toont de inhoud alleen in de taal van de gebruiker.

*Standaard: `false`*

Zie [Meertalige inhoud](../../teacher-guide/adding-content/multi-language-content.md) in de Teacher Guide voor de volledige, op docenten gerichte handleiding van deze functie.


### `video_context_menu_hidden`

**Contextmenu van de videospeler verbergen**

Indien ingeschakeld, is het contextmenu met de rechtermuisknop op HTML5-videospelers uitgeschakeld.

*Standaard: `false`*


### `video_player_renderers`

**Renderers van de videospeler**

Schakel spelerrenderers in voor media van YouTube, Vimeo, Facebook, DailyMotion, Twitch

### `youtube_for_students`

**Leerlingen toestaan video’s van YouTube in te voegen**

Schakel de mogelijkheid in dat leerlingen YouTube-video’s kunnen invoegen