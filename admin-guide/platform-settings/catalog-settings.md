# Configurações do Catálogo de Cursos

Comportamento do catálogo de cursos (a lista pública onde os usuários podem navegar e se inscrever por conta própria).

Acesse essas configurações em **Administração > Configurações de configuração > Catálogo de Cursos**. Esta categoria contém **13 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_session_auto_subscription`

**Inscrição Automática em Sessões**

Habilita a inscrição automática em sessões para os usuários.

*Padrão: `false`*

### `allow_students_to_browse_courses`

**Permitir Navegação de Estudantes**

Permite que os estudantes naveguem e filtrem o catálogo de cursos.

*Padrão: `true`*

### `course_catalog_display_in_home`

**Exibir Catálogo na Página Inicial**

Mostra o bloco do catálogo de cursos na página inicial da plataforma.

*Padrão: `false`*

### `course_catalog_hide_private`

**Ocultar Cursos Privados**

Exclui cursos privados da exibição no catálogo.

*Padrão: `true`*

### `course_catalog_published`

**Publicar Catálogo de Cursos**

Torna o catálogo de cursos disponível para usuários anônimos (público em geral) sem a necessidade de login.

*Padrão: `false`*

### `course_catalog_settings`

**Configurações do Catálogo de Cursos**

Configuração JSON para o catálogo de cursos: configurações de links, filtros, opções de ordenação e mais.

### `course_subscription_in_user_s_session`

**Inscrição na Visualização de Sessão**

Permite que os usuários se inscrevam em cursos diretamente da página de sua sessão.

*Padrão: `false`*

### `hide_public_link`

**Ocultar Link Público**

Remove o link de URL público dos cartões de curso.

*Padrão: `false`*

### `only_show_course_from_selected_category`

**Mostrar Apenas Categorias Correspondentes no Catálogo de Cursos**

Quando não estiver vazio, apenas os cursos das categorias especificadas aparecerão no catálogo de cursos.

### `only_show_selected_courses`

**Apenas Cursos Selecionados**

Mostra apenas cursos selecionados manualmente no catálogo.

*Padrão: `false`*

### `session_catalog_settings`

**Configurações do Catálogo de Sessões**

Configuração JSON para o catálogo de sessões: filtros e opções de exibição.

### `show_courses_descriptions_in_catalog`

**Mostrar Descrições de Cursos**

Exibe as descrições dos cursos na listagem do catálogo.

*Padrão: `false`*

### `show_courses_sessions`

**Mostrar Cursos e Sessões**

Inclui tanto cursos quanto sessões nos resultados do catálogo.

*Padrão: `0`*