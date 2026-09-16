# Definições do Catálogo de Cursos

Comportamento do catálogo de cursos (a lista pública onde os utilizadores podem navegar e inscrever-se autonomamente).

Aceda a estas definições em **Administração > Definições de configuração > Catálogo de Cursos**. Esta categoria contém **13 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_session_auto_subscription`

**Inscrição automática em sessões**

Ativar a inscrição automática em sessões para os utilizadores.

*Predefinição: `false`*

### `allow_students_to_browse_courses`

**Permitir navegação pelos estudantes**

Permitir que os estudantes naveguem e filtrem o catálogo de cursos.

*Predefinição: `true`*

### `course_catalog_display_in_home`

**Mostrar o catálogo na página inicial**

Mostrar o bloco do catálogo de cursos na página inicial da plataforma.

*Predefinição: `false`*

### `course_catalog_hide_private`

**Ocultar cursos privados**

Excluir os cursos privados da apresentação do catálogo.

*Predefinição: `true`*

### `course_catalog_published`

**Publicar o catálogo de cursos**

Tornar o catálogo de cursos disponível a utilizadores anónimos (o público em geral) sem necessidade de iniciar sessão.

*Predefinição: `false`*

### `course_catalog_settings`

**Definições do catálogo de cursos**

Configuração JSON do catálogo de cursos: definições de ligações, filtros, opções de ordenação e mais.

### `course_subscription_in_user_s_session`

**Inscrição na vista de sessão**

Permitir que os utilizadores se inscrevam em cursos diretamente a partir da página da sua sessão.

*Predefinição: `false`*

### `hide_public_link`

**Ocultar ligação pública**

Remover a ligação de URL pública dos cartões de curso.

*Predefinição: `false`*

### `only_show_course_from_selected_category`

**Mostrar apenas categorias correspondentes no catálogo de cursos**

Quando não estiver vazio, apenas os cursos das categorias indicadas aparecerão no catálogo de cursos.

### `only_show_selected_courses`

**Apenas cursos selecionados**

Mostrar no catálogo apenas os cursos selecionados manualmente.

*Predefinição: `false`*

### `session_catalog_settings`

**Definições do catálogo de sessões**

Configuração JSON do catálogo de sessões: filtros e opções de apresentação.

### `show_courses_descriptions_in_catalog`

**Mostrar descrições dos cursos**

Apresentar as descrições dos cursos na listagem do catálogo.

*Predefinição: `false`*

### `show_courses_sessions`

**Mostrar cursos e sessões**

Incluir tanto cursos como sessões nos resultados do catálogo.

*Predefinição: `0`*