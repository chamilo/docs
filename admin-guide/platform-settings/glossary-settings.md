---
# Paramètres du glossaire

Comportement de l'outil **Glossaire** du cours.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Glossaire**. Cette catégorie contient **3 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_remove_tags_in_glossary_export`

**Supprimer les balises HTML lors de l'exportation du glossaire**

Lorsque cette option est activée, les balises HTML sont supprimées des définitions des termes du glossaire lors de l'exportation.

*Par défaut : `false`*

### `default_glossary_view`

**Vue par défaut du glossaire**

Choisissez la vue par défaut ('table' ou 'list') qui sera utilisée dans l'outil glossaire.

*Par défaut : `table`*

### `show_glossary_in_extra_tools`

**Afficher les termes du glossaire dans les outils supplémentaires**

À partir d'ici, vous pouvez configurer comment ajouter les termes du glossaire dans les outils supplémentaires tels que le parcours d'apprentissage et l'outil d'exercices.