# Servidor

## Servidor <a id="servidor"></a>

Para instalar Chamilo, se necesita un servidor web, una base de datos y un cliente [FTP](http://fr.wikipedia.org/wiki/File_Transfer_Protocol) \(o cualquier otro medio, preferiblemente seguro, para subir archivos al servidor, como FTP por ejemplo, para evitar poner en riesgo la seguridad de un futuro servidor de Chamilo\).

La plataforma trabaja con diversos sistemas operativos:

* GNU/Linux, BSD, UNIX
* Windows \(XP, Vista, 7, 8, 10\)
* Mac OS X

Como servidor se recomienda la instalación de un [Wamp](http://es.wikipedia.org/wiki/WAMP) \([Windows](http://es.wikipedia.org/wiki/Microsoft_Windows)\), [Mamp](http://es.wikipedia.org/wiki/MAMP) \(Mac\) o preferiblemente [Lamp](http://es.wikipedia.org/wiki/LAMP) \( [Linux](http://es.wikipedia.org/wiki/Linux)\):

* [Linux](http://es.wikipedia.org/wiki/Linux)\(kernel 3.0 o superior recomendado\) en cualquier distribución \(Debian y Ubuntu recomendadas\)
* [Apache](http://es.wikipedia.org/wiki/Apache_HTTP_Server)\(versión 2.2 o superior\) o Nginx con PHP5-FPM
* [MySQL](http://es.wikipedia.org/wiki/MySQL)\(versión 5.1 o superior\) o MariaDB versiones 5 o 10
* [PHP5](http://es.wikipedia.org/wiki/PHP)\(versión 5.4 o superior, 5.5 o superior recomendadas por eficiencia\)

Durante la creación del sitio y de la base de datos, ya sea en línea o local, el proveedor de hosting debe proporcionar los parámetros que se le pedirán durante la instalación:

* El nombre del servidor FTP,
* El nombre de usuario para este servidor,
* La contraseña para este servidor,
* El nombre del servidor SQL \(si es diferente a la del servidor FTP\),
* El nombre de la base de datos,
* La contraseña de la base de datos.

Bajo GNU/Linux, la mayoría de las distribuciones le permiten configurar fácilmente un servidor LAMP . En este tutorial usaremos como ejemplo la distribución GNU/Linux Ubuntu, version 15.04.

Instalando Apache \(versión 2.2\) :

user@server: sudo apt-get install apache2

Instalando MySQL:

user@server: sudo apt-get install mysql-server

Instalando PHP5 con enlaces para Apache y MySQL:

user@server: sudo apt-get install libapache2-mod-php5 php5-mysqlnd php5-gd php5-curl php5-json php5-intl php5-mcrypt

Durante el proceso de instalación se le pedirá alguna información sobre la configuración de su sistema. Por favor, lea atentamente las instrucciones y actúe cuando sepa lo que está haciendo. Si no está seguro es mejor que deje activados los valores presentados por defecto.

Para quienes deseen utilizar Chamilo en modo local para ejecutar las pruebas o actualizaciones, se recomienda la instalación del módulo _Xdebug_ y la herramienta de desarrollo web de Firefox:

user@server: sudo apt-get install apache2 mysql-server libapache2-mod-php5 php5-mysqlnd php5-gd php5-curl php5-json php5-intl php5-mcrypt php5-xdebug php5-xhprof php5-dev

Tenga en cuenta que el uso de Xdebug puede tener un impacto importante en la eficiencia de su portal, por lo que si lo ha instalado previamente y mueve su instalación a un modo de producción es muy recomendable desactivarlo \(ver la configuración de PHP en php.ini o en su VirtualHost\) .

Finalmente, en un servidor de producción bastante cargado se recomienda el uso de un sistema de gestión de memoria caché de PHP así como la lectura de la guía de optimización  que acompaña a la documentación de su paquete de Chamilo.

Considere el uso de MemCached para almacenar sesiones, pero tenga en cuenta que esto puede conllevar problemas con la pérdida de las sesiones si no se realiza una configuración correcta.

:

