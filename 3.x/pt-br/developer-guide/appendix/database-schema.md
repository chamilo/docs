# Esquema do Banco de Dados

O Chamilo 3.0 mapeia um grande conjunto de entidades Doctrine para tabelas do banco de dados. As contagens exatas variam entre as versões — consulte os diretórios de entidades listados abaixo para o estado atual.

## Localização das entidades

| Bundle | Onde | Prefixo |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | Nenhum (ex.: `user`, `course`, `session`) |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` (ex.: `c_document`, `c_quiz`, `c_lp`) |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## Tabelas principais

### Usuário e autenticação

| Tabela | Finalidade |
|-------|---------|
| `user` | Contas de usuário |
| `access_url` | Portais multi-URL |
| `access_url_rel_user` | Atribuições de usuário ao portal |
| `usergroup` | Grupos de usuários em toda a plataforma |

### Cursos

| Tabela | Finalidade |
|-------|---------|
| `course` | Cursos |
| `course_category` | Categorias de cursos |
| `course_rel_user` | Matrículas em cursos |

### Sessões

| Tabela | Finalidade |
|-------|---------|
| `session` | Sessões de formação |
| `session_rel_user` | Matrículas em sessões |
| `session_rel_course` | Cursos nas sessões |
| `session_rel_course_rel_user` | Matrícula do usuário por sessão-curso |

### Sistema de recursos

| Tabela | Finalidade |
|-------|---------|
| `resource_node` | Abstração unificada de conteúdo |
| `resource_file` | Anexos de arquivo |
| `resource_link` | Visibilidade/acesso por contexto |
| `resource_type` | Registro de tipos de recurso |

### Conteúdo do curso (prefixo c_)

| Tabela | Finalidade |
|-------|---------|
| `c_document` | Documentos |
| `c_quiz` | Exercícios/testes |
| `c_quiz_question` | Questões de questionário |
| `c_quiz_answer` | Respostas das questões |
| `c_lp` | Percursos de aprendizagem |
| `c_lp_item` | Itens de percurso de aprendizagem |
| `c_forum_category` | Categorias de fórum |
| `c_forum_forum` | Fóruns |
| `c_forum_thread` | Tópicos de fórum |
| `c_forum_post` | Publicações de fórum |
| `c_student_publication` | Tarefas/envios |
| `c_survey` | Pesquisas |
| `c_glossary` | Termos do glossário |
| `c_calendar_event` | Eventos de calendário |
| `c_attendance` | Folhas de presença |

### Rastreamento

| Tabela | Finalidade |
|-------|---------|
| `track_e_login` | Rastreamento de login |
| `track_e_online` | Rastreamento de usuários online |
| `track_e_default` | Rastreamento genérico de atividade |
| `gradebook_category` | Categorias do boletim |
| `gradebook_result` | Notas |

### Configurações

| Tabela | Finalidade |
|-------|---------|
| `settings` | Configurações da plataforma |
| `settings_options` | Definições de opções de configuração |

## Migrações

As alterações no esquema do banco de dados são gerenciadas por meio de Doctrine Migrations em `src/CoreBundle/Migrations/`. Execute as migrações com:

```bash
php bin/console doctrine:migrations:migrate
```