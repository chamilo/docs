# Configurações CAS

Configuração legado do CAS (Central Authentication Service) herdada do Chamilo 1.x. Consulte [CAS](../authentication/cas.md) para o status atual do autenticador CAS no Chamilo 3.x.

Acesse essas configurações em **Administração > Configurações > CAS**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é exibido em monoespaçado. Use-o ao automatizar via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `cas_activate`

**Ativar autenticação CAS**

Ativar a autenticação CAS permitirá que os usuários se autentiquem com suas credenciais CAS.<br/>Vá até <a href='settings.php?category=CAS'>Plugin</a> para adicionar um botão configurável 'CAS Login' ao seu campus Chamilo. Ou você pode forçar a autenticação CAS definindo cas[force_redirect] em app/config/auth.conf.php.

### `cas_add_user_activate`

**Ativar adição de usuários CAS**

Ativar a adição de usuários CAS. Para criar a conta de usuário a partir do diretório LDAP, as tabelas extldap_config e extldap_user_correspondance devem ser preenchidas em app/config/auth.conf.php

### `cas_port`

**Porta do servidor CAS principal**

A porta na qual se conectar ao servidor CAS principal

### `cas_protocol`

**Protocolo do servidor CAS principal**

O protocolo com o qual nos conectamos ao servidor CAS

### `cas_server`

**Servidor CAS principal**

Este é o servidor CAS principal que será usado para a autenticação (endereço IP ou nome de host)

### `cas_server_uri`

**URI do servidor CAS principal**

O caminho para o serviço CAS

### `update_user_info_cas_with_ldap`

**Atualizar informações da conta de usuário autenticado via CAS a partir do LDAP**

Garante que o nome, o sobrenome e o endereço de e-mail do usuário sejam iguais aos valores atuais no diretório LDAP