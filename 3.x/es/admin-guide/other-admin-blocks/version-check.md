# Comprobación de versión

La comprobación de versión indica si su instalación de Chamilo está actualizada y —si usted lo acepta— registra su plataforma en el proyecto Chamilo para que se cuente en las estadísticas de uso agregadas.

## Dos niveles de comprobación

**Sin registrar (estado predeterminado):** Chamilo sigue intentando contactar con `version.chamilo.org` para comparar su versión instalada con la última publicación, utilizando únicamente la propia petición: no se envían datos de la plataforma. El bloque muestra un formulario de registro que explica qué aporta el registro, además de un botón **"Enable version check"** y una casilla **"Hide campus from public platforms list"**.

**Registrado:** Al pulsar "Enable version check" solo se cambian dos ajustes locales: por sí mismo no envía nada. A partir de entonces, cada vez que se carga este bloque del panel, su plataforma envía una petición a `version.chamilo.org` que incluye:

| Datos enviados | Finalidad indicada |
|-----------|-----------------|
| URL y nombre del sitio de su plataforma | Identifica qué portal está comprobando |
| Correo electrónico de contacto del administrador | De forma explícita, para que el equipo de Chamilo pueda contactar con los administradores sobre problemas de seguridad críticos |
| Versión instalada | Para determinar si está actualizado |
| Recuentos de cursos, usuarios, usuarios activos y sesiones | Se consolidan en estadísticas agregadas no personales en `stats.chamilo.org` |
| Nombre de la organización e idioma de la interfaz | Solo agregación demográfica |
| Nombre del administrador | Se envía, aunque su finalidad no está claramente documentada en el propio código |
| Dirección IP de su servidor | Se usa para aproximar la ubicación de su plataforma en un mapa mundial de instalaciones |
| Indicador "Do not list campus", empaquetador e ID único de instancia | Controla si aparece en el directorio público e identifica las comprobaciones repetidas de la misma instalación |

Si deja desmarcada **"Hide campus from public platforms list"**, su plataforma también aparece en la lista pública de la comunidad en `version.chamilo.org/community.php`.

## Acceso a la comprobación de versión

Este bloque aparece directamente en el panel de administración: no hay una página aparte que visitar.

## ¿Debe activarla?

Se trata de una aceptación explícita, y el intercambio es sencillo: a cambio de compartir los datos anteriores, recibe un aviso automático cuando hay una versión nueva (incluidos parches de seguridad) y contribuye a las estadísticas públicas de adopción de Chamilo. Si prefiere no compartir ningún dato de la plataforma, simplemente no pulse "Enable version check": la comprobación básica de actualización sigue ejecutándose sin registrar. Si desea el aviso de actualización pero no el listado público, regístrese y marque "Hide campus from public platforms list".