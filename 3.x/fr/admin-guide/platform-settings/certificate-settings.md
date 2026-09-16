# Paramètres des certificats

Valeurs par défaut appliquées lorsqu’un apprenant obtient un certificat depuis le carnet de notes.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Certificats**. Cette catégorie contient **11 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_certificate_pdf_footer`

**Ajouter un pied de page aux exports PDF de certificats**

Lorsqu’il est activé, un pied de page est ajouté aux exports PDF des certificats.

*Par défaut : `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Génération automatique des certificats lors d’un appel WS**

Lorsqu’il est activé, et lors de l’utilisation du webservice WSCertificatesList, cette option garantit que tous les certificats ont été générés par les utilisateurs s’ils ont atteint le score suffisant dans tous les éléments définis dans les carnets de notes pour tous les cours et sessions (cela peut consommer des ressources de traitement considérables sur votre serveur).

*Par défaut : `false`*

### `allow_certificates_search` **v3**

**Autoriser la recherche de certificats**

Permet aux utilisateurs et aux visiteurs de rechercher les certificats générés depuis le menu de la barre supérieure.

*Par défaut : `false`*

### `allow_general_certificate`

**Activer le certificat général**

Un certificat général est un certificat regroupant toutes les réalisations de l’utilisateur dans les cours qu’il a suivis.

*Par défaut : `false`*

### `allow_public_certificates`

**Autoriser les certificats publics**

Les certificats des utilisateurs peuvent être consultés par des utilisateurs non inscrits.

*Par défaut : `false`*

### `certificate_filter_by_official_code`

**Filtrer les certificats par code officiel**

Ajoute un filtre sur le code officiel des étudiants à la liste des certificats.

*Par défaut : `false`*

### `certificate_pdf_orientation`

**Orientation PDF des certificats**

Définissez « portrait » ou « landscape » (termes techniques) pour les certificats PDF.

*Par défaut : `landscape`*

### `hide_certificate_export_link`

**Certificats : masquer le lien d’export PDF pour tous**

Activez pour supprimer complètement la possibilité d’exporter les certificats en PDF (pour tous les utilisateurs). Si activé, cela inclut le masquage pour les étudiants.

*Par défaut : `false`*

### `hide_certificate_export_link_students`

**Certificats : masquer le lien d’export pour les étudiants**

Si activé, les étudiants ne pourront pas exporter leurs certificats en PDF. Cette option est disponible car, selon la structure HTML précise du modèle de certificat, l’export PDF peut être de mauvaise qualité. Dans ce cas, il est préférable de n’afficher que le certificat HTML aux étudiants.

*Par défaut : `false`*

### `hide_my_certificate_link`

**Masquer le lien « mes certificats »**

Masque la page des certificats pour les utilisateurs non administrateurs.

*Par défaut : `false`*

### `session_admin_can_download_all_certificates`

**Autoriser les administrateurs de session à télécharger les certificats privés**

Si activé, les administrateurs de session peuvent télécharger les certificats même s’ils ne sont pas publiés publiquement.

*Par défaut : `false`*

## Voir aussi

Les certificats peuvent désormais se voir attribuer une période de validité et une date d’expiration, avec des rappels d’expiration automatiques ou manuels. Cela ne se configure pas ici — la période de validité est un paramètre du carnet de notes destiné aux enseignants, et l’interrupteur marche/arrêt du cron de rappel se trouve dans la catégorie **Tâches cron**. Voir [Certificats et compétences](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) et [Paramètres des tâches cron](crons-settings.md#certificate-expiry-reminders).