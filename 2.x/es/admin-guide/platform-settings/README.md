# Configuraciones de la Plataforma

Chamilo cuenta con un extenso sistema de configuración con ajustes organizados en categorías. El conjunto completo de categorías a continuación refleja la página de **Configuraciones** en el panel de administración — y el archivo subyacente `SettingsCurrentFixtures.php` en el código fuente, que es la fuente de verdad para los nombres de variables, títulos y descripciones.

Accede a las configuraciones de la plataforma desde el panel de administración haciendo clic en **Configuraciones**.

![Página de configuraciones de la plataforma mostrando categorías organizadas por área funcional](/.gitbook/assets/admin-settings-categories.png)

## Todas las categorías

Hay un total de **39 categorías de configuración**, listadas alfabéticamente a continuación. El número después de cada enlace indica la cantidad de ajustes en esa categoría.

### A nivel de plataforma

* **[Identidad del Administrador](admin-settings.md)** (12) — Identidad y detalles de contacto del administrador de la plataforma.
* **[Plataforma](platform-settings.md)** (29) — Identidad a nivel de plataforma, zona horaria, política de registro, usuarios en línea, indicadores de rendimiento.
* **[Visualización](display-settings.md)** (24) — Diseño de la página de inicio, gravatar, menús, comportamiento de la marca.
* **[Editor](editor-settings.md)** (26) — Barras de herramientas del editor de texto enriquecido (TinyMCE), complementos, asistentes de IA.
* **[Idiomas](language-settings.md)** (12) — Idiomas disponibles, idioma predeterminado, opciones de respaldo.
* **[Correo](mail-settings.md)** (18) — Diseño del correo saliente, identidad del remitente, firma.
* **[Flujos de Trabajo](workflows-settings.md)** (23) — Interruptores de flujos de trabajo transversales (creación de cursos, validación de inscripción…).

### Autenticación, seguridad y privacidad

* **[Seguridad](security-settings.md)** (31) — Protección de inicio de sesión, política de contraseñas, encabezados, autenticación de dos factores (2FA), IDS.
* **[Registro](registration-settings.md)** (20) — Política de auto-registro y redirecciones posteriores al registro.
* **[Privacidad](privacy-settings.md)** (6) — Consentimiento, exportación de datos, solicitudes de eliminación de cuentas.
* **[CAS](cas-settings.md)** (7) — Configuración heredada de CAS proveniente de la versión 1.x.

### Ciclo de vida de cursos y sesiones

* **[Curso](course-settings.md)** (45) — Valores predeterminados y políticas que se aplican a los cursos en toda la plataforma.
* **[Sesiones](session-settings.md)** (68) — Ciclo de vida de las sesiones, ventanas de acceso para entrenadores, visibilidad.
* **[Catálogo de Cursos](catalog-settings.md)** (13) — Comportamiento del catálogo público de cursos.
* **[Perfil](profile-settings.md)** (29) — Campos que aparecen en el perfil del usuario.

### Herramientas de curso

* **[Agenda](agenda-settings.md)** (11)
* **[Anuncios](announcement-settings.md)** (9)
* **[Tareas (Trabajos)](work-settings.md)** (12)
* **[Asistencia](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documentos](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Ejercicios (Pruebas)](exercise-settings.md)** (63)
* **[Foros](forum-settings.md)** (9)
* **[Glosario](glossary-settings.md)** (3)
* **[Grupos](group-settings.md)** (3)
* **[Rutas de Aprendizaje](lp-settings.md)** (51)
* **[Encuestas](survey-settings.md)** (12)

### Evaluación y reconocimiento

* **[Libro de Calificaciones (Evaluaciones)](gradebook-settings.md)** (34) — Visualización de puntajes, decimales, umbrales para certificados.
* **[Certificados](certificate-settings.md)** (9) — Valores predeterminados aplicados cuando un estudiante obtiene un certificado.
* **[Habilidades](skill-settings.md)** (13) — Árbol de habilidades, reglas de otorgamiento, integración con el perfil.
* **[Seguimiento](tracking-settings.md)** (10) — Qué se registra, qué informes se exponen.

### Comunicación y comunidad

* **[Mensajería](message-settings.md)** (7)
* **[Red Social](social-settings.md)** (7)

### IA

* **[Asistentes de IA](ai-helpers-settings.md)** (13) — Proveedores por tipo de tarea (texto, imagen, video, tutor, calificación).

### Operaciones e integración

* **[Tareas Cron](crons-settings.md)** (3)
* **[Búsqueda](search-settings.md)** (3) — Configuración de búsqueda de texto completo con Xapian.
* **[Tickets](ticket-settings.md)** (7) — Sistema de mesa de ayuda.
* **[Servicios Web](webservice-settings.md)** (7) — Puntos finales SOAP/REST heredados.

## Cómo funcionan las configuraciones

* Las configuraciones se almacenan en la base de datos (tabla `settings`) y se gestionan a través de la interfaz web.
* Algunas configuraciones están **bloqueadas por URL** en configuraciones de múltiples URL (su valor se aplica a toda la plataforma y no puede ser sobrescrito por URL - consulta las columnas `access_url_locked` y `access_url_changeable` en la tabla `settings`); otras (la mayoría) pueden ser sobrescritas por URL de acceso.
* Los cambios surten efecto de inmediato (no se requiere reiniciar el servidor), aunque tu sesión de usuario podría estar manteniendo algunos de ellos en memoria. Si los cambios no se reflejan de inmediato, cierra sesión y vuelve a iniciar sesión para limpiar tu sesión.
* Algunas configuraciones tienen dependencias — cambiar una puede afectar el comportamiento de otras.
* Los nombres de variables mostrados en cada página (por ejemplo, `2fa_enable`) coinciden con la fila en la tabla de base de datos `settings` (columna `variable`) y las claves utilizadas en las sobrescrituras (`config/settings_overrides.yaml`) cuando corresponda.

Para más información, consulta [Configuraciones](https://github.com/chamilo/chamilo-lms/wiki/Configurations) en nuestra wiki.

---
## Consejos

* **Documente sus configuraciones** — Mantenga un registro de las configuraciones no predeterminadas y el motivo por el que las cambió
* **Cambie una cosa a la vez** — Al solucionar problemas, modifique una configuración a la vez para poder identificar el efecto
* **Pruebe en un entorno de prueba** — Para cambios significativos en las configuraciones, pruebe primero en un servidor de prueba