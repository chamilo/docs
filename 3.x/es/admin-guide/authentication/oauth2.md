# OAuth2

La autenticación OAuth2 se configura en `config/authentication.yaml`. Chamilo incluye soporte integrado para Azure AD, Keycloak, Facebook y cualquier proveedor genérico compatible con OAuth2.

## Step 1 — Register Chamilo in your identity provider

Cree una aplicación en el panel de administración de su proveedor y establezca el **URI de redirección** en:

```
https://your-chamilo-url/connect/<provider>/check
```

Donde `<provider>` es `azure`, `keycloak`, `facebook` o el nombre que asigne a un proveedor genérico. Anote el **Client ID** y el **Client Secret**.

## Step 2 — Configure authentication.yaml

Active el proveedor y proporcione sus credenciales. Todos los proveedores comparten estas claves comunes:

| Key | Description |
|-----|-------------|
| `enabled` | `true` para activarlo |
| `title` | Etiqueta que se muestra en el botón de inicio de sesión |
| `client_id` | Del proveedor de identidad |
| `client_secret` | Del proveedor de identidad |
| `allow_create_new_users` | Crear automáticamente una cuenta de Chamilo en el primer inicio de sesión |
| `allow_update_user_info` | Sincronizar los datos del usuario en cada inicio de sesión |
| `force_as_login_method` | Ocultar los demás métodos y mostrar únicamente el botón de este proveedor |
| `force_redirect` | Enviar a un visitante anónimo a este proveedor de forma automática, sin botón que pulsar |
| `skip_force_redirect_in` | Lista de fragmentos de URL que `force_redirect` deja intactos |

### Azure AD (Microsoft Entra ID)

Azure dispone de su propia página dedicada que cubre el registro de la aplicación, el mapeo de roles basado en grupos, la autenticación por certificado y los comandos de sincronización de aprovisionamiento de cuentas; consulte [Azure Entra ID](azure-entra-id.md).

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
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
        title: "Sign in with Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### Generic OAuth2

Úselo para Google, GitLab o cualquier proveedor compatible con OAuth2:

```yaml
authentication:
  1:
    oauth2:
      myprovider:
        enabled: true
        title: "Sign in with MyProvider"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provider.example.com/oauth/authorize"
        urlAccessToken: "https://provider.example.com/oauth/token"
        urlResourceOwnerDetails: "https://provider.example.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

El mapeo de campos (cómo se asignan los atributos del proveedor a `firstname`, `lastname`, `email`, etc. de Chamilo) y el mapeo de roles también son configurables. Consulte la [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para la lista completa de claves de mapeo.

## Optional — Send every visitor to the provider automatically

Dos claves controlan cuánto de la página de inicio de sesión sigue viendo un visitante. Son independientes y responden a necesidades distintas:

| Key | What the visitor sees |
|-----|-----------------------|
| `force_as_login_method: true` | La página de inicio de sesión, reducida al botón de este proveedor. El visitante lo pulsa. |
| `force_redirect: true` | Ninguna página de inicio de sesión. El navegador va al proveedor por sí solo. |

Use `force_redirect` cuando el proveedor de identidad posee todas las cuentas y el formulario de inicio de sesión local no tiene propósito:

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Sign in with Keycloak"
        force_redirect: true
        skip_force_redirect_in: ['/catalogue']
```

Solo un proveedor puede forzar la redirección. Si varios la declaran, prevalece el primero que esté activado. LDAP no puede declararla, porque autentica a través del formulario local.

La redirección se aplica a una página que el navegador muestra, y a nada más. Estas peticiones permanecen siempre donde están:

* Una llamada API, SCIM, MCP o XHR, que no puede seguir un intercambio pensado para un navegador.
* Una imagen, una hoja de estilos o una descarga de archivo.
* Cualquier escritura (POST, PUT, DELETE), porque un navegador reenvía una escritura redirigida como GET y descarta el cuerpo.
* El propio intercambio del proveedor (`/connect/...`) y `/logout`, que de lo contrario construirían un bucle infinito.
* Un visitante que ya tiene una sesión, incluida la cuenta anónima de un curso público.

Añada un fragmento de URL a `skip_force_redirect_in` por cada área pública que deba permanecer abierta, como un catálogo de cursos.

### La vía de escape

Un proveedor inalcanzable bloquearía todas las cuentas, incluida la del administrador local. Añada `skipForcedRedirect=1` a cualquier URL para llegar de todos modos al formulario de inicio de sesión local:

```
https://your-chamilo-url/login?skipForcedRedirect=1
```

La elección permanece en la sesión, de modo que las páginas siguientes siguen mostrando el formulario. También cancela `force_as_login_method` para esa sesión, lo que vuelve a poner todos los métodos de inicio de sesión en la página. Para devolver la plataforma al proveedor, use `?skipForcedRedirect=0`, o cierre la sesión del navegador.

El parámetro pertenece únicamente a `force_redirect`. Mientras ningún proveedor declare esa clave, el parámetro no hace nada en absoluto, y `force_as_login_method` conserva su único botón.

Conserve esta URL junto con sus notas de recuperación. Pruébela antes de activar `force_redirect` en producción.

## Paso 3 — Vaciar la caché y probar

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Cierre la sesión de Chamilo. El botón del proveedor configurado debería aparecer en la página de inicio de sesión. Pruebe con una cuenta dedicada antes de desplegarlo a todos los usuarios.

## Consejos

* Mantenga habilitado el formulario de inicio de sesión estándar para que los administradores puedan iniciar sesión siempre si OAuth2 presenta problemas. Si configura `force_redirect`, aprenda en su lugar la URL `?skipForcedRedirect=1`: es la única forma de volver a ese formulario.
* La asignación de roles por defecto es estudiante; use la asignación de grupos (Azure) para promover usuarios a roles de profesor o administrador de forma automática — consulte [Azure Entra ID](azure-entra-id.md) para más detalles sobre ello y sobre cómo hacer coincidir usuarios entrantes con cuentas existentes.