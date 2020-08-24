## Variable de idiomas en plugins

Los complementos también pueden usar la función global get_lang () disponible dentro del resto del código de Chamilo, pero tienen que usar una variación: get_plugin_lang (), que requiere que le des nombre del complemento en el que se usa.

Las variables de idioma deben ubicarse en un archivo lang/[idioma].php. Por ejemplo, el complemento básico el archivo de idioma para el complemento «abc» residirá dentro de la subcarpeta del complemento «lang»: /plugin/abc/lang/english.php

El archivo en sí tiene que usar el siguiente formato:

```
/* Plugin's language variables */

$strings['plugin_title'] = 'ABC';
$strings['plugin_comment'] = 'Plugin for managing the … website';
$strings['SelectASession'] = 'Select a session';
```

Como puede ver, el formato debe establecerse como una matriz llamada « $strings ».

Los dos primeros elementos de la matriz son obligatorios. Permitirán a los administradores ver el complemento nombre y una breve descripción en su propio idioma.

Para usar las variables desde dentro del complemento, dentro de un archivo de plantilla (.tpl) ... (para completar)