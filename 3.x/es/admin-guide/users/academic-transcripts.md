# Expedientes académicos

Chamilo puede generar un **expediente académico no oficial** a partir de los cursos completados y certificados de un estudiante, y permitir que el personal autorizado emita un **expediente oficial firmado**. Esta funcionalidad es distinta de un certificado individual de curso o de su verificación opcional en la red de pruebas Sepolia.

## Activar la funcionalidad

En **Administración > Parámetros de configuración > Certificados**, active **Expedientes académicos** (`certificate.transcript_enabled`). Está desactivada de forma predeterminada. Revise los ajustes adicionales de programa, escala de calificación, horas de curso, número de estudiante, dirección y firmante en [Ajustes de certificados](../platform-settings/certificate-settings.md#transcript_enabled).

El expediente utiliza los certificados generados por la **categoría raíz del libro de calificaciones** de los cursos y sesiones elegibles. Incluye únicamente los cursos de la URL de acceso actual a los que el estudiante sigue inscrito. Un curso sin un certificado elegible no aporta una fila.

La calificación final mostrada es un promedio de las puntuaciones porcentuales de los cursos listados; el GPA es el promedio no ponderado de los puntos de calificación asignados. Ambos dependen de los cursos incluidos en el momento de la consulta o de la emisión.

## Columnas del expediente

| Columna | Contenido |
|--------|---------|
| **Curso** | El código del curso, o el nombre del departamento del curso (`transcript_course_code_source`) |
| **Descripción** | El título del curso y el título de la sesión si el curso se siguió en una sesión |
| **Inscripción** | Cuándo se inscribió el estudiante en el curso o en la sesión |
| **Horas requeridas** | El valor del campo adicional del curso definido en `transcript_hours_extra_field`, o la duración del curso |
| **Fecha de finalización** | La fecha del certificado |
| **Horas completadas** | El tiempo que el estudiante dedicó al curso, o las horas requeridas cuando `transcript_completed_hours_are_required_hours` está activado |
| **Calificación final** | La puntuación del certificado |
| **Calificación** | La letra de `transcript_grading_scale` que corresponde a esa puntuación |

## Acceder al expediente de un estudiante

1. Vaya a **Administración > Usuarios > Lista de usuarios** y localice al estudiante. La acción **Expediente** está disponible para los administradores autorizados y los administradores de sesión cuando la funcionalidad está activada.
2. Como alternativa, utilice la acción **Expediente** desde la página de detalle del informe global de un estudiante elegible.
3. Revise la lista de cursos, las calificaciones, las fechas, las horas, la calificación final y el GPA del estudiante.
4. Seleccione **Descargar expediente no oficial** para obtener un PDF generado a partir de los registros actuales del estudiante.

La página del expediente también está disponible directamente en `/transcript?userId=<user-id>` para quien esté autorizado a acceder a los registros de ese estudiante. No considere que conocer la URL o el identificador de usuario constituye un permiso: el acceso se comprueba en el servidor.

Un estudiante puede ver su **propio** expediente, pero no puede emitir ni revocar uno oficial. Los emisores autorizados son:

* Administradores de plataforma/portal que actúan dentro del ámbito de usuarios/URL de acceso que gestionan.
* Responsables de recursos humanos para los estudiantes a los que dan seguimiento.
* Administradores de sesión para los estudiantes inscritos en una sesión que administran.

Estos permisos se evalúan por estudiante; ostentar un rol de personal por sí solo no otorga acceso a todos los expedientes.

![El expediente de un estudiante visto por un administrador, con los cursos, la calificación final, el GPA y la escala de calificación, la lista de expedientes oficiales y el bloque de la imagen de firma](../../.gitbook/assets/admin-transcript-user.png)

## Emitir y verificar un expediente oficial

1. En la página del expediente de un estudiante autorizado, compruebe los cursos, las calificaciones y la información personal que se muestran en ese momento.
2. Seleccione **Emitir expediente oficial** y confirme. Chamilo guarda una instantánea firmada de la información en ese momento.
3. La nueva entrada aparece en **Expedientes oficiales** con su fecha de emisión y su emisor.
4. Utilice **Descargar** para el PDF oficial o **Verificar** para abrir la página pública de verificación.
5. Si es necesario, un emisor autorizado puede **Revocar** ese expediente oficial. La página de verificación indicará entonces que está revocado.

Cada expediente emitido se almacena por separado: emitir una versión más reciente no reescribe de forma silenciosa un registro firmado anterior. Los enlaces de verificación siguen `/transcripts/verify/<token>` y también exponen una respuesta `.json`. Quien disponga del enlace de verificación puede comprobar la validez sin iniciar sesión; mantenga estos enlaces debidamente controlados, porque una verificación válida expone los detalles del expediente firmado. Los registros no válidos o revocados no se presentan como documentos válidos.

![La página pública de verificación de un expediente oficial válido, con sus detalles y cursos](../../.gitbook/assets/admin-transcript-verification.png)

Un expediente oficial está firmado digitalmente por Chamilo mediante la clave de firma de la institución. **No es una transacción de blockchain**; la funcionalidad de Sepolia documenta un proceso distinto para las credenciales de certificados del libro de calificaciones.

## Imagen de firma y datos del firmante

Un administrador de la plataforma puede cargar una imagen de firma en formato **PNG o JPEG** en la sección **Firma de los expedientes académicos oficiales** de la página de expediente de un estudiante. La imagen pertenece a la URL de acceso actual y se utiliza en los PDF oficiales. El nombre y el cargo del firmante proceden de `certificate.transcript_signatory_name` y `certificate.transcript_signatory_title`.

Solo los administradores de la plataforma gestionan la imagen de firma; los demás emisores de expedientes autorizados no obtienen este permiso de forma automática. Proteja las claves de firma de la institución y el almacenamiento privado de la imagen de firma como parte de los procedimientos de copia de seguridad y control de acceso del portal. Ambos se conservan fuera de la carpeta web pública, en `var/certificate-issuer/`, junto con la clave que también firma las credenciales de los certificados del libro de calificaciones: incluya esta carpeta en sus [copias de seguridad](../maintenance/backups.md), o de lo contrario ya no se podrá verificar ningún expediente ni credencial emitidos anteriormente.

## Resolución de problemas

* **Enlace del expediente ausente:** compruebe `certificate.transcript_enabled` y el ámbito del usuario actual.
* **No hay cursos completados:** el estudiante necesita un certificado de libro de calificaciones raíz que cumpla los requisitos y una inscripción actual coincidente en un curso o sesión en esta URL de acceso.
* **Número de estudiante, horas, letras de calificación o título del programa incorrectos:** revise la configuración específica `certificate.transcript_*` antes de emitir un expediente oficial.
* **La verificación informa de un resultado revocado o no válido:** no reutilice el registro como prueba de un expediente oficial vigente; el personal autorizado puede emitir uno nuevo cuando proceda.

Véase también [Certificados y competencias](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md) y [Mi expediente](../../student-guide/account-and-security/my-transcript.md).