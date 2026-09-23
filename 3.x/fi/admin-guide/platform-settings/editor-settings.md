# Editorin asetukset

Rikastekstieditorin (TinyMCE) määritys koko alustalla — työkalurivit, liitännäiset, tekoälyavustajat editorissa.

Näihin asetuksiin pääsee kohdasta **Hallinta > Määritysasetukset > Editor**. Tässä kategoriassa on **26 asetusta**, jotka on lueteltu alla alustan asetusten fixture-tiedostossa (`SettingsCurrentFixtures.php`) toimitetuilla otsikoilla ja kommenteilla.

> Muuttujan nimi koodissa näytetään tasalevyisenä. Käytä sitä, kun skriptaat API:n kautta tai kun sinun on muutettava näitä asetuksia globaalisti muokkaamalla tiedostoa [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Asetukset

### `allow_email_editor`

**Verkkosähköpostieditori käytössä**

Jos tämä valinta on aktivoitu, sähköpostiosoitetta napsautettaessa avautuu verkkosähköpostieditori.

### `allow_spellcheck`

**Oikeinkirjoituksen tarkistus**

Ota oikeinkirjoituksen tarkistus käyttöön

### `block_copy_paste_for_students`

**Estä oppijoilta kopiointi ja liittäminen**

Estä oppijoilta kopiointi ja liittäminen WYSIWYG-editoriin

### `editor_block_image_copy_paste`

**Estä kuvien kopiointi ja liittäminen WYSIWYG-editorissa**

Estä kuvien kopiointi ja liittäminen base64-muodossa editoriin, jotta tietokanta ei täyty kuvilla.

*Oletus: `false`*


### `editor_driver_list`

**WYSIWYG-tiedostoajurien luettelo**

Taulukko, joka sisältää WYSIWYG-editorista tapahtuvan tiedostokäytön ajurien nimet.

### `editor_settings`

**WYSIWYG-editorin asetukset**

Yleinen määritystaulukko WYSIWYG-editorin uudelleenmääritykseen globaalisti.

### `enable_iframe_inclusion`

**Salli iframe-kehykset HTML-editorissa**

Satunnaisten iframe-kehysten salliminen HTML-editorissa parantaa käyttäjien muokkausmahdollisuuksia, mutta se voi olla tietoturvariski. Varmista, että voit luottaa käyttäjiisi (eli tiedät, keitä he ovat), ennen kuin otat tämän ominaisuuden käyttöön.

### `enable_uploadimage_editor`

**Salli kuvien vedä ja pudota WYSIWYG-editorissa**

Ota kuvien lataus tiedostona käyttöön, kun sisältöä kopioidaan tai vedetään ja pudotetaan.

*Oletus: `false`*


### `enabled_asciisvg`

**Ota AsciiSVG käyttöön**

Ota AsciiSVG-liitännäinen käyttöön WYSIWYG-editorissa kaavioiden piirtämiseksi matemaattisista funktioista.

### `enabled_googlemaps`

**Aktivoi Google maps**

Aktivoi painike Google maps -karttojen lisäämiseksi. Aktivointi ei toteudu täysin, ellei tiedostoa main/inc/lib/fckeditor/myconfig.php ole aiemmin muokattu ja siihen ole lisätty Google maps API -avainta.

### `enabled_imgmap`

**Aktivoi Image maps**

Aktivoi painike Image maps -karttojen lisäämiseksi. Tämä mahdollistaa URL-osoitteiden liittämisen kuvan alueisiin, jolloin syntyy hotspot-alueita.

### `enabled_insertHtml`

**Salli widgettien lisääminen**

Tämä mahdollistaa suosikkivideoiden ja -sovellusten, kuten vimeon tai slidesharen, sekä kaikenlaisten widgettien ja gadgetien upottamisen verkkosivuillesi

### `enabled_mathjax`

**Ota MathJax käyttöön**

Ota MathJax-kirjasto käyttöön matemaattisten kaavojen visualisointiin. Tämä lisää kaavapainikkeen editorin työkaluriville; kaavat kirjoitetaan LaTeXilla. Katso [Matemaattiset kaavat](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**Luo ja muokkaa SVG-tiedostoja**

Tämä valinta mahdollistaa SVG-tiedostojen (Scalable Vector Graphics) monikerroksisen luomisen ja muokkaamisen verkossa sekä viennin png-muotoisiksi kuviksi.

### `enabled_wiris`

**WIRIS-matematiikkaeditori**

Ota WIRIS-matematiikkaeditori käyttöön. Asentamalla tämän liitännäisen saat WIRIS-editorin ja WIRIS CAS:n.<br/>Tämä aktivointi ei toteudu täysin, ellei <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-liitännäistä CKeditor WIRIS:lle</a> ole aiemmin ladattu ja sen sisältöä purettu Chamilon hakemistoon main/inc/lib/javascript/ckeditor/plugins/.<br/>Tämä on tarpeen, koska Wiris on suljettua ohjelmistoa ja sen palvelut ovat <a href='http://www.wiris.com/store/who-pays' target='_blank'>kaupallisia</a>. Liitännäisen säätämiseksi muokkaa configuration.ini-tiedostoa tai korvaa sen sisältö Chamilon mukana toimitetulla tiedostolla configuration.ini.default.

### `force_wiki_paste_as_plain_text`

**Pakota liittäminen pelkkänä tekstinä wikissä**

Tämä estää monia piilotettuja, virheellisiä tai epästandardeja tunnisteita, jotka on kopioitu muista teksteistä, korruptoimasta wikin tekstiä toistuvien ongelmien jälkeen; muokkauksessa menetetään kuitenkin joitakin ominaisuuksia.

### `full_editor_toolbar_set`

**Täysi WYSIWYG-editorin työkalurivi**

Näytä täysi työkalurivi kaikissa WYSIWYG-editoriruuduissa ympäri alustaa.

*Oletus: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier wikissä**

Ota HTML-puhdistin käyttöön wiki-työkalussa (lisää tietoturvaa mutta vähentää tyyliominaisuuksia)

### `include_asciimathml_script`

**Lataa Mathjax-kirjasto kaikille järjestelmän sivuille**

Aktivoi tämä asetus, jos haluat näyttää MathML-pohjaisia matemaattisia kaavoja ja ASCIIsvg-pohjaisia matemaattisia grafiikoita paitsi Asiakirjat-työkalussa myös muualla järjestelmässä.

### `math_asciimathML`

**ASCIIMathML-matematiikkaeditori**

Ota ASCIIMathML-matematiikkaeditori käyttöön

### `more_buttons_maximized_mode`

**Laajennettu painikepalkki**

Ota laajennetut painikepalkit käyttöön, kun WYSIWYG-editori on suurennettu

*Oletus: `true`*

### `save_titles_as_html`

**Tallenna otsikot HTML-muodossa**

Salli käyttäjien sisällyttää HTML:ää otsikkokenttiin useissa paikoissa. Tämä mahdollistaa otsikoiden tyylittelyn, erityisesti testikysymyksissä. Se myös antaa näiden tiettyjen otsikkokenttien käyttää samaa kielikohtaista merkintää kuin alla oleva `translate_html`, jota pelkkätekstiset otsikot eivät muuten voi sisältää.

*Oletus: `false`*

### `translate_html`

**Tuki monikieliselle HTML-sisällölle**

Jos tämä on käytössä, käyttäjät voivat käyttää HTML-elementeissä ‘lang’-attribuuttia määrittääkseen kielen, jolla elementin sisältö on kirjoitettu. Ota käyttöön useita elementtejä eri ‘lang’-attribuuteilla, niin Chamilo näyttää sisällön vain käyttäjän kielellä.

*Oletus: `false`*

Katso opettajan oppaasta [Monikielinen sisältö](../../teacher-guide/adding-content/multi-language-content.md) tämän ominaisuuden täydellinen opettajille suunnattu läpikäynti.


### `video_context_menu_hidden`

**Piilota videosoittimen pikavalikko**

Kun tämä on käytössä, HTML5-videosoittimien hiiren oikean painikkeen pikavalikko poistetaan käytöstä.

*Oletus: `false`*


### `video_player_renderers`

**Videosoittimen renderöijät**

Ota soittimen renderöijät käyttöön YouTube-, Vimeo-, Facebook-, DailyMotion- ja Twitch-medioille

### `youtube_for_students`

**Salli oppijoiden lisätä videoita YouTubesta**

Ota käyttöön mahdollisuus, että oppijat voivat lisätä Youtube-videoita