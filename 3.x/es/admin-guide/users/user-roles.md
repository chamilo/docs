# Roles de usuario

Chamilo utiliza un sistema de permisos basado en roles. A cada usuario se le asigna un rol que determina qué puede ver y hacer en la plataforma.

## Roles a nivel de plataforma

Estos roles controlan el acceso a las funciones de toda la plataforma:

| Rol |  Descripción |
|------|------------|
| **Aprendiz (Estudiante)** | El rol predeterminado. Puede inscribirse en cursos, acceder al contenido de aprendizaje, entregar tareas y realizar ejercicios. |
| **Docente (Formador)** | Puede crear y gestionar cursos, añadir contenido, calificar a los estudiantes y consultar informes a nivel de curso. |
| **Administrador de sesiones** | Puede crear y gestionar sesiones (es decir, paquetes de cursos basados en el tiempo), inscribir usuarios en sesiones y asignar tutores. No puede acceder a la configuración general de la plataforma. |
| **Responsable de recursos humanos (HRM)** | Puede consultar datos de seguimiento e informes de los usuarios asignados. Se utiliza para supervisores que necesitan supervisar la formación de los empleados, pero no gestionar el contenido ni la plataforma. |
| **Administrador del portal** | Acceso completo a todas las funciones de administración de la plataforma. Puede gestionar usuarios, cursos, sesiones, plugins y toda la configuración. |
| **Administrador global** | Igual que el administrador del portal, pero con acceso a todas las URL de acceso en una configuración multi-URL (es decir, multiinquilino) o, si está registrado en una URL que no es la raíz, limitado únicamente a la rama de esa URL. Consulte [Administradores de subárbol](../multi-url/access-urls.md#subtree-administrators). |
| **Anónimo** | Un rol especial para visitantes que no han iniciado sesión. Puede acceder a cursos y contenidos públicos si está habilitado. |

## Roles a nivel de curso

Dentro de un curso, los usuarios tienen roles específicos:

| Rol | Descripción |
|------|-------------|
| **Estudiante** | Rol de curso predeterminado. Puede acceder al contenido, realizar ejercicios y entregar tareas. |
| **Asistente de curso** | Tiene permisos de gestión limitados dentro del curso. Puede ayudar a gestionar el contenido y moderar los foros. |
| **Docente** | Control total sobre el curso: gestionar contenido, herramientas, configuración e inscripciones. |

## Roles a nivel de sesión

Dentro de una sesión existen roles adicionales:

| Rol | Descripción |
|------|-------------|
| **Tutor de sesión** | Supervisa todos los cursos de una sesión. Puede consultar el seguimiento de todos los cursos de la sesión. |
| **Tutor de curso** | Imparte un curso específico dentro de una sesión. Puede gestionar el contenido y hacer el seguimiento de los aprendices de ese curso en esa sesión. |

Nota: Este rol se denominaba «coach» en las versiones de Chamilo anteriores a la 3.0. A partir de Chamilo 3.0, «coach» se ha sustituido por «tutor» en toda la interfaz y la documentación de la plataforma: un tutor es una persona que ayuda a los aprendices a lo largo de un curso, no un coach personal. Los nombres de configuración subyacentes en `Configuration settings` siguen conteniendo «coach» por compatibilidad con versiones anteriores (por ejemplo, `add_users_by_coach`), pero sus etiquetas ahora indican «tutor».

## Terminología de HRM y compatibilidad

Chamilo 3.x utiliza **HRM** (Human Resources Manager) en lugar de la designación anterior **DRH**. Las relaciones de RR. HH. y las asignaciones de sesión existentes conservan sus valores almacenados; el cambio no crea un rol distinto ni exige reasignar usuarios. Algunas integraciones y entradas de configuración más antiguas pueden seguir utilizando `DRH` o `ROLE_DRH`; el rol actual es `ROLE_HR`, con gestión de compatibilidad para las referencias heredadas.

Para una configuración nueva, utilice `HRM` en los ajustes indexados por rol, como `registration.redirect_after_login` y `security.mcp_allowed_roles`. La clave anterior `DRH` sigue aceptándose en las configuraciones existentes, pero `HRM` tiene prioridad cuando se proporcionan ambas claves. Los ajustes canónicos de la plataforma son `registration.hrm_autosubscribe`, `session.hrm_can_access_all_session_content` y `workflows.hrm_allow_access_to_all_students`; las claves heredadas `drh_*` siguen reconociéndose por compatibilidad.

Consulte [Configuración de registro](../platform-settings/registration-settings.md), [Configuración de sesiones](../platform-settings/session-settings.md) y [Configuración de flujos de trabajo](../platform-settings/workflows-settings.md) para obtener detalles de configuración.

## Asignación de roles

Al crear o editar una cuenta de usuario en el panel de administración, se selecciona su rol a nivel de plataforma. Los roles de curso y de sesión se asignan al inscribir a los usuarios en cursos o sesiones.

## Jerarquía de roles

Los roles con mayores privilegios heredan las capacidades de los roles con menores privilegios:

* Un administrador puede hacer todo lo que puede hacer un docente
* Un docente puede hacer todo lo que puede hacer un estudiante
* Los roles a nivel de sesión (tutor) proporcionan capacidades adicionales únicamente dentro de la sesión asignada

## Consejos

* **Aplique el principio de mínimo privilegio** — Asigne a los usuarios el rol mínimo que necesiten para realizar sus tareas
* **Utilice Administradores de sesiones** para la gestión delegada — Si dispone de personal que necesita gestionar sesiones de formación, pero no toda la plataforma, asígneles el rol de Administrador de sesiones en lugar de un acceso de administrador completo
* **Utilice HRM para los supervisores** — Los gestores de recursos humanos pueden supervisar el progreso de la formación sin tener acceso para modificar cursos ni la configuración de la plataforma
* **Creación de roles** — Chamilo 3.x dispone de la estructura interna preparada para la creación de nuevos roles, pero la funcionalidad requiere más pruebas antes de un lanzamiento generalizado. Puede habilitarse a través de los [Proveedores oficiales de Chamilo](https://chamilo.org/providers).