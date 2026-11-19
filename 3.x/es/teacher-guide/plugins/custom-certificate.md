# Certificado personalizado

El complemento Custom Certificate <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Certificado personalizado" data-size="line"> le permite sustituir el [certificado del libro de calificaciones](../assessing-learners/gradebook.md) estándar por su propio diseño: logotipos, un sello, hasta cuatro imágenes de firma con leyendas, una imagen de fondo, márgenes y contenido elaborado a partir de etiquetas de marcador de posición.

## Activarlo en su curso

Una vez que el administrador habilite el complemento y establezca una plantilla predeterminada, actívelo por curso desde **Configuración del curso**:

* **Activar certificado personalizado en el curso** — Activa la función para este curso
* **Usar el certificado personalizado predeterminado** — Utiliza la plantilla predeterminada de la plataforma en lugar de diseñar la suya propia (estas dos opciones son mutuamente excluyentes; Chamilo le advierte si intenta activar ambas)

Esto pone a su disposición la herramienta **Configuración del certificado** en su curso, donde diseña o edita la plantilla.

## Diseñar el certificado

El editor de certificados utiliza etiquetas que se sustituyen por datos reales cuando se genera el certificado de un estudiante, por ejemplo `((user_firstname))`, `((course_title))`, `((gradebook_grade))` y `((date_certificate))`. Además del contenido, puede configurar:

* Hasta tres logotipos, una imagen de sello y una imagen de fondo
* Hasta cuatro imágenes de firma, cada una con su propia leyenda
* Los márgenes y la fecha y el lugar de entrega/expedición que aparecen en el certificado

Utilice **Certificado** para previsualizar su diseño, o **Eliminar certificado** para quitar la plantilla personalizada de un curso.

## Consejos

* **Los estudiantes no notan ninguna diferencia** — Siguen descargando su certificado de la forma habitual desde el libro de calificaciones; simplemente utiliza su plantilla
* **Previsualice antes de confiar en él** — Compruebe la vista previa con datos reales de los marcadores de posición para detectar problemas de diseño antes de que los estudiantes empiecen a generar certificados
* **Coordínese con su administrador** — Si desea una plantilla predeterminada para toda la plataforma en lugar de una específica por curso, su administrador debe configurarla primero