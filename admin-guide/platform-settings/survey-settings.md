# Paramètres des sondages

Paramètres par défaut et comportement de l'outil **Sondages**.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Sondages**. Cette catégorie contient **12 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `extend_rights_for_coach_on_survey`

**Étendre les droits des coachs sur les sondages**

Activer cette option permettra aux coachs de créer et de modifier des sondages.

*Par défaut : `true`*

### `hide_survey_edition`

**Empêcher l'édition des sondages**

Empêche l'édition des sondages listés ici (par code). Utilisez * pour empêcher l'édition de tous les sondages.

### `hide_survey_reporting_button`

**Masquer le bouton de rapport des sondages**

Permet aux administrateurs de masquer le bouton de rapport des sondages si les sondages sont utilisés pour évaluer les enseignants.

*Par défaut : `false`*

### `show_pending_survey_in_menu`

**Afficher "Sondages en attente" dans le menu**

Affiche un élément de menu permettant aux utilisateurs d'accéder à leurs sondages en attente.

*Par défaut : `false`*

### `show_surveys_base_in_sessions`

**Afficher les sondages du cours de base dans tous les cours de session**

[inferré] Rend les sondages du cours de base visibles et accessibles aux apprenants dans tous les cours de session associés.

*Par défaut : `false`*

### `survey_additional_teacher_modify_actions`

**Ajouter des actions supplémentaires (sous forme de liens) aux listes de sondages pour les enseignants**

Ajoute des actions (généralement liées à des plugins) dans la liste des sondages. Utilisez la syntaxe de tableau ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Permettre aux enseignants de modifier les questions des sondages après les réponses des étudiants**

[inferré] Permet aux formateurs de modifier les questions des sondages même après que les apprenants ont soumis leurs réponses.

*Par défaut : `false`*

### `survey_anonymous_show_answered`

**Permettre aux enseignants de voir qui a répondu dans les sondages anonymes**

Permet aux enseignants de voir quels apprenants ont déjà répondu à un sondage anonyme. Cela n'apparaît que lorsque plus d'un utilisateur a répondu, afin qu'il reste difficile d'identifier qui a répondu quoi.

*Par défaut : `false`*

### `survey_backwards_enable`

**Activer le bouton 'question précédente' dans les sondages**

[inferré] Active un bouton de navigation "question précédente" pour permettre aux apprenants de revoir les questions antérieures du sondage.

*Par défaut : `false`*

### `survey_duplicate_order_by_name`

**Trier par nom d'étudiant lors de l'utilisation de la fonctionnalité de duplication de sondage**

La fonctionnalité de duplication de sondage est destinée aux enseignants et vise à leur demander de donner leur appréciation sur chaque étudiant dans un ordre précis. Cette option trie les questions par le nom de famille de l'apprenant.

*Par défaut : `true`*

### `survey_email_sender_noreply`

**Expéditeur des e-mails de sondage (no-reply)**

Les invitations aux sondages doivent-elles utiliser l'adresse e-mail du coach ou l'adresse no-reply définie dans la section de configuration principale ?

*Par défaut : `coach`*

### `survey_mark_question_as_required`

**Marquer toutes les questions des sondages comme 'obligatoires' par défaut**

[inferré] Marque automatiquement toutes les questions de sondage nouvellement créées comme des réponses obligatoires par défaut.

*Par défaut : `false`*