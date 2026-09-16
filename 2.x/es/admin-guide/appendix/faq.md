# Preguntas Frecuentes (FAQ)

Preguntas frecuentes para administradores de Chamilo 2.0.

## Instalación y Configuración

**P: ¿Qué versión de PHP requiere Chamilo 2.0?**  
R: PHP 8.2 o superior. Se recomienda PHP 8.3. Consulta [Requisitos del Servidor](../installation/server-requirements.md).

**P: ¿Puedo ejecutar Chamilo en un hosting compartido?**  
R: Es posible, pero no se recomienda. Chamilo 2.0 requiere Composer, Node.js en modo de desarrollo y acceso a la línea de comandos para instalación y mantenimiento. Un VPS o servidor dedicado ofrece una experiencia mucho mejor.

**P: ¿Qué base de datos debo usar?**  
R: MySQL 8.0+ o MariaDB 10.4+ son las más utilizadas y mejor probadas.

**P: ¿Puedo instalar Chamilo sin usar la línea de comandos?**  
R: Sí, si utilizas la versión empaquetada (.zip o .tar.gz). De lo contrario, necesitarás la línea de comandos para instalar dependencias de Composer, compilar los activos del frontend y ejecutar migraciones de la base de datos. El asistente basado en web maneja la configuración de la base de datos y la configuración inicial, pero los pasos adicionales requieren acceso a shell en modo de desarrollo.

## Usuarios y Autenticación

**P: ¿Cómo restablezco la contraseña de un usuario?**  
R: Ve a **Administración > Lista de usuarios**, busca al usuario, haz clic en editar y establece una nueva contraseña. Alternativamente, el usuario puede usar el enlace "Olvidé mi contraseña" en la página de inicio de sesión (si el correo electrónico está configurado).

**P: ¿Puedo importar usuarios de forma masiva?**  
R: Sí. Ve a **Administración > Importar usuarios** y sube un archivo CSV o XML con los datos de los usuarios. La importación permite crear nuevos usuarios y actualizar los existentes.

**P: ¿Cómo integro Chamilo con LDAP o Active Directory?**  
R: Configura los ajustes de LDAP en la configuración de autenticación. Consulta [LDAP](../authentication/ldap.md). Los usuarios se sincronizan al iniciar sesión o mediante una sincronización programada.

**P: ¿Pueden los usuarios pertenecer a varias sesiones al mismo tiempo?**  
R: Sí. Los usuarios pueden estar inscritos en cualquier número de sesiones simultáneamente. Cada sesión registra el progreso de manera independiente.

## Cursos y Contenido

**P: ¿Cómo hago una copia de seguridad de un solo curso?**  
R: Dentro del curso, ve a **Mantenimiento > Crear una copia de seguridad**. Esto genera un archivo descargable con el contenido y las configuraciones del curso. Puedes restaurarlo en la misma instancia de Chamilo o en una diferente.

**P: ¿Puedo copiar un curso?**  
R: Sí. Usa **Administración > Copiar curso** o la herramienta de mantenimiento dentro del curso. Puedes copiar contenido entre cursos o crear un nuevo curso a partir de uno existente.

**P: ¿Qué versiones de SCORM son compatibles?**  
R: Chamilo soporta SCORM 1.2. Los paquetes SCORM se importan como rutas de aprendizaje.

**P: ¿Cómo limito quién puede crear cursos?**  
R: Ve a **Administración > Configuraciones > Curso** y desactiva **Permitir a no administradores (profesores) crear nuevos cursos** (`allow_users_to_create_courses`). Cuando está desactivado, solo los administradores pueden crear cursos. Alternativamente, puedes establecer un límite al número de cursos que un profesor puede crear.

## Rendimiento y Mantenimiento

**P: La plataforma está lenta. ¿Qué debo revisar primero?**  
R: En orden de impacto: (1) Asegúrate de que `APP_ENV=prod` y `APP_DEBUG=0` en `.env`. (2) Verifica que PHP OPcache esté habilitado. (3) Revisa el rendimiento de la base de datos. (4) Consulta [Ajuste de Rendimiento](../platform-settings/performance-tuning.md).

**P: ¿Cómo limpio la caché?**  
R: Ejecuta `php bin/console cache:clear --env=prod` desde la línea de comandos. No elimines manualmente el directorio `var/cache/` mientras la aplicación esté en ejecución.

**P: ¿Cuánto espacio en disco necesita Chamilo?**  
R: La aplicación en sí necesita alrededor de 2 GB descomprimida. El espacio total depende del contenido subido (documentos, videos, paquetes SCORM). Monitorea el uso del disco y planifica en consecuencia.

**P: ¿Cómo configuro copias de seguridad automáticas?**  
R: Consulta [Copias de Seguridad](../maintenance/backups.md). Como mínimo, programa un volcado diario de la base de datos y copias de seguridad regulares a nivel de archivo del directorio de subidas.

## Correo Electrónico

**P: Los usuarios no reciben correos electrónicos. ¿Qué debo verificar?**  
R: (1) Verifica `MAILER_DSN` en `.env`. (2) Ejecuta `php bin/console mailer:test someone@example.com` para probar. (3) Revisa las carpetas de spam. (4) Verifica los registros DNS SPF/DKIM. Consulta [Configuración de Correo Electrónico](../installation/email-configuration.md).

**P: ¿Puedo usar Gmail para enviar correos electrónicos?**  
R: Sí, para plataformas pequeñas o en desarrollo. Usa una contraseña de aplicación y ten en cuenta los límites de envío diarios de Gmail (500 correos/día para cuentas regulares).

## Seguridad

**P: ¿Cómo fuerzo el uso de HTTPS?**  
R: Configura tu servidor web para redirigir HTTP a HTTPS. Además, habilita la configuración "Forzar HTTPS" en **Administración > Configuraciones > Seguridad**. Consulta [Configuraciones de Seguridad](../platform-settings/security-settings.md).

**P: ¿Cómo bloqueo ataques de fuerza bruta en el inicio de sesión?**  
R: Configura el número máximo de intentos de inicio de sesión y CAPTCHA en las configuraciones de seguridad. Considera también usar fail2ban a nivel de servidor para protección adicional.

**P: Un usuario olvidó su contraseña y el correo electrónico no funciona. ¿Cómo puedo ayudarlo?**  
R: Como administrador, edita la cuenta del usuario directamente y establece una nueva contraseña. Ve a **Administración > Lista de usuarios**, busca la cuenta y actualiza el campo de contraseña.

---
## Actualizaciones

**P: ¿Puedo actualizar directamente de Chamilo 1.11.x a 2.0?**  
R: Sí, pero se trata de una migración importante, no de una simple actualización. Consulta [Actualización](../installation/upgrading.md). Siempre realiza pruebas en un servidor de pruebas primero.

**P: ¿Funcionarán mis complementos después de actualizar a 2.0?**  
R: No. Los complementos de 1.11.x no son compatibles con 2.0 y deben ser reescritos o reemplazados por funcionalidades equivalentes en 2.0.