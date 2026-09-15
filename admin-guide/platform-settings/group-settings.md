# Paramètres des groupes

Comportement de l’outil **Groupes** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Groupes**. Cette catégorie contient **3 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_group_categories`

**Catégories de groupes**

Autoriser les enseignants à créer des catégories dans l’outil Groupes ?

*Par défaut : `false`*


### `hide_course_group_if_no_tools_available`

**Masquer le groupe de cours si aucun outil**

Si aucun outil n’est disponible dans un groupe et que l’utilisateur n’est pas inscrit au groupe lui-même, masquer complètement le groupe dans la liste des groupes.

*Par défaut : `false`*


### `show_groups_to_users`

**Afficher les classes aux utilisateurs**

Afficher les classes aux utilisateurs. Les classes sont une fonctionnalité qui permet d’inscrire/désinscrire des groupes d’utilisateurs dans une session ou un cours directement, réduisant ainsi les contraintes administratives. Lorsque vous choisissez cette option, les apprenants pourront voir dans quelle classe ils se trouvent via leur interface de réseau social.

*Par défaut : `false`*