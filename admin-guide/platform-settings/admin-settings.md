# Configurações de Identidade do Administrador

Detalhes de identidade e contato do administrador da plataforma. Esses valores aparecem no rodapé da plataforma e em alguns e-mails gerados pelo sistema.

Acesse essas configurações em **Administração > Configurações de configuração > Identidade do Administrador**. Esta categoria contém **12 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `administrator_email`

**Administrador do Portal: e-mail**

O endereço de e-mail do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_name`

**Administrador do Portal: Nome**

O Nome do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_phone`

**Administrador do Portal: Número de telefone**

O número de telefone do Administrador da Plataforma (aparece no rodapé à esquerda)

### `administrator_surname`

**Administrador do Portal: Sobrenome**

O Sobrenome do Administrador da Plataforma (aparece no rodapé à esquerda)

### `chamilo_latest_news`

**Últimas notícias**

Receba as últimas notícias do Chamilo, incluindo vulnerabilidades de segurança e eventos, diretamente no painel de administração. Essas notícias serão verificadas no servidor de notícias do Chamilo toda vez que você carregar a página de administração e são visíveis apenas para administradores.

*Padrão: `true`*

### `chamilo_support`

**Bloco de suporte do Chamilo**

Obtenha dicas profissionais e uma maneira fácil de contatar provedores de serviços oficiais para suporte profissional, diretamente dos criadores do Chamilo. Este bloco aparece na sua página de administração, é visível apenas por administradores e é atualizado toda vez que você carrega a página de administração.

*Padrão: `true`*

### `max_anonymous_users`

**Múltiplos usuários anônimos**

Habilite esta opção para permitir múltiplos usuários do sistema para usuários anônimos. Isso é útil ao usar esta plataforma como uma vitrine pública para alguns cursos. Ter múltiplos usuários anônimos permitirá que o rastreamento funcione durante a experiência de vários usuários sem misturar seus dados (o que poderia confundi-los).

*Padrão: `0`*

### `redirect_admin_to_courses_list`

**Redirecionar administrador para a lista de cursos**

O comportamento padrão é enviar administradores diretamente para o painel de administração (enquanto professores e alunos são enviados para a lista de cursos ou para a página inicial da plataforma). Habilite para redirecionar o administrador também para sua lista de cursos.

*Padrão: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notificar apenas o administrador global sobre novos usuários**

Quando habilitado, apenas o administrador global recebe notificações por e-mail sobre novos registros de usuários, em vez de todos os administradores.

*Padrão: `false`*

### `show_link_request_hrm_user`

**Mostrar link para solicitar vínculo entre usuário e HRM**

Exibe um link na página de perfil permitindo que diretores de Recursos Humanos solicitem vínculo com uma conta de usuário.

*Padrão: `false`*

### `user_status_option_only_for_admin_enabled`

**Ocultar função de usuários normais**

Permite ocultar a função dos usuários quando esta opção está definida como verdadeira e o array seguinte define a função correspondente como 'true'.

*Padrão: `false`*

### `user_status_option_show_only_for_admin`

**Definir quais funções são ocultas para usuários normais**

As funções definidas como 'true' aparecerão apenas para administradores. Outros usuários não poderão vê-las.