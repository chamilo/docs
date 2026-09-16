# Andere Methoden

Einige der anderen verfügbaren Methoden mit einer kleinen Erklärung für jede:

```text
function WSCreateUsers($params)
```

Erstellt Benutzer in Chargen. Das Passwort wird unverschlüsselt erwartet \(was auf HTTPS in Ordnung ist, aber sonst **nicht**\).

```text
function WSCreateUser($params)
```

Erzeugt nur einen Benutzer.

```text
function WSCreateUsersPasswordCrypted($params)
```

Erstellt Benutzer, die berücksichtigen, dass ihre Kennwörter möglicherweise verschlüsselt sind. Diese Methode erwartet die folgenden Parameter:

```text
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

function WSCreateUserPasswordCrypted($params)
```

Erstellt nur einen Benutzer, der sein Passwort berücksichtigt, ist möglicherweise verschlüsselt

```text
function WSEditUserCredentials($params)
```

Bearbeitet die Anmeldedaten eines Benutzers \(Benutzername + Passwort\)

```text
function WSEditUsers($params)
```

Bearbeiten Sie mehrere Benutzer im Batch.

```text
function WSEditUser($params)
```

Bearbeiten Sie nur einen Benutzer

```text
function WSEditUsersPasswordCrypted($params)
```

Benutzer bearbeiten, verschlüsselte Passwörter senden

```text
function WSEditUserPasswordCrypted($params)
```

Bearbeiten Sie einen Benutzer und senden Sie ein verschlüsseltes Passwort.

**Warnung**: Obwohl sehr diskret, gibt es in `Chamilo LMS 1.9` ein Problem.\* wobei wscreateUserGypwordCrypted den Benutzernamen in Form eines « loginname » -Feldes erwartet, während WseditUserPasswordCryptoD den Benutzernamen in Form eines « username » -Feldes erwartet. Stellen Sie sicher, dass Sie nicht auf dieses hereinfallen, da dies zeitaufwändig sein könnte.

```text
function WSDeleteUsers($params)
```

Benutzer im Stapel löschen

```text
function WSDisableUsers($params)
```

Deaktivieren Sie Benutzer im Batch

```text
function WSEnableUsers($params)
```

Benutzer im Stapel aktivieren

```text
function WSCreateCourse($params)
```

Erstellen Sie einen Kurs

```text
function WSCreateCourseByTitle($params)
```

Erstellen Sie einen Kurs mit nur einem Titel

```text
function WSEditCourse($params)
```

Bearbeiten eines bestehenden Kurses

```text
function WSCourseDescription($params)
```

Holen Sie sich die Kursbeschreibung für einen bestimmten Kurs

```text
function WSEditCourseDescription($params)
```

Bearbeiten einer Kursbeschreibung

```text
function WSDeleteCourse($params)
```

Einen Kurs löschen

```text
function WSCreateSession($params)
```

Erstellen Sie eine Sitzung. Diese Methode erwartet die folgenden Parameter:

```text
$params = array(
    'secret_key' => $finalKey,
    'sessions' => array(
        'name' => '',
        'year_start' => '',
        'month_start' => '',
        'day_start' => '',
        'year_end' => '',
        'month_end' => '',
        'day_end' => '',
        'nb_days_access_before' => '',
        'nb_days_access_after' => '',
        'nolimit' => '',
        //not used in session creation
        'user_id' => '',
        //the coach id
        'original_session_id_name' => '',
        'original_session_id_value'=> '',
        'extra' => ''
    )
);

function WSEditSession($params)
```

Bearbeiten Sie eine \(oder mehrere\) bestehende Session \(s\) basierend auf dem ursprünglichen\_session\_id\_value-Feld. Diese Methode erwartet die folgenden Parameter:

```text
$params = array(
    'secret_key' => $finalKey,
    'sessions' => array(
        0 => array(
            'name' => '',
            'year_start' => '',
            'month_start' => '',
            'day_start' => '',
            'year_end' => '',
            'month_end' => '',
            'day_end' => '',
            'nb_days_access_before' => '',
            'nb_days_access_after' => '',
            'original_session_id_name' => '',
            'original_session_id_value'=> '',
            'coach_username' => '',
            'nolimit' => '',
            'user_id' => '',
            //the coach id
            'extra' => ''
        ),
    )
);

function WSDeleteSession($params)
```

Löschen einer Session

```text
function WSSubscribeUserToCourse($params)
```

Abonnieren Sie einen Benutzer für einen Kurs

```text
function WSSubscribeUserToCourseSimple($params)
```

Abonnieren Sie einen Benutzer für einen Kurs

```text
function WSGetUser($params)
```

Holen Sie sich Benutzerinformationen von einer Benutzer-ID

```text
function WSGetUserFromUsername($params)
```

Holen Sie sich Benutzerinformationen von einem Benutzernamen

```text
function WSUnsubscribeUserFromCourse($params)
```

Einen Benutzer von einem Kurs abmelden

```text
function WSSuscribeUsersToSession($params)
```

**WARNUNG: Bitte beachten Sie hier den Tippfehler: Der Dienst heißt « suscribe » statt « subscribe ». Aus Gründen der Abwärtskompatibilität haben wir es so gelassen, aber machen Sie keinen Fehler: Sie müssen es in falschem Englisch eingeben, damit es funktioniert!**Abonnieren Sie einen Benutzer für eine Sitzung. Diese Methode erwartet die folgenden Parameter:

```text
$params = array(
    'secret_key' => $finalKey,
    'userssessions' => array(
        0 => array(
            'original_user_id_name' => '',
            'original_user_id_value'=> '',
            'original_session_id_name' => '',
            'original_session_id_value'=> ''
        )
    )
);

function WSSubscribeUserToSessionSimple($params)
```

Einen Benutzer von einer Sitzung abmelden

```text
function WSUnsuscribeUsersFromSession($params)
```

WARNUNG: Siehe Hinweis in WSSSusCribeUsersToSession

Abmelden mehrerer Benutzer von einer Sitzung im Batch

```text
function WSSuscribeCoursesToSession($params)
```

WARNUNG: Siehe Hinweis in WSSSusCribeUsersToSession

Abonnieren Sie mehrere Benutzer für eine Sitzung im Stapel. Diese Methode erwartet die folgenden Parameter:

```text
$params = array(
    'secret_key' => $finalKey,
    'coursessessions' => array(
        0 => array(
            'original_course_id_name' => '',
            'original_course_id_values' => array(
                0 => array(
                    'course_code' => '',
                    //external course ID (can be int)
                ),
            ),
            'original_session_id_name'=> '',
            'original_session_id_value'=> '',
        )
    )
);

function WSUnsuscribeCoursesFromSession($params)
```

WARNUNG: Siehe Hinweis in WSSSusCribeUsersToSession

Entfernen eines Kurses aus einer Session

```text
function WSListCourses($params)
```

Ruft eine Liste der auf der Plattform verfügbaren Kurse ab

```text
function WSUpdateUserApiKey($params)
```

Aktualisieren Sie den API-Schlüssel eines Benutzers

```text
function WSListSessions($params)
```

Listet die auf der Plattform verfügbaren Sitzungen auf