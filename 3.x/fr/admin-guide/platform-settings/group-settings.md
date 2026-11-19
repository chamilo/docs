# Paramètres des groupes

Comportement de l'outil **Groupes** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Groupes**. Cette catégorie contient **4 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_group_categories`

**Catégories de groupes**

Autoriser les enseignants à créer des catégories dans l'outil Groupes ?

*Valeur par défaut : `false`*


### `allow_invite_non_friends_to_social_groups`

**Autoriser l'invitation de non-amis aux groupes sociaux**

Seul un administrateur de la plateforme ou l'administrateur/modérateur d'un groupe social peut y inviter des personnes (**Réseau social > Groupes >** le groupe **> Inviter des amis**). Ce paramètre contrôle qui ils peuvent inviter.

* **Désactivé (par défaut)** — l'administrateur ou le modérateur du groupe ne peut inviter que ses propres amis confirmés. Le formulaire d'invitation ne liste que ces amis, et le serveur refuse également tout autre utilisateur, même s'il est soumis manuellement : un avertissement « Certains des utilisateurs sélectionnés ne peuvent pas être invités et ont été ignorés » s'affiche. Les demandes d'amitié en attente ne comptent pas comme des amis.
* **Activé** — ils peuvent également inviter tout autre utilisateur de la plateforme. Un champ de recherche **Utilisateurs** supplémentaire apparaît sous la liste d'amis du formulaire d'invitation.

La même règle s'applique à l'écran d'invitation de groupe de la nouvelle interface sociale.

Variable : `group.allow_invite_non_friends_to_social_groups`

**Installations existantes :** la ligne du paramètre est créée en réexécutant la migration de synchronisation des paramètres (`doctrine:migrations:execute 'Chamilo\CoreBundle\Migrations\Schema\V310\Version20261023140000' --up`). Jusque-là, le paramètre se comporte comme « Désactivé » et n'apparaît pas dans la page d'administration.

*Valeur par défaut : `false`*


### `hide_course_group_if_no_tools_available`

**Masquer le groupe de cours si aucun outil**

Si aucun outil n'est disponible dans un groupe et que l'utilisateur n'est pas inscrit au groupe lui-même, masquer complètement le groupe dans la liste des groupes.

*Valeur par défaut : `false`*


### `show_groups_to_users`

**Afficher les classes aux utilisateurs**

Afficher les classes aux utilisateurs. Les classes sont une fonctionnalité qui vous permet d'inscrire ou de désinscrire des groupes d'utilisateurs dans une session ou un cours directement, réduisant ainsi la charge administrative. Lorsque vous choisissez cette option, les apprenants pourront voir dans quelle classe ils se trouvent via leur interface de réseau social.

*Valeur par défaut : `false`*