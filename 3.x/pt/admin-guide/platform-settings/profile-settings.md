# Definições do perfil de utilizador

Quais os campos que aparecem no perfil do utilizador, quais os que o utilizador pode editar e preferências relacionadas.

Aceda a estas definições em **Administração > Definições de configuração > Perfil de utilizador**. Esta categoria contém **29 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao criar scripts através da API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `account_valid_duration`

**Validade da conta**

Uma conta de utilizador é válida durante este número de dias após a criação

*Predefinição: `3660`*


### `add_user_course_information_in_mailto`

**Pré-preencher o correio com informações do utilizador e do curso no contacto do rodapé**

Adicionar assunto e corpo no mailto: do rodapé.

*Predefinição: `false`*


### `allow_show_linkedin_url`

**Permitir mostrar o URL do LinkedIn do utilizador**

Adicionar uma hiperligação no bloco social do utilizador, permitindo visitar o perfil LinkedIn do utilizador

### `allow_show_skype_account`

**Permitir mostrar a conta Skype do utilizador**

Adicionar uma hiperligação no bloco social do utilizador permitindo iniciar uma conversa por Skype

### `allow_social_map_fields`

**Geolocalização de utilizadores num mapa**

Ativar a apresentação de um mapa na rede social permitindo localizar outros utilizadores. Isto inclui várias posições (atual e de destino) que têm de ser definidas como endereços ou coordenadas em campos extra separados. Os campos extra devem ser definidos como um array aqui.

### `allow_teachers_to_classes`

**Permitir que os formadores gerem turmas**

Permite que os formadores gerem grupos de turma e a respetiva composição no sistema.

*Predefinição: `false`*


### `allow_user_headings`

**Permitir o perfilamento de utilizadores dentro dos cursos**

Pode um formador definir campos de perfil do formando para recolher informações adicionais?

### `allow_users_to_change_email_with_no_password`

**Permitir que os utilizadores alterem o e-mail sem palavra-passe**

Ao alterar as informações da conta

*Predefinição: `false`*

### `changeable_options`

**Campos que os utilizadores podem alterar no seu perfil**

Selecione os campos que os utilizadores poderão alterar na página do seu perfil.


### `enable_profile_user_address_geolocalization`

**Ativar a geolocalização do utilizador**

Ativar o campo de endereço do utilizador e mostrá-lo num mapa utilizando funcionalidades de geolocalização

### `extended_profile`

**Portefólio**

Se esta definição estiver ativa, um utilizador pode preencher os seguintes campos (opcionais): 'A minha área pessoal aberta', 'As minhas competências', 'Os meus diplomas', 'O que sou capaz de ensinar'

*Predefinição: `false`*

### `hide_username_in_course_chat`

**Ocultar o nome de utilizador no chat do curso**

No chat do curso, ocultar o nome de utilizador. Mostrar apenas os nomes das pessoas.

*Predefinição: `false`*


### `hide_username_with_complete_name`

**Ocultar o nome de utilizador quando o nome completo já é apresentado**

Algumas funções internas devolvem o nome de utilizador ao devolver o nome completo do utilizador. Com esta opção ativada, garante-se que o nome de utilizador não aparece.

*Predefinição: `false`*


### `linkedin_organization_id`

**ID da organização LinkedIn**

Ao partilhar um distintivo no LinkedIn, o LinkedIn permite definir um ID de organização que ligará à página LinkedIn da sua organização (para associar a organização que atribui o distintivo).

*Predefinição: `false`*


### `login_is_email`

**Utilizar o e-mail como nome de utilizador**

Utilizar o e-mail para iniciar sessão no sistema

*Predefinição: `false`*

### `my_space_users_items_per_page`

**Número predefinido de itens por página no mySpace**

Número de registos apresentados por página nas secções de acompanhamento do MySpace (utilizadores, estatísticas de trabalhos, lista de estudantes).

*Predefinição: `10`*


### `pass_reminder_custom_link`

**Página personalizada para lembrete de palavra-passe**

