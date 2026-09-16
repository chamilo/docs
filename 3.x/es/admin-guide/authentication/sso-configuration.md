# Configuración de SSO

Esta página cubre temas que se aplican a todos los métodos de autenticación.

## Varios proveedores

Puede habilitar más de un método de autenticación al mismo tiempo. Cada proveedor habilitado muestra su propio botón en la página de inicio de sesión junto al formulario estándar de nombre de usuario y contraseña. Los usuarios eligen el método que prefieran.

Mantenga habilitado el formulario estándar para que los administradores de la plataforma puedan iniciar sesión siempre, incluso si un proveedor externo está mal configurado.

## Prioridad de autenticación

Cuando hay varios métodos activos, el sistema comprueba las credenciales en este orden:

1. LDAP (si `force_as_login_method` está establecido)
2. Proveedores OAuth2 (en el orden en que aparecen en `authentication.yaml`)
3. Base de datos interna de Chamilo

## Tokens JWT para acceso a la API

Chamilo utiliza JWT (JSON Web Tokens) para su API REST. La duración del token y el comportamiento de renovación se configuran en `config/packages/lexik_jwt_authentication.yaml`. Esto es independiente del flujo de inicio de sesión SSO y se aplica únicamente a los clientes de la API.

## Resolución de problemas

### El botón de inicio de sesión no aparece después de la configuración

Se debe vaciar la caché después de cada cambio en `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Los usuarios no pueden iniciar sesión mediante SSO

* **No coincidencia del URI de redirección** — El URI registrado en su proveedor de identidad debe coincidir exactamente con `https://your-chamilo-url/connect/<provider>/check`.
* **Desfase de reloj** — Los tokens SSO son sensibles al tiempo. Asegúrese de que el reloj del servidor esté sincronizado (NTP).
* **Certificado SSL** — Chamilo debe confiar en el certificado del proveedor de identidad. Compruebe si hay problemas con certificados autofirmados.
* **Registros** — Revise `var/log/` y los registros de su proveedor de identidad en busca de mensajes de error concretos.

### Los usuarios se crean con el rol incorrecto

Compruebe la configuración de asignación de roles del proveedor. Los usuarios nuevos tienen por defecto el rol de estudiante a menos que una asignación de grupo o atributo los ascienda.

### Los usuarios existen en el proveedor pero no pueden acceder a Chamilo

* Si `allow_create_new_users` es false, el usuario ya debe tener una cuenta de Chamilo cuyo correo electrónico o nombre de usuario coincida con los datos del proveedor.
* Compruebe que el usuario no esté desactivado en Chamilo.
* En el caso de Azure, revise `existing_user_verification_order` para entender cómo Chamilo relaciona a los usuarios entrantes con las cuentas existentes.