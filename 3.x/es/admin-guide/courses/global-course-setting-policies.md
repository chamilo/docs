# Políticas globales de configuración de cursos

Los administradores de la plataforma pueden definir valores predeterminados centralizados para la configuración de los cursos y controlar si los docentes pueden anularlos. Las políticas se aplican a la funcionalidad existente de los cursos y preservan las configuraciones específicas de cada curso que sean compatibles.

## Abrir la página de políticas

En la **URL de acceso principal**, abra **Administración > Configuración > Configuración de cursos**, o navegue a `/admin/settings/course-settings` en su instalación. Esta página de administración está reservada a los administradores autorizados de la plataforma en la URL de acceso principal. No utilice un portal secundario para editar las políticas globales.

## Configurar una política

1. Utilice el campo **Buscar** si necesita una clave específica de configuración de curso.
2. Para cada ajuste, compruebe el nombre exacto de la variable que aparece bajo su encabezado.
3. Seleccione o desmarque **Editable en el curso** para controlar si los editores del curso pueden modificar ese ajuste.
4. Elija o introduzca un **Valor predeterminado de la plataforma**. Algunos ajustes ofrecen un menú desplegable de valores permitidos; otros aceptan texto.
5. Guarde los cambios y verifique el comportamiento efectivo en un curso de prueba.

Los ajustes que reutilizan el mismo nombre de variable en distintas categorías se muestran por separado cuando es necesario. No dé por sentado que dos nombres visualmente similares controlan la misma función del curso.

## Verificar con dos roles

Como administrador, confirme el valor predeterminado almacenado y si es editable. Como docente del curso, abra el ajuste de curso correspondiente y compruebe que el valor efectivo y la restricción de edición coinciden con la política. Pruebe, siempre que sea posible, tanto un curso existente como un curso nuevo.

Cambiar un valor predeterminado global puede afectar a muchos cursos. Revise su impacto antes de desactivar las anulaciones de los docentes y registre los valores anteriores de la política para poder restaurarlos si es necesario.

Consulte [Gestión de cursos](managing-courses.md) y [Configuración del curso](../../teacher-guide/creating-your-course/course-settings.md). Implementación: [PR #9328](https://github.com/chamilo/chamilo-lms/pull/9328).