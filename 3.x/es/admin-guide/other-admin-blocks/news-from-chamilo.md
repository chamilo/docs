# Novedades de Chamilo

Novedades de Chamilo es un pequeño panel de solo lectura que obtiene anuncios oficiales de la Chamilo Association; aquí es donde se enteraría de una nueva versión o, de forma importante, de un parche de seguridad que debería aplicar.

## Qué muestra y de dónde proviene

El panel obtiene el contenido de `version.chamilo.org/c/news/latest.php`, solicitándolo en el idioma de la interfaz de su plataforma. Lo único que envía su plataforma es ese código de idioma: ningún detalle de la plataforma, dato de uso ni información de contacto sale de su servidor por esta función.

## Propósito

Este es el canal de Chamilo para llegar directamente a los administradores sobre asuntos de relevancia operativa: lanzamientos de nuevas versiones y —lo más importante— **parches de seguridad**. Dado que aplicar los parches de seguridad con prontitud es una de las medidas más eficaces para mantener segura su plataforma (consulte la [Guía de seguridad](../appendix/security-guide.md)), conviene echar un vistazo a este panel periódicamente en lugar de comprobarlo solo cuando se acuerde.

Esta fuente se carga de forma independiente de [Comprobación de versión](version-check.md): no necesita registrar su plataforma para verla.