## Administrer les « Utilisateurs » <a name="administrer-les-utilisateurs"></a>

La gestion des utilisateurs se fait par des icônes génériques connues, et d&#039;autres plus spécifiques.

| Icônes | Fonctionnalités |
| --- | --- |
| ![](../assets/images32.png)![](../assets/images31.png) | Modifier le statut de l&#039;utilisateur en cliquant sur l&#039;icône (inactive si panneau interdit) |
| <img width="32px" src="../assets/image17.svg"> | Afficher la liste des cours auxquels l&#039;utilisateur est enregistré |
| <img width="32px" src="../assets/image18.svg"> | _Se connecter en tant que..._ permet à l&#039;administrateur de prendre l&#039;identité d&#039;un utilisateur pour vérifier un problème qu&#039;il rencontre sur la plateforme (ou pour faire une démonstration rapide de la différence entre plusieurs rôles) |
| <img width="32px" src="../assets/image19.svg"> | Assigner des formations à l&#039;utilisateur (enseignant et superviseur) |
| ![](../assets/image20.gif) | Assigner des sessions de formation (enseignant, superviseur et administrateur de session de formation) |
| <img width="32px" src="../assets/image21.svg"> | Donne toutes les informations sur un utilisateur, la liste des sessions, ses formations, ses cours ; possibilité d&#039;accéder au suivi |
| ![](../assets/image22.png) | Assigner des utilisateurs (enseignant et supervision) |
| ![](../assets/graficos21.png)![](../assets/graficos22.png) | Donne le suivi détaillé de l&#039;utilisateur |
| ![](../assets/graficos23.png) | Éditer les paramètres d&#039;un utilisateur |
| <img width="32px" src="../assets/image23.svg"> | Montrer le calendrier « _free/busy »_ de l&#039;utilisateur |
| ![](../assets/graficos24.png) | Supprimer (après demande de confirmation) un utilisateur |
| <img width="32px" src="../assets/image24.svg"><img width="32px" src="../assets/image25.svg"> | Voir d&#039;un coup d&#039;œil si l&#039;utilisateur est administrateur ou pas. Seuls les comptes administrateurs et administrateurs de sessions disposent d&#039;une étoile colorée de jaune. Les autres utilisateurs affichent une étoile grise |

Tableau 1: Administration - Icônes de gestion utilisateurs

### Rôles utilisateurs <a name="r-les-utilisateurs"></a>

Les rôles d&#039;utilisateurs constituent une part fondamentale de la gestion d&#039;un portail Chamilo, et leur bonne compréhension permet d&#039;aller au-delà d&#039;un usage simple vers une gestion académique complète où chacun a sa place et ses responsabilités.

Il apparaîtra à l&#039;administrateur commun que Chamilo dispose de 4 rôles : ceux qui apparaissent directement dans le formulaire de création d&#039;utilisateurs de la page d&#039;administration. Toutefois, certains de ces rôles disposent de sous-rôles dont l&#039;on ne s&#039;aperçoit qu&#039;à l&#039;usage plus poussé de la plateforme.

Afin de nous guider dans la découverte des rôles, nous utiliserons comme référence le schéma suivant, représentant à la fois la plupart des rôles et la notion de sessions (que nous verrons plus loin dans ce guide).

![](../assets/graficos80.png)Rôles et sessions

Dans ce schéma, nous retrouvons l&#039;administrateur principal, l&#039;administrateur de sessions, le coach de session, le coach de cours, le prof, l&#039;apprenant, le responsable des ressources humaines et le supérieur d&#039;apprenant. Sur le schéma, on distingue aussi, sur fond vert, le « triangle doré », une représentation de la relation la plus simple entre cours, professeur et apprenants. Les sessions s&#039;utilisent dans des cas plus complexes, mais nous avons voulu y inclure ce triangle doré pour une question de simplicité de visualisation.

Dans la table ci-dessous, la ligne « Disponibilité » indique « Globale » dans le cas où ce rôle est disponible dans le formulaire de création de l&#039;utilisateur (en y accédant depuis l&#039;interface d&#039;administration), et « Contextuelle » dans le cas où ce rôle dépend de l&#039;appartenance de l&#039;utilisateur à un certain contexte.

