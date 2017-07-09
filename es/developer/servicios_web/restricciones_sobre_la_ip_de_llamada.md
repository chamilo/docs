## Restricciones sobre la IP de llamada {#restricciones-sobre-la-ip-de-llamada}

No todos los scripts de servicios web en main/webservices/ lo respetan, pero _registration.soap.php_ permite definir restricciones sobre la dirección IP que puede llamar a los servicios web que contiene (esto no ha sido probado con IPv6 todavía).

Esta funcionalidad es posible gracias al pedazo de código siguiente dentro de la función WSHelperVerifyKey()

// Check if a file that limits access from webservices exists // and contains the restraining check if (is_file(&#039;webservice-auth-ip.conf.php&#039;)) { include &#039;webservice-auth-ip.conf.php&#039;; if ($debug) error_log(&quot;webservice-auth-ip.conf.php file included&quot;);

if (!empty($ws_auth_ip)) { $check_ip = true; $ip_matches = api_check_ip_in_range($ip, $ws_auth_ip); if ($debug) error_log(&quot;ip_matches: $ip_matches&quot;); } }

Como lo habrá entendido, necesita crear un archivo llamado « webservice-auth-ip.conf.php » dentro de la misma carpeta que _registration.soap.php_y añadir una lista de las direcciones IP (o los rangos) dentro del archivo mismo. Solo las direcciones IP que correspondan a los rangos o las IP indicadas serán aceptadas.

Cuando se haga uso de este método, el algoritmo que vimos antes para construir una clave de seguridad deberá ser modificado, ya que dejaremos de necesitar una dirección IP dentro de la clave.

$finalKey = sha1($key) ;

Para los portales en los cuales la seguridad es una preocupación mayor, es una buena idea de usar este método.