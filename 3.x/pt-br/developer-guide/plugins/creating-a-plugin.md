# Criando um Plugin

Este guia percorre a criação de um plugin básico do Chamilo. Para mais detalhes, consulte a [página wiki de desenvolvimento de plugins](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Passo 1: Criar o Diretório do Plugin

Crie um diretório em `public/plugin/`. O nome do diretório deve corresponder ao identificador do seu plugin:

```
public/plugin/MyPlugin/
```

## Passo 2: Definir a Classe do Plugin

Crie `src/MyPluginPlugin.php`. A classe estende `Plugin` e segue o padrão singleton:

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

### Tipos de Configuração Disponíveis

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

Para configurações `select`:

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
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Passo 3: Criar plugin.php

`plugin.php` na raiz do plugin é **obrigatório**. Ele deve atribuir `$plugin_info`:

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

Implemente a criação/exclusão efetiva do esquema dentro da classe usando o `SchemaTool` do Doctrine.

## Passo 5: Adicionar Traduções

Crie arquivos de idioma em `lang/` usando códigos de locale (por exemplo, `en_US.php`, `fr_FR.php`, `es.php`). O fallback é `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Acesse as traduções via `$plugin->get_lang('key')`.

## Passo 6: Injetar Conteúdo via Regiões de Exibição

Os plugins podem injetar HTML em 18 regiões predefinidas da interface. O mecanismo que renderiza uma região depende de qual ela é:

* **`course_tool_plugin`** é a única região renderizada ao sobrescrever `renderRegion(string $region): string` na classe do seu plugin. Ela é chamada (via `PluginRegionController`) apenas para um plugin com escopo de curso (`is_course_plugin`) enquanto uma página de curso está aberta:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **As 16 regiões gerais** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — são renderizadas ao incluir o `index.php` do próprio plugin, e não `renderRegion()`. O framework define `$plugin_info['current_region']` antes de incluir esse arquivo, de modo que ele pode tanto fazer `echo` de HTML diretamente para aquela região quanto declarar templates Twig para renderizar via `$plugin_info['templates']`:

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  `public/plugin/HelloWorld/index.php` é um exemplo completo e funcional — o HelloWorld não sobrescreve `renderRegion()` de forma alguma; toda região que ele preenche passa por `index.php`.

* **`menu_administrator`** é um caso especial reservado a links exclusivos de administrador exibidos no painel de administração legado, e não aos dois mecanismos acima. `Dashboard` e `CleanDeletedFiles` são plugins reais que o utilizam.

Qualquer que seja o mecanismo usado, um administrador ainda precisa ativar a(s) região(ões) para o seu plugin no botão **Regiões** ao lado dele na página **Gerenciar plugins** (veja o [Passo 9](#step-9-activate)) — um plugin não renderiza nada em uma região que não tenha sido explicitamente habilitada ali.

## Passo 7: Reagir a Eventos da Plataforma (Opcional)

Plugins podem reagir a eventos da plataforma usando subscribers de eventos do Symfony. Crie um arquivo terminando em `EventSubscriber.php` dentro de `src/EventSubscriber/` — ele é registrado automaticamente via `PluginEventSubscriberPass`.

Dois requisitos, ou o subscriber é ignorado silenciosamente: a classe deve estar no **namespace global** (o pass a resolve a partir do nome do arquivo), e você deve executar `composer dump-autoload` após adicioná-la (`public/plugin` é uma entrada de classmap). Verifique o resultado com `php bin/console debug:event-dispatcher <event.name>`.

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
        // Plugin classes are not Symfony services — use the create() singleton.
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
        // your logic here
    }
}
```

Consulte `src/CoreBundle/Event/Events.php` para a lista completa de eventos disponíveis (usuário, curso, sessão, LP, exercício, portfólio, autenticação e outros).

### Limpeza quando um curso, sessão ou usuário é excluído

Se o seu plugin armazena linhas associadas a um curso, sessão ou usuário, inscreva-se em `Events::COURSE_DELETED`, `Events::SESSION_DELETED` ou `Events::USER_DELETED`. Essas são a única forma de limpar — os antigos métodos `doWhenDeleting*` não existem mais. Três regras se aplicam a esses listeners:

* **Atue em `AbstractEvent::TYPE_PRE`** — o evento dispara antes de a linha ser removida, o único momento em que sua chave estrangeira ainda resolve e os dados ainda são legíveis. `USER_DELETED` também dispara como `TYPE_POST`, portanto a verificação não é opcional nesse caso.
* **Proteja com instalado, não habilitado** — use `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. Suas linhas sobrevivem à desativação do plugin, ou à habilitação apenas em outra URL de acesso, e a chave estrangeira bloqueia a exclusão de qualquer forma.
* **Em `USER_DELETED`, verifique `$event->isHardDelete()`** — uma exclusão lógica (soft delete) mantém o usuário restaurável, portanto seus dados devem sobreviver.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

O plugin `StudentFollowUp` é a referência para usuários; `Bbb`, `BuyCourses` e `EmbedRegistry` trazem os equivalentes de curso e sessão.

## Passo 8: Hooks de Ciclo de Vida

Sobrescreva estes métodos na classe do seu plugin para responder a ações da plataforma:

| Método | Disparado quando |
|--------|----------------|
| `install()` | O plugin é ativado |
| `uninstall()` | O plugin é removido |
| `performActionsAfterConfigure()` | O administrador salva o formulário de configuração |
| `course_settings_updated(array $values)` | As configurações no nível do curso mudam |
| `validateCourseSetting(string $variable)` | Configuração do curso é salva (retorne `false` para rejeitar) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` e `doWhenDeletingSession()` foram removidos, juntamente com o gatilho `AppPlugin::performActionsWhenDeletingItem()` que os chamava — sobrescrevê-los agora não faz nada. Use os eventos de exclusão do [Passo 7](#cleaning-up-when-a-course-session-or-user-is-deleted) em vez disso.

## Passo 9: Ativar

Entre como administrador e navegue até o bloco **Plataforma** do painel de administração e, em seguida, **Plugins** — isso abre a página **Gerenciar plugins**. Encontre o seu plugin e clique em **Instalar**; depois de instalado, clique em **Habilitar** para ativá-lo (um plugin habilitado exibe um botão **Desabilitar** em vez disso).

## Dicas

* **Siga plugins existentes como exemplos** — `public/plugin/HelloWorld/` e `public/plugin/TopLinks/` são boas referências simples
* **Use traduções** — Sempre use o sistema `lang/` para textos visíveis ao usuário
* **Limpe na desinstalação** — Remova tabelas do banco de dados e configurações no script de desinstalação
* **Verifique o estado habilitado** — Em event subscribers, chame `$this->plugin->isEnabled()` antes de executar a lógica. A exceção é a limpeza na exclusão: proteja com instalado, pois as linhas sobrevivem à desabilitação do plugin