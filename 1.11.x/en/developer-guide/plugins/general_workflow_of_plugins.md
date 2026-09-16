# General workflow of plugins

The \(shortened\) plugins workflow as follow:

* you create the plugin.php file and the index.php
* you then configure where it will be seen \(in the plugins section of the administration panel\)
* the main/inc/lib/template.lib.php class \(around line 140\) "loads" the plugins regions
* regions are defined in main/inc/lib/plugin.lib.php and the method "get\_installed\_plugins\_by\_region" allows you to know which plugin should be enabled in a specific region of the user interface
* \(back to template.lib.php ~140\) the template lib "loads" the plugins inside specific template variables called "plugin\_\[region\]"
* the template variables defined are then shown by any .tpl that loads them

  TPL \(template\) files inside the main/template/default/ directory \(see templates section above\).

  For example, for the normal student "2-columns" view of the courses list \(like in user_portal.php\), you can check layout/layout\_2col.tpl, and in general they will load {{plugin_\[region\]}}variables depending on the region the plugin defines.At the moment, there is no "region" defined for the courses list, so if you want to make a plugin appear there, you should define a new region \(both inside one of the .tpl files and inside plugin.lib.php\), or you could use the menu\_top and menu\_bottom respectively \(I believe these are for the left/right menu\).

