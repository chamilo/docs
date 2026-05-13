# Plugins d'outils de cours

Les plugins d'outils de cours ajoutent de nouveaux outils à la page d'accueil du cours, aux côtés des outils intégrés tels que Documents, Exercices et Forums.

## Fonctionnement des plugins d'outils de cours

Lorsqu'un plugin s'enregistre en tant qu'outil de cours :

1. Il apparaît dans la grille des outils de la page d'accueil du cours
2. Les enseignants peuvent l'afficher ou le masquer comme tout autre outil
3. Cliquer sur l'outil ouvre l'interface du plugin dans le contexte du cours

## Enregistrement en tant qu'outil de cours

Dans votre classe de plugin, définissez `$isCoursePlugin = true`. Pour ajouter automatiquement une icône d'outil à la page d'accueil du cours, définissez également `$addCourseTool = true` :

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## Paramètres par cours

Définissez les champs de configuration au niveau du cours via la propriété `$course_settings` :

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Ces champs apparaissent dans le panneau des paramètres du cours et peuvent être validés en surchargeant `validateCourseSetting(string $variable)` (retournez `false` pour rejeter une valeur) ou en agissant via `course_settings_updated(array $values)`.

## Installation et désinstallation

Pour enregistrer les champs du plugin dans tous les cours existants lors de l'installation :

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Pour installer dans un seul cours (par exemple, lorsqu'un nouveau cours est créé) :

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Pour supprimer les champs d'un cours spécifique :

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Points d'intégration

Les plugins d'outils de cours s'intègrent via :

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Enregistre le plugin en tant qu'outil dans le cours
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Détermine quels outils (y compris les outils de plugin) apparaissent sur la page d'accueil du cours
* L'outil apparaît dans la collection `CTool` pour le cours

## Contexte du cours

Lorsqu'un apprenant clique sur l'outil de votre plugin, le code de votre plugin s'exécute dans le contexte du cours. Vous pouvez accéder à :

* Le cours actuel (via `api_get_course_id()` ou le magasin de requêtes CID)
* La session actuelle (si applicable)
* L'utilisateur actuel
* Les paramètres du plugin au niveau du cours

## Exemples

Plugins d'outils de cours intégrés :

* **BigBlueButton** (`Bbb/`) — Vidéoconférence au sein des cours
* **Zoom** (`Zoom/`) — Réunions Zoom au sein des cours
* **OnlyOffice** (`Onlyoffice/`) — Édition de documents au sein des cours