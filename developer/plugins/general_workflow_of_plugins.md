## Flujo de trabajo general de plugins

El flujo de trabajo de los plugins (shortened) de la siguiente manera:

*   creas el archivo plugin.php y el index.php

* luego configura dónde se verá (en la sección de complementos del panel de administración)

* la clase ***main/inc/lib/template.lib.php*** (alrededor de la línea 140) cargas las regiones de complementos

* las regiones se definen en ***main/inc/lib/plugin.lib.php*** y el método &quot; get_installed_plugins_by_region &quot; le permite saber qué complemento debe habilitarse en una región específica de la interfaz de usuario

* (volver a template.lib.php ~ 140) la plantilla lib ''carga'' los complementos dentro de variables de plantilla específicas llamadas &quot; plugin_ [region] &quot;

* Las variables de plantilla definidas se muestran con cualquier .tpl que las cargue

  Archivos TPL (plantilla) dentro del directorio ***main/template/default*** (consulte la sección de plantillas más arriba).

  Por ejemplo, para el estudiante normal ''2 columnas'' vista de la lista de cursos (como en user_portal.php), puede verificar layout/layout_2col.tpl, y en general cargarán variables {{plugin_ [region]}} dependiendo de la región que defina el complemento. En este momento, allí no es ''región'' definido para la lista de cursos, por lo que si desea que aparezca un complemento allí, debe definir una nueva región (tanto dentro de uno de los archivos .tpl como dentro de plugin.lib.php), o puede usar menu_top y menu_bottom respectivamente (Creo que estos son para el menú izquierdo/derecho).