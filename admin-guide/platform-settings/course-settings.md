# Configurações de Curso

Padrões e políticas que se aplicam aos cursos em toda a plataforma — visibilidade, direitos de criação, ferramentas permitidas, permissões de alunos e similares.

Acesse essas configurações em **Administração > Configurações de configuração > Curso**. Esta categoria contém **45 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `active_tools_on_create`

**Ferramentas ativas na criação de cursos**

Selecione as ferramentas que estarão *ativas* após a criação de um curso.

*Padrão:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Usar categorias de curso da URL principal**

Em configurações de múltiplas URLs, permita que administradores e professores atribuam categorias da URL principal aos cursos nas URLs filhas.

*Padrão: `false`*

### `allow_course_theme`

**Permitir temas de curso**

Permite temas gráficos para cursos e possibilita alterar a folha de estilo usada por um curso para qualquer uma das folhas de estilo disponíveis no Chamilo. Quando um usuário entra no curso, a folha de estilo do curso terá prioridade sobre a folha de estilo pessoal do usuário e a folha de estilo padrão da plataforma.

*Padrão: `true`*

### `allow_public_course_with_no_terms_conditions`

**Acessar cursos públicos com termos e condições**

Com esta opção ativada, se um curso tiver visibilidade pública e termos e condições, esses termos serão desativados enquanto o curso estiver público.

*Padrão: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloquear acesso de usuários autenticados a cursos públicos**

Mostrar apenas cursos públicos. Não permitir que usuários registrados acessem cursos com visibilidade 'aberta' a menos que estejam inscritos nesses cursos.

*Padrão: `false`*

### `breadcrumbs_course_homepage`

**Breadcrumb na página inicial do curso**

O breadcrumb é o sistema de navegação por links horizontais geralmente localizado no canto superior esquerdo da página. Esta opção seleciona o que você deseja que apareça no breadcrumb nas páginas iniciais dos cursos.

*Padrão: `course_title`*

### `course_about_teacher_name_hide`

**Ocultar informações do professor na página de detalhes do curso**

Na página de detalhes do curso, ocultar as informações do professor.

*Padrão: `false`*

### `course_category_code_to_use_as_model`

**Restringir modelos de curso a uma categoria de curso**

Forneça um código de categoria para usar como modelos de curso. Apenas esses cursos serão exibidos no menu suspenso no momento da criação do curso, e os usuários não verão os cursos dessa categoria no catálogo de cursos.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campos extras a serem exibidos nas configurações do curso**

Os campos definidos neste array aparecerão na página de configurações do curso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campos extras a serem exibidos no formulário de criação de curso**

Os campos definidos neste array aparecerão como campos adicionais no formulário de criação de curso.

### `course_creation_donate_link`

**Link de doação na página de criação de curso**

A página para a qual a mensagem de doação deve direcionar (URL completa).

### `course_creation_donate_message_show`

**Mostrar mensagem de doação na página de criação de curso**

Adicionar uma caixa de mensagem na página de criação de curso para professores, solicitando que doem para o projeto.

*Padrão: `false`*

### `course_creation_form_hide_course_code`

**Remover campo de código do curso do formulário de criação**

Se não fornecido, o código do curso é gerado por padrão com base no título do curso, então ative esta opção para remover completamente o campo de código do formulário de criação de curso.

*Padrão: `false`*

### `course_creation_form_set_course_category_mandatory`

**Tornar categoria de curso obrigatória**

Ao criar um curso, tornar a categoria do curso uma configuração obrigatória.

*Padrão: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campos extras obrigatórios no formulário de criação de curso**

Os campos definidos neste array serão obrigatórios no formulário de criação de curso.

### `course_creation_splash_screen`

**Tela de apresentação para cursos**

Mostrar uma tela de apresentação ao criar um novo curso.

*Padrão: `true`*

---
### `course_creation_use_template`

**Usar curso modelo para novos cursos**

Defina esta opção para usar o mesmo curso modelo (identificado pelo seu ID numérico no banco de dados) para todos os novos cursos que serão criados na plataforma. Observe que, se não for bem planejado, essa configuração pode ter um impacto massivo no uso de espaço. O curso modelo será usado como se o professor fizesse uma cópia do curso com as ferramentas de backup de curso, portanto, nenhum conteúdo de usuário é copiado, apenas o material do professor. Todas as outras regras de backup de curso se aplicam. Deixe vazio (ou defina como 0) para desativar.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Preencher campos do curso com campos do usuário**

Se não estiver vazio, o processo de criação de curso procurará alguns campos no perfil do usuário e os preencherá automaticamente para o curso. Por exemplo, um professor especializado em marketing digital poderia definir automaticamente uma marca de « marketing digital » em cada curso que criar.

### `course_hide_tools`

**Ocultar ferramentas dos professores**

Marque as ferramentas que deseja ocultar dos professores. Isso proibirá o acesso à ferramenta.

### `course_images_in_courses_list`

**Ícones personalizados de cursos**

Use imagens de curso como ícone do curso nas listas de cursos (em vez do ícone padrão de quadro negro verde).

*Default: `true`*

### `course_log_default_extra_fields`

**Campos extras de usuário por padrão na página de estatísticas do curso**

Configure este array com os IDs internos dos campos extras que você deseja mostrar por padrão na página principal de estatísticas do curso.

### `course_log_hide_columns`

**Ocultar colunas dos registros de curso**

