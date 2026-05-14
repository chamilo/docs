# Plugins de Ferramentas de Curso

Os plugins de ferramentas de curso adicionam novas ferramentas à página inicial do curso, ao lado de ferramentas integradas como Documentos, Exercícios e Fóruns.

## Como Funcionam os Plugins de Ferramentas de Curso

Quando um plugin se registra como uma ferramenta de curso:

1. Ele aparece na grade de ferramentas da página inicial do curso
2. Os professores podem mostrá-lo ou ocultá-lo como qualquer outra ferramenta
3. Clicar na ferramenta abre a interface do plugin dentro do contexto do curso

## Registrando como uma Ferramenta de Curso

Na sua classe de plugin, defina `$isCoursePlugin = true`. Para adicionar automaticamente um ícone de ferramenta à página inicial do curso, defina também `$addCourseTool = true`:

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

## Configurações por Curso

Defina campos de configuração no nível do curso por meio da propriedade `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

Esses campos aparecem no painel de configurações do curso e podem ser validados sobrescrevendo `validateCourseSetting(string $variable)` (retorne `false` para rejeitar um valor) ou podem ser acionados por meio de `course_settings_updated(array $values)`.

## Instalação e Desinstalação

Para registrar os campos do plugin em todos os cursos existentes durante a instalação:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

Para instalar em um único curso (por exemplo, quando um novo curso é criado):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

Para remover campos de um curso específico:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## Pontos de Integração

Os plugins de ferramentas de curso se integram por meio de:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — Registra o plugin como uma ferramenta no curso
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — Determina quais ferramentas (incluindo ferramentas de plugin) aparecem na página inicial do curso
* A ferramenta aparece na coleção `CTool` do curso

## Contexto do Curso

Quando um aluno clica na ferramenta do seu plugin, o código do plugin é executado dentro do contexto do curso. Você pode acessar:

* O curso atual (por meio de `api_get_course_id()` ou do armazenamento de solicitação CID)
* A sessão atual (se aplicável)
* O usuário atual
* Configurações do plugin no nível do curso

## Exemplos

Plugins de ferramentas de curso integrados:

* **BigBlueButton** (`Bbb/`) — Videoconferência dentro dos cursos
* **Zoom** (`Zoom/`) — Reuniões Zoom dentro dos cursos
* **OnlyOffice** (`Onlyoffice/`) — Edição de documentos dentro dos cursos