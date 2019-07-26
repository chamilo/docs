## Modificadores

Finalmente, pueden surgir oportunidades en las que le gustaría que la plantilla haga algo por usted, no muy complicada pero que se basa en algún tipo de procesamiento. Para eso son los modificadores.

Por ejemplo, y probablemente el modificador más común dentro de los archivos tpl existentes: get_lang, tomará el valor dado y usará el procedimiento interno de Chamilo para traducirlo y mostrar la traducción como el resultado, justo donde se colocó la etiqueta.

Por ejemplo, podría tener una sección como esta, que representa parte del encabezado:

```
{{"Home"|get_lang}}
```

En este caso, el término «Inicio» será traducido por la función get_lang () de Chamilo antes de que se muestre en la pantalla. El código resultante para este bloque tpl, teniendo en cuenta los ejemplos anteriores, en francés, sería algo así:

```
Accueil
```

Si está utilizando términos de idioma con múltiples variables para insertar (por ejemplo, «DateFromXToY»), tendrá que combinar dos modificadores, como por ejemplo:

```
{{ 'DateFromXToY' | get_lang | format(dateX, dateY) }}
```

Donde dateX y dateY son variables que previamente "asignó" a su plantilla.

Puedes encontrar ejemplos de esto en main/template/default/skill/skill_info.tpl.

### Usando el modificador get_lang con plugins

Al desarrollar complementos con .tpl (que se recomienda), el caso de uso es ligeramente diferente. Si usa las variables definidas ** solo ** en el lang / folder del plugin (consulte la sección Variables de idioma en la página 50), y para asegurarse de que los idiomas principales también se tendrán en cuenta (en caso de que los usuarios de su plugin hagan uso de un sub-idioma (consulte "Sub-idiomas" para obtener información relacionada), tendrá que usar el modificador get_plugin_lang.

Sin embargo, este modificador toma un parámetro adicional, el nombre del complemento ** clase **, por lo que si reutilizamos uno de los casos anteriores y decimos que estamos trabajando en un complemento que tiene una carpeta llamada complementos / homepage-looks / pero dentro de ella, la clase principal se llama HomepageLooksPlugin:

```
Accueil
```

... y decida que el término francés "Accueil" ("Inicio", en un contexto web) se traduzca a través de traducciones específicas de plugin, entonces nuestra primera reacción sería hacer esto:

```
{{ “Home” | get_lang }}
```

Sin embargo, esto no considerará las traducciones específicas de los complementos en el caso de sub-idiomas. En su lugar, haga esto:

```
{{ “Home” | get_plugin_lang('HomepageLooksPlugin') }}
```

De esta manera, Chamilo buscará específicamente una traducción definida dentro del complemento y, si no se encuentra una traducción para el idioma secundario creado por el usuario, buscará un idioma primario que pueda usar y, por último, el idioma predeterminado será el inglés si no hay. De esos dos pasos funciona.

En conclusión, todos sus complementos deberían hacer uso del modificador _get_plugin_lang_ en lugar del modificador get_lang, siempre que se defina una traducción específicamente en el complemento.

