# Configuración de certificados

Valores predeterminados que se aplican cuando un estudiante obtiene un certificado del libro de calificaciones.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Certificados**. Esta categoría contiene **23 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al crear scripts mediante la API o cuando necesite modificar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `add_certificate_pdf_footer`

**Añadir pie de página a las exportaciones de certificados en PDF**

Cuando está activado, se añade un pie de página a las exportaciones en PDF de los certificados.

*Valor predeterminado: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Generación automática de certificados en la llamada al servicio web**

Cuando está activado, y al utilizar el servicio web WSCertificatesList, esta opción se asegura de que todos los certificados hayan sido generados por los usuarios si alcanzaron la puntuación suficiente en todos los elementos definidos en los libros de calificaciones de todos los cursos y sesiones (esto puede consumir considerables recursos de procesamiento en su servidor).

*Valor predeterminado: `false`*

### `allow_certificates_search` **v3**

**Permitir la búsqueda de certificados**

Permite a los usuarios y a los visitantes buscar certificados generados desde el menú de la barra superior.

*Valor predeterminado: `false`*

### `allow_general_certificate`

**Activar el certificado general**

Un certificado general es un certificado que agrupa todos los logros del usuario en los cursos que ha seguido.

*Valor predeterminado: `false`*

### `allow_public_certificates`

**Permitir certificados públicos**

Los certificados de los usuarios pueden ser vistos por usuarios no registrados.

*Valor predeterminado: `false`*

### `blockchain_verification_enabled`

**Activar certificados firmados y anclaje opcional en la red de pruebas Sepolia**

Cuando está activado, un estudiante puede aprobar la publicación de una credencial de certificado del libro de calificaciones firmada digitalmente; un administrador puede emitirla o revocarla y, opcionalmente, anclar la huella de la credencial en la red de pruebas Sepolia. Consulte [Verificación de certificados firmados](../maintenance/signed-certificate-verification.md).

*Valor predeterminado: `false`*

### `certificate_filter_by_official_code`

**Filtro de certificados por código oficial**

Añade un filtro por el código oficial de los estudiantes a la lista de certificados.

*Valor predeterminado: `false`*

### `certificate_pdf_orientation`

**Orientación del PDF para los certificados**

Establezca ‘portrait’ o ‘landscape’ (términos técnicos) para los certificados en PDF.

*Valor predeterminado: `landscape`*

### `hide_certificate_export_link`

**Certificados: ocultar el enlace de exportación a PDF para todos**

Actívelo para eliminar por completo la posibilidad de exportar certificados a PDF (para todos los usuarios). Si está activado, esto incluye ocultarlo a los estudiantes.

*Valor predeterminado: `false`*

### `hide_certificate_export_link_students`

**Certificados: ocultar el enlace de exportación a los estudiantes**

Si está activado, los estudiantes no podrán exportar sus certificados a PDF. Esta opción está disponible porque, según la estructura HTML precisa de la plantilla del certificado, la exportación a PDF puede ser de baja calidad. En este caso, es preferible mostrar únicamente el certificado en HTML a los estudiantes.

*Valor predeterminado: `false`*

### `hide_my_certificate_link`

**Ocultar el enlace «mi certificado»**

Oculta la página de certificados a los usuarios que no son administradores.

*Valor predeterminado: `false`*

### `session_admin_can_download_all_certificates`

**Permitir a los administradores de sesión descargar certificados privados**

Si está activado, los administradores de sesión pueden descargar certificados aunque no estén publicados públicamente.

*Valor predeterminado: `false`*

### `transcript_enabled`

**Expedientes académicos**

Activa los expedientes académicos no oficiales para los estudiantes y permite al personal autorizado emitir expedientes oficiales firmados digitalmente y revocables. El expediente propio de un usuario aparece en `/transcript`. Consulte [Expedientes académicos](../users/academic-transcripts.md).

*Valor predeterminado: `false`*

### `transcript_program_title`

**Título del programa del expediente**

Nombre del programa o de la titulación impreso en los PDF de los expedientes.

*Valor predeterminado: vacío*

### `transcript_course_code_source`

**Código de curso del expediente**

Seleccione qué campo del curso proporciona el código que se muestra en los expedientes: código del curso (`visual_code`) o nombre del departamento (`department_name`).

*Valor predeterminado: `visual_code`*

### `transcript_hours_extra_field`

**Campo de horas del curso en el expediente**

Variable del campo adicional del curso que contiene las horas requeridas. Déjelo vacío para utilizar la duración del curso.

*Valor predeterminado: vacío*

### `transcript_completed_hours_are_required_hours`

**Las horas completadas del expediente son las horas requeridas**

Cuando está activado, muestra las horas requeridas del curso como horas completadas. De lo contrario, las horas completadas reflejan el tiempo registrado del estudiante en el curso.

*Valor predeterminado: `false`*

### `transcript_student_number_extra_field`

**Campo del número de estudiante del expediente**

Variable del campo adicional del usuario que contiene el número de estudiante. Déjelo vacío para omitir ese número.

*Valor predeterminado: vacío*

---
### `transcript_address_extra_fields`

**Campos de dirección del expediente**

Variables separadas por comas de los campos adicionales del usuario que se añadirán a la dirección del estudiante, como la ciudad o el código postal.

*Predeterminado: vacío*

### `transcript_grading_scale`

**Escala de calificación del expediente**

Un array JSON de porcentaje mínimo, calificación alfabética y puntos de calificación, ordenado del mínimo más alto al más bajo. Por ejemplo, `{ "min": 90, "letter": "A", "points": 4.0 }`. Esta correspondencia se utiliza para las letras y el GPA del expediente.

*Predeterminado: A (90% / 4), B (80% / 3), C (70% / 2), D (60% / 1), F (0% / 0)*

### `transcript_gpa_note`

**Nota del GPA del expediente**

Texto impreso debajo del GPA que explica el cálculo. De forma predeterminada, el GPA es el **promedio no ponderado** de los puntos de calificación de los cursos del expediente.

*Predeterminado: `The GPA is the unweighted average of the grade points of the courses listed in this transcript.`*

### `transcript_signatory_name`

**Nombre del firmante del expediente**

Nombre del firmante institucional que se imprime en los expedientes oficiales. Un administrador de la plataforma puede cargar una imagen de firma independiente en la página de expediente de un usuario.

*Predeterminado: vacío*

### `transcript_signatory_title`

**Cargo del firmante del expediente**

Cargo del firmante institucional en los expedientes oficiales.

*Predeterminado: vacío*

## Véase también

Ahora se puede asignar a los certificados un período de validez y una fecha de caducidad, con recordatorios de caducidad automáticos o manuales. Esto no se configura aquí — el período de validez es un ajuste del libro de calificaciones orientado al docente, y el interruptor de activación o desactivación del cron de recordatorios se encuentra en la categoría **Tareas cron**. Véase [Certificados y competencias](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) y [Ajustes de tareas cron](crons-settings.md#certificate-expiry-reminders).