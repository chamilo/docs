# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiza el aprovisionamiento de usuarios: crea, actualiza y desactiva cuentas de Chamilo según los cambios en su proveedor de identidad. A diferencia de OAuth2 o LDAP, SCIM gestiona el aprovisionamiento, no el inicio de sesión.

| Escenario | Acción SCIM |
|----------|-------------|
| Se incorpora un nuevo empleado | Crea una cuenta de Chamilo |
| Cambian el nombre o el rol de un empleado | Actualiza la cuenta de Chamilo |
| Un empleado se marcha | Desactiva o elimina la cuenta de Chamilo |

## Configuration

### 1. Set the SCIM token

En su archivo `.env` (o `.env.local`), defina un token aleatorio seguro:

```
SCIM_TOKEN=your-secure-random-token
```

Este token lo utiliza su proveedor de identidad para autenticar las peticiones a los endpoints SCIM de Chamilo.

### 2. Enable SCIM in authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

Limpie y caliente la caché después de editar:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configure your identity provider

En su proveedor de identidad (Azure AD, Okta, etc.):

1. Añada Chamilo como aplicación SCIM
2. Establezca la URL base SCIM en `https://your-chamilo-url/scim/v2/`
3. Introduzca el token del paso 1 como token bearer
4. Asigne los atributos del proveedor a los campos estándar SCIM (userName, name.givenName, name.familyName, emails)
5. Active el aprovisionamiento automático

## SCIM endpoints

Chamilo implementa SCIM 2.0:

| Endpoint | Method | Action |
|----------|--------|--------|
| `/scim/v2/Users` | GET | List users |
| `/scim/v2/Users` | POST | Create a user |
| `/scim/v2/Users/{id}` | GET | Get a user |
| `/scim/v2/Users/{id}` | PUT | Replace a user |
| `/scim/v2/Users/{id}` | PATCH | Update a user |
| `/scim/v2/Users/{id}` | DELETE | Remove a user |

## Tips

* **Empiece con un grupo de prueba** — aprovisione un conjunto reducido de usuarios antes de activar SCIM para toda la organización.
* **Combínelo con OAuth2** — una configuración habitual usa Azure AD OAuth2 para el inicio de sesión y Azure AD SCIM para el aprovisionamiento.
* **Supervise los registros** — revise tanto los de Chamilo (`var/log/`) como los de aprovisionamiento de su proveedor de identidad en busca de errores.