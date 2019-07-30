# System Administrators: Authentication methods

Como regla general, toda la configuración relacionada con los métodos de autenticación puede ser encontrado en una combinación de configuraciones (dentro de la administración del portal o la tabla settings_current) y el archivo main/inc/conf/auth.conf.php.

Para realizar un seguimiento de quién se identifica a través de qué, Chamilo generalmente realiza un seguimiento de fuente de autenticación del usuario a través del campo **auth_source** en la tabla **usuario**. Un usuario identificado a través de LDAP usará «ldap» (si se sincroniza automáticamente) o «extldap» (si primero registrado al iniciar sesión por primera vez).

