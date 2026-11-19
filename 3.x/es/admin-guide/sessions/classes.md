# Clases

Las clases en Chamilo son grupos predefinidos de usuarios que pueden inscribirse en sesiones como una unidad. Simplifican el proceso de inscripción cuando se forma regularmente a los mismos grupos de personas.

> Las clases y los [Grupos de usuarios](../../admin-guide/users/user-groups.md) comparten la misma interfaz. La única diferencia es el ajuste de **tipo de grupo**: elija «Class» al crear el grupo. Todo lo demás — gestión de miembros, visibilidad y la propia interfaz — funciona de forma idéntica.

## Crear una clase

1. Desde el panel de administración, vaya a **Classes** (o a User Groups y seleccione el tipo «Class»)
2. Haga clic en **Create a class**
3. Introduzca un **nombre** (p. ej., «Engineering Team», «New Hires March 2026»)
4. Añada **miembros**: busque y seleccione usuarios
5. Guarde

## Usar clases para la inscripción

Al crear o editar una sesión, puede inscribir una clase completa de una sola vez en lugar de añadir usuarios individualmente:

1. Abra la configuración de inscripción de la sesión
2. Haga clic en **Add a class**
3. Seleccione la clase
4. Todos los miembros de la clase quedan inscritos en la sesión

## Gestionar clases

* **Edit** — Cambie el nombre de la clase o actualice la pertenencia
* **Add/remove members** — Mantenga actualizada la lista de la clase
* **Delete** — Elimine la clase (no afecta a las cuentas de los miembros ni a sus inscripciones existentes)

## API de integración

Los administradores de la plataforma pueden usar la [API de suscripciones de clases](../../developer-guide/api/class-subscriptions.md) para consultar la pertenencia y sustituir los usuarios, las sesiones y los cursos de una clase. A diferencia de añadir un usuario en la interfaz de administración, cada `PUT` de la API sustituye la lista correspondiente **completa**. Lea siempre las suscripciones actuales antes de enviar una actualización.

## Filtrar miembros de la clase mediante campos adicionales

Al asignar usuarios a una clase, use **Extra fields** para filtrar los usuarios disponibles según un campo de perfil de usuario que admita búsqueda. Elija el campo, introduzca o seleccione un valor y añada los usuarios coincidentes desde el panel de usuarios disponibles. Según el tipo de campo adicional, el filtro puede ofrecer una entrada de texto o opciones predefinidas.

Solo se ofrecen los campos adicionales de usuario configurados como buscables o filtrables. Los miembros existentes de la clase permanecen en el panel de miembros seleccionados mientras filtra los usuarios disponibles; el filtrado no debe eliminarlos de forma silenciosa. Verifique la lista completa de miembros seleccionados antes de guardar. Consulte [PR de filtros de pertenencia a clases #9364](https://github.com/chamilo/chamilo-lms/pull/9364).

## Consejos

* **Cree clases para cohortes recurrentes** — Si imparte la misma formación a distintos equipos, cree una clase para cada equipo
* **Actualice antes de cada sesión** — Revise la pertenencia a la clase antes de inscribirla en una nueva sesión para asegurarse de que la lista está al día
* **Combine con la importación CSV** — Importe la pertenencia a la clase desde un archivo CSV para grupos grandes