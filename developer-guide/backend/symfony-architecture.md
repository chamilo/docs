# Architecture de Symfony

## Bundles

Chamilo 2.0 est structuré en trois bundles Symfony :

### CoreBundle (`src/CoreBundle/`)

Le plus grand bundle, gérant toutes les préoccupations à l'échelle de la plateforme :

- **Utilisateurs et authentification** — Entité Utilisateur, rôles, jetons JWT, fournisseurs OAuth2
- **Système de ressources** — ResourceNode et ResourceFile (l'abstraction unifiée du contenu)
- **Paramètres de la plateforme** — Schémas de paramètres dans `src/CoreBundle/Settings/` couvrant tous les aspects configurables
- **Administration** — Contrôleurs d'administration pour la gestion des utilisateurs, des cours, des sessions et des plugins
- **Fournisseurs d'IA** — Modèle de fabrique pour OpenAI, Gemini, Mistral, DeepSeek, Grok
- **Stockage de fichiers** — Adaptateurs de stockage basés sur Flysystem (local, S3, Azure, GCS)
- **Sécurité** — Voters, contrôle d'accès, hiérarchie des rôles
- **Outils** — Définitions des outils de cours enregistrés via le système d'outils

### CourseBundle (`src/CourseBundle/`)

Tout ce qui est spécifique au contenu des cours :

- **Entités de contenu** — 101 entités pour les documents, exercices, parcours d'apprentissage, forums, glossaires, sondages, présences, blogs, devoirs, et plus encore
- **Copie de cours** — Import/export avec prise en charge des formats Common Cartridge 1.3 et Moodle
- **Paramètres de cours** — Schémas de paramètres au niveau des cours

### LtiBundle (`src/LtiBundle/`)

Implémentation de la norme LTI 1.3 :

- **Enregistrement de plateforme et d'outil** — Gestion des connexions aux outils externes
- **Gestion des lancements** — Contrôleurs de flux de lancement LTI
- **Retour des notes** — Renvoi des notes des outils externes vers Chamilo

## Conteneur de services

Chamilo utilise le conteneur d'injection de dépendances de Symfony. Les services sont configurés dans :

- `config/services.yaml` — Définitions des services globaux
- Le répertoire `DependencyInjection/` de chaque bundle — Services spécifiques aux bundles

## Architecture de sécurité

Le système de sécurité est configuré dans `config/packages/security.yaml` :

- **Hachage des mots de passe** — Prend en charge bcrypt (par défaut), avec migration depuis les anciens SHA1 et MD5
- **Hiérarchie des rôles** — 18 rôles organisés hiérarchiquement (ROLE_GLOBAL_ADMIN > ROLE_ADMIN > ROLE_TEACHER > ROLE_STUDENT > ROLE_USER ; rôles supplémentaires incluant ROLE_HR, ROLE_INVITEE, ROLE_STUDENT_BOSS, ROLE_SESSION_MANAGER, ROLE_QUESTION_MANAGER)
- **Rôles sensibles au contexte** — Rôles au niveau des cours (ROLE_CURRENT_COURSE_TEACHER, ROLE_CURRENT_COURSE_STUDENT) calculés par requête en fonction de l'inscription
- **Pare-feu** — Authentification JWT pour l'API, basée sur session pour l'interface web
- **Voters** — Contrôle d'accès au niveau des ressources via les voters de Symfony

## Code legacy

Certaines fonctionnalités utilisent encore du code PHP legacy dans `public/main/` :

- Rendu et interaction des exercices
- Lecteur de parcours d'apprentissage
- Certains outils d'administration

Ces éléments sont progressivement migrés vers l'architecture Symfony+Vue. Les pages legacy sont servies via une couche de compatibilité qui initialise le noyau Symfony.