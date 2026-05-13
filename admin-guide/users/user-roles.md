# Roles de Usuario

Chamilo utiliza un sistema de permisos basado en roles. Cada usuario tiene asignado un rol que determina lo que puede ver y hacer en la plataforma.

## Roles a Nivel de Plataforma

Estos roles controlan el acceso a las funcionalidades de toda la plataforma:

| Rol | Descripción |
|------|------------|
| **Aprendiz (Estudiante)** | El rol predeterminado. Puede inscribirse en cursos, acceder a contenido de aprendizaje, enviar tareas y realizar ejercicios. |
| **Profesor (Formador)** | Puede crear y gestionar cursos, agregar contenido, calificar a los estudiantes y ver informes a nivel de curso. |
| **Administrador de Sesiones** | Puede crear y gestionar sesiones (es decir, paquetes de cursos basados en tiempo), inscribir usuarios en sesiones y asignar tutores. No puede acceder a la configuración general de la plataforma. |
| **Gestor de Recursos Humanos (HRM)** | Puede ver datos de seguimiento e informes de los usuarios asignados. Utilizado para supervisores que necesitan monitorear la formación de empleados, pero no gestionar contenido ni la plataforma. |
| **Administrador del Portal** | Acceso completo a todas las funciones de administración de la plataforma. Puede gestionar usuarios, cursos, sesiones, complementos y todas las configuraciones. |
| **Administrador Global** | Igual que el Administrador del Portal, pero con acceso a todas las URLs de acceso en una configuración multi-URL (es decir, multi-tenant). |
| **Anónimo** | Un rol especial para visitantes que no han iniciado sesión. Puede acceder a cursos y contenido público si está habilitado. |

## Roles a Nivel de Curso

Dentro de un curso, los usuarios tienen roles específicos:

| Rol | Descripción |
|------|-------------|
| **Estudiante** | Rol predeterminado del curso. Puede acceder al contenido, realizar ejercicios y enviar tareas. |
| **Asistente de Curso** | Tiene permisos de gestión limitados dentro del curso. Puede ayudar a gestionar contenido y moderar foros. |
| **Profesor** | Control total sobre el curso: gestionar contenido, herramientas, configuraciones e inscripciones. |

## Roles a Nivel de Sesión

Dentro de una sesión, existen roles adicionales:

| Rol | Descripción |
|------|-------------|
| **Tutor de Sesión** | Supervisa todos los cursos dentro de una sesión. Puede ver el seguimiento en todos los cursos de la sesión. |
| **Tutor de Curso** | Enseña un curso específico dentro de una sesión. Puede gestionar contenido y realizar seguimiento de los aprendices para ese curso en esa sesión. |

Nota: Los términos "coach" y "tutor" son muy similares en significado y generalmente dependen de la organización. En Chamilo 2.0 usamos ambos términos indistintamente, pero la mayoría de las veces nos referimos a "tutor", una persona que ayudará a aprender del curso, no un entrenador personal. Es posible que en el futuro usemos exclusivamente "tutor".

## Asignación de Roles

Al crear o editar una cuenta de usuario en el panel de administración, se selecciona su rol a nivel de plataforma. Los roles de curso y sesión se asignan al inscribir a los usuarios en cursos o sesiones.

## Jerarquía de Roles

Los roles con mayores privilegios heredan las capacidades de los roles con menores privilegios:

* Un administrador puede hacer todo lo que un profesor puede hacer.
* Un profesor puede hacer todo lo que un estudiante puede hacer.
* Los roles a nivel de sesión (tutor) proporcionan capacidades adicionales solo dentro de la sesión asignada.

## Consejos

* **Utilice el principio de privilegio mínimo** — Asigne a los usuarios el rol mínimo que necesiten para realizar sus tareas.
* **Utilice Administradores de Sesiones para gestión delegada** — Si tiene personal que necesita gestionar sesiones de formación pero no toda la plataforma, otórgueles el rol de Administrador de Sesiones en lugar de acceso completo de administrador.
* **Utilice HRM para supervisores** — Los Gestores de Recursos Humanos pueden monitorear el progreso de la formación sin tener acceso para modificar cursos o configuraciones de la plataforma.
* **Creación de roles** — Chamilo 2.x tiene la estructura interna lista para la creación de nuevos roles, pero la funcionalidad aún necesita más pruebas para un lanzamiento amplio. Puede habilitarse a través de [Proveedores oficiales de Chamilo](https://chamilo.org/providers).