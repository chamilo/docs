## Extendiendo el conjunto de iconos

Desde la versión 1.9, Chamilo incluye una característica poco conocida por la cual los iconos personalizados, ubicados dentro de su tema CSS, pueden reemplazar los íconos predefinidos de Chamilo.

Sin embargo, esto solo funciona para los iconos que normalmente se cargan desde el ***/img/icons/*** main
directorio. No los que están en la raíz de ***main/img/***.

Para reemplazar los iconos, deberá crear, dentro de su propia carpeta de temas CSS (para
aplicación de ejemplo **/Resources/public/css/themes/chamilo/**) una subcarpeta llamada "**icons**/", dentro
donde se reproduce la estructura de la carpeta normal _**main/img/icons/**_.

Por ejemplo, si desea reemplazar el ícono **edit_profile.png** en el menú de la izquierda,
normalmente ubicado en

 - **main/img/icons/22/edit_profile.png**

tendrías que crear

 - **app/Resources/public/css/themes/chamilo/icons/22/edit_profile.png**

Este es un breve ejemplo de qué tipo de cambio de estilo podría generar simplemente creando una nueva carpeta en su CSS.

Recuerde que los nuevos iconos deben tener el mismo tamaño que el anterior. Esta no se realizó en el ejemplo anterior, razón por la cual los íconos de Bandeja de entrada y Componer son un poco recortado en el lado derecho. Alternativamente, también puede actualizar la hoja de estilo a asegúrese de que no se recorte, pero es probable que esto tome una cantidad considerable de tiempo.

Recuerde que, para "enjuagar" su cambio de estilo, debe cargar un nuevo CSS carpeta en formato ZIP a través del panel de administración, O para cargarlos directamente en el servidor (en **app/Resources/public/css/themes/[style]**/). Pero si haces esto último, tú deberá usar la opción "Limpieza de caché" de la página de administración, de lo contrario, su estilo permanecerá en la aplicación  y no se "publicará" en la **web/css/** como sea necesario.

El uso real de esta función es evitar que tenga que modificar la carpeta principal **/img/** de cualquier manera, considerando que esto se sobrescribe con cada nueva versión del software.

El uso de su propia carpeta CSS garantiza la independencia del código principal de Chamilo.