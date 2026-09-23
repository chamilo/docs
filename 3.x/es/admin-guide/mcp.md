# MCP (Model Context Protocol)

Chamilo 3.0 expone un servidor MCP para que los asistentes y agentes de IA (conectores de Claude, ChatGPT o cualquier cliente compatible con MCP) puedan actuar dentro de la plataforma en nombre de un usuario autenticado, utilizando los permisos propios de ese usuario: no existe una cuenta de servicio independiente ni un acceso elevado.

## Qué aporta MCP a Chamilo

MCP (Model Context Protocol) es un estándar abierto que permite a los clientes de IA invocar un conjunto definido de «herramientas» expuestas por un servidor. El servidor MCP de Chamilo es accesible en un único endpoint, `/mcp`, y expone un conjunto curado de herramientas de gestión de cursos orientadas al docente, en lugar de toda la superficie de la API.

## Capacidades disponibles

Cada llamada se ejecuta como el usuario conectado, de modo que una herramienta solo ve y modifica los cursos que ese usuario gestiona. El conjunto actual de herramientas:

| Herramienta | Qué hace |
|------|---------------|
| Current user | Devuelve la identidad y los roles del usuario autenticado |
| Teacher courses | Lista los cursos que el usuario gestiona como docente |
| Course overview | Devuelve la información del curso base y los recuentos de recursos |
| Create course | Crea un curso nuevo aplicando las reglas de creación de cursos de la plataforma |
| Create course assignment | Crea una tarea en borrador o publicada, con una descripción y una puntuación máxima |
| Create course test | Crea un test de opción múltiple asistido por IA a partir de la descripción de un tema o de un documento existente |
| Get course test response status | Informa qué estudiantes han respondido, están en curso o están pendientes en un test |
| Get user course test score | Devuelve las puntuaciones más recientes y las mejores completadas de un estudiante en un test |
| Create training satisfaction survey | Crea una encuesta de satisfacción de siete preguntas |
| Create course learning path | Crea un itinerario de aprendizaje a partir de páginas suministradas por el cliente MCP |
| List documents | Lista los documentos de la herramienta Documentos de un curso |
| Read course document | Devuelve el contenido HTML, el título y los metadatos de un documento editable |
| Edit course document | Sustituye el contenido HTML completo de un documento editable existente |
| Create course document | Crea un documento HTML asistido por IA en la carpeta raíz de Documentos |
| Create course illustration | Genera una ilustración con IA para un tema y la guarda como documento |
| Illustrate document paragraph | Inserta una imagen o un vídeo existente antes o después de un párrafo de un documento |
| Find recent course forum activity | Encuentra mensajes de foro recientes y visibles relacionados con un tema |
| Review course quality | Analiza los itinerarios de aprendizaje, documentos, tests, tareas y encuestas de un curso, y devuelve recomendaciones de mejora |

Esta lista está curada por el equipo central de Chamilo y no es extensible por el usuario desde la plataforma: los docentes no pueden añadir sus propias herramientas.

## Cómo se conectan los usuarios

### Clave API MCP personal

Cada usuario genera su propia clave en **Red social** > **Clave API MCP**:

![La página de la clave API MCP, que muestra una clave inactiva, el botón Generar clave API y el bloque Conexión MCP remota con la URL del endpoint y el formato de la cabecera Authorization](../.gitbook/assets/admin-mcp-api-key.png)

* Al pulsar **Generar clave API** se crea una clave y se muestra una sola vez: Chamilo solo almacena después una versión enmascarada, por lo que la clave completa debe copiarse y guardarse de forma segura de inmediato.
* Generar una clave nueva revoca inmediatamente la anterior.
* La página muestra el estado de la clave (activa/inactiva), el endpoint MCP que hay que configurar en el cliente, y las fechas de creación y de último uso.
* El panel **Conexión MCP remota** indica exactamente qué hay que poner en el cliente MCP: la URL del endpoint y una cabecera `Authorization: Bearer <your MCP API key>`.

