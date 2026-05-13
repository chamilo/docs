# Guía de Seguridad

Esta guía aborda las mejores prácticas de seguridad para operar una plataforma Chamilo 2.0 en producción. La seguridad es una responsabilidad compartida entre el software de la plataforma, la configuración de su servidor y las prácticas operativas continuas.

## Mantener Chamilo Actualizado

La práctica de seguridad más importante es mantener su instalación de Chamilo actualizada.

* Suscríbase a la cuenta X de seguridad de Chamilo (@chamilosecurity) o siga el repositorio de GitHub para recibir anuncios de lanzamientos.
* Aplique los parches de seguridad de manera inmediata. Las actualizaciones menores dentro de la rama 2.0 están diseñadas para ser seguras de aplicar.
* Siga el [proceso de actualización](../installation/upgrading.md) para cada actualización.

## HTTPS

Siempre sirva Chamilo a través de HTTPS en producción.

* Obtenga un certificado SSL/TLS (Let's Encrypt ofrece certificados gratuitos a través de Certbot).
* Configure su servidor web para redirigir todo el tráfico HTTP a HTTPS.
* Habilite el encabezado HSTS (HTTP Strict Transport Security) para prevenir ataques de degradación:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sin HTTPS, las credenciales de inicio de sesión, las cookies de sesión y todos los datos de los usuarios se transmiten en texto plano y pueden ser interceptados en la red.

## Permisos de Archivos

Restrinja los permisos de archivos al mínimo necesario.

| Ruta | Propietario | Permisos | Notas |
|------|-------------|----------|-------|
| Archivos de la aplicación (código fuente) | root o usuario de despliegue | 755 (directorios), 644 (archivos) | El servidor web necesita acceso de solo lectura. |
| `var/` | usuario del servidor web | 775 | Debe ser escribible para el caché de Symfony, registros y subidas de archivos |
| `.env` | root o usuario de despliegue | 640 | Contiene secretos. El servidor web necesita acceso de lectura solo durante el uso normal, pero requiere acceso de escritura durante la instalación. |
| `config/` | root o usuario de despliegue | 750 | Contiene secretos. El servidor web necesita acceso de lectura solo durante el uso normal, pero requiere acceso de escritura durante la instalación. |

Nunca establezca permisos a 777. Nunca ejecute el servidor web como root.

## Políticas de Contraseñas

Configure requisitos estrictos para las contraseñas en [Configuraciones de Seguridad](../platform-settings/security-settings.md):

* Longitud mínima de 8 caracteres (se recomiendan 12 o más).
* Exija una combinación de mayúsculas, minúsculas, números y caracteres especiales.
* Considere habilitar la expiración de contraseñas en entornos impulsados por cumplimiento normativo.
* Eduque a los usuarios sobre la elección de contraseñas fuertes y únicas.

## Limitación de Tasa y Protección contra Fuerza Bruta

### Nivel de Aplicación

* Establezca un valor pequeño para **Intentos máximos de inicio de sesión antes de bloquear la cuenta** (`login_max_attempt_before_blocking_account`), por ejemplo, 5.
* Habilite **CAPTCHA** en la página de inicio de sesión. CAPTCHA está activado o desactivado; no se activa automáticamente después de N intentos fallidos. Combínelo con **Errores de CAPTCHA antes de bloquear** (`captcha_number_mistakes_to_block_account`) para bloquear una cuenta que siga fallando el CAPTCHA.

### Nivel de Servidor

Use **fail2ban** para monitorear fallos de inicio de sesión y bloquear direcciones IP ofensivas:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Cree un filtro correspondiente en `/etc/fail2ban/filter.d/chamilo-auth.conf` para coincidir con las entradas de registro de fallos de autenticación.

## Gestión de Sesiones

* Establezca un **tiempo de vida de sesión** razonable (por ejemplo, 3600 segundos / 1 hora) en las configuraciones de seguridad.
* Configure **banderas de cookies de sesión** en su configuración de Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Solo enviar a través de HTTPS
          cookie_httponly: true     # No accesible mediante JavaScript
          cookie_samesite: lax     # Protección contra CSRF
  ```

* Considere deshabilitar "Recordarme" en plataformas con contenido sensible.

## Encabezados de Seguridad HTTP

Configure su servidor web para enviar encabezados de seguridad:

| Encabezado | Valor | Propósito |
|------------|-------|-----------|
| `X-Content-Type-Options` | `nosniff` | Previene la detección de tipo MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Previene el clickjacking a través de iframes. |
| `X-XSS-Protection` | `1; mode=block` | Protección XSS heredada para navegadores antiguos. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controla la fuga de información de referencia. |
| `Content-Security-Policy` | Varía | Controla qué recursos se pueden cargar. Requiere ajustes cuidadosos para Chamilo. |

Ejemplo para Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Ejemplo para Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Seguridad de Carga de Archivos

* Bloquee extensiones de archivos ejecutables (exe, bat, sh, php, phtml, cgi) en [Configuraciones de Seguridad](../platform-settings/security-settings.md).
* Configure su servidor web para que **nunca ejecute archivos cargados**. Para Apache, añada lo siguiente al directorio completo var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Escanee los archivos cargados con un antivirus (ClamAV) si su entorno lo requiere.

## Seguridad de la Base de Datos

* Utilice un **usuario de base de datos dedicado** para Chamilo con solo los privilegios que necesita (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX en la base de datos de Chamilo).
* No utilice la cuenta root de la base de datos.
* Asegúrese de que la base de datos no sea accesible desde internet público. Enlácela a localhost o a una red privada.
* Habilite el registro de auditoría de la base de datos para entornos sensibles al cumplimiento normativo.

## Copias de Seguridad

* Programe **copias de seguridad automatizadas diarias** tanto de la base de datos como de los archivos cargados.
* Almacene las copias de seguridad en una ubicación separada del servidor (fuera del sitio o en almacenamiento en la nube).
* Pruebe periódicamente la restauración de copias de seguridad para verificar que sean utilizables.
* Cifre las copias de seguridad si contienen datos sensibles.

Consulte [Copias de Seguridad](../maintenance/backups.md) para obtener instrucciones detalladas.

## Monitoreo

* Monitoree los registros de Chamilo en `var/log/prod.log` para detectar errores y actividades sospechosas.
* Configure el monitoreo del servidor (CPU, memoria, disco) para detectar el agotamiento de recursos.
* Establezca alertas para fallos de autenticación repetidos.
* Revise periódicamente las cuentas de usuario en busca de cuentas no autorizadas o inactivas.

## Lista de Verificación

Utilice esta lista de verificación al implementar o auditar una instalación de Chamilo:

- [ ] HTTPS habilitado con certificado válido
- [ ] Redirección de HTTP a HTTPS configurada
- [ ] `APP_ENV=prod` y `APP_DEBUG=0` en `.env`
- [ ] `APP_SECRET` único generado
- [ ] Permisos de archivo restringidos (sin 777)
- [ ] Política de contraseñas configurada
- [ ] Intentos máximos de inicio de sesión y CAPTCHA habilitados
- [ ] Extensiones de archivos ejecutables bloqueadas
- [ ] Encabezados de seguridad configurados en el servidor web
- [ ] Indicadores de cookies de sesión establecidos (secure, httponly, samesite)
- [ ] Usuario de base de datos con privilegios mínimos
- [ ] Copias de seguridad automatizadas programadas y probadas
- [ ] Monitoreo de registros implementado
- [ ] Versión de Chamilo actualizada