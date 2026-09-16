# Paramètres d’identité de l’administrateur

Identité et coordonnées de l’administrateur de la plateforme. Ces valeurs apparaissent dans le pied de page de la plateforme et dans certains courriels générés par le système.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Identité de l’administrateur**. Cette catégorie contient **12 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un scriptage via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `administrator_email`

**Administrateur du portail : courriel**

L’adresse électronique de l’administrateur de la plateforme (apparaît dans le pied de page à gauche)

### `administrator_name`

**Administrateur du portail : prénom**

Le prénom de l’administrateur de la plateforme (apparaît dans le pied de page à gauche)

### `administrator_phone`

**Administrateur du portail : numéro de téléphone**

Le numéro de téléphone de l’administrateur de la plateforme (apparaît dans le pied de page à gauche)

### `administrator_surname`

**Administrateur du portail : nom**

Le nom de famille de l’administrateur de la plateforme (apparaît dans le pied de page à gauche)

### `chamilo_latest_news`

**Dernières actualités**

Recevez les dernières actualités de Chamilo, y compris les vulnérabilités de sécurité et les événements, directement dans votre panneau d’administration. Ces actualités sont vérifiées sur le serveur d’actualités de Chamilo à chaque chargement de la page d’administration et ne sont visibles que par les administrateurs.

*Par défaut : `true`*

### `chamilo_support`

**Bloc de support Chamilo**

Obtenez des conseils professionnels et un moyen simple de contacter les prestataires de services officiels pour un support professionnel, directement auprès des créateurs de Chamilo. Ce bloc apparaît sur votre page d’administration, n’est visible que par les administrateurs et se rafraîchit à chaque chargement de la page d’administration.

*Par défaut : `true`*

### `max_anonymous_users`

**Utilisateurs anonymes multiples**

Activez cette option pour autoriser plusieurs utilisateurs système pour les utilisateurs anonymes. Cela est utile lorsque la plateforme sert de vitrine publique pour certains cours. Disposer de plusieurs utilisateurs anonymes permet au suivi de fonctionner pendant la durée de l’expérience pour plusieurs utilisateurs sans mélanger leurs données (ce qui pourrait autrement les perturber).

*Par défaut : `0`*

### `redirect_admin_to_courses_list`

**Rediriger l’administrateur vers la liste des cours**

Le comportement par défaut consiste à envoyer les administrateurs directement vers le panneau d’administration (tandis que les enseignants et les étudiants sont envoyés vers la liste des cours ou la page d’accueil de la plateforme). Activez cette option pour rediriger également l’administrateur vers sa liste de cours.

*Par défaut : `false`*

### `send_inscription_notification_to_general_admin_only`

**Notifier uniquement l’administrateur global des nouveaux utilisateurs**

Lorsqu’elle est activée, seul l’administrateur global reçoit les notifications par courriel concernant les nouvelles inscriptions d’utilisateurs, au lieu de tous les administrateurs.

*Par défaut : `false`*

### `show_link_request_hrm_user`

**Afficher le lien pour demander un lien entre utilisateur et RH**

Affiche un lien sur la page de profil permettant aux responsables des ressources humaines de demander à être liés à un compte utilisateur.

*Par défaut : `false`*

### `user_status_option_only_for_admin_enabled`

**Masquer le rôle aux utilisateurs ordinaires**

Permet de masquer le rôle des utilisateurs lorsque cette option est définie à true et que le tableau suivant définit le rôle correspondant à « true ».

*Par défaut : `false`*

### `user_status_option_show_only_for_admin`

**Définir quels rôles sont masqués aux utilisateurs ordinaires**

Les rôles définis à « true » n’apparaîtront qu’aux administrateurs. Les autres utilisateurs ne pourront pas les voir.