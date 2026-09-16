# Paramètres de confidentialité

Contrôles de confidentialité et de protection des données (de type RGPD) — consentement, exportation des données, demandes de suppression de compte, et similaires.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Confidentialité**. Cette catégorie contient **6 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `data_protection_officer_email`

**Adresse e-mail du délégué à la protection des données**

Adresse e-mail du délégué à la protection des données désigné, affichée dans les sections RGPD/confidentialité.

### `data_protection_officer_name`

**Nom du délégué à la protection des données**

Nom complet du délégué à la protection des données désigné, affiché dans les pages de données personnelles et de confidentialité.

### `data_protection_officer_role`

**Rôle du délégué à la protection des données**

Titre ou rôle du délégué à la protection des données désigné, affiché à côté de son nom dans les informations de confidentialité.

### `disable_change_user_visibility_for_public_courses`

**Désactiver la possibilité de rendre les utilisateurs visibles dans les cours publics**

Empêche quiconque de rendre l'outil 'utilisateurs' visible dans un cours public.

*Par défaut : `true`*

### `disable_gdpr`

**Désactiver les fonctionnalités RGPD**

Si vous gérez déjà votre déclaration de protection des données personnelles aux utilisateurs ailleurs, vous pouvez désactiver cette fonctionnalité en toute sécurité.

*Par défaut : `true`*

### `hide_user_field_from_list`

**Masquer des champs dans la liste des utilisateurs d'un cours**

Par défaut, nous affichons toutes les données des utilisateurs dans l'outil utilisateurs du cours. Ce tableau vous permet de spécifier quels champs vous ne souhaitez pas afficher. Cela n'affecte que les champs principaux (pas les champs supplémentaires).