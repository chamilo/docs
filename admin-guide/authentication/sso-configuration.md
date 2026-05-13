# Configuración de SSO

Esta página cubre temas que aplican a través de los métodos de autenticación.

## Múltiples proveedores

Puedes habilitar más de un método de autenticación al mismo tiempo. Cada proveedor habilitado muestra su propio botón en la página de inicio de sesión junto al formulario estándar de nombre de usuario/contraseña. Los usuarios eligen su método preferido.

Mantén el formulario estándar habilitado para que los administradores de la plataforma siempre puedan iniciar sesión, incluso si un proveedor externo está mal configurado.

## Prioridad de autenticación

Cuando hay múltiples métodos activos, el sistema verifica las credenciales en este orden:

1. LDAP (si `force_as_login_method` está configurado)
2. Proveedores OAuth2 (en el orden en que aparecen en `authentication.yaml`)
3. Base de datos interna de Chamilo

## Tokens JWT para acceso a la API

Chamilo utiliza JWT (JSON Web Tokens) para su API REST. La duración del token y el comportamiento de actualización se configuran en `config/packages/lexik_jwt_authentication.yaml`. Esto es independiente del flujo de inicio de sesión SSO y aplica solo a clientes de API.

## Solución de problemas

### El botón de inicio de sesión no aparece después de la configuración

La caché debe ser limpiada después de cada cambio en `authentication.yaml`:

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

### Los usuarios no pueden iniciar sesión mediante SSO

* **Desajuste en la URI de redirección** — La URI registrada en tu proveedor de identidad debe coincidir exactamente con `https://your-chamilo-url/connect/<provider>/check`.
* **Desfase de reloj** — Los tokens SSO son sensibles al tiempo. Asegúrate de que el reloj de tu servidor esté sincronizado (NTP).
* **Certificado SSL** — Chamilo debe confiar en el certificado del proveedor de identidad. Verifica si hay problemas con certificados autofirmados.
* **Registros (Logs)** — Revisa `var/log/` y los registros de tu proveedor de identidad para mensajes de error específicos.

### Los usuarios se crean con el rol incorrecto

Verifica la configuración de mapeo de roles para el proveedor. Los nuevos usuarios se asignan por defecto al rol de estudiante a menos que un mapeo de grupo o atributo los promueva.

### Los usuarios existen en el proveedor pero no pueden acceder a Chamilo

* Si `allow_create_new_users` está en falso, el usuario debe tener ya una cuenta en Chamilo cuyo correo electrónico o nombre de usuario coincida con los datos del proveedor.
* Verifica que el usuario no esté desactivado en Chamilo.
* Para Azure, revisa `existing_user_verification_order` para entender cómo Chamilo relaciona a los usuarios entrantes con cuentas existentes.