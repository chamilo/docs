# Andere methodes

Enkele van de andere beschikbare methoden, met een korte uitleg voor elk:

```text
function WSCreateUsers($params)
```

Maakt gebruikers in batches. Het wachtwoord wordt onversleuteld verwacht (wat goed is op HTTPS, maar **anders niet**).

```text
function WSCreateUser($params)
```

Creëert slechts één gebruiker.

```text
function WSCreateUsersPasswordCrypted($params)
```

Maakt gebruikers die er rekening mee houden dat hun wachtwoorden mogelijk zijn gecodeerd. Deze methode verwacht de volgende parameters:

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

Maakt slechts één gebruiker aan, rekening houdend met het mogelijk versleutelde wachtwoord

```text
function WSEditUserCredentials($params)
```

Bewerkt de inloggegevens van een gebruiker (gebruikersnaam + wachtwoord)

```text
function WSEditUsers($params)
```

Bewerk meerdere gebruikers in batch.

```text
function WSEditUser($params)
```

Bewerk slechts één gebruiker

```text
function WSEditUsersPasswordCrypted($params)
```

Bewerk gebruikers door versleutelde wachtwoorden te verzenden

```text
function WSEditUserPasswordCrypted($params)
```

Bewerk een gebruiker door een gecodeerd wachtwoord te verzenden.

**Waarschuwing** : hoewel zeer discreet, is er een probleem in Chamilo LMS 1.9. * Waarbij WSCreateUserPasswordCrypted de gebruikersnaam verwacht in de vorm van een «loginname» -veld, terwijl WSEditUserPasswordCrypted de gebruikersnaam verwacht in de vorm van een «gebruikersnaam» -veld. Zorg ervoor dat je hier niet in valt, want het kan tijdrovend zijn.

```text
function WSDeleteUsers($params)
```

Verwijder gebruikers in batch

```text
function WSDisableUsers($params)
```

Schakel gebruikers in batch uit

```text
function WSEnableUsers($params)
```

Schakel gebruikers in batch in

```text
function WSCreateCourse($params)
```

Maak een cursus

```text
function WSCreateCourseByTitle($params)
```

Maak een cursus met alleen een titel

```text
function WSEditCourse($params)
```

Bewerk een bestaande cursus

```text
function WSCourseDescription($params)
```

Haal de cursusbeschrijving op voor een bepaalde cursus

```text
function WSEditCourseDescription($params)
```

Bewerk een cursusbeschrijving

```text
function WSDeleteCourse($params)
```

Verwijder een cursus

```text
function WSCreateSession($params)
```

Maak een sessie. Deze methode verwacht de volgende parameters:

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

Bewerk een (of meer) bestaande sessie (s) op basis van het veld original_session_id_value. Deze methode verwacht de volgende parameters:

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

Verwijder een sessie

```text
function WSSubscribeUserToCourse($params)
```

Abonneer een gebruiker op een cursus

```text
function WSSubscribeUserToCourseSimple($params)
```

Abonneer een gebruiker op een cursus

```text
function WSGetUser($params)
```

Haal gebruikersinformatie op van een gebruikers-ID

```text
function WSGetUserFromUsername($params)
```

Haal gebruikersinformatie op van een gebruikersnaam

```text
function WSUnsubscribeUserFromCourse($params)
```

Een gebruiker uitschrijven voor een cursus

```text
function WSSuscribeUsersToSession($params)
```

** LET OP: let op de typefout hier: de dienst heet «inschrijven» in plaats van «inschrijven». Voor achterwaartse compatibiliteit hebben we het zo gelaten, maar vergis je niet: je moet het in een onjuist Engels typen om het te laten werken! ** Abonneer een gebruiker op een sessie. Deze methode verwacht de volgende parameters:

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

Een gebruiker uitschrijven voor een sessie

```text
function WSSuscribeCoursesToSession($params)
```

WAARSCHUWING: zie opmerking in WSSuscribeUsersToSession

Meerdere gebruikers tegelijk afmelden voor een sessie

```text
function WSSuscribeCoursesToSession($params)
```

WAARSCHUWING: zie opmerking in WSSuscribeUsersToSession

Abonneer meerdere gebruikers in batch op een sessie. Deze methode verwacht de volgende parameters:

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

WAARSCHUWING: zie opmerking in WSSuscribeUsersToSession

Een cursus verwijderen uit een sessie

```text
function WSListCourses($params)
```

Krijgt een lijst met cursussen die beschikbaar zijn op het platform

```text
function WSUpdateUserApiKey($params)
```

Werk de API-sleutel van een gebruiker bij

```text
functie WSListSessions ($ params)
```

Geeft een overzicht van de sessies die beschikbaar zijn op het platform
