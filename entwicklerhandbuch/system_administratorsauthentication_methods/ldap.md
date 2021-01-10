# LDAP

Das LDAP-Authentifizierungssystem in Chamilo wurde im Laufe der Zeit verschiedenen tiefgreifenden Änderungen unterzogen, und die aktuelle Situation ist etwas verwirrend und erfordert immer eine Art manuelles Update.

Ein Patch von Eric Marguin in Version 1.10.0 behob eine Reihe von Problemen aus früheren Versionen, die sich auf Importskripte bezogen, die die Konfigurationsdatei für LDAP \(main/inc/conf/auth.conf.php\) nicht verwendeten.

## LDAP konfigurieren

Um LDAP zu konfigurieren, überprüfen Sie die LDAP-Variablen in main/inc/conf/auth.conf.php.

Standardmäßig wird es so aussehen \(mehr oder weniger\), wobei Elemente, die an Ihren eigenen LDAP-Server und die Konfiguration angepasst werden sollen, rot eingefärbt wurden:

```text
/**
 * LDAP
 */
/**
 * Array of connection parameters
 **/
$extldap_config = array(
    //base dommain string
    'base_dn' => 'DC=cblue,DC=be',
    //admin distinguished name
    'admin_dn' => 'CN=admin,dc=cblue,dc=be',
    //admin password
    'admin_password' => 'pass',
    //ldap host
    'host' => array('1.2.3.4', '2.3.4.5', '3.4.5.6'),
    // filter
    // 'filter' => '',
    // no () arround the string
    //'port' => ,default on 389
    //protocol version (2 or 3)
    'protocol_version' => 3,
    // set this to 0 to connect to AD server
    'referrals' => 0,
    //String used to search the user in ldap. %username will ber replaced
    // by the username.
    //See extldap_get_user_search_string() function below
    // 'user_search' => 'sAMAccountName=%username%',
    // no () arround the string
    'user_search' => 'uid=%username%',
    // no () arround the string
    //encoding used in ldap (most common are UTF-8 and ISO-8859-1
    'encoding' => 'UTF-8',
    //Set to true if user info have to be update at each login
    'update_userinfo' => true
);
/**
 * Correspondance array between chamilo user info and ldap user info
 * This array is of this form :
 * '<ldap_>' =><ldap_field>
 *
 * If <ldap_field>is "func", then the value of <chamilo_field>will be
 * the return value of the function
 * extldap_get_<chamilo_field>($ldap_array)
 * In this cas you will have to declare the extldap_get_<chamilo_field>
 * function
 *
 * If <ldap_field>is a string beginning with "!", then the value will be
 * this string without "!"
 *
 * If <ldap_field>is any other string then the value of<chamilo_field>
 * will be
 * $ldap_array[<ldap_field>][0]
 *
 * If <ldap_field>is an array then its value will be an array of values
 * with the same rules as above
 **/
$extldap_user_correspondance = array(
    'firstname' => 'givenName',
    'lastname' => 'sn',
    'status' => 'func',
    'admin' => 'func',
    'email' => 'mail',
    'auth_source' => '!extldap',
    //'username' => ,
    'language' => '!english',
    'password' => '!PLACEHOLDER',
    'extra' => array(
        'title' => 'title',
        'globalid' => 'employeeID',
        'department' => 'department',
        'country' => 'co',
        'bu' => 'Company'
    )
);
```

Sobald Sie diese Datei eingerichtet haben, müssen Sie configuration.php ändern, bevor ein paar Dinge zu Ihrer Administrationsoberfläche hinzugefügt werden.

Wenn Sie sich app/config/configuration.php ansehen und nach « ldap » suchen, finden Sie diese 3 Zeilen:

```text
// -> Uncomment the two lines bellow to activate LDAP AND edit main/auth/external_login/ldap.conf.php 
// for configuration
// $extAuthSource["extldap"]["login"] = $_configuration['root_sys']. $_configuration['code_append']."auth/external_login/login.ldap.php";
// $extAuthSource["extldap"]["newUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/newUser.ldap.php";
```

Kommentieren Sie sie aus, um einige zusätzliche Skripte zu aktivieren.

Wenn Sie nicht kommentieren, wird das folgende Element im Administrationsbereich angezeigt.

![](../../.gitbook/assets/image2%20%2810%29.png)

Dadurch erhalten Sie Zugriff auf eine Suchliste für Benutzer auf dem LDAP-Server und Optionen zum Importieren dieser Benutzer. Die Versionen 1.9.x von Chamilo LMS hatten jedoch möglicherweise ein kleines Problem damit, was es tatsächlich unmöglich machte, von diesem Bildschirm aus zu suchen.

![](../../.gitbook/assets/image3%20%2810%29.png)

Um das zu beheben, sollten Sie die Funktionen ldap_get\_users in main/auth/external\_login/ldap.inc.php. bearbeiten. Dort werden Sie sehen, dass unabhängig davon, welche Zuordnung Sie in dem_  $ extldap\_user\_correspondance\_variable in auth.conf.php angegeben haben, nicht berücksichtigt wird. Aktualisieren Sie das, damit die Suche funktioniert.

Beachten Sie, dass dies in Chamilo LMS 1.10.x behoben werden sollte.

## Synchronisationen ausführen

Einige Synchronisationsmechanismen werden automatisch ausgeführt \(über CRON\). Um diese zu finden, schauen Sie tiefer in den main/auth/external\_login/ -Ordner.

Das Skript _ldap\_import\_all\_users.php_ kann beispielsweise ausgeführt werden, um automatisch alle Benutzer aus LDAP \(nach bestimmten in ldap.inc.php definierten Kriterien\) in Chamilo einzufügen. Bitte beachten Sie, dass dies in Version 1.9.x erneut leicht kaputt war und eine Überprüfung der ldap.inc.php-Funktionen erforderlich war, um zu funktionieren.

