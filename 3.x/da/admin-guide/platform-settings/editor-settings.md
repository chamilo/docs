# Editorindstillinger

Konfiguration af den rige teksteditor (TinyMCE), der bruges på hele platformen — værktøjslinjer, plugins, AI-hjælpere i editoren.

Tilgå disse indstillinger under **Administration > Konfigurationsindstillinger > Editor**. Denne kategori indeholder **26 indstillinger**, som er listet nedenfor med den titel og kommentar, der leveres i platformens settings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du script’er via API’et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_email_editor`

**Online e-mail-editor aktiveret**

Hvis denne indstilling er aktiveret, åbnes en online-editor, når der klikkes på en e-mailadresse.

### `allow_spellcheck`

**Stavekontrol**

Aktivér stavekontrol

### `block_copy_paste_for_students`

**Blokér kopiering og indsættelse for kursister**

Blokér kursisters mulighed for at kopiere og indsætte i WYSIWYG-editoren

### `editor_block_image_copy_paste`

**Forhindr kopiering og indsættelse af billeder i WYSIWYG-editoren**

Forhindr brug af billeder kopieret og indsat som base64 i editoren for at undgå, at databasen fyldes med billeder.

*Standard: `false`*


### `editor_driver_list`

**Liste over WYSIWYG-fildrivere**

Array, der indeholder navnene på driverne til filadgang fra WYSIWYG-editoren.

### `editor_settings`

**Indstillinger for WYSIWYG-editor**

Generisk konfigurationsarray til at omkonfigurere WYSIWYG-editoren globalt.

### `enable_iframe_inclusion`

**Tillad iframes i HTML-editoren**

At tillade vilkårlige iframes i HTML-editoren vil udvide brugernes redigeringsmuligheder, men det kan udgøre en sikkerhedsrisiko. Sørg for, at du kan stole på dine brugere (dvs. at du ved, hvem de er), før du aktiverer denne funktion.

### `enable_uploadimage_editor`

**Tillad træk og slip af billeder i WYSIWYG-editoren**

Aktivér billedupload som fil, når der kopieres ind i indholdet eller trækkes og slippes.

*Standard: `false`*


### `enabled_asciisvg`

**Aktivér AsciiSVG**

Aktivér AsciiSVG-pluginnet i WYSIWYG-editoren til at tegne diagrammer ud fra matematiske funktioner.

### `enabled_googlemaps`

**Aktivér Google Maps**

Aktivér knappen til at indsætte Google Maps. Aktiveringen er ikke fuldt gennemført, medmindre filen main/inc/lib/fckeditor/myconfig.php tidligere er redigeret, og der er tilføjet en Google Maps API-nøgle.

### `enabled_imgmap`

**Aktivér Image maps**

Aktivér knappen til at indsætte Image maps. Dette giver dig mulighed for at knytte URL’er til områder på et billede og dermed oprette hotspots.

### `enabled_insertHtml`

**Tillad indsættelse af widgets**

Dette giver dig mulighed for at indlejre dine yndlingsvideoer og -applikationer, såsom vimeo eller slideshare, samt alle slags widgets og gadgets på dine websider

### `enabled_mathjax`

**Aktivér MathJax**

Aktivér MathJax-biblioteket til at visualisere matematiske formler. Dette tilføjer en formelknap til editorens værktøjslinje, hvor formler skrives i LaTeX. Se [Matematiske formler](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Opret og rediger SVG-filer**

Denne indstilling giver dig mulighed for at oprette og redigere SVG (Scalable Vector Graphics) i flere lag online samt eksportere dem til png-billeder.

### `enabled_wiris`

**WIRIS matematisk editor**

Aktivér WIRIS matematisk editor. Ved at installere dette plugin får du WIRIS editor og WIRIS CAS.<br/>Denne aktivering er ikke fuldt gennemført, medmindre <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-pluginnet til CKeditor WIRIS</a> tidligere er downloadet, og indholdet er udpakket i Chamilo-mappen main/inc/lib/javascript/ckeditor/plugins/.<br/>Dette er nødvendigt, fordi Wiris er proprietær software, og tjenesterne er <a href='http://www.wiris.com/store/who-pays' target='_blank'>kommercielle</a>. For at justere pluginnet skal du redigere filen configuration.ini eller erstatte dens indhold med filen configuration.ini.default, der følger med Chamilo.

### `force_wiki_paste_as_plain_text`

**Tving indsættelse som almindelig tekst i wikien**

Dette vil forhindre, at mange skjulte tags, forkerte eller ikke-standard tags, kopieret fra andre tekster, ødelægger wiki-teksten efter mange redigeringer; men nogle funktioner går tabt under redigering.

### `full_editor_toolbar_set`

**Fuld WYSIWYG-editorværktøjslinje**

Vis den fulde værktøjslinje i alle WYSIWYG-editorfelter rundt om på platformen.

*Standard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier i Wiki**

Aktivér HTML purifier i wiki-værktøjet (øger sikkerheden, men reducerer stilfunktioner)

### `include_asciimathml_script`

**Indlæs Mathjax-biblioteket på alle systemsider**

Aktivér denne indstilling, hvis du vil vise MathML-baserede matematiske formler og ASCIIsvg-baserede matematiske grafer ikke kun i værktøjet 'Dokumenter', men også andre steder i systemet.

### `math_asciimathML`

**ASCIIMathML matematisk editor**

Aktivér ASCIIMathML matematisk editor

### `more_buttons_maximized_mode`

**Udvidet knaplinje**

Aktivér udvidede knaplinjer, når WYSIWYG-editoren er maksimeret

*Standard: `true`*

### `save_titles_as_html`

**Gem titler som HTML**

Tillad brugere at inkludere HTML i titelfelter flere steder. Dette giver mulighed for en vis styling af titler, især i testspørgsmål. Det lader også disse specifikke titelfelter bruge den samme sprogbaserede mærkning som `translate_html` nedenfor, hvilket almindelige teksttitler ellers ikke kan rumme.

*Standard: `false`*

### `translate_html`

**Understøttelse af flersproget HTML-indhold**

Hvis denne indstilling er aktiveret, kan brugere anvende et ‘lang’-attribut i HTML-elementer til at definere det sprog, elementets indhold er skrevet på. Aktivér flere elementer med forskellige ‘lang’-attributter, og Chamilo vil kun vise indholdet på brugerens sprog.

*Standard: `false`*

Se [Flersproget indhold](../../teacher-guide/adding-content/multi-language-content.md) i lærerhåndbogen for den fulde gennemgang af denne funktion rettet mod undervisere.


### `video_context_menu_hidden`

**Skjul kontekstmenuen på videoafspilleren**

Når indstillingen er aktiveret, deaktiveres højreklik-kontekstmenuen på HTML5-videoafspillere.

*Standard: `false`*


### `video_player_renderers`

**Videoafspiller-renderere**

Aktivér afspiller-renderere til YouTube-, Vimeo-, Facebook-, DailyMotion- og Twitch-medier

### `youtube_for_students`

**Tillad kursister at indsætte videoer fra YouTube**

Aktivér muligheden for, at kursister kan indsætte Youtube-videoer