# Definições de curso

Predefinições e políticas que se aplicam aos cursos em toda a plataforma — visibilidade, direitos de criação, ferramentas permitidas, permissões dos formandos e semelhantes.

Aceda a estas definições em **Administração > Definições de configuração > Curso**. Esta categoria contém **45 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `active_tools_on_create`

**Ferramentas ativas na criação do curso**

Selecione as ferramentas que ficarão *ativas* após a criação de um curso.

*Predefinição:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Utilizar categorias de curso do URL principal**

Em configurações multi-URL, permitir que administradores e professores atribuam categorias do URL principal a cursos nos URLs filhos.

*Predefinição: `false`*

### `allow_course_theme`

**Permitir temas de curso**

Permite temas gráficos de curso e torna possível alterar a folha de estilos utilizada por um curso para qualquer uma das folhas de estilos disponíveis no Chamilo. Quando um utilizador entra no curso, a folha de estilos do curso terá prioridade sobre a folha de estilos do próprio utilizador e sobre a folha de estilos predefinida da plataforma.

*Predefinição: `true`*

### `allow_public_course_with_no_terms_conditions`

**Aceder a cursos públicos com termos e condições**

Com esta opção ativada, se um curso tiver visibilidade pública e termos e condições, esses termos são desativados enquanto o curso for público.

*Predefinição: `false`*

### `block_registered_users_access_to_open_course_contents`

**Bloquear o acesso de utilizadores autenticados a cursos públicos**

Mostrar apenas cursos públicos. Não permitir que utilizadores registados acedam a cursos com visibilidade «aberta» a menos que estejam inscritos em cada um desses cursos.

*Predefinição: `false`*

### `breadcrumbs_course_homepage`

**Trilho de navegação da página inicial do curso**

O trilho de navegação (breadcrumb) é o sistema de ligações horizontais, normalmente no canto superior esquerdo da página. Esta opção seleciona o que pretende que apareça no trilho nas páginas iniciais dos cursos

*Predefinição: `course_title`*

### `course_about_teacher_name_hide`

**Ocultar informações do professor na página de detalhes do curso**

Na página de detalhes do curso, ocultar as informações do professor.

*Predefinição: `false`*

### `course_category_code_to_use_as_model`

**Restringir modelos de curso a uma categoria de curso**

Indique um código de categoria a utilizar como modelos de curso. Apenas esses cursos aparecerão na lista pendente no momento da criação do curso, e os utilizadores não verão os cursos desta categoria no catálogo de cursos.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Campos extra a mostrar nas definições do curso**

Os campos definidos neste array aparecerão na página de definições do curso.

### `course_creation_by_teacher_extra_fields_to_show`

**Campos extra a mostrar no formulário de criação de curso**

Os campos definidos neste array aparecerão como campos adicionais no formulário de criação de curso.

### `course_creation_donate_link`

**Ligação de donativo na página de criação de curso**

A página para a qual a mensagem de donativo deve apontar (URL completo).

### `course_creation_donate_message_show`

**Mostrar mensagem de donativo na página de criação de curso**

Adicionar uma caixa de mensagem na página de criação de curso para professores, pedindo-lhes que façam um donativo ao projeto.

*Predefinição: `false`*

### `course_creation_form_hide_course_code`

**Remover o campo de código do curso do formulário de criação de curso**

Se não for fornecido, o código do curso é gerado por predefinição com base no título do curso; ative esta opção para remover completamente o campo de código do formulário de criação de curso.

*Predefinição: `false`*

### `course_creation_form_set_course_category_mandatory`

**Tornar a categoria do curso obrigatória**

Ao criar um curso, tornar a categoria do curso uma definição obrigatória.

*Predefinição: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Campos extra a exigir no formulário de criação de curso**

Os campos definidos neste array serão obrigatórios no formulário de criação de curso.

### `course_creation_splash_screen`

**Ecrã inicial para cursos**

Mostrar um ecrã inicial ao criar um novo curso.

*Predefinição: `true`*

### `course_creation_use_template`

**Utilizar curso modelo para novos cursos**

Defina esta opção para utilizar o mesmo curso modelo (identificado pelo respetivo ID numérico do curso na base de dados) para todos os novos cursos que forem criados na plataforma. Tenha em atenção que, se não for devidamente planeada, esta definição pode ter um impacto massivo na utilização de espaço. O curso modelo será utilizado como se o professor tivesse feito uma cópia do curso com as ferramentas de cópia de segurança do curso, pelo que nenhum conteúdo de utilizador é copiado, apenas o material do professor. Aplicam-se todas as outras regras de cópia de segurança do curso. Deixe vazio (ou defina como 0) para desativar.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Pré-preencher campos do curso com campos do utilizador**

Se não estiver vazio, o processo de criação do curso procurará alguns campos no perfil do utilizador e preenchê-los-á automaticamente para o curso. Por exemplo, um professor especializado em marketing digital poderia definir automaticamente um indicador « marketing digital » em cada curso que criar.

### `course_hide_tools`

**Ocultar ferramentas aos professores**

Marque as ferramentas que pretende ocultar aos professores. Isto proibirá o acesso à ferramenta.

### `course_images_in_courses_list`

**Ícones personalizados dos cursos**

Utilizar as imagens do curso como ícone do curso nas listas de cursos (em vez do ícone predefinido do quadro verde).

*Predefinição: `true`*

### `course_log_default_extra_fields`

**Campos extra do utilizador por predefinição na página de estatísticas do curso**

Configure este array com os IDs internos dos campos extra que pretende mostrar por predefinição na página principal de estatísticas do curso.

