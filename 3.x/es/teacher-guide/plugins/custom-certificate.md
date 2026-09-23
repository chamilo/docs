# Certificado personalizado

El complemento Certificado personalizado <img src="../../.gitbook/assets/icons/mdi-certificate.svg" alt="Certificado personalizado" data-size="line"> le permite sustituir el [certificado del cuaderno de calificaciones](../assessing-learners/gradebook.md) estándar por su propio diseño: logotipos, un sello, hasta cuatro imágenes de firma con leyendas, una imagen de fondo, márgenes y contenido construido a partir de etiquetas de marcador de posición.

## Activarlo en su curso

Después de que el administrador habilite el complemento y configure una plantilla predeterminada, actívelo por curso desde **Configuración del curso**:

* **Custom certificate enable in course** — Activa la función para este curso
* **Use default custom certificate** — Utiliza la plantilla predeterminada de la plataforma en lugar de diseñar la suya (estas dos opciones son mutuamente excluyentes; Chamilo le avisa si intenta activar ambas)

Esto pone a disposición en su curso una herramienta **Certificate setting**, donde diseña o edita la plantilla.

## Diseño del certificado

El editor de certificados utiliza etiquetas que se sustituyen por datos reales cuando se genera el certificado de un alumno, por ejemplo `((user_firstname))`, `((course_title))`, `((gradebook_grade))` y `((date_certificate))`. Además del contenido, puede configurar:

* Hasta tres logotipos, una imagen de sello y una imagen de fondo
* Hasta cuatro imágenes de firma, cada una con su propia leyenda
* Márgenes y la fecha y el lugar de entrega/expedición que se muestran en el certificado

Utilice **Certificate** para previsualizar su diseño, o **Delete certificate** para eliminar la plantilla personalizada de un curso.

## Consejos

* **Los estudiantes no ven nada distinto** — Siguen descargando su certificado de la forma habitual desde el cuaderno de calificaciones; simplemente se usa su plantilla
* **Previsualice antes de confiar en él** — Compruebe la vista previa con datos reales de los marcadores de posición para detectar problemas de maquetación antes de que los alumnos empiecen a generar certificados
* **Coordínese con su administrador** — Si desea una plantilla predeterminada para toda la plataforma en lugar de una puntual por curso, primero la configura su administrador