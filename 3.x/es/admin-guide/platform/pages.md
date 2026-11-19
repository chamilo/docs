# Páginas

Pages es la herramienta integrada de Chamilo, similar a un CMS, para los bloques de contenido que componen las áreas públicas del portal —la página de inicio, el pie de página, los menús de navegación y ubicaciones similares— sin necesidad de modificar un archivo de plantilla.

## Acceso a Pages

Desde el panel de administración, haga clic en **Plataforma > Páginas**.

## Cómo funciona Pages

Cada página tiene:

* **Título** y **contenido** en texto enriquecido
* Un **slug**, generado automáticamente a partir del título
* **Habilitada** — si la página está actualmente visible
* **Posición** — ordenación mediante arrastrar y soltar dentro de su categoría
* **Configuración regional** — el contenido es por idioma: la misma ubicación puede contener una página por idioma, y el sitio recurre al idioma predeterminado de la plataforma si no existe ninguna página para el idioma del visitante
* Una **categoría** — esto es lo que determina *dónde* se muestra la página (por ejemplo, `index`, `home`, `footer_public` o `menu_links`); Chamilo crea automáticamente las categorías que necesita

En una instalación multi-URL (multiportal), las páginas también se delimitan por URL de acceso, de modo que cada portal gestiona su propio contenido.

## Dónde aparece cada categoría

El formulario de creación y edición de páginas termina con dos diagramas que muestran dónde se visualizan las páginas de cada categoría. Úselos para elegir la **Categoría** correcta antes de redactar el contenido.

![El formulario de edición de páginas, con los campos de título, URL amigable, habilitada, categoría, idioma y contenido, seguido de dos diagramas de la página de inicio de sesión y de la interfaz de los usuarios que han iniciado sesión, cuyas áreas azules están etiquetadas con las categorías de página index, faq, demo, footer_public, home, menu_links y footer_private](../../.gitbook/assets/admin-pages-form.png)

* **Página de inicio de sesión (visitantes que no han iniciado sesión)** — las páginas `index` ocupan el área principal junto al formulario de inicio de sesión, y las páginas `footer_public` se muestran en el pie de página. Las categorías `index`, `faq` y `demo` también aparecen como entradas en la barra superior.
* **Interfaz de los usuarios que han iniciado sesión** — las páginas `home` ocupan el área principal de la página de inicio. Las páginas `menu_links` se enumeran en el menú lateral y las páginas `footer_private` se muestran en el pie de página.

Las áreas azules resaltadas son los lugares que puede ocupar una página; los bloques grises son la interfaz propia de Chamilo, que las páginas no sustituyen.

## Categorías de enlaces de menú

Dos categorías convierten sus páginas habilitadas en una lista de enlaces (cada enlace muestra el título de la página y abre la página) en lugar de mostrar su contenido en el lugar correspondiente:

* **`menu_links`** — enlaces mostrados a todo el mundo: debajo del formulario de inicio de sesión para los visitantes anónimos y en la parte inferior de la barra lateral izquierda para los usuarios que han iniciado sesión. Úsela para contenido que cualquier usuario pueda necesitar, como avisos legales o condiciones de uso.
* **`menu_public_links`** — enlaces mostrados **solo a los visitantes anónimos**, debajo del formulario de inicio de sesión en la página de inicio y en la página de inicio de sesión. Desaparecen una vez que el usuario inicia sesión. Úsela para contenido dirigido a posibles usuarios, como una presentación de la plataforma o cómo solicitar una cuenta.

Cuando ambas categorías tienen páginas, los enlaces de `menu_links` se enumeran primero.

## La página de introducción al registro

**Plataforma > Configuración de la página de registro** es un acceso directo a este mismo sistema Pages para una ubicación específica: el texto introductorio que se muestra encima del formulario público de registro. Está restringido a los administradores del portal. Al hacer clic:

* Se abre la página de introducción existente para su edición, si ya existe una para su URL de acceso e idioma, o
* Se crea la ubicación sobre la marcha y se le lleva directamente a crear su contenido

Lo que guarde aquí se muestra como un cuadro informativo directamente encima del formulario de registro: un lugar natural para instrucciones, condiciones específicas de su organización o contexto que los posibles usuarios deban leer antes de registrarse. Déjela deshabilitada (o no la cree nunca) para mostrar el formulario de registro simple, sin texto introductorio.

## Publicar una página en todos los idiomas

En el selector de idioma del editor de páginas, elija **Todos los idiomas** cuando la misma página deba ser visible independientemente del idioma de la interfaz del visitante. Use un idioma específico para el contenido localizado. Se conservan las páginas existentes específicas de un idioma y el comportamiento de reserva de la configuración regional; esta función no traduce automáticamente una página.

Consulte [PR de páginas en todos los idiomas n.º 9398](https://github.com/chamilo/chamilo-lms/pull/9398).

## Eliminar varias páginas o versiones relacionadas en otros idiomas

La lista de Pages permite seleccionar varias entradas y elegir **Eliminar las páginas seleccionadas**. Revise con atención la lista de confirmación antes de eliminarlas. Al eliminar una página individual, Chamilo también puede mostrar páginas candidatas en otros idiomas para que pueda seleccionar explícitamente las versiones relacionadas que desea eliminar.

Las páginas en distintos idiomas **no se vinculan automáticamente**. No seleccione una página con un nombre similar a menos que haya verificado que es la traducción o la contraparte correcta. Las eliminaciones son destructivas, así que revise la selección y conserve primero una copia del contenido CMS importante. Consulte [PR de eliminación masiva y multilingüe de páginas n.º 9331](https://github.com/chamilo/chamilo-lms/pull/9331).