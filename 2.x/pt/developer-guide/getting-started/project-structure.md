# Estrutura do Projeto

## Diretórios de Nível Superior

```
chamilo/
├── assets/          # Código-fonte de frontend
│   ├── vue/         # Aplicação Vue 3 (componentes, visualizações, roteador, stores)
│   ├── css/         # Folhas de estilo SCSS
│   └── js/          # JavaScript legado
├── config/          # Configuração do Symfony (rotas, serviços, pacotes)
├── public/          # Raiz web (index.php, páginas PHP legadas, plugins)
│   ├── main/        # Módulos PHP legados (um subdiretório por ferramenta)
│   └── plugin/      # Plugins incluídos e personalizados
├── src/             # Código-fonte PHP (bundles do Symfony)
│   ├── CoreBundle/  # Lógica central da plataforma
│   ├── CourseBundle/# Funcionalidades específicas de cursos
│   └── LtiBundle/   # Integração LTI 1.3
├── templates/       # Modelos Twig
├── var/             # Cache, logs, uploads (gerados)
├── vendor/          # Dependências do Composer (geradas)
├── node_modules/    # Dependências do npm (geradas)
└── translations/    # Arquivos de tradução
```

## Código-Fonte (`src/`)

### CoreBundle

O maior bundle. Subdiretórios notáveis:

