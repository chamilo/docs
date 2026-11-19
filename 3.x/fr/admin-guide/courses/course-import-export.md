# Importation et exportation de cours

Chamilo prend en charge l'importation et l'exportation de cours à des fins de sauvegarde, de migration et de partage de contenu.

Ces fonctionnalités se trouvent à l'intérieur du cours, dans l'outil **Maintenance**, situé sous l'icône d'engrenage en haut de la page d'accueil du cours.

## Exporter un cours

Les enseignants peuvent exporter leurs propres cours depuis l'outil Maintenance du cours. En tant qu'administrateur, vous pouvez exporter n'importe quel cours :

1. Accéder au cours
2. Accéder à l'outil **Maintenance du cours**
3. Sélectionner **Créer une sauvegarde**
4. Choisir ce qu'il faut inclure (contenu, données utilisateur, etc.)
5. Télécharger le fichier d'exportation

L'exportation crée un paquet contenant les documents, les exercices, les forums, les parcours d'apprentissage et la configuration du cours.

## Importer un cours

Pour importer un cours à partir d'un fichier d'exportation Chamilo :

1. Accéder au cours
2. Accéder à l'outil **Maintenance du cours**
3. Dans la section **Importer une sauvegarde**, téléverser le fichier d'exportation
4. Choisir ce qu'il faut inclure (contenu, données utilisateur, etc.)
5. Configurer les options d'importation :
   * Indiquer s'il faut écraser le contenu existant
   * Indiquer s'il faut inclure les données utilisateur
6. Lancer l'importation

## Copier un cours

Pour copier le contenu d'un autre cours dans votre cours, vous devez d'abord disposer d'un cours source et d'un cours de destination.

1. Accéder au cours de destination
2. Accéder à l'outil **Maintenance du cours**
3. Dans la section **Copier le cours**, sélectionner le cours **Source**
4. Valider les options
5. Cliquer sur **Continuer** et suivre les instructions

## Common Cartridge

Chamilo prend en charge la norme **IMS Common Cartridge 1.3** (IMS CC 1.3) pour l'interopérabilité avec d'autres systèmes de gestion de l'apprentissage. Vous pouvez :

* **Importer** des paquets Common Cartridge (fichiers .imscc)
* **Exporter** le contenu du cours au format Common Cartridge

Cela permet d'échanger du contenu avec d'autres plateformes qui prennent en charge la norme Common Cartridge (Moodle, Canvas, Blackboard, etc.).

## Recycler un cours

La fonctionnalité de recyclage du cours vous permet simplement de conserver la coquille du cours tout en effaçant son contenu.

## Supprimer un cours

Cette opération effacera complètement votre cours, y compris l'ensemble de son contenu et l'activité des utilisateurs qu'il contient.

Pour supprimer définitivement un cours :

1. Accéder au cours de destination
2. Accéder à l'outil **Maintenance du cours**
3. Dans la section **Supprimer complètement ce cours**, saisir manuellement le code du cours pour confirmer votre intention
4. Valider

Vous êtes ensuite redirigé vers la page d'accueil du portail, car le cours n'existe plus.

## Importation Moodle

Chamilo peut importer des sauvegardes de cours depuis **Moodle**. L'importateur convertit la structure de contenu de Moodle au format de Chamilo, y compris les quiz, les documents et les paramètres du cours.

> **Travaux en cours.** Bien qu'il couvre déjà un large éventail de cas, l'importateur Moodle ne prend pas actuellement en charge tous les types d'activités et formats de contenu de Moodle. Considérez-le comme un point de départ qui peut encore nécessiter des ajustements manuels une fois l'importation terminée. Si vous détectez un élément défaillant ou manquant lors de l'importation ou de l'exportation, veuillez nous le signaler via notre [espace Github](https://github.com/chamilo/chamilo-lms/issues) en cliquant sur **New issue** en haut et en fournissant autant de détails que possible (y compris la sauvegarde du cours elle-même si elle n'est pas confidentielle).

## Vérification des dépendances de sauvegarde et de restauration des cours (septembre 2026)

Les correctifs récents apportés à la sauvegarde des cours de Chamilo et à l'import/export MBZ compatible Moodle améliorent la restauration des **ressources liées**, et pas seulement la liste des activités. Lors du test d'un aller-retour de sauvegarde, vérifiez à la fois le contenu importé et les liens entre les ressources :

1. **Exercices :** Ouvrez les quiz restaurés et vérifiez que les questions utilisées par le quiz sont présentes et dans l'ordre attendu. Le processus d'export prend désormais en compte les dépendances entre quiz et questions au lieu de supposer que chaque question référencée a été sélectionnée indépendamment ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
2. **Documents et vidéos des parcours d'apprentissage :** Lancez le parcours d'apprentissage restauré et ouvrez ses étapes de type document, HTML et vidéo. Les références aux ressources sont mises en correspondance avec les ressources importées ; un parcours d'apprentissage peut référencer un document qui n'a pas été listé par la sélection ordinaire des documents du cours ([PR #9114](https://github.com/chamilo/chamilo-lms/pull/9114)).
3. **Ordre de l'élément final :** Si le parcours d'apprentissage d'origine comporte un **élément final** terminal (par exemple, une page de clôture contenant des informations sur le certificat), vérifiez qu'il reste **après les étapes ordinaires**. Les archives issues de contenus hérités peuvent encoder l'étape finale avec une position obsolète ; le flux d'export/import normalise cette position ([PR #9121](https://github.com/chamilo/chamilo-lms/pull/9121)).
4. **Références du forum et du carnet de notes :** Ouvrez les discussions et les messages du forum restaurés, puis vérifiez les entrées des **évaluations (Gradebook)** liées aux fils de discussion ou à la participation. Les liens restaurés doivent pointer vers le **fil de destination**, et non vers un identifiant du cours source. Cette amélioration a été apportée à l'importateur de forums MBZ ([PR #9143](https://github.com/chamilo/chamilo-lms/pull/9143)).
5. **Prérequis et images :** Vérifiez les prérequis des parcours d'apprentissage et assurez-vous que les fichiers image s'affichent comme des images plutôt que d'être identifiés à tort comme du HTML. Les correctifs d'import traitent le remappage des identifiants et la classification des documents. Une migration distincte répare certains **cours de démonstration fournis** ; ne supposez pas qu'elle répare automatiquement des cours personnalisés arbitraires ([PR #9137](https://github.com/chamilo/chamilo-lms/pull/9137)).

**Vérification recommandée :** Exportez un cours représentatif, conservez l'archive d'origine, restaurez-la dans un **cours de test distinct**, puis comparez les questions d'exercices, la navigation des parcours d'apprentissage, le comportement des prérequis, les discussions de forum et les ressources du Gradebook liées. N'écrasez pas un cours de production pour tester la portabilité. Les identifiants internes source et destination peuvent légitimement différer ; jugez le résultat d'après la ressource restaurée et ses liens fonctionnels. L'import Moodle ne couvre toujours pas tous les types d'activités : vérifiez donc manuellement les éléments non pris en charge et signalez un cas reproductible de ressource manquante avec une archive de test **assainie**.

## Conseils

* **Sauvegardes régulières** — Encouragez les enseignants à exporter périodiquement leurs cours à titre de sauvegarde
* **Tests d'import** — Lors de l'import de contenu depuis une autre plateforme, testez d'abord l'import dans un cours d'essai afin de vérifier que tout a été transféré correctement
* **Portabilité du contenu** — Utilisez le format Common Cartridge lorsque vous devez partager du contenu avec d'autres plateformes LMS