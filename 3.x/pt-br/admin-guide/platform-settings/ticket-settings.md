# Configurações de Tickets

Comportamento do sistema de **Tickets** (helpdesk).

Acesse estas configurações em **Administração > Configurações > Tickets**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `show_link_bug_notification`

**Exibir link para relatar bug**

Exibe um link no cabeçalho para relatar um bug na nossa plataforma de suporte (http://support.chamilo.org). Ao clicar no link, o usuário é enviado à plataforma de suporte, em uma página wiki que descreve o processo de relato de bugs.

*Padrão: `false`*


### `show_link_ticket_notification`

**Exibir link de criação de ticket**

Exibe o link de criação de ticket para os usuários no lado direito do portal

*Padrão: `false`*


### `ticket_allow_category_edition`

**Permitir edição de categorias de tickets**

Permite a edição de categorias pelos administradores.

*Padrão: `false`*

### `ticket_allow_student_add`

**Permitir que usuários adicionem tickets**

Permite que todos os usuários adicionem tickets, não apenas os administradores.

*Padrão: `false`*

### `ticket_project_user_roles`

**Acesso por papel a projetos de tickets**

Permite que projetos de tickets sejam acessados por papéis de usuário específicos. Exemplo: ['permissions' => [1 => [17]] onde project_id = 1, STUDENT_BOSS = 17.

> Esta configuração é obrigatória para usuários que não são administradores: sem um mapeamento de papéis definido aqui, somente administradores podem acessar os tickets de suporte. Para conceder a qualquer outro papel acesso a um projeto de tickets, adicione o ID do papel às permissões desta configuração para esse projeto.

### `ticket_send_warning_to_all_admins`

**Enviar mensagens de aviso de ticket aos administradores**

Envia uma mensagem se um ticket foi criado sem categoria ou se uma categoria não tem nenhum administrador atribuído.

*Padrão: `false`*


### `ticket_warn_admin_no_user_in_category`

**Enviar alerta aos administradores se a categoria de tickets não tiver responsável**

Envia uma mensagem de aviso (e-mail e mensagem do Chamilo) a todos os administradores se não houver um usuário atribuído a uma categoria.

*Padrão: `false`*