Dans la capture suivante, nous mettons en évidence les rôles disponibles de manière « globale », c&#039;est-à-dire à la création d&#039;un nouvel utilisateur par l&#039;administrateur.

![](../assets/image35.png): Rôles disponibles à la création d&#039;un utilisateur

La ligne « Accès » indique où l&#039;on peut trouver l&#039;interface nécessaire à l&#039;attribution de ce rôle.

Révisons ensemble ces rôles, en partant du moins influent et en terminant par l&#039;administrateur global.

#### L&#039;apprenant (ou étudiant) <a name="l-apprenant-ou-tudiant"></a>

| Description | L&#039;apprenant est le rôle typique de celui qui suit un ou plusieurs cours. Il a accès aux contenus des cours auxquels il s&#039;est inscrit (si cela lui était possible) ou auxquels on l&#039;a inscrit. |
| --- | --- |
| Disponibilité | Globale |
| Accès | Formulaire de création dans l&#039;administration |
| Droits dans un cours | De base, il peut : |
| Droits globaux | De base, il peut : |

#### L&#039;assistant de cours <a name="l-assistant-de-cours"></a>

| Description | L&#039;assistant est un rôle étendu d&#039;apprenant. Il s&#039;agit en tous points d&#039;un apprenant, mais l&#039;enseignant peut lui assigner le rôle d&#039;assistant dans un de ses cours via l&#039;édition de l&#039;utilisateur dans l&#039;outil de liste d&#039;utilisateurs du cours (case à cocher « tuteur »). |
| --- | --- |
| Disponibilité | Contextuelle : disponible uniquement au sein d&#039;un cours |
| Accès | Liste d&#039;apprenants dans un cours (icône d&#039;édition) |
| Droits dans un cours | De base, il peut : |
| Droits globaux | De base, il peut : |

#### Le responsable des ressources humaines (ou Supervision) <a name="le-responsable-des-ressources-humaines-ou-supervision"></a>

| Description | Le responsable des ressources humaines est un rôle attribué à la création de l&#039;utilisateur (ou postérieurement au travers de l&#039;écran d&#039;édition de l&#039;utilisateur). C&#039;est un rôle exclusif (il ne peut pas être combiné avec un autre rôle). Le but de ce rôle est de suivre des utilisateurs, cours ou sessions en particulier, comme le ferait un responsable des ressources humaines avec un employé dont il est le responsable. |
| --- | --- |
| Disponibilité | Globale |
| Accès | Formulaire de création dans l&#039;administration |
| Droits dans un cours | Aucun |
| Droits globaux | De base, il peut : |

#### Le tuteur (ou coach) <a name="le-tuteur-ou-coach"></a>

| Description | Le tuteur (ou coach) de cours est un enseignant qui donne un cours sur base d&#039;un contenu générique que d&#039;autres ont préparé, mais sur lequel il peut développer son propre contenu. |
| --- | --- |
| Disponibilité | Contextuelle : Seulement disponible pour les enseignants dans le contexte d&#039;un cours dans une session |
| Accès | Formulaire d&#039;édition de session (administration) |
| Droits dans un cours | De base, il peut : |
| Droits globaux | De base, il peut : |

#### Le tuteur de session (ou coach de session) <a name="le-tuteur-de-session-ou-coach-de-session"></a>

| Description | Le tuteur de session est un enseignant qui a un rôle de coordinateur au sein d&#039;une session. Il communique avec les autres tuteurs de la session et peut naviguer au sein de tous les cours de la session pour y observer les résultats des utilisateurs et prendre de meilleures décisions sur base d&#039;une information plus complète. |
| --- | --- |
| Disponibilité | Contextuelle : Seulement disponible pour les enseignants dans le contexte d&#039;une session. |
| Accès | Formulaire d&#039;édition de session (administration) |
| Droits dans un cours | De base, il peut : |
| Droits globaux | Mêmes droits qu&#039;un tuteur de cours |

