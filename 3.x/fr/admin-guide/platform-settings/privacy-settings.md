# Paramètres de confidentialité

Contrôles de confidentialité et de protection des données (de type RGPD) — consentement, export des données, demandes de suppression de compte, et assimilés.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Confidentialité**. Cette catégorie contient **6 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour les scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `data_protection_officer_email`

**Adresse e-mail du délégué à la protection des données**

Adresse e-mail du délégué à la protection des données désigné, affichée dans les sections RGPD/confidentialité.

### `data_protection_officer_name`

**Nom du délégué à la protection des données**

Nom complet du délégué à la protection des données désigné, affiché dans les pages relatives aux données personnelles et à la confidentialité.

### `data_protection_officer_role`

**Fonction du délégué à la protection des données**

Intitulé de poste ou fonction du délégué à la protection des données désigné, affiché à côté de son nom dans les informations de confidentialité.

### `disable_change_user_visibility_for_public_courses`

**Désactiver le rendu visible des utilisateurs d’outils dans les cours publics**

Empêcher quiconque de rendre l’outil « utilisateurs » visible dans un cours public.

*Valeur par défaut : `true`*

### `disable_gdpr`

**Désactiver les fonctionnalités RGPD**

Si vous gérez déjà ailleurs votre déclaration de protection des données personnelles destinée aux utilisateurs, vous pouvez désactiver cette fonctionnalité en toute sécurité.

*Valeur par défaut : `true`*

### `hide_user_field_from_list`

**Masquer des champs de la liste des utilisateurs dans le cours**

Par défaut, toutes les données des utilisateurs sont affichées dans l’outil utilisateurs du cours. Ce tableau vous permet de préciser les champs que vous ne souhaitez pas afficher. Cela n’affecte que les champs principaux (pas les champs supplémentaires).