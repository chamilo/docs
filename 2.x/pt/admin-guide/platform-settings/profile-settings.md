# Configurações do Perfil do Usuário

Quais campos aparecem no perfil do usuário, quais deles o usuário pode editar e preferências relacionadas.

Acesse essas configurações em **Administração > Configurações de configuração > Perfil do Usuário**. Esta categoria contém **29 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `account_valid_duration`

**Validade da conta**

Uma conta de usuário é válida por esse número de dias após a criação

*Padrão: `3660`*

### `add_user_course_information_in_mailto`

**Preencher o e-mail com informações do usuário e do curso no rodapé de contato**

Adicionar assunto e corpo no mailto: do rodapé.

*Padrão: `false`*

### `allow_show_linkedin_url`

**Permitir mostrar a URL do LinkedIn do usuário**

Adicionar um link no bloco social do usuário, permitindo visitar o perfil do LinkedIn do usuário

### `allow_show_skype_account`

**Permitir mostrar a conta Skype do usuário**

Adicionar um link no bloco social do usuário permitindo iniciar um chat pelo Skype

### `allow_social_map_fields`

**Geolocalização de usuários em um mapa**

Habilitar a exibição de um mapa na rede social permitindo localizar outros usuários. Isso inclui várias posições (atual e destino) que devem ser definidas como endereços ou coordenadas em campos extras separados. Os campos extras devem ser definidos como um array aqui.

### `allow_teachers_to_classes`

**Permitir que professores gerenciem turmas**

Permite que professores gerenciem grupos de turmas e seus membros dentro do sistema.

*Padrão: `false`*

### `allow_user_headings`

**Permitir perfilamento de usuários dentro dos cursos**

Um professor pode definir campos de perfil do aluno para obter informações adicionais?

### `allow_users_to_change_email_with_no_password`

**Permitir que usuários alterem o e-mail sem senha**

Ao alterar as informações da conta

*Padrão: `false`*

### `changeable_options`

**Campos que os usuários podem alterar em seu perfil**

Selecione os campos que os usuários poderão alterar em sua página de perfil.

### `enable_profile_user_address_geolocalization`

**Habilitar geolocalização do usuário**

Habilitar o campo de endereço do usuário e mostrá-lo em um mapa usando recursos de geolocalização

### `extended_profile`

**Portfólio**

Se esta configuração estiver ativada, um usuário pode preencher os seguintes campos (opcionais): 'Minha área aberta pessoal', 'Minhas competências', 'Meus diplomas', 'O que sou capaz de ensinar'

*Padrão: `false`*

### `hide_username_in_course_chat`

**Ocultar nome de usuário no chat do curso**

No chat do curso, ocultar o nome de usuário. Exibir apenas os nomes das pessoas.

*Padrão: `false`*

### `hide_username_with_complete_name`

**Ocultar nome de usuário quando já estiver mostrando o nome completo**

Algumas funções internas retornarão o nome de usuário ao retornar o nome completo do usuário. Com esta opção ativada, você garante que o nome de usuário não aparecerá.

*Padrão: `false`*

### `linkedin_organization_id`

**ID da Organização no LinkedIn**

Ao compartilhar um distintivo no LinkedIn, o LinkedIn permite definir um ID de organização que será vinculado à página do LinkedIn da sua organização (para vincular a organização que atribui o distintivo).

*Padrão: `false`*

### `login_is_email`

**Usar o e-mail como nome de usuário**

Usar o e-mail para fazer login no sistema

*Padrão: `false`*

### `my_space_users_items_per_page`

**Número padrão de itens por página no meu Espaço**

Número de registros exibidos por página nas seções de rastreamento do Meu Espaço (usuários, estatísticas de trabalho, lista de alunos).

*Padrão: `10`*

### `pass_reminder_custom_link`

**Página personalizada para lembrete de senha**

Defina sua própria URL para uma página de redefinição de senha. Útil ao usar um sistema de gerenciamento de contas federado.

### `profile_fields_visibility`

**Campos visíveis na página de perfil**

Array de campos e se (booleano) eles estão visíveis ou não na página de perfil do usuário (também funciona com rótulos de campos extras).

### `registration_add_helptext_for_2_names`

**Adicionar ajuda para inserir dois nomes no registro**

Adicionar texto de ajuda para os usuários inserirem dois nomes no formulário de registro quando sobrenomes duplos são comuns.

*Padrão: `false`*

### `send_notification_when_user_added`

**Enviar e-mail ao administrador quando um usuário for criado**

Enviar notificação por e-mail ao administrador quando um usuário for criado.

### `show_conditions_to_user`

**Mostrar condições específicas de registro**

Mostrar várias condições ao usuário durante o processo de inscrição. Forneça um array com cada elemento contendo 'variable' (nome interno do campo extra), 'display_text' (texto simples para uma caixa de seleção), 'text_area' (texto longo das condições).

### `show_official_code_whoisonline`

**Código oficial em 'Quem está online'**

Mostrar o código oficial na página 'Quem está online', abaixo do nome de usuário.

*Padrão: `false`*

---
### `show_terms_if_profile_completed`

**Termos e condições apenas se o perfil estiver completo**

Ao ativar esta opção, os termos e condições estarão disponíveis para o usuário somente quando os campos extras de perfil que começam com 'terms_' e estão configurados como visíveis forem preenchidos.

*Padrão: `false`*

### `split_users_upload_directory`

**Dividir diretório de upload dos usuários**

Em portais de alta carga, onde muitos usuários estão registrados e enviam suas fotos, o diretório de upload (main/upload/users/) pode conter arquivos demais para o sistema de arquivos gerenciar (foi relatado com mais de 36.000 arquivos em um servidor Debian). Alterar esta opção habilitará uma divisão de um nível dos diretórios no diretório de upload. Nove diretórios serão usados no diretório base, e todos os diretórios subsequentes dos usuários serão armazenados em um desses 9 diretórios. A alteração desta opção não afetará a estrutura dos diretórios no disco, mas impactará o comportamento do código do Chamilo. Portanto, se você alterar esta opção, precisará criar os novos diretórios e mover os diretórios existentes manualmente no servidor. Esteja ciente de que, ao criar e mover esses diretórios, você terá que mover os diretórios dos usuários de 1 a 9 para subdiretórios com o mesmo nome. Se você não tiver certeza sobre esta opção, é melhor não ativá-la.

*Padrão: `true`*

### `use_users_timezone`

**Habilitar fusos horários dos usuários**

Habilita a possibilidade de os usuários selecionarem seu próprio fuso horário. Uma vez configurado, os usuários poderão ver prazos de entrega de tarefas e outras referências de tempo em seu próprio fuso horário, o que reduzirá erros no momento da entrega.

*Padrão: `true`*

### `user_import_settings`

**Opções para importação de usuários**

Array de opções a serem aplicadas como parâmetros padrão na importação de usuários via CSV/XML.

### `user_search_on_extra_fields`

**Pesquisar usuários por campos extras na lista de usuários para administradores**

Inclui naturalmente os campos extras fornecidos (array de rótulos de campos extras) nas buscas de usuários.

### `user_selected_theme`

**Seleção de tema pelo usuário**

Permite que os usuários selecionem seu próprio tema visual em seu perfil. Isso alterará a aparência do Chamilo para eles, mas manterá o estilo padrão do portal intacto. Se um curso ou sessão específica tiver um tema específico atribuído, ele terá prioridade sobre os temas definidos pelo usuário.

*Padrão: `false`*

### `visible_options`

**Lista de campos visíveis no perfil**

Controla quais campos de perfil são visíveis para os usuários e outras pessoas.