# Modificatoren

Finally, there might come opportunities where you'd like the template to do something for you, not very complicated but which relies on some kind of processing. That's what modifiers are for.

For example, and probably the most common modifier inside existing tpl files : get\_lang, will take the given value and use the internal procedure from Chamilo to translate it and show the translation as the result, just where the tag was placed.

For example, you could have a section like this, representing part of the header :

```text
{{"Home"|get_lang}}
```

In this case, the term « Home » will be translated by Chamilo's get\_lang\(\) function before it's shown on screen. The resulting code for this tpl block, taking into account previous examples, in French, would look something like this :

```text
Accueil
```

If you are using language terms with multiple variables to be inserted \(for example « DateFromXToY »\), you'll have to combine two modifiers, like so :

```text
{{ 'DateFromXToY' | get_lang | format(dateX, dateY) }}
```

Where dateX and dateY are variables you previously « assigned » to your template.

You can find examples of this in main/template/default/skill/skill\_info.tpl.

## Using the get\_lang modifier with plugins

When developing plugins with .tpl \(which is recommended\), the use case is slightly different. If you use variables defined **only** in the plugin's lang/ folder \(see Language variables section on page 50\), and in order to ensure that parent languages will be taken into account as well \(in case the users of your plugin make use of a sub-language – see "Sub-languages" for related information\), you will have to use the get\_plugin\_lang modifier.

However, this modifier takes an additional parameter, the name of the plugin **class**, so if we re-use one of the previous cases and say we are working on a plugin that has a folder called plugins/homepage-looks/ but inside it, the main class is called HomepageLooksPlugin:

```text
Accueil
```

… and decide that the French term “Accueil” \(“Home”, in a web context\) should be translated through plugin-specific translations, then our first reaction would be to do this:

```text
{{ “Home” | get_lang }}
```

However, this will not consider plugin-specific translations in the case of sub-languages. Instead, do this:

```text
{{ “Home” | get_plugin_lang('HomepageLooksPlugin') }}
```

This way, Chamilo will look specifically for a translation defined inside the plugin and, if no translation is found for the sub-language created by the user, it will look for a parent language that it can use, and finally default to English if none of those two steps work.

In conclusion, all your plugins should make some use of the _get\_plugin\_lang_ modifier rather than the get\_lang modifier, whenever a translation is specifically defined in the plugin.