### `course_log_hide_columns`

**Ocultar colunas dos registos do curso**

Este array permite-lhe configurar quais as colunas a ocultar na página principal de estatísticas do curso e no relatório de tempo total.

### `course_sequence_valid_only_in_same_session`

**Validar pré-requisitos apenas na mesma sessão**

Quando ativada, um curso só será considerado validado se for concluído na sessão atual. Se desativada, os cursos concluídos noutras sessões também desbloquearão os cursos dependentes.

*Predefinição: `false`*


### `course_student_info`

**Apresentação de informações do estudante no curso**

Nas páginas « Os meus cursos »/« As minhas sessões », mostrar informações adicionais relativas à pontuação, ao progresso e/ou à obtenção de certificado pelo estudante.

### `course_validation`

**Validação de cursos**

Quando a funcionalidade « Validação de cursos » está ativada, um professor não consegue criar um curso sozinho. Preenche um pedido de curso. O administrador da plataforma analisa o pedido e aprova-o ou rejeita-o.<br />Esta funcionalidade depende de mensagens de correio eletrónico automatizadas; configure o Chamilo para aceder a um servidor de correio eletrónico e para utilizar uma conta de correio eletrónico dedicada.

*Predefinição: `false`*


### `course_validation_terms_and_conditions_url`

**Validação de cursos - uma hiperligação para os termos e condições**

Este é o URL do documento « Termos e Condições » que é válido para efetuar um pedido de curso. Se o endereço for definido aqui, o utilizador deverá ler e concordar com estes termos e condições antes de enviar um pedido de curso.<br />Se ativar o módulo « Termos e Condições » do Chamilo e pretender que o respetivo URL seja utilizado, deixe esta definição vazia.

### `courses_default_creation_visibility`

**Visibilidade predefinida do curso**

Visibilidade predefinida do curso ao criar um novo curso

*Predefinição: `2`*


### `display_coursecode_in_courselist`

**Mostrar o código no nome do curso**

Mostrar o código do curso na lista de cursos

*Predefinição: `false`*


### `display_teacher_in_courselist`

**Mostrar o professor no nome do curso**

Mostrar o professor na lista de cursos

*Predefinição: `true`*


### `enable_tool_introduction`

**Ativar introdução da ferramenta**

Ativar introduções na página inicial de cada ferramenta

*Predefinição: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Mostrar botão de anulação de inscrição em « Os meus cursos »**

Adicionar um botão para anular a inscrição num curso na página « Os meus cursos ».

*Predefinição: `false`*

### `example_material_course_creation`

**Material de exemplo na criação do curso**

Criar material de exemplo automaticamente ao criar um novo curso

*Predefinição: `true`*


### `hide_course_rating`

**Ocultar classificação do curso**

A funcionalidade de classificação do curso está presente por predefinição em vários locais. Se não a pretender, ative esta opção.

*Predefinição: `false`*

### `hide_course_sidebar`

**Ocultar o bloco de cursos na barra lateral**

Em ecrãs em que o menu esquerdo está visível, não apresentar a secção « Cursos ».

*Predefinição: `true`*

### `multiple_access_url_show_shared_course_marker`

**Mostrar marcador de curso partilhado em multi-URL**

Adiciona um ícone de hiperligação aos cursos que são partilhados entre URLs, para que os utilizadores (em particular os professores) saibam que devem ter um cuidado especial ao editar o conteúdo do curso.

*Predefinição: `false`*

### `my_courses_show_courses_in_user_language_only`

**Mostrar apenas cursos no idioma do utilizador**

Se ativada, esta opção ocultará todos os cursos que não estejam definidos no idioma do utilizador.

*Predefinição: `false`*

### `profiling_filter_adding_users`

**Filtrar utilizadores por campos de perfil na inscrição no curso**

Permitir que os professores filtrem os utilizadores com base em campos extra na página de inscrição de utilizadores no seu curso.

*Predefinição: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Mostrar dependências na introdução do curso**

Ao utilizar o sequenciamento de recursos com cursos ou sessões, mostrar as dependências do curso na página inicial do curso.

*Predefinição: `false`*

### `scorm_cumulative_session_time`

**Tempo de sessão cumulativo para SCORM**

Quando ativado, o tempo de sessão dos Percursos de Aprendizagem SCORM será cumulativo; caso contrário, será contabilizado apenas a partir da última atualização. Esta é uma definição global. É utilizada na criação de um novo Percurso de Aprendizagem, mas pode depois ser redefinida para cada um.

*Predefinição: `true`*


### `send_email_to_admin_when_create_course`

**Alerta por e-mail na criação de curso**

Enviar um e-mail ao administrador da plataforma cada vez que um professor cria um novo curso

*Predefinição: `false`*


### `show_course_duration`

**Mostrar a duração dos cursos**

Apresentar a duração do curso junto ao título do curso no catálogo de cursos e na lista de cursos.

*Predefinição: `false`*

### `show_navigation_menu`

**Apresentar o menu de navegação do curso**

Apresentar um menu de navegação que agiliza o acesso às ferramentas

*Predefinição: `false`*


### `show_toolshortcuts`

**Atalhos das ferramentas**

Mostrar os atalhos das ferramentas no banner?

*Predefinição: `false`*

### `student_view_enabled`

**Ativar a vista de formando**

Ativar a vista de formando, que permite a um professor ou administrador ver um curso como um formando o veria

*Predefinição: `true`*


### `view_grid_courses`

**Ver cursos em disposição em grelha**

Ver os cursos numa disposição com vários cursos por linha. Caso contrário, a disposição mostrará um curso por linha.

*Predefinição: `true`*