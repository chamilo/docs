# De online editor aanpassen

In Chamilo 1.10 en later gebruiken we CKeditor als een WYSIWYG \(What You See Is What You Get\) of "online" HTML-editor. Dit was niet het geval met Chamilo 1.9, die nog de inmiddels overleden FCKeditor gebruikte.

Soms wilt u de editor voor een bepaald item in Chamilo aanpassen. Dit kan worden gedaan, voor bestaande typen aangepaste elementen, in de directory src/Chamilo/CoreBundle/Component/Editor/CkEditor/Toolbar/.

Daar vindt u een reeks bestanden met de volgende vorm:

```text
/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Component\Editor\CkEditor\Toolbar;

/**
 * Messages toolbar configuration
 *
 * @package Chamilo\CoreBundle\Component\Editor\CkEditor\Toolbar
 */
class Messages extends Basic
{ 
    /**
     * Get the toolbar config
     * @return array
     */
    public function getConfig()
    {
        if (api_get_setting('more_buttons_maximized_mode') != 'true') {
            $config['toolbar'] = $this→getNormalToolbar();
        } else {
            $config['toolbar_minToolbar'] = $this→getMinimizedToolbar();
            $config['toolbar_maxToolbar'] = $this→getMaximizedToolbar();
        }

        $config['fullPage'] = true;
        //$config['height'] = '200';
        return $config;
    }

    /**
     * Get the toolbar configuration when CKEditor is maximized
     * @return array
     */
    protected function getMaximizedToolbar()
    {
        return [
            ['NewPage', 'Templates', '-', 'Preview', 'Print'],
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord'],
            ['Undo', 'Redo', '-', 'SelectAll', 'Find', '-','RemoveFormat'],
            ['Link', 'Unlink', 'Anchor', 'Glossary'],
            [ 'Image', 'Mapping', 'Video', 'Oembed', 'Youtube', 'Flash', 'Audio', 'leaflet', 'Smiley', 'SpecialChar', 'Inserthtml', 'Asciimath', 'Asciisvg' ],
            '/',
            ['Table', '-', 'CreateDiv'],
            ['BulletedList', 'NumberedList', 'HorizontalRule', '-','Outdent', 'Indent', 'Blockquote'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript', '-', 'TextColor', 'BGColor'],
            [api_get_setting('allow_spellcheck') == 'true' ? 'Scayt' : ''],
            ['Styles', 'Format', 'Font', 'FontSize'],
            ['PageBreak', 'ShowBlocks', 'Source'],
            ['Toolbarswitch']
        ];
    }

    /**
     * Get the default toolbar configuration when the setting
     * more_buttons_maximized_mode is false
     * @return array
     */
    protected function getNormalToolbar()
    {
        return [
            ['Link', 'Unlink'],
            ['Image', 'Video', 'Flash', 'Oembed', 'Youtube', 'Audio'],
            ['Table', 'Smiley'],
            ['TextColor', 'BGColor'],
            ['Source'],
            '/',
            ['Font', 'FontSize'],
            ['Bold', 'Italic', 'Underline'],
            ['JustifyLeft', 'JustifyCenter', '-', 'NumberedList', 'BulletedList']
        ];
    }
    /**
     * Get the toolbar configuration when CKEditor is minimized
     * @return array
     */
    protected function getMinimizedToolbar()
    {
        return [
            $this→getNewPageBlock(),
            ['Undo', 'Redo'],
            ['Link', 'Image', 'Video', 'Flash', 'Audio', 'Table','Asciimath', 'Asciisvg'],
            ['BulletedList', 'NumberedList', 'HorizontalRule'],
            ['JustifyLeft', 'JustifyCenter'],
            ['Format', 'Font', 'Bold', 'Italic', 'Underline', 'TextColor', 'BGColor'],
            ['Toolbarswitch']
        ];
    }
}
```

Zoals u waarschijnlijk kunt begrijpen, is de structuur eenvoudig:

* een klasse die de klasse "Basic" uitbreidt voor de editor
* een getConfig\(\) methode om een globale configuratie te krijgen \(zoals de grootte van het gebied\)
* een methode getMaximizedToolbar\(\) die de opties definieert die moeten worden weergegeven wanneer deze zijn gemaximaliseerd
* een getNormalToolbar\(\) methode die de opties definieert die getoond moeten worden wanneer normaal
* een getMinimizedToolbar\(\) - methode die de opties definieert die moeten worden weergegeven wanneer ze worden geminimaliseerd

Als u een van de tools die in de werkbalken worden aangeboden voor een specifiek geval wilt wijzigen, wijzig dit dan hier.

Houd er echter rekening mee dat deze aanpassing geen deel uitmaakt van de normaal geaccepteerde aanpassingen, dus u moet het ergens bewaren om het opnieuw te kunnen toepassen wanneer de volgende versie uitkomt.

