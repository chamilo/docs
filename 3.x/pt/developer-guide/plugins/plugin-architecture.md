# Arquitetura de Plugins

## Localização dos Plugins

Os plugins são armazenados em `public/plugin/`. Cada plugin possui o seu próprio diretório:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## Estrutura do Plugin

Um diretório típico de plugin contém:

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## Classe do Plugin

Cada plugin estende a classe base `Plugin` (`public/main/inc/lib/plugin.class.php`) e segue o padrão singleton:

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### Propriedades-chave da Classe

| Property | Type | Effect |
|----------|------|--------|
| `$isCoursePlugin` | bool | Registers the plugin as a course tool |
| `$isAdminPlugin` | bool | Adds an admin interface page |
| `$isMailPlugin` | bool | Integrates with the mail system |
| `$addCourseTool` | bool | Adds an icon to the course homepage |
| `$course_settings` | array | Defines per-course configuration fields |

## Ciclo de Vida do Plugin

1. **Instalação** — O administrador ativa o plugin, o que executa `install.php`
2. **Configuração** — As definições são definidas e geridas através do painel de administração; armazenadas em `access_url_rel_plugin` (suporta multi-tenant)
3. **Execução** — O plugin injeta conteúdo nas regiões de apresentação ou reage a eventos da plataforma
4. **Desativação** — O plugin é desativado, mas os seus dados são preservados
5. **Desinstalação** — Executa `uninstall.php` para limpar dados e tabelas

## Regiões de Apresentação

Os plugins injetam HTML em 18 regiões predefinidas do frontend Vue, sobrescrevendo `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

Regiões disponíveis: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integração com Symfony

### Event Subscribers

Ficheiros terminados em `EventSubscriber.php` colocados em `src/EventSubscriber/` são registados automaticamente via `PluginEventSubscriberPass`. Implementam `EventSubscriberInterface` e reagem a eventos definidos em `src/CoreBundle/Event/Events.php`.

Como a classe do plugin (`MyPluginPlugin`) não é um serviço Symfony, não pode ser injetada automaticamente no construtor do subscriber. Utilize o singleton `create()`:

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### Entidades Doctrine

As entidades Doctrine colocadas em `src/Entity/` são descobertas automaticamente por `PluginEntityPass`. Utilize atributos PHP 8 para o mapeamento. O namespace deve seguir `Chamilo\PluginBundle\{PluginName}`. Utilize prefixos de nome de tabela únicos (por exemplo, `my_plugin_*`) para evitar colisões.

### Serviço PluginHelper

Para aceder ao estado de um plugin a partir de serviços Symfony do núcleo, injete `PluginHelper` em vez de instanciar a classe do plugin diretamente:

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

Métodos disponíveis:

| Método | Finalidade |
|--------|---------|
| `isPluginEnabled(string $name): bool` | Verificar se um plugin está instalado e ativo para o URL de acesso atual |
| `loadLegacyPlugin(string $name): ?object` | Instanciar e devolver o singleton do plugin |
| `getPluginSetting(string $name, string $key): mixed` | Ler o valor de uma única definição do plugin |
| `getPluginOverrides(string $name): array` | Obter as substituições de `plugin.yaml` (predefinições + específicas do URL de acesso) de um plugin |

## Referências de Ficheiros do Núcleo

| Ficheiro | Finalidade |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | Classe base do plugin |
| `public/main/inc/lib/plugin.lib.php` | Gestor de plugins |
| `src/CoreBundle/Entity/Plugin.php` | Entidade Doctrine do plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Serviço PluginHelper |
| `src/CoreBundle/Event/Events.php` | Constantes de eventos |
| `public/plugin/HelloWorld/` | Plugin de exemplo mínimo |
| `public/plugin/TopLinks/` | Plugin de exemplo simples |