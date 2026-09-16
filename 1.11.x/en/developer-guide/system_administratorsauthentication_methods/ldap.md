# LDAP

The LDAP authentication system in Chamilo has been submitted to various deep changes over time, and the current situation is somewhat confusing and always require some kind of manual update.

A patch by Eric Marguin in version 1.10.0 fixed a series of issues from previous versions, related to import scripts not using the configuration file for LDAP \(main/inc/conf/auth.conf.php\).

## Configuring LDAP

To configure LDAP, check the LDAP variables in main/inc/conf/auth.conf.php.

By default, it will come like this \(more or less\), where elements to be adapted to your own LDAP server and configuration have been coloured in red :

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

Once you've got that file setup, you'll have to change configuration.php before a few things are added to your administration interface.

If you look at app/config/configuration.php and search for « ldap », you'll find these 3 lines:

```text
// -> Uncomment the two lines bellow to activate LDAP AND edit main/auth/external_login/ldap.conf.php 
// for configuration
// $extAuthSource["extldap"]["login"] = $_configuration['root_sys']. $_configuration['code_append']."auth/external_login/login.ldap.php";
// $extAuthSource["extldap"]["newUser"] = $_configuration['root_sys'].$_configuration['code_append']."auth/external_login/newUser.ldap.php";
```

Uncomment them to enable a few additional scripts.

When uncommenting, you'll see the following item appear in the administration panel.

![](../../.gitbook/assets/image2%20%2810%29.png)

This will give you access to a search list for users on the LDAP server, and options to import those users. Versions 1.9.x of Chamilo LMS, however, might have had a little issue with that, making it actually impossible to search from this screen.

![](../../.gitbook/assets/image3%20%2810%29.png)

To fix that, you should go and edit the ldap_get\_users functions in main/auth/external\_login/ldap.inc.php. There, you'll see that no matter what mapping you gave in the_ $extldap\_user\_correspondance\_variable in auth.conf.php, it isn't taken into account. Update that to get the search working.

Note that this should be fixed in Chamilo LMS 1.10.x.

## Running synchronisations

Some synchronization mechanisms are made to be run automatically \(through CRON\). To find these, look deeper into the main/auth/external\_login/ folder.

The _ldap\_import\_all\_users.php_ script, for example, can be executed to automatically insert all users from LDAP \(following specific criterias defined in ldap.inc.php\) into Chamilo. Please note that, once again, in version 1.9.x, this used to be slightly broken, requiring a review of the ldap.inc.php functions in order to work.

