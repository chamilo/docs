
# Anpassen des Online-Editors

In Chamilo 1.10 und höher verwenden wir CKEditor als WYSIWYG \(Was Sie sehen, ist was Sie bekommen\) oder als “online” HTML-Editor. Dies war bei Chamilo 1.9 nicht der Fall, der immer noch den jetzt toten FckEditor benutzte.

Manchmal möchten Sie möglicherweise den Editor für ein bestimmtes Element in Chamilo anpassen. Dies kann für vorhandene benutzerdefinierte Elementtypen im src/Chamilo/CoreBundle/Component/Editor/CkEditor/Toolbar/ -Verzeichnis erfolgen.

Dort finden Sie eine Reihe von Dateien der folgenden Form:

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

Wie Sie wahrscheinlich einschätzen können, ist die Struktur einfach:

* Eine Klasse, die die “Basic” -Klasse für den Editor erweitert
* eine getConfig\(\) -Methode, um eine globale Konfiguration zu erhalten \(wie die Größe des Gebiets\)
* eine getMaximizedToolbar\(\) -Methode, die die Optionen definiert, die angezeigt werden sollen, wenn sie maximiert werden
* eine getNormalToolbar\(\) -Methode, die die Optionen definiert, die normal angezeigt werden sollen
* eine getMinimizedToolbar\(\) -Methode, die die Optionen definiert, die angezeigt werden sollen, wenn sie minimiert sind

Wenn Sie eines der in den Symbolleisten angebotenen Tools für einen bestimmten Fall ändern möchten, ändern Sie es einfach hier.

Beachten Sie jedoch, dass diese Anpassung nicht Teil der normalerweise akzeptierten Anpassungen ist. Sie müssen sie daher irgendwo aufgezeichnet haben, um sie erneut anwenden zu können, wenn die nächste Version herauskommt.