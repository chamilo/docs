# Paramètres des langues

Langues disponibles, langue par défaut et manière dont Chamilo détermine la langue à afficher.

Accédez à ces paramètres sous **Administration > Paramètres de configuration > Langues**. Cette catégorie contient **13 paramètres**, listés ci-dessous avec le titre et le commentaire fournis dans les fixtures de paramètres de la plateforme (`SettingsCurrentFixtures.php`).

> Le nom de la variable dans le code est indiqué en monospace. Utilisez-le lors d’un script via l’API ou lorsque vous devez modifier ces paramètres au niveau global en éditant [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Paramètres

### `allow_course_multiple_languages`

**Cours multilingues**

Active les cours gérés dans plus d’une langue. Cette option ajoute un sélecteur de langue dans la page du cours afin de permettre aux utilisateurs de changer facilement, et ajoute un champ extra « multiple_language » aux cours, ce qui permet des procédures de gestion à distance.

*Par défaut : `false`*


### `allow_use_sub_language`

**Autoriser la définition et l’utilisation de sous-langues**

En activant cette option, vous pourrez définir des variantes pour chacun des termes linguistiques utilisés dans l’interface de la plateforme, sous la forme d’une nouvelle langue basée sur une langue existante et l’étendant. Vous trouverez cette option dans la section des langues du panneau d’administration.

*Par défaut : `false`*

### `auto_detect_language_custom_pages`

**Activer la détection automatique de la langue dans les pages personnalisées**

Si vous utilisez des pages personnalisées, activez cette option si vous souhaitez qu’un détecteur de langue y présente la page dans la langue du navigateur de l’utilisateur, ou désactivez-la pour forcer la langue à être la langue par défaut de la plateforme.

*Par défaut : `true`*


### `language_by_resource` **v3**

**Langue par ressource**

Permet d’attribuer une langue spécifique à des ressources individuelles.

*Par défaut : `false`*

### `language_flags_by_country`

**Drapeaux de langue**

Utiliser les drapeaux des pays pour les langues. Cette option n’est pas activée par défaut, car certaines langues ne sont pas strictement rattachées à un pays, ce qui peut engendrer de la frustration chez certains utilisateurs.

*Par défaut : `false`*


### `language_priority_1`

**Langue de plus haute priorité**

Langue principale sélectionnée lorsque plusieurs contextes linguistiques sont définis.

*Par défaut : `course_lang`*


### `language_priority_2`

**Langue de priorité secondaire**

Langue de repli secondaire si la première priorité est indisponible ou hors contexte.

*Par défaut : `user_profil_lang`*


### `language_priority_3`

**Langue de troisième priorité**

Langue de repli tertiaire si les priorités plus élevées échouent.

*Par défaut : `user_selected_lang`*


### `language_priority_4`

**Langue de quatrième priorité**

Dernière option de repli linguistique par ordre de priorité.

*Par défaut : `platform_lang`*


### `platform_language`

**Langue par défaut de la plateforme**

Langue principale, utilisée par défaut lorsqu’aucune langue utilisateur n’est définie.

*Par défaut : `en`*


### `show_different_course_language`

**Afficher les langues des cours**

Afficher la langue de chaque cours, à côté du titre du cours, dans la liste des cours de la page d’accueil

*Par défaut : `true`*


### `show_language_selector_in_menu`

**Sélecteur de langue dans le menu principal**

Afficher un sélecteur de langue dans le menu principal qui met immédiatement à jour la préférence linguistique de l’utilisateur. Cela peut être utile dans les portails multilingues où les apprenants doivent passer d’une langue à une autre pour leur apprentissage.

*Par défaut : `true`*


### `template_activate_language_filter`

**Modèles de documents multilingues**

Permettre de configurer les modèles de documents (au niveau de la plateforme ou du cours) pour des langues spécifiques.

*Par défaut : `false`*