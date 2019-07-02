### LDAP {#ldap}

![](../../assets/graficos14.png)This category allows you to configure the synchronization with an LDAP server. It contains a long series of settings which all require a good knowledge of LDAP.

For more information, we invite you to follow LDAP-specific documentation. Note that an ActiveDirectory server can be used as an LDAP server through enabling its LDAP-compatibility mode.

The new LDAP plugin must be configured in main/inc/conf/auth.conf.php through the customization of the following section (the in-line documentation for this plugin is wrong up to Chamilo 1.9.4):

$extldap_config = array(

//base dommain string

&#039;base_dn&#039; =&gt; &#039;DC=cblue,DC=be&#039;,

//admin distinguished name

&#039;admin_dn&#039; =&gt; &#039;CN=admin,dc=cblue,dc=be&#039;,

//admin password

&#039;admin_password&#039; =&gt; &#039;pass&#039;,

//ldap host

&#039;host&#039; =&gt; array(&#039;1.2.3.4&#039;, &#039;2.3.4.5&#039;, &#039;3.4.5.6&#039;),

// filter

// &#039;filter&#039; =&gt; &#039;&#039;, // no () arround the string

//&#039;port&#039; =&gt; , default on 389

//protocl version (2 or 3)

&#039;protocol_version&#039; =&gt; 3,

// set this to 0 to connect to AD server

&#039;referrals&#039; =&gt; 0,

//String used to search the user in ldap. %username will ber replaced by the username.

//See extldap_get_user_search_string() function below

// &#039;user_search&#039; =&gt; &#039;sAMAccountName=%username%&#039;, // no () arround the string

&#039;user_search&#039; =&gt; &#039;uid=%username%&#039;, // no () arround the string

//encoding used in ldap (most common are UTF-8 and ISO-8859-1

&#039;encoding&#039; =&gt; &#039;UTF-8&#039;,

//Set to true if user info have to be update at each login

&#039;update_userinfo&#039; =&gt; true

);