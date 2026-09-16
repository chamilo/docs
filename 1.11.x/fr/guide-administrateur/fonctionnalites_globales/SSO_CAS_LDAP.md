# Configuration SSO CAS et synchronisation de données depuis LDAP

Vous avez déjà un serveur CAS et un LDAP (ou Active Directory) et vous voulez que Chamilo utilise ces 2 ressources, cette page vous guide pour mettre en place une configuration standard avec les valeurs recommandées par défaut. 

## Configuration SSO CAS <a id="configuration-sso-cas"></a>

Comme utilisateur "administrateur", allez dans Chamilo sur la page d'administration et dans le bloc "plateforme" et cliquez sur le  lien "Paramètres de configuration de Chamilo", cliquez sur l'icône CAS. 
![](../../.gitbook/assets/cas.png)

On obtient ainsi la liste des options de configuration liées à CAS que l'on peut configurer ainsi :  

* Enable CAS authentication : Yes
* Main CAS server : URL.DEVOTRESERVEUR.CAS
* Main CAS server URI :
* Main CAS server port : 443
* Main CAS server protocol : CAS 2 (à adapter en fonction de ce que vous avez comme configuration de votre serveur)
* Enable CAS user addition : Create a user account for any new CAS-authenticated user, from LDAP
* Update CAS-authenticated user account information from LDAP : Yes

Si vous voulez tester la connexion par CAS indépendamment du LDAP, il est  possible de mettre la configuration suivante pour ces 2 dernières  options : 
* Enable CAS user addition : Create a user account for any new CAS-authenticated user, from scratch
* Update CAS-authenticated user account information from LDAP : No

Pour tester, nous vous conseillons d'activer le plugin permettant d'ajouter un  bouton sur la page de login (il sera désactivé quand on mettra  la redirection automatique vers le serveur CAS si l'utilisateur n'est pas encore authentifié). Pour se faire, allez sur la page d'administration  dans le bloc plateforme et cliquez sur le lien "plugin" puis activez le plugin "Add a button to login using CAS" et entrez la configuration  suivante : 
* title : "CAS Connexion" 
* region : "login_bottom"

Une  fois que la connexion CAS est validée avec cette configuration on peut finaliser la mise ne œuvre en adaptant la configuration dans le  fichier app/config/auth.conf.php
On trouve l'ensemble des options possibles dans le fichier app/config/auth.conf.dist.php
On peut voir un bloc CAS à la fin qui contient ceci : 
``` 
/**  
* CAS
*/ 
$cas = [
     'force_redirect' => false,
     'replace_login_form' => false,
     // 'verbose' => false,
     // 'debug' => '/var/log/cas_debug.log',
     'noCasServerValidation' => true, // set to false in production
     // 'fixedServiceURL' => false, // false by default, set to either true or to the service URL string if needed
     // sites might also need proxy_settings in configuration.php
]; 
``` 

Nous vous conseillons de modifier ceci une fois que vous êtes en production  et que la connexion avec le bouton CAS en page d'accueil fonctionne  correctement : 
* 'force_redirect' => true,
Ceci forcera la redirection automatique vers le serveur CAS si l'utilisateur n'est pas déjà authentifié. Attention qu'il faudra mettre en place une page de login local si vous avez besoin d'accéder à Chamilo en vous connectant avec  des comptes qui ne sont pas sur CAS.
* 'noCasServerValidation' => false,

## Configuration LDAP <a id="configuration-ldap"></a>

