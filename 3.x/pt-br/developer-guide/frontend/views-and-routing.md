# Views and Routing

O Chamilo possui um grande conjunto de views Vue (componentes no nível de página) conectadas via Vue Router. Os arquivos efetivos ficam em `assets/vue/views/`.

## Router Architecture

O roteador é definido em `assets/vue/router/index.js` usando `createWebHistory` para URLs limpas.

As rotas são modulares — organizadas em arquivos de rota por funcionalidade importados no roteador principal:

| Route module | Pages |
|-------------|-------|
| `admin` | Páginas do painel de administração |
| `sessionAdmin` | Páginas de administração de sessões |
| `course` | Lista de cursos, criação, início, catálogo |
| `account` | Perfil e configurações do usuário |
| `personalfile` | Espaço de arquivos pessoais |
| `message` | Mensagens / caixa de entrada |
| `user` | Páginas de gestão de usuários |
| `usergroup` | Páginas de grupos de usuários (turmas) |
| `userreluser` | Páginas de relacionamento entre usuários (amigo/seguir) |
| `ccalendarevent` | Calendário e agenda do curso |
| `ctoolintro` | Páginas de introdução das ferramentas do curso |
| `page` | Páginas CMS estáticas |
| `pageLayout` | Invólucros de layout de página |
| `publicPage` | Páginas de acesso público |
| `social` | Páginas da rede social |
| `filemanager` | Gerenciador de arquivos (navegador de documentos do curso) |
| `skill` | Páginas de habilidades e competências |
| `accessurl` | Páginas de gestão de múltiplas URLs (portal) |
| `branch` | Páginas de filiais / campi em rede |
| `room` | Páginas de salas virtuais |
| `buycourses` | Páginas de compra de cursos |
| `documents` | Gestão de documentos |
| `assignments` | Fluxo de trabalhos |
| `links` | Gestão de links externos |
| `glossary` | Gestão de glossário |
| `attendance` | Controle de frequência |
| `lp` | Reprodutor e editor de percursos de aprendizagem |
| `dropbox` | Dropbox / troca de arquivos |
| `blog` | Páginas de blog |
| `blogAdmin` | Administração do blog |
| `coursemaintenance` | Backup e restauração de curso |
| `catalogue` | Catálogos de cursos e sessões |

## Key Routes

| Path | View | Description |
|------|------|-------------|
| `/` | `AppIndex.vue` (or custom) | Ponto de entrada da aplicação |
| `/home` | `pages/Home.vue` | Página inicial da plataforma |
| `/login` | `pages/Login.vue` | Página de login |
| `/courses` | `views/user/courses/List.vue` | Cursos em que o usuário está inscrito |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sessões atuais |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sessões passadas |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sessões futuras |
| `/course/:id/home` | `views/course/CourseHome.vue` | Página inicial do curso |
| `/account/home` | `views/account/Home.vue` | Perfil do usuário |
| `/admin` | Admin views | Painel de administração |
| `/faq` | `pages/Faq.vue` | Página de FAQ |

## Route Guards

O roteador usa guards de navegação (declarados com `beforeEach` e `afterEach`) para:

* Verificar o status de autenticação via `useSecurityStore` e redirecionar usuários não autenticados para `/login`
* Verificar o contexto do curso via `useCidReqStore`
* Aplicar classes CSS de tipo de página durante a navegação SPA (substituindo o que o `PageHelper` do Twig faria em um carregamento completo de página)
* Suportar substituições personalizadas de templates Vue — o componente de entrada em `/` é trocado por um `AppIndex.vue` personalizado quando um template Vue customizado está habilitado (`var/vue_templates/pages/AppIndex.vue`)

## View Organization

As views ficam em `assets/vue/views/`, organizadas por funcionalidade:

```
views/
├── account/          # User profile and settings
├── admin/            # Admin pages
├── assignments/      # Assignment submission and grading
├── attendance/       # Attendance sheets
├── blog/             # Blog posts and comments
├── branch/           # Network campus management
├── buycourses/       # Course purchase flow
├── ccalendarevent/   # Course calendar
├── course/           # Course list, home, creation, catalog
├── coursecategory/   # Course category management
├── coursemaintenance/# Course backup/restore
├── ctoolintro/       # Tool introduction pages
├── documents/        # Document list, creation, media generation
├── dropbox/          # Dropbox / file exchange
├── filemanager/      # File browser
├── glossary/         # Glossary list and term management
├── links/            # External links
├── lp/               # Learning path player and editor
├── message/          # Inbox and messaging
├── page/             # CMS static pages
├── pageLayout/       # Page layout wrappers
├── personalfile/     # Personal file space
├── room/             # Virtual rooms
├── sessionadmin/     # Session administration
├── skill/            # Skills and competencies
├── social/           # Social network
├── terms/            # Terms of service
├── user/             # User management and course/session lists
├── usergroup/        # User groups (classes)
└── userreluser/      # User relationships (friends/follows)
```