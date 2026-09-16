# Server

To install Chamilo, you will need a web server, a database server and an [FTP](http://fr.wikipedia.org/wiki/File_Transfer_Protocol) client \(or any other, preferably secure, way to upload files to the server, such as SFTP, to ensure the security of your future Chamilo server\).

The platform works on most operating systems:

* GNU/Linux, BSD, UNIX
* Windows \(XP, Vista, 7\)
* Mac OS X

It is recommended to install a [Wamp](http://fr.wikipedia.org/wiki/WAMP) server \([Windows](http://fr.wikipedia.org/wiki/Microsoft_Windows)\), or the components of a LAMP server \(Linux\). LAMP goes for:

* [Linux](http://fr.wikipedia.org/wiki/Linux)
* [Apache](http://fr.wikipedia.org/wiki/Apache_HTTP_Server)
* [MySQL](http://fr.wikipedia.org/wiki/MySQL)
* [PHP5](http://fr.wikipedia.org/wiki/PHP)

This server must support PHP 5.3 or superior and MySQL 5.1 or superior \(or, alternatively, MariaDB\).

During the site and database creation, be it online or local, the hosting provider must provide the parameters which will be asked during the installation, i.e.:

* the FTP \(or SFTP\) server name,
* the username for this server,
* the password for this server,
* the name of the SQL server \(if different from the FTP server\),
* the name of the database,
* the username and password for this database.

Under GNU/Linux, most distributions \(Debian, RedHat, Suse, CentOS, ...\) allow you to easily configure a LAMP server. In this tutorial, we will use the GNU/Linux Ubuntu distribution, version 12.04 Long Term Support as an example. Although other distributions will work just fine, Chamilo's development team uses Debian or Ubuntu as preferred distribution of GNU/Linux for their security as well as their very stable and intelligent packaging system, which avoid fighting against dependencies when the need to install new packages presents itself.

Installing Apache \(in its version 2\) :

user@server: sudo apt-get install apache2-mpm-prefork

Installing MySQL:

user@server: sudo apt-get install mysql-server

Installing PHP5 with bindings for Apache and MySQL, and other recommended features:

user@server: sudo apt-get install libapache2-mod-php5 php5-mysql php5-pear php5-gd php5-xml php5-intl php5-curl

You could also install all these applications at once using the following command:

user@server: sudo apt-get install apache2-mpm-prefork mysql-server libapache2-mod-php5 php5-mysql php5-pear php5-gd php5-xml php5-intl php5-curl

The installation process will ask you some information about the configuration of your system. Please read the instructions carefully and answer in full judgement capacity. If you don't know, you can probably leave the default values enabled.

For those of you planning to use Chamilo locally to run tests or updates, we recommend the installation of the _Xdebug_ module and the _Web developer_ tool in Firefox. The recommended command for installing a full development/testing environment are:

user@server: sudo apt-get install apache2-mpm-prefork mysql-server libapache2-mod-php5 php5-mysql php5-pear php5-gd php5-xml php5-intl php5-curlphp5-xdebug php5-dev

Be aware that using Xdebug might have very serious consequences on the efficiency of your portal, so it is really recommended, in case you **did** install it, to disable it when moving to production \(see PHP configuration in php.ini, xdebug.ini or in your VirtualHost\).

To measure the weight of the different processes in Chamilo, you can use the XHProf library developed \(mainly\) by Facebook. See BeezNest's blog for more info on how to configure it.

Finally, on fairly-loaded production server, we recommend the use of a PHP cache memory management system like_Xcache, APC or Memcache_ and the quick reading of the optimisation guide embedded into the _documentation_ directory of your Chamilo package. To include the installation of Xcache to the full installation, use this command:

user@server: sudo apt-get install apache2-mpm-prefork mysql-server libapache2-mod-php5 php5-mysql php5-pear php5-gd php5-xml php5-intl php5-curl php5-xdebug php5-dev php5-xcache

Consider using MemCached to store sessions, but be aware this can lead to tricky problems with loss of sessions if not configured properly.

