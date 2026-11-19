# Paramètres des certificats

Valeurs par défaut appliquées lorsqu’un apprenant obtient un certificat à partir du cahier de notes.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Certificats**. Cette catégorie contient **23 paramètres**, listés ci-dessous avec le titre et le commentaire livrés dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en police monospace. Utilisez-le lors de scripts via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `add_certificate_pdf_footer`

**Ajouter un pied de page aux exportations PDF des certificats**

Lorsqu’il est activé, un pied de page est ajouté aux exportations PDF des certificats.

*Valeur par défaut : `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Génération automatique des certificats lors d’un appel WS**

Lorsqu’il est activé, et lors de l’utilisation du service web WSCertificatesList, cette option garantit que tous les certificats ont été générés par les utilisateurs s’ils ont atteint le score suffisant dans tous les éléments définis dans les cahiers de notes pour tous les cours et sessions (cela peut consommer des ressources de traitement considérables sur votre serveur).

*Valeur par défaut : `false`*

### `allow_certificates_search` **v3**

**Autoriser la recherche de certificats**

Autoriser les utilisateurs et les visiteurs à rechercher les certificats générés depuis le menu de la barre supérieure.

*Valeur par défaut : `false`*

### `allow_general_certificate`

**Activer le certificat général**

Un certificat général est un certificat regroupant toutes les réalisations de l’utilisateur dans les cours qu’il a suivis.

*Valeur par défaut : `false`*

### `allow_public_certificates`

**Autoriser les certificats publics**

Les certificats des utilisateurs peuvent être consultés par des utilisateurs non inscrits.

*Valeur par défaut : `false`*

### `blockchain_verification_enabled`

**Activer les certificats signés et l’ancrage facultatif sur le réseau de test Sepolia**

Lorsqu’il est activé, un apprenant peut approuver la publication d’un justificatif de certificat de cahier de notes signé numériquement ; un administrateur peut l’émettre ou le révoquer et, facultativement, ancrer l’empreinte du justificatif sur le réseau de test Sepolia. Voir [Vérification des certificats signés](../maintenance/signed-certificate-verification.md).

*Valeur par défaut : `false`*

### `certificate_filter_by_official_code`

**Filtre des certificats par code officiel**

Ajouter un filtre sur le code officiel des étudiants à la liste des certificats.

*Valeur par défaut : `false`*

### `certificate_pdf_orientation`

**Orientation PDF des certificats**

Définir « portrait » ou « landscape » (termes techniques) pour les certificats PDF.

*Valeur par défaut : `landscape`*

### `hide_certificate_export_link`

**Certificats : masquer le lien d’exportation PDF pour tous**

Activer pour supprimer complètement la possibilité d’exporter les certificats en PDF (pour tous les utilisateurs). Si cette option est activée, cela inclut le masquage pour les étudiants.

*Valeur par défaut : `false`*

### `hide_certificate_export_link_students`

**Certificats : masquer le lien d’exportation pour les étudiants**

Si cette option est activée, les étudiants ne pourront pas exporter leurs certificats en PDF. Cette option est disponible car, selon la structure HTML précise du modèle de certificat, l’exportation PDF peut être de faible qualité. Dans ce cas, il est préférable de n’afficher aux étudiants que le certificat HTML.

*Valeur par défaut : `false`*

### `hide_my_certificate_link`

**Masquer le lien « mon certificat »**

Masquer la page des certificats pour les utilisateurs non administrateurs.

*Valeur par défaut : `false`*

### `session_admin_can_download_all_certificates`

**Autoriser les administrateurs de session à télécharger les certificats privés**

Si cette option est activée, les administrateurs de session peuvent télécharger les certificats même s’ils ne sont pas publiés publiquement.

*Valeur par défaut : `false`*

### `transcript_enabled`

**Relevés de notes**

Activer les relevés de notes non officiels pour les apprenants et permettre au personnel autorisé d’émettre des relevés officiels signés numériquement et révocables. Le relevé propre à un utilisateur apparaît à `/transcript`. Voir [Relevés de notes](../users/academic-transcripts.md).

*Valeur par défaut : `false`*

### `transcript_program_title`

**Titre du programme du relevé**

Nom du programme ou de la qualification imprimé sur les PDF des relevés.

*Valeur par défaut : vide*

### `transcript_course_code_source`

**Code de cours du relevé**

Sélectionner le champ de cours qui fournit le code affiché sur les relevés : code de cours (`visual_code`) ou nom du département (`department_name`).

*Valeur par défaut : `visual_code`*

### `transcript_hours_extra_field`

**Champ des heures de cours du relevé**

Variable du champ supplémentaire de cours contenant les heures requises. Laisser vide pour utiliser la durée du cours.

*Valeur par défaut : vide*

### `transcript_completed_hours_are_required_hours`

**Les heures accomplies du relevé sont les heures requises**

Lorsqu’il est activé, afficher les heures de cours requises comme heures accomplies. Sinon, les heures accomplies reflètent le temps suivi de l’apprenant dans le cours.

*Valeur par défaut : `false`*

### `transcript_student_number_extra_field`

**Champ du numéro d’étudiant du relevé**

Variable du champ supplémentaire d’utilisateur contenant le numéro d’étudiant de l’apprenant. Laisser vide pour omettre ce numéro.

*Valeur par défaut : vide*

### `transcript_address_extra_fields`

**Champs d'adresse du relevé de notes**

Variables séparées par des virgules correspondant aux champs supplémentaires de l'utilisateur à ajouter à l'adresse de l'apprenant, tels que la ville ou le code postal.

*Valeur par défaut : vide*

### `transcript_grading_scale`

**Barème de notation du relevé de notes**

Un tableau JSON de pourcentage minimum, de note littérale et de points de note, ordonné du minimum le plus élevé au plus bas. Par exemple, `{ "min": 90, "letter": "A", "points": 4.0 }`. Cette correspondance est utilisée pour les notes littérales et le GPA du relevé de notes.

*Valeur par défaut : A (90 % / 4), B (80 % / 3), C (70 % / 2), D (60 % / 1), F (0 % / 0)*

### `transcript_gpa_note`

**Note relative au GPA du relevé de notes**

Texte imprimé sous le GPA expliquant le calcul. Par défaut, le GPA est la **moyenne non pondérée** des points de note des cours figurant sur le relevé de notes.

*Valeur par défaut : `The GPA is the unweighted average of the grade points of the courses listed in this transcript.`*

### `transcript_signatory_name`

**Nom du signataire du relevé de notes**

Nom du signataire institutionnel imprimé sur les relevés de notes officiels. Un administrateur de la plateforme peut téléverser une image de signature distincte sur la page de relevé de notes d'un utilisateur.

*Valeur par défaut : vide*

### `transcript_signatory_title`

**Titre du signataire du relevé de notes**

Intitulé de poste du signataire institutionnel sur les relevés de notes officiels.

*Valeur par défaut : vide*

## Voir aussi

Les certificats peuvent désormais se voir attribuer une période de validité et une date d'expiration, avec des rappels d'expiration automatisés ou manuels. Cela n'est pas configuré ici — la période de validité est un paramètre du carnet de notes destiné aux enseignants, et l'interrupteur d'activation du cron de rappel se trouve dans la catégorie **Tâches cron**. Voir [Certificats et compétences](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) et [Paramètres des tâches cron](crons-settings.md#certificate-expiry-reminders).