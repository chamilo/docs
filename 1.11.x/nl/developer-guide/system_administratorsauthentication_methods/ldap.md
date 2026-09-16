# LDAP

Het LDAP-authenticatiesysteem in Chamilo is in de loop van de tijd onderworpen aan verschillende diepgaande veranderingen, en de huidige situatie is enigszins verwarrend en vereist altijd een soort handmatige update.

Een patch van Eric Marguin in versie 1.10.0 loste een reeks problemen op van eerdere versies, gerelateerd aan importscripts die het configuratiebestand voor LDAP niet gebruikten (main / inc / conf / auth.conf.php).

## Configuring LDAP

Standaard zal het zo (min of meer) komen, waarbij elementen die moeten worden aangepast aan uw eigen LDAP-server en configuratie in rood zijn gekleurd:

Als je eenmaal dat bestand hebt ingesteld, moet je configuration.php wijzigen voordat er een paar dingen aan je administratie-interface worden toegevoegd.

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

Als je naar app/config/configuration.php kijkt en zoekt naar «ldap», vind je deze 3 regels:

Verwijder commentaar om een paar extra scripts in te schakelen.

```text
// -> Uncomment the two lines bellow to activate LDAP AND edit main/auth/external_login/ldap.conf.php
// for configuration
// $extAuthSource["extldap"]["login"] = $_configuration['root_sys']. $_configuration['code_append']."auth/external_login/login.ldap.php";
// $extAuthSource["extldap"]["newUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/newUser.ldap.php";
```

Verwijder commentaar om een paar extra scripts in te schakelen.

![](../../.gitbook/assets/image2%20%281%29.png)

Dit geeft u toegang tot een zoeklijst voor gebruikers op de LDAP-server en opties om die gebruikers te importeren. Versies 1.9.x van Chamilo LMS hadden daar misschien een klein probleem mee, waardoor het eigenlijk onmogelijk was om vanaf dit scherm te zoeken. ![](../../.gitbook/assets/image3%20%281%29.png)

Dit geeft u toegang tot een zoeklijst voor gebruikers op de LDAP-server en opties om die gebruikers te importeren. Versies 1.9.x van Chamilo LMS hadden daar misschien een klein probleem mee, waardoor het eigenlijk onmogelijk was om vanaf dit scherm te zoeken.

Om dat op te lossen, zou je de ldap_get_users functies in main/auth/external_login/ldap.inc.php moeten bewerken. Daar zul je zien dat ongeacht welke mapping je hebt gegeven in de $extldap_user_correspondance_variable in auth.conf.php, er geen rekening mee wordt gehouden. Werk dat bij om de zoekopdracht te laten werken.

Om dat op te lossen, zou je de ldap_get_users functies in main/auth/external_login/ldap.inc.php moeten bewerken. Daar zul je zien dat ongeacht welke mapping je hebt gegeven in de $extldap_user_correspondance_variable in auth.conf.php, er geen rekening mee wordt gehouden. Werk dat bij om de zoekopdracht te laten werken.

Sommige synchronisatiemechanismen zijn gemaakt om automatisch te worden uitgevoerd (via CRON). Om deze te vinden, kijkt u dieper in de main/auth/external_login/.

## Synchronisaties uitvoeren

Het *ldap_import_all_users.php* script kan bijvoorbeeld worden uitgevoerd om automatisch alle gebruikers van LDAP (volgens specifieke criteria gedefinieerd in ldap.inc.php) in Chamilo in te voegen. Houd er rekening mee dat, nogmaals, in versie 1.9.x, dit vroeger een beetje kapot was, waardoor een herziening van de ldap.inc.php-functies nodig was om te werken.

Het ldap_import_all_users.php script kan bijvoorbeeld worden uitgevoerd om automatisch alle gebruikers van LDAP (volgens specifieke criteria gedefinieerd in ldap.inc.php) in Chamilo in te voegen. Houd er rekening mee dat, nogmaals, in versie 1.9.x, dit vroeger een beetje kapot was, waardoor een herziening van de ldap.inc.php-functies nodig was om te werken.