| Diretório | Conteúdo |
|-----------|----------|
| `Entity/` | Entidades Doctrine (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Controladores de administração, ações de API e páginas (a subpasta Api/ contém ações personalizadas do API Platform) |
| `Settings/` | Arquivos de esquema de configurações (configuração da plataforma) |
| `Repository/` | Repositórios Doctrine |
| `AiProvider/` | Implementações de provedores de IA (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Definições de ferramentas de curso |
| `Security/` | Voters, autenticadores, autorização |
| `EventListener/` | Ouvintes de eventos |
| `EventSubscriber/` | Assinantes de eventos |
| `Command/` | Comandos de console do Symfony |
| `Migrations/` | Migrações de banco de dados |
| `Twig/` | Extensões Twig |
| `Storage/` | Adaptadores de armazenamento Flysystem |

### CourseBundle

Entidades e lógica específicas de cursos:

| Diretório | Conteúdo |
|-----------|----------|
| `Entity/` | Entidades de conteúdo de curso (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Controladores de curso |
| `Settings/` | Esquemas de configurações no nível do curso |
| `Component/CourseCopy/` | Importação/exportação de curso (Common Cartridge, Moodle) |

### LtiBundle

Integração LTI 1.3:

| Diretório | Conteúdo |
|-----------|----------|
| `Entity/` | Entidades de plataforma, ferramenta e implantação LTI |
| `Controller/` | Endpoints de lançamento e configuração LTI |

## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Ponto de entrada da aplicação
├── main_installer.js    # Ponto de entrada do instalador
├── components/          # Componentes Vue reutilizáveis
│   ├── accessurl/       # Componentes de multi-URL (portal)
│   ├── admin/           # Componentes específicos para administradores
│   ├── assignments/     # Formulários e listas de tarefas
│   ├── attendance/      # Componentes de folha de presença
│   ├── basecomponents/  # Componentes base compartilhados (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) e ChamiloIcons.js
│   ├── blog/            # Componentes de blog
│   ├── branch/          # Componentes de filial/campus de rede
│   ├── ccalendarevent/  # Componentes de eventos do calendário do curso
│   ├── chat/            # Chat e tutor de IA
│   ├── course/          # Cartões de curso, catálogos, formulários
│   ├── coursecategory/  # Componentes de categoria de curso
│   ├── coursemaintenance/ # Componentes de backup/restauração de curso
│   ├── ctoolintro/      # Componentes de introdução às ferramentas do curso
│   ├── documents/       # Componentes de gerenciamento de documentos
│   ├── dropbox/         # Componentes de Dropbox (troca de arquivos)
│   ├── filemanager/     # Componentes de navegador de arquivos
│   ├── glossary/        # Componentes de glossário
│   ├── installer/       # Assistente de instalação
│   ├── layout/          # Barra lateral, barra superior, layout de shell
│   ├── links/           # Componentes de links externos
│   ├── login/           # Componentes de formulário de login
│   ├── lp/              # Componentes de caminho de aprendizagem
│   ├── message/         # Componentes de mensagens
│   ├── page/            # Componentes de página estática
│   ├── pageLayout/      # Componentes de wrapper de layout de página
│   ├── personalfile/    # Componentes de espaço de arquivos pessoais
│   ├── platform/        # Componentes de UI no nível da plataforma
│   ├── resource_links/  # Componentes de gerenciamento de links de recursos
│   ├── room/            # Componentes de sala virtual
│   ├── session/         # Componentes de sessão (campanha de aprendizagem)
│   ├── sessionadmin/    # Componentes de administração de sessão
│   ├── skill/           # Componentes de habilidades e competências
│   ├── social/          # Componentes de rede social
│   ├── systemannouncement/ # Componentes de anúncios do sistema
│   ├── user/            # Componentes de perfil e gerenciamento de usuário
│   ├── usergroup/       # Componentes de grupo de usuários (turma)
│   └── userreluser/     # Componentes de relacionamento de usuário (amigo/seguir)
├── views/               # Visualizações Vue no nível de página (espelha a estrutura de components/)
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + um módulo por área de funcionalidade)
├── store/               # Stores Pinia
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Funções de composição compartilhadas (subdiretórios por funcionalidade)
├── services/            # Camada de serviço de API (um arquivo por entidade/domínio)
├── utils/               # Auxiliares utilitários (datas, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Configuração em tempo de execução (api.js, env.js)
├── constants/           # Constantes compartilhadas
│   └── entity/          # Constantes específicas de entidade (sessão, mensagem, campo extra, etc.)
├── layouts/             # Componentes de layout de alto nível (MyCourses.vue)
├── pages/               # Componentes de página autônomos (Home, Login, Faq, Demo)
├── mixins/              # Mixins no estilo Vue 2 legado (ListMixin, CreateMixin, etc.)
├── hooks/               # Hooks componíveis (useSidebar, useState)
├── plugins/             # Registros de plugins Vue (httpErrors, vuetify)
├── validators/          # Validadores personalizados Vuelidate
└── error/               # Componentes de limite de erro
```

## Configuração (`config/`)

```
config/
├── packages/            # Configuração de pacotes e framework (um arquivo YAML por pacote)
│   ├── security.yaml    # Hierarquia de papéis, firewalls, controle de acesso
│   ├── doctrine.yaml    # Configurações do Doctrine ORM e DBAL
│   ├── api_platform.yaml# Configuração da API Platform
│   ├── framework.yaml   # Configurações principais do Symfony
│   ├── lexik_jwt_authentication.yaml  # Configurações de token JWT
│   ├── nelmio_cors.yaml # Cabeçalhos CORS para consumidores de API
│   ├── oneup_flysystem.yaml  # Adaptadores de armazenamento em nuvem
│   ├── webpack_encore.yaml   # Integração com Webpack Encore
│   ├── ... (mais de 30 arquivos de pacotes)
│   ├── dev/             # Sobrescritas exclusivas para desenvolvimento (web profiler, debug, roteamento)
│   ├── prod/            # Sobrescritas exclusivas para produção (atualmente um espaço reservado vazio)
│   └── test/            # Sobrescritas para ambiente de teste (JWT, validador, web profiler)
├── routes/              # Definições de rotas
│   ├── api_platform.yaml     # Prefixo de rota da API Platform
│   ├── attributes.yaml       # Rotas baseadas em anotações de controlador
│   ├── fos_js_routing.yaml   # Exposição de roteamento FOS JS
│   ├── legacy.yaml           # Rotas para páginas PHP legadas em public/main/
│   ├── security.yaml         # Rotas de login/logout/OAuth2
│   ├── dev/                  # Rotas exclusivas para desenvolvimento (profiler, Maker bundle)
│   └── test/                 # Sobrescritas de rotas exclusivas para teste
├── jwt/                 # Par de chaves JWT (chaves privada/pública)
└── jwt-test/            # Chaves JWT para o ambiente de teste
```

O Symfony mescla automaticamente os arquivos base `packages/*.yaml` com aqueles no subdiretório de ambiente correspondente (`dev/`, `prod/` ou `test/`), de modo que os arquivos específicos de ambiente só precisam sobrescrever os valores que diferem.

## Configuração de Build

| Arquivo | Finalidade |
|------|---------|
| `webpack.config.js` | Configuração do Webpack Encore (entradas, carregadores, plugins) |
| `tailwind.config.js` | Configuração do Tailwind CSS (caminhos de conteúdo, extensões de tema, plugins) |
| `tsconfig.json` | Configuração do TypeScript |
| `eslint.config.mjs` | Regras do ESLint (configuração plana) |
| `.prettierrc.json` | Regras de formatação do Prettier |

Todos os arquivos estão na raiz do projeto. Os plugins PostCSS (Tailwind + Autoprefixer) são configurados inline dentro de `webpack.config.js` por meio de `enablePostCssLoader()` — não há um arquivo independente `postcss.config.js`. O `webpack.config.js` lê o `tailwind.config.js` indiretamente através do PostCSS, então mudanças nas seções `content` ou `theme` do Tailwind entram em vigor na próxima execução de `yarn encore dev` / `yarn encore production`.

## Pontos de Entrada do Webpack

O build produz os seguintes pacotes:

**JavaScript:**
* `vue` — Aplicação principal Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Assistente de instalação (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — JS legado para páginas ainda não migradas para Vue

**CSS:**
* `app` — Folha de estilo principal (`assets/css/app.scss`)
* Além de folhas especializadas: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Estrutura de CSS (`assets/css/`)

```
assets/css/
├── app.scss             # Ponto de entrada — importa Tailwind, o índice SCSS e CSS de terceiros
├── _tailwind.scss       # Diretivas Tailwind (@tailwind base / components / utilities)
├── chat.scss            # Estilos do painel de chat e tutor de IA
├── document.scss        # Estilos do visualizador de documentos
├── editor.scss          # Estilos da interface do editor TinyMCE
├── editor_content.scss  # Estilos injetados no corpo do iframe do editor
├── markdown.scss        # Estilos de conteúdo renderizado em Markdown
├── print.scss           # Folha de estilo para impressão
├── responsive.scss      # Sobrescritas responsivas
├── scorm.scss           # Estilos do player SCORM
├── legacy/              # Estilos para páginas PHP legadas (ex.: frameReadyLoader.scss)
└── scss/                # Partes modulares de SCSS
    ├── index.scss           # Arquivo barril — importa todas as partes abaixo
    ├── abstracts/           # Mixins e funções compartilhadas
    ├── settings/            # Tokens de design (tipografia, base de componentes)
    ├── atoms/               # Sobrescritas de PrimeVue por componente (botões, inputs, calendário, etc.)
    ├── molecules/           # Pequenos padrões de UI compostos (chips, barras de ferramentas, estados vazios)
    ├── organisms/           # Áreas de funcionalidades maiores (barra lateral, tabela de dados, diálogo, painel LP, etc.)
    ├── layout/              # Partes do esqueleto da página (barra superior, contêiner principal, breadcrumb)
    ├── components/          # Arquivos específicos de componentes legados (blog, exercício, social, habilidade, etc.)
    └── libs/                # Sobrescritas de bibliotecas de terceiros (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

O Tailwind está integrado via PostCSS. O arquivo `assets/css/_tailwind.scss` emite as camadas base, de componentes e de utilitários; o arquivo `assets/css/app.scss` o importa primeiro, para que os utilitários do Tailwind estejam disponíveis em todos os outros arquivos parciais. A configuração do Tailwind — caminhos de conteúdo para purga, extensões de tema e plugins — está localizada em `tailwind.config.js` na raiz do projeto (`/var/www/chamilo/tailwind.config.js`).

Classes de utilitários personalizadas e classes de componentes definidas com `@layer` (visíveis em `app.scss`) seguem a convenção de camadas do Tailwind, de modo que as classes definidas pelo usuário respeitem as mesmas regras de especificidade que os utilitários gerados.

### Temas de Cores

O Chamilo suporta um sistema de temas de cores que pode ser configurado diretamente pela interface de administração (**Admin > Temas de Cores**). Cada tema salvo grava seus arquivos em um diretório dedicado sob `var/themes/`:

```
var/themes/
└── [nome-do-tema]/
    ├── colors.css       # Propriedades personalizadas de CSS para a paleta de cores completa
    ├── default.css      # Regras adicionais de CSS personalizadas opcionais
    ├── learnpath.css    # Sobrescritas específicas para caminhos de aprendizagem
    ├── tiny-settings.js # Configurações da paleta de cores do editor TinyMCE
    └── images/          # Imagens do tema (logo, favicon, fundos, ícones PWA)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Imagens de fundo, imagens de blocos administrativos, etc.
```

O arquivo `colors.css` define propriedades personalizadas de CSS como tripletos de canais RGB separados por espaço, em vez de valores `rgb()`, o que permite que o Tailwind componha variantes de opacidade (por exemplo, `bg-primary/50`) sem configuração adicional:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

A camada de tema fica acima do pacote compilado de Tailwind/SCSS: o navegador carrega `colors.css` após a folha de estilo principal, de modo que as alterações de tema entram em vigor imediatamente, sem a necessidade de uma etapa de compilação.