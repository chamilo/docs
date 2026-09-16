# Guía de seguridad

Esta guía cubre las prácticas recomendadas de seguridad para ejecutar una plataforma Chamilo 3.0 en producción. La seguridad es una responsabilidad compartida entre el software de la plataforma, la configuración del servidor y las prácticas operativas continuas.

Para las herramientas integradas de supervisión y auditoría a las que se hace referencia a lo largo de esta guía (registros de intentos de inicio de sesión, detección de intrusiones, análisis de fortaleza de contraseñas y comprobaciones de integridad de archivos), consulte el capítulo [Seguridad](../security/README.md).

## Mantenga Chamilo actualizado

La práctica de seguridad más importante es mantener su instalación de Chamilo al día.

* Suscríbase a la cuenta X de seguridad de Chamilo (@chamilosecurity) o vigile el repositorio de GitHub para los anuncios de versiones.
* Aplique los parches de seguridad con prontitud. Las actualizaciones menores dentro de la rama 3.0 están diseñadas para aplicarse de forma segura.
* Siga el [proceso de actualización](../installation/upgrading.md) en cada actualización.

## HTTPS

Sirva siempre Chamilo a través de HTTPS en producción.

* Obtenga un certificado SSL/TLS (Let's Encrypt proporciona certificados gratuitos mediante Certbot).
* Configure su servidor web para redirigir todo el tráfico HTTP a HTTPS.
* Active la cabecera HSTS (HTTP Strict Transport Security) para evitar ataques de degradación:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Sin HTTPS, las credenciales de inicio de sesión, las cookies de sesión y todos los datos de usuario se transmiten en texto plano y pueden interceptarse en la red.

## Permisos de archivos

Restrinja los permisos de archivos al mínimo necesario.

| Ruta | Propietario | Permisos | Notas |
|------|-------|-------------|-------|
| Archivos de la aplicación (código fuente) | root o usuario de despliegue | 755 (dirs), 644 (files) | El servidor web necesita acceso de solo lectura. |
| `var/` | usuario del servidor web | 775 | Debe ser escribible para la caché de Symfony, los registros y las cargas de archivos |
| `.env` | root o usuario de despliegue | 640 | Contiene secretos. El servidor web necesita acceso de lectura solo durante el uso normal, pero necesita acceso de escritura durante la instalación. |
| `config/` | root o usuario de despliegue | 750 | Contiene secretos. El servidor web necesita acceso de lectura solo durante el uso normal, pero necesita acceso de escritura durante la instalación. |

Nunca establezca los permisos en 777. Nunca ejecute el servidor web como root.

## Políticas de contraseñas

Configure requisitos de contraseña sólidos en [Ajustes de seguridad](../platform-settings/security-settings.md):

* Longitud mínima de 8 caracteres (se recomiendan 12 o más).
* Exija una combinación de mayúsculas, minúsculas, números y caracteres especiales.
* Considere activar la caducidad de contraseñas en entornos impulsados por el cumplimiento normativo.
* Eduque a los usuarios sobre la elección de contraseñas fuertes y únicas.

## Limitación de tasa y protección contra fuerza bruta

### Nivel de aplicación

* Establezca **Máximo de intentos de inicio de sesión antes de bloquear la cuenta** (`login_max_attempt_before_blocking_account`) en un valor pequeño (por ejemplo, 5).
* Active **CAPTCHA** en la página de inicio de sesión. CAPTCHA está activado o desactivado: no se activa automáticamente tras N inicios de sesión fallidos. Combínelo con **Errores de CAPTCHA antes de bloquear** (`captcha_number_mistakes_to_block_account`) para bloquear una cuenta que sigue fallando el CAPTCHA.
* Revise periódicamente el informe de [Intentos de inicio de sesión](../security/login-attempts.md) para detectar patrones de fuerza bruta, y el informe de [Simple IDS](../security/simple-ids.md) para otras peticiones marcadas (intentos XSS, path traversal y similares).

### Nivel de servidor

Utilice **fail2ban** para supervisar los fallos de inicio de sesión y bloquear las direcciones IP ofensivas:

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

Cree un filtro coincidente en `/etc/fail2ban/filter.d/chamilo-auth.conf` para coincidir con las entradas de registro de fallos de autenticación.

## Gestión de sesiones

* Establezca una **duración de sesión** razonable (p. ej., 3600 segundos / 1 hora) en los ajustes de seguridad.
* Configure las **banderas de cookie de sesión** en su configuración de Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Considere desactivar «Recordarme» en plataformas con contenido sensible.

## Cabeceras de seguridad HTTP

Configure su servidor web para enviar cabeceras de seguridad:

| Cabecera | Valor | Propósito |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Impide el rastreo de tipos MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Impide el clickjacking mediante iframes. |
| `X-XSS-Protection` | `1; mode=block` | Protección XSS heredada para navegadores antiguos. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controla la filtración de información del referrer. |
| `Content-Security-Policy` | Variable | Controla qué recursos pueden cargarse. Requiere un ajuste cuidadoso para Chamilo. |

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

## Seguridad de la carga de archivos

* Bloquee las extensiones de archivos ejecutables (exe, bat, sh, php, phtml, cgi) en [Ajustes de seguridad](../platform-settings/security-settings.md).
* Configure su servidor web para **nunca ejecutar archivos cargados**. En Apache, añada lo siguiente a todo el directorio var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Analice los archivos cargados con un antivirus (ClamAV) si su entorno lo requiere.

## Seguridad de la base de datos

* Utilice un **usuario de base de datos dedicado** para Chamilo con únicamente los privilegios que necesita (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX sobre la base de datos de Chamilo).
* No utilice la cuenta root de la base de datos.
* Asegúrese de que la base de datos no sea accesible desde Internet público. Enlácela a localhost o a una red privada.
* Active el registro de auditoría de la base de datos en entornos sensibles al cumplimiento normativo.

## Copias de seguridad

* Programe **copias de seguridad automáticas diarias** tanto de la base de datos como de los archivos cargados.
* Almacene las copias de seguridad en una ubicación distinta del servidor (fuera del sitio o almacenamiento en la nube).
* Pruebe periódicamente la restauración de copias de seguridad para verificar que son utilizables.
* Cifre las copias de seguridad si contienen datos sensibles.

Consulte [Copias de seguridad](../maintenance/backups.md) para obtener instrucciones detalladas.

## Supervisión

* Supervise los registros de Chamilo en `var/log/prod.log` en busca de errores y actividad sospechosa.
* Configure la supervisión del servidor (CPU, memoria, disco) para detectar el agotamiento de recursos.
* Configure alertas ante fallos de autenticación reiterados.
* Revise periódicamente las cuentas de usuario en busca de cuentas no autorizadas o inactivas.
* Programe comprobaciones de [Integridad de archivos](../security/file-integrity.md) (Chamilo 3.0+) en cron para recibir notificaciones cuando los archivos instalados cambien de forma inesperada, y ejecute periódicamente el [Comprobador de fortaleza de contraseñas](../security/password-strength-checker.md), especialmente tras importaciones masivas de usuarios.

## Lista de comprobación

Utilice esta lista de comprobación al desplegar o auditar una instalación de Chamilo:

- [ ] HTTPS habilitado con certificado válido
- [ ] Redirección de HTTP a HTTPS configurada
- [ ] `APP_ENV=prod` y `APP_DEBUG=0` en `.env`
- [ ] `APP_SECRET` único generado
- [ ] Permisos de archivos restringidos (sin 777)
- [ ] Política de contraseñas configurada
- [ ] Intentos máximos de inicio de sesión y CAPTCHA habilitados
- [ ] Extensiones de archivos ejecutables bloqueadas
- [ ] Cabeceras de seguridad configuradas en el servidor web
- [ ] Indicadores de cookie de sesión establecidos (secure, httponly, samesite)
- [ ] El usuario de la base de datos tiene privilegios mínimos
- [ ] Copias de seguridad automáticas programadas y comprobadas
- [ ] Línea de base de integridad de archivos establecida y análisis programado en cron (Chamilo 3.0+)
- [ ] Supervisión de registros en funcionamiento
- [ ] La versión de Chamilo está actualizada