# Roles de usuario

Chamilo utiliza un sistema de permisos basado en roles. A cada usuario se le asigna un rol que determina qué puede ver y hacer en la plataforma.

## Roles a nivel de plataforma

Estos roles controlan el acceso a las funcionalidades de toda la plataforma:

| Role |  Description |
|------|------------|
| **Learner (Student)** | El rol predeterminado. Puede inscribirse en cursos, acceder al contenido de aprendizaje, entregar tareas y realizar ejercicios. |
| **Teacher (Trainer)** | Puede crear y gestionar cursos, añadir contenido, calificar a los estudiantes y consultar informes a nivel de curso. |
| **Sessions Administrator** | Puede crear y gestionar sesiones (es decir, paquetes de cursos con un marco temporal), inscribir usuarios en sesiones y asignar tutores. No puede acceder a la configuración general de la plataforma. |
| **Human Resources Manager (HRM)** | Puede consultar datos de seguimiento e informes de los usuarios asignados. Se utiliza para supervisores que necesitan monitorizar la formación de los empleados, pero no gestionar el contenido ni la plataforma. |
| **Portal Administrator** | Acceso completo a todas las funciones de administración de la plataforma. Puede gestionar usuarios, cursos, sesiones, plugins y todos los ajustes. |
| **Global Administrator** | Igual que Portal Administrator, pero con acceso a todas las URL de acceso en una configuración multi-URL (es decir, multiinquilino) o, si está registrado en una URL que no es la raíz, limitado a la rama de esa URL. Consulte [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | Un rol especial para visitantes que no han iniciado sesión. Puede acceder a cursos y contenidos públicos si está habilitado. |

## Roles a nivel de curso

Dentro de un curso, los usuarios tienen roles específicos:

| Role | Description |
|------|-------------|
| **Student** | Rol predeterminado del curso. Puede acceder al contenido, realizar ejercicios y entregar tareas. |
| **Course assistant** | Tiene permisos de gestión limitados dentro del curso. Puede ayudar a gestionar el contenido y moderar foros. |
| **Teacher** | Control total sobre el curso: gestionar contenido, herramientas, ajustes e inscripciones. |

## Roles a nivel de sesión

Dentro de una sesión existen roles adicionales:

| Role | Description |
|------|-------------|
| **Session tutor** | Supervisa todos los cursos de una sesión. Puede consultar el seguimiento de todos los cursos de la sesión. |
| **Course tutor** | Imparte un curso concreto dentro de una sesión. Puede gestionar el contenido y hacer el seguimiento de los alumnos de ese curso en esa sesión. |

Nota: Este rol se denominaba «coach» en las versiones de Chamilo anteriores a la 3.0. A partir de Chamilo 3.0, «coach» se ha sustituido por «tutor» en toda la interfaz y la documentación de la plataforma: un tutor es una persona que acompaña a los alumnos a lo largo de un curso, no un entrenador personal. Los nombres internos de los ajustes en `Configuration settings` siguen conteniendo «coach» por compatibilidad hacia atrás (por ejemplo `add_users_by_coach`), pero sus etiquetas ahora indican «tutor».

## Asignación de roles

Al crear o editar una cuenta de usuario en el panel de administración, se selecciona su rol a nivel de plataforma. Los roles de curso y de sesión se asignan al inscribir usuarios en cursos o sesiones.

## Jerarquía de roles

Los roles con más privilegios heredan las capacidades de los roles con menos privilegios:

* Un administrador puede hacer todo lo que puede hacer un profesor
* Un profesor puede hacer todo lo que puede hacer un estudiante
* Los roles a nivel de sesión (tutor) aportan capacidades adicionales solo dentro de la sesión asignada

## Consejos

* **Aplique el principio de mínimo privilegio** — Asigne a los usuarios el rol mínimo que necesiten para realizar sus tareas
* **Utilice Sessions Administrators para la gestión delegada** — Si tiene personal que debe gestionar sesiones de formación pero no toda la plataforma, asígneles el rol Sessions Administrator en lugar de acceso de administrador completo
* **Utilice HRM para supervisores** — Los Human Resources Managers pueden monitorizar el progreso de la formación sin tener acceso para modificar cursos ni la configuración de la plataforma
* **Creación de roles** — Chamilo 3.x tiene lista la estructura interna para la creación de nuevos roles, pero la funcionalidad carece de más pruebas para una publicación amplia. Puede habilitarse a través de [proveedores oficiales de Chamilo](https://chamilo.org/providers).