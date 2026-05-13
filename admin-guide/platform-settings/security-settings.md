# Configuraciones de Seguridad

Protección de inicio de sesión, política de contraseñas, encabezados de seguridad de contenido, autenticación de dos factores y el sistema ligero de detección de intrusos.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Seguridad**. Esta categoría contiene **31 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `2fa_enable`

**Habilitar 2FA**

Añade campos en la página de actualización de contraseña para habilitar 2FA usando una aplicación de autenticación TOTP. Cuando está deshabilitado globalmente, los usuarios no verán los campos de 2FA y no se les pedirá 2FA al iniciar sesión, incluso si lo habían habilitado previamente.

*Predeterminado: `false`*

### `access_to_personal_file_for_all`

**Acceso a archivos personales para todos**

Permite el acceso a todos los archivos personales sin restricciones.

*Predeterminado: `false`*

### `admins_can_set_users_pass`

**Los administradores pueden establecer contraseñas de usuarios manualmente**

[Inferido] Cuando está habilitado, los administradores pueden establecer manualmente las contraseñas de los usuarios directamente sin requerir que los usuarios las restablezcan.

### `allow_captcha`

**CAPTCHA**

Habilita un CAPTCHA en el formulario de inicio de sesión, formulario de inscripción y formulario de contraseña perdida para evitar ataques de fuerza bruta en contraseñas.

*Predeterminado: `false`*

### `allow_online_users_by_status`

**Filtrar usuarios que pueden verse como conectados**

Limita la visibilidad de usuarios en línea a roles de usuario específicos.

### `allow_strength_pass_checker`

**Comprobador de fortaleza de contraseña**

Habilita esta opción para agregar un indicador visual de la fortaleza de la contraseña cuando el usuario cambia su contraseña. Esto NO evitará que se añadan contraseñas débiles, solo actúa como una ayuda visual.

*Predeterminado: `true`*

### `anonymous_autoprovisioning`

**Autoaprovisionamiento de más usuarios anónimos**

Crea dinámicamente nuevos usuarios anónimos para soportar un alto tráfico de visitantes.

*Predeterminado: `false`*

### `captcha_number_mistakes_to_block_account`

**Tolerancia de errores en CAPTCHA**

El número de veces que un usuario puede equivocarse en el cuadro de CAPTCHA antes de que su cuenta sea bloqueada.

### `captcha_time_to_block`

**Tiempo de bloqueo de cuenta por CAPTCHA**

Si el usuario alcanza el máximo de errores permitidos en el inicio de sesión (cuando usa CAPTCHA), su cuenta será bloqueada durante este número de minutos.

### `check_password`

**Verificar requisitos de contraseña**

Habilita la validación de los requisitos de contraseña definidos anteriormente durante la creación o actualización de contraseñas.

*Predeterminado: `false`*

### `filter_terms`

**Filtrar términos**

Proporciona una lista de términos, uno por línea, que serán filtrados de las páginas web y correos electrónicos. Estos términos serán reemplazados por ***.

### `force_renew_password_at_first_login`

**Forzar renovación de contraseña en el primer inicio de sesión**

Esta es una medida simple para aumentar la seguridad de tu portal al pedir a los usuarios que cambien inmediatamente su contraseña, de modo que la que fue transferida por correo electrónico ya no sea válida y utilicen una que ellos mismos hayan creado y que solo ellos conozcan.

*Predeterminado: `false`*

### `hide_breadcrumb_if_not_allowed`

**Ocultar migajas de pan si 'no permitido'**

Si el usuario no tiene permitido acceder a una página específica, también se ocultan las migajas de pan. Esto aumenta la seguridad al evitar la visualización de información innecesaria.

*Predeterminado: `false`*

### `login_max_attempt_before_blocking_account`

**Máximo de intentos de inicio de sesión antes del bloqueo**

Número de intentos fallidos de inicio de sesión que se toleran antes de que la cuenta del usuario sea bloqueada y deba ser desbloqueada por un administrador.

*Predeterminado: `0`*

### `password_requirements`

**Requisitos mínimos de sintaxis de contraseña**

Define la estructura requerida para las contraseñas de los usuarios. Ejemplo: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Usa "specials" (plural) para requerir caracteres especiales.

### `password_rotation_days`

**Intervalo de rotación de contraseña (días)**

Número de días antes de que los usuarios deban rotar su contraseña (0 = deshabilitado).

*Predeterminado: `0`*

### `prevent_multiple_simultaneous_login`

**Evitar inicio de sesión simultáneo**

Impide que los usuarios se conecten con la misma cuenta más de una vez. Esta es una buena opción en portales de pago por acceso, pero puede ser restrictiva durante las pruebas, ya que solo un navegador puede conectarse con una cuenta dada.

*Predeterminado: `false`*

### `proxy_settings`

**Configuraciones de proxy**

Algunas funcionalidades de Chamilo se conectan al exterior desde el servidor. Por ejemplo, para asegurarse de que un contenido externo existe al crear un enlace o mostrar una página incrustada en la ruta de aprendizaje. Si tu servidor Chamilo usa un proxy para salir de su red, este sería el lugar para configurarlo.

