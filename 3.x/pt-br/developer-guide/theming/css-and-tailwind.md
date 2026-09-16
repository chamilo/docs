# CSS e Tailwind

## Arquitetura de Folhas de Estilo

Os estilos do Chamilo são aplicados nesta ordem:

1. **Tailwind CSS** — Classes utilitárias para layout, espaçamento e cor. Configurado com `important: true` para que as utilitárias sobrescrevam os padrões dos componentes PrimeVue.
2. **SCSS** — Estilos personalizados em `assets/css/scss/`, organizados nas camadas atoms, molecules, organisms, layout e components.
3. **Estilos de componentes PrimeVue** — Sobrescritos por componente em `assets/css/scss/atoms/`.
4. **`colors.css` do tema** — Propriedades customizadas CSS do tema de cores ativo, carregadas por último para que se sobreponham a todo o restante.

O PrimeFlex foi removido do `package.json` — o Tailwind cobre todas as necessidades de utilitários.

## Folha de Estilo Principal (`assets/css/app.scss`)

`app.scss` é o ponto de entrada do Webpack para a folha de estilo principal. Ele importa:

1. `_tailwind.scss` — Diretivas `@tailwind base / components / utilities` do Tailwind
2. `scss/index.scss` — Arquivo barrel que importa todos os parciais SCSS
3. CSS de terceiros (cropper, select2, daterangepicker, skin do TinyMCE, fancybox, timepicker, qtip)
4. `editor_content.scss` — Estilos injetados no corpo do iframe do editor TinyMCE

## Configuração do Tailwind (`tailwind.config.js`)

Configurações principais:

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

Os caminhos de conteúdo varrem componentes Vue, páginas PHP legadas, arquivos de plugins e templates Twig para que utilitários não utilizados sejam removidos nos builds de produção.

### Sistema de Cores com Variáveis CSS

Todos os tokens de cor são baseados em propriedades customizadas CSS, e não em valores fixos:

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

O helper `colorWithOpacity` emite `rgb(var(--color-primary-base) / <opacity>)`, permitindo variantes de opacidade como `bg-primary/50`. Os valores RGB reais são definidos por tema em `var/themes/{slug}/colors.css` e carregados em tempo de execução — consulte [Temas de Cores](color-themes.md).

### Plugins do Tailwind

`@tailwindcss/forms` e `@tailwindcss/typography` estão habilitados.

### Escala Tipográfica Personalizada

Quatro pares extras de tamanho de fonte/altura de linha são adicionados via `theme.extend.fontSize`:

| Classe | Tamanho / Altura de linha |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

O PostCSS (Tailwind + Autoprefixer) é configurado inline em `webpack.config.js` via `enablePostCssLoader()`. Não existe um arquivo `postcss.config.js` independente.

## Folhas de Estilo Especializadas

| Arquivo | Entrada Webpack | Finalidade |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | Estilos principais da aplicação |
| `assets/css/chat.scss` | `css/chat` | Estilos da interface de chat |
| `assets/css/document.scss` | `css/document` | Estilos do visualizador de documentos |
| `assets/css/editor.scss` | `css/editor` | Estilos do shell do editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Estilos injetados no corpo do iframe do editor |
| `assets/css/markdown.scss` | `css/markdown` | Conteúdo renderizado em Markdown |
| `assets/css/print.scss` | `css/print` | Folha de estilo de impressão |
| `assets/css/responsive.scss` | `css/responsive` | Sobrescritas responsivas |
| `assets/css/scorm.scss` | `css/scorm` | Estilos do player SCORM |

## Estrutura dos Módulos SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## Uso do Tailwind em Componentes Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Como `important: true` está definido em `tailwind.config.js`, as utilitárias do Tailwind sobrescrevem de forma confiável os estilos dos componentes PrimeVue sem necessidade de especificidade extra.