# Sauvegarde extérieure à Chamilo

## PhpMyAdmin <a id="phpmyadmin"></a>

Les bases de données peuvent être sauvegardées par l'interface de [P](http://fr.wikipedia.org/wiki/PhpMyAdmin)[hpMyAdmin](http://fr.wikipedia.org/wiki/PhpMyAdmin)\(ou _Adminer\)_ en se connectant grâce à l'identifiant et au mot de passe créés lors de l'installation du serveur [LAMP](http://fr.wikipedia.org/wiki/LAMP) ou de bases de données, ou transmis par l'hébergeur.

![](../../.gitbook/assets/phpaccueuil.png)Illustration 13: Administration - PHPMyAdmin

Une fois dans l'interface graphique de phpMyAdmin, aller à l'onglet _Exporter_ et sélectionner la base de données à sauvegarder.

Il est possible de changer le format d'enregistrement du fichier de sauvegarde de la base de données. Pour sauvegarder, le choix se fait en cliquant sur le format désiré en dessous des bases de données à exporter. Ici, on a choisi le format SQL.

Le nom du fichier sauvegardé peut aussi être changé en bas de la page dans « Transmettre ». Il peut être compressé en choisissant un format parmi ceux proposés. N'oubliez pas de cocher la case « Transmettre », sinon le seul effet de cette opération sera d'afficher la sauvegarde, ce qui ne vous aidera pas vraiment.

Il ne reste plus qu'à enregistrer le fichier. Il sera sauvegardé par défaut dans votre répertoire « Téléchargements » ou sur votre bureau, en fonction de votre navigateur et de sa configuration.

L'enregistrement des bases de données par _phpMyAdmin_ est terminé. Le fichier sauvegardé sera au format SQL \(extension .sql\) et pourra être importé ultérieurement, en cas de problème, via _phpMyAdmin_.

## Dossier racine <a id="dossier-racine"></a>

Le dossier racine \(dans ce contexte\) est le dossier qui contient l'installation de Chamilo. Pour l'exemple de ce tutoriel, il a été installé en local \([http://localhost/chamilo](http://localhost/chamilo)\) et se trouve dans « /var/www/chamilo » \(pour un serveur distant, il faudra utiliser FTP ou SSH/ sFTP\).

Pour le sauvegarder, il faudra compresser le dossier par le biais du terminal en allant dans le répertoire « /var/www » :

user@user:cd /var/www

Ensuite, il faut compresser le dossier en utilisant la commande « tar » pour un tar.gz :

user@user:/var/www$ sudo tar cvf backup\_chamilo chamilo/

Maintenant, déplacez cette sauvegarde à l'endroit voulu. Pour cela, utilisez la commande « mv » :

user@user:/var/www$ sudo mv backup\_chamilo /home/user/Bureau/

Il peut être pratique de lui donner une date visible dans le nom exemple : « 2010-05-07-backup-chamilo ». De cette manière, si vous accumulez plusieurs sauvegardes de la sorte, il vous sera facile de les trier visuellement par date.

![](../../.gitbook/assets/terminalsauvegarde.png)Illustration 14: Terminal - Déplacement des fichiers

Cette sauvegarde contient toutes les informations de connexion à la base de données de Chamilo et toutes ses configurations. Elle est utile en cas d'effacement des données ou d'attaque du serveur. C'est la seule façon fiable de reconstruire votre portail Chamilo tel qu'il était avant que ne survienne un problème quelconque.

Généralement, cette sauvegarde est effectuée automatiquement par un système de planification de tâches \(processus _cron_ sous GNU/Linux\) sur le serveur, mais il peut être utile de la réaliser soi-même manuellement au cas où le serveur ne sauvegarderait pas correctement.

Si vous ne disposez pas d'un accès par terminal, il est possible que vous deviez exécuter la sauvegarde directement via _FTP_. Cette opération \(sans compression\) est **nettement** plus longueet sensible à des problèmes éventuels de connectivité durant le transfert \(générant des pertes de fichiers\).

