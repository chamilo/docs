---
# Paramètres de recherche

Configuration du système de recherche en texte intégral (Xapian).

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Recherche**. Cette catégorie contient **3 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est affiché en monospace. Utilisez-le lors de la création de scripts via l'API ou lorsque vous devez modifier ces paramètres à un niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `search_enabled`

**Fonctionnalité de recherche en texte intégral**

Sélectionnez 'Oui' pour activer cette fonctionnalité. Elle dépend fortement de l'extension Xapian pour PHP, donc cela ne fonctionnera pas si cette extension n'est pas installée sur votre serveur, en version 1.x au minimum.

*Par défaut : `false`*


### `search_prefilter_prefix`

**Champ spécifique pour le préfiltre**

Cette option vous permet de choisir le champ spécifique à utiliser pour le type de recherche avec préfiltre.

### `search_show_unlinked_results`

**Recherche en texte intégral : afficher les résultats non liés**

Lors de l'affichage des résultats d'une recherche en texte intégral, que faut-il faire avec les résultats qui ne sont pas accessibles à l'utilisateur actuel ?

*Par défaut : `true`*