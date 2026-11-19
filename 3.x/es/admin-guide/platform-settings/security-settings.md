# Configuración de seguridad

Protección del inicio de sesión, política de contraseñas, cabeceras de seguridad de contenido, autenticación de dos factores y el sistema ligero de detección de intrusiones.

Esta página trata de la *política* de seguridad. Para las herramientas de supervisión que vigilan la plataforma según esta política (registros de intentos de inicio de sesión, eventos de detección de intrusiones, análisis de fortaleza de contraseñas y comprobaciones de integridad de archivos), consulte [Seguridad](../security/README.md).

Acceda a estos ajustes en **Administración > Configuración > Seguridad**. Esta categoría contiene **40 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de ajustes de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `2fa_enable`

**Activar 2FA**

Añade campos en la página de actualización de contraseña para activar la 2FA mediante una aplicación autenticadora TOTP. Si se desactiva de forma global, los usuarios no verán los campos de 2FA ni se les solicitará la 2FA al iniciar sesión, aunque la hubieran activado anteriormente.

*Valor predeterminado: `false`*

### `access_to_personal_file_for_all`

**Acceso al archivo personal para todos**

Permite el acceso a todos los archivos personales sin restricción

*Valor predeterminado: `false`*


### `admins_can_set_users_pass`

**Los administradores pueden establecer las contraseñas de los usuarios manualmente**

[inferido] Cuando está activado, los administradores pueden establecer manualmente las contraseñas de los usuarios de forma directa, sin exigir que los usuarios las restablezcan.

### `allow_captcha`

**CAPTCHA**

Activa un CAPTCHA en el formulario de inicio de sesión, el formulario de inscripción y el formulario de contraseña olvidada para evitar el martilleo de contraseñas

*Valor predeterminado: `false`*

### `allow_online_users_by_status`

**Filtrar los usuarios que pueden verse como conectados**

Limita la visibilidad de los usuarios conectados a roles de usuario específicos.

### `allow_strength_pass_checker`

**Comprobador de fortaleza de contraseña**

Active esta opción para añadir un indicador visual de la fortaleza de la contraseña cuando el usuario cambie su contraseña. Esto NO impedirá que se añadan contraseñas débiles; solo actúa como ayuda visual.

*Valor predeterminado: `true`*


### `anonymous_autoprovisioning`

**Aprovisionar automáticamente más usuarios anónimos**

Crea de forma dinámica nuevos usuarios anónimos para soportar un tráfico elevado de visitantes.

*Valor predeterminado: `false`*


### `captcha_number_mistakes_to_block_account`

**Margen de errores de CAPTCHA**

Número de veces que un usuario puede equivocarse en el recuadro de CAPTCHA antes de que su cuenta quede bloqueada.

### `captcha_time_to_block`

**Tiempo de bloqueo de cuenta por CAPTCHA**

Si el usuario alcanza el margen máximo de errores de inicio de sesión (al usar el CAPTCHA), su cuenta quedará bloqueada durante este número de minutos.

### `check_password`

**Comprobar los requisitos de contraseña**

Activa la validación de los requisitos de contraseña definidos anteriormente durante la creación o la actualización de la contraseña.

*Valor predeterminado: `false`*


### `confidential_reporting_attachments_enabled`

**Permitir adjuntos de pruebas confidenciales**

Controla si quienes informan pueden adjuntar archivos de pruebas a un informe confidencial.

*Valor predeterminado: `true`*

### `confidential_reporting_enabled`

**Activar los informes confidenciales de bienestar**

Activa el flujo de trabajo de informes confidenciales e investigación. El almacenamiento privado de claves de cifrado debe estar listo antes de activarlo. Consulte [Informes confidenciales](../security/confidential-reporting.md).

*Valor predeterminado: `false`*

### `confidential_reporting_min_reporters`

**Número mínimo de informantes distintos para una investigación**

Una investigación solo es visible para los investigadores autorizados después de que este número de informantes distintos haya enviado informes relativos a la misma persona. Intervalo válido: **2–10**.

*Valor predeterminado: `2`*

### `confidential_reporting_notifications_enabled`

**Mostrar notificaciones de investigaciones confidenciales**

Muestra una indicación interna de las investigaciones elegibles. **No envía correos electrónicos ni notificaciones externas.**

*Valor predeterminado: `false`*

### `dynamic_client_registration`

**Activar el registro dinámico de clientes OAuth más allá de MCP**

Controla la validación adicional del ámbito de registro de clientes OAuth cuando el servidor OAuth está activado. El punto de registro con límite de tasa sigue disponible para el flujo de registro MCP admitido. Este ajuste no concede acceso a recursos protegidos OAuth futuros arbitrarios. Consulte [Servidor de autorización OAuth](../authentication/oauth-server.md).

