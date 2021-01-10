# Verbindungs- und Sicherheitsschlüssel

Der Authentifizierungsmechanismus für die Webservices ist etwas seltsam, also geben wir Ihnen zuerst ein Beispiel dafür, wie wir einen Dienst anrufen würden, der einen Benutzer in Chamilo aus einer anderen Anwendung in PHP erstellt... wir erklären dann die verschiedenen Teile.

```text
$url = 'https://chamilo.net/main/webservices/';
$soap = new SoapClient($url . 'registration.soap.php?wsdl');

// get your own IP as seen by the Chamilo server (helps building the key)
$myIp = file_get_contents($url . 'testip.php') ;

// use the security_key as defined in your app/config/configuration.php
$key = '23534f3223a3cb234234324208';

// now we can build the key we need
$finalKey = sha1($myIp.$key) ;

// prepare the user details
$params = array(
    'secret_key' => $finalKey,
    'firstname' => 'Yannick',
    'lastname' => 'Warnier',
    'status' => 5,
    'loginname' => 'ywarnier',
    'password' => '243fvsdfvs6dfv657dfvs32dfvs34dfv',
    'encrypt_method' => 'sha1',
    'email' => 'y@chamilo.org',
    'language' => 'spanish',
    'phone' => '',
    'expiration_date' => '2015-01-01',
    'original_user_id_name' => 'external_user_id',
    'original_user_id_value' => 34,
    'official_code' => 34,
    'extra' => array()
);

// finally, we can call the service
$soap->WSCreateUserPasswordCrypted($params);
```

Gleich zu Beginn haben wir die URL für den Zugriff auf die WSDL erstellt. Die meisten Dateien in main/webservices/ \(wenn nicht alle\) können mit einem «?wsdl » -Suffix aufgerufen werden, um die WSDL \(die strukturierte Darstellung der verfügbaren Funktionen\) anzuzeigen. Dies sollte ausreichen, damit jeder SOAP-Client weiß, welche Funktionen für Anrufe verfügbar sind.

Wir haben dann bei testip.php nach einer IP-Adresse gesucht. Dieses Skript hilft uns speziell bei der Bildung des geheimen Schlüssels: Wir müssen dem Server zeigen, von dem wir wissen, von welcher IP wir anrufen werden. Die Verwendung von file\_get\_contents\(\) gibt Ihnen diese Informationen in eine Variable.

Wir definieren dann einen Schlüssel... das liegt daran, dass wir ihn nicht direkt von Chamilo über den Webserver beziehen können. Wir müssen die app/config/configuration.php -Datei öffnen und nach _$\_configuration \['security\_key'\] suchen,_  dann seinen Wert in unser Skript kopieren, um den endgültigen geheimen Schlüssel zu bilden, den wir an den Webdienst senden.

Schließlich bereiten wir das Array _$params_ vor und rufen das _WSCreateUserPasswordCrypted_\(\) auf \(eine spezielle Version von _WSCreateUser_\(\), die nur funktioniert, wenn wir die gleiche Kryptenmethode für das Kennwort auf beiden Seiten verwenden \(wir müssen es im Parameter _encrypt\_method_ erwähnen.

Der Parameter _original\_user\_id\_name_ ermöglicht es uns, eine Verbindung zwischen Chamilo und unserem externen Service herzustellen. Geben Sie einfach einen konstanten Namen an, der Ihr System und die Tatsache darstellt, dass es sich um eine Benutzer-ID handelt, und geben Sie die Benutzer-ID von **Ihre**-System innerhalb des Werts von _original\_user\_id\_value_ an. Mit diesem Wertesatz können Sie später Benutzer bearbeiten oder löschen, die Sie zuvor erstellt haben: Chamilo wird dank der Speicherung dieser Informationen eine Beziehung zwischen Ihrem System und sich selbst aufrechterhalten.

