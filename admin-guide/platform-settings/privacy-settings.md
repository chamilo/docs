# Configuraciones de Privacidad

Controles de privacidad y protección de datos (al estilo GDPR): consentimiento, exportación de datos, solicitudes de eliminación de cuentas y similares.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Privacidad**. Esta categoría contiene **6 configuraciones**, enumeradas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `data_protection_officer_email`

**Correo electrónico del oficial de protección de datos**

Dirección de correo electrónico del oficial de protección de datos designado, mostrada en las secciones de GDPR/privacidad.

### `data_protection_officer_name`

**Nombre del oficial de protección de datos**

Nombre completo del oficial de protección de datos designado, mostrado en las páginas de datos personales y privacidad.

### `data_protection_officer_role`

**Rol del oficial de protección de datos**

Título o rol del oficial de protección de datos designado, mostrado junto a su nombre en la información de privacidad.

### `disable_change_user_visibility_for_public_courses`

**Deshabilitar la visibilidad de los usuarios de herramientas en cursos públicos**

Evita que alguien haga visible la herramienta de 'usuarios' en un curso público.

*Predeterminado: `true`*

### `disable_gdpr`

**Deshabilitar funciones de GDPR**

Si ya gestiona su declaración de protección de datos personales a los usuarios en otro lugar, puede deshabilitar esta función de manera segura.

*Predeterminado: `true`*

### `hide_user_field_from_list`

**Ocultar campos de la lista de usuarios en el curso**

Por defecto, mostramos todos los datos de los usuarios en la herramienta de usuarios dentro del curso. Este arreglo le permite especificar qué campos no desea mostrar. Solo afecta a los campos principales (no a los campos adicionales).