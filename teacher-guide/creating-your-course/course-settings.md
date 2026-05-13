# Configuración del Curso

La configuración del curso te permite controlar cómo se comporta tu curso: quién puede acceder a él, cómo se muestra y qué funciones están habilitadas.

Para acceder a la configuración del curso, ingresa a tu curso y haz clic en el ícono de **Configuración** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Configuración" data-size="line"> junto al botón **Cambiar a vista de estudiante**.

## Configuraciones Generales

### Información del Curso

* **Título del curso** — El nombre que se muestra para tu curso
* **Idioma del curso** — El idioma principal de la interfaz del curso
* **Categoría del curso** — La categoría bajo la cual aparece el curso en el catálogo
* **Imagen del curso** — Sube una miniatura que represente tu curso en los listados de cursos (se redimensionará según el contexto)

El código del curso (el identificador único corto) se establece al crear el curso y no es editable desde esta página.

Por defecto, todos los usuarios que ingresen a tu curso verán toda la interfaz de Chamilo en el idioma de tu curso. Esta es una característica inmersiva. Los administradores pueden cambiar este comportamiento, pero tú también puedes modificarlo con una de las primeras opciones: **Mostrar el curso en el idioma del usuario** (establecido en No por defecto) si consideras que esto dificulta la experiencia de tus usuarios.

Los campos de departamento y URL del departamento están obsoletos. Solo se mantienen por razones de soporte heredado.

Si está habilitado, puedes cambiar el estilo dentro de tu curso con la opción **Hojas de estilo**, utilizando hojas de estilo existentes en tu portal. Esta opción a menudo está deshabilitada por los administradores para un diseño global más integrado.

### Cuota de Disco

Cada curso tiene un límite de almacenamiento (cuota de disco) para los archivos subidos. La cuota es establecida por el administrador de la plataforma. Puedes ver tu límite actual en la configuración del curso y el uso actual en la herramienta **Documentos**.

> Si te estás quedando sin espacio, contacta a tu administrador de la plataforma para solicitar un aumento de cuota o elimina archivos no utilizados desde la herramienta Documentos.

### Visibilidad del Curso

![Las configuraciones de visibilidad del curso mostrando las opciones público, abierto, registrado y cerrado](/.gitbook/assets/course-settings-visibility.png)

Controla quién puede acceder a tu curso:

| Configuración | Descripción |
|---------------|-------------|
| **Público** | Cualquier persona, incluidos los visitantes anónimos, puede acceder al curso |
| **Abierto a la plataforma** | Todos los usuarios registrados en la plataforma pueden acceder al curso |
| **Privado — acceso otorgado por usuarios privilegiados** | Solo los usuarios inscritos explícitamente en el curso pueden acceder a él |
| **Cerrado** | El curso está bloqueado; nadie puede acceder a él excepto el profesor |

#### Configuraciones de Inscripción

Dependiendo de la configuración de tu plataforma, es posible que puedas controlar:

* **Permitir auto-inscripción** — Si los estudiantes pueden inscribirse por sí mismos a través del catálogo de cursos
* **Permitir auto-desinscripción** — Si los estudiantes pueden abandonar el curso por su cuenta
* **Contraseña de inscripción** — Exigir una contraseña para la auto-inscripción (útil para restringir el acceso a un grupo específico), aunque el nivel de seguridad es bajo ya que la misma contraseña de acceso al curso se comparte entre todos los usuarios.

### Configuraciones de Documentos

Elige si mostrar u ocultar las carpetas del sistema en la herramienta **Documentos** (ocultas por defecto, en la mayoría de los casos no las necesitas y mostrarlas podría causar problemas con contenido oculto y estudiantes).

### Configuraciones de Notificaciones por Correo Electrónico

Configura cómo las actividades del curso activan notificaciones:

* **Notificaciones por correo electrónico para nuevo contenido** — Notificar a los usuarios inscritos cuando añadas nuevos documentos, anuncios u otro contenido

### Configuraciones de Chat

Controla cómo se mostrará la herramienta **Chat**.

### Configuraciones de Rutas de Aprendizaje

* **Habilitar temas del curso** — Permitir que las rutas de aprendizaje cambien de apariencia (no recomendado para una experiencia de usuario integrada)
* **Enlace de retorno de la ruta de aprendizaje** — Decide a dónde llegan los usuarios cuando hacen clic en el ícono **Inicio** en una ruta de aprendizaje: la lista de rutas de aprendizaje, la página principal del curso, *Mis cursos*, *Mis sesiones* o la página principal del portal

### Configuraciones de Avance Temático

Configura cómo aparecerán los mensajes de avance temático en la página principal del curso.

### Configuraciones del Foro

Controla el comportamiento en la herramienta de foro de este curso.

### Configuraciones de Tareas

* **Configuración predeterminada para la visibilidad de archivos recién publicados** — Decide si los nuevos documentos subidos por los estudiantes en la herramienta **Tareas** se comparten con todos los demás estudiantes (No por defecto)
* **Permitir a los estudiantes eliminar sus propias publicaciones** — Permitir a los estudiantes eliminar las tareas que ya han subido (en caso de que deseen subir una corrección).

---
### Configuración de Lanzamiento Automático

Un curso puede configurarse para tener un comportamiento de lanzamiento automático, lo que acortará el camino de los estudiantes para llegar a las partes importantes de su curso. Si está habilitado, los estudiantes que ingresen a su curso serán dirigidos directamente a la herramienta seleccionada y no verán la página de inicio del curso como un paso intermedio. Incluso puede seleccionar rutas de aprendizaje o ejercicios específicos para que se lancen al llegar al curso. En este caso, debe seleccionar la opción aquí, luego ir a la lista de rutas de aprendizaje o ejercicios y hacer clic en el ícono de cohete <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Lanzamiento automático" data-size="line"> en el elemento seleccionado.

### Configuración de Asistentes de IA

Esta sección solo aparece si su administrador ha habilitado herramientas de IA en la plataforma. Le permite ajustar la selección de servicios de asistencia de IA disponibles a través de diferentes herramientas de su plataforma Chamilo. Desactívelas si no desea usarlas, aunque probablemente sería una mala idea, ya que estas herramientas son muy poderosas.

Estas funcionalidades se explican en la sección **Herramientas de IA** de esta guía.

### Herramientas Externas (LTI)

Si está habilitado en su plataforma, la Integración de Herramientas de Aprendizaje (LTI) le permite integrar actividades externas compatibles en este curso, como íconos individuales en la página de inicio del curso. Hablar sobre LTI está fuera del alcance de esta guía, pero es un sistema de integración muy potente para los docentes.

### Otros

Secciones u opciones adicionales podrían aparecer en esta página dependiendo de las opciones y versiones de Chamilo.