### `security_block_inactive_users_immediately`

**Bloquear usuarios desactivados inmediatamente**

Bloquea de inmediato a los usuarios que han sido desactivados por el administrador a través de la gestión de usuarios. De lo contrario, los usuarios desactivados mantendrán sus privilegios anteriores hasta que cierren sesión.

*Predeterminado: `false`*

---
### `security_content_policy`

**Política de Seguridad de Contenido**

La Política de Seguridad de Contenido es una medida efectiva para proteger su sitio de ataques XSS. Al incluir en una lista blanca las fuentes de contenido aprobadas, puede evitar que el navegador cargue activos maliciosos. Esta configuración es particularmente complicada de establecer con editores WYSIWYG, pero si agrega todos los dominios que desea autorizar para la inclusión de iframes en la declaración child-src, este ejemplo debería funcionar para usted. Puede prevenir que JavaScript se ejecute desde fuentes externas (incluyendo dentro de imágenes SVG) utilizando una lista estricta en el argumento 'script-src'. Déjelo en blanco para desactivar. Ejemplo de configuración: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Política de Seguridad de Contenido solo en modo informe**

Esta configuración le permite experimentar reportando pero sin aplicar algunas Políticas de Seguridad de Contenido.

### `security_public_key_pins`

**Anclaje de Clave Pública HTTP**

El Anclaje de Clave Pública HTTP protege su sitio de ataques MiTM que utilizan certificados X.509 falsos. Al incluir en una lista blanca solo las identidades en las que el navegador debería confiar, sus usuarios están protegidos en caso de que una autoridad de certificación sea comprometida.

### `security_public_key_pins_report_only`

**Anclaje de Clave Pública HTTP solo en modo informe**

Esta configuración le permite experimentar reportando pero sin aplicar algunos Anclajes de Clave Pública HTTP.

### `security_referrer_policy`

**Política de Referencia de Seguridad**

La Política de Referencia es un nuevo encabezado que permite a un sitio controlar cuánta información incluye el navegador al navegar fuera de un documento y debería ser configurada por todos los sitios.

*Predeterminado: `origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**Cookie de sesión samesite**

Habilite el parámetro samesite:None para la cookie de sesión. Más información: https://www.chromium.org/updates/same-site y https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Predeterminado: `false`*

### `security_strict_transport`

**Seguridad de Transporte Estricta HTTP**

La Seguridad de Transporte Estricta HTTP es una excelente característica para implementar en su sitio y fortalece su implementación de TLS al hacer que el Agente de Usuario fuerce el uso de HTTPS. Valor recomendado: 'strict-transport-security: max-age=63072000; includeSubDomains'. Consulte https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Puede incluir el sufijo 'preload', pero esto tiene consecuencias en el dominio de nivel superior (TLD), por lo que probablemente no debe hacerse a la ligera. Consulte https://hstspreload.org/. Déjelo en blanco para desactivar.

### `security_x_content_type_options`

**Opciones de Tipo de Contenido X**

Las Opciones de Tipo de Contenido X impiden que un navegador intente detectar el tipo de contenido mediante MIME-sniffing y lo obligan a adherirse al tipo de contenido declarado. El único valor válido para este encabezado es 'nosniff'.

*Predeterminado: `nosniff`*

### `security_x_frame_options`

**Opciones de Marco X**

Las Opciones de Marco X indican al navegador si desea permitir que su sitio sea enmarcado o no. Al evitar que un navegador enmarque su sitio, puede defenderse contra ataques como el clickjacking. Si define una URL aquí, debería especificar la(s) URL(s) desde las cuales su contenido debería ser visible, no las URL desde las cuales su sitio acepta contenido. Por ejemplo, si su URL principal (root_web arriba) es https://11.chamilo.org/, entonces esta configuración debería ser: 'ALLOW-FROM https://11.chamilo.org'. Estos encabezados solo se aplican a páginas donde Chamilo es responsable de la generación de los encabezados HTTP (es decir, archivos '.php'). No se aplica a archivos estáticos. Si experimenta con esta característica, asegúrese de actualizar también la configuración de su servidor web para agregar los encabezados correctos para archivos estáticos. Consulte la documentación de configuración de CDN arriba (busque 'add_header') para más información. Valor recomendado (estricto) para esta configuración, si está habilitada: 'SAMEORIGIN'.

*Predeterminado: `SAMEORIGIN`*

### `security_xss_protection`

**Protección contra XSS**

La Protección contra XSS configura el filtro de scripting entre sitios integrado en la mayoría de los navegadores. Valor recomendado: '1; mode=block'.

*Predeterminado: `1; mode=block`*

### `user_reset_password`

**Habilitar token de restablecimiento de contraseña**

Esta opción permite generar un token de uso único con vencimiento que se envía por correo electrónico al usuario para restablecer su contraseña.

*Predeterminado: `false`*

### `user_reset_password_token_limit`

**Límite de tiempo para el token de restablecimiento de contraseña**

El número de segundos antes de que el token generado expire automáticamente y no pueda ser usado más (se necesita generar un nuevo token).

*Predeterminado: `3600`*