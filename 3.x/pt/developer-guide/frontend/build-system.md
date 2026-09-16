# Sistema de Build

O Chamilo utiliza **Webpack 5** através do **Symfony Webpack Encore** para a compilação dos recursos de frontend. A configuração completa de build encontra-se em `webpack.config.js` na raiz do projeto.

A saída é escrita em `public/build/`, servida no caminho público `/build`.

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
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de grelha legado |
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

## Funcionalidades de Build

* **Vue 3 SFC** — componentes de ficheiro único `.vue` compilados pelo `vue-loader`; o compilador em tempo de execução está desativado (`runtimeCompilerBuild: false`), pelo que todos os templates devem ser pré-compilados
* **TypeScript** — modo apenas de transpilação (`transpileOnly: true`) para builds rápidos, sem verificação de tipos durante o build
* **Sass/SCSS** — suporte completo a SCSS via `sass-loader`
* **Tailwind CSS** — CSS utility-first processado em linha via PostCSS (configurado dentro de `webpack.config.js`; não existe um `postcss.config.js` separado)
* **Babel** — transpilação ES6+ com `@babel/preset-env` e polyfills `core-js@3` (`useBuiltIns: "usage"`)
* **Provisionamento automático de jQuery** — `autoProvidejQuery()` torna `$` e `jQuery` disponíveis globalmente sem importações explícitas, suportando código legado
* **Source maps** — ativados apenas em desenvolvimento
* **Chunk de runtime único** — runtime partilhado para todas as entradas
* **Cache no sistema de ficheiros** — a cache persistente de ficheiros do Webpack está ativada para acelerar rebuilds incrementais
* **Espaçamento de nomes de chunks** — `output.uniqueName` e `output.chunkLoadingGlobal` estão definidos para `"chamilo"` / `"webpackChunkChamilo"` para evitar colisões de carregamento de chunks quando vários bundles Webpack coexistem numa página

## Funcionalidades Exclusivas de Produção

* **Versionamento** — sufixos de hash de conteúdo em todos os nomes de ficheiro de saída (`enableVersioning()`)
* **Subresource Integrity** — atributos `integrity` nas tags `<script>` e `<link>` (`enableIntegrityHashes()`)
* **Limpeza da saída** — `public/build/` é esvaziado antes de cada build de produção

### Cópias de recursos sem hash (`CopyUnhashedAssetsPlugin`)

Algumas páginas PHP legadas referenciam recursos por um nome de ficheiro fixo e não podem utilizar o manifesto do Webpack. Um `CopyUnhashedAssetsPlugin` personalizado (definido no final de `webpack.config.js`) copia determinados ficheiros de produção com hash para um caminho adicional sem hash após cada build:

| Ficheiro com hash | Cópia sem hash |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Recursos de Bibliotecas Copiados

`copyFiles()` copia vários pacotes npm diretamente para `public/build/libs/` sem os empacotar, para utilização via tags `<script>` / `<link>` em templates legados:

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

* **`important: true`** — Todos os utilitários gerados incluem `!important`, permitindo que substituam os estilos dos componentes PrimeVue sem truques extra de especificidade
* **Caminhos de conteúdo** — O Tailwind analisa `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` e `src/CoreBundle/Resources/views/**/*.html.twig` em busca de utilização de classes
* **Sistema de cores com variáveis CSS** — Cada token de cor (primary, secondary, tertiary, success, info, warning, danger) é suportado por uma propriedade personalizada CSS (por exemplo, `--color-primary-base`) definida por tema em `var/themes/[theme-name]/colors.css`. Os valores são tripletos de canais RGB separados por espaços, o que permite os utilitários de opacidade do Tailwind (`bg-primary/50`)
* **Escala tipográfica personalizada** — Os pares de tamanho/altura de linha `body-1`, `body-2`, `caption` e `tiny` são adicionados através de `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` e `@tailwindcss/typography` estão ativados

O PostCSS (Tailwind + Autoprefixer) é configurado em linha dentro de `webpack.config.js` através de `enablePostCssLoader()` — não existe um ficheiro autónomo `postcss.config.js`.