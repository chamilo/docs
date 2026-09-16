# Servidor

## Servidor <a id="servidor"></a>

Para instalar Chamilo, se necesita un servidor web, una base de datos y un cliente [FTP](http://fr.wikipedia.org/wiki/File_Transfer_Protocol) \(o cualquier otro medio, preferiblemente seguro, para subir archivos al servidor, como FTP, por ejemplo, para evitar poner en riesgo la seguridad de un futuro servidor de Chamilo\).

Según la configuración de tu hosting o de tu proveedor es posible que ya se encuentre instalado.

Para apoyar a Chamilo LMS contrata servicios con los proveedores oficiales en https://chamilo.org/es/proveedores/

La plataforma trabaja con diversos sistemas operativos:

* GNU/Linux, BSD, UNIX
* Windows \(XP, Vista, 7, 8, 10, 11\)
* Mac OS X

Como servidor se recomienda la instalación de un [Wamp](http://es.wikipedia.org/wiki/WAMP) \([Windows](http://es.wikipedia.org/wiki/Microsoft_Windows)\), [Mamp](http://es.wikipedia.org/wiki/MAMP) \(Mac\) o preferiblemente [Lamp](http://es.wikipedia.org/wiki/LAMP) \( [Linux](http://es.wikipedia.org/wiki/Linux)\):

* [Linux](http://es.wikipedia.org/wiki/Linux)\(kernel 3.0 o superior recomendado\) en cualquier distribución \(Debian y Ubuntu recomendadas\)
* [Apache](http://es.wikipedia.org/wiki/Apache_HTTP_Server)\(versión 2.4 o superior\) o Nginx con PHP7-FPM
* [MySQL](http://es.wikipedia.org/wiki/MySQL)\(versión 5.7 o superior\) o MariaDB versiones 5 o 10
* [PHP7](http://es.wikipedia.org/wiki/PHP)\(versión 7.2 o superior, 7.4 o superior recomendadas por eficiencia\)

Durante la creación del sitio y de la base de datos, ya sea en línea o local, el proveedor de hosting debe proporcionar los parámetros que se le pedirán durante la instalación:

* El nombre del servidor FTP,
* El nombre de usuario para este servidor,
* La contraseña para este servidor,
* El nombre del servidor SQL \(si es diferente a la del servidor FTP\),
* El nombre de la base de datos,
* La contraseña de la base de datos.

Bajo GNU/Linux, la mayoría de las distribuciones le permiten configurar fácilmente un servidor LAMP . En este tutorial usaremos como ejemplo la distribución GNU/Linux Ubuntu, version 15.04.

Nota: En un alojamiento (hosting), servidor dedicado o VPS 

Instalando Apache \(versión 2.4\) :

user@server: sudo apt-get install apache2

Instalando MySQL:

user@server: sudo apt-get install mysql-server

Instalando PHP5 con enlaces para Apache y MySQL:

user@server: sudo apt-get install apache2 mysql-server php libapache2-mod-php  php-gd php-intl php-curl php-json php-intl php-mcrypt php-xdebug php-xhprof php-dev php-mysql php-zip composer

y sudo apt-get install php7.4-mysqlnd (PHP 7.4.x)

o sudo apt-get install php8.0-mysqlnd (PHP 8.0.x)

o sudo apt-get install php8.1-mysqlnd (PHP 8.1.x).

Durante el proceso de instalación se le pedirá alguna información sobre la configuración de su sistema. Por favor, lea atentamente las instrucciones y actúe cuando sepa lo que está haciendo. Si no está seguro es mejor que deje activados los valores presentados por defecto.

Para quienes deseen utilizar Chamilo en modo local para ejecutar las pruebas o actualizaciones, se recomienda la instalación del módulo _Xdebug_ y la herramienta de desarrollo web de Firefox:

user@server: sudo apt-get install apache2 mysql-server libapache2-mod-php5 php5-mysqlnd php5-gd php5-curl php5-json php5-intl php5-mcrypt php5-xdebug php5-xhprof php5-dev

Tenga en cuenta que el uso de Xdebug puede tener un impacto importante en la eficiencia de su portal, por lo que si lo ha instalado previamente y mueve su instalación a un modo de producción es muy recomendable desactivarlo \(ver la configuración de PHP en php.ini o en su VirtualHost\) .

Finalmente, en un servidor de producción bastante cargado se recomienda el uso de un sistema de gestión de memoria caché de PHP así como la lectura de la guía de optimización  que acompaña a la documentación de su paquete de Chamilo.

Considere el uso de MemCached para almacenar sesiones, pero tenga en cuenta que esto puede conllevar problemas con la pérdida de las sesiones si no se realiza una configuración correcta.

Para utilizar las últimas versiones del código de Chamilo LMS:

Rama master - https://github.com/chamilo/chamilo-lms/tree/master
Rama 1.11.x - https://github.com/chamilo/chamilo-lms/tree/1.11.x

