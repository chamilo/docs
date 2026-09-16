# Configuración de certificados

Valores predeterminados que se aplican cuando un alumno obtiene un certificado desde el libro de calificaciones.

Acceda a estos ajustes en **Administración > Configuración > Certificados**. Esta categoría contiene **11 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_certificate_pdf_footer`

**Añadir pie de página a las exportaciones PDF de certificados**

Cuando está habilitado, se añade un pie de página a las exportaciones PDF de los certificados.

*Predeterminado: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Generación automática de certificados en llamada WS**

Cuando está habilitado, y al usar el webservice WSCertificatesList, esta opción garantiza que se hayan generado todos los certificados de los usuarios si alcanzaron la puntuación suficiente en todos los elementos definidos en los libros de calificaciones de todos los cursos y sesiones (esto puede consumir recursos de procesamiento considerables en su servidor).

*Predeterminado: `false`*

### `allow_certificates_search` **v3**

**Permitir búsqueda de certificados**

Permite a usuarios y visitantes buscar certificados generados desde el menú de la barra superior.

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

Añade un filtro por el código oficial de los estudiantes a la lista de certificados.

*Predeterminado: `false`*

### `certificate_pdf_orientation`

**Orientación PDF de los certificados**

Establezca ‘portrait’ o ‘landscape’ (términos técnicos) para los certificados PDF.

*Predeterminado: `landscape`*

### `hide_certificate_export_link`

**Certificados: ocultar el enlace de exportación PDF para todos**

Habilítelo para eliminar por completo la posibilidad de exportar certificados a PDF (para todos los usuarios). Si está habilitado, esto incluye ocultarlo a los estudiantes.

*Predeterminado: `false`*

### `hide_certificate_export_link_students`

**Certificados: ocultar el enlace de exportación a los estudiantes**

Si está habilitado, los estudiantes no podrán exportar sus certificados a PDF. Esta opción está disponible porque, según la estructura HTML precisa de la plantilla del certificado, la exportación PDF podría ser de baja calidad. En ese caso, es mejor mostrar a los estudiantes solo el certificado HTML.

*Predeterminado: `false`*

### `hide_my_certificate_link`

**Ocultar el enlace «mi certificado»**

Oculta la página de certificados para los usuarios que no son administradores.

*Predeterminado: `false`*

### `session_admin_can_download_all_certificates`

**Permitir a los administradores de sesión descargar certificados privados**

Si está habilitado, los administradores de sesión pueden descargar certificados aunque no estén publicados de forma pública.

*Predeterminado: `false`*

## Véase también

Los certificados ahora pueden tener un periodo de validez y una fecha de caducidad, con recordatorios de caducidad automáticos o manuales. Esto no se configura aquí: el periodo de validez es un ajuste del libro de calificaciones orientado al docente, y el interruptor de activación del cron de recordatorios se encuentra en la categoría **Tareas cron**. Consulte [Certificados y competencias](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) y [Configuración de tareas cron](crons-settings.md#certificate-expiry-reminders).