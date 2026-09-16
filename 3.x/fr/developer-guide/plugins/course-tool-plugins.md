# Plugins d’outils de cours

Les plugins d’outils de cours ajoutent de nouveaux outils à la page d’accueil du cours, aux côtés des outils intégrés tels que Documents, Exercices et Forums.

## Fonctionnement des plugins d’outils de cours

Lorsqu’un plugin s’enregistre comme outil de cours :

1. Il apparaît dans la grille d’outils de la page d’accueil du cours
2. Les enseignants peuvent l’afficher ou le masquer comme n’importe quel autre outil
3. Un clic sur l’outil ouvre l’interface du plugin dans le contexte du cours

## S’enregistrer comme outil de cours

Dans la classe de votre plugin, définissez `$isCoursePlugin = true`. Pour ajouter automatiquement une icône d’outil à la page d’accueil du cours, définissez également `$addCourseTool = true` :

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

Définissez des champs de configuration au niveau du cours via la propriété `$course_settings` :

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Ceux-ci apparaissent dans le panneau des paramètres du cours et peuvent être validés en redéfinissant `validateCourseSetting(string $variable)` (renvoyer `false` pour rejeter une valeur) ou traités via `course_settings_updated(array $values)`.

## Installation et désinstallation

Pour enregistrer les champs du plugin dans tous les cours existants lors de l’installation :

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Pour installer dans un seul cours (par exemple lorsqu’un nouveau cours est créé) :

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Pour retirer les champs d’un cours donné :

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Points d’intégration

Les plugins d’outils de cours s’intègrent via :

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Enregistre le plugin comme outil dans le cours
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Détermine quels outils (y compris les outils de plugins) apparaissent sur la page d’accueil du cours
* L’outil apparaît dans la collection `CTool` du cours

## Contexte de cours

Lorsqu’un apprenant clique sur l’outil de votre plugin, le code de votre plugin s’exécute dans le contexte du cours. Vous pouvez accéder :

* Au cours courant (via `api_get_course_id()` ou le magasin de requête CID)
* À la session courante (le cas échéant)
* À l’utilisateur courant
* Aux paramètres du plugin au niveau du cours

## Exemples

Plugins d’outils de cours intégrés :

* **BigBlueButton** (`Bbb/`) — Visioconférence au sein des cours
* **Zoom** (`Zoom/`) — Réunions Zoom au sein des cours
* **OnlyOffice** (`Onlyoffice/`) — Édition de documents au sein des cours