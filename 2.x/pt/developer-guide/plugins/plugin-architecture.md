# Arquitetura de Plugins

## Localização dos Plugins

Os plugins são armazenados em `public/plugin/`. Cada plugin possui seu próprio diretório:

```
public/plugin/
├── Bbb/                    # Integração com BigBlueButton
├── Zoom/                   # Integração com Zoom
├── Onlyoffice/             # Edição de documentos com OnlyOffice
├── XApi/                   # xAPI/Tin Can
├── ...                     # plugins incluídos são fornecidos em public/plugin/
```

## Estrutura de um Plugin

Um diretório típico de plugin contém:

```
public/plugin/MyPlugin/
├── plugin.php              # OBRIGATÓRIO — define $plugin_info
├── install.php             # Script de instalação
├── uninstall.php           # Script de desinstalação
├── index.php               # Ponto de entrada para renderização de região (se aplicável)
├── admin.php               # Interface de administração (opcional)
├── lang/                   # Arquivos de tradução (códigos de localidade: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Classe principal do plugin (estende Plugin)
│   ├── Entity/                   # Entidades Doctrine (descobertas automaticamente)
│   ├── Repository/               # Repositórios Doctrine
│   └── EventSubscriber/          # Assinantes de eventos Symfony (registrados automaticamente)
├── templates/              # Modelos Twig
└── resources/              # Ativos CSS/JS
```

## Classe de Plugin

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

### Propriedades Principais da Classe

| Propriedade | Tipo | Efeito |
|-------------|------|--------|
| `$isCoursePlugin` | bool | Registra o plugin como uma ferramenta de curso |
| `$isAdminPlugin` | bool | Adiciona uma página de interface de administração |
| `$isMailPlugin` | bool | Integra com o sistema de e-mail |
| `$addCourseTool` | bool | Adiciona um ícone à página inicial do curso |
| `$course_settings` | array | Define campos de configuração por curso |

## Ciclo de Vida do Plugin

1. **Instalação** — O administrador ativa o plugin, executando `install.php`
2. **Configuração** — As configurações são definidas e gerenciadas pelo painel de administração; armazenadas em `access_url_rel_plugin` (suporta multi-tenant)
3. **Execução** — O plugin injeta conteúdo em regiões de exibição ou reage a eventos da plataforma
4. **Desativação** — O plugin é desativado, mas seus dados são preservados
5. **Desinstalação** — Executa `uninstall.php` para limpar dados e tabelas

## Regiões de Exibição

Os plugins injetam HTML em 18 regiões predefinidas do frontend Vue ao sobrescrever `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>Conteúdo do rodapé do Meu Plugin</p>';
}
```

Regiões disponíveis: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## Integração com Symfony

### Assinantes de Eventos

Arquivos terminados em `EventSubscriber.php` colocados dentro de `src/EventSubscriber/` são registrados automaticamente via `PluginEventSubscriberPass`. Eles implementam `EventSubscriberInterface` e reagem a eventos definidos em `src/CoreBundle/Event/Events.php`.

Como a classe do plugin (`MyPluginPlugin`) não é um serviço Symfony, ela não pode ser injetada automaticamente no construtor do assinante. Use o singleton `create()` em vez disso:

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

Entidades Doctrine colocadas em `src/Entity/` são descobertas automaticamente por `PluginEntityPass`. Use atributos do PHP 8 para mapeamento. O namespace deve seguir `Chamilo\PluginBundle\{PluginName}`. Use prefixos de nome de tabela únicos (por exemplo, `my_plugin_*`) para evitar colisões.

---
### Serviço PluginHelper

Para acessar o estado do plugin a partir de serviços principais do Symfony, injete `PluginHelper` em vez de instanciar diretamente a classe do plugin:

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
|--------|------------|
| `isPluginEnabled(string $name): bool` | Verifica se um plugin está instalado e ativo para a URL de acesso atual |
| `loadLegacyPlugin(string $name): ?object` | Instancia e retorna o singleton do plugin |
| `getPluginSetting(string $name, string $key): mixed` | Lê um único valor de configuração do plugin |
| `getPluginOverrides(string $name): array` | Obtém substituições do `plugin.yaml` (padrões + específicos da URL de acesso) para um plugin |

## Referências de Arquivos Principais

| Arquivo | Finalidade |
|------|------------|
| `public/main/inc/lib/plugin.class.php` | Classe base do plugin |
| `public/main/inc/lib/plugin.lib.php` | Gerenciador de plugins |
| `src/CoreBundle/Entity/Plugin.php` | Entidade Doctrine do plugin |
| `src/CoreBundle/Helpers/PluginHelper.php` | Serviço PluginHelper |
| `src/CoreBundle/Event/Events.php` | Constantes de eventos |
| `public/plugin/HelloWorld/` | Exemplo mínimo de plugin |
| `public/plugin/TopLinks/` | Exemplo simples de plugin |