# Configuración de seguridad

Protección de inicio de sesión, política de contraseñas, cabeceras de seguridad de contenido, autenticación de dos factores y el sistema ligero de detección de intrusiones.

Esta página cubre la *política* de seguridad. Para las herramientas de supervisión que vigilan la plataforma usando esta política (registros de intentos de inicio de sesión, eventos de detección de intrusiones, análisis de fortaleza de contraseñas y comprobaciones de integridad de archivos), consulte [Seguridad](../security/README.md).

Acceda a estos ajustes en **Administración > Configuración > Seguridad**. Esta categoría contiene **32 ajustes**, listados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `2fa_enable`

**Habilitar 2FA**

Añade campos en la página de actualización de contraseña para habilitar 2FA mediante una aplicación autenticadora TOTP. Cuando está deshabilitado de forma global, los usuarios no verán los campos de 2FA y no se les pedirá 2FA al iniciar sesión, aunque lo hubieran habilitado previamente.

*Predeterminado: `false`*

### `access_to_personal_file_for_all`

**Acceso a archivos personales para todos**

Permite el acceso a todos los archivos personales sin restricción

*Predeterminado: `false`*


### `admins_can_set_users_pass`

**Los administradores pueden establecer las contraseñas de los usuarios de forma manual**

[inferido] Cuando está habilitado, los administradores pueden establecer las contraseñas de los usuarios de forma manual, sin exigir que los usuarios las restablezcan.

### `allow_captcha`

**CAPTCHA**

Habilita un CAPTCHA en el formulario de inicio de sesión, el formulario de inscripción y el formulario de contraseña olvidada para evitar el martilleo de contraseñas

*Predeterminado: `false`*

### `allow_online_users_by_status`

**Filtrar los usuarios que pueden verse como en línea**

Limita la visibilidad de los usuarios en línea a roles de usuario específicos.

### `allow_strength_pass_checker`

**Comprobador de fortaleza de contraseña**

Habilite esta opción para añadir un indicador visual de la fortaleza de la contraseña cuando el usuario la cambia. Esto NO impedirá que se añadan contraseñas débiles; actúa únicamente como ayuda visual.

*Predeterminado: `true`*


### `anonymous_autoprovisioning`

**Aprovisionar automáticamente más usuarios anónimos**

Crea de forma dinámica nuevos usuarios anónimos para soportar un tráfico elevado de visitantes.

*Predeterminado: `false`*


### `captcha_number_mistakes_to_block_account`

**Tolerancia de errores de CAPTCHA**

El número de veces que un usuario puede equivocarse en el recuadro CAPTCHA antes de que su cuenta quede bloqueada.

### `captcha_time_to_block`

**Tiempo de bloqueo de cuenta por CAPTCHA**

Si el usuario alcanza el máximo de errores de inicio de sesión permitidos (al usar el CAPTCHA), su cuenta se bloqueará durante este número de minutos.

### `check_password`

**Comprobar requisitos de contraseña**

Habilita la validación de los requisitos de contraseña definidos más arriba durante la creación o la actualización de la contraseña.

*Predeterminado: `false`*


### `file_integrity_check_notify_admins` **v3**

**Destinatarios de notificaciones de comprobación de integridad de archivos**

Lista de direcciones de correo electrónico, separadas por comas, a las que notificar cuando un análisis de integridad de archivos detecte un cambio. Déjela vacía para notificar en su lugar a todos los administradores globales.

### `filter_terms`

**Filtrar términos**

Indique una lista de términos, uno por línea, que se filtrarán de las páginas web y los correos electrónicos. Estos términos se sustituirán por ***.

### `force_renew_password_at_first_login`

**Forzar la renovación de contraseña en el primer inicio de sesión**

Es una medida sencilla para aumentar la seguridad de su portal: se pide a los usuarios que cambien de inmediato su contraseña, de modo que la que se les envió por correo electrónico deje de ser válida y usen una que ellos mismos hayan elegido y que solo ellos conozcan.

*Predeterminado: `false`*


### `hide_breadcrumb_if_not_allowed`

**Ocultar la ruta de navegación si «no permitido»**

Si el usuario no tiene permiso para acceder a una página concreta, oculta también la ruta de navegación (breadcrumb). Esto aumenta la seguridad al evitar mostrar información innecesaria.

*Predeterminado: `false`*


### `login_max_attempt_before_blocking_account`

**Máximo de intentos de inicio de sesión antes del bloqueo**

Número de intentos fallidos de inicio de sesión que se toleran antes de que la cuenta del usuario se bloquee y deba desbloquearla un administrador.

*Predeterminado: `0`*

### `password_requirements`

**Requisitos mínimos de sintaxis de contraseña**

Define la estructura exigida para las contraseñas de usuario. Ejemplo: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Use "specials" (plural) para exigir caracteres especiales.

### `password_rotation_days`

**Intervalo de rotación de contraseña (días)**

Número de días transcurridos los cuales los usuarios deben rotar su contraseña (0 = deshabilitado).

*Predeterminado: `0`*


