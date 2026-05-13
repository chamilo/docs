---
# Glossaire

Termes clés utilisés dans l'administration de Chamilo 2.0.

## Concepts de la plateforme

| Terme | Définition |
|------|------------|
| **URL d'accès** | Dans une configuration multi-URL, chaque URL d'accès est un portail virtuel distinct partageant la même installation et base de données Chamilo. Chaque URL peut avoir sa propre identité visuelle, ses utilisateurs, ses cours et ses paramètres. |
| **Cours** | Le conteneur de contenu fondamental dans Chamilo. Un cours contient des matériels d'apprentissage, des exercices, des forums et d'autres outils. Les cours peuvent exister indépendamment ou être assignés à des sessions. |
| **Session** | Une instance limitée dans le temps d'un ou plusieurs cours. Les sessions permettent de diffuser le même contenu de cours à différents groupes d'apprenants avec un suivi séparé et des formateurs indépendants. |
| **Parcours d'apprentissage** | Une séquence structurée d'éléments de contenu (documents, exercices, liens, modules SCORM) qui guide les apprenants à travers le matériel dans un ordre défini. |
| **Carnet de notes** | Un outil d'agrégation qui combine les scores des exercices, des devoirs et d'autres activités en une note finale pondérée pour un cours. |
| **Compétence** | Une compétence ou un badge qui peut être attribué aux apprenants après avoir complété des cours spécifiques, des exercices ou atteint des seuils dans le carnet de notes. |
| **Champ supplémentaire** | Un champ de données personnalisé ajouté par les administrateurs aux utilisateurs, cours ou sessions pour capturer des métadonnées spécifiques à l'organisation. |
| **Plugin** | Une extension qui ajoute des fonctionnalités à Chamilo sans modifier le code principal. Les plugins peuvent ajouter des pages, des outils ou des intégrations. |
| **Catalogue** | Une liste consultable des cours disponibles où les utilisateurs peuvent voir les descriptions et s'inscrire eux-mêmes. |

## Rôles des utilisateurs

| Terme | Définition |
|------|------------|
| **Apprenant (Étudiant)** | Le rôle utilisateur par défaut. Peut s'inscrire à des cours et consommer du contenu. |
| **Enseignant (Formateur)** | Peut créer et gérer des cours, ajouter du contenu et noter les apprenants. |
| **Administrateur de session** | Peut créer et gérer des sessions et des inscriptions. |
| **Gestionnaire des ressources humaines (HRM)** | Peut voir les données de suivi et de rapport pour les utilisateurs assignés. |
| **Administrateur de portail** | Accès complet à toutes les fonctionnalités d'administration de la plateforme. |
| **Administrateur global** | Administrateur de portail avec accès à toutes les URL d'accès dans une configuration multi-URL. |
| **Coach/Tuteur** | Un rôle au niveau de la session. Les coachs de session supervisent tous les cours d'une session ; les coachs de cours gèrent un cours spécifique au sein d'une session. Toutes les références aux coachs devraient être renommées en tuteurs à long terme. |

## Normes et protocoles

| Terme | Définition |
|------|------------|
| **SCORM** | Sharable Content Object Reference Model. Une norme de paquetage e-learning qui permet d'importer et de suivre des cours. Chamilo prend en charge SCORM 1.2 et 2004. |
| **xAPI (Tin Can API)** | Une spécification e-learning pour le suivi des expériences d'apprentissage. Plus large que SCORM, elle peut enregistrer des activités se déroulant en dehors du LMS. Les déclarations xAPI sont stockées dans un Learning Record Store (LRS). |
| **LTI** | Learning Tools Interoperability. Une norme IMS Global qui permet d'intégrer des outils et contenus externes dans un LMS. Chamilo prend en charge LTI 1.1 et 1.3 en tant que consommateur et fournisseur. |
| **SCIM** | System for Cross-domain Identity Management. Une norme pour automatiser la provision et la déprovision des utilisateurs entre les fournisseurs d'identité et les applications. |
| **OAuth2** | Un cadre d'autorisation qui permet à des applications tierces d'accéder à Chamilo au nom d'un utilisateur sans partager de mots de passe. Utilisé pour l'accès API et les intégrations SSO. |
| **LDAP** | Lightweight Directory Access Protocol. Un protocole pour accéder aux services d'annuaire (par exemple, Active Directory) afin d'authentifier les utilisateurs et de synchroniser les données de compte. |
| **CAS** | Central Authentication Service. Un protocole de connexion unique qui permet aux utilisateurs de s'authentifier une fois et d'accéder à plusieurs applications. |
| **JWT** | JSON Web Token. Un format de jeton compact et signé utilisé pour l'authentification API et la gestion de session. |
| **SAML** | Security Assertion Markup Language. Une norme basée sur XML pour échanger des données d'authentification entre un fournisseur d'identité et un fournisseur de services. |

## Termes techniques

| Terme | Définition |
|------|------------|
| **Symfony** | Le framework PHP sur lequel Chamilo 2.0 est construit. Symfony fournit le routage, l'injection de dépendances, l'ORM (Doctrine), le templating (Twig) et d'autres infrastructures. |
| **Doctrine** | L'outil de mappage objet-relationnel (ORM) utilisé par Chamilo pour interagir avec la base de données. Doctrine mappe les objets PHP aux tables de la base de données. |
| **Twig** | Le moteur de template utilisé par Symfony et Chamilo pour le rendu HTML. |
| **Flysystem** | Une couche d'abstraction de système de fichiers PHP. Chamilo utilise Flysystem pour prendre en charge le stockage local, Amazon S3, Azure Blob et Google Cloud Storage de manière interchangeable. |
| **Composer** | Le gestionnaire de dépendances PHP. Utilisé pour installer et mettre à jour les bibliothèques PHP de Chamilo. |
| **Mailer DSN** | Data Source Name pour le transport des e-mails. Une chaîne de connexion qui indique à Symfony comment envoyer des e-mails (par exemple, via SMTP, Amazon SES ou Mailjet). |
| **OPcache** | Le cache d'opcode intégré de PHP. Compile les scripts PHP en bytecode et les met en cache en mémoire, améliorant considérablement les performances. |
| **APCu** | Une extension PHP fournissant un cache en mémoire au niveau utilisateur. Utilisé par Symfony pour mettre en cache les métadonnées et la configuration. |

## Acronymes

| Acronyme | Forme complète |
|---------|-----------|
| **LMS** | Learning Management System (Système de gestion de l'apprentissage) |
| **LRS** | Learning Record Store (Entrepôt de données d'apprentissage pour les déclarations xAPI) |
| **SSO** | Single Sign-On (Authentification unique) |
| **CSV** | Comma-Separated Values (Valeurs séparées par des virgules, utilisé pour les imports d'utilisateurs/cours) |
| **API** | Application Programming Interface (Interface de programmation d'application) |
| **REST** | Representational State Transfer (Style d'architecture API) |
| **GDPR** | General Data Protection Regulation (Règlement général sur la protection des données, loi européenne sur la confidentialité des données) |
| **HSTS** | HTTP Strict Transport Security (Sécurité stricte du transport HTTP) |
| **CDN** | Content Delivery Network (Réseau de distribution de contenu) |
| **DNS** | Domain Name System (Système de noms de domaine) |
| **SPF** | Sender Policy Framework (Cadre de politique d'expéditeur pour l'authentification des e-mails) |
| **DKIM** | DomainKeys Identified Mail (Courrier identifié par clés de domaine pour l'authentification des e-mails) |
| **DMARC** | Domain-based Message Authentication, Reporting, and Conformance (Authentification, rapport et conformité des messages basés sur le domaine) |