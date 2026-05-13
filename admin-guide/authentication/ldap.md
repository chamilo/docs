---
# LDAP

Chamilo puede autenticar usuarios contra un servidor LDAP, incluyendo Microsoft Active Directory. LDAP se configura en `config/authentication.yaml`.

## Configuración

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Iniciar sesión con LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Enlace y búsqueda

Dos enfoques para localizar al usuario en el directorio:

**Enlace directo** — construye el DN a partir del nombre de usuario directamente:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Enlace de búsqueda** — busca en el directorio con una cuenta de servicio primero, luego se enlaza como el usuario encontrado:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Para Active Directory, use `sAMAccountName` como `uid_key` y ajuste `query_string` a `(sAMAccountName=%s)`.

### Mapeo de atributos

Mapee los atributos de LDAP a los campos de usuario de Chamilo bajo `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # opcional
          locale: preferredLanguage  # opcional
```

`firstname`, `lastname` y `email` son obligatorios. El usuario se empareja con una cuenta existente de Chamilo por correo electrónico o nombre de usuario; si no se encuentra coincidencia y `allow_create_new_users` está en true, se crea una nueva cuenta.

## Consejos

* **Use LDAPS en producción** — cambie `ldap://` a `ldaps://` (puerto 636) para conexiones cifradas.
* **Cuenta de servicio** — la cuenta de enlace de búsqueda solo necesita acceso de lectura a las entradas de usuario.
* **Pruebe primero** — verifique su cadena de conexión y consulta con `ldapsearch` antes de configurar Chamilo.
* **`force_as_login_method: true`** — oculta otros métodos de inicio de sesión y fuerza a todos los usuarios a pasar por LDAP. Déjelo en `false` mientras realiza pruebas para que aún pueda iniciar sesión como administrador a través del formulario estándar.

Para la referencia completa de parámetros, consulte la [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).