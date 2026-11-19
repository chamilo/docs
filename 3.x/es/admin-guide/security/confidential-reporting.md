# Informes confidenciales

Chamilo incluye un flujo de trabajo opcional de **informes confidenciales** para presentar inquietudes sobre otro usuario ante investigadores autorizados. No se trata de la herramienta ordinaria de tickets de soporte ni de un foro de debate público.

## Activar la función

Abra **Administración > Parámetros de configuración > Seguridad** y configure:

| Parámetro | Valor predeterminado | Finalidad |
|---|---|---|
| `security.confidential_reporting_enabled` | `false` | Activar el flujo de trabajo de informes confidenciales |
| `security.confidential_reporting_min_reporters` | `2` | Número mínimo de informantes distintos (2–10) antes de que una investigación sea visible |
| `security.confidential_reporting_attachments_enabled` | `true` | Permitir adjuntos de pruebas |
| `security.confidential_reporting_notifications_enabled` | `false` | Mostrar indicadores internos para las investigaciones elegibles (sin correos electrónicos) |

El despliegue también requiere que el cifrado de informes confidenciales del servidor y el almacenamiento privado estén listos. Chamilo utiliza las funciones criptográficas PHP Sodium y una clave de cifrado privada; **conserve y haga una copia de seguridad de esa clave de forma segura**. Perderla puede hacer ilegibles los informes almacenados. No copie la clave en un repositorio Git. No active la función antes de verificar que el almacenamiento de la clave privada y las migraciones de base de datos requeridas estén operativos.

## Presentar un informe

1. Inicie sesión directamente en Chamilo y abra **Informes confidenciales** (cuando esté activado para el portal).
2. Elija a la persona concernida, introduzca un asunto y describa el incidente.
3. Añada pruebas si los adjuntos están activados.
4. Decida si los investigadores pueden ver su **nombre y correo electrónico** para este informe concreto. Este permiso puede retirarse más adelante.
5. Envíe el informe. Utilice **Mis informes confidenciales** para seguir el caso e intercambiar mensajes con un investigador.

La identidad del informante **no se muestra a los investigadores de forma predeterminada**. Se trata de un control de confidencialidad, no de una promesa de anonimato absoluto frente a los operadores del sistema.

## Permisos de investigación y umbrales

Las investigaciones requieren el permiso dedicado `welfare:investigate` y un rol de administrador o de RR. HH. elegible. Un caso queda disponible para investigación solo después de que se haya alcanzado el número configurado de **informantes distintos** para el mismo objetivo. Un investigador no puede investigar un informe sobre sí mismo. El acceso de RR. HH. se limita a los usuarios a los que da seguimiento el responsable de RR. HH.

Los investigadores acceden a **Investigaciones confidenciales** para ver los casos elegibles, revisar las pruebas e intercambiar mensajes. Los casos por debajo del umbral o no autorizados no se exponen a través de la API de investigación. La **suplantación** administrativa no proporciona acceso a los informes confidenciales.

## Privacidad y cuidado operativo

Los informes y las pruebas adjuntas contienen datos personales sensibles. Restrinja los permisos de los investigadores, limite el acceso a las copias de seguridad, defina una política organizativa de conservación adecuada y pruebe el flujo de trabajo con cuentas separadas de informante, objetivo e investigador. Evite copiar informes completos en registros técnicos o en sistemas de seguimiento de incidencias.

Implementación: [Informes confidenciales #9310](https://github.com/chamilo/chamilo-lms/pull/9310).