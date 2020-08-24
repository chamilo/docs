# Sauvegarde par l'interface de Chamilo

Chamilo propose différentes façons de sauvegarder les données. Il est possible de sauvegarder le cours complet \(ou presque\) ou un élément de cours en particulier, mais seulement en tant qu'administrateur ou enseignant.

## Export d'un parcours <a id="export-d-un-parcours"></a>

Pour exporter un parcours, aller dans l'onglet « Mes cours »:

![](../../.gitbook/assets/parcourssauvegarde.png)Illustration 15: Interface - Liste des cours

Ici, on peut voir tous les cours dont on est l'enseignant principal. Pour continuer, il faut cliquer sur l'un d'eux pour entrer dans le cours puis sur « Parcours » :

![](../../.gitbook/assets/image4.png)Illustration 16: Liste des outils de cours

Une fois dans les parcours, il faut cliquer sur l'icône représentant un « CD » pour générer la sauvegarde :

![](../../.gitbook/assets/graficos32.png)Illustration 17: Interface - Export des parcours

Ensuite, il ne reste plus qu'à sauvegarder ce cours dans le dossier désiré sur votre ordinateur \(par défaut « Téléchargement »\).

Cet export se fait au format SCORM 1.2 \(qui définit aussi qu'il doit être compressé sous format de fichier compressé .zip\), que l'on pourra ensuite réutiliser dans Chamilo ou un autre LMS compatible SCORM 1.2 \(c'est-à-dire à peu près n'importe quel autre portail e-learning\).

Veuillez noter que ce format rend l'édition complexe, pour ne pas dire impossible. Il s'agit donc d'une sauvegarde à considérer comme non modifiable dans la plupart des circonstances.

## **S\*\***auvegarde d'un cours\*\* <a id="sauvegarde-d-un-cours"></a>

L'administrateur de la plateforme peut procéder à une sauvegarde pour n'importe quel cours, depuis \(entre autres méthodes\) l'interface d'administration.

1. Allez dans : « Administration » → « Liste des cours » :

![](../../.gitbook/assets/administrationcours.png)Illustration 18: Administration - Bloc cours

1. Ensuite, cliquez sur l'icône « CD » de la colonne de droite au niveau du cours à exporter :

![](../../.gitbook/assets/graficos33.png)Illustration 19: Administration - Liste des cours – Sauvegarde

1. Un choix est possible entre la sauvegarde complète et la sélection \(en fonction de la situation et des besoins\). Pour cet exemple nous choisirons : "Faire une sauvegarde complète de ce cours".

![](../../.gitbook/assets/sauvegardegenerer_-backup.png)Illustration 20: Administration - Paramètres de sauvegarde

1. La sauvegarde est générée. Il ne reste plus qu'à cliquer sur le bouton pour la télécharger sous forme de fichier ZIP.

![](../../.gitbook/assets/sauvegardebackup_-ok.png)Illustration 21: Administration - Sauvegarde, résultat de la sauvegarde

1. Après avoir cliqué sur « Générer sauvegarde », Chamilo crée un fichier de sauvegarde, par défaut, dans son répertoire : « chamilo/app/cache ». Vous pouvez donc l'y récupérer par accès direct, ce qui veut dire que d'autres utilisateurs peuvent y avoir accès également \(à condition de connaître le nom du fichier\). Il est donc important de mettre en place un mécanisme de nettoyage régulier de ce répertoire. Nous proposons un script qui fait cela dans _main/cron_, mais il faudra encore configurer votre serveur pour qu'il exécute ce script de manière automatique et régulière \(quotidiennement, par exemple\).

Il est également possible de générer une sauvegarde du cours par un autre chemin...

En tant qu'administrateur ou enseignant, cliquez sur l'onglet « Mes cours » puis sur l'un des cours disponibles. Ensuite, il est proposé de générer une sauvegarde avec la même méthode expliquée au-dessus en cliquant sur « Maintenance ».

![](../../.gitbook/assets/administrationmaintenance.png)Illustration 22: Interface - Outil d'administration du cours

Une interface légèrement différente est proposée.

![](../../.gitbook/assets/proprietemaintenance.png)Illustration 23: Interface - Options de maintenance de cours

Il est donc possible de générer une sauvegarde comme cela est expliqué ci-dessus. Trois autres options sont encore disponibles :

* **« Copier un cours »** permet de dupliquer tout ou partie d'un cours existant vers une autre partie qui peut être initialement vide. Le seul préalable à cette manipulation est de disposer d'un cours contenant des documents, annonces, forums, ... et d'un second cours ne contenant pas les éléments du premier cours.
* **« Vider ce cours »** : assez explicite, cet outil permet de vider le cours des éléments sélectionnés ou de l'ensemble des éléments qu'il contient. Il supprime les documents, forums, liens...

  → Cette procédure peut être mise en œuvre à la fin d'un cours. Bien entendu, avant de le vider, il est préférable d'effectuer une sauvegarde complète.

* **« Supprimer »** : permet d'éliminer toute trace du cours sur le serveur.

  → Attention en utilisant cet outil, une confirmation est demandée, mais une fois supprimé, il est impossible de récupérer le cours depuis l'interface de Chamilo.

**Remarque** : lorsqu'on ouvre le .zip de sauvegarde, on observera une ressemblance avec les dossiers mis par défaut dans « Documents » à la création des cours.

Pour information, le .zip de l'exemple pèse 9,2 Mo.

Il contient :

* un fichier course\_info.dat
* un dossier "Document"
* une série de dossiers reprenant les documents du cours, non liés aux utilisateurs \(les travaux et autres ressources propres aux utilisateurs ne sont pas sauvegardés\)

Le dossier "Document" est organisé comme représenté dans l'illustration 24, qui reproduit la structure des documents dans l'illustration 25.

![](../../.gitbook/assets/structuredoc.png)Illustration 24: Sauvegarde - Structure des fichiers de sauvegarde

![](../../.gitbook/assets/graficos34.png)Illustration 25: Interface - Liste de documents

Ces dossiers et documents sont les contenus du cours.

De plus, la sauvegarde ne récupérera que les documents \(images, vidéos, etc.\) en correspondance avec le cours.

