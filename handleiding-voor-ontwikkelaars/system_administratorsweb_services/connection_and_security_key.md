# Verbinding en beveiligingssleutel

The authentication mechanism for the webservices is a little weird, so let us first give you an example of how we would go about to call a service that creates a user in Chamilo from another application in PHP... we'll then explain the different parts.

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

At the very beginning, we formed the URL to access the WSDL. Most of the files in main/webservices/ \(if not all\) can be called with a «?wsdl » suffix to show the WSDL \(the structured presentation of the available functions\). This should be enough for any SOAP client to know which functions are available to call.

We then looked for an IP address at testip.php. This script is specifically there to help us form the secret key : we need to show the server we know from what IP we'll be calling. Using file\_get\_contents\(\) gives you that information into a variable.

We then define a key... that's because we can't get it directly from Chamilo through the webserver. We have to open the app/config/configuration.php file and look for _$\_configuration\['security\_key'\],_ then copy its value into our script in order to form the final secret key that we will send to the web service.

Finally, we prepare the _$params_ array and call the _WSCreateUserPasswordCrypted_\(\) \(a special version of _WSCreateUser_\(\) that only works if we use the same crypt method for the password on both sides \(we have to mention it in the _encrypt\_method_ parameter.

The parameter _original\_user\_id\_name_ is what allows us to link between Chamilo and our external service. Just give a constant name that represents your system and the fact that it is a user ID, and give the user ID from **your** system inside the value of _original\_user\_id\_value_. With this value set, you will later be able to edit or delete users you previously created: Chamilo will maintain a relationship between your system and itself thanks to the storing of this information.

