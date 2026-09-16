# Configurações de Identidade do Administrador

Identidade e dados de contato do administrador da plataforma. Esses valores aparecem no rodapé da plataforma e em alguns e-mails gerados pelo sistema.

Acesse essas configurações em **Administração > Configurações > Identidade do Administrador**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `administrator_email`

**Administrador do portal: e-mail**

O endereço de e-mail do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_name`

**Administrador do portal: Nome**

O nome do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_phone`

**Administrador do portal: Número de telefone**

O número de telefone do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_surname`

**Administrador do portal: Sobrenome**

O sobrenome do Administrador da Plataforma (aparece no rodapé à esquerda)

### `chamilo_latest_news`

**Últimas notícias**

Receba as últimas notícias do Chamilo, incluindo vulnerabilidades de segurança e eventos, diretamente no painel de administração. Essas notícias serão consultadas no servidor de notícias do Chamilo sempre que você carregar a página de administração e são visíveis apenas para administradores.

*Padrão: `true`*

### `chamilo_support`

**Bloco de suporte Chamilo**

Obtenha dicas profissionais e uma forma fácil de contatar prestadores oficiais de serviços para suporte profissional, diretamente dos criadores do Chamilo. Este bloco aparece na página de administração, é visível apenas para administradores e é atualizado sempre que você carrega a página de administração.

*Padrão: `true`*

### `max_anonymous_users`

**Múltiplos usuários anônimos**

Ative esta opção para permitir vários usuários do sistema para usuários anônimos. Isso é útil ao usar esta plataforma como vitrine pública de alguns cursos. Ter vários usuários anônimos permitirá que o rastreamento funcione durante a experiência para vários usuários sem misturar seus dados (o que, de outra forma, poderia confundi-los).

*Padrão: `0`*

### `redirect_admin_to_courses_list`

**Redirecionar o administrador para a lista de cursos**

O comportamento padrão é enviar os administradores diretamente para o painel de administração (enquanto professores e alunos são enviados para a lista de cursos ou para a página inicial da plataforma). Ative para redirecionar o administrador também para a lista de seus cursos.

*Padrão: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notificar apenas o administrador global sobre novos usuários**

Quando ativado, apenas o administrador global recebe notificações por e-mail sobre novos cadastros de usuários, em vez de todos os administradores.

*Padrão: `false`*

### `show_link_request_hrm_user`

**Exibir link para solicitar vínculo entre usuário e RH**

Exibe um link na página de perfil permitindo que diretores de Recursos Humanos solicitem vínculo com uma conta de usuário.

*Padrão: `false`*

### `user_status_option_only_for_admin_enabled`

**Ocultar papel dos usuários comuns**

Permite ocultar o papel dos usuários quando esta opção está definida como verdadeira e o array a seguir define o papel correspondente como 'true'.

*Padrão: `false`*

### `user_status_option_show_only_for_admin`

**Definir quais papéis ficam ocultos para usuários comuns**

Os papéis definidos como 'true' aparecerão apenas para administradores. Os demais usuários não poderão vê-los.