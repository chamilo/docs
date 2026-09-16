# Plugins de Ferramentas de Curso

Os plugins de ferramentas de curso adicionam novas ferramentas à página inicial do curso, juntamente com as ferramentas nativas como Documentos, Exercícios e Fóruns.

## Como Funcionam os Plugins de Ferramentas de Curso

Quando um plugin se regista como ferramenta de curso:

1. Aparece na grelha de ferramentas da página inicial do curso
2. Os professores podem mostrá-lo/ocultá-lo como qualquer outra ferramenta
3. Ao clicar na ferramenta, abre-se a interface do plugin no contexto do curso

## Registar-se como Ferramenta de Curso

Na classe do plugin, defina `$isCoursePlugin = true`. Para adicionar automaticamente um ícone de ferramenta à página inicial do curso, defina também `$addCourseTool = true`:

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

## Definições por Curso

Defina campos de configuração ao nível do curso através da propriedade `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Estes aparecem no painel de definições do curso e podem ser validados ao redefinir `validateCourseSetting(string $variable)` (devolver `false` para rejeitar um valor) ou tratados através de `course_settings_updated(array $values)`.

## Instalação e Desinstalação

Para registar os campos do plugin em todos os cursos existentes na instalação:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Para instalar num único curso (por exemplo, quando um novo curso é criado):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Para remover campos de um curso específico:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Pontos de Integração

Os plugins de ferramentas de curso integram-se através de:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Regista o plugin como ferramenta no curso
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Resolve quais as ferramentas (incluindo ferramentas de plugins) que aparecem na página inicial do curso
* A ferramenta aparece na coleção `CTool` do curso

## Contexto do Curso

Quando um formando clica na ferramenta do seu plugin, o código do plugin é executado no contexto do curso. Pode aceder a:

* O curso atual (via `api_get_course_id()` ou o CID request store)
* A sessão atual (se aplicável)
* O utilizador atual
* As definições do plugin ao nível do curso

## Exemplos

Plugins de ferramentas de curso nativos:

* **BigBlueButton** (`Bbb/`) — Videoconferência dentro dos cursos
* **Zoom** (`Zoom/`) — Reuniões Zoom dentro dos cursos
* **OnlyOffice** (`Onlyoffice/`) — Edição de documentos dentro dos cursos