#### L&#039;enseignant (ou prof) <a name="l-enseignant-ou-prof"></a>

| Description | L&#039;enseignant (ou prof) est le créateur de cours par excellence. Il crée du contenu au sein d&#039;un cours de base qui pourra servir au sein d&#039;une session (dans le cas d&#039;utilisation d&#039;une session). |
| --- | --- |
| Disponibilité | Globale |
| Accès | Formulaire de création dans l&#039;administration |
| Droits dans un cours | De base, il peut : |
| Droits globaux | De base, il peut : |

#### L&#039;administrateur de session <a name="l-administrateur-de-session"></a>

| Description | L&#039;administrateur de session est un rôle exclusif (il ne peut pas être combiné avec un autre rôle) et est déterminé à la création ou l&#039;édition de l&#039;utilisateur depuis l&#039;interface d&#039;administration. Ce rôle est dédié à la gestion académique des sessions de cours : il détermine qui va dicter quel cours, à quel moment et à quels apprenants. |
| --- | --- |
| Disponibilité | Globale (mais uniquement utile dans le contexte de l&#039;utilisation de sessions) |
| Accès | Formulaire de création dans l&#039;administration |
| Droits dans un cours | Mêmes droits qu&#039;un tuteur de session |
| Droits globaux | De base, il peut : |

#### L&#039;administrateur de portail <a name="l-administrateur-de-portail"></a>

| Description | L&#039;administrateur de portail n&#039;a de sens que si l&#039;on utilise le mode multi-URL (voir Chapitre 5\. Fonctionnalités globales en page 86). Dans ce cas, l&#039;administrateur qui n&#039;est pas autorisé à modifier tous les portails est un administrateur de portail (par opposition à administrateur global). |
| --- | --- |
| Disponibilité | Globale mais uniquement utile dans le contexte de l&#039;utilisation d&#039;un Chamilo en mode multi-URL (ou « multi-portails »). Sinon, il s&#039;agit simplement d&#039;un administrateur global. |
| Accès | Formulaire de création dans l&#039;administration : sélectionner « Enseignant » puis l&#039;option dynamique « Administration », et assigner à un portail spécifique dans l&#039;interface de gestion multi-URL. |
| Droits dans un cours | Tous les droits |
| Droits globaux | De base, il peut : |

#### L&#039;administrateur global <a name="l-administrateur-global"></a>

| Description | L&#039;administrateur global est l&#039;utilisateur tout-puissant. Il peut simplement tout faire. Il a accès à toutes les interfaces. |
| --- | --- |
| Disponibilité | Globale |
| Accès | Formulaire de création dans l&#039;administration : sélectionner « Enseignant » puis l&#039;option dynamique « Administration » |
| Droits dans un cours | De base, il peut tout faire. |
| Droits globaux | De base, il peut tout faire (sur tous les portails, dans le cas d&#039;une utilisation multi-URL, y compris créer d&#039;autres administrateurs). |

#### Le supérieur d&#039;apprenant <a name="le-sup-rieur-d-apprenant"></a>

| Description | Le supérieur d&#039;apprenant est un rôle similaire à celui de responsable des ressources humaines. C&#039;est un rôle exclusif (il ne peut pas être combiné avec un autre rôle), bien qu&#039;il puisse également suivre des cours s&#039;il y est inscrit comme étudiant. Le but de ce rôle est de suivre des utilisateurs, cours ou sessions en particulier, comme le ferait un responsable des ressources humaines avec un employé dont il est le responsable. À la différence de ce dernier, le supérieur d&#039;apprenant, s&#039;il est placé comme coordinateur d&#039;un groupe (social ou classe) d&#039;apprenants, accède à des rapports spécifiques. Enfin, le supérieur d&#039;apprenant possède des droits particuliers en combinaison avec des plugins spécifiques (par exemple celui d&#039;inscription avancée). Dans ce cas, il peut par exemple accepter ou refuser l&#039;inscription d&#039;un apprenant à un cours. |
| --- | --- |
| Disponibilité | Globale |
| Accès | Formulaire de création dans l&#039;administration. Il faudra ensuite assigner cet utilisateur comme supérieur d&#039;un apprenant en éditant cet apprenant depuis la liste d&#039;utilisateurs de l&#039;administration. |
| Droits dans un cours | Aucun |
| Droits globaux | De base, il peut : |

#### Cas particulier: L&#039;utilisateur anonyme <a name="cas-particulier-l-utilisateur-anonyme"></a>

| Description | L&#039;utilisateur anonyme est un cas très particulier : il s&#039;agit d&#039;un utilisateur dont l&#039;existence ne se justifie que par le besoin de concrétiser l&#039;existence (dans la base de données) d&#039;utilisateurs qui n&#039;ont pas de compte utilisateur sur le portail Chamilo. Grâce à ce mécanisme, l&#039;utilisateur « anonyme » peut exécuter la plupart des opérations qu&#039;un apprenant peut exécuter, mais uniquement au sein des cours marqués comme **publics** |
| --- | --- |
| Disponibilité | Globale |
| Accès | Aucune « création » de ce type d&#039;utilisateur. Il est créé lors de la création de la plateforme et ne devrait jamais être supprimé. |
| Droits dans un cours **public** | De base, il peut : |
| Droits globaux | De base, il peut : |

#### L&#039;invité <a name="l-invit"></a>

| Description | L&#039;invité est un utilisateur particulier, dans ce sens qu&#039;il s&#039;agit d&#039;un utilisateur enregistré dans le système (donc qui dispose d&#039;un nom d&#039;utilisateur et d&#039;un mot de passe, à la différence de l&#039;utilisateur anonyme), et dont l&#039;objectif est d&#039;agir comme un apprenant mais sans laisser de trace. On entend par là que les résultats aux tests qu&#039;il passerait éventuellement sur la plateforme ne seront pas enregistrés, de telle sorte qu&#039;il passera relativement inaperçu dans un cours. |
| --- | --- |
| Disponibilité | Globale |
| Accès | Formulaire de création dans l&#039;administration |
| Droits dans un cours **public** | De base, il peut : |
| Droits globaux | De base, il peut : |

### Liste des utilisateurs <a name="liste-des-utilisateurs"></a>

Ici, l&#039;administrateur peut gérer tous les utilisateurs d&#039;un simple clic sur une icône qu&#039;on a vue au-dessus.

![](../assets/graficos25.png)Administration - liste d&#039;utilisateurs

Afin de visualiser la liste d&#039;utilisateurs de forme plus concrète, voici une liste restreinte des rôles et types d&#039;options dont dispose l&#039;administrateur par rapport à chacun de ces rôles.

![](../assets/graficos44.png)Administration - Utilisateurs - Options par rôles

#### Apprenant <a name="apprenant"></a>

| Icône | Usage | Description |
| ---- | ---- | ---- |
| ![](../assets/graficos45.png) | **Actif/Inactif** | un apprenant peut être activé/désactivé à volonté |
| ![](../assets/graficos46.png)![](../assets/graficos47.png) | **Liste des cours** | un apprenant peut être inscrit à plusieurs cours |
| | **Se connecter en tant que...** | activé pour l&#039;apprenant |
| ![](../assets/graficos48.png) | **Statistiques** | l&#039;apprenant est le seul utilisateur dont on peut voir un rapport de suivi |
| ![](../assets/graficos50.png) | **Édition** | le compte de l&#039;apprenant peut être édité par l&#039;administrateur |
| ![](../assets/graficos51.png) | **Administration** | l&#039;apprenant ne peut jamais être administrateur |
| ![](../assets/graficos52.png) | **Calendrier free/busy** | montre la disponibilité de l&#039;apprenant |
| ![](../assets/graficos60.png) | **Suppression** | le compte de l&#039;apprenant peut être supprimé |

#### Enseignant <a name="enseignant"></a>

| Icône | Usage | Description |
| ---- | ---- | ---- |
| ![](../assets/graficos53.png) | **Actif/Inactif** | un enseignant peut être activé/désactivé à volonté |
| ![](../assets/graficos54.png)![](../assets/graficos55.png) | **Liste des cours** | un enseignant peut être inscrit à plusieurs cours |
| | **Se connecter en tant que...** | activé pour l&#039;enseignant |
| ![](../assets/graficos56.png) | **Statistiques** | l&#039;enseignant ne peut être « suivi » qu&#039;au travers du _panneau de contrôle_ |
| ![](../assets/graficos57.png)![](../assets/graficos58.png) | **Édition** | le compte de l&#039;enseignant peut être édité par l&#039;administrateur |
| | **Administration** | l&#039;enseignant qui est administrateur est administrateur avant tout |
| ![](../assets/graficos59.png) | **Calendrier free/busy** | montre la disponibilité de l&#039;enseignant |
| ![](../assets/graficos61.png) | **Suppression** | le compte de l&#039;enseignant peut être supprimé |

#### Administrateur <a name="administrateur"></a>

| Icône | Usage | Description |
| ---- | ---- | ---- |
| ![](../assets/image26.png) | **Actif/Inactif** | un administrateur ne peut pas être désactivé |
| ![](../assets/graficos62.png)![](../assets/graficos63.png) | **Liste des cours** | un administrateur peut être inscrit à plusieurs cours |
| | **Se connecter en tant que...** | désactivé pour l&#039;administrateur |
| ![](../assets/graficos67.png) | **Statistiques** | l&#039;administrateur ne peut être « suivi » qu&#039;au travers du _panneau de contrôle_ |
| ![](../assets/graficos64.png) | **Édition** | le compte de l&#039;administrateur ne peut être édité que par cet administrateur lui-même |
| ![](../assets/graficos65.png) | **Administration** | cet utilisateur est administrateur parce que son étoile est colorée|
| ![](../assets/graficos68.png) | **Suivre des utilisateurs** | seuls les administrateurs peuvent suivre le progrès des utilisateurs (apprenants, enseignants ou administrateurs) au travers du panneau de contrôle |
| ![](../assets/graficos69.png) | **Suivre des cours** | seuls les administrateurs peuvent suivre le progrès de cours au travers du panneau de contrôle |
| ![](../assets/graficos70.png) | **Suivre des sessions** | seuls les administrateurs peuvent suivre le progrès des sessions au travers du panneau de contrôle |
| ![](../assets/graficos66.png) | **Calendrier free/busy** | montre la disponibilité de l&#039;administrateur |

#### Anonyme <a name="anonyme"></a>

L&#039;utilisateur anonyme est un utilisateur particulier, qui ne sert que dans le but de permettre à des utilisateurs non enregistrés sur la plateforme de profiter des cours mis publiquement à leur disposition. Le nombre de possibilités de suivi est donc réduit. Notez que si aucun cours n&#039;est publique, ce compte utilisateur ne sert à rien et pourrait être désactivé (bien que cette fonctionnalité ne soit pas officiellement supportée).

| Icône | Usage | Description |
| ---- | ---- | ---- |
| ![](../assets/graficos71.png) | **Actif/Inactif** | l&#039;utilisateur anonyme peut être activé/désactivé à volonté |
| ![](../assets/graficos72.png)![](../assets/graficos73.png) | **Liste des cours** | l&#039;utilisateur anonyme ne peut être inscrit à aucun cours |
| | **Se connecter en tant que...** | désactivé pour l&#039;utilisateur anonyme |
| ![](../assets/graficos74.png) | **Statistiques** | l&#039;utilisateur anonyme ne permet pas de suivi |
| ![](../assets/graficos75.png)![](../assets/graficos77.png) | **Édition** | l&#039;utilisateur anonyme ne peut pas être édité |
| | **Administration** | l&#039;utilisateur anonyme ne peut jamais être administrateur |
| ![](../assets/graficos76.png) | **Calendrier free/busy** | l&#039;utilisateur anonyme n&#039;a pas vraiment de calendrier _« free/busy »_|
| ![](../assets/graficos78.png) | **Suppression** | le compte de l&#039;utilisateur anonyme ne peut pas être supprimé (pour éviter les incohérences du système) |

En plus de cette gestion, il est possible de supprimer tout ou partie des utilisateurs en cochant la case à gauche de l&#039;utilisateur et en le supprimant en bas,comme dans la gestion des utilisateurs d&#039;un cours pour un formateur.

### Ajouter des utilisateurs <a name="ajouter-des-utilisateurs"></a>

L&#039;administrateur a le pouvoir d&#039;ajouter un utilisateur en le créant de toute pièce. Il lui suffit de renseigner les champs obligatoires:

*   « Prénom »

*   « Nom »

*   « Courriel »

*   « Identifiant »

Cependant, il existe des options avancées auxquelles il faut faire attention.

![](../assets/graficos79.png)Administration - Formulaire de création d&#039;utilisateur

Le mot de passe peut être généré automatiquement ou par l&#039;administrateur. En fonction des besoins, il faut veiller à sélectionner l&#039;option « Envoyer un courriel au nouvel utilisateur ». Depuis la version 1.10, une aide visuelle permet de donner des suggestions sur le mot de passe introduit. Cette aide n&#039;est pas bloquante (il est possible d&#039;insérer un mot de passe peu sûr même si le système le mentionne), mais elle permet en tout cas d&#039;éviter les choix de mots de passe trop simples par ignorance ou mégarde de l&#039;administrateur en charge).

Le profil (ou rôle) de l&#039;utilisateur est très important. Voir le chapitre 4.2.1 Rôles utilisateurs en page 48).

Le compte utilisateur peut avoir une « date d&#039;expiration ». Dans ce cas, il faut choisir la date de début et la date de fin. C&#039;est utile pour les sessions de formation par exemple.

Ensuite, le compte utilisateur peut être créé actif ou inactif, en attendant par exemple le début d&#039;une session de formation.

Trois nouveaux champs ont été ajoutés à partir de Chamilo 1.8.8, du type « Avertir par courriel de la réception... ». Ces trois champs permettent de configurer les avertissements par courriel dans de cas de l&#039;utilisation de l&#039;outil de réseau social. Dans le cas où ces valeurs seraient mises à « Non », l&#039;utilisateur ne recevra aucun message d&#039;avertissement lorsqu&#039;un message lui est envoyé par courriel. Cette option nécessite la configuration d&#039;un processus chronologique (_cron_).

### Exporter la liste des utilisateurs dans un fichier XML/CSV <a name="exporter-la-liste-des-utilisateurs-dans-un-fichier-xml-csv"></a>

Dans Chamilo, il est possible d&#039;exporter tous ou une partie des utilisateurs.

![](../assets/exporterliste_-utilisateurs.png)Administration - Export d&#039;utilisateurs

Il est possible de choisir (depuis la version 1.10) entre trois formats de destination des fichiers de sauvegarde : [XML](http://fr.wikipedia.org/wiki/Extensible_Markup_Language), [CSV](http://fr.wikipedia.org/wiki/Comma-separated_values) ou XLS. La plupart des utilisateurs utiliseront CSV, qui est un format lisible par n’importe quel tableur (ex. : _Microsoft_ _Excel_ ou _LibreOffice_ _Calc_) ou XLS, format propriétaire spécifique à Excel.

Une fois le format choisi, il est conseillé d&#039;« Ajouter la ligne d&#039;en-tête du CSV ». Ensuite, il est possible de choisir le cours voulu pour un export ou bien de le laisser comme tel pour tout exporter puis cliquer sur « Valider ».

Après avoir validé, une fenêtre permettant d&#039;enregistrer le fichier sur son ordinateur personnel apparaîtra.

### Importer une liste d&#039;utilisateurs au format XML/CSV <a name="importer-une-liste-d-utilisateurs-au-format-xml-csv"></a>

Après avoir exporté une liste d&#039;utilisateurs, il est utile de pouvoir l&#039;importer...

Chamilo propose évidemment de réaliser un import d&#039;utilisateurs aux mêmes formats que les exportations. Deux fichiers d&#039;exemple sont disponibles en téléchargement, en cliquant sur le lien (en bleu dans l&#039;illustration suivante). Si vous désirez importer des utilisateurs depuis une source extérieure, l&#039;option CSV est généralement une bonne solution.

Il vous suffit de

*   télécharger le fichier CSV,

*   l&#039;ouvrir dans un tableur en tant que fichier CSV avec le point-virgule comme séparateur de champs

*   adapter votre liste d&#039;utilisateurs au format tableur pour qu&#039;elle corresponde à l&#039;exemple CSV

*   sauvegarder au format CSV

*   envoyer ce fichier sur le serveur via le formulaire Web où se trouvaient les fichiers d&#039;exemple

Pour importer un fichier CSV/XML, il suffit de suivre la procédure suivante.

![](../assets/importerliste_-utilisateurs.png)Administration - Import d&#039;utilisateurs

*   dans « Parcourir... », recherchez le fichier voulu,

*   choisissez le format de fichier,

*   choisissez d&#039;envoyer ou non un courriel de bienvenue aux nouveaux utilisateurs qui seront créés lors de l&#039;import,

*   cliquez sur « Importer »

![](../assets/importerliste_-utilisateurs2.png)Administration - Rapport d&#039;import utilisateurs

Le message d&#039;erreur montre les conflits qui ont pu se produire durant l&#039;import et tous les utilisateurs non importés.

### Éditer utilisateurs par CSV <a name="diter-utilisateurs-par-csv"></a>

Cette option, introduite à partir de la version 1.10, permet d&#039;exécuter uniquement une mise à jour d&#039;utilisateurs existants, sans création ni suppression. Elle fonctionne de manière similaire à l&#039;import et l&#039;export, mais requiert **obligatoirement** un nom d&#039;utilisateur, qui est utilisé comme identifiant unique pour assurer la modification de l&#039;utilisateur voulu.

### Profils <a name="profils"></a>

Cet outil permet d&#039;ajouter des extensions du profil pour tous les utilisateurs. Chaque champ créé via cet outil propose une série d&#039;options :

*   _Visible/Invisible_ permet de décider si le champ doit **apparaître sur la page de profil étendu** de l&#039;utilisateur (de telle sorte qu&#039;il puisse lui-même le voir et peut-être l&#039;éditer)

*   _Modifiable_ permet de décider si le champ en question devrait être **modifiable par l&#039;util****i****sateur** lui-même, ou si l&#039;administrateur assignera la valeur de ce champ pour tous les utilisateurs

*   _Filtre de champ_ permet de déterminer si ce champ doit **servir de filtre** pour les listes d&#039;utilisateurs, et **s&#039;il est exporté** depuis des résultats d&#039;exercices

Typiquement, il est possible de créer des champs dont l&#039;utilisateur n&#039;a pas connaissance mais qui sont utiles administrativement pour les organiser ou pour synchroniser le système avec d&#039;autres systèmes (identificateur unique commun, par exemple). D&#039;autres champs seront soumis à l&#039;utilisateur, comme sa date de naissance, son pays, sa langue natale, etc, qui permettent ensuite d&#039;élaborer des statistiques en fonction des origines, des cultures, des apprentissages antérieurs (niveau d&#039;étude), etc.

Pour les utilisateurs familiers avec Drupal, il s&#039;agit d&#039;un mini-CCK pour Chamilo. À noter que, si cette fonctionnalité était initialement réservée aux utilisateurs, elle est désormais disponible également pour les cours, les sessions et les parcours (ces derniers ne peuvent être gérés que via code PHP pour l&#039;instant), ce qui donne une plus grande flexibilité pour la réalisation de plugins.

![](../assets/profil.png)Administration - Liste des champs utilisateurs

| Icônes | Fonctionnalités |
| --- | --- |
| ![](../assets/graficos26.png)![](../assets/graficos27.png) | Modifier/Supprimer le champ |
| ![](../assets/images54.png)![](../assets/images55.png) | Rendre modifiable / non modifiable ou filtre actif/inactif |
| ![](../assets/images56.png) | Organiser les champ |
| ![](../assets/images57.png)![](../assets/images58.png) | Montrer ou cacher un champ |

Tableau 2: Administration - Icônes de gestion des champs de profil

Les types de champs disponibles sont nombreux, et permettent des validations spécifiques sur les données introduites par les utilisateurs.

![](../assets/image27.png)Types de champs extra

### Classes <a name="classes"></a>

Les classes et groupes sociaux (utiles dans le réseau social) des versions antérieures de Chamilo ont été unifiées, à partir de la version 1.10, en un seul concept de « classe ». Il s&#039;agit en fait des mêmes concepts, à une différence près : le groupe social ajoute la possibilité de se réunir dans un espace réservé au groupe dans le réseau social. Pas la classe.

#### Liste des classes <a name="liste-des-classes"></a>

Dans cette partie, il est possible de modifier ou supprimer des groupes, et d&#039;ajouter des utilisateurs à un groupe grâce aux icônes que nous avons déjà vues.

![](../assets/groupeliste.png)Administration - Liste des classes et groupes sociaux

Si l&#039;administrateur clique sur le lien du nom du groupe, il sera redirigé vers l&#039;onglet « Réseau social » et la page du groupe.

#### Ajouter des classes <a name="ajouter-des-classes"></a>

Chamilo intègre un outil de « Réseau social » qui permet de créer des groupes d&#039;intérêts communs où des utilisateurs pourront discuter entre eux comme sur un forum. L&#039;administrateur peut choisir de créer des groupes ou des classes (groupes aux fins administratives), qui peuvent être soit ouverts (permettre l&#039;auto-inscription de nouveaux membres), soit fermés (autoriser seulement l&#039;administrateur du groupe à inscrire de nouveaux membres).

Au travers des options de configuration, l&#039;administrateur peut également décider de laisser les utilisateurs créer leurs propres groupes d&#039;intérêt. Dans ce cas, les utilisateurs pourront créer des groupes sociaux, mais pas des classes.

![](../assets/groupesajouter.png)Administration - Création de groupes sociaux

La décision de créer un groupe ou une classe se limite à cocher (ou non) la case « Groupe social ».

Un groupe social est toujours une classe (et peut donc être utilisé comme notion de regroupement d&#039;utilisateurs lors de l’inscription des utilisateurs dans un cours ou une session), mais une classe n&#039;est pas toujours un groupe social (elle n&#039;offre pas nécessairement un espace réservé de communication entre ses membres dans le réseau social).

#### Demandes de liens entre utilisateurs <a name="demandes-de-liens-entre-utilisateurs"></a>

Le but est de permettre à un utilisateur de type supervision de demander son rattachement à un apprenant qu'il souhaite surperviser. Cela corresdpondrait à un parents qui s'inscrit sur le portail de l'école et demande à avoir accès aux comptes de ces enfants pour supervision. Il y a de toute façon validation par un administrateur de la plateforme afin d'autoriser la supervision.

Pour activer cette fonctionnalité qui est présente depuis la version 1.11.6, il faut rajouter dans le fichier app/config/configuration.php la ligne suivante :
```
$_configuration['show_link_request_hrm_user'] = true;
```
Une fois l'option activé, les utilisateurs de types Supervision auront un nouveau lien dans le bloc Profil de la page d'accueil indiquant "Liens avec apprenants". En cliquant sur ce lien on ouvre une page pour sélectionner l'apprenant auquel on souhaite être rattaché et on clique sur "Demander le lien avec cet apprenant". On voit en dessous la liste des utilisateurs qui sont déjà rattachés.

![](../assets/AdminUserDemandeLienRH.png)Administration - Demande de liens apprenants

De son côté l'administrateur retrouve dans le bloc utilisateur un lien "Demandes de liens entre utilisateurs" qui ouvre la page de gestion sur laquelle il sélectionne l'utilisateur et en dessous retrouve les demandes à attentes et les apprenants déjà affectés.

![](../assets/AdminUserDemandeLienRHGestion.png)Administration - Demandes de liens entre utilisateurs
