# Intentos de inicio de sesión

El informe de Intentos de inicio de sesión muestra un registro de los intentos fallidos de inicio de sesión, con gráficos que ayudan a detectar patrones de fuerza bruta o de relleno de credenciales.

## Acceso a Intentos de inicio de sesión

Desde el panel de administración, haga clic en **Seguridad > Intentos de inicio de sesión**.

## Qué muestra

![La página de Intentos de inicio de sesión, con gráficos de intentos por día, IPs principales, intentos fallidos por mes, inicios de sesión correctos frente a fallidos, intentos por hora e IPs únicas por día, seguida de una tabla de intentos fallidos de inicio de sesión](../../.gitbook/assets/admin-security-login-attempts.png)

* **Intentos por día (últimos 7 días)** — Recuento diario de intentos fallidos
* **IPs principales (últimos 30 días)** — Qué direcciones IP generaron más intentos
* **Intentos fallidos por mes (últimos 12 meses)** — Tendencia a más largo plazo
* **Correctos frente a fallidos (últimos 30 días)** — Desglose diario de inicios de sesión correctos frente a fallidos
* **Intentos por hora (últimos 7 días)** — Distribución por hora del día, útil para detectar intentos automatizados o por script
* **IPs únicas por día (últimos 30 días)** — Cuántas IPs distintas intentaron iniciar sesión cada día
* **Tabla de intentos fallidos de inicio de sesión** — Cada intento fallido, con fecha, dirección IP y nombre de usuario utilizado

Utilice los campos **Nombre de usuario**, **IP** y el intervalo de fechas situados encima de los gráficos para filtrar el informe.

## Ajustes relacionados

Este informe es una herramienta de supervisión; las protecciones reales contra la fuerza bruta se configuran en [Ajustes de seguridad](../platform-settings/security-settings.md):

* **Máximo de intentos de inicio de sesión antes del bloqueo** (`login_max_attempt_before_blocking_account`) — Bloquea una cuenta tras demasiados intentos fallidos
* **CAPTCHA** (`allow_captcha`) y **Margen de errores de CAPTCHA** (`captcha_number_mistakes_to_block_account`) — Ralentizan los intentos automatizados y bloquean las cuentas que siguen fallando el CAPTCHA

Consulte también la [Guía de seguridad](../appendix/security-guide.md) para la protección contra fuerza bruta a nivel de servidor (fail2ban).