# Definições de Tickets

Comportamento do sistema de **Tickets** (helpdesk).

Aceda a estas definições em **Administração > Definições de configuração > Tickets**. Esta categoria contém **7 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `show_link_bug_notification`

**Mostrar ligação para reportar erro**

Mostrar uma ligação no cabeçalho para reportar um erro na nossa plataforma de suporte (http://support.chamilo.org). Ao clicar na ligação, o utilizador é enviado para a plataforma de suporte, numa página wiki que descreve o processo de reporte de erros.

*Predefinição: `false`*


### `show_link_ticket_notification`

**Mostrar ligação de criação de ticket**

Mostrar a ligação de criação de ticket aos utilizadores no lado direito do portal

*Predefinição: `false`*


### `ticket_allow_category_edition`

**Permitir edição de categorias de tickets**

Permitir a edição de categorias pelos administradores.

*Predefinição: `false`*

### `ticket_allow_student_add`

**Permitir que os utilizadores adicionem tickets**

Permite que todos os utilizadores adicionem tickets, não apenas os administradores.

*Predefinição: `false`*

### `ticket_project_user_roles`

**Acesso por papel a projetos de tickets**

Permitir que os projetos de tickets sejam acedidos por papéis de utilizador específicos. Exemplo: ['permissions' => [1 => [17]] em que project_id = 1, STUDENT_BOSS = 17.

> Esta definição é obrigatória para utilizadores que não sejam administradores: sem um mapeamento de papéis definido aqui, apenas os administradores podem aceder aos tickets de suporte. Para dar a qualquer outro papel acesso a um projeto de tickets, adicione o ID do papel às permissões desta definição para esse projeto.

### `ticket_send_warning_to_all_admins`

**Enviar mensagens de aviso de tickets aos administradores**

Enviar uma mensagem se um ticket foi criado sem categoria ou se uma categoria não tem nenhum administrador atribuído.

*Predefinição: `false`*


### `ticket_warn_admin_no_user_in_category`

**Enviar alerta aos administradores se a categoria de tickets não tiver responsável**

Enviar uma mensagem de aviso (e-mail e mensagem Chamilo) a todos os administradores se não houver um utilizador atribuído a uma categoria.

*Predefinição: `false`*