# Modelos Twig

Chamilo utiliza Twig para páginas renderizadas no lado do servidor. Os modelos estão localizados em `src/CoreBundle/Resources/views/` e são referenciados com o prefixo de namespace `@ChamiloCore/` (por exemplo, `@ChamiloCore/Layout/base-layout.html.twig`).

Não há um diretório de nível superior `templates/` — todos os modelos Twig estão sob `src/CoreBundle/Resources/views/`.

## Como Twig e Vue Coexistem

A maioria das páginas segue este fluxo:

1. Um controlador Symfony renderiza um modelo Twig que estende um layout.
2. O layout inclui `vue_setup.html.twig`, que emite `<div id="app">` e injeta variáveis globais de tempo de execução (`window.user`, `window.breadcrumb`, etc.) por meio de `vue_js_setup.html.twig`.
3. Vue é montado em `#app` e gerencia toda a renderização da interface do usuário dentro desse elemento.
4. O aplicativo Vue se comunica com o backend por meio da API REST.

Para páginas legadas que ainda não foram migradas para Vue, o Symfony renderiza o HTML completo da página via Twig e o conteúdo é colocado dentro de `#sectionMainContent`. Vue ainda é montado (fornecendo a barra lateral e a barra superior), mas a área de conteúdo principal é HTML renderizado no servidor.

## Modelos de Layout

Todos os layouts estendem `@ChamiloCore/Layout/base-layout.html.twig`, que fornece a estrutura `<html>`, `<head>` e `<body>`. Variantes de layout disponíveis:

| Modelo | Finalidade |
|----------|---------|
| `Layout/base-layout.html.twig` | Modelo raiz — estrutura `<html>`, importa Macros, emite `<head>` e `<body>` |
| `Layout/layout.html.twig` | Layout completo padrão com barra lateral, barra superior e área de conteúdo |
| `Layout/layout_one_col.html.twig` | Layout de uma coluna (sem barra lateral) |
| `Layout/layout_two_col.html.twig` | Layout de duas colunas |
| `Layout/layout_content.html.twig` | Envoltório apenas para conteúdo |
| `Layout/layout_empty.html.twig` | Layout vazio com mínimo de elementos visuais |
| `Layout/no_layout.html.twig` | Sem cabeçalho/rodapé; conteúdo vai diretamente dentro de `<body>` |
| `Layout/no_layout_scorm.html.twig` | Layout básico para quadros de conteúdo SCORM |
| `Layout/blank.html.twig` | Página completamente em branco |
| `Layout/skill_layout.html.twig` | Layout para a página de roda de habilidades |

## Partes-Chave

| Modelo | Finalidade |
|----------|---------|
| `Layout/head.html.twig` | Conteúdo de `<head>`: meta tags, todas as entradas CSS do Encore, `colors.css` do tema, entradas JS legadas, tags OpenGraph/Twitter |
| `Layout/foot.html.twig` | Fim do corpo: ponto de entrada JS do Vue, injeção de `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emite `<div id="app">` e inclui `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injeta `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | Banner de consentimento de cookies GDPR |
| `Layout/footer.html.twig` | Barra de rodapé da página |
| `Layout/course_navigation.html.twig` | Migalha de navegação de ferramentas do curso |

## Integração com Webpack Encore

`head.html.twig` carrega CSS para todas as entradas; `foot.html.twig` carrega o pacote JS do Vue:

```twig
{# Em head.html.twig — entradas CSS #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# Em foot.html.twig — Vue JS (carregado no final do body) #}
{{ encore_entry_script_tags('vue') }}
```

Entradas JS legadas (`legacy_app`, `legacy_lp`, etc.) são carregadas em `<head>` porque páginas PHP legadas dependem de sua disponibilidade antes que o DOM esteja pronto.

## Macros

Macros Twig reutilizáveis estão em `Macros/` e são importados no topo de `base-layout.html.twig`:

| Arquivo de Macro | Fornece |
|-----------|---------|
| `Macros/box.html.twig` | Auxiliares para caixas de conteúdo |
| `Macros/actions.html.twig` | Renderização de botões de ação |
| `Macros/buttons.html.twig` | Auxiliares HTML para botões |
| `Macros/headers.html.twig` | Auxiliares para cabeçalhos de página |
| `Macros/image.html.twig` | Auxiliares para renderização de imagens |
| `Macros/modals.html.twig` | Auxiliares para diálogos modais |

Uso dentro de qualquer modelo que estenda `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Salvar') }}
{{ macro_box.content_box('Título', conteúdo) }}
```

## Modelos Vue Personalizados

Chamilo suporta substituições de páginas Vue por instalação por meio da variável de ambiente `APP_CUSTOM_VUE_TEMPLATE`. Quando definida, a construção do Webpack expõe uma constante `ENV_CUSTOM_VUE_TEMPLATE` via `DefinePlugin`, e o roteador Vue importa condicionalmente componentes de substituição de `var/vue_templates/`.

Localizações atuais de substituição:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Substitui a página de entrada padrão /
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Apenas os arquivos presentes em `var/vue_templates/` são substituídos — todas as outras páginas e componentes usam os originais do núcleo.

---
## Referência de Funções Twig

Funções Twig principais disponíveis em todos os modelos (registradas em `ChamiloExtension`):

| Função | Finalidade |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Ler uma configuração da plataforma |
| `chamilo_settings_has('ns.key')` | Verificar se uma configuração existe |
| `chamilo_settings_all()` | Obter todas as configurações como um array |
| `theme_asset('path')` | URL para um recurso no tema ativo |
| `theme_asset_link_tag('path')` | Tag `<link>` para um arquivo CSS do tema |
| `theme_asset_script_tag('path')` | Tag `<script>` para um arquivo JS do tema |
| `theme_asset_base64('path')` | URI de dados Base64 para um recurso do tema |
| `theme_logo('header'\|'email')` | URL para o logotipo preferido |
| `is_allowed_to_edit(...)` | Auxiliar de verificação de permissão |