*Valor predeterminado: `false`*

### `file_integrity_check_notify_admins` **v3**

**Destinatarios de la notificación de comprobación de integridad de archivos**

Lista de direcciones de correo electrónico separadas por comas a las que notificar cuando un análisis de integridad de archivos detecte un cambio. Déjela vacía para notificar en su lugar a todos los administradores globales.

### `filter_terms`

**Filtrar términos**

Indique una lista de términos, uno por línea, que se filtrarán de las páginas web y los correos electrónicos. Estos términos se sustituirán por ***.

### `force_renew_password_at_first_login`

**Forzar la renovación de la contraseña en el primer inicio de sesión**

Esta es una medida sencilla para aumentar la seguridad de su portal al pedir a los usuarios que cambien inmediatamente su contraseña, de modo que la que se transfirió por correo electrónico deje de ser válida y utilicen a partir de entonces una que hayan elegido ellos y que solo ellos conozcan.

*Valor predeterminado: `false`*


### `hide_breadcrumb_if_not_allowed`

**Ocultar la ruta de navegación si «no está permitido»**

Si el usuario no tiene permiso para acceder a una página concreta, ocultar también la ruta de navegación. Esto aumenta la seguridad al evitar mostrar información innecesaria.

*Valor predeterminado: `false`*


### `login_max_attempt_before_blocking_account`

**Intentos máximos de inicio de sesión antes del bloqueo**

Número de intentos fallidos de inicio de sesión que se toleran antes de que la cuenta de usuario quede bloqueada y deba ser desbloqueada por un administrador.

*Valor predeterminado: `0`*

### `mcp_allowed_roles`

**Permitir MCP por roles**

Mapa JSON de los roles de usuario de Chamilo autorizados a utilizar MCP. Un usuario debe coincidir con al menos un rol habilitado. Esta restricción también se aplica a las claves de API generadas previamente y a las conexiones OAuth existentes. Las claves reconocidas son `ADMIN`, `COURSEMANAGER`, `STUDENT`, `HRM`, `SESSIONADMIN`, `STUDENT_BOSS` e `INVITEE`; un JSON no válido deniega MCP a todos los roles. Las configuraciones existentes pueden seguir utilizando `DRH` cuando `HRM` está ausente; cuando existen ambas claves, `HRM` tiene prioridad. Consulte [MCP](../mcp.md).

*Valor predeterminado: `{"ADMIN":true,"COURSEMANAGER":true,"STUDENT":false,"HRM":false,"SESSIONADMIN":false,"STUDENT_BOSS":false,"INVITEE":false}`*

### `mcp_enabled`

**Habilitar el servidor MCP**

Habilita el punto de conexión MCP de Chamilo y la interfaz personal de claves de API de MCP. Cuando está deshabilitado, las claves de API existentes, los tokens de acceso OAuth y las credenciales JWT no pueden utilizarse en /mcp. Mientras esté deshabilitado, el botón **Clave de API de MCP** no se muestra en la página de red social del usuario. Consulte [MCP](../mcp.md).

*Valor predeterminado: `false`*

### `password_requirements`

**Requisitos mínimos de sintaxis de la contraseña**

Define la estructura exigida para las contraseñas de usuario. Ejemplo: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Utilice "specials" (en plural) para exigir caracteres especiales.

### `password_rotation_days`

**Intervalo de rotación de contraseñas (días)**

Número de días antes de que los usuarios deban rotar su contraseña (0 = deshabilitado).

*Valor predeterminado: `0`*


### `prevent_multiple_simultaneous_login`

**Impedir el inicio de sesión simultáneo**

Impide que los usuarios se conecten con la misma cuenta más de una vez. Es una buena opción en portales de pago por acceso, pero puede resultar restrictiva durante las pruebas, ya que solo un navegador puede conectarse con una cuenta determinada.

*Valor predeterminado: `false`*


### `proxy_settings`

**Configuración del proxy**

Algunas funciones de Chamilo se conectarán al exterior desde el servidor. Por ejemplo, para comprobar que existe un contenido externo al crear un enlace o al mostrar una página incrustada en la ruta de aprendizaje. Si su servidor Chamilo utiliza un proxy para salir de su red, este sería el lugar para configurarlo.

### `remember_me_days`

**Duración de «Recordarme» (días)**

Establece la duración de las cookies de inicio de sesión persistente y de sus tokens en la base de datos. Acepta de **0 a 90** días; `0` deshabilita la opción Recordarme, y el formulario de inicio de sesión solo muestra esta opción en conexiones HTTPS.

*Valor predeterminado: `14` días*

### `security_block_inactive_users_immediately`

**Bloquear de inmediato a los usuarios deshabilitados**

