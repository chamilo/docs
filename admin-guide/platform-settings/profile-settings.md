# Configuración del Perfil de Usuario

Qué campos aparecen en el perfil de usuario, cuáles puede editar el usuario y preferencias relacionadas.

Accede a estas configuraciones en **Administración > Configuraciones de configuración > Perfil de Usuario**. Esta categoría contiene **29 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úsalo cuando hagas scripting a través de la API o cuando necesites cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `account_valid_duration`

**Validez de la cuenta**

Una cuenta de usuario es válida durante este número de días después de su creación

*Predeterminado: `3660`*

### `add_user_course_information_in_mailto`

**Rellenar previamente el correo con información del usuario y del curso en el contacto del pie de página**

Añadir asunto y cuerpo en el mailto: del pie de página.

*Predeterminado: `false`*

### `allow_show_linkedin_url`

**Permitir mostrar la URL de LinkedIn del usuario**

Añadir un enlace en el bloque social del usuario, permitiendo visitar el perfil de LinkedIn del usuario

### `allow_show_skype_account`

**Permitir mostrar la cuenta de Skype del usuario**

Añadir un enlace en el bloque social del usuario que permita iniciar un chat por Skype

### `allow_social_map_fields`

**Geolocalización de usuarios en un mapa**

Habilitar la visualización de un mapa en la red social que permita ubicar a otros usuarios. Esto incluye varias posiciones (actual y destino) que deben definirse como direcciones o coordenadas en campos adicionales separados. Los campos adicionales deben configurarse como un arreglo aquí.

### `allow_teachers_to_classes`

**Permitir a los profesores gestionar clases**

Habilita a los profesores para gestionar grupos de clases y sus membresías dentro del sistema.

*Predeterminado: `false`*

### `allow_user_headings`

**Permitir la creación de perfiles de usuario dentro de los cursos**

¿Puede un profesor definir campos de perfil de aprendiz para obtener información adicional?

### `allow_users_to_change_email_with_no_password`

**Permitir a los usuarios cambiar el correo electrónico sin contraseña**

Al cambiar la información de la cuenta

*Predeterminado: `false`*

### `changeable_options`

**Campos que los usuarios pueden cambiar en su perfil**

Selecciona los campos que los usuarios podrán cambiar en su página de perfil.

### `enable_profile_user_address_geolocalization`

**Habilitar la geolocalización del usuario**

Habilitar el campo de dirección del usuario y mostrarlo en un mapa usando funciones de geolocalización

### `extended_profile`

**Portafolio**

Si esta configuración está activada, un usuario puede completar los siguientes campos (opcionales): 'Mi área personal abierta', 'Mis competencias', 'Mis diplomas', 'Lo que soy capaz de enseñar'

*Predeterminado: `false`*

### `hide_username_in_course_chat`

**Ocultar nombre de usuario en el chat del curso**

En el chat del curso, ocultar el nombre de usuario. Solo mostrar los nombres de las personas.

*Predeterminado: `false`*

### `hide_username_with_complete_name`

**Ocultar nombre de usuario cuando ya se muestra el nombre completo**

Algunas funciones internas devolverán el nombre de usuario al devolver el nombre completo del usuario. Con esta opción habilitada, te aseguras de que el nombre de usuario no aparezca.

*Predeterminado: `false`*

### `linkedin_organization_id`

**ID de Organización de LinkedIn**

Al compartir una insignia en LinkedIn, LinkedIn te permite establecer un ID de organización que vinculará a la página de LinkedIn de tu organización (para vincular la organización que otorga la insignia).

*Predeterminado: `false`*

### `login_is_email`

**Usar el correo electrónico como nombre de usuario**

Usar el correo electrónico para iniciar sesión en el sistema

*Predeterminado: `false`*

### `my_space_users_items_per_page`

**Número predeterminado de elementos por página en mi Espacio**

Número de registros mostrados por página en las secciones de seguimiento de mi Espacio (usuarios, estadísticas de trabajo, lista de estudiantes).

*Predeterminado: `10`*

### `pass_reminder_custom_link`

