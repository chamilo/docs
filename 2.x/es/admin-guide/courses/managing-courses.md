# Gestión de Cursos

Como administrador, puedes gestionar todos los cursos en la plataforma sin importar quién los haya creado.

## Lista de Cursos

![La lista de cursos mostrando todos los cursos con título, código, categoría, usuarios inscritos y estado de visibilidad](/.gitbook/assets/admin-course-list.png)

Desde el panel de administración, haz clic en **Lista de cursos** para ver todos los cursos. La lista muestra:

* Título y código del curso
* Idioma
* Categorías
* Estado de visibilidad

Utiliza la herramienta de **Búsqueda avanzada** para encontrar cursos específicos.

## Crear un Curso

Como administrador, puedes crear cursos y asignarlos a cualquier profesor:

1. Haz clic en **Agregar curso** desde el panel de administración
2. Completa los detalles del curso (título, código, categoría, idioma)
3. Asigna un profesor al curso
4. Guarda

Nota: En Chamilo 1.11.x, el código del curso se mostraba como parte de la URL del curso y era imposible cambiarlo después de la creación del curso. Este comportamiento está cambiando en la versión 2.x. El código del curso ya no es visible en la URL, y las versiones futuras podrían permitir a los profesores modificar el código del curso posteriormente, ya que se vuelve menos esencial para la plataforma.

## Gestionar un Curso Existente

Encuentra un curso en la lista para acceder a las opciones de gestión en la columna de *Acciones*:

* **Información** — Muestra información sobre el curso
* **Página principal del curso** — Te lleva directamente a la página de inicio del curso
* **Informes** — Consulta datos de participación y rendimiento
* **Editar** — Cambia el título del curso, la categoría, la visibilidad y otras configuraciones
* **Crear una copia de seguridad** — Accede a la sección de mantenimiento del curso, donde puedes crear copias y realizar otras acciones
* **Agregar al catálogo** — Añade este curso al catálogo de cursos
* **Eliminar** — Elimina permanentemente el curso y todo su contenido

> Eliminar un curso borra permanentemente todo el contenido, los datos de los estudiantes, las calificaciones y la información de seguimiento. Considera exportar el curso primero como copia de seguridad.

## Operaciones en Masa

Selecciona varios cursos en la lista para realizar acciones por lotes, como eliminarlos. Para exportar un curso, ingresa al curso y usa la herramienta de **Mantenimiento** — no hay una acción de exportación masiva en la lista de cursos del administrador.

## Configuraciones de Visibilidad del Curso

Los administradores pueden anular la visibilidad establecida por los profesores:

| Visibilidad | Efecto |
|-------------|--------|
| **Público** | Accesible para todos, incluidos los visitantes anónimos |
| **Abierto** | Accesible para todos los usuarios que hayan iniciado sesión |
| **Privado** | Solo los usuarios inscritos pueden acceder al curso |
| **Cerrado** | Nadie puede acceder al curso (excepto el profesor y los administradores) |
| **Oculto** | Nadie puede ver ni acceder al curso (excepto los administradores) |