Pour que la création des comptes puisse se faire en récupérant les  champs des utilisateurs depuis le LDAP, il faut pour cela configurer la connexion LDAP. Ceci se fait également dans le fichier de configuration app/config/auth.conf.php pour lequel on trouve toutes les  options possibles dans le fichier app/config/auth.conf.dist.php
Voici un exemple avec le mail comme identifiant dans le LDAP et également pour le CAS.
```
/**  
* LDAP  
*/ 
/**  * Array of connection parameters  **/
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
 //  'filter' => '', // no () arround the string
   'port' => 389, // default on 389
   //protocl version (2 or 3)
   'protocol_version' => 3,
   // set this to 0 to connect to AD server
   'referrals' => 0,
   //String used to search the user in ldap. %username will ber replaced by the username.
   //See extldap_get_user_search_string() function below
 //  'user_search' => 'sAMAccountName=%username%',  // no () arround the string
   'user_search' => 'mail=%username%',  // no () arround the string
   //encoding used in ldap (most common are UTF-8 and ISO-8859-1
   'encoding' => 'UTF-8',
   //Set to true if user info have to be update at each login
   'update_userinfo' => true
   // Define user_search_import_all_users variable to control main/auth/external_login/ldap.inc.php
   // Active Directory: 'user_search_import_all_users' => 'sAMAccountName=$char1$char2*'
   // OpenLDAP: 'user_search_import_all_users' => 'uid=*'
   'user_search_import_all_users' => 'uid=*'
);

/**  
* Correspondance array between chamilo user info and ldap user info  
* This array is of this form :  
*  '<chamilo_field> => <ldap_field>  
*  
* If <ldap_field> is "func", then the value of <chamilo_field> will be the return value of the function  
* extldap_get_<chamilo_field>($ldap_array)  
* In this cas you will have to declare the extldap_get_<chamilo_field> function  
*  
* If <ldap_field> is a string beginning with "!", then the value will be this string without "!"   
*  
* If <ldap_field> is any other string then the value of <chamilo_field> will be  
* $ldap_array[<ldap_field>][0]  
*  
* If <ldap_field> is an array then its value will be an array of values with the same rules as above  
*  
* Please Note that Chamilo expects some attributes that might not be present in your user ldap record  
*  
**/ 
$extldap_user_correspondance = array(
     'firstname' => 'givenName',
     'lastname' => 'sn',
     'email' => 'mail',
     'auth_source' => '!extldap',
     'username' => 'mail',
     'language' => '!english',
     'password' => 'userPassword',
     'status' => '!5', // Forcing status to 5; To change this set 'status' => 'func' and implement an extldap_get_status($ldap_array) function
     'active' => '!1', // Forcing active to 1; To change this set 'status' => 'func' and implement an extldap_get_active($ldap_array) function
     'admin' => 'func' // Using the extldap_get_admin() function to check if user is an administrator based on some ldap user record value
     /* Extras example
     'extra' => array(
         'title' => 'title',
         'globalid' => 'employeeID',
         'department' => 'department',
         'country' => 'co',
         'bu' => 'Company',
         'cas_user' => 'mail',
     )
*/ 
); 
```

Il faut donc adapter cette configuration pour la connexion au LDAP et pour la correspondance des champs entre le LDAP et Chamilo.
La configuration de la connexion se fait dans le tableau extldap_config.
La correspondance des champs se fait dans le tableauextldap_user_correspondance.
On  peut voir pour la langue de l'utilisateur que l'on a une valeur fixe  "english" qui est précédée d'un "!" pour indiquer qu'il faut prendre cette valeur fixe. Il faut savoir que pour mettre une autre langue, il faut mettre son nom en anglais et tel qu'il apparait dans le dossier  main/lang/ de Chamilo. Donc, si l'on veut que les utilisateurs qui seront créés à partir du LDAP aient la langue française, il faut mettre :  'language' => '!french',
On peut voir dans la partie 'extra' le dernier élément qui nommé cas_user, c'est un champs extra d'utilisateur qui est créé automatiquement quand on active l'authentification CAS et qui est utilisé pour stocker la valeur de l'authentifiant CAS de l'utilisateur. C'est ce qui permettra de faire le lien entre l'utilisateur LDAP et l'utilisateur CAS.  

Pour la définition du rôle des utilisateurs en fonction de règles du  LDAP, il faut adapter les fonctions correspondantes que l'on peut trouver  dans main/auth/external_login/ldap.inc.php
```
/**  
* Please declare here all the function you use in extldap_user_correspondance  
* All these functions must have an $ldap_user parameter. This parameter is the  
* array returned by the ldap for the user.  
* 
*/ 
function extldap_get_status($ldap_user) {
     return STUDENT; 
} 
function extldap_get_admin($ldap_user) {
     return false; 
}
```

Pour tester votre configuration LDAP, vous pouvez activer temporairement l'authentification par LDAP en allant dans le fichier de configuration app/config/configuration.php et en dé-commentant les deux  dernières lignes du bloc ci-dessous :
```
// NEW LDAP IMPLEMENTATION BASED ON external_login info
// -> Uncomment the two lines bellow to activate LDAP AND edit main/auth/external_login/ldap.conf.php for configuration
// $extAuthSource["extldap"]["login"] = $_configuration['root_sys']."main/auth/external_login/login.ldap.php";
// $extAuthSource["extldap"]["newUser"] = $_configuration['root_sys']."main/auth/external_login/newUser.ldap.php"
```
Vous aurez alors un nouveau lien "Importer des utilisateurs" sur la  page d'administration dans le bloc "Utilisateurs". En suivant ce lien vous aurez accès à un formulaire permettant de faire une recherche d'utilisateurs dans votre LDAP. Si vous retrouvez vos utilisateurs c'est que la  connexion est correcte. Une fois que tout est bien configuré, vous  pouvez alors désactiver à nouveau cette option en remettant en  commentaire les 2 dernières lignes du bloc ci-dessus.

Une fois la connexion LDAP configurée n'oubliez pas de revenir à votre configuration CAS comme vu au dessus pour permettre de récupérer les attributs des utilisateurs depuis le LDAP lors de la connexion par CAS.

