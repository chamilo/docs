## Otros métodos {#otros-m-todos}

Algunos de los otros métodos disponiblies, con una explicación corta en cada caso:

function WSCreateUsers($params)

Crea usuarios por paquetes. Se espera una contraseña sin cifrado (lo cual es aceptable sobre HTTPS pero **no**en otros casos).

function WSCreateUser($params)

Crea solo un usuario.

function WSCreateUsersPasswordCrypted($params)

Crea usuarios tomando en cuenta que sus contraseñas podrían ser cifradas ya. Este método espera los parámetros siguientes :

$params = array( &#039;secret_key&#039; =&gt; $finalKey, &#039;users&#039; =&gt; array( 0 =&gt; array( &#039;firstname&#039; =&gt; &#039;…&#039;, &#039;lastname&#039; =&gt; &#039;…&#039;, &#039;status&#039; =&gt; 5, &#039;email&#039; =&gt; &#039;&#039;, &#039;loginname&#039; =&gt; &#039;&#039;, &#039;password&#039; =&gt; &#039;&#039;, &#039;encrypt_method&#039; =&gt; &#039;&#039;, &#039;language&#039; =&gt; &#039;&#039;, &#039;phone&#039; =&gt; &#039;&#039;, &#039;expiration_date&#039; =&gt; &#039;&#039;, &#039;official_code&#039; =&gt; &#039;&#039;, &#039;original_user_id_name&#039; =&gt; &#039;&#039;, &#039;original_user_id_value&#039;=&gt; &#039;&#039;, &#039;extra&#039; =&gt; &#039;&#039;, ) ));

encrypt_method puede ser md5 o sha1 o none en el caso de pasarlo en claro.

function WSCreateUserPasswordCrypted($params)

Crea un solo usuario tomando en cuenta que su contraseña podría estar cifrada

function WSEditUserCredentials($params)

Edita las credenciales de un usuario (username + password)

function WSEditUsers($params)

Edita varios usuarios en paquete

function WSEditUser($params)

Edita un solo usuario

function WSEditUsersPasswordCrypted($params)

Edita usuarios, enviando contraseñas cifradas

function WSEditUserPasswordCrypted($params)

Edita unu solo usuario, enviando contraseñas cifradas.

**Ojo** : aunque muy discreto, hay un gran problema en Chamilo LMS 1.9.* ya que WSCreateUserPasswordCrypted espera el nombre de usuario en forma de un campo « loginname », cuando WSEditUserPasswordCrypted espera el nombre de usuario bajo un campo llamado « username ». Asegúrese que no se deje engañar por este, ya que podría tomarle mucho tiempo.

function WSDeleteUsers($params)

Borra usuarios por paquetes

function WSDisableUsers($params)

Desactiva usuarios por paquetes

function WSEnableUsers($params)

Activa usuarios por paquetes

function WSCreateCourse($params)

Crea un curso

function WSCreateCourseByTitle($params)

Crea un curso dando solo un título (en este caso el código del curso se generará automáticamente, lo cual puede ser un inconveniente en casos de estructuración específica)

function WSEditCourse($params)

Edita un curso existente

function WSCourseDescription($params)

Obtiene la descripción de un curso existente

function WSEditCourseDescription($params)

Edita una descripción de curso

function WSDeleteCourse($params)

Borra un curso

function WSCreateSession($params)

Crea una sesión. Este método espera los siguientes parámetros :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;sessions&#039; =&gt; array ( &#039;name&#039; =&gt; &#039;&#039;, &#039;year_start&#039; =&gt; &#039;&#039;, &#039;month_start&#039; =&gt; &#039;&#039;, &#039;day_start&#039; =&gt; &#039;&#039;, &#039;year_end&#039; =&gt; &#039;&#039;, &#039;month_end&#039; =&gt; &#039;&#039;, &#039;day_end&#039; =&gt; &#039;&#039;, &#039;nb_days_access_before&#039; =&gt; &#039;&#039;, &#039;nb_days_access_after&#039; =&gt; &#039;&#039;, &#039;nolimit&#039; =&gt; &#039;&#039;, //not used in session creation &#039;user_id&#039; =&gt; &#039;&#039;, //the coach id &#039;original_session_id_name&#039; =&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, &#039;extra&#039; =&gt; &#039;&#039;, ));

function WSEditSession($params)

Edita una (o más) sesiones existentes basado en el campo _original_session_id_value_. Este método espera los siguientes parámetros :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;sessions&#039; =&gt; array ( 0 =&gt; array ( &#039;name&#039; =&gt; &#039;&#039;, &#039;year_start&#039; =&gt; &#039;&#039;, &#039;month_start&#039; =&gt; &#039;&#039;, &#039;day_start&#039; =&gt; &#039;&#039;, &#039;year_end&#039; =&gt; &#039;&#039;, &#039;month_end&#039; =&gt; &#039;&#039;, &#039;day_end&#039; =&gt; &#039;&#039;, &#039;nb_days_access_before&#039; =&gt; &#039;&#039;, &#039;nb_days_access_after&#039; =&gt; &#039;&#039;, &#039;original_session_id_name&#039; =&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, &#039;coach_username&#039; =&gt; &#039;&#039;, &#039;nolimit&#039; =&gt; &#039;&#039;, &#039;user_id&#039; =&gt; &#039;&#039;, //the coach id &#039;extra&#039; =&gt; &#039;&#039;, ), ));

function WSDeleteSession($params)

Borra una sesión

function WSSubscribeUserToCourse($params)

Inscribe un usuario en un curso

function WSSubscribeUserToCourseSimple($params)

Inscribe un usuario en un curso

function WSGetUser($params)

Obtiene información sobre un usuario en base a su ID externo

function WSGetUserFromUsername($params)

Obtiene información sobre un usuario en base a su nombre de usuario (login)

function WSUnsubscribeUserFromCourse($params)

Desinscribe un usuario de un curso

function WSSuscribeUsersToSession($params)

**NOTA** **:** **por favor cuide los errores de teclado aquí: el servicio se llama equivocadamente** **« suscribe »** **en vez de** **« subscribe ».** **Por razones de compatibilidad ascendiente, lo hemmos dejado así, pero no se equivoque: tiene que digitarlo en un inglés incorrecto para que funcione** **!**Inscribe un usuario (alumno) en una sesión. Este método espera los siguientes parámetros :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;userssessions&#039; =&gt; array ( 0 =&gt; array( &#039;original_user_id_name&#039; =&gt; &#039;&#039;, &#039;original_user_id_value&#039;=&gt; &#039;&#039;, &#039;original_session_id_name&#039; =&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, ) ));

function WSSubscribeUserToSessionSimple($params)

Desinscribe un usuario de una sesión

function WSUnsuscribeUsersFromSession($params)

NOTA : Ver nota sobre WSSuscribeUsersToSession arriba

Desinscribe varios usuarios de una sesión, por paquetes

function WSSuscribeCoursesToSession($params)

NOTA : Ver nota sobre WSSuscribeUsersToSession arriba

Inscribe varios usuarios a una sesión por paquetes. Este método espera los parámetros siguientes:

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;coursessessions&#039; =&gt; array ( 0 =&gt; array( &#039;original_course_id_name&#039; =&gt; &#039;&#039;, &#039;original_course_id_values&#039; =&gt; array( 0 =&gt; array ( &#039;course_code&#039; =&gt; &#039;&#039;, //external course ID (can be int) ), ), &#039;original_session_id_name&#039;=&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, ) ));

function WSUnsuscribeCoursesFromSession($params)

NOTA : Ver nota en WSSuscribeUsersToSession

Elimina un curso de una sesión

function WSListCourses($params)

Obtiene una lista de cursos disponibles en la plataforma

function WSUpdateUserApiKey($params)

Actualiza la llave API de un usuario

function WSListSessions($params)

Recupera una lista de las sesiones disponibles en la plataforma