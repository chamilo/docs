# Herramientas de la plataforma

Esta página cubre los elementos restantes, de menor tamaño, del bloque de gestión de la plataforma.

## Extra Fields

**Platform > Extra fields** es un selector de tipos, no una lista de campos en sí: muestra todos los tipos de objeto que admiten campos personalizados, y al hacer clic en uno se accede al editor de campos de ese tipo. Los tipos disponibles incluyen: user, course, session, question, learning path (y learning path item/view), skill, assignment (work), career, user certificate, survey, terms and conditions, forum category, forum post, exercise, exercise tracking, course announcement, message, document, attendance calendar, glossary, work correction comment, calendar event y portfolio (además de scheduled announcements, si esa función está habilitada).

Para el caso de uso más habitual —campos personalizados del perfil de usuario— consulte [Perfilado de usuarios](../users/user-profiling.md), que cubre la misma funcionalidad subyacente desde el lado de la gestión de usuarios.

## Mail Templates

**Platform > Mail templates** permite sustituir el texto de correos electrónicos concretos del sistema (confirmación de registro, notificaciones de suscripción y similares) sin tocar archivos del servidor. Cada plantilla tiene un título, un **type** que coincide con el correo electrónico integrado concreto que sustituye, el cuerpo de la plantilla (texto plano/Twig, no un editor enriquecido) y una marca «set as default»: solo una plantilla por tipo puede ser la predeterminada activa. Las plantillas están acotadas por URL de acceso; no hay un campo independiente por idioma, de modo que el tratamiento del idioma de estos correos es el que ya aplica el código circundante.

Las plantillas se renderizan mediante un entorno Twig **sandboxed** por seguridad: solo se permite un conjunto reducido de etiquetas y filtros, y los únicos datos disponibles son el objeto `User` del destinatario, referenciado como `user.getEmail()`, `user.getFirstname()` y getters similares (`getId`, `getUsername`, `getLastname`, `getStatus`, `getOfficialCode`, `getPhone`). Cualquier cosa fuera de esa lista permitida no genera un error ruidoso: se renderiza en silencio como vacío, lo que entonces vuelve a la plantilla integrada original. Mantenga las plantillas personalizadas simples y pruébelas (usando un registro o un disparador de notificación reales) después de editarlas.

## Contact Form Categories

**Platform > Contact form categories** gestiona el desplegable que se muestra en el formulario público **Contact us** de su portal. Cada categoría es solo un título y una dirección de correo de destino: la categoría que elija un visitante determina a qué buzón se enruta su mensaje. Úselo para dirigir distintos temas (soporte, ventas, admisiones) a equipos diferentes sin construir formularios separados.

## Atajos a categorías de ajustes

Algunos elementos del bloque son simplemente enlaces directos a categorías concretas de [Ajustes de la plataforma](../platform-settings/README.md), en lugar de herramientas independientes:

* **Plugins** y **System templates** abren Configuration Settings prefiltrados a esas categorías
* **Regions** hace lo mismo, para los ajustes de regiones de la plataforma

## Elementos visibles ocasionalmente

Un puñado de elementos solo aparece cuando el ajuste o el plugin pertinente está activo, de modo que puede que no los vea en su instalación:

* **Terms and Conditions** — aparece cuando **Allow terms and conditions** está habilitado, para gestionar el texto que los usuarios deben aceptar
* **Notifications** — aparece cuando la función de eventos de notificación de la plataforma está habilitada
* **CMS**, **Dictionary**, **Justification** — cada uno ligado a su propio plugin opcional instalado y habilitado