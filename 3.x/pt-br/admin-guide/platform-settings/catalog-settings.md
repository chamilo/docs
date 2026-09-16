# Configurações do Catálogo de Cursos

Comportamento do catálogo de cursos (a lista pública em que os usuários podem navegar e se inscrever por conta própria).

Acesse estas configurações em **Administração > Configurações > Catálogo de Cursos**. Esta categoria contém **13 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_session_auto_subscription`

**Inscrição automática em sessões**

Habilitar a inscrição automática de usuários em sessões.

*Padrão: `false`*

### `allow_students_to_browse_courses`

**Permitir navegação pelos alunos**

Permitir que os alunos naveguem e filtrem o catálogo de cursos.

*Padrão: `true`*

### `course_catalog_display_in_home`

**Exibir catálogo na página inicial**

Mostrar o bloco do catálogo de cursos na página inicial da plataforma.

*Padrão: `false`*

### `course_catalog_hide_private`

**Ocultar cursos privados**

Excluir cursos privados da exibição do catálogo.

*Padrão: `true`*

### `course_catalog_published`

**Publicar o catálogo de cursos**

Tornar o catálogo de cursos disponível para usuários anônimos (o público em geral), sem necessidade de login.

*Padrão: `false`*

### `course_catalog_settings`

**Configurações do catálogo de cursos**

Configuração JSON do catálogo de cursos: configurações de links, filtros, opções de ordenação e outros.

### `course_subscription_in_user_s_session`

**Inscrição na visualização da sessão**

Permitir que os usuários se inscrevam em cursos diretamente a partir da página da sessão.

*Padrão: `false`*

### `hide_public_link`

**Ocultar link público**

Remover o link de URL pública dos cartões de curso.

*Padrão: `false`*

### `only_show_course_from_selected_category`

**Mostrar apenas categorias correspondentes no catálogo de cursos**

Quando não estiver vazio, apenas os cursos das categorias informadas aparecerão no catálogo de cursos.

### `only_show_selected_courses`

**Apenas cursos selecionados**

Mostrar no catálogo somente os cursos selecionados manualmente.

*Padrão: `false`*

### `session_catalog_settings`

**Configurações do catálogo de sessões**

Configuração JSON do catálogo de sessões: filtros e opções de exibição.

### `show_courses_descriptions_in_catalog`

**Mostrar descrições dos cursos**

Exibir as descrições dos cursos na listagem do catálogo.

*Padrão: `false`*

### `show_courses_sessions`

**Mostrar cursos e sessões**

Incluir tanto cursos quanto sessões nos resultados do catálogo.

*Padrão: `0`*