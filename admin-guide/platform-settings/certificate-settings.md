# Configuración de Certificados

Configuraciones predeterminadas aplicadas cuando un estudiante obtiene un certificado desde el libro de calificaciones.

Acceda a estas configuraciones en **Administración > Configuración de ajustes > Certificados**. Esta categoría contiene **9 ajustes**, listados a continuación con el título y el comentario incluidos en los datos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_certificate_pdf_footer`

**Agregar pie de página a las exportaciones de certificados en PDF**

Cuando está habilitado, se agrega un pie de página a las exportaciones de certificados en PDF.

*Predeterminado: `false`*

### `allow_general_certificate`

**Habilitar certificado general**

Un certificado general es un certificado que agrupa todos los logros del usuario en los cursos que ha seguido.

*Predeterminado: `false`*

### `allow_public_certificates`

**Permitir certificados públicos**

Los certificados de los usuarios pueden ser vistos por usuarios no registrados.

*Predeterminado: `false`*

### `certificate_filter_by_official_code`

**Filtro de certificados por código oficial**

Agrega un filtro en el código oficial de los estudiantes a la lista de certificados.

*Predeterminado: `false`*

### `certificate_pdf_orientation`

**Orientación PDF para certificados**

Establezca ‘portrait’ (vertical) o ‘landscape’ (horizontal) para los certificados en PDF.

*Predeterminado: `landscape`*

### `hide_certificate_export_link`

**Certificados: ocultar enlace de exportación a PDF para todos**

Habilite esta opción para eliminar completamente la posibilidad de exportar certificados a PDF (para todos los usuarios). Si está habilitado, esto incluye ocultarlo a los estudiantes.

*Predeterminado: `false`*

### `hide_certificate_export_link_students`

**Certificados: ocultar enlace de exportación a los estudiantes**

Si está habilitado, los estudiantes no podrán exportar sus certificados a PDF. Esta opción está disponible porque, dependiendo de la estructura HTML precisa de la plantilla del certificado, la exportación a PDF podría ser de baja calidad. En este caso, es mejor mostrar solo el certificado HTML a los estudiantes.

*Predeterminado: `false`*

### `hide_my_certificate_link`

**Ocultar enlace de ‘mi certificado’**

Oculta la página de certificados para usuarios no administradores.

*Predeterminado: `false`*

### `session_admin_can_download_all_certificates`

**Permitir a los administradores de sesión descargar certificados privados**

Si está habilitado, los administradores de sesión pueden descargar certificados incluso si no están publicados públicamente.

*Predeterminado: `false`*