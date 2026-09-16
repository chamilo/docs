# Definições de Identidade do Administrador

Identidade e dados de contacto do administrador da plataforma. Estes valores aparecem no rodapé da plataforma e em alguns e-mails gerados pelo sistema.

Aceda a estas definições em **Administração > Definições de configuração > Identidade do Administrador**. Esta categoria contém **12 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `administrator_email`

**Administrador do portal: e-mail**

O endereço de e-mail do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_name`

**Administrador do portal: Nome próprio**

O nome próprio do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_phone`

**Administrador do portal: Número de telefone**

O número de telefone do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_surname`

**Administrador do portal: Apelido**

O apelido do Administrador da Plataforma (aparece no rodapé à esquerda)

### `chamilo_latest_news`

**Últimas notícias**

Receba as últimas notícias do Chamilo, incluindo vulnerabilidades de segurança e eventos, diretamente no painel de administração. Estas notícias serão consultadas no servidor de notícias do Chamilo sempre que carregar a página de administração e são visíveis apenas para administradores.

*Predefinição: `true`*

### `chamilo_support`

**Bloco de suporte Chamilo**

Obtenha dicas profissionais e uma forma fácil de contactar prestadores de serviços oficiais para suporte profissional, diretamente dos criadores do Chamilo. Este bloco aparece na página de administração, é visível apenas por administradores e atualiza-se sempre que carregar a página de administração.

*Predefinição: `true`*

### `max_anonymous_users`

**Vários utilizadores anónimos**

Ative esta opção para permitir vários utilizadores de sistema para utilizadores anónimos. Isto é útil quando se utiliza esta plataforma como vitrine pública de alguns cursos. Ter vários utilizadores anónimos permite que o rastreio funcione durante a experiência para vários utilizadores sem misturar os respetivos dados (o que, de outro modo, os poderia confundir).

*Predefinição: `0`*

### `redirect_admin_to_courses_list`

**Redirecionar o administrador para a lista de cursos**

O comportamento predefinido é enviar os administradores diretamente para o painel de administração (enquanto professores e estudantes são enviados para a lista de cursos ou para a página inicial da plataforma). Ative para redirecionar também o administrador para a sua lista de cursos.

*Predefinição: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notificar apenas o administrador global sobre novos utilizadores**

Quando ativada, apenas o administrador global recebe notificações por e-mail sobre novos registos de utilizadores, em vez de todos os administradores.

*Predefinição: `false`*

### `show_link_request_hrm_user`

**Mostrar ligação para solicitar vínculo entre utilizador e HRM**

Apresenta uma ligação na página de perfil que permite aos diretores de Recursos Humanos solicitar a associação a uma conta de utilizador.

*Predefinição: `false`*

### `user_status_option_only_for_admin_enabled`

**Ocultar função aos utilizadores normais**

Permite ocultar a função dos utilizadores quando esta opção está definida como verdadeira e o array seguinte define a função correspondente como 'true'.

*Predefinição: `false`*

### `user_status_option_show_only_for_admin`

**Definir quais as funções ocultas aos utilizadores normais**

As funções definidas como 'true' aparecerão apenas aos administradores. Os outros utilizadores não as poderão ver.