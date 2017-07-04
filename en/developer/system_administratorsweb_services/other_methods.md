## Other methods {#other-methods}

Some of the other methods available, with a small explanation for each:

function WSCreateUsers($params)

Creates users in batches. Password is expected unencrypted (which is alright on HTTPS but **not** otherwise).

function WSCreateUser($params)

Creates just one user.

function WSCreateUsersPasswordCrypted($params)

Creates users taking into account their passwords might be encrypted. This method expects the following parameters :

$params = array( &#039;secret_key&#039; =&gt; $finalKey, &#039;users&#039; =&gt; array( 0 =&gt; array( &#039;firstname&#039; =&gt; &#039;…&#039;, &#039;lastname&#039; =&gt; &#039;…&#039;, &#039;status&#039; =&gt; 5, &#039;email&#039; =&gt; &#039;&#039;, &#039;loginname&#039; =&gt; &#039;&#039;, &#039;password&#039; =&gt; &#039;&#039;, &#039;encrypt_method&#039; =&gt; &#039;&#039;, &#039;language&#039; =&gt; &#039;&#039;, &#039;phone&#039; =&gt; &#039;&#039;, &#039;expiration_date&#039; =&gt; &#039;&#039;, &#039;official_code&#039; =&gt; &#039;&#039;, &#039;original_user_id_name&#039; =&gt; &#039;&#039;, &#039;original_user_id_value&#039;=&gt; &#039;&#039;, &#039;extra&#039; =&gt; &#039;&#039;, ) ));

function WSCreateUserPasswordCrypted($params)

Creates just one user taking into account his password might be encrypted

function WSEditUserCredentials($params)

Edits one user&#039;s credentials (username + password)

function WSEditUsers($params)

Edit several users in batch.

function WSEditUser($params)

Edit just one user

function WSEditUsersPasswordCrypted($params)

Edit users, sending encrypted passwords

function WSEditUserPasswordCrypted($params)

Edit one user, sending encrypted password.

**Warning** : although very discrete, there is an issue in Chamilo LMS 1.9.* whereby WSCreateUserPasswordCrypted expects the username in the form of a « loginname » field, whereas WSEditUserPasswordCrypted expects the username in the form of a « username » field. Make sure you don&#039;t fall for this one, as it might be time-costly.

function WSDeleteUsers($params)

Delete users in batch

function WSDisableUsers($params)

Disable users in batch

function WSEnableUsers($params)

Enable users in batch

function WSCreateCourse($params)

Create a course

function WSCreateCourseByTitle($params)

Create a course giving only a title

function WSEditCourse($params)

Edit an existing course

function WSCourseDescription($params)

Get the course description for a given course

function WSEditCourseDescription($params)

Edit a course description

function WSDeleteCourse($params)

Delete a course

function WSCreateSession($params)

Create a session. This method expects the following parameters :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;sessions&#039; =&gt; array ( &#039;name&#039; =&gt; &#039;&#039;, &#039;year_start&#039; =&gt; &#039;&#039;, &#039;month_start&#039; =&gt; &#039;&#039;, &#039;day_start&#039; =&gt; &#039;&#039;, &#039;year_end&#039; =&gt; &#039;&#039;, &#039;month_end&#039; =&gt; &#039;&#039;, &#039;day_end&#039; =&gt; &#039;&#039;, &#039;nb_days_access_before&#039; =&gt; &#039;&#039;, &#039;nb_days_access_after&#039; =&gt; &#039;&#039;, &#039;nolimit&#039; =&gt; &#039;&#039;, //not used in session creation &#039;user_id&#039; =&gt; &#039;&#039;, //the coach id &#039;original_session_id_name&#039; =&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, &#039;extra&#039; =&gt; &#039;&#039;, ));

function WSEditSession($params)

Edit one (or more) existing session(s) based on the original_session_id_value field. This method expects the following parameters :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;sessions&#039; =&gt; array ( 0 =&gt; array ( &#039;name&#039; =&gt; &#039;&#039;, &#039;year_start&#039; =&gt; &#039;&#039;, &#039;month_start&#039; =&gt; &#039;&#039;, &#039;day_start&#039; =&gt; &#039;&#039;, &#039;year_end&#039; =&gt; &#039;&#039;, &#039;month_end&#039; =&gt; &#039;&#039;, &#039;day_end&#039; =&gt; &#039;&#039;, &#039;nb_days_access_before&#039; =&gt; &#039;&#039;, &#039;nb_days_access_after&#039; =&gt; &#039;&#039;, &#039;original_session_id_name&#039; =&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, &#039;coach_username&#039; =&gt; &#039;&#039;, &#039;nolimit&#039; =&gt; &#039;&#039;, &#039;user_id&#039; =&gt; &#039;&#039;, //the coach id &#039;extra&#039; =&gt; &#039;&#039;, ), ));

function WSDeleteSession($params)

Delete a session

function WSSubscribeUserToCourse($params)

Subscribe a user to a course

function WSSubscribeUserToCourseSimple($params)

Subscribe a user to a course

function WSGetUser($params)

Get user information from a user ID

function WSGetUserFromUsername($params)

Get user information from a username

function WSUnsubscribeUserFromCourse($params)

Unsubscribe a user from a course

function WSSuscribeUsersToSession($params)

**WARNING : please note the typing mistake here : the service is called « suscribe » instead of « subscribe ». For backwards compatibility, we left it that way, but make no mistake : you have to type it in an incorrect English to make it work !**Subscribe a user to a session. This method expects the following parameters :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;userssessions&#039; =&gt; array ( 0 =&gt; array( &#039;original_user_id_name&#039; =&gt; &#039;&#039;, &#039;original_user_id_value&#039;=&gt; &#039;&#039;, &#039;original_session_id_name&#039; =&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, ) ));

function WSSubscribeUserToSessionSimple($params)

Unsubscribe a user from a session

function WSUnsuscribeUsersFromSession($params)

WARNING : See note in WSSuscribeUsersToSession

Unsubscribe several users from a session in batch

function WSSuscribeCoursesToSession($params)

WARNING : See note in WSSuscribeUsersToSession

Subscribe several users to a session in batch. This method expects the following parameters :

$params = array ( &#039;secret_key&#039; =&gt; $finalKey, &#039;coursessessions&#039; =&gt; array ( 0 =&gt; array( &#039;original_course_id_name&#039; =&gt; &#039;&#039;, &#039;original_course_id_values&#039; =&gt; array( 0 =&gt; array ( &#039;course_code&#039; =&gt; &#039;&#039;, //external course ID (can be int) ), ), &#039;original_session_id_name&#039;=&gt; &#039;&#039;, &#039;original_session_id_value&#039;=&gt; &#039;&#039;, ) ));

function WSUnsuscribeCoursesFromSession($params)

WARNING : See note in WSSuscribeUsersToSession

Remove a course from a session

function WSListCourses($params)

Gets a list of courses available on the platform

function WSUpdateUserApiKey($params)

Update the API key of a user

function WSListSessions($params)

Lists the sessions available on the platform