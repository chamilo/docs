# Configuración del curso

La configuración del curso le permite controlar cómo se comporta su curso: quién puede acceder a él, cómo se muestra y qué funciones están habilitadas.

Para acceder a la configuración del curso, entre en su curso y haga clic en el icono **Configuración** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Configuración" data-size="line"> junto al botón **Cambiar a vista de estudiante**.

## Configuración general

### Información del curso

* **Título del curso** — El nombre visible de su curso
* **Idioma del curso** — El idioma principal de la interfaz del curso
* **Categoría del curso** — La categoría bajo la cual aparece el curso en el catálogo
* **Imagen del curso** — Suba una miniatura que represente su curso en los listados (se redimensionará según el contexto)

El código del curso (el identificador único corto) se establece al crear el curso y no es editable desde esta página.

Por defecto, todos los usuarios que entren en su curso verán toda la interfaz de Chamilo en el idioma de su curso. Se trata de una función inmersiva. Los administradores pueden cambiar este comportamiento, pero usted también puede cambiarlo con una de las primeras opciones: **Mostrar el curso en el idioma del usuario** (establecida en No por defecto) si considera que esto dificulta demasiado el uso para sus usuarios.

El departamento y la URL del departamento son campos obsoletos. Solo se mantienen por razones de compatibilidad con versiones anteriores.

Si está habilitada, puede cambiar el estilo dentro de su curso con la opción **Hojas de estilo**, utilizando las hojas de estilo existentes en su portal. Esta opción suele estar deshabilitada por los administradores, para un diseño global más integrado.

### Cuota de disco

Cada curso tiene un límite de almacenamiento (cuota de disco) para los archivos subidos. La cuota la establece el administrador de la plataforma. Puede ver su límite actual en la configuración del curso y el uso actual en la herramienta **Documentos**.

> Si se está quedando sin espacio, contacte con el administrador de la plataforma para solicitar un aumento de cuota, o elimine archivos no utilizados de la herramienta Documentos.

### Visibilidad del curso

![La configuración de visibilidad del curso mostrando las opciones público, abierto, registrado y cerrado](/.gitbook/assets/course-settings-visibility.png)

Controle quién puede acceder a su curso:

| Configuración | Descripción |
|---------|-------------|
| **Público** | Cualquiera, incluidos los visitantes anónimos, puede acceder al curso |
| **Abierto a la plataforma** | Todos los usuarios registrados en la plataforma pueden acceder al curso |
| **Privado — acceso concedido por usuarios privilegiados** | Solo los usuarios inscritos explícitamente en el curso pueden acceder a él |
| **Cerrado** | El curso está bloqueado; nadie puede acceder a él excepto el profesor |

#### Configuración de inscripción

Según la configuración de su plataforma, es posible que pueda controlar:

* **Permitir autoinscripción** — Si los alumnos pueden suscribirse ellos mismos a través del catálogo de cursos
* **Permitir autodesuscripción** — Si los alumnos pueden abandonar el curso por sí mismos
* **Contraseña de inscripción** — Exigir una contraseña para la autoinscripción (útil para restringir el acceso a un grupo específico), pero el nivel de seguridad es bajo, ya que la misma contraseña de acceso al curso se comparte entre todos los usuarios.

Estos ajustes solo cubren la autoinscripción. Para una visión completa —incluida la inscripción de un usuario existente por su parte, o la invitación de alguien que aún no tiene una cuenta en la plataforma— consulte [Inscribir usuarios](../assessing-learners/subscribing-users.md).

### Configuración de documentos

Elija si mostrar u ocultar las carpetas del sistema en la herramienta **Documentos** (ocultas por defecto; en la mayoría de los casos no las necesita realmente y mostrarlas podría causar problemas con contenido oculto y con los alumnos).

### Configuración de notificaciones por correo electrónico

Configure cómo la actividad del curso dispara notificaciones:

* **Notificaciones por correo electrónico de contenido nuevo** — Notificar a los usuarios inscritos cuando añada documentos nuevos, anuncios u otro contenido

### Configuración del chat

Controle cómo se mostrará la herramienta **Chat**.

### Configuración de itinerarios de aprendizaje

* **Habilitar temas del curso** — Permitir que los itinerarios de aprendizaje cambien de apariencia (no recomendado para una experiencia de usuario integrada)
* **Enlace de retorno del itinerario de aprendizaje** — Decida dónde llegan los usuarios cuando hacen clic en el icono **Inicio** de un itinerario de aprendizaje: la lista de itinerarios de aprendizaje, la página de inicio del curso, *Mis cursos*, *Mis sesiones* o la página de inicio del portal

### Configuración del avance temático

Configure cómo aparecerán los mensajes de avance temático en la página de inicio del curso.

### Configuración del foro

Controle el comportamiento de la herramienta de foro de este curso.

### Configuración de tareas

* **Configuración predeterminada de la visibilidad de los archivos recién publicados** — Decida si los documentos nuevos subidos por los alumnos en la herramienta **Tareas** se comparten con todos los demás alumnos (No por defecto)
* **Permitir a los alumnos eliminar sus propias publicaciones** — Permitir a los alumnos eliminar las tareas que ya han subido (por si desean subir una corrección).

### Configuración de inicio automático

Un curso puede configurarse con un comportamiento de inicio automático, que acortará el camino de los alumnos para llegar a las partes importantes de su curso. Si está habilitado, los alumnos que entren en su curso serán enviados directamente a la herramienta seleccionada y no verán la página de inicio del curso como un paso intermedio. Incluso puede seleccionar lecciones o ejercicios específicos para lanzar al llegar al curso. En este caso, debe seleccionar la opción aquí, luego ir a la lista de lecciones o ejercicios y hacer clic en el icono del cohete <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Inicio automático" data-size="line"> del elemento seleccionado.

### Configuración de asistentes de IA

Esta sección solo aparece si su administrador ha habilitado las herramientas de IA en la plataforma. Le permite refinar la selección de servicios de asistencia de IA disponibles a través de las distintas herramientas de su plataforma Chamilo. Desactívelos si no desea utilizarlos, pero eso probablemente sería una mala idea, ya que son muy potentes.

Estas funcionalidades se explican en la sección **Herramientas de IA** de esta guía.

### Herramientas externas (LTI)

Si está habilitado en su plataforma, Learning Tools Integration le permite integrar actividades externas compatibles en este curso, como iconos individuales en la página de inicio del curso. Tratar LTI queda fuera del alcance de esta guía, pero se trata de un potente sistema de integración para los docentes.

### Otros

En esta página pueden aparecer secciones u opciones adicionales en función de las opciones y versiones de Chamilo.