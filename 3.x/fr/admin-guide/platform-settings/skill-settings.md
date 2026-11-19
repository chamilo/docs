# Paramètres des compétences

Comportement du système **Compétences** — arbre des compétences, règles d'attribution, intégration au profil.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Compétences**. Cette catégorie contient **13 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_hr_skills_management`

**Autoriser la gestion des compétences par les RH**

Permet aux RH de gérer les compétences

*Valeur par défaut : `true`*


### `allow_private_skills`

**Masquer les compétences aux apprenants**

Si cette option est activée, les compétences ne sont visibles que pour les administrateurs, les enseignants (liés à un utilisateur via un cours) et les utilisateurs RH (s'ils sont liés à un utilisateur).

*Valeur par défaut : `false`*


### `allow_skill_rel_items`

**Activer la liaison des compétences aux éléments**

Cette option active une fonctionnalité majeure qui permet de lier n'importe quel élément à une compétence (et ainsi d'en permettre l'acquisition). La fonctionnalité exige toujours que l'enseignant confirme l'acquisition de la compétence ; l'acquisition n'est donc pas automatique.

*Valeur par défaut : `false`*


### `allow_skills_tool`

**Autoriser l'outil Compétences**

Les utilisateurs peuvent consulter leurs compétences dans le réseau social et dans un bloc de la page d'accueil.

*Valeur par défaut : `true`*

### `allow_teacher_access_student_skills`

**Autoriser les enseignants à accéder aux compétences des apprenants**

[inféré] Autoriser les formateurs à consulter et à suivre les compétences acquises par les apprenants dans leurs cours.

*Valeur par défaut : `false`*


### `badge_assignation_notification`

**Envoyer une notification à l'apprenant lorsqu'une compétence ou un badge a été acquis**

[inféré] Envoyer des notifications aux apprenants lorsqu'ils acquièrent une nouvelle compétence ou un nouveau badge.

*Valeur par défaut : `false`*


### `hide_skill_levels`

**Masquer la fonctionnalité des niveaux de compétence**

[inféré] Masquer la hiérarchie des niveaux de compétence et les libellés de niveau dans les vues liées aux compétences.

*Valeur par défaut : `false`*


### `manual_assignment_subskill_autoload`

**Attribution de compétences à un utilisateur : chargement automatique des sous-compétences**

Lors de l'attribution manuelle de compétences à un utilisateur, choisissez le niveau de compétence niveau par niveau dans l'arbre des compétences plutôt que dans une liste unique. La première liste n'affiche que les compétences du premier niveau ; en en sélectionnant une, une liste de ses sous-compétences est ajoutée, et ainsi de suite. La compétence attribuée est la plus profonde sélectionnée ; vous pouvez donc vous arrêter à n'importe quel niveau. Les compétences qui ne sont pas acquérables sont également listées, afin d'atteindre leurs sous-compétences, mais elles ne peuvent pas être attribuées. Les listes sont libellées avec les noms définis dans `skill_levels_names`, lorsqu'ils sont définis. Voir [Attribution manuelle des compétences](../skills/managing-skills.md#manual-skill-assignment).

*Valeur par défaut : `false`*


### `openbadges_backpack`

**URL du backpack OpenBadges**

L'URL du serveur backpack OpenBadges qui sera utilisée par défaut pour tous les utilisateurs souhaitant exporter leurs badges. Par défaut, il s'agit du dépôt ouvert et gratuit de la Mozilla Foundation : https://backpack.openbadges.org/

### `show_full_skill_name_on_skill_wheel`

**Afficher le nom complet de la compétence sur la roue des compétences**

Sur la roue des compétences, affiche le nom de la compétence lorsqu'elle possède un code court.

*Valeur par défaut : `false`*


### `skill_levels_names`

**Noms des niveaux de compétence**

Définir les noms des niveaux de compétence sous forme de tableau id => nom.

### `skills_hierarchical_view_in_user_tracking`

**Afficher les compétences sous forme de tableau hiérarchique**

[inféré] Afficher les compétences de l'apprenant sous forme d'arbre hiérarchique dans les pages de progression et de rapports.

*Valeur par défaut : `false`*


### `skills_teachers_can_assign_skills`

**Autoriser les enseignants à définir quelles compétences sont acquises via leurs cours**

Par défaut, seuls les administrateurs peuvent décider quelles compétences peuvent être acquises via quel cours.

*Valeur par défaut : `false`*