Como indica la propia página, la clave autentica al cliente como la cuenta de ese usuario: no otorga ningún permiso que la cuenta no tenga ya.

### OAuth 2.1 (clientes remotos y conectores)

Para los clientes MCP que admiten el descubrimiento OAuth y el registro dinámico de clientes (en lugar de una clave pegada a mano), Chamilo también actúa como servidor de autorización OAuth 2.1: el cliente descubre los endpoints de Chamilo, se registra y redirige al usuario a `/oauth/authorize` para aprobar el acceso. Las aplicaciones aprobadas aparecen en **Red social** > **Aplicaciones autorizadas**, donde el usuario puede revocar las que ya no use o no reconozca.

## Consideraciones de seguridad

* **Sin escalada de privilegios.** Cada llamada a una herramienta MCP y cada aplicación autorizada por OAuth se ejecuta con los propios permisos de Chamilo del usuario que se conecta: una clave de API personal o una aplicación autorizada nunca pueden hacer más de lo que ese usuario ya podría hacer de forma manual.
* **Solo Bearer y con limitación de tasa.** `/mcp` acepta únicamente una credencial Bearer: una clave de API MCP personal, un token de acceso OAuth o (en desarrollo) un JWT. Los intentos de autenticación están limitados por tasa por dirección IP para ralentizar la adivinación de credenciales.
* **Superficie pública reducida.** El único tráfico no autenticado que `/mcp` acepta es el preflight `OPTIONS`; toda llamada real requiere `ROLE_USER`. Los endpoints de descubrimiento OAuth, registro dinámico de clientes y tokens son intencionadamente públicos, según lo exigen las especificaciones OAuth 2.1 / MCP; esto no concede acceso por sí mismo, solo permite que un cliente sepa cómo iniciar el flujo de autorización.
* **La protección contra DNS rebinding está deshabilitada deliberadamente para `/mcp`.** El bundle que implementa MCP normalmente restringe el endpoint a `localhost` a menos que se configure una lista estática de nombres de host permitidos, lo cual encaja mal con un portal Chamilo multi-URL accesible bajo muchos nombres de host. Chamilo desactiva esa comprobación porque aquí es redundante: cada petición a `/mcp` ya exige una credencial Bearer con independencia de su cabecera `Host`/`Origin`, y un ataque de DNS rebinding (que se basa en autenticación ambiental de tipo cookie que viaja junto a un Host falsificado) no puede falsificar un token bearer que no posee ya.

## Configuración del servidor MCP

A diferencia de la mayoría de las integraciones de esta guía, MCP no tiene una página de ajustes en el panel de administración: se configura a nivel de archivo, en `config/packages/mcp.yaml`, y requiere acceso por shell al servidor:

| Clave | Propósito |
|-----|---------|
| `app`, `version`, `description` | Identidad que Chamilo informa a los clientes MCP que se conectan |
| `client_transports.stdio` / `client_transports.http` | Qué transportes están activos; Chamilo habilita ambos de forma predeterminada |
| `http.path` | El endpoint HTTP de MCP (`/mcp` de forma predeterminada) |
| `http.allowed_hosts` | Lista de hosts permitidos para DNS rebinding: se establece en `false` en Chamilo (véase Consideraciones de seguridad más arriba) |
| `http.session.store`, `.directory`, `.ttl` | Dónde se persiste el estado de sesión MCP y durante cuánto tiempo |

Para deshabilitar por completo el servidor MCP, establezca `client_transports.http: false` (y `stdio: false` si también debe desactivarse el transporte CLI) y vacíe la caché:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

## Consejos

* Trate una clave de API MCP como una contraseña: cualquiera que la posea puede actuar como ese usuario a través de cualquier cliente MCP.
* Anime a los usuarios a revisar periódicamente **Aplicaciones autorizadas** y a revocar todo lo que no reconozcan.
* Consulte [Configuración de IA](integrations/ai-configuration.md) para los proveedores de IA que respaldan las herramientas de generación de contenido (creación de pruebas, creación de documentos, ilustraciones) enumeradas más arriba.