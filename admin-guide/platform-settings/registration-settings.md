# Paramètres d’inscription

Politique d’auto-inscription et redirections après inscription — ce qui est demandé aux nouveaux utilisateurs et où ils aboutissent.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Inscription**. Cette catégorie contient **21 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour les scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_double_validation_in_registration`

**Double validation pour le processus d’inscription**

Affiche simplement une demande de confirmation sur la page d’inscription avant de poursuivre la création de l’utilisateur.

*Par défaut : `false`*


### `allow_fields_inscription`

**Restreindre les champs affichés lors de l’inscription**

Si vous souhaitez n’afficher que certains des champs de profil disponibles, vous pouvez renseigner ici le tableau avec les sous-éléments « fields » et « extra_fields » contenant des tableaux listant les champs à afficher.

### `allow_invitation_registration` **v3**

**Autoriser l’inscription via des liens d’invitation à un cours**

Lorsqu’il est activé, un enseignant/administrateur peut envoyer, depuis l’outil Utilisateurs d’un cours, un lien d’invitation à usage unique permettant à une personne non inscrite d’accéder au formulaire d’inscription et de s’inscrire même si l’auto-inscription générale (`allow_registration`) est désactivée.

*Par défaut : `false`*

Voir [Inscrire des utilisateurs](../../teacher-guide/assessing-learners/subscribing-users.md#inviting-users-by-email) pour le versant enseignant de cette fonctionnalité.

### `allow_lostpassword`

**Mot de passe perdu**

Les utilisateurs sont-ils autorisés à demander leur mot de passe perdu ?

*Par défaut : `true`*

### `allow_registration`

**Inscription**

L’inscription en tant que nouvel utilisateur est-elle autorisée ? Les utilisateurs peuvent-ils créer de nouveaux comptes ?

*Par défaut : `false`*

### `allow_registration_as_teacher`

**Inscription en tant qu’enseignant**

Peut-on s’inscrire en tant qu’enseignant (avec la possibilité de créer des cours) ?

*Par défaut : `false`*

### `allow_terms_conditions`

**Activer les conditions générales**

Cette option affiche les conditions générales dans le formulaire d’inscription des nouveaux utilisateurs. Elle doit d’abord être configurée dans la page d’administration du portail.

*Par défaut : `false`*


### `drh_autosubscribe`

**Auto-inscription du directeur des ressources humaines**

Auto-inscription du directeur des ressources humaines — pas encore disponible

### `extendedprofile_registration`

**Champs du portfolio à l’inscription**

Lesquels des champs suivants du portfolio doivent être disponibles dans le processus d’inscription de l’utilisateur ? Cela nécessite que l’option portfolio soit activée (voir ci-dessus).

### `extendedprofile_registrationrequired`

**Champs du portfolio obligatoires à l’inscription**

Lesquels des champs suivants du portfolio sont *obligatoires* dans le processus d’inscription de l’utilisateur ? Cela nécessite que l’option portfolio soit activée et que le champ soit également disponible dans le formulaire d’inscription (voir ci-dessus).

### `extldap_config`

**Configuration de la connexion LDAP**

Tableau définissant l’hôte et le port du serveur LDAP.

### `hide_legal_accept_checkbox`

**Masquer la case d’acceptation légale sur la page des conditions générales**

Si défini à true, supprime la case « J’ai lu et j’accepte » dans le flux de la page des conditions générales.

*Par défaut : `false`*


### `platform_unsubscribe_allowed`

**Autoriser la désinscription de la plateforme**

En activant cette option, vous autorisez tout utilisateur à supprimer définitivement son propre compte et toutes les données associées de la plateforme. Il s’agit d’une action assez radicale, mais elle est nécessaire pour les portails ouverts au public où les utilisateurs peuvent s’auto-inscrire. Une entrée supplémentaire apparaîtra dans le profil de l’utilisateur pour se désinscrire après confirmation.

*Par défaut : `false`*


### `redirect_after_login`

**Redirection après connexion (par profil)**

Définir la redirection par profil après connexion à l’aide d’un objet JSON du type {"STUDENT":"", "ADMIN":"admin-dashboard"}

*Par défaut :*
```json
{
  "COURSEMANAGER": "courses",
  "STUDENT": "courses",
  "DRH": "",
  "SESSIONADMIN": "admin-dashboard",
  "STUDENT_BOSS": "main/my_space/student.php",
  "INVITEE": "courses",
  "ADMIN": "admin"
}
```

### `required_extra_fields_in_inscription`

**Champs supplémentaires obligatoires lors de l’inscription**

Tableau d’identifiants de champs supplémentaires qui doivent être renseignés lors de l’inscription de l’utilisateur.

### `required_profile_fields`

**Champs obligatoires lors de l’inscription**

Tableau de noms de champs de profil (email, phone, language, official_code) qui doivent être fournis lors de l’inscription.

### `send_inscription_msg_to_inbox`

**Envoyer le message de bienvenue par e-mail et dans la messagerie interne**

Par défaut, le message de bienvenue (avec les identifiants) n’est envoyé que par e-mail. Activez cette option pour l’envoyer également dans la messagerie interne Chamilo de l’utilisateur.

*Par défaut : `false`*


### `sessionadmin_autosubscribe`

**Auto-inscription de l’administrateur de session**

Auto-inscription de l’administrateur de session — pas encore disponible

### `student_autosubscribe`

**Inscription automatique des apprenants**

Inscription automatique des apprenants - pas encore disponible

### `teacher_autosubscribe`

**Inscription automatique des enseignants**

Inscription automatique des enseignants - pas encore disponible

### `user_hide_never_expire_option`

**Masquer l'option « n'expire jamais » pour les utilisateurs**

Supprimer l'option « n'expire jamais » lors de la création ou de la modification d'un compte utilisateur.

*Valeur par défaut : `false`*