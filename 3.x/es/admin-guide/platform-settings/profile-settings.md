# Configuración del perfil de usuario

Qué campos aparecen en el perfil de usuario, cuáles puede editar el usuario y preferencias relacionadas.

Acceda a estos ajustes en **Administración > Configuración > Perfil de usuario**. Esta categoría contiene **29 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `account_valid_duration`

**Validez de la cuenta**

Una cuenta de usuario es válida durante este número de días tras su creación

*Predeterminado: `3660`*


### `add_user_course_information_in_mailto`

**Rellenar el correo con información de usuario y curso en el contacto del pie**

Añade asunto y cuerpo en el mailto: del pie.

*Predeterminado: `false`*


### `allow_show_linkedin_url`

**Permitir mostrar la URL de LinkedIn del usuario**

Añade un enlace en el bloque social del usuario que permite visitar el perfil de LinkedIn del usuario

### `allow_show_skype_account`

**Permitir mostrar la cuenta de Skype del usuario**

Añade un enlace en el bloque social del usuario que permite iniciar un chat por Skype

### `allow_social_map_fields`

**Geolocalización de usuarios en un mapa**

Activa la visualización de un mapa en la red social que permite localizar a otros usuarios. Incluye varias posiciones (actual y de destino) que deben definirse como direcciones o coordenadas en campos extra independientes. Los campos extra deben indicarse aquí como un array.

### `allow_teachers_to_classes`

**Permitir a los profesores gestionar clases**

Permite a los profesores gestionar grupos de clase y su pertenencia dentro del sistema.

*Predeterminado: `false`*


### `allow_user_headings`

**Permitir el perfilado de usuarios dentro de los cursos**

¿Puede un profesor definir campos de perfil del aprendiz para obtener información adicional?

### `allow_users_to_change_email_with_no_password`

**Permitir a los usuarios cambiar el correo electrónico sin contraseña**

Al modificar la información de la cuenta

*Predeterminado: `false`*

### `changeable_options`

**Campos que los usuarios pueden cambiar en su perfil**

Seleccione los campos que los usuarios podrán modificar en la página de su perfil.


### `enable_profile_user_address_geolocalization`

**Activar la geolocalización del usuario**

Activa el campo de dirección del usuario y lo muestra en un mapa mediante funciones de geolocalización

### `extended_profile`

**Portafolio**

Si este ajuste está activado, un usuario puede completar los siguientes campos (opcionales): 'Mi espacio personal abierto', 'Mis competencias', 'Mis diplomas', 'Lo que soy capaz de enseñar'

*Predeterminado: `false`*

### `hide_username_in_course_chat`

**Ocultar el nombre de usuario en el chat del curso**

En el chat del curso, oculta el nombre de usuario. Solo muestra los nombres de las personas.

*Predeterminado: `false`*


### `hide_username_with_complete_name`

**Ocultar el nombre de usuario cuando ya se muestra el nombre completo**

Algunas funciones internas devolverán el nombre de usuario al devolver el nombre completo del usuario. Con esta opción activada, se garantiza que el nombre de usuario no aparecerá.

*Predeterminado: `false`*


### `linkedin_organization_id`

**ID de organización de LinkedIn**

Al compartir una insignia en LinkedIn, LinkedIn permite establecer un ID de organización que enlazará con la página de LinkedIn de su organización (para vincular la organización que atribuye la insignia).

*Predeterminado: `false`*


### `login_is_email`

**Usar el correo electrónico como nombre de usuario**

Usar el correo electrónico para iniciar sesión en el sistema

*Predeterminado: `false`*

### `my_space_users_items_per_page`

**Número predeterminado de elementos por página en mySpace**

Número de registros mostrados por página en las secciones de seguimiento de MySpace (usuarios, estadísticas de trabajos, lista de estudiantes).

*Predeterminado: `10`*


### `pass_reminder_custom_link`

**Página personalizada para el recordatorio de contraseña**

