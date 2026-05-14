# Visualizações e Rotas

Chamilo possui um grande conjunto de visualizações Vue (componentes de nível de página) conectadas por meio do Vue Router. Os arquivos reais estão localizados em `assets/vue/views/`.

## Arquitetura do Roteador

O roteador é definido em `assets/vue/router/index.js` usando `createWebHistory` para URLs limpas.

As rotas são modulares — organizadas em arquivos de rota por funcionalidade, importados para o roteador principal:

| Módulo de Rota | Páginas |
|----------------|---------|
| `admin` | Páginas do painel de administração |
| `sessionAdmin` | Páginas de administração de sessões |
| `course` | Lista de cursos, criação, página inicial, catálogo |
| `account` | Perfil e configurações do usuário |
| `personalfile` | Espaço de arquivos pessoais |
| `message` | Mensagens / caixa de entrada |
| `user` | Páginas de gerenciamento de usuários |
| `usergroup` | Páginas de grupos de usuários (turmas) |
| `userreluser` | Páginas de relacionamento entre usuários (amigos/seguidores) |
| `ccalendarevent` | Calendário e agenda do curso |
| `ctoolintro` | Páginas de introdução às ferramentas do curso |
| `page` | Páginas estáticas de CMS |
| `pageLayout` | Envoltórios de layout de página |
| `publicPage` | Páginas acessíveis publicamente |
| `social` | Páginas de rede social |
| `filemanager` | Gerenciador de arquivos (navegador de documentos do curso) |
| `skill` | Páginas de habilidades e competências |
| `accessurl` | Páginas de gerenciamento de multi-URL (portal) |
| `branch` | Páginas de filial / campus de rede |
| `room` | Páginas de salas virtuais |
| `buycourses` | Páginas de compra de cursos |
| `documents` | Gerenciamento de documentos |
| `assignments` | Fluxo de trabalho de tarefas |
| `links` | Gerenciamento de links externos |
| `glossary` | Gerenciamento de glossário |
| `attendance` | Rastreamento de presença |
| `lp` | Player e editor de trilhas de aprendizagem |
| `dropbox` | Dropbox / troca de arquivos |
| `blog` | Páginas de blog |
| `blogAdmin` | Administração de blog |
| `coursemaintenance` | Backup e restauração de cursos |
| `catalogue` | Catálogos de cursos e sessões |

## Rotas Principais

| Caminho | Visualização | Descrição |
|---------|--------------|-----------|
| `/` | `AppIndex.vue` (ou personalizado) | Ponto de entrada da aplicação |
| `/home` | `pages/Home.vue` | Página inicial da plataforma |
| `/login` | `pages/Login.vue` | Página de login |
| `/courses` | `views/user/courses/List.vue` | Cursos inscritos do usuário |
| `/sessions` | `views/user/sessions/SessionsCurrent.vue` | Sessões atuais |
| `/sessions/past` | `views/user/sessions/SessionsPast.vue` | Sessões passadas |
| `/sessions/upcoming` | `views/user/sessions/SessionsUpcoming.vue` | Sessões futuras |
| `/course/:id/home` | `views/course/CourseHome.vue` | Página inicial do curso |
| `/account/home` | `views/account/Home.vue` | Perfil do usuário |
| `/admin` | Visualizações de administrador | Painel de administração |
| `/faq` | `pages/Faq.vue` | Página de perguntas frequentes (FAQ) |

## Guardas de Rota

O roteador utiliza guardas de navegação (declaradas com `beforeEach` e `afterEach`) para:

* Verificar o status de autenticação por meio de `useSecurityStore` e redirecionar usuários não autenticados para `/login`
* Verificar o contexto do curso por meio de `useCidReqStore`
* Aplicar classes CSS de tipo de página durante a navegação SPA (substituindo o que o `PageHelper` do Twig faria em um carregamento completo de página)
* Suportar substituições de modelo Vue personalizadas — o componente de entrada em `/` é trocado por um `AppIndex.vue` personalizado quando um modelo Vue personalizado está ativado (`var/vue_templates/pages/AppIndex.vue`)

## Organização de Visualizações

As visualizações estão em `assets/vue/views/`, organizadas por funcionalidade:

```
views/
├── account/          # Perfil e configurações do usuário
├── admin/            # Páginas de administração
├── assignments/      # Envio e avaliação de tarefas
├── attendance/       # Folhas de presença
├── blog/             # Postagens e comentários de blog
├── branch/           # Gerenciamento de campus de rede
├── buycourses/       # Fluxo de compra de cursos
├── ccalendarevent/   # Calendário do curso
├── course/           # Lista de cursos, página inicial, criação, catálogo
├── coursecategory/   # Gerenciamento de categorias de cursos
├── coursemaintenance/# Backup/restauração de cursos
├── ctoolintro/       # Páginas de introdução às ferramentas
├── documents/        # Lista de documentos, criação, geração de mídia
├── dropbox/          # Dropbox / troca de arquivos
├── filemanager/      # Navegador de arquivos
├── glossary/         # Lista de glossário e gerenciamento de termos
├── links/            # Links externos
├── lp/               # Player e editor de trilhas de aprendizagem
├── message/          # Caixa de entrada e mensagens
├── page/             # Páginas estáticas de CMS
├── pageLayout/       # Envoltórios de layout de página
├── personalfile/     # Espaço de arquivos pessoais
├── room/             # Salas virtuais
├── sessionadmin/     # Administração de sessões
├── skill/            # Habilidades e competências
├── social/           # Rede social
├── terms/            # Termos de serviço
├── user/             # Gerenciamento de usuários e listas de cursos/sessões
├── usergroup/        # Grupos de usuários (turmas)
└── userreluser/      # Relacionamentos entre usuários (amigos/seguidores)
```