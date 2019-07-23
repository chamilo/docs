### Activación y configuración global.

Para cumplir con la normativa 2016/679, conocida como la Regulación general de protección de datos (GDPR o GDPR), a partir de la versión 1.11.8, las funcionalidades se agregaron y se activaron de forma predeterminada. . Es posible deshabilitarlos en el archivo de configuración *app/config/configuration.php* agregando la siguiente configuración:

```
$_configuration['enable_gdpr'] = false;
```

También se puede definir en este archivo el nombre de la persona responsable del procesamiento de datos (DPO), su correo electrónico y su función exacta.

```
$_configuration['data_protection_officer_name'] = '';
$_configuration['data_protection_officer_role'] = '';
$_configuration['data_protection_officer_email'] = '';
```

La primera consecuencia de la activación de estas funcionalidades es la aparición en la página de la red social de una nueva entrada "Datos personales" a la izquierda de la página en el bloque "Red social".

<img src="../assets/red_social.png" />

*Administración - Enlace de Datos Personales*

En esta página, cada usuario puede encontrar toda la información personal que se almacena en Chamilo y puede exportarla en formato Json.

<img src="../assets/datos_personales.png" />

*Administración - Página de inicio Datos personales*

Luego, en la parte inferior de esta misma página, el usuario podrá ver la información sobre el DPO, los términos y condiciones que ha aceptado, solicitar el retiro de su aceptación de los mismos y, por lo tanto, su acuerdo con el procesamiento de datos y también solicitar la supresión de su cuenta de usuario.

<img src="../assets/permisos.png" />

*Administración - Fin de la página de datos personales*

Estos 2 botones de solicitud envían información al DPO (si no está definido, el envío se realiza a todos los administradores), lo que indica que se debe procesar una nueva solicitud y un enlace a la página de administración de solicitudes.

### Gestión de solicitudes

Las solicitudes de eliminación de cuentas o el retiro de la aceptación de los términos y condiciones se almacenan y presentan en la página de administración de la lista de solicitudes de usuarios /main/admin/user_list_consent.php accesible desde la página de administración en el bloque " Protección de datos personales ".

<img src="../assets/proteccion.png" />

*Administración - Bloqueo de Protección de Datos Personales*

La página presenta una lista de los usuarios indicando el tipo de solicitud (eliminación de la cuenta o eliminación del acuerdo legal), el tiempo transcurrido desde la solicitud (sabiendo que el RGPD indica que es necesario que una solicitud de eliminación de la cuenta sea procesado dentro de 4 semanas, consulte la configuración de Cron a continuación para garantizar el procesamiento a tiempo y puede procesar la aplicación con diferentes acciones disponibles.


![](/var/www/docs/fr/admin/assets/RGPD-ListeUtilisateursDemandesEnAttente.png)

*Administración - Lista de usuarios con una solicitud pendiente*

Las acciones disponibles están identificadas por los siguientes iconos:

| Iconos                                                       | Funcionalidades                                              |
| ------------------------------------------------------------ | ------------------------------------------------------------ |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-info2.png) | Muestra la página de información de usuario genérica         |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-message_new.png) | Abre el editor de envío de mensajes interno con el usuario como un destinatario previamente completado |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-delete_terms.png) | Elimina la aceptación de los términos y condiciones para el usuario: los datos del usuario no se eliminan; si se conecta a la plataforma, se le solicitará que acepte los términos y condiciones nuevamente para tener acceso. |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-anonymous.png) | Permite anonimizar la cuenta, es decir, la información se mantiene para su uso en las estadísticas, pero los datos personales de la cuenta del usuario ya no están asociados, por lo que el usuario pierde en este caso todos sus datos (certificado, habilidades, resultados del ejercicio, resultados del trabajo, fechas de conexiones ...) |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-delete.png) | Elimine la cuenta de usuario: en este caso, la cuenta y todos los resultados asociados se eliminan, por lo que el usuario pierde sus certificados, habilidades y OpenBadges, estas validaciones de cursos o sesiones, registros, resultados de ejercicios o exámenes. es decir, todos los datos se eliminan y el usuario ya no puede acceder a ellos y tampoco están disponibles en las estadísticas. |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-edit.png) | Editar usuario: permite llegar al formulario de edición estándar o se pueden ver en particular los motivos de la solicitud para eliminar los términos y condiciones y los motivos de las solicitudes de eliminación de cuentas (campos de texto obligatorios el usuario completa cuando hace una de estas 2 solicitudes). |
| ![img](https://docs.chamilo.org/fr/admin/assets/icone-admin_star.png) / ![img](https://docs.chamilo.org/fr/admin/assets/icone-admin_star_na.png) | Le permite saber si el usuario es administrador de la plataforma o no. |

### Configuración del recordatorio CRON por correo electrónico de solicitudes pendientes

Para garantizar que las solicitudes de eliminación de cuentas se procesen dentro del tiempo máximo definido por el GDPR (4 semanas), es posible configurar una tarea Cron que verificará si hay solicitudes en espera durante más de 7 días y si es el caso, a cada uno se le envía un recordatorio al DPO si se define de otra manera a todos los administradores al indicar el nombre de la persona cuya solicitud está pendiente y un enlace a la página de administración. peticiones pendientes.

Esta función requiere la configuración en el servidor de un proceso * cron * que llama al siguiente script:

```
/main/cron/request_removal_reminder.php
```

### Extensión de los términos y condiciones

Otra consecuencia de habilitar las funciones para responder al RGPD es la adición de campos adicionales para los términos y condiciones para facilitar la descripción de las partes obligatorias definidas por el RGPD. En la página de edición de los términos y condiciones (consulte la documentación específica sobre la activación y el uso de los términos y condiciones), se encuentra ahora, además del bloque principal de edición, un bloque de edición por parte parcial para poder olvida cualquier cosa.

Los sub-bloques son:

- Recopilación de datos personales.
- Registro de datos personales.
- Organización de datos personales.
- Estructuración de datos personales.
- Retención de datos personales.
- Adaptación o modificación de los datos personales.
- Extracción de datos personales.
- Consulta de datos personales.
- Uso de datos personales.
- Comunicación y difusión de datos personales.
- Interconexión de datos personales.
- Limitación de datos personales.
- Borrado de datos personales.
- Destrucción de datos personales.
- Perfil de datos personales.

Cada uno de estos bloques aparecerá como una sección de los términos y condiciones generales.