# LDAP

![](../../../.gitbook/assets/graficos14.png) Met deze categorie kunt u de synchronisatie met een LDAP-server configureren. Het bevat een lange reeks instellingen die allemaal een goede kennis van LDAP vereisen.

Voor meer informatie nodigen we u uit om LDAP-specifieke documentatie te volgen. Merk op dat een ActiveDirectory-server kan worden gebruikt als een LDAP-server door de LDAP-compatibiliteitsmodus in te schakelen.

De nieuwe LDAP-plug-in moet worden geconfigureerd in app/config/auth.conf.php via de aanpassing van de volgende sectie \(de in-line documentatie voor deze plug-in is onjuist tot Chamilo 1.9.4\):

```
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
// 'filter' => '', // no () arround the string
//'port' => , default on 389
//protocol version (2 or 3)
'protocol_version' => 3,
// set this to 0 to connect to AD server
'referrals' => 0,
//String used to search the user in ldap. %username will ber replaced by the username.
//See extldap_get_user_search_string() function below
// 'user_search' => 'sAMAccountName=%username%', // no () arround the string
'user_search' => 'uid=%username%', // no () arround the string
//encoding used in ldap (most common are UTF-8 and ISO-8859-1)
'encoding' => 'UTF-8',
//Set to true if user info have to be update at each login
'update_userinfo' => true
);
```