Establezca su propia URL a una página de restablecimiento de contraseña. Útil cuando se usa un sistema federado de gestión de cuentas.

### `profile_fields_visibility`

**Campos visibles en la página de perfil**

Array de campos e indicación (booleana) de si son visibles o no en la página de perfil del usuario (también funciona con etiquetas de campos extra).

### `registration_add_helptext_for_2_names`

**Añadir ayuda para introducir dos apellidos en el registro**

Añade texto de ayuda para que los usuarios introduzcan dos apellidos en el formulario de registro cuando los apellidos dobles son habituales.

*Predeterminado: `false`*


### `send_notification_when_user_added`

**Enviar correo al administrador cuando se crea un usuario**

Enviar una notificación por correo electrónico al administrador cuando se crea un usuario.

### `show_conditions_to_user`

**Mostrar condiciones específicas de registro**

Muestra varias condiciones al usuario durante el proceso de alta. Proporcione un array en el que cada elemento contenga 'variable' (nombre interno del campo extra), 'display_text' (texto simple para una casilla) y 'text_area' (texto largo de las condiciones).

### `show_official_code_whoisonline`

**Código oficial en «Quién está en línea»**

Muestra el código oficial en la página «Quién está en línea», debajo del nombre de usuario.

*Predeterminado: `false`*

### `show_terms_if_profile_completed`

**Términos y condiciones solo si el perfil está completo**

Al activar esta opción, los términos y condiciones estarán disponibles para el usuario únicamente cuando se hayan completado los campos extra de perfil que empiezan por 'terms_' y están configurados como visibles.

*Valor predeterminado: `false`*


### `split_users_upload_directory`

**Dividir el directorio de carga de usuarios**

En portales de alta carga, donde hay muchos usuarios registrados que envían sus fotografías, el directorio de carga (main/upload/users/) puede contener demasiados archivos para que el sistema de archivos los gestione (se ha informado de más de 36000 archivos en un servidor Debian). Cambiar esta opción habilitará una división de un nivel de los directorios en el directorio de carga. Se usarán 9 directorios en el directorio base y todos los directorios posteriores de usuarios se almacenarán en uno de estos 9 directorios. El cambio de esta opción no afectará la estructura de directorios en disco, pero sí el comportamiento del código de Chamilo, por lo que si cambia esta opción, deberá crear los nuevos directorios y mover los directorios existentes usted mismo en el servidor. Tenga en cuenta que, al crear y mover esos directorios, deberá mover los directorios de los usuarios 1 a 9 a subdirectorios del mismo nombre. Si no está seguro acerca de esta opción, es mejor no activarla.

*Valor predeterminado: `true`*

### `use_users_timezone`

**Habilitar zonas horarias de usuarios**

Habilita la posibilidad de que los usuarios seleccionen su propia zona horaria. Una vez configurado, los usuarios podrán ver las fechas límite de las tareas y otras referencias temporales en su propia zona horaria, lo que reducirá los errores en el momento de la entrega.

*Valor predeterminado: `true`*

### `user_import_settings`

**Opciones para la importación de usuarios**

Array de opciones que se aplicarán como parámetros predeterminados en la importación de usuarios CSV/XML.

### `user_search_on_extra_fields`

**Buscar usuarios por campos extra en la lista de usuarios para administradores**

Incluye de forma natural los campos extra indicados (array de etiquetas de campos extra) en las búsquedas de usuarios.

### `user_selected_theme`

**Selección de tema por el usuario**

Permite a los usuarios seleccionar su propio tema visual en su perfil. Esto cambiará el aspecto de Chamilo para ellos, pero dejará intacto el estilo predeterminado del portal. Si un curso o una sesión específicos tienen un tema asignado, este tendrá prioridad sobre los temas definidos por el usuario.

*Valor predeterminado: `false`*

### `visible_options`

**Lista de campos visibles en el perfil**

Controla qué campos del perfil son visibles para los usuarios y para los demás.