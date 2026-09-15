# Paramètres des enquêtes

Valeurs par défaut et comportement de l’outil **Enquêtes**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Enquêtes**. Cette catégorie contient **12 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le pour scripter via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `extend_rights_for_coach_on_survey`

**Étendre les droits des tuteurs sur les enquêtes**

Activez cette option pour autoriser les tuteurs à créer et modifier des enquêtes

*Par défaut : `true`*


### `hide_survey_edition`

**Empêcher la modification des enquêtes**

Empêcher la modification des enquêtes pour toutes les enquêtes listées ici (par code). Utilisez * pour empêcher la modification de toutes les enquêtes.

### `hide_survey_reporting_button`

**Masquer le bouton de rapports d’enquête**

Permet aux administrateurs de masquer le bouton de rapports d’enquête lorsque les enquêtes servent à interroger les enseignants.

*Par défaut : `false`*


### `show_pending_survey_in_menu`

**Afficher « Enquêtes en attente » dans le menu**

Afficher un élément de menu permettant aux utilisateurs d’accéder à leurs enquêtes en attente.

*Par défaut : `false`*


### `show_surveys_base_in_sessions`

**Afficher les enquêtes du cours de base dans tous les cours de session**

[inféré] Rendre les enquêtes du cours de base visibles et disponibles pour les apprenants dans tous les cours de session associés.

*Par défaut : `false`*


### `survey_additional_teacher_modify_actions`

**Ajouter des actions supplémentaires (sous forme de liens) aux listes d’enquêtes pour les enseignants**

Ajouter des actions (généralement liées à des plugins) dans la liste des enquêtes. Utilisez la syntaxe de tableau ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Autoriser les enseignants à modifier les questions d’enquête après les réponses des étudiants**

[inféré] Autoriser les formateurs à modifier les questions d’enquête même après que les apprenants ont soumis leurs réponses.

*Par défaut : `false`*


### `survey_anonymous_show_answered`

**Autoriser les enseignants à voir qui a répondu dans les enquêtes anonymes**

Autoriser les enseignants à voir quels apprenants ont déjà répondu à une enquête anonyme. Cela n’apparaît qu’une fois que plus d’un utilisateur a répondu, de sorte qu’il reste difficile d’identifier qui a répondu quoi.

*Par défaut : `false`*


### `survey_backwards_enable`

**Activer le bouton « question précédente » dans les enquêtes**

[inféré] Activer un bouton de navigation « question précédente » pour permettre aux apprenants de revoir les questions d’enquête antérieures.

*Par défaut : `false`*


### `survey_duplicate_order_by_name`

**Trier par nom d’étudiant lors de l’utilisation de la fonction de duplication d’enquête**

La fonction de duplication d’enquête est destinée aux enseignants et vise à leur demander d’exprimer leur appréciation sur chaque étudiant dans l’ordre. Cette option trie les questions par nom de famille de l’apprenant.

*Par défaut : `true`*


### `survey_email_sender_noreply`

**Expéditeur des e-mails d’enquête (no-reply)**

Les invitations aux enquêtes doivent-elles utiliser l’adresse e-mail du tuteur ou l’adresse no-reply définie dans la section de configuration principale ?

*Par défaut : `coach`* (le choix « Expéditeur e-mail du tuteur du cours » — la valeur stockée est inchangée par rapport aux versions antérieures de Chamilo, mais l’option est libellée « tuteur » dans l’interface)


### `survey_mark_question_as_required`

**Marquer toutes les questions d’enquête comme « obligatoires » par défaut**

[inféré] Marquer automatiquement toutes les questions d’enquête nouvellement créées comme réponses obligatoires par défaut.

*Par défaut : `false`*