# Configurações de Serviços Web

Configuração dos serviços web SOAP / REST legados (separados dos endpoints modernos da API Platform).

Acesse estas configurações em **Administração > Configurações > Serviços Web**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos fixtures de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em monoespaçado. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_download_documents_by_api_key`

**Permitir download de documentos do curso por chave de API**

Baixar documentos verificando a chave de API REST de um usuário

*Padrão: `false`*


### `disable_webservices`

**Desativar serviços web**

Se você não usa serviços web, ative esta opção para evitar qualquer risco de segurança desnecessário.

*Padrão: `false`*


### `messaging_allow_send_push_notification`

**Permitir notificações push no aplicativo móvel Chamilo Messaging**

Enviar notificações push pelo Firebase Console do Google

*Padrão: `false`*


### `messaging_gdc_api_key`

**Chave de servidor do Firebase Console para Cloud Messaging**

Chave de servidor (token legado) das credenciais do projeto

### `messaging_gdc_project_number`

**Sender ID do Firebase Console para Cloud Messaging**

É necessário registrar um projeto no <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Ativar serviços web somente para administradores**

Alguns serviços web REST estão marcados apenas para administradores e vêm desativados por padrão. Ative este recurso para conceder acesso a esses serviços web (a usuários com credenciais de administrador, obviamente).

*Padrão: `false`*

### `webservice_return_user_field`

**Campo de usuário retornado pelos webservices**

Solicitar que os webservices REST (v2.php) retornem outro identificador para campos relacionados ao ID do usuário. Isso é útil se o sistema externo não lida realmente com IDs de usuário como estão no Chamilo, pois ajuda o sistema externo a corresponder os dados de usuário retornados com algum dado externo conhecido pelo Chamilo. Por exemplo, se você usa um sistema de autenticação externo, pode retornar o campo extra usado para corresponder o usuário ao sistema de autenticação externo em vez de user.id.

*Padrão: `oauth2_id`*