# Glossaire

Termes clés utilisés dans l’administration de Chamilo 3.0.

## Concepts de la plateforme

| Terme | Définition |
|------|------------|
| **Access URL** | Dans une configuration multi-URL, chaque access URL est un portail virtuel distinct partageant la même installation Chamilo et la même base de données. Chaque URL peut disposer de sa propre identité visuelle, de ses utilisateurs, de ses cours et de ses paramètres. |
| **Cours** | Le conteneur de contenu fondamental dans Chamilo. Un cours rassemble les supports d’apprentissage, les exercices, les forums et d’autres outils. Les cours peuvent exister de manière indépendante ou être affectés à des sessions. |
| **Session** | Une instance limitée dans le temps d’un ou plusieurs cours. Les sessions permettent de proposer le même contenu de cours à différents groupes d’apprenants, avec un suivi distinct et des tuteurs indépendants. |
| **Parcours d’apprentissage** | Une séquence structurée d’éléments de contenu (documents, exercices, liens, modules SCORM) qui guide les apprenants à travers le matériel dans un ordre défini. |
| **Carnet de notes** | Un outil d’agrégation qui combine les scores des exercices, des devoirs et d’autres activités en une note finale pondérée pour un cours. |
| **Compétence** | Une compétence ou un badge pouvant être attribué aux apprenants à l’issue de cours spécifiques, d’exercices ou de seuils du carnet de notes. |
| **Champ supplémentaire** | Un champ de données personnalisé ajouté par les administrateurs aux utilisateurs, aux cours ou aux sessions afin de capturer des métadonnées propres à l’organisation. |
| **Plugin** | Une extension qui ajoute des fonctionnalités à Chamilo sans modifier le code cœur. Les plugins peuvent ajouter des pages, des outils ou des intégrations. |
| **Catalogue** | Une liste consultable des cours disponibles, où les utilisateurs peuvent voir les descriptions et s’inscrire eux-mêmes. |

## Rôles utilisateur

| Terme | Définition |
|------|------------|
| **Apprenant (Étudiant)** | Le rôle utilisateur par défaut. Peut s’inscrire aux cours et consulter le contenu. |
| **Enseignant (Formateur)** | Peut créer et gérer des cours, ajouter du contenu et noter les apprenants. |
| **Administrateur de session** | Peut créer et gérer des sessions et des inscriptions. |
| **Responsable des ressources humaines (HRM)** | Peut consulter les données de suivi et de reporting pour les utilisateurs qui lui sont assignés. |
| **Administrateur de portail** | Accès complet à toutes les fonctionnalités d’administration de la plateforme. |
| **Administrateur global** | Administrateur de portail ayant accès à toutes les access URL dans une configuration multi-URL. |
| **Tuteur** | Un rôle au niveau de la session. Les tuteurs de session supervisent tous les cours d’une session ; les tuteurs de cours gèrent un cours spécifique au sein d’une session. Appelé « coach » dans les versions de Chamilo antérieures à 3.0. |

## Normes et protocoles

| Terme | Définition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Une norme de conditionnement e-learning qui permet d’importer et de suivre des cours. Chamilo prend en charge SCORM 1.2 et 2004. |
| **xAPI (Tin Can API)** | Une spécification e-learning pour le suivi des expériences d’apprentissage. Plus large que SCORM, elle peut enregistrer des activités se déroulant en dehors du LMS. Les énoncés xAPI sont stockés dans un Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Une norme IMS Global qui permet d’intégrer des outils et des contenus externes au sein d’un LMS. Chamilo prend en charge LTI 1.1 et 1.3 à la fois comme consommateur et comme fournisseur. |
| **SCIM** | System for Cross-domain Identity Management. Une norme pour automatiser le provisionnement et le déprovisionnement des utilisateurs entre les fournisseurs d’identité et les applications. |
| **OAuth2** | Un cadre d’autorisation qui permet à des applications tierces d’accéder à Chamilo au nom d’un utilisateur sans partager les mots de passe. Utilisé pour l’accès API et les intégrations SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Un protocole d’accès aux services d’annuaire (par ex. Active Directory) pour authentifier les utilisateurs et synchroniser les données de compte. |
| **CAS** | Central Authentication Service. Un protocole d’authentification unique qui permet aux utilisateurs de s’authentifier une seule fois et d’accéder à plusieurs applications. |
| **JWT** | JSON Web Token. Un format de jeton compact et signé utilisé pour l’authentification API et la gestion de session. |
| **SAML** | Security Assertion Markup Language. Une norme basée sur XML pour l’échange de données d’authentification entre un fournisseur d’identité et un fournisseur de services. |

## Termes techniques

| Terme | Définition |
|------|------------|
| **Symfony** | Le framework PHP sur lequel Chamilo 3.0 est construit. Symfony fournit le routage, l'injection de dépendances, l'ORM (Doctrine), le templating (Twig) et d'autres éléments d'infrastructure. |
| **Doctrine** | Le mappeur objet-relationnel (ORM) utilisé par Chamilo pour interagir avec la base de données. Doctrine mappe les objets PHP vers les tables de la base de données. |
| **Twig** | Le moteur de templates utilisé par Symfony et Chamilo pour le rendu HTML. |
| **Flysystem** | Une couche d'abstraction de système de fichiers PHP. Chamilo utilise Flysystem pour prendre en charge de manière interchangeable le stockage local, Amazon S3, Azure Blob et Google Cloud Storage. |
| **Composer** | Le gestionnaire de dépendances PHP. Utilisé pour installer et mettre à jour les bibliothèques PHP de Chamilo. |
| **Mailer DSN** | Data Source Name pour le transport des e-mails. Une chaîne de connexion qui indique à Symfony comment envoyer les e-mails (par ex. via SMTP, Amazon SES ou Mailjet). |
| **OPcache** | Le cache d'opcodes intégré de PHP. Compile les scripts PHP en bytecode et les met en cache en mémoire, améliorant significativement les performances. |
| **APCu** | Une extension PHP fournissant un cache en mémoire au niveau utilisateur. Utilisée par Symfony pour mettre en cache les métadonnées et la configuration. |

## Acronymes

| Acronyme | Forme développée |
|---------|-----------|
| **LMS** | Learning Management System (système de gestion de l'apprentissage) |
| **LRS** | Learning Record Store (pour les énoncés xAPI) |
| **SSO** | Single Sign-On (authentification unique) |
| **CSV** | Comma-Separated Values (utilisé pour les imports d'utilisateurs/cours) |
| **API** | Application Programming Interface |
| **REST** | Representational State Transfer (style d'architecture d'API) |
| **GDPR** | General Data Protection Regulation (règlement européen sur la protection des données) |
| **HSTS** | HTTP Strict Transport Security |
| **CDN** | Content Delivery Network |
| **DNS** | Domain Name System |
| **SPF** | Sender Policy Framework (authentification des e-mails) |
| **DKIM** | DomainKeys Identified Mail (authentification des e-mails) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance |