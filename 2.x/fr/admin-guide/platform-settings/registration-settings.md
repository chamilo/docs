# Paramètres d'inscription

Politique d'auto-inscription et redirections après inscription — ce que l'on demande aux nouveaux utilisateurs et où ils sont dirigés.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Inscription**. Cette catégorie contient **20 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_double_validation_in_registration`

**Double validation pour le processus d'inscription**

Affiche simplement une demande de confirmation sur la page d'inscription avant de procéder à la création de l'utilisateur.

*Par défaut : `false`*

### `allow_fields_inscription`

**Restreindre les champs affichés lors de l'inscription**

Si vous souhaitez afficher uniquement certains des champs de profil disponibles, vous pouvez compléter le tableau ici avec les sous-éléments 'fields' et 'extra_fields' contenant des tableaux avec une liste des champs à afficher.

### `allow_lostpassword`

**Mot de passe perdu**

Les utilisateurs sont-ils autorisés à demander la récupération de leur mot de passe perdu ?

*Par défaut : `true`*

### `allow_registration`

**Inscription**

L'inscription en tant que nouvel utilisateur est-elle autorisée ? Les utilisateurs peuvent-ils créer de nouveaux comptes ?

*Par défaut : `false`*

### `allow_registration_as_teacher`

**Inscription en tant qu'enseignant**

Peut-on s'inscrire en tant qu'enseignant (avec la possibilité de créer des cours) ?

*Par défaut : `false`*

### `allow_terms_conditions`

**Activer les termes et conditions**

Cette option affichera les Termes et Conditions dans le formulaire d'inscription pour les nouveaux utilisateurs. Doit être configuré au préalable dans la page d'administration du portail.

*Par défaut : `false`*

### `drh_autosubscribe`

**Inscription automatique du directeur des ressources humaines**

Inscription automatique du directeur des ressources humaines - pas encore disponible

### `extendedprofile_registration`

**Champs de portfolio lors de l'inscription**

Quels champs suivants du portfolio doivent être disponibles dans le processus d'inscription des utilisateurs ? Cela nécessite que l'option portfolio soit activée (voir ci-dessus).

### `extendedprofile_registrationrequired`

**Champs de portfolio obligatoires lors de l'inscription**

Quels champs suivants du portfolio sont *obligatoires* dans le processus d'inscription des utilisateurs ? Cela nécessite que l'option portfolio soit activée et que le champ soit également disponible dans le formulaire d'inscription (voir ci-dessus).

### `extldap_config`

**Configuration de la connexion LDAP**

Tableau définissant l'hôte et le port pour le serveur LDAP.

### `hide_legal_accept_checkbox`

**Masquer la case à cocher d'acceptation des conditions légales**

Si défini sur true, supprime la case à cocher "J'ai lu et j'accepte" dans le flux de la page des Termes et Conditions.

*Par défaut : `false`*

### `platform_unsubscribe_allowed`

**Autoriser la désinscription de la plateforme**

En activant cette option, vous permettez à tout utilisateur de supprimer définitivement son propre compte et toutes les données qui y sont liées de la plateforme. C'est une action assez radicale, mais elle est nécessaire pour les portails ouverts au public où les utilisateurs peuvent s'auto-inscrire. Une entrée supplémentaire apparaîtra dans le profil de l'utilisateur pour se désinscrire après confirmation.

*Par défaut : `false`*

### `redirect_after_login`

**Redirection après connexion (par profil)**

Définissez la redirection par profil après la connexion en utilisant un objet JSON comme {"STUDENT":"", "ADMIN":"admin-dashboard"}

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

**Champs supplémentaires obligatoires lors de l'inscription**

Tableau d'identifiants de champs supplémentaires qui doivent être complétés lors de l'inscription de l'utilisateur.

### `required_profile_fields`

**Champs obligatoires lors de l'inscription**

Tableau de noms de champs de profil (email, phone, language, official_code) qui doivent être fournis lors de l'inscription.

### `send_inscription_msg_to_inbox`

**Envoyer le message de bienvenue par e-mail et dans la boîte de réception**

Par défaut, le message de bienvenue (avec les identifiants) est envoyé uniquement par e-mail. Activez cette option pour l'envoyer également dans la boîte de réception Chamilo de l'utilisateur.

*Par défaut : `false`*

### `sessionadmin_autosubscribe`

**Inscription automatique de l'administrateur de session**

Inscription automatique de l'administrateur de session - pas encore disponible

### `student_autosubscribe`

**Inscription automatique de l'apprenant**

Inscription automatique de l'apprenant - pas encore disponible

### `teacher_autosubscribe`

**Inscription automatique de l'enseignant**

Inscription automatique de l'enseignant - pas encore disponible

### `user_hide_never_expire_option`

**Masquer l'option 'ne jamais expirer' pour les utilisateurs**

Supprime l'option 'ne jamais expirer' lors de la création ou de la modification d'un compte utilisateur.

*Par défaut : `false`*