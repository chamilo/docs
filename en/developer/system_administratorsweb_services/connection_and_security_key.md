## Connection and security key {#connection-and-security-key}

The authentication mechanism for the webservices is a little weird, so let us first give you an example of how we would go about to call a service that creates a user in Chamilo from another application in PHP... we&#039;ll then explain the different parts.

$url = &#039;https://chamilo.net/main/webservices/&#039;;$soap = new SoapClient($url . &#039;[registration.soap.php?wsdl](https://cham.net/main/webservices/registration.soap.php?wsdl)&#039;);

// get your own IP as seen by the Chamilo server (helps building the key)$myIp = file_get_contents($url . &#039;testip.php&#039;) ;

// use the security_key as defined in your app/config/configuration.php$key = &#039;23534f3223a3cb234234324208&#039;;

// now we can build the key we need$finalKey = sha1($myIp.$key) ;

// prepare the user details$params = array( &#039;secret_key&#039; =&gt; $finalKey, &#039;firstname&#039; =&gt; &#039;Yannick&#039;, &#039;lastname&#039; =&gt; &#039;Warnier&#039;, &#039;status&#039; =&gt; 5, &#039;loginname&#039; =&gt; &#039;ywarnier&#039;, &#039;password&#039; =&gt; &#039;243fvsdfvs6dfv657dfvs32dfvs34dfv&#039;, &#039;encrypt_method&#039; =&gt; &#039;sha1&#039;, &#039;email&#039; =&gt; &#039;y@chamilo.org&#039;, &#039;language&#039; =&gt; &#039;spanish&#039;, &#039;phone&#039; =&gt; &#039;&#039;, &#039;expiration_date&#039; =&gt; &#039;2015-01-01&#039;, &#039;original_user_id_name&#039; =&gt; &#039;external_user_id&#039;, &#039;original_user_id_value&#039; =&gt; 34, &#039;official_code&#039; =&gt; 34, &#039;extra&#039; =&gt; array(),);

// finally, we can call the service$soap-&gt;WSCreateUserPasswordCrypted($params);

At the very beginning, we formed the URL to access the WSDL. Most of the files in main/webservices/ (if not all) can be called with a «?wsdl » suffix to show the WSDL (the structured presentation of the available functions). This should be enough for any SOAP client to know which functions are available to call.

We then looked for an IP address at testip.php. This script is specifically there to help us form the secret key : we need to show the server we know from what IP we&#039;ll be calling. Using file_get_contents() gives you that information into a variable.

We then define a key... that&#039;s because we can&#039;t get it directly from Chamilo through the webserver. We have to open the app/config/configuration.php file and look for _$_configuration[&#039;security_key&#039;],_ then copy its value into our script in order to form the final secret key that we will send to the web service.

Finally, we prepare the _$params_ array and call the _WSCreateUserPasswordCrypted_() (a special version of _WSCreateUser_() that only works if we use the same crypt method for the password on both sides (we have to mention it in the _encrypt_method_ parameter.

The parameter _original_user_id_name_ is what allows us to link between Chamilo and our external service. Just give a constant name that represents your system and the fact that it is a user ID, and give the user ID from **your** system inside the value of _original_user_id_value_. With this value set, you will later be able to edit or delete users you previously created : Chamilo will maintain a relationship between your system and itself thanks to the storing of this information.