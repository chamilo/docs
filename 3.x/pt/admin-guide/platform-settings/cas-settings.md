# Definições CAS

Configuração legado do CAS (Central Authentication Service) herdada do Chamilo 1.x. Consulte [CAS](../authentication/cas.md) para o estado atual do autenticador CAS no Chamilo 3.x.

Aceda a estas definições em **Administração > Definições de configuração > CAS**. Esta categoria contém **7 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `cas_activate`

**Ativar autenticação CAS**

A ativação da autenticação CAS permitirá que os utilizadores se autentiquem com as suas credenciais CAS.<br/>Vá a <a href='settings.php?category=CAS'>Plugin</a> para adicionar um botão configurável «CAS Login» ao seu campus Chamilo. Ou pode forçar a autenticação CAS definindo cas[force_redirect] em app/config/auth.conf.php.

### `cas_add_user_activate`

**Ativar adição de utilizadores CAS**

Ativar a adição de utilizadores CAS. Para criar a conta de utilizador a partir do diretório LDAP, as tabelas extldap_config e extldap_user_correspondance devem estar preenchidas em app/config/auth.conf.php

### `cas_port`

**Porta do servidor CAS principal**

A porta através da qual se estabelece a ligação ao servidor CAS principal

### `cas_protocol`

**Protocolo do servidor CAS principal**

O protocolo com o qual nos ligamos ao servidor CAS

### `cas_server`

**Servidor CAS principal**

Este é o servidor CAS principal que será utilizado para a autenticação (endereço IP ou nome de anfitrião)

### `cas_server_uri`

**URI do servidor CAS principal**

O caminho para o serviço CAS

### `update_user_info_cas_with_ldap`

**Atualizar informações da conta de utilizador autenticado por CAS a partir do LDAP**

Garante que o primeiro nome, o apelido e o endereço de e-mail do utilizador coincidem com os valores atuais no diretório LDAP