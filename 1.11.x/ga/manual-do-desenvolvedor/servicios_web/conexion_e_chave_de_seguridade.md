# Conexión e chave de seguridade

El mecanismo de autenticación de los servicios web es un poco raro, así que dejenos darle un ejemplo de como haríamos para llamar un servicio que cree un usuario en Chamilo desde otra aplicación en PHP... luego explicaremos las distintas partes.

```php
$url = 'https://chamilo.net/main/webservices/';
$soap = new SoapClient($url.'registration.soap.php?wsdl');

// obtiene su propia IP, tal como la ve el servidor de Chamilo (necesaria
// para elaborar la clave de seguridad)
$myIp = file_get_contents($url.'testip.php');

// usa la security_key como definida en main/inc/conf/configuration.php
$key = '23534f3223a3cb234234324208';

// ahora podemos construir la clave que necesitamos
$finalKey = sha1($myIp.$key);

// prepara los detalles para mandar al servicio (en forma de array)
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

// finalmente, llamamos al servicio
$soap->WSCreateUserPasswordCrypted($params);
```

Al inicio, hemos formado una URL para acceder al WSDL. La mayoría de los archivos en main/webservices/ \(casi todos\) pueden ser llamados con un sufijo “?wsdl” para mostrar el WSDL \(la presentación estructurada de las funciones disponibles\). Esto debería ser suficiente para que cualquier cliente SOAP sepa qué funciones están disponibles para una llamada.

Luego hemos buscado una IP como el contenido del script testip.php. Este script está ahí específicamente para ayudarnos a formar la llave secreta: necesitamos mostrar al servidor que sabemos desde qué IP estamos llamando. Usando _file\_get\_contents\(\)_, podemos obtener esta información directamente dentro de una variable.

Luego definimos una clave \($key\)… Esta solamente la podemos obtener a través de un acceso directo al servidor web. Actua como una clave compartida \(“_shared key”_\) entre los dos servidores. Tenemos que abrir el archivo _app/config/configuration.php_, buscar la línea con _$\_configuration\['security\_key'\],_ y luego copiar su valor dentro de nuestro script para formar nuestra clave secreta final. Esta es la que mandaremos al servicio web.

Finalmente, hemos preparado el array _$params_ y llamado el servicio _WSCreateUserPasswordCrypted\(\)_. Este servicio es una versión especial de _WSCreateUser\(\)_ que solo funciona si usamos el mismo método de cifrado de contraseñas de ambos lados \(se tiene que mencionar en el parámetro _encrypt\_method_ que por ahora solo acepta 'md5' y 'sha1'\).

El parámetro _original\_user\_id\_name_ es lo que permite hacer el enlace entre Chamilo y nuestro servicio externo. Basta con darle un nombre constante que represente nuestro sistema y el hecho que se trata de un ID de usuario \(por ejemplo _joomla\_uid_ sería un buen nombre para una conexión con un sistema Joomla, si es que este es el único sistema Joomla con el cual lo conectamos\).Luego podemos darle el valor del ID del usuario en nuestro sistema **externo** dentro del parámetro _original\_user\_id\_value_. Con este par de valores, podrá volver a editar o borrar cualquier usuario anteriormente creado via el servicio web : Chamilo mantendrá una relación entre el mismo y su sistema externo gracias al almacenamiento de estos datos.

La misma lógica funciona con los cursos y las sesiones: mantenemos, **dentro** de la base de datos de Chamilo, el dato del ID externo de esta entidad.

