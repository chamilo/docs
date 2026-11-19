# Planos de planta de las sedes y mapas de salas

Chamilo 3.1 puede asociar una imagen de plano de planta a una sede y marcar las posiciones de las salas en esa imagen mediante polígonos interactivos. La función ayuda a los estudiantes a localizar las salas asignadas; **no** es un mapa geográfico GPS.

## Adjuntar un plano de planta de la sede

1. Abra el área de administración de **Sedes** y edite la sede deseada.
2. Localice el panel **Plano de planta**.
3. Elija o cargue la imagen y seleccione **Adjuntar plano de planta** (o **Cambiar plano de planta** si ya existe uno).
4. Guarde o confirme los cambios de la sede según sea necesario y, a continuación, compruebe que la imagen del plano de planta se carga.

Si un plano ya no es válido, utilice **Eliminar plano de planta** después de comprobar qué salas hacen referencia a él. Cargue únicamente contenido de confianza y respete los permisos de la pantalla de administración de sedes.

## Delimitar las salas

1. Edite una sala asignada a esa sede.
2. Busque **Sala en el plano de planta** en el formulario de la sala.
3. Utilice la herramienta de polígono para trazar el contorno de la sala. Use **Editar** para ajustar los vértices; todos los puntos deben permanecer dentro de la imagen.
4. Seleccione **Guardar área de la sala** y, a continuación, guarde el formulario de la sala para conservar los cambios.
5. Abra un visor de salas para confirmar la posición correcta. Utilice **Borrar área de la sala** si debe eliminarse la correspondencia.

Una sala tiene un único polígono editable a la vez. La correspondencia de las salas es independiente de la imagen a nivel de sede, por lo que actualizar la imagen puede requerir comprobar los contornos de sala existentes.

## Dónde aparecen los mapas

Los usuarios autorizados pueden ver los planos de planta de las salas cuando estas se seleccionan o se muestran en la información del curso, en los eventos del calendario y en los flujos relacionados con la asistencia. Compruebe la visibilidad con los roles que realmente consultarán la información, en especial los estudiantes y los participantes de la sesión.

Los permisos de acceso a sedes y salas también se aplican a los recursos del plano de planta. En instalaciones multi-URL, compruebe el aislamiento correcto de portal/sede antes de publicar los mapas.

Consulte [Gestión de salas](managing-rooms.md) y [Buscador de disponibilidad de salas](room-availability-finder.md). Implementaciones: [PR #9321](https://github.com/chamilo/chamilo-lms/pull/9321), [PR #9451](https://github.com/chamilo/chamilo-lms/pull/9451).