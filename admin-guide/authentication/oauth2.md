# OAuth2

La autenticación OAuth2 se configura en `config/authentication.yaml`. Chamilo incluye soporte integrado para Azure AD, Keycloak, Facebook y cualquier proveedor genérico compatible con OAuth2.

## Paso 1 — Registrar Chamilo en su proveedor de identidad

Cree una aplicación en el panel de administración de su proveedor y establezca la **URI de redirección** a:

```
https://su-url-de-chamilo/connect/<proveedor>/check
```

Donde `<proveedor>` es `azure`, `keycloak`, `facebook` o el nombre que le dé a un proveedor genérico. Anote el **ID de Cliente** y el **Secreto de Cliente**.

## Paso 2 — Configurar authentication.yaml

Habilite el proveedor y proporcione sus credenciales. Todos los proveedores comparten estas claves comunes:

| Clave | Descripción |
|-------|-------------|
| `enabled` | `true` para activar |
| `title` | Etiqueta mostrada en el botón de inicio de sesión |
| `client_id` | De su proveedor de identidad |
| `client_secret` | De su proveedor de identidad |
| `allow_create_new_users` | Crear automáticamente una cuenta en Chamilo en el primer inicio de sesión |
| `allow_update_user_info` | Sincronizar datos del usuario en cada inicio de sesión |
| `force_as_login_method` | Deshabilitar otros métodos y forzar este |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Iniciar sesión con Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

Azure también admite la asignación de roles basada en grupos (mapeo de IDs de grupos de Azure a roles de Chamilo como profesor o administrador), comandos de sincronización delta de usuarios y autenticación por certificado en lugar de un secreto de cliente. Consulte la [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para conocer esas opciones.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Iniciar sesión con Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.yourorg.com"
        realm: "your-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Iniciar sesión con Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 Genérico

Use esto para Google, GitLab o cualquier proveedor compatible con OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Iniciar sesión con MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

El mapeo de campos (cómo los atributos del proveedor se asignan a `firstname`, `lastname`, `email`, etc. de Chamilo) y el mapeo de roles también son configurables. Consulte la [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para obtener la lista completa de claves de mapeo.

## Paso 3 — Limpiar caché y probar

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Cierre sesión en Chamilo. El botón del proveedor configurado debería aparecer en la página de inicio de sesión. Pruebe con una cuenta dedicada antes de implementarlo para todos los usuarios.

## Consejos

* Mantenga habilitado el formulario de inicio de sesión estándar para que los administradores siempre puedan iniciar sesión si hay problemas con OAuth2.
* Al usar Azure con usuarios existentes, configure `existing_user_verification_order` para controlar cómo Chamilo relaciona a los usuarios entrantes con cuentas existentes.
* La asignación de roles por defecto es estudiante; use el mapeo de grupos para promover automáticamente a los usuarios a roles de profesor o administrador.