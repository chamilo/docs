# Plugins de herramientas de curso

Los plugins de herramientas de curso añaden nuevas herramientas a la página de inicio del curso junto a las herramientas integradas como Documentos, Ejercicios y Foros.

## Cómo funcionan los plugins de herramientas de curso

Cuando un plugin se registra como herramienta de curso:

1. Aparece en la cuadrícula de herramientas de la página de inicio del curso
2. Los profesores pueden mostrarlo u ocultarlo como cualquier otra herramienta
3. Al hacer clic en la herramienta se abre la interfaz del plugin dentro del contexto del curso

## Registro como herramienta de curso

En la clase de su plugin, establezca `$isCoursePlugin = true`. Para añadir automáticamente un icono de herramienta a la página de inicio del curso, establezca también `$addCourseTool = true`:

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

## Ajustes por curso

Defina campos de configuración a nivel de curso mediante la propiedad `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Estos aparecen en el panel de ajustes del curso y pueden validarse sobrescribiendo `validateCourseSetting(string $variable)` (devuelva `false` para rechazar un valor) o procesarse mediante `course_settings_updated(array $values)`.

## Instalación y desinstalación

Para registrar los campos del plugin en todos los cursos existentes al instalar:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Para instalar en un único curso (p. ej., cuando se crea un curso nuevo):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Para eliminar campos de un curso concreto:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Puntos de integración

Los plugins de herramientas de curso se integran a través de:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registra el plugin como herramienta en el curso
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Resuelve qué herramientas (incluidas las de plugins) aparecen en la página de inicio del curso
* La herramienta aparece en la colección `CTool` del curso

## Contexto del curso

Cuando un alumno hace clic en la herramienta de su plugin, el código del plugin se ejecuta dentro del contexto del curso. Puede acceder a:

* El curso actual (mediante `api_get_course_id()` o el almacén de peticiones CID)
* La sesión actual (si corresponde)
* El usuario actual
* Los ajustes del plugin a nivel de curso

## Ejemplos

Plugins de herramientas de curso integrados:

* **BigBlueButton** (`Bbb/`) — Videoconferencia dentro de los cursos
* **Zoom** (`Zoom/`) — Reuniones de Zoom dentro de los cursos
* **OnlyOffice** (`Onlyoffice/`) — Edición de documentos dentro de los cursos