**Página personalizada para recordatorio de contraseña**

Establece tu propia URL para una página de restablecimiento de contraseña. Útil cuando se utiliza un sistema de gestión de cuentas federado.

### `profile_fields_visibility`

**Campos visibles en la página de perfil**

Arreglo de campos y si (booleano) son visibles o no en la página de perfil del usuario (también funciona con etiquetas de campos adicionales).

### `registration_add_helptext_for_2_names`

**Añadir ayuda para agregar dos nombres en el registro**

Añadir texto de ayuda para que los usuarios ingresen dos nombres en el formulario de registro cuando los apellidos dobles son comunes.

*Predeterminado: `false`*

### `send_notification_when_user_added`

**Enviar correo al administrador cuando se crea un usuario**

Enviar notificación por correo electrónico al administrador cuando se crea un usuario.

### `show_conditions_to_user`

**Mostrar condiciones específicas de registro**

Mostrar múltiples condiciones al usuario durante el proceso de registro. Proporciona un arreglo con cada elemento que contenga 'variable' (nombre interno del campo adicional), 'display_text' (texto simple para una casilla de verificación), 'text_area' (texto largo de condiciones).

### `show_official_code_whoisonline`

**Código oficial en 'Quién está en línea'**

Mostrar el código oficial en la página de 'Quién está en línea', debajo del nombre de usuario.

*Predeterminado: `false`*

---
### `show_terms_if_profile_completed`

**Términos y condiciones solo si el perfil está completo**

Al habilitar esta opción, los términos y condiciones estarán disponibles para el usuario solo cuando los campos de perfil adicionales que comienzan con 'terms_' y están configurados como visibles hayan sido completados.

*Predeterminado: `false`*

### `split_users_upload_directory`

**Dividir el directorio de carga de usuarios**

En portales con alta carga, donde hay muchos usuarios registrados y envían sus imágenes, el directorio de carga (main/upload/users/) podría contener demasiados archivos para que el sistema de archivos los maneje (se ha reportado con más de 36000 archivos en un servidor Debian). Cambiar esta opción habilitará una división de un nivel de los directorios en el directorio de carga. Se utilizarán 9 directorios en el directorio base y todos los directorios de usuarios subsiguientes se almacenarán en uno de estos 9 directorios. El cambio de esta opción no afectará la estructura de directorios en el disco, pero sí afectará el comportamiento del código de Chamilo, por lo que si cambias esta opción, deberás crear los nuevos directorios y mover los directorios existentes manualmente en el servidor. Ten en cuenta que al crear y mover esos directorios, tendrás que trasladar los directorios de los usuarios 1 al 9 a subdirectorios con el mismo nombre. Si no estás seguro acerca de esta opción, es mejor no activarla.

*Predeterminado: `true`*

### `use_users_timezone`

**Habilitar zonas horarias de los usuarios**

Habilita la posibilidad de que los usuarios seleccionen su propia zona horaria. Una vez configurada, los usuarios podrán ver las fechas límite de las tareas y otras referencias de tiempo en su propia zona horaria, lo que reducirá errores en el momento de la entrega.

*Predeterminado: `true`*

### `user_import_settings`

**Opciones para la importación de usuarios**

Arreglo de opciones para aplicar como parámetros predeterminados en la importación de usuarios mediante CSV/XML.

### `user_search_on_extra_fields`

**Buscar usuarios por campos adicionales en la lista de usuarios para administradores**

Incluye de forma natural los campos adicionales dados (arreglo de etiquetas de campos adicionales) en las búsquedas de usuarios.

### `user_selected_theme`

**Selección de tema por parte del usuario**

Permite a los usuarios seleccionar su propio tema visual en su perfil. Esto cambiará la apariencia de Chamilo para ellos, pero dejará intacto el estilo predeterminado del portal. Si un curso o sesión específica tiene asignado un tema particular, este tendrá prioridad sobre los temas definidos por el usuario.

*Predeterminado: `false`*

### `visible_options`

**Lista de campos visibles en el perfil**

Controla qué campos del perfil son visibles para los usuarios y otras personas.