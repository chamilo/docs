# Autenticación

Chamilo admite múltiples métodos de autenticación, desde el sistema integrado de usuario y contraseña hasta soluciones empresariales de inicio de sesión único.

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

Después de editar el archivo, limpie y caliente la caché:

```bash
php bin/console cache:clear
php bin/console cache:warmup
```

Los botones de inicio de sesión externos aparecen en la página de inicio de sesión una vez actualizada la caché.

## Métodos compatibles

* **[OAuth2](oauth2.md)** — Azure AD, Keycloak, Facebook y proveedores OAuth2 genéricos
* **[Servidor de autorización OAuth 2.1](oauth-server.md)** — Clientes OAuth, recursos protegidos MCP, registro y consentimiento
* **[Azure Entra ID](azure-entra-id.md)** — Configuración detallada de Azure/Entra ID: registro de aplicaciones, asignación de roles basada en grupos, autenticación mediante certificados y comandos de sincronización de usuarios y grupos
* **[LDAP](ldap.md)** — Autenticación frente a un servidor LDAP o Active Directory
* **[CAS](cas.md)** — Central Authentication Service (heredado, no funcional en 3.x)
* **[SCIM](scim.md)** — Aprovisionamiento automatizado de usuarios desde proveedores de identidad externos
* **[Configuración de SSO](sso-configuration.md)** — Resolución de problemas y notas entre métodos

## Autenticación predeterminada

De forma predeterminada, Chamilo utiliza su propio sistema interno: los usuarios inician sesión con un nombre de usuario y una contraseña almacenados en la base de datos de Chamilo. Los métodos externos son complementarios: el formulario de inicio de sesión estándar permanece disponible junto con cualquier proveedor configurado.

## Referencia adicional

Para la referencia completa de parámetros y escenarios avanzados, consulte la [página wiki de configuración de autenticación externa](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration).