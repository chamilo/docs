## Estructura de las plantillas de documentos

Para permitirnos modificar las plantillas, entendamos cómo funcionan.

Cada plantilla tiene una entrada en la tabla ***system_template*** en la base de datos. Veamos un registro existente

* **id: 1:** Una identificación automática generada por la base de datos.
* **title: TemplateTitleCourseTitle:**  un nombre de variable de idioma para el título que se mostrará, se puede encontrar en main/lang/[language]/trad4all.inc.php. También puede ser un título simple para portales de un solo idioma.
* **comment: TemplateTitleCourseTitleDescription:** una variable de lenguaje para la descripción
* **image: coursetitle.gif:** una imagen para representar la plantilla en la columna izquierda. Esta imagen se encuentra en app/home/default_platform_document/template_thumb/
* **content:** ... contenido en HTML ... (de tu propia plantilla)

