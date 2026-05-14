# Sistema de Build

Chamilo utiliza **Webpack 5** através do **Symfony Webpack Encore** para construir ativos de frontend. A configuração completa de build está em `webpack.config.js` na raiz do projeto.

A saída é gravada em `public/build/`, servida sob o caminho público `/build`.

## Pontos de Entrada

### JavaScript

| Entrada | Fonte | Finalidade |
|---------|-------|------------|
| `vue` | `assets/vue/main.js` | Aplicação principal Vue 3 |
| `vue_installer` | `assets/vue/main_installer.js` | Assistente de instalação |
| `legacy_app` | `assets/js/legacy/app.js` | JavaScript legado |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | Player de exercícios |
| `legacy_lp` | `assets/js/legacy/lp.js` | Player de caminho de aprendizagem |
| `legacy_document` | `assets/js/legacy/document.js` | Visualizador de documentos |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | Widget de grade legado |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | Carregador de frame pronto para iframes legados |
| `translatehtml` | `assets/js/translatehtml.js` | Auxiliar de tradução de HTML |
| `glossary_auto` | `assets/js/glossary-auto.js` | Destaque automático de termos de glossário |

### CSS

| Entrada | Fonte |
|---------|-------|
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

* **Vue 3 SFC** — Componentes de arquivo único `.vue` compilados por `vue-loader`; o compilador de tempo de execução está desativado (`runtimeCompilerBuild: false`), então todos os templates devem ser pré-compilados
* **TypeScript** — Modo de transpiração apenas (`transpileOnly: true`) para builds rápidos, sem verificação de tipos durante o build
* **Sass/SCSS** — Suporte completo a SCSS via `sass-loader`
* **Tailwind CSS** — CSS utilitário processado inline via PostCSS (configurado dentro de `webpack.config.js`; não há um arquivo separado `postcss.config.js`)
* **Babel** — Transpilação de ES6+ com `@babel/preset-env` e polyfills do `core-js@3` (`useBuiltIns: "usage"`)
* **jQuery auto-provision** — `autoProvidejQuery()` torna `$` e `jQuery` disponíveis globalmente sem importações explícitas, suportando código legado
* **Source maps** — Habilitado apenas em desenvolvimento
* **Single runtime chunk** — Runtime compartilhado para todas as entradas
* **Filesystem cache** — Cache persistente de sistema de arquivos do Webpack está habilitado para acelerar rebuilds incrementais
* **Chunk namespacing** — `output.uniqueName` e `output.chunkLoadingGlobal` estão definidos como `"chamilo"` / `"webpackChunkChamilo"` para evitar colisões de carregamento de chunks quando múltiplos bundles Webpack coexistem em uma página

## Recursos Exclusivos de Produção

* **Versionamento** — Sufixos de hash de conteúdo em todos os nomes de arquivos de saída (`enableVersioning()`)
* **Integridade de Subrecursos** — Atributos `integrity` em tags `<script>` e `<link>` (`enableIntegrityHashes()`)
* **Limpeza de Saída** — `public/build/` é limpo antes de cada build de produção

### Cópias de ativos sem hash (`CopyUnhashedAssetsPlugin`)

Algumas páginas PHP legadas referenciam ativos por um nome de arquivo fixo e não podem usar o manifesto do Webpack. Um plugin personalizado `CopyUnhashedAssetsPlugin` (definido no final de `webpack.config.js`) copia certos arquivos de produção com hash para um caminho adicional sem hash após cada build:

| Arquivo com hash | Cópia sem hash |
|------------------|----------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## Ativos de Biblioteca Copiados

`copyFiles()` copia vários pacotes npm diretamente para `public/build/libs/` sem empacotá-los, para uso via tags `<script>` / `<link>` em templates legados:

* `flatpickr` (JS + CSS + locales)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` locales
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## Comandos de Build

```bash
# Build de desenvolvimento
yarn encore dev

# Build de desenvolvimento com observação de arquivos
yarn encore dev --watch

# Build de produção (minificado, versionado, hashes de integridade)
yarn encore production
```

---
## Configuração do Tailwind

O Tailwind está configurado no arquivo `tailwind.config.js`. Pontos principais:

* **`important: true`** — Todas as utilidades geradas incluem `!important`, permitindo que elas substituam os estilos dos componentes PrimeVue sem a necessidade de truques adicionais de especificidade
* **Caminhos de conteúdo** — O Tailwind escaneia `assets/**/*.{js,vue}`, `public/main/**/*.{php,twig,tpl}`, `public/plugin/**/*.{php,twig,tpl}` e `src/CoreBundle/Resources/views/**/*.html.twig` para uso de classes
* **Sistema de cores com variáveis CSS** — Cada token de cor (primária, secundária, terciária, sucesso, informação, aviso, perigo) é suportado por uma propriedade personalizada CSS (por exemplo, `--color-primary-base`) definida por tema em `var/themes/[theme-name]/colors.css`. Os valores são trios de canais RGB separados por espaço, possibilitando o uso de utilidades de opacidade do Tailwind (`bg-primary/50`)
* **Escala de fonte personalizada** — Pares de tamanho/altura de linha `body-1`, `body-2`, `caption`, `tiny` são adicionados via `theme.extend.fontSize`
* **Plugins** — `@tailwindcss/forms` e `@tailwindcss/typography` estão habilitados

O PostCSS (Tailwind + Autoprefixer) está configurado inline dentro de `webpack.config.js` por meio de `enablePostCssLoader()` — não há um arquivo independente `postcss.config.js`.