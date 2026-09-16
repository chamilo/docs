# Editorinstellingen

Configuratie van de rich-text editor (TinyMCE) die over het hele platform wordt gebruikt — werkbalken, plugins, AI-hulpmiddelen in de editor.

Toegang tot deze instellingen via **Beheer > Configuratie-instellingen > Editor**. Deze categorie bevat **26 instellingen**, hieronder opgesomd met de titel en opmerking zoals meegeleverd in de instellingenfixtures van het platform (`SettingsCurrentFixtures.php`).

> De variabelenaam in de code wordt in monospace weergegeven. Gebruik deze bij het scripten via de API of wanneer u deze instellingen op globaal niveau wilt wijzigen door [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) te bewerken.

## Instellingen

### `allow_email_editor`

**Online e-mail editor ingeschakeld**

Als deze optie is geactiveerd, opent het klikken op een e-mailadres een online editor.

### `allow_spellcheck`

**Spellingscontrole**

Spellingscontrole inschakelen

### `block_copy_paste_for_students`

**Kopiëren en plakken blokkeren voor leerlingen**

Blokkeer de mogelijkheid voor leerlingen om te kopiëren en plakken in de WYSIWYG-editor

### `editor_block_image_copy_paste`

**Kopiëren en plakken van afbeeldingen in WYSIWYG-editor voorkomen**

Voorkom het gebruik van kopiëren en plakken van afbeeldingen als base64 in de editor om te voorkomen dat de database volloopt met afbeeldingen.

*Standaard: `false`*

### `editor_driver_list`

**Lijst van WYSIWYG-bestandsdrivers**

Array met de namen van de drivers voor bestands toegang vanuit de WYSIWYG-editor.

### `editor_settings`

**WYSIWYG-editorinstellingen**

Generieke configuratie-array om de WYSIWYG-editor globaal opnieuw te configureren.

### `enable_iframe_inclusion`

**Iframes toestaan in HTML-editor**

Het toestaan van willekeurige iframes in de HTML-editor zal de bewerkingsmogelijkheden van gebruikers vergroten, maar kan een beveiligingsrisico vormen. Zorg ervoor dat u uw gebruikers kunt vertrouwen (d.w.z. u weet wie ze zijn) voordat u deze functie inschakelt.

### `enable_uploadimage_editor`

**Afbeeldingen slepen en neerzetten in WYSIWYG-editor toestaan**

Schakel het uploaden van afbeeldingen als bestand in bij het kopiëren van inhoud of bij slepen en neerzetten.

*Standaard: `false`*

### `enabled_asciisvg`

**AsciiSVG inschakelen**

Schakel de AsciiSVG-plugin in de WYSIWYG-editor in om grafieken te tekenen vanuit wiskundige functies.

### `enabled_googlemaps`

**Google Maps activeren**

Activeer de knop om Google Maps in te voegen. Activering is niet volledig gerealiseerd als niet eerder het bestand main/inc/lib/fckeditor/myconfig.php is bewerkt en een Google Maps API-sleutel is toegevoegd.

### `enabled_imgmap`

**Afbeeldingskaarten activeren**

Activeer de knop om afbeeldingskaarten in te voegen. Hiermee kunt u URL's koppelen aan gebieden van een afbeelding, waardoor hotspots worden gecreëerd.

### `enabled_insertHtml`

**Invoegen van widgets toestaan**

Hiermee kunt u uw favoriete video's en toepassingen zoals Vimeo of Slideshare en allerlei widgets en gadgets insluiten op uw webpagina's.

### `enabled_mathjax`

**MathJax inschakelen**

Schakel de MathJax-bibliotheek in om wiskundige formules te visualiseren. Dit is alleen nuttig als de instellingen voor ASCIIMathML of ASCIISVG zijn ingeschakeld.

### `enabled_support_svg`

**SVG-bestanden maken en bewerken**

Met deze optie kunt u SVG (Scalable Vector Graphics) multilayer online maken en bewerken, en deze exporteren naar afbeeldingen in PNG-formaat.

### `enabled_wiris`

**WIRIS wiskundige editor**

Schakel de WIRIS wiskundige editor in. Door deze plugin te installeren krijgt u toegang tot de WIRIS-editor en WIRIS CAS.<br/>Deze activering is niet volledig gerealiseerd tenzij eerder de <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-plugin voor CKeditor WIRIS</a> is gedownload en de inhoud ervan is uitgepakt in de map main/inc/lib/javascript/ckeditor/plugins/ van Chamilo.<br/>Dit is noodzakelijk omdat Wiris propriëtaire software is en de diensten ervan <a href='http://www.wiris.com/store/who-pays' target='_blank'>commercieel</a> zijn. Om aanpassingen aan de plugin te maken, bewerk het bestand configuration.ini of vervang de inhoud ervan door het bestand configuration.ini.default dat met Chamilo wordt meegeleverd.

### `force_wiki_paste_as_plain_text`

**Plakken als platte tekst in de wiki forceren**

Dit voorkomt dat veel verborgen tags, incorrecte of niet-standaard tags, gekopieerd uit andere teksten, de tekst van de Wiki na vele problemen corrumperen; maar sommige functies gaan verloren tijdens het bewerken.

### `full_editor_toolbar_set`

**Volledige WYSIWYG-editor werkbalk**

Toon de volledige werkbalk in alle WYSIWYG-editorvakken op het platform.

*Standaard: `false`*

### `htmlpurifier_wiki`

**HTMLPurifier in Wiki**

Schakel HTMLPurifier in de wiki-tool in (verhoogt de beveiliging maar vermindert stijlopties)

### `include_asciimathml_script`

**MathJax-bibliotheek laden op alle systeempagina's**

Activeer deze instelling als u wiskundige formules gebaseerd op MathML en wiskundige grafieken gebaseerd op ASCIIsvg niet alleen in de tool 'Documenten' wilt tonen, maar ook elders in het systeem.

### `math_asciimathML`

**ASCIIMathML wiskundige editor**

Schakel de ASCIIMathML wiskundige editor in

### `more_buttons_maximized_mode`

**Uitgebreide knoppenbalk**

Schakel uitgebreide knoppenbalken in wanneer de WYSIWYG-editor is gemaximaliseerd

*Standaard: `true`*

---
### `save_titles_as_html`

**Titels opslaan als HTML**

Sta gebruikers toe om HTML op te nemen in titelvelden op verschillende plaatsen. Dit maakt enige opmaak van titels mogelijk, met name bij testvragen.

*Standaard: `false`*

### `translate_html`

**Ondersteuning voor meertalige HTML-inhoud**

Indien ingeschakeld, stelt deze optie gebruikers in staat om een ‘lang’-attribuut te gebruiken in HTML-elementen om de taal van de inhoud van dat element te definiëren. Schakel meerdere elementen in met verschillende ‘lang’-attributen en Chamilo zal de inhoud alleen weergeven in de taal van de gebruiker.

*Standaard: `false`*

### `video_context_menu_hidden`

**Contextmenu op videospeler verbergen**

Wanneer ingeschakeld, wordt het contextmenu bij rechtsklikken op HTML5-videospelers uitgeschakeld.

*Standaard: `false`*

### `video_player_renderers`

**Videospeler-renderers**

Schakel speler-renderers in voor YouTube, Vimeo, Facebook, DailyMotion en Twitch media.

### `youtube_for_students`

**Leerlingen toestaan om video's van YouTube in te voegen**

Schakel de mogelijkheid in dat leerlingen YouTube-video's kunnen invoegen.