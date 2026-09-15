# Paramètres de la plateforme

Chamilo dispose d’un système de configuration étendu, avec des paramètres organisés en catégories. L’ensemble des catégories ci-dessous reflète la page **Paramètres de configuration** du panneau d’administration — ainsi que le fichier `SettingsCurrentFixtures.php` du code source, qui constitue la source de vérité pour les noms de variables, les titres et les descriptions.

Accédez aux paramètres de la plateforme depuis le panneau d’administration en cliquant sur **Paramètres de configuration**.

![La page des paramètres de la plateforme affichant les catégories de configuration organisées par domaine fonctionnel](/.gitbook/assets/admin-settings-categories.png)

## Toutes les catégories

Il existe **39 catégories de configuration** au total, listées ci-dessous par ordre alphabétique. Le nombre après chaque lien correspond au nombre de paramètres de cette catégorie.

### À l’échelle de la plateforme

* **[Identité de l’administrateur](admin-settings.md)** (12) — Identité et coordonnées de l’administrateur de la plateforme.
* **[Plateforme](platform-settings.md)** (29) — Identité au niveau de la plateforme, fuseau horaire, politique d’inscription, utilisateurs en ligne, indicateurs de performance.
* **[Affichage](display-settings.md)** (24) — Disposition de la page d’accueil, gravatar, menus, comportement de l’identité visuelle.
* **[Éditeur](editor-settings.md)** (26) — Barres d’outils de l’éditeur de texte enrichi (TinyMCE), plugins, assistants IA.
* **[Langues](language-settings.md)** (12) — Langues disponibles, langue par défaut, replis.
* **[Courrier](mail-settings.md)** (18) — Mise en page du courrier sortant, identité de l’expéditeur, signature.
* **[Flux de travail](workflows-settings.md)** (23) — Interrupteurs de flux de travail transversaux (création de cours, validation des inscriptions…).

### Authentification, sécurité et confidentialité

* **[Sécurité](security-settings.md)** (31) — Protection de la connexion, politique de mot de passe, en-têtes, 2FA, IDS.
* **[Inscription](registration-settings.md)** (20) — Politique d’auto-inscription et redirections après inscription.
* **[Confidentialité](privacy-settings.md)** (6) — Consentement, export de données, demandes de suppression de compte.
* **[CAS](cas-settings.md)** (7) — Configuration CAS héritée, reprise de la version 1.x.

### Cycle de vie des cours et des sessions

* **[Cours](course-settings.md)** (45) — Valeurs par défaut et politiques applicables aux cours à l’échelle de la plateforme.
* **[Sessions](session-settings.md)** (68) — Cycle de vie des sessions, fenêtres d’accès des tuteurs, visibilité.
* **[Catalogue de cours](catalog-settings.md)** (13) — Comportement du catalogue public de cours.
* **[Profil](profile-settings.md)** (29) — Champs affichés sur le profil utilisateur.

### Outils de cours

* **[Agenda](agenda-settings.md)** (11)
* **[Annonces](announcement-settings.md)** (9)
* **[Travaux (Work)](work-settings.md)** (12)
* **[Présence](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documents](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercices (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Glossaire](glossary-settings.md)** (3)
* **[Groupes](group-settings.md)** (3)
* **[Parcours d’apprentissage](lp-settings.md)** (51)
* **[Enquêtes](survey-settings.md)** (12)

### Évaluation et reconnaissance

* **[Carnet de notes (Évaluations)](gradebook-settings.md)** (34) — Affichage des scores, décimales, seuils de certificat.
* **[Certificats](certificate-settings.md)** (9) — Valeurs par défaut appliquées lorsqu’un apprenant obtient un certificat.
* **[Compétences](skill-settings.md)** (13) — Arbre des compétences, règles d’attribution, intégration au profil.
* **[Suivi](tracking-settings.md)** (10) — Ce qui est enregistré, quels rapports sont exposés.

### Communication et communauté

* **[Messagerie](message-settings.md)** (7)
* **[Réseau social](social-settings.md)** (7)

### IA

* **[Assistants IA](ai-helpers-settings.md)** (13) — Fournisseurs par type de tâche (texte, image, vidéo, tuteur, notation).

### Exploitation et intégration

* **[Tâches cron](crons-settings.md)** (3)
* **[Recherche](search-settings.md)** (3) — Configuration de la recherche plein texte Xapian.
* **[Tickets](ticket-settings.md)** (7) — Système de helpdesk.
* **[Services web](webservice-settings.md)** (7) — Points d’accès SOAP/REST hérités.

## Fonctionnement des paramètres

* Les paramètres sont stockés dans la base de données (table `settings`) et gérés via l’interface web
* Certains paramètres sont **verrouillés par URL** dans les installations multi-URL (leur valeur s’applique à toute la plateforme et ne peut pas être surchargée par URL — voir les colonnes `access_url_locked` et `access_url_changeable` de la table `settings`) ; d’autres (la plupart) peuvent être surchargés par URL d’accès
* Les modifications prennent effet immédiatement (aucun redémarrage du serveur n’est requis), bien que votre session utilisateur puisse en conserver certaines en mémoire. Si les modifications ne se reflètent pas immédiatement, déconnectez-vous puis reconnectez-vous pour vider votre session.
* Certains paramètres ont des dépendances — modifier l’un d’eux peut affecter le comportement d’autres
* Les noms de variables affichés sur chaque page (par ex. `2fa_enable`) correspondent à la ligne de la table `settings` de la base de données (colonne `variable`) et aux clés utilisées dans les surcharges (`config/settings_overrides.yaml`) le cas échéant.

Pour plus d’informations, consultez [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) sur notre wiki.

## Conseils

* **Documentez vos paramètres** — Conservez un enregistrement des paramètres non par défaut et des raisons pour lesquelles vous les avez modifiés
* **Ne changez qu’une chose à la fois** — Lors du dépannage, modifiez un seul paramètre à la fois afin de pouvoir identifier l’effet
* **Testez dans un environnement de préproduction** — Pour les modifications de paramètres importantes, testez d’abord sur un serveur de préproduction