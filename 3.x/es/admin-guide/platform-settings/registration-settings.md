# Configuración de registro

Política de autorregistro y redirecciones posteriores al registro: qué se pide a los usuarios nuevos y a dónde llegan.

Acceda a estos ajustes en **Administración > Configuración > Registro**. Esta categoría contiene **21 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de configuración de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Úselo al automatizar mediante la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_double_validation_in_registration`

**Doble validación en el proceso de registro**

Simplemente muestra una solicitud de confirmación en la página de registro antes de continuar con la creación del usuario.

*Predeterminado: `false`*


### `allow_fields_inscription`

**Restringir los campos mostrados durante el registro**

Si solo desea mostrar algunos de los campos de perfil disponibles, puede completar aquí el array con los subelementos 'fields' y 'extra_fields' que contengan arrays con la lista de campos a mostrar.

### `allow_invitation_registration` **v3**

**Permitir el registro mediante enlaces de invitación a un curso**

Cuando está habilitado, un profesor/administrador puede enviar un enlace de invitación de un solo uso desde la herramienta Usuarios de un curso, que permite a una persona no registrada llegar al formulario de registro e inscribirse incluso si el autorregistro general (`allow_registration`) está deshabilitado.

*Predeterminado: `false`*

Consulte [Inscripción de usuarios](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) para el aspecto de esta función orientado al profesor.

### `allow_lostpassword`

**Contraseña perdida**

¿Se permite a los usuarios solicitar su contraseña perdida?

*Predeterminado: `true`*

### `allow_registration`

**Registro**

¿Está permitido el registro como usuario nuevo? ¿Pueden los usuarios crear cuentas nuevas?

*Predeterminado: `false`*

### `allow_registration_as_teacher`

**Registro como profesor**

¿Puede uno registrarse como profesor (con la capacidad de crear cursos)?

*Predeterminado: `false`*

### `allow_terms_conditions`

**Habilitar términos y condiciones**

Esta opción mostrará los Términos y condiciones en el formulario de registro para usuarios nuevos. Debe configurarse primero en la página de administración del portal.

*Predeterminado: `false`*


### `drh_autosubscribe`

**Autoinscripción del director de recursos humanos**

Autoinscripción del director de recursos humanos: aún no disponible

### `extendedprofile_registration`

**Campos de portafolio en el registro**

¿Cuáles de los siguientes campos del portafolio deben estar disponibles en el proceso de registro de usuarios? Esto requiere que la opción de portafolio esté habilitada (véase más arriba).

### `extendedprofile_registrationrequired`

**Campos de portafolio obligatorios en el registro**

¿Cuáles de los siguientes campos del portafolio son *obligatorios* en el proceso de registro de usuarios? Esto requiere que la opción de portafolio esté habilitada y que el campo también esté disponible en el formulario de registro (véase más arriba).

### `extldap_config`

**Configuración de conexión LDAP**

Array que define el host y el puerto del servidor LDAP.

### `hide_legal_accept_checkbox`

**Ocultar la casilla de aceptación legal en la página de Términos y condiciones**

Si se establece en true, elimina la casilla «He leído y acepto» en el flujo de la página de Términos y condiciones.

*Predeterminado: `false`*


### `platform_unsubscribe_allowed`

**Permitir la baja de la plataforma**

Al habilitar esta opción, permite a cualquier usuario eliminar de forma definitiva su propia cuenta y todos los datos relacionados con ella de la plataforma. Se trata de una acción bastante radical, pero es necesaria en portales abiertos al público donde los usuarios pueden autorregistrarse. Aparecerá una entrada adicional en el perfil del usuario para darse de baja tras confirmación.

*Predeterminado: `false`*


### `redirect_after_login`

**Redirección tras el inicio de sesión (por perfil)**

Defina la redirección por perfil tras el inicio de sesión mediante un objeto JSON como {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

**Campos extra obligatorios durante el registro**

Array de identificadores de campos extra que deben completarse durante el registro de usuarios.

### `required_profile_fields`

**Campos obligatorios durante el registro**

Array de nombres de campos de perfil (email, phone, language, official_code) que deben proporcionarse durante el registro.

### `send_inscription_msg_to_inbox`

**Enviar el mensaje de bienvenida al correo electrónico y a la bandeja de entrada**

De forma predeterminada, el mensaje de bienvenida (con las credenciales) se envía solo por correo electrónico. Habilite esta opción para enviarlo también a la bandeja de entrada de Chamilo del usuario.

*Predeterminado: `false`*


### `sessionadmin_autosubscribe`

**Autoinscripción del administrador de sesión**

Autoinscripción del administrador de sesión: aún no disponible

### `student_autosubscribe`

**Autosuscripción de alumnos**

Autosuscripción de alumnos: aún no disponible

### `teacher_autosubscribe`

**Autosuscripción de profesores**

Autosuscripción de profesores: aún no disponible

### `user_hide_never_expire_option`

**Ocultar la opción «nunca caduca» para los usuarios**

Elimina la opción «nunca caduca» al crear o editar una cuenta de usuario.

*Valor predeterminado: `false`*