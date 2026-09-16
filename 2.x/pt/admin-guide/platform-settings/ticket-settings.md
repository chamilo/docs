# Configurações de Tickets

Comportamento do sistema de **Tickets** (helpdesk).

Acesse essas configurações em **Administração > Configurações de configuração > Tickets**. Esta categoria contém **7 configurações**, listadas abaixo com o título e comentário fornecidos nos arquivos de configurações padrão da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `show_link_bug_notification`

**Mostrar link para relatar erro**

Mostra um link no cabeçalho para relatar um erro dentro da nossa plataforma de suporte (http://support.chamilo.org). Ao clicar no link, o usuário é direcionado para a plataforma de suporte, em uma página wiki que descreve o processo de relato de erros.

*Padrão: `false`*

### `show_link_ticket_notification`

**Mostrar link de criação de ticket**

Mostra o link de criação de ticket para os usuários no lado direito do portal.

*Padrão: `false`*

### `ticket_allow_category_edition`

**Permitir edição de categorias de tickets**

Permite a edição de categorias por administradores.

*Padrão: `false`*

### `ticket_allow_student_add`

**Permitir que usuários adicionem tickets**

Permite que todos os usuários adicionem tickets, não apenas os administradores.

*Padrão: `false`*

### `ticket_project_user_roles`

**Acesso por função a projetos de tickets**

Permite que projetos de tickets sejam acessados por funções específicas de usuário. Exemplo: ['permissions' => [1 => [17]] onde project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Enviar mensagens de alerta de tickets aos administradores**

Envia uma mensagem se um ticket for criado sem uma categoria ou se uma categoria não tiver nenhum administrador atribuído.

*Padrão: `false`*

### `ticket_warn_admin_no_user_in_category`

**Enviar alerta aos administradores se a categoria de tickets não tiver responsável**

Envia uma mensagem de alerta (e-mail e mensagem no Chamilo) a todos os administradores se não houver um usuário atribuído a uma categoria.

*Padrão: `false`*