Defina o seu próprio URL para uma página de reposição de palavra-passe. Útil ao utilizar um sistema federado de gestão de contas.

### `profile_fields_visibility`

**Campos visíveis na página de perfil**

Array de campos e se (booleano) estão visíveis ou não na página de perfil do utilizador (também funciona com etiquetas de campos extra).

### `registration_add_helptext_for_2_names`

**Adicionar ajuda para inserir dois nomes no registo**

Adicionar texto de ajuda para os utilizadores introduzirem dois nomes no formulário de registo quando os apelidos duplos são comuns.

*Predefinição: `false`*


### `send_notification_when_user_added`

**Enviar correio ao administrador quando um utilizador é criado**

Enviar notificação por e-mail ao administrador quando um utilizador é criado.

### `show_conditions_to_user`

**Mostrar condições específicas de registo**

Mostrar várias condições ao utilizador durante o processo de inscrição. Forneça um array em que cada elemento contém 'variable' (nome interno do campo extra), 'display_text' (texto simples para uma caixa de verificação), 'text_area' (texto longo das condições).

### `show_official_code_whoisonline`

**Código oficial em 'Quem está em linha'**

Mostrar o código oficial na página 'Quem está em linha', abaixo do nome de utilizador.

*Predefinição: `false`*

### `show_terms_if_profile_completed`

**Termos e condições apenas se o perfil estiver completo**

Ao ativar esta opção, os termos e condições ficarão disponíveis para o utilizador apenas quando os campos extra de perfil que começam por 'terms_' e estão definidos como visíveis estiverem preenchidos.

*Predefinição: `false`*


### `split_users_upload_directory`

**Dividir o diretório de carregamento dos utilizadores**

Em portais de elevada carga, onde muitos utilizadores estão registados e enviam as suas fotografias, o diretório de carregamento (main/upload/users/) pode conter demasiados ficheiros para o sistema de ficheiros gerir (foi reportado com mais de 36000 ficheiros num servidor Debian). Alterar esta opção ativará uma divisão de um nível dos diretórios no diretório de carregamento. Serão utilizados 9 diretórios no diretório base e todos os diretórios subsequentes dos utilizadores serão armazenados num destes 9 diretórios. A alteração desta opção não afetará a estrutura de diretórios no disco, mas afetará o comportamento do código do Chamilo, pelo que, se alterar esta opção, terá de criar os novos diretórios e mover os diretórios existentes por si próprio no servidor. Tenha em atenção que, ao criar e mover esses diretórios, terá de mover os diretórios dos utilizadores 1 a 9 para subdiretórios com o mesmo nome. Se não tiver a certeza sobre esta opção, é melhor não a ativar.

*Predefinição: `true`*

### `use_users_timezone`

**Ativar fusos horários dos utilizadores**

Ativa a possibilidade de os utilizadores selecionarem o seu próprio fuso horário. Uma vez configurado, os utilizadores poderão ver prazos de trabalhos e outras referências temporais no seu próprio fuso horário, o que reduzirá erros no momento da entrega.

*Predefinição: `true`*

### `user_import_settings`

**Opções para importação de utilizadores**

Array de opções a aplicar como parâmetros predefinidos na importação de utilizadores CSV/XML.

### `user_search_on_extra_fields`

**Pesquisar utilizadores por campos extra na lista de utilizadores para administradores**

Inclui naturalmente os campos extra indicados (array de etiquetas de campos extra) nas pesquisas de utilizadores.

### `user_selected_theme`

**Seleção de tema pelo utilizador**

Permite que os utilizadores selecionem o seu próprio tema visual no perfil. Isto alterará o aspeto do Chamilo para eles, mas deixará intacto o estilo predefinido do portal. Se um curso ou sessão específico tiver um tema específico atribuído, este terá prioridade sobre os temas definidos pelo utilizador.

*Predefinição: `false`*

### `visible_options`

**Lista de campos visíveis no perfil**

Controla quais os campos de perfil visíveis para os utilizadores e para outros.