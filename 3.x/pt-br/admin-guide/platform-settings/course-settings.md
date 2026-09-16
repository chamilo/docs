# Configurações de curso

Padrões e políticas que se aplicam aos cursos em toda a plataforma — visibilidade, direitos de criação, ferramentas permitidas, permissões dos alunos e similares.

Acesse essas configurações em **Administração > Configurações > Curso**. Esta categoria contém **45 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `active_tools_on_create`

**Ferramentas ativas na criação do curso**

Selecione as ferramentas que ficarão *ativas* após a criação de um curso.

*Padrão:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Usar categorias de curso da URL principal**

Em instalações multi-URL, permite que administradores e professores atribuam categorias da URL principal aos cursos nas URLs filhas.

*Padrão: `false`*

### `allow_course_theme`

**Permitir temas de curso**

Permite temas gráficos de curso e torna possível alterar a folha de estilo usada por um curso para qualquer uma das folhas de estilo disponíveis no Chamilo. Quando um usuário entra no curso, a folha de estilo do curso terá prioridade sobre a folha de estilo do próprio usuário e a folha de estilo padrão da plataforma.

*Padrão: `true`*

### `allow_public_course_with_no_terms_conditions`

**Acesso a cursos públicos com termos e condições**

Com esta opção ativada, se um curso tiver visibilidade pública e termos e condições, esses termos são desativados enquanto o curso for público.

*Padrão: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloquear o acesso de usuários autenticados a cursos públicos**

Exibir apenas cursos públicos. Não permitir que usuários registrados acessem cursos com visibilidade 'aberta' a menos que estejam inscritos em cada um desses cursos.

*Padrão: `false`*

### `breadcrumbs_course_homepage`

**Trilha de navegação da página inicial do curso**

A trilha de navegação (breadcrumb) é o sistema de links horizontais, geralmente no canto superior esquerdo da página. Esta opção seleciona o que deve aparecer na trilha de navegação nas páginas iniciais dos cursos

*Padrão: `course_title`*

### `course_about_teacher_name_hide`

**Ocultar informações do professor na página de detalhes do curso**

Na página de detalhes do curso, ocultar as informações do professor.

*Padrão: `false`*

### `course_category_code_to_use_as_model`

**Restringir modelos de curso a uma categoria de curso**

Informe um código de categoria a ser usado como modelos de curso. Somente esses cursos aparecerão na lista suspensa no momento da criação do curso, e os usuários não verão os cursos desta categoria no catálogo de cursos.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campos extras a exibir nas configurações do curso**

Os campos definidos neste array aparecerão na página de configurações do curso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campos extras a exibir no formulário de criação de curso**

Os campos definidos neste array aparecerão como campos adicionais no formulário de criação de curso.

### `course_creation_donate_link`

**Link de doação na página de criação de curso**

A página para a qual a mensagem de doação deve apontar (URL completa).

### `course_creation_donate_message_show`

**Exibir mensagem de doação na página de criação de curso**

Adicionar uma caixa de mensagem na página de criação de curso para professores, pedindo que doem ao projeto.

*Padrão: `false`*

### `course_creation_form_hide_course_code`

**Remover o campo de código do curso do formulário de criação**

Se não for informado, o código do curso é gerado por padrão com base no título do curso; ative esta opção para remover completamente o campo de código do formulário de criação de curso.

*Padrão: `false`*

### `course_creation_form_set_course_category_mandatory`

**Tornar a categoria do curso obrigatória**

Ao criar um curso, tornar a categoria do curso uma configuração obrigatória.

*Padrão: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campos extras obrigatórios no formulário de criação de curso**

Os campos definidos neste array serão obrigatórios no formulário de criação de curso.

### `course_creation_splash_screen`

**Tela inicial para cursos**

Exibir uma tela inicial ao criar um novo curso.

*Padrão: `true`*

### `course_creation_use_template`

**Usar curso modelo para novos cursos**

Defina esta opção para usar o mesmo curso modelo (identificado pelo ID numérico do curso no banco de dados) para todos os novos cursos que forem criados na plataforma. Observe que, se não for devidamente planejada, esta configuração pode ter um impacto massivo no uso de espaço. O curso modelo será usado como se o professor tivesse feito uma cópia do curso com as ferramentas de backup de curso, portanto nenhum conteúdo de usuário é copiado, apenas material do professor. Todas as demais regras de backup de curso se aplicam. Deixe vazio (ou defina como 0) para desativar.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Pré-preencher campos do curso com campos do usuário**

Se não estiver vazio, o processo de criação de curso procurará alguns campos no perfil do usuário e os preencherá automaticamente para o curso. Por exemplo, um professor especializado em marketing digital poderia definir automaticamente um indicador « marketing digital » em cada curso que ele(a) criar.

### `course_hide_tools`

**Ocultar ferramentas dos professores**

Marque as ferramentas que deseja ocultar dos professores. Isso proibirá o acesso à ferramenta.

### `course_images_in_courses_list`

**Ícones personalizados dos cursos**

Usar as imagens do curso como ícone do curso nas listas de cursos (em vez do ícone padrão de quadro-negro verde).

*Padrão: `true`*

### `course_log_default_extra_fields`

**Campos extras de usuário por padrão na página de estatísticas do curso**

Configure este array com os IDs internos dos campos extras que deseja exibir por padrão na página principal de estatísticas do curso.

### `course_log_hide_columns`

**Ocultar colunas dos registros do curso**

