---
# SCIM

**SCIM** (Sistema para la Gestión de Identidades entre Dominios) automatiza la provisión de usuarios, es decir, la creación, actualización y desactivación de cuentas en Chamilo basadas en cambios en su proveedor de identidad. A diferencia de OAuth2 o LDAP, SCIM se encarga de la provisión, no del inicio de sesión.

| Escenario | Acción de SCIM |
|-----------|----------------|
| Un nuevo empleado se incorpora | Crea una cuenta en Chamilo |
| El nombre o rol de un empleado cambia | Actualiza la cuenta en Chamilo |
| Un empleado se retira | Desactiva o elimina la cuenta en Chamilo |

## Configuración

### 1. Establecer el token de SCIM

En su archivo `.env` (o `.env.local`), defina un token aleatorio seguro:

```
SCIM_TOKEN=your-secure-random-token
```

Este token es utilizado por su proveedor de identidad para autenticar sus solicitudes a los endpoints SCIM de Chamilo.

### 2. Habilitar SCIM en authentication.yaml

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

### 3. Configurar su proveedor de identidad

En su proveedor de identidad (Azure AD, Okta, etc.):

1. Agregue Chamilo como una aplicación SCIM
2. Establezca la URL base de SCIM como `https://your-chamilo-url/scim/v2/`
3. Ingrese el token del paso 1 como token de portador
4. Mapee los atributos del proveedor a los campos estándar de SCIM (userName, name.givenName, name.familyName, emails)
5. Habilite la provisión automática

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

* **Comience con un grupo de prueba** — provisione un pequeño conjunto de usuarios antes de habilitar SCIM para toda la organización.
* **Combine con OAuth2** — una configuración común utiliza Azure AD OAuth2 para el inicio de sesión y Azure AD SCIM para la provisión.
* **Monitoree los registros** — revise tanto los registros de Chamilo (`var/log/`) como los registros de provisión de su proveedor de identidad para detectar errores.