Este array oferece a possibilidade de configurar quais colunas ocultar na página principal de estatísticas do curso e no relatório de tempo total.

### `course_sequence_valid_only_in_same_session`

**Validar pré-requisitos apenas dentro da mesma sessão**

Quando ativado, um curso será considerado validado apenas se for concluído dentro da sessão atual. Se desativado, cursos concluídos em outras sessões também desbloquearão cursos dependentes.

*Default: `false`*

### `course_student_info`

**Exibição de informações do aluno no curso**

Nas páginas ‘Meus cursos’/’Minhas sessões’, mostre informações adicionais sobre a pontuação, progresso e/ou aquisição de certificado pelo aluno.

### `course_validation`

**Validação de cursos**

Quando a funcionalidade 'Validação de cursos' está ativada, um professor não pode criar um curso sozinho. Ele/ela preenche uma solicitação de curso. O administrador da plataforma revisa a solicitação e a aprova ou rejeita.<br />Esta funcionalidade depende de mensagens de e-mail automatizadas; configure o Chamilo para acessar um servidor de e-mail e usar uma conta de e-mail dedicada.

*Default: `false`*

### `course_validation_terms_and_conditions_url`

**Validação de curso - um link para os termos e condições**

Este é o URL do documento de 'Termos e Condições' que é válido para fazer uma solicitação de curso. Se o endereço for definido aqui, o usuário deve ler e concordar com esses termos e condições antes de enviar uma solicitação de curso.<br />Se você ativar o módulo 'Termos e Condições' do Chamilo e quiser que seu URL seja usado, deixe esta configuração vazia.

### `courses_default_creation_visibility`

**Visibilidade padrão do curso**

Visibilidade padrão do curso ao criar um novo curso

*Default: `2`*

### `display_coursecode_in_courselist`

**Exibir código no nome do curso**

Exibir o código do curso na lista de cursos

*Default: `false`*

### `display_teacher_in_courselist`

**Exibir professor no nome do curso**

Exibir o professor na lista de cursos

*Default: `true`*

### `enable_tool_introduction`

**Ativar introdução da ferramenta**

Ativar introduções na página inicial de cada ferramenta

*Default: `false`*

### `enable_unsubscribe_button_on_my_course_page`

**Mostrar botão de cancelamento de inscrição em ‘Meus cursos’**

Adicionar um botão para cancelar a inscrição de um curso na página ‘Meus cursos’.

*Default: `false`*

### `example_material_course_creation`

**Material de exemplo na criação de curso**

Criar material de exemplo automaticamente ao criar um novo curso

*Default: `true`*

### `hide_course_rating`

**Ocultar avaliação do curso**

A funcionalidade de avaliação de curso aparece por padrão em diferentes lugares. Se você não a desejar, ative esta opção.

*Default: `false`*

### `hide_course_sidebar`

**Ocultar bloco de cursos na barra lateral**

Em telas onde o menu esquerdo está visível, não exibir a seção « Cursos ».

*Default: `true`*

### `multiple_access_url_show_shared_course_marker`

**Mostrar marcador de curso compartilhado em multi-URL**

Adiciona um ícone de link aos cursos que são compartilhados entre URLs, para que os usuários (especialmente professores) saibam que devem ter cuidado especial ao editar o conteúdo do curso.

*Default: `false`*

### `my_courses_show_courses_in_user_language_only`

**Mostrar apenas cursos no idioma do usuário**

Se ativada, esta opção ocultará todos os cursos que não estejam configurados no idioma do usuário.

*Default: `false`*

---
### `profiling_filter_adding_users`

**Filtrar usuários por campos de perfil ao inscrever em curso**

Permite que os professores filtrem os usuários com base em campos extras na página de inscrição de usuários em seus cursos.

*Padrão: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Mostrar dependências na introdução do curso**

Ao usar sequenciamento de recursos com cursos ou sessões, exibe as dependências do curso na página inicial do curso.

*Padrão: `false`*


### `scorm_cumulative_session_time`

**Tempo de sessão cumulativo para SCORM**

Quando ativado, o tempo de sessão para Caminhos de Aprendizagem SCORM será cumulativo; caso contrário, será contado apenas a partir do último tempo de atualização. Esta é uma configuração global. É usada ao criar um novo Caminho de Aprendizagem, mas pode ser redefinida para cada um.

*Padrão: `true`*


### `send_email_to_admin_when_create_course`

**Alerta por e-mail na criação de curso**

Envia um e-mail ao administrador da plataforma cada vez que um professor cria um novo curso.

*Padrão: `false`*


### `show_course_duration`

**Mostrar duração dos cursos**

Exibe a duração do curso ao lado do título do curso no catálogo de cursos e na lista de cursos.

*Padrão: `false`*


### `show_navigation_menu`

**Exibir menu de navegação do curso**

Exibe um menu de navegação que facilita o acesso às ferramentas.

*Padrão: `false`*


### `show_toolshortcuts`

**Atalhos de ferramentas**

Mostra os atalhos de ferramentas no banner?

*Padrão: `false`*


### `student_view_enabled`

**Ativar visualização do aluno**

Ativa a visualização do aluno, que permite que um professor ou administrador veja um curso como um aluno o veria.

*Padrão: `true`*


### `view_grid_courses`

**Visualizar cursos em layout de grade**

Visualiza os cursos em um layout com vários cursos por linha. Caso contrário, o layout mostrará um curso por linha.

*Padrão: `true`*