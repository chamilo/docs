# Configuración de registro

Política de autorregistro y redirecciones posteriores al registro: qué se solicita a los nuevos usuarios y dónde llegan.

Acceda a estos ajustes en **Administración > Parámetros de configuración > Registro**. Esta categoría contiene **21 ajustes**, enumerados a continuación con el título y el comentario incluidos en los fixtures de ajustes de la plataforma (`SettingsCurrentFixtures.php`).

> El nombre de la variable en el código se muestra en monoespaciado. Utilícelo al crear scripts a través de la API o cuando necesite cambiar esos ajustes a nivel global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Ajustes

### `allow_double_validation_in_registration`

**Doble validación del proceso de registro**

Simplemente muestra una solicitud de confirmación en la página de registro antes de continuar con la creación del usuario.

*Valor predeterminado: `false`*


### `allow_fields_inscription`

**Restringir los campos mostrados durante el registro**

Si solo desea mostrar algunos de los campos de perfil disponibles, puede completar aquí el array con los subelementos 'fields' y 'extra_fields', que contienen arrays con la lista de campos que se mostrarán.

### `allow_invitation_registration` **v3**

**Permitir el registro mediante enlaces de invitación a cursos**

Cuando está activado, un docente o administrador puede enviar un enlace de invitación de un solo uso desde la herramienta Usuarios de un curso, que permite a una persona no registrada acceder al formulario de registro y registrarse incluso cuando el autorregistro general (`allow_registration`) está desactivado.

*Valor predeterminado: `false`*

Consulte [Inscripción de usuarios](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) para conocer el aspecto de esta función orientado al docente.

### `allow_lostpassword`

**Contraseña olvidada**

¿Se permite a los usuarios solicitar su contraseña olvidada?

*Valor predeterminado: `true`*

### `allow_registration`

**Registro**

¿Se permite el registro como nuevo usuario? ¿Pueden los usuarios crear cuentas nuevas?

*Valor predeterminado: `false`*

### `allow_registration_as_teacher`

**Registro como docente**

¿Se puede registrar alguien como docente (con la capacidad de crear cursos)?

*Valor predeterminado: `false`*

### `allow_terms_conditions`

**Activar términos y condiciones**

Esta opción mostrará los Términos y condiciones en el formulario de registro de los nuevos usuarios. Debe configurarse primero en la página de administración del portal.

*Valor predeterminado: `false`*

Cuando está activada, un administrador de la plataforma, o un superior del estudiante, puede gestionar el acuerdo de un estudiante desde tres lugares: la página de información del usuario (**Administración > Usuarios**, y después el usuario), la página de seguimiento del estudiante en **Informes** y la página del estudiante de los informes globales (`/reporting/learners/<id>`). El botón es el mismo en todos los casos:

* **Enviar acuerdo legal** envía al estudiante un mensaje, firmado con el nombre del remitente, en el que se le pide que firme los términos y condiciones, con un enlace a la dirección establecida en [`course_validation_terms_and_conditions_url`](course-settings.md#course_validation_terms_and_conditions_url).
* **Eliminar acuerdo legal** aparece una vez que el estudiante ha aceptado, y elimina esa aceptación, de modo que se le vuelve a pedir que acepte los términos y condiciones.


### `hrm_autosubscribe`

**Autosuscripción del responsable de recursos humanos**

Códigos de curso separados por `|` (por ejemplo, `COURSE001|COURSE002`). Cuando un responsable de recursos humanos inicia sesión, Chamilo suscribe automáticamente al usuario a los cursos indicados sin cambiar el rol del usuario. El nombre heredado del ajuste `registration.drh_autosubscribe` sigue reconociéndose por compatibilidad.

### `extendedprofile_registration`

**Campos del portafolio en el registro**

¿Cuáles de los siguientes campos del portafolio deben estar disponibles en el proceso de registro de usuarios? Esto requiere que la opción de portafolio esté activada (véase más arriba).

### `extendedprofile_registrationrequired`

**Campos obligatorios del portafolio en el registro**

¿Cuáles de los siguientes campos del portafolio son *obligatorios* en el proceso de registro de usuarios? Esto requiere que la opción de portafolio esté activada y que el campo también esté disponible en el formulario de registro (véase más arriba).

### `extldap_config`

**Configuración de la conexión LDAP**

Array que define el host y el puerto del servidor LDAP.

### `hide_legal_accept_checkbox`

**Ocultar la casilla de aceptación legal en la página de Términos y condiciones**

Si se establece en true, elimina la casilla «He leído y acepto» en el flujo de la página de Términos y condiciones.

*Valor predeterminado: `false`*


### `platform_unsubscribe_allowed`

**Permitir la baja de la plataforma**

Al activar esta opción, permite que cualquier usuario elimine de forma definitiva su propia cuenta y todos los datos relacionados con ella de la plataforma. Se trata de una acción bastante radical, pero es necesaria en los portales abiertos al público en los que los usuarios pueden autorregistrarse. Aparecerá una entrada adicional en el perfil del usuario para darse de baja tras la confirmación.

*Valor predeterminado: `false`*

### `redirect_after_login`

**Redirección tras el inicio de sesión (por perfil)**

Defina la redirección por perfil tras el inicio de sesión mediante un objeto JSON como {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Valor predeterminado:*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "HRM": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

Utilice la clave de rol `HRM` en las nuevas configuraciones de redirección. Los mapas existentes que contienen `DRH` se siguen leyendo por compatibilidad; si ambas claves están presentes, `HRM` tiene prioridad.

### `required_extra_fields_in_inscription`

**Campos adicionales obligatorios durante la inscripción**

Matriz de identificadores de campos adicionales que deben completarse durante la inscripción del usuario.

### `required_profile_fields`

**Campos obligatorios durante la inscripción**

Matriz de nombres de campos de perfil (email, phone, language, official_code) que deben proporcionarse durante la inscripción.

### `send_inscription_msg_to_inbox`

**Enviar el mensaje de bienvenida al correo electrónico y a la bandeja de entrada**

De forma predeterminada, el mensaje de bienvenida (con las credenciales) se envía únicamente por correo electrónico. Active esta opción para enviarlo también a la bandeja de entrada de Chamilo del usuario.

*Valor predeterminado: `false`*


### `sessionadmin_autosubscribe`

**Autosuscripción del administrador de sesión**

Autosuscripción del administrador de sesión - aún no disponible

### `student_autosubscribe`

**Autosuscripción del estudiante**

Autosuscripción del estudiante - todavía no disponible

### `teacher_autosubscribe`

**Autosuscripción del profesor**

Autosuscripción del profesor - todavía no disponible

### `user_hide_never_expire_option`

**Ocultar la opción 'nunca caduca' para los usuarios**

Elimine la opción 'nunca caduca' al crear o editar una cuenta de usuario.

*Valor predeterminado: `false`*