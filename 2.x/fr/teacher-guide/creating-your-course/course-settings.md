# Paramètres du cours

Les paramètres du cours vous permettent de contrôler le comportement de votre cours : qui peut y accéder, comment il apparaît et quelles fonctionnalités sont activées.

Pour accéder aux paramètres du cours, entrez dans votre cours et cliquez sur l'icône **Paramètres** <img src="/.gitbook/assets/icons/mdi-cog.svg" alt="Paramètres" data-size="line"> à côté du bouton **Passer en vue étudiant**.

## Paramètres généraux

### Informations sur le cours

* **Titre du cours** — Le nom affiché de votre cours
* **Langue du cours** — La langue principale de l'interface du cours
* **Catégorie du cours** — La catégorie sous laquelle le cours apparaît dans le catalogue
* **Image du cours** — Téléchargez une miniature qui représente votre cours dans les listes de cours (elle sera redimensionnée en fonction du contexte)

Le code du cours (l'identifiant unique court) est défini lors de la création du cours et n'est pas modifiable depuis cette page.

Par défaut, tous les utilisateurs entrant dans votre cours verront l'ensemble de l'interface Chamilo dans la langue de votre cours. C'est une fonctionnalité immersive. Les administrateurs peuvent modifier ce comportement, mais vous pouvez également le changer avec l'une des premières options : **Afficher le cours dans la langue de l'utilisateur** (défini sur Non par défaut) si vous pensez que cela rend l'expérience trop difficile pour vos utilisateurs.

Les champs département et URL du département sont obsolètes. Ils sont maintenus uniquement pour des raisons de compatibilité avec les anciennes versions.

Si activée, vous pouvez modifier le style à l'intérieur de votre cours avec l'option **Feuilles de style**, en utilisant les feuilles de style existantes sur votre portail. Cette option est souvent désactivée par les administrateurs pour un design global plus intégré.

### Quota de disque

Chaque cours a une limite de stockage (quota de disque) pour les fichiers téléchargés. Le quota est défini par l'administrateur de la plateforme. Vous pouvez voir votre limite actuelle dans les paramètres du cours, et l'utilisation actuelle dans l'outil **Documents**.

> Si vous manquez d'espace, contactez votre administrateur de plateforme pour demander une augmentation de quota, ou supprimez les fichiers inutilisés dans l'outil Documents.

### Visibilité du cours

![Les paramètres de visibilité du cours montrant les options public, ouvert, enregistré et fermé](/.gitbook/assets/course-settings-visibility.png)

Contrôlez qui peut accéder à votre cours :

| Paramètre | Description |
|-----------|-------------|
| **Public** | Tout le monde, y compris les visiteurs anonymes, peut accéder au cours |
| **Ouvert à la plateforme** | Tous les utilisateurs enregistrés sur la plateforme peuvent accéder au cours |
| **Privé — accès accordé par des utilisateurs privilégiés** | Seuls les utilisateurs explicitement inscrits au cours peuvent y accéder |
| **Fermé** | Le cours est verrouillé ; personne ne peut y accéder sauf l'enseignant |

#### Paramètres d'inscription

Selon la configuration de votre plateforme, vous pouvez être en mesure de contrôler :

* **Autoriser l'auto-inscription** — Si les apprenants peuvent s'inscrire eux-mêmes via le catalogue de cours
* **Autoriser l'auto-désinscription** — Si les apprenants peuvent quitter le cours de leur propre initiative
* **Mot de passe d'inscription** — Exiger un mot de passe pour l'auto-inscription (utile pour restreindre l'accès à un groupe spécifique), mais le niveau de sécurité est faible car le même mot de passe d'accès au cours est partagé entre tous les utilisateurs.

### Paramètres des documents

Choisissez d'afficher ou de masquer les dossiers système dans l'outil **Documents** (masqués par défaut, vous n'en avez généralement pas besoin et les afficher pourrait causer des problèmes avec du contenu caché et les apprenants).

### Paramètres de notification par e-mail

Configurez comment l'activité du cours déclenche des notifications :

* **Notifications par e-mail pour le nouveau contenu** — Informer les utilisateurs inscrits lorsque vous ajoutez de nouveaux documents, annonces ou autre contenu

### Paramètres du chat

Contrôlez comment l'outil **Chat** sera affiché.

### Paramètres des parcours d'apprentissage

* **Activer les thèmes de cours** — Permettre aux parcours d'apprentissage de changer d'apparence (non recommandé pour une expérience utilisateur intégrée)
* **Lien de retour du parcours d'apprentissage** — Décidez où les utilisateurs atterrissent lorsqu'ils cliquent sur l'icône **Accueil** dans un parcours d'apprentissage : la liste des parcours d'apprentissage, la page d'accueil du cours, *Mes cours*, *Mes sessions*, ou la page d'accueil du portail

### Paramètres d'avancement thématique

Configurez comment les messages d'avancement thématique apparaîtront sur la page d'accueil du cours.

### Paramètres du forum

Contrôlez le comportement dans l'outil de forum de ce cours.

### Paramètres des travaux

* **Paramètre par défaut pour la visibilité des fichiers nouvellement publiés** — Décidez si les nouveaux documents téléchargés par les apprenants dans l'outil **Devoirs** sont partagés avec tous les autres apprenants (Non par défaut)
* **Autoriser les apprenants à supprimer leurs propres publications** — Permettre aux apprenants de supprimer les travaux qu'ils ont déjà téléchargés (au cas où ils voudraient téléverser une correction).

### Paramètres de lancement automatique

Un cours peut être configuré pour avoir un comportement de lancement automatique, ce qui raccourcira le chemin des apprenants pour accéder aux parties importantes de votre cours. Si activé, les apprenants entrant dans votre cours seront directement envoyés vers l'outil sélectionné et ne verront pas la page d'accueil du cours comme étape intermédiaire. Vous pouvez même sélectionner des parcours d'apprentissage ou des exercices spécifiques à lancer à l'arrivée dans le cours. Dans ce cas, vous devez sélectionner l'option ici, puis aller à la liste des parcours d'apprentissage ou des exercices et cliquer sur l'icône de fusée <img src="/.gitbook/assets/icons/mdi-rocket-launch.svg" alt="Lancement automatique" data-size="line"> sur l'élément sélectionné.

### Paramètres des assistants IA

Cette section n'apparaît que si votre administrateur a activé les outils IA sur la plateforme. Elle vous permet d'affiner la sélection des services d'assistance IA disponibles à travers différents outils de votre plateforme Chamilo. Désactivez-les si vous ne souhaitez pas les utiliser, mais ce serait probablement une mauvaise idée car ces outils sont très puissants.

Ces fonctionnalités sont expliquées dans la section **Outils IA** de ce guide.

### Outils externes (LTI)

Si activé sur votre plateforme, l'intégration d'outils d'apprentissage (Learning Tools Integration) vous permet d'intégrer des activités externes compatibles à ce cours, sous forme d'icônes individuelles sur la page d'accueil du cours. La discussion sur LTI dépasse le cadre de ce guide, mais c'est un système d'intégration puissant pour les enseignants.

### Autres

Des sections ou options supplémentaires peuvent apparaître sur cette page en fonction des options et des versions de Chamilo.
