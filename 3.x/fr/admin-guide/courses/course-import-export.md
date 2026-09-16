# Import et export de cours

Chamilo prend en charge l'import et l'export de cours à des fins de sauvegarde, de migration et de partage de contenus.

Ces fonctionnalités se trouvent à l'intérieur du cours, dans l'outil **Maintenance** accessible via l'icône d'engrenage en haut de la page d'accueil du cours.

## Exporter un cours

Les enseignants peuvent exporter leurs propres cours depuis l'outil Maintenance du cours. En tant qu'administrateur, vous pouvez exporter n'importe quel cours :

1. Entrez dans le cours
2. Accédez à l'outil **Maintenance du cours**
3. Sélectionnez **Créer une sauvegarde**
4. Choisissez ce qu'il faut inclure (contenu, données utilisateurs, etc.)
5. Téléchargez le fichier d'export

L'export crée un paquet contenant les documents, exercices, forums, parcours d'apprentissage et la configuration du cours.

## Importer un cours

Pour importer un cours à partir d'un fichier d'export Chamilo :

1. Entrez dans le cours
2. Accédez à l'outil **Maintenance du cours**
3. Dans la section **Importer une sauvegarde**, téléversez le fichier d'export
4. Choisissez ce qu'il faut inclure (contenu, données utilisateurs, etc.)
5. Configurez les options d'import :
   * S'il faut écraser le contenu existant
   * S'il faut inclure les données utilisateurs
6. Lancez l'import

## Copier un cours

Pour copier le contenu d'un autre cours dans votre cours, vous devez d'abord disposer d'un cours source et d'un cours de destination.

1. Entrez dans le cours de destination
2. Accédez à l'outil **Maintenance du cours**
3. Dans la section **Copier un cours**, sélectionnez le cours **Source**
4. Validez les options
5. Cliquez sur **Continuer** et suivez les instructions

## Common Cartridge

Chamilo prend en charge la norme **IMS Common Cartridge 1.3** (IMS CC 1.3) pour l'interopérabilité avec d'autres systèmes de gestion de l'apprentissage. Vous pouvez :

* **Importer** des paquets Common Cartridge (fichiers .imscc)
* **Exporter** le contenu du cours au format Common Cartridge

Cela permet l'échange de contenus avec d'autres plateformes qui prennent en charge la norme Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Recycler un cours

La fonctionnalité de recyclage de cours vous permet simplement de conserver l'enveloppe du cours tout en en effaçant le contenu.

## Supprimer un cours

Cette action efface complètement votre cours, y compris tout son contenu et l'activité des utilisateurs.

Pour supprimer un cours de façon permanente :

1. Entrez dans le cours de destination
2. Accédez à l'outil **Maintenance du cours**
3. Dans la section **Supprimer complètement ce cours**, saisissez manuellement le code du cours pour confirmer votre intention
4. Validez

Vous êtes ensuite redirigé vers la page d'accueil du portail, car le cours n'existe plus.

## Import Moodle

Chamilo peut importer des sauvegardes de cours provenant de **Moodle**. L'importateur convertit la structure de contenu de Moodle au format de Chamilo, y compris les quiz, les documents et les paramètres du cours.

> **Travail en cours.** Bien qu'il couvre déjà une base importante, l'importateur Moodle ne prend pas actuellement en charge tous les types d'activités et formats de contenu Moodle. Considérez-le comme un point de départ pouvant encore nécessiter des ajustements manuels une fois l'import terminé. Si vous détectez un élément défaillant ou manquant à l'import ou à l'export, veuillez nous le signaler via notre [espace Github](https://github.com/chamilo/chamilo-lms/issues) en cliquant sur **New issue** en haut et en fournissant autant de détails que possible (y compris la sauvegarde du cours elle-même si elle n'est pas confidentielle).

## Conseils

* **Sauvegardes régulières** — Encouragez les enseignants à exporter périodiquement leurs cours à titre de sauvegarde
* **Tester les imports** — Lors de l'import de contenus provenant d'une autre plateforme, testez d'abord l'import dans un cours d'essai afin de vérifier que tout a bien été transféré
* **Portabilité des contenus** — Utilisez le format Common Cartridge lorsque vous devez partager du contenu avec d'autres plateformes LMS