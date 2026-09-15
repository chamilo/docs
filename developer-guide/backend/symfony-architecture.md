# Architecture Symfony

## Bundles

Chamilo 3.0 est structuré en trois bundles Symfony :

### CoreBundle (`src/CoreBundle/`)

Le plus volumineux des bundles, il gère l’ensemble des préoccupations transverses de la plateforme :

* **Utilisateurs et authentification** — entité User, rôles, jetons JWT, fournisseurs OAuth2
* **Système de ressources** — ResourceNode et ResourceFile (l’abstraction unifiée du contenu)
* **Paramètres de la plateforme** — schémas de paramètres dans `src/CoreBundle/Settings/` couvrant tous les aspects configurables
* **Administration** — contrôleurs d’administration pour la gestion des utilisateurs, des cours, des sessions et des plugins
* **Fournisseurs d’IA** — patron Factory pour OpenAI, Gemini, Mistral, DeepSeek, Grok
* **Stockage de fichiers** — adaptateurs de stockage basés sur Flysystem (local, S3, Azure, GCS)
* **Sécurité** — Voters, contrôle d’accès, hiérarchie des rôles
* **Outils** — définitions des outils de cours enregistrées via le système d’outils

### CourseBundle (`src/CourseBundle/`)

Tout ce qui est spécifique au contenu des cours :

* **Entités de contenu** — 101 entités pour les documents, exercices, parcours d’apprentissage, forums, glossaires, enquêtes, assiduité, blogs, devoirs, et plus encore
* **Copie de cours** — import/export avec prise en charge de Common Cartridge 1.3 et du format Moodle
* **Paramètres de cours** — schémas de paramètres au niveau du cours

### LtiBundle (`src/LtiBundle/`)

Implémentation de la norme LTI 1.3 :

* **Enregistrement de la plateforme et des outils** — gestion des connexions aux outils externes
* **Gestion du lancement** — contrôleurs du flux de lancement LTI
* **Renvoi des notes** — restitution des notes des outils externes vers Chamilo

## Conteneur de services

Chamilo utilise le conteneur d’injection de dépendances de Symfony. Les services sont configurés dans :

* `config/services.yaml` — définitions globales des services
* Le répertoire `DependencyInjection/` de chaque bundle — services propres au bundle

## Architecture de sécurité

Le système de sécurité est configuré dans `config/packages/security.yaml` :

* **Hachage des mots de passe** — prend en charge bcrypt (par défaut), avec migration depuis les SHA1 et MD5 hérités
* **Hiérarchie des rôles** — 18 rôles organisés hiérarchiquement (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER ; rôles supplémentaires : ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
* **Rôles sensibles au contexte** — les rôles au niveau du cours (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) sont calculés à chaque requête en fonction de l’inscription
* **Pare-feu** — authentification JWT pour l’API, basée sur la session pour l’interface web
* **Voters** — contrôle d’accès au niveau des ressources via les voters Symfony

## Code héritage

Certaines fonctionnalités utilisent encore du code PHP héritage dans `public/main/` :

* Rendu et interaction des exercices
* Lecteur de parcours d’apprentissage
* Certains outils d’administration

Ils sont progressivement migrés vers l’architecture Symfony+Vue. Les pages héritage sont servies par une couche de compatibilité qui amorce le noyau Symfony.