# Paramètres d'inscription

Politique d'auto-inscription et redirections après inscription — ce qui est demandé aux nouveaux utilisateurs et où ils arrivent.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Inscription**. Cette catégorie contient **21 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police monospace. Utilisez-le lors de scripts via l'API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_double_validation_in_registration`

**Double validation du processus d'inscription**

Affiche simplement une demande de confirmation sur la page d'inscription avant de poursuivre la création de l'utilisateur.

*Valeur par défaut : `false`*


### `allow_fields_inscription`

**Restreindre les champs affichés lors de l'inscription**

Si vous souhaitez n'afficher que certains des champs de profil disponibles, vous pouvez compléter le tableau ici avec les sous-éléments 'fields' et 'extra_fields' contenant des tableaux avec la liste des champs à afficher.

### `allow_invitation_registration` **v3**

**Autoriser l'inscription via des liens d'invitation à un cours**

Lorsqu'il est activé, un enseignant/administrateur peut envoyer un lien d'invitation à usage unique depuis l'outil Utilisateurs d'un cours, permettant à une personne non inscrite d'accéder au formulaire d'inscription et de s'inscrire même lorsque l'auto-inscription générale (`allow_registration`) est désactivée.

*Valeur par défaut : `false`*

Voir [Inscrire des utilisateurs](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) pour le côté enseignant de cette fonctionnalité.

### `allow_lostpassword`

**Mot de passe oublié**

Les utilisateurs sont-ils autorisés à demander leur mot de passe oublié ?

*Valeur par défaut : `true`*

### `allow_registration`

**Inscription**

L'inscription en tant que nouvel utilisateur est-elle autorisée ? Les utilisateurs peuvent-ils créer de nouveaux comptes ?

*Valeur par défaut : `false`*

### `allow_registration_as_teacher`

**Inscription en tant qu'enseignant**

Peut-on s'inscrire en tant qu'enseignant (avec la possibilité de créer des cours) ?

*Valeur par défaut : `false`*

### `allow_terms_conditions`

**Activer les conditions générales**

Cette option affichera les conditions générales dans le formulaire d'inscription des nouveaux utilisateurs. Doit d'abord être configurée dans la page d'administration du portail.

*Valeur par défaut : `false`*

Lorsqu'elle est activée, un administrateur de la plateforme, ou un supérieur d'un apprenant, peut gérer l'accord d'un apprenant depuis trois endroits : la page d'informations de l'utilisateur (**Administration > Utilisateurs**, puis l'utilisateur), la page de suivi de l'apprenant dans **Rapports** et la page de l'apprenant du reporting global (`/reporting/learners/<id>`). Le bouton est le même partout :

* **Envoyer l'accord juridique** envoie à l'apprenant un message, signé du nom de l'expéditeur, lui demandant de signer les conditions générales, avec un lien vers l'adresse définie dans [`course_validation_terms_and_conditions_url`](course-settings.md#course_validation_terms_and_conditions_url).
* **Supprimer l'accord juridique** apparaît une fois que l'apprenant a accepté, et retire cette acceptation, de sorte que l'apprenant est invité à accepter à nouveau les conditions générales.


### `hrm_autosubscribe`

**Inscription automatique du responsable des ressources humaines**

Codes de cours séparés par `|` (par exemple `COURSE001|COURSE002`). Lorsqu'un RRH se connecte, Chamilo inscrit automatiquement l'utilisateur aux cours listés sans modifier le rôle de l'utilisateur. L'ancien nom du paramètre `registration.drh_autosubscribe` reste reconnu pour des raisons de compatibilité.

### `extendedprofile_registration`

**Champs du portfolio à l'inscription**

Lesquels des champs suivants du portfolio doivent être disponibles dans le processus d'inscription de l'utilisateur ? Cela exige que l'option portfolio soit activée (voir ci-dessus).

### `extendedprofile_registrationrequired`

**Champs du portfolio obligatoires à l'inscription**

Lesquels des champs suivants du portfolio sont *obligatoires* dans le processus d'inscription de l'utilisateur ? Cela exige que l'option portfolio soit activée et que le champ soit également disponible dans le formulaire d'inscription (voir ci-dessus).

### `extldap_config`

**Configuration de la connexion LDAP**

Tableau définissant l'hôte et le port du serveur LDAP.

### `hide_legal_accept_checkbox`

**Masquer la case d'acceptation juridique sur la page des conditions générales**

Si défini sur true, supprime la case à cocher « J'ai lu et j'accepte » dans le flux de la page des conditions générales.

*Valeur par défaut : `false`*


### `platform_unsubscribe_allowed`

**Autoriser la désinscription de la plateforme**

En activant cette option, vous permettez à tout utilisateur de supprimer définitivement son propre compte et toutes les données qui y sont liées de la plateforme. Il s'agit d'une action assez radicale, mais elle est nécessaire pour les portails ouverts au public où les utilisateurs peuvent s'auto-inscrire. Une entrée supplémentaire apparaîtra dans le profil de l'utilisateur pour se désinscrire après confirmation.

*Valeur par défaut : `false`*

### `redirect_after_login`

**Redirection après connexion (par profil)**

Définir la redirection par profil après la connexion à l'aide d'un objet JSON tel que {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Valeur par défaut :*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "HRM": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

Utilisez la clé de rôle `HRM` dans les nouvelles configurations de redirection. Les correspondances existantes contenant `DRH` sont toujours lues pour des raisons de compatibilité ; si les deux clés sont présentes, `HRM` a la priorité.

### `required_extra_fields_in_inscription`

**Champs supplémentaires obligatoires lors de l'inscription**

Tableau d'identifiants de champs supplémentaires qui doivent être renseignés lors de l'inscription de l'utilisateur.

### `required_profile_fields`

**Champs obligatoires lors de l'inscription**

Tableau de noms de champs de profil (email, phone, language, official_code) qui doivent être fournis lors de l'inscription.

### `send_inscription_msg_to_inbox`

**Envoyer le message de bienvenue par courriel et dans la boîte de réception**

Par défaut, le message de bienvenue (avec les identifiants) est envoyé uniquement par courriel. Activez cette option pour l'envoyer également dans la boîte de réception Chamilo de l'utilisateur.

*Valeur par défaut : `false`*


### `sessionadmin_autosubscribe`

**Inscription automatique de l'administrateur de session**

Inscription automatique de l'administrateur de session — pas encore disponible

### `student_autosubscribe`

**Inscription automatique de l'apprenant**

Inscription automatique de l'apprenant — pas encore disponible

### `teacher_autosubscribe`

**Inscription automatique de l'enseignant**

Inscription automatique de l'enseignant — pas encore disponible

### `user_hide_never_expire_option`

**Masquer l'option « n'expire jamais » pour les utilisateurs**

Supprimer l'option « n'expire jamais » lors de la création ou de la modification d'un compte utilisateur.

*Valeur par défaut : `false`*