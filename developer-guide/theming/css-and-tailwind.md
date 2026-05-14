# CSS e Tailwind

## Arquitetura de Folhas de Estilo

Os estilos do Chamilo são organizados nesta ordem:

1. **Tailwind CSS** — Classes utilitárias para layout, espaçamento e cor. Configurado com `important: true` para que as utilitárias substituam os padrões dos componentes PrimeVue.
2. **SCSS** — Estilos personalizados em `assets/css/scss/`, organizados em camadas de átomos, moléculas, organismos, layout e componentes.
3. **Estilos de componentes PrimeVue** — Substituídos por componente dentro de `assets/css/scss/atoms/`.
4. **Tema `colors.css`** — Propriedades personalizadas CSS para o tema de cores ativo, carregadas por último para que se sobreponham a tudo o mais.

PrimeFlex está listado em `package.json`, mas não é importado — Tailwind cobre todas as necessidades de utilitárias.

## Folha de Estilo Principal (`assets/css/app.scss`)

`app.scss` é o ponto de entrada do Webpack para a folha de estilo principal. Ele importa:

1. `_tailwind.scss` — Diretivas do Tailwind `@tailwind base / components / utilities`
2. `scss/index.scss` — Arquivo barril que importa todos os parciais SCSS
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

Os caminhos de conteúdo escaneiam componentes Vue, páginas PHP legadas, arquivos de plugins e templates Twig para que utilitárias não utilizadas sejam eliminadas em builds de produção.

### Sistema de Cores com Variáveis CSS

Todos os tokens de cor são suportados por propriedades personalizadas CSS em vez de valores fixos:

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

### Escala de Tipografia Personalizada

Quatro pares adicionais de tamanho de fonte/altura de linha são adicionados via `theme.extend.fontSize`:

| Classe | Tamanho / Altura da Linha |
|-------|---------------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) é configurado inline dentro de `webpack.config.js` via `enablePostCssLoader()`. Não há um arquivo independente `postcss.config.js`.

## Folhas de Estilo Especializadas

| Arquivo | Entrada Webpack | Finalidade |
|------|-----------------|------------|
| `assets/css/app.scss` | `app` | Estilos principais da aplicação |
| `assets/css/chat.scss` | `css/chat` | Estilos da interface de chat |
| `assets/css/document.scss` | `css/document` | Estilos do visualizador de documentos |
| `assets/css/editor.scss` | `css/editor` | Estilos do shell do editor TinyMCE |
| `assets/css/editor_content.scss` | `css/editor_content` | Estilos injetados no corpo do iframe do editor |
| `assets/css/markdown.scss` | `css/markdown` | Conteúdo renderizado em Markdown |
| `assets/css/print.scss` | `css/print` | Folha de estilo para impressão |
| `assets/css/responsive.scss` | `css/responsive` | Sobrescritas responsivas |
| `assets/css/scorm.scss` | `css/scorm` | Estilos do player SCORM |

## Estrutura de Módulos SCSS (`assets/css/scss/`)

```
scss/
├── index.scss        # Barril — importa tudo abaixo
├── abstracts/        # Mixins e funções compartilhadas
├── settings/         # Tokens de design (tipografia, base de componentes)
├── atoms/            # Sobrescritas de PrimeVue por componente
├── molecules/        # Pequenos padrões compostos (chips, barras de ferramentas, estados vazios)
├── organisms/        # Áreas maiores (barra lateral, tabela de dados, diálogo, painel LP)
├── layout/           # Esqueleto da página (barra superior, contêiner principal, breadcrumb)
├── components/       # Estilos específicos de funcionalidades (blog, exercício, social, habilidade, …)
└── libs/             # Sobrescritas de terceiros (FullCalendar, MediaElement.js)
```

## Usando Tailwind em Componentes Vue

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

Como `important: true` está definido em `tailwind.config.js`, as utilitárias do Tailwind substituem de forma confiável os estilos de componentes PrimeVue sem a necessidade de especificidade extra.