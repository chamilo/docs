# LDAP

Chamilo puede autenticar usuarios contra un servidor LDAP, incluido Microsoft Active Directory. LDAP se configura en `config/authentication.yaml`.

## Configuration

```yaml
authentication:
  1:
    ldap:
      main:
        enabled: true
        title: "Sign in with LDAP"
        connection_string: "ldap://ldap.yourorg.com:389"
        protocol_version: 3
        referrals: false
        force_as_login_method: false
```

### Bind and search

Dos enfoques para localizar al usuario en el directorio:

**Direct bind** — construye el DN a partir del nombre de usuario de forma directa:

```yaml
        dn_string: "uid=%s,ou=people,dc=yourorg,dc=com"
```

**Search bind** — busca primero en el directorio con una cuenta de servicio y, a continuación, realiza el bind como el usuario encontrado:

```yaml
        base_dn: "dc=yourorg,dc=com"
        search_dn: "cn=readonly,dc=yourorg,dc=com"
        search_password: "service-account-password"
        query_string: "(uid=%s)"
        uid_key: "uid"
```

Para Active Directory, use `sAMAccountName` como `uid_key` y ajuste `query_string` a `(sAMAccountName=%s)`.

### Attribute mapping

Asigne atributos LDAP a los campos de usuario de Chamilo bajo `data_correspondence`:

```yaml
        data_correspondence:
          firstname: givenName
          lastname: sn
          email: mail
          phone: telephoneNumber   # optional
          locale: preferredLanguage  # optional
```

`firstname`, `lastname` y `email` son obligatorios. El usuario se empareja con una cuenta existente de Chamilo por correo electrónico o nombre de usuario; si no se encuentra coincidencia y `allow_create_new_users` es true, se crea una cuenta nueva.

## Tips

* **Use LDAPS in production** — cambie `ldap://` a `ldaps://` (puerto 636) para conexiones cifradas.
* **Service account** — la cuenta de search bind solo necesita acceso de lectura a las entradas de usuario.
* **Test first** — verifique su cadena de conexión y la consulta con `ldapsearch` antes de configurar Chamilo.
* **`force_as_login_method: true`** — oculta los demás métodos de inicio de sesión y obliga a todos los usuarios a pasar por LDAP. Déjelo en `false` mientras realiza pruebas para poder seguir iniciando sesión como administrador mediante el formulario estándar.

Para la referencia completa de parámetros, consulte la [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).