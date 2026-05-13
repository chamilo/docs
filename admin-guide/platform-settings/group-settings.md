# Paramètres des Groupes

Comportement de l'outil **Groupes** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Groupes**. Cette catégorie contient **3 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_group_categories`

**Catégories de groupes**

Permettre aux enseignants de créer des catégories dans l'outil Groupes ?

*Par défaut : `false`*

### `hide_course_group_if_no_tools_available`

**Masquer le groupe de cours si aucun outil n'est disponible**

Si aucun outil n'est disponible dans un groupe et que l'utilisateur n'est pas inscrit au groupe lui-même, masquer complètement le groupe dans la liste des groupes.

*Par défaut : `false`*

### `show_groups_to_users`

**Afficher les classes aux utilisateurs**

Afficher les classes aux utilisateurs. Les classes sont une fonctionnalité qui permet d'inscrire/désinscrire des groupes d'utilisateurs à une session ou à un cours directement, réduisant ainsi les tâches administratives. Lorsque vous sélectionnez cette option, les apprenants pourront voir dans quelle classe ils se trouvent via leur interface de réseau social.

*Par défaut : `false`*