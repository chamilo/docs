## Administrer les « Sessions de formation » 
<a name="administrer-les-sessions-de-formation"></a>

Une session est un dispositif qui se place « par-dessus » un ou plusieurs cours et permet de former des groupes d&#039;apprenants qui pourront suivre les mêmes cours simultanément, dans des _espaces virtuels_ séparés.

Les sessions peuvent regrouper différents cours de différentes catégories.

Le schéma suivant a déjà été utilisé dans la section utilisateurs, mais nous nous intéresserons ici plus au cadre nommé _Session_.

![](../assets/images72.png)Général - Diagramme des sessions

Comme on peut le voir, la session est définie par un administrateur de sessions (ou un administrateur global), et possède un tuteur général de session qui surveille le bon déroulement de celle-ci, dans laquelle se déroulent plusieurs cours dictés par des tuteurs de cours.

Bien que ce ne soit pas visible sur ce schéma, les sessions permettent d&#039;établir des limites temporelles pour les tuteurs et apprenants de cette session.

### Administrer les « Sessions » 
<a name="administrer-les-sessions"></a>

La gestion des sessions se fait avec des icônes connues, et d&#039;autres un peu plus spécifiques.

| Icônes | Fonctionnalités |
| --- | --- |
| ![](../assets/image31.png) | Modifier les paramètres/informations d&#039;une session |
| ![](../assets/image32.png) | Supprimer (après demande de confirmation) une session |
| ![](../assets/images73.png) | Inscrire des utilisateurs à une session |
| ![](../assets/images74.png) | Ajouter des cours à une session |
| ![](../assets/images79.png) | Ajouter une session ou une session à catégorie |

Tableau 1: Administration - Icônes de gestion des sessions

### Ajouter une session 
<a name="ajouter-une-session"></a>

Pour ajouter une session :

*   Administration,

*   Session → « Ajouter une session »,

*   Compléter les champs.

1\. Il faut alors:

*   donner un nom à la session,

*   mettre un « coach » qui aura tous les droits et privilèges pour tous les cours appartenant à la session,

*   donner une catégorie de session,

*   définir s&#039;il y a une limite de temps ou non ; si oui, définir la date de début et de fin,

*   donner ou non un accès au « coach » avant et après la session,

*   définir la visibilité de la session une fois la formation terminée :

    *   lecture seul,

    *   accessible,

    *   non accessible,

*   Étape suivante

![](../assets/sessionajouter.png)Administration - Création de session

Depuis la version 1.10, différentes options sont disponibles pour les dates :

*   Accès par durée

    *   Permet la configuration d&#039;un délai (en nombre de jours) durant lequel l&#039;apprenant aura accès à la session, depuis le moment où il y entre pour la première fois

*   Accès par dates

    *   Permet de définir des dates de début et/ou de fin d&#039;accès fixes durant lesquelles un apprenant aura accès à la session

    *   À partir de la version 1.10, il est possible de configurer 6 dates :

        *   Date de début d&#039;accès (applicable aux apprenants)

        *   Date de fin d&#039;accès (applicable aux apprenants)

        *   Date de début à afficher (simple champ informatif utilisé dans le catalogue)

        *   Date de fin à afficher (simple champ informatif utilisé dans le catalogue)

        *   Date de début d&#039;accès pour les coaches (applicable aux tuteurs)

        *   Date de fin d&#039;accès pour les coaches (applicable aux tuteurs)

2\. L&#039;étape suivante demande d&#039;ajouter des cours dans la session :

Choisissez un (ou plusieurs) cours et cliquez sur la flèche bleue pour l&#039;ajouter (ou l&#039;enlever).

**Inscription unique :** permet de ne pas être envahi par le nombre de cours existant sur la plateforme. Il faut écrire le début du titre du cours dans le champs de recherche et les cours correspondants apparaissent.

![](../assets/session-inscription.png)Administration - Assigner des cours à une session

Suite à une série de difficultés liées à la gestion des cahiers de notes dans les sessions, nous avons ajouté une option pour permettre l&#039;importation dans la session de la structure du cahier de notes tel que défini dans le cours de base. Il suffit, pour cela, de sélectionner l&#039;option (case à cocher) indiquée pour que tous les cours voient leur cahier de note copié dans la session.

3\. La dernière étape permet d&#039;enregistrer les utilisateurs qui utiliseront la session.

Choisissez les utilisateurs et, comme pour les cours, ajoutez-les avec la flèche bleue.

**Inscription unique :** permet de retrouver un seul utilisateur en mettant son nom ou son prénom dans le champs de recherche d&#039;où ressort une liste.

![](../assets/session-inscription2.png)Administration - Assigner des utilisateurs à une session

### Résumé de session 
<a name="r-sum--de-session"></a>

À partir de la page de liste de session, quand on clique sur le nom de la session on arrive sur une page qui permet de voir toutes les informations concernant la session. Les informations générales en premier avec la gestion des annonces programmées en bas, puis la gestion de la liste des cours de la session et enfin les apprenants inscrits à la session.

