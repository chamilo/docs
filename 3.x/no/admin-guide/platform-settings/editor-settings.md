# Redigeringsinnstillinger

Konfigurasjon av riktekstredigereren (TinyMCE) som brukes på tvers av plattformen — verktøylinjer, plugins, AI-hjelpere i redigereren.

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Redigerer**. Denne kategorien inneholder **26 innstillinger**, listet nedenfor med tittel og kommentar som leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_email_editor`

**Nettbasert e-postredigerer aktivert**

Hvis dette valget er aktivert, åpnes en nettbasert redigerer når man klikker på en e-postadresse.

### `allow_spellcheck`

**Stavekontroll**

Aktiver stavekontroll

### `block_copy_paste_for_students`

**Blokker kopiering og liming for deltakere**

Blokker deltakernes mulighet til å kopiere og lime inn i WYSIWYG-redigereren

### `editor_block_image_copy_paste`

**Forhindre kopiering og liming av bilder i WYSIWYG-redigereren**

Forhindre bruk av kopiering og liming av bilder som base64 i redigereren for å unngå at databasen fylles med bilder.

*Standard: `false`*


### `editor_driver_list`

**Liste over WYSIWYG-fildrivere**

Array som inneholder navnene på driverne for filtilgang fra WYSIWYG-redigereren.

### `editor_settings`

**Innstillinger for WYSIWYG-redigerer**

Generelt konfigurasjonsarray for å rekonfigurere WYSIWYG-redigereren globalt.

### `enable_iframe_inclusion`

**Tillat iframes i HTML-redigereren**

Å tillate vilkårlige iframes i HTML-redigereren vil styrke brukernes redigeringsmuligheter, men det kan utgjøre en sikkerhetsrisiko. Sørg for at du kan stole på brukerne dine (dvs. at du vet hvem de er) før du aktiverer denne funksjonen.

### `enable_uploadimage_editor`

**Tillat dra og slipp av bilder i WYSIWYG-redigereren**

Aktiver opplasting av bilde som fil ved kopiering i innholdet eller ved dra og slipp.

*Standard: `false`*


### `enabled_asciisvg`

**Aktiver AsciiSVG**

Aktiver AsciiSVG-pluginen i WYSIWYG-redigereren for å tegne diagrammer fra matematiske funksjoner.

### `enabled_googlemaps`

**Aktiver Google maps**

Aktiver knappen for å sette inn Google maps. Aktiveringen er ikke fullstendig gjennomført med mindre filen main/inc/lib/fckeditor/myconfig.php tidligere er redigert og en Google maps API-nøkkel er lagt til.

### `enabled_imgmap`

**Aktiver Image maps**

Aktiver knappen for å sette inn Image maps. Dette lar deg knytte URL-er til områder av et bilde og opprette klikkbare områder (hotspots).

### `enabled_insertHtml`

**Tillat innsetting av widgets**

Dette lar deg bygge inn favorittvideoene og -applikasjonene dine, som vimeo eller slideshare, samt alle slags widgets og gadgets, på nettsidene dine

### `enabled_mathjax`

**Aktiver MathJax**

Aktiver MathJax-biblioteket for å visualisere matematiske formler. Dette legger til en formelknapp på redigererens verktøylinje, der formler skrives i LaTeX. Se [Matematiske formler](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Opprett og rediger SVG-filer**

Dette valget lar deg opprette og redigere SVG (Scalable Vector Graphics) i flere lag på nett, samt eksportere dem til png-formatbilder.

### `enabled_wiris`

**WIRIS matematisk redigerer**

Aktiver WIRIS matematisk redigerer. Ved å installere denne pluginen får du WIRIS-redigerer og WIRIS CAS.<br/>Denne aktiveringen er ikke fullstendig gjennomført med mindre <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-pluginen for CKeditor WIRIS</a> tidligere er lastet ned og innholdet pakket ut i Chamilo-katalogen main/inc/lib/javascript/ckeditor/plugins/.<br/>Dette er nødvendig fordi Wiris er proprietær programvare og tjenestene er <a href='http://www.wiris.com/store/who-pays' target='_blank'>kommersielle</a>. For å justere pluginen, rediger filen configuration.ini eller erstatt innholdet med filen configuration.ini.default som følger med Chamilo.

### `force_wiki_paste_as_plain_text`

**Tving liming som ren tekst i wikien**

Dette vil forhindre at mange skjulte, feilaktige eller ikke-standardiserte merker, kopiert fra andre tekster, fortsetter å ødelegge wikiteksten etter mange utgaver; men noen funksjoner vil gå tapt under redigering.

### `full_editor_toolbar_set`

**Full WYSIWYG-redigererverktøylinje**

Vis den fulle verktøylinjen i alle WYSIWYG-redigererbokser rundt om på plattformen.

*Standard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier i Wiki**

Aktiver HTML-rensemiddel i wiki-verktøyet (vil øke sikkerheten, men redusere stilfunksjoner)

### `include_asciimathml_script`

**Last inn Mathjax-biblioteket på alle systemsidene**

Aktiver denne innstillingen hvis du vil vise MathML-baserte matematiske formler og ASCIIsvg-basert matematisk grafikk ikke bare i verktøyet «Dokumenter», men også andre steder i systemet.

### `math_asciimathML`

**ASCIIMathML matematisk redigerer**

Aktiver ASCIIMathML matematisk redigerer

### `more_buttons_maximized_mode`

**Utvidet knapperad**

Aktiver utvidede knapperader når WYSIWYG-redigereren er maksimert

*Standard: `true`*

### `save_titles_as_html`

**Lagre titler som HTML**

Tillat brukere å inkludere HTML i tittelfelt på flere steder. Dette gjør det mulig med noe styling av titler, særlig i testspørsmål. Det lar også disse spesifikke tittelfeltene bruke den samme språktaggingen per språk som `translate_html` nedenfor, noe rene teksttitler ellers ikke kan inneholde.

*Standard: `false`*

### `translate_html`

**Støtte for flerspråklig HTML-innhold**

Hvis aktivert, lar dette valget brukere bruke et ‘lang’-attributt i HTML-elementer for å definere språket innholdet i det elementet er skrevet på. Aktiver flere elementer med ulike ‘lang’-attributter, og Chamilo vil bare vise innholdet på brukerens språk.

*Standard: `false`*

Se [Flerspråklig innhold](../../teacher-guide/adding-content/multi-language-content.md) i lærerhåndboken for den fullstendige gjennomgangen av denne funksjonen rettet mot lærere.


### `video_context_menu_hidden`

**Skjul hurtigmenyen på videospilleren**

Når aktivert, deaktiveres høyreklikk-hurtigmenyen på HTML5-videospillere.

*Standard: `false`*


### `video_player_renderers`

**Videospiller-renderere**

Aktiver spillerrendere for YouTube-, Vimeo-, Facebook-, DailyMotion- og Twitch-medier

### `youtube_for_students`

**Tillat at lærende setter inn videoer fra YouTube**

Aktiver muligheten for at lærende kan sette inn Youtube-videoer