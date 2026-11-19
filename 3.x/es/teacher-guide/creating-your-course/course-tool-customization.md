# Personalizar los nombres y los iconos de las herramientas del curso

Chamilo 3.1 permite a los editores de curso autorizados personalizar el **nombre** y el **icono SVG** que se muestran para una herramienta en la página de inicio del curso. Estos cambios se limitan al curso y conservan los destinos existentes de las herramientas.

## Personalizar una herramienta

1. Abra la página de inicio del curso como un usuario autorizado para editar el curso.
2. Active el modo **Personalizar** en la cuadrícula de herramientas.
3. Abra el formulario de personalización de la herramienta que desea modificar.
4. Introduzca el **Nombre** deseado y, si es necesario, seleccione un archivo SVG de **Icono**.
5. Seleccione **Guardar** y compruebe la herramienta actualizada en la cuadrícula de la página de inicio.

La personalización de herramientas es distinta de los modos **Ordenar**, **Mostrar todo** y **Ocultar todo** de la cuadrícula. Cambiar la etiqueta o el icono de una herramienta no crea una herramienta nueva, no modifica su URL subyacente ni concede acceso adicional a los estudiantes.

## Requisitos y seguridad de los SVG

Utilice un archivo SVG de una fuente de confianza. Chamilo valida el contenido SVG cargado y rechaza los archivos no seguros. Si se rechaza un archivo, simplifíquelo o vuelva a exportarlo como un SVG limpio en lugar de intentar eludir la validación.

Confirme el icono y el nombre resultantes tanto como docente como estudiante, y compruebe que otro curso permanece sin cambios. Los estudiantes no pueden personalizar las herramientas a menos que dispongan de los permisos de edición del curso necesarios.

Consulte [Página de inicio del curso](course-homepage.md). Implementación: [PR #9374](https://github.com/chamilo/chamilo-lms/pull/9374).