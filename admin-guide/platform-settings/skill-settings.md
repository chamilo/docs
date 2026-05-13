# Paramètres des Compétences

Comportement du système de **Compétences** — arbre des compétences, règles d'attribution, intégration au profil.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Compétences**. Cette catégorie contient **13 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_hr_skills_management`

**Autoriser la gestion des compétences par les RH**

Permet aux ressources humaines de gérer les compétences.

*Par défaut : `true`*

### `allow_private_skills`

**Masquer les compétences aux apprenants**

Si activé, les compétences ne sont visibles que pour les administrateurs, les enseignants (liés à un utilisateur via un cours) et les utilisateurs RH (si liés à un utilisateur).

*Par défaut : `false`*

### `allow_skill_rel_items`

**Activer la liaison des compétences aux éléments**

Cela active une fonctionnalité majeure qui permet de lier n'importe quel élément à une compétence (et ainsi de permettre l'acquisition de cette compétence). La fonctionnalité nécessite toujours que l'enseignant confirme l'acquisition de la compétence, donc l'acquisition n'est pas automatique.

*Par défaut : `false`*

### `allow_skills_tool`

**Autoriser l'outil Compétences**

Les utilisateurs peuvent voir leurs compétences dans le réseau social et dans un bloc sur la page d'accueil.

*Par défaut : `true`*

### `allow_teacher_access_student_skills`

**Autoriser les enseignants à accéder aux compétences des apprenants**

[inféré] Permettre aux formateurs de voir et de suivre les compétences acquises par les apprenants dans leurs cours.

*Par défaut : `false`*

### `badge_assignation_notification`

**Envoyer une notification à l'apprenant lorsqu'une compétence ou un badge est acquis**

[inféré] Envoyer des notifications aux apprenants lorsqu'ils acquièrent une nouvelle compétence ou un badge.

*Par défaut : `false`*

### `hide_skill_levels`

**Masquer la fonctionnalité des niveaux de compétence**

[inféré] Cacher la hiérarchie des niveaux de compétence et les étiquettes de niveau dans les vues liées aux compétences.

*Par défaut : `false`*

### `manual_assignment_subskill_autoload`

**Attribution manuelle des compétences à un utilisateur : chargement automatique des sous-compétences**

Lors de l'attribution manuelle de compétences à un utilisateur, le formulaire peut être configuré pour proposer automatiquement d'attribuer une sous-compétence au lieu de la compétence sélectionnée.

*Par défaut : `false`*

### `openbadges_backpack`

**URL du sac à dos OpenBadges**

L'URL du serveur de sac à dos OpenBadges qui sera utilisé par défaut pour tous les utilisateurs souhaitant exporter leurs badges. Par défaut, cela pointe vers le référentiel gratuit et ouvert de la Fondation Mozilla : https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Afficher le nom complet de la compétence sur la roue des compétences**

Sur la roue des compétences, cela affiche le nom de la compétence lorsqu'elle possède un code court.

*Par défaut : `false`*

### `skill_levels_names`

**Noms des niveaux de compétence**

Définir les noms des niveaux de compétence sous forme de tableau id => nom.

### `skills_hierarchical_view_in_user_tracking`

**Afficher les compétences sous forme de tableau hiérarchique**

[inféré] Afficher les compétences des apprenants sous forme de structure arborescente hiérarchique dans les pages de progression et de rapport.

*Par défaut : `false`*

### `skills_teachers_can_assign_skills`

**Autoriser les enseignants à définir quelles compétences sont acquises via leurs cours**

Par défaut, seuls les administrateurs peuvent décider quelles compétences peuvent être acquises via quel cours.

*Par défaut : `false`*