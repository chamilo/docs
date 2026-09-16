# Temas de Cores

O Chamilo 3.0 utiliza um sistema de temas de cores orientado a banco de dados. Os temas são gerenciados pela interface de administração, armazenados no banco de dados e gravados em disco como arquivos CSS. Eles podem ser personalizados por URL de acesso, permitindo que instalações multi-URL tenham identidades visuais diferentes.

## Modelo de Dados

Duas entidades impulsionam o sistema de temas:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `id` | int | Chave primária |
| `title` | string | Nome legível por humanos |
| `slug` | string | Gerado automaticamente a partir de `title` (ex.: `"My Theme"` → `my-theme`); usado como nome do diretório em `var/themes/` |
| `variables` | array (JSON) | Mapa de nome de propriedade personalizada CSS → valor (ex.: `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associa um `ColorTheme` a um `AccessUrl`. O sinalizador booleano `active` indica qual tema está atualmente ativo para aquela URL. Apenas um tema pode estar ativo por URL de acesso de cada vez.

## Como os Temas São Armazenados

Quando um tema é criado ou atualizado via a API, `ColorThemeStateProcessor` gera o arquivo CSS e o grava no Flysystem `themes_filesystem` (com suporte em `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

O `colors.css` gerado envolve todas as variáveis em um bloco `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Os valores são tripletos de canais RGB separados por espaço (não `rgb()`), o que permite ao Tailwind compor variantes de opacidade como `bg-primary/50` sem configuração adicional.

## Precedência de Resolução de Temas

`ThemeHelper::getVisualTheme()` resolve qual slug de tema aplicar em qualquer página, nesta ordem:

1. **Tema ativo para o AccessUrl atual** — o registro `AccessUrlRelColorTheme` com `active = true`
2. **Tema selecionado pelo usuário** — o tema armazenado na entidade `User`, se a configuração de plataforma `profile.user_selected_theme` estiver habilitada
3. **Tema do curso** — a configuração de curso `course_theme`, se a configuração de plataforma `course.allow_course_theme` estiver habilitada
4. **Tema do percurso de aprendizagem** — o valor `$lp_theme_css` do LP, se a configuração de curso `allow_learning_path_theme` estiver habilitada
5. **Variável de ambiente `THEME_FALLBACK`** — definida em `.env` como `THEME_FALLBACK='chamilo'`
6. **Padrão** — `chamilo` (codificado como `ThemeHelper::DEFAULT_THEME`)

## Serviço de Ativos

Os ativos de tema são servidos por `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) sob o prefixo `/themes`.

| Rota | Finalidade |
|-------|---------|
| `GET /themes/{name}/{path}` | Servir qualquer ativo de tema (CSS, JS, imagens); recua para o tema `chamilo` se não for encontrado no tema solicitado |
| `GET /themes/{slug}/logo/{type}` | Servir o logotipo preferido (`header` ou `email`), com fallback SVG → PNG |
| `POST /themes/{slug}/logos` | Enviar logotipos de cabeçalho/e-mail (SVG e/ou PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Excluir um logotipo específico |

A rota geral de ativos (`/{name}/{path}`) recua automaticamente para o tema padrão `chamilo` quando um arquivo está ausente no tema solicitado, de modo que os temas só precisam incluir os arquivos que realmente substituem.

## Como os Temas São Carregados nos Templates

O template de layout `head.html.twig` carrega os ativos do tema ativo por meio de funções auxiliares Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

As três funções Twig (registradas em `ChamiloExtension`) resolvem o caminho do ativo por meio de `ThemeHelper`, aplicando a mesma cadeia de fallback acima:

| Função | Retorna |
|----------|---------|
| `theme_asset('path')` | URL do ativo no tema resolvido |
| `theme_asset_link_tag('path')` | Tag completa `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Tag completa `<script src="...">` |
| `theme_asset_base64('path')` | URI de dados do ativo codificada em Base64 |
| `theme_logo('header'\|'email')` | URL do melhor logotipo disponível |

## Endpoints da API

A gestão de temas é exposta pela API REST do API Platform (somente administradores):

| Método | Endpoint | Finalidade |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Criar um novo tema |
| `PUT` | `/api/color_themes/{id}` | Atualizar um tema existente |
| `POST` | `/api/access_url_rel_color_themes` | Associar/ativar um tema para uma URL de acesso |
| `GET` | `/api/access_url_rel_color_themes` | Listar associações de temas para a URL de acesso atual |

## Criando um Tema Personalizado

O fluxo de trabalho padrão é pela interface de administração (**Admin → Color Themes**), que chama os endpoints da API acima. Para criar um tema programaticamente:

1. `POST /api/color_themes` com um corpo JSON:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Isso persiste a entidade e grava `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` para associá-lo e ativá-lo para a URL de acesso atual:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Para adicionar imagens personalizadas (logotipo, favicon, planos de fundo), envie-as via `POST /themes/{slug}/logos` ou coloque-as diretamente em `var/themes/{slug}/images/`.

## Referência de Variáveis de Cor

Todas as variáveis esperadas pela configuração padrão do Tailwind:

| Variável | Finalidade |
|----------|---------|
| `--color-primary-base` | Cor primária da marca |
| `--color-primary-gradient` | Parada de degradê mais escura para a cor primária |
| `--color-primary-button-text` | Cor do texto nos botões primários |
| `--color-primary-button-alternative-text` | Cor alternativa do texto nos botões primários |
| `--color-secondary-base` | Cor de destaque secundária |
| `--color-secondary-gradient` | Parada de degradê para a cor secundária |
| `--color-secondary-button-text` | Cor do texto nos botões secundários |
| `--color-tertiary-base` | Cor terciária |
| `--color-tertiary-gradient` | Parada de degradê para a cor terciária |
| `--color-tertiary-button-text` | Cor do texto nos botões terciários |
| `--color-success-base` | Cor do estado de sucesso |
| `--color-success-gradient` | Parada de degradê para sucesso |
| `--color-success-button-text` | Cor do texto nos botões de sucesso |
| `--color-info-base` | Cor do estado de informação |
| `--color-info-gradient` | Parada de degradê para informação |
| `--color-info-button-text` | Cor do texto nos botões de informação |
| `--color-warning-base` | Cor do estado de aviso |
| `--color-warning-gradient` | Parada de degradê para aviso |
| `--color-warning-button-text` | Cor do texto nos botões de aviso |
| `--color-danger-base` | Cor do estado de perigo/erro |
| `--color-danger-gradient` | Parada de degradê para perigo |
| `--color-danger-button-text` | Cor do texto nos botões de perigo |
| `--color-form-base` | Cor de destaque dos elementos de formulário |