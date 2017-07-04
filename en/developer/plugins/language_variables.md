## Language variables {#language-variables}

Plugins can also use the global get_lang() function available inside the rest of the code of Chamilo, but they have to use a variation : get_plugin_lang(), that requires you to give the name of the plugin in which it is used.

Language variables have to be located in a lang/[language].php file. E.g, the basic plugin langage file for plugin « abc » will reside inside the plugin&#039;s subfolder « lang » : /plugin/abc/lang/english.php

The file itself has to use the following format :

/* Plugin&#039;s language variables */

$strings[**&#039;plugin_title&#039;**] = **&#039;A****BC****&#039;**;$strings[**&#039;plugin_comment&#039;**] = **&#039;Plugin for managing the … website&#039;**;

$strings[**&#039;****SelectASession****&#039;**] = **&#039;****Select a session****&#039;**;

As you can see, the format has to be set as an array called « $strings ».

The two first array elements are mandatory. They will allow administrators to see the plugin name and a short description in their own langage.

To use the variables from inside the plugin, inside a template file (.tpl), you&#039;ll have to call it like this :