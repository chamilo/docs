# Language variables

Plugins can also use the global get\_lang\(\) function available inside the rest of the code of Chamilo, but they have to use a variation : get\_plugin\_lang\(\), that requires you to give the name of the plugin in which it is used.

Language variables have to be located in a lang/\[language\].php file. E.g, the basic plugin language file for plugin « abc » will reside inside the plugin's subfolder « lang »: /plugin/abc/lang/english.php

The file itself has to use the following format :

```text
/* Plugin's language variables */

$strings['plugin_title'] = 'ABC';
$strings['plugin_comment'] = 'Plugin for managing the … website';
$strings['SelectASession'] = 'Select a session';
```

As you can see, the format has to be set as an array called « $strings ».

The two first array elements are mandatory. They will allow administrators to see the plugin name and a short description in their own language.

To use the variables from inside the plugin, inside a template file \(.tpl\)... \(to be completed\)

