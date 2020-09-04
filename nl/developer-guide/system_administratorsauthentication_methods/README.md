# Systeembeheerders Verificatiemethoden

![](../../.gitbook/assets/image1.png)

Als algemene vuistregel geldt dat alle configuraties met betrekking tot authenticatiemethoden kunnen worden gevonden in een mix van de instellingen \(in het portaalbeheer of de settings\_current tabel\) en het main/inc/conf/auth.conf.php bestand. 

Om bij te houden wie door wat is geïdentificeerd, houdt Chamilo gewoonlijk de authenticatiebron van de gebruiker bij via het **auth\_source** veld in de **user** tabel. Een gebruiker, die geïdentificeerd is via LDAP, zal «ldap» gebruiken \(indien automatisch gesynchroniseerd\) of «extldap» \(indien voor het eerst geregistreerd bij de eerste keer inloggen) gebruiken.
