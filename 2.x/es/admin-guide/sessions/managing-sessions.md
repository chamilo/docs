# Gestión de Sesiones

## Creación de una Sesión

![Formulario de creación de sesión con campos para nombre, fechas, entrenador, categoría y visibilidad](/.gitbook/assets/admin-session-create-form.png)

1. Desde el panel de administración, haz clic en **Crear una sesión**
2. Completa los detalles de la sesión:
   * **Nombre de la sesión** — Un nombre descriptivo (por ejemplo, "Incorporación Primavera 2026")
   * **Fechas de inicio y fin** — Cuándo se ejecuta la sesión (opcional — las sesiones pueden ser indefinidas). Hay 3 conjuntos de fechas: Fechas para mostrar, fechas para limitar el acceso de los estudiantes y fechas para limitar el acceso de los entrenadores
   * **Entrenador de la sesión** — La persona que supervisa toda la sesión
   * **Categoría** — Asigna a una categoría de sesión para organización
   * **Visibilidad** — Controla el comportamiento de acceso y listado
3. **Añadir cursos** — Selecciona uno o más cursos para incluir en la sesión
4. **Inscribir estudiantes** — Añade usuarios individuales o clases de usuarios
5. **Asignar entrenadores de curso** — Para cada curso, asigna un profesor (entrenador del curso)
6. Guardar

## Fechas de la Sesión

Las sesiones admiten configuraciones de fechas flexibles:

| Fecha | Propósito |
|------|-----------|
| **Inicio/fin de visualización** | Cuándo aparece la sesión en los listados de los estudiantes |
| **Inicio/fin de acceso** | Cuándo los estudiantes pueden acceder realmente al contenido de la sesión |
| **Inicio/fin de acceso del entrenador** | Cuándo los entrenadores pueden acceder a la sesión (a menudo comienza antes y termina después del acceso de los estudiantes) |

Esto te permite preparar la sesión antes de que lleguen los estudiantes y mantener el acceso de los entrenadores abierto después de que termine la sesión para calificaciones e informes.

## Lista de Sesiones

![Lista de sesiones que muestra todas las sesiones con nombre, fechas, cantidad de cursos, cantidad de estudiantes y estado](/.gitbook/assets/admin-session-list.png)

La lista de sesiones muestra todas las sesiones con:

* Nombre de la sesión
* Fechas de inicio y fin
* Estado (activa, próxima, pasada)

Usa la búsqueda y los filtros para encontrar sesiones por nombre, fecha, categoría o estado.

## Edición de una Sesión

Haz clic en una sesión para editar:

* Cambiar fechas, nombre o categoría
* Añadir o eliminar cursos
* Cambiar entrenadores de curso
* Añadir o eliminar estudiantes
* Ver datos de seguimiento de la sesión

## Inscripción de Usuarios

![Interfaz de inscripción de sesión para añadir usuarios individuales, clases o importar mediante CSV](/.gitbook/assets/admin-session-enrollment.png)

Puedes inscribir usuarios en una sesión mediante:

* **Inscripción individual** — Busca y añade usuarios individuales
* **Inscripción de clase** — Añade una clase completa (grupo de usuarios predefinidos) de una vez
* **Importación CSV** — Sube un archivo con asignaciones de usuario-sesión

## Acceso a la Sesión

Los estudiantes acceden a sus sesiones a través de **Mis sesiones** en la barra lateral. Las sesiones se organizan en:

* **Sesiones actuales** — Actualmente activas
* **Sesiones pasadas** — Finalizadas
* **Sesiones próximas** — Aún no iniciadas

## Consejos

* **Planifica las fechas cuidadosamente** — Asegúrate de que las fechas de acceso de los entrenadores se extiendan más allá de las fechas de los estudiantes para que los entrenadores puedan preparar y hacer seguimiento
* **Usa clases para inscripciones recurrentes** — Si inscribes frecuentemente a los mismos grupos, crea clases y asígnalas a sesiones
* **Mantén las sesiones organizadas** — Usa categorías y convenciones de nombres claras para una gestión sencilla