![](../assets/session-resume.png)Administration - Résumé d'une session

### Annonces programmées

Ce formulaire permet de programmer l'envoi automatique d'annonces aux étudiants qui réalisent le cours dans une session. Il existe deux types d'annonces programmées: l'envoi à une date spécifique: dans ce cas, on sélectionne un jour en particulier pour procéder à l'envoi du mail; et l'envoi sur base des dates de début ou de fin de la session: dans ce cas, il faut indiquer le nombre de jours de différence avec la date de début ou de fin, auquel l'e-mail doit être envoyé. Par exemple: 3 jours avant la fin de la session.

![](../assets/SessionAnnoncesProgrammees.png)Administration - Session - Annonces programmées

### Catégories de sessions ou Périodes 
<a name="cat-gories-de-sessions-ou-p-riodes"></a>

Les catégories de sessions sont à considérer comme n&#039;importe quel type de catégorisation, mais dans de nombreux cas elles permettent d&#039;introduire la notion de période (trimestre, semestre, année) durant laquelle plusieurs sessions se déroulent simultanément.

La gestion des catégories de sessions est fort similaire à la gestion de catégories de cours. Nous ne rentrerons pas dans les détails ici. La seule chose à savoir est que les dates de catégories de sessions sont purement informatives et n&#039;ont aucune influence sur la visibilité des sessions.

### Exporter des sessions 
<a name="exporter-des-sessions"></a>

Chamilo permet d&#039;exporter la liste de tout ou partie des sessions présentes sur la plateforme.

![](../assets/session-import-utilisateurs.png)Administration - Export de sessions

Choisissez le format de l&#039;export, choisissez une session particulière ou toutes les sessions, « Export de de session », puis téléchargez le fichier en cliquant sur le lien.

### Copie d&#039;un cours d&#039;une session à une autre session 
<a name="copie-d-un-cours-d-une-session-une-autre-session"></a>

Étant donnée la possibilité de créer du contenu dans un cours au travers d&#039;une session, contenu qui ne sera visible qu&#039;au sein de cette session, la nécessité peut survenir de récupérer ce contenu propre à une session pour le placer « par dessus » le même cours dans une **autre** session.

C’est exactement ce que fait cet outil.

Pour l&#039;utiliser, il est nécessaire de disposer d&#039;une session d&#039;origine et d&#039;une session de destination dans lesquelles on puisse retrouver le même cours, depuis et vers lequel on désire copier le contenu de la session.

![](../assets/graficos84.png)Copie de sessions, cours vers cours

Une fois ces conditions remplies, il suffit de sélectionner la session d&#039;origine, la session de destination, le cours d&#039;origine, le cours de destination, puis décider si on veut copier tous les contenus de la session ou seulement certaines sections.

Note : cet outil est encore en version beta. Veuillez le traiter avec prudence et bien vérifier que son comportement est valide par rapport à vos attentes.

### Déplacer les résultats utilisateurs dans/vers une session 
<a name="d-placer-les-r-sultats-utilisateurs-dans-vers-une-session"></a>

Dans le cas où vous passeriez d&#039;un mode sans sessions vers un mode avec sessions, vous pourriez (dans certains cas exceptionnels) vouloir récupérer, dans une session, des résultats d&#039;étudiants précédemment enregistrés dans un cours (hors session). Cet outil (toujours instable) a été développé exactement pour ça.

Son interface est complexe mais relativement auto-explicative. Si vous avez un doute, nous vous conseillons d&#039;agir prudemment et de toujours travailler sur base d&#039;un système sauvegardé quelques moments auparavant.

### Filières et promotions 
<a name="fili-res-et-promotions"></a>

La gestion de filières (ou carrières) et de promotions (ou années de sortie) se fait de manière pratiquement identique à la gestion académique classique de toute institution éducative, une fois combinées avec les périodes (ou catégories de sessions).

Voyons ci-dessous de quoi elle est composée :

![](../assets/graficos85.png)Liste de filières et promotions

La première page nous donne une liste des filières (lignes grisées avec titre de carrière en bleu), des promotions de chaque filière (première colonne), des sessions de chacune de ces promotions (seconde colonne) et des cours de chacune de ces sessions.

![](../assets/graficos86.png)

#### Filières 
<a name="fili-res"></a>

Pour ajouter une nouvelle filière, cliquez sur l&#039;icône de classeurs tricolores. La page suivante apparaît.

![](../assets/graficos87.png)Formulaire de création de filière

Seul le nom de la filière est obligatoire. Insérez une nouvelle filière (par exemple, _Médecine_) et sauvegardez.

La liste de filières apparaîtra différemment.

![](../assets/graficos89.png)Liste de filières

Celle liste met en évidence une icône (double feuille blanche) permettant de copier une filière sous forme d&#039;une nouvelle filière. La copie d&#039;une filière copiera également toutes ses promotions (individuellement) ainsi que toutes ses sessions et cours.

Pour mieux comprendre la structure complète, incluant les filières et promotions, aidons-nous du schéma suivant :

