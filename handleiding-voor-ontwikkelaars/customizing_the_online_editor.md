# De online editor aanpassen

In Chamilo 1.10 and later, we use CKeditor as a WYSIWYG \(What You See Is What You Get\) or “online” HTML editor. This was not the case with Chamilo 1.9, which still used the now-dead FCKeditor.

Sometimes, you might want to customize the editor for some particular item in Chamilo. This can be done, for existing custom element types, in the src/Chamilo/CoreBundle/Component/Editor/CkEditor/Toolbar/ directory.

There, you’ll find a series of files of the following form:

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

As you can probably appreciate, the structure is simply:

* a class extending the “Basic” class for the editor
* a getConfig\(\) method to get some global configuration \(like size of the area\)
* a getMaximizedToolbar\(\) method that defines the options to be shown when maximized
* a getNormalToolbar\(\) method that defines the options to be shown when normal
* a getMinimizedToolbar\(\) method that defines the options to be shown when minimized

If you want to change one of the tools offered in the toolbars for a specific case, just change it here.

Note, however, that this customization is not part of the normally-accepted customizations, so you will have to keep it on record somewhere to be able to apply it again when the next version comes out.

