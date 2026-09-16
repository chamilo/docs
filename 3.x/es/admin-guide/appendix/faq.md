# FAQ

Preguntas frecuentes para administradores de Chamilo 3.0.

## Installation and Setup

**Q: ¿Qué versión de PHP requiere Chamilo 3.0?**
A: PHP 8.3, 8.4 u 8.5. Consulte [Requisitos del servidor](../installation/server-requirements.md).

**Q: ¿Puedo ejecutar Chamilo en un hosting compartido?**
A: Es posible, pero no se recomienda. Chamilo 3.0 requiere Composer, Node.js en modo de desarrollo y acceso a la línea de comandos para la instalación y el mantenimiento. Un VPS o un servidor dedicado ofrece una experiencia mucho mejor.

**Q: ¿Qué base de datos debo usar?**
A: MySQL 8.0+ o MariaDB 10.4+ son las más utilizadas y las mejor probadas.

**Q: ¿Puedo instalar Chamilo sin la línea de comandos?**
A: Sí, si utiliza la versión empaquetada (.zip o .tar.gz). En caso contrario, necesitará la línea de comandos para instalar las dependencias de Composer, generar los recursos del frontend y ejecutar las migraciones de la base de datos. El asistente web se encarga de la configuración de la base de datos y de la configuración inicial, pero los pasos circundantes requieren acceso al intérprete de comandos en modo de desarrollo.

## Users and Authentication

**Q: ¿Cómo restablezco la contraseña de un usuario?**
A: Vaya a **Administración > Lista de usuarios**, busque al usuario, pulse editar y establezca una nueva contraseña. Como alternativa, el usuario puede usar el enlace «Olvidé mi contraseña» en la página de inicio de sesión (si el correo electrónico está configurado).

**Q: ¿Puedo importar usuarios de forma masiva?**
A: Sí. Vaya a **Administración > Importar usuarios** y cargue un archivo CSV o XML con los datos de los usuarios. La importación permite crear usuarios nuevos y actualizar los existentes.

**Q: ¿Cómo integro con LDAP o Active Directory?**
A: Configure los parámetros de LDAP en la configuración de autenticación. Consulte [LDAP](../authentication/ldap.md). Los usuarios se sincronizan al iniciar sesión o mediante una sincronización programada.

**Q: ¿Pueden los usuarios pertenecer a varias sesiones al mismo tiempo?**
A: Sí. Los usuarios pueden estar inscritos en cualquier número de sesiones simultáneamente. Cada sesión registra el progreso de forma independiente.

## Courses and Content

**Q: ¿Cómo hago una copia de seguridad de un único curso?**
A: Dentro del curso, vaya a **Mantenimiento > Crear una copia de seguridad**. Esto genera un archivo descargable del contenido y la configuración del curso. Puede restaurarlo en la misma instancia de Chamilo o en otra distinta.

**Q: ¿Puedo copiar un curso?**
A: Sí. Use **Administración > Copiar curso** o la herramienta de mantenimiento del curso dentro del propio curso. Puede copiar contenido entre cursos o crear un curso nuevo a partir de uno existente.

**Q: ¿Qué versiones de SCORM se admiten?**
A: Chamilo admite SCORM 1.2. Los paquetes SCORM se importan como itinerarios de aprendizaje.

**Q: ¿Cómo limito quién puede crear cursos?**
A: Vaya a **Administración > Parámetros de configuración > Curso** y desactive **Permitir a no administradores (profesores) crear cursos nuevos** (`allow_users_to_create_courses`). Cuando está desactivado, solo los administradores pueden crear cursos. Como alternativa, puede establecer un límite al número de cursos que cualquier profesor puede crear.

## Performance and Maintenance

**Q: La plataforma es lenta. ¿Qué debo comprobar primero?**
A: Por orden de impacto: (1) Asegúrese de que `APP_ENV=prod` y `APP_DEBUG=0` en `.env`. (2) Verifique que PHP OPcache esté habilitado. (3) Compruebe el rendimiento de la base de datos. (4) Consulte [Ajuste del rendimiento](../platform-settings/performance-tuning.md).

**Q: ¿Cómo vacío la caché?**
A: Ejecute `php bin/console cache:clear --env=prod` desde la línea de comandos. No elimine el directorio `var/cache/` de forma manual mientras la aplicación está en ejecución.

**Q: ¿Cuánto espacio en disco necesita Chamilo?**
A: La aplicación en sí necesita unos 2 GB sin comprimir. El espacio total depende del contenido cargado (documentos, vídeos, paquetes SCORM). Supervise el uso del disco y planifique en consecuencia.

**Q: ¿Cómo configuro copias de seguridad automatizadas?**
A: Consulte [Copias de seguridad](../maintenance/backups.md). Como mínimo, programe un volcado diario de la base de datos y copias de seguridad periódicas a nivel de archivos del directorio de carga.

## Email

**Q: Los usuarios no reciben correos electrónicos. ¿Qué debo comprobar?**
A: (1) Verifique `MAILER_DSN` en `.env`. (2) Ejecute `php bin/console mailer:test someone@example.com` para probar. (3) Revise las carpetas de correo no deseado. (4) Verifique los registros DNS SPF/DKIM. Consulte [Configuración del correo electrónico](../installation/email-configuration.md).

**Q: ¿Puedo usar Gmail para enviar correos electrónicos?**
A: Sí, para plataformas pequeñas o para desarrollo. Use una contraseña de aplicación y tenga en cuenta los límites diarios de envío de Gmail (500 correos/día para cuentas normales).

## Security

**Q: ¿Cómo fuerzo HTTPS?**
A: Configure su servidor web para redirigir HTTP a HTTPS. Además, active el parámetro «Forzar HTTPS» en **Administración > Parámetros de configuración > Seguridad**. Consulte [Parámetros de seguridad](../platform-settings/security-settings.md).

**Q: ¿Cómo bloqueo los ataques de fuerza bruta en el inicio de sesión?**
A: Configure el número máximo de intentos de inicio de sesión y el CAPTCHA en los parámetros de seguridad. Considere también usar fail2ban a nivel de servidor para una protección adicional.

**Q: Un usuario olvidó su contraseña y el correo electrónico no funciona. ¿Cómo le ayudo?**
A: Como administrador, edite la cuenta del usuario directamente y establezca una nueva contraseña. Vaya a **Administración > Lista de usuarios**, busque la cuenta y actualice el campo de contraseña.

## Actualizaciones

**P: ¿Puedo actualizar directamente de Chamilo 2.x a 3.0?**
R: Sí, pero se trata de una migración importante, no de una simple actualización. Consulte [Actualización](../installation/upgrading.md). Pruebe siempre primero en un servidor de preproducción.

**P: ¿Funcionarán mis plugins después de actualizar a 3.0?**
R: No. Los plugins de 2.x no son compatibles con 3.0 y deben reescribirse o sustituirse por la funcionalidad equivalente de 3.0.