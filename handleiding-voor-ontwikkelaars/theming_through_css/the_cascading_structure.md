# De trapsgewijze structuur

As can be understood by looking at the **Illegal HTML tag removed :** section of any Chamilo page, CSS files are loaded like this \(we have intentionally replaced the domain name by the marker **\[.\]** for readability, and used the default active style of main/css/chamilo/ \) :

Or, in short, we load them in this order :

1. web/assets/bootstrap/dist/css/bootstrap.min.css
2. web/assets/bootstrap-daterangepicker/daterangepicker-bs3.css
3. web/assets/fontawesome/css/font-awesome.min.css
4. jquery stuff
5. \(minor-importance CSS here\)
6. web/css/base.css \(the core of the Chamilo style on top of Bootstrap\)
7. web/css/themes/chamilo/default.css \(customization of the CSS theme, changeable in Chamilo\)
8. web/css/themes/chamilo/print.css \(a special version of the style for when you print it\)

We will not look into the less-important CSS files here, but you should note that they are generally feature-specific, like chosen \(a JS, searchable, drop-down menu bar\).

As CSS dictates, a CSS that appears first in the list will be loaded first, then the following ones will « overwrite » the previous settings if necessary.

## Earlier versions

You should also know that, in some cases in earlier versions of Chamilo, we used the @import url\(\) feature of CSS to load more « default » CSS. For example, for all Chamilo-type styles, you would have found a block like this at the beginning :

```text
/* Adding default style for the chamilo_X themes */

@import url('../base_chamilo.css');
```

This has been removed from styles since 1.10.0, so you should not find \(nor use\) any of these anymore.

With all this information in mind, we are ready to tackle the next section : analyzing the purpose of each file.

