# Paramètres des certificats

Paramètres par défaut appliqués lorsqu'un apprenant obtient un certificat à partir du carnet de notes.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Certificats**. Cette catégorie contient **9 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_certificate_pdf_footer`

**Ajouter un pied de page aux exportations de certificats en PDF**

Lorsqu'il est activé, un pied de page est ajouté aux exportations PDF des certificats.

*Par défaut : `false`*

### `allow_general_certificate`

**Activer le certificat général**

Un certificat général est un certificat regroupant toutes les réalisations de l'utilisateur dans les cours qu'il a suivis.

*Par défaut : `false`*

### `allow_public_certificates`

**Autoriser les certificats publics**

Les certificats des utilisateurs peuvent être consultés par des utilisateurs non enregistrés.

*Par défaut : `false`*

### `certificate_filter_by_official_code`

**Filtre des certificats par code officiel**

Ajoute un filtre sur le code officiel des étudiants dans la liste des certificats.

*Par défaut : `false`*

### `certificate_pdf_orientation`

**Orientation PDF pour les certificats**

Définissez 'portrait' ou 'landscape' (termes techniques) pour les certificats PDF.

*Par défaut : `landscape`*

### `hide_certificate_export_link`

**Certificats : masquer le lien d'exportation PDF pour tous**

Activez cette option pour supprimer complètement la possibilité d'exporter les certificats en PDF (pour tous les utilisateurs). Si activé, cela inclut le masquage pour les étudiants.

*Par défaut : `false`*

### `hide_certificate_export_link_students`

**Certificats : masquer le lien d'exportation pour les étudiants**

Si activé, les étudiants ne pourront pas exporter leurs certificats en PDF. Cette option est disponible car, selon la structure HTML précise du modèle de certificat, l'exportation PDF peut être de mauvaise qualité. Dans ce cas, il est préférable de ne montrer que le certificat HTML aux étudiants.

*Par défaut : `false`*

### `hide_my_certificate_link`

**Masquer le lien 'mon certificat'**

Masque la page des certificats pour les utilisateurs non administrateurs.

*Par défaut : `false`*

### `session_admin_can_download_all_certificates`

**Autoriser les administrateurs de session à télécharger les certificats privés**

Si activé, les administrateurs de session peuvent télécharger les certificats même s'ils ne sont pas publiés publiquement.

*Par défaut : `false`*