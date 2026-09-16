# Sistema de Build

O Chamilo usa **Webpack 5** via **Symfony Webpack Encore** para construir os assets de frontend. A configuração completa de build está em `webpack.config.js` na raiz do projeto.

A saída é gravada em `public/build/`, servida no caminho público `/build`.

## Pontos de Entrada

### JavaScript

| Entrada | Origem | Finalidade |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | Aplicação principal Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Assistente de instalação |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript legado |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Reprodutor de exercícios |
| `legacy_lp` | `assets/js/legacy/lp.js` | Reprodutor de percursos de aprendizagem |
| `legacy_document` | `assets/js/legacy/document.js` | Visualizador de documentos |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de grade legado |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Carregador frame-ready para iframes legados |
| `translatehtml` | `assets/js/translatehtml.js` | Auxiliar de tradução HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Destaque automático de termos do glossário |

### CSS

| Entrada | Origem |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## Recursos de Build

* **Vue 3 SFC** — componentes de arquivo único `.vue` compilados pelo `vue-loader`; o compilador em tempo de execução está desabilitado (`runtimeCompilerBuild: false`), portanto todos os templates devem ser pré-compilados
* **TypeScript** — modo apenas de transpilação (`transpileOnly: true`) para builds rápidos, sem verificação de tipos durante o build
* **Sass/SCSS** — suporte completo a SCSS via `sass-loader`
* **Tailwind CSS** — CSS utility-first processado inline via PostCSS (configurado dentro de `webpack.config.js`; não há um `postcss.config.js` separado)
* **Babel** — transpilação ES6+ com `@babel/preset-env` e polyfills `core-js@3` (`useBuiltIns: "usage"`)
* **Provisionamento automático de jQuery** — `autoProvidejQuery()` torna `$` e `jQuery` disponíveis globalmente sem importações explícitas, suportando código legado
* **Source maps** — habilitados apenas em desenvolvimento
* **Chunk de runtime único** — runtime compartilhado para todas as entradas
* **Cache de sistema de arquivos** — o cache persistente de sistema de arquivos do Webpack está habilitado para acelerar rebuilds incrementais
* **Namespace de chunks** — `output.uniqueName` e `output.chunkLoadingGlobal` são definidos como `"chamilo"` / `"webpackChunkChamilo"` para evitar colisões de carregamento de chunks quando vários bundles Webpack coexistem em uma página

## Recursos exclusivos de produção

* **Versionamento** — sufixos de hash de conteúdo em todos os nomes de arquivo de saída (`enableVersioning()`)
* **Subresource Integrity** — atributos `integrity` nas tags `<script>` e `<link>` (`enableIntegrityHashes()`)
* **Limpeza da saída** — `public/build/` é esvaziado antes de cada build de produção

### Cópias de assets sem hash (`CopyUnhashedAssetsPlugin`)

Algumas páginas PHP legadas referenciam assets por um nome de arquivo fixo e não podem usar o manifesto do Webpack. Um `CopyUnhashedAssetsPlugin` personalizado (definido no final de `webpack.config.js`) copia determinados arquivos de produção com hash para um caminho adicional sem hash após cada build:

| Arquivo com hash | Cópia sem hash |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Assets de bibliotecas copiados

`copyFiles()` copia vários pacotes npm diretamente para `public/build/libs/` sem agrupá-los, para uso via tags `<script>` / `<link>` em templates legados:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* locales do `moment`
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Comandos de Build

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Configuração do Tailwind

O Tailwind é configurado em `tailwind.config.js`. Pontos principais:

* **`important: true`** — Todos os utilitários gerados incluem `!important`, permitindo que sobrescrevam os estilos dos componentes PrimeVue sem truques extras de especificidade
* **Caminhos de conteúdo** — O Tailwind analisa `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` e `src/CoreBundle/Resources/views/**/*.html.twig` em busca do uso de classes
* **Sistema de cores com variáveis CSS** — Cada token de cor (primary, secondary, tertiary, success, info, warning, danger) é sustentado por uma propriedade personalizada CSS (por exemplo, `--color-primary-base`) definida por tema em `var/themes/[theme-name]/colors.css`. Os valores são tripletos de canais RGB separados por espaço, o que habilita os utilitários de opacidade do Tailwind (`bg-primary/50`)
* **Escala tipográfica personalizada** — Os pares de tamanho/altura de linha `body-1`, `body-2`, `caption` e `tiny` são adicionados via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` e `@tailwindcss/typography` estão habilitados

O PostCSS (Tailwind + Autoprefixer) é configurado inline dentro de `webpack.config.js` por meio de `enablePostCssLoader()` — não há um arquivo `postcss.config.js` independente.