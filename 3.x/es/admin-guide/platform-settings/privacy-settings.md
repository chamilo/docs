# Configuración de privacidad

Controles de privacidad y protección de datos (estilo RGPD): consentimiento, exportación de datos, solicitudes de eliminación de cuenta y similares.

Acceda a estos ajustes en **Administración > Configuración > Privacidad**. Esta categoría contiene **6 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `data_protection_officer_email`

**Dirección de correo electrónico del delegado de protección de datos**

Dirección de correo electrónico del delegado de protección de datos designado, mostrada en las secciones de RGPD/privacidad.

### `data_protection_officer_name`

**Nombre del delegado de protección de datos**

Nombre completo del delegado de protección de datos designado, mostrado en las páginas de datos personales y privacidad.

### `data_protection_officer_role`

**Cargo del delegado de protección de datos**

Puesto o cargo del delegado de protección de datos designado, mostrado junto a su nombre en la información de privacidad.

### `disable_change_user_visibility_for_public_courses`

**Desactivar que los usuarios de la herramienta sean visibles en cursos públicos**

Evitar que cualquiera haga visible la herramienta «usuarios» en un curso público.

*Valor predeterminado: `true`*

### `disable_gdpr`

**Desactivar las funciones RGPD**

Si ya gestiona en otro lugar la declaración de protección de datos personales dirigida a los usuarios, puede desactivar esta función con seguridad.

*Valor predeterminado: `true`*

### `hide_user_field_from_list`

**Ocultar campos de la lista de usuarios en el curso**

De forma predeterminada, se muestran todos los datos de los usuarios en la herramienta de usuarios del curso. Este array permite especificar qué campos no desea mostrar. Solo afecta a los campos principales (no a los campos extra).