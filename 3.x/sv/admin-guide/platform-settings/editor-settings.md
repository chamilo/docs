# Redigerarinställningar

Konfiguration av den rika textredigeraren (TinyMCE) som används i hela plattformen — verktygsfält, insticksprogram, AI-hjälpare i redigeraren.

Åtkomst till dessa inställningar sker under **Administration > Konfigurationsinställningar > Redigerare**. Denna kategori innehåller **26 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:t eller när du behöver ändra inställningarna på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_email_editor`

**Online-e-postredigerare aktiverad**

Om detta alternativ är aktiverat öppnas en online-redigerare när man klickar på en e-postadress.

### `allow_spellcheck`

**Stavningskontroll**

Aktivera stavningskontroll

### `block_copy_paste_for_students`

**Blockera kopiera och klistra in för deltagare**

Blockera deltagarnas möjlighet att kopiera och klistra in i WYSIWYG-redigeraren

### `editor_block_image_copy_paste`

**Förhindra kopiera-klistra in av bilder i WYSIWYG-redigeraren**

Förhindra användning av kopiera-klistra in av bilder som base64 i redigeraren för att undvika att databasen fylls med bilder.

*Standard: `false`*


### `editor_driver_list`

**Lista över WYSIWYG-fildrivrutiner**

Array som innehåller namnen på drivrutinerna för filåtkomst från WYSIWYG-redigeraren.

### `editor_settings`

**Inställningar för WYSIWYG-redigeraren**

Generisk konfigurationsarray för att omkonfigurera WYSIWYG-redigeraren globalt.

### `enable_iframe_inclusion`

**Tillåt iframes i HTML-redigeraren**

Att tillåta godtyckliga iframes i HTML-redigeraren förbättrar användarnas redigeringsmöjligheter, men det kan utgöra en säkerhetsrisk. Se till att du kan lita på dina användare (dvs. att du vet vilka de är) innan du aktiverar den här funktionen.

### `enable_uploadimage_editor`

**Tillåt dra och släpp av bilder i WYSIWYG-redigeraren**

Aktivera bilduppladdning som fil vid kopiering i innehållet eller vid dra och släpp.

*Standard: `false`*


### `enabled_asciisvg`

**Aktivera AsciiSVG**

Aktivera AsciiSVG-insticksprogrammet i WYSIWYG-redigeraren för att rita diagram från matematiska funktioner.

### `enabled_googlemaps`

**Aktivera Google maps**

Aktivera knappen för att infoga Google maps. Aktiveringen är inte fullt genomförd om inte filen main/inc/lib/fckeditor/myconfig.php tidigare har redigerats och en Google maps API-nyckel har lagts till.

### `enabled_imgmap`

**Aktivera Image maps**

Aktivera knappen för att infoga Image maps. Detta gör det möjligt att koppla URL:er till områden i en bild och skapa hotspots.

### `enabled_insertHtml`

**Tillåt infogning av widgets**

Detta gör det möjligt att bädda in dina favoritvideor och program, såsom vimeo eller slideshare, samt all slags widgets och gadgets på dina webbsidor

### `enabled_mathjax`

**Aktivera MathJax**

Aktivera MathJax-biblioteket för att visualisera matematiska formler. Detta lägger till en formelknapp i redigerarens verktygsfält, där formler skrivs i LaTeX. Se [Matematiska formler](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Skapa och redigera SVG-filer**

Detta alternativ gör det möjligt att skapa och redigera SVG (Scalable Vector Graphics) i flera lager online, samt exportera dem till png-formatbilder.

### `enabled_wiris`

**WIRIS matematisk redigerare**

Aktivera WIRIS matematiska redigerare. Genom att installera detta insticksprogram får du WIRIS editor och WIRIS CAS.<br/>Denna aktivering är inte fullt genomförd om inte <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-insticksprogrammet för CKeditor WIRIS</a> tidigare har laddats ned och dess innehåll packats upp i Chamilo-katalogen main/inc/lib/javascript/ckeditor/plugins/.<br/>Detta är nödvändigt eftersom Wiris är proprietär programvara och dess tjänster är <a href='http://www.wiris.com/store/who-pays' target='_blank'>kommersiella</a>. För att justera insticksprogrammet, redigera filen configuration.ini eller ersätt dess innehåll med filen configuration.ini.default som medföljer Chamilo.

### `force_wiki_paste_as_plain_text`

**Tvinga inklistring som oformaterad text i wikin**

Detta förhindrar att många dolda taggar, felaktiga eller icke-standardiserade, kopierade från andra texter, fortsätter att förstöra wikins text efter många problem; men vissa funktioner går förlorade vid redigering.

### `full_editor_toolbar_set`

**Fullständigt verktygsfält för WYSIWYG-redigeraren**

Visa det fullständiga verktygsfältet i alla WYSIWYG-redigerarrutor runt om i plattformen.

*Standard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier i Wiki**

Aktivera HTML purifier i wiki-verktyget (ökar säkerheten men minskar stilfunktionerna)

### `include_asciimathml_script`

**Ladda Mathjax-biblioteket på alla systemsidor**

Aktivera den här inställningen om du vill visa MathML-baserade matematiska formler och ASCIIsvg-baserad matematisk grafik inte bara i verktyget ”Dokument”, utan även på andra ställen i systemet.

### `math_asciimathML`

**ASCIIMathML matematisk redigerare**

Aktivera ASCIIMathML matematiska redigerare

### `more_buttons_maximized_mode`

**Utökad knapprad**

Aktivera utökade knapprader när WYSIWYG-redigeraren är maximerad

*Standard: `true`*

### `save_titles_as_html`

**Spara titlar som HTML**

Tillåt användare att inkludera HTML i titelfält på flera ställen. Detta möjliggör viss formatering av titlar, särskilt i testfrågor. Det gör också att dessa specifika titelfält kan använda samma språktaggning per språk som `translate_html` nedan, vilket vanliga texttitlar annars inte kan innehålla.

*Standard: `false`*

### `translate_html`

**Stöd för flerspråkigt HTML-innehåll**

Om detta är aktiverat kan användare använda ett ’lang’-attribut i HTML-element för att ange vilket språk innehållet i det elementet är skrivet på. Aktivera flera element med olika ’lang’-attribut så visar Chamilo endast innehållet på användarens språk.

*Standard: `false`*

Se [Flerspråkigt innehåll](../../teacher-guide/adding-content/multi-language-content.md) i lärarguiden för den fullständiga genomgången av den här funktionen ur lärarens perspektiv.


### `video_context_menu_hidden`

**Dölj snabbmenyn på videospelaren**

När detta är aktiverat inaktiveras högerklicksmenyn på HTML5-videospelare.

*Standard: `false`*


### `video_player_renderers`

**Renderare för videospelare**

Aktivera spelarrenderare för media från YouTube, Vimeo, Facebook, DailyMotion och Twitch

### `youtube_for_students`

**Tillåt elever att infoga videor från YouTube**

Aktivera möjligheten för elever att infoga Youtube-videor