# Configurações de Serviços Web

Configuração dos serviços web SOAP / REST legados (separados dos endpoints modernos da API Platform).

Acesse essas configurações em **Administração > Configurações de configuração > Serviços Web**. Esta categoria contém **7 configurações**, listadas abaixo com o título e o comentário fornecidos nos arquivos de configurações da plataforma (`SettingsCurrentFixtures.php`).

> O nome da variável no código é mostrado em fonte monoespaçada. Use-o ao criar scripts via API ou quando precisar alterar essas configurações em um nível global editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Configurações

### `allow_download_documents_by_api_key`

**Permitir download de documentos do curso por chave API**

Fazer download de documentos verificando a chave da API REST para um usuário

*Padrão: `false`*

### `disable_webservices`

**Desativar serviços web**

Se você não utiliza serviços web, ative esta opção para evitar qualquer risco de segurança desnecessário.

*Padrão: `false`*

### `messaging_allow_send_push_notification`

**Permitir Notificações Push para o aplicativo móvel de Mensagens do Chamilo**

Enviar Notificações Push pelo Console Firebase do Google

*Padrão: `false`*

### `messaging_gdc_api_key`

**Chave do servidor do Console Firebase para Mensagens na Nuvem**

Chave do servidor (token legado) das credenciais do projeto

### `messaging_gdc_project_number`

**ID do Remetente do Console Firebase para Mensagens na Nuvem**

Você precisa registrar um projeto em <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Ativar serviços web exclusivos para administradores**

Alguns serviços web REST são marcados como exclusivos para administradores e estão desativados por padrão. Ative esta funcionalidade para conceder acesso a esses serviços web (a usuários com credenciais de administrador, obviamente).

*Padrão: `false`*

### `webservice_return_user_field`

**Serviços web retornam campo de usuário**

Solicitar aos serviços web REST (v2.php) que retornem outro identificador para campos relacionados ao ID do usuário. Isso é útil se o sistema externo não lida realmente com IDs de usuário como estão no Chamilo, pois ajuda o sistema externo a corresponder os dados de usuário retornados com alguns dados externos conhecidos pelo Chamilo. Por exemplo, se você usa um sistema de autenticação externo, pode retornar o campo extra usado para corresponder o usuário com o sistema de autenticação externo em vez de user.id.

*Padrão: `oauth2_id`*