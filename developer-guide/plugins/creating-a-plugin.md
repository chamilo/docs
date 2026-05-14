# Criando um Plugin

Este guia aborda a criação de um plugin básico para o Chamilo. Para mais detalhes, consulte a [página do wiki sobre desenvolvimento de plugins](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Passo 1: Criar o Diretório do Plugin

Crie um diretório em `public/plugin/`. O nome do diretório deve corresponder ao identificador do seu plugin:

```
public/plugin/MyPlugin/
```

## Passo 2: Definir a Classe do Plugin

Crie o arquivo `src/MyPluginPlugin.php`. A classe estende `Plugin` e segue o padrão singleton:

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Tipos de Configurações Disponíveis

| Tipo       | Descrição                     |
|------------|-------------------------------|
| `boolean`  | Caixa de seleção ligado/desligado |
| `text`     | Entrada de texto de linha única |
| `select`   | Menu suspenso (forneça um array `options`) |
| `wysiwyg`  | Editor de texto rico          |
| `html`     | Campo HTML bruto              |
| `checkbox` | Caixa de seleção              |
| `user`     | Seletor de usuário            |

Para configurações do tipo `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Acesse as configurações em tempo de execução:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // valor único
$all  = $plugin->get_settings();       // todas as configurações
```

## Passo 3: Criar o arquivo plugin.php

O arquivo `plugin.php` na raiz do plugin é **obrigatório**. Ele deve atribuir `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Passo 4: Criar Scripts de Instalação e Desinstalação

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

Implemente a criação/exclusão do esquema dentro da classe usando `SchemaTool` do Doctrine.

## Passo 5: Adicionar Traduções

Crie arquivos de idioma em `lang/` usando códigos de localidade (por exemplo, `en_US.php`, `fr_FR.php`, `es_ES.php`). O fallback é `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Acesse traduções via `$plugin->get_lang('key')`.

## Passo 6: Injetar Conteúdo via Regiões de Exibição

Plugins podem injetar HTML em 18 regiões predefinidas do frontend Vue. Sobrescreva `renderRegion()` na sua classe:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

Regiões disponíveis incluem: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Passo 7: Reagir a Eventos da Plataforma (Opcional)

Plugins podem reagir a eventos da plataforma usando assinantes de eventos do Symfony. Crie um arquivo terminando em `EventSubscriber.php` dentro de `src/EventSubscriber/` — ele é registrado automaticamente via `PluginEventSubscriberPass`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Classes de plugin não são serviços Symfony — use o singleton create().
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // sua lógica aqui
    }
}
```

Consulte `src/CoreBundle/Event/Events.php` para a lista completa de eventos disponíveis (usuário, curso, sessão, LP, exercício, portfólio, autenticação e mais).

## Passo 8: Ganchos de Ciclo de Vida

Sobrescreva esses métodos na sua classe de plugin para responder a ações da plataforma:

| Método | Disparado quando |
|--------|------------------|
| `install()` | O plugin é ativado |
| `uninstall()` | O plugin é removido |
| `performActionsAfterConfigure()` | O administrador salva o formulário de configuração |
| `course_settings_updated(array $values)` | As configurações no nível do curso são alteradas |
| `validateCourseSetting(string $variable)` | Uma configuração de curso é salva (retorne `false` para rejeitar) |
| `doWhenDeletingUser(int $userId)` | Um usuário é excluído |
| `doWhenDeletingCourse(int $courseId)` | Um curso é excluído |
| `doWhenDeletingSession(int $sessionId)` | Uma sessão é excluída |

## Passo 9: Ativar

Faça login como administrador, navegue até **Gerenciar plugins**, encontre o seu plugin e clique em **Ativar**.

## Dicas

* **Siga plugins existentes como exemplos** — `public/plugin/HelloWorld/` e `public/plugin/TopLinks/` são boas referências simples
* **Use traduções** — Sempre utilize o sistema `lang/` para textos voltados ao usuário
* **Limpe ao desinstalar** — Remova tabelas de banco de dados e configurações no script de desinstalação
* **Verifique o estado de ativação** — Em assinantes de eventos, sempre chame `$this->plugin->isEnabled()` antes de executar a lógica