![](../assets/graficos90.png)Hiérarchie de cours, sessions et filières

#### Promotions 
<a name="promotions"></a>

La seule différence entre promotions et filières est qu&#039;une promotion peut être rattachée à une filière. La création de promotions est dès lors très simple une fois que vous aurez créé une filière.

![](../assets/graficos88.png)Formulaire de création de promotion

La création de promotions est suivie de l&#039;enregistrement, dans ces promotions, de sessions, en utilisant l&#039;icône de sessions pour chaque promotion, dans la liste des promotions.

On obtient alors une liste similaire à l&#039;illustration suivante (déjà présentée plus haut).

![](../assets/graficos91.png)Liste de filières et promotions

Sur cette page, nous retrouvons, outre la filière _Médecine_ et ses trois promotions, une session dans chaque promotion antérieure à 2015 et la liste de cours de chaque session. Chaque élément est un lien vers la ressource correspondante.

#### Copie 
<a name="copie"></a>

La copies de promotions ou de filières se fait à partir des listes de filières (icône de classeurs tricolores) ou de promotions (icône de feuilles de laurier), en utilisant une icône de double feuille blanche.

#### Cas pratique <a name="cas-pratique"></a>

Imaginons que votre institution dispose de deux filières : médecine et vétérinariat. Ces deux filières durent 5 ans et nous sommes en 2011\. Dès la première année, nous enregistrons donc la promotion 2016 pour médecine (PROMMED2016) et la promotion 2016 pour vétérinariat (PROMVET2016).

Reprenons le schéma de distribution de filières à cours comme référence :

![](../assets/graficos92.png)Structure de filières à cours

Ces deux promotions seront le résultat de 5 années d&#039;études, divisées chacune en 2 semestres de cours. On aura donc 10 **périodes** de 6 mois qui mènent à la promotion en 2016.

Ces périodes sont fixes et peuvent donc être partagées par les deux filières. Dans le système, ce sont des _catégories de sessions_, que l&#039;on nommera respectivement 2011-2 (deuxième semestre de 2011), 2012-1, 2012-2, 2013-1, 2013-2, 2014-1, 2014-2, 2015-1, 2015-2 et 2016-1\. Bien entendu, on peut leur donner d&#039;autres noms selon que cela convient mieux. Les périodes (ou catégories de sessions) sont simplement des classifications basées sur le temps. Rien de plus. Elles ne servent d&#039;ailleurs pour aucun tri en particulier en dehors de l&#039;affichage même de l&#039;écran de périodes.

Au sein de chaque période, vous dicterez des cours. Certains cours sont communs à la filière de médecine et à la filière de vétérinariat, comme le cours de biologie générale (BIOGEN), mais les assistants qui enseignent le cours le font par groupes séparés, selon la filière.

Même si ce cours est donné plusieurs années de suite sans presque aucun changement, il n&#039;empêche que nous ne désirons pas voir les résultats des élèves de l&#039;année dernière s&#039;accumuler dans l&#039;historique du cours. Nous voudrions avoir une vue claire sur l&#039;année de cours actuelle.

Nous mettons donc le cours dans le contexte d&#039;une **session****_._** Cette session d&#039;exemple s&#039;étale sur un semestre et regroupe les étudiants de la promotion 2016 de vétérinariat durant la période 2011-2\. Ces étudiants suivront également les cours de _biologie canine_, d&#039;_éthique médicale_ et de _droit médical_. C&#039;est pourquoi je voudrais réutiliser cette structure de session pour les autres cours.

J&#039;ai donc tous les composants pour établir ma structure complète :

1.  je crée une filière (VET)

2.  je crée une promotion (PROMVET2016)

3.  je crée une période (2011-2)

4.  je crée ou je sélectionne les cours que ce groupe d&#039;étudiants suivra (BIOGEN, BIOCAN, ETHMED, DROMED)

5.  je crée une session qui contient ces cours (VET2011-2-AAA)

6.  j&#039;inscris un tuteur de session, qui s&#039;occupera de la coordination

7.  j&#039;inscris des tuteurs assistants qui se chargeront des travaux pratiques pour ces cours

8.  enfin, j&#039;inscris les étudiants à la session

De cette manière, je permets à mes étudiants d&#039;avoir accès à leurs cours actuels, et également d&#039;avoir accès à un historique des cours antérieurs (selon la configuration de chaque session).

Du côté administratif, je dispose de toute la structure et pourrai répliquer d&#039;un clic toute la hiérarchie d&#039;une promotion l&#039;année prochaine...

### Gérer les champs pour les sessions 
<a name="g-rer-les-champs-pour-les-sessions"></a>

Cette fonctionnalité est similaire à la gestion des champs de profil des apprenants. Bien que les champs additionnels de sessions n&#039;aient pas d&#039;utilité immédiate dans une installation Chamilo de base, ils représentent un atout très puissant pour l&#039;implémentation de nouveaux plugins ou l&#039;utilisation de plugins existants qui étendent les fonctionnalités de sessions.
