# Beperking bij het bellen van IP-adressen

Andere scripts volgen dit misschien niet, maar registration.soap.php stelt u in staat om beperkingen te definiëren voor de IP-adressen die de webservices die het bevat kunnen oproepen.

Dit wordt mogelijk gemaakt door het volgende codefragment in de functie WSHelperVerifyKey\(\)

```text
// Check if a file that limits access from webservices exists
// and contains the restraining check 
if (is_file('webservice-auth-ip.conf.php')) {
    include 'webservice-auth-ip.conf.php';
    if ($debug) {
        error_log("webservice-auth-ip.conf.php file included");
    }

    if (!empty($ws_auth_ip)) {
        $check_ip = true;
        $ip_matches = api_check_ip_in_range($ip, $ws_auth_ip);
        if ($debug) {
            error_log("ip_matches: $ip_matches");
        }
    }
}
```

Zoals u heeft begrepen, moet u een bestand met de naam «webservice-auth-ip.conf.php» maken in dezelfde map als registration.soap.php en een lijst met IP-adressen \(of bereiken\) toevoegen aan de bestand zelf. Alleen die IP-adressen die overeenkomen met het bereik, worden geaccepteerd.

Bij gebruik van deze methode moet het algoritme dat we eerder zagen over het bouwen van de beveiligingssleutel worden aangepast, omdat we het IP-adres niet meer nodig hebben:

```text
$finalKey = sha1($key) ;
```

For portals where security is very important, it is a good idea to use this method.

