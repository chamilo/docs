# Criar um Plugin

Este guia percorre a criação de um plugin básico do Chamilo. Para mais detalhes, consulte a [página wiki de desenvolvimento de plugins](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## Passo 1: Criar o Diretório do Plugin

Crie um diretório em `public/plugin/`. O nome do diretório deve coincidir com o identificador do seu plugin:

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

### Tipos de Definição Disponíveis

| Tipo | Descrição |
|------|-------------|
| `boolean` | Caixa de seleção ligar/desligar |
| `text` | Campo de texto de uma linha |
| `select` | Lista pendente (forneça o array `options`) |
| `wysiwyg` | Editor de texto rico |
| `html` | Campo HTML em bruto |
| `checkbox` | Caixa de seleção |
| `user` | Seletor de utilizador |

Para definições `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

Aceder às definições em tempo de execução:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## Passo 3: Criar plugin.php

`plugin.php` na raiz do plugin é **obrigatório**. Deve atribuir `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## Passo 4: Criar os Scripts de Instalação e Desinstalação

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

Implemente a criação/eliminação efetiva do esquema dentro da classe utilizando o `SchemaTool` do Doctrine.

## Passo 5: Adicionar Traduções

Crie ficheiros de idioma em `lang/` utilizando códigos de locale (p. ex., `en_US.php`, `fr_FR.php`, `es.php`). O fallback é `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

Aceda às traduções através de `$plugin->get_lang('key')`.

## Passo 6: Injetar Conteúdo através de Regiões de Apresentação

Os plugins podem injetar HTML em 18 regiões predefinidas da interface. O mecanismo que renderiza uma região depende de qual ela é:

* **`course_tool_plugin`** é a única região renderizada ao sobrescrever `renderRegion(string $region): string` na classe do plugin. É chamada (via `PluginRegionController`) apenas para um plugin com âmbito de curso (`is_course_plugin`) enquanto uma página de curso está aberta:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **As 16 regiões gerais** — `content_bottom`, `content_top`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_bottom`, `menu_top`, `pre_footer` — são renderizadas ao incluir o `index.php` do próprio plugin, e não `renderRegion()`. O framework define `$plugin_info['current_region']` antes de incluir esse ficheiro, pelo que este pode `echo` HTML diretamente para essa região ou declarar templates Twig a renderizar via `$plugin_info['templates']`:

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

  `public/plugin/HelloWorld/index.php` é um exemplo completo e funcional — o HelloWorld não sobrescreve `renderRegion()` de todo; todas as regiões que preenche passam por `index.php`.

* **`menu_administrator`** é um caso especial reservado a ligações exclusivas de administrador apresentadas no painel de administração legado, e não aos dois mecanismos acima. `Dashboard` e `CleanDeletedFiles` são plugins reais que o utilizam.

Qualquer que seja o mecanismo utilizado, um administrador ainda tem de ativar a(s) região(ões) para o seu plugin a partir do botão **Regiões** junto a ele na página **Gerir plugins** (consulte o [Passo 9](#step-9-activate)) — um plugin não renderiza nada numa região que não tenha sido explicitamente ativada aí.

## Passo 7: Reagir a Eventos da Plataforma (Opcional)

Os plugins podem reagir a eventos da plataforma através de subscritores de eventos do Symfony. Crie um ficheiro que termine em `EventSubscriber.php` dentro de `src/EventSubscriber/` — é registado automaticamente via `PluginEventSubscriberPass`.

Dois requisitos, ou o subscritor é ignorado silenciosamente: a classe deve estar no **espaço de nomes global** (o pass resolve-a a partir do nome do ficheiro) e deve executar `composer dump-autoload` após a adicionar (`public/plugin` é uma entrada de classmap). Verifique o resultado com `php bin/console debug:event-dispatcher <event.name>`.

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

Consulte `src/CoreBundle/Event/Events.php` para a lista completa de eventos disponíveis (utilizador, curso, sessão, LP, exercício, portefólio, autenticação e mais).

### Limpeza quando um curso, sessão ou utilizador é eliminado

Se o seu plugin armazenar linhas indexadas por um curso, sessão ou utilizador, subscreva `Events::COURSE_DELETED`, `Events::SESSION_DELETED` ou `Events::USER_DELETED`. Estas são a única forma de limpar — os antigos métodos `doWhenDeleting*` já não existem. Aplicam-se três regras a estes listeners:

* **Atue em `AbstractEvent::TYPE_PRE`** — o evento dispara antes de a linha ser removida, o único momento em que a sua chave estrangeira ainda resolve e os dados ainda são legíveis. `USER_DELETED` também dispara como `TYPE_POST`, pelo que a verificação não é opcional nesse caso.
* **Proteja com instalado, não ativado** — use `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. As suas linhas sobrevivem à desativação do plugin, ou à ativação apenas noutro URL de acesso, e a chave estrangeira bloqueia a eliminação de qualquer forma.
* **Em `USER_DELETED`, verifique `$event->isHardDelete()`** — uma eliminação suave mantém o utilizador restabelecível, pelo que os seus dados devem sobreviver.

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

O plugin `StudentFollowUp` é a referência para utilizadores; `Bbb`, `BuyCourses` e `EmbedRegistry` trazem os equivalentes de curso e sessão.

## Passo 8: Ganchos de Ciclo de Vida

Sobrescreva estes métodos na classe do seu plugin para responder a ações da plataforma:

| Método | Disparado quando |
|--------|----------------|
| `install()` | O plugin é ativado |
| `uninstall()` | O plugin é removido |
| `performActionsAfterConfigure()` | O administrador guarda o formulário de configuração |
| `course_settings_updated(array $values)` | As definições ao nível do curso mudam |
| `validateCourseSetting(string $variable)` | Definição de curso guardada (devolver `false` para rejeitar) |

`doWhenDeletingUser()`, `doWhenDeletingCourse()` e `doWhenDeletingSession()` foram removidos, juntamente com o gatilho `AppPlugin::performActionsWhenDeletingItem()` que os chamava — sobrescrevê-los agora não faz nada. Use os eventos de eliminação do [Passo 7](#cleaning-up-when-a-course-session-or-user-is-deleted) em vez disso.

## Passo 9: Ativar

Inicie sessão como administrador e navegue até ao bloco **Plataforma** do painel de administração e, em seguida, **Plugins** — isto abre a página **Gerir plugins**. Encontre o seu plugin e clique em **Instalar**; uma vez instalado, clique em **Ativar** para o ativar (um plugin ativado mostra um botão **Desativar** em vez disso).

## Dicas

* **Siga plugins existentes como exemplos** — `public/plugin/HelloWorld/` e `public/plugin/TopLinks/` são boas referências simples
* **Use traduções** — Utilize sempre o sistema `lang/` para texto visível ao utilizador
* **Limpe na desinstalação** — Remova tabelas da base de dados e definições no script de desinstalação
* **Verifique o estado de ativação** — Nos subscritores de eventos, chame `$this->plugin->isEnabled()` antes de executar a lógica. A exceção é a limpeza na eliminação: proteja com instalado em vez disso, uma vez que as linhas sobrevivem à desativação do plugin