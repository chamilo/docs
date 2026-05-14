# OAuth2

A autenticação OAuth2 está configurada no arquivo `config/authentication.yaml`. O Chamilo inclui suporte integrado para Azure AD, Keycloak, Facebook e qualquer provedor genérico compatível com OAuth2.

## Passo 1 — Registre o Chamilo no seu provedor de identidade

Crie uma aplicação no painel de administração do seu provedor e defina o **URI de redirecionamento** como:

```
https://seu-url-chamilo/connect/<provedor>/check
```

Onde `<provedor>` é `azure`, `keycloak`, `facebook` ou o nome que você atribuir a um provedor genérico. Anote o **Client ID** e o **Client Secret**.

## Passo 2 — Configure o authentication.yaml

Ative o provedor e forneça suas credenciais. Todos os provedores compartilham estas chaves comuns:

| Chave | Descrição |
|-------|-----------|
| `enabled` | `true` para ativar |
| `title` | Rótulo exibido no botão de login |
| `client_id` | Fornecido pelo seu provedor de identidade |
| `client_secret` | Fornecido pelo seu provedor de identidade |
| `allow_create_new_users` | Cria automaticamente uma conta no Chamilo no primeiro login |
| `allow_update_user_info` | Sincroniza os dados do usuário a cada login |
| `force_as_login_method` | Desativa outros métodos e força este |

### Azure AD (Microsoft Entra ID)

```yaml
authentication:
  1:
    oauth2:
      azure:
        enabled: true
        title: "Entrar com Microsoft"
        client_id: "<application-client-id>"
        client_secret: "<client-secret>"
        tenant: "<tenant-id>"
        url_login: "https://login.microsoftonline.com"
        path_authorize: "/<tenant-id>/oauth2/v2.0/authorize"
        path_token: "/<tenant-id>/oauth2/v2.0/token"
        url_api: "https://graph.microsoft.com"
        allow_create_new_users: true
        allow_update_user_info: true
```

O Azure também suporta mapeamento de papéis baseado em grupos (mapeando IDs de grupos do Azure para papéis do Chamilo, como professor ou administrador), comandos de sincronização delta de usuários e autenticação por certificado em vez de um client secret. Consulte o [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para essas opções.

### Keycloak

```yaml
authentication:
  1:
    oauth2:
      keycloak:
        enabled: true
        title: "Entrar com Keycloak"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        auth_server_url: "https://keycloak.suaorganizacao.com"
        realm: "seu-realm"
        allow_create_new_users: true
```

### Facebook

```yaml
authentication:
  1:
    oauth2:
      facebook:
        enabled: true
        title: "Entrar com Facebook"
        client_id: "<app-id>"
        client_secret: "<app-secret>"
        graph_api_version: "v20.0"
        allow_create_new_users: true
```

### OAuth2 Genérico

Use isso para Google, GitLab ou qualquer provedor compatível com OAuth2:

```yaml
authentication:
  1:
    oauth2:
      meuprovedor:
        enabled: true
        title: "Entrar com MeuProvedor"
        client_id: "<client-id>"
        client_secret: "<client-secret>"
        urlAuthorize: "https://provedor.exemplo.com/oauth/authorize"
        urlAccessToken: "https://provedor.exemplo.com/oauth/token"
        urlResourceOwnerDetails: "https://provedor.exemplo.com/api/user"
        scopes: ["openid", "email", "profile"]
        allow_create_new_users: true
```

O mapeamento de campos (como os atributos do provedor são mapeados para campos do Chamilo, como `firstname`, `lastname`, `email`, etc.) e o mapeamento de papéis também são configuráveis. Consulte o [wiki](https://github.com/chamilo/chamilo-lms/wiki/External-Authentication-configuration) para a lista completa de chaves de mapeamento.

## Passo 3 — Limpe o cache e teste

```bash
php bin/console cache:clear && php bin/console cache:warmup
```

Saia do Chamilo. O botão do provedor configurado deve aparecer na página de login. Teste com uma conta dedicada antes de implementar para todos os usuários.

## Dicas

* Mantenha o módulo de login padrão ativo para que os administradores possam sempre fazer login caso haja problemas com o OAuth2.
* Ao usar o Azure com usuários existentes, configure `existing_user_verification_order` para controlar como o Chamilo associa usuários recebidos a contas existentes.
* A atribuição de papéis é definida por padrão como estudante; use o mapeamento de grupos para promover automaticamente usuários a papéis de professor ou administrador.