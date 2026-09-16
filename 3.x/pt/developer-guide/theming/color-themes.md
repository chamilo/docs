# Temas de Cores

O Chamilo 3.0 utiliza um sistema de temas de cores baseado em base de dados. Os temas são geridos através da interface de administração, armazenados na base de dados e escritos em disco como ficheiros CSS. Podem ser personalizados por URL de acesso, permitindo que instalações multi-URL tenham identidades visuais diferentes.

## Modelo de Dados

Duas entidades impulsionam o sistema de temas:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Campo | Tipo | Descrição |
|-------|------|-------------|
| `id` | int | Chave primária |
| `title` | string | Nome legível por humanos |
| `slug` | string | Gerado automaticamente a partir de `title` (p. ex. `"My Theme"` → `my-theme`); usado como nome do diretório em `var/themes/` |
| `variables` | array (JSON) | Mapa de nome de propriedade personalizada CSS → valor (p. ex. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associa um `ColorTheme` a um `AccessUrl`. O indicador booleano `active` marca qual tema está atualmente ativo para esse URL. Apenas um tema pode estar ativo por URL de acesso de cada vez.

## Como os Temas São Armazenados

Quando um tema é criado ou atualizado através da API, o `ColorThemeStateProcessor` gera o ficheiro CSS e escreve-o no Flysystem `themes_filesystem` (com suporte em `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

O `colors.css` gerado envolve todas as variáveis num bloco `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Os valores são tripletos de canais RGB separados por espaços (não `rgb()`), o que permite ao Tailwind compor variantes de opacidade como `bg-primary/50` sem configuração adicional.

## Precedência de Resolução de Temas

`ThemeHelper::getVisualTheme()` resolve qual slug de tema aplicar em qualquer página, nesta ordem:

1. **Tema ativo para o AccessUrl atual** — o registo `AccessUrlRelColorTheme` com `active = true`
2. **Tema selecionado pelo utilizador** — o tema armazenado na entidade `User`, se a definição de plataforma `profile.user_selected_theme` estiver ativada
3. **Tema do curso** — a definição de curso `course_theme`, se a definição de plataforma `course.allow_course_theme` estiver ativada
4. **Tema do percurso de aprendizagem** — o valor `$lp_theme_css` do LP, se a definição de curso `allow_learning_path_theme` estiver ativada
5. **Variável de ambiente `THEME_FALLBACK`** — definida em `.env` como `THEME_FALLBACK='chamilo'`
6. **Predefinição** — `chamilo` (codificado como `ThemeHelper::DEFAULT_THEME`)

## Serviço de Recursos

Os recursos dos temas são servidos pelo `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) sob o prefixo `/themes`.

| Rota | Finalidade |
|-------|---------|
| `GET /themes/{name}/{path}` | Servir qualquer recurso do tema (CSS, JS, imagens); recua para o tema `chamilo` se não for encontrado no tema pedido |
| `GET /themes/{slug}/logo/{type}` | Servir o logótipo preferido (`header` ou `email`), com recuo de SVG → PNG |
| `POST /themes/{slug}/logos` | Carregar logótipos de cabeçalho/e-mail (SVG e/ou PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Eliminar um logótipo específico |

A rota geral de recursos (`/{name}/{path}`) recua automaticamente para o tema predefinido `chamilo` quando um ficheiro está em falta no tema pedido, pelo que os temas só precisam de incluir os ficheiros que realmente substituem.

## Como os Temas São Carregados nos Modelos

O modelo de layout `head.html.twig` carrega os recursos do tema ativo através de funções auxiliares Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

As três funções Twig (registadas em `ChamiloExtension`) resolvem o caminho do recurso através de `ThemeHelper`, aplicando a mesma cadeia de recuo acima:

| Função | Devolve |
|----------|---------|
| `theme_asset('path')` | URL do recurso no tema resolvido |
| `theme_asset_link_tag('path')` | Etiqueta completa `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Etiqueta completa `<script src="...">` |
| `theme_asset_base64('path')` | URI de dados do recurso codificada em Base64 |
| `theme_logo('header'\|'email')` | URL do melhor logótipo disponível |

## Endpoints da API

A gestão de temas é exposta através da API REST da API Platform (apenas administradores):

| Método | Endpoint | Finalidade |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Criar um novo tema |
| `PUT` | `/api/color_themes/{id}` | Atualizar um tema existente |
| `POST` | `/api/access_url_rel_color_themes` | Associar/ativar um tema para um URL de acesso |
| `GET` | `/api/access_url_rel_color_themes` | Listar associações de temas para o URL de acesso atual |

## Criar um Tema Personalizado

O fluxo de trabalho padrão é através da interface de administração (**Admin → Color Themes**), que chama os endpoints da API acima. Para criar um tema de forma programática:

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

Isto persiste a entidade e escreve `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` para associar e ativá-lo para o URL de acesso atual:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Para adicionar imagens personalizadas (logótipo, favicon, fundos), carregue-as via `POST /themes/{slug}/logos` ou coloque-as diretamente em `var/themes/{slug}/images/`.

## Referência de Variáveis de Cor

Todas as variáveis esperadas pela configuração predefinida do Tailwind:

| Variável | Finalidade |
|----------|---------|
| `--color-primary-base` | Cor principal da marca |
| `--color-primary-gradient` | Paragem de gradiente mais escura para a cor principal |
| `--color-primary-button-text` | Cor do texto nos botões principais |
| `--color-primary-button-alternative-text` | Cor de texto alternativa nos botões principais |
| `--color-secondary-base` | Cor de destaque secundária |
| `--color-secondary-gradient` | Paragem de gradiente para a cor secundária |
| `--color-secondary-button-text` | Cor do texto nos botões secundários |
| `--color-tertiary-base` | Cor terciária |
| `--color-tertiary-gradient` | Paragem de gradiente para a cor terciária |
| `--color-tertiary-button-text` | Cor do texto nos botões terciários |
| `--color-success-base` | Cor do estado de sucesso |
| `--color-success-gradient` | Paragem de gradiente para sucesso |
| `--color-success-button-text` | Cor do texto nos botões de sucesso |
| `--color-info-base` | Cor do estado de informação |
| `--color-info-gradient` | Paragem de gradiente para informação |
| `--color-info-button-text` | Cor do texto nos botões de informação |
| `--color-warning-base` | Cor do estado de aviso |
| `--color-warning-gradient` | Paragem de gradiente para aviso |
| `--color-warning-button-text` | Cor do texto nos botões de aviso |
| `--color-danger-base` | Cor do estado de perigo/erro |
| `--color-danger-gradient` | Paragem de gradiente para perigo |
| `--color-danger-button-text` | Cor do texto nos botões de perigo |
| `--color-form-base` | Cor de destaque dos elementos de formulário |