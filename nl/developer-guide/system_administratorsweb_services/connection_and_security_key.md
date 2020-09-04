# Verbinding en beveiligingssleutel

Het authenticatiemechanisme voor de webservices is een beetje raar, dus laten we u eerst een voorbeeld geven van hoe we een service zouden aanroepen die een gebruiker in Chamilo aanmaakt vanuit een andere applicatie in PHP ... we zullen dan de verschillende onderdelen.

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

Helemaal aan het begin hebben we de URL gevormd om toegang te krijgen tot de WSDL. De meeste bestanden in main/webservices/ \(zo niet alle\) kunnen worden aangeroepen met het achtervoegsel "?wsdl" om de WSDL \(de gestructureerde presentatie van de beschikbare functies\) te tonen. Dit zou voldoende moeten zijn voor elke SOAP-client om te weten welke functies beschikbaar zijn om aan te roepen.

We zochten vervolgens naar een IP-adres op testip.php. Dit script is er specifiek om ons te helpen de geheime sleutel te vormen: we moeten de server laten zien waarvan we weten vanaf welk IP-adres we zullen bellen. Als u file\_get\_contents\(\) gebruikt, krijgt u die informatie in een variabele.

We definiëren dan een sleutel ... dat komt omdat we deze niet rechtstreeks van Chamilo kunnen krijgen via de webserver. We moeten het app/config/configuration.php bestand openen en zoeken naar _$\_configuration\['security\_key'\]_, dan de waarde ervan naar ons script kopiëren om de laatste geheime sleutel te vormen die we zullen sturen naar de webservice.

Ten slotte bereiden we de _$params_ array voor en roepen we de _WSCreateUserPasswordCrypted\(\)_ \(een speciale versie van _WSCreateUser\(\)_ aan die alleen werkt als we dezelfde cryptomethode gebruiken voor het wachtwoord aan beide kanten \(we hebben om het te vermelden in de _encrypt\_method_ parameter\).

De parameter _original\_user\_id\_name_ is wat ons in staat stelt om te linken tussen Chamilo en onze externe service. Geef gewoon een constante naam die uw systeem vertegenwoordigt en het feit dat het een gebruikers-ID is, en geef de gebruikers-ID van **uw** systeem binnen de waarde van _original\_user\_id\_value_. Met deze ingestelde waarde kunt u later gebruikers die u eerder hebt gemaakt, bewerken of verwijderen: Chamilo zal een relatie onderhouden tussen uw systeem en zichzelf dankzij het opslaan van deze informatie.