Bloquear de inmediato a los usuarios que el administrador haya deshabilitado mediante la gestión de usuarios. De lo contrario, los usuarios deshabilitados conservarán sus privilegios anteriores hasta que cierren la sesión.

*Valor predeterminado: `false`*


### `security_content_policy`

**Política de seguridad de contenido**

La política de seguridad de contenido (Content Security Policy) es una medida eficaz para proteger su sitio frente a ataques XSS. Al incluir en una lista blanca las fuentes de contenido aprobado, puede impedir que el navegador cargue recursos maliciosos. Esta configuración es especialmente complicada de establecer con editores WYSIWYG, pero si añade todos los dominios que desee autorizar para la inclusión de iframes en la declaración child-src, este ejemplo debería funcionarle. Puede impedir que JavaScript se ejecute desde fuentes externas (incluso dentro de imágenes SVG) utilizando una lista estricta en el argumento 'script-src'. Déjelo en blanco para deshabilitarlo. Ejemplo de configuración: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Política de seguridad de contenido solo en modo informe**

Esta configuración le permite experimentar informando, pero sin aplicar, alguna política de seguridad de contenido.

### `security_public_key_pins`

**Fijación de clave pública HTTP**

La fijación de clave pública HTTP (HTTP Public Key Pinning) protege su sitio frente a ataques MiTM que utilizan certificados X.509 fraudulentos. Al incluir en una lista blanca solo las identidades en las que el navegador debe confiar, sus usuarios quedan protegidos en caso de que una autoridad de certificación se vea comprometida.

### `security_public_key_pins_report_only`

**Fijación de clave pública HTTP solo en modo informe**

Esta configuración le permite experimentar informando, pero sin aplicar, alguna fijación de clave pública HTTP.

### `security_referrer_policy`

**Política de referente de seguridad**

La política de referente (Referrer Policy) es una nueva cabecera que permite a un sitio controlar cuánta información incluye el navegador al navegar fuera de un documento y debería configurarse en todos los sitios.

*Valor predeterminado: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie de sesión samesite**

Habilita el parámetro samesite:None para la cookie de sesión. Más información: https://www.chromium.org/updates/same-site y https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Valor predeterminado: `false`*

### `security_strict_transport`

**Seguridad de transporte estricta HTTP**

HTTP Strict Transport Security es una excelente función que conviene admitir en su sitio y refuerza su implementación de TLS al hacer que el agente de usuario imponga el uso de HTTPS. Valor recomendado: 'strict-transport-security: max-age=63072000; includeSubDomains'. Consulte https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Puede incluir el sufijo 'preload', pero esto tiene consecuencias en el dominio de nivel superior (TLD), por lo que probablemente no deba hacerse a la ligera. Consulte https://hstspreload.org/. Déjelo en blanco para deshabilitarlo.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options impide que un navegador intente detectar el tipo de contenido mediante MIME-sniffing y lo obliga a ceñirse al content-type declarado. El único valor válido para esta cabecera es 'nosniff'.

*Valor predeterminado: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indica al navegador si desea permitir que su sitio se muestre en un marco o no. Al impedir que un navegador enmarque su sitio, puede defenderse de ataques como el clickjacking. Si define aquí una URL, debe indicar la(s) URL desde las que su contenido debe ser visible, no las URL desde las que su sitio acepta contenido. Por ejemplo, si su URL principal (root_web más arriba) es https://11.chamilo.org/, esta configuración debería ser: 'ALLOW-FROM https://11.chamilo.org'. Estas cabeceras solo se aplican a las páginas en las que Chamilo es responsable de la generación de las cabeceras HTTP (es decir, los archivos '.php'). No se aplican a los archivos estáticos. Si experimenta con esta función, asegúrese también de actualizar la configuración de su servidor web para añadir las cabeceras correctas a los archivos estáticos. Consulte la documentación de configuración de CDN anterior (busque 'add_header') para obtener más información. Valor recomendado (estricto) para esta configuración, si está habilitada: 'SAMEORIGIN'.

*Valor predeterminado: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection establece la configuración del filtro de secuencias de comandos entre sitios integrado en la mayoría de los navegadores. Valor recomendado: '1; mode=block'.

*Valor predeterminado: `1; mode=block`*


### `user_reset_password`

**Habilitar el token de restablecimiento de contraseña**

Esta opción permite generar un token de un solo uso y con caducidad que se envía por correo electrónico al usuario para restablecer su contraseña.

*Valor predeterminado: `false`*


### `user_reset_password_token_limit`

**Límite de tiempo del token de restablecimiento de contraseña**

El número de segundos antes de que el token generado caduque automáticamente y ya no pueda utilizarse (es necesario generar un nuevo token).

*Valor predeterminado: `3600`*