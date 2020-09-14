# Serveur

Pour installer Chamilo, vous aurez besoin d'un [serveur](http://fr.wikipedia.org/wiki/Serveur_HTTP) [W](http://fr.wikipedia.org/wiki/Serveur_HTTP)[eb](http://fr.wikipedia.org/wiki/Serveur_HTTP), d'une [base de données](http://fr.wikipedia.org/wiki/Base_de_données) et d'un client [FTP](http://fr.wikipedia.org/wiki/File_Transfer_Protocol) \(ou d'une façon de transférer les fichiers vers le serveur, de préférence sécurisée, comme sFTP par exemple, pour ne pas compromettre la sécurité du futur serveur Chamilo\).

La plateforme fonctionne sur la plupart des systèmes d'exploitation :

* GNU/[Linux](http://fr.wikipedia.org/wiki/Linux), BSD, UNIX
* Windows \(XP, Vista, 7, 8, 10\)
* Mac OS X

Pour les serveurs, il est recommandé d'installer un « serveur » en mode [WA](http://fr.wikipedia.org/wiki/WAMP)[MP](http://fr.wikipedia.org/wiki/WAMP) \([Windows](http://fr.wikipedia.org/wiki/Microsoft_Windows)\) ou [L](http://fr.wikipedia.org/wiki/LAMP)[AMP](http://fr.wikipedia.org/wiki/LAMP):

* Linux \(kernel 3.0 ou supérieur recommandé\), avec n'importe quelle distribution \(nous recommandons cependant Debian ou Ubuntu\)

  [Apache HTTPd](http://fr.wikipedia.org/wiki/Apache_HTTP_Server) \(version 2.2 ou supérieure avec _mod\_PHP_ ou _FPM_\) ou Nginx avec FPM

* [MySQL](http://fr.wikipedia.org/wiki/MySQL) \(version 5.1 ou supérieure\) ou MariaDB en versions 5 ou 10
* [PHP](http://fr.wikipedia.org/wiki/PHP) \(version 5.6 ou supérieur, mais nous recommandons sérieusement 7.2 ou supérieure pour des raisons de performances\)

Lors de la création du site, en ligne ou en local, et de la base SQL, l'hébergeur fournit \(généralement\) des paramètres qui seront nécessaires au cours de l'installation :

* le nom du serveur FTP,
* le login pour ce serveur,
* le mot de passe pour ce serveur,
* le nom du serveur SQL \(s'il est différent du serveur FTP\),
* le nom de la base de données,
* le mot de passe pour cette base.

Sous GNU/Linux, la plupart des distributions permettent facilement de configurer un serveur LAMP. Dans ce tutoriel, la distribution GNU/Linux Ubuntu 15.04 est utilisée comme exemple.

Installation d’Apache HTTPd \(dans sa version 2\) :

user@user: sudo apt-get install apache2

Installation de MySQL :

user@user: sudo apt-get install mysql-server

Installation de PHP pour Apache HTTPd et MySQL :

user@user: sudo apt-get install libapache2-mod-php5 php5-mysqlnd php5-gd php5-curl php5-json php5-intl php5-mcrypt

Notes à propos de l’utilisation de Nginx :

La configuration de Nginx pour son utilisation avec Chamilo est totalement différente de celle d’Apache HTTPd ; D’abord parce que ce premier n’a pas d’intégration avec PHP comme _mod\_PHP_ pour Apache, il faut donc utiliser le système générique CGI pour communiquer avec un interpréteur PHP externe. C’est exactement ce que PHP FPM offre, il s’interface très facilement avec Nginx et il apporte des fonctionnalités supplémentaires intéressantes \(notamment au niveau des performances\).

Ensuite, parce que Nginx ne supporte pas l’interprétation des fichiers _.htaccess_, utilisés intensivement par Chamilo, ce qui fait qu’il faut implémenter la même chose spécifiquement pour Nginx.

Le processus d'installation vous demandera quelques informations au sujet de la configuration de votre système. Lisez attentivement les questions et répondez-y en connaissance de cause. Si vous ne savez pas, vous pouvez généralement appuyer sur la touche « Entrée » pour utiliser l'option par omission et passer à l'étape suivante.

Pour ceux d'entre vous qui souhaitent utiliser Chamilo localement pour effectuer des tests ou des modifications, nous recommandons l'installation de _Xdebug_ et du module de développement de PHP, le tout au travers de la commande :

user@user: sudo apt-get install apache2 mysql-server libapache2-mod-php5 php5-mysqlnd php5-gd php5-curl php5-json php5-intl php5-mcrypt php5-xdebug php5-xhprof php5-dev

Attention, l'utilisation de _Xdebug_ peut avoir de sérieuses répercutions sur l'efficacité de votre portail. Il est donc conseillé, même si vous l'avez initialement installé, de le désactiver si vous passez en production \(voir configuration de PHP dans php.ini ou dans votre VirtualHost\).

Enfin, sur serveur en production à usage intensif, nous recommandons l'utilisation d'un système de mémoire cache de PHP ainsi que la lecture du guide d'optimisation joint dans le répertoire _documentation_ de votre paquet Chamilo.

Vous pouvez également utiliser Memcached pour le stockage de sessions. Nous laissons l'activation de cet élément à votre bon jugement, sachant qu'une mauvaise configuration de ce module peut causer plus de problèmes qu'il n'en résout.

