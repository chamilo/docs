## Conexión y llave de seguridad {#conexi-n-y-llave-de-seguridad}

El mecanismo de autenticación de los servicios web es un poco raro, así que dejenos darle un ejemplo de como haríamos para llamar un servicio que cree un usuario en Chamilo desde otra aplicación en PHP... luego explicaremos las distintas partes.

$url = &#039;https://chamilo.net/main/webservices/&#039;;$soap = new SoapClient($url . &#039;[registration.soap.php?wsdl](https://cham.net/main/webservices/registration.soap.php?wsdl)&#039;);

// obtiene su propia IP, tal como la ve el servidor de Chamilo (necesaria// para elaborar la clave de seguridad)$myIp = file_get_contents($url . &#039;testip.php&#039;) ;

// usa la security_key como definida en main/inc/conf/configuration.php$key = &#039;23534f3223a3cb234234324208&#039;;

// ahora podemos construir la clave que necesitamos$finalKey = sha1($myIp.$key) ;

// prepara los detalles para mandar al servicio (en forma de array)$params = array( &#039;secret_key&#039; =&gt; $finalKey, &#039;firstname&#039; =&gt; &#039;Yannick&#039;, &#039;lastname&#039; =&gt; &#039;Warnier&#039;, &#039;status&#039; =&gt; 5, &#039;loginname&#039; =&gt; &#039;ywarnier&#039;, &#039;password&#039; =&gt; &#039;243fvsdfvs6dfv657dfvs32dfvs34dfv&#039;, &#039;encrypt_method&#039; =&gt; &#039;sha1&#039;, &#039;email&#039; =&gt; &#039;y@chamilo.org&#039;, &#039;language&#039; =&gt; &#039;spanish&#039;, &#039;phone&#039; =&gt; &#039;&#039;, &#039;expiration_date&#039; =&gt; &#039;2015-01-01&#039;, &#039;original_user_id_name&#039; =&gt; &#039;external_user_id&#039;, &#039;original_user_id_value&#039; =&gt; 34, &#039;official_code&#039; =&gt; 34, &#039;extra&#039; =&gt; array(),);

// finalmente, llamamos al servicio$soap-&gt;WSCreateUserPasswordCrypted($params);

Al inicio, hemos formado una URL para acceder al WSDL. La mayoría de los archivos en main/webservices/ (casi todos) pueden ser llamados con un sufijo “?wsdl” para mostrar el WSDL (la presentación estructurada de las funciones disponibles). Esto debería ser suficiente para que cualquier cliente SOAP sepa qué funciones están disponibles para una llamada.

Luego hemos buscado una IP como el contenido del script testip.php. Este script está ahí específicamente para ayudarnos a formar la llave secreta: necesitamos mostrar al servidor que sabemos desde qué IP estamos llamando. Usando _file_get_contents()_, podemos obtener esta información directamente dentro de una variable.

Luego definimos una clave ($key)… Esta solamente la podemos obtener a través de un acceso directo al servidor web. Actua como una clave compartida (“_shared key”_) entre los dos servidores. Tenemos que abrir el archivo main/inc/conf/configuration.php, buscar la línea con _$_configuration[&#039;security_key&#039;],_ y luego copiar su valor dentro de nuestro script para formar nuestra clave secreta final. Esta es la que mandaremos al servicio web.

Finalmente, hemos preparado el array _$params_y llamado el servicio_WSCreateUserPasswordCrypted_(). Este servicio es una versión especial de_WSCreateUser_() que solo funciona si usamos el mismo método de cifrado de contraseñas de ambos lados (se tiene que mencionar en el parámetro _encrypt_method_que por ahora solo acepta &#039;md5&#039; y &#039;sha1&#039;).

El parámetro _original_user_id_name_es lo que permite hacer el enlace entre Chamilo y nuestro servicio externo. Basta con darle un nombre constante que represente nuestro sistema y el hecho que se trata de un ID de usuario (por ejemplo _joomla_uid_ sería un buen nombre para una conexión con un sistema Joomla, si es que este es el único sistema Joomla con el cual lo conectamos).Luego podemos darle el valor del ID del usuario en nuestro sistema **externo** dentro del parámetro _original_user_id_value_. Con este par de valores, podrá volver a editar o borrar cualquier usuario anteriormente creado via el servicio web : Chamilo mantendrá una relación entre el mismo y su sistema externo gracias al almacenamiento de estos datos.

La misma lógica funciona con los cursos y las sesiones: mantenemos, **dentro** de la base de datos de Chamilo, el dato del ID externo de esta entidad.