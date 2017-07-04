## Modifiers {#modifiers}

Finally, there might come opportunities where you&#039;d like the template to do something for you, not very complicated but which relies on some kind of processing. That&#039;s what modifiers are for.

For example, and probably the most common modifier inside existing tpl files : get_lang, will take the given value and use the internal procedure from Chamilo to translate it and show the translation as the result, just where the tag was placed.

For example, you could have a section like this, representing part of the header :

```
{{&quot;Home&quot;|get_lang}}
```

In this case, the term « Home » will be translated by Chamilo&#039;s get_lang() function before it&#039;s shown on screen. The resulting code for this tpl block, taking into account previous examples, in French, would look something like this :

```
[Accueil](http://my.chamilo110.net/)
```

If you are using language terms with multiple variables to be inserted (for example « DateFromXToY »), you&#039;ll have to combine two modifiers, like so :

```
{{ &#039;DateFromXToY&#039; | get_lang | format(dateX, dateY) }}
```

Where dateX and dateY are variables you previously « assigned » to your template.

You can find examples of this in main/template/default/skill/skill_info.tpl.

### Using the get_lang modifier with plugins {#using-the-get-lang-modifier-with-plugins}

When developing plugins with .tpl (which is recommended), the use case is slightly different. If you use variables defined **only** in the plugin&#039;s lang/ folder (see Language variables section on page 50), and in order to ensure that parent languages will be taken into account as well (in case the users of your plugin make use of a sub-language – see Sub-languageson page 38 for related information), you will have to use the get_plugin_lang modifier.

However, this modifier takes an additional parameter, the name of the plugin **class**, so if we re-use one of the previous cases and say we are working on a plugin that has a folder called plugins/homepage-looks/ but inside it, the main class is called HomepageLooksPlugin:

```
[Accueil](http://my.chamilo110.net/)
```

… and decide that the French term “Accueil” (“Home”, in a web context) should be translated through plugin-specific translations, then our first reaction would be to do this:

```
http://my.chamilo110.net/&quot;&gt;{{ “Home” | get_lang }}
```

However, this will not consider plugin-specific translations in the case of sub-languages. Instead, do this:

```
http://my.chamilo110.net/&quot;&gt;{{ “Home” | get_plugin_lang(&#039;HomepageLooksPlugin&#039;) }}
```

This way, Chamilo will look specifically for a translation defined inside the plugin and, if no translation is found for the sub-language created by the user, it will look for a parent language that it can use, and finally default to English if none of those two steps work.

In conclusion, all your plugins should make some use of the _get_plugin_lang_ modifier rather than the get_lang modifier, whenever a translation is specifically defined in the plugin.