Este array oferece a possibilidade de configurar quais colunas ocultar na página principal de estatísticas do curso e no relatório de tempo total.

### `course_sequence_valid_only_in_same_session`

**Validar pré-requisitos apenas na mesma sessão**

Quando habilitado, um curso será considerado validado somente se for concluído na sessão atual. Se desabilitado, cursos concluídos em outras sessões também desbloquearão cursos dependentes.

*Padrão: `false`*


### `course_student_info`

**Exibição de informações do aluno no curso**

Nas páginas ‘Meus cursos’/’Minhas sessões’, exibir informações adicionais relativas à pontuação, ao progresso e/ou à obtenção de certificado pelo aluno.

### `course_validation`

**Validação de cursos**

Quando o recurso 'Validação de cursos' está habilitado, um professor não consegue criar um curso sozinho. Ele(a) preenche uma solicitação de curso. O administrador da plataforma analisa a solicitação e a aprova ou a rejeita.<br />Este recurso depende de mensagens de e-mail automatizadas; configure o Chamilo para acessar um servidor de e-mail e para usar uma conta de e-mail dedicada.

*Padrão: `false`*


### `course_validation_terms_and_conditions_url`

**Validação de curso - um link para os termos e condições**

Esta é a URL do documento de 'Termos e Condições' válido para fazer uma solicitação de curso. Se o endereço for definido aqui, o usuário deverá ler e concordar com estes termos e condições antes de enviar uma solicitação de curso.<br />Se você habilitar o módulo 'Termos e Condições' do Chamilo e quiser que a URL dele seja usada, deixe esta configuração vazia.

### `courses_default_creation_visibility`

**Visibilidade padrão do curso**

Visibilidade padrão do curso ao criar um novo curso

*Padrão: `2`*


### `display_coursecode_in_courselist`

**Exibir código no nome do curso**

Exibir o código do curso na lista de cursos

*Padrão: `false`*


### `display_teacher_in_courselist`

**Exibir professor no nome do curso**

Exibir o professor na lista de cursos

*Padrão: `true`*


### `enable_tool_introduction`

**Habilitar introdução da ferramenta**

Habilitar introduções na página inicial de cada ferramenta

*Padrão: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Exibir botão de cancelamento de inscrição em ‘Meus cursos’**

Adicionar um botão para cancelar a inscrição em um curso na página ‘Meus cursos’.

*Padrão: `false`*

### `example_material_course_creation`

**Material de exemplo na criação do curso**

Criar material de exemplo automaticamente ao criar um novo curso

*Padrão: `true`*


### `hide_course_rating`

**Ocultar avaliação do curso**

O recurso de avaliação do curso aparece por padrão em diferentes lugares. Se você não o quiser, habilite esta opção.

*Padrão: `false`*

### `hide_course_sidebar`

**Ocultar o bloco de cursos na barra lateral**

Nas telas em que o menu esquerdo está visível, não exibir a seção « Cursos ».

*Padrão: `true`*

### `multiple_access_url_show_shared_course_marker`

**Exibir marcador de curso compartilhado em multi-URL**

Adiciona um ícone de link aos cursos que são compartilhados entre URLs, para que os usuários (em particular os professores) saibam que devem ter cuidado especial ao editar o conteúdo do curso.

*Padrão: `false`*

### `my_courses_show_courses_in_user_language_only`

**Exibir apenas cursos no idioma do usuário**

Se habilitada, esta opção ocultará todos os cursos que não estiverem definidos no idioma do usuário.

*Padrão: `false`*

### `profiling_filter_adding_users`

**Filtrar usuários por campos de perfil na inscrição no curso**

Permite que os professores filtrem os usuários com base em campos extras na página de inscrição de usuários no curso.

*Padrão: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Exibir dependências na introdução do curso**

Ao usar o sequenciamento de recursos com cursos ou sessões, exibe as dependências do curso na página inicial do curso.

*Padrão: `false`*

### `scorm_cumulative_session_time`

**Tempo de sessão cumulativo para SCORM**

Quando habilitado, o tempo de sessão dos percursos de aprendizagem SCORM será cumulativo; caso contrário, será contado apenas a partir da última atualização. Esta é uma configuração global. É usada na criação de um novo percurso de aprendizagem, mas pode ser redefinida individualmente para cada um.

*Padrão: `true`*


### `send_email_to_admin_when_create_course`

**Alerta por e-mail na criação de curso**

Envia um e-mail ao administrador da plataforma cada vez que um professor cria um novo curso

*Padrão: `false`*


### `show_course_duration`

**Exibir duração dos cursos**

Exibe a duração do curso ao lado do título do curso no catálogo de cursos e na lista de cursos.

*Padrão: `false`*

### `show_navigation_menu`

**Exibir menu de navegação do curso**

Exibe um menu de navegação que agiliza o acesso às ferramentas

*Padrão: `false`*


### `show_toolshortcuts`

**Atalhos das ferramentas**

Exibir os atalhos das ferramentas no banner?

*Padrão: `false`*

### `student_view_enabled`

**Habilitar visão do aluno**

Habilita a visão do aluno, que permite a um professor ou administrador ver um curso como um aluno o veria

*Padrão: `true`*


### `view_grid_courses`

**Visualizar cursos em layout de grade**

Visualiza os cursos em um layout com vários cursos por linha. Caso contrário, o layout exibirá um curso por linha.

*Padrão: `true`*