### `prevent_multiple_simultaneous_login`

**Impedir inicios de sesión simultáneos**

Impide que los usuarios se conecten con la misma cuenta más de una vez. Es una buena opción en portales de acceso de pago, pero puede resultar restrictiva durante las pruebas, ya que solo un navegador puede conectarse con una cuenta determinada.

*Predeterminado: `false`*

### `proxy_settings`

**Configuración del proxy**

Algunas funciones de Chamilo se conectarán al exterior desde el servidor. Por ejemplo, para comprobar que un contenido externo existe al crear un enlace o al mostrar una página incrustada en la ruta de aprendizaje. Si su servidor de Chamilo utiliza un proxy para salir de su red, este sería el lugar para configurarlo.

### `security_block_inactive_users_immediately`

**Bloquear inmediatamente a los usuarios deshabilitados**

Bloquea de inmediato a los usuarios que han sido deshabilitados por el administrador a través de la gestión de usuarios. En caso contrario, los usuarios que han sido deshabilitados conservarán sus privilegios anteriores hasta que cierren sesión.

*Predeterminado: `false`*


### `security_content_policy`

**Content Security Policy**

Content Security Policy es una medida eficaz para proteger su sitio de ataques XSS. Al incluir en una lista blanca las fuentes de contenido aprobado, puede impedir que el navegador cargue recursos maliciosos. Esta configuración es especialmente complicada de establecer con editores WYSIWYG, pero si añade todos los dominios que desea autorizar para la inclusión de iframes en la declaración child-src, este ejemplo debería funcionar. Puede impedir que JavaScript se ejecute desde fuentes externas (incluido el interior de imágenes SVG) utilizando una lista estricta en el argumento 'script-src'. Déjelo en blanco para deshabilitarlo. Ejemplo de configuración: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy solo en modo informe**

Esta configuración le permite experimentar informando, pero sin aplicar, alguna Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning protege su sitio de ataques MiTM que utilizan certificados X.509 fraudulentos. Al incluir en una lista blanca únicamente las identidades en las que el navegador debe confiar, sus usuarios quedan protegidos en caso de que se vea comprometida una autoridad de certificación.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning solo en modo informe**

Esta configuración le permite experimentar informando, pero sin aplicar, algún HTTP Public Key Pinning.

### `security_referrer_policy`

**Security Referrer Policy**

Referrer Policy es una cabecera nueva que permite a un sitio controlar cuánta información incluye el navegador al navegar fuera de un documento y debería ser establecida por todos los sitios.

*Predeterminado: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie de sesión samesite**

Habilita el parámetro samesite:None para la cookie de sesión. Más información: https://www.chromium.org/updates/same-site y https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Predeterminado: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security es una excelente función que conviene admitir en su sitio y refuerza su implementación de TLS al hacer que el User Agent imponga el uso de HTTPS. Valor recomendado: 'strict-transport-security: max-age=63072000; includeSubDomains'. Consulte https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Puede incluir el sufijo 'preload', pero esto tiene consecuencias en el dominio de nivel superior (TLD), por lo que probablemente no deba hacerse a la ligera. Consulte https://hstspreload.org/. Déjelo en blanco para deshabilitarlo.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options impide que un navegador intente adivinar el tipo MIME del contenido y lo obliga a atenerse al content-type declarado. El único valor válido para esta cabecera es 'nosniff'.

*Predeterminado: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indica al navegador si desea permitir que su sitio se muestre en un marco o no. Al impedir que un navegador encuadre su sitio, puede defenderse de ataques como el clickjacking. Si se define aquí una URL, debe definir la(s) URL desde las que su contenido debe ser visible, no las URL desde las que su sitio acepta contenido. Por ejemplo, si su URL principal (root_web más arriba) es https://11.chamilo.org/, entonces esta configuración debería ser: 'ALLOW-FROM https://11.chamilo.org'. Estas cabeceras solo se aplican a las páginas en las que Chamilo es responsable de la generación de las cabeceras HTTP (es decir, archivos '.php'). No se aplican a archivos estáticos. Si experimenta con esta función, asegúrese de actualizar también la configuración de su servidor web para añadir las cabeceras correctas a los archivos estáticos. Consulte la documentación de configuración de CDN más arriba (busque 'add_header') para más información. Valor recomendado (estricto) para esta configuración, si está habilitada: 'SAMEORIGIN'.

*Predeterminado: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection establece la configuración del filtro de cross-site scripting integrado en la mayoría de los navegadores. Valor recomendado '1; mode=block'.

*Predeterminado: `1; mode=block`*


### `user_reset_password`

**Habilitar token de restablecimiento de contraseña**

Esta opción permite generar un token de un solo uso con caducidad, enviado por correo electrónico al usuario para restablecer su contraseña.

*Predeterminado: `false`*

### `user_reset_password_token_limit`

**Límite de tiempo para el token de restablecimiento de contraseña**

El número de segundos transcurridos antes de que el token generado caduque automáticamente y no pueda utilizarse (es necesario generar un nuevo token).

*Valor predeterminado: `3600`*