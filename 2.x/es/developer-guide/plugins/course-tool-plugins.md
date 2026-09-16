# Plugins de Herramientas de Curso

Los plugins de herramientas de curso añaden nuevas herramientas a la página principal del curso junto con las herramientas integradas como Documentos, Ejercicios y Foros.

## Cómo Funcionan los Plugins de Herramientas de Curso

Cuando un plugin se registra como una herramienta de curso:

1. Aparece en la cuadrícula de herramientas de la página principal del curso
2. Los profesores pueden mostrarlo u ocultarlo como cualquier otra herramienta
3. Al hacer clic en la herramienta, se abre la interfaz del plugin dentro del contexto del curso

## Registro como Herramienta de Curso

En tu clase de plugin, establece `$isCoursePlugin = true`. Para añadir automáticamente un ícono de herramienta a la página principal del curso, también establece `$addCourseTool = true`:

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

## Configuraciones por Curso

Define campos de configuración a nivel de curso mediante la propiedad `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Estos aparecen en el panel de configuraciones del curso y pueden validarse sobrescribiendo `validateCourseSetting(string $variable)` (devuelve `false` para rechazar un valor) o actuar sobre ellos mediante `course_settings_updated(array $values)`.

## Instalación y Desinstalación

Para registrar los campos del plugin en todos los cursos existentes durante la instalación:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Para instalar en un solo curso (por ejemplo, cuando se crea un nuevo curso):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Para eliminar campos de un curso específico:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Puntos de Integración

Los plugins de herramientas de curso se integran a través de:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registra el plugin como una herramienta en el curso
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Determina qué herramientas (incluidas las de plugins) aparecen en la página principal del curso
* La herramienta aparece en la colección `CTool` del curso

## Contexto del Curso

Cuando un estudiante hace clic en la herramienta de tu plugin, el código del plugin se ejecuta dentro del contexto del curso. Puedes acceder a:

* El curso actual (a través de `api_get_course_id()` o el almacén de solicitudes CID)
* La sesión actual (si aplica)
* El usuario actual
* Configuraciones del plugin a nivel de curso

## Ejemplos

Plugins de herramientas de curso integrados:

* **BigBlueButton** (`Bbb/`) — Videoconferencias dentro de los cursos
* **Zoom** (`Zoom/`) — Reuniones de Zoom dentro de los cursos
* **OnlyOffice** (`Onlyoffice/`) — Edición de documentos dentro de los cursos