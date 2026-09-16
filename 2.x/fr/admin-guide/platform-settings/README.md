# Paramètres de la Plateforme

Chamilo dispose d'un système de configuration étendu avec des paramètres organisés en catégories. L'ensemble complet des catégories ci-dessous reflète la page **Paramètres de configuration** dans le panneau d'administration — ainsi que le fichier sous-jacent `SettingsCurrentFixtures.php` dans le code source, qui constitue la source de vérité pour les noms des variables, les titres et les descriptions.

Accédez aux paramètres de la plateforme depuis le panneau d'administration en cliquant sur **Paramètres de configuration**.

![Page des paramètres de la plateforme affichant les catégories de configuration organisées par domaine fonctionnel](/.gitbook/assets/admin-settings-categories.png)

## Toutes les catégories

Il y a un total de **39 catégories de configuration**, listées par ordre alphabétique ci-dessous. Le nombre après chaque lien indique le nombre de paramètres dans cette catégorie.

### À l'échelle de la plateforme

* **[Identité de l'Administrateur](admin-settings.md)** (12) — Identité et coordonnées de l'administrateur de la plateforme.
* **[Plateforme](platform-settings.md)** (29) — Identité au niveau de la plateforme, fuseau horaire, politique d'inscription, utilisateurs en ligne, indicateurs de performance.
* **[Affichage](display-settings.md)** (24) — Mise en page de la page d'accueil, gravatar, menus, comportement de la marque.
* **[Éditeur](editor-settings.md)** (26) — Barres d'outils de l'éditeur de texte enrichi (TinyMCE), plugins, assistants IA.
* **[Langues](language-settings.md)** (12) — Langues disponibles, langue par défaut, langues de secours.
* **[Courriel](mail-settings.md)** (18) — Mise en page des courriels sortants, identité de l'expéditeur, signature.
* **[Flux de travail](workflows-settings.md)** (23) — Bascules de flux de travail transversaux (création de cours, validation d'inscription…).

### Authentification, sécurité et confidentialité

* **[Sécurité](security-settings.md)** (31) — Protection de la connexion, politique de mot de passe, en-têtes, 2FA, IDS.
* **[Inscription](registration-settings.md)** (20) — Politique d'auto-inscription et redirections après inscription.
* **[Confidentialité](privacy-settings.md)** (6) — Consentement, exportation de données, demandes de suppression de compte.
* **[CAS](cas-settings.md)** (7) — Configuration CAS héritée de la version 1.x.

### Cycle de vie des cours et des sessions

* **[Cours](course-settings.md)** (45) — Paramètres par défaut et politiques applicables aux cours à l'échelle de la plateforme.
* **[Sessions](session-settings.md)** (68) — Cycle de vie des sessions, fenêtres d'accès des formateurs, visibilité.
* **[Catalogue de cours](catalog-settings.md)** (13) — Comportement du catalogue de cours public.
* **[Profil](profile-settings.md)** (29) — Champs apparaissant sur le profil utilisateur.

### Outils de cours

* **[Agenda](agenda-settings.md)** (11)
* **[Annonces](announcement-settings.md)** (9)
* **[Devoirs (Travaux)](work-settings.md)** (12)
* **[Présence](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documents](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Exercices (Tests)](exercise-settings.md)** (63)
* **[Forums](forum-settings.md)** (9)
* **[Glossaire](glossary-settings.md)** (3)
* **[Groupes](group-settings.md)** (3)
* **[Parcours d'apprentissage](lp-settings.md)** (51)
* **[Sondages](survey-settings.md)** (12)

### Évaluation et reconnaissance

* **[Carnet de notes (Évaluations)](gradebook-settings.md)** (34) — Affichage des scores, décimales, seuils pour les certificats.
* **[Certificats](certificate-settings.md)** (9) — Paramètres par défaut appliqués lorsqu'un apprenant obtient un certificat.
* **[Compétences](skill-settings.md)** (13) — Arborescence des compétences, règles d'attribution, intégration au profil.
* **[Suivi](tracking-settings.md)** (10) — Ce qui est enregistré, quels rapports sont exposés.

### Communication et communauté

* **[Messagerie](message-settings.md)** (7)
* **[Réseau social](social-settings.md)** (7)

### IA

* **[Assistants IA](ai-helpers-settings.md)** (13) — Fournisseurs par type de tâche (texte, image, vidéo, tuteur, notation).

### Opérations et intégration

* **[Tâches planifiées (Cron Jobs)](crons-settings.md)** (3)
* **[Recherche](search-settings.md)** (3) — Configuration de la recherche en texte intégral Xapian.
* **[Tickets](ticket-settings.md)** (7) — Système de support technique.
* **[Services web](webservice-settings.md)** (7) — Points de terminaison SOAP/REST hérités.

## Fonctionnement des paramètres

* Les paramètres sont stockés dans la base de données (table `settings`) et gérés via l'interface web.
* Certains paramètres sont **verrouillés par URL** dans les configurations multi-URL (leur valeur s'applique à l'ensemble de la plateforme et ne peut pas être remplacée par URL - voir les colonnes `access_url_locked` et `access_url_changeable` dans la table `settings`) ; d'autres (la majorité) peuvent être remplacés par URL d'accès.
* Les modifications prennent effet immédiatement (aucun redémarrage du serveur n'est requis), bien que votre session utilisateur puisse conserver certaines d'entre elles en mémoire. Si les modifications ne se reflètent pas immédiatement, déconnectez-vous et reconnectez-vous pour vider votre session.
* Certains paramètres ont des dépendances — modifier l'un peut affecter le comportement des autres.
* Les noms de variables affichés sur chaque page (par exemple `2fa_enable`) correspondent à la ligne dans la table de base de données `settings` (colonne `variable`) et aux clés utilisées dans les surcharges (`config/settings_overrides.yaml`) le cas échéant.

Pour plus d'informations, consultez [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) sur notre wiki.

## Conseils

* **Documentez vos paramètres** — Gardez une trace des paramètres non par défaut et des raisons pour lesquelles vous les avez modifiés.
* **Modifiez une chose à la fois** — Lors du dépannage, modifiez un seul paramètre à la fois afin de pouvoir identifier l'effet.
* **Testez dans un environnement de préproduction** — Pour des modifications importantes des paramètres, testez d'abord sur un serveur de préproduction.