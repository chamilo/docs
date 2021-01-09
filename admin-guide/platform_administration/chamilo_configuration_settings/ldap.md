
# LDAP

Die Kategorie ![](../../../.gitbook/assets/graficos14%20%285%29.png)This ermöglicht es Ihnen, die Synchronisierung mit einem LDAP-Server zu konfigurieren. Es enthält eine lange Reihe von Einstellungen, die alle gute LDAP-Kenntnisse erfordern.

Für weitere Informationen laden wir Sie ein, der LDAP-spezifischen Dokumentation zu folgen. Beachten Sie, dass ein ActiveDirectory-Server als LDAP-Server verwendet werden kann, indem er seinen LDAP-Kompatibilitätsmodus aktiviert.

Das neue LDAP-Plugin muss in main/inc/conf/auth.conf.php durch die Anpassung des folgenden Abschnitts konfiguriert werden \(die Inline-Dokumentation für dieses Plugin ist bis Chamilo 1.9.4\ falsch):

$ extldap\_config = Array \(

//base dommain Zeichenfolge

'base\_dn' => 'dc=cBlue, dc=be',

//Admin Distinguished Name

'admin\_dn' => 'cn=Admin, dc=cblue, dc=be',

//admin passwort

'admin\_password' => 'übergeben',

//ldap Host

'host' => array \('1.2.3.4', '2.3.4.5', '3.4.5.6'\),

//Filtern

//'filter' => „,//nein \(\) um die Saite

//'port' =>, Standard auf 389

//protocl version \(2 oder 3\)

'Protokoll\_Version' => 3,

//setze dies auf 0, um eine Verbindung zum AD-Server herzustellen

'Referrals' => 0,

//String, der verwendet wird, um den Benutzer in ldap zu durchsuchen. %username wird durch den Benutzernamen ersetzt.

//Siehe die Funktion extldap\_get\_user\_search\_string \(\) unten

//'user\_search' => 'samAccountName=%userName%',//nein \(\) um den String

'user\_search' => 'uid=%username%',//nein \(\) um den String

//Encoding wird in ldap verwendet \(am häufigsten sind UTF-8 und ISO-8859-1

'codieren' => 'UTF-8',

//Auf „true“ setzen, wenn Benutzerinformationen bei jedem Login aktualisiert werden müssen

'update\_userinfo' => true

\);