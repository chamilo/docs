# Editor Settings

Configuration of the rich-text editor (TinyMCE) used across the platform — toolbars, plugins, AI helpers in the editor.

Access these settings under **Administration > Configuration settings > Editor**. This category contains **26 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in monospace. Use it when scripting via the API or when you need to change those settings at a global level by editing [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Settings

### `allow_email_editor`

**Online e-mail editor enabled**

If this option is activated, clicking on an e-mail address will open an online editor.

### `allow_spellcheck`

**Spell check**

Enable spell check

### `block_copy_paste_for_students`

**Block learners copy and paste**

Block learners the ability to copy and paste into the WYSIWYG editor

### `editor_block_image_copy_paste`

**Prevent copy-pasting images in WYSIWYG editor**

Prevent the use of images copy-paste as base64 in the editor to avoid filling the database with images.

### `editor_driver_list`

**List of WYSIWYG files drivers**

Array containing the names of the drivers for files access from the WYSIWYG editor.

### `editor_settings`

**WYSIWYG editor settings**

Generic configuration array to reconfigure the WYSIWYG editor globally.

### `enable_iframe_inclusion`

**Allow iframes in HTML Editor**

Allowing arbitrary iframes in the HTML Editor will enhance the edition capabilities of the users, but it can represent a security risk. Please make sure you can rely on your users (i.e. you know who they are) before enabling this feature.

### `enable_uploadimage_editor`

**Allow images drag&drop in WYSIWYG editor**

Enable image upload as file when doing a copy in the content or a drag and drop.

### `enabled_asciisvg`

**Enable AsciiSVG**

Enable the AsciiSVG plugin in the WYSIWYG editor to draw charts from mathematical functions.

### `enabled_googlemaps`

**Activate Google maps**

Activate the button to insert Google maps. Activation is not fully realized if not previously edited the file main/inc/lib/fckeditor/myconfig.php and added a Google maps API key.

### `enabled_imgmap`

**Activate Image maps**

Activate the button to insert Image maps. This allows you to associate URLs to areas of an image, creating hotspots.

### `enabled_insertHtml`

**Allow insertion of widgets**

This allows you to embed on your webpages your favorite videos and applications such as vimeo or slideshare and all sorts of widgets and gadgets

### `enabled_mathjax`

**Enable MathJax**

Enable the MathJax library to visualize mathematical formulas. This is only useful if either ASCIIMathML or ASCIISVG settings are enabled.

### `enabled_support_svg`

**Create and edit SVG files**

This option allows you to create and edit SVG (Scalable Vector Graphics) multilayer online, as well as export them to png format images.

### `enabled_wiris`

**WIRIS mathematical editor**

Enable WIRIS mathematical editor. Installing this plugin you get WIRIS editor and WIRIS CAS.<br/>This activation is not fully realized unless it has been previously downloaded the <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP plugin for CKeditor WIRIS</a> and unzipped its contents in the Chamilo's directory main/inc/lib/javascript/ckeditor/plugins/.<br/>This is necessary because Wiris is proprietary software and his services are <a href='http://www.wiris.com/store/who-pays' target='_blank'>commercial</a>. To make adjustments to the plugin, edit configuration.ini file or replace his content by the file configuration.ini.default shipped with Chamilo.

### `force_wiki_paste_as_plain_text`

**Forcing pasting as plain text in the wiki**

This will prevent many hidden tags, incorrect or non-standard, copied from other texts to stop corrupting the text of the Wiki after many issues; but will lose some features while editing.

### `full_editor_toolbar_set`

**Full WYSIWYG editor toolbar**

Show the full toolbar in all WYSIWYG editor boxes around the platform.

### `htmlpurifier_wiki`

**HTMLPurifier in Wiki**

Enable HTML purifier in the wiki tool (will increase security but reduce style features)

### `include_asciimathml_script`

**Load the Mathjax library in all the system pages**

Activate this setting if you want to show MathML-based mathematical formulas and ASCIIsvg-based mathematical graphics not only in the 'Documents' tool, but elsewhere in the system.

### `math_asciimathML`

**ASCIIMathML mathematical editor**

Enable ASCIIMathML mathematical editor

### `more_buttons_maximized_mode`

**Buttons bar extended**

Enable button bars extended when the WYSIWYG editor is maximized

### `save_titles_as_html`

**Save titles as HTML**

Allow users to include HTML in title fields in several places. This allows for some styling of titles, notably in test questions.

### `translate_html`

**Support multi-language HTML content**

If enabled, this option allows users to use a ‘lang’ attribute in HTML elements to define the langage the content of that element is written in. Enable multiple elements with different ‘lang’ attributes and Chamilo will display the content in the langage of the user only.

### `video_context_menu_hidden`

**Hide the context menu on video player**

When enabled, the right-click context menu on HTML5 video players is disabled.

### `video_player_renderers`

**Video player renderers**

Enable player renderers for YouTube, Vimeo, Facebook, DailyMotion, Twitch medias

### `youtube_for_students`

**Allow learners to insert videos from YouTube**

Enable the possibility that learners can insert Youtube videos

