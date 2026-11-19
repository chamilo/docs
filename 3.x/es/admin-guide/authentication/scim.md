# SCIM

**SCIM** (System for Cross-domain Identity Management) automatiza el aprovisionamiento de usuarios: crea, actualiza y desactiva cuentas de Chamilo en función de los cambios en su proveedor de identidad. A diferencia de OAuth2 o LDAP, SCIM gestiona el aprovisionamiento, no el inicio de sesión.

| Escenario | Acción de SCIM |
|----------|-------------|
| Se incorpora un nuevo empleado | Crea una cuenta de Chamilo |
| Cambia el nombre o el rol de un empleado | Actualiza la cuenta de Chamilo |
| Un empleado abandona la organización | Desactiva o elimina la cuenta de Chamilo |

## Configuración

### 1. Establecer el token de SCIM

En el archivo `.env` (o `.env.local`), defina un token aleatorio seguro:

```
SCIM_TOKEN=your-secure-random-token
```

Su proveedor de identidad utiliza este token para autenticar sus solicitudes a los endpoints SCIM de Chamilo.

### 2. Habilitar SCIM en authentication.yaml

```yaml
authentication:
  1:
    scim:
      main:
        enabled: true
        auth_source: platform
```

> **Advertencia:** Con `auth_source: platform`, los usuarios aprovisionados también pueden iniciar sesión mediante el formulario de acceso habitual. Chamilo les asigna una contraseña aleatoria, por lo que no pueden utilizarla a menos que un administrador establezca una. Antes de la versión 3.0.2 la contraseña era fija: consulte [Contraseñas predecibles de usuarios de SSO y SCIM](../installation/upgrading.md#predictable-passwords-of-sso-and-scim-users).

Vacíe y caliente la caché después de editar:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### 3. Configurar el proveedor de identidad

En su proveedor de identidad (Azure AD, Okta, etc.):

1. Añada Chamilo como aplicación SCIM
2. Establezca la URL base de SCIM en `https://your-chamilo-url/scim/v2/`
3. Introduzca el token del paso 1 como token bearer
4. Asigne los atributos del proveedor a los campos estándar de SCIM (userName, name.givenName, name.familyName, emails)
5. Habilite el aprovisionamiento automático

## Endpoints de SCIM

Chamilo implementa SCIM 2.0:

| Endpoint | Método | Acción |
|----------|--------|--------|
| `/scim/v2/Users` | GET | Listar usuarios |
| `/scim/v2/Users` | POST | Crear un usuario |
| `/scim/v2/Users/{id}` | GET | Obtener un usuario |
| `/scim/v2/Users/{id}` | PUT | Reemplazar un usuario |
| `/scim/v2/Users/{id}` | PATCH | Actualizar un usuario |
| `/scim/v2/Users/{id}` | DELETE | Eliminar un usuario |

## Consejos

* **Comience con un grupo de prueba**: aprovisione un conjunto reducido de usuarios antes de habilitar SCIM para toda la organización.
* **Combine con OAuth2**: una configuración habitual utiliza Azure AD OAuth2 para el inicio de sesión y Azure AD SCIM para el aprovisionamiento.
* **Supervise los registros**: revise tanto los de Chamilo (`var/log/`) como los registros de aprovisionamiento de su proveedor de identidad en busca de errores.