# Configuración de CAS

Configuración heredada de CAS (Central Authentication Service) procedente de Chamilo 1.x. Consulte [CAS](../authentication/cas.md) para conocer el estado actual del autenticador CAS en Chamilo 3.x.

Acceda a estos ajustes en **Administración > Configuración > CAS**. Esta categoría contiene **7 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuración

### `cas_activate`

**Activar autenticación CAS**

Activar la autenticación CAS permitirá a los usuarios autenticarse con sus credenciales CAS.<br/>Vaya a <a href='settings.php?category=CAS'>Plugin</a> para añadir un botón configurable «CAS Login» en su campus Chamilo. También puede forzar la autenticación CAS estableciendo cas[force_redirect] en app/config/auth.conf.php.

### `cas_add_user_activate`

**Activar adición de usuarios CAS**

Activa la adición de usuarios CAS. Para crear la cuenta de usuario a partir del directorio LDAP, las tablas extldap_config y extldap_user_correspondance deben estar rellenadas en app/config/auth.conf.php

### `cas_port`

**Puerto del servidor CAS principal**

El puerto al que conectarse en el servidor CAS principal

### `cas_protocol`

**Protocolo del servidor CAS principal**

El protocolo con el que nos conectamos al servidor CAS

### `cas_server`

**Servidor CAS principal**

Este es el servidor CAS principal que se utilizará para la autenticación (dirección IP o nombre de host)

### `cas_server_uri`

**URI del servidor CAS principal**

La ruta al servicio CAS

### `update_user_info_cas_with_ldap`

**Actualizar la información de la cuenta de usuario autenticado por CAS desde LDAP**

Garantiza que el nombre, los apellidos y la dirección de correo electrónico del usuario coincidan con los valores actuales del directorio LDAP