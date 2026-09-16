# Autenticación

Chamilo soporta múltiples métodos de autenticación, desde el sistema integrado de nombre de usuario/contraseña hasta soluciones de inicio de sesión único empresarial.

## Archivo de configuración

Todos los métodos de autenticación externos se configuran en `config/authentication.yaml`. Se proporciona una plantilla en `config/authentication.dist.yaml`. La estructura general es:

```yaml
parameters:
  authentication:
    <access_url_id>:
      <auth_method>:
        <provider_name>:
          <config_key>: <value>
```

Después de editar el archivo, limpia y precalienta la caché:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Los botones de inicio de sesión externos aparecen en la página de inicio de sesión después de actualizar la caché.

## Métodos soportados

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook y proveedores genéricos de OAuth2
* **[LDAP](ldap.md)** — Autenticación contra un servidor LDAP o Active Directory
* **[CAS](cas.md)** — Servicio de Autenticación Central (obsoleto, no funcional en 2.x)
* **[SCIM](scim.md)** — Provisión automática de usuarios desde proveedores de identidad externos
* **[Configuración SSO](sso-configuration.md)** — Notas sobre resolución de problemas y métodos cruzados

## Autenticación predeterminada

Por defecto, Chamilo utiliza su propio sistema interno — los usuarios inician sesión con un nombre de usuario y contraseña almacenados en la base de datos de Chamilo. Los métodos externos son adicionales: el formulario de inicio de sesión estándar permanece disponible junto con cualquier proveedor configurado.

## Referencia adicional

Para una referencia completa de parámetros y escenarios avanzados, consulta la [página wiki de configuración de autenticación externa](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).