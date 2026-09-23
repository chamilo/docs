# Sistema

El bloque **Sistema** del panel de administración agrupa las herramientas de mantenimiento a nivel de servidor, el flujo de autoactualización, las utilidades de inspección de almacenamiento y recursos, y la identidad visual de la plataforma.

![El bloque Sistema en el panel de administración, que enumera Limpiar archivos temporales, Estado del sistema, Actualización del sistema, Colores, Información de archivos, Recursos por tipo y Listar iconos](../../.gitbook/assets/admin-system-block.png)

## Acceso al bloque Sistema

Desde el panel de administración, el bloque **Sistema** aparece junto a los demás bloques del panel. Haga clic en cualquiera de sus enlaces para abrir la herramienta correspondiente.

## Contenido del bloque

* **[Herramientas del sistema](system-tools.md)** — Limpiar archivos temporales, ejecutar el flujo de autoactualización, inspeccionar archivos y recursos almacenados, y explorar el conjunto de iconos integrado
* **Estado del sistema** — Se trata en [Estado del sistema](../maintenance/system-status.md), en Mantenimiento
* **[Identidad visual](branding/README.md)** — Temas de color (el enlace «Colores» del bloque abre la misma página de Temas de color), personalización del portal y plantillas

Dos elementos adicionales — **Data filler** y **E-mail tester** — solo aparecen cuando el servidor tiene un directorio `tests/` presente, lo cual corresponde a un entorno de desarrollo/QA, no de producción. No aparecerán en una instalación de producción típica; consulte [Herramientas del sistema](system-tools.md#development-only-tools) para saber qué hacen cuando están presentes.