# Azure Entra ID

Microsoft rebautizó Azure Active Directory (Azure AD) como **Microsoft Entra ID** en 2023: se trata del mismo servicio, y el código y la configuración de Chamilo siguen refiriéndose a él como `azure`. Esta página cubre las partes específicas de Azure de la integración: registro de la aplicación, asignación de roles basada en grupos, autenticación por certificado y los comandos dedicados de sincronización de usuarios/grupos. Para las claves de configuración compartidas por todos los proveedores (`enabled`, `title`, `allow_create_new_users`, etc.) y la estructura general de `authentication.yaml`, consulte [OAuth2](oauth2.md).

## Registrar Chamilo en Microsoft Entra ID

1. En el centro de administración de Entra, cree un **App registration** para Chamilo.
2. Establezca el URI de redirección (tipo de plataforma **Web**) en:

   ```
   https://your-chamilo-url/connect/azure/check
   ```

3. Anote el **Application (client) ID** y el **Directory (tenant) ID**: necesitará ambos.
4. En **Certificates & secrets**, cree un secreto de cliente o cargue un certificado (véase [Autenticación por certificado](#certificate-authentication) más abajo).
5. En **API permissions**, añada los permisos de Microsoft Graph que se indican a continuación y conceda el consentimiento de administrador.

| Permiso | Tipo | Necesario para |
|------------|------|-------------|
| `User.Read` | Delegated | Inicio de sesión básico |
| `GroupMember.Read.All` | Delegated | Asignación de roles basada en grupos al iniciar sesión |
| `User.Read.All` | Application | `app:azure-sync-users` |
| `GroupMember.Read.All` o `Group.Read.All` | Application | `app:azure-sync-users` y `app:azure-sync-usergroups` |

Los permisos de aplicación requieren consentimiento de administrador y solo los utilizan los comandos de consola de sincronización (mediante la concesión `client_credentials`), nunca el inicio de sesión interactivo de un usuario.

## Configuración básica

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Sign in with Microsoft"
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

### Multitenant frente a un solo tenant

El valor de `tenant` debe coincidir con cómo se configuraron los «supported account types» del registro de la aplicación:

* Un GUID de tenant específico — un solo tenant; solo pueden iniciar sesión las cuentas de esa organización
* `organizations` — cualquier tenant de Entra ID
* `common` — cualquier tenant de Entra ID más cuentas personales de Microsoft

## Atributos de usuario obligatorios

Todo usuario de Entra ID que deba iniciar sesión en Chamilo debe tener rellenados `mail` y `mailNickname`: el inicio de sesión lanza un error si alguno está vacío (junto con el identificador de objeto inmutable de Entra, que siempre está presente). El mapeo de campos de Microsoft Graph a Chamilo es **fijo** para Azure (a diferencia del proveedor OAuth2 genérico, que permite configurar el mapeo de campos):

| Campo de Chamilo | Origen en Microsoft Graph |
|---------------|------------------------|
| Nombre | `givenName` |
| Apellidos | `surname` |
| Correo electrónico | `mail` |
| Nombre de usuario | `userPrincipalName` |
| Teléfono | `telephoneNumber`, luego `businessPhones[0]`, luego `mobilePhone` |
| Activo | `accountEnabled` |
| Idioma de la interfaz | `preferredLanguage` (se empareja con un idioma instalado de Chamilo; si no hay coincidencia, se usa el predeterminado de la plataforma) |

También se escriben tres campos extra en cada inicio de sesión correcto: `organisationemail` (= `mail`), `azure_id` (= `mailNickname`) y `azure_uid` (= el identificador de objeto de Entra). Estos sustentan la lógica de emparejamiento de cuentas que se describe a continuación.

## Emparejar inicios de sesión con cuentas existentes de Chamilo

Establezca `existing_user_verification_order` en una lista de dígitos `1`–`3` separados por comas para controlar cómo se empareja un inicio de sesión entrante de Entra ID con una cuenta existente de Chamilo:

| Valor | Empareja contra |
|-------|------------------|
| `1` | Campo extra `organisationemail` == `mail` de Entra |
| `2` | Campo extra `azure_id` == `mailNickname` de Entra |
| `3` | Campo extra `azure_uid` == identificador de objeto de Entra |

Las posiciones se prueban en el orden indicado; gana la primera coincidencia activa (no eliminada de forma lógica). Un valor inválido o vacío se interpreta por defecto como `1,2,3`. Si ninguna de las posiciones configuradas coincide —lo cual ocurre siempre la primera vez que un usuario determinado inicia sesión, ya que esos campos extra solo se rellenan *después* de un inicio de sesión correcto—, Chamilo recurre a emparejar el campo `email` propio de Chamilo con `mail` de Entra y, a continuación, `username` con `userPrincipalName`, independientemente de lo que haya configurado.

## Asignación de roles basada en grupos

Asigne grupos de seguridad de Entra ID a roles de Chamilo mediante sus Object ID (GUID):

```yaml
authentication:
  1:
    oauth2:
      azure:
        group_id:
          admin: "<entra-group-object-id>"
          session_admin: "<entra-group-object-id>"
          teacher: "<entra-group-object-id>"
```

En cada inicio de sesión, Chamilo llama a Microsoft Graph `/v1.0/me/memberOf` con el token de acceso del propio usuario y compara los grupos devueltos con estos tres ID, en el orden **admin → session_admin → teacher**. La primera coincidencia prevalece: un usuario que pertenezca tanto al grupo de administrador como al de profesor se promociona solo a administrador. Quien no esté en ningún grupo configurado conserva su rol existente (o el rol de estudiante predeterminado, en el primer inicio de sesión). Esto requiere el permiso delegado `GroupMember.Read.All` indicado más arriba.

## Autenticación con certificado

Como alternativa a `client_secret`, autentíquese con un certificado:

```yaml
authentication:
  1:
    oauth2:
      azure:
        client_certificate_private_key: "<PEM private key, single line, with \\n for line breaks>"
        client_certificate_thumbprint: "<hex SHA1 thumbprint>"
```

Cargue el certificado público correspondiente en **Certificates & secrets** del registro de la aplicación y copie su huella (mostrada en hexadecimal en el portal) en `client_certificate_thumbprint`. Cuando ambas claves están definidas, Chamilo construye una aserción JWT de cliente firmada (RS256) en lugar de enviar `client_secret`; esto se aplica tanto a los inicios de sesión interactivos como a la autenticación solo de aplicación de los comandos de sincronización.

## Sincronización de usuarios y grupos desde Entra ID

Dos comandos de consola aprovisionan y mantienen las cuentas de Chamilo directamente desde Entra ID, con independencia de que alguien inicie sesión de forma interactiva. Ambos se autentican solo como aplicación (`client_credentials`), por lo que necesitan los permisos de Graph de **aplicación** indicados más arriba, y ambos están pensados para programarse en cron en lugar de ejecutarse manualmente.

### `app:azure-sync-users`

Obtiene usuarios de Microsoft Graph y aprovisiona o actualiza las cuentas de Chamilo correspondientes usando la misma asignación de campos y la misma lógica de coincidencia de cuentas que un inicio de sesión interactivo.

* Por defecto obtiene la lista completa de usuarios (`/v1.0/users`, paginada). Establezca `script_users_delta: true` para usar `/v1.0/users/delta` en su lugar: Chamilo persiste el enlace delta entre ejecuciones, de modo que las siguientes solo recuperan lo que ha cambiado.
* Establezca `deactivate_nonexisting_users: true` para desactivar las cuentas de Chamilo (con origen de autenticación Azure) que ya no aparecen en la obtención de Entra ID. Esto solo funciona en modo de obtención completa: el modo delta nunca devuelve la lista completa de usuarios, por lo que este ajuste se ignora cuando `script_users_delta` está habilitado.
* La asignación de roles por grupo (arriba) se vuelve a aplicar para cada usuario sincronizado durante esta ejecución, no solo en el inicio de sesión.

### `app:azure-sync-usergroups`

Obtiene grupos de Entra ID y los refleja como clases de Chamilo (`Usergroup`).

* Obtiene la lista completa de grupos (`/v1.0/groups`) o, con `script_usergroups_delta: true`, el endpoint delta, con su propio enlace delta rastreado por separado.
* `group_filter_regex` restringe qué grupos se sincronizan, comparando con el nombre para mostrar del grupo.
* **Cada ejecución vacía primero todos los miembros existentes de la clase de Chamilo coincidente** y luego vuelve a suscribir a los miembros que Graph devuelve en ese momento. Los miembros se emparejan solo con usuarios de Chamilo *existentes*, usando la misma [lógica de coincidencia de cuentas](#matching-logins-to-existing-chamilo-accounts) que el inicio de sesión: este comando nunca crea cuentas de usuario nuevas, y cualquier miembro de grupo que no pueda emparejarse con una cuenta de Chamilo existente se omite en silencio.

## Limitaciones conocidas

* **No hay cierre de sesión único.** Cerrar sesión en Chamilo no cierra la sesión del usuario en Entra ID ni en otras aplicaciones conectadas. Existe una clave de configuración `force_logout` en `authentication.yaml`, pero no está implementada actualmente: trátela como reservada, no funcional.
* **El restablecimiento de contraseña no tiene sentido para las cuentas Azure.** Dado que la autenticación se realiza por completo a través de Entra ID, Chamilo no mantiene una contraseña local utilizable para estas cuentas.

## Resolución de problemas

* Los fallos de inicio de sesión (atributos obligatorios ausentes, errores de la API Graph) se muestran al usuario como un mensaje flash en la página de inicio de sesión.
* Los comandos de sincronización registran los problemas por registro con advertencias y siguen procesando el resto del lote en lugar de abortar en el primer error: revise la salida de consola del comando (o el destino en el que su cron la capture) después de cada ejecución.
* Mantenga habilitado el formulario de inicio de sesión estándar de Chamilo para que los administradores siempre tengan una vía de acceso si la integración con Entra ID falla.