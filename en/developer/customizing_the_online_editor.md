# Customizing the online editor {#customizing-the-online-editor}

In Chamilo 1.10 and 1.11, we use CKeditor as a WYSIWYG (What You See Is What You Get) or “online” HTML editor. This was not the case with Chamilo 1.9, which still used the now-dead FCKeditor.

Sometimes, you might want to customize the editor for some particular item in Chamilo. This can be done, for existing custom element types, in the src/Chamilo/CoreBundle/Component/Editor/CkEditor/Toolbar/ directory.

There, you’ll find a series of files of the following form:

/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Component\Editor\CkEditor\Toolbar;

/** * Messages toolbar configuration * * @package Chamilo\CoreBundle\Component\Editor\CkEditor\Toolbar */class Messages extends Basic{ /** * Get the toolbar config * @return array */ public function getConfig() { if (api_get_setting(&#039;more_buttons_maximized_mode&#039;) != &#039;true&#039;) { $config[&#039;toolbar&#039;] = $this→getNormalToolbar(); } else { $config[&#039;toolbar_minToolbar&#039;] = $this→getMinimizedToolbar(); $config[&#039;toolbar_maxToolbar&#039;] = $this→getMaximizedToolbar(); }

$config[&#039;fullPage&#039;] = true; //$config[&#039;height&#039;] = &#039;200&#039;; return $config; }

/** * Get the toolbar configuration when CKEditor is maximized * @return array */ protected function getMaximizedToolbar() { return [ [&#039;NewPage&#039;, &#039;Templates&#039;, &#039;-&#039;, &#039;Preview&#039;, &#039;Print&#039;], [&#039;Cut&#039;, &#039;Copy&#039;, &#039;Paste&#039;, &#039;PasteText&#039;, &#039;PasteFromWord&#039;], [&#039;Undo&#039;, &#039;Redo&#039;, &#039;-&#039;, &#039;SelectAll&#039;, &#039;Find&#039;, &#039;-&#039;,&#039;RemoveFormat&#039;], [&#039;Link&#039;, &#039;Unlink&#039;, &#039;Anchor&#039;, &#039;Glossary&#039;], [ &#039;Image&#039;, &#039;Mapping&#039;, &#039;Video&#039;, &#039;Oembed&#039;, &#039;Youtube&#039;, &#039;Flash&#039;, &#039;Audio&#039;, &#039;leaflet&#039;, &#039;Smiley&#039;, &#039;SpecialChar&#039;, &#039;Inserthtml&#039;, &#039;Asciimath&#039;, &#039;Asciisvg&#039; ], &#039;/&#039;, [&#039;Table&#039;, &#039;-&#039;, &#039;CreateDiv&#039;], [&#039;BulletedList&#039;, &#039;NumberedList&#039;, &#039;HorizontalRule&#039;, &#039;-&#039;,&#039;Outdent&#039;, &#039;Indent&#039;, &#039;Blockquote&#039;], [&#039;JustifyLeft&#039;, &#039;JustifyCenter&#039;, &#039;JustifyRight&#039;, &#039;JustifyBlock&#039;], [&#039;Bold&#039;, &#039;Italic&#039;, &#039;Underline&#039;, &#039;Strike&#039;, &#039;-&#039;, &#039;Subscript&#039;, &#039;Superscript&#039;, &#039;-&#039;, &#039;TextColor&#039;, &#039;BGColor&#039;], [api_get_setting(&#039;allow_spellcheck&#039;) == &#039;true&#039; ? &#039;Scayt&#039; : &#039;&#039;], [&#039;Styles&#039;, &#039;Format&#039;, &#039;Font&#039;, &#039;FontSize&#039;], [&#039;PageBreak&#039;, &#039;ShowBlocks&#039;, &#039;Source&#039;], [&#039;Toolbarswitch&#039;] ]; }

/** * Get the default toolbar configuration when the setting * more_buttons_maximized_mode is false * @return array */ protected function getNormalToolbar() { return [ [&#039;Link&#039;, &#039;Unlink&#039;], [&#039;Image&#039;, &#039;Video&#039;, &#039;Flash&#039;, &#039;Oembed&#039;, &#039;Youtube&#039;, &#039;Audio&#039;], [&#039;Table&#039;, &#039;Smiley&#039;], [&#039;TextColor&#039;, &#039;BGColor&#039;], [&#039;Source&#039;], &#039;/&#039;, [&#039;Font&#039;, &#039;FontSize&#039;], [&#039;Bold&#039;, &#039;Italic&#039;, &#039;Underline&#039;], [&#039;JustifyLeft&#039;, &#039;JustifyCenter&#039;, &#039;-&#039;, &#039;NumberedList&#039;, &#039;BulletedList&#039;] ]; } /** * Get the toolbar configuration when CKEditor is minimized * @return array */ protected function getMinimizedToolbar() { return [ $this→getNewPageBlock(), [&#039;Undo&#039;, &#039;Redo&#039;], [&#039;Link&#039;, &#039;Image&#039;, &#039;Video&#039;, &#039;Flash&#039;, &#039;Audio&#039;, &#039;Table&#039;,&#039;Asciimath&#039;, &#039;Asciisvg&#039;], [&#039;BulletedList&#039;, &#039;NumberedList&#039;, &#039;HorizontalRule&#039;], [&#039;JustifyLeft&#039;, &#039;JustifyCenter&#039;], [&#039;Format&#039;, &#039;Font&#039;, &#039;Bold&#039;, &#039;Italic&#039;, &#039;Underline&#039;, &#039;TextColor&#039;, &#039;BGColor&#039;], [&#039;Toolbarswitch&#039;] ]; }}

As you can probably appreciate, the structure is simply:

*   a class extending the “Basic” class for the editor

*   a getConfig() method to get some global configuration (like size of the area)

*   a getMaximizedToolbar() method that defines the options to be shown when maximized

*   a getNormalToolbar() method that defines the options to be shown when normal

*   a getMinimizedToolbar() method that defines the options to be shown when minimized

If you want to change one of the tools offered in the toolbars for a specific case, just change it here.

Note, however, that this customization is not part of the normally-accepted customizations, so you will have to keep it on record somewhere to be able to apply it again when the next version comes out.