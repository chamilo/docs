# Templates Twig

O Chamilo utiliza Twig para páginas renderizadas no servidor. Os templates residem em `src/CoreBundle/Resources/views/` e são referenciados com o prefixo de namespace `@ChamiloCore/` (por exemplo, `@ChamiloCore/Layout/base-layout.html.twig`).

Não existe um diretório `templates/` no nível superior — todos os templates Twig estão em `src/CoreBundle/Resources/views/`.

## Como Twig e Vue Coexistem

A maioria das páginas segue este fluxo:

1. Um controlador Symfony renderiza um template Twig que estende um layout.
2. O layout inclui `vue_setup.html.twig`, que emite `<div id="app">` e injeta globais de tempo de execução (`window.user`, `window.breadcrumb`, etc.) via `vue_js_setup.html.twig`.
3. O Vue monta em `#app` e trata de toda a renderização da IU dentro desse elemento.
4. A aplicação Vue comunica com o backend através da REST API.

Para páginas legadas ainda não migradas para Vue, o Symfony renderiza o HTML completo da página via Twig e o conteúdo é colocado dentro de `#sectionMainContent`. O Vue ainda monta (fornecendo o invólucro da barra lateral e da barra superior), mas a área de conteúdo principal é HTML renderizado no servidor.

## Templates de Layout

Todos os layouts estendem `@ChamiloCore/Layout/base-layout.html.twig`, que fornece a estrutura de `<html>`, `<head>` e `<body>`. Variantes de layout disponíveis:

| Template | Finalidade |
|----------|---------|
| `Layout/base-layout.html.twig` | Template raiz — invólucro `<html>`, importa Macros, emite `<head>` e `<body>` |
| `Layout/layout.html.twig` | Layout completo padrão com barra lateral, barra superior e área de conteúdo |
| `Layout/layout_one_col.html.twig` | Layout de uma coluna (sem barra lateral) |
| `Layout/layout_two_col.html.twig` | Layout de duas colunas |
| `Layout/layout_content.html.twig` | Invólucro apenas de conteúdo |
| `Layout/layout_empty.html.twig` | Layout vazio com cromo mínimo |
| `Layout/no_layout.html.twig` | Sem cabeçalho/rodapé; o conteúdo vai diretamente para dentro de `<body>` |
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

## Integração Webpack Encore

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

As entradas JS legadas (`legacy_app`, `legacy_lp`, etc.) são carregadas em `<head>` porque as páginas PHP legadas dependem de estarem disponíveis antes de o DOM estar pronto.

## Macros

As macros Twig reutilizáveis estão em `Macros/` e são importadas no topo de `base-layout.html.twig`:

| Ficheiro de macro | Fornece |
|-----------|---------|
| `Macros/box.html.twig` | Auxiliares de caixa de conteúdo |
| `Macros/actions.html.twig` | Renderização de botões de ação |
| `Macros/buttons.html.twig` | Auxiliares HTML de botões |
| `Macros/headers.html.twig` | Auxiliares de cabeçalho de página |
| `Macros/image.html.twig` | Auxiliares de renderização de imagens |
| `Macros/modals.html.twig` | Auxiliares de diálogos modais |

Utilização dentro de qualquer template que estenda `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Templates Vue Personalizados

O Chamilo suporta substituições de páginas Vue por instalação através da variável de ambiente `APP_CUSTOM_VUE_TEMPLATE`. Quando definida, a compilação Webpack expõe uma constante `ENV_CUSTOM_VUE_TEMPLATE` via `DefinePlugin`, e o router Vue importa condicionalmente componentes de substituição a partir de `var/vue_templates/`.

Localizações atuais de substituição:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Apenas os ficheiros presentes em `var/vue_templates/` são substituídos — todas as outras páginas e componentes utilizam os originais do núcleo.

## Referência de Funções Twig

Principais funções Twig disponíveis em todos os templates (registadas em `ChamiloExtension`):

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Ler uma definição da plataforma |
| `chamilo_settings_has('ns.key')` | Verificar se uma definição existe |
| `chamilo_settings_all()` | Obter todas as definições como um array |
| `theme_asset('path')` | URL para um recurso no tema ativo |
| `theme_asset_link_tag('path')` | Etiqueta `<link>` para um ficheiro CSS do tema |
| `theme_asset_script_tag('path')` | Etiqueta `<script>` para um ficheiro JS do tema |
| `theme_asset_base64('path')` | URI de dados Base64 para um recurso do tema |
| `theme_logo('header'\|'email')` | URL para o logótipo preferido |
| `is_allowed_to_edit(...)` | Auxiliar de verificação de permissões |