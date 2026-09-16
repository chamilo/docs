# Configurações de Web Services

Configuração dos web services SOAP / REST legados (separados dos endpoints modernos da API Platform).

Aceda a estas definições em **Administração > Definições de configuração > Web Services**. Esta categoria contém **7 definições**, listadas abaixo com o título e o comentário fornecidos nas fixtures de definições da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é apresentado em monoespaçado. Utilize-o ao automatizar via API ou quando precisar de alterar essas definições a nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Definições

### `allow_download_documents_by_api_key`

**Permitir descarregar documentos do curso por chave de API**

Descarregar documentos verificando a chave da API REST de um utilizador

*Predefinição: `false`*


### `disable_webservices`

**Desativar web services**

Se não utilizar web services, ative esta opção para evitar qualquer risco de segurança desnecessário.

*Predefinição: `false`*


### `messaging_allow_send_push_notification`

**Permitir notificações push na aplicação móvel Chamilo Messaging**

Enviar notificações push através da Firebase Console da Google

*Predefinição: `false`*


### `messaging_gdc_api_key`

**Chave de servidor da Firebase Console para Cloud Messaging**

Chave de servidor (token legado) das credenciais do projeto

### `messaging_gdc_project_number`

**Sender ID da Firebase Console para Cloud Messaging**

É necessário registar um projeto na <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Ativar web services apenas para administradores**

Alguns web services REST estão marcados apenas para administradores e estão desativados por predefinição. Ative esta funcionalidade para dar acesso a esses web services (a utilizadores com credenciais de administrador, obviamente).

*Predefinição: `false`*

### `webservice_return_user_field`

**Campo de utilizador devolvido pelos web services**

Pedir aos web services REST (v2.php) que devolvam outro identificador para campos relacionados com o ID de utilizador. Isto é útil se o sistema externo não lidar realmente com os IDs de utilizador tal como existem no Chamilo, pois ajuda o sistema externo a corresponder os dados de utilizador devolvidos com dados externos conhecidos do Chamilo. Por exemplo, se utilizar um sistema de autenticação externo, pode devolver o campo extra usado para corresponder o utilizador ao sistema de autenticação externo em vez de user.id.

*Predefinição: `oauth2_id`*