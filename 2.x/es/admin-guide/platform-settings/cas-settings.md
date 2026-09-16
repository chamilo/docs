# Configuración de CAS

Configuración heredada de CAS (Servicio de Autenticación Central) proveniente de Chamilo 1.x. Consulte [CAS](../authentication/cas.md) para conocer el estado actual del autenticador CAS en Chamilo 2.x.

Acceda a estas configuraciones en **Administración > Configuraciones > CAS**. Esta categoría contiene **7 ajustes**, listados a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en fuente monoespaciada. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `cas_activate`

**Habilitar autenticación CAS**

Habilitar la autenticación CAS permitirá a los usuarios autenticarse con sus credenciales CAS.<br/>Vaya a <a href='settings.php?category=CAS'>Plugin</a> para agregar un botón configurable de 'Inicio de sesión CAS' para su campus Chamilo. También puede forzar la autenticación CAS configurando cas[force_redirect] en app/config/auth.conf.php.

### `cas_add_user_activate`

**Habilitar la adición de usuarios CAS**

Habilite la adición de usuarios CAS. Para crear la cuenta de usuario desde el directorio LDAP, las tablas extldap_config y extldap_user_correspondance deben estar completas en app/config/auth.conf.php.

### `cas_port`

**Puerto del servidor CAS principal**

El puerto en el que se conectará al servidor CAS principal.

### `cas_protocol`

**Protocolo del servidor CAS principal**

El protocolo con el que nos conectamos al servidor CAS.

### `cas_server`

**Servidor CAS principal**

Este es el servidor CAS principal que se utilizará para la autenticación (dirección IP o nombre de host).

### `cas_server_uri`

**URI del servidor CAS principal**

La ruta al servicio CAS.

### `update_user_info_cas_with_ldap`

**Actualizar información de la cuenta de usuario autenticado por CAS desde LDAP**

Asegura que el nombre, apellido y dirección de correo electrónico del usuario sean los mismos que los valores actuales en el directorio LDAP.