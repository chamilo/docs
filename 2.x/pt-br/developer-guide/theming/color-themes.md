# Temas de Cores

O Chamilo 2.0 utiliza um sistema de temas de cores baseado em banco de dados. Os temas são gerenciados por meio da interface de administração, armazenados no banco de dados e gravados em disco como arquivos CSS. Eles podem ser personalizados por URL de acesso, permitindo que instalações multi-URL tenham identidades visuais distintas.

## Modelo de Dados

Duas entidades impulsionam o sistema de temas:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Campo | Tipo | Descrição |
|-------|------|-----------|
| `id` | int | Chave primária |
| `title` | string | Nome legível por humanos |
| `slug` | string | Gerado automaticamente a partir de `title` (por exemplo, `"Meu Tema"` → `meu-tema`); usado como nome do diretório em `var/themes/` |
| `variables` | array (JSON) | Mapa de nome de propriedade CSS personalizada → valor (por exemplo, `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Associa um `ColorTheme` a um `AccessUrl`. O sinalizador booleano `active` marca qual tema está atualmente ativo para aquela URL. Apenas um tema pode estar ativo por URL de acesso por vez.

## Como os Temas São Armazenados

Quando um tema é criado ou atualizado via API, o `ColorThemeStateProcessor` gera o arquivo CSS e o grava no `themes_filesystem` do Flysystem (suportado por `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← gerado a partir de ColorTheme.variables
```

O arquivo `colors.css` gerado envolve todas as variáveis em um bloco `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Os valores são tríades de canais RGB separadas por espaço (não `rgb()`), o que permite que o Tailwind componha variantes de opacidade, como `bg-primary/50`, sem configuração adicional.

## Precedência na Resolução de Temas

`ThemeHelper::getVisualTheme()` resolve qual slug de tema aplicar em qualquer página, nesta ordem:

1. **Tema ativo para a AccessUrl atual** — o registro `AccessUrlRelColorTheme` com `active = true`
2. **Tema selecionado pelo usuário** — o tema armazenado na entidade `User`, se a configuração da plataforma `profile.user_selected_theme` estiver habilitada
3. **Tema do curso** — a configuração de curso `course_theme`, se a configuração da plataforma `course.allow_course_theme` estiver habilitada
4. **Tema do caminho de aprendizagem** — o valor `$lp_theme_css` do LP, se a configuração de curso `allow_learning_path_theme` estiver habilitada
5. **Variável de ambiente `THEME_FALLBACK`** — definida em `.env` como `THEME_FALLBACK='chamilo'`
6. **Padrão** — `chamilo` (codificado como `ThemeHelper::DEFAULT_THEME`)

## Distribuição de Ativos

Os ativos de tema são servidos pelo `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) sob o prefixo `/themes`.

| Rota | Finalidade |
|-------|------------|
| `GET /themes/{name}/{path}` | Serve qualquer ativo de tema (CSS, JS, imagens); recorre ao tema `chamilo` se não encontrado no tema solicitado |
| `GET /themes/{slug}/logo/{type}` | Serve o logotipo preferido (`header` ou `email`), com fallback de SVG para PNG |
| `POST /themes/{slug}/logos` | Faz upload de logotipos de cabeçalho/e-mail (SVG e/ou PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Exclui um logotipo específico |

A rota geral de ativos (`/{name}/{path}`) recorre automaticamente ao tema padrão `chamilo` quando um arquivo está ausente no tema solicitado, então os temas só precisam incluir arquivos que realmente substituem.

## Como os Temas São Carregados nos Modelos

O modelo de layout `head.html.twig` carrega os ativos do tema ativo por meio de funções auxiliares do Twig:

```twig
{# Injeta as variáveis de cor do tema #}
{{ theme_asset_link_tag('colors.css') }}

{# Injeta a paleta de cores do TinyMCE #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Referencia outros ativos de tema #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

As três funções Twig (registradas em `ChamiloExtension`) resolvem o caminho do ativo por meio de `ThemeHelper`, aplicando a mesma cadeia de fallback descrita acima:

| Função | Retorna |
|----------|---------|
| `theme_asset('path')` | URL para o ativo no tema resolvido |
| `theme_asset_link_tag('path')` | Tag completa `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Tag completa `<script src="...">` |
| `theme_asset_base64('path')` | URI de dados codificado em Base64 do ativo |
| `theme_logo('header'\|'email')` | URL para o melhor logotipo disponível |

## Endpoints da API

O gerenciamento de temas é exposto via API REST da API Platform (somente para administradores):

| Método | Endpoint | Finalidade |
|--------|----------|------------|
| `POST` | `/api/color_themes` | Cria um novo tema |
| `PUT` | `/api/color_themes/{id}` | Atualiza um tema existente |
| `POST` | `/api/access_url_rel_color_themes` | Associa/ativa um tema para uma URL de acesso |
| `GET` | `/api/access_url_rel_color_themes` | Lista associações de temas para a URL de acesso atual |

## Criando um Tema Personalizado

O fluxo de trabalho padrão é através da interface de administração (**Admin → Temas de Cores**), que chama os endpoints da API mencionados acima. Para criar um tema programaticamente:

1. `POST /api/color_themes` com um corpo JSON:

```json
{
  "title": "Meu Tema",
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

Isso persiste a entidade e escreve `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` para associar e ativar o tema para a URL de acesso atual:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Para adicionar imagens personalizadas (logotipo, favicon, fundos), faça o upload delas via `POST /themes/{slug}/logos` ou coloque-as diretamente em `var/themes/{slug}/images/`.

## Referência de Variáveis de Cor

Todas as variáveis esperadas pela configuração padrão do Tailwind:

| Variável | Finalidade |
|----------|------------|
| `--color-primary-base` | Cor principal da marca |
| `--color-primary-gradient` | Ponto de gradiente mais escuro para a cor principal |
| `--color-primary-button-text` | Cor do texto em botões principais |
| `--color-primary-button-alternative-text` | Cor alternativa do texto em botões principais |
| `--color-secondary-base` | Cor de destaque secundária |
| `--color-secondary-gradient` | Ponto de gradiente para a cor secundária |
| `--color-secondary-button-text` | Cor do texto em botões secundários |
| `--color-tertiary-base` | Cor terciária |
| `--color-tertiary-gradient` | Ponto de gradiente para a cor terciária |
| `--color-tertiary-button-text` | Cor do texto em botões terciários |
| `--color-success-base` | Cor de estado de sucesso |
| `--color-success-gradient` | Ponto de gradiente para sucesso |
| `--color-success-button-text` | Cor do texto em botões de sucesso |
| `--color-info-base` | Cor de estado de informação |
| `--color-info-gradient` | Ponto de gradiente para informação |
| `--color-info-button-text` | Cor do texto em botões de informação |
| `--color-warning-base` | Cor de estado de aviso |
| `--color-warning-gradient` | Ponto de gradiente para aviso |
| `--color-warning-button-text` | Cor do texto em botões de aviso |
| `--color-danger-base` | Cor de estado de perigo/erro |
| `--color-danger-gradient` | Ponto de gradiente para perigo |
| `--color-danger-button-text` | Cor do texto em botões de perigo |
| `--color-form-base` | Cor de destaque em elementos de formulário |