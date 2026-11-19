# Cliente IMS/LTI

Cliente IMS/LTI <img src="../../.gitbook/assets/icons/mdi-link-variant.svg" alt="Cliente IMS/LTI" data-size="line"> le permite iniciar una herramienta externa o un proveedor de contenidos desde su curso mediante el estándar LTI (versiones 1.1 y 1.3); por ejemplo, un libro de texto interactivo de una editorial, una herramienta de simulación especializada u otra plataforma compatible con LTI. Chamilo actúa como la plataforma de lanzamiento; el servicio externo es la «herramienta».

## Acceso a la herramienta

Una vez habilitada, aparece un botón **Configurar herramientas externas** en la sección **Configuración** <img src="../../.gitbook/assets/icons/mdi-cog.svg" alt="Configuración" data-size="line"> de su curso. Desde allí puede:

* **Añadir una nueva herramienta externa** — Regístrela usted mismo: nombre, URL de lanzamiento, versión de LTI y las credenciales que le proporcionó el servicio externo (ID de cliente/claves para LTI 1.3, o una clave de consumidor y un secreto para LTI 1.1)
* **Añadir una herramienta global existente** — Si su administrador ya ha registrado una herramienta para toda la plataforma, añádala a su curso en lugar de crear su propia conexión

Una vez añadida, la herramienta aparece como una herramienta o acceso directo habitual en la página de inicio de su curso.

## Qué puede configurar

Para una herramienta que haya registrado usted mismo: si se abre en un iframe o en una ventana nueva, si se comparten con el servicio externo el nombre, el correo electrónico y la imagen del estudiante, los parámetros de lanzamiento personalizados y (para LTI 1.3) la compatibilidad con Deep Linking. Si la herramienta admite el servicio Assignment and Grades, también puede crear una columna vinculada en el libro de calificaciones para que las puntuaciones que informe se incorporen al libro de calificaciones de Chamilo.

Para una herramienta añadida a partir de una definición «global» de toda la plataforma, solo puede ajustar estas opciones de presentación y privacidad a nivel de curso: las credenciales de conexión pertenecen a quien registró la herramienta base (normalmente su administrador).

## Consejos

* **Obtenga primero las credenciales del proveedor de la herramienta** — Necesitará la URL de lanzamiento y los datos de cliente/clave de LTI 1.3 o una clave de consumidor y un secreto de LTI 1.1 antes de poder registrar una nueva herramienta
* **Sea deliberado con lo que comparte** — Active el uso compartido del nombre, el correo electrónico o la imagen de un estudiante con un servicio externo solo si la herramienta realmente lo necesita
* **Consulte a su administrador sobre las herramientas globales** — Si la misma herramienta externa se utiliza en muchos cursos, un registro para toda la plataforma evita que cada docente configure su propia conexión por separado