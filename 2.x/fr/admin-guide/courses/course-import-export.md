# Importation et exportation de cours

Chamilo prend en charge l'importation et l'exportation de cours à des fins de sauvegarde, de migration et de partage de contenu.

Ces fonctionnalités se trouvent à l'intérieur du cours, dans l'outil **Maintenance** situé sous l'icône d'engrenage en haut de la page d'accueil du cours.

## Exporter un cours

Les enseignants peuvent exporter leurs propres cours depuis l'outil de maintenance du cours. En tant qu'administrateur, vous pouvez exporter n'importe quel cours :

1. Accédez au cours
2. Accédez à l'outil **Maintenance du cours**
3. Sélectionnez **Créer une sauvegarde**
4. Choisissez ce que vous souhaitez inclure (contenu, données des utilisateurs, etc.)
5. Téléchargez le fichier d'exportation

L'exportation crée un paquet contenant les documents, exercices, forums, parcours d'apprentissage et configurations du cours.

## Importer un cours

Pour importer un cours à partir d'un fichier d'exportation Chamilo :

1. Accédez au cours
2. Accédez à l'outil **Maintenance du cours**
3. Dans la section **Importer une sauvegarde**, téléversez le fichier d'exportation
4. Choisissez ce que vous souhaitez inclure (contenu, données des utilisateurs, etc.)
5. Configurez les options d'importation :
   * S'il faut écraser le contenu existant
   * S'il faut inclure les données des utilisateurs
6. Lancez l'importation

## Copier un cours

Pour copier le contenu d'un autre cours dans votre cours, vous devez d'abord avoir un cours source et un cours de destination créés.

1. Accédez au cours de destination
2. Accédez à l'outil **Maintenance du cours**
3. Dans la section **Copier un cours**, sélectionnez le cours **Source**
4. Validez les options
5. Cliquez sur **Continuer** et suivez les instructions

## Common Cartridge

Chamilo prend en charge la norme **IMS Common Cartridge 1.3** (IMS CC 1.3) pour l'interopérabilité avec d'autres systèmes de gestion de l'apprentissage. Vous pouvez :

* **Importer** des paquets Common Cartridge (fichiers .imscc)
* **Exporter** le contenu du cours au format Common Cartridge

Cela permet l'échange de contenu avec d'autres plateformes prenant en charge la norme Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Recycler un cours

La fonctionnalité de recyclage de cours vous permet simplement de conserver la structure du cours tout en effaçant son contenu.

## Supprimer un cours

Cela supprimera complètement votre cours, y compris tout son contenu et l'activité des utilisateurs associée.

Pour supprimer un cours de manière permanente :

1. Accédez au cours de destination
2. Accédez à l'outil **Maintenance du cours**
3. Dans la section **Supprimer complètement ce cours**, entrez manuellement le code du cours pour confirmer votre intention
4. Validez

Vous serez ensuite redirigé vers la page d'accueil du portail, car le cours n'existe plus.

## Importation depuis Moodle

Chamilo peut importer des sauvegardes de cours depuis **Moodle**. L'importateur convertit la structure de contenu de Moodle au format de Chamilo, y compris les quiz, les documents et les paramètres du cours.

> **Travail en cours.** Bien qu'il couvre déjà une large base, l'importateur Moodle ne prend pas encore en charge tous les types d'activités et formats de contenu de Moodle. Considérez-le comme un point de départ qui peut encore nécessiter des ajustements manuels après la fin de l'importation. Si vous détectez un élément manquant ou défaillant dans l'importation ou l'exportation, veuillez nous le signaler via notre [espace Github](https://github.com/chamilo/chamilo-lms/issues) en cliquant sur **New issue** en haut et en fournissant autant de détails que possible (y compris la sauvegarde du cours elle-même si elle n'est pas confidentielle).

## Conseils

* **Sauvegardes régulières** — Encouragez les enseignants à exporter leurs cours périodiquement comme sauvegarde
* **Tests d'importation** — Lors de l'importation de contenu depuis une autre plateforme, testez d'abord l'importation dans un cours d'essai pour vérifier que tout a été transféré correctement
* **Portabilité du contenu** — Utilisez le format Common Cartridge lorsque vous devez partager du contenu avec d'autres plateformes LMS