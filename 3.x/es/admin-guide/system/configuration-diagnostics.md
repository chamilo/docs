# Exportación segura de diagnósticos de configuración

Chamilo 3.1 ofrece un informe JSON descargable para diagnosticar problemas de configuración sin exportar intencionadamente valores confidenciales de los ajustes. El informe se limita a la **URL de acceso actual** y requiere un rol de administrador.

## Descargar el informe

1. Abra **Administración > Configuración** en el portal que desea inspeccionar.
2. Seleccione **Descargar configuración para depuración**.
3. Guarde de forma segura el archivo generado `chamilo-configuration-dump.json`.
4. **Revise el archivo completo antes de enviarlo a cualquier persona**, aunque parezca haber sido saneado.

El informe incluye una marca de tiempo de exportación, el ámbito de la URL de acceso, los ajustes de la plataforma saneados y el estado de instalación o activación de los complementos, además de la configuración saneada de los complementos. Se trata de una exportación de solo lectura; descargarla no modifica los ajustes del sistema.

## Confidencialidad y límites de la URL de acceso

Los valores sensibles se ocultan mediante la capa de saneamiento. Los ajustes de los complementos se tratan como confidenciales de forma predeterminada, salvo que se clasifiquen explícitamente para una exportación segura. Aun así, los nombres de los ajustes, los nombres de los complementos y otros metadatos de diagnóstico pueden revelar detalles de implementación, por lo que distribuya el archivo únicamente a personal de soporte de confianza.

En instalaciones con varias URL, el backend comprueba que la URL de acceso resuelta coincida con el host de la solicitud, en lugar de exportar silenciosamente la configuración de otro portal. Confirme la dirección del portal antes de descargar.

## Resolución de problemas

Si la exportación no está disponible, asegúrese de que la cuenta tenga privilegios de administrador y de que el portal solicitado se resuelva a su propia URL de acceso. Revise los registros del servidor web y de la aplicación sin copiar credenciales ni información personal en los tickets de soporte.

Consulte [Herramientas del sistema](system-tools.md) y [Configuración de seguridad](../platform-settings/security-settings.md). Implementación: [PR #9476](https://github.com/chamilo/chamilo-lms/pull/9476).