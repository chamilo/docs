# Configuración de Registro

Política de auto-registro y redirecciones posteriores al registro: qué se les pide a los nuevos usuarios y a dónde son dirigidos.

Acceda a estas configuraciones en **Administración > Configuraciones de configuración > Registro**. Esta categoría contiene **20 configuraciones**, listadas a continuación con el título y el comentario incluidos en los datos predefinidos de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monospace. Úselo cuando realice scripts a través de la API o cuando necesite cambiar estas configuraciones a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configuraciones

### `allow_double_validation_in_registration`

**Doble validación para el proceso de registro**

Muestra simplemente una solicitud de confirmación en la página de registro antes de proceder con la creación del usuario.

*Predeterminado: `false`*

### `allow_fields_inscription`

**Restringir campos mostrados durante el registro**

Si desea mostrar solo algunos de los campos de perfil disponibles, puede completar el arreglo aquí con subelementos 'fields' y 'extra_fields' que contengan arreglos con una lista de los campos a mostrar.

### `allow_lostpassword`

**Contraseña perdida**

¿Se permite a los usuarios solicitar su contraseña perdida?

*Predeterminado: `true`*

### `allow_registration`

**Registro**

¿Se permite el registro como nuevo usuario? ¿Pueden los usuarios crear nuevas cuentas?

*Predeterminado: `false`*

### `allow_registration_as_teacher`

**Registro como profesor**

¿Puede uno registrarse como profesor (con la capacidad de crear cursos)?

*Predeterminado: `false`*

### `allow_terms_conditions`

**Habilitar términos y condiciones**

Esta opción mostrará los Términos y Condiciones en el formulario de registro para nuevos usuarios. Debe configurarse primero en la página de administración del portal.

*Predeterminado: `false`*

### `drh_autosubscribe`

**Auto-suscripción de director de recursos humanos**

Auto-suscripción de director de recursos humanos - aún no disponible

### `extendedprofile_registration`

**Campos de portafolio en el registro**

¿Cuáles de los siguientes campos del portafolio deben estar disponibles en el proceso de registro de usuarios? Esto requiere que la opción de portafolio esté habilitada (ver arriba).

### `extendedprofile_registrationrequired`

**Campos de portafolio requeridos en el registro**

¿Cuáles de los siguientes campos del portafolio son *obligatorios* en el proceso de registro de usuarios? Esto requiere que la opción de portafolio esté habilitada y que el campo también esté disponible en el formulario de registro (ver arriba).

### `extldap_config`

**Configuración de conexión LDAP**

Arreglo que define el host y el puerto para el servidor LDAP.

### `hide_legal_accept_checkbox`

**Ocultar casilla de aceptación legal en la página de Términos y Condiciones**

Si se establece en true, elimina la casilla "He leído y acepto" en el flujo de la página de Términos y Condiciones.

*Predeterminado: `false`*

### `platform_unsubscribe_allowed`

**Permitir la cancelación de suscripción a la plataforma**

Al habilitar esta opción, permite que cualquier usuario elimine definitivamente su propia cuenta y todos los datos relacionados con ella de la plataforma. Esta es una acción bastante radical, pero es necesaria para portales abiertos al público donde los usuarios pueden auto-registrarse. Aparecerá una entrada adicional en el perfil del usuario para cancelar la suscripción después de la confirmación.

*Predeterminado: `false`*

### `redirect_after_login`

**Redirección después del inicio de sesión (por perfil)**

Defina la redirección por perfil después del inicio de sesión usando un objeto JSON como {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Predeterminado:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Campos adicionales requeridos durante el registro**

Arreglo de identificadores de campos adicionales que deben completarse durante el registro de usuarios.

### `required_profile_fields`

**Campos requeridos durante el registro**

Arreglo de nombres de campos de perfil (email, phone, language, official_code) que deben proporcionarse durante el registro.

### `send_inscription_msg_to_inbox`

**Enviar el mensaje de bienvenida al correo electrónico y a la bandeja de entrada**

Por defecto, el mensaje de bienvenida (con credenciales) se envía solo por correo electrónico. Habilite esta opción para enviarlo también a la bandeja de entrada de Chamilo del usuario.

*Predeterminado: `false`*

### `sessionadmin_autosubscribe`

**Auto-suscripción de administrador de sesión**

Auto-suscripción de administrador de sesión - aún no disponible

### `student_autosubscribe`

**Auto-suscripción de aprendiz**

Auto-suscripción de aprendiz - aún no disponible

### `teacher_autosubscribe`

**Auto-suscripción de profesor**

Auto-suscripción de profesor - aún no disponible

### `user_hide_never_expire_option`

**Ocultar la opción 'nunca expira' para usuarios**

Elimina la opción 'nunca expira' al crear/editar una cuenta de usuario.

*Predeterminado: `false`*