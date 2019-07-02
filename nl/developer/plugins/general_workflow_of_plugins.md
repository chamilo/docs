## General workflow of plugins

The (shortened) plugins workflow as follow:

*   you create the plugin.php file and the index.php

*   you then configure where it will be seen (in the plugins section of the administration panel)

*   the main/inc/lib/template.lib.php class (around line 140) &quot;loads&quot; the plugins regions

*   regions are defined in main/inc/lib/plugin.lib.php and the method &quot;get_installed_plugins_by_region&quot; allows you to know which plugin should be enabled in a specific region of the user interface

*   (back to template.lib.php ~140) the template lib &quot;loads&quot; the plugins inside specific template variables called &quot;plugin_[region]&quot;

*   the template variables defined are then shown by any .tpl that loads them

    TPL (template) files inside the main/template/default/ directory (see templates section above).

    For example, for the normal student &quot;2-columns&quot; view of the courses list (like in user_portal.php), you can check layout/layout_2col.tpl, and in general they will load {{plugin_[region]}}variables depending on the region the plugin defines.At the moment, there is no &quot;region&quot; defined for the courses list, so if you want to make a plugin appear there, you should define a new region (both inside one of the .tpl files and inside plugin.lib.php), or you could use the menu_top and menu_bottom respectively (I believe these are for the left/right menu).