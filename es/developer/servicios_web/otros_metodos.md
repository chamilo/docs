## Otros métodos

Algunos de los otros métodos disponiblies, con una explicación corta en cada caso:

```
function WSCreateUsers($params)
```
Crea usuarios por paquetes. Se espera una contraseña sin cifrado (lo cual es aceptable sobre HTTPS pero **no**en otros casos).
```
function WSCreateUser($params)
```
Crea solo un usuario.
```
function WSCreateUsersPasswordCrypted($params)
```
Crea usuarios tomando en cuenta que sus contraseñas podrían ser cifradas ya. Este método espera los parámetros siguientes :
```
$params = array(
    'secret_key' => $finalKey,
    'users' => array(
        0 => array(
            'firstname' => '…',
            'lastname' => '…',
            'status' => 5,
            'email' => '',
            'loginname' => '',
            'password' => '',
            'encrypt_method' => '',
            'language' => '',
            'phone' => '',
            'expiration_date' => '',
            'official_code' => '',
            'original_user_id_name' => '',
            'original_user_id_value'=> '',
            'extra' => ''
        )
    )
);
```
_encrypt_method_ puede ser _md5_ o _sha1_ o _none_ en el caso de pasarlo en claro.

```
function WSCreateUserPasswordCrypted($params)
```
Crea un solo usuario tomando en cuenta que su contraseña podría estar cifrada
```
function WSEditUserCredentials($params)
```
Edita las credenciales de un usuario (username + password)
```
function WSEditUsers($params)
```
Edita varios usuarios en paquete
```
function WSEditUser($params)
```
Edita un solo usuario
```
function WSEditUsersPasswordCrypted($params)
```
Edita usuarios, enviando contraseñas cifradas
```
function WSEditUserPasswordCrypted($params)
```
Edita unu solo usuario, enviando contraseñas cifradas.

**Ojo** : aunque muy discreto, hay un gran problema en Chamilo LMS 1.9.* ya que WSCreateUserPasswordCrypted espera el nombre de usuario en forma de un campo « loginname », cuando WSEditUserPasswordCrypted espera el nombre de usuario bajo un campo llamado « username ». Asegúrese que no se deje engañar por este, ya que podría tomarle mucho tiempo.
```
function WSDeleteUsers($params)
```
Borra usuarios por paquetes
```
function WSDisableUsers($params)
```
Desactiva usuarios por paquetes
```
function WSEnableUsers($params)
```
Activa usuarios por paquetes
```
function WSCreateCourse($params)
```
Crea un curso
```
function WSCreateCourseByTitle($params)
```
Crea un curso dando solo un título (en este caso el código del curso se generará automáticamente, lo cual puede ser un inconveniente en casos de estructuración específica)
```
function WSEditCourse($params)
```
Edita un curso existente
```
function WSCourseDescription($params)
```
Obtiene la descripción de un curso existente
```
function WSEditCourseDescription($params)
```
Edita una descripción de curso
```
function WSDeleteCourse($params)
```
Borra un curso
```
function WSCreateSession($params)
```
Crea una sesión. Este método espera los siguientes parámetros :
```
$params = array ( 'secret_key' => $finalKey, 'sessions' => array ( 'name' => '', 'year_start' => '', 'month_start' => '', 'day_start' => '', 'year_end' => '', 'month_end' => '', 'day_end' => '', 'nb_days_access_before' => '', 'nb_days_access_after' => '', 'nolimit' => '', //not used in session creation 'user_id' => '', //the coach id 'original_session_id_name' => '', 'original_session_id_value'=> '', 'extra' => '', ));
```

```
function WSEditSession($params)
```
Edita una (o más) sesiones existentes basado en el campo _original_session_id_value_. Este método espera los siguientes parámetros :
```
$params = array ( 'secret_key' => $finalKey, 'sessions' => array ( 0 => array ( 'name' => '', 'year_start' => '', 'month_start' => '', 'day_start' => '', 'year_end' => '', 'month_end' => '', 'day_end' => '', 'nb_days_access_before' => '', 'nb_days_access_after' => '', 'original_session_id_name' => '', 'original_session_id_value'=> '', 'coach_username' => '', 'nolimit' => '', 'user_id' => '', //the coach id 'extra' => '', ), ));
```

```
function WSDeleteSession($params)
```
Borra una sesión
```
function WSSubscribeUserToCourse($params)
```
Inscribe un usuario en un curso
```
function WSSubscribeUserToCourseSimple($params)
```
Inscribe un usuario en un curso
```
function WSGetUser($params)
```
Obtiene información sobre un usuario en base a su ID externo
```
function WSGetUserFromUsername($params)
```
Obtiene información sobre un usuario en base a su nombre de usuario (login)
```
function WSUnsubscribeUserFromCourse($params)
```
Desinscribe un usuario de un curso
```
function WSSuscribeUsersToSession($params)
```
**NOTA: por favor cuide los errores de teclado aquí: el servicio se llama equivocadamente « suscribe » en vez de « subscribe ». Por razones de compatibilidad ascendiente, lo hemos dejado así, pero no se equivoque: tiene que digitarlo en un inglés incorrecto para que funcione!**
Inscribe un usuario (alumno) en una sesión. Este método espera los siguientes parámetros :
```
$params = array ( 'secret_key' => $finalKey, 'userssessions' => array ( 0 => array( 'original_user_id_name' => '', 'original_user_id_value'=> '', 'original_session_id_name' => '', 'original_session_id_value'=> '', ) ));
```

```
function WSSubscribeUserToSessionSimple($params)
```
Desinscribe un usuario de una sesión
```
function WSUnsuscribeUsersFromSession($params)
```
NOTA : Ver nota sobre WSSuscribeUsersToSession arriba

Desinscribe varios usuarios de una sesión, por paquetes
```
function WSSuscribeCoursesToSession($params)
```
NOTA : Ver nota sobre WSSuscribeUsersToSession arriba

Inscribe varios usuarios a una sesión por paquetes. Este método espera los parámetros siguientes:
```
$params = array ( 'secret_key' => $finalKey, 'coursessessions' => array ( 0 => array( 'original_course_id_name' => '', 'original_course_id_values' => array( 0 => array ( 'course_code' => '', //external course ID (can be int) ), ), 'original_session_id_name'=> '', 'original_session_id_value'=> '', ) ));
```

```
function WSUnsuscribeCoursesFromSession($params)
```
NOTA : Ver nota en WSSuscribeUsersToSession

Elimina un curso de una sesión
```
function WSListCourses($params)
```
Obtiene una lista de cursos disponibles en la plataforma
```
function WSUpdateUserApiKey($params)
```
Actualiza la llave API de un usuario
```
function WSListSessions($params)
```
Recupera una lista de las sesiones disponibles en la plataforma