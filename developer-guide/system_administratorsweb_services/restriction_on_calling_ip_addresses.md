# Beschränkung beim Anrufen von IP-Adressen

Andere Skripte folgen möglicherweise nicht diesem, aber mit registration.soap.php können Sie Einschränkungen für die IP-Adressen definieren, die die darin enthaltenen Webservices aufrufen können.

Dies wird durch den folgenden Codeausschnitt innerhalb der WSHelperVerifyKey\(\) -Funktion ermöglicht

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

Wie Sie verstanden haben, müssen Sie eine Datei namens « webservice-auth-ip.conf.php » im selben Ordner wie registration.soap.php erstellen und eine Liste der IP-Adressen \(oder Bereiche\) in die Datei selbst einfügen. Es werden nur die IP-Adressen akzeptiert, die den Bereichen entsprechen.

Bei Verwendung dieser Methode muss der Algorithmus, den wir zuvor zum Erstellen des Sicherheitsschlüssels gesehen haben, geändert werden, da die IP-Adresse nicht mehr benötigt wird:

```text
$finalKey = sha1($key) ;
```

Für Portale, in denen Sicherheit sehr wichtig ist, empfiehlt es sich, diese Methode zu verwenden.