# Seguridad

El bloque **Seguridad** del panel de administración agrupa las herramientas integradas de supervisión y auditoría de seguridad de la plataforma. Es independiente de [Ajustes de seguridad](../platform-settings/security-settings.md), que configura la *política* de seguridad (reglas de contraseñas, CAPTCHA, cabeceras HTTP de seguridad, etc.): este bloque ofrece los *informes y herramientas* que vigilan la plataforma en busca de actividad sospechosa y cambios no deseados.

![El bloque Seguridad en el panel de administración, con Auditoría de actividades, Intentos de inicio de sesión, IDS simple, Comprobador de fortaleza de contraseñas e Integridad de archivos](/.gitbook/assets/admin-security-block.png)

El bloque se introdujo en Chamilo 2.0 con cuatro herramientas y se amplió en Chamilo 3.0 con una quinta, **Integridad de archivos**.

## Acceso al bloque Seguridad

Desde el panel de administración, el bloque **Seguridad** aparece junto a los demás bloques del panel (Usuarios, Cursos, Gestión de la plataforma, Sistema, etc.). Pulse cualquiera de sus enlaces para abrir la herramienta correspondiente.

## Contenido del bloque

* **[Auditoría de actividades](activities-audit.md)** — Consulte eventos administrativos y de plataforma importantes (cambios de usuario, curso, sesión y otros) por tipo de evento
* **[Intentos de inicio de sesión](login-attempts.md)** — Revise los intentos de inicio de sesión fallidos y correctos, con gráficos y un registro consultable
* **[IDS simple](simple-ids.md)** — Vea las peticiones marcadas por el sistema de detección de intrusiones ligero e integrado de Chamilo
* **[Comprobador de fortaleza de contraseñas](password-strength-checker.md)** — Analice los usuarios activos en busca de contraseñas que coincidan con una lista de contraseñas de uso habitual
* **[Integridad de archivos](file-integrity.md)** *(novedad en Chamilo 3.0)* — Detecte adiciones, modificaciones, eliminaciones o cambios de permisos inesperados en los archivos instalados

## Quién puede acceder

Las cinco herramientas requieren acceso de **administrador del portal**. El análisis, la pausa y las acciones de restablecimiento de la línea base de Integridad de archivos requieren además acceso de **administrador global**, y pausar las alertas o establecer una nueva línea base exige volver a introducir su propia contraseña; consulte [Integridad de archivos](file-integrity.md#actions) para más detalles.