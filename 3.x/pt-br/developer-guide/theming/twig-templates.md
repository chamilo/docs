# Templates Twig

O Chamilo usa Twig para páginas renderizadas no servidor. Os templates ficam em `src/CoreBundle/Resources/views/` e são referenciados com o prefixo de namespace `@ChamiloCore/` (por exemplo, `@ChamiloCore/Layout/base-layout.html.twig`).

Não existe um diretório `templates/` no nível superior — todos os templates Twig estão em `src/CoreBundle/Resources/views/`.

## Como Twig e Vue Coexistem

A maioria das páginas segue este fluxo:

1. Um controller Symfony renderiza um template Twig que estende um layout.
2. O layout inclui `vue_setup.html.twig`, que emite `<div id="app">` e injeta globais de runtime (`window.user`, `window.breadcrumb`, etc.) via `vue_js_setup.html.twig`.
3. O Vue monta em `#app` e trata toda a renderização da UI dentro desse elemento.
4. A aplicação Vue comunica-se com o backend via a REST API.

Para páginas legadas ainda não migradas para Vue, o Symfony renderiza o HTML completo da página via Twig e o conteúdo é colocado dentro de `#sectionMainContent`. O Vue ainda monta (fornecendo o shell da barra lateral e da barra superior), mas a área de conteúdo principal é HTML renderizado no servidor.

## Templates de Layout

Todos os layouts estendem `@ChamiloCore/Layout/base-layout.html.twig`, que fornece a estrutura de `<html>`, `<head>` e `<body>`. Variantes de layout disponíveis:

| Template | Finalidade |
|----------|---------|
| `Layout/base-layout.html.twig` | Template raiz — shell `<html>`, importa Macros, emite `<head>` e `<body>` |
| `Layout/layout.html.twig` | Layout completo padrão com barra lateral, barra superior e área de conteúdo |
| `Layout/layout_one_col.html.twig` | Layout de uma coluna (sem barra lateral) |
| `Layout/layout_two_col.html.twig` | Layout de duas colunas |
| `Layout/layout_content.html.twig` | Invólucro somente de conteúdo |
| `Layout/layout_empty.html.twig` | Layout vazio com chrome mínimo |
| `Layout/no_layout.html.twig` | Sem cabeçalho/rodapé; o conteúdo vai diretamente dentro de `<body>` |
| `Layout/no_layout_scorm.html.twig` | Layout nu para frames de conteúdo SCORM |
| `Layout/blank.html.twig` | Página completamente em branco |
| `Layout/skill_layout.html.twig` | Layout para a página da roda de competências |

## Partials Principais

| Template | Finalidade |
|----------|---------|
| `Layout/head.html.twig` | Conteúdo de `<head>`: meta tags, todas as entradas CSS do Encore, `colors.css` do tema, entradas JS legadas, tags OpenGraph/Twitter |
| `Layout/foot.html.twig` | Fim do body: ponto de entrada JS do Vue, injeção de `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emite `<div id="app">` e inclui `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injeta `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | Banner de consentimento de cookies GDPR |
| `Layout/footer.html.twig` | Barra de rodapé da página |
| `Layout/course_navigation.html.twig` | Breadcrumb de navegação das ferramentas do curso |

## Integração com Webpack Encore

`head.html.twig` carrega CSS para todas as entradas; `foot.html.twig` carrega o bundle JS do Vue:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

As entradas JS legadas (`legacy_app`, `legacy_lp`, etc.) são carregadas em `<head>` porque as páginas PHP legadas dependem de elas estarem disponíveis antes de o DOM estar pronto.

## Macros

Macros Twig reutilizáveis estão em `Macros/` e são importadas no topo de `base-layout.html.twig`:

| Arquivo de macro | Fornece |
|-----------|---------|
| `Macros/box.html.twig` | Auxiliares de caixa de conteúdo |
| `Macros/actions.html.twig` | Renderização de botões de ação |
| `Macros/buttons.html.twig` | Auxiliares HTML de botões |
| `Macros/headers.html.twig` | Auxiliares de cabeçalho de página |
| `Macros/image.html.twig` | Auxiliares de renderização de imagens |
| `Macros/modals.html.twig` | Auxiliares de diálogos modais |

Uso dentro de qualquer template que estenda `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Templates Vue Personalizados

O Chamilo oferece suporte a substituições de páginas Vue por instalação via a variável de ambiente `APP_CUSTOM_VUE_TEMPLATE`. Quando definida, o build do Webpack expõe uma constante `ENV_CUSTOM_VUE_TEMPLATE` via `DefinePlugin`, e o roteador Vue importa condicionalmente componentes de substituição de `var/vue_templates/`.

Locais de substituição atuais:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Somente os arquivos presentes em `var/vue_templates/` são substituídos — todas as demais páginas e componentes usam os originais do núcleo.

## Referência de Funções Twig

Principais funções Twig disponíveis em todos os templates (registradas em `ChamiloExtension`):

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Lê uma configuração da plataforma |
| `chamilo_settings_has('ns.key')` | Verifica se uma configuração existe |
| `chamilo_settings_all()` | Obtém todas as configurações como um array |
| `theme_asset('path')` | URL de um asset no tema ativo |
| `theme_asset_link_tag('path')` | Tag `<link>` para um arquivo CSS do tema |
| `theme_asset_script_tag('path')` | Tag `<script>` para um arquivo JS do tema |
| `theme_asset_base64('path')` | URI de dados Base64 para um asset do tema |
| `theme_logo('header'\|'email')` | URL do logotipo preferencial |
| `is_allowed_to_edit(...)` | Auxiliar de verificação de permissão |