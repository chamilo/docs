# Configurações do perfil do usuário

Quais campos aparecem no perfil do usuário, quais o usuário pode editar e preferências relacionadas.

Acesse essas configurações em **Administração > Configurações > Perfil do usuário**. Esta categoria contém **29 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `account_valid_duration`

**Validade da conta**

Uma conta de usuário é válida por este número de dias após a criação

*Padrão: `3660`*


### `add_user_course_information_in_mailto`

**Pré-preencher o e-mail com informações do usuário e do curso no contato do rodapé**

Adicionar assunto e corpo no mailto: do rodapé.

*Padrão: `false`*


### `allow_show_linkedin_url`

**Permitir exibir a URL do LinkedIn do usuário**

Adicionar um link no bloco social do usuário, permitindo visitar o perfil do LinkedIn do usuário

### `allow_show_skype_account`

**Permitir exibir a conta Skype do usuário**

Adicionar um link no bloco social do usuário permitindo iniciar um chat pelo Skype

### `allow_social_map_fields`

**Geolocalização de usuários em um mapa**

Habilitar a exibição de um mapa na rede social permitindo localizar outros usuários. Isso inclui várias posições (atual e destino) que devem ser definidas como endereços ou coordenadas em campos extras separados. Os campos extras devem ser definidos como um array aqui.

### `allow_teachers_to_classes`

**Permitir que professores gerenciem turmas**

Permite que professores gerenciem grupos de turma e sua associação no sistema.

*Padrão: `false`*


### `allow_user_headings`

**Permitir perfilamento de usuários dentro dos cursos**

Um professor pode definir campos de perfil do aprendiz para obter informações adicionais?

### `allow_users_to_change_email_with_no_password`

**Permitir que usuários alterem o e-mail sem senha**

Ao alterar as informações da conta

*Padrão: `false`*

### `changeable_options`

**Campos que os usuários podem alterar no perfil**

Selecione os campos que os usuários poderão alterar na página de perfil.


### `enable_profile_user_address_geolocalization`

**Habilitar geolocalização do usuário**

Habilitar o campo de endereço do usuário e exibi-lo em um mapa usando recursos de geolocalização

### `extended_profile`

**Portfólio**

Se esta configuração estiver ativada, um usuário pode preencher os seguintes campos (opcionais): 'Minha área pessoal aberta', 'Minhas competências', 'Meus diplomas', 'O que sou capaz de ensinar'

*Padrão: `false`*

### `hide_username_in_course_chat`

**Ocultar nome de usuário no chat do curso**

No chat do curso, ocultar o nome de usuário. Exibir apenas os nomes das pessoas.

*Padrão: `false`*


### `hide_username_with_complete_name`

**Ocultar nome de usuário quando o nome completo já estiver sendo exibido**

Algumas funções internas retornarão o nome de usuário ao retornar o nome completo do usuário. Com esta opção habilitada, você garante que o nome de usuário não aparecerá.

*Padrão: `false`*


### `linkedin_organization_id`

**ID da organização no LinkedIn**

Ao compartilhar um distintivo no LinkedIn, o LinkedIn permite definir um ID de organização que vinculará à página do LinkedIn da sua organização (para vincular a organização que atribui o distintivo).

*Padrão: `false`*


### `login_is_email`

**Usar o e-mail como nome de usuário**

Usar o e-mail para entrar no sistema

*Padrão: `false`*

### `my_space_users_items_per_page`

**Número padrão de itens por página no mySpace**

Número de registros exibidos por página nas seções de acompanhamento do MySpace (usuários, estatísticas de trabalhos, lista de estudantes).

*Padrão: `10`*


### `pass_reminder_custom_link`

**Página personalizada para lembrete de senha**

Defina sua própria URL para uma página de redefinição de senha. Útil ao usar um sistema federado de gerenciamento de contas.

### `profile_fields_visibility`

**Campos visíveis na página de perfil**

Array de campos e se (booleano) eles estão visíveis ou não na página de perfil do usuário (também funciona com rótulos de campos extras).

### `registration_add_helptext_for_2_names`

**Adicionar ajuda para informar dois nomes no cadastro**

Adicionar texto de ajuda para que os usuários informem dois nomes no formulário de cadastro quando sobrenomes duplos forem comuns.

*Padrão: `false`*


### `send_notification_when_user_added`

**Enviar e-mail ao administrador quando um usuário for criado**

Enviar notificação por e-mail ao administrador quando um usuário for criado.

### `show_conditions_to_user`

**Exibir condições específicas de cadastro**

Exibir várias condições ao usuário durante o processo de inscrição. Forneça um array em que cada elemento contenha 'variable' (nome interno do campo extra), 'display_text' (texto simples para uma caixa de seleção), 'text_area' (texto longo das condições).

### `show_official_code_whoisonline`

**Código oficial em 'Quem está on-line'**

Exibir o código oficial na página 'Quem está on-line', abaixo do nome de usuário.

*Padrão: `false`*

### `show_terms_if_profile_completed`

**Termos e condições somente se o perfil estiver completo**

Ao habilitar esta opção, os termos e condições ficarão disponíveis para o usuário somente quando os campos extras de perfil que começam com 'terms_' e estiverem definidos como visíveis forem preenchidos.

*Padrão: `false`*


### `split_users_upload_directory`

**Dividir o diretório de upload dos usuários**

Em portais de alta carga, onde muitos usuários estão registrados e enviam suas fotos, o diretório de upload (main/upload/users/) pode conter arquivos demais para o sistema de arquivos gerenciar (foi relatado com mais de 36000 arquivos em um servidor Debian). Alterar esta opção habilitará uma divisão em um nível dos diretórios no diretório de upload. 9 diretórios serão usados no diretório base e todos os diretórios subsequentes dos usuários serão armazenados em um desses 9 diretórios. A alteração desta opção não afetará a estrutura de diretórios no disco, mas afetará o comportamento do código do Chamilo, portanto, se você alterar esta opção, deverá criar os novos diretórios e mover os diretórios existentes por conta própria no servidor. Esteja ciente de que, ao criar e mover esses diretórios, você terá de mover os diretórios dos usuários 1 a 9 para subdiretórios com o mesmo nome. Se você não tiver certeza sobre esta opção, o melhor é não ativá-la.

*Padrão: `true`*

### `use_users_timezone`

**Habilitar fusos horários dos usuários**

Habilita a possibilidade de os usuários selecionarem o próprio fuso horário. Uma vez configurado, os usuários poderão ver prazos de tarefas e outras referências de tempo no próprio fuso horário, o que reduzirá erros no momento da entrega.

*Padrão: `true`*

### `user_import_settings`

**Opções para importação de usuários**

Array de opções a aplicar como parâmetros padrão na importação de usuários em CSV/XML.

### `user_search_on_extra_fields`

**Buscar usuários por campos extras na lista de usuários para administradores**

Inclui naturalmente os campos extras informados (array de rótulos de campos extras) nas buscas de usuários.

### `user_selected_theme`

**Seleção de tema pelo usuário**

Permite que os usuários selecionem o próprio tema visual no perfil. Isso alterará a aparência do Chamilo para eles, mas deixará intacto o estilo padrão do portal. Se um curso ou sessão específico tiver um tema atribuído, ele terá prioridade sobre os temas definidos pelo usuário.

*Padrão: `false`*

### `visible_options`

**Lista de campos visíveis no perfil**

Controla quais campos do perfil são visíveis para os usuários e para os demais.