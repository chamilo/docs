# System AdministratorsAuthentication methods {#system-administratorsauthentication-methods}

![](../assets/image1.png)

As a general rule of thumb, all configuration related to authentication methods can be found in a mix of the settings (inside the portal administration or the settings_current table) and the main/inc/conf/auth.conf.php file.

In order to keep track of who&#039;s identified through what, Chamilo usually keeps track of the user&#039;s authentication source through the **_auth_source_** field in the **_user_** table. A user identified through LDAP will use « ldap » (if synchronised automatically) or « extldap » (if first registered when logging in for the first time).