## The stylesheets inclusion mechanism

Si alguna vez desea incluir más hojas de estilo en la lista, este es el flujo completo:

* se inicia un script (por ejemplo, /user_portal.php)

* incluye global.inc.php

* global.inc.php llama al método Display :: display_header () (en main / inc / lib / display.lib.php)

* display_header llama a Template :: set_css_files () methos

* set_css_files () prepara una matriz con el CSS para cargar y la prepara como _css_file_to_string_

* el script inicial carga una plantilla (.tpl) desde main / template / default /

* la plantilla incluye la plantilla main / template / default / layout / main_header.tpl

* main_header.tpl load head.tpl (en la misma carpeta)

* head.tpl carga la matriz _css_file_to_string_ para mostrar el CSS en el

  

  Si desea configurar una nueva hoja de estilo globalmente, o cambiar el orden en que se cargan, y si siguió el flujo anterior, ahora sabrá que el mejor lugar para hacerlo es int el método Template :: setCssFiles () .

  Este es el mejor método hasta ahora en Chamilo 1.10, pero en 2.0 con toda la capacidad de las plantillas desatadas, debería poder agregar directamente el nuevo CSS a su plantilla.
